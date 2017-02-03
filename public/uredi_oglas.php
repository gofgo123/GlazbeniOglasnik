<?php require_once("layouts/header.php"); ?>
<?php require_once('../includes/oglasnik.php'); ?>
<?php require_once('../includes/novioglas.php'); ?>
<?php require_once('../includes/uredioglas.php'); ?>
<?php require_once('../includes/opcije.php'); ?>
   
<?php

if($session->logged_in()){
	require_once("layouts/nav_user.php");
}else{
	redirect_to("index.html");	
}


if(isset($_GET['id'])){
	$oglas= UrediOglas::find_ad_by_id($_GET['id']);
	$_GET['kategorija'] = $oglas->kategorija;
	
}
if(isset($_POST['uredi'])) {
	$edit = new UrediOglas();
 $edit->uredi_oglas($_GET['id']); 
 
	
}

 ?>
<!-- Main jumbotron je u nav_guest i nav_user -->
	
	<div class="container">
	<div class="column">
       <div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading"> <h3> Uređivanje oglasa</h3></div>
				<div class="panel-body">
					<div class="box box-info">
		<div class="box-body">
					
					<?php if (!empty($session->errors)){
							foreach($session->errors as $key=>$value){
								echo "<div class=\"alert alert-danger\">";
								echo nl2br($value);
								echo "</div>";
								}		
							}
						?>
				

			<form enctype="multipart/form-data" action="uredi_oglas.php?id=<?php echo $_GET['id']; ?>" method="POST">
				<div class="form-group">
                    <label for="user_id" class="col-sm-3 control-label">Vaš ID#:</label>
                    <div class="col-sm-9">
					<!--	<input type="hidden" id="user_id" name="user_id" value="<?php //echo $_SESSION['id']; ?>" > -->
                        <input type="text" id="user_id" name="user_id" value="<?php echo $oglas->user_id ?>" class="form-control" readonly>
                        <br/> 
                    </div>
                </div>
			
                <div class="form-group">
                    <label for="kategorija" class="col-sm-3 control-label">Kategorija</label>
                    <div class="col-sm-9">
						<input type="hidden" id="kategorija" name="kategorija" value="<?php echo $_GET['kategorija'];  ?>" >
                        <input type="text" id="kategorija" name="kategorija" value="<?php echo $oglas->kategorija; ?>" class="form-control" readonly>
                        <br/> 
                    </div>
                </div>
				<div class="form-group">
                    <label for="vrsta_instrumenta" class="col-sm-3 control-label">Vrsta instrumenta*</label>
                    <div class="col-sm-9">
                        <select id="vrsta_instrumenta" name="vrsta_instrumenta" " class="form-control">
							<?php if(!empty($_POST['vrsta_instrumenta'])){ echo "<option value=\"{$_POST['vrsta_instrumenta']}\" selected >{$_POST['vrsta_instrumenta']}</option> ";  }?>
                          <?php  
						  
						  foreach($opcije->vrste() as $value){
								echo $value ."<br />"; 
							}
							?>
                        </select>
						<br/> 
                    </div>
                </div> <!-- /.form-group -->
				<div class="form-group">
                    <label for="marka" class="col-sm-3 control-label">Marka</label>
                    <div class="col-sm-9">
                        <select id="marka" name="marka" class="form-control">
							<?php if(!empty($_POST['marka'])){ echo "<option value=\"{$_POST['marka']}\" selected >{$_POST['marka']}</option> ";  }?>
                            <?php  
						  
						  foreach($opcije->marke() as $value2){
								echo $value2 ."<br />"; 
							}
							?>
                        </select>
						<br/> 
                    </div>
                </div> <!-- /.form-group -->
				<div class="form-group">
                    <label for="model"  class="col-sm-3 control-label">Model</label>
                    <div class="col-sm-9">
                        <input type="text" name="model" value="<?php echo $oglas->model;?>" id="model" placeholder="Npr. FG123" class="form-control" autofocus>
                        <br/> 
                    </div>
                </div>
				<div class="form-group">
                    <label for="god_proizvodnje"  class="col-sm-3 control-label">Gordina proizvodnje</label>
                    <div class="col-sm-9">
                        <input type="number" name="god_proizvodnje" value="<?php echo $oglas->god_proizvodnje;?>" id="god_proizvodnje" placeholder="Npr. 1999" class="form-control" autofocus>
                        <br/> 
                    </div>
                </div>
                <div class="form-group">
                    <label for="opis" class="col-sm-3 control-label">Opis oglasa*</label>
                    <div class="col-sm-9">
                        <textarea id="opis" name="opis" rows="10" maxlength="500"  placeholder="Opis vašeg oglasa, maksimalno 500 znakova" cols="67"><?php echo $oglas->opis;?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="postalCode" class="col-sm-3 control-label">Cijena (Kn)*</label>
                    <div class="col-sm-9">
                        <input type="number" name="cijena" value="<?php echo $oglas->cijena;?>" id="cijena" placeholder="npr, 1650" class="form-control" autofocus>
                    <br/> 
					</div>
                </div>
				<div class="form-group">
                    <label for="datum_objave"  class="col-sm-3 control-label">Datum oglasa</label>
                    <div class="col-sm-9">
                        <input type="text" name="datum_objave" value="<?php echo strftime("%Y-%m-%d %H:%M:%S", time()); ?>" id="datum_objave"  class="form-control" readonly>
						<br/> <br/>
						<p> Slika može biti maksimalne veličine 1,5 mb te u formatu (.jpg,jpeg,png,gif)</p>
						<p>Ako nemate sliku, stavit će se automatska slika "Nema fotografije"</p>
						
                    </div>
                </div>             
                
               
                
				<div class="form-group">
				
                    <div class="col-sm-4">
					<br/>
                        <label for="slika1"  class="control-label">Slika oglasa br.1</label>
								<br />
								<!-- MAX_FILE_SIZE must precede the file input field -->
								<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
								<!-- Name of input element determines name in $_FILES array -->
								<input name="slika1" type="file" />
								Trenutna slika :
								<input type="text" value="<?php echo $oglas->slika1?>" readonly>
								

                    </div>
					<div class="col-sm-4">
					<br/>
                        <label for="slika2"  class="control-label">Slika oglasa br.2</label>
								<br />
								<!-- MAX_FILE_SIZE must precede the file input field -->
								<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
								<!-- Name of input element determines name in $_FILES array -->
								<input name="slika2" type="file" />
								Trenutna slika :
								<input type="text" value="<?php echo $oglas->slika2?>" readonly>
								

                    </div>
					<div class="col-sm-4 ">
					<br/>
                        <label for="slika3"  class="control-label">Slika oglasa br.3</label>
								<br />
								<!-- MAX_FILE_SIZE must precede the file input field -->
								<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
								<!-- Name of input element determines name in $_FILES array -->
								<input name="slika3" type="file" />
								Trenutna slika :
								<input type="text" value="<?php echo $oglas->slika3?>" readonly>
								

                    </div>
                </div>
				
				 <div class="form-group">
                    <div class="col-sm-12 ">
					<br/><br/>
                        <button type="submit" name="uredi" class="btn btn-primary btn-block"> Potvrdite izmjene</button>
                    </div>
                </div>
		
				
		</div><!-- box-body -->
                
                
				
				
            </form> <!-- /form -->
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div> 
      </div> 
    </div>
</div> 

   
   </div> <!-- /box -->
</div> <!-- /.container -->

	  	
<?php require_once("layouts/footer.php"); ?>	
	