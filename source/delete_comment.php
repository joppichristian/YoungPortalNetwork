<?php
 
		//DB Connection
		include 'private/connessione-db.php';
	      	
		if ($_SERVER['REQUEST_METHOD'] == "GET"){
        				 			
			
			
			$sql = "DELETE FROM COMMENTO_ATTIVITA WHERE ID = '".$_GET["id"]."' ; ";
			       
			if (!mysqli_query($mysqli,$sql)){
				die('</br></br>Errore. Scrivi a info@youngportalnetwork.it . ');
			}
			$act = $_GET["att"];
			echo $act;
			header("Location: http://www.youngportalnetwork.it/activity.php?id=".$act."#commenti");
			die();							 
		}else{
			echo "RICHIESTA ERRATA.";			
		}
			
	 
	 
?>	 		