<?php require_once("layouts/header.php"); ?>
<?php require_once('../includes/oglasnik.php'); ?>
<?php require_once('../includes/pagination.php'); ?>

   
<?php

if($session->logged_in()){
	require_once("layouts/nav_user.php");
}else{
	require_once("layouts/nav_guest.php"); 	
}
// u slucaju ako netko mjenja id kategorije u linku :
// if(isset($_GET['kategorija'])){
	// if($_GET['kategorija'] == "gitare" or $_GET['kategorija'] == "bubnjevi" or $_GET['kategorija'] == "gudački" or $_GET['kategorija'] == "elektronika" or $_GET['kategorija'] == "mikrofoni" or $_GET['kategorija'] == "kablovi" or $_GET['kategorija'] == "oprema_razno" or $_GET['kategorija'] == "bend"){

	
	// }  else{
		// redirect_to("index.php");
	// }
// } else{
	// redirect_to("index.php");
// }
 ?>
<!-- Main jumbotron je u nav_guest i nav_user -->
	
    <div class="container">
		<div class="row">

    	<!-- BEGIN oglasi -->
<?php
if(isset($_GET['kategorija'])){ 

require_once('layouts/sortby.php'); // ovdje se nalazi $sql

$oglasi = Oglasnik::find_ad_by_sql($sql); // prije je bilo find by kategorija

		if($session->logged_in()){
			echo "<p><a href=\"novi_oglas.php?kategorija={$_GET['kategorija']}\" class=\"btn btn-info right\" role=\"button\">Stavi oglas</a> </p>";
		}else{
			echo "<p>Morate se registrirati da bi bili u mogućnosti postaviti svoj oglas</p>"; 	
		}
		
		echo "<h4>Oglasi u kategoriji {$_GET['kategorija']} </h4>";
	if(!empty($oglasi)){
		foreach($oglasi as $oglas){	
				//echo "<div class=\"row\">";	
					echo"<div class=\"col-md-3 col-sm-6\" >";
					echo"<span class=\"thumbnail\">";
					echo "<a href=\"oglasi_details.php?id={$oglas->id}\"><img src=\"images/slike_oglasa/{$oglas->slika1}\" class=\"img-responsive\"height=\"300px\"></a>"; 
					echo "<hr>";
						echo"<h3>{$oglas->vrsta_instrumenta}</h3>";
						echo"<p>{$oglas->marka} - {$oglas->model}</p>";
						
						echo"<p>";
						echo substr($oglas->opis,0,45)."...";
						echo"</p>";
						echo"<hr class=\"line\">";
						echo"<div class=\"row\">";
							echo"<div class=\"col-md-6 col-sm-6\">";
								echo"<p class=\"price\">{$oglas->cijena}kn</p>";
							echo"</div>";
							echo"<div class=\"col-md-6 col-sm-6\">";
								echo"<a href=\"oglasi_details.php?id={$oglas->id}\" class=\"btn btn-info right\" role=\"button\">Pogledaj</a>";
							echo"</div>";
							
						echo"</div>";
					echo"</span>";
				echo"</div>";
					
			
		}
	}else{
		echo " Trenutno nema oglasa u ovoj kategoriji";
		}
		// paginacija
		if($pagination->total_pages() > 1){
			echo "<div style=\" display:inline-block float:left; clear:both;\">";
					echo"	<nav aria-label=\"Page navigation\">";
					echo"	  <ul class=\"pagination\">";
					echo"		<li>";
					echo"		  <a href=\"oglasi.php?kategorija=gitare&&page={$pagination->previous_page()}\" aria-label=\"Previous\">";
					echo"			<span aria-hidden=\"true\">&laquo;</span>";
					echo"		  </a>";
					echo"		</li>";
							for($i=$pagination->current_page; $i<=$pagination->total_pages(); $i=$i+1){
							if($i == $pagination->current_page){
									echo " <li><a href=\"oglasi.php?kategorija=gitare&&page={$pagination->current_page}\">{$pagination->current_page}</a></li> "; 
							}else {
									echo " <li><a href=\"oglasi.php?kategorija=gitare&&page={$i}\">{$i}</a></li>";
							}
							}
							if($pagination->has_next_page()){ // ako postoji sljedeca stranica napisi ju, ako ne, nemoj
					echo"		  <li><a href=\"oglasi.php?kategorija=gitare&&page={$pagination->next_page()}\" aria-label=\"Next\">";
					echo"			<span aria-hidden=\"true\">&raquo;</span>";
					echo"		  </a></li>";
							}
					echo"		</li>";
					echo"	  </ul>";
					echo"	</nav>";
			echo "</div>";
		}
		// END OF PAGINACIJA
}else{
	echo "Morate izabrati kategoriju oglasa";
	}
?>		
        </div> <!-- end of div class row -->
		
	  	
<?php require_once("layouts/footer.php"); ?>	
	