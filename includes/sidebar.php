<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Principale</span>
							</li>


							<li class="submenu">
								<a href="#"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="/epn/index.php"> -- Accueil</a></li>
									<li><a href="/epn/employee-dashboard.php"> -- Mon dashboard</a></li>
								</ul>
							</li>
							

							<li class="menu-title"> 
								<span>Section</span>
							</li>


							<li class="submenu">
								<a href="#" class="noti-dot"><i class="la la-user"></i> <span> Listes</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="/epn/liste/employee/employees.php"> -- Employés</a></li>
									<li><a href="/epn/liste/departement/departement.php"> -- Departements</a></li>
									<li><a href="/epn/liste/etablissement/etablissement.php"> -- Etablissements</a></li>
									<li><a href="/epn/liste/categorie/categorie.php"> -- Categorie</a></li>
									<li><a href="/epn/liste/statut/statut.php"> -- Statut</a></li>
									<li><a href="/epn/liste/grade/grade.php"> -- Grade</a></li>
								</ul>
							</li>


							<li class="menu-title"> 
								<span>Autre</span>
							</li>
							<li> 
								<a href="/epn/includes/function/utilisateur/changer_mdp.php"><i class="la la-cogs"></i> <span>Paramètre</span></a>
							</li>

							<?php if ($_SESSION["role"] === $config["ROLES"][0]) :?>
							<li class="menu-title"> 
								<span>Administrateur</span>
							</li>
							<li> 
								<a href="/epn/liste/utilisateur/ut.php"><i class="la la-user-plus"></i> <span>Utilisateurs</span></a>
							</li>
							<?php endif ?>


							<li class="menu-title"> 
								<span>Sortir</span>
							</li>
							<li> 
								<a href="/epn/includes/function/connection/logout.php"><i class="la la-power-off"></i> <span>Déconnection</span></a>
							</li>
									
						</ul>
					</div>
                </div>
            </div>