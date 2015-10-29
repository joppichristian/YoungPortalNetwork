<?php

      if($_FILES["file1"]["error"]>0){
				// die ("!!! ERRORE: errore caricamento file prodotto (Campo 1)!!!! TORNA INDIETRO E RIPROVA.");

			}
      if($_FILES["file2"]["error"]>0){
				 //die ("!!! ERRORE: errore caricamento file prodotto (Campo 2)!!!! TORNA INDIETRO E RIPROVA.");

			}
      if($_FILES["file3"]["error"]>0){
				 //die ("!!! ERRORE: errore caricamento file prodotto (Campo 3)!!!! TORNA INDIETRO E RIPROVA.");

			}


				date_default_timezone_set('Europe/Rome');

        $tmp_name1 = $_FILES["file1"]["tmp_name"];
        $name1     = $_FILES["file1"]["name"];
        $type1     = $_FILES["file1"]["type"];
        $size1     = ($_FILES["file1"]["size"] / 1024) ;


        $tmp_name2 = $_FILES["file2"]["tmp_name"];
        $name2     = $_FILES["file2"]["name"];
        $type2     = $_FILES["file2"]["type"];
        $size2     = ($_FILES["file2"]["size"] / 1024) ;


        $tmp_name3 = $_FILES["file3"]["tmp_name"];
        $name3     = $_FILES["file3"]["name"];
        $type3     = $_FILES["file3"]["type"];
        $size3     = ($_FILES["file3"]["size"] / 1024) ;

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

        $img_prodotto1= 0;
        $img_prodotto2= 0;
        $img_prodotto3= 0;

        if(isset($_FILES["file1"]["name"])){
					$img_prodotto1= 1;
          $name1= $name."_Prodotto1";
        //  $pathImgUploaded1 = resize(500,500,"".$uploads_dir."/".$name1);
				}
        if(isset($_FILES["file2"]["name"])){
					$img_prodotto2= 1;
          $name2= $name."_Prodotto2";
          //$pathImgUploaded2 = resize(500,500,"".$uploads_dir."/".$name2);
        }
        if(isset($_FILES["file2"]["name"])){
					$img_prodotto3= 1;
          $name3= $name."_Prodotto3";
          //$pathImgUploaded3 = resize(500,500,"".$uploads_dir."/".$name3);
				}

				if ( isset($pathImgUploaded) ){

					//Devo salvare l evento nel DB:
					/*$urlFoto =  "http://www.youngportalnetwork.it/". $pathImgUploaded ;

					$sql = "INSERT INTO CURRICULUM (url_foto, nome, cognome, data_nascita, residenza, telefono, email, istruzione1, istruzione2, esperienza1, esperienza2, esperienza3, esperienza4, competenza1, competenza2, competenza3, interessi1, interessi2,ID_cat,ID_utente) VALUES

												('".$urlFoto."','".$nome."','".$cognome."','".$data."','".$residenza."','".$telefono."','".$email."','".$istruzione1."','".$istruzione2."','".$esperienza1."','".$esperienza2."','".$esperienza3."','".$esperienza4."','".$competenza1."','".$competenza2."','".$competenza3."','".$interessi1."','".$interessi2."','".$categoria."','".$idUtente."')";

					if (!mysqli_query($mysqli,$sql)){
						die('</br></br>Error: ' . mysqli_error($mysqli));
					}"
          */


					//$mysqli->close();
					//header("Location: http://www.youngportalnetwork.it/curriculums.php");
					//die();
				}else{
					die ("</br></br>ERRORE: errore nel salvare la foto caricata.. prova a cambiare foto!! ");
				}




?>
