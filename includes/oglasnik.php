<?php
require_once("session.php");
require_once("database.php");
require_once("functions.php");
require_once("users.php");

class Oglasnik {
		public static $table_name ="oglasi";
		
		
	public $id;
	public $user_id;
	public $kategorija;
	public $vrsta_instrumenta;
	public $marka;
	public $model;
	public $god_proizvodnje;
	public $opis;
	public $slika1;
	public $slika2;
	public $slika3;
	public $cijena;
	public $datum_objave;
	
	
	// metode baze podataka //
	public static function find_all_ads_from_user($user_id){
		$sql = "SELECT * FROM ".self::$table_name." 
				WHERE user_id='{$user_id}' ";
		return self::find_ad_by_sql($sql);
	}
	
	public static function count_all_ads_in_category($kategorija){
		global $database;
		$sql = "SELECT COUNT(*) FROM ".self::$table_name." 
				WHERE kategorija='{$kategorija}';";
		$result_set = $database->query($sql); // u bazi podataka count radi tako da vrati assoc niz, gdje je key naredba COUNT, a value je broj koliko ima unosa u tablici, tako nesto
			$row = $database->fetch_array($result_set);
			return array_shift($row);
	}
	public static function count_all_ads(){
		global $database;
		$sql = "SELECT COUNT(*) FROM ".self::$table_name."";
		$result_set = $database->query($sql); 
			$row = $database->fetch_array($result_set);
			return array_shift($row);
	}
	// funkcija koja vraca broj postavljenih oglasa od korisnika
	public static function count_all_ads_by_user($user_id){
		global $database;
		$sql = "SELECT COUNT(*) FROM ".self::$table_name." 
				WHERE user_id='{$user_id}';";
		$result_set = $database->query($sql); // u bazi podataka count radi tako da vrati assoc niz, gdje je key naredba COUNT, a value je broj koliko ima unosa u tablici, tako nesto
			$row = $database->fetch_array($result_set);
			return array_shift($row);
	}
	//funkcija koja selektira user_id od korisnika koji ima najviše oglasa u oglasniku
	public static function count_most_ads_by_user(){
		global $database;
		$sql="SELECT user_id FROM ".self::$table_name." group by user_id order by count(*) desc limit 1";
		$result_set = $database->query($sql); 
			$row = $database->fetch_array($result_set);
			return array_shift($row);
	}
	
	public static function find_ad_by_id($id){ // preko get metode ubaci kategoriju
		$result_array = self::find_ad_by_sql("SELECT * FROM ".self::$table_name." WHERE id='{$id}' ");
		return array_shift($result_array); // pošto find by sql stavlja resultate u niz, moramo za jedan oglas staviti array_shift da "izbacimo" jedan unos iz niza
		
	}
	
	
	public static function find_ad_by_category($kategorija){ // preko get metode ubaci kategoriju
		$sql = "SELECT * FROM ".self::$table_name." 
				WHERE kategorija='{$kategorija}' ";
		return self::find_ad_by_sql($sql);
		
	}
	
	public static function find_ad_by_sql($sql){
		global $database;
		$result = $database->query($sql);
		//$result_set = $database->fetch_array($result);
		$result_set = array();
		while($object = mysqli_fetch_object($result)){
			$result_set[] = self::create_ad($object);
	
		}
		return $result_set;
	}
	
	public static function create_ad($object){
		$oglasi = new Oglasnik();
		foreach($object as $key=>$value){
			if(property_exists($oglasi,$key)){
				$oglasi->$key=$value;
			}
		}
		return $oglasi;
	}
	
	
	
	// kraj metoda baza podataka //
	


	
	
}



?>