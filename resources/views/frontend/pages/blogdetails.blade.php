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
            <!-- inner page banner -->
            
            <!-- Breadcrumb row -->
            <div class="breadcrumb-row">
                <div class="container">
                    <ul class="list-inline">
                        <li><a href="/">Home</a></li>
                        <li>News & Event</li>
                    </ul>
                </div>
            </div>
            <!-- Breadcrumb row END -->
            <div class="content-block">
                <div class="section-area section-sp1">
                    <div class="container">
                        <div class="row">
                            
                            <!-- Left part start -->
                            <div class="col-lg-8 col-xl-8">
                                <!-- blog start -->
                                <div class="recent-news blog-lg">
                                    <ul class="media-post">
                                        <li><a href="#"><i class="fa fa-calendar"></i>{{ Carbon\Carbon::parse(@$blog[0]->updated_at)->format('M d Y') }}</a></li>
                                        <li><a href="#"><i class="fa fa-comments-o"></i>{{$blogcommentCount}} Comment</a></li>
                                    </ul>
                                    <div class="action-box blog-lg">
                                        <img src="/uploads/Postimg/{{$blog[0]->thumbnail}}" alt="">
                                    </div>
                                    <div class="info-bx">

                                        <h5 class="post-title">{{$blog[0]->blog_title}}</h5>
                                        {!!$blog[0]->description!!}
                                        <div class="ttr-divider bg-gray"><i class="icon-dot c-square"></i></div>
                                        <!-- <div class="widget_tag_cloud">
                                            <h6>TAGS</h6>
                                            <div class="tagcloud">
                                                <a href="#">Design</a>
                                                <a href="#">User interface</a>
                                                <a href="#">SEO</a>
                                                <a href="#">WordPress</a>
                                                <a href="#">Development</a>
                                                <a href="#">Joomla</a>
                                                <a href="#">Design</a>
                                                <a href="#">User interface</a>
                                                <a href="#">SEO</a>
                                                <a href="#">WordPress</a>
                                                <a href="#">Development</a>
                                                <a href="#">Joomla</a>
                                                <a href="#">Design</a>
                                                <a href="#">User interface</a>
                                                <a href="#">SEO</a>
                                                <a href="#">WordPress</a>
                                                <a href="#">Development</a>
                                                <a href="#">Joomla</a>
                                            </div>
                                        </div> -->
                                        <div class="ttr-divider bg-gray"><i class="icon-dot c-square"></i></div>
                                        <h6>SHARE </h6>
                                        <ul class="list-inline contact-social-bx">
                                            <li><a href="#" class="btn outline radius-xl"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#" class="btn outline radius-xl"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#" class="btn outline radius-xl"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#" class="btn outline radius-xl"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                        <div class="ttr-divider bg-gray"><i class="icon-dot c-square"></i></div>
                                    </div>
                                </div>
                                <div class="clear" id="comment-list">
                                    <div class="comments-area" id="comments">
                                        <h2 class="comments-title">{{$blogcommentCount}} Comments</h2>
                                        <div class="clearfix m-b20">
                                            <!-- comment list END -->
                                            <ol class="comment-list">
                                                @foreach($blogcomment as $comment)
                                                <li class="comment">
                                                    <div class="comment-body">
                                                        <div class="comment-author vcard"> <img class="avatar photo" src="/onlinecourse/assets/images/user.png" alt=""> <cite class="fn">{{@$comment->fullname}}</cite> <span class="says">says:</span> </div>
                                                        <div class="comment-meta"> <a href="#">{{ Carbon\Carbon::parse(@$comment->updated_at)->format('M d Y') }}</a> </div>
                                                        <p>{{@$comment->comment}} </p>
                                                        <!-- <div class="reply"> <a href="#" class="comment-reply-link">Reply</a> </div> -->
                                                    </div>

                                                    <!-- list END -->
                                                </li>
                                                @endforeach

                                            </ol>
                                            <!-- comment list END -->
                                            <!-- Form -->
                                            <div class="comment-respond" id="respond">
                                                <h4 class="comment-reply-title" id="reply-title">Leave a Reply <small> <a style="display:none;" href="#" id="cancel-comment-reply-link" rel="nofollow">Cancel reply</a> </small> </h4>
                                                <div class="col-lg-12">
                                                    @if ($errors->any())
                                                    @foreach ($errors->all() as $error)
                                                    <p class="error-message">{{$error}}</p>
                                                    @endforeach
                                                    @endif
                                                </div>

                                                <form class="comment-form" id="commentform" action="{{url('/postBlogComment')}}" method="POST" autocomplete="off">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="blog_id" value="{{@$blog[0]->id}}">
                                                    <p class="comment-form-author">
                                                        <label for="author">Full Name <span class="required">*</span></label>
                                                        <input type="text" value="" required name="fullname" placeholder="Full Name" id="author">
                                                    </p>
                                                    <p class="comment-form-email">
                                                        <label for="email">Email <span class="required">*</span></label>
                                                        <input type="text" value="" required placeholder="Email" name="email" id="email">
                                                    </p>

                                                    <p class="comment-form-comment">
                                                        <label for="comment">Comment</label>
                                                        <textarea rows="8" name="comment" required placeholder="Comment" id="comment"></textarea>
                                                    </p>
                                                    <p class="form-submit">
                                                        <input type="submit" value="Submit Comment" class="submit" id="submit" name="submit">
                                                    </p>
                                                </form>
                                            </div>
                                            <!-- Form -->
                                        </div>
                                    </div>
                                </div>
                                <!-- blog END -->
                            </div>
                            <!-- Left part END -->
                            <!-- Side bar start -->
                            <div class="col-lg-4 col-xl-4">
                                <aside class="side-bar sticky-top">

                                    <div class="widget recent-posts-entry">
                                        <h6 class="widget-title">Recent Posts</h6>
                                        <div class="widget-post-bx">
                                            @foreach($recentblog as $blog)
                                            <div class="widget-post clearfix">
                                                <div class="ttr-post-media"> <img src="/uploads/Postimg/{{$blog->thumbnail}}" width="200" height="143" alt=""> </div>
                                                <div class="ttr-post-info">
                                                    <div class="ttr-post-header">
                                                        <h6 class="post-title"><a href="{{url('blogdetails', $blog->id)}}">{{$blog->blog_title}}</a></h6>
                                                    </div>
                                                    <ul class="media-post">
                                                        <li><a href="#"><i class="fa fa-calendar"></i>{{ Carbon\Carbon::parse(@$blog->updated_at)->format('M d Y') }}</a></li>
                                                        <!-- <li><a href="#"><i class="fa fa-comments-o"></i>15 Comment</a></li> -->
                                                    </ul>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="widget widget-newslatter">
                                        <h6 class="widget-title">Newsletter</h6>
                                        <div class="news-box">
                                            <p>Enter your e-mail and subscribe to our newsletter.</p>
                                            <form class="subscription-form" action="http://educhamp.themetrades.com/demo/assets/script/mailchamp.php" method="post">
                                                <div class="ajax-message"></div>
                                                <div class="input-group">
                                                    <input name="dzEmail" required="required" type="email" class="form-control" placeholder="Your Email Address" />
                                                    <button name="submit" value="Submit" type="submit" class="btn black radius-no">
                                                        <i class="fa fa-paper-plane-o"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </aside>
                            </div>
                            <!-- Side bar END -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content END-->
        <!-- Footer ==== -->
        @include('frontend.innerblade.footer')
        <!-- Footer END ==== -->
        <button class="back-to-top fa fa-chevron-up "></button>
    </div>

    <!-- External JavaScripts -->
    <script src="{{asset('onlinecourse/assets/js/jquery.min.js')}}" "></script>
    <!-- <script src=" {{asset('onlinecourse/assets/vendors/bootstrap/js/popper.min.js')}}" "></script> -->
    <script src=" {{asset('onlinecourse/assets/vendors/bootstrap/js/bootstrap.min.js')}}" "></script>
    <!-- <script src=" {{asset('onlinecourse/assets/vendors/bootstrap-select/bootstrap-select.min.js')}}" "></script> -->
    <!-- <script src=" {{asset('onlinecourse/assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}" "></script> -->
    <script src=" {{asset('onlinecourse/assets/vendors/magnific-popup/magnific-popup.js')}}" "></script>
    <!-- <script src=" {{asset('onlinecourse/assets/vendors/counter/waypoints-min.js')}}" "></script> -->
    <!-- <script src=" {{asset('onlinecourse/assets/vendors/counter/counterup.min.js')}}" "></script> -->
    <!-- <script src=" {{asset('onlinecourse/assets/vendors/imagesloaded/imagesloaded.js')}}" "></script> -->
    <!-- <script src=" {{asset('onlinecourse/assets/vendors/masonry/masonry.js')}}" "></script> -->
    <!-- <script src=" {{asset('onlinecourse/assets/vendors/masonry/filter.js')}}" "></script> -->
    <script src=" {{asset('onlinecourse/assets/vendors/owl-carousel/owl.carousel.js')}}" "></script>
    <script src=" {{asset('onlinecourse/assets/js/functions.js')}}" "></script>


    <!-- Revolution JavaScripts Files -->
    <script src=" {{asset('onlinecourse/assets/vendors/revolution/js/jquery.themepunch.tools.min.js')}}" "></script>
    <script src=" {{asset('onlinecourse/assets/vendors/revolution/js/jquery.themepunch.revolution.min.js')}}" "></script>
    <!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <!-- <script src=" {{asset('onlinecourse/assets/vendors/revolution/js/extensions/revolution.extension.actions.min.js')}}" "></script> -->
    <!-- <script src=" {{asset('onlinecourse/assets/vendors/revolution/js/extensions/revolution.extension.carousel.min.js')}}" "></script> -->
    <!-- <script src=" {{asset('onlinecourse/assets/vendors/revolution/js/extensions/revolution.extension.kenburn.min.js')}}" "></script> -->
    <script src=" {{asset('onlinecourse/assets/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}" "></script>
    <script src=" {{asset('onlinecourse/assets/vendors/revolution/js/extensions/revolution.extension.migration.min.js')}}" "></script>
    <!-- <script src=" {{asset('onlinecourse/assets/vendors/revolution/js/extensions/revolution.extension.navigation.min.js')}}" "></script> -->
    <script src=" {{asset('onlinecourse/assets/vendors/revolution/js/extensions/revolution.extension.parallax.min.js')}}" "></script>
    <script src=" {{asset('onlinecourse/assets/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js')}}" "></script>
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