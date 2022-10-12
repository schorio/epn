<?php 
	session_start();
	error_reporting(0);
	include('includes/config.php');
	if(strlen($_SESSION['userlogin'])==0){
		header('location:login.php');
	}


	$aujourdhuit = date('d M Y');
	$now = date("Y-m-d");
	$d = strtotime("+3 Days");
	$trois_jours = date("Y-m-d", $d);
	$ce_mois = date("n");
	$cette_annee = date("Y");



	
	

	$sql5 = "SELECT * FROM employee WHERE avancement BETWEEN '$now' AND '$trois_jours' ";
	$query5 = $dbh->prepare($sql5);
	$query5->execute();
	$results = $query5->fetchAll(PDO::FETCH_OBJ);
	$totalcount_avancement = $query5->rowCount();

	$sql6 = "SELECT * FROM employee WHERE f_contrat BETWEEN '$now' AND '$trois_jours' ";
	$query6 = $dbh->prepare($sql6);
	$query6->execute();
	$results = $query6->fetchAll(PDO::FETCH_OBJ);
	$totalcount_f_contrat = $query6->rowCount();

	$sql7 = "SELECT * FROM employee WHERE d_retraite BETWEEN '$now' AND '$trois_jours' ";
	$query7 = $dbh->prepare($sql7);
	$query7->execute();
	$results = $query7->fetchAll(PDO::FETCH_OBJ);
	$totalcount_d_retraite = $query7->rowCount();



	$sql8 = "SELECT * FROM employee WHERE month(avancement)='$ce_mois' and year(avancement)='$cette_annee' ";
	$query8 = $dbh->prepare($sql8);
	$query8->execute();
	$results = $query8->fetchAll(PDO::FETCH_OBJ);
	$totalcount_avancement_mois = $query8->rowCount();

	$sql9 = "SELECT * FROM employee WHERE month(f_contrat)='$ce_mois' and year(f_contrat)='$cette_annee' ";
	$query9 = $dbh->prepare($sql9);
	$query9->execute();
	$results = $query9->fetchAll(PDO::FETCH_OBJ);
	$totalcount_f_contrat_mois = $query9->rowCount();
	
	$sql_10 = "SELECT * FROM employee WHERE month(d_retraite)='$ce_mois' and year(d_retraite)='$cette_annee' ";
	$query_10 = $dbh->prepare($sql_10);
	$query_10->execute();
	$results = $query_10->fetchAll(PDO::FETCH_OBJ);
	$totalcount_d_retraite_mois = $query_10->rowCount();

	$sql11 = "SELECT matricule from employee";
	$query11 = $dbh->prepare($sql11);
	$query11->execute();
	$results11 = $query11->fetchAll(PDO::FETCH_OBJ);
	$totalcount_employee = $query11->rowCount();

	$sql12 = "SELECT id_departement from departement";
	$query12 = $dbh->prepare($sql12);
	$query12->execute();
	$results12 = $query12->fetchAll(PDO::FETCH_OBJ);
	$totalcount_departement = $query12->rowCount();

	$sql13 = "SELECT id_statut from statut";
	$query13 = $dbh->prepare($sql13);
	$query13->execute();
	$results13 = $query13->fetchAll(PDO::FETCH_OBJ);
	$totalcount_statut = $query13->rowCount();

	$sql14 = "SELECT id_grade from grade";
	$query14 = $dbh->prepare($sql14);
	$query14->execute();
	$results14 = $query14->fetchAll(PDO::FETCH_OBJ);
	$totalcount_grade = $query14->rowCount();

	$sql15 = "SELECT id_categorie from categorie";
	$query15 = $dbh->prepare($sql15);
	$query15->execute();
	$results15 = $query15->fetchAll(PDO::FETCH_OBJ);
	$totalcount_categorie = $query15->rowCount();

	$sql16 = "SELECT id_etablissement from etablissement";
	$query16 = $dbh->prepare($sql16);
	$query16->execute();
	$results16 = $query16->fetchAll(PDO::FETCH_OBJ);
	$totalcount_etablissement = $query16->rowCount();

	
	$sql8 = "SELECT * FROM employee WHERE year(avancement)='$cette_annee' ";
	$query8 = $dbh->prepare($sql8);
	$query8->execute();
	$results = $query8->fetchAll(PDO::FETCH_OBJ);
	$totalcount_avancement_annee = $query8->rowCount();

	$sql9 = "SELECT * FROM employee WHERE year(f_contrat)='$cette_annee' ";
	$query9 = $dbh->prepare($sql9);
	$query9->execute();
	$results = $query9->fetchAll(PDO::FETCH_OBJ);
	$totalcount_f_contrat_annee = $query9->rowCount();
	
	$sql_20 = "SELECT * FROM employee WHERE year(d_retraite)='$cette_annee' ";
	$query_20 = $dbh->prepare($sql_20);
	$query_20->execute();
	$results = $query_20->fetchAll(PDO::FETCH_OBJ);
	$totalcount_d_retraite_annee = $query_20->rowCount();

	// $req = mysqli_query($link, "SELECT * FROM graphe_mois");

	// foreach($req as $data){
	// 	$dep[] = $data['code_departement'];	
	// 	$nombre_r[] = $data['nombre_r'];
	// }
					

	$req = mysqli_query($link, "SELECT * FROM departement");
    $i = $j = $k = 0;

	foreach($req as $data){
		$dep[] = $data['code_departement'];
        $dd = $dep[$i];
        if ($dd){
			$sql_21 = "SELECT * FROM employee 
							JOIN departement ON employee.id_departement=departement.id_departement 
							JOIN etablissement ON employee.id_etablissement=etablissement.id_etablissement 
							JOIN grade ON employee.id_grade=grade.id_grade 
							JOIN categorie ON employee.id_categorie=categorie.id_categorie 
							JOIN statut ON employee.id_statut=statut.id_statut 
						WHERE code_departement='$dd' ";
            $query_21 = $dbh->prepare($sql_21);
            $query_21->execute();
            $results = $query_21->fetchAll(PDO::FETCH_OBJ);
            $totalcount_employee_1[$k] = $query_21->rowCount();

            $sql_22 = "SELECT * FROM employee 
							JOIN departement ON employee.id_departement=departement.id_departement 
							JOIN etablissement ON employee.id_etablissement=etablissement.id_etablissement 
							JOIN grade ON employee.id_grade=grade.id_grade 
							JOIN categorie ON employee.id_categorie=categorie.id_categorie 
							JOIN statut ON employee.id_statut=statut.id_statut 
						WHERE year(d_retraite)='$cette_annee' and code_departement='$dd' ";
            $query_22 = $dbh->prepare($sql_22);
            $query_22->execute();
            $results = $query_22->fetchAll(PDO::FETCH_OBJ);
            $totalcount_d_retraite_annee_1[$k] = $query_22->rowCount();

			$sql_23 = "SELECT * FROM employee 
							JOIN departement ON employee.id_departement=departement.id_departement 
							JOIN etablissement ON employee.id_etablissement=etablissement.id_etablissement 
							JOIN grade ON employee.id_grade=grade.id_grade 
							JOIN categorie ON employee.id_categorie=categorie.id_categorie 
							JOIN statut ON employee.id_statut=statut.id_statut 
						WHERE year(f_contrat)='$cette_annee' and code_departement='$dd' ";
            $query_23 = $dbh->prepare($sql_23);
            $query_23->execute();
            $results = $query_23->fetchAll(PDO::FETCH_OBJ);
            $totalcount_f_contrat_annee_1[$k] = $query_23->rowCount();

			$sql_24 = "SELECT * FROM employee 
							JOIN departement ON employee.id_departement=departement.id_departement 
							JOIN etablissement ON employee.id_etablissement=etablissement.id_etablissement 
							JOIN grade ON employee.id_grade=grade.id_grade 
							JOIN categorie ON employee.id_categorie=categorie.id_categorie 
							JOIN statut ON employee.id_statut=statut.id_statut 
						WHERE year(avancement)='$cette_annee' and code_departement='$dd' ";
            $query_24 = $dbh->prepare($sql_24);
            $query_24->execute();
            $results = $query_24->fetchAll(PDO::FETCH_OBJ);
            $totalcount_avancement_annee_1[$k] = $query_24->rowCount();

			$sql_25 = "SELECT * FROM employee 
							JOIN departement ON employee.id_departement=departement.id_departement 
							JOIN etablissement ON employee.id_etablissement=etablissement.id_etablissement 
							JOIN grade ON employee.id_grade=grade.id_grade 
							JOIN categorie ON employee.id_categorie=categorie.id_categorie 
							JOIN statut ON employee.id_statut=statut.id_statut 
						WHERE year(d_contrat)='$cette_annee' and code_departement='$dd' ";
            $query_25 = $dbh->prepare($sql_25);
            $query_25->execute();
            $results = $query_25->fetchAll(PDO::FETCH_OBJ);
            $totalcount_d_contrat_annee_1[$k] = $query_25->rowCount();

        }
        $i = $i+1;
        $k = $k+1;
	}




	$s_departement = $_SESSION['departement'];

	$sql_26 = "SELECT * FROM employee 
					JOIN departement ON employee.id_departement=departement.id_departement  
				WHERE month(avancement)='$ce_mois' and year(avancement)='$cette_annee' and code_departement='$s_departement'  ";
	$query_26 = $dbh->prepare($sql_26);
	$query_26->execute();
	$results = $query_26->fetchAll(PDO::FETCH_OBJ);
	$s_totalcount_avancement_mois = $query_26->rowCount();

	$sql_27 = "SELECT * FROM employee 
					JOIN departement ON employee.id_departement=departement.id_departement  
				WHERE month(f_contrat)='$ce_mois' and year(f_contrat)='$cette_annee' and code_departement='$s_departement'  ";
	$query_27 = $dbh->prepare($sql_27);
	$query_27->execute();
	$results = $query_27->fetchAll(PDO::FETCH_OBJ);
	$s_totalcount_f_contrat_mois = $query_27->rowCount();
	
	$sql_28 = "SELECT * FROM employee 
					JOIN departement ON employee.id_departement=departement.id_departement  
				WHERE month(d_retraite)='$ce_mois' and year(d_retraite)='$cette_annee' and code_departement='$s_departement'  ";
	$query_28 = $dbh->prepare($sql_28);
	$query_28->execute();
	$results = $query_28->fetchAll(PDO::FETCH_OBJ);
	$s_totalcount_d_retraite_mois = $query_28->rowCount();



	$sql_29 = "SELECT * FROM employee 
					JOIN departement ON employee.id_departement=departement.id_departement  
				WHERE year(avancement)='$cette_annee' and code_departement='$s_departement' ";
	$query_29 = $dbh->prepare($sql_29);
	$query_29->execute();
	$results = $query_29->fetchAll(PDO::FETCH_OBJ);
	$s_totalcount_avancement_annee = $query_29->rowCount();

	$sql_30 = "SELECT * FROM employee 
					JOIN departement ON employee.id_departement=departement.id_departement  
				WHERE year(f_contrat)='$cette_annee' and code_departement='$s_departement' ";
	$query_30 = $dbh->prepare($sql_30);
	$query_30->execute();
	$results = $query_30->fetchAll(PDO::FETCH_OBJ);
	$s_totalcount_f_contrat_annee = $query_30->rowCount();
	
	$sql_31 = "SELECT * FROM employee 
					JOIN departement ON employee.id_departement=departement.id_departement  
				WHERE year(d_retraite)='$cette_annee' and code_departement='$s_departement' ";
	$query_31 = $dbh->prepare($sql_31);
	$query_31->execute();
	$results = $query_31->fetchAll(PDO::FETCH_OBJ);
	$s_totalcount_d_retraite_annee = $query_31->rowCount();



	$sql_32 = "SELECT * FROM employee 
					JOIN departement ON employee.id_departement=departement.id_departement  
				WHERE code_departement='$s_departement' and avancement BETWEEN '$now' AND '$trois_jours' ";
	$query_32 = $dbh->prepare($sql_32);
	$query_32->execute();
	$results = $query_32->fetchAll(PDO::FETCH_OBJ);
	$s_totalcount_avancement = $query_32->rowCount();

	$sql_33 = "SELECT * FROM employee 
					JOIN departement ON employee.id_departement=departement.id_departement  
				WHERE code_departement='$s_departement' and f_contrat BETWEEN '$now' AND '$trois_jours' ";
	$query_33 = $dbh->prepare($sql_33);
	$query_33->execute();
	$results = $query_33->fetchAll(PDO::FETCH_OBJ);
	$s_totalcount_f_contrat = $query_33->rowCount();

	$sql_34 = "SELECT * FROM employee 
					JOIN departement ON employee.id_departement=departement.id_departement  
				WHERE code_departement='$s_departement' and d_retraite BETWEEN '$now' AND '$trois_jours' ";
	$query_34 = $dbh->prepare($sql_34);
	$query_34->execute();
	$results = $query_34->fetchAll(PDO::FETCH_OBJ);
	$s_totalcount_d_retraite = $query_34->rowCount();

 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Dashboard - EPN</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/EPN.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="assets/css/line-awesome.min.css">
		
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
		
			<!-- Loader -->
			<div id="loader-wrapper">
				<div id="loader">
					<div class="loader-ellips">
					  <span class="loader-ellips__dot"></span>
					  <span class="loader-ellips__dot"></span>
					  <span class="loader-ellips__dot"></span>
					  <span class="loader-ellips__dot"></span>
					</div>
				</div>
			</div>
			<!-- /Loader -->
		
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
					<div class="row">
						<div class="col-md-12">
							<div class="welcome-box">
								<div class="welcome-img">
									<img alt="" src="/epn/assets/img/utilisateur/<?php echo $r_user['image_ut']; ?>">
								</div>
								<div class="welcome-det">
									<?php if ($_SESSION["role"] !== $config["ROLES"][0]){ $affiche_departement = "[".$_SESSION['departement']."]";} else {$affiche_departement = " ";} ?>
									<h3>Bienvenue, <?php echo htmlentities(ucfirst($_SESSION['userlogin']))." ".$affiche_departement;?></h3>
									<p><?php echo $aujourdhuit; ?></p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-7 col-md-7 chart-p">						
							<div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas height="210px" id="myChart"></canvas>
                                    </div><hr>
                                    <p>Diagramme en general</p>
                                </div>
                            </div>
						</div>
						<div class="col-lg-5 col-md-5">
							<div>
								<section class="dash-sidebar">
									<h1 class="dash-sec-title">Aujourd'huit et dans les 3 jours suivants <br><?php if ($_SESSION["role"] !== $config["ROLES"][0]){ echo "(dans votre departement)"; } ?></h1>
									<div class="dash-sec-content">
										<div class="dash-info-list">
											<a href="#" class="dash-card text-danger shadow">
												<div class="dash-card-container">
													<div class="dash-card-icon">
														<i class="fa fa-hourglass-o"></i>
													</div>
													<?php if ($_SESSION["role"] === $config["ROLES"][0]) :?>
														<div class="dash-card-content">
															<p><?php echo $totalcount_avancement; ?> personnes doivent etre avancer</p>
														</div>
													<?php else : ?>
														<div class="dash-card-content">
															<p><?php echo $s_totalcount_avancement; ?> personnes doivent etre avancer</p>
														</div>
													<?php endif ?>
												</div>
											</a>
										</div>

										<div class="dash-info-list">
											<a href="#" class="dash-card text-danger shadow">
												<div class="dash-card-container">
													<div class="dash-card-icon">
														<i class="fa fa-suitcase"></i>
													</div>
													<?php if ($_SESSION["role"] === $config["ROLES"][0]) :?>
														<div class="dash-card-content">
															<p><?php echo $totalcount_f_contrat; ?> personnes finissent leur contrat</p>
														</div>
													<?php else: ?>
														<div class="dash-card-content">
															<p><?php echo $s_totalcount_f_contrat; ?> personnes finissent leur contrat</p>
														</div>
													<?php endif ?>
												</div>
											</a>
										</div>

										<div class="dash-info-list">
											<a href="#" class="dash-card text-danger shadow">
												<div class="dash-card-container">
													<div class="dash-card-icon">
														<i class="fa fa-building-o"></i>
													</div>
													<?php if ($_SESSION["role"] === $config["ROLES"][0]) :?>
														<div class="dash-card-content">
															<p><?php echo $totalcount_d_retraite; ?> personnes prennent leur retraite</p>
														</div>
													<?php else: ?>
														<div class="dash-card-content">
															<p><?php echo $s_totalcount_d_retraite; ?> personnes prennent leur retraite</p>
														</div>
													<?php endif ?>
												</div>
											</a>
										</div>

									</div>
								</section>
							</div><br><br>
							<div class="dash-sidebar">
								<section>
									<h5 class="dash-title">Total</h5>
									<div class="card shadow">
										<div class="card-body">
											<div class="time-list">
												<div class="dash-stats-list">
													<h4><?php echo $totalcount_departement; ?></h4>
													<p>Departement(s)</p>
												</div>
												<div class="dash-stats-list">
													<h4><?php echo $totalcount_etablissement; ?></h4>
													<p>etablissement(s)</p>
												</div>
											</div>
											<div class="time-list">
												<div class="dash-stats-list">
													<h4><?php echo $totalcount_statut; ?></h4>
													<p>Statut(s)</p>
												</div>
												<div class="dash-stats-list">
													<h4><?php echo $totalcount_grade; ?></h4>
													<p>Grade(s)</p>
												</div>
												<div class="dash-stats-list">
													<h4><?php echo $totalcount_categorie; ?></h4>
													<p>Categorie(s)</p>
												</div>
											</div>
											<div class="request-btn">
												<div class="dash-stats-list">
													<h4><?php echo $totalcount_employee; ?></h4>
													<p>Employé(s)</p>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4">
							<section class="dash-sidebar">
								<h1 class="dash-sec-title">Durant ce mois <br><?php if ($_SESSION["role"] !== $config["ROLES"][0]){ echo "(dans votre departement)"; } ?></h1>
								<div class="dash-sec-content">
									<div class="dash-info-list">
										<a href="#" class="dash-card text-danger shadow">
											<div class="dash-card-container">
												<div class="dash-card-icon">
													<i class="fa fa-hourglass-o"></i>
												</div>
												<?php if ($_SESSION["role"] === $config["ROLES"][0]) :?>
													<div class="dash-card-content">
														<p><?php echo $totalcount_avancement_mois; ?> personnes doivent etre avancer</p>
													</div>
												<?php else : ?>
													<div class="dash-card-content">
														<p><?php echo $s_totalcount_avancement_mois; ?> personnes doivent etre avancer</p>
													</div>
												<?php endif ?>	
											</div>
										</a>
									</div>

									<div class="dash-info-list">
										<a href="#" class="dash-card text-danger shadow">
											<div class="dash-card-container">
												<div class="dash-card-icon">
													<i class="fa fa-suitcase"></i>
												</div>
												<?php if ($_SESSION["role"] === $config["ROLES"][0]) :?>
													<div class="dash-card-content">
														<p><?php echo $totalcount_f_contrat_mois; ?> personnes finissent leur contrat</p>
													</div>
												<?php else: ?>
													<div class="dash-card-content">
														<p><?php echo $s_totalcount_f_contrat_mois; ?> personnes finissent leur contrat</p>
													</div>
												<?php endif ?>
											</div>
										</a>
									</div>

									<div class="dash-info-list">
										<a href="#" class="dash-card text-danger shadow">
											<div class="dash-card-container">
												<div class="dash-card-icon">
													<i class="fa fa-building-o"></i>
												</div>
												<?php if ($_SESSION["role"] === $config["ROLES"][0]) :?>
													<div class="dash-card-content">
														<p><?php echo $totalcount_d_retraite_mois; ?> personnes prennent leur retraite</p>
													</div>
												<?php else: ?>
													<div class="dash-card-content">
														<p><?php echo $s_totalcount_d_retraite_mois; ?> personnes prennent leur retraite</p>
													</div>
												<?php endif ?>
											</div>
										</a>
									</div>

								</div>
							</section>
						</div>

						<div class="col-sm-4">
							<section class="dash-sidebar">
								<h1 class="dash-sec-title">Cette année <br><?php if ($_SESSION["role"] !== $config["ROLES"][0]){ echo "(dans votre departement)"; } ?></h1>
								<div class="dash-sec-content">
									<div class="dash-info-list">
										<a href="#" class="dash-card text-danger shadow">
											<div class="dash-card-container">
												<div class="dash-card-icon">
													<i class="fa fa-hourglass-o"></i>
												</div>
												<?php if ($_SESSION["role"] === $config["ROLES"][0]) :?>
													<div class="dash-card-content">
														<p><?php echo $totalcount_avancement_annee; ?> personnes doivent etre avancer</p>
													</div>
												<?php else: ?>
													<div class="dash-card-content">
														<p><?php echo $s_totalcount_avancement_annee; ?> personnes doivent etre avancer</p>
													</div>
												<?php endif ?>
											</div>
										</a>
									</div>

									<div class="dash-info-list">
										<a href="#" class="dash-card text-danger shadow">
											<div class="dash-card-container">
												<div class="dash-card-icon">
													<i class="fa fa-suitcase"></i>
												</div>
												<?php if ($_SESSION["role"] === $config["ROLES"][0]) :?>
													<div class="dash-card-content">
														<p><?php echo $totalcount_f_contrat_annee; ?> personnes finissent leur contrat</p>
													</div>
												<?php else: ?>
													<div class="dash-card-content">
														<p><?php echo $s_totalcount_f_contrat_annee; ?> personnes finissent leur contrat</p>
													</div>
												<?php endif ?>
											</div>
										</a>
									</div>

									<div class="dash-info-list">
										<a href="#" class="dash-card text-danger shadow">
											<div class="dash-card-container">
												<div class="dash-card-icon">
													<i class="fa fa-building-o"></i>
												</div>
												<?php if ($_SESSION["role"] === $config["ROLES"][0]) :?>
													<div class="dash-card-content">
														<p><?php echo $totalcount_d_retraite_annee; ?> personnes prennent leur retraite</p>
													</div>
												<?php else: ?>
													<div class="dash-card-content">
														<p><?php echo $s_totalcount_d_retraite_annee; ?> personnes prennent leur retraite</p>
													</div>
												<?php endif ?>
											</div>
										</a>
									</div>

								</div>
							</section>
						</div>

						<div class="col-sm-4 chart-p">
								<div class="card shadow mb-4">
									<!-- <div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-primary">Diagramme en général</h6>
									</div> -->
									<div class="card-body">
										<div class="chart-area">
											<canvas id="myChart_1"></canvas>
										</div><hr>
										<p>Nombre d'employé par departement<p>
									</div>
								</div>
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
		
		<!-- Custom JS -->
		<script src="assets/js/app.js"></script>

		<!-- Page level plugins -->
		<script src="assets/js/Chart.min.js"></script>
		<!-- <script src="assets/js/Chart .js"></script> -->


		<!-- Page level custom scripts -->
		<!-- <script src="assets/js/chart-area-demo.js"></script> -->
		<script>
			const labels = <?php echo json_encode($dep)?>;

			const data = {
				labels: labels,
				datasets: [
					{
						label: 'Nombre de retraite',
						backgroundColor: 'rgb(255, 99, 132)',
						borderColor: 'rgb(255, 99, 132)',
						data: <?php echo json_encode($totalcount_d_retraite_annee_1)?>,
						backgroundColor: '#4e73df',
						hoverBackgroundColor: '#2e59d9',
					},
					{
						label: 'Nombre de de ceux qui debutent leur contrat',
						backgroundColor: 'rgb(255, 99, 132)',
						borderColor: 'rgb(255, 99, 132)',
						data: <?php echo json_encode($totalcount_d_contrat_annee_1)?>,
						backgroundColor: '#ff4000',
						hoverBackgroundColor: '#ff8000',
					},
					{
						label: 'Nombre de de ceux qui finissent leur contrat',
						backgroundColor: 'rgb(255, 99, 132)',
						borderColor: 'rgb(255, 99, 132)',
						data: <?php echo json_encode($totalcount_f_contrat_annee_1)?>,
						backgroundColor: '#40ff00',
						hoverBackgroundColor: '#00ff40',
					},
					{
						label: 'Nombre de de ceux qui doivent etre avancer',
						backgroundColor: 'rgb(255, 99, 132)',
						borderColor: 'rgb(255, 99, 132)',
						data: <?php echo json_encode($totalcount_avancement_annee_1)?>,
						backgroundColor: '#ffff00',
						hoverBackgroundColor: '#bfff00',
					}
				]
			};

			const config = {
				type: 'bar',
				data: data,
				options: {
					scales: {
						y: {
							beginAtZero: true
						}
					}
				}
			};
		</script>

		<script>
			var ctx = document.getElementById("myChart_1");
			// const labels = < echo json_encode($dep)?>;

			var myPieChart = new Chart(ctx, {
				type: 'pie',
				data: {
					labels: <?php echo json_encode($dep)?>,
					datasets: [{
									data: <?php echo json_encode($totalcount_employee_1)?>,
									backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', 'ffff00', '40ff00'],
									hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', 'cc0000', '40ff00'],
									hoverBorderColor: "rgba(234, 236, 244, 1)",
								}],
				},
				options: {
							maintainAspectRatio: false,
							tooltips: {
											backgroundColor: "rgb(255,255,255)",
											bodyFontColor: "#858796",
											borderColor: '#dddfeb',
											borderWidth: 1,
											xPadding: 15,
											yPadding: 15,
											displayColors: false,
											caretPadding: 10,
										},
							legend: {
										display: true
									},
							cutoutPercentage: 50,
						},
			});
		</script>

		<script>
			const myChart = new Chart(
				document.getElementById('myChart'),
				config
			);
		</script>

		
    </body>
</html>