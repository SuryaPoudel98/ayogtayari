<?php

namespace App\Http\Controllers;

use App\Models\CourseReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseReview = CourseReview::all();
        return json_encode($courseReview);
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
        CourseReview::where('id', '=', $request->course_review_id)->delete();
        $courseReview = new CourseReview;
        $courseReview->course_id = $request->course_id;
        $courseReview->star = $request->star;
        $courseReview->description = $request->description;
        $courseReview->user_id =  101; // this is to be done from user_id
        $courseReview->save();
        // return redirect('/addcourse')->with('status'.'Your data has been submitted successfully');
        $CourseNote = CourseReview::where('course_id', $request->course_id)->get();
        return json_encode($CourseNote);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseReview  $courseReview
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $courseReview = CourseReview::where('id', $id)->get();
        return json_encode($courseReview);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseReview  $courseReview
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $courseReview  = CourseReview::where('id', $id)->edit();
        return json_encode($courseReview);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseReview  $courseReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseReview $courseReview)
    {
        CourseReview::where('id', '=', $request->id)->update([
            'course_id' => $request->course_id,
            'star' => $request->star,
            'description' => $request->description,
            'user_id' => $request->user_id,

        ]);
        return json_encode(array('status' => true, 'message' => 'Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseReview  $courseReview
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $courseId)
    {
        CourseReview::where('id', '=', $id)->delete();
        // return json_encode(array('status' => true, 'message' => 'Sucessfully deleted.'));
        $CourseReview = CourseReview::where('course_id', $courseId)->get();
        return json_encode($CourseReview);
    }
}
