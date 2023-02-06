<?php

namespace App\Http\Controllers;

use App\Models\CourseEnroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseEnrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseEnroll = DB::table('course_enrolls')
        ->join('courses', 'course_enrolls.course_id', '=', 'courses.course_id')
        ->join('users', 'course_enrolls.user_id', '=', 'users.user_id')
        ->select('course_enrolls.*','courses.course_title','users.fullname')
        ->get();
        return view('enroll.add', compact('courseEnroll'));
       
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
        $courseEnroll = new CourseEnroll;
        $courseEnroll->user_id = $request->user_id;
        $courseEnroll->course_id = $request->course_id;
        $courseEnroll->enroll_date = $request->enroll_date;
        $courseEnroll->save();
        return redirect('/enroll')->with('status','Your data has been submitted succesfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseEnroll  $courseEnroll
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $courseEnroll = CourseEnroll::where('course_enroll_id', $id)->get();
        return json_encode($courseEnroll);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseEnroll  $courseEnroll
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $courseEnroll  = CourseEnroll::where('course_enroll_id', $id)->edit();
        return json_encode($courseEnroll);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseEnroll  $courseEnroll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseEnroll $courseEnroll)
    {
        CourseEnroll::where('course_enroll_id', '=', $request->course_enroll_id)->update([
            'user_id' => $request->user_id,
            'course_id' => $request->course_id,
            'enroll_date' => $request->enroll_date,
            
            



        ]);
        return json_encode(array('status' => true, 'message' => 'Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseEnroll  $courseEnroll
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        CourseEnroll::where('course_enroll_id','=',$id)->delete();
        return json_encode(array('status' => true, 'message' => 'Sucessfully deleted.'));
    }
}
