<?php
include 'connessione-db.php';
include 'utility-login.php';
my_session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST"){ 
	 
	//1) Recupero la password criptata dal form di inserimento.
	$password = $_POST['p'];
	
	//2) Verifico che l utente sia loggato
	if(utenteLoggato($mysqli) == true) {
		
		//3) Crea una chiave random
		$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
		//4) Crea una password usando la chiave appena creata
		$password = hash('sha512', $password.$random_salt);
		
		//5) PREPARED STATEMENT 
		$sqlUpdate = "UPDATE UTENTE SET PASSWORD=? , SALT=? WHERE ID=?"; 
		
		$stmt = $mysqli->prepare($sqlUpdate);
		$stmt->bind_param('ssd', $password, $random_salt,  $_SESSION['user_id']);
		$stmt->execute();

		if ($stmt->errno) {
			$stmt->close();
			header('Location: ../page_messaggio.php?ms=Errore, qualcosa e andato storto! Effettua il login e riprova!');
		}
		else{
			$stmt->close();
			header('Location: ../page_messaggio.php?ms=Password modificata correttamente.');
			die();			
		}		 	
 		
	}else{ //Utente non loggato	 
		header('Location: ../page_messaggio.php?ms=Errore, sessione scaduta! Effettua il login e riprova!');
		die();
	}	
	
}else{
	header('Location: ../page_messaggio.php?ms=DEVI PRIMA COMPILARE IL FORM PER MODIFICARE L UTENTE.');
} 	

// ==================================================== FUNZIONI UTILI ===================================================================

?>

