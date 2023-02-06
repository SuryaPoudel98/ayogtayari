<?php
if (session()->get('sessionUserId') != "") {
    redirect()->to('/')->send();
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
    <!-- REVOLUTION SLIDER END -->
</head>


<body id="bg">
    <div class="page-wraper">
        <div id="loading-icon-bx"></div>
        <div class="account-form">
            <div class="account-head" style="background-image:url(assets/images/background/bg2.jpg);">
                <a href="index.html"><img src="/onlinecourse/assets/images/logo-white-2.png" alt=""></a>
            </div>
            <div class="account-form-inner">
                <div class="account-container">
                    <div class="heading-bx left">
                        <h2 class="title-head">Login to your <span>Account</span></h2>
                        <p>Don't have an account? <a href="/user-register">Create one here</a></p>
                    </div>
                    <form class="contact-bx" action="{{url('/userLogin')}}" method="POST" autocomplete="off">
                        @csrf

                        <div class="row placeani">

                            <div class="col-lg-12">
                                @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                <p class="error-message">{{$error}}</p>
                                @endforeach
                                @endif
                                <div class="form-group">
                                    <div class="input-group">
                                        <label>Your Email Address</label>
                                        <input name="email_address" type="email" required="" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label>Your Password</label>
                                        <input name="password" autocomplete="off" type="password" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group form-forget">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                        <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                                    </div>
                                    <a href="forget-password.html" class="ml-auto">Forgot Password?</a>
                                </div>
                            </div>
                            <div class="col-lg-12 m-b30">
                                <button name="submit" type="submit" value="Submit" class="btn button-md">Login</button>
                            </div>
                            <div class="col-lg-12">
                                <h6>Login with Social media</h6>
                                <div class="d-flex">
                                    <a class="btn flex-fill m-r5 facebook" href="#"><i class="fa fa-facebook"></i>Facebook</a>
                                    <a class="btn flex-fill m-l5 google-plus" href="#"><i class="fa fa-google-plus"></i>Google Plus</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
    <script src="{{asset('onlinecourse/assets/vendors/switcher/switcher.js')}}"></script>
</body>

</html>