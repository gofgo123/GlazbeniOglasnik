<?php
require_once('../includes/opcije.php'); 
require_once('../includes/session.php'); 

//PAGINACIJA
$total_count = Oglasnik::count_all_ads_in_category($_GET['kategorija']);
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1 ; // if empty get, set page to get, otherwise set page to 1;
$per_page = 8;
$pagination = new Pagination($page,$per_page,$total_count);
// $sql = "SELECT * FROM oglasi 
		// WHERE kategorija ='{$_GET['kategorija']}'
		// LIMIT {$per_page} 
		// OFFSET {$pagination->offset()}";
// END of paginacija
		$_SESSION['kategorija'] = $_GET['kategorija'];
$sql="SELECT * FROM oglasi ";
$sql .= " WHERE kategorija ='{$_GET['kategorija']}'";	
		

if (isset($_GET['sort']) and $_GET['sort'] == 'marka')
{
	if(isset($_POST['marka'])){
		$marka = $_POST['marka'];
	}
$sql .= " AND marka='{$marka}'";
}
elseif (isset($_GET['sort']) and $_GET['sort'] == 'vrsta')
{
	if(isset($_POST['vrsta_instrumenta'])){
		$vrsta = $_POST['vrsta_instrumenta'];
	}
$sql .= " AND vrsta_instrumenta='{$vrsta}'";
}

elseif(isset($_GET['sort']) and $_GET['sort'] == 'datum_objave')
{
    $sql .= " ORDER BY datum_objave";
	
}
elseif(isset($_GET['sort']) and $_GET['sort'] == 'datum_objave2')
{
    $sql .= " ORDER BY datum_objave DESC";
	
}
$sql .= " LIMIT {$per_page}";	
$sql .= " OFFSET {$pagination->offset()}"; // finalni dio SQL-a koji se salje u 
		
	
	echo " Sortiraj oglase : <br/><br/> ";
	echo"<div class=\"col-sm-2\">";
		echo "<a href=\"oglasi.php?kategorija={$_GET['kategorija']}&sort=datum_objave2\">Noviji oglasi na vrhu </a> ";
		echo "<a href=\"oglasi.php?kategorija={$_GET['kategorija']}&sort=datum_objave\">Stariji oglasi na vrhu </a><br /> ";
			
	echo "</div>";
	
	echo"<div class=\"col-sm-4\" style=\"border: 1px solid #4bc6ff; border-radius: 12px;\">";
	echo "<label for=\"vrsta_instrumenta\" style=\" padding-top:6px;\" class=\"col-sm-3 control-label\">po vrsti :</label>";
	echo"<form action=\"oglasi.php?kategorija={$_GET['kategorija']}&sort=vrsta\" method=\"POST\" >";
	echo"<select id=\"marka\" name=\"vrsta_instrumenta\">";
	foreach($opcije->vrste() as $value2){
								echo $value2; 
							}
	echo"</select>";
	echo"<button type=\"submit\" class=\"btn btn-link\">Prikaži</button>";
	echo"</form>";
	echo "</div>";
	
	
	echo"<div class=\"col-sm-4\" style=\"border: 1px solid #4bc6ff; border-radius: 12px;\">";
	echo "<label for=\"marka\" style=\" padding-top:6px;\" class=\"col-sm-4 control-label\">po marki :</label>";
	echo"<form action=\"oglasi.php?kategorija={$_GET['kategorija']}&sort=marka\" method=\"POST\" >";
	echo"<select id=\"marka\" name=\"marka\" >";
	foreach($opcije->marke() as $value2){
								echo $value2; 
							}
	echo"</select>";
	echo"<button type=\"submit\" class=\"btn btn-link\">Prikaži</button>";
	echo"</form>";
	echo "</div><br /><br />";
	

	


?>