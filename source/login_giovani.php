<html >
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/css_login/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/css_login/style.css"> <!-- Gem style -->
 
	
	<!-- Per Login -->
    <script type="text/javascript" src="private/sha512.js"></script>
    <script src="js/js_login/modernizr.js"></script> <!-- Modernizr -->
   
	
	
    <link rel="stylesheet" href="css/font-awesome.min.css" >
	<title>YPN | Giovani e Lavoro</title>
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

    <!--include la pagina -->
  <object type="text/html" data="giovani.html" style="width:100%; height:100%">
    <p>backup content</p>
  </object>
    <!--fine include la pagina -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/js_login/main.js"></script> <!-- Gem jQuery -->
</body>
</html>
