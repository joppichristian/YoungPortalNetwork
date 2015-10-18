<?php
	include 'private/connessione-db.php';
	include 'private/utility-login.php';
	
	my_session_start();
	
	if(utenteLoggato($mysqli) == true ) {
		
		$idUtente = $_SESSION['user_id'];
	      	
		if ($_SERVER['REQUEST_METHOD'] == "POST"){
		
			if(!isset($_POST['id'])){
				die("Qualcosa è andato storto...");
			}
			
			$titolo = $_POST["titolo"];
			$localita = $_POST["localita"];
			$descrizione = $_POST["descrizione"];
			$catId = $_POST["categoria"];
			$utenteCreatore = $_POST["utenteCreatore"];
			
		
			echo "</br> RIEPILOGO ACTIVITY:";
			echo "</br>";
			echo " titolo: ". $titolo. "\n";
			echo "</br>";
			echo " localita: ". $localita. "\n";
			echo "</br>";
			echo " descrizione: ". $descrizione. "\n";
			echo "</br>";
			echo " catId: ". $catId. "\n";
			echo "</br>";
			echo " utenteCreatore: ". $utenteCreatore. "\n";
			echo "</br>";
			echo "</br>";
			
			if($idUtente != $utenteCreatore){
				die("Non hai i permessi per modificate questa attivita.");
			}	
			
			
			date_default_timezone_set('Europe/Rome');			
			$uploads_dir = 'img/cantieri';
			$data_e_ora = date("Y-m-d_H-i-s",time());
			$name     = $_FILES["file"]["name"];			
			$nameFile = $data_e_ora . $name ;
        	
			//DEVO CAPIRE SE CE IL FILE O MENO !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			$fileSettato = 0;			
			$size = ($_FILES["file"]["size"] / 1024) ;
			echo "size file = ".$size;
			echo "</br>";
			
			if ($size == 0 ){                
				echo "FILE NON SETTATO";
			}else{			
				echo "FILE SETTATO";
				$fileSettato = 1;	
			}	
			
			$pathImgUploaded = "";
			$sqlUpdate = "";
			
			if($fileSettato == 1){
				$pathImgUploaded = resize(418,262,"../".$uploads_dir."/cantiere-".$nameFile);
				$sqlUpdate = "UPDATE ATTIVITA SET TITOLO = '".$titolo."' ,
												  URL_FOTO = '".$pathImgUploaded. "' ,
												  LOCALITA = '".$localita. "' ,
                                                  DESCRIZIONE = '".$descrizione. "' ,
												  CATEGORIA_ID = '".$catId. "' 
												   
												  WHERE ID = '".$_POST['id']."' ;" ;
			}else{
				$sqlUpdate = "UPDATE ATTIVITA SET TITOLO = '".$titolo."' ,
												  LOCALITA = '".$localita. "' ,
                                                  DESCRIZIONE = '".$descrizione. "' ,
												  CATEGORIA_ID = '".$catId. "' 
												  
												  WHERE ID = '".$_POST['id']."' ;" ;
			}
			
			//echo $sqlUpdate ;
        
			if (!mysqli_query($mysqli,$sqlUpdate)){
				die('</br></br>Errore. Scrivi a info@cobble-fix.com . ');
			}

			echo "</br></br>HAI MODIFICATO 1 ATTIVIT&Agrave;!!</br></br>";
				
			echo "</br></br> COMPLIMENTI, hai modificato un attivit&agrave;! </br>";
			
			echo "<a href=\"management_activities.php\" > Controlla le tua attivit&agrave; </a>";		
			
					 		
			 
		}else{
			echo "DEVI PRIMA COMPILARE IL FORM PER INSERIRE I DATI DELLA ATTIVIT&Agrave.";			
		}
	}else{
		echo "DEVI EFFETTUARE IL LOGIN (SESSIONE SCADUTA).";			
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