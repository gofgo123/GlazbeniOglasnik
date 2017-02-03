<?php
require_once("session.php");
require_once("database.php");
require_once("functions.php");
require_once("users.php");
require_once("oglasnik.php");
require_once("novioglas.php");

class UrediOglas extends NoviOglas {
		public static $table_name ="oglasi";
		
	
	public function uredi_oglas($id){
		global $database;
		global $session;
		$oglas_edit= UrediOglas::find_ad_by_id($_GET['id']); //nalazimo taj oglas preko oglas id-a
		if ($this->check_fields() == true){
		$oglas_edit->user_id = $_POST['user_id'];	
		$oglas_edit->id = $id; //id oglasa
		$oglas_edit->vrsta_instrumenta = $database->mysqli_escape($_POST['vrsta_instrumenta']);
		$oglas_edit->marka = $database->mysqli_escape($_POST['marka']);
		$oglas_edit->model = $database->mysqli_escape($_POST['model']);
		$oglas_edit->god_proizvodnje = $this->check_god_proizvodnje($_POST['god_proizvodnje']);
		$oglas_edit->opis = $database->mysqli_escape($_POST['opis']);
		$oglas_edit->cijena = $this->check_cijena($_POST['cijena']);
		$oglas_edit->datum_objave = $_POST['datum_objave'];
		
			if($_FILES['slika1']['error'] == 4){
				// ako file nije uploadan, nista ne mjenjaj
				//slika nije mjenjana, error 4 = no photo uploaded
			}else{
					//obrisi prijasnju sliku 
					$target_path="images/slike_oglasa/".$oglas_edit->user_id."--".$oglas_edit->slika1; 
					unlink($target_path); 
					// uploadaj novu sliku
					$oglas_edit->slika1 = $this->upload_photo($_FILES['slika1'],$oglas_edit->user_id);// $_FILES['slika1']['errors'] ,$_FILES['slika1']['type'] , ...['size']
			}
			if($_FILES['slika2']['error'] == 4){
				// ako file nije uploadan, nista ne mjenjaj
				
			}else{			
					$target_path="images/slike_oglasa/".$oglas_edit->user_id."--".$oglas_edit->slika2; 
					unlink($target_path); 
					$oglas_edit->slika2 = $this->upload_photo($_FILES['slika2'],$oglas_edit->user_id);
			}
			if($_FILES['slika3']['error'] == 4){
				// ako file nije uploadan, nista ne mjenjaj
				
			}else{
					$target_path="images/slike_oglasa/".$oglas_edit->user_id."--".$oglas_edit->slika3; 
					unlink($target_path); 
					$oglas_edit->slika3 = $this->upload_photo($_FILES['slika3'],$oglas_edit->user_id);
			}
		$podaci_oglasa = array();
		$podaci_oglasa = get_object_vars($oglas_edit);

		return self::update_ad_database($podaci_oglasa,$oglas_edit->id);
		}
	}
		// staticka funkcija koja updejta sva polja
	protected static function update_ad_database($podaci_oglasa,$id){
		global $database;
		
		foreach($podaci_oglasa as $key=>$value){
			$podaci[] = "{$key}='{$value}'"; // npr [first_name]='Gordan'
		}
		
		$sql ="UPDATE ".self::$table_name." SET ".join(", ",$podaci)." 
			   WHERE id='{$id}'";
		$database->query($sql);
		
		redirect_to("../public/oglasi_details.php?id={$id}"); 
		
	}
		// uploada sliku i obrise ju
	public function upload_photo($file,$id){ // $_FILES['slika1']['errors'] ,$_FILES['slika1']['type'] , ...['size']
		global $session;
		
			
			
			$id_user = $id; // stavljamo ovo tako da bude u imenu file-a slike korisnikov id
			$filename = $file['name'];
			$tmp_name = $file['tmp_name'];
			
			move_uploaded_file($tmp_name,"images/slike_oglasa/".$id_user."--".$filename); // npr 2--slika44.jpg
			return "{$id_user}--{$filename}"; //to cemo spremiti u bazu
			
	}
	
	
	
}



?>