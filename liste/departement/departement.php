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
        <title>Departement</title>
		
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
								<h3 class="page-title">Departement</h3>
								<ul class="breadcrumb">
								<li class="breadcrumb-item">Listes</li>
									<li class="breadcrumb-item active"><a href="">Listes des departements</a></li>
								</ul>
							</div>
							<?php if ($_SESSION["role"] === $config["ROLES"][0]) :?>
								<div class="col-auto float-right ml-auto">
									<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_department"><i class="fa fa-plus"></i> Ajouter un department</a>
								</div>
							<?php endif ?>
						</div>
					</div>
					<!-- /Page Header -->
					
					<!-- user profiles list starts her -->
					<div class="row">
						<?php
										$sql = " 	SELECT  departement.id_departement, 
															departement.code_departement, 
															departement.nom_departement, 
															departement.id_chef_departement,
															employee.matricule,
															employee.nom,
															employee.prenom,
															employee.image
															
													FROM departement JOIN employee ON departement.id_chef_departement=employee.id_employee ORDER BY code_departement ASC;
												";
										$query = $dbh->prepare($sql);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);
										$cnt=1;
										if($query->rowCount() > 0)
										{
										foreach($results as $row)
										{	
											$id_departement = htmlentities($row->id_departement);
											$code_departement = htmlentities($row->code_departement);
											$nom_departement = htmlentities($row->nom_departement);
											$id_chef_departement = htmlentities($row->id_chef_departement);
											$nom_chef_departement = htmlentities($row->nom);
											$prenom_chef_departement = htmlentities($row->prenom);
											$image_chef_departement = htmlentities($row->image);

											$sql1 = "SELECT id_etablissement FROM etablissement WHERE id_departement='$id_departement'";
											$query1 = $dbh->prepare($sql1);
											$query1->execute();
											$results=$query1->fetchAll(PDO::FETCH_OBJ);
											$total_par_etablissement=$query1->rowCount();

											$sql2 = "SELECT id_employee FROM employee WHERE id_departement='$id_departement'";
											$query2 = $dbh->prepare($sql2);
											$query2->execute();
											$results=$query2->fetchAll(PDO::FETCH_OBJ);
											$total_par_departement=$query2->rowCount();

											$sql3 = "SELECT id_employee FROM employee";
											$query3 = $dbh->prepare($sql3);
											$query3->execute();
											$results=$query3->fetchAll(PDO::FETCH_OBJ);
											$total_employee=$query3->rowCount();

											$p_departement = round(($total_par_departement * 100) / $total_employee);

											if ($total_par_departement <=2 ) {
												$plus = '';
											}
											else{
												$plus = '<a href="list_par_departement.php?code_d='.$code_departement.'" class="all-users dropdown-toggle">+</a>';
											}
									?>
								<div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
									<div class="card">
										<div class="card-body">

											<?php if ($_SESSION["role"] === $config["ROLES"][0] || $code_departement === $_SESSION["departement"]) :?>
												<div class="dropdown dropdown-action profile-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_departement<?php echo $id_departement ?>"><i class="fa fa-pencil m-r-5"></i> Modifier</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_departement<?php echo $id_departement ?>"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
													</div>
												</div>
											<?php endif ?>
											
											<h3 class="project-title">

												<?php if ($_SESSION["role"] === $config["ROLES"][0]) :?>
													<a href="list_par_departement.php?code_d=<?php echo $code_departement ?>">
												<?php endif ?>

													<?php echo $code_departement ?>

												<?php if ($_SESSION["role"] === $config["ROLES"][0]) :?>
													</a>
												<?php endif ?>

											</h3>
											<small class="block text-ellipsis m-b-15">
												<span class="text-muted">Avec </span> <span class="text-xs"><?php echo $total_par_departement; ?> employée(s)</span>
											</small><br><br><br>
											<p>
												<span class="text-muted"><?php echo $nom_departement ?></span>
												<small class="block text-ellipsis m-b-15">
													<span class="text-muted">Avec </span> <span class="text-xs"><?php echo $total_par_etablissement; ?> etablissement(s)</span>
												</small>
											</p>
											
											<div class="project-members m-b-15">
												<div>Chef du departement :</div>
												<ul class="team-members">
													<li>
														<a href="/epn/profile.php?id=<?php echo $id_chef_departement; ?>" data-toggle="tooltip" title="<?php echo $nom_chef_departement.' '.$prenom_chef_departement; ?>"><img alt="" src="/epn/assets/img/employee/<?php echo $image_chef_departement; ?>"></a>
													</li>
												</ul>
											</div>
											<div class="project-members m-b-15">
												<div>Membres :</div>
												<ul class="team-members">
													<?php
														$sql4 = "SELECT * FROM employee 
																WHERE id_departement = '$id_departement' limit 3 ";
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
											<p class="m-b-5">Pourcentage <span class="text-success float-right"><?php echo $p_departement; ?>%</span></p>
											<div class="progress progress-xs mb-0">
												<div class="progress-bar bg-success" role="progressbar" data-toggle="tooltip" title="<?php echo $p_departement; ?>%" style="width: <?php echo $p_departement; ?>%"></div>
											</div>
										</div>
									</div>
								</div>	
						<?php
						
						include("../../includes/modals/departement/supprimer_departement.php");
						include("../../includes/modals/departement/modifier_departement.php");

						$cnt +=1; 
    }
    } ?>		
					</div>

                </div>
				<!-- /Page Content -->
				
				<!-- Add Department Modal -->
				<?php include_once("../../includes/modals/departement/ajouter_departement.php");?>
				<!-- /Add Department Modal -->
				
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