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
    <link rel="stylesheet" type="text/css" href="css/style-gallery.css">
    <!--              -->


    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
     <script src="js/pace.js"></script>
    <!-- -->


  </head>
  <body>
    <header role="banner" style="background-color:black;">
      <?php
      include("header.php");
    ?>
    </header>

    <div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
      <div class="cd-user-modal-container"> <!-- this is the container wrapper -->
        <ul class="cd-switcher">
          <li><a href="#0"  >Sign in</a></li>
          <li><a href="#0">New account</a></li>
        </ul>

        <div id="cd-login"> <!-- log in form -->
          <form class="cd-form">
            <p class="fieldset">
              <label class="image-replace cd-email" for="signin-email">E-mail</label>
              <input class="full-width has-padding has-border" id="signin-email" type="email" placeholder="E-mail">
              <span class="cd-error-message">Error message here!</span>
            </p>

            <p class="fieldset">
              <label class="image-replace cd-password" for="signin-password">Password</label>
              <input class="full-width has-padding has-border" id="signin-password" type="text"  placeholder="Password">
              <a href="#0" class="hide-password">Hide</a>
              <span class="cd-error-message">Error message here!</span>
            </p>

            <p class="fieldset">
              <input type="checkbox" id="remember-me" checked>
              <label for="remember-me">Remember me</label>
            </p>

            <p class="fieldset">
              <input class="full-width" type="submit" value="Login">
            </p>
          </form>

          <p class="cd-form-bottom-message"><a href="#0">Forgot your password?</a></p>
          <!-- <a href="#0" class="cd-close-form">Close</a> -->
        </div> <!-- cd-login -->

        <div id="cd-signup"> <!-- sign up form -->
          <form class="cd-form">
            <p class="fieldset">
              <label class="image-replace cd-username" for="signup-username">Username</label>
              <input class="full-width has-padding has-border" id="signup-username" type="text" placeholder="Username">
              <span class="cd-error-message">Error message here!</span>
            </p>

            <p class="fieldset">
              <label class="image-replace cd-email" for="signup-email">E-mail</label>
              <input class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail">
              <span class="cd-error-message">Error message here!</span>
            </p>

            <p class="fieldset">
              <label class="image-replace cd-password" for="signup-password">Password</label>
              <input class="full-width has-padding has-border" id="signup-password" type="text"  placeholder="Password">
              <a href="#0" class="hide-password">Hide</a>
              <span class="cd-error-message">Error message here!</span>
            </p>

            <p class="fieldset">
              <input type="checkbox" id="accept-terms">
              <label for="accept-terms">I agree to the <a href="#0">Terms</a></label>
            </p>

            <p class="fieldset">
              <input class="full-width has-padding" type="submit" value="Create account">
            </p>
          </form>

          <!-- <a href="#0" class="cd-close-form">Close</a> -->
        </div> <!-- cd-signup -->

        <div id="cd-reset-password"> <!-- reset password form -->
          <p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

          <form class="cd-form">
            <p class="fieldset">
              <label class="image-replace cd-email" for="reset-email">E-mail</label>
              <input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
              <span class="cd-error-message">Error message here!</span>
            </p>

            <p class="fieldset">
              <input class="full-width has-padding" type="submit" value="Reset password">
            </p>
          </form>

          <p class="cd-form-bottom-message"><a href="#0">Back to log-in</a></p>
        </div> <!-- cd-reset-password -->
        <a href="#0" class="cd-close-form">Close</a>
      </div> <!-- cd-user-modal-container -->
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
              include("gallery.php");
            ?>
        </div>
      </div>



      <div class="main-info col-lg-5 col-md-5 col-sm-12 col-xs-12" style="float:left;" >
        <img src="<?php echo $url_foto; ?>" id="anteprima" />
        <div class="info-description col-lg-12 col-md-12 col-sm-12 col-xs-12" id="description" style="text-align:left; margin-top:5%;">
         <?php echo $descrizione; ?>
		    </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:5%;">
            <a href="#"><img src="images/fb.svg" alt="Condividi" style="width:15%;height:15%;"/></a>
        </div>

      </div>



    </div>

   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <script src="js/js_login/main.js"></script> <!-- Gem jQuery -->
  </body>
</html>
