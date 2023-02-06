<?php

namespace App\Http\Controllers;

use App\Models\CourseConversation;
use Illuminate\Http\Request;

class CourseConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseConversation=CourseConversation::all();
        return json_encode($courseConversation);
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
       $courseConversation = new CourseConversation;
       $courseConversation->course_id = $request->course_id;
       $courseConversation->teacher_id = $request->teacher_id;
       $courseConversation->chat = $request->chat;
       $courseConversation->file = $request->file;
       $courseConversation->save();
       return redirect('/addcourse')->with('status','Your data has been submitted successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseConversation  $courseConversation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $courseConversation=CourseConversation::where('id',$id)->get();
        return json_encode($courseConversation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseConversation  $courseConversation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courseConversation = CourseConversation::where('id',$id)->edit();
        return json_encode($courseConversation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseConversation  $courseConversation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseConversation $courseConversation)
    {
        CourseConversation::where('id','=',$request->id)->update([
            'course_id' =>$request->course_id,
            'teacher_id' =>$request->teacher_id,
            'chat' =>$request->chat,
            'file' =>$request->file,

            

        ]);
        return json_encode(array('status' => true, 'message' => 'Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseConversation  $courseConversation
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        CourseConversation::where('id','=',$id)->delete();
        return json_encode(array('status' => true, 'message' => 'Sucessfully deleted.'));
    }
}
