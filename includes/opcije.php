<?php


class Opcije{
	
	
	

	// VRSTE INSTRUMENATA //
public $gitare = array( 
				'<option value="Električna gitara">Električna gitara</option>',
				'<option value="Akustična gitara">Akustična gitara</option>',
				'<option value="Klasična gitara">Klasična gitara</option>',
				'<option value="Elektro akustična gitara">Elektro akustična gitara</option>',
				'<option value="Akustični bas">Akustični bas</option>',
				'<option value="Električni bas">Električni bas</option>',
				'<option value="Tamburica">Tamburica</option>',
				'<option value="Ukulele">Ukulele</option>',
				'<option value="Kontrabas">Kontrabas</option>',
				'<option value="Ostalo">Ostalo</option>',
				
				
				);
public $bubnjevi = array( 
				'<option value="Akustični bubanj">Akustični bubanj</option>',
				'<option value="Električni bubanj">Električni bubanj</option>',
				'<option value="Klasična gitara">Klasična gitara</option>',
				'<option value="Ritam mašina">Ritam mašina</option>',
				'<option value="Činele palice stolci">Činele palice stolci</option>',
				'<option value="Ostalo">Ostalo</option>',
				);
public $gudacki = array( 
				'<option value="Violine">Violine</option>',
				'<option value="Viola">Viola</option>',
				'<option value="Violončelo">Violončelo</option>',
				'<option value="Ostalo">Ostalo</option>',
				);

public $elektronika = array(
				'<option value="Pedala">Pedala</option>',
				'<option value="Procesor">Procesor</option>',
				'<option value="Štimer">Štimer</option>',
				'<option value="Pickup">Pickup</option>',
				'<option value="Ostalo">Ostalo</option>',
				

				);
				
public $mikrofoni = array(
				'<option value="Mikrofon">Mikrofon</option>',
				'<option value="Slušalice">Slušalice</option>',
				'<option value="Pojačalo">Pojačalo</option>',
				'<option value="Razglas">Razglas</option>',
				'<option value="Ostalo">Ostalo</option>',


				);

public $kablovi = array(
				'<option value="Kablovi">Kablovi</option>',
				'<option value="Jack">Jack</option>',
				'<option value="Čiščenje">Čiščenje</option>',
				'<option value="Ostalo">Ostalo</option>',


				);

public $oprema_razno = array(
				'<option value="Kofer">Kofer</option>',
				'<option value="Futrola">Futrola</option>',
				'<option value="Držač">Držač</option>',
				'<option value="Žice">Žice</option>',
				'<option value="Gudala">Gudala</option>',
				'<option value="Trzalice">Trzalice</option>',

				);
public $bend = array(
				'<option value="Pjevač">Pjevač</option>',
				'<option value="Gitarist">Gitarist</option>',
				'<option value="Bubnjar">Bubnjar</option>',
				'<option value="Basist">Basist</option>',
				'<option value="Klavijaturist">Klavijaturist</option>',
				'<option value="Ostalo">Ostalo</option>',

				);
// END OF VRSTE INSTRUMENATA //

// MARKE INSTRUMENATA I UREĐAJA //
public $gitare_marke = array( 
				'<option value="Fender">Fender</option>',
				'<option value="Les Paul">Les Paul</option>',
				'<option value="B.C.Rich">B.C.Rich</option>',
				'<option value="Ibanez">Ibanez</option>',
				'<option value="Godin">Godin</option>',
				'<option value="Cort">Cort</option>',
				'<option value="Dean">Dean</option>',
				'<option value="UkuleMaster">UkuleMaster</option>',
				'<option value="Ostalo">Ostalo</option>',
				
				
				);
public $bubnjevi_marke = array( 
				'<option value="Tama">Tama</option>',
				'<option value="Sonor">Sonor</option>',
				'<option value="Zildijan">Zildijan</option>',
				'<option value="Ludwig">Ludwig</option>',
				'<option value="Yamaha">Yamaha</option>',
				'<option value="Ostalo">Ostalo</option>',
				);
public $gudacki_marke = array( 
				'<option value="Stradivari">Stradivari</option>',
				'<option value="Sohn">Sohn</option>',
				'<option value="Vivaldi">Vivaldi</option>',
				'<option value="Ostalo">Ostalo</option>',
				);

public $elektronika_marke = array(
				'<option value="Boss">Boss</option>',
				'<option value="HBE">HBE</option>',
				'<option value="Suhr">Suhr</option>',
				'<option value="Korg">Korg</option>',
				'<option value="Dunlop">Dunlop</option>',
				'<option value="Ostalo">Ostalo</option>',
				

				);
				
public $mikrofoni_marke = array(
				'<option value="Behringer">Behringer</option>',
				'<option value="Electro voice">Electro voice</option>',
				'<option value="RCF">RCF</option>',
				'<option value="Bell">Bell</option>',
				'<option value="Laney">Laney</option>',
				'<option value="Bose">Bose</option>',
				'<option value="FBT">FBT</option>',
				'<option value="Cube">Cube</option>',
				'<option value="Ostalo">Ostalo</option>',

				);

public $kablovi_marke = array(
				'<option value="Golden cord">Golden cord</option>',
				'<option value="Ultrajack">Ultrajack</option>',
				'<option value="CleanWiz">CleanWiz</option>',
				'<option value="Ostalo">Ostalo</option>',


				);

public $oprema_razno_marke = array(
				'<option value="Izokofer">Izokofer</option>',
				'<option value="SpužvaXx">SpužvaXx</option>',
				'<option value="Dunlop">Dunlop</option>',
				'<option value="Boss">Boss</option>',
				'<option value="Bell">Bell</option>',
				'<option value="Trzalice">Trzalice</option>',

				);
public $bend_marke = array(
				'<option value="Pop">Pop</option>',
				'<option value="Metal">Metal</option>',
				'<option value="Rock">Rock</option>',
				'<option value="Jazz">Jazz</option>',
				'<option value="Swing">Swing</option>',
				'<option value="Rap">Rap</option>',

				);
// END OF MARKE INSTRUMENATA I UREĐAJA //

//metoda koja vraća određene opcije kada se radi novi oglas,temeljeno na kojoj smo kategoriji
	public function vrste(){
		
		if(isset($_GET['kategorija'])){
			
			if($_GET['kategorija'] == "gitare"){
				
				return $this->gitare;
			}
			
			if($_GET['kategorija'] == "bubnjevi"){
				
				return $this->bubnjevi;
			}
			
			if($_GET['kategorija'] == "gudački"){
				
				return $this->gudacki;
			}
			
			if($_GET['kategorija'] == "elektronika"){
				
				return $this->elektronika;
			}
			
			if($_GET['kategorija'] == "mikrofoni"){
				
				return $this->mikrofoni;
			}
			
			if($_GET['kategorija'] == "kablovi"){
				
				return $this->kablovi;
			}
			
			if($_GET['kategorija'] == "oprema_razno"){
				
				return $this->oprema_razno;
			}
			
			if($_GET['kategorija'] == "bend"){
				
				return $this->bend;
			}
	
		}
	
	}
	 // metoda koja ce ponuditi marke uredjaja iz napravljenih nizova
	public function marke(){
		
		if(isset($_GET['kategorija'])){
			
			if($_GET['kategorija'] == "gitare"){
				
				return $this->gitare_marke;
			}
			
			if($_GET['kategorija'] == "bubnjevi"){
				
				return $this->bubnjevi_marke;
			}
			
			if($_GET['kategorija'] == "gudački"){
				
				return $this->gudacki_marke;
			}
			
			if($_GET['kategorija'] == "elektronika"){
				
				return $this->elektronika_marke;
			}
			
			if($_GET['kategorija'] == "mikrofoni"){
				
				return $this->mikrofoni_marke;
			}
			
			if($_GET['kategorija'] == "kablovi"){
				
				return $this->kablovi_marke;
			}
			
			if($_GET['kategorija'] == "oprema_razno"){
				
				return $this->oprema_razno_marke;
			}
			if($_GET['kategorija'] == "bend"){
				
				return $this->bend_marke;
			}
	
	
		}
	
	}
	
				
				
}
$opcije=new Opcije();

?>


							