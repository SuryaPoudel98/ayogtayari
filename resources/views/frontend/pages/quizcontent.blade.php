<?php
if (session()->get('sessionUserId') != "") {
    $user = \DB::table('users')
        ->select('*')
        ->where('password', session()->get('sessionUserId'))
        ->get();
    $user_id = $user[0]->user_id;
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

    <!-- REVOLUTION SLIDER CSS ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{asset('onlinecourse/assets/vendors/revolution/css/layers.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('onlinecourse/assets/vendors/revolution/css/settings.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('onlinecourse/assets/vendors/revolution/css/navigation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('onlinecourse/assets/css/sidenavbar.css')}}">
    <link rel="stylesheet" href="{{asset('onlinecourse/assets/css/quiz.css')}}">
    <!-- REVOLUTION SLIDER END -->
</head>

<body id="bg">
    <div id="ask-modal-id" class="modal" style="display: none!important;;">
        <div class="modal-content-mini">
            <div class="ask-modal-header">

                <h2>Time Is UP.</h2>
            </div>
            <div class="modal-body">
                <p>Time For Quiz Exam Is Up. Please Don't forget to save your result.</p>
                <button class="btn" onclick="postAnswerIntoTable();">Submit Your Result</button>
            </div>

        </div>

    </div>
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
                            <!-- <div class="btn-navbar">
                                <span class="fas fa-bars"></span>
                            </div> -->
                            <div class="course-name" style=" text-align: center;  font-size: 27px; padding-top: 10px;">
                                <p>{{@$quiz[0]->quiz_title}}</p>
                            </div>
                            <div class="prev-next">
                                <div class="prev-pag">
                                    <a href="/leaderboard/{{$user_id}}/{{@$quiz[0]->quiz_id}}"> <button style="width:auto;"> View Leaderboard </button></a>
                                </div>

                            </div>

                            <input type="hidden" id="_token" value="{{ csrf_token() }}">
                            <input type="hidden" id="quiz_id" value="{{@$quiz[0]->quiz_id}}">
                            <input type="hidden" id="user_id" value="{{$user_id}}">
                            <input type="hidden" id="totalCorrectAns" name="totalCorrectAns" value="">
                            <div class="breif-introduction" style="margin-top:30px; background-color: rgb(236, 236, 236); padding: 20px; text-align: justify; border-radius: 5px;">
                                {!!@$quiz[0]->quiz_description!!}
                                <div class="start_btn_quiz" id="startQuiz" style="display: block;"><button>Start Quiz</button></div>
                            </div>
                            <!-- start Quiz button -->
                            <div class="quiz-start">
                                <header class="quiz-header">
                                    <div class="quiz-title" style="font-size:25px ;">{{@$quiz[0]->quiz_title}} </div>
                                    <div id="ten-countdown">00:00</div>
                                </header>
                                <div class="head-quiz">
                                    <?php $i = 0; ?>
                                    @foreach($Quiz_Questions as $item)
                                    <?php $i++; ?>
                                    <section class="quiz-grid">
                                        <div class="que_text">
                                            <span>{{$i}}. {!!$item->question_title!!}</span>
                                        </div>

                                        <div class="option_list" id="option{{$i}}">
                                            <!-- <div class="option correct "><span>Hyper Text Preprocessor</span>
                                                <div class="icon tick"><i class="fa-regular fa-check"></i></div> 
                                            </div>-->
                                            @foreach($item->answerItems as $ansitem)
                                            <div class="option" id="ans{{$ansitem->quiz_answer_option_id}}" onclick="checkansweriscorrectornot('{{$item->questions_id}}','ans{{$ansitem->quiz_answer_option_id}}','{{$ansitem->correctornot}}','option{{$i}}','{{$ansitem->quiz_answer_option_id}}')"><span>{!!$ansitem->answer!!}</span></div>

                                            @endforeach
                                        </div>

                                    </section>
                                    @endforeach
                                </div>
                                <footer-quiz class="footer-quiz">
                                    <div class="total_que">
                                        <p id="nextCount">1 of {{count($Quiz_Questions)}} Questions</p>


                                    </div>
                                    <button class="next_btn" id="next_btn" onclick="showNext('{{count($Quiz_Questions)}}')">Next Que</button>
                                    <button class="next_btn" id="submit_btn" style="display: none;" onclick="postAnswerIntoTable();">Submit</button>
                                </footer-quiz>
                                <!-- <div class="leaderboard-quiz">
                                    <h3 style="text-align: center;">Congratulations You Have Completed This Quiz!</h3>
                                    <p style="text-align: center; font-weight: 500;">Go to leaderboard to see your results. <a href="/leaderboard/{{$user_id}}/{{@$quiz[0]->quiz_id}}"> <button class="link-leaderboard"> Leaderboard</button></a><span> Or Restart Quiz<button class="link-leaderboard" onClick="refreshPage()"> Restart</button></span>
                                    </p>
                                </div> -->
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
    <script>
        let questions = [];
        let answer = [];
        let quizSolutions = [];
        let totalCorrectAns = 0;
    </script>


    <script>
        function checkansweriscorrectornot(question_id, id, correctOrNot, optionId, quiz_answer_option_id) {
            if (correctOrNot == 1) {
                var element = document.getElementById(id);
                element.classList.add("correct");
                totalCorrectAns++;

                document.getElementById(optionId).querySelectorAll('.option').forEach(function(el) {
                    el.removeAttribute('onclick');
                });
                quizSolutions.push(question_id + "[#]" + quiz_answer_option_id);
                document.getElementById("totalCorrectAns").value = totalCorrectAns;
            } else {
                var element = document.getElementById(id);
                element.classList.add("incorrect");
                document.getElementById(optionId).querySelectorAll('.option').forEach(function(el) {
                    el.removeAttribute('onclick');
                });
                quizSolutions.push(question_id + "[#]" + quiz_answer_option_id);
            }
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
    <script src="{{asset('onlinecourse/assets/js/quiz-next-jquery.js')}}"></script>


    <script>
        let myInterval;
        let quiz_time = <?php echo @$quiz[0]->quiz_time; ?>;

        function postAnswerIntoTable() {
            var token = document.getElementById('_token').value;

            $.ajax({
                type: 'POST',
                url: "{{ url('quizsolution')}}",
                data: {
                    _token: token,
                    quizSolutions: quizSolutions.toString(),
                    quiz_id: document.getElementById("quiz_id").value,
                    user_id: document.getElementById("user_id").value,
                    totalCorrectAns: document.getElementById("totalCorrectAns").value,
                },
                async: false,
                dataType: 'json',
                success: function(dataResult) {
                    document.getElementById("ask-modal-id").style.display = "none";
                    window.location.href = "/leaderboard/{{$user_id}}/{{@$quiz[0]->quiz_id}}";
                    $('button.next_btn').addClass("quiz-hide");
                    $('.head-quiz').addClass("quiz-hide");
                    $('.footer-quiz').addClass("quiz-hide");
                    $('.leaderboard-quiz').addClass("mcqs-show");
                },
                error: function(response) {
                    document.getElementById("ask-modal-id").style.display = "none";
                    alert("Please take your exam first!")
                }
            });
        }

        /*quiz script button*/
        $('.start_btn_quiz').click(function() {
            $('.quiz-start').toggleClass("quiz-display-show");
            document.getElementById("startQuiz").style.display = "none";
            setTimeout(checkTimerHere, quiz_time * 60 * 1000);
        });

        var visibleDiv = 0;

        function showDiv() {
            $(".quiz-grid").hide();
            $(".quiz-grid:eq(" + visibleDiv + ")").show();
        }
        showDiv()

        function showNext(count) {

            if (visibleDiv == $(".quiz-grid").length - 1) {
                visibleDiv = 0;
                $('button.next_btn').addClass("quiz-hide");
                $('.head-quiz').addClass("quiz-hide");
                $('.footer-quiz').addClass("quiz-hide");
                $('.leaderboard-quiz').addClass("mcqs-show");
            } else {
                visibleDiv++;
            }
            document.getElementById("nextCount").innerHTML = (visibleDiv + 1) + " of " + count + " Questions";
            if (count == (visibleDiv + 1)) {
                document.getElementById("next_btn").style.display = "none";
                document.getElementById("submit_btn").style.display = "block";
            }
            showDiv();

        }

        function checkTimerHere() {
            clearInterval(myInterval);
            document.getElementById('ten-countdown').innerHTML = "0:00";
            document.getElementById("ask-modal-id").style.display = "block";
        }

        function refreshPage() {
            window.location.reload();
        }
        /*timer set*/
        const timer_btn = document.querySelector(".start_btn_quiz");


        timer_btn.onclick = () => {

            const startingMinutes = quiz_time;
            let time = startingMinutes * 60;
            const countdownEl = document.getElementById('ten-countdown');

            myInterval = setInterval(updatedCountdown, 1000);

            function updatedCountdown() {
                const minutes = Math.floor(time / 60);
                let seconds = time % 60;
                seconds = seconds < 10 ? '0' + seconds : seconds;

                countdownEl.innerHTML = `${minutes}:${seconds}`;

                time--;
            }

        }
    </script>



</body>


</html>