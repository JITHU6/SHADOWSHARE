<?php

namespace App\Http\Controllers;
use DB;
use Mail;
use Hash;
use App\Seller;
use App\NeedyRegistration;
use App\Login;
use App\Equipment;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sellerhome(){
        $value =session()->get('loginida');       
        $user = DB::table('tbl_sellers')
                        ->join('tbl_login','tbl_login.id','=','tbl_sellers.login_id')
                        ->join('tbl_register','tbl_register.reg_id','=','tbl_login.reg_id')                        
                        ->where(['login_id' => $value])
                        ->get();  

                        
        
        return view('seller.home',['users' => $user ]);
        
    }
    
    public function Sellerregister()
    {
        $state = DB::table('tbl_state')->get(); 
        return view('seller.sellerregistration',['state' => $state]);
    }
    public function Sellerprofile()
    {
        $value =session()->get('loginida');
  
        $state = DB::table('tbl_state')->get(); 
        
        $user = DB::table('tbl_sellers')
                        ->join('tbl_login','tbl_login.id','=','tbl_sellers.login_id')
                        ->join('tbl_register','tbl_register.reg_id','=','tbl_login.reg_id')
                        ->join('tbl_panchayath','tbl_panchayath.panchayath_id','=','tbl_register.panchayath_id')
                        ->join('tbl_district','tbl_district.district_id','=','tbl_panchayath.district_id')
                        ->join('tbl_state','tbl_state.state_id','=','tbl_district.state_id')
                        ->where(['login_id' => $value])
                        ->get();  

                        
        
        return view('seller.sellerprofile',['state' => $state],['users' => $user ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50|string',
            'add1' => 'required|max:100',
            'add2' => 'required|max:100',
            'state' => 'required',
            'district'=> 'required',
            'panchayath' => 'required',
            'pincode' => 'required||numeric|',
            'phone' => 'required|regex:/[0-9]{9}/',
            'password' => 'required|string|min:3',
            
            'email' => 'required|string|email|max:255|unique:tbl_login',
            
            
        ]);
        
        
         
        $reg = new NeedyRegistration([
            'name'=> $request->get('name'),
            'addressline1'=>$request->get('add1'),
            'addressline2'=>$request->get('add2'),
            'panchayath_id'=>$request->get('panchayath'),
            'pincode'=>$request->get('pincode'),
            'phonenumber'=> $request->get('phone'),
            'status'=> 1,
            
        ]);
        $reg -> save();
        $log = new Login([
            
            'reg_id'=> DB::getPdo()->lastInsertId(),
            'email'=> $request->get('email'),
            'password'=> Hash::make($request->get('password')),
            'type'=> 'seller',
            'status'=>1,
        ]);
        
        $log-> save();
        $log = new Seller([
            
            'login_id'=> DB::getPdo()->lastInsertId(),
            
            'status'=>1,
        ]);
        
        $log-> save();
       $ms=[
           'message'=> 'Data Saved!'
       ];
        return redirect('/loginn')->with($ms);
    }
    public function Updateprofile(Request $request){
        // $validatedData = $request->validate([
        //     'name' => 'required|max:50|string',
        //     'add1' => 'required|max:100',
        //     'add2' => 'required|max:100',
        //     'state' => 'required',
        //     'district'=> 'required',
        //     'panchayath' => 'required',
        //     'pincode' => 'required||numeric|',
        // ]);
        //image
        
        //return $value;
  
        //update profile 
       
        if($request->hasFile('file')){
            $image = $request->file('file');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/sellerprofile');
            $image->move($destinationPath, $name);
            $value =session()->get('loginida');
            DB::table('tbl_login')
                                ->join('tbl_register','tbl_register.reg_id','=','tbl_login.reg_id')
                                ->join('tbl_panchayath','tbl_panchayath.panchayath_id','=','tbl_register.panchayath_id')
                                ->join('tbl_district','tbl_district.district_id','=','tbl_panchayath.district_id')
                                ->join('tbl_state','tbl_state.state_id','=','tbl_district.state_id')
                                ->where(['id' => $value]) 
                                ->update([
                                    'tbl_register.name'=> $request->get('name'),
                                    'tbl_register.addressline1'=>$request->get('add1'),
                                    'tbl_register.addressline2'=>$request->get('add2'),
                                    'tbl_register.panchayath_id'=>$request->get('panchayath'),
                                    'tbl_register.pincode'=>$request->get('pincode'),
                                    'tbl_register.phonenumber'=> $request->get('phone'),
                                     'tbl_register.image'=> $name
                                    
                                ]);
                               
                                $user = DB::table('tbl_login')
                                ->join('tbl_register','tbl_register.reg_id','=','tbl_login.reg_id')
                                ->join('tbl_panchayath','tbl_panchayath.panchayath_id','=','tbl_register.panchayath_id')
                                ->join('tbl_district','tbl_district.district_id','=','tbl_panchayath.district_id')
                                ->join('tbl_state','tbl_state.state_id','=','tbl_district.state_id')
                                ->where(['id' => $value])
                                ->get();  
                                
                                $state = DB::table('tbl_state')->get();
                                $msg=(['message' => 'Profile Updated']);
                            return view('seller.sellerprofile',['users' => $user ],['state'=>$state]);
                    }
                            
                else{
                    $value =session()->get('loginida');
                   // return $request->all();
                    DB::table('tbl_login')
                                ->join('tbl_register','tbl_register.reg_id','=','tbl_login.reg_id')
                                ->join('tbl_panchayath','tbl_panchayath.panchayath_id','=','tbl_register.panchayath_id')
                                ->join('tbl_district','tbl_district.district_id','=','tbl_panchayath.district_id')
                                ->join('tbl_state','tbl_state.state_id','=','tbl_district.state_id')
                                ->where(['id' => $value]) 
                                ->update([
                                    'tbl_register.name'=> $request->get('name'),
                                    'tbl_register.addressline1'=>$request->get('add1'),
                                    'tbl_register.addressline2'=>$request->get('add2'),
                                    'tbl_register.panchayath_id'=>$request->get('panchayath'),
                                    'tbl_register.pincode'=>$request->get('pincode'),
                                    'tbl_register.phonenumber'=> $request->get('phone'),
                                     
                                    
                                ]);
                               
                                $user = DB::table('tbl_login')
                                ->join('tbl_register','tbl_register.reg_id','=','tbl_login.reg_id')
                                ->join('tbl_panchayath','tbl_panchayath.panchayath_id','=','tbl_register.panchayath_id')
                                ->join('tbl_district','tbl_district.district_id','=','tbl_panchayath.district_id')
                                ->join('tbl_state','tbl_state.state_id','=','tbl_district.state_id')
                                ->where(['id' => $value])
                                ->get();  
                                
                                $state = DB::table('tbl_state')->get();
                                $msg=(['message' => 'Profile Updated']);
                            return view('seller.sellerprofile',['users' => $user ],['state'=>$state]);
                            
                }
        
    }
    
    public function Additempage(Request $request)
    {
        $users = DB::table('tbl_category')->get();
        return view('seller.addequipment',['data'=>$users]);
        
    }
    public function AddItem(Request $request)
    {
        $id=session()->get('loginida');
        $sid=DB::table('tbl_sellers')->select('seller_id')->where('login_id',$id)->get();
        //return $sid;
        foreach($sid as $aid ){
        $a=Equipment::where(['cname'=>$request->get('item_name'),'seller_id'=>$aid->seller_id,'category_id'=>$request->get('category')])->get();
        
        if(count($a)==0){

            $image = $request->file('itemimage');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/equipment/');
            $image->move($destinationPath, $name);
       // $this->save();
        //return back()->with('success','Image Upload successfully');
       
            $item = new Equipment([
                'seller_id'=> $aid->seller_id,
                'category_id'=>$request->get('category'),
                'cname'=>$request->get('item_name'),
                'price'=>$request->get('price'),
                'condition'=>$request->get('condition'),
                'description'=>$request->get('discription'),
                'cimage'=> $name , 
                'pickupaddress'=> $request->get('Pickup'),
                'estatus'=> 1,
                
            ]);
            $item-> save();
            $request->session()->flash('message','Equipment Added!');
            $users = DB::table('tbl_category')->get();
            return view('seller.addequipment',['data'=>$users]);
       
    
    
    }
    else{
        $request->session()->flash('message','Equipment already exists!'); 
        $users = DB::table('tbl_category')->get();
        return view('seller.addequipment',['data'=>$users]); 
    }
    
    }
    }
    
    
    public function ViewItemlist(Request $request)
    {
        $lid=session()->get('loginida');
        $sid=DB::table('tbl_sellers')->select('seller_id')->where('login_id',$lid)->get();
        foreach ($sid as $sid) {
            # code...
        
        $eq=DB::table('tbl_equipments')->where('seller_id',$sid->seller_id)->get();
       return view('seller.viewitemlist',['data'=>$eq]);
    }
    }

    public function ViewItemdetailes(Request $request)
    {
        //return $id;
        $id=$request->all()['eid'];
        //return  $id;
        //$eq=DB::table('tbl_equipments')->where('seller_id',$sid->seller_id)->get();
        $details=Equipment::where('equipment_id',$id)->get();
        $a= $details[0]->category_id;
        $b=DB::table('tbl_category')->where('category_id',$a)->get();
        $details[0]->catname=$b[0]->categoryname;
        return  $details;
        
    }
    public function updateeqdata(Request $request){       
        $lid=session()->get('loginida');
        $id=$request->all()['eid'];
        
        $c=$request->get('ename');
        $d=$request->get('des');
        $e=$request->get('pick'); 
      
        if($request->hasFile('itemimage')){
            $b = $request->file('itemimage');
            $name = time().'.'.$b->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/equipment/');
            $b->move($destinationPath, $name);
        
        DB::table('tbl_equipments')->where('equipment_id',$id)->update(['cname'=>$c,'description'=>$d,'cimage'=>$name ,'pickupaddress'=>$e]);
        $request->session()->flash('message','Equipment Data updated!'); 
        return redirect()->back();
    }
    else{
        DB::table('tbl_equipments')->where('equipment_id',$id)->update(['cname'=>$c,'description'=>$d,'pickupaddress'=>$e]);
        $request->session()->flash('message','Equipment Data updated!'); 
        return redirect()->back();
     }
     }
    
    public function Viewequipneedy(){

    // $a=DB::table('tbl_register')
    //                             ->join('tbl_login','tbl_login.reg_id','=','tbl_register.reg_id')
    //                             ->join('tbl_casestory','tbl_casestory.user_id','=','tbl_login.id')
                                
    //                             ->join('tbl_equipments','tbl_equipments.equipment_id','=','tbl_casestory.equipmentid')
    //                             ->join('tbl_category','tbl_category.category_id','=','tbl_equipments.category_id')
    //                             ->where('cstatus',2)
    //                             ->where('')
    //                             ->get();
    $lid=session()->get('loginida');
        $sid=DB::table('tbl_sellers')->select('seller_id')->where('login_id',$lid)->get();
        foreach ($sid as $sid) {
            # code...
        
            $a=DB::table('tbl_register')
                                        ->join('tbl_login','tbl_login.reg_id','=','tbl_register.reg_id')
                                        ->join('tbl_casestory','tbl_casestory.user_id','=','tbl_login.id')
                                        
                                        ->join('tbl_equipments','tbl_equipments.equipment_id','=','tbl_casestory.equipmentid')
                                        ->join('tbl_category','tbl_category.category_id','=','tbl_equipments.category_id')
                                        ->where('cstatus',2)
                                        ->where('tbl_equipments.seller_id',$sid->seller_id)
                                        ->get();
        return view('seller.viewneedy',['a'=>$a]);
        }
    }
    public function Viewmodalneedy(Request $request){

        $c=$request->all()['eid'];
        $data = []; 
        //$c=2;
        $a=DB::table('tbl_register')->select('tbl_register.name','tbl_register.verification_document','tbl_casestory.verification_address','tbl_casestory.edescription','tbl_casestory.created_at','tbl_category.categoryname','tbl_casestory.caseimage','tbl_casestory.case_id','tbl_equipments.cname','tbl_casestory.casetitle')
                                    ->join('tbl_login','tbl_login.reg_id','=','tbl_register.reg_id')
                                    ->join('tbl_casestory','tbl_casestory.user_id','=','tbl_login.id')
                                
                                    ->join('tbl_equipments','tbl_equipments.equipment_id','=','tbl_casestory.equipmentid')
                                    ->join('tbl_category','tbl_category.category_id','=','tbl_equipments.category_id')
                                    ->where('case_id',$c)
                                    ->get();
        
                            
                                
                                
                                return $a;
    }
    public function Approveequipcase(Request $request){
        $a=$request->get('case_id');
        $b=$request->get('equipment_id');
        $lid=session()->get('loginida');
        
        //send mail to needy

    
        $c= DB::table('tbl_casestory')->join('tbl_login','tbl_login.id','=','tbl_casestory.user_id')
                                    ->join('tbl_register','tbl_register.reg_id','=','tbl_login.reg_id')   
                                    ->where('case_id',$a)
                                    
                                    ->get(); 
        $e=$c[0]->equipmentid;

        $f=DB::table('tbl_equipments')->where('equipment_id',$e)->get();
        
                                $mail = $c[0]->email;
                                $name = $c[0]->name;
                                $ename= $f[0]->cname;
                                //$ename = $h[0]->cname;
                            try{
                                $data = [
                                    'name'=>$name,
                                    'ename'=>$ename
                                ];
                                Mail::send('seller.approvalmail', $data, function ($message) use ($mail) {
                                    $message->to($mail)->subject('Equipment Request Approved ')->from('support@shadowshare.com');
                                });
                            } catch (\Exception $e) {
            return back()->with('warning', $e)->with('warning', 'Network error!');
        }
                
                                //end sending mail to needy
                                
        DB::table('tbl_casestory')->where('case_id',$a)->update(['cstatus'=>3]);
        DB::table('tbl_equipments')->where('equipment_id',$b)->update(['estatus'=>3]);
        //$request->session()->flash('message','Equipment Request approved !');
        return redirect()->back()->with('message','Equipment Request approved !');
    }
    public function Approvedrequests(Request $request){
  
    $lid=session()->get('loginida');
        $sid=DB::table('tbl_sellers')->select('seller_id')->where('login_id',$lid)->get();
        foreach ($sid as $sid) {
            # code...
        
        $a=DB::select('select r.name,r.phonenumber,e.cname,cat.categoryname,c.cstatus,c.updated_at,c.case_id ,c.user_id from tbl_register as r,tbl_login as l,tbl_casestory as c,tbl_equipments as e,tbl_category as cat where r.reg_id=l.reg_id and c.user_id=l.id and c.equipmentid=e.equipment_id and cat.category_id=e.category_id and e.seller_id='.$sid->seller_id.' and (cstatus=3 or cstatus=7)');
       // $a=DB::select('select* from tbl_register as r,tbl_login as l,tbl_casestory as c,tbl_equipments as e,tbl_category as cat where r.reg_id=l.reg_id and c.user_id=l.id and c.equipmentid=e.equipment_id and cat.category_id=e.category_id and e.seller_id='.$sid->seller_id.' and (cstatus=3 or cstatus=7)');
          
            // $a=DB::table('tbl_register')
            //                             ->join('tbl_login','tbl_login.reg_id','=','tbl_register.reg_id')
            //                             ->join('tbl_casestory','tbl_casestory.user_id','=','tbl_login.id')
                                        
            //                             ->join('tbl_equipments','tbl_equipments.equipment_id','=','tbl_casestory.equipmentid')
            //                             ->join('tbl_category','tbl_category.category_id','=','tbl_equipments.category_id')
                                        
            //                             ->where('tbl_equipments.seller_id',$sid->seller_id)
            //                             ->where('cstatus',3)
            //                             ->orwhere('cstatus',7)
            //                             ->get();
                                    
        return view('seller.approvedequipuser',['a'=>$a]);
        }
    }
    public function confirmdelivery(Request $request){

        $s=session()->get('loginida');
    
        $b=$request->get('user');
        $c=$request->get('case');
        $t=DB::table('tbl_transaction')->select('user_id','sponsor_id','case_id')->where(['user_id'=>$b,'sponsor_id'=>$s,'case_id'=>$c])->get();
            if(!count($t)){
                
                    //send mail to needy on successfull delivery

                    
                    $a= DB::table('tbl_casestory')->join('tbl_login','tbl_login.id','=','tbl_casestory.user_id')
                                                    ->join('tbl_register','tbl_register.reg_id','=','tbl_login.reg_id')   
                                                    ->where('case_id',$c)
                                                    ->get(); 
                    $e=$a[0]->equipmentid;

                    $f=DB::table('tbl_equipments')->where('equipment_id',$e)->get();

                    $mail = $a[0]->email;
                    $name = $a[0]->name;
                    $ename= $f[0]->cname;
                    //$ename = $h[0]->cname;
                    try{
                    $data = [
                    'name'=>$name,
                    'ename'=>$ename
                    ];
                    Mail::send('seller.deliverymail', $data, function ($message) use ($mail) {
                    $message->to($mail)->subject('Equipment Delivered Successfully')->from('support@shadowshare.com');
                    });
                } catch (\Exception $e) {
                    return back()->with('warning', $e)->with('warning', 'Network error!');
                }
                    //end sending mail to needy on successfull delivery
                    DB::table('tbl_equipments')->where('equipment_id',$e)->update(['estatus'=>3]);
                DB::table('tbl_transaction')->insert(['user_id'=>$b,'sponsor_id'=>$s,'case_id'=>$c,'tstatus'=>1]);
                           
                DB::table('tbl_casestory')->where(['case_id'=>$c])->update(['cstatus'=>7]); 
                $request->session()->flash('message','Delivery Recorded !');
                return redirect()->back();
                }
            else{
                
                $request->session()->flash('message','Delivery already completed !');
                return redirect()->back();
            }
    }
}