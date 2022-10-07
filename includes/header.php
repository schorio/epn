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
	
		<!-- Search -->
		<!-- <li class="nav-item">
			<div class="top-nav-search">
				<a href="javascript:void(0);" class="responsive-search">
					<i class="fa fa-search"></i>
				</a>
				<form action="#">
					<input class="form-control" type="text" placeholder="Rechercher ici . . .">
					<button class="btn" type="submit"><i class="fa fa-search"></i></button>
				</form>
			</div>
		</li> -->
		<!-- /Search -->
	
		
	
		<!-- Notifications -->
		<!-- <li class="nav-item dropdown">
			<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
				<i class="fa fa-bell-o"></i> <span class="badge badge-pill">3</span>
			</a>
			<div class="dropdown-menu notifications">
				<div class="topnav-dropdown-header">
					<span class="notification-title">Notifications</span>
					<a href="javascript:void(0)" class="clear-noti"> Effacer tout </a>
				</div>
				<div class="noti-content">
					<ul class="notification-list">
						<li class="notification-message">
							<a href="#">
								<div class="media">
									<span class="avatar">
										<img alt="" src="assets/img/profiles/avatar-02.jpg">
									</span>
									<div class="media-body">
										<p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
										<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
									</div>
								</div>
							</a>
						</li>
						<li class="notification-message">
							<a href="#">
								<div class="media">
									<span class="avatar">
										<img alt="" src="assets/img/profiles/avatar-03.jpg">
									</span>
									<div class="media-body">
										<p class="noti-details"><span class="noti-title">Tarah Shropshire</span> changed the task name <span class="noti-title">Appointment booking with payment gateway</span></p>
										<p class="noti-time"><span class="notification-time">6 mins ago</span></p>
									</div>
								</div>
							</a>
						</li>
						<li class="notification-message">
							<a href="#">
								<div class="media">
									<span class="avatar">
										<img alt="" src="assets/img/profiles/avatar-06.jpg">
									</span>
									<div class="media-body">
										<p class="noti-details"><span class="noti-title">Misty Tison</span> added <span class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span> to project <span class="noti-title">Doctor available module</span></p>
										<p class="noti-time"><span class="notification-time">8 mins ago</span></p>
									</div>
								</div>
							</a>
						</li>
						<li class="notification-message">
							<a href="#">
								<div class="media">
									<span class="avatar">
										<img alt="" src="assets/img/profiles/avatar-17.jpg">
									</span>
									<div class="media-body">
										<p class="noti-details"><span class="noti-title">Rolland Webber</span> completed task <span class="noti-title">Patient and Doctor video conferencing</span></p>
										<p class="noti-time"><span class="notification-time">12 mins ago</span></p>
									</div>
								</div>
							</a>
						</li>
						<li class="notification-message">
							<a href="#">
								<div class="media">
									<span class="avatar">
										<img alt="" src="assets/img/profiles/avatar-13.jpg">
									</span>
									<div class="media-body">
										<p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> added new task <span class="noti-title">Private chat module</span></p>
										<p class="noti-time"><span class="notification-time">2 days ago</span></p>
									</div>
								</div>
							</a>
						</li>
					</ul>
				</div>
				<div class="topnav-dropdown-footer">
					<a href="#">Voir tout les Notifications</a>
				</div>
			</div>
		</li> -->
		<!-- /Notifications -->
		

		<li class="nav-item dropdown has-arrow main-drop">
			<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
				<span class="user-img"><img src="/epn/assets/img/utilisateur/<?php echo $r_user['image_ut']; ?>">
				<span class="status online"></span></span>
				<span><?php echo ucfirst($user_ut); ?></span>
			</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="">Mon Profile</a>
				<a class="dropdown-item" href="">Paramètres</a>
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