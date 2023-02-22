<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminpanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseEnroll = \DB::table('course_enrolls')
            ->join('courses', 'course_enrolls.course_or_quiz_id', '=', 'courses.course_id')
            ->join('payments', 'payments.tCode', '=', 'course_enrolls.tCode')
            ->join('users', 'payments.user_id', '=', 'users.user_id')
            ->select('course_enrolls.*', 'courses.course_title', 'users.fullname')
            ->where('type', 0)
            ->get();

            // dd($courseEnroll);

        $quizEnroll = \DB::table('course_enrolls')
            ->join('quizzes', 'course_enrolls.course_or_quiz_id', '=', 'quizzes.quiz_id')
            ->join('payments', 'payments.tCode', '=', 'course_enrolls.tCode')
            ->join('users', 'payments.user_id', '=', 'users.user_id')
            ->select('course_enrolls.*', 'quizzes.quiz_title', 'users.fullname')
            ->where('type', 1)
            ->get();


            $activeEnroll=\DB::select("select distinct(user_id) as user_id from payments inner join course_enrolls on payments.tCode=course_enrolls.tCode where endDate>='".date('Y-m-d')."' ");
            
            // dd($activeEnroll);

        return view('adminpage.home', compact('courseEnroll','quizEnroll','activeEnroll'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
