<?php

namespace App\Http\Controllers;

use App\Models\QuizCatagories;
use App\Models\QuizSubCatagories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class QuizCatagoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $quizCatagories=QuizCatagories::select('*')->get();
        
        $quizSubCatagories = DB::table('quiz_sub_catagories')
        ->join('quiz_catagories', 'quiz_sub_catagories.qid', '=', 'quiz_catagories.qid')
        ->select('quiz_sub_catagories.*', 'quiz_catagories.quiz_catagories_name')
        ->get();
        $quizChildCatagories = DB::table('quiz_child_catagories')
        ->join('quiz_sub_catagories', 'quiz_child_catagories.q_sid', '=', 'quiz_sub_catagories.qid')
        ->select('quiz_child_catagories.*', 'quiz_sub_catagories.quiz_sub_catagory_name')
        ->get();
       
       
        return view('quizcatagory.add',compact('quizCatagories','quizSubCatagories','quizChildCatagories'));
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
        $quizCatagories = new QuizCatagories;
        $quizCatagories->quiz_catagories_name = $request->quiz_catagories_name;
        $quizCatagories->save();
        return redirect('/addQuizCatagory')->with('status','Your data has been submitted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuizCatagories  $quizCatagories
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quizCatagories=QuizCatagories::where('qid',$id)->get();
        return json_encode($quizCatagories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuizCatagories  $quizCatagories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quizCatagories  = QuizCatagories::where('qid',$id)->first();
        return view('quizcatagory.edit.catagory',compact('quizCatagories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuizCatagories  $quizCatagories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuizCatagories $quizCatagories)
    {
        QuizCatagories::where('qid','=',$request->qid)->update([
            'quiz_catagories_name' =>$request->quiz_catagories_name,
            
           

        ]);
        return redirect('/addQuizCatagory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuizCatagories  $quizCatagories
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        QuizCatagories::where('qid','=',$id)->delete();
        return redirect('/addQuizCatagory');
    }
}
