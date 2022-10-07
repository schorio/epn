<?php 
	session_start();
	error_reporting(0);
	include_once('../../includes/config.php');
	include_once("../../includes/functions.php");
	if(strlen($_SESSION['userlogin'])==0){
		header('location: ../../login.php');
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
        <title> Listes des utilisateurs</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/EPN.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="../../assets/css/line-awesome.min.css">
		
		<!-- Datatable CSS -->
		<link rel="stylesheet" href="../../assets/css/dataTables.bootstrap4.min.css">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="../../assets/css/select2.min.css">
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="../../assets/css/bootstrap-datetimepicker.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="../../assets/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="../../assets/js/html5shiv.min.js"></script>
			<script src="../../assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
			<?php include_once("../../includes/header.php");?>
			<!-- /Header -->
			
			<!-- Sidebar -->
            <?php include_once("../../includes/sidebar.php");?>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Utilisateurs</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Listes</a></li>
									<li class="breadcrumb-item active">Listes des utilisateurs</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
								<a href="#" class="btn add-btn" data-toggle="modal" data-target="#ajouter_ut"><i class="fa fa-plus"></i> Ajouter un utilisateur</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<!-- Search Filter -->
					<div class="row filter-row">
						<div class="col-sm-6 col-md-8">  
							<div class="form-group form-focus">
								<input type="text" name="search" id="search" class="form-control floating">
								<label class="focus-label">Entrer les mots clés</label>
							</div>
						</div>
                    </div>
					<!-- /Search Filter -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<!-- <table class="table table-striped custom-table datatable"> -->
								<table class="table table-striped custom-table datatable" id="myTable">
									<thead>
										<tr>
											<th>Nom et prenom</th>
											<th>Username</th>
											<th>Email</th>
											<th>Role</th>
											<th>Departement</th>
											<th class="text-right">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$sql = "SELECT * FROM utilisateur ORDER BY id_ut DESC";
											$result = mysqli_query($link, $sql);
											
											while($row = mysqli_fetch_array($result))
											{

												$id_ut = $row["id_ut"];

												echo '	
														<tr>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.php?id='.$row["id_ut"].'" class="avatar"><img alt="image" src="/epn/assets/img/utilisateur/'.$row["image_ut"].'"></a>
																	<a href="profile.php?id='.$row["id_ut"].' "> '.$row["nom_ut"].'  '.$row["prenom_ut"].'<span>'.$row["username_ut"].'</span></a>
																</h2>
															</td>														
															<td>'.$row["username_ut"].'</td>
															<td>'.$row["email_ut"].'</td>
															<td>'.$row["role_ut"].'</td>
															<td>'.$row["departement_ut"].'</td>
															<td class="text-right">
																<div class="dropdown dropdown-action">
																	<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																	<div class="dropdown-menu dropdown-menu-right">
																		<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modifier_ut'.$row["id_ut"].'"><i class="fa fa-pencil m-r-5"></i> Modifier</a>
																		<a class="dropdown-item" href="#" data-toggle="modal" data-target="#supprimer_ut'.$row["id_ut"].'"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
																	</div>
																</div>
															</td>
														</tr>
													';

													
													include("../../includes/modals/utilisateur/supprimer_ut.php");
													include("../../includes/modals/utilisateur/modifier_ut.php");

											}

										?>
									</tbody>

								</table>
							</div>
						</div>
					</div>
                </div>
				<!-- /Page Content -->
				
				<!-- Add Employee Modal -->
				<?php include_once("../../includes/modals/utilisateur/ajouter_ut.php"); ?>
				<!-- /Add Employee Modal -->
				
            </div>
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="../../assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="../../assets/js/popper.min.js"></script>
        <script src="../../assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
		<script src="../../assets/js/jquery.slimscroll.min.js"></script>
		
		<!-- Select2 JS -->
		<script src="../../assets/js/select2.min.js"></script>
		
		<!-- Datetimepicker JS -->
		<script src="../../assets/js/moment.min.js"></script>
		<script src="../../assets/js/bootstrap-datetimepicker.min.js"></script>
		
		<!-- Datatable JS -->
		<script src="../../assets/js/jquery.dataTables.min.js"></script>
		<script src="../../assets/js/dataTables.bootstrap4.min.js"></script>
				
		<!-- Custom JS -->
		<script src="../../assets/js/app.js"></script>

		<!-- Recherche instantannée -->
		<script src="../../assets/js/recherche.js"></script>

    </body>
</html>





