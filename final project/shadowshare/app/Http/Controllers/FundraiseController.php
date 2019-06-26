<?php

namespace App\Http\Controllers;
use DB;
use Mail;
use App\Fundraise;
use App\crowdfunding;
use Illuminate\Http\Request;

class FundraiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.fundraising');
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
    public function save(Request $request)
    {
        
       $data=Fundraise::where('casetitle',$request['casetitle'])
                               ->where('discription',$request['discription'])                             
                               ->get();
        $c=count($data);
        if($c==0){
        $image = $request['image'];
        $file_path = 'uploads/urgentcase/';
        $Proof1_name = time().$image->getClientOriginalName();                      
        $image->move($file_path, $Proof1_name);
        
        $user= new Fundraise();
        $user->casetitle= $request['casetitle'];
        $user->discription= $request['discription'];
        $user->image= $Proof1_name;
        $user->amount= $request['amount'];
        $user->city= $request['city'];
        $user->address= $request['address'];
        $user->account= $request['account'];
        $user->status= '1';
        $request->session()->flash('message','Case advertisment added');
    // add other fields
    
        $user->save();
        return redirect()->back();
    }
    else{
        $request->session()->flash('message','Case advertisment already exists');
    // add other fields
    
        
        return redirect()->back();
    }
    }
    public function view(){
        // $data=DB::table('tbl_fundraises')->get();
        $result= DB::table('tbl_fundraises')->get();
    $i=0; 
    foreach($result as $re){
    $fid=DB::table('tbl_crowdfundings')->select('tbl_crowdfundings.amount','fname','email','created_at')
                                       ->where('fevent_id',$re->fid)
                                       ->where('status',2)
                                       ->get();
     
      
    $b=0;
    foreach($fid as $a){
         $b=$a->amount+$b;
      
    } 
    $result[$i]->amt=$b;
    $i++; 
    
    }
    
        return view('admin.viewurgentcase',['data'=>$result]);
    }
    public function updatecase(Request $request)
    {

       
        DB::table('tbl_fundraises')->where('fid',$request->all()['id'])
        ->update([
        'casetitle' => $request->all()['op1'],
        'discription' => $request->all()['op2'],
        'account' => $request->all()['op3'],
        'address' => $request->all()['op4']]);

        $f=DB::table('tbl_fundraises')->get();
        return $f;
    }
    public function updatestatus($id){
        
    $users = DB::table('tbl_fundraises')->select('status')->where('fid',$id)->get();
     foreach ($users as $users) {
         # code...
     
            if($users->status== 1){
            DB::table('tbl_fundraises')->where('fid', $id)->update(['status' =>0]);
            return redirect()->back()->with('success','Case event deactivated');
            }
            elseif($users->status== 0){
                DB::table('tbl_fundraises')->where('fid', $id)->update(['status' =>1]);
                return redirect()->back()->with('success','Case event activated');;
            }
           
        }
    }
    public function fundraise(){

        
        
    $result= DB::table('tbl_fundraises')->where('status',1)->get();
    $i=0; 
    foreach($result as $re){
    $fid=DB::table('tbl_crowdfundings')->select('tbl_crowdfundings.amount','fname','email','created_at')
                                       ->where('fevent_id',$re->fid)
                                       ->where('status',2)
                                       ->get();
     
      
    $b=0;
    foreach($fid as $a){
         $b=$a->amount+$b;
      
    } 
    $result[$i]->amt=$b;
    $i++; 
    
    }
    
    return view('Pageviews.fundraise',['data'=>$result]);
    }
    public function donationform($id){

        $state = DB::table('tbl_state')->get();
        $a=DB::table('tbl_fundraises')->where('fid',$id)->get();
         return view('Pageviews.donationform',['state'=>$state,'data'=>$a]);
     }
     public function donationpayment(){

       
     
        return view('Pageviews.donationpayment');
    }
    public function savedonors(Request $request){
       
        $donor = new crowdfunding([
            
            'fevent_id'=>$request->get('fid'),
            'country'=> $request->get('country'),
            'city'=> $request->get('city'),
            'state_id'=> $request->get('state'),
            'fname'=> $request->get('firstname'),
            'lname'=> $request->get('lastname'),
            'email'=> $request->get('email'),
            'occupation'=> $request->get('occu'),
            'phone'=> $request->get('phone'),
            'add1'=> $request->get('address1'),
            'add2'=> $request->get('address2'),
            'amount'=> $request->get('amount'),
            'status'=> 1,
        ]);
        
        $donor-> save();
        $id=DB::getPdo()->lastInsertId();
        $request->session()->flash('message','Please Make payment in the next step');
        $a=DB::table('tbl_crowdfundings')->where('d_id',$id)->get();
        return view('Pageviews.donationpayment',['data'=>$a]);
    }
    public function Donationtransaction(Request $request){

        $banktype=$request->get('banktype');
        $cardnumber=$request->get('cardnumber');
        $month=$request->get('month');
        $year=$request->get('year');
        $cardCVV=$request->get('cardCVV');
        $holdername=$request->get('holdername');
        $c=$request->get('user');
        
        $account=DB::table('tbl_bank')->where(['banktype'=>$banktype,'card_no'=>$cardnumber,'month'=>$month,'year'=>$year,'cvv'=>$cardCVV,'name'=>$holdername])->get();
        if(count($account)){
            $result=[];
            DB::table('tbl_crowdfundings')->where(['d_id'=>$c])->update(['status'=>2]); 
           
            $request->session()->flash('message','Payment Success !');
            
            $result= DB::table('tbl_fundraises')->where('status',1)->get();
            //send email to the donor
            $fid=DB::table('tbl_crowdfundings')
            ->where('d_id',$c)
            ->get();
                        
            $mail=$fid[0]->email;                                 
            $name=$fid[0]->fname;
            $amount=$fid[0]->amount; 
            $date=$fid[0]->created_at;    
             try{                                  
            $data = [
                'name'=>$name,
                'amount'=>$amount,
                'date'=>$date
                ];
                Mail::send('Pageviews.donormail', $data, function ($message) use ($mail) {
                $message->to($mail)->subject('Fund Donate Successfully')->from('support@shadowshare.com');
                });
            } catch (\Exception $e) {
                return back()->with('warning', $e)->with('warning', 'Network error!');
            }   
            //calculate amount raised per event 
            $i=0; 
            foreach($result as $re){
            $fid=DB::table('tbl_crowdfundings')->select('tbl_crowdfundings.amount','fname','email','created_at')
                                               ->where('fevent_id',$re->fid)
                                               ->where('status',2)
                                               ->get();
             
              
            $b=0;
            foreach($fid as $a){
                 $b=$a->amount+$b;
              
            } 
            $result[$i]->amt=$b;
            $i++; 
            
            }
            
            return view('Pageviews.fundraise',['data'=>$result]);
        }
        
    
        else{
            
            $request->session()->flash('message','Invalid account details!');
            $result =[];
            $result= DB::table('tbl_fundraises')->where('status',1)->get();
            $i=0;
            foreach($result as $re){
            $fid=DB::table('tbl_crowdfundings')->select('tbl_crowdfundings.amount')
                                               ->where('fevent_id',$re->fid)
                                               ->where('status',2)
                                               ->get();
            $b=0;
            foreach($fid as $a){
                 $b=$a->amount+$b;
              
            } 
            $result[$i]->amt=$b;
            $i++; 
            
            }
            return view('Pageviews.fundraise',['data'=>$result]);
        }
        
        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Fundraise  $fundraise
     * @return \Illuminate\Http\Response
     */
    public function deleteurgent($id)
    {
        DB::table('tbl_fundraises')->where('fid',$id)->delete();
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fundraise  $fundraise
     * @return \Illuminate\Http\Response
     */
    public function edit(Fundraise $fundraise)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fundraise  $fundraise
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fundraise  $fundraise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fundraise $fundraise)
    {
        //
    }
}