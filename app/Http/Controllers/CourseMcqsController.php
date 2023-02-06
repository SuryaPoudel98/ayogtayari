<?php

namespace App\Http\Controllers;

use App\Models\CourseMcqs;
use Illuminate\Http\Request;

class CourseMcqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mcqs = CourseMcqs::all();
        return json_encode($mcqs);
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
        // return $request->course_mcqs_id;
        CourseMcqs::where('id', '=', $request->course_mcqs_id)->delete();
        $mcqs = new CourseMcqs;
        $mcqs->course_id = $request->course_id;
        $mcqs->display_name = $request->display_name;
        $mcqs->lesson = $request->lesson;
        $mcqs->sub_lesson = $request->sub_lesson;
        $mcqs->child_lesson = $request->child_lesson;
        $mcqs->quiz_id = $request->quiz_id;
        $mcqs->lesson_preview = $request->lesson_preview;
        $mcqs->save();
        $CourseMcqs = \DB::table('quizzes')
            ->join('course_mcqs', 'course_mcqs.quiz_id', '=', 'quizzes.quiz_id')
            ->select('course_mcqs.*', 'quiz_title')
            ->where('course_mcqs.course_id', $request->course_id)
            ->get();

        // $CourseMcqs = CourseMcqs::where('course_id', $request->course_id)->get();
        return json_encode($CourseMcqs);

        // return json_encode(array(
        //     'status' => true, 'message' => "Successfully done."
        // ));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseMcqs  $courseMcqs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mcqs = CourseMcqs::where('id', $id)->get();
        return json_encode($mcqs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseMcqs  $courseMcqs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mcqs  = CourseMcqs::where('id', $id)->edit();
        return json_encode($mcqs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseMcqs  $courseMcqs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseMcqs $courseMcqs)
    {
        CourseMcqs::where('id', '=', $request->id)->update([
            'course_id' => $request->course_id,
            'display_name' => $request->display_name,
            'lesson' => $request->lesson,
            'sub_lesson' => $request->sub_lesson,
            'child_lesson' => $request->child_lesson,
            'quiz_id' => $request->quiz_id,
            'lesson_preview' => $request->lesson_preview,

        ]);
        return json_encode(array('status' => true, 'message' => 'Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseMcqs  $courseMcqs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $courseId)
    {
        CourseMcqs::where('id', '=', $id)->delete();
        // return json_encode(array('status' => true, 'message' => 'Sucessfully deleted.'));
        $CourseMcqs = \DB::table('quizzes')
            ->join('course_mcqs', 'course_mcqs.quiz_id', '=', 'quizzes.quiz_id')
            ->select('course_mcqs.*', 'quiz_title')
            ->where('course_mcqs.course_id', $courseId)
            ->get();

        // $CourseMcqs = CourseMcqs::where('course_id', $request->course_id)->get();
        return json_encode($CourseMcqs);
    }
}
