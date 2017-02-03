<?php
 require_once("database.php"); 
 require_once("functions.php"); 
 require_once("session.php"); 
 
class UserPhoto {
		static $table_name ="users_photos";
		public $errors=array();
	public $id;
	public $user_id;
	public $filename;
	public $size;
	public $type;
	public $tmp_name;
	
	// *********** database methods ********
	
	
	
	public static function find_user_photo_by_id($id){
		
		$sql = "SELECT * FROM ".self::$table_name ." 
				WHERE user_id='{$id}'";
		return self::find_user_photo_by_sql($sql);
		
	}
	
	public static function find_user_photo_by_sql($sql=""){
		global $database;
		$result=$database->query($sql);
		if(mysqli_num_rows($result) == 1){ // ako je uspješan query, odnosno ako je nadjen taj red
			$result_set=$database->fetch_array($result); //stavi podatke red-a u array
		return self::napravi_objekt($result_set);
		}else{ // znaci da korisnik nema sliku u bazi 
			return false;
		}
		
	}
	
	
	//************************	end of database methods ************************
	public function napravi_objekt($result_set){
		$slika = new UserPhoto();
		
			foreach($result_set as $key=>$value){
				if(property_exists($slika,$key)){
					$slika->$key=$value;
				}
			}
		return $slika;
		
	}
	
	public function nova_slika($file,$id){ 						// , $file je nova slika $_FILES['image']		
		
		
		
		if(!empty($file) and is_array($file)){ // ako file nije prazan i niz je.
			global $session;
				if ($file['error'] == 0 ){ // ako file nema errora (0 znaci no errors) napravi sljedeće
						if($file['size'] < 1500000){
							if($file['type'] == 'image/jpeg' or $file['type'] == 'image/gif' or $file['type'] == 'image/png') {
									$nova_slika = new UserPhoto(); 
									
									$nova_slika->user_id = $id;
									$nova_slika->filename = $file['name'];
									$nova_slika->size = $file['size'];
									$nova_slika->type = $file['type'];
									$nova_slika->tmp_name = $file['tmp_name'];
									move_uploaded_file($nova_slika->tmp_name,"images/user_images/".$nova_slika->user_id.$nova_slika->filename);
						
									return self::create_user_photo($nova_slika); // saljemo objekt slike
							}else{
								$session->set_message("Slika mora biti jpg,jpeg,gif ili png format,vaš format je - {$_FILES['image']['type']}");
								return false;
							}
						}else{
							$session->set_message("Slika mora biti maksimalne veličine do 1.5 mb!");
							return false;
							}
				}else{
					$session->set_message("Problem sa uploadom slike");
					return false;
				}
		}else{
			return false;
			}
			
	
	
	} //end of nova_slika()
	
	public static function create_user_photo($objekt){
		global $database;
		$nova_slika = $objekt;
		
		if($slika = UserPhoto::find_user_photo_by_id($nova_slika->user_id)){ 	// ako korisnik vec ima sliku u bazi podataka
			$target_path="images/user_images/".$slika->filename;	// nadji tu 
			unlink($target_path);									//sliku i obrisi ju sa diska i onda updejtaj podatke u  bazi podataka
			$sql = "UPDATE ".self::$table_name."
					SET		filename='{$nova_slika->user_id}{$nova_slika->filename}', type='{$nova_slika->type}', size='{$nova_slika->size}' 
					WHERE user_id='{$nova_slika->user_id}'";
			$result = $database->query($sql);
				if($result){
						redirect_to("user_profile_edit.php");
						return true;
				}else{
						return false;
					}
			}else {	//ako korisnik nema podatke u bazi, kreiraj podatke
		
				$sql ="INSERT INTO ".self::$table_name." (user_id, filename, type, size) 
					   VALUES ('{$nova_slika->user_id}', '{$nova_slika->user_id}{$nova_slika->filename}', '{$nova_slika->type}', '{$nova_slika->size}')";
				$result = $database->query($sql);
				if($result){
						redirect_to("user_profile_edit.php");
						return true;
				}else{
						return false;
					}
			}
		
		
	}
	
	
	
	
}

?>