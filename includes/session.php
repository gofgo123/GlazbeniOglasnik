<?php

class Session{
	public $errors = array();
	public $message; // za pohranjivanje poruka iz sesije
	
	function __construct(){
		session_start();
		$this->check_message();
	}
	
	public function set_errors($msg=""){
		if(!empty($msg)){
			$_SESSION['errors'] = $msg;
		}else{
			return $this->errors;
		}
	}
	
	
	public function set_message($msg=""){
		if(!empty($msg)){
			$_SESSION['message'] = $msg;
		}else{
			return $this->message;
		}
	}
	public function check_errors() {
		// Is there a message stored in the session?
		if(isset($_SESSION['errors'])) {
			// Add it as an attribute and erase the stored version
			  $this->errors = $_SESSION['errors'];
			  unset($_SESSION['errors']);
		} else {
			$this->errors = "";
		}
	}	
	
	public function check_message() {
		// Is there a message stored in the session?
		if(isset($_SESSION['message'])) {
			// Add it as an attribute and erase the stored version
			  $this->message = $_SESSION['message'];
			  unset($_SESSION['message']);
		} else {
			$this->message = "";
		}
	}	
		
		
	public function log_in($id){
		$_SESSION['id'] = $id;
	}
	
	public function logged_in(){
		if(isset($_SESSION['id'])){
			return true;
		}else{
			return false;
		}
	}
	
	public function logout(){
		unset($_SESSION['user_id']);
		session_destroy();
	}
	
	// dodati session messages vezano uz query(sql) errore
}
$session = new Session();

?>