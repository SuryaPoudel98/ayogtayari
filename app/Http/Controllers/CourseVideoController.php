<?php

namespace App\Http\Controllers;

use App\Models\CourseVideo;
use Illuminate\Http\Request;

class CourseVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseVideo = CourseVideo::all();
        return json_encode($courseVideo);
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
        CourseVideo::where('id', '=', $request->course_video_id)->delete();
        $courseVideo = new CourseVideo;
        $courseVideo->course_id = $request->course_id;
        $courseVideo->display_name = $request->display_name;
        $courseVideo->lesson = $request->lesson;
        $courseVideo->sub_lesson = $request->sub_lesson;
        $courseVideo->child_lesson = $request->child_lesson;
        $courseVideo->video_file = $request->video_file;
        $courseVideo->url = $request->url;
        $courseVideo->lesson_preview = $request->lesson_preview;
        $courseVideo->downloadornot = $request->downloadornot;
        $courseVideo->save();
        $CourseVideo = CourseVideo::where('course_id', $request->course_id)->get();
        return json_encode($CourseVideo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseVideo  $courseVideo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $courseVideo = CourseVideo::where('id', $id)->get();
        return json_encode($courseVideo);

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseVideo  $courseVideo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courseVideo  = CourseVideo::where('id', $id)->edit();
        return json_encode($courseVideo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseVideo  $courseVideo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseVideo $courseVideo)
    {
        CourseVideo::where('id', '=', $request->id)->update([
            'course_id' => $request->course_id,
            'display_name' => $request->display_name,
            'lesson' => $request->lesson,
            'sub_lesson' => $request->sub_lesson,
            'child_lesson' => $request->child_lesson,
            'video_file' => $request->video_file,
            'url' => $request->url,
            'lesson_preview' => $request->lesson_preview,
            'downloadornot' => $request->downloadornot,

        ]);
        return json_encode(array('status' => true, 'message' => 'Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseVideo  $courseVideo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $courseId)
    {
        CourseVideo::where('id', '=', $id)->delete();
        // return json_encode(array('status' => true, 'message' => 'Sucessfully deleted.'));
        $CourseVideo = CourseVideo::where('course_id', $courseId)->get();
        return json_encode($CourseVideo);
    }
}
