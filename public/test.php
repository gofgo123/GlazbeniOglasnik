
<?php
require_once("layouts/header.php");
require_once("layouts/nav_guest.php");

require_once("../includes/database.php");
require_once("../includes/functions.php");
require_once("../includes/session.php"); 
require_once("../includes/users.php"); 
require_once("../includes/oglasnik.php");
require_once("../includes/novioglas.php");  
 require_once('../includes/opcije.php'); 
 require_once("../includes/obrisioglas.php");




$oglas_delete= ObrisiOglas::find_ad_by_id(22);

echo "<pre>";
print_r($oglas_delete);
echo "</pre>";

echo "<hr>";


?>









<?php require_once("layouts/footer.php"); ?>