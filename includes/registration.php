<?php
require_once("session.php");
require_once("database.php");
require_once("functions.php");
require_once("users.php");

class Registration {
	public $korisnicki_podaci =array();
	public $reg_errors=array();
	
	
	public function register(){
		global $database;
			if($this->check_required_fields() == true){	
			
				$novi_korisnik= new Users();
				
				//$novi_korisnik->id trebam ga izvuc iz baze kada se napravi i stavit u sesiju
				$novi_korisnik->username = $database->mysqli_escape($_POST['username']);
				$novi_korisnik->password = kriptiraj($database->mysqli_escape($_POST['password']));
				$novi_korisnik->email = $database->mysqli_escape($_POST['email']);
				$novi_korisnik->first_name = $database->mysqli_escape($_POST['first_name']);
				$novi_korisnik->last_name = $database->mysqli_escape($_POST['last_name']);
				$novi_korisnik->city = $database->mysqli_escape($_POST['city']);
				$novi_korisnik->area = $database->mysqli_escape($_POST['area']);
				$novi_korisnik->postal_code = $database->mysqli_escape($_POST['postal_code']);
				$novi_korisnik->adress = $database->mysqli_escape($_POST['adress']);
				$novi_korisnik->mobile_phone = $database->mysqli_escape($_POST['mobile_phone']);
				$novi_korisnik->gender = $database->mysqli_escape($_POST['gender']);				
				
				$this->korisnicki_podaci=get_object_vars($novi_korisnik);
				//return $novi_korisnik;
				 $novi_korisnik::create_user($this->korisnicki_podaci); 
			}
		}
		
		private function potvrdi_lozinku($password2,$password1){
			if($password2 === $password1 ){
				return true;
			}else{
				$this->reg_errors[]="Lozinke se ne podudaraju!";
			}
		}
		
		private function pravila(){
			if(isset($_POST['pravila']) and $_POST['pravila'] == 1){
				return true;
			}else{
				$this->reg_errors[]="Morate prihvatiti pravila stranice kako bi se registrirali!!";
				return false;
			}
		}
			// funkcija koja provjerava polja koja su obavezna
		private function check_required_fields(){
			if( 	$this->db_username_exists($this->check_fields("Korisničko ime",$_POST['username'])) 
				and $this->check_fields("Lozinka",$_POST['password']) 
				and $this->potvrdi_lozinku($_POST['password2'],$_POST['password']) 
				and $this->pravila()
				and $this->db_email_exists($this->check_fields("Email",$_POST['email'])) 
				and $this->check_pass($_POST['password'])){
					return true;
				}else{
					return false;
				}
		}
		//funkcija koja provjerava dali korisnicko ime vec postoji u bazi
		private function db_username_exists($username){
			global $database;
			$username = $database->mysqli_escape($_POST['username']);
			$sql = "SELECT * FROM users WHERE username='{$username}'";
			$result = $database->query($sql);
			if(mysqli_num_rows($result) === 1){ //ako postoji unos u bazi
				$this->reg_errors[]="Nažalost,to korisničko ime je već zauzeto!";
			}else{
				return true;
			}
			
		}
		//funkcija koja provjerava dali email postoji u bazi
		private function db_email_exists($email){
			global $database;
			$email = $database->mysqli_escape($_POST['email']);
			$sql = "SELECT * FROM users WHERE email='{$email}'";
			$result = $database->query($sql);
			if(mysqli_num_rows($result) === 1){ //ako postoji unos u bazi
				$this->reg_errors[]="Unesena e-mail adresa je već registrirana u bazi!";
			}else{
				return true;
			}
		}
		
		//funkcija koja provjerava dali je prazno polje
		private function check_fields($field="",$string){
			if(empty($string)){
				 $this->reg_errors[]="Polje: {$field} mora biti ispunjeno \n";
				 return false;
			}else{
				return true;
			}
		}
		
		// funkcija koja provjerava duljinu lozinke
		private function check_pass($password){
			if(strlen($password) <=7){
				 $this->reg_errors[]="Lozinka mora imati minimalno 8 znakova, sigurnost je radi Vas a ne radi nas";
				 return false;
			}else{
				return true;
			}
		}
	
		// funkcija koja ce ostaviti unose u formi ako je doslo do greške
		public function keep_records($field_value=""){
			if(isset($_POST["{$field_value}"])){
				return $_POST["{$field_value}"];
			}else{
				return null;
			}
		}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}

$registration = new Registration();

?>