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
    <div class="subheader col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" style="height:100px">

            <a>Pilates</a>

      </div>
    </div>

      <div class="main-info col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div id="title">
        Corso di pilates </div>
        <div id="data">
          Da gennaio</div>
          <div id="localita">
        Centro sportivo Albiano </div>
        <div style="margin-top:10%;">
      <?php
        include("gallery.php");
       ?>
     </div>
      </div>

      <div class="main-info col-lg-4 col-md-4 col-sm-12 col-xs-12" style="float:left;" >
        <img src="images/pilates.jpg" id="anteprima" />
        <div class="info-description col-lg-12 col-md-12 col-sm-12 col-xs-12" id="description" style="text-align:left; margin-top:5%;">
        12 lezioni di pilates per donne al costo di 75 €.
        Prima prova gratuita.

        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent finibus pellentesque nisl, a dapibus ante aliquet consequat. Sed non faucibus odio, eu suscipit enim. Integer et efficitur eros. Sed placerat libero id leo suscipit, at eleifend lacus facilisis. Nulla iaculis enim augue, sed semper odio euismod nec. Aenean aliquet gravida scelerisque. Cras eget sem libero. Suspendisse quis magna in sem semper pretium eget et sapien. Suspendisse convallis quam ut imperdiet tempor. Sed eu urna at augue sollicitudin suscipit id eu lacus. Vestibulum est lectus, rutrum id quam et, consectetur venenatis magna.
        </div>
      </div>


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:5%;">
        <a href="#"><img src="images/fb.svg" alt="Condividi" style="width:15%;height:15%;"/></a>
    </div>
    </div>

   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <script src="js/js_login/main.js"></script> <!-- Gem jQuery -->
  </body>
</html>
