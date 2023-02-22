@extends('welcome')
@section('content')
<?php
$course = \DB::table('courses')
    ->join('course_catagories', 'courses.cid', '=', 'course_catagories.cid')
    ->select('courses.*', 'course_catagories.catagory_name')
    ->get();
$quiz = \DB::table('quizzes')
    ->join('quiz_catagories', 'quizzes.qid', '=', 'quiz_catagories.qid')
    // ->join('quiz_sub_catagories', 'quizzes.q_sid', '=', 'quiz_sub_catagories.q_sid')
    ->select('quizzes.*', 'quiz_catagories.quiz_catagories_name')
    ->get();
?>
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
                                <li><span class="bread-blod ">Enroll</span>
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
                        <li class="active"><a href="#description">Course Enrollment</a></li>
                        <li><a href="#reviews"> Quiz Enrollment</a></li>

                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad addcoursepro">
                                            <form action="{{url('/addCourseEnrollData')}}" method="POST" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                                @csrf
                                                <div class="row">

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label class="form-label">User Full Name</label>
                                                            <input type="hidden" name="type" value="course">
                                                            <input type="hidden" required id="user_id" name="user_id" value="">
                                                            <input name="userName" required id="userName" onkeyup="selectusers();" type="text" class="form-control" placeholder="Enter user name">
                                                            <div id="dropdown-content" class="dropdown-content">
                                                                <table style="width: 100%" id="DataTable" class="table table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Full Name</th>
                                                                            <th>Mobile Number</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Course Titlte</label>
                                                            <input type="hidden" id="course_id" required name="course_id">
                                                            <input name="coursetitle" id="coursetitle" type="text" class="form-control" required onkeyup="myFunctionForCourse()" placeholder="Enter course title">
                                                            @if(!empty($course))
                                                            <ul id="courseUL">
                                                                @foreach($course as $item)
                                                                <li onclick="updatecourseid('{{$item->course_id}}','{{$item->course_title}}');"><a href="javascript:void">{{$item->course_title}}</a></li>

                                                                @endforeach
                                                            </ul>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Course Pricing</label>
                                                            <input type="hidden" id="pricing_id" name="pricing_id" value="0">
                                                            <select onchange="putdataintoexpirydateandamount();" class="form-control select3 select2-danger" name="pricing" id="pricing" data-dropdown-css-class="select2-danger" style="width: 100%;" required>
                                                                <option value="">Select Price</option>


                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Amount</label>
                                                            <input type="number" required id="sell_price" placeholder="amount" name="sell_price" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Expiry Date</label>
                                                            <input type="date" required id="endDate" name="endDate" class="form-control">
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-1">
                                                        <div class="payment-adress">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade" id="reviews">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <form action="{{url('/addQuizEnrollData')}}" method="POST" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label class="form-label">User Full Name</label>
                                                        <input type="hidden" name="type" value="quiz">
                                                        <input type="hidden" required id="quiz_user_id" name="quiz_user_id" value="">
                                                        <input name="quiz_userName" required id="quiz_userName" onkeyup="quiz_selectusers();" type="text" class="form-control" placeholder="Enter user name">
                                                        <div id="quiz_dropdown-content" class="dropdown-content">
                                                            <table style="width: 100%" id="quiz_DataTable" class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Full Name</th>
                                                                        <th>Mobile Number</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Quiz Titlte</label>
                                                        <input type="hidden" id="quiz_id" required name="quiz_id">
                                                        <input name="quiztitle" id="quiztitle" type="text" class="form-control" required onkeyup="quiz_myFunctionForCourse()" placeholder="Enter quiz title">
                                                        @if(!empty($quiz))
                                                        <ul id="quizUL">
                                                            @foreach($quiz as $item)
                                                            <li onclick="quizudpate('{{$item->quiz_id}}','{{$item->quiz_title}}');"><a href="javascript:void">{{$item->quiz_title}}</a></li>

                                                            @endforeach
                                                        </ul>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Quiz Pricing</label>
                                                        <input type="hidden" id="quiz_pricing_id" name="quiz_pricing_id" value="0">
                                                        <select onchange="quiz_putdataintoexpirydateandamount();" class="form-control select3 select2-danger" name="quiz_pricing" id="quiz_pricing" data-dropdown-css-class="select2-danger" style="width: 100%;" required>
                                                            <option value="">Select Price</option>


                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Amount</label>
                                                        <input type="number" required id="quiz_sell_price" placeholder="amount" name="quiz_sell_price" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Expiry Date</label>
                                                        <input type="date" required id="quiz_endDate" name="endDate" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-1">
                                                    <div class="payment-adress">
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
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
            </div>
        </div>
    </div>
</div>
</div>
<style>
    #courseUL {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: none;
        z-index: 900;
        position: absolute;
        width: 90%;
    }

    #courseUL li a {
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

    #quizUL li a:hover:not(.header) {
        background-color: #eee;
    }


    #quizUL {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: none;
        z-index: 900;
        position: absolute;
        width: 90%;
    }

    #quizUL li a {
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

    #quizUL li a:hover:not(.header) {
        background-color: #eee;
    }


    #myULForuser {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: none;
        z-index: 900;
        position: absolute;
        width: 90%;
    }

    #myULForuser li a {
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

    #myULForuser li a:hover:not(.header) {
        background-color: #eee;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 260px;
        box-shadow: 0px 4px 18px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
@if(session()->has('message'))
<script>
    $(document).ready(function() {
        Lobibox.notify('success', {
            msg: 'Data has been saved successfully..'
        });
    });
</script>
@endif
<script>
    function putItemIntoTextField(user_id, fullname) {
        $("#user_id").val(user_id);
        $("#userName").val(fullname);
        document.getElementById("dropdown-content").style.display = "none";

    }
    window.onload = function(e) {
        getDate();

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

        document.getElementById("endDate").value = datestring;
        document.getElementById("quiz_endDate").value = datestring;
    }

    function quiz_putdataintoexpirydateandamount() {
        var data = document.getElementById("quiz_pricing").value;
        var pricing_id = data.split("[#]")[0];
        var no_of_days = data.split("[#]")[1];
        var sell_price = data.split("[#]")[2];
        document.getElementById("quiz_pricing_id").value = pricing_id;
        document.getElementById("quiz_sell_price").value = sell_price;
        var exDate = document.getElementById("quiz_endDate").value;
        const date = new Date(exDate);
        var addedDate = date.addDays(parseInt(no_of_days));
        var finaldate = new Date(addedDate);
        document.getElementById("quiz_endDate").value = finaldate.toLocaleDateString('en-CA');

    }

    function putdataintoexpirydateandamount() {
        var data = document.getElementById("pricing").value;
        var pricing_id = data.split("[#]")[0];
        var no_of_days = data.split("[#]")[1];
        var sell_price = data.split("[#]")[2];
        document.getElementById("pricing_id").value = pricing_id;
        document.getElementById("sell_price").value = sell_price;
        var exDate = document.getElementById("endDate").value;
        const date = new Date(exDate);
        var addedDate = date.addDays(parseInt(no_of_days));
        var finaldate = new Date(addedDate);
        document.getElementById("endDate").value = finaldate.toLocaleDateString('en-CA');

    }

    function getCoursePricing(id) {
        var searchKey = id;
        var x = document.getElementById("pricing");
        $.ajax({
            url: "{{ url('selectcoursepricing') }}",
            method: 'GET',
            data: {
                query: searchKey,
            },
            dataType: 'json',
            success: function(data) {
                response = data;
                for (var i = 0; i < response.length; i++) {
                    var option = document.createElement("option");
                    option.text = "Rs. " + response[i].sell_price + " for " + response[i].no_of_days + " days";
                    option.value = response[i].course_pricing_id + "[#]" + response[i].no_of_days + "[#]" + response[i].sell_price;
                    x.add(option);
                }
            }

        })
    }



    function getQuizPricing(id) {
        var searchKey = id;
        var x = document.getElementById("quiz_pricing");
        $.ajax({
            url: "{{ url('selectquizpricing') }}",
            method: 'GET',
            data: {
                query: searchKey,
            },
            dataType: 'json',
            success: function(data) {
                response = data;
                for (var i = 0; i < response.length; i++) {
                    var option = document.createElement("option");
                    option.text = "Rs. " + response[i].sell_price + " for " + response[i].no_of_days + " days";
                    option.value = response[i].quiz_pricing_id + "[#]" + response[i].no_of_days + "[#]" + response[i].sell_price;
                    x.add(option);
                }
            }

        })
    }

    function quiz_putItemIntoTextField(user_id, fullname) {
        $("#quiz_user_id").val(user_id);
        $("#quiz_userName").val(fullname);
        document.getElementById("quiz_dropdown-content").style.display = "none";
    }

    function quiz_selectusers() {

        var searchKey = $("#quiz_userName").val();

        $.ajax({
            url: "{{ url('searchuser') }}",
            method: 'GET',
            data: {
                query: searchKey,
            },
            dataType: 'json',
            success: function(data) {
                $("#quiz_DataTable tbody").empty();
                response = data;
                for (var i = 0; i < response.length; i++) {
                    var str = '<tr><td><a style="color: black!important;" onclick="quiz_putItemIntoTextField(' +
                        response[i].user_id + ',\'' + response[i].fullname + '\')" href="javascript:void">' +
                        response[i].fullname + '</a></td> <td>' + response[i].contact_number + '</td></tr>';

                    $("#quiz_DataTable tbody").append(str);
                    // $("#dropdown-content").css("display") = 'block';
                    document.getElementById("quiz_dropdown-content").style.display = "block";
                }
            }

        })
    }


    function selectusers() {

        var searchKey = $("#userName").val();

        $.ajax({
            url: "{{ url('searchuser') }}",
            method: 'GET',
            data: {
                query: searchKey,
            },
            dataType: 'json',
            success: function(data) {
                $("#DataTable tbody").empty();
                response = data;
                for (var i = 0; i < response.length; i++) {
                    var str = '<tr><td><a style="color: black!important;" onclick="putItemIntoTextField(' +
                        response[i].user_id + ',\'' + response[i].fullname + '\')" href="javascript:void">' +
                        response[i].fullname + '</a></td> <td>' + response[i].contact_number + '</td></tr>';

                    $("#DataTable tbody").append(str);
                    // $("#dropdown-content").css("display") = 'block';
                    document.getElementById("dropdown-content").style.display = "block";
                }
            }

        })
    }

    function updatecourseid(id, ttitle) {
        getCoursePricing(id);
        document.getElementById("coursetitle").value = ttitle;
        document.getElementById("course_id").value = id;
        document.getElementById("courseUL").style.display = "none";
    }


    function quizudpate(id, ttitle) {
        getQuizPricing(id);
        document.getElementById("quiztitle").value = ttitle;
        document.getElementById("quiz_id").value = id;
        document.getElementById("quizUL").style.display = "none";
    }

    function quiz_myFunctionForCourse() {
        document.getElementById("quizUL").style.display = "block";
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById("quiztitle");
        filter = input.value.toUpperCase();
        ul = document.getElementById("quizUL");
        li = ul.getElementsByTagName("li");
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }

    function myFunctionForCourse() {
        document.getElementById("courseUL").style.display = "block";
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById("coursetitle");
        filter = input.value.toUpperCase();
        ul = document.getElementById("courseUL");
        li = ul.getElementsByTagName("li");
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }
</script>

@endsection