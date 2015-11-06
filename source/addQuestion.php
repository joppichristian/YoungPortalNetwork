<html>
<?php
include 'private/connessione-db.php';
include 'private/utility-login.php';

my_session_start();

$linkIndietro="activities.php";
$testoIndietro = "TORNA INDIETRO";

?>
<head>
  <title>YPN | Aggiungi Domanda</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--        CSS       -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/css_form/form_blue.css" rel="stylesheet">
  <link href="css/css_events/events.css" rel="stylesheet">
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
  
  <!-- JS -->
  
  <script language="JavaScript" type="text/JavaScript">
	function validateForm()
	{	
		var message = "ATTENZIONE:\n";
		var campi   = "";
		
		var domanda = document.getElementById("question").value;		
	 	 
		if(domanda==""){
			campi = campi+" \n[Domanda] OBBLIGATORIO";			
		}
		
		if(campi!=("")){
			alert(message+campi);
			return false;
		}
		else
		{		
			document.questionForm.action = 'post-add-question.php';
			document.questionForm.submit();
		}		
	}
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
          <a>NUOVA DOMANDA</a>
      </div>
    </div>
  </div>
  <?php
  if(utenteLoggato($mysqli) == true) {
  ?>
	  <form id="questioForm" name="questionForm" onsubmit="return validateForm();" method="post"  enctype="multipart/form-data" >
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
		  <!--Esempio text -->
		  <h1>Domanda:</h1>
		  <textarea rows="5" id="question" name="question" cols="100"  placeholder="Inserisci qui la tua domanda..."></textarea>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;">
		  <p>Materia:</p>
		  <select id="materia" name="materia" >
			<?php
			$qry_c="SELECT * FROM MATERIE ;";
			$result_c = $mysqli->query($qry_c);
			while($row_c = $result_c->fetch_array())
			{
			?>
				<option value="<?php echo $row_c['ID']; ?>"><?php echo $row_c['MATERIA']; ?></option>
			<?php
			}
			?>
		  </select>
		</div>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;font-size: 20px;" >
		  <p>Vuoi essere anonimo? :</p>
		  <select name="anonimato" >
			  <option value="0">No</option>
			  <option value="1">Si</option>
		  </select>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;" >
			<p>Continuando salverai la domanda rendendola visibile agli altri utenti del sito.</p>
			<button type="reset" value="Cancella" style="font-size: 25px;">Annulla</button>
		    <button type="submit" value="Aggiugi" style="font-size: 25px;" >Continua </button>
		  
		<div>

	  </form>
  <?php
  }else{
		echo "Devi effettuare il login per aggiungere una domanda";
  }
  ?>
</body>
</html>
