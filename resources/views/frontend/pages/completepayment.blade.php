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
    <!-- REVOLUTION SLIDER END -->
</head>

<body id="bg">
    <div class="page-wraper">
        <div id="loading-icon-bx"></div>
        <!-- Header Top ==== -->
        @include('frontend.innerblade.header')
        <!-- Header Top END ==== -->
        <!-- Content -->
        <div class="page-content bg-white">


            <!-- Breadcrumb row END -->
            <!-- inner page banner END -->
            <div class="content-block">
                <!-- About Us -->
                <div class="section-area section-sp1">
                    <div class="container">
                        <div class="payment-options" style="margin-top: 65px!important;">
                            <div class="payment-forms display-flex" style="padding: 25px ;background-color:white; margin-left: 25px;">
                                <div class="order-summary">
                                    <div class="col-md-12 heading-bx left" style="padding-left: 0px;">
                                        <h2 class="title-head" style="font-size: 25px">Order <span>Summary</span></h2>
                                        <div class="sumary-details">
                                            <table class="product-table">

                                                <?php $i = 0;
                                                $total = 0; ?>
                                                @foreach($courses as $course)
                                                <?php $i++;
                                                $total += $course->amount;
                                                ?>
                                                <tr>
                                                    <th>{{$course->course_title}}</th>
                                                    <td>Rs. {{$course->amount}}.00</td>
                                                </tr>
                                                @endforeach


                                                @foreach($quizes as $course)
                                                <?php $i++;
                                                $total += $course->amount;
                                                ?>
                                                <tr>
                                                    <th>{{$course->quiz_title}}</th>
                                                    <td>Rs. {{$course->amount}}.00</td>
                                                </tr>
                                                @endforeach

                                                <tr class="last-content">
                                                    <th style="color: white;">Grand Total:</th>
                                                    <td>Rs. {{$total}}.00</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="e-wallet-details" style=" width: 70%;">
                                    <div class="col-md-12 heading-bx left" style="padding-left: 0px;">
                                        <h2 class="title-head" style="font-size: 25px">Select <span>Payment Wallet</span></h2>
                                        <div class="wallet-inline">
                                            <div class="wallet" id="e1" onclick="pay(1)">
                                                <img src="/onlinecourse/assets/images/e-wallet/e-sewa.png" alt="">
                                                <p class="green">E-sewa</p>
                                            </div>
                                            <div class="wallet" id="k2" onclick="pay(2)">
                                                <img src="/onlinecourse/assets/images/e-wallet/khalti.png" alt="">
                                                <p class="purple">Khalti</p>
                                            </div>

                                        </div>
                                        <div class="payment-button" id="e-sewa-button" style="margin-top: 30px;">

                                            <a href="/complete-payment-sucess"> <button type="submit" class="btn btn-esewa">Pay Rs.{{$total}}.00/-</button></a>
                                        </div>
                                        <div style="margin-top: 30px;" id="khalti-button">
                                            <a href="/complete-payment-sucess"> <button type="submit" class="btn btn-khalti">Pay Rs. {{$total}}.00/-</button></a>
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

    <script src="{{asset('onlinecourse/assets/js/paymentchange.js')}}"></script>
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
    <!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <!-- <script src=" {{asset('onlinecourse/assets/vendors/revolution/js/extensions/revolution.extension.actions.min.js')}}" "></script> -->
    <!-- <script src=" {{asset('onlinecourse/assets/vendors/revolution/js/extensions/revolution.extension.carousel.min.js')}}" "></script> -->
    <!-- <script src=" {{asset('onlinecourse/assets/vendors/revolution/js/extensions/revolution.extension.kenburn.min.js')}}" "></script> -->
    <script src=" {{asset('onlinecourse/assets/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src=" {{asset('onlinecourse/assets/vendors/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <!-- <script src=" {{asset('onlinecourse/assets/vendors/revolution/js/extensions/revolution.extension.navigation.min.js')}}" "></script> -->
    <script src=" {{asset('onlinecourse/assets/vendors/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script src=" {{asset('onlinecourse/assets/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <!-- <script src=" {{asset('onlinecourse/assets/vendors/revolution/js/extensions/revolution.extension.video.min.js')}}" "></script> -->
    <script>
        jQuery(document).ready(function() {
            var ttrevapi;
            var tpj = jQuery;
            if (tpj(" #rev_slider_486_1 ").revolution == undefined) {
                revslider_showDoubleJqueryError(" #rev_slider_486_1 ");
            } else {
                ttrevapi = tpj(" #rev_slider_486_1 ").show().revolution({
                    sliderType: " standard ",
                    jsFileLocation: " {{asset('onlinecourse/assets/vendors/revolution/js/ ",
                    sliderLayout: "fullwidth ",
                    dottedOverlay: "none ",
                    delay: 9000,
                    navigation: {
                        keyboardNavigation: "on ",
                        keyboard_direction: "horizontal ",
                        mouseScrollNavigation: "off ",
                        mouseScrollReverse: "default ",
                        onHoverStop: "on ",
                        touch: {
                            touchenabled: "on ",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: "horizontal ",
                            drag_block_vertical: false
                        },
                        arrows: {
                            style: "uranus ",
                            enable: true,
                            hide_onmobile: false,
                            hide_onleave: false,

                            tmp: '',
                            left: {
                                h_align: "left ",
                                v_align: "center ",
                                h_offset: 10,
                                v_offset: 0
                            },
                            right: {
                                h_align: "right ",
                                v_align: "center ",
                                h_offset: 10,
                                v_offset: 0
                            }
                        },

                    },
                    viewPort: {
                        enable: true,
                        outof: "pause ",
                        visible_area: "80% ",
                        presize: false
                    },
                    responsiveLevels: [1240, 1024, 778, 480],
                    visibilityLevels: [1240, 1024, 778, 480],
                    gridwidth: [1240, 1024, 778, 480],
                    gridheight: [768, 600, 600, 600],
                    lazyType: "none ",
                    parallax: {
                        type: "scroll ",
                        origo: "enterpoint ",
                        speed: 400,
                        levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 46, 47, 48, 49, 50, 55],
                        type: "scroll ",
                    },
                    shadow: 0,
                    spinner: "off ",
                    stopLoop: "off ",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off ",
                    autoHeight: "off ",
                    hideThumbsOnMobile: "off ",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off ",
                        nextSlideOnWindowFocus: "off ",
                        disableFocusListener: false,
                    }
                });
            }
        });
    </script>
</body>

</html>