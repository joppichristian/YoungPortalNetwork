<?php
 
		//DB Connection
		include 'private/connessione-db.php';
	      	
		if ($_SERVER['REQUEST_METHOD'] == "GET"){
        				 			
			
			
			$sql = "DELETE FROM DOMANDE WHERE ID = '".$_GET["id"]."' ; ";
			       
			if (!mysqli_query($mysqli,$sql)){
				die('</br></br>Errore. Scrivi a info@youngportalnetwork.it . ');
			}
			
			header("Location: http://www.youngportalnetwork.it/students.php");
			die();							 
		}else{
			echo "RICHIESTA ERRATA.";			
		}
			
	 
	 
?>	 		