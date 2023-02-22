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
    <link rel="stylesheet" href="{{asset('onlinecourse/assets/css/quiz.css')}}">
    <!-- REVOLUTION SLIDER END -->
</head>

<body id="bg">

    <div class="page-wraper" style="z-index: 3333333;">
        <div id="loading-icon-bx"></div>
        <!-- Header Top ==== -->
        @include('frontend.innerblade.header')
        <!-- Header Top END ==== -->
        <!----CONTENT===== ---->

        <div class="page-content bg-white">

            <div class="content-block">

                <div id="ask-modal-id" class="modal">
                    <div class="modal-content">
                        <div class="ask-modal-header">
                            <span class="modal-ask-close">&times;</span>
                            <h2>MCQs Question and Answers</h2>
                        </div>
                        <div class="modal-body">

                            <div class="mcqs-solutions">

                                <?php $y = 0; ?>
                                <?php $correct = 0; ?>
                                <?php $incorrect = 0; ?>
                                <?php $correctMarks = 0; ?>
                                <?php $i = 0; ?>
                                @foreach($Quiz_Questions as $item)
                                <?php $i++; ?>

                                <div class="question-mcq">

                                    <div class="mcq-que">
                                        <div class="snum">{{$i}}.</div>
                                        <div class="que-head"> {!!$item->question_title!!}</div>
                                    </div>
                                    <div class="options">
                                        @foreach($item->answerItems as $ansitem)
                                        @if($ansitem->correctornot)


                                        <?php $y = 0; ?>
                                        @foreach($Quiz_Solutions as $ans)
                                        @if($ansitem->quiz_answer_option_id==$ans->quiz_answer_option_id)
                                        <?php $y = 1; ?>
                                        @endif
                                        @endforeach
                                        <div class="ind-mcq-options">
                                            <p class="option-mcq"> {!!$ansitem->answer!!}
                                            <div class="correct-answer"><i class="fa-regular fa-check"></i> Correct
                                                Answer</div>
                                            @if($y==1)
                                            <?php $correct++; ?>
                                            <div class="student-answer-correct"><i class="fa-solid fa-user"></i>
                                                Student Answer</div>
                                            @endif
                                            </p>
                                        </div><br>
                                        @else

                                        <?php $z = 0; ?>
                                        @foreach($Quiz_Solutions as $ans)
                                        @if($ansitem->quiz_answer_option_id==$ans->quiz_answer_option_id)
                                        <?php $z = 1; ?>
                                        @endif
                                        @endforeach
                                        <div class="ind-mcq-options">
                                            <p class="option-mcq"> {!!$ansitem->answer!!}
                                                @if($z==1)
                                                <?php $incorrect++; ?>
                                            <div class="student-answer-wrong"><i class="fa-solid fa-user"></i>
                                                Student Answer</div>
                                            @endif
                                            </p>
                                        </div><br>
                                        @endif

                                        @endforeach

                                    </div>

                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Popular Courses -->
                <div class="section-area section-sp2 popular-courses-bx" style="padding-top:29px;">
                    <div class="container">
                        <div class="section-contents">

                            <h2 style="text-align:center">
                                @if($quiz[0]->pass_marks<=($correct*$quiz[0]->marks_for_correction))
                                    Congratulation!
                                    @else
                                    Sorry!
                                    @endif
                            </h2>
                            <h4 style="text-align:center">
                                @if($quiz[0]->pass_marks<=($correct*$quiz[0]->marks_for_correction))
                                    You Have Passed The MCQ Exam.
                                    @else
                                    You Have Failed The MCQ Exam.
                                    @endif

                            </h4>
                            <div class="mcqs-result">
                                <div class="whole-leader-board">
                                    <div class="current-user-info">
                                        <h4 style="margin-left: 15px;">{{@$quiz[0]->quiz_title}}</h4>
                                        <ul class="mcqs-marks">

                                            <li>Total Questions : <span>{{count($Quiz_Questions)}}</span></li>
                                            <li>Correct Answer : <span>{{$correct}}</span></li>
                                            <li>Incorrect Answer : <span>{{$incorrect}}</span></li>
                                            <li>Unanswered : <span>{{count($Quiz_Questions)-count($Quiz_Solutions)}}</span></li>
                                            <li>Total Marks Obtained : <span>{{$correct*$quiz[0]->marks_for_correction}}/{{count($Quiz_Questions)*$quiz[0]->marks_for_correction}}</span></li>

                                        </ul>
                                        <!-- <div class="your-ranks">
                                            <p>Your Rank In This Exam : <span>31st</span></p>
                                        </div> -->
                                    </div>
                                    <div class="leader-board-info">
                                        <h4>Leaderboard</h4>

                                        <ol>
                                            @foreach($quizRanks as $rank)
                                            <li> <img src="/onlinecourse/assets/images/user.png">{{$rank->fullname}}</li>

                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                                <div class="result-tabs">
                                    <div class="view-solutions" id="modal-ask-button">
                                        <button>View Solutions</button>
                                    </div>
                                    <div class="retake-this-exam">
                                      <a href="/quizcontent/{{$quiz[0]->quiz_id}}"><button>Retake This Exam</button></a>  
                                    </div>

                                    <!-- <div class="goto-home">
                                        <button>Go Home</button>
                                    </div> -->
                                </div>

                            </div>
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




</body>
<script>
    var modal = document.getElementById("ask-modal-id");
    var modalopen = document.getElementById("modal-ask-button");
    var modalclose = document.getElementsByClassName("modal-ask-close")[0];
    modalopen.onclick = function() {
        modal.style.display = "block";
    }

    modalclose.onclick = function() {
        modal.style.display = "none";
    }
</script>

<script>
    $('.view-solutions').click(function() {

        $('.mcqs-solutions').toggleClass("mcqs-show");

    });
</script>


</html>