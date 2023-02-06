<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher=Teacher::select('*')->get();
        return view('teacher.add',compact('teacher'));
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
        $teacher = new Teacher;
        $teacher->fullname = $request->fullname;
        $teacher->address = $request->address;
        $teacher->mobile_number = $request->mobile_number;
        $teacher->introduction = $request->introduction;
        $teacher->profession = $request->profession;
        $teacher->save();
        return redirect('/addTeacher')->with('status','Your data has been submitted successfully');




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher=Teacher::where('teacher_id',$id)->get();
        return json_encode($teacher);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher  = Teacher::where('teacher_id',$id)->first();
        return view('teacher.edit',compact('teacher'));  
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        Teacher::where('teacher_id','=',$request->teacher_id)->update([
            'fullname' =>$request->fullname,
            'address' =>$request->address,
            'mobile_number' =>$request->mobile_number,
            'introduction' =>$request->introduction,
            'profession' =>$request->profession,
           

        ]);
        return redirect('/addTeacher');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Teacher::where('teacher_id','=',$id)->delete();
        return redirect('/addTeacher');
    }
}
