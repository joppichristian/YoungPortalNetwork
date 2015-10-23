<html>
  <?php
  include 'private/connessione-db.php';
  include 'private/utility-login.php';

  my_session_start();

  $linkIndietro = "activities.php";
  $testoIndietro = "TORNA INDIETRO";

  ?>
  <head>
    <title>YPN | Attivita</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--        CSS       -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/css_form/form_green.css" rel="stylesheet">
    <link href="css/css_attivita/attivita.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css" >
    <link rel="stylesheet" href="css/pace.css" >
    <link rel="stylesheet" href="css/css_login/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="css/css_login/style.css"> <!-- Gem style -->
    <!--              -->


    <style media="screen">

    .textcv{
      text-align:right;
      font-size: 300%;
      margin-top: 0.3%
      margin-bottom:0.3%;
    }

    .textcv_ele{
      text-align:left;
      font-size: 150%;
      margin-top: 1%;
      margin-bottom:1%;
    }

    .titolocv{
      background-color:rgb(50,72,31);
      color:white;
      text-align:left;
      font-size: 200%;
    }

    </style>

    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
     <script src="js/pace.js"></script>
    <!-- -->
	<script>
		function apriPopupCondivisioneFB() {
			newin = window.open('http://www.facebook.com/share.php?u='+window.location.href,'titolo','scrollbars=no,resizable=yes, width=400,height=400,status=no,location=no,toolbar=no');
		}
	</script>

  </head>
  <body>
    <header role="banner" style="background-color:black;">
      <?php
      include("header.php");
    ?>
    </header>

	 <div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
	<?php
      include("login.php");
    ?>
  </div> <!-- cd-user-modal -->

  	<?php

	$id_cv = $_GET["id"];

	if(!isset($id_cv)){
		die("Errore, il link non è corretto. Torna indietro e riprova.");
	}

  $url_foto = "";
  $nome = "";
  $cognome = "" ;
  $data = "";
  $residenza = "";
  $telefono = "";
  $email = "";
  $istruzione1 = "";
  $istruzione2 = "";
  $esperienza1 = "";
  $esperienza2 = "";
  $esperienza3 = "";
  $esperienza4 = "";
  $competenza1 = "";
  $competenza2 = "";
  $competenza3 = "";
  $interessi1 = "";
  $interessi2 = "";

	$qry_a="SELECT * FROM CURRICULUM WHERE ID='$id_cv' ;";
	$result_a = $mysqli->query($qry_a);
	while($row_a = $result_a->fetch_array())
	{
    $url_foto = $row_a['url_foto'];
    $nome = $row_a['nome'];
    $cognome = $row_a['cognome'];
    $data = $row_a['data_nascita'];
    $residenza = $row_a['residenza'];
    $telefono = $row_a['telefono'];
    $email = $row_a['email'];
    $istruzione1 = $row_a['istruzione1'];
    $istruzione2 = $row_a['istruzione2'];
    $esperienza1 = $row_a['esperienza1'];
    $esperienza2 = $row_a['esperienza2'];
    $esperienza3 = $row_a['esperienza3'];
    $esperienza4 = $row_a['esperienza4'];
    $competenza1 = $row_a['competenza1'];
    $competenza2 = $row_a['competenza2'];
    $competenza3 = $row_a['competenza3'];
    $interessi1 = $row_a['interessi1'];
    $interessi2 = $row_a['interessi2'];

	}

	$title=urlencode($nome);

	$url=urlencode('http://www.youngportalnetwork.it/curriculums.php?id='.$id_cv);

	$summary=urlencode($residenza);

	$image=urlencode($url_foto);


	?>

    <div class="subheader col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" style="height:100px">

            <a>Curriculum di <?php echo $nome;  echo " ".$cognome;?></a>

      </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="width:100%; paddign:3%;">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border: 2px solid #cfd9db; border-radius: .25em; margin-bottom:3%;">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" align="left" style=" margin-top:1%; margin-bottom:1%; ">
        <img src="<?php echo $url_foto; ?>" id="anteprima" />
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" align="right">

        <div class="textcv col-lg-12 col-md-12 col-sm-12 col-xs-12" id="title">
          <?php echo $nome; echo " ".$cognome; ?>
        </div>
        <div class="textcv col-lg-12 col-md-12 col-sm-12 col-xs-12" id="title">
          <?php echo "Nato il ".$data; ?>
        </div>
        <div class="textcv col-lg-12 col-md-12 col-sm-12 col-xs-12" id="title">
          <?php echo "Telefono: ".$telefono; ?>
        </div>
        <div class="textcv col-lg-12 col-md-12 col-sm-12 col-xs-12" id="title">
          <?php echo "Posta elettronica: ".$telefono; ?>
        </div>

      </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0; border: 2px solid #cfd9db; border-radius: .25em; margin-bottom:3%;">

        <div class="titolocv col-lg-12 col-md-12 col-sm-12 col-xs-12" align="left" >
              <a>Istruzione</a>
        </div>
        <div class="textcv_ele col-lg-12 col-md-12 col-sm-12 col-xs-12" id="title" >
          <?php
          if($istruzione1!=""){
                echo "* ".$istruzione1;
          }
         ?>
        </div>
        <div class="textcv_ele col-lg-12 col-md-12 col-sm-12 col-xs-12" id="title">
          <?php
          if($istruzione2!=""){
                echo "* ".$istruzione2;
          }
         ?>
        </div>

    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0; border: 2px solid #cfd9db; border-radius: .25em; margin-bottom:3%;">

        <div class="titolocv col-lg-12 col-md-12 col-sm-12 col-xs-12" align="left" >
              <a>Esperienze</a>
        </div>
        <div class="textcv_ele col-lg-12 col-md-12 col-sm-12 col-xs-12" id="title" >
          <?php
          if($esperienza1!=""){
                echo "* ".$esperienza1;
          }
         ?>
        </div>
        <div class="textcv_ele col-lg-12 col-md-12 col-sm-12 col-xs-12" id="title">
          <?php
          if($esperienza2!=""){
                echo "* ".$esperienza2;
          }
         ?>
        </div>
        <div class="textcv_ele col-lg-12 col-md-12 col-sm-12 col-xs-12" id="title">
          <?php
          if($esperienza3!=""){
                echo "* ".$esperienza3;
          }
         ?>
        </div>
        <div class="textcv_ele col-lg-12 col-md-12 col-sm-12 col-xs-12" id="title">
          <?php
          if($esperienza4!=""){
                echo "* ".$esperienza4;
          }
         ?>
        </div>

    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0; border: 2px solid #cfd9db; border-radius: .25em; margin-bottom:3%;">

        <div class="titolocv col-lg-12 col-md-12 col-sm-12 col-xs-12" align="left" >
              <a>Competenze</a>
        </div>
        <div class="textcv_ele col-lg-12 col-md-12 col-sm-12 col-xs-12" id="title" >
          <?php
          if($competenza1!=""){
                echo "* ".$competenza1;
          }
         ?>
        </div>
        <div class="textcv_ele col-lg-12 col-md-12 col-sm-12 col-xs-12" id="title">
          <?php
          if($competenza2!=""){
                echo "* ".$competenza2;
          }
         ?>
        </div>
        <div class="textcv_ele col-lg-12 col-md-12 col-sm-12 col-xs-12" id="title">
          <?php
          if($competenza3!=""){
                echo "* ".$competenza3;
          }
         ?>
        </div>

    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0; border: 2px solid #cfd9db; border-radius: .25em; margin-bottom:3%;">

        <div class="titolocv col-lg-12 col-md-12 col-sm-12 col-xs-12" align="left" >
              <a>Interessi</a>
        </div>
        <div class="textcv_ele col-lg-12 col-md-12 col-sm-12 col-xs-12" id="title" >
          <?php
          if($interessi1!=""){
                echo "* ".$interessi1;
          }
         ?>
        </div>
        <div class="textcv_ele col-lg-12 col-md-12 col-sm-12 col-xs-12" id="title">
          <?php
          if($interessi2!=""){
                echo "* ".$interessi2;
          }
         ?>
        </div>


    </div>

      <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom:3%;">
          <a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;p[images][0]=<?php echo $image;?>','sharer','toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)"><img src="images/fb.svg" alt="Condividi" style="width:15%;height:15%;"/></a>
      </div>-->

  </div>

   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <script src="js/js_login/main.js"></script> <!-- Gem jQuery -->
  </body>
</html>
