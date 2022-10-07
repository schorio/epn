<?php 
	session_start();
	error_reporting(0);
	include_once('../../includes/config.php');
	include_once('../../includes/functions.php');
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
        <title>Listes des grades</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/EPN.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="../../assets/css/line-awesome.min.css">
		
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
								<h3 class="page-title">Grade</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">Listes</li>
									<li class="breadcrumb-item active"><a href="">Listes des grades</a></li>
								</ul>
							</div>

							<?php if ($_SESSION["role"] === $config["ROLES"][0]) :?>
								<div class="col-auto float-right ml-auto">
									<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_grade"><i class="fa fa-plus"></i> Ajouter une grade</a>
								</div>
							<?php endif ?>
							
						</div>
					</div>
					<!-- /Page Header -->
					
					<!-- user profiles list starts her -->
					<div class="row staff-grid-row">
						<?php
										$sql = "SELECT * FROM grade ORDER BY code_grade ASC";
										$query = $dbh->prepare($sql);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);
										$cnt=1;
										if($query->rowCount() > 0)
										{
											foreach($results as $row)
											{	
												$id_grade = htmlentities($row->id_grade);
												$code_grade = htmlentities($row->code_grade);
									?>
						<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
							<div class="profile-widget">
								<div class="profile-img">
									<a href="list_par_grade.php?code_g=<?php echo $code_grade ?>" class="avatar"><img src="/epn/assets/img/DGFAG.png" alt="image"></a>
								</div>

								<?php if ($_SESSION["role"] === $config["ROLES"][0]) :?>
									<div class="dropdown profile-action">
										<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_grade<?php echo $id_grade ?>"><i class="fa fa-pencil m-r-5"></i> Modifier</a>
											<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_grade<?php echo $id_grade ?>"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
										</div>
									</div>
								<?php endif ?>

								<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="list_par_grade.php?code_g=<?php echo $code_grade ?>"><?php echo htmlentities($row->code_grade); ?></a></h4>
							</div>
						</div>	
						<?php 
						
						include("../../includes/modals/grade/Modifier_grade.php");
						include("../../includes/modals/grade/supprimer_grade.php");		

						$cnt +=1; 
   											}
    									} 					
						?>		
					</div>

                </div>
				<!-- /Page Content -->
				
				<!-- Add grade Modal -->
				<?php include_once("../../includes/modals/grade/ajouter_grade.php");?>
				<!-- /Add grade Modal -->
								
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
		
    </body>
</html>