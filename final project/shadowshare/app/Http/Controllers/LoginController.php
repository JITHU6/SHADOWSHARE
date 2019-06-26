<?php

namespace App\Http\Controllers;

use App\Login;
use Auth;
use Hash;
use DB;
use Illuminate\Http\Request;
use app\shadowindexController;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function Needylogin(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|max:255',
            'password' => 'required',
        ]);
        
        $email = $request->get('email');
        $password= $request->get('password');
        
        $a = Login::where('email', $email)->get();

        foreach ($a as $object) {
            $b=$object->id;
            $dbpwd_h = $object->password; //hash
            $password; //plain

            if (Hash::check($password, $dbpwd_h)) 
            {

            if($object->email=$email){
                
                $c=$object->reg_id;
                
                if($object->type == "needy"){

                $url=$request->session()->get('loginurl');
                if($url=='/eqstory')
                {
                  
                    session(['email'=>$email]);
                    session(['loginid'=>$b]);
                    session(['regid'=>$c]);
                    $s= session()->get('loginid');
                    //count of equipment request
                    $a=DB::table('tbl_register')
                    ->join('tbl_login','tbl_login.reg_id','=','tbl_register.reg_id')
                    ->join('tbl_casestory','tbl_casestory.user_id','=','tbl_login.id')
                    
                    ->join('tbl_equipments','tbl_equipments.equipment_id','=','tbl_casestory.equipmentid')
                    ->join('tbl_category','tbl_category.category_id','=','tbl_equipments.category_id')
                    
                    ->where('user_id',$s)
                    ->where('cstatus',3)
                    
                    ->get();
                    $g=count($a);
                    session(['appovedequip'=>$g]);
                     //count of approved fund
                    
                     $f= DB::select('select * from tbl_register as r,tbl_login as l,tbl_casestory as c,tbl_category as cat where r.reg_id=l.reg_id and c.user_id=l.id and cat.category_id=c.category_id and l.id='.$s.' and (c.cstatus=4 or c.cstatus=5)');
                                 $h=count($f);
                    session(['appovedfund'=>$h]);
                    //name of user
                    $user = DB::table('tbl_login')
                                        ->join('tbl_register', 'tbl_register.reg_id', '=', 'tbl_login.reg_id')
                                        ->where(['id' => $s])
                                        ->get();
                    $name= $user[0]->name;
                    session(['name'=>$name]);  
                    
                    return redirect('/eqstory');
                }
                else
                {     
                    session(['email'=>$email]);
                    session(['loginid'=>$b]);
                    session(['regid'=>$c]);
                    $s= session()->get('loginid');
                    //count of equipment request
                    
                    $a=DB::table('tbl_register')
                    ->join('tbl_login','tbl_login.reg_id','=','tbl_register.reg_id')
                    ->join('tbl_casestory','tbl_casestory.user_id','=','tbl_login.id')
                    
                    ->join('tbl_equipments','tbl_equipments.equipment_id','=','tbl_casestory.equipmentid')
                    ->join('tbl_category','tbl_category.category_id','=','tbl_equipments.category_id')
                    
                    ->where('user_id',$s)
                    ->where('cstatus',3)
                    
                    ->get();
                    $g=count($a);
                    session(['appovedequip'=>$g]);
                    //count of approved fund
                   
                    $f= DB::select('select * from tbl_register as r,tbl_login as l,tbl_casestory as c,tbl_category as cat where r.reg_id=l.reg_id and c.user_id=l.id and cat.category_id=c.category_id and l.id='.$s.' and (c.cstatus=4 or c.cstatus=5)');
                                 $h=count($f);
                    session(['appovedfund'=>$h]);
                    //session for name
                    $user = DB::table('tbl_login')
                                        ->join('tbl_register', 'tbl_register.reg_id', '=', 'tbl_login.reg_id')
                                        ->where(['id' => $s])
                                        ->get();
                    $name= $user[0]->name;
                    session(['name'=>$name]);  
                    //count of equipment request needy
                                    
                    return redirect('/needyindex');
                }
            }
            else if($object->type == "admin"){
              //  session(['email'=>$email]);
                session(['status2'=>$email]);
                return redirect('/adminindex');
            }
            else if($object->type == "seller"){
                //  session(['email'=>$email]);
                session(['seller'=>$email]);
                session(['loginida'=>$b]);
                //session of name
                $s= session()->get('loginida');
                $user = DB::table('tbl_login')
                                    ->join('tbl_register', 'tbl_register.reg_id', '=', 'tbl_login.reg_id')
                                    ->where(['id' => $s])
                                    ->get();
                $a= $user[0]->name;
                session(['name'=>$a]);
                
                  return redirect('/sprofile');
              }
              else if($object->type == "sponsor"){
                //checking for the url is same as the url aftr login for fund request
                 $url=$request->session()->get('loginurl');
                if($url=='/approvefundcase')
                {
                    session(['sponsor'=>$email]);
                    session(['loginida'=>$b]);
                    return redirect('/approvefundcase');
                }
                else
                {
                  session(['sponsor'=>$email]);
                  session(['loginida'=>$b]);
                  return redirect('/sponsorprofile');
                }   
              }
                
            }
        
            
            else{
                //return redirect('/login')->with('success','wrong username/password');
                return "aa";
            }
        } 
        }
        $msg = [
            'message' => 'Enter Correct Username And Password!',
           ];
    
       return redirect('/loginn')->with($msg);
        //return redirect('/login')->with('success','wrong username/password');
        //return redirect('/login')->back()->with('message', 'IT WORKS!');
    }
    
            
        
    
    public function logoutt() {
        session()->flush();
        //Auth::logout();
        return redirect('/loginn');
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
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function show(Login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function edit(Login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy(Login $login)
    {
        //
    }
}