<?php

		//DB Connection
		include 'private/connessione-db.php';
		include 'private/utility-login.php';
		my_session_start();

		if ($_SERVER['REQUEST_METHOD'] == "POST"){

			if(!isset($_POST['cod'])){
				die("devi autenticarti");
			}
			if(strcmp($_POST['cod'],'young123')!=0){
				die("non sei autenticato");
			}

			$sql = "DELETE FROM CURRICULUM WHERE ID_utente = '".$_SESSION['user_id']."' ; ";

			//echo "sql: ".$sql;
			
			if (!mysqli_query($mysqli,$sql)){
				die('</br></br>Errore. Scrivi a info@youngportalnetwork.it . ');
			}

			echo "success";

		}else{
			echo "RICHIESTA ERRATA.";
		}



?>
