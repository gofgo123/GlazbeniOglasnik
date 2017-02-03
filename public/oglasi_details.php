<?php require_once("layouts/header.php"); ?>
<?php require_once('../includes/oglasnik.php'); ?>
   
<?php

if($session->logged_in()){
	require_once("layouts/nav_user.php");
}else{
	require_once("layouts/nav_guest.php"); 	
}

if(isset($_GET['id'])){
$oglasi = Oglasnik::find_ad_by_id($_GET['id']);
$user = Users::find_by_id($oglasi->user_id);


}
 ?>
<!-- Main jumbotron je u nav_guest i nav_user -->
	
	<div class="container">
	<?php 
		if($session->logged_in()){
			if($oglasi->user_id == $_SESSION['id']){
				echo "<p><a href=\"uredi_oglas.php?id={$oglasi->id}\" class=\"btn btn-info left\" role=\"button\">Uredi oglas</a> <a href=\"obrisi_oglas.php?id={$oglasi->id}\" class=\"btn btn-info left\" role=\"button\">Obriši ovaj oglas</a></p>";
				echo "<p><a href=\"oglasi.php?kategorija={$oglasi->kategorija}\" class=\"btn btn-info\" role=\"button\">Povratak na kategoriju {$oglasi->kategorija}</a> </p>";
			}else{
				echo "<p><a href=\"oglasi.php?kategorija={$oglasi->kategorija}\" class=\"btn btn-info\" role=\"button\">Povratak na kategoriju {$oglasi->kategorija}</a> </p>";
			}
		}else{
			echo "<p><a href=\"oglasi.php?kategorija={$oglasi->kategorija}\" class=\"btn btn-info\" role=\"button\">Povratak na kategoriju {$oglasi->kategorija} </a> </p>";
		}
	?>
	<div class="row"style="border: 2px solid lightblue; border-radius: 10px;">
	
		<div class="col-md-3">
         <div class="product-item">
		 <h3> Detalji oglasa </h3>
              <div class="pi-img-wrapper"style="padding-right:10px; border-right: 2px solid lightblue;">
			  
                <?php echo "<p><strong>{$oglasi->kategorija}-{$oglasi->vrsta_instrumenta}</strong></p>";
				echo "<p>MARKA: <strong> {$oglasi->marka}</strong></p>"; 
				echo "<p>MODEL: <strong>  {$oglasi->model}</strong></p>";
				echo "<p>GODINA PROIZVODNJE : <strong> {$oglasi->god_proizvodnje}</strong></p>"; 
				echo "<hr>"; echo "<p>OGLAS OBJAVLJEN: <br/> <strong> {$oglasi->datum_objave}</strong></p>"; 
				echo "<p>CIJENA: <strong> {$oglasi->cijena} kuna</strong></p>";  ?>
              </div>
            </div>
        </div>
		
		<div class="col-md-6">
         <div class="product-item">
		  <h3>Opis oglasa: </h3>
              <div class="pi-img-wrapper">
			  <?php  echo "<p style=\"font-size: 16px;\">";
					 echo nl2br(htmlspecialchars($oglasi->opis));
					 echo "</p>";
			  ?>
                
              </div>			
            </div>
        </div>
			<div class="col-md-3">
			<h3> Detalji oglašivača </h3>
            <div class="product-item">
              <div class="pi-img-wrapper"style="padding-left:10px; border-left: 2px solid lightblue;">
                <?php 
						echo "<p>Puno ime :<strong><a href=\"user_profile.php?id={$user->id}\"> {$user->first_name} {$user->last_name}</strong></a></p>";
						echo "<p> E-mail: <span class=\"glyphicon glyphicon-envelope\"></span>  <a href=\"mailto:{$user->email}\">{$user->email}</a><span class=\"glyphicons glyphicons-envelope\"></span></p>"; 
						echo "<hr>"; 
						echo "<p>Grad: <strong> {$user->city} </strong></p>"; 
						echo "<p>Poštanski broj: <strong> {$user->postal_code}</strong></p>";
						echo "<p>Adresa: <strong> {$user->adress}</strong></p>"; 
						echo "<p>Mobitel: <strong> {$user->mobile_phone}</strong> </p>";
						echo "<p>Županija: <strong> {$user->area}</strong></p>"; 						?>
              </div>
            </div>
        </div>
	</div>
	
<hr style="border: 0; height: 1px; background: #333; background-image: linear-gradient(to right, #ccc, #333, #ccc);">
<p> Slike: </p>
<hr>
    <div class="row">
     <?php   $slike = array("{$oglasi->slika1}","{$oglasi->slika2}","{$oglasi->slika3}");

foreach($slike as $value){
	if($value === 'nema_slike_oglasa.jpg'){
		echo "<div class=\"col-md-4\">";
		echo "<div class=\"pi-img-wrapper\">";
			echo"Slika nije postavljena";
		echo "</div>";
		echo "</div>";
		
	}else{
		echo "<div class=\"col-md-4\">";
			echo "<div class=\"pi-img-wrapper\">"; 
					echo "<a href=\"images/slike_oglasa/{$value}\"target=\"_blank\"><img src=\"images/slike_oglasa/{$value}\" class=\"img-responsive\" style=\"box-shadow: 2px 2px #e6e6e6\"></a>";
			echo "</div><br/>";
			echo "<a href=\"images/slike_oglasa/{$value}\"target=\"_blank\">Pogledaj izbliza</a>";
		echo "</div>";
		
	}
}
?>
	</div>	
	
   
   <hr style="border: 0; height: 1px; background: #333; background-image: linear-gradient(to right, #ccc, #333, #ccc);">
	  	
<?php require_once("layouts/footer.php"); ?>	
	