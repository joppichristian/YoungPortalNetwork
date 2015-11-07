<!DOCTYPE html>
<html>
<?php
include 'private/connessione-db.php';
include 'private/utility-login.php';

my_session_start();

$linkIndietro="events.php";
$testoIndietro = "TORNA INDIETRO";

?>
<head>
  <title>YPN | Aggiungi Evento</title>
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

  <!-- JQuery e CSS per data -->
  <link rel="stylesheet" href="css/css_jquery/jquery.datetimepicker.css">
  <style type="text/css">

		.custom-date-style {
			background-color: red !important;
		}

		.input{	
		}
		.input-wide{
			width: 500px;
		}

   </style>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  
  <!--<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script src="js/jquery-ui-timepicker-addon.js"></script>-->
  <script src="js/jquery.js"></script>
  <script src="js/jquery.datetimepicker.full.min.js"></script>
  
  <!-- JavaScript -->
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/pace.js"></script>
  
	<!-- Per Login -->
  <script type="text/javascript" src="private/sha512.js"></script>
  <script src="js/js_login/modernizr.js"></script> <!-- Modernizr -->  
  <script src="js/js_login/main.js"></script> <!-- Gem jQuery -->

  
 
  <script language="JavaScript" type="text/JavaScript">
	function validateForm()
	{	
		var message = "ATTENZIONE:\n";
		var campi   = "";
		
		var titolo = document.getElementById("titolo").value;		
		var localita = document.getElementById("localita").value;				
		var descrizione  = document.getElementById("descrizione").value;
	 	 
		if(titolo==""){
			campi = campi+" \n[titolo] OBBLIGATORIO";			
		}
		if(localita==""){
			campi = campi+" \n[localita] OBBLIGATORIO";			
		}
		if(descrizione==""){
			campi = campi+" \n[descrizione] OBBLIGATORIO";			
		}
		
		if(document.getElementById("file").value.length < 1) {
		   campi = campi+" \n[immagine] OBBLIGATORIO";			
		}
		
		if(document.getElementById("data_inizio").value == "") {
		   campi = campi+" \n[data inizio] OBBLIGATORIO";			
		}
		
		if(document.getElementById("data_fine").value == "") {
		   campi = campi+" \n[data fine] OBBLIGATORIO";			
		}
		
		if(campi!=("")){
			alert(message+campi);
			return false;
		}
		else
		{		
			document.submitFormEvent.action = 'post-add-event.php';
			document.submitFormEvent.submit();
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
          <a>NUOVO EVENTO</a>
      </div>
    </div>
  </div>
  <?php
  if(utenteLoggato($mysqli) == true) {
  ?>
	  <form id="submitFormEvent" name="submitFormEvent" onsubmit="return validateForm();" method="post"  enctype="multipart/form-data" >
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;font-size: 20px;" >
		  <!--Esempio text -->
		  <h1>Titolo:</h1>
		  <input type="text" id="titolo" name="titolo" placeholder="Titolo" />
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;font-size: 20px;" >
		  <!--Esempio text -->
		  <h1>Localit&agrave;:</h1>
		  <input type="text" id="localita" name="localita" placeholder="Localita" />
		</div>
		<!--Esempio textarea -->
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;font-size: 20px;">
		  <p>Descrizione:</p>
		  <textarea rows="5" id="descrizione" name="descrizione" cols="100"  placeholder="Descrizione"></textarea>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;font-size: 20px;">
		<p>Data e Ora di Inizio: (gg/mm/aaaa hh:mm) </p>
		    <input type="text" id="data_inizio" name="data_inizio" />
		    <script>	  
				//if ( $('#data_inizio')[0].type != 'datetime-local' ){
					$('#data_inizio').datetimepicker();					
				//}	
			</script>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;font-size: 20px;">
		<p>Data e Ora di Fine: (gg/mm/aaaa hh:mm) </p>			
		    <input type="text" id="data_fine" name="data_fine" />
		    <script>
				//if ( $('#data_fine')[0].type != 'datetime-local' ){
					$('#data_fine').datetimepicker();
				//}	
			</script>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;font-size: 20px;">
		  <p>Categoria:</p>
		  <select id="categoria" name="categoria" >
			<?php
			$qry_c="SELECT * FROM CAT_EVENTI ;";
			$result_c = $mysqli->query($qry_c);
			while($row_c = $result_c->fetch_array())
			{
			?>
				<option value="<?php echo $row_c['ID']; ?>"><?php echo $row_c['NOME']; ?></option>
			<?php
			}
			?>		
		  </select>
		</div>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;font-size: 25px;" >
		  <p>Immagine:</p>
		 
			<input type="file" name="file" id="file" />
			<p>N.B.: L'immagine verrà usata come anteprima dell'evento.</p>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;" >
			<p>Continuando salverai l'evento rendendolo visibile agli altri utenti del sito ed </br> <b> avrai la possibilità di aggiungere alcune foto.</b></p>
		  <button type="submit" value="Aggiugi" style="font-size: 25px;" >Aggiungi</button>
		  <button type="reset" value="Cancella" style="font-size: 25px;">Cancella</button>
		<div>

	  </form>
  <?php
  }else{
		echo "Devi effettuare il login per aggiungere un evento";
  }	  
  ?>  
</body>
</html>
