<!DOCTYPE html>
<html>
<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('js/vendors/images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('js/vendors/images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('js/vendors/images/favicon-16x16.png') }}">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Component -->
    <x-style-common />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLamb-20yer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
</head>
<body>
<x-pre-loader />

<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
        <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
        <div class="header-search">
            <form>
                <div class="form-group mb-0">
                    <i class="dw dw-search2 search-icon"></i>
                    <input type="text" class="form-control search-input" placeholder="Search Here">
                    <div class="dropdown">
                        <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                            <i class="ion-arrow-down-c"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">From</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control form-control-sm form-control-line" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">To</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control form-control-sm form-control-line" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Subject</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control form-control-sm form-control-line" type="text">
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="header-right">
        <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                    <i class="dw dw-settings2"></i>
                </a>
            </div>
        </div>
        <div class="user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                    <i class="icon-copy dw dw-notification"></i>
                    <span class="badge notification-active"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="notification-list mx-h-350 customscroll">
                        <ul>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('js/vendors/images/img.jpg') }}" alt="">
                                    <h3>John Doe</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('js/vendors/images/photo1.jpg') }}" alt="">
                                    <h3>Lea R. Frith</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('js/vendors/images/photo2.jpg') }}" alt="">
                                    <h3>Erik L. Richards</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('js/vendors/images/photo3.jpg') }}" alt="">
                                    <h3>John Doe</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('js/vendors/images/photo4.jpg') }}" alt="">
                                    <h3>Renee I. Hansen</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('js/vendors/images/img.jpg') }}" alt="">
                                    <h3>Vicki M. Coleman</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="{{ asset('js/vendors/images/photo1.jpg') }}" alt="">
						</span>
                    <span class="user-name">Ross C. Lopez</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
                    <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
                    <a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a>
                    <a class="dropdown-item" href="login.html"><i class="dw dw-logout"></i> Log Out</a>
                </div>
            </div>
        </div>
        <div class="github-link">
            <a href="https://github.com/dropways/deskapp" target="_blank"><img src="{{ asset('js/vendors/images/github.svg') }}" alt=""></a>
        </div>
    </div>
</div>

<div class="right-sidebar">
    <div class="sidebar-title">
        <h3 class="weight-600 font-16 text-blue">
            Layout Settings
            <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
        </h3>
        <div class="close-sidebar" data-toggle="right-sidebar-close">
            <i class="icon-copy ion-close-round"></i>
        </div>
    </div>
    <div class="right-sidebar-body customscroll">
        <div class="right-sidebar-body-content">
            <h4 class="weight-600 font-18 pb-10">Header Background</h4>
            <div class="sidebar-btn-group pb-30 mb-10">
                <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
                <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
            </div>

            <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
            <div class="sidebar-btn-group pb-30 mb-10">
                <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
                <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
            </div>

            <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
            <div class="sidebar-radio-group pb-10 mb-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
                    <label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
                    <label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
                    <label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
                </div>
            </div>

            <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
            <div class="sidebar-radio-group pb-30 mb-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
                    <label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
                    <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
                    <label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
                    <label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
                    <label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
                    <label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
                </div>
            </div>

            <div class="reset-options pt-30 text-center">
                <button class="btn btn-danger" id="reset-settings">Reset Settings</button>
            </div>
        </div>
    </div>
</div>

<x-left-side-bar />

<div class="mobile-menu-overlay"></div>

<div class="main-container">
    <div class="pd-ltr-20">
        <div class="row">

        </div>
        <div class="row">
            <div class="col-xl-4 mb-30">
                <div class="row">
                    <div class="col-xl-6 mb-30">
                        <div class="card-box height-100-p widget-style1">
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="progress-data">
                                    <div id="chart"></div>
                                </div>
                                <div class="widget-data">
                                    <div class="weight-600 font-14">EFFORT</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 mb-30">
                        <div class="card-box height-100-p widget-style1">
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="progress-data">
                                    <div id="chart2"></div>
                                </div>
                                <div class="widget-data">
                                    <div class="weight-600 font-14">TASK</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-11 bg-white card-box mb-30 ml-auto mr-auto">
                        <h4 class="h4 text-blue pt-10">EFFORT</h4>
                        <div id="chart5"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-11 bg-white card-box mb-30 ml-auto mr-auto">
                        <h4 class="h4 text-blue pt-10">TASK</h4>
                        <div id="chart55"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 mb-30 ">
                <div class="row justify-content-between pl-2 pr-2">
                    <div class="col-xl-4">
                        <div class="card-box overflow-auto pl-0 pr-0">
                            <h2 class="h4 pl-10 pt-10 pb-10 bg-light-green m-0" >TO DO</h2>
                            <div class="overflow-auto tv-task-col pt-2 pb-3">
                                <div class="card-box p-2 m-2 h-task-item" >
                                    <a href="">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                            <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                        </div>
                                        <h4 class="h5">Task [] Change size at btn</h4>
                                    </a>
                                </div>
                                <div class="card-box p-2 m-2 h-task-item" >
                                    <a href="">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                            <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                        </div>
                                        <h4 class="h5">Task [] Change size at btn</h4>
                                    </a>
                                </div>
                                <div class="card-box p-2 m-2 h-task-item" >
                                    <a href="">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                            <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                        </div>
                                        <h4 class="h5">Task [] Change size at btn</h4>
                                    </a>
                                </div>
                                <div class="card-box p-2 m-2 h-task-item" >
                                    <a href="">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                            <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                        </div>
                                        <h4 class="h5">Task [] Change size at btn</h4>
                                    </a>
                                </div>
                                <div class="card-box p-2 m-2 h-task-item" >
                                    <a href="">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                            <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                        </div>
                                        <h4 class="h5">Task [] Change size at btn</h4>
                                    </a>
                                </div>
                                <div class="card-box p-2 m-2 h-task-item" >
                                    <a href="">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                            <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                        </div>
                                        <h4 class="h5">Task [] Change size at btn</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card-box overflow-auto pl-0 pr-0">
                            <h2 class="h4 pl-10 pt-10 pb-10 bg-light-green m-0">PROCESS</h2>
                            <div class="overflow-auto tv-task-col pt-2 pb-3">
                                <div class="card-box p-2 m-2 h-task-item" >
                                    <a href="">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                            <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                        </div>
                                        <h4 class="h5">Task [] Change size at btn</h4>
                                    </a>
                                </div>
                                <div class="card-box p-2 m-2 h-task-item" >
                                    <a href="">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                            <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                        </div>
                                        <h4 class="h5">Task [] Change size at btn</h4>
                                    </a>
                                </div>
                                <div class="card-box p-2 m-2 h-task-item" >
                                    <a href="">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                            <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                        </div>
                                        <h4 class="h5">Task [] Change size at btn</h4>
                                    </a>
                                </div>
                                <div class="card-box p-2 m-2 h-task-item" >
                                    <a href="">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                            <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                        </div>
                                        <h4 class="h5">Task [] Change size at btn</h4>
                                    </a>
                                </div>
                                <div class="card-box p-2 m-2 h-task-item" >
                                    <a href="">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                            <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                        </div>
                                        <h4 class="h5">Task [] Change size at btn</h4>
                                    </a>
                                </div>
                                <div class="card-box p-2 m-2 h-task-item" >
                                    <a href="">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                            <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                        </div>
                                        <h4 class="h5">Task [] Change size at btn</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card-box overflow-auto pl-0 pr-0">
                            <h2 class="h4 pl-10 pt-10 pb-10 bg-light-green m-0">DONE</h2>
                            <div class="overflow-auto tv-task-col pt-2 pb-3">
                                <div class="card-box p-2 m-2 h-task-item" >
                                    <a href="">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                            <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                        </div>
                                        <h4 class="h5">Task [] Change size at btn</h4>
                                    </a>
                                </div>
                                <div class="card-box p-2 m-2 h-task-item" >
                                    <a href="">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                            <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                        </div>
                                        <h4 class="h5">Task [] Change size at btn</h4>
                                    </a>
                                </div>
                                <div class="card-box p-2 m-2 h-task-item" >
                                    <a href="">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                            <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                        </div>
                                        <h4 class="h5">Task [] Change size at btn</h4>
                                    </a>
                                </div>
                                <div class="card-box p-2 m-2 h-task-item" >
                                    <a href="">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                            <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                        </div>
                                        <h4 class="h5">Task [] Change size at btn</h4>
                                    </a>
                                </div>
                                <div class="card-box p-2 m-2 h-task-item" >
                                    <a href="">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                            <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                        </div>
                                        <h4 class="h5">Task [] Change size at btn</h4>
                                    </a>
                                </div>
                                <div class="card-box p-2 m-2 h-task-item" >
                                    <a href="">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="bg-warning pt-1 pb-1 pl-3 pr-3 rounded"></span>
                                            <span class="text-dark"> <i class="icon-copy dw dw-calendar-6"></i> 2021</span>
                                        </div>
                                        <h4 class="h5">Task [] Change size at btn</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
            DeskApp
        </div>
    </div>
</div>

<x-script-common />
</body>
</html>
