<?php
if (session()->get('sessionUserId') != "") {
    $user = \DB::table('users')
        ->select('*')
        ->where('password', session()->get('sessionUserId'))
        ->get();
    $user_id = $user[0]->user_id;
    $courses = \DB::table('course_enrolls')
        ->join('quizzes', 'quizzes.quiz_id', '=', 'course_enrolls.course_or_quiz_id')
        ->join('payments', 'payments.tCode', '=', 'course_enrolls.tCode')
        ->select('course_enrolls.course_or_quiz_id')
        ->where('type', 1)
        ->where('user_id',  $user_id)
        ->where('endDate', '>=', date('Y-m-d'))
        ->first();

    $bookmarks = \DB::select("select id from bookmarkcourses where course_or_quiz_id='" . $quizes[0]->quiz_id . "' and user_id='" . $user_id . "' and type=1");
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
                        <input type="hidden" id="type" name="type" value="1">
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

            <!-- Breadcrumb row -->
            <div class="breadcrumb-row">
                <div class="container">
                    <ul class="list-inline">
                        <li><a href="#">Home</a></li>
                        <li>Quizes Details</li>
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
                                        <div class="combo-dropdown">
                                            <button onclick="myFunction()" class="combobtn">Buy Now This Quiz <i class="uil uil-angle-down"></i></button>
                                            <div id="myDropdown" class="dropdown-content">
                                                @foreach($quizpricing as $pricing)
                                                @if(@$user_id!="")
                                                <a href="/addtobasket/{{@$quizes[0]->quiz_id}}/{{$pricing->quiz_pricing_id }}/quiz">Rs. {{$pricing->sell_price}}.00</a>
                                                @else
                                                <a href="/user-login">Rs. {{$pricing->sell_price}}.00</a>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="course-buy-now text-center">
                                        <a href="/user-login" class="btn  text-uppercase" style="width: 100%;"> <i class="fa-regular fa-heart"></i> Save This Quiz</a>
                                    </div>
                                    @else
                                    @if(@$bookmarks[0]->id=="")
                                    <div class="course-buy-now text-center">
                                        <a href="/savethiscourse/{{$quizes[0]->quiz_id}}/{{$user_id}}/1" class="btn  text-uppercase" style="width: 100%;"> <i class="fa-regular fa-heart"></i> Save This Quiz</a>
                                    </div>
                                    @else
                                    <div class="course-buy-now text-center " style="margin-top: 5px ;">
                                        <a href="/removethiscourse/{{$quizes[0]->quiz_id}}/{{$user_id}}/1" class="btn  text-uppercase saved-course">Saved <i class="fa-regular fa-circle-check"></i></a>
                                    </div>
                                    @endif
                                    <div class="course-buy-now text-center " style="margin-top: 5px;">
                                        <a href="{{url('quizcontent', $quizes[0]->quiz_id )}}" class="btn  text-uppercase course-purchased">Take This Quiz</a>
                                    </div>

                                    @endif
                                    <!-- <div class="course-buy-now text-center">
                                        <a href="#" class="btn  text-uppercase" style="width: 100%;">Buy Now This Courses</a>
                                    </div> -->

                                    <div class="cours-more-info">
                                        <div class="review">
                                            <span>3 Review</span>
                                            <ul class="cours-star">
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="price categories">
                                            <span>Categories</span>
                                            <h5 class="text-primary">{{@$quizes[0]->quiz_catagories_name}}</h5>
                                        </div>
                                    </div>
                                    <div class="widget recent-posts-entry widget-courses">
                                        <h5 class="widget-title style-1" style="margin-bottom:10px!important; margin-top: 20px;">Similar Quizes</h5>
                                        <div class="widget-post-bx">


                                            @foreach($similarquizes as $similarcourse)
                                            <div class="widget-post clearfix">
                                                <div class="ttr-post-media"> <img src="/uploads/Postimg/{{@$similarcourse->thumbnail}}" width="200" height="143" alt=""> </div>
                                                <div class="ttr-post-info">
                                                    <div class="ttr-post-header">
                                                        <h6 class="post-title"><a href="{{url('quizdetails', $similarcourse->quiz_id)}}">{{@$similarcourse->quiz_title}}</a></h6>
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

                                <div class="courses-post">
                                    @if(session()->has('message'))
                                    <div class="alert-message" id="alert-message">
                                        <div class="message-sucess-fullysend">
                                            <p>

                                                {{ session()->get('message') }}

                                                <i class="fa-regular fa-circle-check"></i>
                                            </p>
                                        </div>
                                        <div class="cross-mark-question" onclick="cb(1)">
                                            <i class="fa-solid fa-xmark"></i>
                                        </div>
                                    </div>@endif
                                    <div class="ttr-post-media media-effect image-adjust">
                                        <a href="#"><img src="/uploads/Postimg/{{@$quizes[0]->thumbnail}}" alt=""></a>
                                    </div>

                                    <div class="ttr-post-info">
                                        <div class="ttr-post-title ">
                                            <h2 class="post-title">{{@$quizes[0]->quiz_title}}</h2>
                                        </div>
                                        <div class="ttr-post-text">
                                            {!!@$quizes[0]->quiz_description!!}
                                        </div>
                                    </div>
                                </div>

                                <div class="" id="instructor">
                                    <h4>Instructor</h4>



                                    @foreach($courseAuthor as $author)
                                    <div class="instructor-bx">
                                        <div class="instructor-author">
                                            <img src="/onlinecourse/assets/images/user.png" alt="">
                                        </div>
                                        <div class="instructor-info">
                                            <h6>{{$author->fullname}}</h6>
                                            @if(@$courses->course_or_quiz_id!="")
                                            <div class="modal-margin"> <button id="modal-ask-button" onclick="showModel('{{$author->teacher_id}}')">Ask a question<i class="fa-solid fa-comment-medical"></i></button></div>
                                            @endif
                                            <span>{{$author->profession}}</span>
                                            <ul class="list-inline m-tb10">
                                                <li><a href="#" class="btn sharp-sm facebook"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#" class="btn sharp-sm twitter"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#" class="btn sharp-sm linkedin"><i class="fa fa-linkedin"></i></a></li>
                                                <li><a href="#" class="btn sharp-sm google-plus"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                            <p class="m-b0">{{$author->introduction}}</p>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                                <div class="" id="reviews">
                                    <h4>Reviews</h4>

                                    <div class="review-bx">
                                        <div class="all-review">
                                            <h2 class="rating-type">3</h2>
                                            <ul class="cours-star">
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                            <span>3 Rating</span>
                                        </div>
                                        <div class="review-bar">
                                            <div class="bar-bx">
                                                <div class="side">
                                                    <div>5 star</div>
                                                </div>
                                                <div class="middle">
                                                    <div class="bar-container">
                                                        <div class="bar-5" style="width:90%;"></div>
                                                    </div>
                                                </div>
                                                <div class="side right">
                                                    <div>150</div>
                                                </div>
                                            </div>
                                            <div class="bar-bx">
                                                <div class="side">
                                                    <div>4 star</div>
                                                </div>
                                                <div class="middle">
                                                    <div class="bar-container">
                                                        <div class="bar-5" style="width:70%;"></div>
                                                    </div>
                                                </div>
                                                <div class="side right">
                                                    <div>140</div>
                                                </div>
                                            </div>
                                            <div class="bar-bx">
                                                <div class="side">
                                                    <div>3 star</div>
                                                </div>
                                                <div class="middle">
                                                    <div class="bar-container">
                                                        <div class="bar-5" style="width:50%;"></div>
                                                    </div>
                                                </div>
                                                <div class="side right">
                                                    <div>120</div>
                                                </div>
                                            </div>
                                            <div class="bar-bx">
                                                <div class="side">
                                                    <div>2 star</div>
                                                </div>
                                                <div class="middle">
                                                    <div class="bar-container">
                                                        <div class="bar-5" style="width:40%;"></div>
                                                    </div>
                                                </div>
                                                <div class="side right">
                                                    <div>110</div>
                                                </div>
                                            </div>
                                            <div class="bar-bx">
                                                <div class="side">
                                                    <div>1 star</div>
                                                </div>
                                                <div class="middle">
                                                    <div class="bar-container">
                                                        <div class="bar-5" style="width:20%;"></div>
                                                    </div>
                                                </div>
                                                <div class="side right">
                                                    <div>80</div>
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
    <script src="{{asset('onlinecourse/assets/js/jquery.scroller.js')}}"></script>
    <script src="{{asset('onlinecourse/assets/js/functions.js')}}"></script>
    <script src="{{asset('onlinecourse/assets/js/contact.js')}}"></script>
    <script src="{{asset('onlinecourse/assets/js/dragging.js')}}"></script>
    <script src="{{asset('onlinecourse/assets/js/combobox.js')}}"></script>
    <script>
        var modalclose = document.getElementsByClassName("modal-ask-close")[0];


        function cb(x) {
            if (x == 1) document.getElementById("alert-message").style.display = "none";
        }

        function showModel(id) {

            document.getElementById("ask-modal-id").style.display = "block";
            document.getElementById("teacher_id").value = id;
        }
        modalclose.onclick = function() {
            document.getElementById("ask-modal-id").style.display = "none";
        }
    </script>
</body>

</html>