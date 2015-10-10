<html>
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

    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700|Merriweather:400italic,400' rel='stylesheet' type='text/css'>


    	<link rel="stylesheet" href="css/css_students/reset.css"> <!-- CSS reset -->
    	<link rel="stylesheet" href="css/css_students/style.css"> <!-- Resource style -->
    	<script src="js/js_students/modernizr.js"></script> <!-- Modernizr -->
      <script src="js/pace.js"></script>

    <link rel="stylesheet" href="css/font-awesome.min.css" >
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

    <!--        CSS       -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/form.css" rel="stylesheet">
    <link rel="stylesheet" href="css/pace.css" >
    <link rel="stylesheet" href="css/css_login/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="css/css_login/style.css"> <!-- Gem style -->
    <!--              -->


    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
    <!-- -->


    <title>YPN | Forum Studenti</title>

  </head>
  <body>
    <header role="banner" style="background-color:black;">
      <?php
      include("header.php");
    ?>
    </header>
    <div class="subheader">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" style="height:100px">
        <!--<div class="col-lg-3 col-md-3 col-sm-3 col-xs-9">
            <img src="images/img-menu-small.jpg" style="height:50px" alt="Logo"></a>
        </div>-->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <a>FORUM STUDENTI</a>
        </div>
      </div>

    </div>

    <!--include la pagina -->
    <object type="text/html" data="students_small.html" style="width:100%; height:100%">
      <p>backup content</p>
    </object>
    <!--fine include la pagina -->

  </body>
  <script>
      window.onload = function() {

        if($(window).width()<776){
          document.getElementById('torna_home').style.display='none';
        }else{
          document.getElementById('torna_home').style.display='block';

        }

        onChangeDim();

      }
  </script>
</html>
