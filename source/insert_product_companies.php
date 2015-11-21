<?php

                      date_default_timezone_set('Europe/Rome');


                      $valid_formats = array("jpg", "png", "gif", "zip", "bmp","JPG");
                      $max_file_size = 0; //100 kb
                      $path = 'images/aziende/';// Upload directory
                      $count = 1;

                      //if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
                      // Loop $_FILES to exeicute all files
                      foreach ($_FILES['fileP']['name'] as $f => $name) {
                          if ($_FILES['fileP']['error'][$f] == 4) {
                              continue; // Skip file if any error found
                          }
                          if ($_FILES['fileP']['error'][$f] == 0) {
                              if ($_FILES['fileP']['size'][$f] = $max_file_size) {
                                  $message[] = "$name is too large!.";
                                  continue; // Skip large file
                              }
                              elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
                                  $message[] = "$name is not a valid format";
                                  continue; // Skip invalid file formats
                              }
                              else{ // No error found! Move uploaded file
                                  $data_e_ora = date("Y-m-d_H-i-s",time());
                                  $name = $data_e_ora."_Prodotto".$count."_".$name;
                                  $ima= "'".$path.$name."'";
                                  //echo "Prima della riduzione---".$name;
                                  $pathImgUploadedThumb = resizeP(500, 500, $_FILES["fileP"]["tmp_name"][$f],$_FILES["fileP"]["type"][$f], $path.$name); //resize(800,400,$path.$name);
                                  //echo "    Dopo riduzione e caricamento";
                                  //if(move_uploaded_file($_FILES["file"]["tmp_name"][$f], $path.$name))
                                  //$count++; // Number of successfully uploaded file

                                  if((${'prodotto'.$count}!="")&&(${'descrizione'.$count}!="")){
                                    $urlFotoP =  "http://www.youngportalnetwork.it/images/aziende/".$name ;
                                    $sqlP = "INSERT INTO PRODOTTI_AZIENDA (url_foto, titolo, descrizione, n_prodotto, id_utente) VALUES
                                        ('".$urlFotoP."','".${'prodotto'.$count}."','".${'descrizione'.$count}."','".$count."','".$idUtente."')";
                                              //  echo "SQL E?  ".$sql;
                        					  if (!mysqli_query($mysqli,$sqlP)){
                        						        die('</br></br>Error: ' . mysqli_error($mysqli));
                        					  }
                                  }
                                  $count= $count+1;
                              }
                          }
                          $array_nome_foto[]= $name;
                          //echo "nome file? ".$name;
                      }


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
