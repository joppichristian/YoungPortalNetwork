<html>
<?php
include 'private/connessione-db.php';
include 'private/utility-login.php';

my_session_start();

$linkIndietro = "index.php";
$testoIndietro = "TORNA ALLA HOME";

?>
<head>
  <title>YPN | C.V.</title>
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

  <!-- Per Login -->
  <script type="text/javascript" src="private/sha512.js"></script>
  <script src="js/js_login/modernizr.js"></script> <!-- Modernizr -->


  <!-- JavaScript custom -->
  <script language="JavaScript" type="text/JavaScript">
	function displayEffettuaLogin(){
		alert("Effettua prima il login.");
	}
  </script>
  <script type="text/javascript">
  function displayCVInserito(){
		alert("Hai già inserito il tuo CV. Vai nella sezione 'Gestisci il tuo curriculum' qui accanto per modificalo!");
	}
  </script>

  </script>

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
  <div class="subheader" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" style="height:100px">
      <!--<div class="col-lg-3 col-md-3 col-sm-3 col-xs-9">
          <img src="images/img-menu-small.jpg" style="height:50px" alt="Logo"></a>
      </div>-->
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
          <a>Curriculum</a>
      </div>
    </div>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

<?php
$query_nome="SELECT ID_utente FROM CURRICULUM WHERE  id_utente='". $_SESSION['user_id']."';";
$result_nome = $mysqli->query($query_nome);
$gia_inserito=0;
while($row_nome = $result_nome->fetch_array())
  {
      $gia_inserito=1;
  }

  if(utenteLoggato($mysqli) == true) {

    if($gia_inserito == 1){
      ?>
      <a href="#" class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top:5%;">
			     <button class="item-option col-lg-12 col-md-12 col-sm-12 col-xs-12" onClick="displayCVInserito();" title='Attenzione!' >
				         Aggiungi curriculum
		       </button>
		  </a>
    <?php
    }else{
    ?>

		  <a href="addCurriculum.php" class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top:5%;">
			     <button class="item-option col-lg-12 col-md-12 col-sm-12 col-xs-12" >
			     Aggiungi curriculum
			    </button>
		  </a>

	  <?php
    }
  }else{
	?>
		<a href="#" class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top:5%;">
			<button class="item-option col-lg-12 col-md-12 col-sm-12 col-xs-12" onClick="displayEffettuaLogin();" title='Effettua il login per aggiungere un attivita' >
				Aggiungi curriculum
			</button>
		</a>
	<?php
	}
	?>


  <a href="management_cv.php" class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top:5%;">
    <button class="item-option col-lg-12 col-md-12 col-sm-12 col-xs-12">
      Gestisci il tuo curriculum
    </button>
  </a>

  <form class="filter-form col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top:5%;">
        <input class="user" type="text" name="filter" id="filter" style="width:80%;">
        <input type="submit" value="Search">
  </form>
  </div>
  <div class="articles col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 5%; width:100%">

	<?php
	$qry_a="SELECT * FROM CURRICULUM ;";
	$result_a = $mysqli->query($qry_a);
	while($row_a = $result_a->fetch_array())
	{
	?>
		<div class="article col-lg-3 col-md-3 col-sm-6 col-xs-9" >
          <a href="detail_curriculum.php?id=<?php echo $row_a['ID']; ?>" >
            <div class="preview" >
              <img src="<?php echo $row_a['url_foto']; ?>" />
            </div>
            <div class="description">
              <p><?php echo $row_a['nome']; ?>  <?php echo $row_a['cognome']; ?></p>
            </div>
          </a>
        </div>
	<?php
	}
	?>

    </div>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="js/js_login/main.js"></script> <!-- Gem jQuery -->
</body>
</html>

<<script type="text/javascript">

</script>