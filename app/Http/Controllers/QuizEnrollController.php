<?php

namespace App\Http\Controllers;

use App\Models\QuizEnroll;
use Illuminate\Http\Request;

class QuizEnrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizEnroll = QuizEnroll::all();
        return json_encode($quizEnroll);
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
        $quizEnroll = new QuizEnroll;
        $quizEnroll->quiz_id = $request->quiz_id;
        $quizEnroll->user_id = $request->user_id;
        $quizEnroll->enroll_date = $request->enroll_date;
        $quizEnroll->save();
        return redirect('/enroll')->with('status', 'Your data has been submitted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuizEnroll  $quizEnroll
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quizEnroll = QuizEnroll::where('quiz_enroll_id', $id)->get();
        return json_encode($quizEnroll);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuizEnroll  $quizEnroll
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quizEnroll  = QuizEnroll::where('quiz_enroll_id', $id)->edit();
        return json_encode($quizEnroll);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuizEnroll  $quizEnroll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuizEnroll $quizEnroll)
    {

        QuizEnroll::where('quiz_enroll_id', '=', $request->quiz_enroll_id)->update([
            'user_id' => $request->user_id,
            'course_id' => $request->course_id,
            'enroll_date' => $request->enroll_date,





        ]);
        return json_encode(array('status' => true, 'message' => 'Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuizEnroll  $quizEnroll
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        QuizEnroll::where('quiz_enroll_id', '=', $id)->delete();
        return json_encode(array('status' => true, 'message' => 'Sucessfully deleted.'));
    }
}
