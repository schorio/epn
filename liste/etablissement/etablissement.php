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
        <title>Listes des etablissements</title>
		
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
								<h3 class="page-title">Etablissement</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">Listes</li>
									<li class="breadcrumb-item active"><a href="">Listes des etablissements</a></li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
								<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_etablissement"><i class="fa fa-plus"></i> Ajouter un etablissement</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<!-- user profiles list starts her -->
					<!-- <div class="row staff-grid-row"> -->
					<div class="row">
						<?php
							$sql = "SELECT  etablissement.id_etablissement, 
											etablissement.code_etablissement, 
											etablissement.nom_etablissement,
											etablissement.type_etablissement,
											etablissement.id_chef_etablissement,
											departement.id_departement, 
											departement.code_departement, 
											departement.nom_departement, 
											employee.matricule,
											employee.nom,
											employee.prenom,
											employee.image
										FROM etablissement
											 JOIN departement ON etablissement.id_departement=departement.id_departement
											 JOIN employee ON etablissement.id_chef_etablissement=employee.id_employee 
										ORDER BY code_etablissement ASC
									";

							$query = $dbh->prepare($sql);
							$query->execute();
							$results=$query->fetchAll(PDO::FETCH_OBJ);
							$cnt=1;
							if($query->rowCount() > 0)
							{
								foreach($results as $row)
									{	
										$id_etablissement = htmlentities($row->id_etablissement);
										$code_etablissement = htmlentities($row->code_etablissement);
										$nom_etablissement = htmlentities($row->nom_etablissement);
                                        $type_etablissement = htmlentities($row->type_etablissement);
                                        $id_departement = htmlentities($row->id_departement);
                                        $nom_departement = htmlentities($row->nom_departement);
										$code_departement = htmlentities($row->code_departement);
										$id_chef_etablissement = htmlentities($row->id_chef_etablissement);
										$nom_chef_etablissement = htmlentities($row->nom);
										$prenom_chef_etablissement = htmlentities($row->prenom);
										$image_chef_etablissement = htmlentities($row->image);

										$sql1 = "SELECT id_employee FROM employee WHERE id_etablissement='$id_etablissement'";
										$query1 = $dbh->prepare($sql1);
										$query1->execute();
										$results=$query1->fetchAll(PDO::FETCH_OBJ);
										$total_par_etablissement=$query1->rowCount();

										$sql3 = "SELECT id_employee FROM employee";
										$query3 = $dbh->prepare($sql3);
										$query3->execute();
										$results=$query3->fetchAll(PDO::FETCH_OBJ);
										$total_employee=$query3->rowCount();

										$p_etablissement = round(($total_par_etablissement * 100) / $total_employee);

										if ($total_par_etablissement <=2 ) {
											$plus = '';
										}
										else{
											$plus = '<a href="list_par_etablissement.php?code_e='.$code_etablissement.'" class="all-users dropdown-toggle">+</a>';
										}


						?>	

								<div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
									<div class="card">
										<div class="card-body">
											<div class="dropdown dropdown-action profile-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_etablissement<?php echo $id_etablissement ?>"><i class="fa fa-pencil m-r-5"></i> Modifier</a>
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_etablissement<?php echo $id_etablissement ?>"><i class="fa fa-pencil m-r-5"></i> Supprimer</a>
												</div>
											</div>											
											<h3 class="project-title">

												<?php if (($_SESSION["role"] === $config["ROLES"][0]) || ($_SESSION['departement'] === $code_departement)) :?>
													<a href="/epn/liste/etablissement/list_par_etablissement.php?code_e=<?php echo $code_etablissement ?>">
												<?php endif ?>

													<?php echo $code_etablissement; ?>

												<?php if (($_SESSION["role"] === $config["ROLES"][0]) || ($_SESSION['departement'] === $code_departement)) :?>
													</a>
												<?php endif ?>

											</h3>
											<small class="block text-ellipsis m-b-15">
												<span class="text-muted">Avec </span> <span class="text-xs"><?php echo $total_par_etablissement; ?> employée(s)</span>
											</small><br><br><br>
                                            <p>
												<span class="text-muted"><?php echo $nom_etablissement ?></span>
												<small class="block text-ellipsis m-b-15">
													<span class="text-xs">Domaine : <?php echo $type_etablissement; ?></span><br>
                                                    <span class="text-xs">Departement : <?php echo $code_departement; ?></span>
												</small>
											</p>

											<div class="project-members m-b-15">
												<div>Chef de l'etablissement :</div>
												<ul class="team-members">
													<li>
														<a href="/epn/profile.php?id=<?php echo $id_chef_etablissement; ?>" data-toggle="tooltip" title="<?php echo $nom_chef_etablissement.' '.$prenom_chef_etablissement; ?>"><img alt="" src="/epn/assets/img/employee/<?php echo $image_chef_etablissement; ?>"></a>
													</li>
												</ul>
											</div>

											<div class="project-members m-b-15">
												<div>Membres :</div>
												<ul class="team-members">
													<?php
														$sql4 = "SELECT * FROM employee 
																WHERE id_etablissement = '$id_etablissement' limit 3 ";
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
											<p class="m-b-5">Pourcentage <span class="text-success float-right"><?php echo $p_etablissement; ?>%</span></p>
											<div class="progress progress-xs mb-0">
												<div class="progress-bar bg-success" role="progressbar" data-toggle="tooltip" title="<?php echo $p_etablissement; ?>%" style="width: <?php echo $p_etablissement; ?>%"></div>
											</div>
										</div>
									</div>
								</div>

						<?php 

							include("../../includes/modals/etablissement/modifier_etablissement.php");
							include("../../includes/modals/etablissement/supprimer_etablissement.php");

							$cnt +=1; 
    								}

								

    						} 
						?>		
					</div>

					



                </div>
				<!-- /Page Content -->
				
				<!-- Add etablissement Modal -->
				<?php include_once("../../includes/modals/etablissement/ajouter_etablissement.php");?>
				<!-- /Add etablissement Modal -->

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

		<script>
			$(document).ready(function(){
			$('.action').change(function(){
				if($(this).val() != '')
				{
				var action = $(this).attr("id");
				var query = $(this).val();
				var result = '';

				if(action == "et_id_departement")
				{
					result = 'id_chef_etablissement';
				}

				$.ajax({
				url:"/epn/includes/fetchdata.php",
				method:"POST",
				data:{action:action, query:query},
					success:function(data)
					{
					$('#'+result).html(data);
					}
				})
				
				}
			});
			});
		</script>
		
    </body>
</html>