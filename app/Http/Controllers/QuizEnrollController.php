<?php

namespace App\Http\Controllers;

use App\Models\CourseEnroll;
use App\Models\Payments;
use App\Models\QuizEnroll;
use Illuminate\Http\Request;

class QuizEnrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizEnroll = QuizEnroll::all();
        return json_encode($quizEnroll);
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
        // dd($request->all());
        $tCode = $this->generateuniqueid();
        $tCode = $tCode . $request->quiz_user_id;
        $payments = new  Payments();
        $payments->user_id = $request->quiz_user_id;
        $payments->enroll_status = 1;
        $payments->amounts = $request->quiz_sell_price;
        $payments->paymentMode = "Manual";
        $payments->narration = "Admin Enrollment";
        $payments->tCode = $tCode;
        $payments->cancel = 0;
        $payments->isPaymentCompleted = 1;
        $payments->save();

        $courseenroll = new CourseEnroll();
        $courseenroll->course_or_quiz_id = $request->quiz_id;
        $courseenroll->pricing_id = $request->quiz_pricing_id;
        $courseenroll->amount = $request->quiz_sell_price;
        $courseenroll->type = 1;
        $courseenroll->startDate = date('Y-m-d');
        $courseenroll->endDate = $request->endDate;
        $courseenroll->tCode = $tCode;
        $courseenroll->save();
        return redirect()->back()->with('message', 'Successfully enrolled!');
    }

    function generateuniqueid()
    {
        $today = date('YmdHi');
        $startDate = date('YmdHi', strtotime('-10 days'));
        $range = $today - $startDate;
        $rand = rand(0, $range);
        // $uniqueid = $startDate + $rand;
        $length = 10;
        $pool = '0123456789abcdefghizklmnopqrstuvwxABCDEFGH';
        $Sid = substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
        $Sid = $Sid;

        return $Sid;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuizEnroll  $quizEnroll
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quizEnroll = QuizEnroll::where('quiz_enroll_id', $id)->get();
        return json_encode($quizEnroll);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuizEnroll  $quizEnroll
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quizEnroll  = QuizEnroll::where('quiz_enroll_id', $id)->edit();
        return json_encode($quizEnroll);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuizEnroll  $quizEnroll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuizEnroll $quizEnroll)
    {

        QuizEnroll::where('quiz_enroll_id', '=', $request->quiz_enroll_id)->update([
            'user_id' => $request->user_id,
            'course_id' => $request->course_id,
            'enroll_date' => $request->enroll_date,





        ]);
        return json_encode(array('status' => true, 'message' => 'Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuizEnroll  $quizEnroll
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        QuizEnroll::where('quiz_enroll_id', '=', $id)->delete();
        return json_encode(array('status' => true, 'message' => 'Sucessfully deleted.'));
    }
}
