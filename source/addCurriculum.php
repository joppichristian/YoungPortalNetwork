<html>
<?php
include 'private/connessione-db.php';
include 'private/utility-login.php';

my_session_start();

$linkIndietro="curriculums.php";
$testoIndietro = "TORNA INDIETRO";

?>
<head>
  <title>YPN | Aggiungi CV</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--        CSS       -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/css_form/form_gray.css" rel="stylesheet">
  <link href="css/css_curriculum/cv.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css" >
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
  <div class="subheader" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" style="height:100px">
      <!--<div class="col-lg-3 col-md-3 col-sm-3 col-xs-9">
          <img src="images/img-menu-small.jpg" style="height:50px" alt="Logo"></a>
      </div>-->
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
          <a>NUOVO CURRICULUM</a>
      </div>
    </div>
  </div>
  <?php
  if(utenteLoggato($mysqli) == true) {
  ?>
  <form action="post-add-cv.php" method="post"  enctype="multipart/form-data" >
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <!--Esempio text -->
    <h1>Nome:</h1>
    <input type="text" id="nome" name="nome" placeholder="Nome" />
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <!--Esempio text -->
    <h1>Cognome:</h1>
    <input type="text" id="cognome" name="cognome" placeholder="Cognome" />
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <!--Esempio text -->
    <h1>Data di nascita:</h1>
    <input type="text" id="data" name="data" placeholder="01/01/2001" />
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <!--Esempio text -->
    <h1>Residenza/Via:</h1>
    <input type="text" id="residenza" name="residenza" placeholder="Residenza e indirizzo" />
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <!--Esempio text -->
    <h1>Telefono/Cellulare:</h1>
    <input type="text" id="telefono" name="telefono" placeholder="Telefono o Cellulare" />
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <!--Esempio text -->
    <h1>Email:</h1>
    <input type="text" id="email" name="email" placeholder="Email" />
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;">
    <p>Istruzione (campo 1):</p>
    <textarea rows="3" id="istruzione1" name="istruzione1" cols="100"  placeholder="Istruzione"></textarea>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;">
    <p>Istruzione (campo 2):</p>
    <textarea rows="3" id="istruzione2" name="istruzione2" cols="100"  placeholder="Istruzione"></textarea>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;">
    <p>Esperienza (campo 1):</p>
    <textarea rows="3" id="esperienza1" name="esperienza1" cols="100"  placeholder="Esperienza"></textarea>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;">
    <p>Esperienza (campo 2):</p>
    <textarea rows="3" id="esperienza2" name="esperienza2" cols="100"  placeholder="Esperienza"></textarea>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;">
    <p>Esperienza (campo 3):</p>
    <textarea rows="3" id="esperienza3" name="esperienza3" cols="100"  placeholder="Esperienza"></textarea>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;">
    <p>Esperienza (campo 4):</p>
    <textarea rows="3" id="esperienza4" name="esperienza4" cols="100"  placeholder="Esperienza"></textarea>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;">
    <p>Competenza (campo 1):</p>
    <textarea rows="3" id="competenza1" name="competenza1" cols="100"  placeholder="Competenza"></textarea>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;">
    <p>Competenza (campo 2):</p>
    <textarea rows="3" id="competenza2" name="competenza2" cols="100"  placeholder="Competenza"></textarea>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;">
    <p>Competenza (campo 3):</p>
    <textarea rows="3" id="competenza3" name="competenza3" cols="100"  placeholder="Competenza"></textarea>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;">
    <p>Interessi (campo 1):</p>
    <textarea rows="3" id="interessi1" name="interessi1" cols="100"  placeholder="Competenza"></textarea>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;">
    <p>Interessi (campo 2):</p>
    <textarea rows="3" id="interessi2" name="interessi2" cols="100"  placeholder="Competenza"></textarea>
  </div>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;">
		  <p>Categoria:</p>
		  <select id="categoria" name="categoria" >
			<?php
			$qry_c="SELECT * FROM CAT_CV ;";
			$result_c = $mysqli->query($qry_c);
			while($row_c = $result_c->fetch_array())
			{
			?>
				<option value="<?php echo $row_c['ID']; ?>"><?php echo $row_c['nome']; ?></option>
			<?php
			}
			?>
		  </select>
		</div>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;font-size: 25px;" >
		  <p>Immagine:</p>

			<input type="file" name="file" id="file" />
			<p>N.B.: L'immagine verrà usata come foto profilo.</p>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;" >
		  <button type="submit" value="Aggiugi" style="font-size: 25px;" >Aggiungi</button>
		  <button type="reset" value="Cancella" style="font-size: 25px;">Cancella</button>
		<div>

	  </form>
  <?php
  }else{
		echo "Devi effettuare il login per aggiungere un'attivit&agrave;";
  }
  ?>
</body>
</html>
