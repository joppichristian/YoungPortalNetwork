<?php
	include 'private/connessione-db.php';
	include 'private/utility-login.php';
	
	my_session_start();
	
	if(isset($_FILES)){
		//echo "files settati";
	}else{
		//echo "files non settati";
	}
	 	
	$id_evento = $_POST["id"];
	if(!isset($id_evento)){
		die("ce qualche errore ( non trovo l evento; ), <a href=\"management_events.php\" >Torna a gestione eventi</a>");
	}
	//echo "id attivita: ".$id_evento . "</br>";
	if ($_SERVER['REQUEST_METHOD'] == "POST"){
		
		$uploads_dir = 'images/media-eventi';
		 
		if($_FILES["file"]["error"]>0){
			 die ("!!! ERRORE: errore caricamento file!!!! TORNA INDIETRO E RIPROVA.");	
			
		}else{
			date_default_timezone_set('Europe/Rome');
			
			$files = array();
			$fdata = $_FILES["files"];
			if (is_array($fdata["name"])) {
					for ($i = 0; $i < count($fdata['name']); ++$i) {
							$files[] = array(
								'name' => $fdata['name'][$i],
								'tmp_name' => $fdata['tmp_name'][$i],
								'type' =>  $fdata['type'][$i],
								'size' =>  $fdata['size'][$i]								
							);
					}
			} else {
					$files[] = $fdata;
			}
			
			foreach ($files as $file) {
					// uploaded location of file is $file['tmp_name']
					// original filename of file is $file['file']
					$tmp_name = $file["tmp_name"];
					$name     = $file["name"];
					$nameOriginal  = $name;
					$type     = $file["type"];
					$size     = ($file["size"] / 1024) ;
					
					$data_e_ora = date("Y-m-d_H-i-s",time());			
					$name = $data_e_ora . $name ;
					
					//echo "<br>Copia file da temp:".$tmp_name." , alla dir: ".$uploads_dir."/".$name;
					$pathImgUploadedThumb = resize(100,100,"".$uploads_dir."/thumb-".$name, $tmp_name, $type);
					
					if ( isset($pathImgUploadedThumb) ){
					
						//echo "</br>Devo salvare la foto nel DB:";
						$urlFotoThumb =  "http://www.youngportalnetwork.it/". $pathImgUploadedThumb ;
						
						$pathImgUploaded = resize(900,596,"".$uploads_dir."/".$name, $tmp_name, $type);
						
						if ( isset($pathImgUploaded) ){
							//echo "</br>Devo salvare la foto completa nel DB!!!!!!!!!!!!!!!!!!!!!";
							$urlFoto = "http://www.youngportalnetwork.it/". $pathImgUploaded ;
						
							$sql =	"INSERT INTO MEDIA_EVENTI (NOME, URL, URL_THUMB, EVENTO_ID, TIPO) "  .
								"VALUES
								('".$id_evento."','".$urlFoto."','". $urlFotoThumb ."','".$id_evento."' , 'FOTO')";
				
							//echo $sql ;
			
							if (!mysqli_query($mysqli,$sql)){
								die('</br></br>Error: ' . mysqli_error($mysqli));
							}

													
						}else{
							die ("</br></br>ERRORE: errore nel salvare la foto ".$nameOriginal .". prova a cambiare foto e riprova! ");	
						}			
						
					}else{
						die ("</br></br>ERRORE: errore nel salvare la thumb della foto ".$nameOriginal .". prova a cambiare foto!! ");	
					}			
					
									
			}
			
			//TUTTO E' ANDATO BENE, TORNA ALL ATTIVITA'.
			header("Location: http://www.youngportalnetwork.it/add-foto-event.php?id=$id_evento");
			die();			
			 		
		}

		
	}else{
		echo "DEVI PRIMA COMPILARE IL FORM PER INSERIRE I DATI DELLA FOTO.";	
		die();		
	}
		
	 
	 
	/**
	* Image resize
	* @param int $width
	* @param int $height
	* @param string $path
	*/
	function resize($width, $height, $path, $tmp_name, $type){
		
		echo "-- resize: ". $path ." , ". $tmp_name ." , ". $type." END PARAM. </br> ";
		/* Get original image x y*/
		list($w, $h) = getimagesize($tmp_name);
		/* calculate new image size with ratio */
		$ratio = max($width/$w, $height/$h);
		$h = ceil($height / $ratio);
		$x = ($w - $width / $ratio) / 2;
		$w = ceil($width / $ratio);
		
		/* new file name */
		//$path = 'uploads/'.$width.'x'.$height.'_'.$_FILES['image']['name'];
  
		/* read binary data from image file */
		$imgString = file_get_contents($tmp_name);
		/* create image from string */
		$image = imagecreatefromstring($imgString);
		$tmp = imagecreatetruecolor($width, $height);
		imagecopyresampled($tmp, $image,
							0, 0,
							$x, 0,
							$width, $height,
							$w, $h);
		/* Save image */
		switch ($type) {
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