<?php
require_once("config.php"); // ovdje su pohranjene varijable za spajanje na bazu, sifra, username,servername,dbname...


class MySqlDatabase {
		
	private $connection; // oprezno, pošto je private moze biti pozvano jedino iz ove klase
	
	
		function __construct() {
				
				$this->open_connection();
		}
		// spajanje na bazu
		public function open_connection(){
			
			 $this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
			 mysqli_set_charset($this->connection, "utf8");
			 if(mysqli_connect_errno()){
				 die("Greška prilikom spajanja na server: ".mysqli_connect_error(). " ( ". mysqli_connect_errno()." )");
			 }
		}
		
		// funkcija za zastitu baze podataka
	
		public function mysqli_escape($string){
			$this->connection;
			$escaped_value = mysqli_real_escape_string($this->connection, $string);
			// dodatak za postotke i underscore $more_escaped = addcslashes($escaped_string, '%_');
			return $escaped_value;
		}
		
		public function query($sql){
			$result = mysqli_query($this->connection,$sql);
			$this->confirm_query($result);
			return $result;
		}
		
		private function confirm_query($result) {
		if (!$result) {
			$output ="Database query failed:  " . mysqli_error($this->connection) . "<br /><br />";
			
			die($output);
		}
	}
	
	
		// funkcija koja izvadi id od stavljenog unosa u bazu
			public function insert_id(){
			return mysqli_insert_id($this->connection);
		}	
		// funkcija koja vraca broj selektiranih redova npr "SELECT * FROM users" -> pa vrati broj redova koliko ima usera
		public function num_rows($result_set){
			return mysqli_num_rows($result_set);
		}
		public function fetch_array($result){
			 $result_set = array();
			while($row = mysqli_fetch_assoc($result)){
				$result_set = $row;
			}
			return $result_set; // vraća se kao array
		}
		
		public function fetch_object($result){
			 $result_set = array();
			while($object = mysqli_fetch_object($result)){
				$result_set[] = $object;
			}
			return $result_set; // vraća se kao array
		}
	
	
}

$database = new MySqlDatabase(); // gdjegod includamo database.php cemo automatski imati konekciju na server

?>