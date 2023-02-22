<?php

namespace App\Http\Controllers;

use App\Models\quizrank;
use App\Models\quizsolution;
use Illuminate\Http\Request;

class QuizsolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    public function selectLeaderBoard($user_id, $quiz_id)
    {
        $quiz = \DB::table('quizzes')
            ->select('*')
            ->where('quiz_id', $quiz_id)
            ->get();

        $Quiz_Questions = \DB::select("SELECT  questions_id, question_title from quiz_questions where quiz_id='" . $quiz_id . "'");
        $a = [];
        foreach ($Quiz_Questions as $item) {
            $answers = \DB::select("SELECT answer,correctornot,answer_option,quiz_answer_option_id,question_id FROM `quiz_answer_options` where question_id='" . $item->questions_id . "'");
            foreach ($answers as $ans) {
                array_push($a, $ans);
            }
            $item->answerItems = $a;

            $a = [];
        }

        $Quiz_Solutions = \DB::select("SELECT  question_id, quiz_answer_option_id from quizsolutions where quiz_id='" . $quiz_id . "' and user_id='" . $user_id . "'");


        $quizRanks = \DB::select("SELECT  marks,fullname from quizranks inner join users on quizranks.user_id=users.user_id  where quiz_id='" . $quiz_id . "'  order by marks desc limit 5");


        // dd($quizRanks);
        // return $Quiz_Questions;
        return view('frontend.pages.quizleaderboard', compact('quiz', 'Quiz_Questions', 'Quiz_Solutions', 'quizRanks'));
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
        if ($request->quizSolutions != "") {

            quizsolution::where('quiz_id', '=', $request->quiz_id)->where('user_id', '=',  $request->user_id)->delete();
            $basketItems = explode(',', $request->quizSolutions);
            if ($request->quizSolutions != "") {
                for ($i = 0; $i < count($basketItems); $i++) {
                    $val = explode('[#]', $basketItems[$i]);
                    $quizsolution = new quizsolution();
                    $quizsolution->quiz_id = $request->quiz_id;
                    $quizsolution->question_id = $val[0];
                    $quizsolution->user_id = $request->user_id;
                    $quizsolution->quiz_answer_option_id = $val[1];
                    $quizsolution->save();
                }
            }
            quizrank::where('quiz_id', '=', $request->quiz_id)->where('user_id', '=',  $request->user_id)->delete();
            $quizrank = new quizrank();
            $quizrank->user_id = $request->user_id;
            $quizrank->quiz_id = $request->quiz_id;
            $quizrank->marks = $request->totalCorrectAns;
            $quizrank->save();
            return json_encode(array(
                'status' => true, 'message' => "Successfully done."
            ));
        } else {
            return json_encode(array(
                'status' => false, 'message' => "Something went wrong!"
            ));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\quizsolution  $quizsolution
     * @return \Illuminate\Http\Response
     */
    public function show(quizsolution $quizsolution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\quizsolution  $quizsolution
     * @return \Illuminate\Http\Response
     */
    public function edit(quizsolution $quizsolution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\quizsolution  $quizsolution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, quizsolution $quizsolution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\quizsolution  $quizsolution
     * @return \Illuminate\Http\Response
     */
    public function destroy(quizsolution $quizsolution)
    {
        //
    }
}
