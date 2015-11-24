<html>
<?php
include 'private/connessione-db.php';
include 'private/utility-login.php';

my_session_start();

$linkIndietro = "index.php";
$testoIndietro = "TORNA ALLA HOME";

$filter = $_GET['filter'];

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
  <link href="css/css_events//events.css" rel="stylesheet">
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

  <!-- Per Login -->
  <script type="text/javascript" src="private/sha512.js"></script>
  <script src="js/js_login/modernizr.js"></script> <!-- Modernizr -->
    <script src="js/js_login/main.js"></script> <!-- Gem jQuery -->


    <script type="text/javascript" src="js/jquery-confirm.js"></script>
  <link rel="stylesheet" type="text/css" href="css/jquery-confirm.css">

</head>
<body>
		  <?php include_once("analyticstracking.php") ?>

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
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:100px" >
	      <img src="images/eventi_logo.png" style="height: 100%;width: auto;"/> 
          <a style="vertical-align: top;">EVENTI</a>
      </div>
    </div>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

	<?php
	if(utenteLoggato($mysqli) == true) {
	?>
		<a href="addEvents.php" class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top:5%;">
			<button class="item-option col-lg-12 col-md-12 col-sm-12 col-xs-12" >
			   Aggiungi evento
			</button>
		</a>
	<?php
	}else{
	?>
		<a href="#" id='addEve' class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top:5%;">
			<button  class="item-option col-lg-12 col-md-12 col-sm-12 col-xs-12" title='Effettua il login per aggiungere un attivita' >
				Aggiungi evento
			</button>
		</a>
	<?php
	}
	?>


  <a href="management_events.php" class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top:5%;">
    <button class="item-option col-lg-12 col-md-12 col-sm-12 col-xs-12">
      Gestisci i tuoi eventi
    </button>
  </a>

  <form class="filter-form col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top:5%;">
        <input class="user" type="text" name="filter" id="filter" value="<?php echo $filter; ?>" style="width:80%;font-size: 24px;">
        <input type="submit" class="item-option" value="Filtra">
  </form>
  </div>
  <div class="articles col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 5%; width:100%">


	<?php	
	$stmt = $mysqli->prepare("SELECT ID, TITOLO, URL_FOTO FROM EVENTI WHERE TITOLO LIKE ? ");
	$filterStmt =  '%'.$filter.'%';
	$stmt->bind_param('s',$filterStmt); 
	if ($stmt->execute()) {
		$stmt->bind_result($id, $titolo, $urlFoto);
		while ($stmt->fetch()) {	
	?>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" >
					<div class="article col-lg-12 col-md-12 col-sm-12 col-xs-12" >
				  <a href="event.php?id=<?php echo $id; ?>" >
					<div class="preview" >
					  <img src="<?php echo $urlFoto; ?>" />
					</div>
					<div class="description">
					  <p><?php echo $titolo; ?></p>
					</div>
				  </a>
				</div>
			</div>
	<?php
		}
	}	
	?>


    </div>
         <script type="text/javascript">
                                    $('#addEve').on('click', function () {
	                                        $.alert({
                                            title: 'Aggiungi Evento',
                                            content: 'Effettua il login per aggiungere un evento',
                                            theme: 'supervan',
                                            animation:'RotateY',
                                            cancelButton: '',
                                            animationSpeed: 1000,
                                            columnClass: 'col-xs-12',
                                            confirm: function (id) {
                                             
                                            }                                        
                                            });
                                    });
                               
                                   
                                
                                </script>

</body>
</html>
