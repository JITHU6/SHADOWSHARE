<?php

namespace App\Http\Controllers;

use App\Login;
use Auth;
use Hash;
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
                    session(['email'=>$email]);
                    session(['loginid'=>$b]);
                    session(['regid'=>$c]);
                    
                return redirect('/needyprofile');
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
                  return redirect('/sprofile');
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