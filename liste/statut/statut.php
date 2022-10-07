<?php 
	session_start();
	error_reporting(0);
	include_once('../../includes/config.php');
	include_once('../../includes/functions.php');

	if(strlen($_SESSION['userlogin'])==0)
	{
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
        <title>Listes des statuts</title>
		
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
								<h3 class="page-title">Statut</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">Listes</li>
									<li class="breadcrumb-item active"><a href="">Listes des statuts</a></li>
								</ul>
							</div>

							<?php if ($_SESSION["role"] === $config["ROLES"][0]) :?>
								<div class="col-auto float-right ml-auto">
									<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_statut"><i class="fa fa-plus"></i> Ajouter un statut</a>
								</div>
							<?php endif ?>

						</div>
					</div>
					<!-- /Page Header -->
					
					<!-- user profiles list starts her -->
					<!-- <div class="row staff-grid-row"> -->
					<div class="row">
						<?php
							$sql = "SELECT * FROM statut ORDER BY code_statut ASC";
							$query = $dbh->prepare($sql);
							$query->execute();
							$results=$query->fetchAll(PDO::FETCH_OBJ);
							$cnt=1;
							if($query->rowCount() > 0)
							{
								foreach($results as $row)
									{	
										$id_statut = htmlentities($row->id_statut);
										$code_statut = htmlentities($row->code_statut);
										$nom_statut = htmlentities($row->nom_statut);

										$sql1 = "SELECT id_employee FROM employee WHERE id_statut='$id_statut'";
										$query1 = $dbh->prepare($sql1);
										$query1->execute();
										$results=$query1->fetchAll(PDO::FETCH_OBJ);
										$total_par_statut=$query1->rowCount();

										$sql3 = "SELECT id_employee FROM employee";
										$query3 = $dbh->prepare($sql3);
										$query3->execute();
										$results=$query3->fetchAll(PDO::FETCH_OBJ);
										$total_employee=$query3->rowCount();

										$p_statut = round(($total_par_statut * 100) / $total_employee);

										if ($total_par_statut <=2 ) {
											$plus = '';
										}
										else{
											$plus = '<a href="list_par_statut.php?code_s='.$code_statut.'" class="all-users dropdown-toggle">+</a>';
										}


						?>	

								<div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
									<div class="card">
										<div class="card-body">
											
										<?php if ($_SESSION["role"] === $config["ROLES"][0]) :?>
											<div class="dropdown dropdown-action profile-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_statut<?php echo $id_statut ?>"><i class="fa fa-pencil m-r-5"></i> Modifier</a>
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_statut<?php echo $id_statut ?>"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
												</div>
											</div>
										<?php endif ?>

											<h3 class="project-title"><a href="list_par_statut.php?code_s=<?php echo $code_statut ?>"><?php echo $code_statut ?></a></h3>
											<small class="block text-ellipsis m-b-15">
												<span class="text-muted">Avec </span> <span class="text-xs"><?php echo $total_par_statut; ?> employée(s)</span>
											</small><br><br><br>
											<p class="text-muted">
												<?php echo $nom_statut ?>
											</p>
											<div class="project-members m-b-15">
												<div>Membres :</div>
												<ul class="team-members">
													<?php
														$sql4 = "SELECT * FROM employee 
																WHERE id_statut = '$id_statut' limit 3 ";
														$query4 = $dbh->prepare($sql4);
														$query4->execute();
														$results=$query4->fetchAll(PDO::FETCH_OBJ);
														if($results){
														
															foreach($results as $row)
															{	
																$avatar_id_employee = htmlentities($row->id_employee);
																$avatar_nom = htmlentities($row->nom);
																$avatar_prenom = htmlentities($row->prenom);
																$avatar_image = htmlentities($row->image);
														
													?>

													<li>
														<a href="/epn/profile.php?id=<?php echo $avatar_id_employee; ?>" data-toggle="tooltip" title="<?php echo $avatar_nom.' '.$avatar_prenom; ?>"><img alt="" src="/epn/assets/img/employee/<?php echo $avatar_image; ?>"></a>
													</li>

													<?php 
															}
														}
														else{echo "Pas de membre";}
													?>
												
													<li class="dropdown avatar-dropdown">
														<?php echo $plus; ?>
													</li>
												</ul>
											</div>
											<p class="m-b-5">Pourcentage <span class="text-success float-right"><?php echo $p_statut; ?>%</span></p>
											<div class="progress progress-xs mb-0">
												<div class="progress-bar bg-success" role="progressbar" data-toggle="tooltip" title="<?php echo $p_statut; ?>%" style="width: <?php echo $p_statut; ?>%"></div>
											</div>
										</div>
									</div>
								</div>

						<?php 

							include("../../includes/modals/statut/supprimer_statut.php");
							include("../../includes/modals/statut/modifier_statut.php");

							$cnt +=1; 
    								}

								

    						} 
						?>		
					</div>

					



                </div>
				<!-- /Page Content -->
				
				<!-- Add statut Modal -->
				<?php include_once("../../includes/modals/statut/ajouter_statut.php");?>
				<!-- /Add statut Modal -->

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