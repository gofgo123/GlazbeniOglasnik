<?php require_once("layouts/header.php"); ?>
   
 
 <!-- nebi bilo lose da, if user not logged in include this nav_guest, else include other nav_user.php -->
  
<?php
if($session->logged_in()){
	require_once("layouts/nav_user.php");
}else{
	require_once("layouts/nav_guest.php"); 	
}
 ?>

	
	
	<!-- Main jumbotron je u nav_guest i nav_user -->
    
	<!-- row of columns 1-->
    <div class="container">
	
	
     <!-- row of columns 1-->
      <div class="row">
	  <h2>Kategorije</h2>
	  <hr style="border: 0; height: 1px; background: #333; background-image: linear-gradient(to right, #ccc, #333, #ccc);">
        <div class="col-md-3" id="hoover_div" style="box-shadow: 2px 2px #e6e6e6" >
          <a href= "oglasi.php?kategorija=gitare"><img src="images/gitara.png" style=" margin-left:30px; margin-bottom:10px;"  height="200" width="200" height="200" width="200" alt="Gitare i slično"></a>
		  <p> Električne, akustične, elektroakustične, klasične, bas gitare, tamburice i sl.</p>
          <p><a class="btn btn-default" href="oglasi.php?kategorija=gitare" role="button">Pogledaj oglase &raquo;</a></p>
        </div>
        <div class="col-md-3" id="hoover_div3" style="box-shadow: 2px 2px #e6e6e6">
		  <a href= "oglasi.php?kategorija=bubnjevi"><img src="images/bubnjevi.png" style=" margin-left:30px; margin-bottom:10px;"  height="200" width="200" height="200" width="200" alt="Bubnjevi i ritam mašine"></a>
          <p> Sve vrste bubnjeva, za male i velike, palice, stolice, činele, ritam mašine.. </p>
          <p><a class="btn btn-default" href="oglasi.php?kategorija=bubnjevi" role="button">Ba-dum chah! &raquo;</a></p>
       </div>
        <div class="col-md-3" id="hoover_div2" style="box-shadow: 2px 2px #e6e6e6">
		  <a href= "oglasi.php?kategorija=gudački"><img src="images/violina.png" style=" margin-left:30px; margin-bottom:10px;"  height="200" width="200" height="200" width="200" alt="Gudački instrumenti"></a>
          <p>Violine, viole, violončela, gudala i sva ostala oprema za gudačke instrumente.</p>
          <p><a class="btn btn-default" href="#" role="button">Pogledaj oglase &raquo;</a></p>
        </div>
		<div class="col-md-3" id="hoover_div4" style="box-shadow: 2px 2px #e6e6e6">
		  <a href= "oglasi.php?kategorija=elektronika"><img src="images/pedale.png" style=" margin-left:30px; margin-bottom:10px;"  height="200" width="200" height="200" width="200" alt="Pedale,procesori"></a>
          <p>Razne pedale, procesori i ostala električna pomagala</p>
          <p><a class="btn btn-default" href="#" role="button">Pogledaj oglase &raquo;</a></p>
        </div>
      </div>
	  <!-- row of columns 2 -->
	  <div class="row">
	<hr>
        <div class="col-md-3" id="hoover_div3" style="box-shadow: 2px 2px #e6e6e6" >
          <a href= "oglasi.php?kategorija=mikrofoni"><img src="images/mikrofon.png" style=" margin-left:30px; margin-bottom:10px;"  height="200" width="200" height="200" width="200" alt="Mikrofoni,pojačala,razglasi"></a>
		  <p> Mikrofoni, slušalice, pojačala, razglasi, ozvučenja i slično</p>
          <p><a class="btn btn-default" href="oglasi.php?kategorija=mikrofoni" role="button">Pogledaj oglase &raquo;</a></p>
        </div>
        <div class="col-md-3" id="hoover_div2" style="box-shadow: 2px 2px #e6e6e6">
		  <a href= "oglasi.php?kategorija=kablovi"><img src="images/kablovi.png" style=" margin-left:30px; margin-bottom:10px;"  height="200" width="200" height="200" width="200" alt="Kablovi, jackovi"></a>
          <p> Razni kablovi, jackovi, inputi , oprema za čišćenje </p>
          <p><a class="btn btn-default" href="oglasi.php?kategorija=kablovi" role="button">Plug me in! &raquo;</a></p>
       </div>
        <div class="col-md-3" id="hoover_div4" style="box-shadow: 2px 2px #e6e6e6">
		  <a href= "oglasi.php?kategorija=oprema_razno"><img src="images/kofer.png" style=" margin-left:30px; margin-bottom:10px;"  height="200" width="200" height="200" width="200" alt="razno"></a>
          <p>Koferi za instrumente, držaći, nosaći, trzalice, gudala, žice, pickupovi...</p>
          <p><a class="btn btn-default" href="oglasi.php?kategorija=oprema_razno" role="button">Pogledaj oglase &raquo;</a></p>
        </div>
		<div class="col-md-3" id="hoover_div" style="box-shadow: 2px 2px #e6e6e6">
		  <a href= "oglasi.php?kategorija=bend"><img src="images/band.png" style=" margin-left:30px; margin-bottom:10px;"  height="200" width="200" height="200" width="200" alt="Bend"></a>
          <p>Postavite oglas gdje nudite ili tražite nekoga za bend</p>
          <p><a class="btn btn-default" href="oglasi.php?kategorija=bend" role="button">Pogledaj ekipu &raquo;</a></p>
        </div>
      </div>

        
	  	
<?php require_once("layouts/footer.php"); ?>	
	