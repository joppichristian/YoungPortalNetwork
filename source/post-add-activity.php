<?php
    include 'private/connessione-db.php';
	include 'private/utility-login.php';
	
	my_session_start();
	      	
	if ($_SERVER['REQUEST_METHOD'] == "POST"){
        	
		if(utenteLoggato($mysqli) == true) {	
			
			echo "</br> RIEPILOGO ATTIVITA:";
			echo "</br>";
			echo " titolo: ". $_POST["titolo"]. "\n";
			echo "</br>";
			echo " descrizione: ". $_POST['descrizione']. "\n";
			echo "</br>";			
			echo " categoria: ".$_POST["categoria"]. "\n";
			echo "</br>";
			echo " id utente: ". $_SESSION['user_id'] . "\n";
			echo "</br>";
			 			
			$titolo = $_POST["titolo"];								
			$descrizione = $_POST["descrizione"];
			$categoria = $_POST["categoria"];
			$idUtente = $_SESSION['user_id'];	
		 			
			$sql = "INSERT INTO ATTIVITA (TITOLO, DESCRIZIONE, CATEGORIA_ID, UTENTE_CREATORE ) VALUES 

										('".$titolo."','".$descrizione."','".$categoria."','".$idUtente."')";
			
			if (!mysqli_query($mysqli,$sql)){
				die('</br></br>Error: ' . mysqli_error($mysqli));
			}

			echo "</br></br>HAI AGGIUNTO 1 ATTIVIT&Agrave;..</br></br>";
				
			echo "<a href=\"../activities.php\" > Torna alle Attivit&agrave; </a>";			
	
			$mysqli->close();	
		

		}else{
			echo "SI E VERIFICATO UN ERRORE: non sei loggato correttamente <a href=\"activities.php\" >torna indietro ed effettua il login</a>";	
			$mysqli->close();	
		}	
		
	}else{
		echo "SI E VERIFICATO UN ERRORE, <a href=\"activities.php\" >torna indietro e riprova</a>";	
		$mysqli->close();	
	}
		

?>	 		