<?php

namespace App\Http\Controllers;

use App\Question;
use DB;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    
    //display category list in dropdown
    public function AddQuestion(){
        
        $users = DB::table('tbl_category')->get();
        //return  $users;  
        return view('admin.addquestions',['data' => $users ]);


        

    }
    public function index()
    {
        //
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
    //insert questions to table
    public function storea(Request $request)
    {

    $validatedData = $request->validate([
        'question' => 'required|max:255'
        
    ]);
       $cc= $request->get('cat');
        
       $q= $request->get('question');
       $a= $request->get('option1');
       $b= $request->get('option2');
       $c= $request->get('option3');
       $d= $request->get('option4') ;
    DB::table('tbl_question')->insert(
        ['cat_id' => $cc, 'question' => $q,'option_a' => $a , 'option_b' => $b, 'option_c' => $c,'option_d' => $d]
    );
    
      
       $msg = [
        'message' => 'Question Added!',
       ];
       return redirect('/addquestion')->with($msg);
       
       

       
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $users = DB::table('tbl_category')->get();
        //return  $users;  
        return view('admin.addquestions',['data' => $users ]);
       
    }
    //list category and question table
    public function viewquestion(Request $request)
    {
        
        $users = DB::table('tbl_category')->get();
        $category=$request->get('category');
        
        $quest= DB::table('tbl_question')->where('cat_id',$category)->get();
        return view('admin.viewquestion',['quest' => $quest,'data' => $users  ]);
        //return  $users;  
        //return view('admin.viewquestion',[ ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function qdelete(Request $request, $question_id)
    {
        DB::table('tbl_question')->where('question_id',$question_id)->delete();
        $request->session()->flash('message','Question removed');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        
        DB::table('tbl_question')->where('question_id',$request->all()['id'])
                                ->update([
                                'option_a' => $request->all()['op1'],
                                'option_b' => $request->all()['op2'],
                                'option_c' => $request->all()['op3'],
                                'option_d' => $request->all()['op4']]);
                                $msg = [
                                    'message' => 'Enter Correct Username And Password!',
                                   ];
            
       // return  json_decode($request->all()['op1'])
    //  return Response::json(array('success'=>true));
        return view('admin.viewquestion',['quest' => $quest,'data' => $users  ])->with('success', 'Questions has been updated');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}