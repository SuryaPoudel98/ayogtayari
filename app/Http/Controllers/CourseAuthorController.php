<?php

namespace App\Http\Controllers;

use App\Models\CourseAuthor;
use Illuminate\Http\Request;

class CourseAuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseAuthor=CourseAuthor::all();
        return json_encode($courseAuthor);
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
        $courseAuthor = new CourseAuthor;
        $courseAuthor->course_id= $request->course_id;
        $courseAuthor->teacher_id = $request->course_id;
        $courseAuthor->save();
        return redirect('/addcourse')->with('status'.'Your data has been submitted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseAuthor  $courseAuthor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $courseAuthor=CourseAuthor::where('id',$id)->get();
        return json_encode($courseAuthor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseAuthor  $courseAuthor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courseAuthor  = CourseAuthor::where('id',$id)->edit();
        return json_encode($courseAuthor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseAuthor  $courseAuthor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseAuthor $courseAuthor)
    {
        CourseAuthor::where('id','=',$request->id)->update([
            'course_id' =>$request->course_id,
            'teacher_id' =>$request->teacher_id,
           

        ]);
        return json_encode(array('status' => true, 'message' => 'Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseAuthor  $courseAuthor
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        CourseAuthor::where('id','=',$id)->delete();
        return json_encode(array('status' => true, 'message' => 'Sucessfully deleted.'));
    }
}
