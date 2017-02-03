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
              <input type="text" name="username" placeholder="Korisničko ime" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="password" placeholder="Lozinka" class="form-control">
            </div>
            <button type="submit"  name="prijava" class="btn btn-success">Prijava</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
			
	<div class="jumbotron">
      <div class="container">
        <h2>Pravila stranice</h2>
         <pre>
		 Želimo vam samo skrenuti pažnju na neka od pravila stranice koja kažu: 
		 Pristupanjem ovim stranicama prihvaćate sva pravila i uvjete korištenja 
		 Nema vrijeđanja, psovanja, ostanite kulturni ! 
		 Vaši oglasi mogu trajati maksimalno 10 dana,nakon toga se prikazuju kao neaktivni i vi ih ponovno možete reaktivirati 
		 Dupli oglasi će se brisati i dobivate upozorenje, 4 upozorenja i bit će vam zabranjen dolazak na stranicu 
		 Upozorenja se dobivaju i za ostala nepoštivanja pravila </pre>
        
      </div>
    </div>
				