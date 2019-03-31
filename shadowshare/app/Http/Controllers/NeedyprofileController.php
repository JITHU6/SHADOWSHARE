<?php

namespace App\Http\Controllers;
use DB;
use Hash;

use Illuminate\Http\Request;
use Illuminate\support\facades\input;
class NeedyprofileController extends Controller
{
    public function Viewprofile(){
         $value =session()->get('loginid');
        $state = DB::table('tbl_state')->get(); 
        
        $user = DB::table('tbl_login')
                        ->join('tbl_register','tbl_register.reg_id','=','tbl_login.reg_id')
                        ->join('tbl_panchayath','tbl_panchayath.panchayath_id','=','tbl_register.panchayath_id')
                        ->join('tbl_district','tbl_district.district_id','=','tbl_panchayath.district_id')
                        ->join('tbl_state','tbl_state.state_id','=','tbl_district.state_id')
                        ->where(['id' => $value])
                        ->get();  

                        return view('needy.needyprofile',['users' => $user ],['state'=>$state]);
    }
    public function Updateprofile(Request $request){

       $a= $request->input('updateimage');
        if (isset($a)){
            $image = $request->file('file');
            $file_path = 'uploads/needyprofile/';
            $Proof1_name = time() . $image->getClientOriginalName();                      
            $image->move($file_path, $Proof1_name);
            //update profile 
            $value =session()->get('loginid');
            DB::table('tbl_login')
                                    ->join('tbl_register','tbl_register.reg_id','=','tbl_login.reg_id')
                                    ->where(['id' => $value]) 
                                    ->update([
                                    
                                        'tbl_register.image'=> $Proof1_name
                                    ]);
                                   
                                   
                                    $msg=(['message' => 'Profile Updated']);
                                return $this->viewprofile();
      }
      else{
        
        //update profile 
        if($request->hasFile('file')){
        $image = $request->file('file');
        $file_path = 'uploads/needyprofile/';
        $Proof1_name = time() . $image->getClientOriginalName();                      
        $image->move($file_path, $Proof1_name);
        $value =session()->get('loginid');
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
                                    'tbl_register.image'=> $Proof1_name
                                    
                                ]);
                               
                                
                                $msg=(['message' => 'Profile Updated']);
                                return $this->viewprofile();
                        }
                        else{
                            //return $request->all();
                            $value =session()->get('loginid');
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
                                                        'tbl_register.phonenumber'=> $request->get('phone')
                                                        
                                                        
                                                    ]);
                                                   
                                                    
                                                    $msg=(['message' => 'Profile Updated']);
                                                    return $this->viewprofile();

                            
                        }
    }
    }
}