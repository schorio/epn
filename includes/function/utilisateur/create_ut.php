<?php

include_once('../../includes/config.php');

if($_POST["password_ut"] !== $_POST["confirmPassword"]){
    header("Location: /epn/liste/utilisateur/ut.php?message=Ereur de confirmation mot de pass");
}

$req = $dbh->prepare("SELECT * FROM utilisateur WHERE username_ut = :username_ut");
$req->bindParam(":username_ut", $_POST["username_ut"]);
$req->execute();

$result = $req->fetch(PDO::FETCH_ASSOC);

if($result){
    $message = "Compte existe déja";
    header("Location: /epn/liste/utilisateur/ut.php?message=$message");
}

if(!$result){
    // $passwordToHash = $_POST["password"] . $config["SECRET_KEY"];
    // $hash = md5($passwordToHash);

    $hash = $_POST["password_ut"];
    
    // if(isset($_POST["role"])){
    //     $role = $config["ROLES"][0];
    // }else{
    //     $role = $config["ROLES"][1];
    // }

    //grabbing the picture
		$file = $_FILES['image_ut']['name'];
		$file_loc = $_FILES['image_ut']['tmp_name'];
		$folder="/epn/assets/img/"; 
		$new_file_name = strtolower($file);
		$final_file=str_replace(' ','-',$new_file_name);

		if(move_uploaded_file($file_loc,$folder.$final_file)){
			$image=$final_file;
		 }
    
    $req = $dbh->prepare("INSERT INTO utilisateur(nom_ut, prenom_ut, email_ut, image_ut, username_ut, password_ut, role_ut) 
                                         VALUE(:nom_ut, :prenom_ut, :email_ut, :image_ut, :username_ut, :password_ut, :role_ut)");
    $req->bindParam(":nom_ut", $_POST["nom_ut"]);
    $req->bindParam(":nom_ut", $_POST["prenom_ut"]);
    $req->bindParam(":email_ut", $_POST["email_ut"]);
    $req->bindParam(":image_ut", $image);
    $req->bindParam(":username_ut", $_POST["username_ut"]);
    $req->bindParam(":password_ut", $hash );
    $req->bindParam(":role_ut", $role);
    $req->execute();
    
    $message = "Compte créé";
    header("Location: /epn/liste/utilisateur/ut.php?message=$message&type=success");
}
