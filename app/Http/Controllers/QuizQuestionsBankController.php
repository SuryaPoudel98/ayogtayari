<?php

namespace App\Http\Controllers;

use App\Models\QuizQuestionsBank;
use Illuminate\Http\Request;

class QuizQuestionsBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $quizQuestionsBank = QuizQuestionsBank::all();
        return json_encode($quizQuestionsBank);
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
        $quizQuestionsBank = new QuizQuestionsBank;
        $quizQuestionsBank->question_bank_id = $request->question_bank_id;
        $quizQuestionsBank->question_id = $request->question_id;
        $quizQuestionsBank->save();
        return redirect('/addQuiz')->with('status','Your data has been submitted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuizQuestionsBank  $quizQuestionsBank
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quizQuestionsBank = QuizQuestionsBank::where('quiz_question_bank_id', $id)->get();
        return json_encode($quizQuestionsBank);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuizQuestionsBank  $quizQuestionsBank
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quizQuestionsBank  = QuizQuestionsBank::where('quiz_question_bank_id', $id)->edit();
        return json_encode($quizQuestionsBank);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuizQuestionsBank  $quizQuestionsBank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuizQuestionsBank $quizQuestionsBank)
    {
        QuizQuestionsBank::where('quiz_question_bank_id', '=', $request->quiz_question_bank_id)->update([
            'question_bank_id' => $request->question_bank_id,
            'question_id' => $request->question_id,
            
            



        ]);
        return json_encode(array('status' => true, 'message' => 'Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuizQuestionsBank  $quizQuestionsBank
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        QuizQuestionsBank::where('quiz_question_bank_id','=',$id)->delete();
        return json_encode(array('status' => true, 'message' => 'Sucessfully deleted.'));
    }
}
