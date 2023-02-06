<?php

namespace App\Http\Controllers;

use App\Models\blogComment;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'fullname' => ['required', 'string', 'max:16', 'min:5'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'comment' => ['required', 'string', 'min:6'],
        ]);
        $blog = new blogComment();
        $blog->fullname = $request->fullname;
        $blog->email = $request->email;
        $blog->comment = $request->comment;
        $blog->accept = 0;
        $blog->blog_id = $request->blog_id;
        $blog->save();
        return redirect()->back()->with('message', 'IT WORKS!');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function show(blogComment $blogComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function edit(blogComment $blogComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blogComment $blogComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(blogComment $blogComment)
    {
        //
    }
}
