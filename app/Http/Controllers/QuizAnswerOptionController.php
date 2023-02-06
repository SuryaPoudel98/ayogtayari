<?php

namespace App\Http\Controllers;

use App\Models\QuizAnswerOption;
use Illuminate\Http\Request;

class QuizAnswerOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $quizAnswerOption = QuizAnswerOption::all();
        return json_encode($quizAnswerOption);
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
        $quizAnswerOption = new QuizAnswerOption;
        $quizAnswerOption ->question_id = $request->question_id;
        $quizAnswerOption ->answer = $request->answer;
        $quizAnswerOption ->correctornot = $request->correctornot;
        $quizAnswerOption->save();
        return redirect('/addQuiz')->with('status','Your data has been submitted successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuizAnswerOption  $quizAnswerOption
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quizAnswerOption = QuizAnswerOption::where('quiz_answer_option_id', $id)->get();
        return json_encode($quizAnswerOption);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuizAnswerOption  $quizAnswerOption
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $quizAnswerOption  = QuizAnswerOption::where('quiz_answer_option_id', $id)->edit();
        return json_encode($quizAnswerOption);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuizAnswerOption  $quizAnswerOption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuizAnswerOption $quizAnswerOption)
    {
        QuizAnswerOption::where('quiz_answer_option_id', '=', $request->quiz_answer_option_id)->update([
            'question_id' => $request->question_id,
            'answer' => $request->answer,
            'correctornot' => $request->correctornot,
            
            



        ]);
        return json_encode(array('status' => true, 'message' => 'Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuizAnswerOption  $quizAnswerOption
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        QuizAnswerOption::where('quiz_answer_option_id','=',$id)->delete();
        return json_encode(array('status' => true, 'message' => 'Sucessfully deleted.'));
    }
}
