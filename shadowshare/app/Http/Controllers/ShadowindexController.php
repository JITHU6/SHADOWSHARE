<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShadowindexController extends Controller
{
    public function Index(){
        return view('Pageviews.index');
    }
    public function About(){
        return view('needy.needyabout');
    }
    public function Elements(){
        return view('Pageviews.elements');
    }
    public function Needyregister(){
        return view('needy.needyregistration');
    }
    public function Login(){
        if(session()->has('email')){
            return redirect('/needyprofile');
        }
        elseif (session()->has('status2')) {
            return redirect('/adminindex');
        }else{

        return view('Pageviews.login');
    }
    }
    public function Forgotpassword(){
        return view('Pageviews.forgotpassword');
    }
    public function Needyhome(){
        return view('needy.needyhome');
    }
    public function Needymenu(){
        return view('needy.index');
    }
    public function Needyindex(){
        return view('needy.needyindex');
    }
    public function Needyprofile(){
        return view('needy.needyprofile');

    }
    public function Needyfundraiseevents(){
        return view('needy.fundraiselist');

    }
    public function Needyfundhistory(){
        return view('needy.fundhistory'); 

    }
    public function Fundstory(){
        return view('needy.fstory'); 

    }
    public function Viewstory(){
        return view('needy.viewstory'); 

    }
    public function Adminindex(){
        return view('admin.home'); 

    }
    public function Adminnav(){
        return view('admin.footer'); 

    }
    
    public function Viewsponser(){
        return view('admin.viewsponser'); 

    }
    public function Viewneedy(){
        return view('admin.viewneedy'); 

    }
    public function AddQuestion(){
        return view('admin.addquestions'); 

    }
    
}