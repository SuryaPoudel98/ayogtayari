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
                                <li><span class="bread-blod"> Add Quiz </span>
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
                    <ul id="myTabedu1" class="tab-review-design">
                        <li id="descriptiontab" class="active"><a href="#description">Quiz Settings</a></li>
                        <li id="informationtab"><a href="#information">Questions</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad addcoursepro">
                                            <form action="{{url('addQuizData')}}" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                                @csrf
                                                <input type="hidden" name="edit_quiz_id" id="edit_quiz_id" value="{{@$quiz[0]->quiz_id}}">
                                                <input type="hidden" id="_token" value="{{ csrf_token() }}">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group res-mg-t-15">
                                                            <input name="text" value="{{@$quiz[0]->quiz_title}}" id="quiz_title" type="text" class="form-control" placeholder="Quiz Title">
                                                        </div>

                                                        <div class="form-group">

                                                            <input name="thumbnail" id="quiz_thumbnail" type="file" class="form-control">
                                                            <input type="hidden" value="{{@$quiz[0]->thumbnail}}" name="file_upload_quiz_thumbnail" id="file_upload_quiz_thumbnail" />
                                                            @if(@$quiz[0]->thumbnail!="")
                                                            <img src="/uploads/Postimg/{{@$quiz[0]->thumbnail}}" style="text-align: center;" id="quiz_thumbnail_img" height="100" width="100" />
                                                            @else
                                                            <img src="thumbnail.png" style="text-align: center;" id="quiz_thumbnail_img" height="100" width="100" />
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control select3 select2-danger" name="qid" id="qid" data-dropdown-css-class="select2-danger" style="width: 100%;" required>
                                                                <option value="0">Select Quiz category</option>
                                                                @foreach($quizCatagories as $item)
                                                                <option <?php if (@$quiz[0]->qid == $item->qid) {
                                                                            echo 'selected';
                                                                        } ?> value="{{$item->qid}}">{{$item->quiz_catagories_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control select3 select2-danger" name="q_sid" id="q_sid" data-dropdown-css-class="select2-danger" style="width: 100%;" required>
                                                                <option value="0">Select Quiz Sub category</option>
                                                                @foreach($quizSubCatagories as $item)
                                                                <option <?php if (@$quiz[0]->q_sid == $item->q_sid) {
                                                                            echo 'selected';
                                                                        } ?> value="{{$item->q_sid}}">{{$item->quiz_sub_catagory_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control select3 select2-danger" name="quiz_child_catagory_id" id="quizchild_catagory_id" data-dropdown-css-class="select2-danger" style="width: 100%;" required>
                                                                <option value="0">Select Quiz Child category</option>
                                                                @foreach($quizChildCatagories as $item)
                                                                <option <?php if (@$quiz[0]->quiz_child_catagory_id == $item->quiz_child_catagory_id) {
                                                                            echo 'selected';
                                                                        } ?> value="{{$item->quiz_child_catagory_id}}">{{$item->quiz_child_catagory_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">

                                                            <select onchange="coursePricingListing();" class="form-control select3 select2-danger" id="quizPrice" name="quizPrice" data-dropdown-css-class="select2-danger" style="width: 100%;" required>
                                                                <option value="">Select Course Pricing</option>
                                                                <option <?php if (@$quiz[0]->quiz_price == 0) {
                                                                            echo 'selected';
                                                                        } ?> value="0">Free</option>
                                                                <option <?php if (@$quiz[0]->quiz_price == 1) {
                                                                            echo 'selected';
                                                                        } ?> value="1">Paid</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="quiz_pricing_content" <?php if (@$quiz[0]->quiz_price == 1) {
                                                                                                                echo 'style="display:block;"';
                                                                                                            } else {
                                                                                                                echo 'style="display:none;"';
                                                                                                            } ?>>
                                                            <div class="col-sm-3"><input name="noOfDays" id="noOfDays" type="text" class="form-control" placeholder="No Of Days"></div>
                                                            <div class="col-sm-3"><input name="normalPrice" id="normalPrice" type="text" class="form-control" placeholder="Normal Price"></div>
                                                            <div class="col-sm-3"><input name="sellPrice" id="sellPrice" type="text" class="form-control" placeholder="Sell Price"></div>
                                                            <div class="col-sm-3"><input name="exDate" id="exDate" type="hidden" class="form-control" placeholder="Expiry Date"></div>
                                                            <div class="col-sm-1"><input value="Add" onclick=showItems(); class="btn btn-primary waves-effect waves-light" type="button"></input></div>
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

                                                        <div class="form-group">
                                                            <div style="display: flex;">
                                                                <div style="width: 90%; margin-right:10px;">
                                                                    <select class="form-control select3 select2-danger" id="authername" name="authername" data-dropdown-css-class="select2-danger" required>

                                                                        <option value="">Select Author</option>

                                                                        @foreach($teacher as $item)
                                                                        <option value="{{$item->teacher_id}}[#]{{$item->fullname}}">{{$item->fullname}}</option>
                                                                        @endforeach
                                                                    </select>

                                                                </div>

                                                                <div>
                                                                    <input value="Add" onclick=teacherItems(); class="btn btn-success waves-effect waves-light" type="button"></input>
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



                                                        <div class="form-group">
                                                            <label>Marks System</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="number" value="{{@$quiz[0]->marks_for_correction}}" name="marks_for_correction" id="marks_for_correction" class="form-control" placeholder="Marks for Correct Answer">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="number" value="{{@$quiz[0]->negative_marks}}" class="form-control" name="negative_marks" id="negative_marks" placeholder="Negative Marks%  ">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="number" value="{{@$quiz[0]->pass_marks}}" class="form-control" id="pass_marks" name="pass_marks" placeholder="Pass Marks ">
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                        <div class="form-group">
                                                            <input type="number" class="form-control" id="no_of_option" value="{{@$quiz[0]->no_of_option}}" placeholder="No of Option per Question ">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control" value="{{@$quiz[0]->quiz_time}}" name="quiz_time" id="quiz_time" placeholder="Quiz Time ">
                                                        </div>

                                                        <div class="form-group">

                                                            <div class="alert-title">
                                                                <h2>Description</h2>

                                                            </div>
                                                            <input id="summernote2" style="display: none;">
                                                            </input>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check">

                                                                <input <?php if (@$quiz[0]->practise_mode == 1) {
                                                                            echo 'checked';
                                                                        } ?> type="checkbox" id="practise_mode" value="1" class="form-check-input">
                                                                <label class="form-check-label">Practise Mode &nbsp;</label>
                                                                <input <?php if (@$quiz[0]->random_question == 1) {
                                                                            echo 'checked';
                                                                        } ?> type="checkbox" id="random_question" value="1" class="form-check-input">
                                                                <label class="form-check-label">Random Question &nbsp;</label>
                                                                <input <?php if (@$quiz[0]->random_option == 1) {
                                                                            echo 'checked';
                                                                        } ?> type="checkbox" id="random_option" class="form-check-input">
                                                                <label class="form-check-label">Random Option &nbsp;</label>
                                                                <input <?php if (@$quiz[0]->report_question == 1) {
                                                                            echo 'checked';
                                                                        } ?> type="checkbox" id="report_question" class="form-check-input">
                                                                <label class="form-check-label">Report Questions &nbsp;</label>
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1">
                                                        <div class="payment-adress">
                                                            <button id="saveQuizSetting_id" type="button" onclick="saveQuizSetting();" class="btn btn-primary waves-effect waves-light">Save quiz settings</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="product-tab-list tab-pane fade" id="information">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="review-content-section">
                                        <form class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                            @csrf
                                            <div class="row">

                                                <input type="number" id="quiz_id" value="{{@$quiz[0]->quiz_id}}" hidden>
                                                <div class="col-lg-6">
                                                    <div class="devit-card-custom">
                                                        <div class="form-group">
                                                            <label>Upload Questions</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <input name="Upload Questions" type="file" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Import Question from Question bank</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <input name="" id="importquestionfrombank" onkeyup="searcQuestionBank();" placeholder="Search question bank" onfocus="clearfield('importquestionfrombank');" type="text" class="form-control">
                                                            <ul id="myULForBank">

                                                            </ul>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Inport From Another Quiz </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <!-- <input name="" placeholder="Search quiz" type="text" class="form-control"> -->
                                                            <input type="text" onkeyup="searchQuizTitle();" onfocus="clearfield('searchQuiz');" name="searchQuiz" id="searchQuiz" class="form-control" placeholder="Search quiz">

                                                            <ul id="myUL">

                                                            </ul>
                                                        </div>



                                                    </div>

                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="devit-card-custom">
                                                        <div class="form-group">
                                                            &nbsp;
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-info waves-effect waves-light">Download sample file</button>
                                                        </div>


                                                    </div>

                                                </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                            <div class="row">


                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <form class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="devit-card-custom">

                                                        <input type="hidden" name="questions_id" id="questions_id" value="">
                                                        <div class="form-group">
                                                            <div class="alert-title">
                                                                <h2> Question</h2>

                                                            </div>
                                                            <input id="summernote3" style="display: none;">
                                                            </input>
                                                        </div>

                                                        <div class="form-group">
                                                            <div style="display: flex;">
                                                                <div style="width: 90%; margin-right:10px;">
                                                                    <select class="form-control select3 select2-danger" id="question_bank_name" name="question_bank_name" data-dropdown-css-class="select2-danger" required>
                                                                        <option value="">Select Question Bank</option>
                                                                        @foreach($questionBank as $item)
                                                                        <option value="{{$item->question_bank_id }}[#]{{$item->question_bank_name}}">{{$item->question_bank_name}}</option>
                                                                        @endforeach
                                                                    </select>

                                                                </div>

                                                                <div>
                                                                    <input value="Add" onclick=question_bank_nameItems(); class="btn btn-success waves-effect waves-light" type="button"></input>
                                                                </div>

                                                            </div>



                                                        </div>
                                                        <div class="form-group">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Question bank</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="datatableQuestionbank">


                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>



                                        </form>
                                    </div>
                                </div>

                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                    <div class="review-content-section">
                                        <form class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                            @csrf


                                            <div class="row">
                                                <div class="col-lg-10">
                                                    <div class="devit-card-custom">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="devit-card-custom">


                                                                    <div class="form-group">
                                                                        <div class="col-lg-3">
                                                                            <label>Quiz Options</label>
                                                                            <select class="form-control select3 select2-danger" id="optionValue" data-dropdown-css-class="select2-danger" style="width: 100%;" required>
                                                                                <option value="0">Select Option </option>
                                                                                <option value="A">A</option>
                                                                                <option value="B">B</option>
                                                                                <option value="C">C</option>
                                                                                <option value="D">D</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">

                                                                        <div class="col-lg-8">
                                                                            <div class="devit-card-custom">
                                                                                <div style="margin-top: 25px;" class="form-group">
                                                                                    <select class="form-control select3 select2-danger" id="correctOptionValue" data-dropdown-css-class="select2-danger" style="width: 100%;" required>
                                                                                        <option value="0">Choose Correct Option </option>
                                                                                        <option value="YES">YES</option>
                                                                                        <option value="NO">NO</option>

                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <input id="summernote4" style="display: none;">
                                                                                    </input>
                                                                                </div>


                                                                            </div>

                                                                        </div>


                                                                    </div>
                                                                    <div class="form-group">

                                                                        <div>
                                                                            <input style="margin-top: 25px;" value="Add" onclick=answerItems(); class="btn btn-primary waves-effect waves-light" type="button"></input>

                                                                        </div>

                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-lg-9">
                                                                            <div>
                                                                                <table class="table">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Option</th>
                                                                                            <th>Answer </th>
                                                                                            <th>Correct </th>
                                                                                            <th>Action</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody id="datatableAnswer">
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-2">
                                                                <div class="payment-adress">
                                                                    <button type="button" onclick="saveQuestion();" class="btn btn-primary waves-effect waves-light">Add quiz questions </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="hpanel shadow-inner responsive-mg-b-30">
                                        <div class="panel-body">
                                            <div class="table-responsive wd-tb-cr">
                                                <table class="table table-striped" id="DataTableQuestion">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Question </th>

                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @if(!empty($quizQuestions))
                                                        @foreach($quizQuestions as $item)

                                                        <tr>
                                                            <td>{{$item->questions_id}}</td>
                                                            <td>{!! $item->question_title !!}</td>
                                                            <td><a style="font-size:20px;" href="javascript:;" onclick="editQuestion('{{$item->questions_id}}')" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;<a style="font-size:20px;" href="javascript:;" onclick="deleteQuestion('{{$item->questions_id}}','{{$item->quiz_id}}');" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                                        </tr>
                                                        @endforeach

                                                        @endif

                                                    </tbody>
                                                </table>
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


            <div class="col-lg-12">
                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                    Launch demo modal
                </button> -->
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Questions</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="panel-body">
                                    <div class="table-responsive wd-tb-cr">
                                        <table class="table table-striped" id="DataTableQuestionFromSearch">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Question </th>
                                                    <input type="hidden" id="totalqsn" value="0">
                                                    <th><input type="checkbox" id="unselectall" onchange="unselectallitems();" checked></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" onclick="insertQuestions();" class="btn btn-primary">Save changes</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const item = []; // course authores 
    const items = []; // course pricings
</script>

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


    #myULForBank {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: none;
        z-index: 900;
        position: absolute;
        width: 90%;
    }

    #myULForBank li a {
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

    #myULForBank li a:hover:not(.header) {
        background-color: #eee;
    }
</style>
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

    items.push('{{$item->no_of_days}}' + '{#}' + '{{$item->normal_price}}' + '{#}' + '{{$item->sell_price}}' + '{#}' + '{{$item->sell_exipiry_date}}');
</script>
@endforeach
@endif
<script type="text/javascript">
    // const item = [];
    // const items = [];
    const answer = [];
    const item_questionBank = [];
    const questions = [];
    const notFilteredQuestions = [];

    window.onload = function(e) {
        getDate();
        displayBasketItemIntoTeacherTable();
        displayBasketItemIntoTable();
        $('#summernote2').summernote('code', '<?php echo @$quiz[0]->quiz_description; ?>');
    }

  

    function insertQuestions() {
        var token = document.getElementById('_token').value;
        var quiz_id = document.getElementById('quiz_id').value;
        var axajUrl = "/storeQuestionsFromAnotherQuiz";
        if (questions.length > 0) {
            $.ajax({
                type: "POST",
                url: axajUrl,
                data: {
                    _token: token,
                    quiz_id: quiz_id,
                    questions: questions.toString(),
                },
                async: false,
                dataType: "json",
                success: function(dataResult) {
                    $('#exampleModalLong').modal('hide');
                    Lobibox.notify('success', {
                        msg: 'Your inputed data has been added successfully..'
                    });

                    // answer.splice(0, answer.length);
                    // item_questionBank.splice(0, item_questionBank.length);
                    // displayBasketItemIntoquestion_bank_nameTable();
                    // displayBasketItemIntoAnswerTable();

                    response = dataResult;
                    // $('#summernote3').summernote('code', '');
                    $("#DataTableQuestion tbody").empty();
                    for (var i = 0; i < response.length; i++) {
                        var str = '<tr><td>' + response[i].questions_id + '</td><td>' + response[i].question_title + '</td> <td><a style="font-size:20px;" href="javascript:;" onclick="editQuestion(' + response[i].questions_id + ')" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;<a style="font-size:20px;" href="javascript:;" onclick="deleteQuestion(' + response[i].questions_id + ',' + response[i].quiz_id + ');"  data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr>';
                        $("#DataTableQuestion tbody").append(str);
                    }
                }
            });

        } else {
            alert("Invalid!");
        }
    }

    function clearfield(val) {
        document.getElementById(val).value = "";
    }



    function updateQuestionBankAndId(bank_id, bankName) {
        document.getElementById('importquestionfrombank').value = bankName;
        document.getElementById("myULForBank").style.display = "none";
        $.ajax({
            url: "{{ url('getQuestionsByBankId') }}/" + bank_id,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                response = data;
                Lobibox.notify('success', {
                    msg: 'Data has been retrived successfully..'
                });

                $("#DataTableQuestionFromSearch tbody").empty();
                document.getElementById("totalqsn").value = response.length;
                for (var i = 0; i < response.length; i++) {
                    var str = '<tr><td>' + response[i].questions_id + '</td><td>' + response[i].question_title + '</td> <td><input onchange="unselectthis(' + response[i].questions_id + ');" type="checkbox" id="qsn' + response[i].questions_id + '" value="' + response[i].questions_id + '" checked></td></tr>';
                    $("#DataTableQuestionFromSearch tbody").append(str);
                    questions.push(response[i].questions_id);
                    notFilteredQuestions.push(response[i].questions_id);
                }
                $('#exampleModalLong').modal('show');
            }
        })
    }


    function searcQuestionBank() {
        var searchKey = $("#importquestionfrombank").val();
        $.ajax({
            url: "{{ url('searchQuestionBank') }}",
            method: 'GET',
            data: {
                query: searchKey,
            },
            dataType: 'json',
            success: function(data) {
                response = data;
                document.getElementById("myULForBank").style.display = "block";
                $("#myULForBank").html('');
                for (var i = 0; i < response.length; i++) {
                    var str = '<li><a href="javascript:;" onclick="updateQuestionBankAndId(' + response[i].question_bank_id + ',\'' + response[i].question_bank_name + '\');">' + response[i].question_bank_name + '</a></li>';

                    $("#myULForBank").append(str);
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
                    var str = '<li><a href="javascript:;" onclick="updateQuizTitleAndId(' + response[i].quiz_id + ',\'' + response[i].quiz_title + '\');">' + response[i].quiz_title + '</a></li>';

                    $("#myUL").append(str);
                }
            }

        })
    }



    function unselectallitems() {

        if (document.getElementById("unselectall").checked == false) {

            for (var i = 0; i < document.getElementById("totalqsn").value; i++) {

                document.getElementById("qsn" + questions[i]).checked = false;
            }
            questions.splice(0, document.getElementById("totalqsn").value);
        } else {
            questions.splice(0, document.getElementById("totalqsn").value);
            for (var i = 0; i < document.getElementById("totalqsn").value; i++) {

                document.getElementById("qsn" + notFilteredQuestions[i]).checked = true;
                questions.push(notFilteredQuestions[i]);
            }
        }
    }


    function unselectthis(data) {
        if (document.getElementById("qsn" + data).checked == false) {
            if (questions.includes(data)) {
                var index = questions.indexOf(data);
                if (index !== -1) {
                    questions.splice(index, 1);
                }
            }
        } else {
            questions.push(data);
        }

    }

    function updateQuizTitleAndId(quiz_id, quiz_title) {

        document.getElementById('searchQuiz').value = quiz_title;
        document.getElementById("myUL").style.display = "none";
        $.ajax({
            url: "{{ url('getQuestionsByQuizId') }}/" + quiz_id,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                response = data;
                Lobibox.notify('success', {
                    msg: 'Data has been retrived successfully..'
                });

                $("#DataTableQuestionFromSearch tbody").empty();
                document.getElementById("totalqsn").value = response.length;
                for (var i = 0; i < response.length; i++) {
                    var str = '<tr><td>' + response[i].questions_id + '</td><td>' + response[i].question_title + '</td> <td><input onchange="unselectthis(' + response[i].questions_id + ');" type="checkbox" id="qsn' + response[i].questions_id + '" value="' + response[i].questions_id + '" checked></td></tr>';
                    $("#DataTableQuestionFromSearch tbody").append(str);
                    questions.push(response[i].questions_id);
                    notFilteredQuestions.push(response[i].questions_id);
                }
                $('#exampleModalLong').modal('show');
            }
        })
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
            uploadImageForQuiz(srcEncoded, id, imgId);

        }
    }

    function uploadImageForQuiz(imageFile, id, imgId) {

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
    $('#quiz_thumbnail').on('change', function(ev) {
        //  alert("dfsa");
        var filedata = this.files[0];

        var imgtype = filedata.type;
        var match = ['image/jpeg', 'image/jpg'];
        if (imgtype == 'image/jpeg' || imgtype == 'image/jpg' || imgtype == 'image/png') {
            var reader = new FileReader();
            reader.onload = function(ev) {
                imageFile = ev.target.result;
                resizeImage(imageFile, 'file_upload_quiz_thumbnail', 'quiz_thumbnail_img');
            }
            reader.readAsDataURL(this.files[0]);
        } else {
            alert("Only accept image format!")
        }

    });



    function saveQuizSetting() {
        // gotoNext();
        var isblank = false;
        if (document.getElementById('qid').value == "0") {
            document.getElementById('qid').focus();
            isblank = true;
        } else if (document.getElementById('q_sid').value == "0") {
            document.getElementById('q_sid').focus();
            isblank = true;
        } else if (document.getElementById('quizchild_catagory_id').value == "0") {
            document.getElementById('quizchild_catagory_id').focus();
            isblank = true;
        } else if (item.length <= 0) {
            alert("Please select Quiz author first.");
        } else if (document.getElementById('quizPrice').value == "") {
            document.getElementById('quizPrice').focus();
            isblank = true;
        } else if (document.getElementById('quiz_title').value == "") {
            document.getElementById('quiz_title').focus();
            isblank = true;
        }
        var token = document.getElementById('_token').value;
        var qid = document.getElementById('qid').value;
        var q_sid = document.getElementById('q_sid').value;
        var quiz_child_catagory_id = document.getElementById('quizchild_catagory_id').value;
        var quizPrice = document.getElementById('quizPrice').value;
        var quiz_title = document.getElementById('quiz_title').value;
        var marks_for_correction = document.getElementById('marks_for_correction').value;
        var negative_marks = document.getElementById('negative_marks').value;
        var pass_marks = document.getElementById('pass_marks').value;
        var no_of_option = document.getElementById('no_of_option').value;
        var quiz_time = document.getElementById('quiz_time').value;
        var edit_quiz_id = document.getElementById('edit_quiz_id').value;
        var file_upload_quiz_thumbnail = document.getElementById('file_upload_quiz_thumbnail').value;
        var axajUrl = "/addQuizData";
        var plainText = $('#summernote2').summernote('code');
        var report_question = 0;
        if (document.getElementById("report_question").checked == true) {
            report_question = 1;
        }
        var random_option = 0;
        if (document.getElementById("random_option").checked == true) {
            random_option = 1;
        }
        var random_question = 0;
        if (document.getElementById("random_question").checked == true) {
            random_question = 1;
        }

        var practise_mode = 0;
        if (document.getElementById("practise_mode").checked == true) {
            practise_mode = 1;
        }

        if (isblank == false) {

            var axajUrl = "/addQuizData";
            $.ajax({
                type: "POST",
                url: axajUrl,
                data: {

                    _token: token,
                    item: item.toString(),
                    items: items.toString(),
                    qid: qid,
                    q_sid: q_sid,
                    edit_quiz_id: edit_quiz_id,
                    quiz_child_catagory_id: quiz_child_catagory_id,
                    quiz_price: quizPrice,
                    quiz_title: quiz_title,
                    thumbnail: file_upload_quiz_thumbnail,
                    quiz_description: plainText,
                    practise_mode: practise_mode,
                    random_question: random_question,
                    random_option: random_option,
                    report_question: report_question,
                    marks_for_correction: marks_for_correction,
                    negative_marks: negative_marks,
                    pass_marks: pass_marks,
                    no_of_option: no_of_option,
                    quiz_time: quiz_time,
                },
                async: false,
                success: function(dataResult) {
                    var data = JSON.parse(dataResult);
                    Lobibox.notify('success', {
                        msg: 'Your inputed data has been added successfully..'
                    });
                    document.getElementById("saveQuizSetting_id").disabled = true;
                    gotoNext();
                    document.getElementById('quiz_id').value = data.quiz_id;
                }
            });
        }
    }



    function gotoNext() {
        var curriculumntab = document.getElementById("informationtab");
        curriculumntab.classList.add("active");

        var coursetab = document.getElementById("descriptiontab");
        coursetab.classList.remove("active");

        var course_content = document.getElementById("description");
        course_content.classList.remove("active");
        course_content.classList.remove("in");

        var curriculumn_content = document.getElementById("information");
        curriculumn_content.classList.add("active");
        curriculumn_content.classList.add("in");


    }

    function saveQuestion() {
        var isBlank = false;
        var token = document.getElementById('_token').value;
        var quiz_id = document.getElementById('quiz_id').value;
        var questions_id = document.getElementById('questions_id').value;
        var axajUrl = "/addQuizQuestions";
        var plainText = $('#summernote3').summernote('code');
        if (quiz_id != "") {
            if ($('#summernote3').summernote('isEmpty')) {
                isBlank = true;
                alert("Please enter question first!");
            } else if (item_questionBank.length < 1) {
                alert("Please select question bank.");
                isBlank = true;
            } else if (answer.length < 1) {
                alert("Please add answer options.");
                isBlank = true;
            }
            if (isBlank == false) {
                $.ajax({
                    type: "POST",
                    url: axajUrl,
                    data: {
                        _token: token,
                        quiz_id: quiz_id,
                        answerItems: answer,
                        item_questionBank: item_questionBank.toString(),
                        question_title: plainText,
                        feedback: "notyet",
                        questions_id: questions_id,
                    },
                    async: false,
                    dataType: "json",
                    success: function(dataResult) {
                        Lobibox.notify('success', {
                            msg: 'Your inputed data has been added successfully..'
                        });
                        answer.splice(0, answer.length);
                        item_questionBank.splice(0, item_questionBank.length);
                        displayBasketItemIntoquestion_bank_nameTable();
                        displayBasketItemIntoAnswerTable();

                        response = dataResult;
                        $('#summernote3').summernote('code', '');
                        $("#DataTableQuestion tbody").empty();
                        for (var i = 0; i < response.length; i++) {
                            var str = '<tr><td>' + response[i].questions_id + '</td><td>' + response[i].question_title + '</td> <td><a style="font-size:20px;" href="javascript:;" onclick="editQuestion(' + response[i].questions_id + ')" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;<a style="font-size:20px;" href="javascript:;" onclick="deleteQuestion(' + response[i].questions_id + ',' + response[i].quiz_id + ');"  data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr>';
                            $("#DataTableQuestion tbody").append(str);
                        }
                    }
                });
            }

        } else {
            alert("Invalid quiz id");
        }
    }



    function editQuestion(questions_id, quiz_id) {
        $.ajax({
            url: "{{ url('edit-quiz-question') }}/" + questions_id,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                response = data;
                Lobibox.notify('success', {
                    msg: 'Data has been retrived successfully..'
                });
                answer.splice(0, answer.length);
                item_questionBank.splice(0, item_questionBank.length);
                document.getElementById("questions_id").value = response.quizQuestions[0].questions_id;
                $('#summernote3').summernote('code', response.quizQuestions[0].question_title);
                var question_bank = "";
                for (var i = 0; i < response.questionBank.length; i++) {
                    question_bank = response.questionBank[i].question_bank_id + "[#]" + response.questionBank[i].question_bank_name;
                    item_questionBank.push(question_bank + '{#}');
                }
                $("#datatableTeacher tbody").empty();
                displayBasketItemIntoquestion_bank_nameTable();

                for (let i = 0; i < response.quizAnswerOption.length; i++) {
                    var correct = "NO";
                    if (response.quizAnswerOption[i].correctornot == 1) {
                        correct = "YES";
                    }
                    answer.push(response.quizAnswerOption[i].answer_option + '{#}' + response.quizAnswerOption[i].answer + '{#}' + correct);
                }
                $("#datatableTeacher tbody").empty();
                displayBasketItemIntoAnswerTable();
            }

        })
    }




    function deleteQuestion(questions_id, quiz_id) {
        $.ajax({
            url: "{{ url('delete-quiz-question') }}/" + questions_id + "/" + quiz_id,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                response = data;
                Lobibox.notify('success', {
                    msg: 'Data has been deleted successfully..'
                });
                $("#DataTableQuestion tbody").empty();
                for (var i = 0; i < response.length; i++) {
                    var str = '<tr><td>' + response[i].questions_id + '</td><td>' + response[i].question_title + '</td> <td><a style="font-size:20px;" href="javascript:;" onclick="editQuestion(' + response[i].questions_id + ')" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;<a style="font-size:20px;" href="javascript:;" onclick="deleteQuestion(' + response[i].questions_id + ',' + response[i].quiz_id + ');"  data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr>';
                    $("#DataTableQuestion tbody").append(str);
                }
            }

        })
    }

    function coursePricingListing() {
        if (document.getElementById("quizPrice").value == 1) {
            document.getElementById("quiz_pricing_content").style.display = "block";
        } else {
            document.getElementById("quiz_pricing_content").style.display = "none";
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
            var str = '<tr><td>' + items[i].split("{#}")[0] + '</td><td>' + items[i].split("{#}")[1] + '</td><td>' + items[i].split("{#}")[2] + '</td><td>' + items[i].split("{#}")[3] + '</td><td onclick="removeItem(\'' + items[i] + '\')"> <i class="fa fa-times"></i></tr>';
            $('#datatable').append(str);
        }

    }

    function question_bank_nameItems(authorId) {
        var fullName = document.getElementById('question_bank_name').value;
        if (fullName != "") {
            item_questionBank.push(fullName + '{#}');
            displayBasketItemIntoquestion_bank_nameTable();
            document.getElementById('question_bank_name').value = "";
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

    function answerItems() {
        var isBlank = false;
        var plainText = $('#summernote4').summernote('code');
        if (document.getElementById('optionValue').value == 0) {
            document.getElementById('optionValue').focus();
            isBlank = true;
        } else if (document.getElementById('correctOptionValue').value == 0) {
            document.getElementById('correctOptionValue').focus();
            isBlank = true;
        } else if ($('#summernote4').summernote('isEmpty')) {
            isBlank = true;
            alert("Please enter answer options");
        }
        var optionValue = document.getElementById('optionValue').value;
        if (isBlank == false) {
            answer.push(optionValue + '{#}' + plainText + '{#}' + document.getElementById('correctOptionValue').value);
            displayBasketItemIntoAnswerTable();
            $('#summernote4').summernote('reset');
            var optionValue = document.getElementById('optionValue').value;
            if (optionValue == "A") {
                document.getElementById('optionValue').value = "B";
            } else if (optionValue == "B") {
                document.getElementById('optionValue').value = "C";
            } else if (optionValue == "C") {
                document.getElementById('optionValue').value = "D";
            } else {
                document.getElementById('optionValue').value = 0;
            }
            if (document.getElementById('correctOptionValue').value == "YES") {
                document.getElementById('correctOptionValue').value = "NO";
            }
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

    function removeQuestionbank(data) {

        if (item_questionBank.includes(data)) {
            var index = item_questionBank.indexOf(data);
            if (index !== -1) {
                item_questionBank.splice(index, 1);
            }
        }
        displayBasketItemIntoquestion_bank_nameTable();
    }

    function removeAnswer(i) {
        answer.splice(i);
        var data = document.getElementById("ans" + i).innerHTML;
        // if (answer.includes(data)) {
        //     var index = answer.indexOf(data);
        //     if (index !== -1) {
        //         answer.splice(index, 1);
        //     }
        // }
        displayBasketItemIntoAnswerTable();
    }

    function displayBasketItemIntoTeacherTable() {
        var teacherName = "";
        document.getElementById('datatableTeacher').innerHTML = "";
        for (let i = 0; i < item.length; i++) {
            teacherName = item[i].split("{#}")[0];
            teacherName = teacherName.split("[#]")[1];
            var str = '<tr><td>' + teacherName + '</td><td onclick="removeTeacher(\'' + item[i] + '\')"> <i class="fa fa-times"></i></tr>';
            $('#datatableTeacher').append(str);
        }
    }

    function displayBasketItemIntoquestion_bank_nameTable() {

        var question_bank = "";
        document.getElementById('datatableQuestionbank').innerHTML = "";
        for (let i = 0; i < item_questionBank.length; i++) {
            question_bank = item_questionBank[i].split("{#}")[0];
            question_bank = question_bank.split("[#]")[1];
            var str = '<tr><td>' + question_bank + '</td><td onclick="removeQuestionbank(\'' + item_questionBank[i] + '\')"> <i class="fa fa-times"></i></tr>';
            $('#datatableQuestionbank').append(str);
        }
    }

    function displayBasketItemIntoAnswerTable() {



        document.getElementById('datatableAnswer').innerHTML = "";
        for (let i = 0; i < answer.length; i++) {
            var str = '<tr><td>' + answer[i].split("{#}")[0] + '</td><td>' + answer[i].split("{#}")[1] + '<div style="visibility:hidden;  height: 2px;" id="ans' + i + '">' + answer[i] + '</div></td><td>' + answer[i].split("{#}")[2] + '</td><td onclick="removeAnswer(' + i + ')"> <i class="fa fa-times"></i></tr>';
            $('#datatableAnswer').append(str);
        }

    }
</script>

@endsection