<html>
<?php
include 'private/connessione-db.php';
include 'private/utility-login.php';

my_session_start();

$linkIndietro = "#";
$testoIndietro = "#";

?>
  <head>
    <title>YoungPortalNetwork - Il portale giovani della Valle di Cembra</title>
    <link rel="icon" href="images/icon.ico" />

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="young,portal,network,children,ragazzi,giovani,strutture,noleggio,valle di cembra,trentino,forum,studenti,contatti,associazioni,aziende,imprenditori,eventi,attività,curriculums,opportunità" />
    <meta name="description" content="Portale interattivo dedicato ai giovani della Valle di Cembra. Qui puoi trovare eventi e attività che si svolgono in valle. Un giovane può condividere le proprie esperienze e conoscenze in modo semplice, pubblicizzare la propria azienda."/>


	 <meta property="og:title" content="YoungPortalNetwork" />
	<meta property="og:type" content="WebSite" />
	<meta property="og:url" content="http://www.youngportalnetwork.it/" />
	<meta property="og:image" content="http://www.youngportalnetwork.it/images/share_icon.jpg" />
	<meta property="og:description" content="Per saperne di più clicca qui..." />
    <!--        CSS       -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/css_login/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="css/css_login/style.css"> <!-- Gem style -->
    <link rel="stylesheet" href="css/font-awesome.min.css" >
    <link rel="stylesheet" href="css/pace.css" >

    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
      <script src="js/js_login/main.js"></script> <!-- Gem jQuery -->
	<script src="js/pace.js"></script>

	<!-- Per Login -->
    <script type="text/javascript" src="private/sha512.js"></script>
    <script src="js/js_login/modernizr.js"></script> <!-- Modernizr -->

    <!-- -->

  </head>
  <body>
	  <?php include_once("analyticstracking.php") ?>
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

    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-bottom:3%; padding:0px; width:100%; vertical-align:middle; z-index: -1;" >
	<div style="position: absolute;top:30px; width:35%; text-align:center;background-color: white;border-bottom-right-radius: 50px;">
		<img src="images/logo.png" style="width:60%;height: auto;"/>
	</div>
    <img src="images/sfondo.jpg" style="width:100%; height:auto; " />

  </div>

  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin:auto;">
    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6" >
        <div class="block green responsive-2" onclick="location.href='activities.php';" style="cursor:pointer;">
              <!--<p>Attività</p>-->
              <img src="/images/loghi_home/attivita.jpg" id="anteprima" style="width:100%;border-bottom-right-radius: 50px 50px;">
        </div>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6">
        <div class="block blue responsive-2" onclick="location.href='events.php';" style="cursor:pointer;">
              <!--<p>Eventi</p>-->
              <img src="/images/loghi_home/eventi.jpg" id="anteprima" style="width:100%;border-bottom-right-radius: 50px 50px;">
        </div>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6">
        <div class="block orange responsive-2" onclick="location.href='companies.php';" style="cursor:pointer;">
              <!--<p>Aziende</p>-->
              <img src="/images/loghi_home/aziende_IMPRENDITORI.jpg" id="anteprima" style="width:100%;border-bottom-right-radius: 50px 50px;">
        </div>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6">
        <div class="block gray responsive-2" onclick="location.href='curriculums.php?c=0';" style="cursor:pointer;">
              <!--<p>Giovani e Lavoro</p>-->
              <img src="/images/loghi_home/giovani.jpg" id="anteprima" style="width:100%;border-bottom-right-radius: 50px 50px;">
        </div>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6">
        <div class="block blue responsive-2" onclick="location.href='students.php';" style="cursor:pointer;">
              <!--<p>Forum Studenti</p>-->
              <img src="/images/loghi_home/forum.jpg" id="anteprima" style="width:100%;border-bottom-right-radius: 50px 50px;">
        </div>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6">
        <div class="block orange responsive-2" onclick="location.href='structure.php';" style="cursor:pointer;">
              <!--<p>Strutture a noleggio</p>-->
              <img src="/images/loghi_home/strutture.jpg" id="anteprima" style="width:100%;border-bottom-right-radius: 50px 50px;">
        </div>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6">
        <div class="block gray responsive-2" onclick="location.href='contacts.php';" style="cursor:pointer;">
              <!--<p>Contatti</p>-->
              <img src="/images/loghi_home/contatti.jpg" id="anteprima" style="width:100%;border-bottom-right-radius: 50px 50px;">
        </div>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6">
        <div class="block green responsive-2" onclick="location.href='developers.php';" style="cursor:pointer;">
              <!--<p>Sviluppatori</p>-->
              <img src="/images/loghi_home/sviluppatori.jpg" id="anteprima" style="width:100%;border-bottom-right-radius: 50px 50px;">
        </div>
    </div>
  </div>
  <div class="contributors col-md-12 col-lg-12 col-sm-12 col-xs-12" style="text-align:center;">
      <a href="http://www.comunita.valledicembra.tn.it">
        <img src="images/loghi/cvc.jpg" style="width:auto;height:120px;margin:3%;"  />
      </a>
      <a href="http://www.politichegiovanili.provincia.tn.it">
        <img src="images/loghi/pg.jpg"  style="width:auto;height:180px;margin:3%;" />
      </a>
      <a href="http://www.comune.albiano.tn.it">
        <img src="images/loghi/alb.png"  style="width:auto;height:120px;margin:3%;" />
      </a>
      <a href="http://www.bimtrento.it">
        <img src="images/loghi/bim.jpg"  style="width:auto;height:120px;margin:3%;" />
      </a>
      <a href="http://www.provincia.tn.it">
        <img src="images/loghi/pat.jpg" style="width:auto;height:180px;margin:3%;"/>
      </a>
  </div>
  <footer class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-top:5%;text-align: center;">
  	<font style="color: #eb8c06">Per info e segnalazioni contattaci a </font><a href="mailto:info@youngportalnetwork.it">info@youngportalnetwork.it</a>
  	<br/>
  	<a href="//www.iubenda.com/privacy-policy/587389" class="iubenda-white iubenda-embed" title="Privacy Policy">Privacy Policy</a>

  	<script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src = "//cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script>
  </footer>


  </body>
</html>
