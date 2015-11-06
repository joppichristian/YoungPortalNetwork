<?php
    include 'private/connessione-db.php';
	include 'private/utility-login.php';
	
	my_session_start();
	
			
	if ($_SERVER['REQUEST_METHOD'] == "POST"){
		
        	
		if(utenteLoggato($mysqli) == true) {	

	
		$risposta = str_replace("'", "\'",$_POST['answer']);
		$user_id = $_SESSION['user_id'];
		$anonimo = $_POST['anonimato'];
		$id_domanda = $_POST['id_domanda'];
		
		$sql = "INSERT INTO RISPOSTE (TESTO, ID_DOMANDA,USER_ID,ANONIMATO) VALUES ('".$risposta."','".$id_domanda."','".$user_id."','".$anonimo."');";					
		if (!mysqli_query($mysqli,$sql)){
			die('</br></br>Error: ' . mysqli_error($mysqli));
		}	
		$insertId = $mysqli->insert_id;
			
		$mysqli->close();	
		
		header("Location: http://www.youngportalnetwork.it/students.php");
		die();		
	
		}
	}

?>	 		