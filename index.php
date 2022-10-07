<?php
	session_start();
	error_reporting(0);
	include('includes/config.php');
	if(strlen($_SESSION['userlogin'])==0){
		header('location:login.php');
	}
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
        <title>EPN Accueil</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/EPN.png">
		
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
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

		<style>
		/* Make the image fully responsive */
		.carousel-inner img {
			width: 100%;
			height: 100%;
		}
		</style>

    </head>
	
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <?php include_once("includes/header.php"); ?>
			<!-- /Header -->
			
			<!-- Sidebar -->
            <?php include_once("includes/sidebar.php");?>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
				<?php 
					$sql = "SELECT matricule from employee";
					$query = $dbh->prepare($sql);
					$query->execute();
					$results = $query->fetchAll(PDO::FETCH_OBJ);
					$totalcount_employee = $query->rowCount();

					$sql1 = "SELECT id_departement from departement";
					$query1 = $dbh->prepare($sql1);
					$query1->execute();
					$results1 = $query1->fetchAll(PDO::FETCH_OBJ);
					$totalcount_departement = $query1->rowCount();

					$sql2 = "SELECT id_statut from statut";
					$query2 = $dbh->prepare($sql2);
					$query2->execute();
					$results = $query2->fetchAll(PDO::FETCH_OBJ);
					$totalcount_statut = $query2->rowCount();

					$sql3 = "SELECT id_grade from grade";
					$query3 = $dbh->prepare($sql3);
					$query3->execute();
					$results = $query3->fetchAll(PDO::FETCH_OBJ);
					$totalcount_grade = $query3->rowCount();

					$sql4 = "SELECT id_categorie from categorie";
					$query4 = $dbh->prepare($sql4);
					$query4->execute();
					$results = $query4->fetchAll(PDO::FETCH_OBJ);
					$totalcount_categorie = $query4->rowCount();
				?>
	
				<!-- Page Content -->
                <div class="container_1">
				
						<div class="container_2">
							<div class="container_3 shadow mb-1">
								<a style="color:#000" href="liste/departement/departement.php">
								<div class="content">
									<span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
									<p>Departements</p>
								</div>
								</a>
							</div>
							<div class="container_3 shadow mb-1">
								<a style="color:#000" href="liste/categorie/categorie.php">
								<div class="content">
									<span class="dash-widget-icon"><i class="fa fa-users"></i></span>
									<p>Categories</p>
								</div>
								</a>
							</div>
							<div class="container_3 shadow mb-1">
								<a style="color:#000" href="liste/grade/grade.php">
								<div class="content">
									<span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
									<p>Grades</p>
								</div>
								</a>
							</div>
							<div class="container_3 shadow mb-1">
								<a style="color:#000" href="liste/employee/employees.php">
								<div class="content">
									<span class="dash-widget-icon"><i class="fa fa-user"></i></span>
									<p>Employées</p>
								</div>
								</a>
							</div>
							<div class="container_3 shadow mb-1">
								<a style="color:#000" href="liste/etablissement/etablissement.php">
								<div class="content">
									<span class="dash-widget-icon"><i class="fa fa-building-o"></i></span>
									<p>Etablissements</p>
								</div>
								</a>
							</div>
							<div class="container_3 shadow mb-1">
								<a id="toggle_btn" href="javascript:void(0);">
								<div class="content">
									<img src="assets/img/EPN.png">
								</div>
								</a>
							</div>
							<div class="container_3 shadow mb-1">
								<a style="color:#000" href="liste/statut/statut.php">
								<div class="content">
									<span class="dash-widget-icon"><i class="fa fa-joomla"></i></span>
									<p>Statuts</p>
								</div>
								</a>
							</div>
						</div>
					
				</div>
				<!-- /Page Content -->

   			</div>
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->
		
		<!-- javascript links starts here -->
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
		<script src="assets/js/jquery.slimscroll.min.js"></script>
		
		<!-- Chart JS -->
		<script src="assets/plugins/morris/morris.min.js"></script>
		<script src="assets/plugins/raphael/raphael.min.js"></script>
		<script src="assets/js/chart.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/app.js"></script>


		<!-- javascript links ends here  -->
    </body>
</html>





<!-- Avec slider -->
<!-- <div class="col-lg-4 col-md-0">
	<div class="col">
		<div class="card dash-widget">
			<a style="color:#000" href="departement.php">
				<div class="card-body">
					<span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
					<div class="dash-widget-info">
						<h3
								</a>><php echo $totalcount_departement; ?></h3>
						<span>Departements</span>
					</div>
				</div>
			</a>
		</div>
	</div>
	
	<div class="col">
		<div class="card dash-widget">
			<a style="color:#000" href="categorie.php">
				<div class="card-body">
					<span class="dash-widget-icon"><i class="fa fa-users"></i></span>
					<div class="dash-widget-info">
						<h3
								</a>><php echo $totalcount_categorie; ?></h3>
						<span>Categories</span>
					</div>
				</div>
			</a>
		</div>
	</div>

	<div class="col">
		<div class="card dash-widget">
			<a style="color:#000" href="grade.php">
				<div class="card-body">
					<span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
					<div class="dash-widget-info">
						<h3
								</a>><php echo $totalcount_grade; ?></h3>
						<span>Grades</span>
					</div>
				</div>
			</a>
		</div>
	</div>

	<div class="col">
		<div class="card dash-widget">
			<a style="color:#000" href="employees.php">
				<div class="card-body">
					<span class="dash-widget-icon"><i class="fa fa-user"></i></span>
					<div class="dash-widget-info">
						<h3
								</a>><php echo $totalcount_employee; ></h3>
						<span>Employées</span>
					</div>
				</div>
			</a>
		</div>
	</div>
</div>


<div class="col-lg-8">
		<h1 class="dash-sec-title">Aujourd'huit</h1>
		<div id="demo" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#demo" data-slide-to="0" class="active"></li>
			<li data-target="#demo" data-slide-to="1"></li>
			<li data-target="#demo" data-slide-to="2"></li>
		</ol>
		
		
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="employees/1.png" alt="Los Angeles" class="d-block w-100" >
				<div class="carousel-caption d-none d-md-block">
					<h5>First slide label</h5>
					<p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img src="employees/2.jpg" alt="Chicago" class="d-block w-100">
			</div>
			<div class="carousel-item">
				<img src="employees/3.jpg" alt="New York" class="d-block w-100">
			</div>
		</div>
		
		
		<a class="carousel-control-prev" href="#demo" data-slide="prev">
			<span class="carousel-control-prev-icon"></span>
		</a>
		<a class="carousel-control-next" href="#demo" data-slide="next">
			<span class="carousel-control-next-icon"></span>
		</a>
		</div>
</div> -->