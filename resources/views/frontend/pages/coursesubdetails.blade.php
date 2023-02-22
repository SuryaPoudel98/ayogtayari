<?php
if (session()->get('sessionUserId') != "") {
    $user = \DB::table('users')
        ->select('*')
        ->where('password', session()->get('sessionUserId'))
        ->get();
    $user_id = $user[0]->user_id;
    $courses = \DB::table('course_enrolls')
        ->join('courses', 'courses.course_id', '=', 'course_enrolls.course_or_quiz_id')
        ->join('payments', 'payments.tCode', '=', 'course_enrolls.tCode')
        ->select('course_enrolls.course_or_quiz_id')
        ->where('type', 0)
        ->where('user_id',  $user_id)
        ->where('endDate', '>=', date('Y-m-d'))
        ->first();
    $curriculam = \DB::select("select lesson, display_name from course_curriculumns where course_id='" . $course[0]->course_id . "' limit 1");
    $course_mcqs = \DB::select("select lesson, display_name from course_mcqs where course_id='" . $course[0]->course_id . "' limit 1");
    $course_newsor_articles = \DB::select("select id, display_name from course_newsor_articles where course_id='" . $course[0]->course_id . "' limit 1");
    $course_notes = \DB::select("select lesson, display_name from course_notes where course_id='" . $course[0]->course_id . "' limit 1");
    $course_videos = \DB::select("select lesson, display_name from course_videos where course_id='" . $course[0]->course_id . "' limit 1");
    $course_others = \DB::select("select id, display_name from course_others where course_id='" . $course[0]->course_id . "' limit 1");
    // dd($courses->course_or_quiz_id);
}

?>

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
    <link rel="icon" href="{{asset('onlinecourse/assets/images/favicon.ico')}}" type="image/x-icon" />
    <!-- <link rel="shortcut icon" type="image/x-icon" href="{{asset('onlinecourse/assets/images/favicon.png')}}"" /> -->


    <title></title>

    <!-- MOBILE SPECIFIC ============================================= -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--[if lt IE 9]>
	<script src="{{asset('onlinecourse/assets/js/html5shiv.min.js')}}""></script>
	<script src="{{asset('onlinecourse/assets/js/respond.min.js')}}""></script>
	<![endif]-->


    <!--REMIX ICON CDN===============================================-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- FONTAWESOME ICON ============================================= -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.0/css/all.css">

    <!-- All PLUGINS CSS ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{asset('onlinecourse/assets/css/assets.css')}}">

    <!-- TYPOGRAPHY ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{asset('onlinecourse/assets/css/typography.css')}}">

    <!-- SHORTCODES ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{asset('onlinecourse/assets/css/shortcodes/shortcodes.css')}}">

    <!-- STYLESHEETS ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{asset('onlinecourse/assets/css/style.css')}}">
    <link class="skin" rel="stylesheet" type="text/css" href="{{asset('onlinecourse/assets/css/color/color-1.css')}}">

    <!-- REVOLUTION SLIDER CSS ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{asset('onlinecourse/assets/vendors/revolution/css/layers.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('onlinecourse/assets/vendors/revolution/css/settings.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('onlinecourse/assets/vendors/revolution/css/navigation.css')}}">
    <link rel="stylesheet" href="{{asset('onlinecourse/assets/css/combobox.css')}}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- REVOLUTION SLIDER END -->
</head>

<body id="bg">
    <div class="page-wraper">


        <div id="ask-modal-id" class="modal">
            <div class="modal-content">
                <div class="ask-modal-header">
                    <span class="modal-ask-close">&times;</span>
                    <h2>Send a message to teacher</h2>
                </div>
                <div class="modal-body">
                    <form action="/askQuestionToTeacher" method="POST">
                        @csrf
                        <input type="hidden" id="course_or_quiz_id" name="course_or_quiz_id" value="{{@$courses->course_or_quiz_id}}">
                        <input type="hidden" id="teacher_id" name="teacher_id" value="">
                        <input type="hidden" id="type" name="type" value="0">
                        <input type="hidden" id="whoIsHe" name="whoIsHe" value="0">
                        <input type="hidden" name="user_id" value="{{@$user_id}}">
                        <label for="">Question For Teacher ?</label><br>
                        <input type="text" required name="discussionTitle" placeholder="Write a Question"><br><br>
                        <label for="">Send a message :</label><br>
                        <textarea name="discussionNote" required placeholder="Send a message"></textarea><br><br>
                        <button class="modal-ask" type="submit">Submit Question</button>
                    </form>

                </div>

            </div>

        </div>
        <div id="loading-icon-bx"></div>
        <!-- Header Top ==== -->
        @include('frontend.innerblade.header')
        <!-- Header Top END ==== -->
        <!-- Content -->
        <div class="page-content bg-white">

            <!-- inner page banner -->
            <!-- <div class="page-banner ovbl-dark" style="background-image:url(/onlinecourse/assets/images/banner/banner2.jpg);">
                <div class="container">
                    <div class="page-banner-entry">
                        <h1 class="text-white">Courses Details</h1>
                    </div>
                </div>
            </div> -->
            <!-- Breadcrumb row -->
            <div class="breadcrumb-row">
                <div class="container">
                    <ul class="list-inline">
                        <li><a href="/">Home</a></li>
                        <li>Courses Details</li>
                    </ul>
                </div>
            </div>
            <!-- Breadcrumb row END -->
            <!-- inner page banner END -->
            <div class="content-block">
                <!-- About Us -->
                <div class="section-area section-sp1">
                    <div class="container">
                        <div class="row d-flex flex-row-reverse">
                            <div class="col-lg-3 col-md-4 col-sm-12 m-b30">
                                <div class="course-detail-bx">


                                    @if(@$courses->course_or_quiz_id=="")
                                    <div class="course-price">
                                        <div class="combo-dropdown" onclick="myFunction()">
                                            <button class="combobtn">Buy Now This Course <i class="uil uil-angle-down"></i></button>
                                            <div id="myDropdown" class="dropdown-content">
                                                @foreach($coursePricing as $pricing)
                                                <a href="/addtobasket/{{@$course[0]->course_id}}/{{$pricing->course_pricing_id }}/course">Rs. {{$pricing->sell_price}}.00</a>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="course-buy-now text-center " style="margin-top: 5px;">
                                        <a href="/coursecontent/{{ @$course[0]->course_id}}/0" class="btn  text-uppercase course-purchased">Read Course</a>
                                    </div>
                                    @endif



                                    <div class="widget recent-posts-entry widget-courses">
                                        <h5 class="widget-title style-1" style="margin-bottom:10px!important; margin-top: 20px;">Similar Courses</h5>
                                        <div class="widget-post-bx">

                                            @foreach($similarcourses as $similarcourse)
                                            <div class="widget-post clearfix">
                                                <div class="ttr-post-media"> <img src="/uploads/Postimg/{{@$similarcourse->thumbnail}}" width="200" height="143" alt=""> </div>

                                                <div class="ttr-post-info">
                                                    <div class="ttr-post-header">
                                                        <h6 class="post-title"><a href="{{url('coursedetails', $similarcourse->course_id)}}">{{@$similarcourse->course_title}}</a></h6>
                                                    </div>
                                                    <div class="ttr-post-meta">
                                                        <ul>
                                                            @if(!empty($similarcourse->normalPrice[0]->normal_price))
                                                            <li class="price">
                                                                <h5 class="cost">Rs. {{@$similarcourse->normalPrice[0]->normal_price}}.00</h5>
                                                            </li>
                                                            @else
                                                            <li class="price">
                                                                <h5 class="cost">Free</h5>
                                                            </li>
                                                            @endif
                                                            <li class="review">07 Review</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-9 col-md-8 col-sm-12">
                                <h1>{{@$course[0]->course_title}}</h1>
                                <div class="courses-post">
                                    <div class="ttr-post-media media-effect">
                                        <a href="#"><img src="assets/images/blog/default/thum1.jpg" alt=""></a>
                                    </div>
                                    <div class="course-sticky-background">
                                        <div class="wrapper-scrollable">
                                            <!-- <div class="icon-scroll"><i id="left" class="fa-solid fa-angle-left"></i></div> -->
                                            <ul class="tabs-box-scroll">

                                                @if(@$curriculam[0]->lesson!="")
                                                <a href="/coursesubdetails/course_curriculumns/{{@$course[0]->course_id}}">
                                                    <li <?php if (request()->route('subcourse') == "course_curriculumns") {
                                                            echo 'class="tab-scroll active-scroll"';
                                                        } else {
                                                            echo 'class="tab-scroll"';
                                                        } ?>>Curriculum</li>
                                                </a>
                                                @endif
                                                @if(@$course_mcqs[0]->lesson!="")
                                                <a href="/coursesubdetails/course_mcqs/{{@$course[0]->course_id}}">
                                                    <li <?php if (request()->route('subcourse') == "course_mcqs") {
                                                            echo 'class="tab-scroll active-scroll"';
                                                        } else {
                                                            echo 'class="tab-scroll"';
                                                        } ?>>MCQs</li>
                                                </a>
                                                @endif
                                                @if(@$course_videos[0]->lesson!="")
                                                <a href="/coursesubdetails/course_videos/{{@$course[0]->course_id}}">
                                                    <li <?php if (request()->route('subcourse') == "course_videos") {
                                                            echo 'class="tab-scroll active-scroll"';
                                                        } else {
                                                            echo 'class="tab-scroll"';
                                                        } ?>>Video</li>
                                                </a>
                                                @endif
                                                @if(@$course_notes[0]->lesson!="")
                                                <a href="/coursesubdetails/course_notes/{{@$course[0]->course_id}}">
                                                    <li <?php if (request()->route('subcourse') == "course_notes") {
                                                            echo 'class="tab-scroll active-scroll"';
                                                        } else {
                                                            echo 'class="tab-scroll"';
                                                        } ?>>Note</li>
                                                </a>
                                                @endif
                                                @if(@$course_newsor_articles[0]->id!="")
                                                <a href="/coursesubdetails/course_newsor_articles/{{@$course[0]->course_id}}">
                                                    <li <?php if (request()->route('subcourse') == "course_newsor_articles") {
                                                            echo 'class="tab-scroll active-scroll"';
                                                        } else {
                                                            echo 'class="tab-scroll"';
                                                        } ?>>News & Article</li>
                                                </a>
                                                @endif
                                                @if(@$course_others[0]->id!="")
                                                <a href="/coursesubdetails/course_others/{{@$course[0]->course_id}}">
                                                    <li <?php if (request()->route('subcourse') == "course_others") {
                                                            echo 'class="tab-scroll active-scroll"';
                                                        } else {
                                                            echo 'class="tab-scroll"';
                                                        } ?>>$course_others[0]->display_name</li>
                                                </a>
                                                @endif
                                            </ul>
                                            <!-- <div class="icon-scroll"><i id="right" class="fa-solid fa-angle-right"></i></div> -->
                                        </div>
                                        <div class="sub-course-titles ">
                                            <!-- <h1>Curriculum</h1> -->
                                            <?php $table = request()->route('subcourse'); ?>
                                            @if(!empty($lesson))
                                            <ul>
                                                @foreach(@$lesson as $item)
                                                <li>
                                                    <a class="cursor-btn">{{@$item->lesson}}
                                                        <span class="fas fa-caret-down first"></span>
                                                    </a>
                                                    <?php
                                                    $sublesson = \DB::select("select  DISTINCT sub_lesson,id from " . $table . " where lesson='" . $item->lesson . "' and course_id='" . $course[0]->course_id . "'");
                                                    ?>

                                                    @foreach(@$sublesson as $subitem)
                                                    <?php
                                                    $childlesson = \DB::select("select  DISTINCT child_lesson,id from " . $table . " where lesson='" . $item->lesson . "' and sub_lesson='" . $subitem->sub_lesson . "' and course_id='" . $course[0]->course_id . "'");
                                                    ?>
                                                    <ul class="sub-class-show">
                                                        <li class="sub-menu">
                                                            @if(!empty($childlesson))
                                                            <a class="sub-cursor">{{@$subitem->sub_lesson}}
                                                                <span class="fas fa-caret-down third"></span>
                                                            </a>
                                                            @else
                                                            <a href="/coursecontent/{{ @$course[0]->course_id}}/{{@$subitem->id}}/{{request()->route('subcourse')}}" class="sub-cursor">{{@$subitem->sub_lesson}}
                                                                <span class="fas fa-caret-down third"></span>
                                                            </a>

                                                            @endif
                                                            @foreach(@$childlesson as $childitem)
                                                            <ul class="child-show1">
                                                                <li class="sub-child-menu"><a href="/coursecontent/{{ @$course[0]->course_id}}/{{@$subitem->id}}/{{request()->route('subcourse')}}">{{@$childitem->child_lesson}}</a></li>

                                                            </ul>
                                                            @endforeach
                                                        </li>

                                                    </ul>
                                                    @endforeach
                                                </li>
                                                @endforeach
                                            </ul>
                                            @endif
                                            @if(request()->route('subcourse') == "course_newsor_articles")
                                            <?php
                                            $blogs = \DB::select("select blogs.id,blog_title  from course_newsor_articles inner join blogs on course_newsor_articles.blog_id=blogs.id where course_id='" . $course[0]->course_id . "'");
                                            ?>
                                            <ul>
                                                @foreach($blogs as $blog)

                                                <li><a href="/blogdetails/{{$blog->id}}">{{$blog->blog_title}}</a></li>
                                                @endforeach
                                            </ul>
                                            @endif
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
        <button class="back-to-top fa fa-chevron-up "></button>
    </div>

    <!-- External JavaScripts -->
    <script src="{{asset('onlinecourse/assets/js/jquery.min.js')}}"></script>
    <!-- <script src=" {{asset('onlinecourse/assets/vendors/bootstrap/js/popper.min.js')}}" "></script> -->
    <script src=" {{asset('onlinecourse/assets/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- <script src=" {{asset('onlinecourse/assets/vendors/bootstrap-select/bootstrap-select.min.js')}}" "></script> -->
    <!-- <script src=" {{asset('onlinecourse/assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}" "></script> -->
    <script src=" {{asset('onlinecourse/assets/vendors/magnific-popup/magnific-popup.js')}}"></script>
    <!-- <script src=" {{asset('onlinecourse/assets/vendors/counter/waypoints-min.js')}}" "></script> -->
    <!-- <script src=" {{asset('onlinecourse/assets/vendors/counter/counterup.min.js')}}" "></script> -->
    <!-- <script src=" {{asset('onlinecourse/assets/vendors/imagesloaded/imagesloaded.js')}}" "></script> -->
    <!-- <script src=" {{asset('onlinecourse/assets/vendors/masonry/masonry.js')}}" "></script> -->
    <!-- <script src=" {{asset('onlinecourse/assets/vendors/masonry/filter.js')}}" "></script> -->
    <script src=" {{asset('onlinecourse/assets/vendors/owl-carousel/owl.carousel.js')}}"></script>
    <script src=" {{asset('onlinecourse/assets/js/functions.js')}}"></script>


    <!-- Revolution JavaScripts Files -->
    <script src=" {{asset('onlinecourse/assets/vendors/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src=" {{asset('onlinecourse/assets/vendors/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>

    <script src=" {{asset('onlinecourse/assets/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src=" {{asset('onlinecourse/assets/vendors/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <!-- <script src=" {{asset('onlinecourse/assets/vendors/revolution/js/extensions/revolution.extension.navigation.min.js')}}" "></script> -->
    <script src=" {{asset('onlinecourse/assets/vendors/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script src=" {{asset('onlinecourse/assets/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src=" {{asset('onlinecourse/assets/js/combobox.js')}}"></script>
    <!-- <script src=" {{asset('onlinecourse/assets/vendors/revolution/js/extensions/revolution.extension.video.min.js')}}" "></script> -->
    <script>
        var modalclose = document.getElementsByClassName("modal-ask-close")[0];


        function showModel(id) {

            document.getElementById("ask-modal-id").style.display = "block";
            document.getElementById("teacher_id").value = id;
        }
        modalclose.onclick = function() {
            document.getElementById("ask-modal-id").style.display = "none";
        }
    </script>
    <script>
        $('.cursor-btn').click(function() {

            $(this).next('ul.sub-class-show').toggleClass("sub-show");

        });

        $('.sub-cursor').click(function() {

            $(this).next('.sub-menu .child-show1').toggleClass("sub-show");


        });

        function cb(x) {
            if (x == 1) document.getElementById("alert-message").style.display = "none";
        }

        function subcourse(x) {
            if (x == 1) {
                $('.sub1').toggleClass("sub-show1");
                $('.sub2').removeClass("sub-show1");
                $('.sub3').removeClass("sub-show1");
                $('.sub4').removeClass("sub-show1");
                $('.sub5').removeClass("sub-show1");
                $('.sub6').removeClass("sub-show1");
            }
            if (x == 2) {
                $('.sub2').toggleClass("sub-show1");
                $('.sub1').removeClass("sub-show1");
                $('.sub3').removeClass("sub-show1");
                $('.sub4').removeClass("sub-show1");
                $('.sub5').removeClass("sub-show1");
                $('.sub6').removeClass("sub-show1");
            }
            if (x == 3) {
                $('.sub3').toggleClass("sub-show1");
                $('.sub1').removeClass("sub-show1");
                $('.sub2').removeClass("sub-show1");
                $('.sub4').removeClass("sub-show1");
                $('.sub5').removeClass("sub-show1");
                $('.sub6').removeClass("sub-show1");
            }

            if (x == 4) {
                $('.sub4').toggleClass("sub-show1");
                $('.sub1').removeClass("sub-show1");
                $('.sub2').removeClass("sub-show1");
                $('.sub3').removeClass("sub-show1");
                $('.sub5').removeClass("sub-show1");
                $('.sub6').removeClass("sub-show1");
            }
            if (x == 5) {
                $('.sub5').toggleClass("sub-show1");
                $('.sub1').removeClass("sub-show1");
                $('.sub2').removeClass("sub-show1");
                $('.sub3').removeClass("sub-show1");
                $('.sub4').removeClass("sub-show1");
                $('.sub6').removeClass("sub-show1");
            }
            if (x == 6) {
                $('.sub6').toggleClass("sub-show1");
                $('.sub1').removeClass("sub-show1");
                $('.sub2').removeClass("sub-show1");
                $('.sub3').removeClass("sub-show1");
                $('.sub4').removeClass("sub-show1");
                $('.sub5').removeClass("sub-show1");
            }

        }
    </script>
</body>

</html>