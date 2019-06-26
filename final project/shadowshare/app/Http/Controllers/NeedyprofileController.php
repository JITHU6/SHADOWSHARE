<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\support\facades\input;

class NeedyprofileController extends Controller
{
    public function Viewprofile()
    {
        $value = session()->get('loginid');
        $state = DB::table('tbl_state')->get();
        $category=DB::table('tbl_category')->get();
        $user = DB::table('tbl_login')
            ->join('tbl_register', 'tbl_register.reg_id', '=', 'tbl_login.reg_id')
            ->join('tbl_panchayath', 'tbl_panchayath.panchayath_id', '=', 'tbl_register.panchayath_id')
            ->join('tbl_district', 'tbl_district.district_id', '=', 'tbl_panchayath.district_id')
            ->join('tbl_state', 'tbl_state.state_id', '=', 'tbl_district.state_id')
            ->where(['id' => $value])
            ->get();
            $u=$user[0]->user_category;
            $cate=DB::table('tbl_category')->where('category_id',$u)->get();
            $user[0]->catname=$cate[0]->categoryname;
            
            $a= $user[0]->name;
            session(['name'=>$a]);
            //return view('needy.needyprofile', ['users' => $user,'state' => $state,'category' => $category]);
            return view('needy.needyprofile', ['users' => $user,'state' => $state,'category'=>$category]);
    }
    public function Updateprofile(Request $request)
    {

        $a = $request->input('updateimage');
        if (isset($a)) {
            $image = $request->file('file');
            $file_path = 'uploads/needyprofile/';
            $Proof1_name = time() . $image->getClientOriginalName();
            $image->move($file_path, $Proof1_name);
            //update profile
            $value = session()->get('loginid');
            DB::table('tbl_login')
                ->join('tbl_register', 'tbl_register.reg_id', '=', 'tbl_login.reg_id')
                ->where(['id' => $value])
                ->update([

                    'tbl_register.image' => $Proof1_name,
                ]);

            $msg = (['message' => 'Profile Updated']);
            //load viewpage
            $value = session()->get('loginid');
            $state = DB::table('tbl_state')->get();
            $category=DB::table('tbl_category')->get();
            $user = DB::table('tbl_login')
            ->join('tbl_register', 'tbl_register.reg_id', '=', 'tbl_login.reg_id')
            ->join('tbl_panchayath', 'tbl_panchayath.panchayath_id', '=', 'tbl_register.panchayath_id')
            ->join('tbl_district', 'tbl_district.district_id', '=', 'tbl_panchayath.district_id')
            ->join('tbl_state', 'tbl_state.state_id', '=', 'tbl_district.state_id')
            ->where(['id' => $value])
            ->get();
            $u=$user[0]->user_category;
            $cate=DB::table('tbl_category')->where('category_id',$u)->get();
            $user[0]->catname=$cate[0]->categoryname;
            
            $a= $user[0]->name;
            session(['name'=>$a]);
            //return view('needy.needyprofile', ['users' => $user,'state' => $state,'category' => $category]);
            return view('needy.needyprofile', ['users' => $user,'state' => $state,'category'=>$category]);
        } else {

            //update profile
                if ($request->hasFile('file')) {
                $image = $request->file('file');
                $file_path = 'uploads/needyprofile/';
                $Proof1_name = time() . $image->getClientOriginalName();
                $image->move($file_path, $Proof1_name);
                $value = session()->get('loginid');
                DB::table('tbl_login')
                    ->join('tbl_register', 'tbl_register.reg_id', '=', 'tbl_login.reg_id')
                    ->join('tbl_panchayath', 'tbl_panchayath.panchayath_id', '=', 'tbl_register.panchayath_id')
                    ->join('tbl_district', 'tbl_district.district_id', '=', 'tbl_panchayath.district_id')
                    ->join('tbl_state', 'tbl_state.state_id', '=', 'tbl_district.state_id')
                    ->where(['id' => $value])
                    ->update([
                        'tbl_register.name' => $request->get('name'),
                        'tbl_register.addressline1' => $request->get('add1'),
                        'tbl_register.addressline2' => $request->get('add2'),
                        'tbl_register.panchayath_id' => $request->get('panchayath'),
                        'tbl_register.pincode' => $request->get('pincode'),
                        'tbl_register.phonenumber' => $request->get('phone'),
                        'tbl_register.image' => $Proof1_name,
                        'tbl_register.user_category' => $request->get('catnam'),

                    ]);

                $msg = (['message' => 'Profile Updated']);
                //load viewpage
            $value = session()->get('loginid');
            $state = DB::table('tbl_state')->get();
            $category=DB::table('tbl_category')->get();
            $user = DB::table('tbl_login')
            ->join('tbl_register', 'tbl_register.reg_id', '=', 'tbl_login.reg_id')
            ->join('tbl_panchayath', 'tbl_panchayath.panchayath_id', '=', 'tbl_register.panchayath_id')
            ->join('tbl_district', 'tbl_district.district_id', '=', 'tbl_panchayath.district_id')
            ->join('tbl_state', 'tbl_state.state_id', '=', 'tbl_district.state_id')
            ->where(['id' => $value])
            ->get();
            $u=$user[0]->user_category;
            $cate=DB::table('tbl_category')->where('category_id',$u)->get();
            $user[0]->catname=$cate[0]->categoryname;
            
            $a= $user[0]->name;
            session(['name'=>$a]);
            //return view('needy.needyprofile', ['users' => $user,'state' => $state,'category' => $category]);
            return view('needy.needyprofile', ['users' => $user,'state' => $state,'category'=>$category]);
            } else {
                //return $request->all();
                $value = session()->get('loginid');
                DB::table('tbl_login')
                    ->join('tbl_register', 'tbl_register.reg_id', '=', 'tbl_login.reg_id')
                    ->join('tbl_panchayath', 'tbl_panchayath.panchayath_id', '=', 'tbl_register.panchayath_id')
                    ->join('tbl_district', 'tbl_district.district_id', '=', 'tbl_panchayath.district_id')
                    ->join('tbl_state', 'tbl_state.state_id', '=', 'tbl_district.state_id')
                    ->where(['id' => $value])
                    ->update([
                        'tbl_register.name' => $request->get('name'),
                        'tbl_register.addressline1' => $request->get('add1'),
                        'tbl_register.addressline2' => $request->get('add2'),
                        'tbl_register.panchayath_id' => $request->get('panchayath'),
                        'tbl_register.pincode' => $request->get('pincode'),
                        'tbl_register.phonenumber' => $request->get('phone'),
                        'tbl_register.user_category' => $request->get('catnam'),

                    ]);

                $msg = (['message' => 'Profile Updated']);
                //load viewpage
            $value = session()->get('loginid');
            $state = DB::table('tbl_state')->get();
            $category=DB::table('tbl_category')->get();
            $user = DB::table('tbl_login')
            ->join('tbl_register', 'tbl_register.reg_id', '=', 'tbl_login.reg_id')
            ->join('tbl_panchayath', 'tbl_panchayath.panchayath_id', '=', 'tbl_register.panchayath_id')
            ->join('tbl_district', 'tbl_district.district_id', '=', 'tbl_panchayath.district_id')
            ->join('tbl_state', 'tbl_state.state_id', '=', 'tbl_district.state_id')
            ->where(['id' => $value])
            ->get();
            $u=$user[0]->user_category;
            $cate=DB::table('tbl_category')->where('category_id',$u)->get();
            $user[0]->catname=$cate[0]->categoryname;
            
            $a= $user[0]->name;
            session(['name'=>$a]);
            //return view('needy.needyprofile', ['users' => $user,'state' => $state,'category' => $category]);
            return view('needy.needyprofile', ['users' => $user,'state' => $state,'category'=>$category]);

            }
        }
    }
    public function historytable(Request $request)
    {
        $data = [];
        $value = session()->get('loginid');
        // $a = DB::table('tbl_casestory')
        //     ->join('tbl_transaction', 'tbl_transaction.case_id', '=', 'tbl_casestory.case_id')
                      
        //     ->where('cstatus',6) 
        //     ->orwhere('cstatus',7)           
        //     ->where('tbl_casestory.user_id', $value)
        //     ->get();
        
        $a=DB::select('select * from tbl_transaction as t,tbl_casestory as c where t.case_id=c.case_id and c.user_id='.$value.' and (c.cstatus=6 or c.cstatus=7)');
        foreach ($a as $b) {
            
            if ($b->equipmentid) {

              $n = DB::table('tbl_register')
                        ->join('tbl_login', 'tbl_login.reg_id', '=', 'tbl_register.reg_id')
                        ->join('tbl_sellers','tbl_sellers.login_id','=','tbl_login.id')
                        ->join('tbl_equipments', 'tbl_equipments.seller_id', '=', 'tbl_sellers.seller_id')
                        ->join('tbl_casestory','tbl_casestory.equipmentid','=','tbl_equipments.equipment_id')
                        ->where('equipment_id', $b->equipmentid)
                        
                        ->get();
                    $b->names = $n[0]->name;
                    $b->eqname = $n[0]->cname;
                    $b->phonenumber = $n[0]->phonenumber;
                    
                    $data[] = $b;
                    
                
                 //return ;
                //return view('needy.history',['data'=>$g]);
            } else {
                
                     $s = $a[0]->sponsor_id;
                    $n = DB::table('tbl_login')
                       
                        ->join('tbl_register', 'tbl_register.reg_id', '=', 'tbl_login.reg_id')
                        ->where('id',$s)
                        ->get();
                    $b->spnames = $n[0]->name;
                    $b->phonenumber = $n[0]->phonenumber;
                    $data[] = $b;
            }

        }
        // $data;
        //return $data;
        return view('needy.history', ['data' => $data]);
    }
    public function History(Request $request)
    {
        $data = [];
        $catg = [];
        $equip = [];
        $value = session()->get('loginid');
        $id = $request->all()['eida'];
        //$details = DB::table('tbl_casestory')->where('case_id', $id)->get();
         $details=DB::table('tbl_register')->select('casetitle','category_id','amount','tbl_register.verification_document','verification_address','edescription','tbl_casestory.updated_at','case_id','question','answer','caseimage','equipmentid')
                                 ->join('tbl_login','tbl_login.reg_id','=','tbl_register.reg_id')
                                 ->join('tbl_casestory','tbl_casestory.user_id','=','tbl_login.id')
                                 ->where('case_id', $id)
                                 ->get();
        $c = $details[0]->category_id;

        $cat = DB::table('tbl_category')->select('categoryname')->where('category_id', $c)->get();
        $catg=$cat[0]->categoryname;

        if ($details[0]->equipmentid!=null) {
            $d = $details[0]->equipmentid;
            $eq = DB::table('tbl_equipments')->select('cname')->where('equipment_id', $d)->get();
            $equip=$eq[0]->cname;
        }
        else{
        $q = $details[0]->question; //questions
        //create array of questions
        $z = explode(',', $q);

        //select questions

        foreach ($z as $w) {
            $ss = DB::table('tbl_question')->where('question_id', $w)->get();
            //push each questions to data array
            array_push($data, $ss[0]->question);
            //echo $catg;
        }

        //addin a property as questions
        $details[0]->questions = $data;
    }
        $details[0]->cat = $catg;
        $details[0]->equipname = $equip;
        return $details;
    }

}