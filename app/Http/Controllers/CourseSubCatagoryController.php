<?php

namespace App\Http\Controllers;

use App\Models\CourseCatagory;
use App\Models\CourseChildCatagory;
use App\Models\CourseSubCatagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseSubCatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $subCatagory = CourseCatagory::select('*')->get();



        $courseChildCatagory = DB::table('course_child_catagories')

            ->join('course_sub_catagories', 'course_child_catagories.s_cid', '=', 'course_sub_catagories.s_cid')
            ->select('course_child_catagories.*', 'course_sub_catagories.sub_catagory_name')
            ->get();
        $courseSubCatagory = DB::table('course_sub_catagories')

            ->join('course_catagories', 'course_sub_catagories.cid', '=', 'course_catagories.cid')
            ->select('course_sub_catagories.*', 'course_catagories.catagory_name')
            ->get();
        return view('coursecatagory.add', compact('subCatagory', 'courseSubCatagory', 'courseChildCatagory'));
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

        $subCatagory = new CourseSubCatagory();
        $subCatagory->cid = $request->cid;
        $subCatagory->sub_catagory_name = $request->sub_catagory_name;
        $subCatagory->save();
        return redirect('/coursecatagory?id=coursesubcategory')->with('status', 'coursesubcategory');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseSubCatagory  $courseSubCatagory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subCatagory = CourseSubCatagory::where('s_cid', $id)->get();
        return json_encode($subCatagory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseSubCatagory  $courseSubCatagory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = CourseCatagory::select('*')->get();
        $subCatagory  = CourseSubCatagory::where('s_cid', $id)->first();
        return view('coursecatagory.subcatagoryedit', compact('subCatagory', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseSubCatagory  $courseSubCatagory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseSubCatagory $courseSubCatagory)
    {
        CourseSubCatagory::where('s_cid', '=', $request->s_cid)->update([
            'sub_catagory_name' => $request->sub_catagory_name,
            'cid' => $request->cid,

        ]);
        return redirect('/coursecatagory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseSubCatagory  $courseSubCatagory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CourseSubCatagory::where('s_cid', '=', $id)->delete();
        return redirect('/coursecatagory');
    }
}
