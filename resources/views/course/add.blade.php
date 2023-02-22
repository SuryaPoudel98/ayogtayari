@extends('welcome')
@section('content')

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <form role="search" class="sr-input-func">
                                    <input type="text" placeholder="Search..." class="search-int form-control">
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod"> Courses </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <ul id="myTabedu1" style="line-height:50px;" class="tab-review-design">
                        <li class="active" id="coursetab"><a onclick="hideCourseTab();" href="#course"> Course
                                Settings</a></li>
                        <li id="curriculumntab"><a onclick="displayCourseTab();" href="#curriculumn"> Course Tabs</a>
                        </li>
                        <!-- <li><a onclick="hideCourseTab();" href="#others">Other Settings</a></li> -->
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">

                        <div id="courseTabForAll" style="display: none;">
                            <ul id="myTabedu1" style="line-height:50px;" class="tab-review-design">
                                <li id="curriculumtab" class="active"><a href="#curriculumn">Curriculumn</a></li>
                                <li id="mcqstab"><a href="#mcqs"> MCQs</a></li>
                                <li id="videotab"><a href="#video"> Video</a></li>
                                <li id="notetab"><a href="#note"> Note</a></li>
                                <li id="reviewtab"><a href="#review"> Review</a></li>
                                <li id="newsorarticletab"><a href="#newsorarticle">News or Article</a></li>
                                <li id="othertab"><a href="#other">Others</a></li>
                            </ul>
                        </div>

                        <div class="product-tab-list tab-pane fade active in" id="course">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad addcoursepro">
                                            <form method="POST" class="dropzone dropzone-custom needsclick addcourse"
                                                id="demo1-upload">
                                                @csrf
                                                @method('PUT')

                                                <input type="hidden" id="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="edit_course_id" id="edit_course_id"
                                                    value="{{@$course[0]->course_id}}">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label class="form-check-label">Course Title</label>
                                                            <input name="course_title"
                                                                value="{{@$course[0]->course_title}}" id="course_title"
                                                                type="text" class="form-control"
                                                                placeholder="Course Title">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-check-label">Course Thumbnail</label>
                                                            <input name="thumbnail" id="course_thumbnail" type="file"
                                                                class="form-control">
                                                            <input type="hidden" value="{{@$course[0]->thumbnail}}"
                                                                name="file_upload_course_thumbnail"
                                                                id="file_upload_course_thumbnail" />
                                                            @if(@$course[0]->thumbnail!="")
                                                            <img src="/uploads/Postimg/{{@$course[0]->thumbnail}}"
                                                                style="text-align: center;" id="course_thumbnail_img"
                                                                height="100" width="100" />

                                                            @else
                                                            <img src="thumbnail.png" style="text-align: center;"
                                                                id="course_thumbnail_img" height="100" width="100" />

                                                            @endif

                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-check-label">Course Catagory</label>
                                                            <select class="form-control select3 select2-danger" id="cid"
                                                                name="cid" data-dropdown-css-class="select2-danger"
                                                                style="width: 100%;" required>
                                                                <option value="0">Select course category</option>
                                                                @foreach($courseCatagory as $item)
                                                                <option value="{{$item->cid}}" <?php if (@$course[0]->cid == $item->cid) {
                                                                                                    echo 'selected';
                                                                                                } ?>>
                                                                    {{$item->catagory_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-check-label">Course Sub Catagory</label>
                                                            <select class="form-control select3 select2-danger"
                                                                id="s_cid" name="s_cid"
                                                                data-dropdown-css-class="select2-danger"
                                                                style="width: 100%;" required>
                                                                <option value="0">Select course sub category</option>
                                                                @foreach($courseSubCatagory as $item)
                                                                <option value="{{$item->s_cid}}" <?php if (@$course[0]->s_cid == $item->s_cid) {
                                                                                                        echo 'selected';
                                                                                                    } ?>>
                                                                    {{$item->sub_catagory_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="form-check-label">Course Sub Child
                                                                Catagory</label>
                                                            <select class="form-control select3 select2-danger"
                                                                id="child_catagory_id" name="child_catagory_id"
                                                                data-dropdown-css-class="select2-danger"
                                                                style="width: 100%;" required>
                                                                <option value="0">Select course child category</option>
                                                                @foreach($courseChildcatagory as $item)
                                                                <option value="{{$item->child_catagory_id}}" <?php if (@$course[0]->child_catagory_id == $item->child_catagory_id) {
                                                                                                                    echo 'selected';
                                                                                                                } ?>>
                                                                    {{$item->child_catagory_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-check-label">Course Pricing</label>
                                                            <select onchange="coursePricingListing();"
                                                                class="form-control select3 select2-danger"
                                                                id="coursePrice" name="coursePrice"
                                                                data-dropdown-css-class="select2-danger"
                                                                style="width: 100%;" required>
                                                                <option value="">Select Course Pricing</option>
                                                                <option <?php if (@$course[0]->course_price == 0) {
                                                                            echo 'selected';
                                                                        } ?> value="0">Free</option>
                                                                <option value="1" <?php if (@$course[0]->course_price == 1) {
                                                                                        echo 'selected';
                                                                                    } ?>>Paid</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="course_pricing_content" <?php if (@$course[0]->course_price == 1) {
                                                                                                                echo 'style="display:block;"';
                                                                                                            } else {
                                                                                                                echo 'style="display:none;"';
                                                                                                            } ?>>


                                                            <div class="col-sm-3"><input name="noOfDays" id="noOfDays"
                                                                    type="text" class="form-control"
                                                                    placeholder="No Of Days"></div>
                                                            <div class="col-sm-3"><input name="normalPrice"
                                                                    id="normalPrice" type="text" class="form-control"
                                                                    placeholder="Normal Price"></div>
                                                            <div class="col-sm-3"><input name="sellPrice" id="sellPrice"
                                                                    type="text" class="form-control"
                                                                    placeholder="Sell Price"></div>
                                                            <div class="col-sm-3"><input name="exDate" id="exDate"
                                                                    type="hidden" class="form-control"
                                                                    placeholder="Expiry Date"></div>
                                                            <div class="col-sm-1"><input value="Add"
                                                                    onclick=showItems();
                                                                    class="btn btn-primary waves-effect waves-light"
                                                                    type="button"></input></div>
                                                            <div class="form-group" style="display: block;">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>No Of Days</th>
                                                                            <th>Normal Price</th>
                                                                            <th>Sell Price</th>
                                                                            <th>Ex Date</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="datatable">

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="form-group">&nbsp;</div> -->
                                                        <div class="form-group">
                                                            <div style="display: flex;">
                                                                <div style="width: 90%; margin-right:10px;">
                                                                    <label class="form-check-label">Course
                                                                        Author</label>
                                                                    <select class="form-control select3 select2-danger"
                                                                        id="authername" name="authername"
                                                                        data-dropdown-css-class="select2-danger"
                                                                        required>

                                                                        <option value="">Select Author</option>
                                                                        @foreach($Teacher as $item)
                                                                        <option
                                                                            value="{{$item->teacher_id}}[#]{{$item->fullname}}">
                                                                            {{$item->fullname}}</option>
                                                                        @endforeach
                                                                    </select>

                                                                </div>

                                                                <div>
                                                                    <input style="margin-top:25px" value="Add"
                                                                        onclick=teacherItems();
                                                                        class="btn btn-success waves-effect waves-light"
                                                                        type="button"></input>
                                                                </div>

                                                            </div>



                                                        </div>
                                                        <div class="form-group">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Authors</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="datatableTeacher">


                                                                </tbody>
                                                            </table>
                                                        </div>



                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">


                                                        <div class="form-group">

                                                            <div class="alert-title">
                                                                <h2>Description</h2>

                                                            </div>
                                                            <div id="summernote2" style="display: none;">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-check-label">Course
                                                                Video Duration</label>
                                                            <input type="text" name="course_video_duration"
                                                                value="{{@$course[0]->course_video_duration}}"
                                                                id="course_video_duration" class="form-control"
                                                                placeholder="Video Duration">
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <input type="checkbox" <?php if (@$course[0]->discussion_with_teacher == 1) {
                                                                                            echo 'checked';
                                                                                        } ?>
                                                                    id="discussion_with_teacher" value="1"
                                                                    class="form-check-input">
                                                                <label class="form-check-label">Teacher
                                                                    Disscussion</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="checkbox" <?php if (@$course[0]->allow_review == 1) {
                                                                                            echo 'checked';
                                                                                        } ?> id="allow_review"
                                                                    value="1" class="form-check-input">
                                                                <label class="form-check-label">Allow Review</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="checkbox" <?php if (@$course[0]->allow_file_attach_for_discussion == 1) {
                                                                                            echo 'checked';
                                                                                        } ?>
                                                                    id="allow_file_attach_for_discussion" value="1"
                                                                    class="form-check-input">
                                                                <label class="form-check-label">Allow File For
                                                                    Disccussion</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-2">
                                                                <div class="payment-adress">
                                                                    <!-- <a href="#curriculumn">dfsaf</a> -->
                                                                    <input value="Save Course Setting" type="button"
                                                                        onclick="saveCourseSetting();"
                                                                        class="btn btn-primary waves-effect waves-light"></input>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="product-tab-list tab-pane fade" id="curriculumn">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">

                                        <form class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                            <div class="row">
                                                <input type="hidden" id="course_id" name="course_id"
                                                    value="{{@$course[0]->course_id}}">
                                                <input type="hidden" id="course_curriculumn_id"
                                                    name="course_curriculumn_id" value="">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                    <div class="devit-card-custom">
                                                        <div class="form-group">
                                                            <label class="form-check-label">Title</label>
                                                            <input type="text" name="display_name"
                                                                id="display_name_curriculumn" class="form-control"
                                                                placeholder=" Display Name">
                                                        </div>
                                                        <div class="form-group">
                                                        <label class="form-check-label">Lesson Curriculumn</label>
                                                            <input type="text" name="lesson" id="lesson_curriculumn"
                                                                class="form-control" placeholder="Lesson">
                                                        </div>
                                                        <div class="form-group">
                                                        <label class="form-check-label"> Sub Lesson Curriculumn</label>
                                                            <input type="text" class="form-control"
                                                                id="sub_lesson_curriculumn" name="sub_lesson"
                                                                placeholder="Sub Lesson">
                                                        </div>
                                                        <div class="form-group">
                                                        <label class="form-check-label"> Child Lesson Curriculumn</label>
                                                            <input type="text" class="form-control"
                                                                id="child_lesson_curriculumn" name="child_lesson"
                                                                placeholder="Child Lesson">
                                                        </div>
                                                        <div class="form-group">
                                                            <!-- <div class="form-check">
                                                                <input type="checkbox" class="form-check-input">
                                                                <label class="form-check-label">Enable Drip Content</label>
                                                            </div> -->
                                                            <div class="form-check">
                                                                <input type="checkbox" id="enablereview" value="1"
                                                                    class="form-check-input">
                                                                <label class="form-check-label">Enable Preview</label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                    <div class="devit-card-custom">
                                                        <div class="form-group">
                                                            <div class="alert-title">
                                                                <h2>Description</h2>
                                                            </div>
                                                            <div id="summernote1" style="display: none;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-1">
                                                            <div class="payment-adress">
                                                                <button type="button" onclick="saveCurriculumn();"
                                                                    class="btn btn-primary waves-effect waves-light">Save
                                                                    Course Curriculumn</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>


                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="hpanel shadow-inner responsive-mg-b-30">
                                        <div class="panel-body">
                                            <div class="table-responsive wd-tb-cr">
                                                <table class="table table-striped" id="DataTableCurriculumn">
                                                    <thead>
                                                        <tr>
                                                            <th>Lesson</th>
                                                            <th>Sub Lesson </th>
                                                            <th>Child Lesson</th>
                                                            <th>&nbsp;</th>
                                                            <!-- <th>Profession</th> -->
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @if(!empty($courseCirriculumn))
                                                        @foreach($courseCirriculumn as $item)

                                                        <tr>
                                                            <td>{{$item->lesson}}</td>
                                                            <td>{{$item->sub_lesson }}</td>
                                                            <td>{{$item->child_lesson}}</td>
                                                            <td>
                                                                <div id="currricullmn{{$item->id}}"
                                                                    style="display:none;">{!! $item->description !!}
                                                                </div>
                                                            </td>
                                                            <td><a style="font-size:20px;" href="javascript:;"
                                                                    onclick="editCurriCullmn('{{$item->id}}','{{$item->display_name}}','{{$item->lesson}}','{{$item->sub_lesson}}','{{$item->child_lesson}}', '{{$item->lesson_preview}}')"
                                                                    data-toggle="tooltip" title="" class="pd-setting-ed"
                                                                    data-original-title="Edit"><i
                                                                        class="fa fa-pencil-square-o"
                                                                        aria-hidden="true"></i></a>&nbsp;&nbsp;<a
                                                                    style="font-size:20px;" href="javascript:;"
                                                                    onclick="deleteCurricullmn('{{$item->id }}','{{$item->course_id}}');"
                                                                    id="basicError" data-toggle="tooltip" title=""
                                                                    class="pd-setting-ed" data-original-title="Trash"><i
                                                                        class="fa fa-trash-o"
                                                                        aria-hidden="true"></i></a></td>
                                                        </tr>
                                                        @endforeach

                                                        @endif

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade" id="mcqs">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">

                                        <form class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                    <div class="devit-card-custom">
                                                        
                                                        <input type="hidden" name="course_mcqs_id" id="course_mcqs_id"
                                                            value="">
                                                        <div class="form-group">
                                                        <label class="form-check-label"> Title</label>
                                                            <input type="text" name="display_name" id="mcqsdisplay_name"
                                                                class="form-control" placeholder=" Display Name">
                                                        </div>
                                                        <div class="form-group">
                                                        <label class="form-check-label">MCQS Lesson</label>
                                                            <input type="text" name="lesson" id="mcqslesson"
                                                                class="form-control" placeholder="Lesson">
                                                        </div>
                                                        <div class="form-group">
                                                        <label class="form-check-label">MCQS Sub Lesson</label>
                                                            <input type="text" class="form-control" id="mcqssub_lesson"
                                                                name="sub_lesson" placeholder="Sub Lesson">
                                                        </div>
                                                        <div class="form-group">
                                                        <label class="form-check-label">MCQS Child Lesson</label>
                                                            <input type="text" class="form-control"
                                                                id="mcqschild_lesson" name="child_lesson"
                                                                placeholder="Child Lesson">
                                                        </div>
                                                        <div class="form-group">
                                                        <label class="form-check-label">Search Quiz</label>
                                                            <input type="hidden" name="quiz_id" id="quiz_id"
                                                                class="form-control">
                                                            <input type="text" onkeyup="searchQuizTitle();"
                                                                name="searchQuiz" id="searchQuiz" class="form-control"
                                                                placeholder="Search quiz">

                                                            <ul id="myUL">

                                                            </ul>
                                                        </div>
                                                        <div class="form-group">
                                                            <!-- <div class="form-check">
                                                                <input type="checkbox" class="form-check-input">
                                                                <label class="form-check-label">Enable Drip Content</label>
                                                            </div> -->
                                                            <div class="form-check">
                                                                <input type="checkbox" id="mcqs_enable_preview"
                                                                    value="1" class="form-check-input">
                                                                <label class="form-check-label">Enable Preview</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-1">
                                                            <div class="payment-adress">
                                                                <button type="button" onclick="saveMcqs();"
                                                                    class="btn btn-primary waves-effect waves-light">Save
                                                                    MCQS</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                    </div>
                                    </form>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="hpanel shadow-inner responsive-mg-b-30">
                                        <div class="panel-body">
                                            <div class="table-responsive wd-tb-cr">
                                                <table class="table table-striped" id="DataTableQuiz">
                                                    <thead>
                                                        <tr>
                                                            <th>Lesson</th>
                                                            <th>Sub Lesson </th>
                                                            <th>Child Lesson</th>
                                                            <th>Quiz Title</th>
                                                            <!-- <th>Profession</th> -->
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <!-- <tr><td>' + response[i].lesson + '</td><td>' + response[i].sub_lesson + '</td><td>' + response[i].child_lesson + '</td><td>' + response[i].quiz_title + '</td> <td><a style="font-size:20px;" href="javascript:;" onclick="editCourseMcqs(' + response[i].id + ',\'' + response[i].display_name + '\',\'' + response[i].lesson + '\',\'' + response[i].sub_lesson + '\',\'' + response[i].child_lesson + '\',\'' + response[i].lesson_preview + '\',\'' + response[i].quiz_title + '\',' + response[i].quiz_id + ')" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;<a style="font-size:20px;" href="javascript:;" onclick="deleteCourseMcqs(' + response[i].id + ',' + response[i].course_id + ');" id="basicError" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr> -->
                                                        @if(!empty($CourseMcqs))
                                                        @foreach($CourseMcqs as $item)

                                                        <tr>
                                                            <td>{{$item->lesson}}</td>
                                                            <td>{{$item->sub_lesson }}</td>
                                                            <td>{{$item->child_lesson}}</td>
                                                            <td>
                                                                {!! $item->quiz_title !!}
                                                            </td>
                                                            <td><a style="font-size:20px;" href="javascript:;"
                                                                    onclick="editCourseMcqs('{{$item->id}}','{{$item->display_name}}','{{$item->lesson}}','{{$item->sub_lesson}}','{{$item->child_lesson}}', '{{$item->lesson_preview}}','{{$item->quiz_title}}','{{$item->quiz_id}}')"
                                                                    data-toggle="tooltip" title="" class="pd-setting-ed"
                                                                    data-original-title="Edit"><i
                                                                        class="fa fa-pencil-square-o"
                                                                        aria-hidden="true"></i></a>&nbsp;&nbsp;<a
                                                                    style="font-size:20px;" href="javascript:;"
                                                                    onclick="deleteCourseMcqs('{{$item->id }}','{{$item->course_id}}');"
                                                                    id="basicError" data-toggle="tooltip" title=""
                                                                    class="pd-setting-ed" data-original-title="Trash"><i
                                                                        class="fa fa-trash-o"
                                                                        aria-hidden="true"></i></a></td>
                                                        </tr>
                                                        @endforeach

                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade" id="video">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                <div class="devit-card-custom">
                                                    <div class="form-group">
                                                    <label class="form-check-label"> Title</label>
                                                        <input type="hidden" name="course_video_id" id="course_video_id"
                                                            value="">
                                                        <input type="text" name="display_name" id="videodisplay_name"
                                                            class="form-control" placeholder=" Display Name">
                                                    </div>
                                                    <div class="form-group">
                                                    <label class="form-check-label"> Lesson</label>
                                                        <input type="text" name="lesson" id="videolesson"
                                                            class="form-control" placeholder="Lesson">
                                                    </div>
                                                    <div class="form-group">
                                                    <label class="form-check-label">Sub  Lesson</label>
                                                        <input type="text" class="form-control" id="videosub_lesson"
                                                            name="sub_lesson" placeholder="Sub Lesson">
                                                    </div>
                                                    <div class="form-group">
                                                    <label class="form-check-label"> Child Lesson</label>
                                                        <input type="text" class="form-control" id="videochildlesson"
                                                            name="child_lesson" placeholder="Child Lesson">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                <div class="devit-card-custom">

                                                    <div class="form-group">
                                                        <form action="" method="POST" id="file-upload"
                                                            enctype="multipart/form-data">
                                                            @csrf

                                                            <div class="mb-3">
                                                                <label class="form-label" for="inputFile">Select
                                                                    VideoFile:</label>
                                                                <input type="file" name="file" id="inputFile"
                                                                    class="form-control">
                                                                <input type="hidden" id="video_file" name="video_file"
                                                                    class="form-control" placeholder="Video File">

                                                                <span class="text-danger" id="file-input-error"></span>
                                                                <img src="loader.gif" id="video_loader"
                                                                    style="display: none;" height="80" width="80"
                                                                    alt="">
                                                                <label id="videoFileName"></label>
                                                            </div>

                                                            <div class="mb-3" style="margin-top: 10px;">
                                                                <button type="submit"
                                                                    class="btn btn-success">Upload</button>

                                                            </div>

                                                        </form>


                                                    </div>
                                                    <div class="form-group">
                                                    <label class="form-label" for="inputFile">URL</label>
                                                        <input type="text" id="url" class="form-control" name="url"
                                                            placeholder="URL">
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" id="video_download_or_not" value="1"
                                                            class="form-check-input">
                                                        <label class="form-check-label">Allow Download</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input type="checkbox" id="video_enable_preview" value="1"
                                                                class="form-check-input">
                                                            <label class="form-check-label">Enable Preview</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <div class="payment-adress">
                                                            <button type="button" onclick="saveVideo();"
                                                                class="btn btn-primary waves-effect waves-light">Save
                                                                Video</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="hpanel shadow-inner responsive-mg-b-30">
                                        <div class="panel-body">
                                            <div class="table-responsive wd-tb-cr">
                                                <table class="table table-striped" id="DataTableVideo">
                                                    <thead>
                                                        <tr>
                                                            <th>Lesson</th>
                                                            <th>Sub Lesson </th>
                                                            <th>Child Lesson</th>
                                                            <th>URL</th>
                                                            <!-- <th>Profession</th> -->
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- <tr><td>' + response[i].lesson + '</td><td>' + response[i].sub_lesson + '</td><td>' + response[i].child_lesson + '</td><td>' + response[i].url + '</td> <td>' + response[i].video_file + '</td> <td><a style="font-size:20px;" href="javascript:;" onclick="editCourseVideo(' + response[i].id + ',\'' + response[i].display_name + '\',\'' + response[i].lesson + '\',\'' + response[i].sub_lesson + '\',\'' + response[i].child_lesson + '\',\'' + response[i].lesson_preview + '\',\'' + response[i].video_file + '\',\'' + response[i].url + '\',\'' + response[i].downloadornot + '\')" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;<a style="font-size:20px;" href="javascript:;" onclick="deleteCourseVideo(' + response[i].id + ',' + response[i].course_id + ');" id="basicError" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr> -->
                                                        @if(!empty($CourseVideo))
                                                        @foreach($CourseVideo as $item)

                                                        <tr>
                                                            <td>{{$item->lesson}}</td>
                                                            <td>{{$item->sub_lesson }}</td>
                                                            <td>{{$item->child_lesson}}</td>
                                                            <td>
                                                                {!! $item->url !!}
                                                            </td>
                                                            <td><a style="font-size:20px;" href="javascript:;"
                                                                    onclick="editCourseVideo('{{$item->id}}','{{$item->display_name}}','{{$item->lesson}}','{{$item->sub_lesson}}','{{$item->child_lesson}}', '{{$item->lesson_preview}}', '{{$item->video_file}}','{{$item->url}}','{{$item->downloadornot}}')"
                                                                    data-toggle="tooltip" title="" class="pd-setting-ed"
                                                                    data-original-title="Edit"><i
                                                                        class="fa fa-pencil-square-o"
                                                                        aria-hidden="true"></i></a>&nbsp;&nbsp;<a
                                                                    style="font-size:20px;" href="javascript:;"
                                                                    onclick="deleteCourseVideo('{{$item->id }}','{{$item->course_id}}');"
                                                                    id="basicError" data-toggle="tooltip" title=""
                                                                    class="pd-setting-ed" data-original-title="Trash"><i
                                                                        class="fa fa-trash-o"
                                                                        aria-hidden="true"></i></a></td>
                                                        </tr>
                                                        @endforeach

                                                        @endif

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade" id="note">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                <div class="devit-card-custom">

                                                    <div class="form-group">
                                                        <input type="hidden" name="course_note_id" id="course_note_id"
                                                            value="">
                                                            <label class="form-label" for="inputFile">Title</label>
                                                        <input type="text" name="display_name" id="notedisplay_name"
                                                            class="form-control" placeholder=" Display Name">
                                                    </div>
                                                    <div class="form-group">
                                                    <label class="form-label" for="inputFile">Lesson</label>
                                                        <input type="text" name="lesson" id="notelesson"
                                                            class="form-control" placeholder="Lesson">
                                                    </div>
                                                    <div class="form-group">
                                                    <label class="form-label" for="inputFile">Sub Lesson</label>
                                                        <input type="text" class="form-control" id="notesub_lesson"
                                                            name="sub_lesson" placeholder="Sub Lesson">
                                                    </div>
                                                    <div class="form-group">
                                                    <label class="form-label" for="inputFile">Child Lesson</label>
                                                        <input type="text" class="form-control" id="notechildlesson"
                                                            name="child_lesson" placeholder="Child Lesson">
                                                    </div>


                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                <div class="devit-card-custom">


                                                    <div class="form-group">
                                                   
                                                        <input type="hidden" id="file" class="form-control"
                                                            placeholder="Upload pdf file">


                                                        <form action="" method="POST" id="notefile-upload"
                                                            enctype="multipart/form-data">
                                                            @csrf

                                                            <div class="mb-3">
                                                                <label class="form-label" for="inputFile">Select Pdf
                                                                    File</label>
                                                                <input type="file" name="file" id="noteinputFile"
                                                                    class="form-control">

                                                                <span class="text-danger"
                                                                    id="notefile-input-error"></span>
                                                                <img src="loader.gif" id="note_loader"
                                                                    style="display: none;" height="80" width="80"
                                                                    alt="">
                                                                <label id="notefileName"></label>
                                                            </div>

                                                            <div class="mb-3" style="margin-top: 10px;">
                                                                <button type="submit"
                                                                    class="btn btn-success">Upload</button>

                                                            </div>

                                                        </form>
                                                    </div>
                                                    <div class="form-group">
                                                    <label class="form-label" for="inputFile">URL</label>
                                                        <input type="text" class="form-control" id="noteurl" name="url"
                                                            placeholder="URL">
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" id="note_download_or_not" value="1"
                                                            class="form-check-input">
                                                        <label class="form-check-label">Allow Download</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input type="checkbox" id="note_enable_preview" value="1"
                                                                class="form-check-input">
                                                            <label class="form-check-label">Enable Preview</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-1">
                                                        <div class="payment-adress">
                                                            <button type="button" onclick="saveNotes();"
                                                                class="btn btn-primary waves-effect waves-light">Save
                                                                Note</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    </form>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="hpanel shadow-inner responsive-mg-b-30">
                                        <div class="panel-body">
                                            <div class="table-responsive wd-tb-cr">
                                                <table class="table table-striped" id="DataTableNote">
                                                    <thead>
                                                        <tr>
                                                            <th>Lesson</th>
                                                            <th>Sub Lesson </th>
                                                            <th>Child Lesson</th>
                                                            <th>URL</th>
                                                            <!-- <th>Profession</th> -->
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if(!empty($CourseNote))
                                                        @foreach($CourseNote as $item)

                                                        <tr>
                                                            <td>{{$item->lesson}}</td>
                                                            <td>{{$item->sub_lesson }}</td>
                                                            <td>{{$item->child_lesson}}</td>
                                                            <td>
                                                                {!! $item->url !!}
                                                            </td>
                                                            <td><a style="font-size:20px;" href="javascript:;"
                                                                    onclick="editCourseNote('{{$item->id}}','{{$item->display_name}}','{{$item->lesson}}','{{$item->sub_lesson}}','{{$item->child_lesson}}', '{{$item->lesson_preview}}', '{{$item->file}}','{{$item->url}}','{{$item->downloadornot}}')"
                                                                    data-toggle="tooltip" title="" class="pd-setting-ed"
                                                                    data-original-title="Edit"><i
                                                                        class="fa fa-pencil-square-o"
                                                                        aria-hidden="true"></i></a>&nbsp;&nbsp;<a
                                                                    style="font-size:20px;" href="javascript:;"
                                                                    onclick="deleteCourseNote('{{$item->id }}','{{$item->course_id}}');"
                                                                    id="basicError" data-toggle="tooltip" title=""
                                                                    class="pd-setting-ed" data-original-title="Trash"><i
                                                                        class="fa fa-trash-o"
                                                                        aria-hidden="true"></i></a></td>
                                                        </tr>
                                                        @endforeach

                                                        @endif


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade" id="review">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <form class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                    <div class="devit-card-custom">
                                                        <div class="form-group">
                                                        <label class="form-label" for="inputFile">Review</label>
                                                            <input type="hidden" name="course_review_id"
                                                                id="course_review_id" value="">
                                                            <select class="form-control select3 select2-danger"
                                                                id="star" name="star"
                                                                data-dropdown-css-class="select2-danger"
                                                                style="width: 100%;" required>
                                                                <option value="0">Choose review star</option>
                                                                <option value="1">*</option>
                                                                <option value="2">**</option>
                                                                <option value="3">***</option>
                                                                <option value="4">****</option>
                                                                <option value="5">*****</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="alert-title">
                                                                <h2>Description</h2>
                                                            </div>
                                                            <div id="summernote6" style="display: none;">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-1">
                                                                <div class="payment-adress">
                                                                    <button type="button" onclick="saveReview();"
                                                                        class="btn btn-primary waves-effect waves-light">Add
                                                                        review</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                    <div class="devit-card-custom">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    </form>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="hpanel shadow-inner responsive-mg-b-30">
                                        <div class="panel-body">
                                            <div class="table-responsive wd-tb-cr">
                                                <table class="table table-striped" id="DataTableReview">
                                                    <thead>
                                                        <tr>
                                                            <th>Star</th>
                                                            <th>Description </th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @if(!empty($CourseReview))
                                                        @foreach($CourseReview as $item)

                                                        <tr>
                                                            <td>{{$item->star}}</td>

                                                            <td>
                                                                <div id="review{{$item->id}}"> {!! $item->description
                                                                    !!}</div>

                                                            </td>
                                                            <td><a style="font-size:20px;" href="javascript:;"
                                                                    onclick="editCourseReview('{{$item->id}}','{{$item->star}}')"
                                                                    data-toggle="tooltip" title="" class="pd-setting-ed"
                                                                    data-original-title="Edit"><i
                                                                        class="fa fa-pencil-square-o"
                                                                        aria-hidden="true"></i></a>&nbsp;&nbsp;<a
                                                                    style="font-size:20px;" href="javascript:;"
                                                                    onclick="deleteCourseReview('{{$item->id }}','{{$item->course_id}}');"
                                                                    id="basicError" data-toggle="tooltip" title=""
                                                                    class="pd-setting-ed" data-original-title="Trash"><i
                                                                        class="fa fa-trash-o"
                                                                        aria-hidden="true"></i></a></td>
                                                        </tr>
                                                        @endforeach

                                                        @endif



                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade" id="newsorarticle">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                <div class="devit-card-custom">
                                                    <div class="form-group">
                                                    <label class="form-label" for="inputFile">Title</label>
                                                        <input type="hidden" name="course_blog_id" id="course_blog_id"
                                                            value="">
                                                        <input type="text" name="display_name"
                                                            id="newsorarticledisplay_name" class="form-control"
                                                            placeholder=" Display Name">
                                                    </div>
                                                    <div class="form-group">
                                                    <label class="form-label" for="inputFile">Search Blog</label>
                                                        <input type="text" name="blog_title"
                                                            onkeyup="searchBlogTitle();" id="blog_title"
                                                            class="form-control" placeholder="Search blog">
                                                        <input type="hidden" name="blog_id" id="blog_id"
                                                            class="form-control">
                                                        <ul id="myBlog">

                                                        </ul>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input type="checkbox" id="enableornot" value="1"
                                                                class="form-check-input">
                                                            <label class="form-check-label">Active</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-1">
                                                            <div class="payment-adress">
                                                                <button type="button" onclick="saveNewsorArticle();"
                                                                    class="btn btn-primary waves-effect waves-light">Save
                                                                    news or article</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="hpanel shadow-inner responsive-mg-b-30">
                                        <div class="panel-body">
                                            <div class="table-responsive wd-tb-cr">
                                                <table class="table table-striped" id="DataTableBlog">
                                                    <thead>
                                                        <tr>
                                                            <th>Display Name</th>
                                                            <th>Blog Title </th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if(!empty($News))
                                                        @foreach($News as $item)

                                                        <tr>
                                                            <td>{{$item->display_name}}</td>

                                                            <td>
                                                                {!! $item->blog_title !!}

                                                            </td>
                                                            <td><a style="font-size:20px;" href="javascript:;"
                                                                    onclick="editCourseBlog('{{$item->id}}','{{$item->display_name}}','{{$item->blog_id}}','{{$item->blog_title}}','{{$item->enableornot}}')"
                                                                    data-toggle="tooltip" title="" class="pd-setting-ed"
                                                                    data-original-title="Edit"><i
                                                                        class="fa fa-pencil-square-o"
                                                                        aria-hidden="true"></i></a>&nbsp;&nbsp;<a
                                                                    style="font-size:20px;" href="javascript:;"
                                                                    onclick="deleteCourseBlog('{{$item->id }}','{{$item->course_id}}');"
                                                                    id="basicError" data-toggle="tooltip" title=""
                                                                    class="pd-setting-ed" data-original-title="Trash"><i
                                                                        class="fa fa-trash-o"
                                                                        aria-hidden="true"></i></a></td>
                                                        </tr>
                                                        @endforeach

                                                        @endif

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade" id="other">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">


                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                <div class="devit-card-custom">

                                                    <div class="form-group">
                                                    <label class="form-label" for="inputFile">Title</label>
                                                        <input type="hidden" name="course_other_id" id="course_other_id"
                                                            value="">
                                                        <input type="text" name="display_name" id="othersdisplay_name"
                                                            class="form-control" placeholder=" Display Name">
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="alert-title">
                                                            <h2>Description</h2>
                                                        </div>
                                                        <div id="summernote" style="display: none;">
                                                        </div>



                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2 mt-2">
                                                        <div class="payment-adress">
                                                            <button type="button" onclick="saveOthersData()"
                                                                class="btn btn-primary waves-effect waves-light">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="hpanel shadow-inner responsive-mg-b-30">
                                        <div class="panel-body">
                                            <div class="table-responsive wd-tb-cr">
                                                <table class="table table-striped" id="DataTableOtherData">
                                                    <thead>
                                                        <tr>
                                                            <th>Display Name</th>
                                                            <th>Description </th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @if(!empty($Others))
                                                        @foreach($Others as $item)

                                                        <tr>
                                                            <td>{{$item->display_name}}</td>

                                                            <td>
                                                                <div id="others{{$item->id}}"> {!! $item->description
                                                                    !!}</div>

                                                            </td>
                                                            <td><a style="font-size:20px;" href="javascript:;"
                                                                    onclick="editCourseOthersData('{{$item->id}}','{{$item->display_name}}')"
                                                                    data-toggle="tooltip" title="" class="pd-setting-ed"
                                                                    data-original-title="Edit"><i
                                                                        class="fa fa-pencil-square-o"
                                                                        aria-hidden="true"></i></a>&nbsp;&nbsp;<a
                                                                    style="font-size:20px;" href="javascript:;"
                                                                    onclick="deleteCourseOthersData('{{$item->id }}','{{$item->course_id}}');"
                                                                    id="basicError" data-toggle="tooltip" title=""
                                                                    class="pd-setting-ed" data-original-title="Trash"><i
                                                                        class="fa fa-trash-o"
                                                                        aria-hidden="true"></i></a></td>
                                                        </tr>
                                                        @endforeach

                                                        @endif

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<style>
#myUL {
    list-style-type: none;
    padding: 0;
    margin: 0;
    display: none;
    z-index: 900;
    position: absolute;
    width: 90%;
}

#myUL li a {
    border: 1px solid #ddd;
    margin-top: -1px;
    /* Prevent double borders */
    background-color: #f6f6f6;
    padding: 5px;
    text-decoration: none;
    font-size: 16px;
    color: black;
    display: block
}

#myUL li a:hover:not(.header) {
    background-color: #eee;
}


#myBlog {
    list-style-type: none;
    padding: 0;
    margin: 0;
    display: none;
    z-index: 900;
    position: absolute;
    width: 90%;
}

#myBlog li a {
    border: 1px solid #ddd;
    margin-top: -1px;
    /* Prevent double borders */
    background-color: #f6f6f6;
    padding: 5px;
    text-decoration: none;
    font-size: 16px;
    color: black;
    display: block
}

#myBlog li a:hover:not(.header) {
    background-color: #eee;
}
</style>

<script>
const item = []; // course authores 
const items = []; // course pricings
</script>

@if(!empty(@$course_authers))
@foreach($course_authers as $item)
<script type="text/javascript">
item.push('{{$item->teacher_id}}[#]{{$item->fullname}}' + '{#}');
</script>
@endforeach
@endif
@if(!empty(@$course_pricing))
@foreach($course_pricing as $item)
<script type="text/javascript">
// items.push(noOfDays + '{#}' + normalPrice + '{#}' + sellPrice + '{#}' + finaldate.toLocaleDateString('en-CA'));

items.push('{{$item->no_of_days}}' + '{#}' + '{{$item->normal_price}}' + '{#}' + '{{$item->sell_price}}' + '{#}' +
    '{{$item->sell_exipiry_date}}');
</script>
@endforeach
@endif
<script type="text/javascript">
var token = document.getElementById('_token').value;
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': token
    }
});

$('#file-upload').submit(function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    $('#file-input-error').text('');
    document.getElementById("video_loader").style.display = "block";
    $.ajax({
        type: 'POST',
        url: "{{ url('uploadVideo')}}",
        data: formData,
        contentType: false,
        processData: false,
        success: (response) => {
            Lobibox.notify('success', {
                msg: 'Uploaded successfully..'
            });
            var dataResult = JSON.parse(response);
            if (response) {
                this.reset();
                document.getElementById("video_file").value = dataResult.videoFile;
                document.getElementById("video_loader").style.display = "none";
            }
        },
        error: function(response) {
            $('#file-input-error').text(response.responseJSON.message);
        }
    });
});
</script>

<script type="text/javascript">
var token = document.getElementById('_token').value;
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': token
    }
});

$('#notefile-upload').submit(function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    $('#notefile-input-error').text('');
    document.getElementById("note_loader").style.display = "block";
    $.ajax({
        type: 'POST',
        url: "{{ url('uploadNote')}}",
        data: formData,
        contentType: false,
        processData: false,
        success: (response) => {
            Lobibox.notify('success', {
                msg: 'Uploaded successfully..'
            });
            var dataResult = JSON.parse(response);
            if (response) {
                this.reset();
                document.getElementById("file").value = dataResult.noteFile;
                document.getElementById("note_loader").style.display = "none";
            }
        },
        error: function(response) {
            $('#notefile-input-error').text(response.responseJSON.message);
        }
    });
});
</script>


<script type="text/javascript">
let htmlCode = "";
window.onload = function(e) {
    getDate();
    displayBasketItemIntoTeacherTable();
    displayBasketItemIntoTable();

    $('#summernote2').summernote('code', '<?php echo @$course[0]->course_description; ?>');
}

function hideCourseTab() {
    document.getElementById("courseTabForAll").style.display = "none";
}

function displayCourseTab() {
    document.getElementById("courseTabForAll").style.display = "block";
    var course_content = document.getElementById("review");
    course_content.classList.remove("active");
    course_content.classList.remove("in");
    var reviewtab = document.getElementById("reviewtab");
    reviewtab.classList.remove("active");
    var mcqstab = document.getElementById("mcqstab");
    mcqstab.classList.remove("active");
    var videotab = document.getElementById("videotab");
    videotab.classList.remove("active");
    var othertab = document.getElementById("othertab");
    othertab.classList.remove("active");
    var newsorarticletab = document.getElementById("newsorarticletab");
    newsorarticletab.classList.remove("active");
    var notetab = document.getElementById("notetab");
    notetab.classList.remove("active");
    var curriculumntab = document.getElementById("curriculumtab");
    curriculumntab.classList.add("active");

}

function coursePricingListing() {
    if (document.getElementById("coursePrice").value == 1) {
        document.getElementById("course_pricing_content").style.display = "block";
    } else {
        document.getElementById("course_pricing_content").style.display = "none";
    }
}

function resizeImage(base64Str, id, imgId) {
    document.getElementById(imgId).src = "loader.gif";
    //define the width to resize e.g 600px
    var resize_Height; //without px
    let img = new Image()
    img.src = base64Str
    img.onload = function(el) {
        var mul;
        if (img.height > 1000) {
            mul = img.height / 1000;
            resize_Height = img.height / mul;
        } else {
            resize_Height = img.height;
        }
        var elem = document.createElement('canvas'); //create a canvas
        //scale the image to 600 (width) and keep aspect ratio
        var scaleFactor = resize_Height / el.target.height;
        elem.height = resize_Height;
        elem.width = el.target.width * scaleFactor;
        //draw in canvas
        var ctx = elem.getContext('2d');
        ctx.drawImage(el.target, 0, 0, elem.width, elem.height);
        //get the base64-encoded Data URI from the resize image
        srcEncoded = ctx.canvas.toDataURL('image/jpeg', 0.9);
        uploadImageWithResize(srcEncoded, id, imgId);

    }
}

function uploadImageWithResize(imageFile, id, imgId) {

    // alert(imageFile);
    var date = new Date(); // some mock date
    var milliseconds = date.getTime();
    var imageName = milliseconds + '.jpg';

    // imageName
    $.ajax({
        url: "{{ url('/upload') }}",
        type: "POST",
        data: {
            _token: $('#_token').val(),
            file: imageFile,
            imageName: imageName,
        },
        cache: false,
        success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            // alert(dataResult.imageFile);
            document.getElementById(id).value = dataResult.imageFile;
            document.getElementById(imgId).src = "/uploads/Postimg/" + dataResult.imageFile;

        },
        error: function(xhr, ajaxOptions, thrownError) {

            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }


    });
}
$('#course_thumbnail').on('change', function(ev) {
    // alert("dfsa");
    var filedata = this.files[0];

    var imgtype = filedata.type;
    var match = ['image/jpeg', 'image/jpg'];
    if (imgtype == 'image/jpeg' || imgtype == 'image/jpg' || imgtype == 'image/png') {
        var reader = new FileReader();
        reader.onload = function(ev) {
            imageFile = ev.target.result;
            resizeImage(imageFile, 'file_upload_course_thumbnail', 'course_thumbnail_img');
        }
        reader.readAsDataURL(this.files[0]);
    } else {
        alert("Only accept image format!")
    }

});


function updateQuizTitleAndId(quiz_id, quiz_title) {
    document.getElementById('quiz_id').value = quiz_id;
    document.getElementById('searchQuiz').value = quiz_title;
    document.getElementById("myUL").style.display = "none";
}

function updateBlogTitleAndId(quiz_id, quiz_title) {
    document.getElementById('blog_id').value = quiz_id;
    document.getElementById('blog_title').value = quiz_title;
    document.getElementById("myBlog").style.display = "none";
}


function searchBlogTitle() {
    var searchKey = $("#searchBlog").val();
    //  alert(searchKey);
    $.ajax({
        url: "{{ url('searchBlog') }}",
        method: 'GET',
        data: {
            query: searchKey,
        },
        dataType: 'json',
        success: function(data) {
            response = data;
            document.getElementById("myBlog").style.display = "block";
            $("#myBlog").html('');
            for (var i = 0; i < response.length; i++) {
                var str = '<li><a href="javascript:;" onclick="updateBlogTitleAndId(' + response[i].id +
                    ',\'' + response[i].blog_title + '\');">' + response[i].blog_title + '</a></li>';

                $("#myBlog").append(str);
            }
        }

    })
}


function searchQuizTitle() {
    var searchKey = $("#searchQuiz").val();
    //  alert(searchKey);
    $.ajax({
        url: "{{ url('searchQuiz') }}",
        method: 'GET',
        data: {
            query: searchKey,
        },
        dataType: 'json',
        success: function(data) {
            response = data;
            document.getElementById("myUL").style.display = "block";
            $("#myUL").html('');
            for (var i = 0; i < response.length; i++) {
                var str = '<li><a href="javascript:;" onclick="updateQuizTitleAndId(' + response[i]
                    .quiz_id + ',\'' + response[i].quiz_title + '\');">' + response[i].quiz_title +
                    '</a></li>';

                $("#myUL").append(str);
            }
        }

    })
}

function saveMcqs() {
    var isblank = false;
    var course_id = document.getElementById('course_id').value;
    if (course_id != "") {
        if (document.getElementById('mcqsdisplay_name').value == "") {
            document.getElementById('mcqsdisplay_name').focus();
            isblank = true;
        } else if (document.getElementById('mcqslesson').value == "") {
            document.getElementById('mcqslesson').focus();
            isblank = true;
        }
        var token = document.getElementById('_token').value;
        var lesson = document.getElementById('mcqslesson').value;
        var sub_lesson = document.getElementById('mcqssub_lesson').value;
        var child_lesson = document.getElementById('mcqschild_lesson').value;
        var quiz_id = document.getElementById('quiz_id').value;
        var display_name = document.getElementById('mcqsdisplay_name').value;
        var course_mcqs_id = document.getElementById('course_mcqs_id').value;
        var allowReview = 0;
        if (document.getElementById("mcqs_enable_preview").checked == true) {
            allowReview = 1;
        }

        if (isblank == false) {
            var axajUrl = "/addcourseMcqsData";
            $.ajax({
                type: "POST",
                url: axajUrl,
                data: {
                    _token: token,
                    display_name: display_name,
                    lesson: lesson,
                    sub_lesson: sub_lesson,
                    child_lesson: child_lesson,
                    course_id: course_id,
                    quiz_id: quiz_id,
                    lesson_preview: allowReview,
                    course_mcqs_id: course_mcqs_id,
                },
                async: false,
                dataType: 'json',
                success: function(dataResult) {
                    Lobibox.notify('success', {
                        msg: 'Your inputed data has been added successfully..'
                    });
                    $("#DataTableQuiz tbody").empty();
                    document.getElementById('mcqssub_lesson').value = "";
                    document.getElementById('mcqschild_lesson').value = "";
                    document.getElementById("mcqs_enable_preview").checked = false;
                    document.getElementById('course_mcqs_id').value = "";
                    response = dataResult;
                    for (var i = 0; i < response.length; i++) {
                        var str = '<tr><td>' + response[i].lesson + '</td><td>' + response[i].sub_lesson +
                            '</td><td>' + response[i].child_lesson + '</td><td>' + response[i].quiz_title +
                            '</td> <td><a style="font-size:20px;" href="javascript:;" onclick="editCourseMcqs(' +
                            response[i].id + ',\'' + response[i].display_name + '\',\'' + response[i]
                            .lesson + '\',\'' + response[i].sub_lesson + '\',\'' + response[i]
                            .child_lesson + '\',\'' + response[i].lesson_preview + '\',\'' + response[i]
                            .quiz_title + '\',' + response[i].quiz_id +
                            ')" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;<a style="font-size:20px;" href="javascript:;" onclick="deleteCourseMcqs(' +
                            response[i].id + ',' + response[i].course_id +
                            ');" id="basicError" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr>';
                        $("#DataTableQuiz tbody").append(str);
                    }
                }
            });
        }
    } else {
        alert("Course id isnot available, try again!");
    }
}


function editCourseMcqs(course_mcqs_id, display_name, lesson, sub_lesson, child_lesson, lesson_preview, quiz_title,
    quiz_id) {
    document.getElementById('mcqsdisplay_name').value = display_name;
    document.getElementById('mcqslesson').value = lesson;
    document.getElementById('mcqssub_lesson').value = sub_lesson;
    document.getElementById('mcqschild_lesson').value = child_lesson;
    document.getElementById('course_mcqs_id').value = course_mcqs_id;
    document.getElementById('quiz_id').value = quiz_id;
    document.getElementById('searchQuiz').value = quiz_title;
    document.getElementById("mcqs_enable_preview").checked = false;
    if (lesson_preview == 1) {
        document.getElementById("mcqs_enable_preview").checked = true;
    }
}

function deleteCourseMcqs(id, courseId) {
    $.ajax({
        url: "{{ url('delete-course-mcqs') }}/" + id + "/" + courseId,
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            response = data;
            Lobibox.notify('success', {
                msg: 'Data has been deleted successfully..'
            });
            $("#DataTableQuiz tbody").empty();
            for (var i = 0; i < response.length; i++) {
                var str = '<tr><td>' + response[i].lesson + '</td><td>' + response[i].sub_lesson +
                    '</td><td>' + response[i].child_lesson + '</td><td>' + response[i].quiz_title +
                    '</td> <td><a style="font-size:20px;" href="javascript:;" onclick="editCourseMcqs(' +
                    response[i].id + ',\'' + response[i].display_name + '\',\'' + response[i].lesson +
                    '\',\'' + response[i].sub_lesson + '\',\'' + response[i].child_lesson + '\',\'' +
                    response[i].lesson_preview + '\',\'' + response[i].quiz_title + '\',' + response[i]
                    .quiz_id +
                    ')" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;<a style="font-size:20px;" href="javascript:;" onclick="deleteCourseMcqs(' +
                    response[i].id + ',' + response[i].course_id +
                    ');" id="basicError" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr>';
                $("#DataTableQuiz tbody").append(str);
            }
        }

    })
}



function editCourseVideo(course_video_id, display_name, lesson, sub_lesson, child_lesson, lesson_preview, video_file,
    url, downloadornot) {
    document.getElementById('videodisplay_name').value = display_name;
    document.getElementById('videolesson').value = lesson;
    document.getElementById('videosub_lesson').value = sub_lesson;
    document.getElementById('videochildlesson').value = child_lesson;
    document.getElementById('course_video_id').value = course_video_id;
    document.getElementById('video_file').value = video_file;
    document.getElementById('videofileName').innerHTML = video_file;
    document.getElementById('url').value = url;
    document.getElementById("video_enable_preview").checked = false;
    if (lesson_preview == 1) {
        document.getElementById("video_enable_preview").checked = true;
    }
    document.getElementById("video_download_or_not").checked = false;
    if (downloadornot == 1) {
        document.getElementById("video_download_or_not").checked = true;
    }

}

function deleteCourseVideo(id, courseId) {
    $.ajax({
        url: "{{ url('delete-course-video') }}/" + id + "/" + courseId,
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            response = data;
            Lobibox.notify('success', {
                msg: 'Data has been deleted successfully..'
            });
            $("#DataTableVideo tbody").empty();
            for (var i = 0; i < response.length; i++) {
                var str = '<tr><td>' + response[i].lesson + '</td><td>' + response[i].sub_lesson +
                    '</td><td>' + response[i].child_lesson + '</td><td>' + response[i].url + '</td> <td>' +
                    response[i].video_file +
                    '</td> <td><a style="font-size:20px;" href="javascript:;" onclick="editCourseVideo(' +
                    response[i].id + ',\'' + response[i].display_name + '\',\'' + response[i].lesson +
                    '\',\'' + response[i].sub_lesson + '\',\'' + response[i].child_lesson + '\',\'' +
                    response[i].lesson_preview + '\',\'' + response[i].video_file + '\',\'' + response[i]
                    .url + '\',\'' + response[i].downloadornot +
                    '\')" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;<a style="font-size:20px;" href="javascript:;" onclick="deleteCourseVideo(' +
                    response[i].id + ',' + response[i].course_id +
                    ');" id="basicError" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr>';
                $("#DataTableVideo tbody").append(str);
            }
        }

    })
}










function saveVideo() {
    var isblank = false;

    var course_id = document.getElementById('course_id').value;
    if (course_id != "") {
        if (document.getElementById('videodisplay_name').value == "") {
            document.getElementById('videodisplay_name').focus();
            isblank = true;
        } else if (document.getElementById('videolesson').value == "") {
            document.getElementById('videolesson').focus();
            isblank = true;
        }
        var token = document.getElementById('_token').value;
        var display_name = document.getElementById('videodisplay_name').value;
        var lesson = document.getElementById('videolesson').value;
        var sub_lesson = document.getElementById('videosub_lesson').value;
        var child_lesson = document.getElementById('videochildlesson').value;
        var video_file = document.getElementById('video_file').value;
        var url = document.getElementById('url').value;
        var course_video_id = document.getElementById('course_video_id').value;
        var allowReview = 0;
        if (document.getElementById("video_enable_preview").checked == true) {
            allowReview = 1;
        }
        var downloadornot = 0;
        if (document.getElementById("video_download_or_not").checked == true) {
            downloadornot = 1;
        }
        if (isblank == false) {
            var axajUrl = "/addcourseVideoData";
            $.ajax({
                type: "POST",
                url: axajUrl,
                data: {
                    _token: token,
                    display_name: display_name,
                    lesson: lesson,
                    sub_lesson: sub_lesson,
                    child_lesson: child_lesson,
                    sub_lesson: sub_lesson,
                    video_file: video_file,
                    url: url,
                    lesson_preview: allowReview,
                    downloadornot: downloadornot,
                    course_id: course_id,
                    course_video_id: course_video_id,
                },
                async: false,
                dataType: 'json',
                success: function(dataResult) {
                    Lobibox.notify('success', {
                        msg: 'Your inputed data has been added successfully..'
                    });

                    document.getElementById('videosub_lesson').value = "";
                    document.getElementById('videochildlesson').value = "";
                    document.getElementById('video_file').value = "";
                    document.getElementById('url').value = "";
                    document.getElementById("video_enable_preview").checked = false;
                    document.getElementById("video_download_or_not").checked = false;
                    document.getElementById('course_video_id').value = "";
                    response = dataResult;
                    // alert(response.length);
                    $("#DataTableVideo tbody").empty();
                    for (var i = 0; i < response.length; i++) {
                        var str = '<tr><td>' + response[i].lesson + '</td><td>' + response[i].sub_lesson +
                            '</td><td>' + response[i].child_lesson + '</td><td>' + response[i].url +
                            '</td> <td>' + response[i].video_file +
                            '</td> <td><a style="font-size:20px;" href="javascript:;" onclick="editCourseVideo(' +
                            response[i].id + ',\'' + response[i].display_name + '\',\'' + response[i]
                            .lesson + '\',\'' + response[i].sub_lesson + '\',\'' + response[i]
                            .child_lesson + '\',\'' + response[i].lesson_preview + '\',\'' + response[i]
                            .video_file + '\',\'' + response[i].url + '\',\'' + response[i].downloadornot +
                            '\')" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;<a style="font-size:20px;" href="javascript:;" onclick="deleteCourseVideo(' +
                            response[i].id + ',' + response[i].course_id +
                            ');" id="basicError" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr>';
                        $("#DataTableVideo tbody").append(str);
                    }
                }
            });
        }
    } else {
        alert("Course id isnot available, try again!");
    }
}




function editCourseBlog(course_blog_id, display_name, blog_id, blog_title, enableornot) {
    document.getElementById('newsorarticledisplay_name').value = display_name;
    document.getElementById('blog_title').value = blog_title;
    document.getElementById('blog_id').value = blog_id;
    document.getElementById('course_blog_id').value = course_blog_id;
    document.getElementById("enableornot").checked = false;
    if (enableornot == 1) {
        document.getElementById("enableornot").checked = true;
    }

}

function deleteCourseBlog(id, courseId) {
    $.ajax({
        url: "{{ url('delete-course-blog') }}/" + id + "/" + courseId,
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            response = data;
            Lobibox.notify('success', {
                msg: 'Data has been deleted successfully..'
            });
            $("#DataTableBlog tbody").empty();
            for (var i = 0; i < response.length; i++) {
                var str = '<tr><td>' + response[i].display_name + '</td><td>' + response[i].blog_title +
                    '</td> <td><a style="font-size:20px;" href="javascript:;" onclick="editCourseBlog(' +
                    response[i].id + ',\'' + response[i].display_name + '\',\'' + response[i].blog_id +
                    '\',\'' + response[i].blog_title + '\',' + response[i].enableornot +
                    ')" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;<a style="font-size:20px;" href="javascript:;" onclick="deleteCourseBlog(' +
                    response[i].id + ',' + response[i].course_id +
                    ');" id="basicError" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr>';
                $("#DataTableBlog tbody").append(str);
            }
        }

    })
}


function saveNewsorArticle() {
    var isblank = false;
    var course_id = document.getElementById('course_id').value;
    if (course_id != "") {
        var token = document.getElementById('_token').value;
        var display_name = document.getElementById('newsorarticledisplay_name').value;
        var blog_id = document.getElementById('blog_id').value;
        var course_blog_id = document.getElementById('course_blog_id').value;

        if (document.getElementById('newsorarticledisplay_name').value == "") {
            document.getElementById('newsorarticledisplay_name').focus();
            isblank = true;
        } else if (document.getElementById('blog_id').value == "") {
            document.getElementById('blog_title').focus();
            isblank = true;
        }
        var enableornot = 0;
        if (document.getElementById("enableornot").checked == true) {
            enableornot = 1;
        }

        if (isblank == false) {
            var axajUrl = "/addcourseNwsorArtData";
            $.ajax({
                type: "POST",
                url: axajUrl,
                data: {
                    _token: token,
                    display_name: display_name,
                    course_id: course_id,
                    blog_id: blog_id,
                    enableornot: enableornot,
                    course_blog_id: course_blog_id,
                },
                async: false,
                dataType: "json",
                success: function(dataResult) {
                    response = dataResult;
                    Lobibox.notify('success', {
                        msg: 'Your inputed data has been added successfully..'
                    });
                    document.getElementById('blog_id').value = "";
                    document.getElementById('blog_title').value = "";
                    document.getElementById('course_blog_id').value = "";
                    $("#DataTableBlog tbody").empty();
                    for (var i = 0; i < response.length; i++) {
                        var str = '<tr><td>' + response[i].display_name + '</td><td>' + response[i]
                            .blog_title +
                            '</td> <td><a style="font-size:20px;" href="javascript:;" onclick="editCourseBlog(' +
                            response[i].id + ',\'' + response[i].display_name + '\',\'' + response[i]
                            .blog_id + '\',\'' + response[i].blog_title + '\',' + response[i].enableornot +
                            ')" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;<a style="font-size:20px;" href="javascript:;" onclick="deleteCourseBlog(' +
                            response[i].id + ',' + response[i].course_id +
                            ');" id="basicError" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr>';
                        $("#DataTableBlog tbody").append(str);
                    }
                }
            });
        }
    }
}


function editCourseNote(course_note_id, display_name, lesson, sub_lesson, child_lesson, lesson_preview, file, url,
    downloadornot) {
    document.getElementById('notedisplay_name').value = display_name;
    document.getElementById('notelesson').value = lesson;
    document.getElementById('notesub_lesson').value = sub_lesson;
    document.getElementById('notechildlesson').value = child_lesson;
    document.getElementById('course_note_id').value = course_note_id;
    document.getElementById('file').value = file;
    document.getElementById('notefileName').innerHTML = file;
    document.getElementById('noteurl').value = url;
    document.getElementById("note_enable_preview").checked = false;
    if (lesson_preview == 1) {
        document.getElementById("note_enable_preview").checked = true;
    }
    document.getElementById("note_download_or_not").checked = false;
    if (downloadornot == 1) {
        document.getElementById("note_download_or_not").checked = true;
    }

}

function deleteCourseNote(id, courseId) {
    $.ajax({
        url: "{{ url('delete-course-note') }}/" + id + "/" + courseId,
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            response = data;
            Lobibox.notify('success', {
                msg: 'Data has been deleted successfully..'
            });
            $("#DataTableNote tbody").empty();
            for (var i = 0; i < response.length; i++) {
                var str = '<tr><td>' + response[i].lesson + '</td><td>' + response[i].sub_lesson +
                    '</td><td>' + response[i].child_lesson + '</td><td>' + response[i].url + '</td> <td>' +
                    response[i].file +
                    '</td> <td><a style="font-size:20px;" href="javascript:;" onclick="editCourseNote(' +
                    response[i].id + ',\'' + response[i].display_name + '\',\'' + response[i].lesson +
                    '\',\'' + response[i].sub_lesson + '\',\'' + response[i].child_lesson + '\',\'' +
                    response[i].lesson_preview + '\',\'' + response[i].file + '\',\'' + response[i].url +
                    '\',\'' + response[i].downloadornot +
                    '\')" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;<a style="font-size:20px;" href="javascript:;" onclick="deleteCourseNote(' +
                    response[i].id + ',' + response[i].course_id +
                    ');" id="basicError" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr>';
                $("#DataTableNote tbody").append(str);
            }
        }

    })
}






function saveNotes() {
    var isblank = false;
    var course_id = document.getElementById('course_id').value;
    if (course_id != "") {
        if (document.getElementById('notedisplay_name').value == "") {
            document.getElementById('notedisplay_name').focus();
            isblank = true;
        } else if (document.getElementById('notelesson').value == "") {
            document.getElementById('notelesson').focus();
            isblank = true;
        }
        var token = document.getElementById('_token').value;
        var display_name = document.getElementById('notedisplay_name').value;
        var lesson = document.getElementById('notelesson').value;
        var sub_lesson = document.getElementById('notesub_lesson').value;
        var child_lesson = document.getElementById('notechildlesson').value;
        var file = document.getElementById('file').value;
        var url = document.getElementById('noteurl').value;
        var course_note_id = document.getElementById('course_note_id').value;
        var allowReview = 0;
        if (document.getElementById("note_enable_preview").checked == true) {
            allowReview = 1;
        }
        var downloadornot = 0;
        if (document.getElementById("note_download_or_not").checked == true) {
            downloadornot = 1;
        }
        if (isblank == false) {
            var axajUrl = "/addcourseNotesData";
            $.ajax({
                type: "POST",
                url: axajUrl,
                data: {
                    _token: token,
                    display_name: display_name,
                    lesson: lesson,
                    sub_lesson: sub_lesson,
                    child_lesson: child_lesson,
                    sub_lesson: sub_lesson,
                    file: file,
                    url: url,
                    lesson_preview: allowReview,
                    downloadornot: downloadornot,
                    course_id: course_id,
                    course_note_id: course_note_id,
                },
                async: false,
                dataType: "json",
                success: function(dataResult) {
                    response = dataResult;
                    Lobibox.notify('success', {
                        msg: 'Data has been deleted successfully..'
                    });
                    document.getElementById('notesub_lesson').value = "";
                    document.getElementById('notechildlesson').value = "";
                    document.getElementById('file').value = "";
                    document.getElementById('noteurl').value = "";
                    document.getElementById("note_enable_preview").checked = false;
                    document.getElementById("note_download_or_not").checked = false;
                    document.getElementById('course_note_id').value = "";
                    $("#DataTableNote tbody").empty();
                    for (var i = 0; i < response.length; i++) {
                        var str = '<tr><td>' + response[i].lesson + '</td><td>' + response[i].sub_lesson +
                            '</td><td>' + response[i].child_lesson + '</td><td>' + response[i].url +
                            '</td> <td>' + response[i].file +
                            '</td> <td><a style="font-size:20px;" href="javascript:;" onclick="editCourseNote(' +
                            response[i].id + ',\'' + response[i].display_name + '\',\'' + response[i]
                            .lesson + '\',\'' + response[i].sub_lesson + '\',\'' + response[i]
                            .child_lesson + '\',\'' + response[i].lesson_preview + '\',\'' + response[i]
                            .file + '\',\'' + response[i].url + '\',\'' + response[i].downloadornot +
                            '\')" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;<a style="font-size:20px;" href="javascript:;" onclick="deleteCourseNote(' +
                            response[i].id + ',' + response[i].course_id +
                            ');" id="basicError" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr>';
                        $("#DataTableNote tbody").append(str);
                    }
                }
            });
        }
    } else {
        alert("Course id isnot available, try again!");
    }
}

function saveOthersData() {
    var isblank = false;
    var course_id = document.getElementById('course_id').value;
    if (course_id != "") {
        if (document.getElementById('othersdisplay_name').value == "") {
            document.getElementById('othersdisplay_name').focus();
            isblank = true;
        }
        var token = document.getElementById('_token').value;
        var display_name = document.getElementById('othersdisplay_name').value;
        var course_other_id = document.getElementById('course_other_id').value;
        var plainText = $('#summernote').summernote('code');
        if (plainText == "") {
            $('#summernote').summernote('focus');
            isblank = true;
        }
        if (isblank == false) {
            var axajUrl = "/addCourseOther";
            $.ajax({
                type: "POST",
                url: axajUrl,
                data: {
                    _token: token,
                    display_name: display_name,
                    course_id: course_id,
                    description: plainText,
                    course_other_id: course_other_id,
                },
                async: false,
                dataType: "json",
                success: function(dataResult) {
                    response = dataResult;
                    Lobibox.notify('success', {
                        msg: 'Data has been deleted successfully..'
                    });
                    $('#summernote').summernote('code', '');
                    document.getElementById('course_other_id').value = "";
                    $("#DataTableOtherData tbody").empty();
                    for (var i = 0; i < response.length; i++) {
                        var str = '<tr><td>' + response[i].display_name + '</td><td><div id="others' +
                            response[i].id + '">' + response[i].description +
                            '</div></td> <td><a style="font-size:20px;" href="javascript:;" onclick="editCourseOthersData(' +
                            response[i].id + ',\'' + response[i].display_name +
                            '\')" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;<a style="font-size:20px;" href="javascript:;" onclick="deleteCourseOthersData(' +
                            response[i].id + ',' + response[i].course_id +
                            ');" id="basicError" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr>';
                        $("#DataTableOtherData tbody").append(str);
                    }
                }
            });
        }
    } else {
        alert("Course id isnot available, try again!");
    }
}

function editCourseOthersData(course_other_id, displayname) {
    document.getElementById('othersdisplay_name').value = displayname;
    document.getElementById('course_other_id').value = course_other_id;
    var description = document.getElementById('others' + course_other_id).innerHTML;
    $('#summernote').summernote('code', description);
}

function deleteCourseOthersData(id, courseId) {
    $.ajax({
        url: "{{ url('delete-course-other-data') }}/" + id + "/" + courseId,
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            response = data;
            Lobibox.notify('success', {
                msg: 'Data has been deleted successfully..'
            });
            $("#DataTableOtherData tbody").empty();
            for (var i = 0; i < response.length; i++) {
                var str = '<tr><td>' + response[i].display_name + '</td><td><div id="others' + response[i]
                    .id + '">' + response[i].description +
                    '</div></td> <td><a style="font-size:20px;" href="javascript:;" onclick="editCourseOthersData(' +
                    response[i].id + ',\'' + response[i].display_name +
                    '\')" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;<a style="font-size:20px;" href="javascript:;" onclick="deleteCourseOthersData(' +
                    response[i].id + ',' + response[i].course_id +
                    ');" id="basicError" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr>';
                $("#DataTableOtherData tbody").append(str);
            }
        }

    })
}



function editCourseReview(course_review_id, star) {

    document.getElementById('course_review_id').value = course_review_id;
    var description = document.getElementById('review' + course_review_id).innerHTML;

    $('#summernote6').summernote('code', description);

}

function deleteCourseReview(id, courseId) {
    $.ajax({
        url: "{{ url('delete-course-review') }}/" + id + "/" + courseId,
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            response = data;
            Lobibox.notify('success', {
                msg: 'Data has been deleted successfully..'
            });
            $("#DataTableReview tbody").empty();
            for (var i = 0; i < response.length; i++) {
                var str = '<tr><td>' + response[i].star + '</td><td><div id="review' + response[i].id +
                    '">' + response[i].description +
                    '</div></td> <td><a style="font-size:20px;" href="javascript:;" onclick="editCourseReview(' +
                    response[i].id + ',\'' + response[i].star +
                    '\')" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;<a style="font-size:20px;" href="javascript:;" onclick="deleteCourseReview(' +
                    response[i].id + ',' + response[i].course_id +
                    ');" id="basicError" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr>';
                $("#DataTableReview tbody").append(str);
            }
        }

    })
}



function saveReview() {
    var isblank = false;
    var course_id = document.getElementById('course_id').value;
    var star = document.getElementById('star').value;
    var course_review_id = document.getElementById('course_review_id').value;
    if (course_id != "") {
        var token = document.getElementById('_token').value;
        var plainText = $('#summernote6').summernote('code');
        if (star == 0) {
            isblank = true;
            document.getElementById('star').focus();
        } else if (plainText == "") {
            $('#summernote6').summernote('focus');
            isblank = true;
        }
        if (isblank == false) {
            var axajUrl = "/addCourseReview";
            $.ajax({
                type: "POST",
                url: axajUrl,
                data: {
                    _token: token,
                    star: star,
                    course_id: course_id,
                    description: plainText,
                    course_review_id: course_review_id,
                },
                async: false,
                dataType: "json",
                success: function(dataResult) {
                    Lobibox.notify('success', {
                        msg: 'Your inputed data has been added successfully..'
                    });

                    $('#summernote6').summernote('code', '');
                    document.getElementById('course_review_id').value = "";
                    response = dataResult;
                    $("#DataTableReview tbody").empty();
                    for (var i = 0; i < response.length; i++) {
                        var str = '<tr><td>' + response[i].star + '</td><td><div id="review' + response[i]
                            .id + '">' + response[i].description +
                            '</div></td> <td><a style="font-size:20px;" href="javascript:;" onclick="editCourseReview(' +
                            response[i].id + ',\'' + response[i].star +
                            '\')" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;<a style="font-size:20px;" href="javascript:;" onclick="deleteCourseReview(' +
                            response[i].id + ',' + response[i].course_id +
                            ');" id="basicError" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr>';
                        $("#DataTableReview tbody").append(str);
                    }
                }
            });
        }
    } else {
        alert("Course id isnot available, try again!");
    }
}



function saveCurriculumn() {
    var isblank = false;
    var course_id = document.getElementById('course_id').value;
    if (course_id != "") {
        if (document.getElementById('display_name_curriculumn').value == "") {
            document.getElementById('display_name_curriculumn').focus();
            isblank = true;
        } else if (document.getElementById('lesson_curriculumn').value == "") {
            document.getElementById('lesson_curriculumn').focus();
            isblank = true;
        }

        var plainText = $('#summernote1').summernote('code');
        if (plainText == "") {
            $('#summernote1').summernote('focus');
        }

        var token = document.getElementById('_token').value;
        var display_name = document.getElementById('display_name_curriculumn').value;
        var lesson = document.getElementById('lesson_curriculumn').value;
        var sub_lesson = document.getElementById('sub_lesson_curriculumn').value;
        var child_lesson = document.getElementById('child_lesson_curriculumn').value;
        var course_curriculumn_id = document.getElementById('course_curriculumn_id').value;
        var allowReview = 0;
        if (document.getElementById("enablereview").checked == true) {
            allowReview = 1;
        }
        if (isblank == false) {
            var axajUrl = "/addcourseCurriculumnData";
            $.ajax({
                type: "POST",
                url: axajUrl,
                data: {
                    _token: token,
                    display_name: display_name,
                    lesson: lesson,
                    sub_lesson: sub_lesson,
                    child_lesson: child_lesson,
                    description: plainText,
                    lesson_preview: allowReview,
                    course_id: course_id,
                    course_curriculumn_id: course_curriculumn_id,
                },
                async: false,
                dataType: 'json',
                success: function(dataResult) {
                    Lobibox.notify('success', {
                        msg: 'Your inputed data has been added successfully..'
                    });
                    $('#summernote1').summernote('code', '');
                    document.getElementById('sub_lesson_curriculumn').value = "";
                    document.getElementById('child_lesson_curriculumn').value = "";
                    document.getElementById("enablereview").checked = false;
                    document.getElementById('course_curriculumn_id').value = "";
                    response = dataResult;
                    // alert(response.length);
                    $("#DataTableCurriculumn tbody").empty();
                    for (var i = 0; i < response.length; i++) {
                        var str = '<tr><td>' + response[i].lesson + '</td><td>' + response[i].sub_lesson +
                            '</td><td>' + response[i].child_lesson + '</td><td><div id="currricullmn' +
                            response[i].id + '" style="display:none;">' + response[i].description +
                            '</div></td> <td><a style="font-size:20px;" href="javascript:;" onclick="editCurriCullmn(' +
                            response[i].id + ',\'' + response[i].display_name + '\',\'' + response[i]
                            .lesson + '\',\'' + response[i].sub_lesson + '\',\'' + response[i]
                            .child_lesson + '\',\'' + response[i].lesson_preview +
                            '\')" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;<a style="font-size:20px;" href="javascript:;" onclick="deleteCurricullmn(' +
                            response[i].id + ',' + response[i].course_id +
                            ');" id="basicError" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr>';
                        $("#DataTableCurriculumn tbody").append(str);
                    }
                }
            });
        }
    } else {
        alert("Course id isnot available, try again!");
    }
}

function editCurriCullmn(course_curriculumn_id, display_name, lesson, sub_lesson, child_lesson, lesson_preview) {
    document.getElementById('display_name_curriculumn').value = display_name;
    document.getElementById('lesson_curriculumn').value = lesson;
    document.getElementById('sub_lesson_curriculumn').value = sub_lesson;
    document.getElementById('child_lesson_curriculumn').value = child_lesson;
    document.getElementById('course_curriculumn_id').value = course_curriculumn_id;
    var description = document.getElementById('currricullmn' + course_curriculumn_id).innerHTML;
    $('#summernote1').summernote('code', description);
    document.getElementById("enablereview").checked = false;
    if (lesson_preview == 1) {
        document.getElementById("enablereview").checked = true;
    }
}



function deleteCurricullmn(id, courseId) {
    $.ajax({
        url: "{{ url('delete-course-curriculumn') }}/" + id + "/" + courseId,
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            response = data;
            Lobibox.notify('success', {
                msg: 'Data has been deleted successfully..'
            });
            $("#DataTableCurriculumn tbody").empty();
            for (var i = 0; i < response.length; i++) {
                var str = '<tr><td>' + response[i].lesson + '</td><td>' + response[i].sub_lesson +
                    '</td><td>' + response[i].child_lesson + '</td><td><div id="currricullmn' + response[i]
                    .id + '" style="display:none;">' + response[i].description +
                    '</div></td> <td><a style="font-size:20px;" href="javascript:;" onclick="editCurriCullmn(' +
                    response[i].id + ',\'' + response[i].display_name + '\',\'' + response[i].lesson +
                    '\',\'' + response[i].sub_lesson + '\',\'' + response[i].child_lesson + '\',\'' +
                    response[i].lesson_preview +
                    '\')" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;<a style="font-size:20px;" href="javascript:;" onclick="deleteCurricullmn(' +
                    response[i].id + ',' + response[i].course_id +
                    ');" id="basicError" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr>';
                $("#DataTableCurriculumn tbody").append(str);
            }
        }

    })
}

function gotoNext() {
    var curriculumntab = document.getElementById("curriculumntab");
    curriculumntab.classList.add("active");

    var coursetab = document.getElementById("coursetab");
    coursetab.classList.remove("active");

    var course_content = document.getElementById("course");
    course_content.classList.remove("active");
    course_content.classList.remove("in");

    var curriculumn_content = document.getElementById("curriculumn");
    curriculumn_content.classList.add("active");
    curriculumn_content.classList.add("in");


}

function saveCourseSetting() {
    var isblank = false;
    if (document.getElementById('cid').value == "0") {
        document.getElementById('cid').focus();
        isblank = true;
    } else if (document.getElementById('s_cid').value == "0") {
        document.getElementById('s_cid').focus();
        isblank = true;
    } else if (document.getElementById('child_catagory_id').value == "0") {
        document.getElementById('child_catagory_id').focus();
        isblank = true;
    } else if (item.length <= 0) {
        alert("Please select author first.");
    } else if (document.getElementById('coursePrice').value == "") {
        document.getElementById('coursePrice').focus();
        isblank = true;
    } else if (document.getElementById('course_title').value == "") {
        document.getElementById('course_title').focus();
        isblank = true;
    }
    var token = document.getElementById('_token').value;
    var cid = document.getElementById('cid').value;
    var edit_course_id = document.getElementById('edit_course_id').value;
    var s_cid = document.getElementById('s_cid').value;
    var child_catagory_id = document.getElementById('child_catagory_id').value;
    var coursePrice = document.getElementById('coursePrice').value;
    var course_title = document.getElementById('course_title').value;
    var image_thumbnail = document.getElementById('file_upload_course_thumbnail').value;
    var plainText = $('#summernote2').summernote('code');
    var course_video_duration = document.getElementById('course_video_duration').value;
    var allow_review = 0;
    if (document.getElementById("allow_review").checked == true) {
        allow_review = 1;
    }
    var discussion_with_teacher = 0;
    if (document.getElementById("discussion_with_teacher").checked == true) {
        discussion_with_teacher = 1;
    }
    var allow_file_attach_for_discussion = 0;
    if (document.getElementById("allow_file_attach_for_discussion").checked == true) {
        allow_file_attach_for_discussion = 1;
    }

    if (isblank == false) {

        var axajUrl = "/addcourseData";
        $.ajax({
            type: "POST",
            url: axajUrl,
            data: {
                _token: token,
                item: item.toString(),
                items: items.toString(),
                cid: cid,
                s_cid: s_cid,
                child_catagory_id: child_catagory_id,
                course_price: coursePrice,
                course_title: course_title,
                thumbnail: image_thumbnail,
                course_description: plainText,
                course_video_duration: course_video_duration,
                allow_review: allow_review,
                discussion_with_teacher: discussion_with_teacher,
                allow_file_attach_for_discussion: allow_file_attach_for_discussion,
                edit_course_id: edit_course_id,
            },
            async: false,
            success: function(dataResult) {
                Lobibox.notify('success', {
                    msg: 'Your inputed data has been added successfully..'
                });
                var data = JSON.parse(dataResult);
                document.getElementById('course_id').value = data.course_id;
                gotoNext();
            }
        });
    }
}
Date.prototype.addDays = function(days) {
    const date = new Date(this.valueOf())
    date.setDate(date.getDate() + days)
    return date
}

function getDate() {
    var todaydate = new Date();
    var day = todaydate.getDate();

    var month = todaydate.getMonth() + 1;
    var year = todaydate.getFullYear();

    if (day < 10) {
        day = "0" + day;
    }
    if (month < 10) {
        month = "0" + month;
    }

    var datestring = year + "-" + month + "-" + day

    document.getElementById("exDate").value = datestring;
}

function showItems() {

    var noOfDays = document.getElementById('noOfDays').value;
    var normalPrice = document.getElementById('normalPrice').value;
    var sellPrice = document.getElementById('sellPrice').value;
    var exDate = document.getElementById('exDate').value;


    const date = new Date(exDate);
    var addedDate = date.addDays(parseInt(noOfDays));
    var finaldate = new Date(addedDate);


    if (noOfDays != "" && normalPrice != "" && sellPrice != "" && exDate != "") {
        items.push(noOfDays + '{#}' + normalPrice + '{#}' + sellPrice + '{#}' + finaldate.toLocaleDateString('en-CA'));

        displayBasketItemIntoTable();
        document.getElementById('noOfDays').value = "";
        document.getElementById('normalPrice').value = "";
        document.getElementById('sellPrice').value = "";
        // document.getElementById('exDate').value = "";
        // getDate();
    } else {
        alert("Please fill the all required field.");

    }

}

function removeItem(data) {

    if (items.includes(data)) {
        var index = items.indexOf(data);
        if (index !== -1) {
            items.splice(index, 1);
        }
    }
    displayBasketItemIntoTable();
}

function displayBasketItemIntoTable() {
    document.getElementById('datatable').innerHTML = "";
    for (let i = 0; i < items.length; i++) {

        var str = '<tr><td>' + items[i].split("{#}")[0] + '</td><td>' + items[i].split("{#}")[1] + '</td><td>' + items[
            i].split("{#}")[2] + '</td><td>' + items[i].split("{#}")[3] + '</td><td onclick="removeItem(\'' + items[
            i] + '\')"> <i class="fa fa-times"></i></tr>';

        $('#datatable').append(str);
    }

}


function teacherItems(authorId) {

    var fullName = document.getElementById('authername').value;
    if (fullName != "") {
        item.push(fullName + '{#}');

        displayBasketItemIntoTeacherTable();
        document.getElementById('authername').value = "";
    }

}

function removeTeacher(data) {

    if (item.includes(data)) {
        var index = item.indexOf(data);
        if (index !== -1) {
            item.splice(index, 1);
        }
    }
    displayBasketItemIntoTeacherTable();
}

function displayBasketItemIntoTeacherTable() {


    var teacherName = "";
    document.getElementById('datatableTeacher').innerHTML = "";
    for (let i = 0; i < item.length; i++) {
        //total += parseFloat(items[i].split("{#}")[2]) * parseFloat(items[i].split("{#}")[3]);

        teacherName = item[i].split("{#}")[0];
        teacherName = teacherName.split("[#]")[1];

        var str = '<tr><td>' + teacherName + '</td><td onclick="removeTeacher(\'' + item[i] +
            '\')"> <i class="fa fa-times"></i></tr>';

        $('#datatableTeacher').append(str);
    }

}
</script>

</html>
@endsection