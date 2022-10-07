<?php 
	session_start();
	error_reporting(0);
	include_once('../../../includes/config.php');
	include_once '../../../includes/functions.php';
	if(strlen($_SESSION['userlogin'])==0){
		header('location: ../../../login.php');
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
        <title>Changer le mot de passe - EPN</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="../../../assets/img/EPN.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="../../../assets/css/font-awesome.min.css">
		
		<!-- Lineawesome CSS -->
		<link rel="stylesheet" href="../../../assets/css/line-awesome.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="../../../assets/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="../../../assets/js/html5shiv.min.js"></script>
			<script src="../../../assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <?php include_once("../../../includes/header.php");?>
			<!-- /Header -->
			
			<!-- Sidebar -->
            <?php include_once("../../../includes/setting_sidebar.php");?>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
					<div class="row">
						<div class="col-md-8" style="padding: 35px 0px 0px 60px;">
						
							<!-- Page Header -->
							<div class="page-header">
								<div class="row">
									<div class="col-sm-12">
										<h3 class="page-title">Changer le mot de passe</h3>
									</div>
								</div>
							</div>
							<!-- /Page Header -->
							<!-- <php if($npass == $currentpassword){echo "they matched";}else{echo "they did not matched";} ?> -->
							<form method="POST" enctype="multipart/form-data"> 
								<input type="hidden" name="password_ut" value="<?php echo $r_user['password_ut']; ?>">
								<input type="hidden" name="edit_id" value="<?php echo $r_user['id_ut']; ?>">
								<div class="form-group">
									<label>Ancien mot de passe</label>
									<input required name="a_mdp" type="password" class="form-control">
								</div>
								<div class="form-group">
									<label>Nouveau mot de passe</label>
									<input required name="n_mdp" type="password" class="form-control">
								</div>
								<div class="form-group">
									<h5 id="reponse"></h5>
									<label>Confirmer le mot de passe </label>
									<input required name="n__mdp" type="password" class="form-control">
								</div>
								<div class="submit-section">
									<button type="submit" name="changer_mdp" class="btn btn-primary submit-btn">Enregistrer</button>
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
		<?php include("../../../includes/modals/utilisateur/modifier_ut.php"); ?>

		<!-- jQuery -->
        <script src="../../../assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="../../../assets/js/popper.min.js"></script>
        <script src="../../../assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
		<script src="../../../assets/js/jquery.slimscroll.min.js"></script>
		
		<!-- Select2 JS -->
		<script src="../../../assets/js/select2.min.js"></script>
		
		<!-- Custom JS -->
		<script src="../../../assets/js/app.js"></script>

		<script>
			$(document).ready(function()
			{
				$('#n_mdp_, #n_mdp').change(function()
				{

					var message = document.getElementById("reponse");
					let n_mdp_ = document.getElementById("n_mdp_").value;
					let n_mdp = document.getElementById("n_mdp").value;

					if (n_mdp !== n_mdp_){
						var m = "Invalide";
					}
					else{
						var m = "";
					}
					message.innerHTML = m;
				});
			});

		</script>

    </body>
</html>