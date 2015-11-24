<html>
  <?php
  include 'private/connessione-db.php';
  include 'private/utility-login.php';

  my_session_start();

  $linkIndietro = "companies.php";
  $testoIndietro = "TORNA INDIETRO";

  ?>
  <head>
    <title>YPN | Azienda</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--        CSS       -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/css_form/form_red.css" rel="stylesheet">
    <link href="css/css_companies/companies.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css" >
    <link rel="stylesheet" href="css/pace.css" >
    <link rel="stylesheet" href="css/css_login/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="css/css_login/style.css"> <!-- Gem style -->
    <!--              -->


	<!-- Per Login -->
    <script type="text/javascript" src="private/sha512.js"></script>
    <script src="js/js_login/modernizr.js"></script> <!-- Modernizr -->

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

  <style media="screen">

  .subsezioni{
    position: relative;
    height: 60px;
    line-height: 60px;
    text-align: center;
    background-color: rgb(234,140,6);
    margin-bottom: 15px;
    z-index: -1;
  }
  .subsezioni h1 {
    color: #ffffff;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    font-size: 20px;
  }

  </style>

  <script src="https://maps.googleapis.com/maps/api/js"></script>



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

	$id_azienda = $_GET["id"];

	if(!isset($id_azienda)){
		die("Errore, il link non è corretto. Torna indietro e riprova.");
	}

	$titolo = "";
	$localita = "";
	$descrizione = "";
	$categoria_id = "";
	$utente_creatore = "";
	$url_foto = "";
	$data_inserimento = "";

	$qry_a="SELECT *  FROM AZIENDA WHERE ID='$id_azienda' ;";
	$result_a = $mysqli->query($qry_a);
	while($row_a = $result_a->fetch_array())
	{
    $nome = $row_a["nome"];
    $descrizione = $row_a["descrizione"];
    $latitudine = $row_a["latitudine"];
    $longitudine = $row_a["longitudine"];
    $orario_apertura = $row_a["orario"];
    $email = $row_a["email"];
    $telefono = $row_a["telefono"];
    $url_foto = $row_a["url_foto"];
    $categoria = $row_a['ID_categoria'];
    $autore = $row_a['ID_utente'];

	}

  $url_fotoPr1 ="";
  $descrizionePr1 = "";
  $titoloPr1 = "";
  $url_fotoPr2 ="";
  $descrizionePr2 = "";
  $titoloPr2 = "";
  $url_fotoPr3 ="";
  $descrizionePr3 = "";
  $titoloPr3 = "";

  $ind_pr=1;
  $qry_a=" SELECT *  FROM PRODOTTI_AZIENDA WHERE ID_utente='$autore' ;";
	$result_a = $mysqli->query($qry_a);
	while($row_a = $result_a->fetch_array())
	{
    ${'url_fotoPr'.$ind_pr} = $row_a["url_foto"];
    ${'descrizionePr'.$ind_pr} = $row_a["descrizione"];
    ${'titoloPr'.$ind_pr}  = $row_a["titolo"];

    $ind_pr= $ind_pr+1;
	}


  $idUtente = $_SESSION['user_id'];
	$title=urlencode($titolo);

	$url=urlencode('http://www.youngportalnetwork.it/companies.php?id='.$id_azienda);

	$summary=urlencode($localita);

	$image=urlencode($url_foto);


	?>



    <div class="subheader col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" >
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0 nopadding">
          <a style="cursor:pointer;" href="#chi_siamo">Chi siamo</a>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0 nopadding" >
          <a href="#prodotti">Prodotti/Servizi</a>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0 nopadding" >
          <a href="#orari">Orari</a>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0 nopadding">
          <a href="#dove_siamo">Dove siamo</a>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0 nopadding">
          <a href="#contatti">Contatti</a>
        </div>

      </div>
    </div>

    <div class="main-info col-lg-12 col-md-12 col-sm-12 col-xs-12" style="float:left;" >
      <div id="content_gallery" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:1%;">
          <?php
            include("gallery_companies.php");
          ?>
        </div>
    </div>

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom:1%;" >
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <img src="<?php echo $url_foto; ?>" id="anteprima" />
          </div>

          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div id="title" style="font-size: 400%;"> <?php echo $nome; ?> </div>
          </div>

      </div>



      <div id="chi_siamo" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" >

        <div  class="subsezioni col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" >
            <a><?php echo $nome; ?> - Chi siamo</a>
          </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="width:100%;margin-bottom:3%;" >
          <?php echo $descrizione; ?>
        </div>

      </div>

      <div id="prodotti"  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" >

        <div class="subsezioni col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" >
            <a><?php echo $nome; ?> - Prodotti/Servizi</a>
          </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom:3%;" >

          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 remove_padding" align="center" style="margin-bottom:2%;">
                <?php echo $titoloPr1; ?>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 remove_padding">
              <img src="<?php echo $url_fotoPr1; ?>" style="width:100%;height:50%;"  />
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 remove_padding" align="left" style="margin-top:2%;">
                <?php echo $descrizionePr1; ?>
            </div>
          </div>

          <?php
            if($titoloPr2 != "" && $descrizionePr2 != "" ){

              ?>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 remove_padding" align="center" style="margin-bottom:2%;">
                <?php echo $titoloPr2; ?>
            </div>
            <?php if($urlFotoPr2 ==""){ ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 remove_padding">
              <img src="<?php echo $url_fotoPr2; ?>" style="width:100%;height:50%;"  />
            </div>
            <?php
              }else{
                  $url_vuota = "http://www.youngportalnetwork.it/images/example.jpg";
            ?>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 remove_padding">
                <img src="<?php echo $url_vuota; ?>" style="width:100%;height:50%;"  />
              </div>
            <?php
              }
            ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 remove_padding" align="left" style="margin-top:2%;">
                <?php echo $descrizionePr2; ?>
            </div>
          </div>
          <?php
          }
          ?>

          <?php
            if($titoloPr3 != "" && $descrizionePr3 != "" ){

              ?>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 remove_padding" align="center" style="margin-bottom:2%;">
                <?php echo $titoloPr3; ?>
            </div>
            <?php if($urlFotoPr3 ==""){ ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 remove_padding">
              <img src="<?php echo $url_fotoPr2; ?>" style="width:100%;height:50%;"  />
            </div>
            <?php
              }else{
                  $url_vuota = "http://www.youngportalnetwork.it/images/example.jpg";
            ?>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 remove_padding">
                <img src="<?php echo $url_vuota; ?>" style="width:100%;height:50%;"  />
              </div>
            <?php
              }
            ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 remove_padding" align="left" style="margin-top:2%;">
                <?php echo $descrizionePr3; ?>
            </div>
          </div>
          <?php
          }
          ?>


        </div>

      </div>

      <div id="orari"  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" >

        <div class="subsezioni col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" >
            <a><?php echo $nome; ?> - Orari</a>
          </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="width:100%;margin-bottom:3%;" >
          <?php echo $orario_apertura; ?>
        </div>

      </div>

      <div  id="dove_siamo" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" >

        <div class="subsezioni col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" >
            <a><?php echo $nome; ?> - Dove siamo</a>
          </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
          <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 " style="width:100%; margin-bottom:3%;" align="center" >
               <div id="map-canvas" style="width:100%;height:50%;"></div>
          </div>

        </div>

      </div>

      <div id="contatti"  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" >

        <div class="subsezioni col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" >
            <a><?php echo $nome; ?> - Contatti</a>
          </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="width:100%;margin-bottom:3%;" >
          Email: <?php echo $email;?></br>
          Telefono: <?php echo $telefono; ?>
        </div>

      </div>

   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <script src="js/js_login/main.js"></script> <!-- Gem jQuery -->


   <script>

     window.onload = function() {

       var lat = <?php echo $latitudine; ?>;
       var long =<?php echo $longitudine; ?>;
       var mapCanvas = document.getElementById('map-canvas');
       var mapOptions = {
         center: new google.maps.LatLng(lat, long),
         zoom: 12,
         mapTypeId: google.maps.MapTypeId.ROADMAP
       }
       var map = new google.maps.Map(mapCanvas, mapOptions)

       var marker = new google.maps.Marker({
       map: map,
       draggable: false,
       position: new google.maps.LatLng(lat, long)
   });
     }
     google.maps.event.addDomListener(window, 'load', initialize);
   </script>

  </body>
</html>
