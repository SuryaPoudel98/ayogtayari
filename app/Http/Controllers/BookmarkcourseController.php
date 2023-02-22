<?php

namespace App\Http\Controllers;

use App\Models\bookmarkcourse;
use Illuminate\Http\Request;

class BookmarkcourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($course_or_quiz_id, $user_id, $type)
    {
        // bookmarkcourse::where('id', '=', $id)->delete();
        $bookmarkcourses = new bookmarkcourse();
        $bookmarkcourses->course_or_quiz_id = $course_or_quiz_id;
        $bookmarkcourses->user_id = $user_id;
        $bookmarkcourses->type = $type;
        $bookmarkcourses->save();
        //
        return redirect()->back()->withSuccess('IT WORKS!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bookmarkcourse  $bookmarkcourse
     * @return \Illuminate\Http\Response
     */
    public function show(bookmarkcourse $bookmarkcourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bookmarkcourse  $bookmarkcourse
     * @return \Illuminate\Http\Response
     */
    public function edit(bookmarkcourse $bookmarkcourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bookmarkcourse  $bookmarkcourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bookmarkcourse $bookmarkcourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bookmarkcourse  $bookmarkcourse
     * @return \Illuminate\Http\Response
     */
    public function destroy($course_or_quiz_id, $user_id, $type)
    {
        bookmarkcourse::where('course_or_quiz_id', '=', $course_or_quiz_id)->where('user_id', '=', $user_id)->where('type', '=', $type)->delete();
        return redirect()->back()->withSuccess('IT WORKS!');
        //
    }
}
