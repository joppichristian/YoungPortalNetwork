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

		$uploads_dir = 'images/aziende';

		if(utenteLoggato($mysqli) == true) {

			echo "</br> RIEPILOGO AZIENDA:";
			echo "</br>";
			echo " nome: ". $_POST["nome"]. "\n";
			echo "</br>";
			echo " orario_apertura: ". $_POST["orario_apertura"]. "\n";
			echo "</br>";
			echo " email: ". $_POST["email"]. "\n";
			echo "</br>";
			echo " telefono: ".$_POST["telefono"]. "\n";
			echo "</br>";
			echo " id utente: ". $_SESSION['user_id'] . "\n";
			echo "</br>";

			$nome = $_POST["nome"];
			$descrizione = $_POST["descrizione"];
			$residenza = $_POST["latitudine"];
      $longitudine = $_POST["longitudine"];
			$orario_apertura = $_POST["orario_apertura"];
      $email = $_POST["email"];
			$telefono = $_POST["telefono"];
      $prodotto1 = $_POST["prodotto1"];
      $prodotto2 = $_POST["prodotto2"];
      $prodotto3 = $_POST["prodotto3"];
      $categoria = $_POST['categoria'];
			$idUtente = $_SESSION['user_id'];

      include 'insert_product_companies.php';

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
				$pathImgUploaded = resize(500,500,"".$uploads_dir."/".$name);


				if ( isset($pathImgUploaded) ){

					//Devo salvare l evento nel DB:
					$urlFoto =  "http://www.youngportalnetwork.it/". $pathImgUploaded ;

					$sql = "INSERT INTO AZIENDA (nome, descrizione, localita, orario, telefono, email, url_foto , ID_cat, ID_utente) VALUES

												('".$nome."','".$descrizione."','".$latitudine."'-'".$longitudine."','".$orario_apertura."','".$telefono."','".$email."','".$urlFoto."','"..$categoria."','".$idUtente."')";

					if (!mysqli_query($mysqli,$sql)){
						die('</br></br>Error: ' . mysqli_error($mysqli));
					}


					$mysqli->close();
					header("Location: http://www.youngportalnetwork.it/companies.php");
					die();
				}else{
					die ("</br></br>ERRORE: errore nel salvare la foto caricata.. prova a cambiare foto!! ");
				}
			}

		}else{
			echo "SI E VERIFICATO UN ERRORE: non sei loggato correttamente <a href=\"curriculums.php\" >torna indietro ed effettua il login</a>";
			$mysqli->close();
		}

	}else{
		$mysqli->close();
		header("Location: http://www.youngportalnetwork.it/page-messaggio.php?ms=Si e' verificato un errore. Riprova!");
		die();
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
