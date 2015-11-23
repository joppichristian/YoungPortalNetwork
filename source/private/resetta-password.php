<?php
include 'connessione-db.php';
require_once ('phpmailer/PHPMailerAutoload.php'); 
 
if ($_SERVER['REQUEST_METHOD'] == "POST"){ 
	 
	// Recupero la password criptata dal form di inserimento.
	
	$email = $_POST['reset-email'];	

	if( !isset($email) ){
		header('Location: ../page_messaggio.php?ms=qualcosa e andato storto.. per info scrivi a info@youngportalnetwork.it');
		die();
	}	
	
	//1) genera Random password
	$randomPwd = generateRandomPassword();
	
	//2) controllo se l utente si era registrato correttamente
	if(utenteAttivo($email)){
		
		inserisciNuovaPassword($email,$randomPwd);
		
		//3) invio email
		$mail = new PHPMailer();
		$mail->From = "noreply@youngportalnetwork.it";
		$mail->FromName = "YoungPortalNetwork";
		$mail->addAddress($email);
		
		//Indirizzo a cui il destinatario risponderà
		$mail->addReplyTo("noreply@youngportalnetwork.it", "Reset Password");
		$mail->isHTML(true);
		$mail->Subject = "YoungPortalN Reset Password";
		$mail->Body = "<html><body> <div> Invio password provvisoria.</div> 
									<div>
										</br>
										La tua password provvisoria è $randomPwd.</br>
										Ricorda che dopo aver effettuato il login nel sito con la password provvisoria puoi cambiarla cliccando sul tuo nome in alto a destra.</br>
										Per qualsiasi info puoi scrivere all email: info@youngportalnetwork.it
									</div>
					   </body></html>";
		//versione testuale(non html) della email		 	   
		$mail->AltBody = "La tua password provvisoria è $randomPwd. Ricorda che dopo aver effettuato il login nel sito con la password provvisoria puoi cambiarla cliccando sul tuo nome in alto a destra. Per info: info@youngportalnetwork.it ";
		 
		if(!$mail->send()) 
		{
			header("Location: ../page_messaggio.php?ms= Non e' stato possibile inviare il messaggio. Contattaci: info@youngportalnetwork.it");
			die();

		} 
		else
		{
			header('Location: ../page_messaggio.php?ms=Ti abbiamo inviato una password provvisoria. Controlla la tua mail e se non ricevi nulla controlla anche la casella SPAM.');
			die();
		}
 	}else{ //Utente non registrato 
	 
		header('Location: ../page_messaggio.php?ms=Non sei ancora registrato con questa email, oppure non hai attivato l account. Effettua la registrazione.');
		die();
	
	}	

}else{
	echo "DEVI PRIMA COMPILARE IL FORM PER INSERIRE L' EMAIL.";			
} 	

// ==================================================== FUNZIONI UTILI ===================================================================

function inserisciNuovaPassword($email,$randomPwd){
	global $mysqli;
					
	// Crea una chiave casuale
	$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
	// Crea una password usando la chiave appena creata.
	$randomPwd = hash('sha512', $randomPwd.$random_salt);
	
	//UPDATE PASSWORD -> USARE PREPARED STATEMENT
	if ($update_stmt = $mysqli->prepare("UPDATE UTENTE SET PASSWORD = ? , SALT = ? WHERE EMAIL = ?")) {    
	   
		$rc = $update_stmt->bind_param('sss',$randomPwd, $random_salt, $email); 
	   
		if ( false===$rc ) {
			// again execute() is useless if you can't bind the parameters. Bail out somehow.
			die('bind_param() failed: ' . htmlspecialchars($update_stmt->error));
		}
		 
		// Esegui la query 
		$rc = $update_stmt->execute();
		
		if ( false===$rc ) {
			die('execute() failed: ' . htmlspecialchars($update_stmt->error));
		}
		
		$update_stmt->close();
		
	} 

}

function utenteAttivo($email){
	global $mysqli;
	$query="SELECT * FROM UTENTE WHERE EMAIL = '$email' AND ATTIVO = '1' ;" ;
	$result = $mysqli->query($query);
 
	while($row = $result->fetch_array())
	{
		return true;
	}

	return false;
}

function generateRandomPassword($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
	
	
?>

