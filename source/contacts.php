<html >
<head>
	<meta charset="UTF-8">
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
  <script src="js/pace.js"></script>
  <!-- -->


	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>

	<title>YPN | Strutture a noleggio</title>
</head>
<body>
	<header id="header_id" role="banner" style="background-color:black;">
		<div id="cd-logo"><a href="index.php"><i  class="fa fa-chevron-left"></i> TORNA ALLA HOME</a></div>

		<nav class="main-nav" >
			<ul>
				<!-- inser more links here -->
				<li><a class="cd-signin" href="#0" style="background-color:rgb(23,148,201);">Sign in</a></li>
				<li><a class="cd-signup" href="#0" style="background-color:rgb(149,59,69);">Sign up</a></li>
			</ul>
		</nav>
	</header>

	<div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
		  <?php
		include("login.php");
		?>
	</div> <!-- cd-user-modal -->

  <div id="scritta_contatti" class="subheader" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" style="height:100px">
      <!--<div class="col-lg-3 col-md-3 col-sm-3 col-xs-9">
          <img src="images/img-menu-small.jpg" style="height:50px" alt="Logo"></a>
      </div>-->
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
          <a>CONTATTI</a>
      </div>
    </div>
  </div>


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
  <?php
    include "content_contacts.php";
  ?>
</div>
<!--
  <script>
  function calcoloDim() {
      alert("fino a qui ");
        var heightTot= $(window).height();
        var in = document.getElementById('header_id').height();
        var izi = document.getElementById('scritta_contatti').height();
        var o = document.getElementById('agg_contatti').height();

        var disponibile = heightTot -(in+izi+o);
        alert("dim disponibile: "+disponibile);

      }

      calcoloDim();
  </script>-->

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="js/js_login/main.js"></script> <!-- Gem jQuery -->
</body>
</html>
