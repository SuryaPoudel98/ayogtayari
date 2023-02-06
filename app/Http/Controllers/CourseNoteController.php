<?php

namespace App\Http\Controllers;

use App\Models\CourseNote;
use Illuminate\Http\Request;

class CourseNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $courseNote = CourseNote::all();
        return json_encode($courseNote);
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
        CourseNote::where('id', '=', $request->course_note_id)->delete();
        $courseNote = new CourseNote;
        $courseNote->course_id = $request->course_id;
        $courseNote->display_name = $request->display_name;
        $courseNote->lesson = $request->lesson;
        $courseNote->sub_lesson = $request->sub_lesson;
        $courseNote->child_lesson = $request->child_lesson;
        $courseNote->file = $request->file;
        $courseNote->url = $request->url;
        $courseNote->downloadornot = $request->downloadornot;
        $courseNote->lesson_preview = $request->lesson_preview;
        $courseNote->save();
        // return json_encode(array(
        //     'status' => true, 'message' => "Successfully done."
        // ));

        $CourseNote = CourseNote::where('course_id', $request->course_id)->get();
        return json_encode($CourseNote);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseNote  $courseNote
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $courseNote = CourseNote::where('id', $id)->get();
        return json_encode($courseNote);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseNote  $courseNote
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courseNote  = CourseNote::where('id', $id)->edit();
        return json_encode($courseNote);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseNote  $courseNote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseNote $courseNote)
    {
        CourseNote::where('id', '=', $request->id)->update([
            'course_id' => $request->course_id,
            'display_name' => $request->display_name,
            'lesson' => $request->lesson,
            'sub_lesson' => $request->sub_lesson,
            'child_lesson' => $request->child_lesson,

            'url' => $request->url,
            'lesson_preview' => $request->lesson_preview,
            'downloadornot' => $request->downloadornot,

        ]);
        return json_encode(array('status' => true, 'message' => 'Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseNote  $courseNote
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $courseId)
    {
        CourseNote::where('id', '=', $id)->delete();
        // return json_encode(array('status' => true, 'message' => 'Sucessfully deleted.'));
        $CourseNote = CourseNote::where('course_id', $courseId)->get();
        return json_encode($CourseNote);
    }
}
