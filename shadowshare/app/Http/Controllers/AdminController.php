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
        

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
       
    }
    
}