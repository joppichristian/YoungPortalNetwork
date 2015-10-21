<?php
    include 'private/connessione-db.php';
	include 'private/utility-login.php';
	
	my_session_start();
	      	
	if(isset($_FILES)){
		//echo "files settati";
	}else{
		echo "files non settati";
	}		
			
	if ($_SERVER['REQUEST_METHOD'] == "POST"){
		
		$uploads_dir = 'images/attivita';
        	
		if(utenteLoggato($mysqli) == true) {	
			
			echo "</br> RIEPILOGO ATTIVITA:";
			echo "</br>";
			echo " titolo: ". $_POST["titolo"]. "\n";
			echo "</br>";
			echo " localita: ". $_POST["localita"]. "\n";
			echo "</br>";
			echo " descrizione: ". $_POST['descrizione']. "\n";
			echo "</br>";			
			echo " categoria: ".$_POST["categoria"]. "\n";
			echo "</br>";
			echo " id utente: ". $_SESSION['user_id'] . "\n";
			echo "</br>";
			 			
			$titolo = $_POST["titolo"];	
			$localita = $_POST["localita"];				
			$descrizione = $_POST["descrizione"];
			$categoria = $_POST["categoria"];
			$idUtente = $_SESSION['user_id'];	
		 			
			if($_FILES["file"]["error"]>0){
				 die ("!!! ERRORE: errore caricamento file!!!! TORNA INDIETRO E RIPROVA.");	
				
			}else{		
			
				date_default_timezone_set('Europe/Rome');
				
				$tmp_name = $_FILES["file"]["tmp_name"];
				$name     = $_FILES["file"]["name"];
				$type     = $_FILES["file"]["type"];
				$size     = ($_FILES["file"]["size"] / 1024) ;
					
				/* echo "Upload: " . $_FILES["file"]["name"] . "<br />";
       			echo "Type: " . $_FILES["file"]["type"] . "<br />";
                echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
                echo "Stored in: " . $_FILES["file"]["tmp_name"];		
					 */	
					
				if(!isset($_FILES["file"]["name"])){
					die ("Immagine di copertina non caricata. Riprova con un'altra foto o contatta l'amministratore.");	
				}			
				
				$data_e_ora = date("Y-m-d_H-i-s",time());
				
				$name = $data_e_ora . $name ;
				
				// echo "<br>Copia file da temp:".$tmp_name." , alla dir: ".$uploads_dir."/".$name;
				$pathImgUploaded = resize(418,262,"".$uploads_dir."/".$name);
				
				if ( isset($pathImgUploaded) ){
				 
					//Devo salvare l evento nel DB:
					$urlFoto =  "http://www.youngportalnetwork.it/". $pathImgUploaded ;
				
					
					$sql = "INSERT INTO ATTIVITA (TITOLO, LOCALITA, DESCRIZIONE, CATEGORIA_ID, UTENTE_CREATORE, URL_FOTO ) VALUES 

												('".$titolo."','".$localita."','".$descrizione."','".$categoria."','".$idUtente."','".$urlFoto."')";
					
					if (!mysqli_query($mysqli,$sql)){
						die('</br></br>Error: ' . mysqli_error($mysqli));
					}

					
					
			
					$mysqli->close();	
					header("Location: http://www.youngportalnetwork.it/management_activities.php");
					die();
					
				}else{
					die ("</br></br>ERRORE: errore nel salvare la foto caricata.. prova a cambiare foto!! ");	
				}	
			}

		}else{
			echo "SI E VERIFICATO UN ERRORE: non sei loggato correttamente <a href=\"activities.php\" >torna indietro ed effettua il login</a>";	
			$mysqli->close();	
		}	
		
	}else{
		echo "SI E VERIFICATO UN ERRORE, <a href=\"activities.php\" >torna indietro e riprova</a>";	
		$mysqli->close();	
	}
		
		
	/**
	* Image resize
	* @param int $width
	* @param int $height
	* @param string $path
	*/
	function resize($width, $height, $path){
		/* Get original image x y*/
		list($w, $h) = getimagesize($_FILES['file']['tmp_name']);
		/* calculate new image size with ratio */
		$ratio = max($width/$w, $height/$h);
		$h = ceil($height / $ratio);
		$x = ($w - $width / $ratio) / 2;
		$w = ceil($width / $ratio);
		
		/* new file name */
		//$path = 'uploads/'.$width.'x'.$height.'_'.$_FILES['image']['name'];
  
		/* read binary data from image file */
		$imgString = file_get_contents($_FILES['file']['tmp_name']);
		/* create image from string */
		$image = imagecreatefromstring($imgString);
		$tmp = imagecreatetruecolor($width, $height);
		imagecopyresampled($tmp, $image,
							0, 0,
							$x, 0,
							$width, $height,
							$w, $h);
		/* Save image */
		switch ($_FILES['file']['type']) {
			case 'image/jpeg':
				imagejpeg($tmp, $path, 100);
				break;
			case 'image/png':
				imagepng($tmp, $path, 0);
				break;
			case 'image/gif':
				imagegif($tmp, $path);
				break;
			default:
				exit;
				break;
		}
		
		return $path;
		/* cleanup memory */
		imagedestroy($image);
		imagedestroy($tmp);
	}	

?>	 		