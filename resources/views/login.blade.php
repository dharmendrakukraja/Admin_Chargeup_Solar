<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Login - Solar Admin </title>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body class="account-page">

		<!-- Main Wrapper -->
        <div class="main-wrapper">

			<div class="account-content">
				{{-- <a href="job-list" class="btn btn-primary apply-btn">Apply Job</a> --}}
				<div class="container">
                    @if (Session::has('success'))

                    <div class="successMsg alert alert-success mt-2">{{ Session::get('success') }}
                    </div>

                    @endif
                    @if (Session::has('error'))

                    <div class="successMsg alert alert-danger mt-2">{{ Session::get('error') }}
                    </div>

                    @endif
					<!-- Account Logo -->
					<div class="account-logo">
						<a href="index"><img src="assets/img/solar-logo.png" alt="Solar Admin"></a>
					</div>
					<!-- /Account Logo -->

					<div class="account-box">
						<div class="account-wrapper">
							<h3 class="account-title">Login</h3>
							<p class="account-subtitle">Access to our Solar dashboard</p>

							<!-- Account Form -->
							<form method="POST" action="{{ route('login.custom') }}">
							@csrf
								<div class="form-group">
									<label>Email Address</label>
									<input type="text" placeholder="Email" id="email" class="form-control" name="email" value="admin123@mailinator.com"
                                    {{-- value="admin@dreamguys.co.in" --}}
                                    >
                                	<div class="text-danger pt-2">
                                    	@error('0')
	                            			{{$message}}
	                                	@enderror
	                                	@error('email')
	                            			{{$message}}
	                                	@enderror
	                            	</div>
								</div>
								<div class="form-group Password-icon">
									<div class="row">
										<div class="col">
											<label>Password</label>
										</div>
										<div class="col-auto">
											{{-- <a class="text-muted" href="forgot-password">
												Forgot password?
											</a> --}}
										</div>
									</div>
									 <input type="password" placeholder="Password" id="password" class="form-control pass-input" name="password" value="123456"><span class="fa fa-eye-slash toggle-password pt-4"></span>
                                	<div class="text-danger pt-2">
	                                	@error('password')
	                            			{{$message}}
	                                	@enderror
	                            	</div>
								</div>

								<div class="form-group text-center">
									<button class="btn btn-primary account-btn" type="submit">Login</button>
								</div>
								{{-- <div class="account-footer">
									<p>Don't have an account yet? <a href="register">Register</a></p>
								</div> --}}
							</form>
							<!-- /Account Form -->

						</div>
					</div>
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
       <script src="assets/js/jquery-3.6.0.min.js"></script>

		<!-- Bootstrap Core JS -->
        <script src="assets/js/bootstrap.bundle.min.js"></script>

		<!-- Custom JS -->
		<script src="assets/js/app.js"></script>

    </body>
</html>
