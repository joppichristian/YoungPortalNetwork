<?php

		//DB Connection
		include 'private/connessione-db.php';

		if ($_SERVER['REQUEST_METHOD'] == "POST"){

			if(!isset($_POST['cod'])){
				die("devi autenticarti");
			}
			if(strcmp($_POST['cod'],'young123')!=0){
				die("non sei autenticato");
			}

			$sql = "DELETE FROM CURRICULUM WHERE ID_UTENTE = '".$_SESSION['user_id']."' ; ";

			if (!mysqli_query($mysqli,$sql)){
				die('</br></br>Errore. Scrivi a info@youngportalnetwork.it . ');
			}

			echo "success";

		}else{
			echo "RICHIESTA ERRATA.";
		}



?>
