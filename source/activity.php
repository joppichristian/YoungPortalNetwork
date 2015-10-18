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

	$id_attivita = $_GET["id"];

	if(!isset($id_attivita)){
		die("Errore, il link non è corretto. Torna indietro e riprova.");
	}

	$titolo = "";
	$localita = "";
	$descrizione = "";
	$categoria_id = "";
	$utente_creatore = "";
	$url_foto = "";
	$data_inserimento = "";

	$qry_a="SELECT * FROM ATTIVITA WHERE ID='$id_attivita' ;";
	$result_a = $mysqli->query($qry_a);
	while($row_a = $result_a->fetch_array())
	{
		$titolo = $row_a['TITOLO'];
		$localita = $row_a['LOCALITA'];
		$descrizione = $row_a['DESCRIZIONE'];
		$categoria_id = $row_a['CATEGORIA_ID'];
		$utente_creatore = $row_a['UTENTE_CREATORE'];
		$url_foto = $row_a['URL_FOTO'];
		$data_inserimento = $row_a['DATA_INSERIMENTO'];
	}
	
	$title=urlencode($titolo);
 
	$url=urlencode('http://www.youngportalnetwork.it/activity.php?id='.$id_attivita);
	 
	$summary=urlencode($localita);
	 
	$image=urlencode($url_foto);


	?>

    <div class="subheader col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" style="height:100px">

            <a><?php echo $titolo; ?></a>

      </div>
    </div>

      <div class="main-info col-lg-7 col-md-7 col-sm-12 col-xs-12" style="margin-bottom:5%;">
        <div id="title" style="font-size: 400%;">
        <?php echo $titolo; ?> </div>
        <div id="data">
         <?php echo  $data_inserimento; ?></div>
          <div id="localita">
        <?php echo $localita; ?></div>
        <div style="margin-top:5%;">
            <?php
              include("gallery_activity.php");
            ?>
        </div>
      </div>



      <div class="main-info col-lg-5 col-md-5 col-sm-12 col-xs-12" style="float:left;" >
        <img src="<?php echo $url_foto; ?>" id="anteprima" />
        <div class="info-description col-lg-12 col-md-12 col-sm-12 col-xs-12" id="description" style="text-align:left; margin-top:5%;">
         <?php echo $descrizione; ?>
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
