<?php

namespace App\Http\Controllers;

use App\Models\QuizChildCatagories;
use App\Models\QuizSubCatagories;
use Illuminate\Http\Request;

class QuizChildCatagoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizChildCatagories=QuizChildCatagories::all();
        return json_encode($quizChildCatagories);
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
        $quizChildCatagories = new QuizChildCatagories;
        $quizChildCatagories->q_sid = $request->q_sid;
        $quizChildCatagories->quiz_child_catagory_name = $request->quiz_child_catagory_name;
        $quizChildCatagories->save();
       return redirect('/addQuizCatagory?id=QuizChildCatagories');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuizChildCatagories  $quizChildCatagories
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quizChildCatagories=QuizChildCatagories::where('quiz_child_catagory_id',$id)->get();
        return json_encode($quizChildCatagories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuizChildCatagories  $quizChildCatagories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quizSubCatagories=QuizSubCatagories::select('*')->get();
        $quizChildCatagories  = QuizChildCatagories::where('quiz_child_catagory_id',$id)->first();
        return view('quizcatagory.edit.childcatagory',compact('quizChildCatagories','quizSubCatagories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuizChildCatagories  $quizChildCatagories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuizChildCatagories $quizChildCatagories)
    {
        QuizChildCatagories::where('quiz_child_catagory_id','=',$request->quiz_child_catagory_id)->update([
            'q_sid' =>$request->q_sid,
            'quiz_child_catagory_name' =>$request->quiz_child_catagory_name,
            
           

        ]);
        return redirect('/addQuizCatagory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuizChildCatagories  $quizChildCatagories
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        QuizChildCatagories::where('quiz_child_catagory_id','=',$id)->delete();
        return redirect('/addQuizCatagory');
    }
}
