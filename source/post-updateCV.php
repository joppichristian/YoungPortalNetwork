<?php
	include 'private/connessione-db.php';
	include 'private/utility-login.php';

	my_session_start();

	$messaggio = "";

	if(utenteLoggato($mysqli) == true ) {

		$idUtente = $_SESSION['user_id'];

		if ($_SERVER['REQUEST_METHOD'] == "POST"){



			$nome = $_POST["nome"];
			$cognome = $_POST["cognome"];
			$residenza = $_POST["residenza"];
      $data = $_POST["data"];
			$telefono = $_POST["telefono"];
      $email = $_POST["email"];
			$istruzione1 = $_POST["istruzione1"];
      $istruzione2 = $_POST["istruzione2"];
      $istruzione3 = $_POST["istruzione3"];
      $esperienza1 = $_POST["esperienza1"];
      $esperienza2 = $_POST["esperienza2"];
      $esperienza3 = $_POST["esperienza3"];
      $esperienza4 = $_POST["esperienza4"];
      $competenza1 = $_POST["competenza1"];
      $competenza2 = $_POST["competenza2"];
      $competenza3 = $_POST["competenza3"];
      $interessi1 = $_POST["interessi1"];
      $interessi2 = $_POST["interessi2"];
      $categoria = $_POST['categoria'];
			$idUtente = $_SESSION['user_id'];



			$messaggio .= "</br> RIEPILOGO CURRICULUM:";
			$messaggio .= "</br>";
			$messaggio .= " nome: ". $_POST["nome"]. "\n";
			$messaggio .= "</br>";
			$messaggio .= " cognome: ". $_POST["cognome"]. "\n";
			$messaggio .= "</br>";
			$messaggio .= " data di nascita: ". $_POST['data']. "\n";
			$messaggio .= "</br>";
			$messaggio .= " residenza e indirizzo: ".$_POST["residenza"]. "\n";
			$messaggio .= "</br>";
			$messaggio .= " id utente: ". $_SESSION['user_id'] . "\n";
			$messaggio .= "</br>";


			/* echo " catId: ". $catId. "\n";
			echo "</br>";
			echo " utenteCreatore: ". $utenteCreatore. "\n";
			echo "</br>";
			echo "</br>"; */




			date_default_timezone_set('Europe/Rome');
			$uploads_dir = 'images/profilo_curriculum';
			$data_e_ora = date("Y-m-d_H-i-s",time());
			$name     = $_FILES["file"]["name"];
			$nameFile = $data_e_ora . $name ;

			//DEVO CAPIRE SE CE IL FILE O MENO !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			$fileSettato = 0;
			$size = ($_FILES["file"]["size"] / 1024) ;
			/* echo "size file = ".$size;
			echo "</br>"; */

			if ($size == 0 ){
				//echo "FILE NON SETTATO";
			}else{
				//echo "FILE SETTATO";
				$fileSettato = 1;
			}

			$pathImgUploaded = "";
			$sqlUpdate = "";



			if($fileSettato == 1){

				$pathImgUploaded = resize(500,500,"".$uploads_dir."/".$nameFile);
				$sqlUpdate = "UPDATE CURRICULUM SET url_foto = '".$pathImgUploaded. "' ,
												  nome = '".$nome. "' , cognome = '".$cognome. "' ,
												  data_nascita = '".$data. "'  ,
												  residenza = '".$residenza. "'  ,
												  telefono = '".$telefono. "'  ,
												  email = '".$email. "'  ,
												  istruzione1 = '".$istruzione1. "'  ,
												  istruzione2 = '".$istruzione2. "'  ,
												  esperienza1 = '".$esperienza1. "'  ,
												  esperienza2 = '".$esperienza2. "'  ,
												  esperienza3 = '".$esperienza3. "'  ,
												  esperienza4 = '".$esperienza4. "'  ,
												  competenza1 = '".$competenza1. "'  ,
                          competenza2 = '".$competenza2. "'  ,
                          competenza3 = '".$competenza3. "'  ,
                          interessi1 = '".$interessi1. "'  ,
												  interessi2 = '".$interessi2. "'

												  WHERE ID = '".$_GET['i']."' ;" ;
			}else{

				$sqlUpdate = "UPDATE CURRICULUM SET nome = '".$nome. "' , cognome = '".$cognome. "' ,
        data_nascita = '".$data. "'  ,
        residenza = '".$residenza. "'  ,
        telefono = '".$telefono. "'  ,
        email = '".$email. "'  ,
        istruzione1 = '".$istruzione1. "'  ,
        istruzione2 = '".$istruzione2. "'  ,
        esperienza1 = '".$esperienza1. "'  ,
        esperienza2 = '".$esperienza2. "'  ,
        esperienza3 = '".$esperienza3. "'  ,
        esperienza4 = '".$esperienza4. "'  ,
        competenza1 = '".$competenza1. "'  ,
        competenza2 = '".$competenza2. "'  ,
        competenza3 = '".$competenza3. "'  ,
        interessi1 = '".$interessi1. "'  ,
        interessi2 = '".$interessi2. "'

        WHERE ID = '".$_GET['i']."' ;" ;
			}


			if (!mysqli_query($mysqli,$sqlUpdate)){
				die('</br></br>Errore. Contatta il tecnico del sito . ');
			}

			$messaggio .= "</br></br>HAI MODIFICATO 1 ATTIVIT&Agrave; CON SUCCESSO</br></br>";

		}else{
			$messaggio = "DEVI PRIMA COMPILARE IL FORM PER INSERIRE I DATI DELLA ATTIVIT&Agrave.";
		}
	}else{
		$messaggio = "DEVI EFFETTUARE IL LOGIN (SESSIONE SCADUTA).";
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
  <title>YPN | CV</title>
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


         <div href="curriculums.php" style="border-radius: 25px; padding:15px; background-color:rgb(0,147,202); position:absolute; right:15px; bottom:15px; cursor: pointer; " >
			<p style="color:white;"> <a href="curriculums.php" > Continua.. </a></p>
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
