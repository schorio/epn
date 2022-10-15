// Fonctionnalite profile d'utilisateur n'est pas encore dispo


<?php 
	$user_ut = $_SESSION['userlogin'];

	$sql_user = "SELECT * from utilisateur WHERE username_ut='$user_ut'";
	$query_user = $dbh->prepare($sql_user);
	$query_user->execute();
	$r_user = $query_user->fetch(PDO::FETCH_ASSOC);
?>
<div class="header">
	<!-- Logo -->
	<div class="header-left">
		<a href="/epn/index.php" class="logo">
			<!-- <img src="assets/img/logo.png" width="40" height="40" alt=""> -->
			<i class="fa fa-modx"></i>EPN.
		</a>
	</div>
	<!-- /Logo -->
	
	<a id="toggle_btn" href="javascript:void(0);">
		<span class="bar-icon">
			<span></span>
			<span></span>
			<span></span>
		</span>
	</a>
	
	<!-- Header Title -->
	<div class="page-title-box">
		<h3>EPN Administrator</h3>
	</div>
	<!-- /Header Title -->
	
	<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
	
	<!-- Header Menu -->
	<ul class="nav user-menu">	

		<li class="nav-item dropdown has-arrow main-drop">
			<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
				<span class="user-img"><img src="/epn/assets/img/utilisateur/<?php echo $r_user['image_ut']; ?>">
				<span class="status online"></span></span>
				<span><?php echo ucfirst($user_ut); ?></span>
			</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="">Mon Profile</a>
				<a class="dropdown-item" href="/epn/includes/function/utilisateur/changer_mdp.php">Paramètres</a>
				<a class="dropdown-item" href="/epn/includes/function/connection/logout.php">Déconnecter</a>
			</div>
		</li>
	</ul>
	<!-- /Header Menu -->
	
	<!-- Mobile Menu -->
	<div class="dropdown mobile-user-menu">
		<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
		<div class="dropdown-menu dropdown-menu-right">
			<a class="dropdown-item" href="">My Profile</a>
			<a class="dropdown-item" href="">Settings</a>
			<a class="dropdown-item" href="/epn/logout.php">Logout</a>
		</div>
	</div>
	<!-- /Mobile Menu -->
	
</div>