<?php 
	session_start();
	error_reporting(0);
	include('includes/config.php');
	include_once("includes/functions.php");
	
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
        <title>Modifier un employee</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
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
							<h3 class="page-title">Employés</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="/epn/liste/employee/employees.php">Listes des employés</a></li>
									<li class="breadcrumb-item active">Modifier un(e) employé(e)</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<?php

						if(isset($_GET["edit_emp"]) && !empty(trim($_GET["edit_emp"]))){

							$edit_emp = trim($_GET["edit_emp"]);

							$sql = "SELECT * FROM employee
											JOIN departement ON employee.id_departement=departement.id_departement 
											JOIN etablissement ON employee.id_etablissement=etablissement.id_etablissement 
											JOIN grade ON employee.id_grade=grade.id_grade 
											JOIN categorie ON employee.id_categorie=categorie.id_categorie 
											JOIN statut ON employee.id_statut=statut.id_statut 
											WHERE id_employee = '$edit_emp'";
							$query = $dbh->prepare($sql);
							$query->execute();
							$results=$query->fetch(PDO::FETCH_ASSOC);
							
								$id_employee = $results['id_employee'];
								$matricule = $results['matricule'];
								$nom = $results['nom'];
								$prenom = $results['prenom'];
								$date_naissance = $results['date_naissance'];
								$code_etablissement = $results['code_etablissement'];
								$id_etablissement = $results['id_etablissement'];
								$code_departement = $results['code_departement'];
								$id_departement = $results['id_departement'];
								$code_statut = $results['code_statut'];
								$id_statut = $results['id_statut'];
								$code_categorie = $results['code_categorie'];
								$id_categorie = $results['id_categorie'];
								$code_grade = $results['code_grade'];
								$id_grade = $results['id_grade'];
								$d_contrat = $results['d_contrat'];
								$avancement = $results['avancement'];
								$f_contrat = $results['f_contrat'];
								$d_retraite = $results['d_retraite'];
								$genre = $results['genre'];
								$telephone = $results['telephone'];
								$adresse = $results['adresse'];
								$email = $results['email'];
								$image = $results['image'];

						}
					?>


					<div class="card mb-0">
						<div class="card-body">
							<form id="sampleForm_1" name="sampleForm_1" method="POST" enctype="multipart/form-data">
								<div class="row">
									<input type="hidden" name="id_employee" value="<?php echo $id_employee; ?>">
									<div class="col-md-12">
										<div class="profile-img-wrap edit-img">
											<img id="photo" class="inline-block" src="/epn/assets/img/employee/<?php echo $image; ?>" alt="user">
											<input class="form-control" name="image_2" value="<?php echo $image; ?>" type="hidden">
											<div class="fileupload btn">
												<span id="uploadBtn" class="btn-text">edit</span>
												<input id="file" name="image" class="upload" type="file">
											</div>
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Matricule : <span class="text-danger">*</span></label>
											<input name="n_matricule" required class="form-control" type="number" value="<?php echo $matricule; ?>">
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Nom : <span class="text-danger">*</span></label>
											<input name="n_nom" required class="form-control" type="text" value="<?php echo $nom; ?>">
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Prénoms : </label>
											<input name="n_prenom" required class="form-control" type="text" value="<?php echo $prenom; ?>">
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Date de naissance : <span class="text-danger">*</span></label>
											<input id="i_date_naissance" name="n_date_naissance" required class="form-control" type="date" value="<?php echo $date_naissance; ?>">
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Genre : <span class="text-danger">*</span></label>
											<select name="n_genre" required class="select" value="<?php echo $genre; ?>">
												<option value="Homme">Homme</option>
												<option value="Femme">Femme</option>
											</select>
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Téléphone : <span class="text-danger">*</span></label>
											<input name="n_telephone" required class="form-control" maxlength="10" type="tel" value="<?php echo $telephone; ?>">
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Adresse : <span class="text-danger">*</span></label>
											<input name="n_adresse" required class="form-control" type="text" value="<?php echo $adresse; ?>">
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Adresse Email : <span class="text-danger">*</span></label>
											<input name="n_email" required class="form-control" type="email" value="<?php echo $email; ?>">
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label>Departement : <span class="text-danger">*</span></label>
											<?php if ($_SESSION["role"] !== $config["ROLES"][0]) :?>
												<input name="n_id_departement" readonly value="<?php echo $_SESSION['departement']; ?>" class="form-control" type="text">
											<?php else: ?>
												<select required id="n_id_departement" name="n_id_departement" class="select action">
												<option value="<?php echo $id_departement; ?>"><?php echo $code_departement; ?></option>
													<?php 
													$sql2 = "SELECT * from departement";
													$query2 = $dbh -> prepare($sql2);
													$query2->execute();
													$result2=$query2->fetchAll(PDO::FETCH_OBJ);
													foreach($result2 as $row)
													{          
														?>  
													<option value="<?php echo htmlentities($row->id_departement);?>">
													<?php echo htmlentities($row->code_departement);?></option>
													<?php } ?> 
												</select>
											<?php endif ?>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Etablissement : <span class="text-danger">*</span></label>
											<select required id="n_id_etablissement" name="n_id_etablissement" class="select action">
												<option value="<?php echo $id_etablissement; ?>"><?php echo $code_etablissement; ?></option>											</select>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Statut : <span class="text-danger">*</span></label>
											<select id="i_code_statut" required name="n_id_statut" class="select">
											<option><?php echo $code_statut; ?></option>
												<?php 
													$sql2 = "SELECT * from statut";
													$query2 = $dbh -> prepare($sql2);
													$query2->execute();
													$result2=$query2->fetchAll(PDO::FETCH_OBJ);
													foreach($result2 as $row)
													{          
												?>  
													<option value="<?php echo htmlentities($row->code_statut);?>">
												<?php echo htmlentities($row->code_statut);?></option>
												<?php
													} 
												?> 
											</select>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Categorie : <span class="text-danger">*</span></label>
											<select id="i_code_categorie" required name="n_id_categorie" class="select">
											<option><?php echo $code_categorie; ?></option>
												<?php 
										$sql2 = "SELECT * from categorie";
										$query2 = $dbh -> prepare($sql2);
										$query2->execute();
										$result2=$query2->fetchAll(PDO::FETCH_OBJ);
										foreach($result2 as $row)
										{          
											?>  
										<option value="<?php echo htmlentities($row->code_categorie);?>">
										<?php echo htmlentities($row->code_categorie);?></option>
										<?php } ?> 
											</select>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Grade : <span class="text-danger">*</span></label>
											<select id="i_code_grade" required name="n_id_grade" class="select">
											<option><?php echo $code_grade; ?></option>
												<?php 
										$sql2 = "SELECT * from grade";
										$query2 = $dbh -> prepare($sql2);
										$query2->execute();
										$result2=$query2->fetchAll(PDO::FETCH_OBJ);
										foreach($result2 as $row)
										{          
												?>  
											<option value="<?php echo htmlentities($row->code_grade);?>">
											<?php echo htmlentities($row->code_grade);?></option>
												<?php 
										} 
												?> 
											</select>
										</div>
									</div>
									
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Date de debut du contrat : <span class="text-danger">*</span></label>
											<input id="i_d_contrat" name="n_d_contrat" required class="form-control" type="date" value="<?php echo $d_contrat; ?>">
										</div>
									</div>
									
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Date d'avancement : <span class="text-danger">*</span></label>
											<input readonly name="n_avancement" class="form-control" type="date" value="<?php echo $avancement; ?>">
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Date de fin de contrat : <span class="text-danger">*</span></label>
											<input readonly name="n_f_contrat" class="form-control" type="date" value="<?php echo $f_contrat; ?>">
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">Date de retraite : <span class="text-danger">*</span></label>
											<input readonly name="n_d_retraite" class="form-control" type="date" value="<?php echo $d_retraite; ?>">
										</div>
									</div>

								</div>
								
								<div class="submit-section">
									<button type="submit" name="modifier_employee" class="btn btn-primary submit-btn">Enregistrer</button>
								</div>
							</form>
						</div>
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

		<!-- Generer les dates -->
		<script src="assets/js/condition_date__.js"></script>
		
		<script>
			$(document).ready(function(){
			$('.action').change(function(){
				if($(this).val() != '')
				{
				var action = $(this).attr("id");
				var query = $(this).val();
				var result = '';

				if(action == "n_id_departement")
				{
					result = 'n_id_etablissement';
				}

				$.ajax({
				url:"includes/fetchdata.php",
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