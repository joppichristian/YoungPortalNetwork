<?php
include 'connessione-db.php';
include 'utility-login.php';

my_session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST"){ 
	 
	//1) Recupero la password criptata dal form di inserimento.
	$password = $_POST['p'];
	
	//2) Verifico che l utente sia loggato
	if(utenteLoggato($mysqli) == true) {
		
		// !!!!!!!!!!!!!!!!!!!!!! vedi modifica officina !!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
		$sqlUpdate = "UPDATE UTENTE SET ATTIVO = '1' WHERE EMAIL = '$email' ;";
		if (!mysqli_query($mysqli,$sqlUpdate)){
			die('</br></br>Errore. Scrivi a info@youngportalnetwork.it . ');
		}
 		
	}else{ //Utente non loggato
	 
		header('Location: ../page_messaggio.php?ms=Errore, sessione scaduta! Effettua il login e riprova!');
		die();
	
	}	
	
}else{
	echo "DEVI PRIMA COMPILARE IL FORM PER MODIFICARE L UTENTE.";			
} 	

// ==================================================== FUNZIONI UTILI ===================================================================

 
 
?>

