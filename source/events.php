<html>
  <?php
  include 'private/connessione-db.php';
  include 'private/utility-login.php';

  my_session_start();

  $linkIndietro = "index.php";
  $testoIndietro = "TORNA ALLA HOME";

  ?>
  <head>
    <title>YPN | Eventi</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--        CSS       -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/css_form/form_blue.css" rel="stylesheet">
    <link href="css/css_events/events.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css" >
    <link rel="stylesheet" href="css/css_login/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="css/css_login/style.css"> <!-- Gem style -->
    <link rel="stylesheet" href="css/pace.css" >
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
    <div class="subheader">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" style="height:100px">
        <!--<div class="col-lg-3 col-md-3 col-sm-3 col-xs-9">
            <img src="images/img-menu-small.jpg" style="height:50px" alt="Logo"></a>
        </div>-->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <a>EVENTI</a>
        </div>
      </div>

    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <a href="addEvent.php" class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
        <button class="item-option col-lg-12 col-md-12 col-sm-12 col-xs-12" >
        Aggiungi evento
      </button>
    </a>
    <a href="management_event.php" class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
      <button class="item-option col-lg-12 col-md-12 col-sm-12 col-xs-12">
        Gestisci i tuoi eventi
      </button>
    </a>

    <form class="filter-form col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <input class="user" type="text" name="filter" id="filter" style="width:80%;">
          <input type="submit" value="Search">
    </form>
    </div>

    <div class="articles col-lg-12 col-md-12 col-sm-12 col-xs-12" style="width:100%;">

          <div class="article col-md-4 col-lg-3 col-xs-12 col-sm-6" >
            <a href="event.html?id=1" >
              <div class="preview" >
                <img src="images/example.jpg" />
              </div>
              <div class="description">
                <p>Lorem Ipsum</p>
              </div>
            </a>
          </div>

          <div class="article col-md-4 col-lg-3 col-xs-12 col-sm-6" >
            <a href="event.html?id=1" >
              <div class="preview" >
                <img src="images/example.jpg" />
              </div>
              <div class="description">
                <p>Lorem Ipsum</p>
              </div>
            </a>
          </div>
          <div class="article col-md-4 col-lg-3 col-xs-12 col-sm-6" >
            <a href="event.html?id=1" >
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
