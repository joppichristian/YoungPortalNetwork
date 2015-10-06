<?php
 
//DB Connection
include 'connessione-db.php';	
 

if ($_SERVER['REQUEST_METHOD'] == "GET"){

	echo "</br> RIEPILOGO EMAIL:";
	echo "</br>";
	echo " email: ". $_GET["email"]. "\n </br>";
	echo " rand: ". $_GET["r"]. "\n";
	echo "</br>";
	echo "</br>";
	
	$email = $_GET["email"];
	
	if(!emailVerificata($email)){
	
		if(checkRandomCorrect($_GET["r"],$email)){
			//IL RANDOM E CORRETTO
		
			attivaUtente($email);		
			
			echo "</br></br>COMPLIMENTI, ora il tuo account è attivo e puoi effettuare il login!</br></br>";
			
			echo "<a href=\"../index.php\" > vai al sito </a>";		
		
		}else{
			echo "</br>Si &egrave; verificato qualche errore (errore random sbagliato). contatta l'amministratore: info@youngportalnetwork.it </br>";
		}		
		
	}else{ //Utente gia registrato 
	 
		echo "Grazie, sei già registrato al sito. Vai alla home ed effettua il login. </br>";		
		
		echo "<a href=\"../index.php\" > vai al sito </a>";		
	
	
	}	
					
	 
}else{
	echo "ERRORE.";			
}
		
//======================================================= Functions =============================================================

function attivaUtente($email){
	global $mysqli;
	
	$sqlUpdate = "UPDATE UTENTE SET ATTIVO = '1' WHERE EMAIL = '$email' ;";
	if (!mysqli_query($mysqli,$sqlUpdate)){
		die('</br></br>Errore. Scrivi a info@youngportalnetwork.it . ');
	}

}

function checkRandomCorrect($random,$email){
	global $mysqli;
	
	$query="SELECT * FROM UTENTE WHERE EMAIL = '$email' ;" ;
	$result = $mysqli->query($query);
 
	while($row = $result->fetch_array())
	{
		if($random == $row['RANDOM'] ){
			return true;
		}	
	}

	return false;

}		

function emailVerificata($email){
	global $mysqli;
	
	$query="SELECT * FROM UTENTE WHERE EMAIL = '$email' AND ATTIVO = '1' ;" ;
	$result = $mysqli->query($query);
 
	while($row = $result->fetch_array())
	{
		return true;
	}

	return false;
}	  
	
?>	 		