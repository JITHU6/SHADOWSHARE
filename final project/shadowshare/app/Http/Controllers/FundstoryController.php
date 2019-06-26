<?php

namespace App\Http\Controllers;
use DB;
use App\Casestory;
use Illuminate\support\facades\input;
use Illuminate\Http\Request;
use Response;
class FundstoryController extends Controller
{
    
    public function categorydropdown(Request $request){
        
       // $category = DB::table('tbl_category')->get();
        
        //personal detailes
        $value =session()->get('loginid');

        $user = DB::table('tbl_login')
                    ->select('tbl_login.email','tbl_register.name','tbl_register.phonenumber','tbl_register.image','tbl_panchayath.pname','tbl_register.user_category','tbl_register.verification_document')
                    ->join('tbl_register','tbl_register.reg_id','=','tbl_login.reg_id')
                    ->join('tbl_panchayath','tbl_panchayath.panchayath_id','=','tbl_register.panchayath_id')
                    ->join('tbl_district','tbl_district.district_id','=','tbl_panchayath.district_id')
                    ->join('tbl_state','tbl_state.state_id','=','tbl_district.state_id')
                    ->where(['id' => $value])
                    ->get();   
        //category of user
        $eq=DB::table('tbl_category')->where('category_id',$user[0]->user_category)->get();
        $user[0]->user_categoryname=$eq[0]->categoryname;
        $user[0]->user_categoryid=$eq[0]->category_id;
        $b=$user[0]->user_category;
        //user questions
        $qus=DB::table('tbl_question')->where('cat_id',$b)->get();
        //image
        
      //$im=DB::table('tbl_casestory')->select('verification_document')->where('user_id',$value)->latest()->first();
        return view('needy.fstory',['user' => $user,'equipment'=> $eq,'question'=>$qus ]);
    }
    public function showquestions(Request $request){
             $id=$request->all()['op'];
            
            $category = DB::table('tbl_question')->where('cat_id',$id)->get();
            return  $category;
        
    }

    public function Savestorydetails(Request $request){
        
        $value = session()->get('loginid');
          //return $request->get('cataid');
        //     $case= DB::table('tbl_casestory')->select('user_id')->where('user_id',$value)->get();
        
        //    if(count($case)>0){
    
            $cstory=Casestory::where(['user_id'=>$value,'category_id'=>$request->get('cataid'),'amount'=>$request->get('amount'),'casetitle'=>$request->get('casetitle')])->get();
            if(count($cstory)==0)
            {
                //return  1;
                //get the count of questions
                $count= $request->get('count');
                //keep question and answer to array
                $questions=array();
                $answers=array();
                for($i=1;$i<$count;$i++){
                    $questions[$i]=$request->get('question'.$i);
                    $answers[$i]=$request->get('answer'.$i);
                // return $questions[$i];
                }
                //convert array to string
                $q=implode(',',$questions);
                $a=implode(',',$answers);
                //insert to table
                $image = $request->file('file');
                $file_path = 'uploads/caseimage/';
                $Proof1_name = time() . $image->getClientOriginalName();                      
                $image->move($file_path, $Proof1_name);
               if($request->hasfile('casefile')){
                $image = $request->file('casefile');
                $file_path = 'uploads/verify/';
                $Proof1_namea = time() . $image->getClientOriginalName();                      
                $image->move($file_path, $Proof1_namea);
                
                $savecase = new Casestory([
                    'category_id'=> $request->get('cataid'),
                    'user_id'=>$value ,
                    'amount'=>$request->get('amount'),
                    'equipmentid'=>$request->get('equipment'),
                    'casetitle'=>$request->get('casetitle'),
                    'caseimage'=> $Proof1_name,
                    'question'=> $q,
                    'answer'=> $a,
                    'verification_address'=>$request->get('vaddress'),
                    
                    'cstatus'=> 1,
                    
                ]);
                $savecase -> save();
                DB::table('tbl_register')->join('tbl_login','tbl_login.reg_id','=','tbl_register.reg_id')->where('id',$value)->update(['verification_document'=>$Proof1_namea]);
                $request->session()->flash('message','Case Story Added!');
                return redirect()->back();
                }
                else{
                    $savecase = new Casestory([
                        'category_id'=> $request->get('cataid'),
                        'user_id'=>$value ,
                        'amount'=>$request->get('amount'),
                        'equipmentid'=>$request->get('equipment'),
                        'casetitle'=>$request->get('casetitle'),
                        'caseimage'=> $Proof1_name,
                        'question'=> $q,
                        'answer'=> $a,
                        'verification_address'=>$request->get('vaddress'),
                        
                        'cstatus'=> 1,
                        
                    ]);
                    $savecase -> save();
                    
                    $request->session()->flash('message','Case Story Added!');
                    return redirect()->back();

                }
            }
        
            else{
                 
                $request->session()->flash('message','Same Case story already exists!'); 
                
                return redirect()->back();
                //return $this->categorydropdown($request); 
            }
        
    }
    //show story list
    public function Showstorylist(){
     $value = session()->get('loginid');
     $storydata= DB::table('tbl_casestory')->where('user_id',$value)->get();
    
       $i=0;
        foreach($storydata as $cat)
         {
        
             if($cat->equipmentid != null){
                 $cat->equipmentid;
                 $b= $cat->equipmentid;
             $catname=DB::table('tbl_casestory')->join('tbl_equipments','tbl_equipments.equipment_id','=','tbl_casestory.equipmentid')->where('equipmentid',$b)->get();
             $storydata[$i]->cname=$catname[0]->cname;
       
             }
                      $i++;
         }
        //return $storydata;
    //return $storydata;
    return view('needy.fundraiselist',['storydata'=>$storydata]);
     
    }
    // deatails view of each case
    public function Viewcasedetailes(Request $request){
    
        //$id = 23;
        //empty array
         $data = [];
         $catg = [];
         $equip = [];
         $veriimage=[];
         //$ans=[];
        $id=$request->all()['eid'];
         $details=DB::table('tbl_casestory')->where('case_id',$id)->get();
         
        $c=$details[0]->category_id;
        $v=$details[0]->user_id;
        //get verification image
        $userverification=DB::table('tbl_login')
                                                ->join('tbl_register','tbl_register.reg_id','=','tbl_login.reg_id')
                                                ->where('id',$v)
                                                ->get();
                                                if(sizeof($userverification)){
                                                    $veriimage= $userverification[0]->verification_document;
                                                }
         
         //get category name
        $cat = DB::table('tbl_category')->select('categoryname')->where('category_id',$c)->get();
        if(sizeof($cat)){
        $catg=$cat[0]->categoryname;
        }
       //get equipmentname
        if($details[0]->equipmentid != null){
            $d=$details[0]->equipmentid;
            $eq = DB::table('tbl_equipments')->select('cname')->where('equipment_id',$d)->get();
            
            $equip=$eq[0]->cname;
           
        }else{
            $q=$details[0]->question; //questions
            $g=$details[0]->answer; 
            //create array of questions
            $z=explode(',',$q);
             $k=explode(',',$g);
            //select answer
            
            //select questions
            
            foreach($z as $w)
            {
                $ss = DB::table('tbl_question')->where('question_id',$w)->get();
                //push each questions to data array
                array_push($data, $ss[0]->question);     
                //echo $catg;  
            }
            
            //addin a property as questions
            $details[0]->questions = $data;
            //$details[0]->ans = $ans;
        }
        
        $details[0]->cat = $catg;
        $details[0]->equipname = $equip;
        $details[0]->veri = $veriimage;
        return $details;  
   
    }

    public function Getquestions(){
        //return 1;
        $s=$request->all()['qid'];
        
        //return $s;
   
        $q=Question::where('question_id',$s[$i])->get();
        return $q;

    }
    public function Removecase(Request $request,$case_id){

        $a=DB::table('tbl_casestory')->where('case_id',$case_id)->delete();
        $request->session()->flash('message','Case Story Removed!'); 
        return redirect()->back();

        $a=$request->get('case_id');
        
        DB::table('tbl_casestory')->where('case_id',$a)->update(['cstatus'=>4]);
    }
    public function Approvedfund(Request $request)
    {
        // $a=DB::table('tbl_register')
        //                          ->join('tbl_login','tbl_login.reg_id','=','tbl_register.reg_id')
        //                          ->join('tbl_casestory','tbl_casestory.user_id','=','tbl_login.id')
        //                          ->join('tbl_category','tbl_category.category_id','=','tbl_casestory.category_id')
                                 
        //                          ->where('cstatus',4)
        //                          ->orwhere('cstatus',5)
        //                          ->get();
        //                          $c=count($a);
        //                             session(['appovedfund'=>$c]);
        $s= session()->get('loginid');
        $a= DB::select('select * from tbl_register as r,tbl_login as l,tbl_casestory as c,tbl_category as cat where r.reg_id=l.reg_id and c.user_id=l.id and cat.category_id=c.category_id and l.id='.$s.' and (c.cstatus=4 or c.cstatus=5)');
    //     $a= DB::table('tbl_sponsorhistory')
                                
    //                                     ->join('tbl_casestory','tbl_casestory.case_id','=','tbl_sponsorhistory.case_id')                                        
    //                                     ->join('tbl_category','tbl_category.category_id','=','tbl_casestory.category_id')
    //                                     ->where('tbl_casestory.user_id',$s) 
    //                                    // ->where('cstatus',4)                   
    //                                     ->get();       
    //    $b=DB::table('tbl_register')
    //                               ->join('tbl_login','tbl_login.reg_id','=','tbl_register.reg_id')
    //                               ->where('id',$a[0]->user_id)
    //                               ->get();
    //                              $a[0]->name=$b[0] ->name; 
                                    
        return view('needy.fundapproved',['a'=>$a]);
        
    }
    public function confirmpay(Request $request){
        $a=$request->get('case_id');
       
        DB::table('tbl_casestory')->where('case_id',$a)->update(['cstatus'=>5]);
       
        //$request->session()->flash('message','Equipment Request approved !');
        return redirect()->back()->with('message','Fund Request confirmed !');
        
    }
    
}