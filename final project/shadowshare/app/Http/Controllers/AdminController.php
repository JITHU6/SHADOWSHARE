<?php

namespace App\Http\Controllers;
use DB;
use App\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $users = DB::table('tbl_category')->get();
        //return  $users;  
        return view('admin.addcategory',['data' => $users ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeb(Request $request)
    {
        
         $cat= $request->get('cname');
         $catt=DB::table('tbl_category')->select('categoryname')->where('categoryname',$cat)->get();
    
     
        if ($catt->isEmpty()){
      
                DB::table('tbl_category')->insert(['categoryname' => $request->get('cname'), 'status' => 1]);
        
                return redirect('/addcategory')->with('success','Category Added');
    
         }
        else {
                return redirect('/addcategory')->with('success','Category Exists');
        }
     
    }
    public function Delete($id){

        $cat=DB::table('tbl_question')->select('tbl_question.cat_id')
                                ->join('tbl_category','tbl_category.category_id','=','tbl_question.cat_id')
                                ->where(['cat_id' => $id])
                                ->get();
                             
        if(!$cat->isEmpty()){
            return redirect('/addcategory')->with('success','Cannot delete,This category  contain Questions');
        }
        else{                    
        DB::table('tbl_category')->where('category_id', '=', $id)->delete();
        return redirect('/addcategory')->with('success','Category deleted');
    }
    }
    public function Updatecategory($id){
        $users = DB::table('tbl_category')->select('status')->get();
     foreach ($users as $users) {
         # code...
     
            if($users->status== 1){
            DB::table('tbl_category')->where('category_id', $id)->update(['status' =>0]);
            return redirect('/addcategory')->with('success','Category Updated');
            }
            elseif($users->status== 0){
                DB::table('tbl_category')->where('category_id', $id)->update(['status' =>1]);
                return redirect('/addcategory')->with('success','Category Updated');;
            }
            else {
                # code...
            }
        }
    }
  
    function viewequipdonor(){
      $data = [];
        $a = DB::table('tbl_casestory')
            ->join('tbl_transaction', 'tbl_transaction.case_id', '=', 'tbl_casestory.case_id')
            ->where('cstatus',7)
            ->get();
        foreach ($a as $b) {
            if ($b->equipmentid) {

                 $n = DB::table('tbl_equipments')
                        ->join('tbl_sellers', 'tbl_sellers.seller_id', '=', 'tbl_equipments.seller_id')
                        ->join('tbl_login', 'tbl_login.id', '=', 'tbl_sellers.login_id')
                        ->join('tbl_register', 'tbl_register.reg_id', '=', 'tbl_login.reg_id')

                        ->where('equipment_id', $b->equipmentid)
                        ->get();
                    $b->names = $n[0]->name;
                    $b->eqname = $n[0]->cname;
                    $b->phonenumber = $n[0]->phonenumber;
                    $b->email = $n[0]->email;
                     $data[] = $b;
    
                    
            }
            
     }
     return view('admin.viewequipdonor',['data'=>$data]);
    }
    function viewefunddonor(){
        $data = [];
        $a = DB::table('tbl_casestory')
            ->join('tbl_transaction', 'tbl_transaction.case_id', '=', 'tbl_casestory.case_id')
            ->where('cstatus',6)
            ->get();
        foreach ($a as $b) {
            $g = DB::table('tbl_transaction')->join('tbl_login', 'tbl_login.id', '=', 'tbl_transaction.user_id')
            ->join('tbl_casestory', 'tbl_casestory.case_id', '=', 'tbl_transaction.case_id')

            ->get();
            $s = $g[0]->sponsor_id;
            $n = DB::table('tbl_sponsors')
                ->join('tbl_login', 'tbl_login.id', '=', 'tbl_sponsors.login_id')
                ->join('tbl_register', 'tbl_register.reg_id', '=', 'tbl_login.reg_id')
            //->where('tbl_sponsors.login_id',$s)
                ->get();
            $b->names = $n[0]->name;
            $b->phonenumber = $n[0]->phonenumber;
            $b->email = $n[0]->email;
            
            
        
        $data[] = $b;
        
    }
    return view('admin.viewsponser',['data'=>$data]);
}
public function viewneedy(){
    $data = [];
    $a = DB::table('tbl_transaction')
        
        ->join('tbl_login', 'tbl_login.id', '=', 'tbl_transaction.user_id')
        ->join('tbl_register','tbl_register.reg_id','=','tbl_login.reg_id')
        ->join('tbl_casestory','tbl_casestory.case_id','=','tbl_transaction.case_id')
        ->get();
    foreach ($a as $b) {
        if ($b->equipmentid) {

        $n = DB::table('tbl_equipments')
                    ->join('tbl_sellers', 'tbl_sellers.seller_id', '=', 'tbl_equipments.seller_id')
                    ->join('tbl_login', 'tbl_login.id', '=', 'tbl_sellers.login_id')
                    ->join('tbl_register', 'tbl_register.reg_id', '=', 'tbl_login.reg_id')

                    ->where('equipment_id', $b->equipmentid)
                    ->get();
               
                 $b->eqname = $n[0]->cname;
                
                

             //return ;
            //return view('needy.history',['data'=>$g]);
        } 
        $data[] = $b;
        }
   //return $data;
    return view('admin.viewneedy', ['data' => $data]);
}
public function  userneedy()
{
    $data = DB::table('tbl_login')->select('name','email','phonenumber','dname','tbl_login.created_at')
    ->join('tbl_register','tbl_register.reg_id','=','tbl_login.reg_id')
    ->join('tbl_panchayath','tbl_panchayath.panchayath_id','=','tbl_register.panchayath_id')
    ->join('tbl_district','tbl_district.district_id','=','tbl_panchayath.district_id')
    ->join('tbl_state','tbl_state.state_id','=','tbl_district.state_id')
    ->where(['type' => 'needy']) 
    ->get(); 
    return view('admin.viewuser', ['data' => $data]);
}
public function  userfunddonor()
{
    $data = DB::table('tbl_login')->select('name','email','phonenumber','dname','tbl_login.created_at')
    ->join('tbl_register','tbl_register.reg_id','=','tbl_login.reg_id')
    ->join('tbl_panchayath','tbl_panchayath.panchayath_id','=','tbl_register.panchayath_id')
    ->join('tbl_district','tbl_district.district_id','=','tbl_panchayath.district_id')
    ->join('tbl_state','tbl_state.state_id','=','tbl_district.state_id')
    ->where(['type' => 'sponsor']) 
    ->get();
    return view('admin.viewuser', ['data' => $data]); 
}
public function  userequipment()
{
    $data = DB::table('tbl_login')->select('name','email','phonenumber','dname','tbl_login.created_at')
    ->join('tbl_register','tbl_register.reg_id','=','tbl_login.reg_id')
    ->join('tbl_panchayath','tbl_panchayath.panchayath_id','=','tbl_register.panchayath_id')
    ->join('tbl_district','tbl_district.district_id','=','tbl_panchayath.district_id')
    ->join('tbl_state','tbl_state.state_id','=','tbl_district.state_id')
    ->where(['type' => 'seller']) 
    ->get();
    return view('admin.viewuser', ['data' => $data]); 
}
}