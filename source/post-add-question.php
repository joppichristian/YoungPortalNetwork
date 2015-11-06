<?php
    include 'private/connessione-db.php';
	include 'private/utility-login.php';
	
	my_session_start();
	
			
	if ($_SERVER['REQUEST_METHOD'] == "POST"){
		
        	
		if(utenteLoggato($mysqli) == true) {	

	
		$domanda = str_replace("'", "\'",$_POST['question']);
		$user_id = $_SESSION['user_id'];
		$anonimo = $_POST['anonimato'];
		$materia = $_POST['materia'];
		
		$sql = "INSERT INTO DOMANDE (TESTO, ID_MATERIA,USER_ID,ANONIMATO) VALUES ('".$domanda."','".$materia."','".$user_id."','".$anonimo."');";					
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