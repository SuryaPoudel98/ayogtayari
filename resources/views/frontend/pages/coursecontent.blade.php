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
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('onlinecourse/assets/images/favicon.png')}}" />

    <!-- FONTAWESOME ICON ============================================= -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.0/css/all.css">

    <!--REMIX ICON CDN===============================================-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- PAGE TITLE HERE ============================================= -->
    <title> </title>

    <!-- MOBILE SPECIFIC ============================================= -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--[if lt IE 9]>
	<script src="assets/js/html5shiv.min.js"></script>
	<script src="assets/js/respond.min.js"></script>
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

    <!-- REVOLUTION SLIDER CSS ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{asset('onlinecourse/assets/vendors/revolution/css/layers.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('onlinecourse/assets/vendors/revolution/css/settings.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('onlinecourse/assets/vendors/revolution/css/navigation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('onlinecourse/assets/css/sidenavbar.css')}}">
    <!-- REVOLUTION SLIDER END -->
</head>

<body id="bg">
    <div class="btn-navbar bar-2">
        <span class="fas fa-xmark"></span>
    </div>
    <nav class="sidebar">
        <div class="btn-navbar bar-2">
            <span class="fas fa-xmark"></span>
        </div>
        <div class="text">Lessons</div>
        <ul>
            <?php $table = request()->route('subcourse'); ?>

            @foreach(@$lesson as $item)
            <li>


                <a href="#" class="cursor-btn">{{@$item->lesson}}
                    <span class="fas fa-caret-down first"></span>
                </a>
                <ul class="feat-show">

                    <?php
                    $sublesson = \DB::select("select  DISTINCT sub_lesson,id from " . $table . " where lesson='" . $item->lesson . "' and course_id='" . $courseCirriculumn[0]->course_id . "'");
                    ?>
                    @foreach(@$sublesson as $subitem)
                    <li class="sub-menu">
                        <?php
                        $childlesson = \DB::select("select  DISTINCT child_lesson,id from " . $table . " where lesson='" . $item->lesson . "' and sub_lesson='" . $subitem->sub_lesson . "' and course_id='" . $courseCirriculumn[0]->course_id . "'");
                        ?>
                        @if(!empty($childlesson))
                        <a href="#" class="sub-cursor">{{@$subitem->sub_lesson}}
                            <span class="fas fa-caret-down third"></span>
                        </a>

                        @else
                        <a href="/coursecontent/{{ @$courseCirriculumn[0]->course_id}}/{{@$subitem->id}}/{{request()->route('subcourse')}}" class="sub-cursor">{{@$subitem->sub_lesson}}
                            <span class="fas fa-caret-down third"></span>
                        </a>

                        @endif

                        @foreach(@$childlesson as $childitem)
                        <ul class="child-show1">
                            <li class="sub-child-menu"><a href="/coursecontent/{{ @$courseCirriculumn[0]->course_id}}/{{@$subitem->id}}/{{request()->route('subcourse')}}">{{@$childitem->child_lesson}}</a></li>

                        </ul>
                        @endforeach
                    </li>

                    @endforeach
                </ul>
            </li>
            @endforeach



        </ul>
    </nav>
    <div class="page-wraper" style="z-index: 3333333;">
        <div id="loading-icon-bx"></div>
        <!-- Header Top ==== -->
        @include('frontend.innerblade.header')
        <!-- Header Top END ==== -->
        <!----CONTENT===== ---->

        <div class="page-content bg-white">

            <div class="content-block">
                <!-- Popular Courses -->
                <div class="section-area section-sp2 popular-courses-bx" style="padding-top:29px;">
                    <div class="container">
                        <div class="section-contents">
                            <div class="btn-navbar">
                                <span class="fas fa-bars"></span>
                            </div>
                            <div class="course-name" style=" text-align: center;  font-size: 27px; padding-top: 10px;">
                                <p>Lesson : {{@$courseCirriculumn[0]->lesson}}</p>
                            </div><?php

                                    $nextid = \DB::select("select  id from course_curriculumns where   course_id='" . $courseCirriculumn[0]->course_id . "' and id>'" . request()->route('id') . "' order by id DESC limit 1");
                                    $previousid = \DB::select("select  id from course_curriculumns where   course_id='" . $courseCirriculumn[0]->course_id . "' and id<'" . request()->route('id') . "' order by id DESC limit 1");

                                    ?>
                            <div class="prev-next">
                                <div class="prev-pag">
                                    <a href="/coursecontent/{{ @$courseCirriculumn[0]->course_id}}/{{@$previousid[0]->id}}/{{request()->route('subcourse')}}"> <button>
                                            < Prev </button></a>
                                </div>


                                <div class="next-pag">
                                    <a href="/coursecontent/{{ @$courseCirriculumn[0]->course_id}}/{{@$nextid[0]->id}}/{{request()->route('subcourse')}}"> <button> Next > </button></a>
                                </div>
                            </div>
                        </div>


                        <div class="breif-introduction" style="margin-top:10px; background-color: rgb(236, 236, 236); padding: 20px; text-align: justify; border-radius: 5px;">
                            <h4>{{@$courseCirriculumn[0]->child_lesson}}</h4>
                            {!!@$courseCirriculumn[0]->description!!}
                            @if(@$courseCirriculumn[0]->video_file!="")
                            <video style="width: 100%; margin-top: 20px; " controls>

                                <source src="/file/{{$courseCirriculumn[0]->video_file}}" type="video/mp4">
                            </video>
                            @endif
                            @if(@$courseCirriculumn[0]->quiz_id!="")
                            <?php
                            $quiz = \DB::select("select quiz_title from quizzes where quiz_id='" . $courseCirriculumn[0]->quiz_id . "'");
                            ?>
                            <a href="/quizcontent/{{$courseCirriculumn[0]->quiz_id}}">{{$quiz[0]->quiz_title}}</a>
                            @endif
                            @if(@$courseCirriculumn[0]->file!="")
                            <iframe src="/file/{{$courseCirriculumn[0]->file}}" style="border:1px solid white;" width="100%" height="700px">
                            </iframe>
                            @endif
                        </div>

                    </div>

                </div>
                <!-- Popular Courses END -->

            </div>


        </div>
        <!----CONTENT ENDS===== ---->
        <!-- Footer ==== -->
        @include('frontend.innerblade.footer')
        <!-- Footer END ==== -->
        <button class="back-to-top fa fa-chevron-up"></button>
    </div>

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

    <script>
        $('.btn-navbar').click(function() {
            $(this).toggleClass("click");
            $('.sidebar').toggleClass("show");
        });


        $('.cursor-btn').click(function() {
            $(this).next('nav ul.feat-show').toggleClass("show");

            $(this).find('nav ul .first').toggleClass('rotate');

        });

        $('.sub-cursor').click(function() {
            $(this).next('nav ul .child-show1').toggleClass("show2");
            // $('nav ul .third').toggleClass("rotate");
        });


        $('nav ul li').click(function() {
            $(this).addClass("active").siblings().removeClass("active");
        });
    </script>


</body>

</html>