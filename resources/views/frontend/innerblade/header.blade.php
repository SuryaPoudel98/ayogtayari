<?php
if (session()->get('sessionUserId') != "") {
    $user = \DB::table('users')
        ->select('user_id','fullname')
        ->where('password', session()->get('sessionUserId'))
        ->get();
    $user_id = $user[0]->user_id;
    $count = \DB::select("select count('course_or_quiz_id') as total from baskets where user_id='" . $user_id . "'");
}



?>
<header class="header rs-nav ">
    <div class="top-bar">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="topbar-left">
                    <ul>
                        <li><a href="faq-1.html"><i class="fa fa-question-circle"></i>Ask a Question</a></li>
                        <li><a href="javascript:;"><i class="fa fa-envelope-o"></i>Support@website.com</a></li>
                    </ul>
                </div>
                <div class="topbar-right">
                    @if(session()->get('sessionUserId') != "")
                    <ul>

                        <div class="profile-wrapper">
                            <div class="profile-bar">
                                <div class="user-cart">
                                    @if($count[0]->total>0)
                                    <p class="basket-full"> <a href="/basketDetails">Cart <span>({{$count[0]->total}})</span> <i class="fa-solid fa-cart-shopping"></i></a></p>
                                    @else
                                    <p class="basket-full"> <a href="#">Cart  <i class="fa-solid fa-cart-shopping"></i></a></p>

                                    @endif
                                </div>
                                <div class="right">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <p style="line-height: 22px!important;">{{@$user[0]->fullname}}<br> <span>User</span></p><img src="/onlinecourse/assets/images/user.png" alt="user" width="40" style="margin-top: -20px!important;"><i class="fas fa-angle-down" style="margin-top: -20px!important;"></i>
                                            </a>

                                            <div class="dropdown">
                                                <ul style="text-align: left;">
                                                    <li><a href="/logout-user"><i class="fas fa-user"></i> Logout</a></li>
                                                    <li><a href="/user-dashboard"><i class="fas fa-sliders-h"></i> Dashboard</a></li>

                                                </ul>
                                            </div>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <script>
                            document.querySelector(".right ul li").addEventListener("click", function() {
                                this.classList.toggle("active");
                            });
                        </script>
                        <style>
                            .basket-full a span {
                                font-size: 18px;
                                color: rgb(245, 33, 33);
                            }

                            .profile-wrapper .profile-bar {
                                display: flex;
                                justify-content: space-between;
                                /* background-color: #fff; */
                            }

                            .profile-wrapper .profile-bar ul li a {
                                color: #f7b205;
                            }

                            .profile-wrapper .profile-bar .left ul,
                            .profile-wrapper .profile-bar .right ul li a {
                                display: flex;
                                align-items: center;
                                height: 40px;
                            }

                            .profile-wrapper .profile-bar .left ul li,
                            .profile-wrapper .profile-bar .right img {
                                margin: 0 10px;
                            }

                            .profile-wrapper .profile-bar .right a {
                                text-align: right;
                            }

                            .profile-wrapper .profile-bar .right a span {
                                font-size: 15px;
                                color: black;
                            }

                            .profile-wrapper .profile-bar .right ul li {
                                position: relative;
                            }

                            .profile-wrapper .profile-bar .right ul li:after {
                                background: transparent !important;
                            }

                            .profile-wrapper .profile-bar .right ul li .dropdown {
                                position: absolute;
                                top: 45px;
                                right: 0;
                                background: rgb(245, 245, 245);
                                padding: 7px 10px !important;
                                border-radius: 5px;
                                display: none;
                                z-index: 99999999999999;
                                width: auto !important;
                                box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
                            }

                            .profile-wrapper .profile-bar .right ul li .dropdown .fas {
                                margin-right: 10px;
                            }

                            .profile-wrapper .profile-bar .right ul li .dropdown:before {
                                content: "";
                                position: absolute;
                                top: -20px;
                                left: 50%;
                                transform: translateX(-50%);
                                border: 10px solid;
                                border-color: transparent transparent rgb(245, 245, 245) transparent;
                            }

                            .profile-wrapper .profile-bar .right ul li.active .dropdown {
                                display: block;
                            }
                        </style>
                    </ul>
                    @else
                    <ul>

                        <li><a href="/user-login">Login</a></li>
                        <li><a href="/user-register">Register</a></li>
                    </ul>
                    @endif


                </div>
            </div>
        </div>
    </div>
    <div class="sticky-header navbar-expand-lg">
        <div class="menu-bar clearfix">
            <div class="container clearfix">
                <!-- Header Logo ==== -->
                <div class="menu-logo">
                    <a href="/userportal"><img src="{{asset('onlinecourse/assets/images/logo3.png')}}" alt=""></a>
                </div>
                <!-- Mobile Nav Button ==== -->
                <button class="navbar-toggler collapsed menuicon justify-content-end" type="button" data-toggle="collapse" data-target="#menuDropdown" aria-controls="menuDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <!-- Author Nav ==== -->
                <div class="secondary-menu">
                    <div class="secondary-inner">
                        <ul>
                            <li><a href="javascript:;" class="btn-link"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="javascript:;" class="btn-link"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="javascript:;" class="btn-link"><i class="fa fa-linkedin"></i></a></li>
                            <!-- Search Button ==== -->
                            <li class="search-btn"><button id="quik-search-btn" type="button" class="btn-link"><i class="fa fa-search"></i></button></li>
                        </ul>
                    </div>
                </div>
                <!-- Search Box ==== -->
                <div class="nav-search-bar">
                    <form action="#">
                        <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                        <span><i class="ti-search"></i></span>
                    </form>
                    <span id="search-remove"><i class="ti-close"></i></span>
                </div>
                <!-- Navigation Menu ==== -->
                <div class="menu-links navbar-collapse collapse justify-content-start" id="menuDropdown">
                    <div class="menu-logo">
                        <a href="index.html"><img src="assets/images/logo.png" alt=""></a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="javascript:;">Home <i class="fa fa-chevron-down"></i></a>
                            <ul class="sub-menu">
                                <li><a href="index.html">Home 1</a></li>
                                <li><a href="index-2.html">Home 2</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:;">Pages <i class="fa fa-chevron-down"></i></a>
                            <ul class="sub-menu">
                                <li><a href="javascript:;">About<i class="fa fa-angle-right"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="about-1.html">About 1</a></li>
                                        <li><a href="about-2.html">About 2</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:;">Event<i class="fa fa-angle-right"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="event.html">Event</a></li>
                                        <li><a href="events-details.html">Events Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:;">FAQ's<i class="fa fa-angle-right"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="faq-1.html">FAQ's 1</a></li>
                                        <li><a href="faq-2.html">FAQ's 2</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:;">Contact Us<i class="fa fa-angle-right"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="contact-1.html">Contact Us 1</a></li>
                                        <li><a href="contact-2.html">Contact Us 2</a></li>
                                    </ul>
                                </li>
                                <li><a href="portfolio.html">Portfolio</a></li>
                                <li><a href="profile.html">Profile</a></li>
                                <li><a href="membership.html">Membership</a></li>
                                <li><a href="error-404.html">404 Page</a></li>
                            </ul>
                        </li>
                        <li class="add-mega-menu"><a href="javascript:;">Our Courses <i class="fa fa-chevron-down"></i></a>
                            <ul class="sub-menu add-menu">
                                <li class="add-menu-left">
                                    <h5 class="menu-adv-title">Our Courses</h5>
                                    <ul>
                                        <li><a href="courses.html">Courses </a></li>
                                        <li><a href="courses-details.html">Courses Details</a></li>
                                        <li><a href="profile.html">Instructor Profile</a></li>
                                        <li><a href="event.html">Upcoming Event</a></li>
                                        <li><a href="membership.html">Membership</a></li>
                                    </ul>
                                </li>
                                <li class="add-menu-right">
                                    <img src="assets/images/adv/adv.jpg" alt="" />
                                </li>
                            </ul>
                        </li>
                        <li><a href="javascript:;">Blog <i class="fa fa-chevron-down"></i></a>
                            <ul class="sub-menu">
                                <li><a href="blog-classic-grid.html">Blog Classic</a></li>
                                <li><a href="blog-classic-sidebar.html">Blog Classic Sidebar</a></li>
                                <li><a href="blog-list-sidebar.html">Blog List Sidebar</a></li>
                                <li><a href="blog-standard-sidebar.html">Blog Standard Sidebar</a></li>
                                <li><a href="blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li class="nav-dashboard"><a href="javascript:;">Dashboard <i class="fa fa-chevron-down"></i></a>
                            <ul class="sub-menu">
                                <li><a href="admin/index.html">Dashboard</a></li>
                                <li><a href="admin/add-listing.html">Add Listing</a></li>
                                <li><a href="admin/bookmark.html">Bookmark</a></li>
                                <li><a href="admin/courses.html">Courses</a></li>
                                <li><a href="admin/review.html">Review</a></li>
                                <li><a href="admin/teacher-profile.html">Teacher Profile</a></li>
                                <li><a href="admin/user-profile.html">User Profile</a></li>
                                <li><a href="javascript:;">Calendar<i class="fa fa-angle-right"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="admin/basic-calendar.html">Basic Calendar</a></li>
                                        <li><a href="admin/list-view-calendar.html">List View Calendar</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:;">Mailbox<i class="fa fa-angle-right"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="admin/mailbox.html">Mailbox</a></li>
                                        <li><a href="admin/mailbox-compose.html">Compose</a></li>
                                        <li><a href="admin/mailbox-read.html">Mail Read</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="nav-social-link">
                        <a href="javascript:;"><i class="fa fa-facebook"></i></a>
                        <a href="javascript:;"><i class="fa fa-google-plus"></i></a>
                        <a href="javascript:;"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <!-- Navigation Menu END ==== -->
            </div>
        </div>
    </div>
</header>