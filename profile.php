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
        <title>Profile - EPN</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/EPN.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="assets/css/line-awesome.min.css">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/css/select2.min.css">
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
		
		<!-- Tagsinput CSS -->
		<link rel="stylesheet" href="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <?php include_once("includes/header.php");?>
			<!-- /Header -->
			
			<!-- Sidebar -->
            <?php include_once("includes/sidebar.php");?>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Profile</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="/epn/liste/employee/employees.php">Listes des employés</a></li>
									<li class="breadcrumb-item active">Profile</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<?php
						// Check existence of id parameter before processing further
						if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
							
							// Prepare a select statement
							$sql = "SELECT * FROM employee  
											JOIN departement ON employee.id_departement=departement.id_departement 
											JOIN etablissement ON employee.id_etablissement=etablissement.id_etablissement 
											JOIN grade ON employee.id_grade=grade.id_grade 
											JOIN categorie ON employee.id_categorie=categorie.id_categorie 
											JOIN statut ON employee.id_statut=statut.id_statut 
											WHERE id_employee = ?";
							
							if($stmt = mysqli_prepare($link, $sql)){
								// Bind variables to the prepared statement as parameters
								mysqli_stmt_bind_param($stmt, "i", $param_id);
								
								// Set parameters
								$param_id = trim($_GET["id"]);
								
								// Attempt to execute the prepared statement
								if(mysqli_stmt_execute($stmt)){
									$result = mysqli_stmt_get_result($stmt);
							
									if(mysqli_num_rows($result) == 1){
										/* Fetch result row as an associative array. Since the result set
										contains only one row, we don't need to use while loop */
										$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
										
										// Retrieve individual field value
										$id_employee = $row["id_employee"];
										$matricule = $row["matricule"];
										$nom = $row["nom"];
										$prenom = $row["prenom"];
										$date_naissance = $row["date_naissance"];
										$code_etablissement = $row["code_etablissement"];
										$code_departement = $row["code_departement"];
										$code_statut = $row["code_statut"];
										$code_categorie = $row["code_categorie"];
										$code_grade = $row["code_grade"];
										$d_contrat = $row["d_contrat"];
										$avancement = $row["avancement"];
										$f_contrat = $row["f_contrat"];
										$d_retraite = $row["d_retraite"];
										$image = $row["image"];
										$telephone = $row["telephone"];
										$email = $row["email"];
										$adresse = $row["adresse"];
										$genre = $row["genre"];

										$d_naissance = strtotime($date_naissance);
										$n_d_naissance = date('d M Y', $d_naissance);

										$d_d_contrat = strtotime($d_contrat);
										$n_d_d_contrat = date('d M Y', $d_d_contrat);

										$d_avancement = strtotime($avancement);
										$n_d_avancement = date('d M Y', $d_avancement);

										$d_f_contrat = strtotime($f_contrat);
										$n_d_f_contrat = date('d M Y', $d_f_contrat);

										$d_d_retraite = strtotime($d_retraite);
										$n_d_d_retraite = date('d M Y', $d_d_retraite);

									}
									
								}
								else{
									echo "Oops! Something went wrong. Please try again later.";
								}
							}
							
							// Close statement
							mysqli_stmt_close($stmt);
							
							// Close connection
							mysqli_close($link);
						}
					?>

					
					<div class="card mb-2">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="profile-view">
										<div class="profile-img-wrap">
											<div class="profile-img">
												<a href="#"><img alt="" src="/epn/assets/img/employee/<?php echo $image ?>"></a>
											</div>
										</div>
										<div class="profile-basic">
											<div class="row">
												<div class="col-md-3">
													<div class="profile-info-left">
														<h3 class="user-name m-t-0 mb-0"><?php echo $nom ?></h3>
														<h4 class="user-name m-t-0 mb-0"><?php echo $prenom ?></h4><br>
														<small class="text-muted">Departement : </small><small class="text-xs"><?php echo $code_departement ?></small><br>
														<small class="text-muted">Etablissement : </small><small class="text-xs"><?php echo $code_etablissement ?></small><hr>
														<div class="staff-id">Matricule : <small class="text-xs"><?php echo $matricule ?></small></div><br><br><br>
													</div>
												</div>
												<div class="col-md-7">
													<ul class="personal-info">
														<li>
															<div class="title">Téléphone :</div>
															<div class="text"><a href=""><?php echo $telephone ?></a></div>
														</li>
														<li>
															<div class="title">Email :</div>
															<div class="text"><a href=""><?php echo $email ?></a></div>
														</li>
														<li>
															<div class="title">Née le :</div>
															<div class="text"><?php echo $n_d_naissance ?></div>
														</li>
														<li>
															<div class="title">Adresse :</div>
															<div class="text"><?php echo $adresse ?></div>
														</li>
														<li>
															<div class="title">Genre :</div>
															<div class="text"><?php echo $genre ?></div>
														</li>
														<li>
															<div class="title">Reports to:</div>
															<div class="text">
															   <div class="avatar-box">
																  <div class="avatar avatar-xs">
																	 <img src="assets/img/profiles/avatar-16.jpg" alt="">
																  </div>
															   </div>
															   <a href="profile.php">
																	Jeffery Lalor
																</a>
															</div>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<div class="pro-edit"><a class="edit-icon" href="edit_employee.php?edit_emp=<?php echo $id_employee; ?>"><i class="fa fa-pencil"></i></a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="tab-content">
					
						<!-- Profile Info Tab -->
						<div class="pro-overview tab-pane fade show active">
							<div class="row">
								
								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">Plus d'information</h3>
											<ul class="personal-info">
												<li>
													<div class="title">Date de debut du contrat :</div>
													<div><?php echo $n_d_d_contrat; ?></div>
												</li>
												<li>
													<div class="title">Date d'avancement :</div>
													<div><?php echo $n_d_avancement; ?></div>
												</li>
												<li>
													<div class="title">Date de fin de contrat :</div>
													<div><?php echo $n_d_f_contrat; ?></div>
												</li>
												<li>
													<div class="title">date de retraite :</div>
													<div><?php echo $n_d_d_retraite; ?></div>
												</li>
											</ul>
										</div>
									</div>
								</div>

								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">Information sur la fonction</h3>
											<div class="experience-box">
												<ul class="experience-list">
													<li>
														<div class="experience-user">
															<div class="before-circle"></div>
														</div>
														<div class="experience-content">
															<div class="timeline-content">
																<a href="#/" class="name">Departement : </a><?php echo $code_departement; ?>
															</div>
														</div>
													</li>
													<li>
														<div class="experience-user">
															<div class="before-circle"></div>
														</div>
														<div class="experience-content">
															<div class="timeline-content">
																<a href="#/" class="name">Statut : </a><?php echo $code_statut; ?>
															</div>
														</div>
													</li>
													<li>
														<div class="experience-user">
															<div class="before-circle"></div>
														</div>
														<div class="experience-content">
															<div class="timeline-content">
																<a href="#/" class="name">Grade : </a><?php echo $code_grade; ?>
															</div>
														</div>
													</li>
													<li>
														<div class="experience-user">
															<div class="before-circle"></div>
														</div>
														<div class="experience-content">
															<div class="timeline-content">
																<a href="#/" class="name">Categorie : </a><?php echo $code_categorie; ?>
															</div>
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>

							</div>
							
						</div>
						<!-- /Profile Info Tab -->
						
					</div>

                </div>
				<!-- /Page Content -->

            </div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>

		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

		<!-- Slimscroll JS -->
		<script src="assets/js/jquery.slimscroll.min.js"></script>
		
		<!-- Select2 JS -->
		<script src="assets/js/select2.min.js"></script>
		
		<!-- Datetimepicker JS -->
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		
		<!-- Tagsinput JS -->
		<script src="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

		<!-- Custom JS -->
		<script src="assets/js/app.js"></script>
		
    </body>
</html>