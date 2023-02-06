<?php

namespace App\Http\Controllers;

use App\Models\QuestionsBank;
use Illuminate\Http\Request;

class QuestionsBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $questionsBank = QuestionsBank::all();
        return view('questionbank.add', compact('questionsBank'));
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
        $questionsBank = new QuestionsBank;
        $questionsBank->question_bank_name = $request->question_bank_name;
        $questionsBank->save();
        return redirect('/questionbank')->with('status', 'Your data has been submitted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuestionsBank  $questionsBank
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questionsBank = QuestionsBank::where('question_bank_id', $id)->get();
        return json_encode($questionsBank);
    }


    public function searchQuestionBank(Request $request)
    {

        $bank = QuestionsBank::select('*')->where('question_bank_name', 'LIKE', '%' . $request->get('query') . '%')->get(10);
        return json_encode($bank);
        # code...
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuestionsBank  $questionsBank
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questionsBank  = QuestionsBank::where('question_bank_id', $id)->first();
        // dd($questionsBank);
        return view('questionbank.edit', compact('questionsBank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuestionsBank  $questionsBank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuestionsBank $questionsBank)
    {
        QuestionsBank::where('question_bank_id', '=', $request->question_bank_id)->update([
            'question_bank_name' => $request->question_bank_name,
        ]);

        return redirect('/questionbank');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuestionsBank  $questionsBank
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        QuestionsBank::where('question_bank_id', '=', $id)->delete();
        return redirect('/questionbank');
    }
}
