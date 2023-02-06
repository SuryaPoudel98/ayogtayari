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

                            <div class="breif-introduction" style="margin-top:30px; background-color: rgb(236, 236, 236); padding: 20px; text-align: justify; border-radius: 5px;">
                                {!!@$quiz[0]->quiz_description!!}
                                <div class="start_btn_quiz"><button>Start Quiz</button></div>
                            </div>
                            <!-- start Quiz button -->


                            <!-- Info Box -->
                            <div class="info_box_quiz">
                                <div class="info-title-quiz"><span>Some Rules of this Quiz</span></div>
                                <div class="info-list-quiz">
                                    <div class="info">1. You will have only <span>10 Minutes</span> per each question.</div>
                                    <div class="info">2. Once you select your answer, it can't be undone.</div>
                                    <div class="info">3. You can't select any option once time goes off.</div>
                                    <div class="info">4. You can't exit from the Quiz while you're playing.</div>
                                    <div class="info">5. You'll get points on the basis of your correct answers.</div>
                                </div>
                                <div class="buttons-quiz">
                                    <button class="quit-quiz">Exit Quiz</button>
                                    <button class="restart-quiz">Continue</button>
                                </div>
                            </div>

                            <!-- Quiz Box -->
                            <div class="quiz_box">
                                <header>
                                    <div class="title">Aayog Tayari Nepal </div>
                                    <div id="ten-countdown">10:00</div>
                                    <button class="cross_button">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>

                                </header>
                                <section>
                                    <div class="que_text">
                                        <!-- Here I've inserted question from JavaScript -->
                                    </div>
                                    <div class="option_list">
                                        <!-- Here I've inserted options from JavaScript -->
                                    </div>
                                </section>

                                <!-- footer-quiz of Quiz Box -->
                                <footer-quiz>
                                    <div class="total_que">
                                        <!-- Here I've inserted Question Count Number from JavaScript -->
                                    </div>
                                    <button class="next_btn">Next Que</button>
                                </footer-quiz>
                            </div>

                            <!-- Result Box -->
                            <div class="result_box_quiz">
                                <div class="icon-quiz">
                                    <i class="fas fa-crown"></i>
                                </div>
                                <div class="complete_text">You've completed the Quiz!</div>
                                <div class="score_text">
                                    <!-- Here I've inserted Score Result from JavaScript -->
                                </div>
                                <div class="buttons-quiz">
                                    <button class="restart-quiz">Replay Quiz</button>
                                    <button class="quit-quiz">Close Quiz</button>
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
    <script>
        let questions = [];
        let answer = [];
    </script>
    <?php $i = 0;
    $correctanswer = ""; ?>
    @foreach($Quiz_Questions as $item)
    <?php $i++;

    ?>

    @foreach($item->answerItems as $ansitem)
    @if($ansitem->correctornot==1)
    <?php $correctanswer = $ansitem->answer; ?>
    @endif
    <script type="text/javascript">
        answer.push("{!!$ansitem->answer!!}");
    </script>
    @endforeach
    <script type="text/javascript">
        var obj = {};
        obj["numb"] = "<?php echo $i; ?>";
        obj["question"] = "{!!$item->question_title!!}";
        obj["answer"] = "<span>{!!$correctanswer!!}</span>";
        obj["options"] = answer;
        questions.push(obj);
        answer = [];
    </script>

    @endforeach

    <script>
        console.log(questions);
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

    <script>
        $('.btn-navbar').click(function() {
            $(this).toggleClass("click");
            $('.sidebar').toggleClass("show");
        });
        $('.feat-btn').click(function() {
            $('nav ul .feat-show').toggleClass("show");
            $('nav ul .first').toggleClass("rotate");
        });
        $('.serv-btn').click(function() {
            $('nav ul .serv-show').toggleClass("show1");
            $('nav ul .second').toggleClass("rotate");
        });
        $('.feat-btn2').click(function() {
            $('nav ul .feat-show2').toggleClass("show2");
            $('nav ul .third').toggleClass("rotate");
        });
        $('nav ul li').click(function() {
            $(this).addClass("active").siblings().removeClass("active");
        });
    </script>

</body>

<!-- Inside this JavaScript file I've inserted Questions and Options only -->
<script src="{{asset('onlinecourse/assets/js/questions.js')}}"></script>

<!-- Inside this JavaScript file I've coded all Quiz Codes -->
<script src="{{asset('onlinecourse/assets/js/quiz.js')}}"></script>



</html>