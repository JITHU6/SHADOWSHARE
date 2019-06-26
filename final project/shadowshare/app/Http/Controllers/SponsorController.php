<?php

namespace App\Http\Controllers;

use App\Login;
use App\NeedyRegistration;
use App\Sponsor;
use DB;
use Hash;
use Illuminate\Http\Request;
use Mail;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function Register()
    {
        $state = DB::table('tbl_state')->get();
        return view('sponsor.sponsorregister', ['state' => $state]);
    }

    public function profile()
    {
        $value = session()->get('loginida');

        $state = DB::table('tbl_state')->get();

        $user = DB::table('tbl_sponsors')
            ->join('tbl_login', 'tbl_login.id', '=', 'tbl_sponsors.login_id')
            ->join('tbl_register', 'tbl_register.reg_id', '=', 'tbl_login.reg_id')
            ->join('tbl_panchayath', 'tbl_panchayath.panchayath_id', '=', 'tbl_register.panchayath_id')
            ->join('tbl_district', 'tbl_district.district_id', '=', 'tbl_panchayath.district_id')
            ->join('tbl_state', 'tbl_state.state_id', '=', 'tbl_district.state_id')
            ->where(['login_id' => $value])
            ->get();

        return view('sponsor.profile', ['state' => $state], ['users' => $user]);
    }
    public function Updateprofile(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|max:50|string',
        //     'add1' => 'required|max:100',
        //     'add2' => 'required|max:100',
        //     'state' => 'required',
        //     'district'=> 'required',
        //     'panchayath' => 'required',
        //     'pincode' => 'required||numeric|',
        // ]);
        //image

        //return $value;

        //update profile

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/sponsorprofile');

            $image->move($destinationPath, $name);

            //Image::make($image)->resize(600, 600)->save($a);
            $value = session()->get('loginida');
            DB::table('tbl_login')
                ->join('tbl_register', 'tbl_register.reg_id', '=', 'tbl_login.reg_id')
                ->join('tbl_panchayath', 'tbl_panchayath.panchayath_id', '=', 'tbl_register.panchayath_id')
                ->join('tbl_district', 'tbl_district.district_id', '=', 'tbl_panchayath.district_id')
                ->join('tbl_state', 'tbl_state.state_id', '=', 'tbl_district.state_id')
                ->where(['id' => $value])
                ->update([
                    'tbl_register.name' => $request->get('name'),
                    'tbl_register.addressline1' => $request->get('add1'),
                    'tbl_register.addressline2' => $request->get('add2'),
                    'tbl_register.panchayath_id' => $request->get('panchayath'),
                    'tbl_register.pincode' => $request->get('pincode'),
                    'tbl_register.phonenumber' => $request->get('phone'),
                    'tbl_register.image' => $name,

                ]);

            // $user = DB::table('tbl_login')
            // ->join('tbl_register','tbl_register.reg_id','=','tbl_login.reg_id')
            // ->join('tbl_panchayath','tbl_panchayath.panchayath_id','=','tbl_register.panchayath_id')
            // ->join('tbl_district','tbl_district.district_id','=','tbl_panchayath.district_id')
            // ->join('tbl_state','tbl_state.state_id','=','tbl_district.state_id')
            // ->where(['id' => $value])
            // ->get();

            // $state = DB::table('tbl_state')->get();
            //$msg=(['message' => 'Profile Updated']);
            $request->session()->flash('message', 'Profile Updated!');
            return redirect()->back();
            //return view('sponsor.profile',['users' => $user ],['state'=>$state]);
        } else {
            $value = session()->get('loginida');
            // return $request->all();
            DB::table('tbl_login')
                ->join('tbl_register', 'tbl_register.reg_id', '=', 'tbl_login.reg_id')
                ->join('tbl_panchayath', 'tbl_panchayath.panchayath_id', '=', 'tbl_register.panchayath_id')
                ->join('tbl_district', 'tbl_district.district_id', '=', 'tbl_panchayath.district_id')
                ->join('tbl_state', 'tbl_state.state_id', '=', 'tbl_district.state_id')
                ->where(['id' => $value])
                ->update([
                    'tbl_register.name' => $request->get('name'),
                    'tbl_register.addressline1' => $request->get('add1'),
                    'tbl_register.addressline2' => $request->get('add2'),
                    'tbl_register.panchayath_id' => $request->get('panchayath'),
                    'tbl_register.pincode' => $request->get('pincode'),
                    'tbl_register.phonenumber' => $request->get('phone'),

                ]);

            // $user = DB::table('tbl_login')
            // ->join('tbl_register','tbl_register.reg_id','=','tbl_login.reg_id')
            // ->join('tbl_panchayath','tbl_panchayath.panchayath_id','=','tbl_register.panchayath_id')
            // ->join('tbl_district','tbl_district.district_id','=','tbl_panchayath.district_id')
            // ->join('tbl_state','tbl_state.state_id','=','tbl_district.state_id')
            // ->where(['id' => $value])
            // ->get();

            // $state = DB::table('tbl_state')->get();
            //$msg=(['message' => 'Profile Updated']);
            $request->session()->flash('message', 'Profile Updated!');
            return redirect()->back();

        }

    }
    public function Viewneedy()
    {

        $a = DB::table('tbl_register')
            ->join('tbl_login', 'tbl_login.reg_id', '=', 'tbl_register.reg_id')
            ->join('tbl_casestory', 'tbl_casestory.user_id', '=', 'tbl_login.id')
            ->join('tbl_category', 'tbl_category.category_id', '=', 'tbl_casestory.category_id')
            ->where('cstatus', 1)
            ->get();

        return view('sponsor.viewneedy', ['a' => $a]);
    }
    public function Viewmodalneedy(Request $request)
    {

        $c = $request->all()['eid'];
        $data = [];
        //$c=2;
        $a = DB::table('tbl_register')->select('tbl_register.name', 'tbl_register.user_category', 'tbl_register.verification_document', 'tbl_casestory.verification_address', 'tbl_casestory.question', 'tbl_casestory.answer', 'tbl_casestory.created_at', 'tbl_category.categoryname', 'tbl_casestory.caseimage', 'tbl_casestory.case_id')
            ->join('tbl_login', 'tbl_login.reg_id', '=', 'tbl_register.reg_id')
            ->join('tbl_casestory', 'tbl_casestory.user_id', '=', 'tbl_login.id')
            ->join('tbl_category', 'tbl_category.category_id', '=', 'tbl_casestory.category_id')
            ->where('case_id', $c)
            ->get();

        $q = $a[0]->question; //questions
        //create array of questions
        $z = explode(',', $q);

        //select questions

        foreach ($z as $w) {
            $ss = DB::table('tbl_question')->where('question_id', $w)->get();
            //push each questions to data array
            array_push($data, $ss[0]->question);
            //echo $catg;
        }

        $a[0]->questions = $data;

        return $a;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50|string',
            'add1' => 'required|max:100',
            'add2' => 'required|max:100',
            'state' => 'required',
            'district' => 'required',
            'panchayath' => 'required',
            'pincode' => 'required||numeric|',
            'phone' => 'required|regex:/[0-9]{9}/',
            'password' => 'required|string|min:3',

            'email' => 'required|string|email|max:255|unique:tbl_login',

        ]);

        $reg = new NeedyRegistration([
            'name' => $request->get('name'),
            'addressline1' => $request->get('add1'),
            'addressline2' => $request->get('add2'),
            'panchayath_id' => $request->get('panchayath'),
            'pincode' => $request->get('pincode'),
            'phonenumber' => $request->get('phone'),
            'status' => 1,

        ]);
        $reg->save();
        $log = new Login([

            'reg_id' => DB::getPdo()->lastInsertId(),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'type' => 'sponsor',
            'status' => 1,
        ]);

        $log->save();
        $log = new Sponsor([

            'login_id' => DB::getPdo()->lastInsertId(),

            'sstatus' => 1,
        ]);

        $log->save();
        $ms = [
            'message' => 'Account Created!',
        ];
        return redirect('/loginn')->with($ms);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function approvefundcase(Request $request)
    {
        $a = $request->get('case_id');

        if (!$a) {
            $a = $request->session()->get('caseid');
            $s = $request->session()->get('loginida');

            DB::table('tbl_sponsorhistory')->insert(['sponsor_id' => $s, 'case_id' => $a, 'status' => 1]);

            DB::table('tbl_casestory')->where('case_id', $a)->update(['cstatus' => 4]);

            //send mail to needy
            $z = DB::table('tbl_casestory')->join('tbl_login', 'tbl_login.id', '=', 'tbl_casestory.user_id')
                ->join('tbl_register', 'tbl_register.reg_id', '=', 'tbl_login.reg_id')
                ->where('case_id', $a)
                ->get();

            $mail = $z[0]->email;
            $amount = $z[0]->amount;
            //$ename= $f[0]->cname;
            //$ename = $h[0]->cname;
            try {
                $data = [
                    'name' => $name,
                    'ename' => $amount,
                ];
                Mail::send('sponsor.approvalmail', $data, function ($message) use ($mail) {
                    $message->to($mail)->subject('Fund request approved Successfully')->from('support@shadowshare.com');
                });
            } catch (\Exception $e) {
                return back()->with('warning', $e)->with('warning', 'Network error!');
            }
            //$request->session()->flash('message','Equipment Request approved !');
            return redirect('/approvedfundcase')->with('message', 'Fund Request approved !');

        }

        $s = $request->session()->get('loginida');

        DB::table('tbl_sponsorhistory')->insert(['sponsor_id' => $s, 'case_id' => $a, 'status' => 1]);

        DB::table('tbl_casestory')->where('case_id', $a)->update(['cstatus' => 4]);
        //send mail to needy
        $z = DB::table('tbl_casestory')->join('tbl_login', 'tbl_login.id', '=', 'tbl_casestory.user_id')
            ->join('tbl_register', 'tbl_register.reg_id', '=', 'tbl_login.reg_id')
            ->where('case_id', $a)
            ->get();

        $mail = $z[0]->email;
        $amount = $z[0]->amount;
        $name = $z[0]->name;
        //$ename = $h[0]->cname;

        $data = [
            'name' => $name,
            'ename' => $amount,
        ];

        Mail::send('sponsor.approvalmail', $data, function ($message) use ($mail) {

            $message->to($mail)->subject('Fund request approved Successfully')->from('support@shadowshare.com');
        });
        //return 1;

        //$request->session()->flash('message','Equipment Request approved !');
        return redirect()->back()->with('message', 'Fund Request approved !');
    }
    public function Approvedfundcase(Request $request)
    {
        $s = session()->get('loginida');
        $sp = DB::table('tbl_sponsorhistory')
            ->join('tbl_casestory', 'tbl_casestory.case_id', '=', 'tbl_sponsorhistory.case_id')
            ->where('sponsor_id', $s)
            ->where('status',1)
            ->get();
        //return $sp;
        $c = count($sp);
        
        if ($c > 0) {
            foreach ($sp as $spp) {
            
            $r=$spp->user_id ;
            $a = DB::select('select * from tbl_register as r,tbl_login as l,tbl_casestory as c,tbl_category as cat  where r.reg_id=l.reg_id and c.user_id=l.id and cat.category_id=c.category_id and  l.id=' . $r . ' and (c.cstatus=4 or c.cstatus=5)');
             //$a = DB::select('select * from tbl_register as r,tbl_login as l,tbl_casestory as c,tbl_category as cat,tbl_sponsorhistory as s where r.reg_id=l.reg_id and c.user_id=l.id and cat.category_id= c.category_id and l.id=24 and (c.cstatus=4 or c.cstatus=5)');
    
             // $a=DB::table('tbl_register')
                //                          ->join('tbl_login','tbl_login.reg_id','=','tbl_register.reg_id')
                //                          ->join('tbl_casestory','tbl_casestory.user_id','=','tbl_login.id')

                //                          ->join('tbl_category','tbl_category.category_id','=','tbl_casestory.category_id')
                //                          ->where('id',$spp->user_id)
                //                         // ->where('cstatus',5)
                //                          ->where('cstatus',4)
                //                          ->get();
                //return $a;
                return view('sponsor.approvedrequest', ['a' => $a]);
            }
        } else {
            $request->session()->flash('message', 'no items approved !');

            return view('sponsor.approvedrequest');
        }
        //

    }
    public function Payment(Request $request)
    {
        //rturn view('sponsor.approvedrequest');
        $a = $request->get('case_id');

        $b = DB::table('tbl_casestory')
            ->join('tbl_login', 'tbl_login.id', '=', 'tbl_casestory.user_id')
            ->join('tbl_register', 'tbl_register.reg_id', '=', 'tbl_login.reg_id')
            ->where('case_id', $a)
            ->where(['cstatus' => 5])
            ->get();
        //$request->session()->flash('message','Equipment Request approved !');
        //return redirect()->back()->with('message','Fund Request approved !');

        return view('sponsor.paymenta', ['payment' => $b]);
    }
    public function Transaction(Request $request)
    {

        $banktype = $request->get('banktype');
        $cardnumber = $request->get('cardnumber');
        $month = $request->get('month');
        $year = $request->get('year');
        $cardCVV = $request->get('cardCVV');
        $holdername = $request->get('holdername');
        $s = session()->get('loginida');
        $a = $request->get('price');
        $b = $request->get('user');
        $c = $request->get('case_id');
        $account = DB::table('tbl_bank')->where(['banktype' => $banktype, 'card_no' => $cardnumber, 'month' => $month, 'year' => $year, 'cvv' => $cardCVV, 'name' => $holdername])->get();
        if (count($account)) {
            $t = DB::table('tbl_transaction')->select('user_id', 'sponsor_id', 'case_id', 'amount')->where(['user_id' => $b, 'sponsor_id' => $s, 'case_id' => $c, 'amount' => $a])->get();
            if (!count($t)) {
                DB::table('tbl_transaction')->insert(['user_id' => $b, 'sponsor_id' => $s, 'case_id' => $c, 'amount' => $a, 'tstatus' => 1]);
                DB::table('tbl_casestory')->where(['case_id' => $c])->update(['cstatus' => 6]);
                DB::table('tbl_sponsorhistory')->where(['case_id' => $c])->update(['status' => 2]);
                //send mail to needy
                $z = DB::table('tbl_casestory')->join('tbl_login', 'tbl_login.id', '=', 'tbl_casestory.user_id')
                    ->join('tbl_register', 'tbl_register.reg_id', '=', 'tbl_login.reg_id')
                    ->where('case_id', $c)
                    ->get();

                $mail = $z[0]->email;
                $amount = $z[0]->amount;
                $name = $z[0]->name;
                //$ename = $h[0]->cname;
            
                $data = [
                    'name' => $name,
                    'ename' => $amount,
                ];

                Mail::send('sponsor.transactionmail', $data, function ($message) use ($mail) {

                    $message->to($mail)->subject('Fund donated Successfully')->from('support@shadowshare.com');
                });
            
                $request->session()->flash('message', 'Payment Success !');
                return redirect('/approvedfundcase');
                
            } else {

                $request->session()->flash('message', 'Transaction already completed !');
                return redirect('/approvedfundcase');
            }
        } else {
            // return 1;
            $request->session()->flash('message', 'Invalid account details!');

            //$request->session()->flash('message','Equipment Request approved !');
            return redirect('/approvedfundcase');

            //return view('sponsor.paymenta');
        }

    }

    public function Donations(Request $request)
    {

        $val = session()->get('loginida');
        $a = DB::table('tbl_transaction')
        //->join('tbl_login','tbl_login.id','=','tbl_transaction.user_id')
        //->join('tbl_register','tbl_register.reg_id','=','tbl_login.reg_id')
            ->where('sponsor_id', $val)
            ->get();

        foreach ($a as $b) {

            $c = $b->user_id;
            $d = DB::table('tbl_login')
                ->join('tbl_register', 'tbl_register.reg_id', '=', 'tbl_login.reg_id')
                ->where('id', $c)
                ->get();
            $b->names = $d[0]->name;
            $b->phone = $d[0]->phonenumber;
        }

        //return $a ;
        return view('sponsor.donations', ['data' => $a]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sponsor $sponsor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsor $sponsor)
    {
        //
    }
}