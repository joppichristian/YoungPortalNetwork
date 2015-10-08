<html >
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
		<div id="cd-logo"><a href="index.html"><i  class="fa fa-chevron-left"></i> TORNA ALLA HOME</a></div>

		<nav class="main-nav" >
			<ul>
				<!-- inser more links here -->
				<li><a class="cd-signin" href="#0" style="background-color:rgb(23,148,201);">Sign in</a></li>
				<li><a class="cd-signup" href="#0" style="background-color:rgb(149,59,69);">Sign up</a></li>
			</ul>
		</nav>
	</header>

	<div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
		<div class="cd-user-modal-container"> <!-- this is the container wrapper -->
			<ul class="cd-switcher">
				<li><a href="#0" >Sign in</a></li>
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
          <a>STRUTTURE A NOLEGGIO</a>
      </div>
    </div>
  </div>

  <div class="articles col-lg-12 col-md-12 col-sm-12 col-xs-12" style="width:100%;">

        <div class="article col-lg-3 col-md-4 col-sm-6 col-xs-12" >
          <a href="detail_structure.php?id=1" >
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
