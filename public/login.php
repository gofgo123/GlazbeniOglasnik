<?php require_once("../includes/database.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/users.php"); ?>
<?php

if(isset($_POST['prijava'])){
	if(isset($_POST['username']) and !empty($_POST['username'])){
		$username = $database->mysqli_escape($_POST['username']);
	}else{
		$session->set_message("Niste napisali korisničko ime..");
		redirect_to("index.php");
	}
	if(isset($_POST['password']) and !empty($_POST['password'])){
		$password = $database->mysqli_escape($_POST['password']);
	}else{
		$session->set_message("Lozinka nemože biti prazna");
		redirect_to("index.php");
	}
}else{
		redirect_to("index.php");
	}
	
	
	
	if($user = Users::find_by_username($username)){ // trazimo korisnika preko usernamea tako da mozemo usporediti kriptiranu sifru
		// ako je korisnicko ime nadjeno provjeri lozinku
		if(dekriptiraj($password,$user->password)){ // provjeravamo dali je ukucana sifra jednaka onoj kriptiranoj u bazi
			$session->log_in($user->id); // ako je sifra u redu stavi korisnikov id u sesiju i preusmjeri ga
			redirect_to("index.php");
		}else{
			$session->set_message("Niste unjeli ispravno korisničko ime ili LOZINKU"); //velika slova radi testiranja, delete
			redirect_to("index.php");
			}
	}else{ // ako je korisnicko ime krivo napravi ovo
		$session->set_message("Niste unjeli ispravno KORISNIČKO ime ili lozinku"); // velika slova radi testiranja , delete
		redirect_to("index.php");
		}





?>
