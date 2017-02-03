<?php
require_once("../includes/session.php");
require_once("../includes/database.php");
require_once("../includes/users.php");
require_once("../includes/oglasnik.php");
require_once("../includes/novioglas.php");
require_once("../includes/uredioglas.php");
require_once("../includes/obrisioglas.php");

if(isset($_GET['id'])){
	$oglas = ObrisiOglas::find_ad_by_id($_GET['id']);
	
	if($oglas->user_id == $_SESSION['id']){ // cisto provjera da netko sa drugim ID-em nemoze obrisati tuđi oglas
	$delete=new ObrisiOglas();
	$delete->obrisi_oglas($_GET['id']);

	}else{
		redirect_to("index.php");
	}
}



?>