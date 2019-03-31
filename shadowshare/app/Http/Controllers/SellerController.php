<?php

namespace App\Http\Controllers;
use DB;
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
        return redirect('/sellerregister')->with($ms);
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
                'image'=> $name , 
                'pickupaddress'=> $request->get('Pickup'),
                'status'=> 1,
                
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
        
        return  $details;
        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $seller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function edit(Seller $seller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $seller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller)
    {
        //
    }
}