<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use DB;
class ShadowindexController extends Controller
{
    public function Index(){
        return view('Pageviews.index');
    }
    public function About(){
        return view('Pageviews.about-us');
    }
    public function contactus(){
        return view('Pageviews.contact');
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
    
    public function feedback(Request $request){

        $name=$request->get('yourname');
        $email=$request->get('youremail');
        $phone=$request->get('yourphone');
        $subject=$request->get('yoursubject');
        $messagea=$request->get('yourmessage');
        try{
        $data = [
            'name'=>$name,
            'messages'=>$messagea,
            'phone'   =>$phone
        ];
        Mail::send('Pageviews.feedbackmail', $data, function ($message) use ($email,$subject) {
            $message->to($email)->subject($subject)->from('support@shadowshare.com');
        });
    
        $request->session()->flash('message','Thank you for the response and we will get back to you very soon,Have a nice day !');
        return view('Pageviews.index'); 
    }catch (\Exception $e) {
        return back()->with('warning', $e)->with('warning', 'Network error!');
    }
        
    }
    public function contact(Request $request){

      
        $name=$request->get('yourname');
        $email=$request->get('youremail');
        $phone=$request->get('yourphone');
        $subject=$request->get('yoursubject');
        $messagea=$request->get('yourmessage');
        try{
        $data = [
            'name'=>$name,
            'messages'=>$messagea,
            'phone'   =>$phone
        ];
        Mail::send('Pageviews.feedbackmail', $data, function ($message) use ($email,$subject) {
            $message->to($email)->subject($subject)->from('support@shadowshare.com');
        });
        
    
        $request->session()->flash('message','Thank you for the response and we will get back to you very soon,Have a nice day !');
        return view('Pageviews.contact'); 
    } catch (\Exception $e) {
        return back()->with('warning', $e)->with('warning', 'Network error!');
    }
}
    //view equipments by the user
    public function viewequipments(){

        $dataa = [];
        $a=DB::table('tbl_equipments')->where('estatus',1)->orwhere('estatus',2)->get();
        //return $a;
        $i=0;
        foreach($a as $cat)
        {
            
            $b=$cat->category_id;
            $catname=DB::table('tbl_category')->where('category_id',$b)->get();
             
            // array_push($dataa, $catname[$i]->categoryname);
            $a[$i]->categoryname=$catname[0]->categoryname;
            //$f=implode(',',$dataa);
            $i++;    
        }
        
        return view('Pageviews.viewdonateequipment',['a'=>$a]);
        
    }
    public function Donateindividual(){

        $a=DB::table('tbl_register')
        ->join('tbl_login','tbl_login.reg_id','=','tbl_register.reg_id')
        ->join('tbl_casestory','tbl_casestory.user_id','=','tbl_login.id')
        ->join('tbl_category','tbl_category.category_id','=','tbl_casestory.category_id')
        ->where('cstatus',1)
        ->get();

        return view('Pageviews.viewindividualneedy',['a'=>$a]);
    }

    //login to item page
    public function individual(Request $request){
        
       $id= $request->get('case_id');
        
       session(['caseid'=>$id]);
       session(['loginurl'=>'/approvefundcase']);//goto login page
       return redirect('/loginn');
    }
    public function itemrequest(Request $request){
        
        $eid= $request->get('eid');
        $cid= $request->get('cid');
        session(['equipid'=>$eid]);
         session(['catid'=>$cid]);
         $c=session()->get('catid');
         $cname=DB::table('tbl_category')->select('categoryname')->where('category_id',$c)->get();
        session(['catname'=>$cname[0]->categoryname]);
        session(['loginurl'=>'/eqstory']);//goto login page
        return redirect('/loginn');
     }
     public function test(){

        $s=session()->get('loginida');

        
       $a=DB::table('tbl_register')
                                    ->join('tbl_login','tbl_login.reg_id','=','tbl_register.reg_id')
                                    ->join('tbl_sellers','tbl_sellers.login_id','=','tbl_login.id')                               
                                    ->join('tbl_equipments','tbl_equipments.seller_id','=','tbl_sellers.seller_id')
                                    ->join('tbl_casestory','tbl_casestory.equipmentid','=','tbl_equipments.equipment_id')                                   
                                    ->join('tbl_category','tbl_category.category_id','=','tbl_casestory.category_id')  
                                    ->where('tbl_sellers.login_id',14)
                                    ->where('tbl_equipments.cname', 'LIKE', '%w%')
                                    ->where('tbl_casestory.cstatus',3 )
                                    ->orwhere('tbl_casestory.cstatus',7)                                
                                    ->get();
                                    return $a;
     }
     public function Viewcasedetailes(Request $request){
    
        $c = 5;
       return $a=DB::table('tbl_register')->select('tbl_register.name','tbl_register.user_category','tbl_register.verification_document','tbl_casestory.verification_address','tbl_casestory.question','tbl_casestory.created_at')
        ->join('tbl_login','tbl_login.reg_id','=','tbl_register.reg_id')
        ->join('tbl_casestory','tbl_casestory.user_id','=','tbl_login.id')
        ->join('tbl_category','tbl_category.category_id','=','tbl_casestory.category_id')
        ->where('case_id',$c)
        ->get();
    }
}