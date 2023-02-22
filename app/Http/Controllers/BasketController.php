<?php

namespace App\Http\Controllers;

use App\Models\basket;
use App\Models\CourseEnroll;
use App\Models\CoursePricing;
use App\Models\Payments;
use App\Models\Users;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function removeItemFromBasket($course_or_quiz_id, $pricing_id, $type, $user_id)
    {
        basket::where('course_or_quiz_id', '=', $course_or_quiz_id)->where('pricing_id', '=', $pricing_id)->where('type', '=', $type)->where('user_id', '=', $user_id)->delete();
        return redirect('basketDetails');
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
    public function store($course_id, $pricing_id, $type)
    {
        if ($type == "course") {
            $type = 0;
        } else {
            $type = 1;
        }
        $ldate = date('Y-m-d');
        $coursePricing = CoursePricing::where('course_pricing_id', $pricing_id)->get();
        //
        $user = Users::where('password', session()->get('sessionUserId'))->get();
        $basket = new basket;
        $basket->course_or_quiz_id = $course_id;
        $basket->pricing_id = $pricing_id;
        $basket->amount = $coursePricing[0]->sell_price;
        $basket->type = $type;
        $basket->startDate = $ldate;
        $basket->endDate = $coursePricing[0]->sell_exipiry_date;
        $basket->user_id = $user[0]->user_id;
        $basket->save();
        // /basketDetails/{user_id}

        return redirect('basketDetails');
        // // $basket = basket::where('user_id', $user[0]->user_id)->get();
        // return view('frontend.pages.basket', compact('basket', 'courses', 'quizes'));
    }


    public  function selectItemsFromBasket()
    {
        $sessionid = session()->get('sessionUserId');
        $user = Users::where('password', $sessionid)->get();
        $user_id = $user[0]->user_id;
        $courses = \DB::table('baskets')
            ->join('courses', 'courses.course_id', '=', 'baskets.course_or_quiz_id')
            ->select('baskets.*', 'course_title', 'thumbnail')
            ->where('user_id',  $user_id)
            ->where('type', 0)
            // ->orderBy('id', 'DESC')
            ->get();
        // dd($courses);




        $quizes = \DB::table('baskets')
            ->join('quizzes', 'quizzes.quiz_id', '=', 'baskets.course_or_quiz_id')
            ->select('baskets.*', 'quiz_title', 'thumbnail')
            ->where('user_id',  $user_id)
            ->where('type', 1)
            // ->orderBy('id', 'DESC')
            ->get();



        return view('frontend.pages.basket', compact('courses', 'quizes'));
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

    public function completePaymentSucess()
    {
        $sessionid = session()->get('sessionUserId');
        $tCode = $this->generateuniqueid();

        $user = Users::where('password', $sessionid)->get();
        $user_id = $user[0]->user_id;
        $tCode = $tCode . $user_id;

        $courses = \DB::table('baskets')
            ->join('courses', 'courses.course_id', '=', 'baskets.course_or_quiz_id')
            ->select('baskets.*', 'course_title', 'thumbnail')
            ->where('user_id',  $user_id)
            ->where('type', 0)
            // ->orderBy('id', 'DESC')
            ->get();
        // dd($courses);

        $totalAmt = 0;
        foreach ($courses as $course) {
            $courseenroll = new CourseEnroll();
            $courseenroll->course_or_quiz_id = $course->course_or_quiz_id;
            $courseenroll->pricing_id = $course->pricing_id;
            $courseenroll->amount = $course->amount;
            $courseenroll->type = $course->type;
            $courseenroll->startDate = $course->startDate;
            $courseenroll->endDate = $course->endDate;
            $courseenroll->tCode = $tCode;
            $courseenroll->save();
            $totalAmt += $course->amount;
        }



        $quizes = \DB::table('baskets')
            ->join('courses', 'courses.course_id', '=', 'baskets.course_or_quiz_id')
            ->select('baskets.*', 'course_title', 'thumbnail')
            ->where('user_id',  $user_id)
            ->where('type', 1)
            // ->orderBy('id', 'DESC')
            ->get();


        foreach ($quizes as $quiz) {
            $courseenroll = new CourseEnroll();
            $courseenroll->course_or_quiz_id = $quiz->course_or_quiz_id;
            $courseenroll->pricing_id = $quiz->pricing_id;
            $courseenroll->amount = $quiz->amount;
            $courseenroll->type = $quiz->type;
            $courseenroll->startDate = $quiz->startDate;
            $courseenroll->endDate = $quiz->endDate;
            $courseenroll->tCode = $tCode;
            $courseenroll->save();
            $totalAmt += $quiz->amount;
        }

        $payments = new Payments();
        $payments->user_id = $user_id;
        $payments->enroll_status = 0;
        $payments->amounts = $totalAmt;
        $payments->paymentMode = "Esewa";
        $payments->narration = "Test";
        $payments->tCode = $tCode;
        $payments->cancel = 0;
        $payments->isPaymentCompleted = 1;
        $payments->save();

        basket::where('user_id', '=', $user_id)->delete();
        return redirect('user-dashboard/');
    }

    public  function completePayment()
    {
        $sessionid = session()->get('sessionUserId');
        $user = Users::where('password', $sessionid)->get();
        $user_id = $user[0]->user_id;
        $courses = \DB::table('baskets')
            ->join('courses', 'courses.course_id', '=', 'baskets.course_or_quiz_id')
            ->select('baskets.*', 'course_title', 'thumbnail')
            ->where('user_id',  $user_id)
            ->where('type', 0)
            // ->orderBy('id', 'DESC')
            ->get();
        // dd($courses);
        $quizes = \DB::table('baskets')
            ->join('quizzes', 'quizzes.quiz_id', '=', 'baskets.course_or_quiz_id')
            ->select('baskets.*', 'quiz_title', 'thumbnail')
            ->where('user_id',  $user_id)
            ->where('type', 1)
            // ->orderBy('id', 'DESC')
            ->get();
        return view('frontend.pages.completepayment', compact('courses', 'quizes'));
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function show(basket $basket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function edit(basket $basket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, basket $basket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function destroy(basket $basket)
    {
        //
    }
}
