<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from techzaa.getappui.com/velonic/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Nov 2023 12:11:00 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Dashboard | Velonic - Bootstrap 5 Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully responsive admin theme which can be used to build CRM, CMS,ERP etc." name="description" />
    <meta content="Techzaa" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend/images/favicon.ico')}}">
    <!-- Daterangepicker css -->
    <link rel="stylesheet" href="{{asset('backend/vendor/daterangepicker/daterangepicker.css')}}">
    <!-- Vector Map css -->
    <link rel="stylesheet" href="{{asset('backend/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}">
    <!-- Theme Config Js -->
    <script src="{{asset('backend/js/config.js')}}"></script>
    <!-- App css -->
    <link href="{{asset('backend/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />
    <!-- Icons css -->
    <link href="{{asset('backend/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">

        
        <!-- ========== Topbar Start ========== -->
        <div class="navbar-custom">
            <div class="topbar container-fluid">
                <div class="d-flex align-items-center gap-1">

                    <!-- Topbar Brand Logo -->
                    <div class="logo-topbar">
                        <!-- Logo light -->
                        <a href="index.html" class="logo-light">
                            <span class="logo-lg">
                                <img src="{{asset('backend/images/logo.png')}}" alt="logo">
                            </span>
                            <span class="logo-sm">
                                <img src="{{asset('backend/images/logo-sm.png')}}" alt="small logo">
                            </span>
                        </a>

                        <!-- Logo Dark -->
                        <a href="index.html" class="logo-dark">
                            <span class="logo-lg">
                                <img src="{{asset('backend/images/logo-dark.png')}}" alt="dark logo">
                            </span>
                            <span class="logo-sm">
                                <img src="{{asset('backend/images/logo-sm.png')}}" alt="small logo">
                            </span>
                        </a>
                    </div>

                    <!-- Sidebar Menu Toggle Button -->
                    <button class="button-toggle-menu">
                        <i class="ri-menu-line"></i>
                    </button>

                    <!-- Horizontal Menu Toggle Button -->
                    <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>

                    <!-- Topbar Search Form -->
                    <div class="app-search d-none d-lg-block">
                        <form>
                            <div class="input-group">
                                <input type="search" class="form-control" placeholder="Search...">
                                <span class="ri-search-line search-icon text-muted"></span>
                            </div>
                        </form>
                    </div>
                </div>

                <ul class="topbar-menu d-flex align-items-center gap-3">
                    <li class="dropdown d-lg-none">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <i class="ri-search-line fs-22"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                            <form class="p-3">
                                <input type="search" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                            </form>
                        </div>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <img src="{{asset('backend/images/flags/us.jpg')}}" alt="user-image" class="me-0 me-sm-1" height="12">
                            <span class="align-middle d-none d-lg-inline-block">English</span> <i
                                class="ri-arrow-down-s-line d-none d-sm-inline-block align-middle"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="{{asset('backend/images/flags/germany.jpg')}}" alt="user-image" class="me-1" height="12"> <span
                                    class="align-middle">German</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="{{asset('backend/images/flags/italy.jpg')}}" alt="user-image" class="me-1" height="12"> <span
                                    class="align-middle">Italian</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="{{asset('backend/images/flags/spain.jpg')}}" alt="user-image" class="me-1" height="12"> <span
                                    class="align-middle">Spanish</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="{{asset('backend/images/flags/russia.jpg')}}" alt="user-image" class="me-1" height="12"> <span
                                    class="align-middle">Russian</span>
                            </a>

                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <i class="ri-mail-line fs-22"></i>
                            <span class="noti-icon-badge badge text-bg-purple">4</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
                            <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0 fs-16 fw-semibold"> Messages</h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="javascript: void(0);" class="text-dark text-decoration-underline">
                                            <small>Clear All</small>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div style="max-height: 300px;" data-simplebar>

                                <!-- item-->
                                <a href="javascript:void(0);"
                                    class="dropdown-item p-0 notify-item read-noti card m-0 shadow-none">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="notify-icon">
                                                    <img src="{{asset('backend/images/users/avatar-1.jpg')}}" class="img-fluid rounded-circle"
                                                        alt="" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <h5 class="noti-item-title fw-semibold fs-14">Cristina Pride <small
                                                        class="fw-normal text-muted float-end ms-1">1 day ago</small></h5>
                                                <small class="noti-item-subtitle text-muted">Hi, How are you? What about our
                                                    next meeting</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);"
                                    class="dropdown-item p-0 notify-item read-noti card m-0 shadow-none">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="notify-icon">
                                                    <img src="{{asset('backend/images/users/avatar-2.jpg')}}" class="img-fluid rounded-circle"
                                                        alt="" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <h5 class="noti-item-title fw-semibold fs-14">Sam Garret <small
                                                        class="fw-normal text-muted float-end ms-1">2 day ago</small></h5>
                                                <small class="noti-item-subtitle text-muted">Yeah everything is fine</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);"
                                    class="dropdown-item p-0 notify-item read-noti card m-0 shadow-none">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="notify-icon">
                                                    <img src="{{asset('backend/images/users/avatar-3.jpg')}}" class="img-fluid rounded-circle"
                                                        alt="" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <h5 class="noti-item-title fw-semibold fs-14">Karen Robinson <small
                                                        class="fw-normal text-muted float-end ms-1">2 day ago</small></h5>
                                                <small class="noti-item-subtitle text-muted">Wow that's great</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);"
                                    class="dropdown-item p-0 notify-item read-noti card m-0 shadow-none">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="notify-icon">
                                                    <img src="{{asset('backend/images/users/avatar-4.jpg')}}" class="img-fluid rounded-circle"
                                                        alt="" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <h5 class="noti-item-title fw-semibold fs-14">Sherry Marshall <small
                                                        class="fw-normal text-muted float-end ms-1">3 day ago</small></h5>
                                                <small class="noti-item-subtitle text-muted">Hi, How are you? What about our
                                                    next meeting</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);"
                                    class="dropdown-item p-0 notify-item read-noti card m-0 shadow-none">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="notify-icon">
                                                    <img src="{{asset('backend/images/users/avatar-5.jpg')}}" class="img-fluid rounded-circle"
                                                        alt="" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <h5 class="noti-item-title fw-semibold fs-14">Shawn Millard <small
                                                        class="fw-normal text-muted float-end ms-1">4 day ago</small></h5>
                                                <small class="noti-item-subtitle text-muted">Yeah everything is fine</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <!-- All-->
                            <a href="javascript:void(0);"
                                class="dropdown-item text-center text-primary text-decoration-underline fw-bold notify-item border-top border-light py-2">
                                View All
                            </a>

                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <i class="ri-notification-3-line fs-22"></i>
                            <span class="noti-icon-badge badge text-bg-pink">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
                            <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0 fs-16 fw-semibold"> Notification</h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="javascript: void(0);" class="text-dark text-decoration-underline">
                                            <small>Clear All</small>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div style="max-height: 300px;" data-simplebar>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-primary-subtle">
                                        <i class="mdi mdi-comment-account-outline text-primary"></i>
                                    </div>
                                    <p class="notify-details">Caleb Flakelar commented on Admin
                                        <small class="noti-time">1 min ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-warning-subtle">
                                        <i class="mdi mdi-account-plus text-warning"></i>
                                    </div>
                                    <p class="notify-details">New user registered.
                                        <small class="noti-time">5 hours ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-danger-subtle">
                                        <i class="mdi mdi-heart text-danger"></i>
                                    </div>
                                    <p class="notify-details">Carlos Crouch liked
                                        <small class="noti-time">3 days ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-pink-subtle">
                                        <i class="mdi mdi-comment-account-outline text-pink"></i>
                                    </div>
                                    <p class="notify-details">Caleb Flakelar commented on Admi
                                        <small class="noti-time">4 days ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-purple-subtle">
                                        <i class="mdi mdi-account-plus text-purple"></i>
                                    </div>
                                    <p class="notify-details">New user registered.
                                        <small class="noti-time">7 days ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-success-subtle">
                                        <i class="mdi mdi-heart text-success"></i>
                                    </div>
                                    <p class="notify-details">Carlos Crouch liked <b>Admin</b>.
                                        <small class="noti-time">Carlos Crouch liked</small>
                                    </p>
                                </a>
                            </div>

                            <!-- All-->
                            <a href="javascript:void(0);"
                                class="dropdown-item text-center text-primary text-decoration-underline fw-bold notify-item border-top border-light py-2">
                                View All
                            </a>

                        </div>
                    </li>

                    <li class="d-none d-sm-inline-block">
                        <a class="nav-link" data-bs-toggle="offcanvas" href="#theme-settings-offcanvas">
                            <i class="ri-settings-3-line fs-22"></i>
                        </a>
                    </li>

                    <li class="d-none d-sm-inline-block">
                        <div class="nav-link" id="light-dark-mode">
                            <i class="ri-moon-line fs-22"></i>
                        </div>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none nav-user" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <span class="account-user-avatar">
                                <img src="{{asset('backend/images/users/avatar-1.jpg')}}" alt="user-image" width="32" class="rounded-circle">
                            </span>
                            <span class="d-lg-block d-none">
                                <h5 class="my-0 fw-normal">Thomson <i
                                        class="ri-arrow-down-s-line d-none d-sm-inline-block align-middle"></i></h5>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="pages-profile.html" class="dropdown-item">
                                <i class="ri-account-circle-line fs-18 align-middle me-1"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="pages-profile.html" class="dropdown-item">
                                <i class="ri-settings-4-line fs-18 align-middle me-1"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="pages-faq.html" class="dropdown-item">
                                <i class="ri-customer-service-2-line fs-18 align-middle me-1"></i>
                                <span>Support</span>
                            </a>

                            <!-- item-->
                            <a href="auth-lock-screen.html" class="dropdown-item">
                                <i class="ri-lock-password-line fs-18 align-middle me-1"></i>
                                <span>Lock Screen</span>
                            </a>

                            <!-- item-->
                            <a href="auth-logout-2.html" class="dropdown-item">
                                <i class="ri-logout-box-line fs-18 align-middle me-1"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ========== Topbar End ========== -->
        

        <!-- ========== Left Sidebar Start ========== -->
        @include('backoffice.partials.leftside-menu')
        <!-- ========== Left Sidebar End ========== -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Velonic</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                        <li class="breadcrumb-item active">Welcome!</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Welcome!</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xxl-3 col-sm-6">
                            <div class="card widget-flat text-bg-pink">
                                <div class="card-body">
                                    <div class="float-end">
                                        <i class="ri-eye-line widget-icon"></i>
                                    </div>
                                    <h6 class="text-uppercase mt-0" title="Customers">Daily Visits</h6>
                                    <h2 class="my-2">8,652</h2>
                                    <p class="mb-0">
                                        <span class="badge bg-white bg-opacity-10 me-1">2.97%</span>
                                        <span class="text-nowrap">Since last month</span>
                                    </p>
                                </div>
                            </div>
                        </div> <!-- end col-->

                        <div class="col-xxl-3 col-sm-6">
                            <div class="card widget-flat text-bg-purple">
                                <div class="card-body">
                                    <div class="float-end">
                                        <i class="ri-wallet-2-line widget-icon"></i>
                                    </div>
                                    <h6 class="text-uppercase mt-0" title="Customers">Revenue</h6>
                                    <h2 class="my-2">$9,254.62</h2>
                                    <p class="mb-0">
                                        <span class="badge bg-white bg-opacity-10 me-1">18.25%</span>
                                        <span class="text-nowrap">Since last month</span>
                                    </p>
                                </div>
                            </div>
                        </div> <!-- end col-->

                        <div class="col-xxl-3 col-sm-6">
                            <div class="card widget-flat text-bg-info">
                                <div class="card-body">
                                    <div class="float-end">
                                        <i class="ri-shopping-basket-line widget-icon"></i>
                                    </div>
                                    <h6 class="text-uppercase mt-0" title="Customers">Orders</h6>
                                    <h2 class="my-2">753</h2>
                                    <p class="mb-0">
                                        <span class="badge bg-white bg-opacity-25 me-1">-5.75%</span>
                                        <span class="text-nowrap">Since last month</span>
                                    </p>
                                </div>
                            </div>
                        </div> <!-- end col-->

                        <div class="col-xxl-3 col-sm-6">
                            <div class="card widget-flat text-bg-primary">
                                <div class="card-body">
                                    <div class="float-end">
                                        <i class="ri-group-2-line widget-icon"></i>
                                    </div>
                                    <h6 class="text-uppercase mt-0" title="Customers">Users</h6>
                                    <h2 class="my-2">63,154</h2>
                                    <p class="mb-0">
                                        <span class="badge bg-white bg-opacity-10 me-1">8.21%</span>
                                        <span class="text-nowrap">Since last month</span>
                                    </p>
                                </div>
                            </div>
                        </div> <!-- end col-->
                    </div>

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-widgets">
                                        <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line"></i></a>
                                        <a data-bs-toggle="collapse" href="#weeklysales-collapse" role="button" aria-expanded="false" aria-controls="weeklysales-collapse"><i class="ri-subtract-line"></i></a>
                                        <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                                    </div>
                                    <h5 class="header-title mb-0">Weekly Sales Report</h5>

                                    <div id="weeklysales-collapse" class="collapse pt-3 show">
                                        <div dir="ltr">
                                            <div id="revenue-chart" class="apex-charts" data-colors="#3bc0c3,#1a2942,#d1d7d973"></div>
                                        </div>

                                        <div class="row text-center">
                                            <div class="col">
                                                <p class="text-muted mt-3">Current Week</p>
                                                <h3 class=" mb-0">
                                                    <span>$506.54</span>
                                                </h3>
                                            </div>
                                            <div class="col">
                                                <p class="text-muted mt-3">Previous Week</p>
                                                <h3 class=" mb-0">
                                                    <span>$305.25 </span>
                                                </h3>
                                            </div>
                                            <div class="col">
                                                <p class="text-muted mt-3">Conversation</p>
                                                <h3 class=" mb-0">
                                                    <span>3.27%</span>
                                                </h3>
                                            </div>
                                            <div class="col">
                                                <p class="text-muted mt-3">Customers</p>
                                                <h3 class=" mb-0">
                                                    <span>3k</span>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-widgets">
                                        <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line"></i></a>
                                        <a data-bs-toggle="collapse" href="#yearly-sales-collapse" role="button" aria-expanded="false" aria-controls="yearly-sales-collapse"><i class="ri-subtract-line"></i></a>
                                        <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                                    </div>
                                    <h5 class="header-title mb-0">Yearly Sales Report</h5>

                                    <div id="yearly-sales-collapse" class="collapse pt-3 show">
                                        <div dir="ltr">
                                            <div id="yearly-sales-chart" class="apex-charts" data-colors="#3bc0c3,#1a2942,#d1d7d973"></div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col">
                                                <p class="text-muted mt-3 mb-2">Quarter 1</p>
                                                <h4 class="mb-0">$56.2k</h4>
                                            </div>
                                            <div class="col">
                                                <p class="text-muted mt-3 mb-2">Quarter 2</p>
                                                <h4 class="mb-0">$42.5k</h4>
                                            </div>
                                            <div class="col">
                                                <p class="text-muted mt-3 mb-2">All Time</p>
                                                <h4 class="mb-0">$102.03k</h4>
                                            </div>
                                        </div>
                                    </div>

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->

                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h4 class="fs-22 fw-semibold">69.25%</h4>
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> US Dollar Share</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div id="us-share-chart" class="apex-charts" dir="ltr"></div>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div> <!-- end card-->
                        </div> <!-- end col-->

                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-4">
                            <!-- Chat-->
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="p-3">
                                        <div class="card-widgets">
                                            <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line"></i></a>
                                            <a data-bs-toggle="collapse" href="#yearly-sales-collapse" role="button" aria-expanded="false" aria-controls="yearly-sales-collapse"><i class="ri-subtract-line"></i></a>
                                            <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                                        </div>
                                        <h5 class="header-title mb-0">Chat</h5>
                                    </div>

                                    <div id="yearly-sales-collapse" class="collapse show">
                                        <div class="chat-conversation mt-2">
                                            <div class="card-body py-0 mb-3" data-simplebar style="height: 322px;">
                                                <ul class="conversation-list">
                                                    <li class="clearfix">
                                                        <div class="chat-avatar">
                                                            <img src="{{asset('backend/images/users/avatar-5.jpg')}}" alt="male">
                                                            <i>10:00</i>
                                                        </div>
                                                        <div class="conversation-text">
                                                            <div class="ctext-wrap">
                                                                <i>Geneva</i>
                                                                <p>
                                                                    Hello!
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix odd">
                                                        <div class="chat-avatar">
                                                            <img src="{{asset('backend/images/users/avatar-1.jpg')}}" alt="Female">
                                                            <i>10:01</i>
                                                        </div>
                                                        <div class="conversation-text">
                                                            <div class="ctext-wrap">
                                                                <i>Thomson</i>
                                                                <p>
                                                                    Hi, How are you? What about our next meeting?
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <div class="chat-avatar">
                                                            <img src="{{asset('backend/images/users/avatar-5.jpg')}}" alt="male">
                                                            <i>10:01</i>
                                                        </div>
                                                        <div class="conversation-text">
                                                            <div class="ctext-wrap">
                                                                <i>Geneva</i>
                                                                <p>
                                                                    Yeah everything is fine
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix odd">
                                                        <div class="chat-avatar">
                                                            <img src="{{asset('backend/images/users/avatar-1.jpg')}}" alt="male">
                                                            <i>10:02</i>
                                                        </div>
                                                        <div class="conversation-text">
                                                            <div class="ctext-wrap">
                                                                <i>Thomson</i>
                                                                <p>
                                                                    Wow that's great
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-body pt-0">
                                                <form class="needs-validation" novalidate name="chat-form" id="chat-form">
                                                    <div class="row align-items-start">
                                                        <div class="col">
                                                            <input type="text" class="form-control chat-input" placeholder="Enter your text" required>
                                                            <div class="invalid-feedback">
                                                                Please enter your messsage
                                                            </div>
                                                        </div>
                                                        <div class="col-auto d-grid">
                                                            <button type="submit" class="btn btn-danger chat-send waves-effect waves-light">Send</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
    
                                        </div> <!-- end .chat-conversation-->
                                    </div>
                                </div>
                                
                            </div> <!-- end card-->
                        </div> <!-- end col-->

                        <div class="col-xl-8">
                            <!-- Todo-->
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="p-3">
                                        <div class="card-widgets">
                                            <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line"></i></a>
                                            <a data-bs-toggle="collapse" href="#yearly-sales-collapse" role="button" aria-expanded="false" aria-controls="yearly-sales-collapse"><i class="ri-subtract-line"></i></a>
                                            <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                                        </div>
                                        <h5 class="header-title mb-0">Projects</h5>
                                    </div>

                                    <div id="yearly-sales-collapse" class="collapse show">

                                        <div class="table-responsive">
                                            <table class="table table-nowrap table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Project Name</th>
                                                        <th>Start Date</th>
                                                        <th>Due Date</th>
                                                        <th>Status</th>
                                                        <th>Assign</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Velonic Admin v1</td>
                                                        <td>01/01/2015</td>
                                                        <td>26/04/2015</td>
                                                        <td><span class="badge bg-info-subtle text-info">Released</span></td>
                                                        <td>Techzaa Studio</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Velonic Frontend v1</td>
                                                        <td>01/01/2015</td>
                                                        <td>26/04/2015</td>
                                                        <td><span class="badge bg-info-subtle text-info">Released</span></td>
                                                        <td>Techzaa Studio</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Velonic Admin v1.1</td>
                                                        <td>01/05/2015</td>
                                                        <td>10/05/2015</td>
                                                        <td><span class="badge bg-pink-subtle text-pink">Pending</span></td>
                                                        <td>Techzaa Studio</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Velonic Frontend v1.1</td>
                                                        <td>01/01/2015</td>
                                                        <td>31/05/2015</td>
                                                        <td><span class="badge bg-purple-subtle text-purple">Work in Progress</span></td>
                                                        <td>Techzaa Studio</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>Velonic Admin v1.3</td>
                                                        <td>01/01/2015</td>
                                                        <td>31/05/2015</td>
                                                        <td><span class="badge bg-warning-subtle text-warning">Coming soon</span></td>
                                                        <td>Techzaa Studio</td>
                                                    </tr>

                                                    <tr>
                                                        <td>6</td>
                                                        <td>Velonic Admin v1.3</td>
                                                        <td>01/01/2015</td>
                                                        <td>31/05/2015</td>
                                                        <td><span class="badge bg-primary-subtle text-primary">Coming soon</span></td>
                                                        <td>Techzaa Studio</td>
                                                    </tr>

                                                    <tr>
                                                        <td>7</td>
                                                        <td>Velonic Admin v1.3</td>
                                                        <td>01/01/2015</td>
                                                        <td>31/05/2015</td>
                                                        <td><span class="badge bg-danger-subtle text-danger">Cool</span></td>
                                                        <td>Techzaa Studio</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>        
                                    </div>
                                </div>                           
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->

                </div>
                <!-- container -->

            </div>
            <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center">
                            &copy; <script>document.write(new Date().getFullYear())</script><span>  ENT-IST by <b>GROUPE XXXX</b>All right reserved</span>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="theme-settings-offcanvas">
        <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
            <h5 class="text-white m-0">Theme Settings</h5>
            <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body p-0">
            <div data-simplebar class="h-100">
                <div class="p-3">
                    <h5 class="mb-3 fs-16 fw-bold">Color Scheme</h5>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check form-switch card-switch mb-1">
                                <input class="form-check-input" type="checkbox" name="data-bs-theme" id="layout-color-light" value="light">
                                <label class="form-check-label" for="layout-color-light">
                                    <img src="{{asset('backend/images/layouts/light.png')}}" alt="" class="img-fluid">
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                        </div>

                        <div class="col-4">
                            <div class="form-check form-switch card-switch mb-1">
                                <input class="form-check-input" type="checkbox" name="data-bs-theme" id="layout-color-dark" value="dark">
                                <label class="form-check-label" for="layout-color-dark">
                                    <img src="{{asset('backend/images/layouts/dark.png')}}" alt="" class="img-fluid">
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                        </div>
                    </div>

                    <div id="layout-width">
                        <h5 class="my-3 fs-16 fw-bold">Layout Mode</h5>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-layout-mode" id="layout-mode-fluid" value="fluid">
                                    <label class="form-check-label" for="layout-mode-fluid">
                                        <img src="{{asset('backend/images/layouts/light.png')}}" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Fluid</h5>
                            </div>

                            <div class="col-4">
                                <div id="layout-boxed">
                                    <div class="form-check form-switch card-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="data-layout-mode" id="layout-mode-boxed" value="boxed">
                                        <label class="form-check-label" for="layout-mode-boxed">
                                            <img src="{{asset('backend/images/layouts/boxed.png')}}" alt="" class="img-fluid">
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Boxed</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5 class="my-3 fs-16 fw-bold">Topbar Color</h5>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check form-switch card-switch mb-1">
                                <input class="form-check-input" type="checkbox" name="data-topbar-color" id="topbar-color-light" value="light">
                                <label class="form-check-label" for="topbar-color-light">
                                    <img src="{{asset('backend/images/layouts/light.png')}}" alt="" class="img-fluid">
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                        </div>

                        <div class="col-4">
                            <div class="form-check form-switch card-switch mb-1">
                                <input class="form-check-input" type="checkbox" name="data-topbar-color" id="topbar-color-dark" value="dark">
                                <label class="form-check-label" for="topbar-color-dark">
                                    <img src="{{asset('backend/images/layouts/topbar-dark.png')}}" alt="" class="img-fluid">
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                        </div>
                    </div>

                    <div>
                        <h5 class="my-3 fs-16 fw-bold">Menu Color</h5>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-menu-color" id="leftbar-color-light" value="light">
                                    <label class="form-check-label" for="leftbar-color-light">
                                        <img src="{{asset('backend/images/layouts/sidebar-light.png')}}" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-menu-color" id="leftbar-color-dark" value="dark">
                                    <label class="form-check-label" for="leftbar-color-dark">
                                        <img src="{{asset('backend/images/layouts/light.png')}}" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                            </div>
                        </div>
                    </div>

                    <div id="sidebar-size">
                        <h5 class="my-3 fs-16 fw-bold">Sidebar Size</h5>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-default" value="default">
                                    <label class="form-check-label" for="leftbar-size-default">
                                        <img src="{{asset('backend/images/layouts/light.png')}}" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Default</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-compact" value="compact">
                                    <label class="form-check-label" for="leftbar-size-compact">
                                        <img src="{{asset('backend/images/layouts/compact.png')}}" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Compact</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-small" value="condensed">
                                    <label class="form-check-label" for="leftbar-size-small">
                                        <img src="{{asset('backend/images/layouts/sm.png')}}" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Condensed</h5>
                            </div>


                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-full" value="full">
                                    <label class="form-check-label" for="leftbar-size-full">
                                        <img src="{{asset('backend/images/layouts/full.png')}}" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Full Layout</h5>
                            </div>
                        </div>
                    </div>

                    <div id="layout-position">
                        <h5 class="my-3 fs-16 fw-bold">Layout Position</h5>

                        <div class="btn-group checkbox" role="group">
                            <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed" value="fixed">
                            <label class="btn btn-soft-primary w-sm" for="layout-position-fixed">Fixed</label>

                            <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-scrollable" value="scrollable">
                            <label class="btn btn-soft-primary w-sm ms-0" for="layout-position-scrollable">Scrollable</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas-footer border-top p-3 text-center">
            <div class="row">
                <div class="col-6">
                    <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
                </div>
                <div class="col-6">
                    <a href="https://1.envato.market/velonic" target="_blank" role="button" class="btn btn-primary w-100">Buy Now</a>
                </div>
            </div>
        </div>
    </div>        
    
    <!-- Vendor js -->
    <script src="{{asset('backend/js/vendor.min.js')}}"></script>

    <!-- Daterangepicker js -->
    <script src="{{asset('backend/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('backend/vendor/daterangepicker/daterangepicker.js')}}"></script>
    
    <!-- Apex Charts js -->
    <script src="{{asset('backend/vendor/apexcharts/apexcharts.min.js')}}"></script>

    <!-- Vector Map js -->
    <script src="{{asset('backend/vendor/admin-resources/jquery.vectormap/jquery-daterangepicker-1.2.2.min.js')}}"></script>
    <script src="{{asset('backend/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js')}}"></script>

    <!-- Dashboard App js -->
    <script src="{{asset('backend/js/pages/dashboard.js')}}"></script>


    <!-- App js -->
    <script src="{{asset('backend/js/app.min.js')}}"></script>

</body>

<!-- Mirrored from techzaa.getappui.com/velonic/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Nov 2023 13:00:15 GMT -->
</html> 
