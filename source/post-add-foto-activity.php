<?php
	include 'private/connessione-db.php';
	include 'private/utility-login.php';
	
	my_session_start();
	
	if(isset($_FILES)){
		//echo "files settati";
	}else{
		//echo "files non settati";
	}
	 	
	$id_attivita = $_POST["id"];
	if(!isset($id_attivita)){
		die("ce qualche errore ( non trovo l attivit&agrave; ), <a href=\"management_activities.php\" >Torna a gestione attivita</a>");
	}
	//echo "id attivita: ".$id_attivita . "</br>";
	if ($_SERVER['REQUEST_METHOD'] == "POST"){
		
		$uploads_dir = 'images/media-attivita';
		 
		if($_FILES["file"]["error"]>0){
			 die ("!!! ERRORE: errore caricamento file!!!! TORNA INDIETRO E RIPROVA.");	
			
		}else{
			date_default_timezone_set('Europe/Rome');
			
			// echo "Upload: " . $_FILES["file"]["name"] . "<br />";
			// echo "Type: " . $_FILES["file"]["type"] . "<br />";
			// echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
			// echo "Stored in: " . $_FILES["file"]["tmp_name"];	
				
			$tmp_name = $_FILES["file"]["tmp_name"];
			$name     = $_FILES["file"]["name"];
			$type     = $_FILES["file"]["type"];
			$size     = ($_FILES["file"]["size"] / 1024) ;
				
			$data_e_ora = date("Y-m-d_H-i-s",time());
			
			$name = $data_e_ora . $name ;
			
			// echo "<br>Copia file da temp:".$tmp_name." , alla dir: ".$uploads_dir."/".$name;
			$pathImgUploadedThumb = resize(100,100,"".$uploads_dir."/thumb-".$name);
			
			if ( isset($pathImgUploadedThumb) ){
			
				//Devo salvare l evento nel DB:
				$urlFotoThumb =  "http://www.youngportalnetwork.it/". $pathImgUploadedThumb ;
				
				$pathImgUploaded = resize(900,596,"".$uploads_dir."/".$name);
				
				if ( isset($pathImgUploaded) ){
				
					$urlFoto = "http://www.youngportalnetwork.it/". $pathImgUploaded ;
				
					$sql =	"INSERT INTO MEDIA_ATTIVITA (NOME, URL, URL_THUMB, ATTIVITA_ID, TIPO) "  .
						"VALUES
						('".$id_attivita."','".$urlFoto."','". $urlFotoThumb ."','".$id_attivita."' , 'FOTO')";
		
					//echo $sql ;
	
					if (!mysqli_query($mysqli,$sql)){
						die('</br></br>Error: ' . mysqli_error($mysqli));
					}

					header("Location: http://www.youngportalnetwork.it/add-foto-activity.php?id=$id_attivita");
					die();						
				}else{
					die ("</br></br>ERRORE: errore nel salvare la foto caricata.. prova a cambiare foto!! ");	
				}			
				
			}else{
				die ("</br></br>ERRORE: errore nel salvare la foto thumb caricata.. prova a cambiare foto!! ");	
			}	
		}

		/*foreach ($_FILES["file"]["error"] as $key => $error) {
		
			if ($error == UPLOAD_ERR_OK){
				
				echo " UPLOAD_ERR_OK ";
				 
				$tmp_name = $_FILES["file"]["tmp_name"][$key];
				$name = $_FILES["file"]["name"][$key];
				echo "nameee:".$name;
				move_uploaded_file($tmp_name, "".$uploads_dir."/".$name);
			}else{
				echo " else ";
			}
		}*/
		
		
	}else{
		echo "DEVI PRIMA COMPILARE IL FORM PER INSERIRE I DATI DELLA FOTO.";			
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