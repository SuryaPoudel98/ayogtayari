<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCurriculumn;
use Illuminate\Http\Request;

class CourseCurriculumnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseCirriculumn = CourseCurriculumn::all();
        return json_encode($courseCirriculumn);
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
        CourseCurriculumn::where('id', '=', $request->course_curriculumn_id)->delete();
        $courseCirriculumn = new CourseCurriculumn;
        $courseCirriculumn->course_id = $request->course_id;
        $courseCirriculumn->display_name = $request->display_name;
        $courseCirriculumn->lesson = $request->lesson;
        $courseCirriculumn->sub_lesson = $request->sub_lesson;
        $courseCirriculumn->child_lesson = $request->child_lesson;
        $courseCirriculumn->description = $request->description;
        $courseCirriculumn->lesson_preview = $request->lesson_preview;
        $courseCirriculumn->save();

        $courseCirriculumn = CourseCurriculumn::where('course_id', $request->course_id)->get();
        return json_encode($courseCirriculumn);

        // return json_encode(array(
        //     'status' => true, 'message' => "Successfully done."
        // ));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseCurriculumn  $courseCurriculumn
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $courseCirriculumn = CourseCurriculumn::where('id', $id)->get();
        return json_encode($courseCirriculumn);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseCurriculumn  $courseCurriculumn
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courseCirriculumn  = CourseCurriculumn::where('id', $id)->edit();
        return json_encode($courseCirriculumn);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseCurriculumn  $courseCurriculumn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseCurriculumn $courseCurriculumn)
    {
        // CourseCurriculumn::where('id', '=', $request->id)->update([
        //     'course_id' => $request->course_id,
        //     'display_name' => $request->display_name,
        //     'lesson' => $request->lesson,
        //     'sub_lesson' => $request->sub_lesson,
        //     'child_lesson' => $request->child_lesson,
        //     'description' => $request->description,
        //     'lesson_preview' => $request->lesson_preview,

        // ]);
        // return json_encode(array('status' => true, 'message' => 'Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseCurriculumn  $courseCurriculumn
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $courseId)
    {
        CourseCurriculumn::where('id', '=', $id)->delete();
        $courseCirriculumn = CourseCurriculumn::where('course_id', $courseId)->get();
        return json_encode($courseCirriculumn);
        // return json_encode(array('status' => true, 'message' => 'Sucessfully deleted.'));

    }
}
