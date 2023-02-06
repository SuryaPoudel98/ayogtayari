<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Payments;
use App\Models\Quiz;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users=User::select('*')->get();
        $course=Course::select('*')->get();
        $quiz=Quiz::select('*')->get();
        return view('payment.add',compact('users','course','quiz'));
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
        $payments = new Payments();
        $payments->user_id = $request->user_id;
        $payments->course_id = $request->course_id;
        $payments->quiz_id = $request->quiz_id;
        $payments->status = $request->status;
        $payments->amounts = $request->amounts;
        $payments->date = $request->date;
        $payments->save();
        return redirect('/addPayment');




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payments = Payments::where('payment_id', $id)->get();
        return json_encode($payments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payments  = Payments::where('payment_id', $id)->edit();
        return json_encode($payments);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payments $payments)
    {
        Payments::where('payment_id', '=', $request->payment_id)->update([
            'user_id' => $request->user_id,
            'course_id' => $request->course_id,
            'quiz_id' => $request->quiz_id,
            'status' => $request->status,
            'amounts' => $request->amounts,
            'date' => $request->date,
            
        ]);
        return json_encode(array('status' => true, 'message' => 'Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Payments::where('payment_id','=',$id)->delete();
        return json_encode(array('status' => true, 'message' => 'Sucessfully deleted.'));
    }
}
