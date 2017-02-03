<?php
require_once("session.php");
require_once("database.php");
require_once("functions.php");
require_once("users.php");
require_once("oglasnik.php");
require_once("novioglas.php");
require_once("uredioglas.php");

class ObrisiOglas extends UrediOglas {
		public static $table_name ="oglasi";
		
	
	public function obrisi_oglas($oglas_id){
		global $database;
		
		$oglas_delete= ObrisiOglas::find_ad_by_id($oglas_id); //nalazimo taj oglas preko oglas id-a
		
				
			if($oglas_delete->slika1 == "nema_slike_oglasa.jpg"){
				// ako je ime slike defaultna nemoj napraviti nista
				//ako je ime slike drugacije, obrisi tu sliku iz images/slike_oglasa/
			}else{
					//obrisi sliku koja je postavljena
					$target_path="images/slike_oglasa/".$oglas_delete->slika1; 
					unlink($target_path); 
					
			}
			if($oglas_delete->slika2 == "nema_slike_oglasa.jpg"){
				
			}else{			
					$target_path="images/slike_oglasa/".$oglas_delete->slika2; 
					unlink($target_path); 
					
			}
			if($oglas_delete->slika3 == "nema_slike_oglasa.jpg"){
				
			}else{
					$target_path="images/slike_oglasa/".$oglas_delete->slika3; 
					unlink($target_path); 
					
			}
		

		return self::delete_ad_database($oglas_delete->id);
		
	}
		// staticka funkcija koja briše sva polja
	protected static function delete_ad_database($id_oglasa){
		global $database;
		
		
		$sql ="DELETE FROM ".self::$table_name."  
			   WHERE id='{$id_oglasa}'
			   LIMIT 1 ";
		$database->query($sql);
		
		redirect_to("../public/user_profile.php"); 
		
	}

	
}



?>