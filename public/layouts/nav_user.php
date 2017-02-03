<?php require_once("../includes/database.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/users.php"); ?>
<?php require_once("../includes/oglasnik.php"); ?>

<?php 
if(isset($_SESSION['id'])){
$user = Users::find_by_id($_SESSION['id']);
}else{
	$user = Users::find_by_id($_GET['id']);
}

?>


<?php $broj_oglasa = Oglasnik::count_all_ads_by_user($_SESSION['id']); ?>

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
			<p class="navbar-text navbar-right"><a href="logout.php" class="navbar-link">Odjava</a></p>
			<p class="navbar-text navbar-right"><a href="user_profile.php" class="navbar-link">Profil</a></p>
			<p class="navbar-text navbar-right">Prijavljeni ste kao <a href="user_profile.php" class="navbar-link"><?php echo $user->username; ?></a></p>
			<p class="navbar-text navbar-left"><a href="statistike.php" class="navbar-link">->Statistike</a></p>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
			
	<div class="jumbotron">
      <div class="container">
        <h2>Dobrodošli , <?php echo "{$user->first_name} {$user->last_name}"; ?></h2>
        <?php 
			if($broj_oglasa == 1){
				echo"<p> Trenutno imate samo {$broj_oglasa} aktivni oglas</p>";
			}elseif($broj_oglasa > 1 and $broj_oglasa <= 4){
				echo"<p> Trenutno imate  {$broj_oglasa} aktivna oglasa</p>";
			}elseif($broj_oglasa >= 5){
				echo"<p> Trenutno imate  {$broj_oglasa} aktivnih oglasa</p>";
			}else{
				echo"<p> Trenutno nemate nijedan aktivni oglas</p>";
			}
		
?>
		
		
        
      </div>
    </div>
	