<?php
 
		//DB Connection
		include 'private/connessione-db.php';
	      	
		if ($_SERVER['REQUEST_METHOD'] == "POST"){
        				 			
			if(!isset($_POST['id'])){		
				 die( "</br> id NON settato!!!");							
			}
			if(!isset($_POST['url'])){		
				 die( "</br> url NON settato!!!");							
			}
			if(!isset($_POST['cod'])){
				die("devi autenticarti");
			}
			if(strcmp($_POST['cod'],'young123')!=0){
				die("non sei autenticato");
			}
			
			$resource = str_replace("http://www.youngportalnetwork.it/","",$_POST['url']);
			 
			if (unlink($resource)){
				//echo "delete riuscito!";
			}else{
				//echo "delete fallito!!!!!";
			}
			
			$sql = "DELETE FROM MEDIA_EVENTI WHERE ID = '".$_POST["id"]."' ; ";
			       
			if (!mysqli_query($mysqli,$sql)){
				die('</br></br>Errore. Scrivi a info@youngportalnetwork.it . ');
			}

			echo "success";
						 
		}else{
			echo "RICHIESTA ERRATA.";			
		}
			
	 
	 
?>	 		