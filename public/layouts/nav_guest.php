	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <img  height="50" width="50" src="images/logo.png">
          <a class="navbar-brand" href="index.php">Glazbeni Oglasnik</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
		<?php if(!empty($session->message)){ echo "<p class=\"navbar-text navbar-right\">{$session->message}</p>";} ?> 
          <form class="navbar-form navbar-right" action="login.php" method="POST">
            <div class="form-group">
              <input type="text" name="username" placeholder="Korisničko ime" class="form-control" >
            </div>
            <div class="form-group">
              <input type="password" name="password" placeholder="Lozinka" class="form-control" >
            </div>
            <button type="submit"  name="prijava" class="btn btn-success">Prijava</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
			
	<div class="jumbotron">
      <div class="container">
	 
        <h2>Dobrodošli na Glazbeni Oglasnik!</h2>
        <p>Registrirajte se besplatno i u kratkom vremenu podjelite svoj oglas ! </p>
        <p><a class="btn btn-primary btn-lg" href="register.php" role="button">Registracija &raquo;</a></p>
      </div>
	  
    </div>
				