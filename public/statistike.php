<?php require_once("layouts/header.php"); ?>
<?php require_once("../includes/database.php"); ?>
<?php require_once("../includes/oglasnik.php"); ?>
<?php require_once("../includes/users.php"); ?>

  
<?php
if($session->logged_in()){
	require_once("layouts/nav_user.php");
}else{
	require_once("layouts/nav_guest.php"); 	
}
 ?>
<?php 
	$ukupno_oglasa = Oglasnik::count_all_ads(); // sveukupno oglasa
	$br_gitara = Oglasnik::count_all_ads_in_category("gitare"); // broj oglasa u određenoj kategoriji
	$br_bubnjeva = Oglasnik::count_all_ads_in_category("bubnjevi");
	$br_gudacki = Oglasnik::count_all_ads_in_category("gudacki");
	$br_elektronika = Oglasnik::count_all_ads_in_category("elektronika");
	$br_mikrofoni = Oglasnik::count_all_ads_in_category("mikrofoni");
	$br_kablovi = Oglasnik::count_all_ads_in_category("kablovi");
	$br_oprema = Oglasnik::count_all_ads_in_category("oprema_razno");
	$br_bend = Oglasnik::count_all_ads_in_category("bend");
	
	$br_korisnika = Users::count_all_users(); // dobivamo broj svih registriranih korisnika
	
	$user_id=Oglasnik::count_most_ads_by_user(); // dobivamo korisnikov user_id od korisnika sa najvise unosa u oglasnik
	$korisnik_sa_najvise_oglasa = Users::find_by_id($user_id); // istanciramo objekt korisnika putem user_id-a
	$broj_oglasa = Oglasnik::count_all_ads_by_user($user_id); // dobivamo  broj oglasa tog korisnika
	$novi_oglas = array_shift(Oglasnik::find_ad_by_sql("SELECT * FROM oglasi ORDER BY datum_objave DESC LIMIT 1"));
	$zadnji_oglas = array_shift(Oglasnik::find_ad_by_sql("SELECT * FROM oglasi ORDER BY datum_objave ASC LIMIT 1"));
	
?>
 
    <div class="container">
	<h4>Statistike</h4>
		<div class="row">
		
		
			<div class="col-md-3">
			
			<?php
			echo "<p>ukupan broj oglasa u oglasniku </p>";
			echo "<p>broj oglasa u kategoriji gitare</p>";
			echo "<p>broj oglasa u kategoriji bubnjevi </p>";
			echo "<p>broj oglasa u kategoriji gudački </p>";
			echo "<p>broj oglasa u kategoriji elektronika </p>";
			echo "<p>broj oglasa u kategoriji mikrofoni </p>";
			echo "<p>broj oglasa u kategoriji kablovi </p>";
			echo "<p>broj oglasa u kategoriji oprema(razno) </p>";
			echo "<p>broj oglasa u kategoriji bend </p>";
			?>
			</div>
			<div class="col-md-1">
			<?php
			echo "<p>{$ukupno_oglasa}</p>";
			echo "<p>{$br_gitara}</p>";
			echo "<p>{$br_bubnjeva}</p>";
			echo "<p>{$br_gudacki}</p>";
			echo "<p>{$br_elektronika}</p>";
			echo "<p>{$br_mikrofoni}</p>";
			echo "<p>{$br_kablovi}</p>";
			echo "<p>{$br_oprema}</p>";
			echo "<p>{$br_bend}</p>";
			?>
			</div>
			
			<div class="col-md-3">
			<p>Ukupno registriranih korisnika</p>
			<p>Korisnik sa najviše oglasa</p>
			<p>Najnoviji oglas :</p>
			<p>Najstariji oglas :</p>
			</div>
			<div class="col-md-2">
			<?php
			echo "<p>{$br_korisnika}</p>";
			echo "<p><a href=user_profile.php?id={$korisnik_sa_najvise_oglasa->id}>{$korisnik_sa_najvise_oglasa->first_name} {$korisnik_sa_najvise_oglasa->last_name} - {$broj_oglasa} oglasa</a></p>";
			echo "<p><a href=\"oglasi_details.php?id={$novi_oglas->id}\">{$novi_oglas->vrsta_instrumenta} - {$novi_oglas->marka}</a></p>";
			echo "<p><a href=\"oglasi_details.php?id={$zadnji_oglas->id}\">{$zadnji_oglas->vrsta_instrumenta} - {$zadnji_oglas->marka}</a></p>";
			?>
			</div>
			
			
	
	
	
	</div>
<?php require_once("layouts/footer.php"); ?>	
	