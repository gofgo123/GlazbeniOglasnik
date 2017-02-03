<?php
 require_once("database.php"); 
 require_once("functions.php"); 
 require_once("session.php"); 
 require_once("registration.php"); 
 
 class Users{
	protected static $table_name ="users";
	
	//protected static $db_fields = array('id', 'first_name', 'last_name', 'username', 'email', 'password', 'city', 'area', 'postal_code', 'adress','mobile_phone', 'gender');
	
	public $id;
	public $first_name;
	public $last_name;
	public $username;
	public $email;
	public $password;
	public $city;
	public $area;
	public $postal_code;
	public $adress;
	public $mobile_phone;
	public $gender;
	
############################database methods#############################################
	//find by username 
	public static function find_by_username($username=""){

		$sql ="SELECT * FROM ".self::$table_name." WHERE username='{$username}'";
		return self::find_by_sql($sql);
	}
	
	//find by id
	public static function find_by_id($id=0){

		$sql ="SELECT * FROM ".self::$table_name." WHERE id='{$id}'";
		return self::find_by_sql($sql);
	}
	
	//find by sql
	public static function find_by_sql($sql=""){
		global $database;
		$result = $database->query($sql); 
		if(empty(mysqli_num_rows($result))){ // u slucaju da query nije mogao naci nista, u rezultat stavlja nulu odnosno empty je, mogao sam jos napisati if(mysqli_num_rows($result) is null)
			return false;
		}else{
		$result_set= $database->fetch_array($result); // stavljamo podatke u niz/array;
		return self::create_obj($result_set); //šaljemo array; 
		}			
	}
	
	public static function create_user($korisnicki_podaci){ //prima array iz registration.php-a
		// INSERT INTO table_name (column1,column2,column3,...)
		// VALUES (value1,value2,value3,...);
		
		global $database; // jer je connection stavljen na private u database.php
		$sql ="INSERT INTO ".self::$table_name." (".join(", ",array_keys($korisnicki_podaci)).") 
			   VALUES ('".join("', '",array_values($korisnicki_podaci))."')";
		$id=$database->insert_id(($database->query($sql))); //mysqli_insert_id uzima vrijednost netom stavljenog ID-a prilikom dodavanja korisnika u bazu
			global $session;
			$session->log_in($id); // izvuceni id vucemo kroz funkciju koja postavlja ID u sesiju
		redirect_to("index.php"); //odlazimo na index.php gdje je uvjet da ako je stavljen ID da nadje tog korisnika u bazi i logira ga
	}
	
	//funkcija koja ce update-at korisnikov profil
	public static function update_user_sql($korisnicki_podaci_update,$id){ //prima array 
		global $database; // jer je connection stavljen na private u database.php
		foreach($korisnicki_podaci_update as $key=>$value){
			$podaci[] = "{$key}='{$database->mysqli_escape($value)}'"; // npr [first_name]='Gordan' i usput za svaku vrijednost mysqli_real_escape_string
		}
		
		$sql ="UPDATE ".self::$table_name." SET ".join(", ",$podaci)." 
			   WHERE id='{$id}'";
		$database->query($sql);
		
		redirect_to("../public/user_profile.php"); 

	}
	
	
	// dodatak za statistike:
	public static function count_all_users(){
		global $database;
		$sql = "SELECT COUNT(*) FROM ".self::$table_name."";
		$result_set = $database->query($sql); 
			$row = $database->fetch_array($result_set);
			return array_shift($row);
	}
############################ end of database methods #############################################
	
	// napravi objekt temeljem sql upita
	public function create_obj($result_set){
		$user = new Users();	//stvaramo objekt 
		
		foreach($result_set as $key=>$value){ // znaci uzeli smo $key sto su podaci iz baze podataka npr [first_name]  a Gordan je $value
				if (property_exists($user,$key)){ // ako postoji propretie/varijabla u instanciranoj klasi istog imena kao ona iz baze 
					$user->$key = $value;			// stavi istanciranoj varijabli pod tim imenom($key) vrijednost iz baze($value)
				}
		}
		return $user;	//vracamo dobivenog usera popunjenog podacima iz sql-a
	}
	
	// funkcija koja pronadje korisnika, zamjeni mu propreties sa novim vrijednostima te šalje dalje u staticku funkciju koja te podatke ubaci u bazu podataka.
	public function update_user($id){
		global $database;
		
		$user_update= Users::find_by_id($id);
		$korisnicki_podaci = array();
				
			    $user_update->first_name = $_POST['first_name'];
				$user_update->last_name = $_POST['last_name'];
				$user_update->city = $_POST['city'];
				$user_update->area = $_POST['area'];
				$user_update->postal_code = $_POST['postal_code'];
				$user_update->adress = $_POST['adress'];
				$user_update->mobile_phone = $_POST['mobile_phone'];
				$user_update->gender = $_POST['gender'];
				
				$korisnicki_podaci=get_object_vars($user_update);
				return self::update_user_sql($korisnicki_podaci,$user_update->id); // probaj sa user umjesto korisnicki_podaci
				
		}
		
	
	


	
	

	
	
}
?>