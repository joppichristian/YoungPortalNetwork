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

	if(!isset($id_attivita)){
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
  $istruzione3 = "";
  $istruzione4 = "";
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
    $istruzione3 = $row_a['istruzione3'];
    $istruzione4 = $row_a['istruzione4'];
    $competenza1 = $row_a['competenza1'];
    $competenza2 = $row_a['competenza2'];
    $competenza3 = $row_a['competenza3'];
    $interessi1 = $row_a['interessi1'];
    $interessi2 = $row_a['interessi2'];

	}

	$title=urlencode($titolo);

	$url=urlencode('http://www.youngportalnetwork.it/curriculums.php?id='.$id_cv);

	$summary=urlencode($localita);

	$image=urlencode($url_foto);


	?>

    <div class="subheader col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" style="height:100px">

            <a>Curriculum di <?php echo $titolo; ?></a>

      </div>
    </div>

      <div class="main-info col-lg-7 col-md-7 col-sm-12 col-xs-12" style="margin-bottom:5%;">
        <div id="title" style="font-size: 400%;">
        <?php echo $nome; ?> </div>
        <div id="data">
         <?php echo  $data; ?></div>
          <div id="localita">
        <?php echo $residenza; ?></div>
        <div style="margin-top:5%;">

        </div>
      </div>



      <div class="main-info col-lg-5 col-md-5 col-sm-12 col-xs-12" style="float:left;" >
        <img src="<?php echo $url_foto; ?>" id="anteprima" />
        <div class="info-description col-lg-12 col-md-12 col-sm-12 col-xs-12" id="description" style="text-align:left; margin-top:5%;">
         <?php echo $istruzione1; ?>
		    </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:5%;">
            <a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;p[images][0]=<?php echo $image;?>','sharer','toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)"><img src="images/fb.svg" alt="Condividi" style="width:15%;height:15%;"/></a>
        </div>

      </div>



    </div>

   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <script src="js/js_login/main.js"></script> <!-- Gem jQuery -->
  </body>
</html>
