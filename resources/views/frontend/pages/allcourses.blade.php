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
                    <ul class="list-inline">
                        <li><a href="#">Home</a></li>
                        <li> All Courses</li>
                    </ul>
                </div>
            </div>
            <!-- Breadcrumb row END -->
            <!-- inner page banner END -->
            <div class="content-block">
                <!-- About Us -->
                <div class="section-area section-sp1">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-12 m-b30" style="border : 1px solid #e1e0e0">
                                <div class="widget courses-search-bx placeani">

                                </div>
                                <div class="widget widget_archive">
                                    <div class="back-234" style="width:100%; display: inline-flex;">
                                        <h5 class="widget-title style-1" style="width: 50%">Courses</h5>
                                        <div class="icon-align" style="text-align: right;  width: 50%;">
                                            <i class="ri-equalizer-line"></i>
                                        </div>
                                    </div>
                                    <ul>
                                        @foreach($courseCatagory as $cat)
                                        <input type="radio" value="{{$cat->cid}}" name="courses">
                                        <label for="courses1"> {{$cat->catagory_name}}</label><br>

                                        @endforeach

                                       
                                    </ul>
                                </div>
                                <div class="widget widget_archive">
                                    <h5 class="widget-title style-1">Packages</h5>
                                    <ul>
                                        <input type="radio" name="packages">
                                        <label for="package1"> All Packages</label><br>
                                        <input type="radio" name="packages">
                                        <label for="package2"> 1 Year Service</label><br>
                                        <input type="radio" name="packages">
                                        <label for="package3"> 1 Day</label><br>
                                        <input type="radio" name="packages">
                                        <label for="package4"> 3 Days</label><br>
                                        <input type="radio" name="packages">
                                        <label for="package5"> 7 Days</label><br>
                                        <input type="radio" name="packages">
                                        <label for="package6"> 14 Days</label><br>
                                        <input type="radio" name="packages">
                                        <label for="package7"> 49 Days</label><br>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-8 col-sm-12">
                                <div class="row">
                                    @foreach($courses as $course)
                                    <div class="col-md-6 col-lg-4 col-sm-6 m-b30">
                                        <div class="cours-bx">
                                            <div class="action-box">
                                                <img src="/uploads/Postimg/{{@$course->thumbnail}}" alt="">
                                                <a href="{{url('coursedetails', $course->course_id)}}" class="btn">Read More</a>
                                            </div>
                                            <div class="info-bx text-center">
                                                <h5><a href="{{url('coursedetails', $course->course_id)}}">{{@$course->course_title}}</a></h5>
                                                <span>{{@$course->catagory_name}}</span>
                                            </div>
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
                                    </div>

                                    @endforeach
                                    <!-- <div class="col-lg-12 m-b20">
                                        <div class="pagination-bx rounded-sm gray clearfix">
                                            <ul class="pagination">
                                                <li class="previous"><a href="#"><i class="ti-arrow-left"></i> Prev</a></li>
                                                <li class="active"><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li class="next"><a href="#">Next <i class="ti-arrow-right"></i></a></li>
                                            </ul>
                                        </div>
                                    </div> -->
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
    <script src="{{asset('onlinecourse/assets/js/functions.js')}}"></script>
    <script src="{{asset('onlinecourse/assets/js/contact.js')}}"></script>

</body>

</html>