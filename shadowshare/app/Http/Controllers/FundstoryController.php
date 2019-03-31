<?php

namespace App\Http\Controllers;
use DB;
use App\Casestory;
use Illuminate\support\facades\input;
use Illuminate\Http\Request;

class FundstoryController extends Controller
{
    
    public function categorydropdown(Request $request){
        
        $category = DB::table('tbl_category')->get();
        $eq=DB::table('tbl_equipments')->get();
        //personal detailes
        $value =session()->get('loginid');

         
         $user = DB::table('tbl_login')
                        ->select('tbl_login.email','tbl_register.name','tbl_register.phonenumber','tbl_register.image','tbl_panchayath.pname')
                        ->join('tbl_register','tbl_register.reg_id','=','tbl_login.reg_id')
                        ->join('tbl_panchayath','tbl_panchayath.panchayath_id','=','tbl_register.panchayath_id')
                        ->join('tbl_district','tbl_district.district_id','=','tbl_panchayath.district_id')
                        ->join('tbl_state','tbl_state.state_id','=','tbl_district.state_id')
                        ->where(['id' => $value])
                        ->get();   
        
        
      
        return view('needy.fstory',['data' => $category,'user' => $user,'equipment'=> $eq ]);
    }
    public function showquestions(Request $request){
             $id=$request->all()['op'];
            
            
            $category = DB::table('tbl_question')->where('cat_id',$id)->get();
            return  $category;
        
        
    }

    public function Savestorydetails(Request $request){
        $value = session()->get('loginid');
        
        $case= DB::table('tbl_casestory')->select('user_id')->where('user_id',$value)->get();
        foreach($case as $c){
            $cstory=Casestory::where(['category_id'=>$request->get('cat'),'amount'=>$request->get('amount'),'casetitle'=>$request->get('casetitle')])->get();
        
                if(count($cstory)==0){
                
                
            //get the count of questions
                $count= $request->get('count');
                //keep question and answer to array
                $questions=array();
                $answers=array();
                for($i=0;$i<$count;$i++){
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
                
                $image = $request->file('casefile');
                $file_path = 'uploads/verify/';
                $Proof1_namea = time() . $image->getClientOriginalName();                      
                $image->move($file_path, $Proof1_namea);
                
                $savecase = new Casestory([
                    'category_id'=> $request->get('cat'),
                    'user_id'=>$value ,
                    'amount'=>$request->get('amount'),
                    'equipmentid'=>$request->get('equipment'),
                    'casetitle'=>$request->get('casetitle'),
                    'caseimage'=> $Proof1_name,
                    'question'=> $q,
                    'answer'=> $a,
                    'verification_address'=>$request->get('vaddress'),
                    'verification_document'=> $Proof1_namea,
                    'status'=> 1,
                    
                ]);
                $savecase -> save();
                $request->session()->flash('message','Case Story Added!');
                return $this->categorydropdown($request);
            }
            else{
                $request->session()->flash('message','Same Case story already exists!'); 
            
                return $this->categorydropdown($request); 
            }
        }
    }
    //show story list
    public function Showstorylist(){
       $storydata= Casestory::all();
       
       return view('needy.fundraiselist',compact('storydata'));
    }
    // deatails view of each case
    public function Viewcasedetailes(Request $request){
    
        $id=$request->all()['eid'];
       $details=Casestory::where('case_id',$id)->get();
        return $details;
    }
}