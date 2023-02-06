<?php

namespace App\Http\Controllers;

use App\Models\CourseChildCatagory;
use App\Models\CourseSubCatagory;
use Illuminate\Http\Request;

class CourseChildCatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coursechildcatagory=CourseSubCatagory::select('*')->get();
        return view('coursecatagory.add',compact('coursechildcatagory'));
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
        $coursechildcatagory = new CourseChildCatagory;
        $coursechildcatagory->s_cid = $request->s_cid;
        $coursechildcatagory->child_catagory_name = $request->child_catagory_name;
        $coursechildcatagory->save();
       
        return redirect('/coursecatagory?id=coursechildcatagory');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseChildCatagory  $courseChildCatagory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coursechildcatagory=CourseChildCatagory::where('child_catagory_id',$id)->get();
        return json_encode($coursechildcatagory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseChildCatagory  $courseChildCatagory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=CourseSubCatagory::select('*')->get();
        $coursechildcatagory  = CourseChildCatagory::where('child_catagory_id',$id)->first();
        return view('coursecatagory.childcatagoryedit',compact('coursechildcatagory','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseChildCatagory  $courseChildCatagory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseChildCatagory $courseChildCatagory)
    {
        CourseChildCatagory::where('child_catagory_id','=',$request->child_catagory_id)->update([
            'child_catagory_name' =>$request->child_catagory_name,
            's_cid' =>$request->s_cid,

        ]);
        return redirect('/coursecatagory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseChildCatagory  $courseChildCatagory
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        CourseChildCatagory::where('child_catagory_id','=',$id)->delete();
        return redirect('/coursecatagory');
    }
}
