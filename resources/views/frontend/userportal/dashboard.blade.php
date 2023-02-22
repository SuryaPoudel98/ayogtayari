<?php
if (session()->get('sessionUserId') == "") {
    redirect()->to('/userportal')->send();
}
?>
@php
$todaydate=date("Y-m-d");
@endphp
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- META ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />

    <!-- DESCRIPTION -->
    <meta name="description" />

    <!-- OG -->
    <meta property="og:title" />
    <meta property="og:description" />
    <meta property="og:image" content="" />
    <meta name="format-detection" content="telephone=no">

    <!-- FAVICONS ICON ============================================= -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />


    <script src="https://kit.fontawesome.com/c8371491b6.js" crossorigin="anonymous"></script>
    <!-- PAGE TITLE HERE ============================================= -->
    <title> </title>

    <!-- MOBILE SPECIFIC ============================================= -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--[if lt IE 9]>
	<script src="{{asset('onlinecourse/assets/js/html5shiv.min.js')}}"></script>
	<script src="{{asset('onlinecourse/assets/js/respond.min.js')}}"></script>
	<![endif]-->

    <!-- All PLUGINS CSS ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{asset('onlinecourse/assets/css/assets.css')}}">

    <!-- TYPOGRAPHY ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{asset('onlinecourse/assets/css/typography.css')}}">

    <!-- SHORTCODES ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{asset('onlinecourse/assets/css/shortcodes/shortcodes.css')}}">

    <!-- STYLESHEETS ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{asset('onlinecourse/assets/css/style.css')}}">
    <link class="skin" rel="stylesheet" type="text/css" href="{{asset('onlinecourse/assets/css/color/color-1.css')}}">

</head>

<body id="bg">
    <div class="page-wraper">
        <div id="loading-icon-bx"></div>
        <!-- Header Top ==== -->




        @include('frontend.innerblade.header')



        <!-- header END ==== -->
        <!-- Content -->
        <div class="page-content bg-white">
            <!-- inner page banner -->

            <!-- Breadcrumb row -->
            <div class="breadcrumb-row">
                <div class="container">
                    <!-- <ul class="list-inline">
                        <li><a href="#">Home</a></li>
                        <li>Profile</li>
                    </ul> -->
                </div>
            </div>
            <!-- Breadcrumb row END -->
            <!-- inner page banner END -->
            <div class="content-block">
                <!-- About Us -->
                <div class="section-area section-sp1">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-12 m-b30">
                                <div class="profile-bx text-center">
                                    <div class="user-profile-thumb">
                                        @if(@$user[0]->thumbnail!="")
                                        <img style="object-fit: cover; height:100%; width:100%;" src="/profilepicture/{{@$user[0]->thumbnail}}" alt="" />
                                        @else
                                        <img style="object-fit: cover; height:100%; width:100%;" src="user.png" alt="" />
                                        @endif

                                    </div>
                                    <div class="profile-info">
                                        <h4>{{@$user[0]->fullname}}</h4>
                                        <span class="pro-span-1">{{@$user[0]->contact_number}}</span><br>
                                        <!-- <span class="pro-span-2">Coins Earned : 50</span> -->
                                    </div>
                                    <!-- <div class="profile-social">
                                        <ul class="list-inline m-a0">
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div> -->
                                    <div class="profile-tabnav">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#courses"><i class="ti-book"></i>Learning Dashboard</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#purchase-history"><i class="ti-bookmark-alt"></i>Purchase History </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#edit-profile"><i class="ti-pencil-alt"></i>My Profile</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#update-profile"><i class="ti-lock"></i>Update Profile</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#expired-courses"><i class="ti-lock"></i>Expired Courses</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#share-earn"><i class="ti-lock"></i>Share & Earn</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-8 col-sm-12 m-b30">
                                <div class="profile-content-bx">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="courses">
                                            <div class="profile-head" id="prof-head">
                                                <h3 class="hd heading-active" onclick="hd(1)">My Courses</h3>
                                                <h3 class="hd" onclick="hd(2)">My MCQ</h3>
                                                <h3 class="hd" onclick="hd(3)">Daily MCQ</h3>
                                                <h3 class="hd" onclick="hd(4)">My E-Book</h3>
                                                <h3 class="hd" onclick="hd(5)">My Bookmarks</h3>
                                               
                                                <h3 class="hd" onclick="hd(7)">Assignments</h3>
                                                <!-- <div class="feature-filters style1 ml-auto">
                                                    <ul class="filters" data-toggle="buttons">
                                                        <li data-filter="" class="btn active">
                                                            <input type="radio">
                                                            <a href="#"><span>All</span></a>
                                                        </li>
                                                        <li data-filter="publish" class="btn">
                                                            <input type="radio">
                                                            <a href="#"><span>Publish</span></a>
                                                        </li>
                                                        <li data-filter="pending" class="btn">
                                                            <input type="radio">
                                                            <a href="#"><span>Pending</span></a>
                                                        </li>
                                                    </ul>
                                                </div> -->



                                            </div>
                                            <div id="learning-dashboard">
                                                <div class="courses-filter" id="filt1">
                                                    <div class="clearfix">
                                                        <ul id="masonry" class="ttr-gallery-listing magnific-image row">
                                                            @foreach($courses as $course)

                                                            @if($course->endDate>=$todaydate)
                                                            <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 publish">
                                                                <div class="cours-bx">
                                                                    <div class="action-box">
                                                                        <img src="/uploads/Postimg/{{@$course->thumbnail}}" alt="">
                                                                        <a href="{{url('coursedetails', $course->course_id)}}" class="btn">Read More</a>
                                                                    </div>
                                                                    <div class="info-bx text-center">
                                                                        <h5><a href="{{url('coursedetails', $course->course_id)}}">{{@$course->course_title}}</a></h5>
                                                                        <span>Programming</span>
                                                                    </div>
                                                                    <div class="cours-more-info">
                                                                        <div class="review bor-canc">
                                                                            <span>3 Review</span>
                                                                            <ul class="cours-star">
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="price">

                                                                            <h5 style="font-weight:500; font-size:13px; margin-top:5px">Joined: {{ Carbon\Carbon::parse(@$course->startDate)->format('M d Y') }}</h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="courses-filter" id="filt2">
                                                    <div class="clearfix">
                                                        <ul id="masonry" class="ttr-gallery-listing magnific-image row">
                                                            @foreach($quizes as $course)
                                                            @if($course->endDate>=$todaydate)
                                                            <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 publish">
                                                                <div class="cours-bx">
                                                                    <div class="action-box">
                                                                        <img src="/uploads/Postimg/{{@$course->thumbnail}}" alt="">
                                                                        <a href="{{url('quizcontent', $course->quiz_id)}}" class="btn">Read More</a>
                                                                    </div>
                                                                    <div class="info-bx text-center">
                                                                        <h5><a href="{{url('quizcontent', $course->quiz_id)}}">{{@$course->quiz_title}}</a></h5>
                                                                        <span>Programming</span>
                                                                    </div>
                                                                    <div class="cours-more-info">
                                                                        <div class="review bor-canc">
                                                                            <span>3 Review</span>
                                                                            <ul class="cours-star">
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="price">

                                                                            <h5 style="font-weight:500; font-size:13px; margin-top:5px">Joined: {{ Carbon\Carbon::parse(@$course->startDate)->format('M d Y') }}</h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="courses-filter" id="filt3">
                                                    <div class="clearfix">
                                                        <table class="dailymcq">
                                                            <tr>
                                                                <th>
                                                                    S.N
                                                                </th>
                                                                <th>MCQ Title/MCQ Course Name</th>
                                                                <th>
                                                                    Date
                                                                </th>
                                                                <th>Practice As MCQ Exam</th>
                                                            </tr>
                                                            <tr>
                                                                <td>1.</td>
                                                                <td>Computer Science MCQ</td>
                                                                <td>2022 - 02 - 22</td>
                                                                <td><button class="btn">Take MCQ Exam Now</button></td>
                                                            </tr>
                                                            <tr>
                                                                <td>2.</td>
                                                                <td>Digital Logic System MCQ</td>
                                                                <td>2022 - 02 - 24</td>
                                                                <td><button class="btn">Take MCQ Exam Now</button></td>
                                                            </tr>
                                                            <tr>
                                                                <td>3.</td>
                                                                <td>Programming Logic Unit MCQ</td>
                                                                <td>2022 - 02 - 24</td>
                                                                <td><button class="btn">Take MCQ Exam Now</button></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="courses-filter" id="filt4">
                                                    <div class="clearfix">
                                                        <ul id="masonry" class="ttr-gallery-listing magnific-image row">
                                                            <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 publish">
                                                                <div class="cours-bx">
                                                                    <div class="action-box">
                                                                        <img src="/onlinecourse/assets/images/courses/pic1.jpg" alt="">
                                                                        <a href="#" class="btn">Read More</a>
                                                                    </div>
                                                                    <div class="info-bx text-center">
                                                                        <h5><a href="#">E-book1</a></h5>
                                                                        <span>Science & Technology</span>
                                                                    </div>
                                                                    <div class="cours-more-info">
                                                                        <div class="review bor-canc">
                                                                            <span>3 Review</span>
                                                                            <ul class="cours-star">
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="price">

                                                                            <h5 style="font-weight:500; font-size:13px; margin-top:5px">Joined: 2022/09/11</h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 pending">
                                                                <div class="cours-bx">
                                                                    <div class="action-box">
                                                                        <img src="/onlinecourse/assets/images/courses/pic2.jpg" alt="">
                                                                        <a href="#" class="btn">Read More</a>
                                                                    </div>
                                                                    <div class="info-bx text-center">
                                                                        <h5><a href="#">E-book1</a></h5>
                                                                        <span>Science & Technology</span>
                                                                    </div>
                                                                    <div class="cours-more-info">
                                                                        <div class="review bor-canc">
                                                                            <span>3 Review</span>
                                                                            <ul class="cours-star">
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="price">

                                                                            <h5 style="font-weight:500; font-size:13px; margin-top:5px">Joined: 2022/09/11</h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 publish">
                                                                <div class="cours-bx">
                                                                    <div class="action-box">
                                                                        <img src="/onlinecourse/assets/images/courses/pic3.jpg" alt="">
                                                                        <a href="#" class="btn">Read More</a>
                                                                    </div>
                                                                    <div class="info-bx text-center">
                                                                        <h5><a href="#">E-book1</a></h5>
                                                                        <span>Science & Technology</span>
                                                                    </div>
                                                                    <div class="cours-more-info">
                                                                        <div class="review bor-canc">
                                                                            <span>3 Review</span>
                                                                            <ul class="cours-star">
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="price">

                                                                            <h5 style="font-weight:500; font-size:13px; margin-top:5px">Joined: 2022/09/11</h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 pending">
                                                                <div class="cours-bx">
                                                                    <div class="action-box">
                                                                        <img src="/onlinecourse/assets/images/courses/pic4.jpg" alt="">
                                                                        <a href="#" class="btn">Read More</a>
                                                                    </div>
                                                                    <div class="info-bx text-center">
                                                                        <h5><a href="#">E-book1</a></h5>
                                                                        <span>Science & Technology</span>
                                                                    </div>
                                                                    <div class="cours-more-info">
                                                                        <div class="review bor-canc">
                                                                            <span>3 Review</span>
                                                                            <ul class="cours-star">
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="price">

                                                                            <h5 style="font-weight:500; font-size:13px; margin-top:5px">Joined: 2022/09/11</h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 publish">
                                                                <div class="cours-bx">
                                                                    <div class="action-box">
                                                                        <img src="/onlinecourse/assets/images/courses/pic5.jpg" alt="">
                                                                        <a href="#" class="btn">Read More</a>
                                                                    </div>
                                                                    <div class="info-bx text-center">
                                                                        <h5><a href="#">E-book1</a></h5>
                                                                        <span>Science & Technology</span>
                                                                    </div>
                                                                    <div class="cours-more-info">
                                                                        <div class="review bor-canc">
                                                                            <span>3 Review</span>
                                                                            <ul class="cours-star">
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="price">

                                                                            <h5 style="font-weight:500; font-size:13px; margin-top:5px">Joined: 2022/09/11</h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 pending">
                                                                <div class="cours-bx">
                                                                    <div class="action-box">
                                                                        <img src="/onlinecourse/assets/images/courses/pic6.jpg" alt="">
                                                                        <a href="#" class="btn">Read More</a>
                                                                    </div>
                                                                    <div class="info-bx text-center">
                                                                        <h5><a href="#">E-book1</a></h5>
                                                                        <span>Science & Technology</span>
                                                                    </div>
                                                                    <div class="cours-more-info">
                                                                        <div class="review bor-canc">
                                                                            <span>3 Review</span>
                                                                            <ul class="cours-star">
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="price">

                                                                            <h5 style="font-weight:500; font-size:13px; margin-top:5px">Joined: 2022/09/11</h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 publish">
                                                                <div class="cours-bx">
                                                                    <div class="action-box">
                                                                        <img src="/onlinecourse/assets/images/courses/pic7.jpg" alt="">
                                                                        <a href="#" class="btn">Read More</a>
                                                                    </div>
                                                                    <div class="info-bx text-center">
                                                                        <h5><a href="#">E-book1</a></h5>
                                                                        <span>Science & Technology</span>
                                                                    </div>
                                                                    <div class="cours-more-info">
                                                                        <div class="review bor-canc">
                                                                            <span>3 Review</span>
                                                                            <ul class="cours-star">
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="price">

                                                                            <h5 style="font-weight:500; font-size:13px; margin-top:5px">Joined: 2022/09/11</h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 book">
                                                                <div class="cours-bx">
                                                                    <div class="action-box">
                                                                        <img src="/onlinecourse/assets/images/courses/pic8.jpg" alt="">
                                                                        <a href="#" class="btn">Read More</a>
                                                                    </div>
                                                                    <div class="info-bx text-center">
                                                                        <h5><a href="#">E-book1</a></h5>
                                                                        <span>Science & Technology</span>
                                                                    </div>
                                                                    <div class="cours-more-info">
                                                                        <div class="review bor-canc">
                                                                            <span>3 Review</span>
                                                                            <ul class="cours-star">
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="price">

                                                                            <h5 style="font-weight:500; font-size:13px; margin-top:5px">Joined: 2022/09/11</h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 publish">
                                                                <div class="cours-bx">
                                                                    <div class="action-box">
                                                                        <img src="/onlinecourse/assets/images/courses/pic9.jpg" alt="">
                                                                        <a href="#" class="btn">Read More</a>
                                                                    </div>
                                                                    <div class="info-bx text-center">
                                                                        <h5><a href="#">E-book1</a></h5>
                                                                        <span>Science & Technology</span>
                                                                    </div>
                                                                    <div class="cours-more-info">
                                                                        <div class="review ">
                                                                            <span>3 Review</span>
                                                                            <ul class="cours-star">
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="price">

                                                                            <h5 style="font-weight:500; font-size:13px; margin-top:5px">Joined: 2022/09/11</h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="courses-filter" id="filt5">
                                                    <div class="clearfix">
                                                        <div class="profile-head1" id="prof-head1">
                                                            <h3 class="sub-menu heading-active1" onclick="bm(1)">Saved Courses</h3>
                                                            <h3 class="sub-menu" onclick="bm(2)">Saved MCQs</h3>

                                                        </div>




                                                        <div id="bookmarks1">
                                                            <ul id="masonry" class="ttr-gallery-listing magnific-image row">

                                                                @foreach($bookmarkscourses as $course)

                                                                <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 publish">
                                                                    <div class="cours-bx">
                                                                        <div class="action-box">
                                                                            <img src="/uploads/Postimg/{{@$course->thumbnail}}" alt="">
                                                                            <a href="{{url('coursedetails', $course->course_id)}}" class="btn">Read More</a>
                                                                        </div>
                                                                        <div class="info-bx text-center">
                                                                            <h5><a href="{{url('coursedetails', $course->course_id)}}">{{@$course->course_title}}</a></h5>
                                                                            <span>Programming</span>
                                                                        </div>
                                                                        <div class="cours-more-info">
                                                                            <div class="review bor-canc">
                                                                                <span>3 Review</span>
                                                                                <ul class="cours-star">
                                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="price">
                                                                                @if(!empty($course->normalPrice[0]->normal_price))

                                                                                <del>Rs. {{@$course->normalPrice[0]->normal_price-10}}.00</del>
                                                                                <h5>Rs. {{@$course->normalPrice[0]->normal_price}}.00</h5>
                                                                                @else
                                                                                <del>Paid</del>
                                                                                <h5>Free</h5>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>

                                                                @endforeach

                                                            </ul>
                                                        </div>
                                                        <div id="bookmarks2">
                                                            <ul id="masonry" class="ttr-gallery-listing magnific-image row">


                                                                @foreach($bookmarksquizes as $course)

                                                                <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 pending">
                                                                    <div class="cours-bx">
                                                                        <div class="action-box">
                                                                            <img src="/uploads/Postimg/{{@$course->thumbnail}}" alt="">
                                                                            <a href="{{url('quizcontent', $course->quiz_id)}}" class="btn">Read More</a>
                                                                        </div>
                                                                        <div class="info-bx text-center">
                                                                            <h5><a href="{{url('quizcontent', $course->quiz_id)}}">{{@$course->quiz_title}}</a></h5>
                                                                            <span>Programming</span>
                                                                        </div>
                                                                        <div class="cours-more-info">
                                                                            <div class="review bor-canc">
                                                                                <span>3 Review</span>
                                                                                <ul class="cours-star">
                                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="price">

                                                                                <h5 style="font-weight:500; font-size:13px; margin-top:5px">Joined: {{ Carbon\Carbon::parse(@$course->startDate)->format('M d Y') }}</h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>

                                                                @endforeach
                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>
                                               
                                                <div class="courses-filter" id="filt7">
                                                    <div class="clearfix">
                                                        <table class="dailymcq">
                                                            <tr>
                                                                <th>
                                                                    Assignment Date
                                                                </th>
                                                                <th>Assignment Topic</th>
                                                                <th>Assignment Submitted</th>


                                                            </tr>
                                                            <tr>
                                                                <td>2022-01-12 , Monday</td>
                                                                <td> Assignment on Sound Population</td>
                                                                <td>2022-01-13 , Tuesday</td>

                                                            </tr>
                                                            <tr>
                                                                <td>2022-02-01 , Tuesday</td>
                                                                <td> Assignment on Circuts</td>
                                                                <td>2022-02-02 , Wednesday</td>

                                                            </tr>
                                                            <tr>
                                                                <td>2022-03-01 , Wednesday</td>
                                                                <td> Assignment on And / Or gates</td>
                                                                <td>2022-03-02 , Thursday</td>

                                                            </tr>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="tab-pane" id="purchase-history">
                                            <div class="profile-head" style="padding: 10px 10px 10px 10px;">
                                                <h3>Purchase History</h3>
                                            </div>
                                            <div class="courses-filter" style="padding:10px 10px 0 10px;">

                                                @foreach($purchaseHistories as $purchase)
                                                <div class="purchase-history">

                                                    <div class="purchase-contents">
                                                        <div class="purachase-subcontents">
                                                            <h5>Total Amount : <span>&nbsp;Rs. {{$purchase->amounts}}.00</span></h5>
                                                        </div>
                                                        <div class="purachase-subcontents">
                                                            <h5>Medium : <span>&nbsp;{{$purchase->paymentMode}}</span></h5>
                                                        </div>
                                                        <div class="purachase-subcontents">
                                                            <h5>Paid Status : <span>&nbsp;Paid</span></h5>
                                                        </div>

                                                        <div class="purachase-subcontents">
                                                            <h5>Invoice Id : <span>&nbsp; #{{$purchase->payment_id}}</span></h5>
                                                        </div>
                                                        <div class="purachase-subcontents">
                                                            <h5>Reference Id : <span>&nbsp; {{$purchase->tCode}} </span></h5>
                                                        </div>
                                                        <div class="purachase-subcontents">
                                                            <h5>Transaction Date : <span>&nbsp; {{$purchase->created_at}} </span></h5>
                                                        </div>
                                                    </div>
                                                    <div class="purchase-details-components">

                                                        <div class="main_table">
                                                            <div class="table_header">
                                                                <div class="row">
                                                                    <div class="col-1 col_no">NO.</div>
                                                                    <div class="col col_des">ITEM</div>
                                                                    <div class="col col_price">PRICE</div>
                                                                    <div class="col col_qty">QTY</div>
                                                                    <div class="col col_total">TOTAL</div>
                                                                </div>
                                                            </div>
                                                            <div class="table_body">
                                                                @php
                                                                $i=0;
                                                                @endphp
                                                                @if(!empty($purchase->enroll))
                                                                @foreach($purchase->enroll as $courseenroll)
                                                                @php $i++; @endphp
                                                                <div class="row">
                                                                    <div class="col-1 col_no">
                                                                        <p>{{$i}}</p>
                                                                    </div>
                                                                    <div class="col col_des">

                                                                        <p>{{$courseenroll->course_title}}</p>
                                                                    </div>
                                                                    <div class="col col_price">
                                                                        <p>Rs. {{$courseenroll->amount}}.00</p>
                                                                    </div>
                                                                    <div class="col col_qty">
                                                                        <p>1</p>
                                                                    </div>
                                                                    <div class="col col_total">
                                                                        <p>Rs. {{$courseenroll->amount}}.00</p>
                                                                    </div>
                                                                </div>
                                                                @endforeach

                                                                @endif
                                                                @if(!empty($purchase->quizenroll))
                                                                @foreach($purchase->quizenroll as $quizenroll)
                                                                @php $i++; @endphp
                                                                <div class="row">
                                                                    <div class="col-1 col_no">
                                                                        <p>{{$i}}</p>
                                                                    </div>
                                                                    <div class="col col_des">

                                                                        <p>{{$quizenroll->quiz_title}}</p>
                                                                    </div>
                                                                    <div class="col col_price">
                                                                        <p>Rs. {{$quizenroll->amount}}.00</p>
                                                                    </div>
                                                                    <div class="col col_qty">
                                                                        <p>1</p>
                                                                    </div>
                                                                    <div class="col col_total">
                                                                        <p>Rs. {{$quizenroll->amount}}.00</p>
                                                                    </div>
                                                                </div>
                                                                @endforeach

                                                                @endif
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="status-btn">
                                                        <button class="btn">Paid</button>
                                                    </div>
                                                </div>
                                                @endforeach

                                            </div>

                                        </div>




                                        <div class="tab-pane" id="edit-profile">
                                            <div class="profile-head">
                                                <h3>My Profile</h3>
                                            </div>
                                            <form class="edit-profile" id="personalDetails" name="personalDetails" method="PUT">
                                                @csrf
                                                <div class="">
                                                    <div class="form-group row">
                                                        <div class="col-12 col-sm-9 col-md-9 col-lg-10 ml-auto">
                                                            <h3>1. Personal Details</h3>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Full Name</label>
                                                        <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                            <input class="form-control" type="text" name="fullname" readonly value="{{@$user[0]->fullname}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Email Address</label>
                                                        <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                            <input class="form-control" type="text" readonly name="email_address" value="{{@$user[0]->email_address}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Occupation</label>
                                                        <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                            <input class="form-control" type="text" name="occupation" value="{{@$user[0]->occupation}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Company Name</label>
                                                        <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                            <input class="form-control" type="text" name="companyname" value="{{@$user[0]->companyname}}">
                                                            <!-- <span class="help">If you want your invoices addressed to a company. Leave blank to use your full name.</span> -->
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Phone No.</label>
                                                        <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                            <input class="form-control" required name="contact_number" type="text" value="{{@$user[0]->contact_number}}">
                                                        </div>
                                                    </div>

                                                    <div class="seperator"></div>

                                                    <div class="form-group row">
                                                        <div class="col-12 col-sm-9 col-md-9 col-lg-10 ml-auto">
                                                            <h3>2. Address</h3>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Address</label>
                                                        <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                            <input class="form-control" type="text" name="address" value="{{@$user[0]->address}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">City</label>
                                                        <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                            <input class="form-control" type="text" name="city" value="{{@$user[0]->city}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">District</label>
                                                        <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                            <input class="form-control" type="text" name="distric" value="{{@$user[0]->distric}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Postcode</label>
                                                        <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                            <input class="form-control" type="text" name="postcode" value="{{@$user[0]->postcode}}">
                                                        </div>
                                                    </div>

                                                    <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>

                                                    <div class="form-group row">
                                                        <div class="col-12 col-sm-9 col-md-9 col-lg-10 ml-auto">
                                                            <h3 class="m-form__section">3. Social Links</h3>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Linkedin</label>
                                                        <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                            <input class="form-control" type="text" name="linkedin" value="{{@$user[0]->linkedin}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Facebook</label>
                                                        <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                            <input class="form-control" type="text" name="facebook" value="{{@$user[0]->facebook}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Twitter</label>
                                                        <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                            <input class="form-control" type="text" name="twitter" value="{{@$user[0]->twitter}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Instagram</label>
                                                        <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                            <input class="form-control" type="text" name="instagram" value="{{@$user[0]->instagram}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="">
                                                        <div class="row">
                                                            <div class="col-12 col-sm-3 col-md-3 col-lg-2">
                                                            </div>
                                                            <div class="col-12 col-sm-9 col-md-9 col-lg-7" style="display: inline-flex;">
                                                                <button type="button" style=" margin-right: 10px; height: 40px;" onclick="savechanges();" class="btn">Save changes</button>
                                                                <!-- <button type="reset" class="btn-secondry">Cancel</button> -->

                                                                <div class="save-changes" id="save-changes">
                                                                    <style>
                                                                        .save-changes {
                                                                            border: 2px solid green;
                                                                            padding: 5px;
                                                                            color: green;
                                                                            height: 40px;
                                                                            width: 40%;
                                                                            border-radius: 4px;
                                                                            text-align: center;
                                                                            display: none;
                                                                        }

                                                                        .save-changes p i {
                                                                            margin-right: 7px;
                                                                            margin-top: 5px;
                                                                        }
                                                                    </style>
                                                                    <p class="save-changes-para"> <i class="fa-solid fa-check"></i>Saved Changes</p>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="update-profile">
                                            <div class="profile-head" id="prof-head2">
                                                <h3 class="u-p heading-active2" onclick="up(1)">Change Password</h3>
                                                <h3 class="u-p" onclick="up(2)">Update Profile Picture</h3>
                                            </div>
                                            <form class="edit-profile" id="pass-change" name="pass-change">
                                                @csrf
                                                <div class="">
                                                    <div class="form-group row">
                                                        <div class="col-12 col-sm-8 col-md-8 col-lg-9 ml-auto">
                                                            <h3>Password</h3>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-4 col-md-4 col-lg-3 col-form-label">Current Password</label>
                                                        <div class="col-12 col-sm-8 col-md-8 col-lg-7">
                                                            <input class="form-control" required name="currentpassword" type="password" value="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-4 col-md-4 col-lg-3 col-form-label">New Password</label>
                                                        <div class="col-12 col-sm-8 col-md-8 col-lg-7">
                                                            <input class="form-control" required name="newpassword" type="password" value="">
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group row">
                                                        <label class="col-12 col-sm-4 col-md-4 col-lg-3 col-form-label">Re Type New Password</label>
                                                        <div class="col-12 col-sm-8 col-md-8 col-lg-7">
                                                            <input class="form-control" required name="renewpassword" type="password" value="">
                                                        </div>
                                                    </div> -->
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-4 col-md-4 col-lg-3">
                                                    </div>
                                                    <div class="col-12 col-sm-8 col-md-8 col-lg-7" style="display: inline-flex;">
                                                        <button type="button" onclick="updateUserpassword();" style=" margin-right: 10px; height: 40px;" class="btn">Save changes</button>

                                                        <div class="save-changes" id="save-changes-password">
                                                            <style>
                                                                .save-changes {
                                                                    border: 2px solid green;
                                                                    padding: 5px;
                                                                    color: green;
                                                                    height: 40px;
                                                                    width: 40%;
                                                                    border-radius: 4px;
                                                                    text-align: center;
                                                                    display: none;
                                                                }

                                                                .save-changes p i {
                                                                    margin-right: 7px;
                                                                    margin-top: 5px;
                                                                }
                                                            </style>
                                                            <p class="save-changes-para"> <i class="fa-solid fa-check"></i>Saved Changes</p>
                                                        </div>
                                                        <div class="warning-message" id="not-changes-password">
                                                            <style>
                                                                .warning-message {
                                                                    border: 2px solid red;
                                                                    padding: 5px;
                                                                    color: red;
                                                                    height: 40px;
                                                                    width: 40%;
                                                                    border-radius: 4px;
                                                                    text-align: center;
                                                                    display: none;
                                                                }

                                                                .warning-message p i {
                                                                    margin-right: 7px;
                                                                    font-size: 20px;
                                                                }
                                                            </style>
                                                            <p> <i class="fa-solid fa-xmark"></i>Save Not Changes</p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>
                                            <form class="edit-profile" id="picture-change">
                                                <input type="hidden" id="_token" value="{{ csrf_token() }}">
                                                <div class="">
                                                    <div class="form-group row">
                                                        <div class="col-12 col-sm-8 col-md-8 col-lg-9 ml-auto">
                                                            <h3>Change Profile Picture</h3>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-4 col-md-4 col-lg-3 col-form-label">Select Image</label>
                                                        <div class="col-12 col-sm-8 col-md-8 col-lg-7">

                                                            <input name="thumbnail" id="_thumbnail" type="file" style="cursor: pointer;">>
                                                            <input type="hidden" value="" name="file_upload__thumbnail" id="file_upload__thumbnail" />
                                                            <img src="thumbnail.png" style="text-align: center; margin-top:10px;" id="_thumbnail_img" height="100" width="100" />
                                                        </div>
                                                        <div class="recomended" style="margin-left: 224px; margin-top: 20px;">
                                                            <h5 style="font-size: 14px;">Recomended ( 100 x 100px )</h5>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- <div class="row">
                                                    <div class="col-12 col-sm-4 col-md-4 col-lg-3">
                                                    </div>
                                                    <div class="col-12 col-sm-8 col-md-8 col-lg-7">
                                                        <button type="reset" class="btn">Save changes</button>
                                                        <button type="reset" class="btn-secondry">Cancel</button>
                                                    </div>
                                                </div> -->

                                            </form>
                                        </div>
                                        <div class="tab-pane" id="expired-courses">
                                            <div class="profile-head" id="prof-head">

                                                <h3 class="hd">Expired Courses</h3>
                                            </div>
                                            <div id="learning-dashboard">
                                                <div class="courses-filter">
                                                    <div class="clearfix">
                                                        <ul id="masonry" class="ttr-gallery-listing magnific-image row">
                                                            @foreach($courses as $course)

                                                            @if($course->endDate<$todaydate) <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 publish">
                                                                <div class="cours-bx">
                                                                    <div class="action-box">

                                                                        <img src="/uploads/Postimg/{{@$course->thumbnail}}" alt="">
                                                                        <a href="{{url('coursedetails', $course->course_id)}}" class="btn">Read More</a>
                                                                    </div>
                                                                    <div class="info-bx text-center">
                                                                        <h5><a href="{{url('coursedetails', $course->course_id)}}">{{@$course->course_title}}</a></h5>
                                                                        <span>Programming</span>
                                                                    </div>
                                                                    <div class="cours-more-info">
                                                                        <div class="review bor-canc">
                                                                            <span>3 Review</span>
                                                                            <ul class="cours-star">
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li class="active"><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="price">

                                                                            <h5 style="font-weight:500; font-size:13px; margin-top:5px">Joined: {{ Carbon\Carbon::parse(@$course->startDate)->format('M d Y') }}</h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </li>
                                                                @endif
                                                                @endforeach
                                                        </ul>
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
            <!-- contact area END -->
        </div>
        <!-- Content END-->
        <!-- Footer ==== -->
        @include('frontend.innerblade.footer')
        <!-- Footer END ==== -->
        <button class="back-to-top fa fa-chevron-up"></button>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        function savechanges() {
            var form = document.getElementById('personalDetails');
            var pdata = new FormData(form);
            $.ajax({
                url: "{{ url('/updateUserData') }}",
                type: "POST",
                data: pdata,
                cache: false,
                processData: false,
                contentType: false,
                success: function(dataResult) {
                    document.getElementById("save-changes").style.display = "block";
                },
                error: function(xhr, ajaxOptions, thrownError) {

                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }


            });
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
                uploadImageFor(srcEncoded, id, imgId);

            }
        }

        function uploadImageFor(imageFile, id, imgId) {

            // alert(imageFile);
            var date = new Date(); // some mock date
            var milliseconds = date.getTime();
            var imageName = milliseconds + '.jpg';

            // imageName
            $.ajax({
                url: "{{ url('/uploadprofile') }}",
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
                    document.getElementById(imgId).src = "/profilepicture/" + dataResult.imageFile;

                },
                error: function(xhr, ajaxOptions, thrownError) {

                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }


            });
        }
        $('#_thumbnail').on('change', function(ev) {
            //  alert("dfsa");
            var filedata = this.files[0];

            var imgtype = filedata.type;
            var match = ['image/jpeg', 'image/jpg'];
            if (imgtype == 'image/jpeg' || imgtype == 'image/jpg' || imgtype == 'image/png') {
                var reader = new FileReader();
                reader.onload = function(ev) {
                    imageFile = ev.target.result;
                    resizeImage(imageFile, 'file_upload__thumbnail', '_thumbnail_img');
                }
                reader.readAsDataURL(this.files[0]);
            } else {
                alert("Only accept image format!")
            }

        });


        function updateUserpassword() {
            var form = document.getElementById('pass-change');
            var pdata = new FormData(form);
            $.ajax({
                url: "{{ url('/updatePassword') }}",
                type: "POST",
                data: pdata,
                cache: false,
                processData: false,
                contentType: false,
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.status == true) {
                        document.getElementById("save-changes-password").style.display = "block";
                    } else {
                        document.getElementById("not-changes-password").style.display = "block";
                    }

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    document.getElementById("not-changes-password").style.display = "block";
                    // alert(xhr.statusText);
                    // alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }


            });
            return false;
        }
    </script>
    <!-- External JavaScripts -->
    <script src="{{asset('onlinecourse/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('onlinecourse/assets/vendors/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('onlinecourse/assets/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('onlinecourse/assets/vendors/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('onlinecourse/assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}"></script>
    <script src="{{asset('onlinecourse/assets/vendors/magnific-popup/magnific-popup.js')}}"></script>
    <script src="{{asset('onlinecourse/assets/vendors/counter/waypoints-min.js')}}"></script>
    <script src="{{asset('onlinecourse/assets/vendors/counter/counterup.min.js')}}"></script>
    <script src="{{asset('onlinecourse/assets/vendors/imagesloaded/imagesloaded.js')}}"></script>
    <script src="{{asset('onlinecourse/assets/vendors/masonry/masonry.js')}}"></script>
    <script src="{{asset('onlinecourse/assets/vendors/masonry/filter.js')}}"></script>
    <script src="{{asset('onlinecourse/assets/vendors/owl-carousel/owl.carousel.js')}}"></script>
    <script src="{{asset('onlinecourse/assets/js/functions.js')}}"></script>
    <script src="{{asset('onlinecourse/assets/js/contact.js')}}"></script>
    <script src="{{asset('onlinecourse/assets/vendors/switcher/switcher.js')}}"></script>
    <script src="{{asset('onlinecourse/assets/js/filteruserdashboard.js')}}"></script>
</body>

</html>