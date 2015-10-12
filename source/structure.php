<html >
<?php
include 'private/connessione-db.php';
include 'private/utility-login.php';

my_session_start();

$linkIndietro = "index.php";
$testoIndietro = "TORNA ALLA HOME";

?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

  <!--        CSS       -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/css_form/form_red.css" rel="stylesheet">
  <link href="css/css_strutture/strutture.css" rel="stylesheet">
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


	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>

	<title>YPN | Strutture a noleggio</title>
</head>
<body>
	<header role="banner" style="background-color:black;">
	<?php
		include("header.php");
	?>
</header>
  <div class="subheader" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" style="height:100px">
      <!--<div class="col-lg-3 col-md-3 col-sm-3 col-xs-9">
          <img src="images/img-menu-small.jpg" style="height:50px" alt="Logo"></a>
      </div>-->
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
          <a>STRUTTURE A NOLEGGIO</a>
      </div>
    </div>
  </div>
<!--
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <a href="addStructure.php" class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
      <button class="item-option col-lg-12 col-md-12 col-sm-12 col-xs-12" >
      Aggiungi struttura
    </button>
  </a>
  <a href="management_activities.php" class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <button class="item-option col-lg-12 col-md-12 col-sm-12 col-xs-12">
      Gestisci le tue struttura
    </button>
  </a>

  </div>
-->
  <div class="articles col-lg-12 col-md-12 col-sm-12 col-xs-12" style="width:100%;">

        <div class="article col-lg-3 col-md-4 col-sm-6 col-xs-12" >
          <a href="structure_comune/detail_structure_albiano.php" >
            <div class="preview" >
              <img src="images/loghi_comune/albiano.jpg" />
            </div>
            <div class="description">
              <p>Comune di Albiano</p>
            </div>
          </a>
        </div>
        <div class="article col-lg-3 col-md-4 col-sm-6 col-xs-12" >
          <a href="detail_structure.php?id=2" >
            <div class="preview" >
              <img src="images/loghi_comune/cembra.jpg" />
            </div>
            <div class="description">
              <p>Comune di Cembra</p>
            </div>
          </a>
        </div>
        <div class="article col-lg-3 col-md-4 col-sm-6 col-xs-12" >
          <a href="detail_structure.php?id=3" >
            <div class="preview" >
              <img src="images/loghi_comune/faver.jpg" />
            </div>
            <div class="description">
              <p>Comune di Faver</p>
            </div>
          </a>
        </div>
        <div class="article col-lg-3 col-md-4 col-sm-6 col-xs-12" >
          <a href="detail_structure.php?id=4" >
            <div class="preview" >
              <img src="images/loghi_comune/giovo.jpg" />
            </div>
            <div class="description">
              <p>Comune di Giovo</p>
            </div>
          </a>
        </div>
        <div class="article col-lg-3 col-md-4 col-sm-6 col-xs-12" >
          <a href="detail_structure.php?id=5" >
            <div class="preview" >
              <img src="images/loghi_comune/grumes.jpg" />
            </div>
            <div class="description">
              <p>Comune di Grumes</p>
            </div>
          </a>
        </div>
        <div class="article col-lg-3 col-md-4 col-sm-6 col-xs-12" >
          <a href="detail_structure.php?id=6" >
            <div class="preview" >
              <img src="images/loghi_comune/lisignago.jpg" />
            </div>
            <div class="description">
              <p>Comune di Lisignago</p>
            </div>
          </a>
        </div>
        <div class="article col-lg-3 col-md-4 col-sm-6 col-xs-12" >
          <a href="detail_structure.php?id=7" >
            <div class="preview" >
              <img src="images/loghi_comune/lona.jpg" />
            </div>
            <div class="description">
              <p>Comune di Lona-Lases</p>
            </div>
          </a>
        </div>
        <div class="article col-lg-3 col-md-4 col-sm-6 col-xs-12" >
          <a href="detail_structure.php?id=8" >
            <div class="preview" >
              <img src="images/loghi_comune/segonzano.jpg" />
            </div>
            <div class="description">
              <p>Comune di Segonzano</p>
            </div>
          </a>
        </div>
        <div class="article col-lg-3 col-md-4 col-sm-6 col-xs-12" >
          <a href="detail_structure.php?id=9" >
            <div class="preview" >
              <img src="images/loghi_comune/sover.jpg" />
            </div>
            <div class="description">
              <p>Comune di Sover</p>
            </div>
          </a>
        </div>
        <div class="article col-lg-3 col-md-4 col-sm-6 col-xs-12" >
          <a href="detail_structure.php?id=10" >
            <div class="preview" >
              <img src="images/loghi_comune/valda.jpg" />
            </div>
            <div class="description">
              <p>Comune di Valda</p>
            </div>
          </a>
        </div>
    </div>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="js/js_login/main.js"></script> <!-- Gem jQuery -->
</body>
</html>
