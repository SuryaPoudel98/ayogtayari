<?php

namespace App\Http\Controllers;

use App\Models\CoursePricing;
use App\Models\QuestionsBank;
use App\Models\Quiz;
use App\Models\QuizAuthor;
use App\Models\QuizCatagories;
use App\Models\QuizChildCatagories;
use App\Models\QuizPricing;
use App\Models\QuizQuestions;
use App\Models\QuizSubCatagories;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = Teacher::select('*')->get();
        $questionBank = QuestionsBank::select('*')->get();
        $quizCatagories = QuizCatagories::select('*')->get();
        $quizSubCatagories = QuizSubCatagories::select('*')->get();
        $quizChildCatagories = QuizChildCatagories::select('*')->get();
        $quizChildCatagories = QuizChildCatagories::select('*')->get();

        return view('quiz.add', compact('quizCatagories', 'quizSubCatagories', 'quizChildCatagories', 'questionBank', 'teacher'));
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

        //return $request->all();

        if ($request->edit_quiz_id != "") {


            Quiz::where('quiz_id', '=', $request->edit_quiz_id)->update([
                'q_sid' => $request->q_sid,
                'qid' => $request->qid,
                'quiz_child_catagory_id' => $request->quiz_child_catagory_id,
                'quiz_price' => $request->quiz_price,
                'quiz_title' => $request->quiz_title,
                'thumbnail' => $request->thumbnail,
                'quiz_description' => $request->quiz_description,
                'practise_mode' => $request->practise_mode,
                'marks_for_correction' => $request->marks_for_correction,
                'negative_marks' => $request->negative_marks,
                'random_question' => $request->random_question,
                'random_option' => $request->random_option,
                'no_of_option' => $request->no_of_option,
                'quiz_time' => $request->quiz_time,
                'report_question' => $request->report_question,
            ]);
            $quizId = $request->edit_quiz_id;
            QuizPricing::where('quiz_id', '=', $request->edit_quiz_id)->delete();

            $quizPricingsArray = explode(',', $request->items);
            if ($request->items != "") {
                for ($i = 0; $i < count($quizPricingsArray); $i++) {
                    $val = explode('{#}', $quizPricingsArray[$i]);
                    $quizPricing = new QuizPricing();
                    $quizPricing->quiz_id = $quizId;
                    $quizPricing->no_of_days = $val[0];
                    $quizPricing->normal_price = $val[1];
                    $quizPricing->sell_price = $val[2];
                    $quizPricing->sell_exipiry = $val[3];
                    $quizPricing->save();
                }
            }
            QuizAuthor::where('quiz_id', '=', $request->edit_quiz_id)->delete();

            $teacherArray = explode(',', $request->item);
            for ($i = 0; $i < count($teacherArray); $i++) {
                $val = explode('{#}', $teacherArray[$i]);
                $teacherId = explode('[#]', $val[0]);
                $quizAuthor = new QuizAuthor();
                $quizAuthor->quiz_id = $quizId;
                $quizAuthor->teacher_id = $teacherId[0];
                $quizAuthor->save();
            }
            return json_encode(array(
                'status' => true, 'message' => "Successfully done.", 'quiz_id' => $quizId
            ));
        } else {
            $quiz = new Quiz;
            $quiz->qid = $request->qid;
            $quiz->q_sid = $request->q_sid;
            $quiz->quiz_child_catagory_id = $request->quiz_child_catagory_id;
            $quiz->quiz_price = $request->quiz_price;
            $quiz->quiz_title = $request->quiz_title;
            $quiz->thumbnail = $request->thumbnail;
            $quiz->quiz_description = $request->quiz_description;
            $quiz->practise_mode = $request->practise_mode;
            $quiz->marks_for_correction = $request->practise_mode;
            $quiz->negative_marks = $request->negative_marks;
            $quiz->pass_marks = $request->pass_marks;
            $quiz->random_question = $request->random_question;
            $quiz->random_option = $request->random_option;
            $quiz->no_of_option = $request->no_of_option;
            $quiz->quiz_time = $request->quiz_time;
            $quiz->report_question = $request->report_question;
            $quiz->save();

            $quiz_id = Quiz::select('quiz_id')->orderBy('created_at', 'desc')->first();
            $quizId = $quiz_id->quiz_id;

            $quizPricingsArray = explode(',', $request->items);

            //return $quizPricingsArray;
            if ($request->items != "") {
                for ($i = 0; $i < count($quizPricingsArray); $i++) {
                    $val = explode('{#}', $quizPricingsArray[$i]);
                    $quizPricing = new QuizPricing();
                    $quizPricing->quiz_id = $quizId;
                    $quizPricing->no_of_days = $val[0];
                    $quizPricing->normal_price = $val[1];
                    $quizPricing->sell_price = $val[2];
                    $quizPricing->sell_exipiry = $val[3];
                    $quizPricing->save();
                }
            }
            $teacherArray = explode(',', $request->item);
            for ($i = 0; $i < count($teacherArray); $i++) {
                $val = explode('{#}', $teacherArray[$i]);
                $teacherId = explode('[#]', $val[0]);
                $quizAuthor = new QuizAuthor();
                $quizAuthor->quiz_id = $quizId;
                $quizAuthor->teacher_id = $teacherId[0];
                $quizAuthor->save();
            }
            return json_encode(array(
                'status' => true, 'message' => "Successfully done.", 'quiz_id' => $quizId
            ));
        }



        // return redirect('/addcourse')->with('status', 'Your data has been saved successfully');


    }


    public function searchQuiz(Request $request)
    {
        $quizEnroll = Quiz::select('*')->where('quiz_title', 'LIKE', '%' . $request->get('query') . '%')->get(10);
        return json_encode($quizEnroll);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $quiz = Quiz::where('quiz_id', $id)->get();
        return json_encode($quiz);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz  = Quiz::where('quiz_id', $id)->get();
        // return json_encode($quiz);
        $teacher = Teacher::select('*')->get();
        $questionBank = QuestionsBank::select('*')->get();
        $quizCatagories = QuizCatagories::select('*')->get();
        $quizSubCatagories = QuizSubCatagories::select('*')->get();
        $quizChildCatagories = QuizChildCatagories::select('*')->get();
        $quizChildCatagories = QuizChildCatagories::select('*')->get();
        $course_authers = DB::table('course_authors')
            ->join('teachers', 'teachers.teacher_id', '=', 'course_authors.teacher_id')
            ->select('course_authors.*', 'teachers.fullname')
            ->where('course_authors.course_id', $quiz[0]->quiz_id)
            ->get();

        $quizQuestions = QuizQuestions::where('quiz_id', $quiz[0]->quiz_id)->get();

        $course_pricing = CoursePricing::select('*')->where('course_id', $quiz[0]->quiz_id)->get();
        return view('quiz.add', compact('quizCatagories', 'quizSubCatagories', 'quizChildCatagories', 'questionBank', 'teacher', 'quiz', 'course_authers', 'course_pricing','quizQuestions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {

        Quiz::where('quiz_id', '=', $request->quiz_id)->update([
            'q_sid' => $request->q_sid,
            'qid' => $request->qid,
            'quiz_child_catagory_id' => $request->quiz_child_catagory_id,
            'quiz_price' => $request->quiz_price,
            'quiz_title' => $request->quiz_title,
            'thumbnail' => $request->thumbnail,
            'quiz_description' => $request->quiz_description,
            'practise_mode' => $request->practise_mode,
            'marks_for_correction' => $request->marks_for_correction,
            'negative_marks' => $request->negative_marks,
            'random_question' => $request->random_question,
            'random_option' => $request->random_option,
            'no_of_option' => $request->no_of_option,
            'quiz_time' => $request->quiz_time,





        ]);
        return json_encode(array('status' => true, 'message' => 'Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Quiz::where('quiz_id', '=', $id)->delete();
        return redirect('/listQuiz');
    }
    public function list()
    {
        $quiz = DB::table('quizzes')
            ->join('quiz_catagories', 'quizzes.qid', '=', 'quiz_catagories.qid')
            ->join('quiz_sub_catagories', 'quizzes.q_sid', '=', 'quiz_sub_catagories.q_sid')

            ->select('quizzes.*', 'quiz_catagories.quiz_catagories_name', 'quiz_sub_catagories.quiz_sub_catagory_name')
            ->get();
        return view('quiz.list', compact('quiz'));
    }
}
