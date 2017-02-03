<?php
require_once("session.php");
require_once("database.php");
require_once("functions.php");
require_once("users.php");
require_once("oglasnik.php");

class NoviOglas extends Oglasnik {
		
		
		
	
	public function novi_oglas(){
		global $database;
		if ($this->check_fields() == true){
		//$this->$id; još ga nema, automatski ce se napraviti u bazi
		$this->user_id = $_POST['user_id'];
		$this->kategorija = $_POST['kategorija'];
		$this->vrsta_instrumenta = $database->mysqli_escape($_POST['vrsta_instrumenta']);
		$this->marka = $database->mysqli_escape($_POST['marka']);
		$this->model = $database->mysqli_escape($_POST['model']);
		$this->god_proizvodnje = $this->check_god_proizvodnje($_POST['god_proizvodnje']);
		$this->opis = $database->mysqli_escape($_POST['opis']);
		$this->cijena = $this->check_cijena($_POST['cijena']);
		$this->datum_objave = $_POST['datum_objave'];
		
			if(empty($this->errors)){							//da  ne uploada sliku ako ima grešaka 
		$this->slika1 = $this->upload_photo($_FILES['slika1']);// $_FILES['slika1']['errors'] ,$_FILES['slika1']['type'] , ...['size']
			}
			if(empty($this->errors)){	
		$this->slika2 = $this->upload_photo($_FILES['slika2']);
			}
			if(empty($this->errors)){
		$this->slika3 = $this->upload_photo($_FILES['slika3']);
			}
		$podaci_oglasa = array();
		$podaci_oglasa = get_object_vars($this);
		// array_shift($podaci_oglasa); /// micemo prvi propretie objekta (errors) jer nam netreba kada cemo uploadat u bazu podataka
		return self::create_ad_database($podaci_oglasa);
		}
	}
	
	
	protected function check_fields(){
		if( $this->check_opis_length($_POST['opis'])
		and $this->check_photo($_FILES['slika1'])
		and $this->check_photo($_FILES['slika2'])
		and $this->check_photo($_FILES['slika3'])
		and $this->check_cijena($_POST['cijena']) 
		and $this->check_god_proizvodnje($_POST['god_proizvodnje']) 
		and $this->provjeri_vrstu($_POST['vrsta_instrumenta'])
		
			){
		
		return true;
			}else{
			return false;
		}
		
		
	}
	
	
	public static function create_ad_database($podaci_oglasa){
		// INSERT INTO table_name (column1,column2,column3,...)
		// VALUES (value1,value2,value3,...);
		
		global $database; // jer je connection stavljen na private u database.php
		$sql ="INSERT INTO ".self::$table_name." (".join(", ",array_keys($podaci_oglasa)).") 
			   VALUES ('".join("', '",array_values($podaci_oglasa))."')";
		$id=$database->insert_id(($database->query($sql))); //mysqli_insert_id uzima vrijednost netom stavljenog ID-a prilikom dodavanja oglasa u bazu
			global $session;
			 // izvuceni id vucemo kroz funkciju koja postavlja ID u sesiju
		redirect_to("oglasi_details.php?id={$id}"); //odlazimo na index.php gdje je uvjet da ako je stavljen ID da nadje tog korisnika u bazi i logira ga
	}
	
	//provjere slika i upload
	public function check_photo($file){ // provjeravamo $_FILES['slika#']
		global $session;
		if($file['error'] == 4){		//ako  file nije uploadan == 4
			return true;
		}
		if($file['error'] == 2){		//ako  file nije uploadan == 4
			$session->errors[] ="{$file['name']} slika je veća od dozvoljenih 1.5mb ";
			return false;
		}
		
		if($file['type'] == 'image/jpeg' or $file['type'] == 'image/gif' or $file['type'] == 'image/png'){  // ako su slike ok
			return true;
			}else{
				$session->errors[] = "Slika može biti samo u jpeg,gif,jpg te png formatu- vaš format je {$file['type']}";
				return false;
			}
		
	}
	
	public function upload_photo($file){
		global $session;
		if($file['error'] == 4){		//ako  file nije uploadan odnosno je prazan stavi mu vrijednost defaultne slike
			return "nema_slike_oglasa.jpg";
		}else{ 
			$id = $this->user_id; // stavljamo ovo tako da bude u imenu file-a slike korisnikov id
			$filename = $file['name'];
			$tmp_name = $file['tmp_name'];
			
			move_uploaded_file($tmp_name,"images/slike_oglasa/".$id."--".$filename); // npr 2--slika44.jpg
			return "{$id}--{$filename}"; //to cemo spremiti u bazu
			}
	}
	

	
	// provjera duljine opisa oglasa
	public function check_opis_length($file){
		global $session;
		if(strlen($file) > 500){
			$session->errors[] =" Malo ste ste zaigrali u opisu oglasa...maksimalno 500 znakova";
			return false;
		}elseif(strlen($file) < 5){
			$session->errors[] =" Pa valjda ste u stanju napisati više od 5 znakova u opisu??";
			return false;
		}else{
			return true;
		}
	}
	
	// funkcija koja zadrzava korisnikove unose u slucaju greske
	public function keep($field_value=""){
			if(isset($_POST["{$field_value}"])){
				return $_POST["{$field_value}"];
			}else{
				return null;
			}
		}
	
	// provjerava dali je godina izmedju 1900 do ove godine	
	public function check_god_proizvodnje($godina){
		global $session;
		
		if(!empty($godina) and $godina > 1900 and $godina <= date("Y", time())) {
			return $godina;
		}else{
			$session->errors[] =" Godina mora biti između 1900 do ove godine";
			return false;
		}
	}
	
	public function check_cijena($cijena){
		global $session;
		if(empty($cijena) or $cijena <= 1){
			$session->errors[] ="Morate staviti cijenu npr. 1750";
			return false;
			
		}else{
			return $cijena;
		}
		
	}
	
	public function provjeri_vrstu($file){
		global $session;
		if(!empty($file)){
			return true;
		}else{
				$session->errors[] ="Morate izabrati vrstu instrumenta";
			}
	}
	
	
	
}

$novi_oglas = new NoviOglas();

?>