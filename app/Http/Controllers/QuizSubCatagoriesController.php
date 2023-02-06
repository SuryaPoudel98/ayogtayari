<?php

namespace App\Http\Controllers;

use App\Models\QuizCatagories;
use App\Models\QuizSubCatagories;
use Illuminate\Http\Request;

class QuizSubCatagoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizSubCatagories=QuizSubCatagories::all();
        return json_encode($quizSubCatagories);
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
        $quizSubCatagories = new QuizSubCatagories;
        $quizSubCatagories->qid = $request->qid;
        $quizSubCatagories->quiz_sub_catagory_name = $request->quiz_sub_catagory_name;
        $quizSubCatagories->save();
        return redirect('/addQuizCatagory?id=QuizSubCatagories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuizSubCatagories  $quizSubCatagories
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quizSubCatagories=QuizSubCatagories::where('q_sid',$id)->get();
        return json_encode($quizSubCatagories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuizSubCatagories  $quizSubCatagories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catagories=QuizCatagories::select('*')->get();
        $quizSubCatagories  = QuizSubCatagories::where('q_sid',$id)->first();
        return view('quizcatagory.edit.subcatagory',compact('quizSubCatagories','catagories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuizSubCatagories  $quizSubCatagories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuizSubCatagories $quizSubCatagories)
    {
        QuizSubCatagories::where('q_sid','=',$request->q_sid)->update([
            'quiz_sub_catagory_name' =>$request->quiz_sub_catagory_name,
            
           

        ]);
        return redirect('/addQuizCatagory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuizSubCatagories  $quizSubCatagories
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        QuizSubCatagories::where('q_sid','=',$id)->delete();
        return redirect('/addQuizCatagory');
    }
}
