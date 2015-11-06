<?php
 
		//DB Connection
		include 'private/connessione-db.php';
	      	
		if ($_SERVER['REQUEST_METHOD'] == "GET"){
        				 			
			
			
			$sql = "DELETE FROM COMMENTO_EVENTI WHERE ID = '".$_GET["id"]."' ; ";
			       
			if (!mysqli_query($mysqli,$sql)){
				die('</br></br>Errore. Scrivi a info@youngportalnetwork.it . ');
			}
			$evento = $_GET["ev"];
			header("Location: http://www.youngportalnetwork.it/event.php?id=".$evento."#commenti");
			die();							 
		}else{
			echo "RICHIESTA ERRATA.";			
		}
			
	 
	 
?>	 		