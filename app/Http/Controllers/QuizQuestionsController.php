<?php

namespace App\Http\Controllers;

use App\Models\QuizAnswerOption;
use App\Models\QuizQuestions;
use App\Models\QuizQuestionsBank;
use Illuminate\Http\Request;

class QuizQuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizQuestions = QuizQuestions::all();
        return json_encode($quizQuestions);
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


    public function getQuestionsByQuizId($quiz_id)
    {
        $Quiz_Questions = QuizQuestions::where('quiz_id', $quiz_id)->get();
        return json_encode($Quiz_Questions);
    }


    public function getQuestionsByBankId($bank_id)
    {
        // $Quiz_Questions = QuizQuestions::where('quiz_id', $quiz_id)->get();

        $banks = \DB::table('quiz_questions')
            ->join('quiz_questions_banks', 'quiz_questions_banks.question_id', '=', 'quiz_questions.questions_id')
            ->where('question_bank_id', $bank_id)
            ->select('quiz_questions.*')
            ->get();

        return json_encode($banks);
    }


    public function storeQuestionsFromAnotherQuiz(Request $request)
    {
        $item_question = explode(',', $request->questions);
        for ($i = 0; $i < count($item_question); $i++) {
            $qsntitle = QuizQuestions::select('question_title')->where('questions_id', $item_question[$i])->first();
            $questions_title = $qsntitle->question_title;
            $quizQuestions = new QuizQuestions;
            $quizQuestions->quiz_id = $request->quiz_id;
            $quizQuestions->question_title = $questions_title;
            $quizQuestions->feedback = 'notyet';
            $quizQuestions->save();


            $questions_id = QuizQuestions::select('questions_id')->orderBy('questions_id', 'desc')->first();
            $questions_id = $questions_id->questions_id;
            $answers = QuizAnswerOption::where('question_id', $item_question[$i])->get();

            foreach ($answers as $ans) {
                $QuizAnswerOption = new QuizAnswerOption();
                $QuizAnswerOption->question_id = $questions_id;
                $QuizAnswerOption->answer = $ans->answer;
                $QuizAnswerOption->correctornot = $ans->correctornot;
                $QuizAnswerOption->answer_option = $ans->answer_option;
                $QuizAnswerOption->save();
            }

            $bank = QuizQuestionsBank::select('question_bank_id')->where('question_id', $item_question[$i])->first();
            $QuizQuestionsBank = new QuizQuestionsBank();
            $QuizQuestionsBank->question_id = $questions_id;
            $QuizQuestionsBank->question_bank_id = $bank->question_bank_id;
            $QuizQuestionsBank->save();
        }


        $Quiz_Questions = QuizQuestions::where('quiz_id', $request->quiz_id)->get();
        return json_encode($Quiz_Questions);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->questions_id != "") {
            QuizQuestions::where('questions_id', '=', $request->questions_id)->update([
                'quiz_id' => $request->quiz_id,
                'question_title' => $request->question_title,
                'feedback' => $request->feedback,
            ]);

            QuizAnswerOption::where('question_id', '=', $request->questions_id)->delete();
            $questions_id = $request->questions_id;
            if ($request->answerItems != "") {
                for ($i = 0; $i < count($request->answerItems); $i++) {
                    $val = explode('{#}', $request->answerItems[$i]);
                    $QuizAnswerOption = new QuizAnswerOption();
                    $QuizAnswerOption->question_id = $questions_id;
                    $QuizAnswerOption->answer = $val[1];
                    $QuizAnswerOption->correctornot = $val[1];
                    $QuizAnswerOption->answer_option = $val[0];
                    $QuizAnswerOption->save();
                }
            }

            QuizQuestionsBank::where('question_id', '=', $request->questions_id)->delete();
            $item_questionBank = explode(',', $request->item_questionBank);
            for ($i = 0; $i < count($item_questionBank); $i++) {
                $val = explode('{#}', $item_questionBank[$i]);
                $teacherId = explode('[#]', $val[0]);
                $QuizQuestionsBank = new QuizQuestionsBank();
                $QuizQuestionsBank->question_id = $questions_id;
                $QuizQuestionsBank->question_bank_id = $teacherId[0];
                $QuizQuestionsBank->save();
            }

            $Quiz_Questions = QuizQuestions::where('quiz_id', $request->quiz_id)->get();
            return json_encode($Quiz_Questions);
        } else {
            $quizQuestions = new QuizQuestions;
            $quizQuestions->quiz_id = $request->quiz_id;
            $quizQuestions->question_title = $request->question_title;
            $quizQuestions->feedback = $request->feedback;
            $quizQuestions->save();
            $questions_id = QuizQuestions::select('questions_id')->orderBy('created_at', 'desc')->first();
            $questions_id = $questions_id->questions_id;

            if ($request->answerItems != "") {
                for ($i = 0; $i < count($request->answerItems); $i++) {
                    $val = explode('{#}', $request->answerItems[$i]);
                    $QuizAnswerOption = new QuizAnswerOption();
                    $QuizAnswerOption->question_id = $questions_id;
                    $QuizAnswerOption->answer = $val[1];
                    $QuizAnswerOption->correctornot = 1;
                    $QuizAnswerOption->answer_option = $val[0];
                    $QuizAnswerOption->save();
                }
            }
            $item_questionBank = explode(',', $request->item_questionBank);
            for ($i = 0; $i < count($item_questionBank); $i++) {
                $val = explode('{#}', $item_questionBank[$i]);
                $teacherId = explode('[#]', $val[0]);
                $QuizQuestionsBank = new QuizQuestionsBank();
                $QuizQuestionsBank->question_id = $questions_id;
                $QuizQuestionsBank->question_bank_id = $teacherId[0];
                $QuizQuestionsBank->save();
            }

            $Quiz_Questions = QuizQuestions::where('quiz_id', $request->quiz_id)->get();
            return json_encode($Quiz_Questions);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuizQuestions  $quizQuestions
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quizQuestions = QuizQuestions::where('questions_id', $id)->get();
        return json_encode($quizQuestions);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuizQuestions  $quizQuestions
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quizQuestions  = QuizQuestions::where('questions_id', $id)->get();
        $quizAnswerOption = QuizAnswerOption::where('question_id', $id)->get();

        // $questionBank = QuizQuestionsBank::where('question_id', $id)->get();
        $questionBank = \DB::table('quiz_questions_banks')
            ->join('questions_banks', 'quiz_questions_banks.question_bank_id', '=', 'questions_banks.question_bank_id')
            ->select('quiz_questions_banks.*', 'questions_banks.question_bank_name')
            ->where('quiz_questions_banks.question_id', $id)
            ->get();
        // return json_encode($quizQuestions);

        return json_encode(array(
            'status' => true, 'quizQuestions' => $quizQuestions, 'quizAnswerOption' => $quizAnswerOption, 'questionBank' => $questionBank
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuizQuestions  $quizQuestions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuizQuestions $quizQuestions)
    {
        QuizQuestions::where('questions_id', '=', $request->questions_id)->update([
            'quiz_id' => $request->quiz_id,
            'question_title' => $request->question_title,
            'feedback' => $request->feedback,
        ]);
        return redirect('/addQuiz')->with('status', 'Your data has been submitted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuizQuestions  $quizQuestions
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $quiz_id)
    {
        QuizQuestions::where('questions_id', '=', $id)->delete();
        QuizAnswerOption::where('question_id', '=', $id)->delete();
        QuizQuestionsBank::where('question_id', '=', $id)->delete();
        $Quiz_Questions = QuizQuestions::where('quiz_id', $quiz_id)->get();
        return json_encode($Quiz_Questions);

        // return json_encode(array('status' => true, 'message' => 'Sucessfully deleted.'));
    }
}
