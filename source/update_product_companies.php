<?php

                      date_default_timezone_set('Europe/Rome');


                      $valid_formats = array("jpg", "png", "gif", "zip", "bmp","JPG");
                      $max_file_size = 0; //100 kb
                      $path = 'images/aziende/';// Upload directory
                      $count = 1;

                      $data_e_ora = date("Y-m-d_H-i-s",time());
                			$nameFile = $data_e_ora . $name ;

                			//DEVO CAPIRE SE CE IL FILE O MENO !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                			$fileSettato1 = 0;
                      $fileSettato2 = 0;
                      $fileSettato3 = 0;



                      $tmp_nameP1 = $_FILES["fileP1"]["tmp_name"];
              				$nameP1     = $_FILES["fileP1"]["name"];
              				$typeP1     = $_FILES["fileP1"]["type"];
              				$sizeP1     = ($_FILES["fileP1"]["size"] / 1024) ;

                      $tmp_nameP2 = $_FILES["fileP2"]["tmp_name"];
              				$nameP2     = $_FILES["fileP2"]["name"];
              				$typeP2     = $_FILES["fileP2"]["type"];
              				$sizeP2     = ($_FILES["fileP2"]["size"] / 1024) ;

                      $tmp_nameP3 = $_FILES["fileP3"]["tmp_name"];
              				$nameP3     = $_FILES["fileP3"]["name"];
              				$typeP3     = $_FILES["fileP3"]["type"];
              				$sizeP3     = ($_FILES["fileP3"]["size"] / 1024) ;



                      if ($sizeP1 == 0 ){
                				//echo "FILE NON SETTATO";
                			}else{
                				//echo "FILE SETTATO";
                				$fileSettato1 = 1;
                			}

                      if ($sizeP2 == 0 ){
                				//echo "FILE NON SETTATO";
                			}else{
                				//echo "FILE SETTATO";
                				$fileSettato2 = 1;
                			}

                      if ($sizeP3 == 0 ){
                				//echo "FILE NON SETTATO";
                			}else{
                				//echo "FILE SETTATO";
                				$fileSettato3 = 1;
                			}

                			$pathImgUploaded = "";
                			$sqlUpdate = "";

                      $n_prodotto=1;

                			if($fileSettato1 == 1){
                        $data_e_ora = date("Y-m-d_H-i-s",time());
                        $name = $data_e_ora."_Prodotto1_".$nameP1;
                        $ima= "'".$path.$name."'";

                        $pathImgUploadedThumb = resizeP(500, 500,$tmp_nameP1,$typeP1, $path.$name); //resize(800,400,$path.$name);


                        $urlFotoP =  "http://www.youngportalnetwork.it/images/aziende/".$name ;

                				$sqlP1 = "UPDATE PRODOTTI_AZIENDA SET url_foto = '".$urlFotoP."' ,
                                        titolo = '".$prodotto1. "' ,
                                        descrizione = '".$descrizione1. "'

                                        WHERE ID_utente = '".$idUtente."' AND n_prodotto= '".$n_prodotto."' ;" ;
                			}else{
                				$sqlP1 = "UPDATE PRODOTTI_AZIENDA SET titolo = '".$prodotto1. "' ,
                                        descrizione = '".$descrizione1. "'
                                        WHERE ID_utente = '".$idUtente."' AND n_prodotto= '".$n_prodotto."' ;" ;
                			}
                      if (!mysqli_query($mysqli,$sqlP1)){
                          die('</br></br>Error111: ' . mysqli_error($mysqli));
                        //die('</br></br>Errore. Scrivi a 11111info@youngportalnetworldcsdcdscsdcs.it');
                      }

                      $n_prodotto=2;

                      if($fileSettato2 == 1){

                        $data_e_ora = date("Y-m-d_H-i-s",time());
                        $name = $data_e_ora."_Prodotto2_".$nameP2;
                        $ima= "'".$path.$name."'";

                        $pathImgUploadedThumb = resizeP(500, 500,$tmp_nameP2,$typeP2, $path.$name); //resize(800,400,$path.$name);



                        $urlFotoP =  "http://www.youngportalnetwork.it/images/aziende/".$name ;

                        $sqlP2 = "UPDATE PRODOTTI_AZIENDA SET url_foto = '".$urlFotoP."' ,
                                        titolo = '".$prodotto2. "' ,
                                        descrizione = '".$descrizione2. "'

                                        WHERE ID_utente = '".$idUtente."' AND n_prodotto= '".$n_prodotto."' ;" ;
                      }else{

                        $sqlP2 = "UPDATE PRODOTTI_AZIENDA SET titolo = '".$prodotto2. "' ,
                                        descrizione = '".$descrizione2. "'

                                        WHERE ID_utente = '".$idUtente."' AND n_prodotto= '".$n_prodotto."' ;" ;
                      }
                    //  echo "".$sqlP2."   ". $prodotto2."  ".$descrizione2."---";
                      if (!mysqli_query($mysqli,$sqlP2)){
                        die('</br></br>Error222: ' . mysqli_error($mysqli));
                      }

                      $n_prodotto=3;

                      if($fileSettato3 == 1){

                        $data_e_ora = date("Y-m-d_H-i-s",time());
                        $name = $data_e_ora."_Prodotto3_".$nameP3;
                        $ima= "'".$path.$name."'";

                        $pathImgUploadedThumb = resizeP(500, 500,$tmp_nameP3,$typeP3, $path.$name); //resize(800,400,$path.$name);



                        $urlFotoP =  "http://www.youngportalnetwork.it/images/aziende/".$name ;

                        $sqlP3 = "UPDATE PRODOTTI_AZIENDA SET url_foto = '".$urlFotoP."' ,
                                        titolo = '".$prodotto3. "' ,
                                        descrizione = '".$descrizione3. "'

                                        WHERE ID_utente = '".$idUtente."' AND n_prodotto= '".$n_prodotto."' ;" ;
                      }else{
                        $sqlP3 = "UPDATE PRODOTTI_AZIENDA SET titolo = '".$prodotto3. "' ,
                                        descrizione = '".$descrizione3. "'

                                        WHERE ID_utente = '".$idUtente."' AND n_prodotto= '".$n_prodotto."' ;" ;
                      }

                		//	echo $sqlUpdate ;

                			if (!mysqli_query($mysqli,$sqlP3)){
                				die('</br></br>Error333: ' . mysqli_error($mysqli));
                			}



                      //echo "Fino a qui";



                      /*

                      $text_get_foto;

                      for ($i=0; $i<$numero_foto; $i++)
                      {
                          $numero_f=$i+1;
                          $text_get_foto= $text_get_foto."f".$numero_f."=".$array_nome_foto[$i]."&";
                      }
/*
                      if($id_ann!=0){
                          echo "<script>window.location = 'caricamento_foto.php?ann=".$id_ann."&".$text_get_foto."'</script>";
                      }
*/

                      /*
                      $message="COMPLIMENTI, hai aggiunto un annuncio!";
                      echo "<script type='text/javascript'>alert('$message');</script>";
                      echo "<script>window.location = '../index.html'</script>";
                      */
                      // liberazione delle risorse occupate dal risultato
                      //$result->close();

      /**
          * Image resize
          * @param int $width
          * @param int $height
          * @param string $path
          */
          function resizeP($width, $height,$img_rid,$img_ty, $path){
              /* Get original image x y*/
              $file_temp = $img_rid;
              list($w, $h) = getimagesize($file_temp);
              /* calculate new image size with ratio */
              $ratio = max($width/$w, $height/$h);
              $h = ceil($height / $ratio);
              $x = ($w - $width / $ratio) / 2;
              $w = ceil($width / $ratio);

              /* new file name */
              //$path = 'uploads/'.$width.'x'.$height.'_'.$_FILES['image']['name'];

              /* read binary data from image file */
              $imgString = file_get_contents($img_rid);
              /* create image from string */
              $image = imagecreatefromstring($imgString);
              $tmp = imagecreatetruecolor($width, $height);
              imagecopyresampled($tmp, $image,
                                  0, 0,
                                  $x, 0,
                                  $width, $height,
                                  $w, $h);
              /* Save image */
              switch ($img_ty) {
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
