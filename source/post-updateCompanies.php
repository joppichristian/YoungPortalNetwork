<?php
    include 'private/connessione-db.php';
	include 'private/utility-login.php';

	my_session_start();

	if(isset($_FILES)){
		//echo "files settati";
	}else{
		echo "files non settati";
	}


		$uploads_dir = 'images/aziende';

		if(utenteLoggato($mysqli) == true) {



			$nome = $_POST["nome"];
			$descrizione = $_POST["descrizione"];

      $latitudine = $_POST["latitudine"];
      $longitudine = $_POST["longitudine"];
			$orario_apertura = $_POST["orario_apertura"];
      $email = $_POST["email"];
			$telefono = $_POST["telefono"];
      $prodotto1 = $_POST["prodotto1"];
      $descrizione1 = $_POST["descrizione1"];
      $prodotto2 = $_POST["prodotto2"];
      $descrizione2 = $_POST["descrizione2"];
      $prodotto3 = $_POST["prodotto3"];
      $descrizione3 = $_POST["descrizione3"];
      $categoria = $_POST['categoria'];
			$idUtente = $_SESSION['user_id'];

			include 'update_product_companies.php';

				date_default_timezone_set('Europe/Rome');

				$tmp_name = $_FILES["file"]["tmp_name"];
				$name     = $_FILES["file"]["name"];
				$type     = $_FILES["file"]["type"];
				$size     = ($_FILES["file"]["size"] / 1024) ;


     			if ($size == 0 ){
     				//echo "FILE NON SETTATO";
     			}else{
     				//echo "FILE SETTATO";
     				$fileSettato = 1;
     			}


				if(!isset($_FILES["file"]["name"])){
					die ("Immagine di copertina non caricata. Riprova con un'altra foto o contatta l'amministratore.");
				}

				$data_e_ora = date("Y-m-d_H-i-s",time());

				$name = $data_e_ora . $name ;

				// echo "<br>Copia file da temp:".$tmp_name." , alla dir: ".$uploads_dir."/".$name;




        if($fileSettato == 1){
						$pathImgUploaded = resize(500,500,"".$uploads_dir."/".$name);

            $sqlUpdate = "UPDATE AZIENDA SET nome = '".$nome."' ,
                            descrizione = '".$descrizione. "' ,
                            latitudine = '".$latitudine. "' ,
                            longitudine = '".$longitudine. "' ,
                            orario = '".$orario_apertura. "' ,
                            telefono = '".$telefono. "' ,
                            email = '".$email. "' ,
                            url_foto = '".$urlFoto. "' ,
                            ID_cat = '".$categoria. "' ,
                            ID_utente = '".$idUtente. "'
														WHERE ID = '".$_POST['id']."' ;" ;
        }else{
          $sqlUpdate = "UPDATE AZIENDA SET nome = '".$nome."' ,
                          descrizione = '".$descrizione. "' ,
                          latitudine = '".$latitudine. "' ,
                          longitudine = '".$longitudine. "' ,
                          orario = '".$orario_apertura. "' ,
                          telefono = '".$telefono. "' ,
                          email = '".$email. "' ,
                          ID_cat = '".$categoria. "' ,
                          ID_utente = '".$idUtente. "'
													WHERE ID = '".$_POST['id']."' ;" ;
        }

        //echo $sqlUpdate ;

        if (!mysqli_query($mysqli,$sqlUpdate)){
          die('</br></br>Error fuori: ' . mysqli_error($mysqli));
					//die('</br></br>Errore. Scrivi a info@youngportalnetworl.it');
        }

        $messaggio .= "</br></br>HAI MODIFICATO LA TUA AZIENDA; CON SUCCESSO</br></br>";

      }else{
        $messaggio = "DEVI PRIMA COMPILARE IL FORM PER INSERIRE I DATI DELLA AZIENDA.";
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



<html>
<head>
  <title>YPN | Azienda</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--        CSS       -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/css_form/form_green.css" rel="stylesheet">
  <link href="css/css_attivita/attivita.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css" >
  <link rel="stylesheet" href="css/font-awesome.min.css" >
  <link rel="stylesheet" href="css/pace.css" >
  <link rel="stylesheet" href="css/css_login/reset.css"> <!-- CSS reset -->
  <link rel="stylesheet" href="css/css_login/style.css"> <!-- Gem style -->
  <!--              -->


  <!-- JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/pace.js"></script>
  <!-- -->
</head>
<body>
  <header role="banner" style="background-color:black;">
    <div class="logo" style="float:left;"  >
      <font style="color:rgb(50,72,31);">V A L L E  </font><font style="color:rgb(23,148,201);">D I   </font><font style="color:rgb(149,59,69);">C E M B R A</font>
    </div>
    <nav class="main-nav" >
      <div style="margin-top:10px;"><a href="index.php"><i class="fa fa-home  fa-3x"></i></a></div>
    </nav>
  </header>

  <div >
    <div class="col-md-12 images nopadding" >
    </div>
  </div>

  <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" style="width:100%; background-color:white; height:100$;" align="center">
    <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-12" style="background-color:white;"></div>
    <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12" style="background-color:#C8C8C8 ; min-height:100px; border-radius: 25px;">
      <div style="margin:15px; "><p style="color:black!important;"><a ><?php echo $messaggio; ?> </a></p>


         <div href="management_companies.php" style="border-radius: 25px; padding:15px; background-color:rgb(0,147,202); position:absolute; right:15px; bottom:15px; cursor: pointer; " >
			<p style="color:white;"> <a href="management_companies.php" > Continua.. </a></p>
		 </div>
      </div>



    </div>
   <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-12" style="background-color:white;"></div>
  </div>

  <div class="contributors col-md-12 col-lg-12 col-sm-12 col-xs-12" style="text-align:center;">
      <a href="http://www.comunita.valledicembra.tn.it">
        <img src="images/loghi/cvc.jpg" style="width:100px;height:100px;margin:3%;"  />
      </a>
      <a href="http://www.politichegiovanili.provincia.tn.it">
        <img src="images/loghi/pg.jpg"  style="width:170px;height:150px;margin:3%;" />
      </a>
      <a href="http://www.comune.albiano.tn.it">
        <img src="images/loghi/alb.png"  style="width:100px;height:100px;margin:3%;" />
      </a>
      <a href="http://www.bimtrento.it">
        <img src="images/loghi/bim.jpg"  style="width:100px;height:100px;margin:3%;" />
      </a>
      <a href="http://www.provincia.tn.it">
        <img src="images/loghi/pat.jpg" style="width:250px;height:150px;margin:3%;"/>
      </a>
  </div>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="js/js_login/main.js"></script> <!-- Gem jQuery -->
</body>
</html>
