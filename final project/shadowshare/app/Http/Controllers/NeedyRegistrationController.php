<?php

namespace App\Http\Controllers;
use Hash;
use App\NeedyRegistration;
use Illuminate\Http\Request;
use App\Login;
use DB;

class NeedyRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=DB::table('tbl_category')->get();
        
        $state = DB::table('tbl_state')->get(); 
        $url=session()->get('catname');
        if($url==''){
        return view('needy.needyregistration',['state' => $state,'category'=>$category]);
    }
    else{
        $a=session()->get('catname');
        return view('needy.needyregistration',['state' => $state,'a'=>$a]);
    }
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
            
            
            'email' => 'unique:tbl_login',
            
            
        ]);
        
        
         
        $reg = new NeedyRegistration([
            'name'=> $request->get('name'),
            'user_category'=>$request->get('catname'),
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
            'type'=> 'needy',
            'status'=>1,
        ]);
        
        $log-> save();
       $ms=[
           'message'=> 'Account created!'
       ];
        return redirect('/loginn')->with($ms);
    }
    public function distajax($id)
    {
        // $subcat = DB::table("tbl_subcat")->where("cat_id",$id)->pluck("catagory","Cat_id");
        $dist = DB::table('tbl_district')->where("state_id",$id)->get()->toJson();
        return $dist;
    }

    public function cityajax($id)
    {
        // $subcat = DB::table("tbl_subcat")->where("cat_id",$id)->pluck("catagory","Cat_id");
        $city =  DB::table('tbl_panchayath')->where("district_id",$id)->get()->toJson();
        return $city;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\NeedyRegistration  $needyRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(NeedyRegistration $needyRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NeedyRegistration  $needyRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(NeedyRegistration $needyRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NeedyRegistration  $needyRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NeedyRegistration $needyRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NeedyRegistration  $needyRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(NeedyRegistration $needyRegistration)
    {
        //
    }
}