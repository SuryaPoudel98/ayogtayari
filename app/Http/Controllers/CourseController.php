<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseAuthor;
use App\Models\CourseCatagory;
use App\Models\CourseChildCatagory;
use App\Models\CourseCurriculumn;
use App\Models\CourseNote;
use App\Models\CourseOther;
use App\Models\CoursePricing;
use App\Models\CourseReview;
use App\Models\CourseSubCatagory;
use App\Models\CourseVideo;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $course = Course::select('*')->get();
        $courseCatagory = CourseCatagory::select('*')->get();
        $courseSubCatagory = CourseSubCatagory::select('*')->get();
        $courseChildcatagory = CourseChildCatagory::select('*')->get();
        $Teacher = Teacher::select('*')->get();
        return view('course.add', compact('courseCatagory', 'courseSubCatagory', 'courseChildcatagory',  'Teacher'));
    }


    // public function editCourse($id)
    // {
    //     $course = Course::select('*')->where('course_id',$id)->get();



    //     //
    //     return $course;
    // }
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

        // return $request->items;


        // return count($coursePricingsArray);

        if ($request->edit_course_id != "") {
            Course::where('course_id', '=', $request->edit_course_id)->update([
                'cid' => $request->cid,
                's_cid' => $request->s_cid,
                'child_catagory_id' => $request->child_catagory_id,
                'course_price' => $request->course_price,
                'course_title' => $request->course_title,
                'thumbnail' => $request->thumbnail,
                'course_description' => $request->course_description,
                'course_video_duration' => $request->course_video_duration,
                'allow_review' => $request->allow_review,
                'discussion_with_teacher' => $request->discussion_with_teacher,
                'allow_file_attach_for_discussion' => $request->allow_file_attach_for_discussion,
            ]);
            CoursePricing::where('course_id', '=', $request->edit_course_id)->delete();
            $courseId = $request->edit_course_id;
            $coursePricingsArray = explode(',', $request->items);
            if ($request->items != "") {
                for ($i = 0; $i < count($coursePricingsArray); $i++) {
                    $val = explode('{#}', $coursePricingsArray[$i]);
                    $coursePricing = new CoursePricing();
                    $coursePricing->course_id = $courseId;
                    $coursePricing->no_of_days = $val[0];
                    $coursePricing->normal_price = $val[1];
                    $coursePricing->sell_price = $val[2];
                    $coursePricing->sell_exipiry_date = $val[3];
                    $coursePricing->save();
                }
            }
            CourseAuthor::where('course_id', '=', $request->edit_course_id)->delete();
            $teacherArray = explode(',', $request->item);
            for ($i = 0; $i < count($teacherArray); $i++) {
                $val = explode('{#}', $teacherArray[$i]);
                $teacherId = explode('[#]', $val[0]);
                $courseAuthor = new CourseAuthor();
                $courseAuthor->course_id = $courseId;
                $courseAuthor->teacher_id = $teacherId[0];
                $courseAuthor->save();
            }
            return json_encode(array(
                'status' => true, 'message' => "Successfully done.", 'course_id' => $courseId
            ));
        } else {
            $course = new Course;
            $course->cid = $request->cid;
            $course->s_cid = $request->s_cid;
            $course->child_catagory_id = $request->child_catagory_id;
            $course->course_price = $request->course_price;
            $course->course_title = $request->course_title;
            $course->thumbnail = $request->thumbnail;
            $course->course_description = $request->course_description;
            $course->course_video_duration = $request->course_video_duration;
            $course->allow_review = $request->allow_review;
            $course->discussion_with_teacher = $request->discussion_with_teacher;
            $course->allow_file_attach_for_discussion = $request->allow_file_attach_for_discussion;
            $course->save();


            $course_id = Course::select('course_id')->orderBy('created_at', 'desc')->first();
            $courseId = $course_id->course_id;
            $coursePricingsArray = explode(',', $request->items);

            if ($request->items != "") {
                for ($i = 0; $i < count($coursePricingsArray); $i++) {
                    $val = explode('{#}', $coursePricingsArray[$i]);
                    $coursePricing = new CoursePricing();
                    $coursePricing->course_id = $courseId;
                    $coursePricing->no_of_days = $val[0];
                    $coursePricing->normal_price = $val[1];
                    $coursePricing->sell_price = $val[2];
                    $coursePricing->sell_exipiry_date = $val[3];
                    $coursePricing->save();
                }
            }




            $teacherArray = explode(',', $request->item);
            for ($i = 0; $i < count($teacherArray); $i++) {
                $val = explode('{#}', $teacherArray[$i]);
                $teacherId = explode('[#]', $val[0]);
                $courseAuthor = new CourseAuthor();
                $courseAuthor->course_id = $courseId;
                $courseAuthor->teacher_id = $teacherId[0];
                $courseAuthor->save();
            }
            return json_encode(array(
                'status' => true, 'message' => "Successfully done.", 'course_id' => $courseId
            ));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::where('course_id', $id)->get();
        return view('/listcourse');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course  = Course::select("*")->where('course_id', $id)->get();
        // return json_encode($course);
        $courseCatagory = CourseCatagory::select('*')->get();
        $courseSubCatagory = CourseSubCatagory::select('*')->get();
        $courseChildcatagory = CourseChildCatagory::select('*')->get();
        $Teacher = Teacher::select('*')->get();


        $course_authers = DB::table('course_authors')
            ->join('teachers', 'teachers.teacher_id', '=', 'course_authors.teacher_id')
            ->select('course_authors.*', 'teachers.fullname')
            ->where('course_authors.course_id', $course[0]->course_id)
            ->get();

        $course_pricing = CoursePricing::select('*')->where('course_id', $course[0]->course_id)->get();
        $courseId = $course[0]->course_id;
        $courseCirriculumn = CourseCurriculumn::where('course_id', $courseId)->get();
        $CourseMcqs = \DB::table('quizzes')
            ->join('course_mcqs', 'course_mcqs.quiz_id', '=', 'quizzes.quiz_id')
            ->select('course_mcqs.*', 'quiz_title')
            ->where('course_mcqs.course_id', $courseId)
            ->get();
        $CourseVideo = CourseVideo::where('course_id', $courseId)->get();
        $CourseNote = CourseNote::where('course_id', $courseId)->get();
        $CourseReview = CourseReview::where('course_id', $courseId)->get();
        $News = \DB::table('blogs')
            ->join('course_newsor_articles', 'course_newsor_articles.blog_id', '=', 'blogs.id')
            ->select('course_newsor_articles.*', 'blog_title')
            ->where('course_newsor_articles.course_id', $courseId)
            ->get();
        $Others = CourseOther::where('course_id', $courseId)->get();
        return view('course.add', compact('courseCatagory', 'courseSubCatagory', 'courseChildcatagory', 'course',  'Teacher', 'course_authers', 'course_pricing', 'courseCirriculumn', 'CourseMcqs', 'CourseVideo', 'CourseNote', 'CourseReview', 'News', 'Others'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        Course::where('course_id', '=', $request->course_id)->update([
            'cid' => $request->cid,
            's_cid' => $request->s_cid,
            'child_catagory_id' => $request->child_catagory_id,
            'course_price' => $request->course_price,
            'course_title' => $request->course_title,
            'thumbnail' => $request->thumbnail,
            'course_description' => $request->course_description,
            'course_video_duration' => $request->course_video_duration,
            'allow_review' => $request->allow_review,
            'discussion_with_teacher' => $request->discussion_with_teacher,
            'allow_file_attach_for_discussion' => $request->allow_file_attach_for_discussion,


        ]);
        return json_encode(array('status' => true, 'message' => 'Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::where('course_id', '=', $id)->delete();
        return redirect('/listcourse');
    }
    public function list()
    {
        $course = DB::table('courses')
            ->join('course_catagories', 'courses.cid', '=', 'course_catagories.cid')
            ->join('course_sub_catagories', 'courses.s_cid', '=', 'course_sub_catagories.s_cid')
            ->join('course_child_catagories', 'courses.child_catagory_id', '=', 'course_child_catagories.child_catagory_id')
            ->select('courses.*', 'course_catagories.catagory_name', 'course_child_catagories.child_catagory_name', 'course_sub_catagories.sub_catagory_name')
            ->get();
        return view('course.list', compact('course'));
    }
}
