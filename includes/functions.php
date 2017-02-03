
<?php
	
		// opcije u novim oglasima
		
	
	
	
		//funkcija za redirect
		function redirect_to( $location = null ){
			if($location != null){
				header("Location: {$location}");
				exit;
			}
		}
	
		// funkcija koja  kriptira lozinku
		function kriptiraj($password){
			return $hashed_password = password_hash($password,PASSWORD_BCRYPT);
		}
		// funkcija koja provjerava dali je kriptirana lozinka odgovarajuća upisanoj
		function dekriptiraj($password,$hashed_password){
			$checked = password_verify($password,$hashed_password);
			if ($checked){
				return true;
			}else{ 
				return false;
			}
		}

		
		
		




?>