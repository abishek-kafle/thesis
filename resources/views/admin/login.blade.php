<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="">
		<meta name="keywords" content="">
        <meta name="author" content="">
        <title>Login - Admin Dashboard</title>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/img/favicon.png')}}">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('admin/css/font-awesome.min.css')}}">

		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">

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
				<a href="{{route('front.index')}}" class="btn btn-primary apply-btn">Frontend</a>
				<div class="container">
                    @php
                        $theme = \App\Models\Theme::orderBy('id', 'desc')->first();
                    @endphp
					<!-- Account Logo -->
					<div class="account-logo">
						<a href="#"><img src="{{asset('uploads/themes/'.$theme->logo)}}" alt="Dreamguy's Technologies"></a>
					</div>
					<!-- /Account Logo -->

					<div class="account-box">
						<div class="account-wrapper">
							<h3 class="account-title">Login - {{$theme->website_name}}</h3>
							<p class="account-subtitle">Access the dashboard</p>

							<!-- Account Form -->
							<form action="{{route('adminLogin')}}" method="POST">
                                @csrf
								<div class="form-group">
									<label>Email Address</label>
									<input class="form-control" type="email" name="email">
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col">
											<label>Password</label>
										</div>
										<div class="col-auto">
											<a class="text-muted" href="forgot-password.html">
												Forgot password?
											</a>
										</div>
									</div>
									<input class="form-control" type="password" name="password">
								</div>
								<div class="form-group text-center">
									<button class="btn btn-primary account-btn" type="submit">Login</button>
								</div>
							</form>
							<!-- /Account Form -->

						</div>
					</div>
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
        <script src="{{asset('admin/js/jquery-3.2.1.min.js')}}"></script>

		<!-- Bootstrap Core JS -->
        <script src="{{asset('admin/js/popper.min.js')}}"></script>
        <script src="{{asset("admin/js/bootstrap.min.js")}}"></script>

		<!-- Custom JS -->
		<script src="{{asset('admin/js/app.js')}}"></script>

    </body>
</html>
