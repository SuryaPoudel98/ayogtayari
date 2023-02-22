<?php

namespace App\Http\Controllers;

use App\Models\CourseEnroll;
use App\Models\Payments;
use App\Models\Users;
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
        // $courseEnroll = DB::table('course_enrolls')
        // ->join('courses', 'course_enrolls.course_id', '=', 'courses.course_id')
        // ->join('users', 'course_enrolls.user_id', '=', 'users.user_id')
        // ->select('course_enrolls.*','courses.course_title','users.fullname')
        // ->get();
        return view('enroll.add');
    }



    public function enrollmentlist()
    {
        # code...
        $list = DB::table('payments')
            ->join('users', 'payments.user_id', '=', 'users.user_id')
            ->select('payments.*', 'users.fullname', 'contact_number', 'email_address')
            ->orderBy('payments.payment_id','DESC')
            ->get();
        return view('enroll.list', compact('list'));
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
        $tCode = $this->generateuniqueid();
        $tCode = $tCode . $request->user_id;
        $payments = new  Payments();
        $payments->user_id = $request->user_id;
        $payments->enroll_status = 1;
        $payments->amounts = $request->sell_price;
        $payments->paymentMode = "Manual";
        $payments->narration = "Admin Enrollment";
        $payments->tCode = $tCode;
        $payments->cancel = 0;
        $payments->isPaymentCompleted = 1;
        $payments->save();

        $courseenroll = new CourseEnroll();
        $courseenroll->course_or_quiz_id = $request->course_id;
        $courseenroll->pricing_id = $request->pricing_id;
        $courseenroll->amount = $request->sell_price;
        $courseenroll->type = 0;
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
    public function destroy($id)
    {
        CourseEnroll::where('course_enroll_id', '=', $id)->delete();
        return json_encode(array('status' => true, 'message' => 'Sucessfully deleted.'));
    }
}
