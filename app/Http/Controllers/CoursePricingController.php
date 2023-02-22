<?php

namespace App\Http\Controllers;

use App\Models\CoursePricing;
use Illuminate\Http\Request;

class CoursePricingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coursePricing = CoursePricing::all();
        return json_encode($coursePricing);
    }

    public function selectcoursepricing(Request $request)
    {
        $coursePricing = CoursePricing::where('course_id', $request->get('query'))->get();
        return json_encode($coursePricing);
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
        $coursePricing = new CoursePricing;
        $coursePricing->course_id = $request->course_id;
        $coursePricing->no_of_days = $request->no_of_days;
        $coursePricing->normal_price = $request->normal_price;
        $coursePricing->sell_exipiry_date = $request->sell_exipiry_date;
        $coursePricing->save();
        return redirect('/addcourse')->with('status' . 'Your data has been submitted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CoursePricing  $coursePricing
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coursePricing = CoursePricing::where('course_pricing_id', $id)->get();
        return json_encode($coursePricing);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CoursePricing  $coursePricing
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coursePricing  = CoursePricing::where('course_pricing_id', $id)->edit();
        return json_encode($coursePricing);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CoursePricing  $coursePricing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CoursePricing $coursePricing)
    {
        CoursePricing::where('course_pricing_id', '=', $request->course_pricing_id)->update([
            'course_id' => $request->course_id,
            'no_of_days' => $request->no_of_days,
            'normal_price' => $request->normal_price,
            'sell_exipiry_date' => $request->sell_exipiry_date,


        ]);
        return json_encode(array('status' => true, 'message' => 'Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CoursePricing  $coursePricing
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CoursePricing::where('course_pricing_id', '=', $id)->delete();
        return json_encode(array('status' => true, 'message' => 'Sucessfully deleted.'));
    }
}
