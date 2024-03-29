<html>
<?php
include 'private/connessione-db.php';
include 'private/utility-login.php';

my_session_start();

$linkIndietro="management_events.php";
$testoIndietro = "TORNA INDIETRO";

?>
<head>
  <title>YPN | Modifica Evento</title>
  <link rel="icon" href="images/icon.ico" />
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

  <!-- JQuery e CSS per data inizio e fine -->
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
  <script src="js/jquery.js"></script>
  <script src="js/jquery.datetimepicker.full.min.js"></script>
  <!-- Fine JS per data inizio e fine -->
  
  <!-- Per Login -->
  <script type="text/javascript" src="private/sha512.js"></script>
  <script src="js/js_login/modernizr.js"></script> <!-- Modernizr -->  
  <script src="js/js_login/main.js"></script> <!-- Gem jQuery -->
    
   <!-- JavaScript -->
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/pace.js"></script>
  <!-- -->

  <!-- Per confirm dialog -->
  <script type="text/javascript" src="js/jquery-confirm.js"></script>
  <link rel="stylesheet" type="text/css" href="css/jquery-confirm.css">

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
		
		
		if(document.getElementById("data_inizio").value.length < 1) {
		   campi = campi+" \n[data inizio] OBBLIGATORIO";			
		}
		
		if(document.getElementById("data_fine").value.length < 1) {
		   campi = campi+" \n[data fine] OBBLIGATORIO";			
		}
		
		if(campi!=("")){
			$.alert({
				title: 'Modifica Evento',
				content: message+campi,
				theme: 'supervan',
				animation:'RotateY',
				 animationSpeed: 1000,
				confirm: function (id) {
				 
				}                                        
				});
			return false;
		}
		else
		{		
			//prima di fare il subit del form controllo parolacce:
			var stringToCheck = ' ' + titolo + ' ' + localita + ' ' + descrizione;
			$.ajax({
				url:'swear_check.php',
				type: 'POST',
				data: { 
					'stringToCheck': stringToCheck 
				},
				success:function(response){
				
					//alert("Resp:"+response);
					//alert("response index of success="+response.indexOf("success"));
					if( response.indexOf("success") > -1){
						//Niente parolacce
						document.submitForm.action = 'post-updateEvent.php';
						document.submitForm.submit();
					}else{
						//Attenzione a parolaccia
						$.alert({
							title: 'Modifica Evento',
							content: 'Attenzione! Sono state inserite parole offensive. Una condotta scorretta potrebbe portare alla disattivazione del profilo!',
							theme: 'supervan',
							animation:'RotateY',
							animationSpeed: 1000,
							confirm: function (id) {
							 
							}                                        
						});
						return false;
					}
				}
			});			
			return false;

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
          <a>MODIFICA EVENTO</a>
      </div>
    </div>
  </div>
  <?php

  $id_evento = $_GET["id"];

  if(isset($id_evento)){

	$titolo = "";
	$localita = "";
	$descrizione = "";
	$data_inizio = "";
	$data_fine = "";
	$categoria_id = "";
	$utenteCreatore = "";
	$url_foto_attuale = "";

	//$qry="SELECT TITOLO,LOCALITA,DESCRIZIONE,CATEGORIA_ID,UTENTE_CREATORE,URL_FOTO,DATE_FORMAT(DATA_INIZIO, '%d/%m/%Y %H:%i') as DATA_INIZIO,DATE_FORMAT(DATA_FINE, '%d/%m/%Y %H:%i') AS DATA_FINE FROM EVENTI WHERE ID ='$id_evento' ;";
	$qry="SELECT * FROM EVENTI WHERE ID ='$id_evento' ;";

	$result = $mysqli->query($qry);
	while($row = $result->fetch_array())
	{
		$titolo = $row['TITOLO'];
		$localita = $row['LOCALITA'];
		$descrizione = $row['DESCRIZIONE'];
		$data_inizio = $row['DATA_INIZIO'];
		$data_fine = $row['DATA_FINE'];
		$categoria_id = $row['CATEGORIA_ID'];
		$utente_creatore = $row['UTENTE_CREATORE'];
		$url_foto = $row['URL_FOTO'];

	}

	if(utenteLoggato($mysqli) == true ) {

		$idUtente = $_SESSION['user_id'];

		
		if( $idUtente == $utente_creatore ) {
	?>
		  <form  id="submitForm" name="submitForm" onsubmit="return validateForm();" method="post"  enctype="multipart/form-data" >
			  <input type="hidden" id="id" name="id" value="<?php echo $id_evento;?>" />
			  	<input type="hidden" id="utenteCreatore" name="utenteCreatore" value="<?php echo $utente_creatore;?>" />

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;font-size: 20px;" >
		  <!--Esempio text -->
		  <p>Titolo:</p>
		  <input type="text" id="titolo" name="titolo" value="<?php echo $titolo;?>" placeholder="Titolo" />
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;font-size: 20px;" >
		  <!--Esempio text -->
		  <p>Localit&agrave;:</p>
		  <input type="text" id="localita" name="localita" value="<?php echo $localita;?>" placeholder="Localita" />
		</div>
		<!--Esempio textarea -->
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;font-size: 20px;">
		  <p>Descrizione:</p>
		  <textarea rows="5" id="descrizione" name="descrizione"  cols="100"  placeholder="Descrizione"><?php echo $descrizione; ?></textarea>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;font-size: 20px;">
		<p>Data e Ora di Inizio: (gg/mm/aaaa hh:mm)<?php echo $data_inizio; ?> </p>
		    <input type="text" id="data_inizio" name="data_inizio" />
		    <script>	  
				//if ( $('#data_inizio')[0].type != 'datetime-local' ){
					$('#data_inizio').datetimepicker({ value: '<?php echo substr( str_replace("-","/",$data_inizio) , 0, -3); ?>' });					
				//}	
			</script>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;font-size: 20px;">
		<p>Data e Ora di Fine: (gg/mm/aaaa hh:mm)<?php echo $data_fine; ?> </p>			
		    <input type="text" id="data_fine" name="data_fine" />
		    <script>
				//if ( $('#data_fine')[0].type != 'datetime-local' ){
					$('#data_fine').datetimepicker({ value:'<?php echo substr( str_replace("-","/",$data_fine) , 0, -3); ?>' });
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
					if($row_c['ID'] == $categoria_id){
				?>
						<option selected value="<?php echo $row_c['ID']; ?>"><?php echo $row_c['NOME']; ?></option>
				<?php
					}else{
				?>
						<option value="<?php echo $row_c['ID']; ?>"><?php echo $row_c['NOME']; ?></option>
				<?php
					}
				}
				?>	
		  </select>
		</div>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;font-size: 25px;" >
			  <p>Immagine Corrente:</p>
				<img src="<?php echo $url_foto;?>" />

				<p>Per Cambiare Immagine utilizza il bottone qui sotto:</p>
				<input type="file" accept="image/jpeg,image/png,image/gif" name="file" id="file" />
				<p>N.B.: L'immagine verrà usata come anteprima dell'evento.</p>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;" >
			  <button type="submit" value="Salva" style="font-size: 25px;" >Salva</button>
			   <button type="reset"  onclick="window.location='management_events.php';" value="Annulla" style="font-size: 25px;">Annulla</button>
			<div>


	  </form>	  
	  <?php
		}else{
			echo $idUtente."/".$utente_creatore."Errore. Questo evento non e' stata creato da te.";
	    }
	}else{
			echo "Devi effettuare il login per aggiungere un evento";
    }
  }else{
	  echo "Errore. Prova a tornare indietro e riprova.";
  }
  ?>
</body>
</html>
