<?php

namespace App\Http\Controllers;

use App\Models\CourseAuthor;
use App\Models\CourseCatagory;
use App\Models\CourseCurriculumn;
use App\Models\CoursePricing;
use App\Models\Payments;
use App\Models\QuizAnswerOption;
use App\Models\QuizPricing;
use App\Models\QuizQuestions;
use App\Models\Users;
use Illuminate\Http\Request;

class frontendController extends Controller
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

    public function allCourses()
    {
        $courses = \DB::table('courses')
            ->join('course_catagories', 'courses.cid', '=', 'course_catagories.cid')
            ->select('courses.*', 'course_catagories.catagory_name')
            ->get();

        $a = [];
        foreach ($courses as $item) {
            if ($item->course_price == 1) {
                $normalprice = \DB::select("SELECT normal_price FROM `course_pricings` where course_id='" . $item->course_id . "' order by normal_price ASC limit 1");
                foreach ($normalprice as $prcie) {
                    array_push($a, $prcie);
                }
                $item->normalPrice = $a;

                $a = [];
            }
        }

        $courseCatagory = CourseCatagory::all();

        return view('frontend.pages.allcourses', compact('courses', 'courseCatagory'));
    }
    public function basket(Request $request)
    {
        return view('frontend.pages.basket');
    }

    public function selectDataForIndexPage()
    {

        $courses = \DB::table('courses')
            ->join('course_catagories', 'courses.cid', '=', 'course_catagories.cid')
            ->select('courses.*', 'course_catagories.catagory_name')
            ->get();

        // dd($courses);
        $a = [];
        foreach ($courses as $item) {
            if ($item->course_price == 1) {
                $normalprice = \DB::select("SELECT normal_price FROM `course_pricings` where course_id='" . $item->course_id . "' order by normal_price ASC limit 1");
                foreach ($normalprice as $prcie) {
                    array_push($a, $prcie);
                }
                $item->normalPrice = $a;

                $a = [];
            }
        }

        // dd($courses);

        $quizes = \DB::table('quizzes')
            ->join('quiz_catagories', 'quizzes.qid', '=', 'quiz_catagories.qid')
            ->join('quiz_sub_catagories', 'quizzes.q_sid', '=', 'quiz_sub_catagories.q_sid')

            ->select('quizzes.*', 'quiz_catagories.quiz_catagories_name', 'quiz_sub_catagories.quiz_sub_catagory_name')
            ->get();

        $a = [];
        foreach ($quizes as $item) {
            if ($item->quiz_price == 1) {
                $normalprice = \DB::select("SELECT normal_price FROM `quiz_pricings` where quiz_id='" . $item->quiz_id . "' order by normal_price ASC limit 1");
                foreach ($normalprice as $prcie) {
                    array_push($a, $prcie);
                }
                $item->normalPrice = $a;

                $a = [];
            }
        }

        $blogs = \DB::table('blogs')
            ->join('course_catagories', 'blogs.cid', '=', 'course_catagories.cid')
            ->select('blogs.*', 'course_catagories.catagory_name')
            ->get();

        return view('frontend.index', compact('courses', 'blogs', 'quizes'));
    }


    public function blogdetails($id)
    {
        $blog = \DB::table('blogs')
            ->join('course_catagories', 'blogs.cid', '=', 'course_catagories.cid')
            ->select('blogs.*', 'course_catagories.catagory_name')
            ->where('id', $id)
            ->get();


        $blogcomment = \DB::table('blog_comments')
            ->select('*')
            ->where('blog_id', $id)
            ->get();


        $blogcommentCount = \DB::table('blog_comments')
            ->where('blog_id', $id)
            ->count();
        // dd($blogcommentCount);


        $recentblog = \DB::table('blogs')
            ->join('course_catagories', 'blogs.cid', '=', 'course_catagories.cid')
            ->select('blogs.*', 'course_catagories.catagory_name')
            ->where('id', '!=', $id)
            ->orderBy('id', 'DESC')
            ->get(10);

        return view('frontend.pages.blogdetails', compact('blog', 'recentblog', 'blogcomment', 'blogcommentCount'));
    }

    public function quizdetails($id)
    {
        $quizes = \DB::table('quizzes')
            ->join('quiz_catagories', 'quizzes.qid', '=', 'quiz_catagories.qid')
            // ->join('quiz_sub_catagories', 'quizzes.q_sid', '=', 'quiz_sub_catagories.q_sid')
            ->select('quizzes.*', 'quiz_catagories.quiz_catagories_name')
            ->where('quiz_id', $id)
            ->get();
        $quizpricing = QuizPricing::where('quiz_id', $id)->get();
        // dd($quizpricing);
        $courseAuthor = \DB::table('quiz_authors')
            ->join('teachers', 'teachers.teacher_id', '=', 'quiz_authors.teacher_id')
            ->select('teachers.*')
            ->where('quiz_id', $id)
            // ->orderBy('id', 'DESC')
            ->get(10);

        $similarquizes = \DB::table('quizzes')
            ->join('quiz_catagories', 'quizzes.qid', '=', 'quiz_catagories.qid')
            // ->join('quiz_sub_catagories', 'quizzes.q_sid', '=', 'quiz_sub_catagories.q_sid')
            ->select('quizzes.*', 'quiz_catagories.quiz_catagories_name')
            ->where('quiz_id', '!=', $id)
            ->get();


        $a = [];
        foreach ($similarquizes as $item) {
            if ($item->quiz_price == 1) {
                $normalprice = \DB::select("SELECT normal_price FROM `quiz_pricings` where quiz_id='" . $item->quiz_id . "' order by normal_price ASC limit 1");
                foreach ($normalprice as $prcie) {
                    array_push($a, $prcie);
                }
                $item->normalPrice = $a;

                $a = [];
            }
        }

        return view('frontend.pages.quizdetails', compact('quizes', 'quizpricing', 'courseAuthor', 'similarquizes'));
    }

    public function coursesubdetails($subcourse, $id)
    {

        $course = \DB::table('courses')
            ->join('course_catagories', 'courses.cid', '=', 'course_catagories.cid')
            ->select('courses.*', 'course_catagories.catagory_name')
            ->where('course_id', $id)
            ->get();

        $coursePricing = CoursePricing::where('course_id', $id)->get();




        $similarcourses = \DB::table('courses')
            ->join('course_catagories', 'courses.cid', '=', 'course_catagories.cid')
            ->select('courses.*', 'course_catagories.catagory_name')
            ->where('course_id', '!=', $id)
            ->get(10);

        $a = [];
        foreach ($similarcourses as $item) {
            if ($item->course_price == 1) {
                $normalprice = \DB::select("SELECT normal_price FROM `course_pricings` where course_id='" . $item->course_id . "' order by normal_price ASC limit 1");
                foreach ($normalprice as $prcie) {
                    array_push($a, $prcie);
                }
                $item->normalPrice = $a;

                $a = [];
            }
        }



        if ($subcourse == "course_newsor_articles" || $subcourse == "course_others") {
            $lesson = "";

            return view('frontend.pages.coursesubdetails', compact('course', 'similarcourses', 'coursePricing', 'lesson'));
        } else {
            $lesson = \DB::select("select  DISTINCT lesson from " . $subcourse . " where course_id='" . $id . "'");

            return view('frontend.pages.coursesubdetails', compact('course', 'similarcourses', 'coursePricing', 'lesson'));
        }
    }
    public function coursedetails($id)
    {

        $course = \DB::table('courses')
            ->join('course_catagories', 'courses.cid', '=', 'course_catagories.cid')
            ->select('courses.*', 'course_catagories.catagory_name')
            ->where('course_id', $id)
            ->get();

        $coursePricing = CoursePricing::where('course_id', $id)->get();


        $courseAuthor = \DB::table('course_authors')
            ->join('teachers', 'teachers.teacher_id', '=', 'course_authors.teacher_id')
            ->select('teachers.*')
            ->where('course_id', $id)
            // ->orderBy('id', 'DESC')
            ->get(10);

        $similarcourses = \DB::table('courses')
            ->join('course_catagories', 'courses.cid', '=', 'course_catagories.cid')
            ->select('courses.*', 'course_catagories.catagory_name')
            ->where('course_id', '!=', $id)
            ->get(10);

        $a = [];
        foreach ($similarcourses as $item) {
            if ($item->course_price == 1) {
                $normalprice = \DB::select("SELECT normal_price FROM `course_pricings` where course_id='" . $item->course_id . "' order by normal_price ASC limit 1");
                foreach ($normalprice as $prcie) {
                    array_push($a, $prcie);
                }
                $item->normalPrice = $a;

                $a = [];
            }
        }






        return view('frontend.pages.coursedetails', compact('course', 'similarcourses', 'courseAuthor', 'coursePricing'));
    }


    public function coursecontent($course_id, $id, $subcourse)
    {
        if ($id == 0) {
            $courseCirriculumn = \DB::select("select  * from " . $subcourse . " where course_id='" . $course_id . "' order by id DESC limit 1");
        } else {
            $courseCirriculumn = \DB::select("select  * from " . $subcourse . " where course_id='" . $course_id . "' and id='" . $id . "'");
        }


        // dd($courseCirriculumn);

        $lesson = \DB::select("select  DISTINCT lesson from " . $subcourse . " where course_id='" . $course_id . "'");
        // dd($lesson);

        return view('frontend.pages.coursecontent', compact('courseCirriculumn', 'lesson'));
    }




    public function userdashboard()
    {

        $user = \DB::table('users')
            ->select('*')
            ->where('password', session()->get('sessionUserId'))
            ->get();
        $user_id = $user[0]->user_id;
        $courses = \DB::table('course_enrolls')
            ->join('courses', 'courses.course_id', '=', 'course_enrolls.course_or_quiz_id')
            ->join('course_catagories', 'courses.cid', '=', 'course_catagories.cid')
            ->join('payments', 'payments.tCode', '=', 'course_enrolls.tCode')
            ->select('courses.*', 'course_catagories.catagory_name', 'course_enrolls.*')
            ->where('type', 0)
            ->where('user_id',  $user_id)
            ->get();

        $bookmarkscourses = \DB::table('bookmarkcourses')
            ->join('courses', 'courses.course_id', '=', 'bookmarkcourses.course_or_quiz_id')
            ->join('course_catagories', 'courses.cid', '=', 'course_catagories.cid')
            ->select('courses.*', 'course_catagories.catagory_name')
            ->where('type', 0)
            ->where('user_id',  $user_id)
            ->get();

        $a = [];
        foreach ($bookmarkscourses as $item) {
            if ($item->course_price == 1) {
                $normalprice = \DB::select("SELECT normal_price FROM `course_pricings` where course_id='" . $item->course_id . "' order by normal_price ASC limit 1");
                foreach ($normalprice as $prcie) {
                    array_push($a, $prcie);
                }
                $item->normalPrice = $a;

                $a = [];
            }
        }

        $quizes = \DB::table('course_enrolls')
            ->join('quizzes', 'quizzes.quiz_id', '=', 'course_enrolls.course_or_quiz_id')
            ->join('quiz_catagories', 'quizzes.qid', '=', 'quiz_catagories.qid')
            ->join('payments', 'payments.tCode', '=', 'course_enrolls.tCode')
            ->select('quizzes.*', 'quiz_catagories.quiz_catagories_name', 'course_enrolls.*')
            ->where('user_id',  $user_id)
            ->where('type', 1)
            // ->orderBy('id', 'DESC')
            ->get();


        $bookmarksquizes = \DB::table('bookmarkcourses')
            ->join('quizzes', 'quizzes.quiz_id', '=', 'bookmarkcourses.course_or_quiz_id')
            ->join('quiz_catagories', 'quizzes.qid', '=', 'quiz_catagories.qid')
            ->select('quizzes.*', 'quiz_catagories.quiz_catagories_name')
            ->where('user_id',  $user_id)
            ->where('type', 1)
            // ->orderBy('id', 'DESC')
            ->get();
        $a = [];
        foreach ($bookmarksquizes as $item) {
            if ($item->quiz_price == 1) {
                $normalprice = \DB::select("SELECT normal_price FROM `quiz_pricings` where quiz_id='" . $item->quiz_id . "' order by normal_price ASC limit 1");
                foreach ($normalprice as $prcie) {
                    array_push($a, $prcie);
                }
                $item->normalPrice = $a;

                $a = [];
            }
        }
        $purchaseHistories = Payments::where('user_id', $user_id)->orderBy('payment_id', 'ASC')->get();

        $a = [];
        foreach ($purchaseHistories as $item) {


            $coursesEnroll = \DB::table('course_enrolls')
                ->join('courses', 'courses.course_id', '=', 'course_enrolls.course_or_quiz_id')
                ->join('payments', 'payments.tCode', '=', 'course_enrolls.tCode')
                ->select('course_title',  'course_enrolls.amount')
                ->where('type', 0)
                ->where('payments.tCode',  $item->tCode)
                ->get();

            foreach ($coursesEnroll as $enroll) {
                array_push($a, $enroll);
            }
            $item->enroll = $a;

            $a = [];
        }


        $a = [];
        foreach ($purchaseHistories as $item) {


            $quizEnroll = \DB::table('course_enrolls')
                ->join('quizzes', 'quizzes.quiz_id', '=', 'course_enrolls.course_or_quiz_id')
                ->join('payments', 'payments.tCode', '=', 'course_enrolls.tCode')
                ->select('quiz_title',  'course_enrolls.amount')
                ->where('payments.tCode',  $item->tCode)
                ->where('type', 1)
                // ->orderBy('id', 'DESC')
                ->get();

            foreach ($quizEnroll as $enroll) {
                array_push($a, $enroll);
            }
            $item->quizenroll = $a;

            $a = [];
        }
        // dd($purchaseHistories);
        return view('frontend.userportal.dashboard', compact('user', 'courses', 'quizes', 'purchaseHistories', 'bookmarkscourses', 'bookmarksquizes'));
    }





    public function quizcontent($id)
    {

        $quiz = \DB::table('quizzes')
            ->join('quiz_catagories', 'quizzes.qid', '=', 'quiz_catagories.qid')
            ->join('quiz_sub_catagories', 'quizzes.q_sid', '=', 'quiz_sub_catagories.q_sid')

            ->select('quizzes.*', 'quiz_catagories.quiz_catagories_name', 'quiz_sub_catagories.quiz_sub_catagory_name')
            ->where('quiz_id', $id)
            ->get();



        // $quizData = [];
        // $Quiz_Questions = QuizQuestions::select('questions_id', 'question_title')->where('quiz_id', $id)->get();
        // foreach ($Quiz_Questions as $question) {
        //     $quizAnswerOption = QuizAnswerOption::select('answer', 'correctornot', 'answer_option')->where('question_id', $question->questions_id)->get();
        //     foreach ($quizAnswerOption as $asn) {
        //         array_push($quizData, $quizAnswerOption);
        //     }
        //     $question->answerItems = $quizData;

        //     $quizData = [];
        // }

        $Quiz_Questions = \DB::select("SELECT  questions_id, question_title from quiz_questions where quiz_id='" . $id . "'");
        $a = [];
        foreach ($Quiz_Questions as $item) {
            $answers = \DB::select("SELECT answer,correctornot,answer_option,quiz_answer_option_id FROM `quiz_answer_options` where question_id='" . $item->questions_id . "'");
            foreach ($answers as $ans) {
                array_push($a, $ans);
            }
            $item->answerItems = $a;

            $a = [];
        }

        // return $Quiz_Questions;
        return view('frontend.pages.quizcontent', compact('quiz', 'Quiz_Questions'));
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
