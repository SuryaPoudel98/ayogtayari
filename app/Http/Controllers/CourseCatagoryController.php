<?php

namespace App\Http\Controllers;

use App\Models\CourseCatagory;
use Illuminate\Http\Request;

class CourseCatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $courseCatagory=CourseCatagory::all();
        return json_encode($courseCatagory);
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
        $courseCatagory = new CourseCatagory;
        $courseCatagory->catagory_name = $request->catagory_name;
        $courseCatagory->save();
        return redirect('/coursecatagory')->with('status','Your data has been saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseCatagory  $courseCatagory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $courseCatagory=CourseCatagory::where('cid',$id)->get();
        return json_encode($courseCatagory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseCatagory  $courseCatagory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courseCatagory  = CourseCatagory::where('cid',$id)->first();
        return view('coursecatagory.catagoryedit',compact('courseCatagory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseCatagory  $courseCatagory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseCatagory $courseCatagory)
    {
        CourseCatagory::where('cid','=',$request->cid)->update([
            'catagory_name' =>$request->catagory_name,

        ]);
        return redirect('/coursecatagory');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseCatagory  $courseCatagory
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        CourseCatagory::where('cid','=',$id)->delete();
        return redirect('/coursecatagory');
    }
    }

