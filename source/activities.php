<html>
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
</head>
<body>
  <header role="banner" style="background-color:black;">
    <div id="cd-logo"><a href="index.html"><a href="index.php"><i  class="fa fa-chevron-left"></i> TORNA ALLA HOME</a></div>

    <nav class="main-nav">
      <ul>
        <!-- inser more links here -->
        <li><a class="cd-signin" href="#0" style="background-color:rgb(50,72,31);">Sign in</a></li>
        <li><a class="cd-signup" href="#0" style="background-color:rgb(149,59,69);">Sign up</a></li>
      </ul>
    </nav>
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
  <div class="subheader" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" style="height:100px">
      <!--<div class="col-lg-3 col-md-3 col-sm-3 col-xs-9">
          <img src="images/img-menu-small.jpg" style="height:50px" alt="Logo"></a>
      </div>-->
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
          <a>ATTIVITA</a>
      </div>
    </div>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <a href="addActivity.html" class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
      <button class="item-option col-lg-12 col-md-12 col-sm-12 col-xs-12" >
      Aggiungi attività
    </button>
  </a>
  <a href="manageActivity.html" class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <button class="item-option col-lg-12 col-md-12 col-sm-12 col-xs-12">
      Gestisci le tue attività
    </button>
  </a>
  <form class="filter-form col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <input class="user" type="text" name="filter" id="filter" style="width:80%;">
        <input type="submit" value="Search">
  </form>
  </div>
  <div class="articles col-md-12 col-lg-12 col-xs-12 col-sm-12">

        <div class="article col-md-3 col-lg-3 col-xs-12 col-sm-5" >
          <a href="activity.html?id=1" >
            <div class="preview" >
              <img src="images/pilates.jpg" />
            </div>
            <div class="description">
              <p>Corso di pilates</p>
            </div>
          </a>
        </div>
        <div class="article col-md-3 col-lg-3 col-xs-12 col-sm-5" >
          <a href="attivita.html?id=1" >
            <div class="preview" >
              <img src="images/example.jpg" />
            </div>
            <div class="description">
              <p>Lorem Ipsum</p>
            </div>
          </a>
        </div>
        <div class="article col-md-3 col-lg-3 col-xs-12 col-sm-5" >
          <a href="attivita.html?id=1" >
            <div class="preview" >
              <img src="images/example.jpg" />
            </div>
            <div class="description">
              <p>Lorem Ipsum</p>
            </div>
          </a>
        </div>
    </div>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="js/js_login/main.js"></script> <!-- Gem jQuery -->
</body>
</html>
