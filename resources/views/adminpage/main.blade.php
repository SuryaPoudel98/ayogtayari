<?php
$users = \DB::select("select count(user_id) totaluser from users");
?>

<div class="all-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo-pro">
                    <a href="admin-template/index.html"><img class="main-logo" src="{{asset('admin-template/img/logo/logo.png')}}" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-advance-area">
        <div class="header-top-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header-top-wraper">
                            <div class="row">
                                <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                    <div class="menu-switcher-pro">
                                        <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                            <i class="educate-icon educate-nav"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                    <div class="header-top-menu tabl-d-n">
                                        <ul class="nav navbar-nav mai-top-nav">
                                            <li class="nav-item"><a href="#" class="nav-link">Home</a>
                                            </li>
                                            <!-- <li class="nav-item"><a href="#" class="nav-link">About</a>
                                            </li>
                                            <li class="nav-item"><a href="#" class="nav-link">Services</a>
                                            </li> -->

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <div class="header-right-info">
                                        <ul class="nav navbar-nav mai-top-nav header-right-menu">


                                            <li class="nav-item">
                                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                    <img src="admin-template/img/product/pro4.jpg" alt="" />
                                                    <span class="admin-name">Tuki soft pvt.ltd.</span>
                                                    <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                </a>
                                                <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                    <li><a href="#"><span class="edu-icon edu-home-admin author-log-ic"></span>My Account</a>
                                                    </li>
                                                    <li><a href="#"><span class="edu-icon edu-user-rounded author-log-ic"></span>My Profile</a>
                                                    </li>
                                                    <li><a href="#"><span class="edu-icon edu-money author-log-ic"></span>User Billing</a>
                                                    </li>
                                                    <li><a href="#"><span class="edu-icon edu-settings author-log-ic"></span>Settings</a>
                                                    </li>
                                                    <li><a href="#"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nav-item nav-setting-open"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-menu"></i></a>

                                                <div role="menu" class="admintab-wrap menu-setting-wrap menu-setting-wrap-bg dropdown-menu animated zoomIn">
                                                    <ul class="nav nav-tabs custon-set-tab">
                                                        <li class="active"><a data-toggle="tab" href="#Notes">Notes</a>
                                                        </li>
                                                        <li><a data-toggle="tab" href="#Projects">Projects</a>
                                                        </li>
                                                        <li><a data-toggle="tab" href="#Settings">Settings</a>
                                                        </li>
                                                    </ul>

                                                    <div class="tab-content custom-bdr-nt">
                                                        <div id="Notes" class="tab-pane fade in active">
                                                            <div class="notes-area-wrap">
                                                                <div class="note-heading-indicate">
                                                                    <h2><i class="fa fa-comments-o"></i> Latest Notes</h2>
                                                                    <p>You have 10 new message.</p>
                                                                </div>
                                                                <div class="notes-list-area notes-menu-scrollbar">
                                                                    <ul class="notes-menu-list">
                                                                        <li>
                                                                            <a href="#">
                                                                                <div class="notes-list-flow">
                                                                                    <div class="notes-img">
                                                                                        <img src="admin-template/img/contact/4.jpg" alt="" />
                                                                                    </div>
                                                                                    <div class="notes-content">
                                                                                        <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                        <span>Yesterday 2:45 pm</span>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">
                                                                                <div class="notes-list-flow">
                                                                                    <div class="notes-img">
                                                                                        <img src="admin-template/img/contact/1.jpg" alt="" />
                                                                                    </div>
                                                                                    <div class="notes-content">
                                                                                        <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                        <span>Yesterday 2:45 pm</span>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">
                                                                                <div class="notes-list-flow">
                                                                                    <div class="notes-img">
                                                                                        <img src="admin-template/img/contact/2.jpg" alt="" />
                                                                                    </div>
                                                                                    <div class="notes-content">
                                                                                        <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                        <span>Yesterday 2:45 pm</span>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">
                                                                                <div class="notes-list-flow">
                                                                                    <div class="notes-img">
                                                                                        <img src="{{asset('admin-template/img/contact/3.jpg')}}" alt="" />
                                                                                    </div>
                                                                                    <div class="notes-content">
                                                                                        <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                        <span>Yesterday 2:45 pm</span>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">
                                                                                <div class="notes-list-flow">
                                                                                    <div class="notes-img">
                                                                                        <img src="admin-template/img/contact/4.jpg" alt="" />
                                                                                    </div>
                                                                                    <div class="notes-content">
                                                                                        <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                        <span>Yesterday 2:45 pm</span>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">
                                                                                <div class="notes-list-flow">
                                                                                    <div class="notes-img">
                                                                                        <img src="admin-template/img/contact/1.jpg" alt="" />
                                                                                    </div>
                                                                                    <div class="notes-content">
                                                                                        <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                        <span>Yesterday 2:45 pm</span>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">
                                                                                <div class="notes-list-flow">
                                                                                    <div class="notes-img">
                                                                                        <img src="admin-template/img/contact/2.jpg" alt="" />
                                                                                    </div>
                                                                                    <div class="notes-content">
                                                                                        <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                        <span>Yesterday 2:45 pm</span>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">
                                                                                <div class="notes-list-flow">
                                                                                    <div class="notes-img">
                                                                                        <img src="admin-template/img/contact/1.jpg" alt="" />
                                                                                    </div>
                                                                                    <div class="notes-content">
                                                                                        <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                        <span>Yesterday 2:45 pm</span>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">
                                                                                <div class="notes-list-flow">
                                                                                    <div class="notes-img">
                                                                                        <img src="admin-template/img/contact/2.jpg" alt="" />
                                                                                    </div>
                                                                                    <div class="notes-content">
                                                                                        <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                        <span>Yesterday 2:45 pm</span>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">
                                                                                <div class="notes-list-flow">
                                                                                    <div class="notes-img">
                                                                                        <img src="admin-template/img/contact/3.jpg" alt="" />
                                                                                    </div>
                                                                                    <div class="notes-content">
                                                                                        <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                        <span>Yesterday 2:45 pm</span>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="Projects" class="tab-pane fade">
                                                            <div class="projects-settings-wrap">
                                                                <div class="note-heading-indicate">
                                                                    <h2><i class="fa fa-cube"></i> Latest projects</h2>
                                                                    <p> You have 20 projects. 5 not completed.</p>
                                                                </div>
                                                                <div class="project-st-list-area project-st-menu-scrollbar">
                                                                    <ul class="projects-st-menu-list">
                                                                        <li>
                                                                            <a href="#">
                                                                                <div class="project-list-flow">
                                                                                    <div class="projects-st-heading">
                                                                                        <h2>Web Development</h2>
                                                                                        <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                        <span class="project-st-time">1 hours ago</span>
                                                                                    </div>
                                                                                    <div class="projects-st-content">
                                                                                        <p>Completion with: 28%</p>
                                                                                        <div class="progress progress-mini">
                                                                                            <div style="width: 28%;" class="progress-bar progress-bar-danger hd-tp-1"></div>
                                                                                        </div>
                                                                                        <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">
                                                                                <div class="project-list-flow">
                                                                                    <div class="projects-st-heading">
                                                                                        <h2>Software Development</h2>
                                                                                        <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                        <span class="project-st-time">2 hours ago</span>
                                                                                    </div>
                                                                                    <div class="projects-st-content project-rating-cl">
                                                                                        <p>Completion with: 68%</p>
                                                                                        <div class="progress progress-mini">
                                                                                            <div style="width: 68%;" class="progress-bar hd-tp-2"></div>
                                                                                        </div>
                                                                                        <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">
                                                                                <div class="project-list-flow">
                                                                                    <div class="projects-st-heading">
                                                                                        <h2>Graphic Design</h2>
                                                                                        <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                        <span class="project-st-time">3 hours ago</span>
                                                                                    </div>
                                                                                    <div class="projects-st-content">
                                                                                        <p>Completion with: 78%</p>
                                                                                        <div class="progress progress-mini">
                                                                                            <div style="width: 78%;" class="progress-bar hd-tp-3"></div>
                                                                                        </div>
                                                                                        <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">
                                                                                <div class="project-list-flow">
                                                                                    <div class="projects-st-heading">
                                                                                        <h2>Web Design</h2>
                                                                                        <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                        <span class="project-st-time">4 hours ago</span>
                                                                                    </div>
                                                                                    <div class="projects-st-content project-rating-cl2">
                                                                                        <p>Completion with: 38%</p>
                                                                                        <div class="progress progress-mini">
                                                                                            <div style="width: 38%;" class="progress-bar progress-bar-danger hd-tp-4"></div>
                                                                                        </div>
                                                                                        <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">
                                                                                <div class="project-list-flow">
                                                                                    <div class="projects-st-heading">
                                                                                        <h2>Business Card</h2>
                                                                                        <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                        <span class="project-st-time">5 hours ago</span>
                                                                                    </div>
                                                                                    <div class="projects-st-content">
                                                                                        <p>Completion with: 28%</p>
                                                                                        <div class="progress progress-mini">
                                                                                            <div style="width: 28%;" class="progress-bar progress-bar-danger hd-tp-5"></div>
                                                                                        </div>
                                                                                        <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">
                                                                                <div class="project-list-flow">
                                                                                    <div class="projects-st-heading">
                                                                                        <h2>Ecommerce Business</h2>
                                                                                        <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                        <span class="project-st-time">6 hours ago</span>
                                                                                    </div>
                                                                                    <div class="projects-st-content project-rating-cl">
                                                                                        <p>Completion with: 68%</p>
                                                                                        <div class="progress progress-mini">
                                                                                            <div style="width: 68%;" class="progress-bar hd-tp-6"></div>
                                                                                        </div>
                                                                                        <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">
                                                                                <div class="project-list-flow">
                                                                                    <div class="projects-st-heading">
                                                                                        <h2>Woocommerce Plugin</h2>
                                                                                        <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                        <span class="project-st-time">7 hours ago</span>
                                                                                    </div>
                                                                                    <div class="projects-st-content">
                                                                                        <p>Completion with: 78%</p>
                                                                                        <div class="progress progress-mini">
                                                                                            <div style="width: 78%;" class="progress-bar"></div>
                                                                                        </div>
                                                                                        <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">
                                                                                <div class="project-list-flow">
                                                                                    <div class="projects-st-heading">
                                                                                        <h2>Wordpress Theme</h2>
                                                                                        <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                        <span class="project-st-time">9 hours ago</span>
                                                                                    </div>
                                                                                    <div class="projects-st-content project-rating-cl2">
                                                                                        <p>Completion with: 38%</p>
                                                                                        <div class="progress progress-mini">
                                                                                            <div style="width: 38%;" class="progress-bar progress-bar-danger"></div>
                                                                                        </div>
                                                                                        <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="Settings" class="tab-pane fade">
                                                            <div class="setting-panel-area">
                                                                <div class="note-heading-indicate">
                                                                    <h2><i class="fa fa-gears"></i> Settings Panel</h2>
                                                                    <p> You have 20 Settings. 5 not completed.</p>
                                                                </div>
                                                                <ul class="setting-panel-list">
                                                                    <li>
                                                                        <div class="checkbox-setting-pro">
                                                                            <div class="checkbox-title-pro">
                                                                                <h2>Show notifications</h2>
                                                                                <div class="ts-custom-check">
                                                                                    <div class="onoffswitch">
                                                                                        <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example">
                                                                                        <label class="onoffswitch-label" for="example">
                                                                                            <span class="onoffswitch-inner"></span>
                                                                                            <span class="onoffswitch-switch"></span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="checkbox-setting-pro">
                                                                            <div class="checkbox-title-pro">
                                                                                <h2>Disable Chat</h2>
                                                                                <div class="ts-custom-check">
                                                                                    <div class="onoffswitch">
                                                                                        <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example3">
                                                                                        <label class="onoffswitch-label" for="example3">
                                                                                            <span class="onoffswitch-inner"></span>
                                                                                            <span class="onoffswitch-switch"></span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="checkbox-setting-pro">
                                                                            <div class="checkbox-title-pro">
                                                                                <h2>Enable history</h2>
                                                                                <div class="ts-custom-check">
                                                                                    <div class="onoffswitch">
                                                                                        <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example4">
                                                                                        <label class="onoffswitch-label" for="example4">
                                                                                            <span class="onoffswitch-inner"></span>
                                                                                            <span class="onoffswitch-switch"></span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="checkbox-setting-pro">
                                                                            <div class="checkbox-title-pro">
                                                                                <h2>Show charts</h2>
                                                                                <div class="ts-custom-check">
                                                                                    <div class="onoffswitch">
                                                                                        <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example7">
                                                                                        <label class="onoffswitch-label" for="example7">
                                                                                            <span class="onoffswitch-inner"></span>
                                                                                            <span class="onoffswitch-switch"></span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="checkbox-setting-pro">
                                                                            <div class="checkbox-title-pro">
                                                                                <h2>Update everyday</h2>
                                                                                <div class="ts-custom-check">
                                                                                    <div class="onoffswitch">
                                                                                        <input type="checkbox" name="collapsemenu" checked="" class="onoffswitch-checkbox" id="example2">
                                                                                        <label class="onoffswitch-label" for="example2">
                                                                                            <span class="onoffswitch-inner"></span>
                                                                                            <span class="onoffswitch-switch"></span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="checkbox-setting-pro">
                                                                            <div class="checkbox-title-pro">
                                                                                <h2>Global search</h2>
                                                                                <div class="ts-custom-check">
                                                                                    <div class="onoffswitch">
                                                                                        <input type="checkbox" name="collapsemenu" checked="" class="onoffswitch-checkbox" id="example6">
                                                                                        <label class="onoffswitch-label" for="example6">
                                                                                            <span class="onoffswitch-inner"></span>
                                                                                            <span class="onoffswitch-switch"></span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="checkbox-setting-pro">
                                                                            <div class="checkbox-title-pro">
                                                                                <h2>Offline users</h2>
                                                                                <div class="ts-custom-check">
                                                                                    <div class="onoffswitch">
                                                                                        <input type="checkbox" name="collapsemenu" checked="" class="onoffswitch-checkbox" id="example5">
                                                                                        <label class="onoffswitch-label" for="example5">
                                                                                            <span class="onoffswitch-inner"></span>
                                                                                            <span class="onoffswitch-switch"></span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


    @if (Request::is('admin-dashboard'))
    <?php $totalincome = 0;
    $courseincome = 0;
    $quizincome = 0;
    ?>
    @foreach($courseEnroll as $item)
    <?php $totalincome += $item->amount;
    $courseincome += $item->amount;
    ?>

    @endforeach

    @foreach($quizEnroll as $item)

    <?php $totalincome += $item->amount;
    $quizincome += $item->amount; ?>
    @endforeach
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcome-heading">
                                    <form role="search" class="sr-input-func">
                                        <input type="text" placeholder="Search..." class="search-int form-control">
                                        <a href="#"><i class="fa fa-search"></i></a>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod"> Dashboard </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="analytics-sparkle-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30">
                        <div class="analytics-content">
                            <h5>Total Income</h5>
                            <h2>Rs.<span class="counter">{{$totalincome}}</span> </h2>
                            <span class="text-success">100%</span>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only">20% Complete</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30">
                        <div class="analytics-content">
                            <h5>Quizes</h5>
                            <h2>Rs.<span class="counter">{{ $quizincome}}</span> <span class="tuition-fees">Quiz Fees</span></h2>
                            <span class="text-danger">{{round($quizincome/$totalincome*100)}}%</span>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:{{round($quizincome/$totalincome*100)}}%;"> <span class="sr-only">230% Complete</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <h5>Courses</h5>
                            <h2>Rs.<span class="counter">{{$courseincome}}</span> <span class="tuition-fees">Course Fees</span></h2>
                            <span class="text-info">{{round($courseincome/$totalincome*100)}}%</span>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:{{round($courseincome/$totalincome*100)}}%;"> <span class="sr-only">20% Complete</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <h5>Active Enrollment</h5>
                            <h2><span class="counter">{{count($activeEnroll)}}</span> <span class="tuition-fees">Active Users</span></h2>
                            <span class="text-inverse">{{round(count($activeEnroll)/$users[0]->totaluser*100)}}%</span>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:{{round(count($activeEnroll)/$users[0]->totaluser*100)}}%;"> <span class="sr-only">230% Complete</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-sales-area mg-tb-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-sales-chart">
                        <div class="portlet-title">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="caption pro-sl-hd">
                                        <span class="caption-subject"><b>Latest Course Enrollment</b></span>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div style="margin-left: -5px;">
                                    <div class="hpanel shadow-inner responsive-mg-b-30">
                                        <div class="panel-body">
                                            <div class="table-responsive wd-tb-cr">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Full Name</th>
                                                            <th>Course Title</th>
                                                            <th>Enroll Date</th>
                                                            <th>Amount</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($courseEnroll as $item)
                                                        <tr>

                                                            <td>
                                                                <span class=" font-bold">{{$item->fullname}}</span>
                                                            </td>
                                                            <td>
                                                                <span class=" font-bold">{{$item->course_title}}</span>
                                                            </td>
                                                            <td>
                                                                <span class=" font-bold">{{$item->startDate}}</span>
                                                            </td>
                                                            <td>
                                                                <span class=" font-bold">{{$item->amount}}</span>
                                                            </td>



                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="caption pro-sl-hd">
                                        <span class="caption-subject"><b>Latest Quiz Enrollment</b></span>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div style="margin-left: -5px;">
                                    <div class="hpanel shadow-inner responsive-mg-b-30">
                                        <div class="panel-body">
                                            <div class="table-responsive wd-tb-cr">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Full Name</th>
                                                            <th>Course Title</th>
                                                            <th>Enroll Date</th>
                                                            <th>Amount</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($quizEnroll as $item)
                                                        <tr>

                                                            <td>
                                                                <span class=" font-bold">{{$item->fullname}}</span>
                                                            </td>
                                                            <td>
                                                                <span class=" font-bold">{{$item->quiz_title}}</span>
                                                            </td>
                                                            <td>
                                                                <span class=" font-bold">{{$item->startDate}}</span>
                                                            </td>
                                                            <td>
                                                                <span class=" font-bold">{{$item->amount}}</span>
                                                            </td>



                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 res-mg-t-30 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
                        <h3 class="box-title">Users</h3>
                        <ul class="list-inline two-part-sp">
                            <li>
                                <div id="sparklinedash"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas></div>
                            </li>
                            <li class="text-right sp-cn-r"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-success">{{$users[0]->totaluser}}</span></li>
                        </ul>
                    </div>
                    <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 tb-sm-res-d-n dk-res-t-d-n">
                        <h3 class="box-title">Course Enroll</h3>
                        <ul class="list-inline two-part-sp">
                            <li>
                                <div id="sparklinedash2"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas></div>
                            </li>
                            <li class="text-right graph-two-ctn"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-purple">{{count(@$courseEnroll)}}</span></li>
                        </ul>
                    </div>
                    <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 tb-sm-res-d-n dk-res-t-d-n">
                        <h3 class="box-title">Quiz Enroll</h3>
                        <ul class="list-inline two-part-sp">
                            <li>
                                <div id="sparklinedash3"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas></div>
                            </li>
                            <li class="text-right graph-three-ctn"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-info">{{count($quizEnroll)}}</span></li>
                        </ul>
                    </div>
                    <!-- <div class="white-box analytics-info-cs table-dis-n-pro tb-sm-res-d-n dk-res-t-d-n">
                        <h3 class="box-title">Bounce Rate</h3>
                        <ul class="list-inline two-part-sp">
                            <li>
                                <div id="sparklinedash4"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas></div>
                            </li>
                            <li class="text-right graph-four-ctn"><i class="fa fa-level-down" aria-hidden="true"></i> <span class="text-danger"><span class="counter">18</span>%</span>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="traffic-analysis-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="social-media-edu">
                        <i class="fa fa-facebook"></i>
                        <div class="social-edu-ctn">
                            <h3>50k Likes</h3>
                            <p>You main list growing</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="social-media-edu twitter-cl res-mg-t-30 table-mg-t-pro-n">
                        <i class="fa fa-twitter"></i>
                        <div class="social-edu-ctn">
                            <h3>30k followers</h3>
                            <p>You main list growing</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="social-media-edu linkedin-cl res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                        <i class="fa fa-linkedin"></i>
                        <div class="social-edu-ctn">
                            <h3>7k Connections</h3>
                            <p>You main list growing</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="social-media-edu youtube-cl res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                        <i class="fa fa-youtube"></i>
                        <div class="social-edu-ctn">
                            <h3>50k Subscribers</h3>
                            <p>You main list growing</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    </br>
    @endif
    @yield('content')

</div>