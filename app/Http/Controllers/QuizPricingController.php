<?php

namespace App\Http\Controllers;

use App\Models\QuizPricing;
use Illuminate\Http\Request;

class QuizPricingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizPricing = QuizPricing::all();
        return json_encode($quizPricing);
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
        $quizPricing = new QuizPricing;
        $quizPricing->quiz_id = $request->quiz_id;
        $quizPricing->no_of_days = $request->no_of_days;
        $quizPricing->normal_price = $request->normal_price;
        $quizPricing->sell_price = $request->sell_price;
        $quizPricing->sell_exipiry = $request->sell_exipiry;
        $quizPricing->save();
        return redirect('/addQuiz')->with('status', 'Your data has been submitted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuizPricing  $quizPricing
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quizPricing = QuizPricing::where('quiz_pricing_id', $id)->get();
        return json_encode($quizPricing);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuizPricing  $quizPricing
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $quizPricing  = QuizPricing::where('quiz_pricing_id', $id)->edit();
        return json_encode($quizPricing);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuizPricing  $quizPricing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuizPricing $quizPricing)
    {
        QuizPricing::where('quiz_pricing_id', '=', $request->quiz_pricing_id)->update([
            'quiz_id' => $request->quiz_id,
            'no_of_days' => $request->no_of_days,
            'normal_price' => $request->normal_price,
            'sell_price' => $request->sell_price,
            'sell_exipiry' => $request->sell_exipiry,



        ]);
        return json_encode(array('status' => true, 'message' => 'Successfully Updated.'));
    }

    public function selectquizpricing(Request $request)
    {
        $coursePricing = QuizPricing::where('quiz_id', $request->get('query'))->get();
        return json_encode($coursePricing);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuizPricing  $quizPricing
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        QuizPricing::where('quiz_pricing_id', '=', $id)->delete();
        return json_encode(array('status' => true, 'message' => 'Sucessfully deleted.'));
    }
}
