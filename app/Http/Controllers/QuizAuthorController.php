<?php

namespace App\Http\Controllers;

use App\Models\QuizAuthor;
use Illuminate\Http\Request;

class QuizAuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $quizAuthor = QuizAuthor::all();
        return json_encode($quizAuthor);
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
        $quizAuthor = new QuizAuthor;
        $quizAuthor->quiz_id = $request->quiz_id;
        $quizAuthor->teacher_id = $request->teacher_id;
        $quizAuthor->save();
        return redirect('/addQuiz')->with('status','Your data has been submitted successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuizAuthor  $quizAuthor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $quizAuthor = QuizAuthor::where('id', $id)->get();
        return json_encode($quizAuthor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuizAuthor  $quizAuthor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quizAuthor  = QuizAuthor::where('id', $id)->edit();
        return json_encode($quizAuthor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuizAuthor  $quizAuthor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuizAuthor $quizAuthor)
    {
        QuizAuthor::where('id', '=', $request->id)->update([
            'quiz_id' => $request->quiz_id,
            'teacher_id' => $request->teacher_id,
            



        ]);
        return json_encode(array('status' => true, 'message' => 'Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuizAuthor  $quizAuthor
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        QuizAuthor::where('id','=',$id)->delete();
        return json_encode(array('status' => true, 'message' => 'Sucessfully deleted.'));
    }
}
