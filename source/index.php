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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
	<script src="js/pace.js"></script>

	<!-- Per Login -->
    <script type="text/javascript" src="private/sha512.js"></script>
    <script src="js/js_login/modernizr.js"></script> <!-- Modernizr -->

    <!-- -->

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


  <div class="col-md-12 images" >
  </div>

  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin:auto;">
    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6">
        <div class="block green responsive-2" onclick="location.href='activities.php';" style="cursor:pointer;">
              <p>Attività</p>
        </div>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6">
        <div class="block blue responsive-2" onclick="location.href='events.php';" style="cursor:pointer;">
              <p>Eventi</p>
        </div>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6">
        <div class="block red responsive-2" onclick="location.href='login_business.php';" style="cursor:pointer;">
              <p>Aziende</p>
        </div>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6">
        <div class="block green responsive-2" onclick="location.href='curriculums.php?c=0';" style="cursor:pointer;">
              <p>Giovani e Lavoro</p>
        </div>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6">
        <div class="block blue responsive-2" onclick="location.href='students.php';" style="cursor:pointer;">
              <p>Forum Studenti</p>
        </div>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6">
        <div class="block red responsive-2" onclick="location.href='structure.php';" style="cursor:pointer;">
              <p>Strutture a noleggio</p>
        </div>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6">
        <div class="block green responsive-2" onclick="location.href='contacts.php';" style="cursor:pointer;">
              <p>Contatti</p>
        </div>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6">
        <div class="block blue responsive-2" onclick="location.href='developers.php';" style="cursor:pointer;">
              <p>Sviluppatori</p>
        </div>
    </div>
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
  <footer class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-top:5%">

  </footer>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="js/js_login/main.js"></script> <!-- Gem jQuery -->
  </body>
</html>
