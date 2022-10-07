<?php
	session_start();
	error_reporting(0);
	include_once("includes/config.php");
	include_once("includes/function/connection/f_login.php");
?>
<!DOCTYPE html>
<html lang="en">
		<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
		<meta name="author" content="Dreamguys - Bootstrap Admin Template">
		<meta name="robots" content="noindex, nofollow">
		<title>Login - EPN</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/EPN.png">
		
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
				<div class="container">
					
					
					<div class="account-box">
						<!-- Account Logo -->
						
						<!-- /Account Logo -->
						<div class="account-wrapper">
							<div class="account-logo">
								<!-- <a href="index.php"><img src="assets/img/logo2.png" alt="Company Logo"></a> -->
								<a class="logo_2"><i class="fa fa-modx"></i>EPN.</a>
								
							</div>
							<h3 class="account-title">Login Administrateur </h3>
							<!-- Account Form -->
							<form method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<label>Nom d'utilisateur</label>
									<input class="form-control" name="username" required type="text">
								</div>
								<?php if($wrongusername){echo $wrongusername;}?>
								<div class="form-group">
									<div class="row">
										<div class="col">
											<label>Mot de passe</label>
										</div>
									</div>
									<input class="form-control" name="password" required type="password">
								</div>
								<?php if($wrongpassword){echo $wrongpassword;}?>
								
								<div class="form-group text-center">
									<button class="btn btn-primary account-btn" name="login" type="submit">Login</button>
										<!-- <div class="col-auto pt-2">
											<a class="text-muted float-right" href="forgot-password.php">
												Mot de passe oublié?
											</a>
										</div> -->
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
		<script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/app.js"></script>
		
	</body>
</html>