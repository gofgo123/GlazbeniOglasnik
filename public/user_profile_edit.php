<?php require_once("layouts/header.php"); ?>
<?php require_once("layouts/nav_user.php"); ?>
<?php require_once("../includes/registration.php"); ?>
<?php require_once("../includes/users.php"); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/user_photo_edit_class.php"); ?>

<?php
if(!$session->logged_in()){
	redirect_to("index.php");
}

if(isset($_POST['obnovi'])){

$user->update_user($_SESSION['id']);
}

$slika = UserPhoto::find_user_photo_by_id($_SESSION['id']);

if (isset($_FILES['image'])){
	$nova_slika = UserPhoto::nova_slika($_FILES['image'],$_SESSION['id']);
	
}

?>

<div class="container">
	<div class="column">
       <div class="col-md-8">
<div class="panel panel-default">
		<div class="panel-heading"> <h3> Korisnički profil</h3></div>
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
					 
					<!-- <div style="color:#999;" ><a href="#">Promjenite sliku</a></div> -->

                     </div>
              
              <br>
 
              <!-- /input-group -->
            </div>
            <div class="col-sm-6">
            <h3 style="color:#00b1b1;"><?php echo "{$user->first_name} {$user->last_name}";?> </h3></span>
              <span><p><?php if($_SESSION['id'] == 1){echo "Administrator";}else{echo"Korisnik";}?></p></span>            
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
			
			<!-- promjeni sliku division -->
			
			
			<div class="form-group">
                    
					<?php $session->check_message();
						if (!empty($session->message)){
							echo "<div class=\"alert alert-danger\">";
							echo $session->message;
							
							echo "</div>";
						}
					?>
					
                    <div class="col-sm-9">
						<a id="displayText" href="javascript:toggle();">Promjenite sliku</a> <!-- jscript klik link -->
						<div id="toggleText" style="display: none">
							<form enctype="multipart/form-data" action="user_profile_edit.php" method="POST">
								<br />
								<!-- MAX_FILE_SIZE must precede the file input field -->
								<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
								<!-- Name of input element determines name in $_FILES array -->
								 <input name="image" type="file" />
								<input type="submit" value="Send File" />
							</form>
						
						
						
                        </div>
                    </div>
                </div>
			

			<div class="clearfix"></div>
            <hr style="margin:5px 1 5px 1;">
			
			<!-- end of promjeni sliku division -->

			<form action="user_profile_edit.php" method="POST">
			
			
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Ime</label>
                    <div class="col-sm-9">
						
                        <input type="text" id="firstName" name="first_name" value="<?php echo $user->first_name;?>"placeholder="Npr. Ivan" class="form-control" autofocus>
                        
                    </div>
                </div>
				<div class="form-group">
                    <label for="lastName"  class="col-sm-3 control-label">Prezime</label>
                    <div class="col-sm-9">
                        <input type="text" name="last_name" value="<?php echo $user->last_name;?>" id="lastName" placeholder="Npr. Horvat" class="form-control" autofocus>
                        
                    </div>
                </div>
				
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" name="email" id="email" value="<?php echo $user->email;?>"placeholder="Važeća e-mail adresa" class="form-control">
                    </div>
                </div>
                
                </div>
                
                <div class="form-group">
                    <label for="city" class="col-sm-3 control-label">Grad</label>
                    <div class="col-sm-9">
                        <select id="city" name="city" class="form-control">
							<?php if(!empty($user->city)){ echo "<option value=\"{$user->city}\" selected >{$user->city}</option> ";  }else{ echo"<option value=\"default\" selected></option>";} ?>
                            <option value="Beli Manastir">Beli Manastir</option>
							<option value="Belišće">Belišće</option>
							<option value="Benkovac">Benkovac</option>
							<option value="Bjelovar">Bjelovar</option>
							<option value="Biograd">Biograd</option>
							<option value="Cres">Cres</option>
							<option value="Crikvenica">Crikvenica</option>
							<option value="Čakovec">Čakovec</option>
							<option value="Čazma">Čazma</option>
							<option value="Daruvar">Daruvar</option>
							<option value="Delnice">Delnice</option>
							<option value="Dubrovnik">Dubrovnik</option>
							<option value="Dugo Selo">Dugo Selo</option>
							<option value="Drniš">Drniš</option>
							<option value="Đakovo">Đakovo</option>
							<option value="Đurđevac">Đurđevac</option>
							<option value="Glina">Glina</option>
							<option value="Gospić">Gospić</option>
							<option value="Hvar">Hvar</option>
							<option value="Ilok">Ilok</option>
							<option value="Imotski">Imotski</option>
							<option value="Ivanić Grad">Ivanić Grad</option>
							<option value="Karlovac">Karlovac</option>
							<option value="Koprivnica">Koprivnica</option>
							<option value="Korčula">Korčula</option>
							<option value="Kutina">Kutina</option>
							<option value="Labin">Labin</option>
							<option value="Lipik">Lipik</option>
							<option value="Makarska">Makarska</option>
							<option value="Mali Lošinj">Mali Lošinj</option>
							<option value="Metković">Metković</option>
							<option value="Našice">Našice</option>
							<option value="Nova Gradiška">Nova Gradiška</option>
							<option value="Novska">Novska</option>
							<option value="Ogulin">Ogulin</option>
							<option value="Osijek">Osijek</option>
							<option value="Pakrac">Pakrac</option>
							<option value="Pazin">Pazin</option>
							<option value="Požega">Požega</option>
							<option value="Rab">Rab</option>
							<option value="Rijeka">Rijeka</option>
							<option value="Rovinj">Rovinj</option>
							<option value="Samobor">Samobor</option>
							<option value="Sisak">Sisak</option>
							<option value="Slavonski Brod">Slavonski Brod</option>
							<option value="Slatina">Slatina</option>
							<option value="Šibenik">Šibenik</option>
							<option value="Varaždin">Varaždin</option>
							<option value="Vukovar">Vukovar</option>
							<option value="Zabok">Zabok</option>
							<option value="Zadar">Zadar</option>
							<option value="Zagreb">Zagreb</option>
							<option value="Zaprešić">Zaprešić</option>
							<option value="Zlatar">Zlatar</option>
                        </select>
                    </div>
                </div> <!-- /.form-group -->
				<div class="form-group">
                    <label for="area" class="col-sm-3 control-label">Županija</label>
                    <div class="col-sm-9">
                        <select id="area" name="area" class="form-control">
						<?php if(!empty($user->area)){ echo "<option value=\"{$user->area}\" selected >{$user->area}</option> ";  }else{ echo"<option value=\"default\" selected></option>";} ?>
							 
                            <option value="Bjelovarsko-bilogorska">Bjelovarsko-bilogorska</option>
                            <option value="Brodsko-posavska županija">Brodsko-posavska županija</option>
                            <option value="Dubrovačko-neretvanska županija">Dubrovačko-neretvanska županija</option>
                            <option value="Istarska županija">Istarska županija</option>
                            <option value="Karlovačka Županija">Karlovačka županija</option>
                            <option value="Koprivničko-križevačka županija">Koprivničko-križevačka županija</option>
                            <option value="Krapinsko-zagorska županija">Krapinsko-zagorska županija</option>
                            <option value="Ličko-senjska županija">Ličko-senjska županija</option>
							<option value="Međimurska županija">Međimurska županija</option>
                            <option value="Osječko-baranjska županija">Osječko-baranjska županija</option>
                            <option value="Požeško-slavonska županija">Požeško-slavonska županija</option>
                            <option value="Primorsko-goranska županija">Primorsko-goranska županija</option>
                            <option value="Sisačko-moslavačka županija">Sisačko-moslavačka županija</option>
                            <option value="Splitsko-dalmatinska županija">Splitsko-dalmatinska županija</option>
                            <option value="Varaždinska županija">Varaždinska županija</option>
                            <option value="Virovitičko-podravska županija">Virovitičko-podravska županija</option>
							<option value="Zagrebačka županija">Zagrebačka županija</option>
                        </select>
                    </div>
                </div> <!-- /.form-group -->
				<div class="form-group">
                    <label for="postalCode" class="col-sm-3 control-label">Poštanski broj</label>
                    <div class="col-sm-9">
                        <input type="text" name="postal_code" value="<?php echo $user->postal_code;?>"id="postalCode" placeholder="npr, 12345" class="form-control" autofocus>
                    </div>
                </div>
				<div class="form-group">
                    <label for="adress"  class="col-sm-3 control-label">Adresa</label>
                    <div class="col-sm-9">
                        <input type="text" name="adress" value="<?php echo $user->adress;?>"id="adress" placeholder="npr, Branimirova 44" class="form-control" autofocus>
                    </div>
                </div>
				<div class="form-group">
                    <label for="mobilePhone" class="col-sm-3 control-label">Broj mobitela</label>
                    <div class="col-sm-9">
                        <input type="text" name="mobile_phone" value="<?php echo $user->mobile_phone;?>" id="mobilePhone" placeholder="npr, 0981234567" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Spol</label>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="radio-inline">  
                                    <input type="radio" name="gender" id="femaleRadio" value="Ženski"<?php if($user->gender == "Ženski"){echo " checked=\"checked\" ";} ?> >Ženski 
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="maleRadio" value="Muški"<?php if($user->gender == "Muški"){echo " checked=\"checked\" ";} ?>>Muški 
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="uncknownRadio" value="Nebitno" <?php if($user->gender == "Nebitno"){echo " checked=\"checked\" ";} ?> >Nebitno
                                </label>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.form-group -->
                
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" name="obnovi" class="btn btn-primary btn-block">Obnovi</button>
                    </div>
                </div>
            </form> <!-- /form -->
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div> 
      </div> 
    </div>
</div> 
<!-- dodatak za  "VAŠI OGLASI" -->
 
    
   </div> <!-- /box -->
</div> <!-- /.container -->


<script language="javascript"> 
function toggle() {
    var ele = document.getElementById("toggleText");
    var text = document.getElementById("displayText");
    if(ele.style.display == "block") {
            ele.style.display = "none";
        text.innerHTML = "Promjenite sliku";
      }
    else {
        ele.style.display = "block";
        text.innerHTML = "Izaberite novu sliku";
    }
} 
</script>
    
<?php require_once("layouts/footer.php"); ?>	