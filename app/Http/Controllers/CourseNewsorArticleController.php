<?php

namespace App\Http\Controllers;

use App\Models\CourseNewsorArticle;
use Illuminate\Http\Request;

class CourseNewsorArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseNewsorArticle = CourseNewsorArticle::all();
        return json_encode($courseNewsorArticle);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CourseNewsorArticle::where('id', '=', $request->course_blog_id)->delete();
        $courseNewsorArticle = new CourseNewsorArticle;
        $courseNewsorArticle->course_id = $request->course_id;
        $courseNewsorArticle->blog_id = $request->blog_id;
        $courseNewsorArticle->enableornot = $request->enableornot;
        $courseNewsorArticle->display_name = $request->display_name;
        $courseNewsorArticle->save();
        $CourseMcqs = \DB::table('blogs')
            ->join('course_newsor_articles', 'course_newsor_articles.blog_id', '=', 'blogs.id')
            ->select('course_newsor_articles.*', 'blog_title')
            ->where('course_newsor_articles.course_id', $request->course_id)
            ->get();

        // $CourseMcqs = CourseMcqs::where('course_id', $request->course_id)->get();
        return json_encode($CourseMcqs);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseNewsorArticle  $courseNewsorArticle
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $courseNewsorArticle = CourseNewsorArticle::where('id', $id)->get();
        return json_encode($courseNewsorArticle);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseNewsorArticle  $courseNewsorArticle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courseNewsorArticle  = CourseNewsorArticle::where('id', $id)->edit();
        return json_encode($courseNewsorArticle);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseNewsorArticle  $courseNewsorArticle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseNewsorArticle $courseNewsorArticle)
    {

        CourseNewsorArticle::where('id', '=', $request->id)->update([
            'course_id' => $request->course_id,
            'blog_id' => $request->blog_id,
            'enableornot' => $request->enableornot,
            'display_name' => $request->display_name,

        ]);
        return json_encode(array('status' => true, 'message' => 'Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseNewsorArticle  $courseNewsorArticle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $courseId)
    {
        CourseNewsorArticle::where('id', '=', $id)->delete();
        // return json_encode(array('status' => true, 'message' => 'Sucessfully deleted.'));
        $CourseMcqs = \DB::table('blogs')
            ->join('course_newsor_articles', 'course_newsor_articles.blog_id', '=', 'blogs.id')
            ->select('course_newsor_articles.*', 'blog_title')
            ->where('course_newsor_articles.course_id', $courseId)
            ->get();

        return json_encode($CourseMcqs);
    }
}
