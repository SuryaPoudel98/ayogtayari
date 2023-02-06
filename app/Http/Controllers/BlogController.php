<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\CourseCatagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = DB::table('blogs')
            ->join('course_catagories', 'blogs.cid', '=', 'course_catagories.cid')
            ->select('blogs.*', 'course_catagories.catagory_name')
            ->get();
        $course = CourseCatagory::select('*')->get();
        return view('blog.add', compact('course', 'blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $blog = new Blog();
        $blog->cid = $request->cid;
        $blog->description = $request->description;
        $blog->thumbnail = $request->thumbnail;
        $blog->save();
        return json_encode(array(
            'status' => true, 'message' => "Successfully done."
        ));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $blog = new Blog();
        $blog->blog_title = $request->blog_title;
        $blog->cid = $request->cid;
        $blog->description = $request->description;
        $blog->thumbnail = $request->file_upload_course_thumbnail;
        $blog->fewParagraph = $request->fewParagraph;
        $blog->save();
        return redirect('/addBlog');
    }



    public function searchBlog(Request $request)
    {
        $blog = Blog::select('*')->where('blog_title', 'LIKE', '%' . $request->get('query') . '%')->get(10);
        return json_encode($blog);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::where('id', $id)->get();
        return json_encode($blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = CourseCatagory::select('*')->get();
        $blog  = Blog::where('id', $id)->first();
        return view('blog.edit', compact('blog', 'course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       // dd($request->all());
        Blog::where('id', '=', $id)->update([
            'cid' => $request->cid,
            'blog_title' => $request->blog_title,
            'description' => $request->description,
            'thumbnail' => $request->file_upload_course_thumbnail,
            'fewParagraph' => $request->fewParagraph,

        ]);
        return redirect('/addBlog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::where('id', '=', $id)->delete();
        return redirect('/addBlog');
    }
}
