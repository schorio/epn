<?php
	//calling the config file
	include_once("includes/config.php"); 
	

	//adding employees code starts from here
	if(isset($_POST['emp_ajouter'])){

		$code_statut = htmlspecialchars($_POST['id_statut']);
		$code_categorie = htmlspecialchars($_POST['id_categorie']);
		$code_grade = htmlspecialchars($_POST['id_grade']);

		$sql_s = "SELECT id_statut FROM statut WHERE code_statut = '$code_statut' ";
		$query_s = $dbh->prepare($sql_s);
		$query_s->execute();
		$result_s=$query_s->fetch(PDO::FETCH_ASSOC);

		$sql_c = "SELECT id_categorie FROM categorie WHERE code_categorie = '$code_categorie' ";
		$query_c = $dbh->prepare($sql_c);
		$query_c->execute();
		$result_c=$query_c->fetch(PDO::FETCH_ASSOC);

		$sql_g = "SELECT id_grade FROM grade WHERE code_grade = '$code_grade' ";
		$query_g = $dbh->prepare($sql_g);
		$query_g->execute();
		$result_g=$query_g->fetch(PDO::FETCH_ASSOC);

		$matricule = htmlspecialchars($_POST['matricule']);
		$nom = htmlspecialchars($_POST['nom']);
		$prenom = htmlspecialchars($_POST['prenom']);
		$date_naissance = htmlspecialchars($_POST['date_naissance']);
		$id_etablissement = htmlspecialchars($_POST['id_etablissement']);
		$id_departement = htmlspecialchars($_POST['id_departement']);
		$id_statut = $result_s['id_statut'];
		$id_categorie = $result_c['id_categorie'];
		$id_grade = $result_g['id_grade'];
		$d_contrat = htmlspecialchars($_POST['d_contrat']);
		$avancement = htmlspecialchars($_POST['avancement']);
		$f_contrat = htmlspecialchars($_POST['f_contrat']);
		$d_retraite = htmlspecialchars($_POST['d_retraite']);
		$genre = htmlspecialchars($_POST['genre']);
		$telephone = htmlspecialchars($_POST['telephone']);
		$adresse = htmlspecialchars($_POST['adresse']);
		$email = htmlspecialchars($_POST['email']);
		$image = htmlspecialchars($_POST['image']);
		//grabbing the picture
		$file = $_FILES['image']['name'];
		$file_loc = $_FILES['image']['tmp_name'];
		$folder="../../assets/img/employee/"; 
		$new_file_name = strtolower($file);
		$final_file=str_replace(' ','-',$new_file_name);

		if(move_uploaded_file($file_loc,$folder.$final_file)){
			$image=$final_file;
		 }

		$sql = "INSERT INTO `employee` (`matricule`, `nom`, `prenom`, `date_naissance`,  `id_statut`, `id_categorie`, `d_contrat`, `id_grade`,  `avancement`, `f_contrat`, `d_retraite`, `id_departement`, `id_etablissement`, `genre`, `telephone`, `adresse`, `email`, `image`) 
								VALUES (:matricule,   :nom,  :prenom,  :date_naissance,  :id_statut,  :id_categorie,  :d_contrat,  :id_grade,   :avancement,  :f_contrat,  :d_retraite,  :id_departement,  :id_etablissement,  :genre,   :telephone,  :adresse,  :email, :image)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':matricule',$matricule,PDO::PARAM_STR);
		$query->bindParam(':nom',$nom,PDO::PARAM_STR);
		$query->bindParam(':prenom',$prenom,PDO::PARAM_STR);
		$query->bindParam(':date_naissance',$date_naissance,PDO::PARAM_STR);
		$query->bindParam(':id_etablissement',$id_etablissement,PDO::PARAM_STR);
		$query->bindParam(':id_departement',$id_departement,PDO::PARAM_STR);
		$query->bindParam(':id_statut',$id_statut,PDO::PARAM_STR);
		$query->bindParam(':id_categorie',$id_categorie,PDO::PARAM_STR);
		$query->bindParam(':id_grade',$id_grade,PDO::PARAM_STR);
		$query->bindParam(':d_contrat',$d_contrat,PDO::PARAM_STR);
		$query->bindParam(':avancement',$avancement,PDO::PARAM_STR);
		$query->bindParam(':f_contrat',$f_contrat,PDO::PARAM_STR);
		$query->bindParam(':d_retraite',$d_retraite,PDO::PARAM_STR);
		$query->bindParam(':genre',$genre,PDO::PARAM_STR);
		$query->bindParam(':telephone',$telephone,PDO::PARAM_STR);
		$query->bindParam(':adresse',$adresse,PDO::PARAM_STR);
		$query->bindParam(':email',$email,PDO::PARAM_STR);
		$query->bindParam(':image',$image,PDO::PARAM_STR);
		$query->execute();
		$lastInsert = $dbh->lastInsertId();
		if($lastInsert>0){
			echo "<script>window.location.href='/epn/liste/employee/employees.php';</script>";
			echo "<script>alert('Employee est ajouter avec succes.');</script>";
		}else{
			echo "<script>alert('Une s'est produite');</script>";
		}	
		
	}
	//ading employees code eds here


	//adding employees code starts from here
	if(isset($_POST['ut_ajouter'])){

		$nom_ut = htmlspecialchars($_POST['nom_ut']);
		$prenom_ut = htmlspecialchars($_POST['prenom_ut']);
		$email_ut = htmlspecialchars($_POST['email_ut']);
		$username_ut = htmlspecialchars($_POST['username_ut']);
		$password_ut = htmlspecialchars($_POST['password_ut']);
		$confirmPassword = htmlspecialchars($_POST['confirmPassword']);
		$role_ut = htmlspecialchars($_POST['role_ut']);
		$ut_code_departement = htmlspecialchars($_POST['ut_code_departement']);
		$image = htmlspecialchars($_POST['image']);

		//grabbing the picture
		$file = $_FILES['image']['name'];
		$file_loc = $_FILES['image']['tmp_name'];
		$folder="../../assets/img/utilisateur/"; 
		$new_file_name = strtolower($file);
		$final_file=str_replace(' ','-',$new_file_name);

		if(move_uploaded_file($file_loc,$folder.$final_file)){
			$image=$final_file;
		}


		if ($confirmPassword !== $password_ut){
			echo "<script>alert('Confirmer votre mot de passe');</script>";
			echo "<script>window.location.href='/epn/liste/utilisateur/ut.php';</script>";
		}
		else{

			$sql = "INSERT INTO `utilisateur` (`nom_ut`, `prenom_ut`, `email_ut`, `image_ut`, `username_ut`, `password_ut`, `role_ut`, `departement_ut`) 
										VALUES (:nom_ut,  :prenom_ut,  :email_ut,  :pic,  :username_ut,  :password_ut,  :role_ut, :ut_code_departement)";
			$query = $dbh->prepare($sql);
			$query->bindParam(':nom_ut',$nom_ut,PDO::PARAM_STR);
			$query->bindParam(':prenom_ut',$prenom_ut,PDO::PARAM_STR);
			$query->bindParam(':email_ut',$email_ut,PDO::PARAM_STR);
			$query->bindParam(':pic',$image,PDO::PARAM_STR);
			$query->bindParam(':username_ut',$username_ut,PDO::PARAM_STR);
			$query->bindParam(':password_ut',$password_ut,PDO::PARAM_STR);
			$query->bindParam(':role_ut',$role_ut,PDO::PARAM_STR);
			$query->bindParam(':ut_code_departement',$ut_code_departement,PDO::PARAM_STR);
			$query->execute();
			$lastInsert = $dbh->lastInsertId();
			if($lastInsert>0){
				echo "<script>alert('L'utilisateur est ajouter avec succes');</script>";
				echo "<script>window.location.href='/epn/liste/utilisateur/ut.php';</script>";
			}else{
				echo "<script>alert('Une erreur s'est survenue');</script>";
			}
		}
	}
	//ading employees code eds here

		
	//adding departements code starts here
	elseif(isset($_POST['ajouter_departement'])){
		$code_departement = htmlspecialchars($_POST['code_departement']);
		$nom_departement = htmlspecialchars($_POST['nom_departement']);
		$id_chef_departement = htmlspecialchars($_POST['id_chef_departement']);
		$sql = "INSERT INTO `departement` (`code_departement`, `nom_departement`, `id_chef_departement`) VALUES (:code_departement, :nom_departement, :id_chef_departement)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':code_departement',$code_departement,pdo::PARAM_STR);
		$query->bindParam(':nom_departement',$nom_departement,pdo::PARAM_STR);
		$query->bindParam(':id_chef_departement',$id_chef_departement,pdo::PARAM_STR);
		$query->execute();
		$lastInsert = $dbh->lastInsertId();
		if($lastInsert>0){
			echo "<script>alert('Le departement est ajouter avec succes');</script>";
			echo "<script>window.location.href='/epn/liste/departement/departement.php';</script>";
		}else{
			echo "<script>alert('Une erreur s'est survenue');</script>";
		}
	}
	//adding departements code ends here

	//adding categories code starts here
	elseif(isset($_POST['ajouter_etablissement'])){
		$code_etablissement = htmlspecialchars($_POST['code_etablissement']);
		$nom_etablissement = htmlspecialchars($_POST['nom_etablissement']);
		$type_etablissement = htmlspecialchars($_POST['type_etablissement']);
		$id_chef_etablissement = htmlspecialchars($_POST['id_chef_etablissement']);
		$et_id_departement = htmlspecialchars($_POST['et_id_departement']);
		$sql = "INSERT INTO `etablissement` (`code_etablissement`, `nom_etablissement`, `type_etablissement`, `id_departement`, `id_chef_etablissement`) VALUES (:code_etablissement, :nom_etablissement, :type_etablissement, :et_id_departement, :id_chef_etablissement)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':code_etablissement',$code_etablissement,pdo::PARAM_STR);
		$query->bindParam(':nom_etablissement',$nom_etablissement,pdo::PARAM_STR);
		$query->bindParam(':type_etablissement',$type_etablissement,pdo::PARAM_STR);
		$query->bindParam(':id_chef_etablissement',$id_chef_etablissement,pdo::PARAM_STR);
		$query->bindParam(':et_id_departement',$et_id_departement,pdo::PARAM_STR);
		$query->execute();

		$sql_0 = "SELECT id_etablissement FROM etablissement WHERE code_etablissement = '$code_etablissement' ";
		$query_0 = $dbh->prepare($sql_0);
		$query_0->execute();
		$result_0=$query_0->fetch(PDO::FETCH_ASSOC);

		$n_id_etablissement = $result_0['id_etablissement'];
		$sql_1 = "UPDATE employee SET id_etablissement = '$n_id_etablissement' WHERE id_employee = '$id_chef_etablissement' ";

		$lastInsert = $dbh->lastInsertId();
		if($lastInsert>0 || $conn->query($sql_1) === TRUE){
			echo "<script>alert('Le etablissement est ajouter avec succes');</script>";
			echo "<script>window.location.href='/epn/liste/etablissement/etablissement.php';</script>";
		}else{
			echo "<script>alert('Une erreur s'est survenue');</script>";
		}
	}
	//adding departements code ends here

	//adding categories code starts here
	elseif(isset($_POST['ajouter_categorie'])){
		$code_categorie = htmlspecialchars($_POST['code_categorie']);
		$sql = "INSERT INTO categorie(code_categorie) VALUES (:code_categorie)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':code_categorie',$code_categorie,pdo::PARAM_STR);
		$query->execute();
		$lastInsert = $dbh->lastInsertId();
		if($lastInsert>0){
			echo "<script>alert('La categorie est ajouter avec succes');</script>";
			echo "<script>window.location.href='/epn/liste/categorie/categorie.php';</script>";
		}else{
			echo "<script>alert('Une erreur s'est survenue');</script>";
		}
	}
	//adding categories code ends here


	//adding grades code starts here
	elseif(isset($_POST['ajouter_grade'])){
		$code_grade = htmlspecialchars($_POST['code_grade']);
		$sql = "INSERT INTO `grade`(`code_grade`) VALUES (:code_grade)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':code_grade',$code_grade,pdo::PARAM_STR);
		$query->execute();
		$lastInsert = $dbh->lastInsertId();
		if($lastInsert>0){
			echo "<script>alert('La grade est ajouter avec succes');</script>";
			echo "<script>window.location.href='/epn/liste/grade/grade.php';</script>";
		}else{
			echo "<script>alert('Une erreur s'est survenue');</script>";
		}
	}
	//adding grades code ends here


	//adding statuts code starts here
	elseif(isset($_POST['ajouter_statut'])){
		$code_statut = htmlspecialchars($_POST['code_statut']);
		$nom_statut = htmlspecialchars($_POST['nom_statut']);
		$sql = "INSERT INTO `statut` (`code_statut`, `nom_statut`) VALUES (:code_statut, :nom_statut)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':code_statut',$code_statut,pdo::PARAM_STR);
		$query->bindParam(':nom_statut',$nom_statut,pdo::PARAM_STR);
		$query->execute();
		$lastInsert = $dbh->lastInsertId();
		if($lastInsert>0){
			echo "<script>alert('Le statut est ajouter avec succes');</script>";
			echo "<script>window.location.href='/epn/liste/statut/statut.php';</script>";
		}else{
			echo "<script>alert('Une erreur s'est survenue');</script>";
		}
	}
	//adding statuts code ends here



	if(isset($_POST['delete_statut'])){
		// sql to delete a record
		$delete_id = $_POST['delete_id'];
		$sql = "DELETE FROM statut WHERE id_statut='$delete_id' ";
		if ($conn->query($sql) === TRUE) {
			echo '<script>window.location.href="/epn/liste/statut/statut.php"</script>';
		} else {
			echo "Error";
		}
	}
	if(isset($_POST['delete_employee'])){
		// sql to delete a record
		$delete_id = $_POST['delete_id'];
		$sql = "DELETE FROM employee WHERE id_employee='$delete_id' ";
		if ($conn->query($sql) === TRUE) {
			echo '<script>window.location.href="/epn/liste/employee/employees.php"</script>';
		} else {
			echo "Error";
		}
	}
	if(isset($_POST['delete_grade'])){
		// sql to delete a record
		$delete_id = $_POST['delete_id'];
		$sql = "DELETE FROM grade WHERE id_grade='$delete_id' ";
		if ($conn->query($sql) === TRUE) {
			echo '<script>window.location.href="/epn/liste/grade/grade.php"</script>';
		} else {
			echo "Error";
		}
	}
	if(isset($_POST['delete_categorie'])){
		// sql to delete a record
		$delete_id = $_POST['delete_id'];
		$sql = "DELETE FROM categorie WHERE id_categorie='$delete_id' ";
		if ($conn->query($sql) === TRUE) {
			echo '<script>window.location.href="/epn/liste/categorie/categorie.php"</script>';
		} else {
			echo "Error";
		}
	}
	if(isset($_POST['delete_departement'])){
		// sql to delete a record
		$delete_id = $_POST['delete_id'];
		$sql = "DELETE FROM departement WHERE id_departement='$delete_id' ";
		if ($conn->query($sql) === TRUE) {
			echo '<script>window.location.href="/epn/liste/departement/departement.php"</script>';
		} else {
			echo "Error";
		}
	}
	if(isset($_POST['delete_etablissement'])){
		// sql to delete a record
		$delete_id = $_POST['delete_id'];
		$sql = "DELETE FROM etablissement WHERE id_etablissement='$delete_id' ";
		if ($conn->query($sql) === TRUE) {
			echo '<script>window.location.href="/epn/liste/etablissement/etablissement.php"</script>';
		} else {
			echo "Error";
		}
	}
	if(isset($_POST['delete_ut'])){
		// sql to delete a record
		$delete_id = $_POST['delete_id'];
		$sql = "DELETE FROM utilisateur WHERE id_ut='$delete_id' ";
		if ($conn->query($sql) === TRUE) {
			echo '<script>window.location.href="/epn/liste/utilisateur/ut.php"</script>';
		} else {
			echo "Error";
		}
	}



	if(isset($_POST['modifier_statut'])){
		$edit_id = $_POST['edit_id'];
		$n_code_statut = $_POST['n_code_statut'];
		$n_nom_statut = $_POST['n_nom_statut'];
		$sql = "UPDATE statut SET 
			code_statut='$n_code_statut',
			nom_statut='$n_nom_statut'
			WHERE id_statut='$edit_id' ";
		if ($conn->query($sql) === TRUE) {
			echo '<script>window.location.href="/epn/liste/statut/statut.php"</script>';
		} else {
			echo "Error";
		}
	}
	if(isset($_POST['modifier_departement'])){
		$edit_id = $_POST['edit_id'];
		$n_code_departement = $_POST['n_code_departement'];
		$n_nom_departement = $_POST['n_nom_departement'];
		$n_id_chef_departement = $_POST['n_id_chef_departement'];
		$sql = "UPDATE departement SET 
			code_departement='$n_code_departement',
			nom_departement='$n_nom_departement',
			id_chef_departement='$n_id_chef_departement'
			WHERE id_departement='$edit_id' ";
		if ($conn->query($sql) === TRUE) {
			echo '<script>window.location.href="/epn/liste/departement/departement.php"</script>';
		} else {
			echo "Error";
		}
	}
	if(isset($_POST['modifier_etablissement'])){
		$edit_id = $_POST['edit_id'];
		$n_code_etablissement = $_POST['n_code_etablissement'];
		$n_nom_etablissement = $_POST['n_nom_etablissement'];
		$n_type_etablissement = $_POST['n_type_etablissement'];
		$n_id_chef_etablissement = $_POST['n_id_chef_etablissement'];
		$n_et_id_departement = $_POST['n_et_id_departement'];
		$sql = "UPDATE etablissement SET 
			code_etablissement='$n_code_etablissement',
			nom_etablissement='$n_nom_etablissement',
			type_etablissement='$n_type_etablissement',
			id_chef_etablissement='$n_id_chef_etablissement',
			id_departement='$n_et_id_departement'
			WHERE id_etablissement='$edit_id' ";
		if ($conn->query($sql) === TRUE) {
			echo '<script>window.location.href="/epn/liste/etablissement/etablissement.php"</script>';
		} else {
			echo "Error";
		}
	}
	if(isset($_POST['modifier_grade'])){
		$edit_id = $_POST['edit_id'];
		$n_code_grade = $_POST['n_code_grade'];
		$sql = "UPDATE grade SET 
			code_grade='$n_code_grade'
			WHERE id_grade='$edit_id' ";
		if ($conn->query($sql) === TRUE) {
			echo '<script>window.location.href="/epn/liste/grade/grade.php"</script>';
		} else {
			echo "Error";
		}
	}
	if(isset($_POST['modifier_categorie'])){
		$edit_id = $_POST['edit_id'];
		$n_code_categorie = $_POST['n_code_categorie'];
		$sql = "UPDATE categorie SET 
			code_categorie='$n_code_categorie'
			WHERE id_categorie='$edit_id' ";
		if ($conn->query($sql) === TRUE) {
			echo '<script>window.location.href="categorie/categorie.php"</script>';
		} else {
			echo "Error";
		}
	}
	if(isset($_POST['modifier_ut'])){
		$edit_id = $_POST['edit_id'];
		$nom_ut = $_POST['nom_ut'];
		$prenom_ut = $_POST['prenom_ut'];
		$email_ut = $_POST['email_ut'];
		$username_ut = $_POST['username_ut'];
		$password_ut = $_POST['password_ut'];
		$confirmPassword = $_POST['confirmPassword'];
		$ut_code_departement = $_POST['ut_code_departement'];
		$role_ut = $_POST['role_ut'];
		// $image = $_POST['image'];
		
		//grabbing the picture
		$file = $_FILES['image']['name'];
		$file_loc = $_FILES['image']['tmp_name'];
		$folder="../../assets/img/utilisateur/"; 
		$new_file_name = strtolower($file);
		$final_file=str_replace(' ','-',$new_file_name);
		
		if(move_uploaded_file($file_loc,$folder.$final_file)){
			$image=$final_file;
		}
		
		if (!$image){
			$pic = $_POST['h_image'];
		}
		else{
			$pic = $image;
		}

		if ($confirmPassword !== $password_ut){
			echo "<script>alert('Confirmer votre mot de passe');</script>";
			echo "<script>window.location.href='/epn/liste/utilisateur/ut.php';</script>";
		}
		else{

			$sql = "UPDATE utilisateur SET 
						nom_ut='$nom_ut',
						prenom_ut='$prenom_ut',
						email_ut='$email_ut',
						username_ut='$username_ut',
						password_ut='$password_ut',
						role_ut='$role_ut',
						departement_ut='$ut_code_departement',
						image_ut='$pic'
					WHERE id_ut='$edit_id' ";
			if ($conn->query($sql) === TRUE) {
				echo '<script>window.location.href="/epn/liste/utilisateur/ut.php"</script>';
			} else {
				echo "Error";
			}
		}
	}

	if(isset($_POST['modifier_employee'])){

		$code_statut = htmlspecialchars($_POST['n_id_statut']);
		$code_categorie = htmlspecialchars($_POST['n_id_categorie']);
		$code_grade = htmlspecialchars($_POST['n_id_grade']);

		$sql_s = "SELECT id_statut FROM statut WHERE code_statut = '$code_statut' ";
		$query_s = $dbh->prepare($sql_s);
		$query_s->execute();
		$result_s=$query_s->fetch(PDO::FETCH_ASSOC);

		$sql_c = "SELECT id_categorie FROM categorie WHERE code_categorie = '$code_categorie' ";
		$query_c = $dbh->prepare($sql_c);
		$query_c->execute();
		$result_c=$query_c->fetch(PDO::FETCH_ASSOC);

		$sql_g = "SELECT id_grade FROM grade WHERE code_grade = '$code_grade' ";
		$query_g = $dbh->prepare($sql_g);
		$query_g->execute();
		$result_g=$query_g->fetch(PDO::FETCH_ASSOC);

		$id_employee = $_POST['id_employee'];
		$n_matricule = $_POST['n_matricule'];
		$n_nom = $_POST['n_nom'];
		$n_prenom = $_POST['n_prenom'];
		$n_date_naissance = $_POST['n_date_naissance'];
		$n_id_etablissement = $_POST['n_id_etablissement'];
		$n_id_departement = $_POST['n_id_departement'];
		$n_id_statut = $result_s['id_statut'];
		$n_id_categorie = $result_c['id_categorie'];
		$n_id_grade = $result_g['id_grade'];
		$n_d_contrat = $_POST['n_d_contrat'];
		$n_avancement = $_POST['n_avancement'];
		$n_f_contrat = $_POST['n_f_contrat'];
		$n_d_retraite = $_POST['n_d_retraite'];
		// $n_image = $_POST['n_image'];
		$n_telephone = $_POST['n_telephone'];
		$n_email = $_POST['n_email'];
		$n_adresse = $_POST['n_adresse'];
		$n_genre = $_POST['n_genre'];

		$file = $_FILES['image']['name'];
		$file_loc = $_FILES['image']['tmp_name'];
		$folder="assets/img/employee/"; 
		$new_file_name = strtolower($file);
		$final_file=str_replace(' ','-',$new_file_name);
		
		if(move_uploaded_file($file_loc,$folder.$final_file)){
			$image=$final_file;
		}

		if (!$image){
			$pic = $_POST['image_2'];
		}
		else{
			$pic = $image;
		}

		$sql = "UPDATE employee SET 
			matricule = '$n_matricule',
			nom = '$n_nom',
			prenom = '$n_prenom',
			date_naissance = '$n_date_naissance',
			id_etablissement = '$n_id_etablissement',
			id_departement = '$n_id_departement',
			id_statut = '$n_id_statut',
			id_categorie = '$n_id_categorie',
			id_grade = '$n_id_grade',
			d_contrat = '$n_d_contrat',
			avancement = '$n_avancement',
			f_contrat = '$n_f_contrat',
			d_retraite = '$n_d_retraite',
			image = '$pic',
			telephone = '$n_telephone',
			email = '$n_email',
			adresse = '$n_adresse',
			genre = '$n_genre'
			WHERE id_employee = '$id_employee' ";

		if ($conn->query($sql) === TRUE) {
			echo '<script>window.location.href="/epn/profile.php?id='.$id_employee.'"</script>';
		} else {
			echo "Error";
		}
	}
	

	if(isset($_POST['changer_mdp'])){
		$password_ut = $_POST['password_ut'];
		$edit_id = $_POST['edit_id'];
		$a_mdp = $_POST['a_mdp'];
		$n_mdp = $_POST['n_mdp'];
		$n__mdp = $_POST['n__mdp'];

		if ($a_mdp !== $password_ut && $n__mdp !== $n_mdp){
			echo "<script>alert('Ancien mot de passe invalide');</script>";
			echo "<script>alert('Confirmer votre nouveau mot de passe');</script>";
			echo "<script>window.location.href='/epn/includes/function/utilisateur/changer_mdp.php';</script>";
		}
		elseif ($a_mdp !== $password_ut){
			echo "<script>alert('Ancien mot de passe invalide');</script>";
			echo "<script>window.location.href='/epn/includes/function/utilisateur/changer_mdp.php';</script>";
		}
		elseif ($n__mdp !== $n_mdp){
			echo "<script>alert('Confirmer votre nouveau mot de pass');</script>";
			echo "<script>window.location.href='/epn/includes/function/utilisateur/changer_mdp.php';</script>";

		}
		else{
			$sql = "UPDATE utilisateur SET 
			password_ut='$n__mdp'
			WHERE id_ut='$edit_id' ";
			if ($conn->query($sql) === TRUE) {
				echo "<script>alert('Votre mot de passe est modifier avec succes');</script>";
				echo '<script>window.location.href="/epn/includes/function/utilisateur/changer_mdp.php";</script>';
			} else {
				echo "Error";
			}
		}
	}


?>
