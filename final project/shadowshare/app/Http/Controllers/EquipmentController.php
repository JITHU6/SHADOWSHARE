<?php

namespace App\Http\Controllers;
use App\Mail\sendMailable;
use Illuminate\Support\Facades\Mail;
use App\Equipment;
use App\Casestory;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;

class EquipmentController extends Controller
{
    //needy view equipments
    public function Needyequipment(){
        $dataa = [];
        $va =session()->get('loginid');
        $ucat=DB::table('tbl_register')
                                    ->select('user_category')
                                    ->join('tbl_login','tbl_login.reg_id','=','tbl_register.reg_id')
                                    ->where('id',$va)
                                    ->get();
       $a=DB::select('select * from tbl_equipments where category_id='.$ucat[0]->user_category.' and (estatus=1 or estatus=2)');
        //$a=DB::table('tbl_equipments')->where('estatus',1)->orwhere('estatus',2)->get();
        //return $a;
        $i=0;
        foreach($a as $cat)
        {
            //count of items requests
            $e=$cat->equipment_id;
            session(['catname'=>$e]); 
            $count= DB::table('tbl_casestory')
                
                //->join('tbl_sellers','tbl_sellers.seller_id','=','tbl_equipments.seller_id')
                //->join('tbl_login','tbl_login.id','=','tbl_sellers.login_id')
                ->where('equipmentid',$e)
                ->where('cstatus',2)
                ->get();
                $coun=count($count);
                
            //     session(['ecount'=>$b]); 
            //    $va =session()->get('ecount');

            //display materials    
            $b=$cat->category_id;
            $catname=DB::table('tbl_category')->where('category_id',$b)->get();
            $a[$i]->categoryname=$catname[0]->categoryname;
            $a[$i]->c=$coun;
            $i++;  
              
        }
        
        
        return view('needy.equipments',['a'=>$a]);

        
    }

    //needy equipdetails modal 
    public function Getequipdata(Request $request){
        $data = [];
        $user =[];
        $phone = [];
        $a=$request->all()['eid'];

        
        $eq=Equipment::where('equipment_id',$a)->get();
        $b=$eq[0]->category_id;
        $cat=DB::table('tbl_category')->select('categoryname')->where('category_id',$b)->get();
        
        
        array_push($data,$cat[0]->categoryname);
        $eq[0]->category=$data;

        $e=$eq[0]->seller_id;
        
        $seller=DB::table('tbl_register')->join('tbl_login','tbl_login.reg_id','=','tbl_register.reg_id')
                                         ->join('tbl_sellers','tbl_sellers.login_id','=','tbl_login.id')
                                         -> where('seller_id',$e)->get();
        array_push($user,$seller[0]->name);
        array_push($phone,$seller[0]->phonenumber);
        
        $eq[0]->sellername= $user;
        $eq[0]->phonenumber= $phone;
        
        return $eq;

        
    }
    public function Equipmentstory(Request $request){
        
        $value =session()->get('loginid');

                
        $user = DB::table('tbl_login')
                        ->select('tbl_login.email','tbl_register.name','tbl_register.phonenumber','tbl_register.image','tbl_panchayath.pname','tbl_register.verification_document')
                        ->join('tbl_register','tbl_register.reg_id','=','tbl_login.reg_id')
                        ->join('tbl_panchayath','tbl_panchayath.panchayath_id','=','tbl_register.panchayath_id')
                        ->join('tbl_district','tbl_district.district_id','=','tbl_panchayath.district_id')
                        ->join('tbl_state','tbl_state.state_id','=','tbl_district.state_id')
                        ->where(['id' => $value])
                        ->get();
        $b=$request->get('cid');
        $eid=$request->get('eid');
        if(!$eid)
        {
           $eid=$request->session()->get('equipid');
           $b=$request->session()->get('catid');
        //get equipmentid
       $equipment=DB::table('tbl_equipments')->where('equipment_id',$eid)->get();
        //*******
        
       $h=DB::table('tbl_equipments')->select('email','name')
                                            ->join('tbl_sellers','tbl_sellers.seller_id','=','tbl_equipments.seller_id')
                                            ->join('tbl_login','tbl_login.id','=','tbl_sellers.login_id')
                                            ->join('tbl_register','tbl_register.reg_id','=','tbl_login.reg_id')
                                            ->where('equipment_id',$eid) 
                                            ->get();
                                            $equipment[0]->email=$h[0]->email;
                                            $equipment[0]->name=$h[0]->name;
          $dataa=DB::table('tbl_category')->where('category_id',$b)->get();
          $qus=DB::table('tbl_question')->where('cat_id',$b)->get();
        
        
        
        //return view('needy.fstory',['data'=>$cat,'equipment'=>$eq]);
       
        return view('needy.eqstory',['equipment'=>$equipment,'data'=>$dataa,'user'=>$user,'question'=>$qus]);
        }
        else{
             //get equipmentid
       $equipment=DB::table('tbl_equipments')->where('equipment_id',$eid)->get();
       //*******
       
      $h=DB::table('tbl_equipments')->select('email','name')
                                           ->join('tbl_sellers','tbl_sellers.seller_id','=','tbl_equipments.seller_id')
                                           ->join('tbl_login','tbl_login.id','=','tbl_sellers.login_id')
                                           ->join('tbl_register','tbl_register.reg_id','=','tbl_login.reg_id')
                                           ->where('equipment_id',$eid) 
                                           ->get();
                                           $equipment[0]->email=$h[0]->email;
                                           $equipment[0]->name=$h[0]->name;
         $dataa=DB::table('tbl_category')->where('category_id',$b)->get();
         $qus=DB::table('tbl_question')->where('cat_id',$b)->get();
       
       
       
       //return view('needy.fstory',['data'=>$cat,'equipment'=>$eq]);
      
       return view('needy.eqstory',['equipment'=>$equipment,'data'=>$dataa,'user'=>$user,'question'=>$qus]);
        }
        
   
    }
    public function SaveEquipmentstory(Request $request){
        //return $count= $request->get('count');
        $value = session()->get('loginid');
                
            $cstory=Casestory::where(['user_id'=>$value,'category_id'=>$request->get('cat'),'equipmentid'=>$request->get('equipment'),'casetitle'=>$request->get('casetitle')])->get();
            if(count($cstory)==0)
            {
                //return  1;
                //get the count of questions
                 $count= $request->get('count');

              
                //insert to table
                $image = $request->file('file');
                $file_path = 'uploads/caseimage/';
                $Proof1_name = time() . $image->getClientOriginalName();                      
                $image->move($file_path, $Proof1_name);
                
                if($request->hasFile('casefile')){
                    $image = $request->file('casefile');
                $file_path = 'uploads/verify/';
                $Proof1_namea = time() . $image->getClientOriginalName();                      
                $image->move($file_path, $Proof1_namea);
                
                $savecase = new Casestory([
                    'category_id'=> $request->get('cat'),
                    'user_id'=>$value ,
                    
                    'equipmentid'=>$request->get('equipment'),
                    'casetitle'=>$request->get('casetitle'),
                    'caseimage'=> $Proof1_name,
                    'question'=>0,
                    'answer'=>0,
                    'edescription'=> $request->get('edescription'),                    
                    'verification_address'=>$request->get('vaddress'),
                    //'verification_document'=> $Proof1_namea,
                    'cstatus'=> 2,
                    
                ]);
                //send equipment request mail to seller
                $eid=$request->get('equipment');
                $h=DB::table('tbl_equipments')->select('email','name','cname')
                                            ->join('tbl_sellers','tbl_sellers.seller_id','=','tbl_equipments.seller_id')
                                            ->join('tbl_login','tbl_login.id','=','tbl_sellers.login_id')
                                            ->join('tbl_register','tbl_register.reg_id','=','tbl_login.reg_id')
                                            ->where('equipment_id',$eid) 
                                            ->get();
                try{                            
                $mail = $h[0]->email;
                $name = $h[0]->name;
                $ename = $h[0]->cname;
                $data = [
                    'name'=>$name,
                    'ename' => $ename ,
                ];
                Mail::send('needy.email', $data, function ($message) use ($mail) {
                    $message->to($mail)->subject('Equipment Request ')->from('support@shadowshare.com');
                });
            } catch (\Exception $e) {
                return back()->with('warning', $e)->with('warning', 'Network error!');
            }
                //end sending mail 
               
                //update equipment status 
                DB::table('tbl_equipments')->where('equipment_id',$eid)->update(['estatus'=>2]);   
                //verification id to register table
                DB::table('tbl_register')->join('tbl_login','tbl_login.reg_id','=','tbl_register.reg_id')->where('id',$value)->update(['verification_document'=>$Proof1_namea]);
                //save case                         
                $savecase -> save();
               
                $request->session()->flash('message','Case Story Added!');
                return redirect('/needyequipment');
            }else{

                $savecase = new Casestory([
                    'category_id'=> $request->get('cat'),
                    'user_id'=>$value ,
                    
                    'equipmentid'=>$request->get('equipment'),
                    'casetitle'=>$request->get('casetitle'),
                    'caseimage'=> $Proof1_name,
                    'question'=>0,
                    'answer'=>0,
                    'edescription'=> $request->get('edescription'),                    
                    'verification_address'=>$request->get('vaddress'),
                    //'verification_document'=> $Proof1_namea,
                    'cstatus'=> 2,
                    
                ]);
                //send equipment request mail to seller
                $eid=$request->get('equipment');
                $h=DB::table('tbl_equipments')->select('email','name','cname')
                                            ->join('tbl_sellers','tbl_sellers.seller_id','=','tbl_equipments.seller_id')
                                            ->join('tbl_login','tbl_login.id','=','tbl_sellers.login_id')
                                            ->join('tbl_register','tbl_register.reg_id','=','tbl_login.reg_id')
                                            ->where('equipment_id',$eid) 
                                            ->get();
                 try{                        
                $mail = $h[0]->email;
                $name = $h[0]->name;
                $ename = $h[0]->cname;
                $data = [
                    'name'=>$name,
                    'ename' => $ename ,
                ];
                Mail::send('needy.email', $data, function ($message) use ($mail) {
                    $message->to($mail)->subject('Equipment Request ')->from('support@shadowshare.com');
                });
            } catch (\Exception $e) {
                return back()->with('warning', $e)->with('warning', 'Network error!');
            }
                //end sending mail 
               
                //update equipment status 
                DB::table('tbl_equipments')->where('equipment_id',$eid)->update(['estatus'=>2]);   
                
            
                //save case                         
                $savecase -> save();
               
                $request->session()->flash('message','Case Story Added!');
                return redirect('/needyequipment');
            }
                
            }
        
     
            else{
                 
                $request->session()->flash('message','Same Case story already exists!'); 
                
                return redirect()->back();
                //return $this->categorydropdown($request); 
            }
        
    }
    public function Removequip(Request $request,$equipment_id)
    {
        $a=DB::table('tbl_equipments')->where('equipment_id',$equipment_id)->delete();
        $request->session()->flash('message','Equipment Removed!'); 
        return redirect()->back();
    }
    public function Equipmentapproved(Request $request){
        // $value = session()->get('loginid');
        // $dataa = [];
        // $a=DB::table('tbl_casestory')->join('tbl_equipments','tbl_equipments.equipment_id','=','tbl_casestory.equipmentid')->where('estatus',3)->where('user_id',$value)->get();
        // //return $a;
        // $i=0;
        // foreach($a as $cat)
        // {
            
        //     $b=$cat->category_id;
        //     $catname=DB::table('tbl_category')->where('category_id',$b)->get();
             
        //     // array_push($dataa, $catname[$i]->categoryname);
        //     $a[$i]->categoryname=$catname[0]->categoryname;
        //     //$f=implode(',',$dataa);
        //     $i++;    
        // }
        $lid=session()->get('loginid');
        
        
        $a=DB::table('tbl_register')
                                        ->join('tbl_login','tbl_login.reg_id','=','tbl_register.reg_id')
                                        ->join('tbl_casestory','tbl_casestory.user_id','=','tbl_login.id')
                                        
                                        ->join('tbl_equipments','tbl_equipments.equipment_id','=','tbl_casestory.equipmentid')
                                        ->join('tbl_category','tbl_category.category_id','=','tbl_equipments.category_id')
                                        
                                        ->where('user_id',$lid)
                                        ->where('cstatus',3)
                                        
                                        ->get();
        $c=count($a);
        session(['appovedequip'=>$c]);
        return view('needy.equipmentapproved',['a'=>$a]);  
       
    }
    public function mail($mailTo, $name)
    {
        try{
        $data = array('name' =>'a','email'=>'b');
        
            Mail::send('needy.email',$data, function ($message) {
                            
                                 $message->from('jithuuu@gmail.com', '');
                                 $message->to('usernotalive@gmail.com')->subject('Equipment Request');
                
                            });
            } catch (\Exception $e) {
                        return back()->with('warning', $e)->with('warning', 'Network error!');
            }
                //return true;
           
            return false;
    }
    
}