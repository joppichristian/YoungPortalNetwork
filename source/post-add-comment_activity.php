<?php
    include 'private/connessione-db.php';
	include 'private/utility-login.php';
	
	my_session_start();
	
			
	if ($_SERVER['REQUEST_METHOD'] == "POST"){
		
        	
		if(utenteLoggato($mysqli) == true) {	

	
		$commento = str_replace("'", "\'",$_POST['testo_commento']);
		$id = $_POST['id'];
		$user_id = $_SESSION['user_id'];
		$sql = "INSERT INTO COMMENTO_ATTIVITA (TESTO, ATTIVITA_ID,USER_ID) VALUES ('".$commento."','".$id."','".$user_id."');";					
		if (!mysqli_query($mysqli,$sql)){
			die('</br></br>Error: ' . mysqli_error($mysqli));
		}	
		$insertId = $mysqli->insert_id;
			
		$mysqli->close();	
		
		header("Location: http://www.youngportalnetwork.it/activity.php?id=".$id."#commenti");
		die();		
	
		}
	}

?>	 		