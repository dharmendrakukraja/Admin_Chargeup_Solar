<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Dashboard - HRMS admin template</title>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="assets/css/line-awesome.min.css">

		<!-- Chart CSS -->
		<link rel="stylesheet" href="assets/plugins/morris/morris.css">

		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">

    </head>

    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">

			<!-- Header -->
            <div class="header">

                <!-- Logo -->
                <div class="header-left">
                    <a href="index" class="logo">
                        <img src="assets/img/logo.png" width="40" height="40" alt="">
                    </a>
                </div>
                <!-- /Logo -->

                <a id="toggle_btn" href="javascript:void(0);">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>

                <!-- Header Title -->
                <div class="page-title-box">
                    <h3>Dreamguy's Technologies</h3>
                </div>
                <!-- /Header Title -->

                <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

                <!-- Header Menu -->
                <ul class="nav user-menu">

                    <!-- Search -->
                    <li class="nav-item">
                        <div class="top-nav-search">
                            <a href="javascript:void(0);" class="responsive-search">
                                <i class="fa fa-search"></i>
                           </a>
                            <form action="search">
                                <input class="form-control" type="text" placeholder="Search here">
                                <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </li>
                    <!-- /Search -->

                    <!-- Flag -->
                    <li class="nav-item dropdown has-arrow flag-nav">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button">
                            <img src="assets/img/flags/us.png" alt="" height="20"> <span>English</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="assets/img/flags/us.png" alt="" height="16"> English
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="assets/img/flags/fr.png" alt="" height="16"> French
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="assets/img/flags/es.png" alt="" height="16"> Spanish
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="assets/img/flags/de.png" alt="" height="16"> German
                            </a>
                        </div>
                    </li>
                    <!-- /Flag -->

                    <!-- Notifications -->
                    <li class="nav-item dropdown">
                        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                            <i class="fa fa-bell-o"></i> <span class="badge rounded-pill">3</span>
                        </a>
                        <div class="dropdown-menu notifications">
                            <div class="topnav-dropdown-header">
                                <span class="notification-title">Notifications</span>
                                <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                            </div>
                            <div class="noti-content">
                                <ul class="notification-list">
                                    <li class="notification-message">
                                        <a href="activities">
                                            <div class="media d-flex">
                                                <span class="avatar flex-shrink-0">
                                                    <img alt="" src="assets/img/profiles/avatar-02.jpg">
                                                </span>
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
                                                    <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="activities">
                                            <div class="media d-flex">
                                                <span class="avatar flex-shrink-0">
                                                    <img alt="" src="assets/img/profiles/avatar-03.jpg">
                                                </span>
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details"><span class="noti-title">Tarah Shropshire</span> changed the task name <span class="noti-title">Appointment booking with payment gateway</span></p>
                                                    <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="activities">
                                            <div class="media d-flex">
                                                <span class="avatar flex-shrink-0">
                                                    <img alt="" src="assets/img/profiles/avatar-06.jpg">
                                                </span>
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details"><span class="noti-title">Misty Tison</span> added <span class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span> to project <span class="noti-title">Doctor available module</span></p>
                                                    <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="activities">
                                            <div class="media d-flex">
                                                <span class="avatar flex-shrink-0">
                                                    <img alt="" src="assets/img/profiles/avatar-17.jpg">
                                                </span>
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details"><span class="noti-title">Rolland Webber</span> completed task <span class="noti-title">Patient and Doctor video conferencing</span></p>
                                                    <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="activities">
                                            <div class="media d-flex">
                                                <span class="avatar flex-shrink-0">
                                                    <img alt="" src="assets/img/profiles/avatar-13.jpg">
                                                </span>
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> added new task <span class="noti-title">Private chat module</span></p>
                                                    <p class="noti-time"><span class="notification-time">2 days ago</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="topnav-dropdown-footer">
                                <a href="activities">View all Notifications</a>
                            </div>
                        </div>
                    </li>
                    <!-- /Notifications -->

                    <!-- Message Notifications -->
                    <li class="nav-item dropdown">
                        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                            <i class="fa fa-comment-o"></i> <span class="badge rounded-pill">8</span>
                        </a>
                        <div class="dropdown-menu notifications">
                            <div class="topnav-dropdown-header">
                                <span class="notification-title">Messages</span>
                                <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                            </div>
                            <div class="noti-content">
                                <ul class="notification-list">
                                    <li class="notification-message">
                                        <a href="chat">
                                            <div class="list-item">
                                                <div class="list-left">
                                                    <span class="avatar">
                                                        <img alt="" src="assets/img/profiles/avatar-09.jpg">
                                                    </span>
                                                </div>
                                                <div class="list-body">
                                                    <span class="message-author">Richard Miles </span>
                                                    <span class="message-time">12:28 AM</span>
                                                    <div class="clearfix"></div>
                                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="chat">
                                            <div class="list-item">
                                                <div class="list-left">
                                                    <span class="avatar">
                                                        <img alt="" src="assets/img/profiles/avatar-02.jpg">
                                                    </span>
                                                </div>
                                                <div class="list-body">
                                                    <span class="message-author">John Doe</span>
                                                    <span class="message-time">6 Mar</span>
                                                    <div class="clearfix"></div>
                                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="chat">
                                            <div class="list-item">
                                                <div class="list-left">
                                                    <span class="avatar">
                                                        <img alt="" src="assets/img/profiles/avatar-03.jpg">
                                                    </span>
                                                </div>
                                                <div class="list-body">
                                                    <span class="message-author"> Tarah Shropshire </span>
                                                    <span class="message-time">5 Mar</span>
                                                    <div class="clearfix"></div>
                                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="chat">
                                            <div class="list-item">
                                                <div class="list-left">
                                                    <span class="avatar">
                                                        <img alt="" src="assets/img/profiles/avatar-05.jpg">
                                                    </span>
                                                </div>
                                                <div class="list-body">
                                                    <span class="message-author">Mike Litorus</span>
                                                    <span class="message-time">3 Mar</span>
                                                    <div class="clearfix"></div>
                                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="chat">
                                            <div class="list-item">
                                                <div class="list-left">
                                                    <span class="avatar">
                                                        <img alt="" src="assets/img/profiles/avatar-08.jpg">
                                                    </span>
                                                </div>
                                                <div class="list-body">
                                                    <span class="message-author"> Catherine Manseau </span>
                                                    <span class="message-time">27 Feb</span>
                                                    <div class="clearfix"></div>
                                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="topnav-dropdown-footer">
                                <a href="chat">View all Messages</a>
                            </div>
                        </div>
                    </li>
                    <!-- /Message Notifications -->

                    <li class="nav-item dropdown has-arrow main-drop">
                        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                            <span class="user-img"><img src="assets/img/profiles/avatar-21.jpg" alt="">
                            <span class="status online"></span></span>
                            <span>Admin</span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="profile">My Profile</a>
                            <a class="dropdown-item" href="settings">Settings</a>
                            <a class="dropdown-item" href="login">Logout</a>
                        </div>
                    </li>
                </ul>
                <!-- /Header Menu -->

                <!-- Mobile Menu -->
                <div class="dropdown mobile-user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="profile">My Profile</a>
                        <a class="dropdown-item" href="settings">Settings</a>
                        <a class="dropdown-item" href="login">Logout</a>
                    </div>
                </div>
                <!-- /Mobile Menu -->

            </div>
            <!-- /Header -->

   {{-- Side BAR  Start  --}}
			<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title">
								<span>Main</span>
							</li>
<li class="submenu">
                                <a href="#"><i class="la la-dashboard"></i> <span> Student</span> <span   class="menu-arrow"></span></a>
    <ul style="display: none;">
            <li>
                <a class="{{ Request::is('inde') ? 'active' : '' }}" href="{{ url('student-list') }}">Student List</a>
            </li>
            <li>
                                    {{-- {{ url('employee-dashboard') }}   --}}
                    <a class="{{ Request::is('employee-dashboard') ? 'active' : '' }}" href="">Student Registration</a>
            </li>

     </ul>
</li>
<li class="submenu">
								<a href="#"><i class="la la-dashboard"></i> <span> Courses</span> <span class="menu-arrow"></span></a>
	<ul style="display: none;">
		<li>
                 <a class="{{ Request::is('inde') ? 'active' : '' }}" href="{{ url('index') }}">Add Course</a>
        </li>
		<li>
                     {{-- {{ url('employee-dashboard') }}   --}}
            <a class="{{ Request::is('employee-dashboard') ? 'active' : '' }}" href="">Add Resource</a>
        </li>
        <li>
            <a class="{{ Request::is('inde') ? 'active' : '' }}" href="{{ url('index') }}">Add Assignment</a>
        </li>
        <li>
                      {{-- {{ url('employee-dashboard') }}   --}}
               <a class="{{ Request::is('employee-dashboard') ? 'active' : '' }}" href="">Course List</a>
        </li>
        <li>
              <a class="{{ Request::is('inde') ? 'active' : '' }}" href="{{ url('index') }}">Course Level</a>
        </li>
        <li>
                  {{-- {{ url('employee-dashboard') }}   --}}
                 <a class="{{ Request::is('employee-dashboard') ? 'active' : '' }}" href="">Course Detail</a>
        </li>
	</ul>
</li>
						</ul>
					</div>
                </div>
            </div>
   {{-- Side BAR  End  --}}

            <!-- Page Wrapper -->
            <div class="page-wrapper">

                <!-- Page Content -->
                <div class="content container-fluid">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="page-title">Welcome Admin!</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item active">Dashboard1</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                            <div class="card dash-widget">
                                <div class="card-body">
                                    <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
                                    <div class="dash-widget-info">
                                        <h3>112</h3>
                                        <span>Projects</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                            <div class="card dash-widget">
                                <div class="card-body">
                                    <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                                    <div class="dash-widget-info">
                                        <h3>44</h3>
                                        <span>Clients</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                            <div class="card dash-widget">
                                <div class="card-body">
                                    <span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
                                    <div class="dash-widget-info">
                                        <h3>37</h3>
                                        <span>Tasks</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                            <div class="card dash-widget">
                                <div class="card-body">
                                    <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                                    <div class="dash-widget-info">
                                        <h3>218</h3>
                                        <span>Employees</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Total Revenue</h3>
                                            <div id="bar-charts"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 text-center">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Sales Overview</h3>
                                            <div id="line-charts"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-group m-b-30">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div>
                                                <span class="d-block">New Employees</span>
                                            </div>
                                            <div>
                                                <span class="text-success">+10%</span>
                                            </div>
                                        </div>
                                        <h3 class="mb-3">10</h3>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mb-0">Overall Employees 218</p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div>
                                                <span class="d-block">Earnings</span>
                                            </div>
                                            <div>
                                                <span class="text-success">+12.5%</span>
                                            </div>
                                        </div>
                                        <h3 class="mb-3">$1,42,300</h3>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mb-0">Previous Month <span class="text-muted">$1,15,852</span></p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div>
                                                <span class="d-block">Expenses</span>
                                            </div>
                                            <div>
                                                <span class="text-danger">-2.8%</span>
                                            </div>
                                        </div>
                                        <h3 class="mb-3">$8,500</h3>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mb-0">Previous Month <span class="text-muted">$7,500</span></p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div>
                                                <span class="d-block">Profit</span>
                                            </div>
                                            <div>
                                                <span class="text-danger">-75%</span>
                                            </div>
                                        </div>
                                        <h3 class="mb-3">$1,12,000</h3>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mb-0">Previous Month <span class="text-muted">$1,42,000</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Statistics Widget -->
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-4 d-flex">
                            <div class="card flex-fill dash-statistics">
                                <div class="card-body">
                                    <h5 class="card-title">Statistics</h5>
                                    <div class="stats-list">
                                        <div class="stats-info">
                                            <p>Today Leave <strong>4 <small>/ 65</small></strong></p>
                                            <div class="progress">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="stats-info">
                                            <p>Pending Invoice <strong>15 <small>/ 92</small></strong></p>
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="stats-info">
                                            <p>Completed Projects <strong>85 <small>/ 112</small></strong></p>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="stats-info">
                                            <p>Open Tickets <strong>190 <small>/ 212</small></strong></p>
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="stats-info">
                                            <p>Closed Tickets <strong>22 <small>/ 212</small></strong></p>
                                            <div class="progress">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-6 col-xl-4 d-flex">
                            <div class="card flex-fill">
                                <div class="card-body">
                                    <h4 class="card-title">Task Statistics</h4>
                                    <div class="statistics">
                                        <div class="row">
                                            <div class="col-md-6 col-6 text-center">
                                                <div class="stats-box mb-4">
                                                    <p>Total Tasks</p>
                                                    <h3>385</h3>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6 text-center">
                                                <div class="stats-box mb-4">
                                                    <p>Overdue Tasks</p>
                                                    <h3>19</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-purple" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">30%</div>
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 22%" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">22%</div>
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 24%" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100">24%</div>
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 26%" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100">21%</div>
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100">10%</div>
                                    </div>
                                    <div>
                                        <p><i class="fa fa-dot-circle-o text-purple me-2"></i>Completed Tasks <span class="float-end">166</span></p>
                                        <p><i class="fa fa-dot-circle-o text-warning me-2"></i>Inprogress Tasks <span class="float-end">115</span></p>
                                        <p><i class="fa fa-dot-circle-o text-success me-2"></i>On Hold Tasks <span class="float-end">31</span></p>
                                        <p><i class="fa fa-dot-circle-o text-danger me-2"></i>Pending Tasks <span class="float-end">47</span></p>
                                        <p class="mb-0"><i class="fa fa-dot-circle-o text-info me-2"></i>Review Tasks <span class="float-end">5</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-6 col-xl-4 d-flex">
                            <div class="card flex-fill">
                                <div class="card-body">
                                    <h4 class="card-title">Today Absent <span class="badge bg-inverse-danger ms-2">5</span></h4>
                                    <div class="leave-info-box">
                                        <div class="media d-flex align-items-center">
                                            <a href="profile" class="avatar"><img alt="" src="assets/img/user.jpg"></a>
                                            <div class="media-body flex-grow-1">
                                                <div class="text-sm my-0">Martin Lewis</div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mt-3">
                                            <div class="col-6">
                                                <h6 class="mb-0">4 Sep 2019</h6>
                                                <span class="text-sm text-muted">Leave Date</span>
                                            </div>
                                            <div class="col-6 text-end">
                                                <span class="badge bg-inverse-danger">Pending</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="leave-info-box">
                                        <div class="media d-flex align-items-center">
                                            <a href="profile" class="avatar"><img alt="" src="assets/img/user.jpg"></a>
                                            <div class="media-body flex-grow-1">
                                                <div class="text-sm my-0">Martin Lewis</div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mt-3">
                                            <div class="col-6">
                                                <h6 class="mb-0">4 Sep 2019</h6>
                                                <span class="text-sm text-muted">Leave Date</span>
                                            </div>
                                            <div class="col-6 text-end">
                                                <span class="badge bg-inverse-success">Approved</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="load-more text-center">
                                        <a class="text-dark" href="javascript:void(0);">Load More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Statistics Widget -->

                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card card-table flex-fill">
                                <div class="card-header">
                                    <h3 class="card-title mb-0">Invoices</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-nowrap custom-table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Invoice ID</th>
                                                    <th>Client</th>
                                                    <th>Due Date</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><a href="invoice-view">#INV-0001</a></td>
                                                    <td>
                                                        <h2><a href="#">Global Technologies</a></h2>
                                                    </td>
                                                    <td>11 Mar 2019</td>
                                                    <td>$380</td>
                                                    <td>
                                                        <span class="badge bg-inverse-warning">Partially Paid</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="invoice-view">#INV-0002</a></td>
                                                    <td>
                                                        <h2><a href="#">Delta Infotech</a></h2>
                                                    </td>
                                                    <td>8 Feb 2019</td>
                                                    <td>$500</td>
                                                    <td>
                                                        <span class="badge bg-inverse-success">Paid</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="invoice-view">#INV-0003</a></td>
                                                    <td>
                                                        <h2><a href="#">Cream Inc</a></h2>
                                                    </td>
                                                    <td>23 Jan 2019</td>
                                                    <td>$60</td>
                                                    <td>
                                                        <span class="badge bg-inverse-danger">Unpaid</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="invoices">View all invoices</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="card card-table flex-fill">
                                <div class="card-header">
                                    <h3 class="card-title mb-0">Payments</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table custom-table table-nowrap mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Invoice ID</th>
                                                    <th>Client</th>
                                                    <th>Payment Type</th>
                                                    <th>Paid Date</th>
                                                    <th>Paid Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><a href="invoice-view">#INV-0001</a></td>
                                                    <td>
                                                        <h2><a href="#">Global Technologies</a></h2>
                                                    </td>
                                                    <td>Paypal</td>
                                                    <td>11 Mar 2019</td>
                                                    <td>$380</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="invoice-view">#INV-0002</a></td>
                                                    <td>
                                                        <h2><a href="#">Delta Infotech</a></h2>
                                                    </td>
                                                    <td>Paypal</td>
                                                    <td>8 Feb 2019</td>
                                                    <td>$500</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="invoice-view">#INV-0003</a></td>
                                                    <td>
                                                        <h2><a href="#">Cream Inc</a></h2>
                                                    </td>
                                                    <td>Paypal</td>
                                                    <td>23 Jan 2019</td>
                                                    <td>$60</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="payments">View all payments</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card card-table flex-fill">
                                <div class="card-header">
                                    <h3 class="card-title mb-0">Clients</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table custom-table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Status</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="#" class="avatar"><img alt="" src="assets/img/profiles/avatar-19.jpg"></a>
                                                            <a href="client-profile">Barry Cuda <span>CEO</span></a>
                                                        </h2>
                                                    </td>
                                                    <td>barrycuda@example.com</td>
                                                    <td>
                                                        <div class="dropdown action-label">
                                                            <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa fa-dot-circle-o text-success"></i> Active
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
                                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="#" class="avatar"><img alt="" src="assets/img/profiles/avatar-19.jpg"></a>
                                                            <a href="client-profile">Tressa Wexler <span>Manager</span></a>
                                                        </h2>
                                                    </td>
                                                    <td>tressawexler@example.com</td>
                                                    <td>
                                                        <div class="dropdown action-label">
                                                            <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa fa-dot-circle-o text-danger"></i> Inactive
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
                                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="client-profile" class="avatar"><img alt="" src="assets/img/profiles/avatar-07.jpg"></a>
                                                            <a href="client-profile">Ruby Bartlett <span>CEO</span></a>
                                                        </h2>
                                                    </td>
                                                    <td>rubybartlett@example.com</td>
                                                    <td>
                                                        <div class="dropdown action-label">
                                                            <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa fa-dot-circle-o text-danger"></i> Inactive
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
                                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="client-profile" class="avatar"><img alt="" src="assets/img/profiles/avatar-06.jpg"></a>
                                                            <a href="client-profile"> Misty Tison <span>CEO</span></a>
                                                        </h2>
                                                    </td>
                                                    <td>mistytison@example.com</td>
                                                    <td>
                                                        <div class="dropdown action-label">
                                                            <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa fa-dot-circle-o text-success"></i> Active
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
                                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="client-profile" class="avatar"><img alt="" src="assets/img/profiles/avatar-14.jpg"></a>
                                                            <a href="client-profile"> Daniel Deacon <span>CEO</span></a>
                                                        </h2>
                                                    </td>
                                                    <td>danieldeacon@example.com</td>
                                                    <td>
                                                        <div class="dropdown action-label">
                                                            <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa fa-dot-circle-o text-danger"></i> Inactive
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
                                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="clients">View all clients</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="card card-table flex-fill">
                                <div class="card-header">
                                    <h3 class="card-title mb-0">Recent Projects</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table custom-table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Project Name </th>
                                                    <th>Progress</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h2><a href="project-view">Office Management</a></h2>
                                                        <small class="block text-ellipsis">
                                                            <span>1</span> <span class="text-muted">open tasks, </span>
                                                            <span>9</span> <span class="text-muted">tasks completed</span>
                                                        </small>
                                                    </td>
                                                    <td>
                                                        <div class="progress progress-xs progress-striped">
                                                            <div class="progress-bar" role="progressbar" data-bs-toggle="tooltip" title="65%" style="width: 65%"></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h2><a href="project-view">Project Management</a></h2>
                                                        <small class="block text-ellipsis">
                                                            <span>2</span> <span class="text-muted">open tasks, </span>
                                                            <span>5</span> <span class="text-muted">tasks completed</span>
                                                        </small>
                                                    </td>
                                                    <td>
                                                        <div class="progress progress-xs progress-striped">
                                                            <div class="progress-bar" role="progressbar" data-bs-toggle="tooltip" title="15%" style="width: 15%"></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h2><a href="project-view">Video Calling App</a></h2>
                                                        <small class="block text-ellipsis">
                                                            <span>3</span> <span class="text-muted">open tasks, </span>
                                                            <span>3</span> <span class="text-muted">tasks completed</span>
                                                        </small>
                                                    </td>
                                                    <td>
                                                        <div class="progress progress-xs progress-striped">
                                                            <div class="progress-bar" role="progressbar" data-bs-toggle="tooltip" title="49%" style="width: 49%"></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h2><a href="project-view">Hospital Administration</a></h2>
                                                        <small class="block text-ellipsis">
                                                            <span>12</span> <span class="text-muted">open tasks, </span>
                                                            <span>4</span> <span class="text-muted">tasks completed</span>
                                                        </small>
                                                    </td>
                                                    <td>
                                                        <div class="progress progress-xs progress-striped">
                                                            <div class="progress-bar" role="progressbar" data-bs-toggle="tooltip" title="88%" style="width: 88%"></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h2><a href="project-view">Digital Marketplace</a></h2>
                                                        <small class="block text-ellipsis">
                                                            <span>7</span> <span class="text-muted">open tasks, </span>
                                                            <span>14</span> <span class="text-muted">tasks completed</span>
                                                        </small>
                                                    </td>
                                                    <td>
                                                        <div class="progress progress-xs progress-striped">
                                                            <div class="progress-bar" role="progressbar" data-bs-toggle="tooltip" title="100%" style="width: 100%"></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="projects">View all projects</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /Page Content -->

            </div>
            <!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->


		 <!-- jQuery -->
       <script src="assets/js/jquery-3.6.0.min.js"></script>

		<!-- Bootstrap Core JS -->
        <script src="assets/js/bootstrap.bundle.min.js"></script>

		<!-- Slimscroll JS -->
		<script src="assets/js/jquery.slimscroll.min.js"></script>

		<!-- Chart JS -->
		<script src="assets/plugins/morris/morris.min.js"></script>
		<script src="assets/plugins/raphael/raphael.min.js"></script>
		<script src="assets/js/chart.js"></script>

		<!-- Custom JS -->
		<script src="assets/js/app.js"></script>

    </body>
</html>
