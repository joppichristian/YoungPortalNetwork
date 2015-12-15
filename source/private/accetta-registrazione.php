<?php
include 'connessione-db.php';
require_once ('phpmailer/PHPMailerAutoload.php'); 
 
if ($_SERVER['REQUEST_METHOD'] == "POST"){ 
	 
	// Recupero la password criptata dal form di inserimento.
	$password = $_POST['p'];
	$email = $_POST['signup-email'];					 
	$username = $_POST['signup-username'];
	$dataNascita = $_POST['data_nascita'];
	
	//1) genera random
	$randomStr = generateRandomString();

	//2) aggiungo utente disattivo al DB se non è già presente
	if(!utenteAttivo($email)){
		
		inserisciUtenteDisattivo($username,$email,$randomStr,$password,$dataNascita);
		
		//3) invio email
		$mail = new PHPMailer();
		$mail->From = "noreply@youngportalnetwork.it";
		$mail->FromName = "YoungPortalNetwork";
		$mail->addAddress($email);
		
		//Indirizzo a cui il destinatario risponderà
		$mail->addReplyTo("noreply@youngportalnetwork.it", "Conferma Registrazione");
		$mail->isHTML(true);
		$mail->Subject = "Conferma Registrazione";
		$mail->Body = "<html><body> <div> Grazie per esserti interessato a YoungPortalNetwork! <a href=\"http://www.youngportalnetwork.it/private/attiva-utente.php?email=$email&r=$randomStr\" > clicca qui per attivare il tuo account </a> </div> 
									<div>
										</br>
										Ricorda che dopo esserti attivato puoi in ogni momento cancellare l'account.</br>
										Per qualsiasi info puoi scrivere all email: info@youngportalnetwork.it
									</div>
					   </body></html>";
		//versione testuale(non html) della email		 	   
		$mail->AltBody = "Grazie per esserti interessato a YoungPortalNetwork! copia e incolla nell url del tuo browser questo link: http://www.youngportalnetwork.it/private/attiva-utente.php?email=$email&r=$randomStr ";
		 
		if(!$mail->send()) 
		{
			header("Location: ../page_messaggio.php?ms= Non e' stato possibile inviare il messaggio. Contattaci: info@youngportalnetwork.it");
			die();

		} 
		else
		{
			header('Location: ../page_messaggio.php?ms=Per completare la registrazione clicca sul link che ti abbiamo inviato alla tua mail  (se non ricevi la mail controlla anche la casella spam)');
			die();
		}
 	
	
		
		
	}else{ //Utente gia registrato 
	 
		header('Location: ../page_messaggio.php?ms=Sei già registrato! Effettua il login!');
		die();
	
	}	
	
	//3) invia email conferma alla sua email


}else{
	echo "DEVI PRIMA COMPILARE IL FORM PER INSERIRE L' EMAIL.";			
} 	

// ==================================================== FUNZIONI UTILI ===================================================================

function inserisciUtenteDisattivo($username,$email,$randomStr,$password,$dataNascita){
	global $mysqli;
	 
	$dataNascitaFormatted = date('Y-m-d', strtotime($dataNascita));
	
	$giaInserito = false;
	$utenteGiaInUso = false;
	
	$query="SELECT * FROM UTENTE WHERE EMAIL = '$email' ;" ;
	$result = $mysqli->query($query); 
	while($row = $result->fetch_array())
	{
		$giaInserito = true;
	}
	
	$query_user="SELECT * FROM UTENTE WHERE USERNAME = '$username' ;" ;
	$result_user = $mysqli->query($query_user); 
	while($row_user = $result_user->fetch_array())
	{
		$utenteGiaInUso = true;
	}
	
	if($giaInserito){
		header("Location: ../page_messaggio.php?ms=L'email inserita risulta gia' registrata. Devi ancora cliccare sul link che ti abbiamo inviato via email per attivare l'account. Per info contatta l'amministratore.");
		die();
			
	}else{
		
		if($utenteGiaInUso){
			header("Location: ../page_messaggio.php?ms=Il nome utente ($username) inserito risulta gia' in uso. Per favore inserisci un nuovo nome utente.");
			die();			
		}
					
		// Crea una chiave casuale
		$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
		// Crea una password usando la chiave appena creata.
		$password = hash('sha512', $password.$random_salt);
		// Inserisco codice per eseguire un INSERT 
		// USARE PREPARED STATEMENT
		if ($insert_stmt = $mysqli->prepare("INSERT INTO UTENTE (USERNAME,EMAIL, PASSWORD, SALT, RANDOM, ATTIVO, DATA_NASCITA) VALUES (?, ?, ?, ?, ?, ?, ?)")) {    
		   
			$non_attivo = "0";		
		   
			$rc = $insert_stmt->bind_param('sssssss',$username, $email, $password, $random_salt, $randomStr, $non_attivo, $dataNascitaFormatted); 
		   
			if ( false===$rc ) {
				// again execute() is useless if you can't bind the parameters. Bail out somehow.
				die('bind_param() failed: ' . htmlspecialchars($insert_stmt->error));
			}
			 
			// Esegui la query 
			$rc = $insert_stmt->execute();
			
			if ( false===$rc ) {
				die('execute() failed: ' . htmlspecialchars($insert_stmt->error));
			}
			
			$insert_stmt->close();
			
			//echo "Per completare la registrazione ed attivare l'account clicca sulla email che abbiamo inviato <a href=\"../index.php\" > Torna alla home </a> ";
		}
	
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


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
		
	
?>

