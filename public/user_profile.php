<?php require_once("layouts/header.php"); ?>
<?php
if($session->logged_in()){
	require_once("layouts/nav_user.php");
}else{
	require_once("layouts/nav_guest.php"); 	
}
 
 ?>
<?php require_once("../includes/user_photo_edit_class.php"); ?>
<?php require_once("../includes/oglasnik.php"); ?>
<?php

if(isset($_GET['id'])){
	
$user = Users::find_by_id($_GET['id']);
$slika = UserPhoto::find_user_photo_by_id($_GET['id']);
$oglasi_korisnika =Oglasnik::find_all_ads_from_user($_GET['id']);
	
}else{
	
$user = Users::find_by_id($_SESSION['id']);
$slika = UserPhoto::find_user_photo_by_id($_SESSION['id']);
$oglasi_korisnika =Oglasnik::find_all_ads_from_user($_SESSION['id']);
}





?>

<div class="container">
	<div class="column">
       <div class="col-md-7">
<div class="panel panel-default">
		<div class="panel-heading"> <h5> Korisnički profil</h5></div>
   <div class="panel-body">
       
    <div class="box box-info">
        
            <div class="box-body">
                     <div class="col-sm-6">
                     <div  align="center"><img 
					 <?php if(!$slika){
					 if($user->gender == 'Muški'){
						 echo "src=\"images/male_default.jpg\" ";
						 }elseif($user->gender == 'Ženski'){
							 echo "src=\"images/female_default.png\" ";}else{
								 echo "src=\"images/no_gender.jpg\" ";}}else{ echo "src=\"images/user_images/{$slika->filename}\" ";}?>  class="img-circle img-responsive">
					 

                     </div>
              
              <br>
    
              <!-- /input-group -->
            </div>
            <div class="col-sm-6">
            <h4 style="color:#00b1b1;"><?php echo "{$user->first_name} {$user->last_name}";?> </h4></span>
              <span><p><?php if(isset($_SESSION['id']) and $_SESSION['id'] == $user->id){ echo"<div style=\"color:#999;\" ><a href=\"user_profile_edit.php\">Uredi profil</a></div>"; }
			  
			  ?></p></span>            
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
    
              
<div class="col-sm-5 col-xs-6 tital " >Naslov: </div><div class="col-sm-7"><?php echo $user->first_name; ?></div>
     <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Prezime:</div><div class="col-sm-7"><?php echo $user->last_name; ?></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Grad:</div><div class="col-sm-7"><?php echo $user->city; ?></div>
<div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Email adresa:</div><div class="col-sm-7"><?php echo $user->email; ?></div>

 <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Županija:</div><div class="col-sm-7"><?php echo $user->area; ?></div>

 <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Poštanski broj:</div><div class="col-sm-7"><?php echo $user->postal_code; ?></div>
<div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Adresa:</div><div class="col-sm-7"><?php echo $user->adress; ?></div>
<div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Mobitel:</div><div class="col-sm-7"><?php echo $user->mobile_phone; ?></div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div> 
      </div> 
    </div>
</div> 
<!-- dodatak za  "VAŠI OGLASI" -->
 
<div class="col-md-5">
	<div class="panel panel-default">
		<div class="panel-heading"> <h5> Postavljeni oglasi</h5></div>
			<div class="panel-body">
				<div class="box box-info">
					<div class="box-body">
						
							  
							  
							  
<div class="col-sm-5 col-xs-6 tital " >Kategorija</div><div class="col-sm-7">Oglas</div>

     <div class="clearfix"></div>
<div class="bot-border"></div>
<hr>
						<?php if(empty($oglasi_korisnika)){
							echo " Nemate postavljenih oglasa";
						} 
						?>
						<?php foreach($oglasi_korisnika as $oglas){
							echo "<div class=\"col-sm-5 col-xs-6 tital \" >";
							echo ucfirst($oglas->kategorija) ."  -->";
							echo "</div><div class=\"col-sm-7\"><a href=\"oglasi_details.php?id={$oglas->id}\"> {$oglas->marka} - {$oglas->model} </a> </div>";
							echo "<div class=\"clearfix\"></div>";
							echo "<div class=\"bot-border\"></div>";
						}		
						?>	  


            </div>
          <!-- /.box -->
          </div>  
	    </div> 
      </div>
	</div>      
   </div> <!-- /box -->
</div> <!-- /.container -->
    
<?php require_once("layouts/footer.php"); ?>	