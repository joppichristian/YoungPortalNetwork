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
    <!--              -->


    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
    <!-- -->


  </head>
  <body>
    <header>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" style="height:100px">
        <!--<div class="col-lg-3 col-md-3 col-sm-3 col-xs-9">
            <img src="images/img-menu-small.jpg" style="height:50px" alt="Logo"></a>
        </div>-->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <a>ATTIVITA</a>
        </div>
      </div>

    </header>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <a href="addActivity.html" >
        <button class="item-option col-lg-3 col-md-3 col-sm-3 col-xs-3" >
        Aggiungi attività
      </button>
    </a>
    <a href="manageActivity.html">
      <button class="item-option col-lg-3 col-md-3 col-sm-3 col-xs-3">
        Gestisci le tue attività
      </button>
    </a>
      <form class="filter-form col-lg-4 col-md-4 col-sm-4 col-xs-4">
        	<input class="user" type="text" name="filter" id="filter">
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
  </body>
</html>
