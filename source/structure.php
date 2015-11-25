<html >
<?php
include 'private/connessione-db.php';
include 'private/utility-login.php';

my_session_start();

$linkIndietro = "index.php";
$testoIndietro = "TORNA ALLA HOME";

?>
<head>
	<link rel="icon" href="images/icon.ico" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="young,portal,network,children,ragazzi,giovani,strutture,noleggio,valle di cembra,trentino,forum,studenti,contatti,associazioni,aziende,imprenditori,eventi,attività,curriculums,opportunità" />
    <meta name="description" content="Portale interattivo dedicato ai giovani della Valle di Cembra. Qui puoi trovare eventi e attività che si svolgono in valle. Un giovane può condividere le proprie esperienze e conoscenze in modo semplice, pubblicizzare la propria azienda."/>

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
  <div class="subheader" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" style="height:100px">
      <!--<div class="col-lg-3 col-md-3 col-sm-3 col-xs-9">
          <img src="images/img-menu-small.jpg" style="height:50px" alt="Logo"></a>
      </div>-->
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:100px">
	      <img src="images/strutture_logo.png" style="height: 100%;width: auto;"/> 
          <a style="vertical-align: top;">STRUTTURE A NOLEGGIO</a>
      </div>
    </div>
  </div>

  <div class="articles col-lg-12 col-md-12 col-sm-12 col-xs-12" style="width:100%;">

		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" >
				<div class="article col-lg-12 col-md-12 col-sm-12 col-xs-12" >
          <a href="structure_comune/detail_structure_albiano.php" >
            <div class="preview" >
              <img src="images/loghi_comune/albiano.jpg" />
            </div>
            <div class="description">
              <p>Comune di Albiano</p>
            </div>
          </a>
        </div>
			</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" >
			      <div class="article col-lg-12 col-md-12 col-sm-12 col-xs-12" >
          <a href="structure_comune/detail_structure_cembra.php" >
            <div class="preview" >
              <img src="images/loghi_comune/cembra.jpg" />
            </div>
            <div class="description">
              <p>Comune di Cembra</p>
            </div>
          </a>
        </div>
			</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" >
			      <div class="article col-lg-12 col-md-12 col-sm-12 col-xs-12" >
          <a href="structure_comune/detail_structure_faver.php" >
            <div class="preview" >
              <img src="images/loghi_comune/faver.jpg" />
            </div>
            <div class="description">
              <p>Comune di Faver</p>
            </div>
          </a>
        </div>
			</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" >
			      <div class="article col-lg-12 col-md-12 col-sm-12 col-xs-12" >
          <a href="structure_comune/detail_structure_giovo.php" >
            <div class="preview" >
              <img src="images/loghi_comune/giovo.jpg" />
            </div>
            <div class="description">
              <p>Comune di Giovo</p>
            </div>
          </a>
        </div>
			</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" >
						<div class="article col-lg-12 col-md-12 col-sm-12 col-xs-12" >
          <a href="structure_comune/detail_structure_grumes.php" >
            <div class="preview" >
              <img src="images/loghi_comune/grumes.jpg" />
            </div>
            <div class="description">
              <p>Comune di Grumes</p>
            </div>
          </a>
        </div>
			</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" >
			      <div class="article col-lg-12 col-md-12 col-sm-12 col-xs-12" >
          <a href="structure_comune/detail_structure_grauno.php" >
            <div class="preview" >
              <img src="images/loghi_comune/grauno.jpg" />
            </div>
            <div class="description">
              <p>Comune di Grauno</p>
            </div>
          </a>
        </div>
			</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" >
			      <div class="article col-lg-12 col-md-12 col-sm-12 col-xs-12" >
          <a href="structure_comune/detail_structure_lisignago.php" >
            <div class="preview" >
              <img src="images/loghi_comune/lisignago.jpg" />
            </div>
            <div class="description">
              <p>Comune di Lisignago</p>
            </div>
          </a>
        </div>
			</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" >
			      <div class="article col-lg-12 col-md-12 col-sm-12 col-xs-12" >
          <a href="structure_comune/detail_structure_lona.php" >
            <div class="preview" >
              <img src="images/loghi_comune/lona.jpg" />
            </div>
            <div class="description">
              <p>Comune di Lona-Lases</p>
            </div>
          </a>
        </div>
			</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" >
			      <div class="article col-lg-12 col-md-12 col-sm-12 col-xs-12" >
          <a href="structure_comune/detail_structure_segonzano.php" >
            <div class="preview" >
              <img src="images/loghi_comune/segonzano.jpg" />
            </div>
            <div class="description">
              <p>Comune di Segonzano</p>
            </div>
          </a>
        </div>
			</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" >
						<div class="article col-lg-12 col-md-12 col-sm-12 col-xs-12" >
          <a href="structure_comune/detail_structure_sover.php" >
            <div class="preview" >
              <img src="images/loghi_comune/sover.jpg" />
            </div>
            <div class="description">
              <p>Comune di Sover</p>
            </div>
          </a>
        </div>
			</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" >
			      <div class="article col-lg-12 col-md-12 col-sm-12 col-xs-12" >

          <a href="structure_comune/detail_structure_valda.php" >
            <div class="preview" >
              <img src="images/loghi_comune/valda.jpg" />
            </div>
            <div class="description">
              <p>Comune di Valda</p>
            </div>
          </a>
        </div>
			</div>
    </div>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="js/js_login/main.js"></script> <!-- Gem jQuery -->
</body>
</html>
