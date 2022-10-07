<?php 
	session_start();
	error_reporting(0);
	include_once('../../includes/config.php');
	include_once("../../includes/functions.php");

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
        <title> Listes des employés</title>
		
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
								<h3 class="page-title">Employés</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="employees.php">Listes</a></li>
									<li class="breadcrumb-item active">Listes des employés <?php if ($_SESSION["role"] !== $config["ROLES"][0]){ echo "de votre departement"; } ?></li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
								<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> Ajouter un(e) employé(e)</a>
								<div class="view-icons">
									<a href="employees.php" title="Vue en grille" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
									<a href="employees-list.php" title="Vue en Tableau" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
								</div>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<!-- Search Filter -->
					<div class="row filter-row">
						<div class="col-sm-6 col-md-8">  
							<div class="form-group form-focus">
								<input type="text" name="search_1" id="search_1" class="form-control floating">
								<label class="focus-label">Entrer les mots clés</label>
							</div>
						</div>
                    </div>
					<!-- Search Filter -->

					<!-- user profiles list starts her -->
					<div class="row staff-grid-row">

							<?php

							$ut_departement = $_SESSION['departement'];

							if ($_SESSION["role"] !== $config["ROLES"][0]) {
								$sql = "SELECT * FROM employee 
											JOIN departement ON employee.id_departement=departement.id_departement 
											JOIN etablissement ON employee.id_etablissement=etablissement.id_etablissement 
											JOIN grade ON employee.id_grade=grade.id_grade 
											JOIN categorie ON employee.id_categorie=categorie.id_categorie 
											JOIN statut ON employee.id_statut=statut.id_statut 
										WHERE code_departement='$ut_departement' ORDER BY prenom ASC ";
							}
							else {
								$sql = "SELECT * FROM employee 
											JOIN departement ON employee.id_departement=departement.id_departement 
											JOIN etablissement ON employee.id_etablissement=etablissement.id_etablissement 
											JOIN grade ON employee.id_grade=grade.id_grade 
											JOIN categorie ON employee.id_categorie=categorie.id_categorie 
											JOIN statut ON employee.id_statut=statut.id_statut ORDER BY prenom ASC ";
							}

							$query = $dbh->prepare($sql);
							$query->execute();
							$results=$query->fetchAll(PDO::FETCH_OBJ);
							$cnt=1;
							if($query->rowCount() > 0)
							{
								foreach($results as $row)
								{	
											$id_employee = htmlentities($row->id_employee);
											$matricule = htmlentities($row->matricule);
											$nom = htmlentities($row->nom);
											$prenom = htmlentities($row->prenom);
											$date_naissance = htmlentities($row->date_naissance);
											$code_departement = htmlentities($row->code_departement);
											$code_statut = htmlentities($row->code_statut);
											$code_categorie = htmlentities($row->code_categorie);
											$code_grade = htmlentities($row->code_grade);
											$d_contrat = htmlentities($row->d_contrat);
											$avancement = htmlentities($row->avancement);
											$f_contrat = htmlentities($row->f_contrat);
											$d_retraite = htmlentities($row->d_retraite);
											$genre = htmlentities($row->genre);
											$telephone = htmlentities($row->telephone);
											$adresse = htmlentities($row->adresse);
											$email = htmlentities($row->email);
											$image = htmlentities($row->image);

									?>
						<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
							<div class="profile-widget">
								<div class="profile-img">
									<a href="/epn/profile.php?id=<?php echo $id_employee ?>" class="avatar"><img src="/epn/assets/img/employee/<?php echo $image ?>" alt="image"></a>
								</div>
									<div class="dropdown profile-action">
										<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="/epn/edit_employee.php?edit_emp=<?php echo $id_employee; ?>"><i class="fa fa-pencil m-r-5"></i> Modifier</a>
											<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee<?php echo $id_employee ?>"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
										</div>
									</div>
								<div>
									<h4 class="user-name m-t-10 mb-0 text-ellipsis"><?php echo $prenom ?></h4>
									<h6 class="user-name text-ellipsis"><?php echo $nom ?></h6>
								</div>
								<div class="small text-muted" style="font-weight: 500">
									<?php echo $code_departement ?>
								</div>
							</div>
						</div>	
						<?php
						
						// include("../../includes/modals/employee/edit_employee.php");			
						include("../../includes/modals/employee/delete_employee.php");

								}
						$cnt +=1; 
							}
						?>		
					</div>

    			</div>
				<!-- /Page Content -->
				
				<!-- Add Employee Modal -->
				<?php include_once("../../includes/modals/employee/add_employee.php"); ?>
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
		
		<!-- Custom JS -->
		<script src="../../assets/js/app.js"></script>

		<!-- Generer les dates -->
		<script src="../../assets/js/condition_date_.js"></script>
		
		<!-- Recherche instantannée -->
		<script src="../../assets/js/recherche.js"></script>

		<script>
			$(document).ready(function(){
			$('.action').change(function(){
				if($(this).val() != '')
				{
				var action = $(this).attr("id");
				var query = $(this).val();
				var result = '';

				if(action == "id_departement")
				{
					result = 'id_etablissement';
				}

				$.ajax({
				url:"../../includes/fetchdata.php",
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