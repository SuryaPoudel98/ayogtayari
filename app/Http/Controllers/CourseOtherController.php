<?php

namespace App\Http\Controllers;

use App\Models\CourseOther;
use Illuminate\Http\Request;

class CourseOtherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseOther = CourseOther::all();
        return json_encode($courseOther);
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
        CourseOther::where('id', '=', $request->course_other_id)->delete();
        $courseOther = new CourseOther;
        $courseOther->course_id = $request->course_id;
        $courseOther->display_name = $request->display_name;
        $courseOther->description = $request->description;
        $courseOther->save();
        $CourseNote = CourseOther::where('course_id', $request->course_id)->get();
        return json_encode($CourseNote);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseOther  $courseOther
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $courseOther = courseOther::where('id', $id)->get();
        return json_encode($courseOther);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseOther  $courseOther
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courseOther  = courseOther::where('id', $id)->edit();
        return json_encode($courseOther);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseOther  $courseOther
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseOther $courseOther)
    {
        CourseOther::where('id', '=', $request->id)->update([
            'course_id' => $request->course_id,
            'display_name' => $request->display_name,
            'description' => $request->description,

        ]);
        return json_encode(array('status' => true, 'message' => 'Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseOther  $courseOther
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $courseid)
    {
        CourseOther::where('id', '=', $id)->delete();
        // return json_encode(array('status' => true, 'message' => 'Sucessfully deleted.'));
        $CourseReview = CourseOther::where('course_id', $courseid)->get();
        return json_encode($CourseReview);
    }
}
