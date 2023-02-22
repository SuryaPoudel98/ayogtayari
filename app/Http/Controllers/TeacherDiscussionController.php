<?php

namespace App\Http\Controllers;

use App\Models\teacherDiscussion;
use Illuminate\Http\Request;

class TeacherDiscussionController extends Controller
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
    public function store(Request $request)
    {
        //
        $teacherDiscussion = new teacherDiscussion();
        $teacherDiscussion->course_or_quiz_id = $request->course_or_quiz_id;
        $teacherDiscussion->teacher_id = $request->teacher_id;
        $teacherDiscussion->type = $request->type;
        $teacherDiscussion->whoIsHe = $request->whoIsHe;
        $teacherDiscussion->user_id = $request->user_id;
        $teacherDiscussion->discussionTitle = $request->discussionTitle;
        $teacherDiscussion->discussionNote = $request->discussionNote;
        $teacherDiscussion->save();
        return redirect()->back()->with('message', 'Successfully send!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\teacherDiscussion  $teacherDiscussion
     * @return \Illuminate\Http\Response
     */
    public function show(teacherDiscussion $teacherDiscussion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\teacherDiscussion  $teacherDiscussion
     * @return \Illuminate\Http\Response
     */
    public function edit(teacherDiscussion $teacherDiscussion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\teacherDiscussion  $teacherDiscussion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, teacherDiscussion $teacherDiscussion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\teacherDiscussion  $teacherDiscussion
     * @return \Illuminate\Http\Response
     */
    public function destroy(teacherDiscussion $teacherDiscussion)
    {
        //
    }
}
