<?php require_once("layouts/header.php"); ?>
<?php require_once("layouts/nav_register.php"); ?>
<?php require_once("../includes/registration.php"); ?>
<?php require_once("../includes/session.php"); ?>

<?php

if($session->logged_in()){
redirect_to("index.php");
}
	
if(isset($_POST['registriraj'])){
	
	$registration->register();	
}
?>
<a href="register.php#top"></a>
<div class="container"style="background-color:#eee">
            <form action="register.php" method="POST" class="form-horizontal" role="form" style="max-width: 560px; padding: 15px; margin-left: auto; margin-right: auto; margin-top: 20px; margin-bottom: 20px; background-color: #fff; border:1px; border-radius: 0.3em;">
                <h2 style=" margin-left: 1em; margin-bottom: 1em;">Registracijska forma</h2>
				
				<?php if (!empty($registration->reg_errors)){echo "<div class=\"alert alert-danger\">";
							foreach($registration->reg_errors as $key=>$value){
								echo nl2br($value);
						}	echo "</div>";	}?>
				
				<div class="form-group">
                    <label for="warning" class="col-sm-3 control-label"></label>
                    <div class="col-sm-9">
			           <span class="help-block">Polja označena sa (*) moraju biti ispunjena</span>          
                    </div>
                </div>
                
				<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Korisničko ime*</label>
                    <div class="col-sm-9">
                        <input type="text" id="userName" name="username" value="<?php echo $registration->keep_records("username");?>" placeholder="Korisničko ime" class="form-control" autofocus>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email*</label>
                    <div class="col-sm-9">
                        <input type="email" name="email" id="email" value="<?php echo $registration->keep_records("email");?>"placeholder="Važeća e-mail adresa" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Lozinka*</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" id="password" placeholder="Lozinka-minimalno 8 znakova" class="form-control">
                    </div>
                </div>
				<div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Potvrdite lozinku*</label>
                    <div class="col-sm-9">
                        <input type="password" name="password2" id="password" placeholder="Ponovno upišite lozinku" class="form-control">
                    </div>
                </div>
				<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Ime</label>
                    <div class="col-sm-9">
						
                        <input type="text" id="firstName" name="first_name" value="<?php echo $registration->keep_records("first_name");?>"placeholder="Npr. Ivan" class="form-control" autofocus>
                        
                    </div>
                </div>
				<div class="form-group">
                    <label for="lastName"  class="col-sm-3 control-label">Prezime</label>
                    <div class="col-sm-9">
                        <input type="text" name="last_name" value="<?php echo $registration->keep_records("last_name");?>" id="lastName" placeholder="Npr. Horvat" class="form-control" autofocus>
                        
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="city" class="col-sm-3 control-label">Grad</label>
                    <div class="col-sm-9">
                        <select id="city" name="city" class="form-control">
						
							<option value="" disabled selected>Izaberite vaš grad</option>
<?php if(!empty($_POST['city'])){ echo "<option value=\"{$_POST['city']}\" selected >{$_POST['city']}</option> ";  }?>							
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
                        <select id="area"  name="area" class="form-control">
						
							<option value=""disabled selected>Izaberite vašu županiju</option> 
							<?php if(!empty($_POST['area'])){ echo "<option value=\"{$_POST['area']}\" selected >{$_POST['area']}</option> ";  }?>
                            <option value="Bjelovarsko-bilogorska">Bjelovarsko-bilogorska</option>
                            <option value="Brodsko-posavska">Brodsko-posavska županija</option>
                            <option value="Dubrovačko-neretvanska">Dubrovačko-neretvanska županija</option>
                            <option value="Istarska županija">Istarska županija</option>
                            <option value="Karlovačka Županija">Karlovačka županija</option>
                            <option value="Koprivničko-križevačka županija">Koprivničko-križevačka županija</option>
                            <option value="Krapinsko-zagorska županija">Krapinsko-zagorska županija</option>
                            <option value="Ličko-senjska županija">Ličko-senjska županija</option>
							<option value="Međimurska županija">Međimurska županija</option>
                            <option value="Osječko-baranjska">Osječko-baranjska županija</option>
                            <option value="Požeško-slavonska">Požeško-slavonska županija</option>
                            <option value="Primorsko-goranska">Primorsko-goranska županija</option>
                            <option value="Sisačko-moslavačka">Sisačko-moslavačka županija</option>
                            <option value="Splitsko-dalmatinska">Splitsko-dalmatinska županija</option>
                            <option value="Varaždinska županija">Varaždinska županija</option>
                            <option value="Virovitičko-podravska">Virovitičko-podravska županija</option>
							<option value="Zagrebačka županija">Zagrebačka županija</option>
                        </select>
                    </div>
                </div> <!-- /.form-group -->
				<div class="form-group">
                    <label for="postalCode" class="col-sm-3 control-label">Poštanski broj</label>
                    <div class="col-sm-9">
                        <input type="text" name="postal_code" value="<?php echo $registration->keep_records("postal_code");?>"id="postalCode" placeholder="npr, 12345" class="form-control" autofocus>
                    </div>
                </div>
				<div class="form-group">
                    <label for="adress"  class="col-sm-3 control-label">Adresa</label>
                    <div class="col-sm-9">
                        <input type="text" name="adress" value="<?php echo $registration->keep_records("adress");?>"id="adress" placeholder="npr, Branimirova 44" class="form-control" autofocus>
                    </div>
                </div>
				<div class="form-group">
                    <label for="mobilePhone" class="col-sm-3 control-label">Broj mobitela</label>
                    <div class="col-sm-9">
                        <input type="text" name="mobile_phone" value="<?php echo $registration->keep_records("mobile_phone");?>" id="mobilePhone" placeholder="npr, 0981234567" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Spol</label>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="femaleRadio" value="Ženski">Ženski 
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="maleRadio" value="Muški">Muški 
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="uncknownRadio" value="Nebitno" checked="checked">Nebitno
                                </label>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.form-group -->
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="pravila" value="1" checked>Pridržavat ću se <a href="register.php#top"> pravila stranice</a>
                            </label>
                        </div>
                    </div>
                </div> <!-- /.form-group -->
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" name="registriraj" class="btn btn-primary btn-block">Registriraj me</button>
                    </div>
                </div>
            </form> <!-- /form -->
        
		
<hr style="border: 0; height: 1px; background: #333; background-image: linear-gradient(to right, #ccc, #333, #ccc);">
		
    <footer>
        <p>&copy; <?php echo date("Y", time()); ?> Gordan Savanović</p>
		<p>Powered by modified bootstrap 3.7</p>
    </footer>
 </div> <!-- /container -->
	
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
</html>