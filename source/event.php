<html>
  <?php
  include 'private/connessione-db.php';
  include 'private/utility-login.php';

  my_session_start();

  $linkIndietro = "events.php";
  $testoIndietro = "TORNA INDIETRO";

  ?>
  <head>
    <title>YPN | Evento</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--        CSS       -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/css_form/form_blue.css" rel="stylesheet">
    <link href="css/css_events/events.css" rel="stylesheet">
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

	    <script language="JavaScript" type="text/JavaScript">
	function validateForm()
	{	
		var message = "ATTENZIONE:\n";
		var campi = "";
		var testo_commento = document.getElementById("testo_commento").value;		
	
	 	 
		if(testo_commento =="..."){
			campi = campi+" \nNESSUN COMMENTO INSERITO";			
		}
		if(campi!=("")){
			alert(message+campi);
			return false;
		}
		else
		{		
			document.commentForm.action = 'post-add-comment_event.php';
			document.commentForm.submit();
		}	
	}
  </script>
  
  
  <?php

	$id_evento = $_GET["id"];

	if(!isset($id_evento)){
		die("Errore, il link non è corretto. Torna indietro e riprova.");
	}

	$titolo = "";
	$localita = "";
	$descrizione = "";
	$categoria_id = "";
	$utente_creatore = "";
	$url_foto = "";
	$data_inserimento = "";

	$qry_a="SELECT TITOLO,LOCALITA,DESCRIZIONE,CATEGORIA_ID,UTENTE_CREATORE,URL_FOTO,DATE_FORMAT(DATA_INIZIO, '%d/%m/%Y %H:%i') as DATA_INIZIO,DATE_FORMAT(DATA_FINE, '%d/%m/%Y %H:%i') AS DATA_FINE FROM EVENTI WHERE ID ='$id_evento' ;";
	$result_a = $mysqli->query($qry_a);
	while($row_a = $result_a->fetch_array())
	{
		$titolo = $row_a['TITOLO'];
		$localita = $row_a['LOCALITA'];
		$descrizione = $row_a['DESCRIZIONE'];
		$data_inizio = $row_a['DATA_INIZIO'];
		$data_fine = $row_a['DATA_FINE'];
		$categoria_id = $row_a['CATEGORIA_ID'];
		$utente_creatore = $row_a['UTENTE_CREATORE'];
		$url_foto = $row_a['URL_FOTO'];
	}

	?>
		<!-- Meta tag condivisione FB -->
    <meta property="og:title" content="<? echo $titolo; ?>" />
	<meta property="og:type" content="WebSite" />
	<meta property="og:url" content="http://www.youngportalnetwork.it/event.php?id=<? echo $id_evento;?>" />
	<meta property="og:image" content="<? echo $url_foto; ?>" />
	<meta property="og:description" content="Per saperne di più clicca qui..." />

  
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
  
  	
    <div class="subheader col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" style="height:100px">

            <a><?php echo $titolo; ?></a>

      </div>
    </div>

        <div class="main-info col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom:1%;">
	     <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
	        <div id="title" style="font-size: 400%;">
	        <?php echo $titolo; ?> </div>
	        <div id="data">
		      Inizio Evento:
	         <?php echo $data_inizio; ?><br/>Fine Evento:
	         <?php echo $data_fine; ?></div>
	          <div id="localita">
		          Luogo Evento:
	        <?php echo $localita; ?></div>
	         <div class="info-description col-lg-12 col-md-12 col-sm-12 col-xs-12" id="description" style="text-align:left; margin-top:5%;">
         <?php echo $descrizione; ?>
		    </div>
	     </div> 
	     <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top:1%;">
		 	<img src="<?php echo $url_foto; ?>" id="anteprima" />
	     </div>
        
      </div>
<div class="main-info col-lg-12 col-md-12 col-sm-12 col-xs-12" style="float:left;" >
	      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" style="margin-top:1%;">
            <?php
              include("gallery_events.php");
            ?>
        	</div>
             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top:1%;">		 
           <a name="fb_share" type="button_count" href="http://www.facebook.com/sharer.php">Condividi su Facebook</a>
            <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>

			</div>
		</div>


		    <!-- Parte commenti -->
    <?php 
	    if(utenteLoggato($mysqli) == true) {	?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 " style="border-color:#32481f;margin-bottom: 1%;margin-top: 3%;">
			<form id="commentForm" name="commentForm" onsubmit="return validateForm();" method="post"  enctype="multipart/form-data" >			    
				<input type="hidden" name="id" value="<?php echo $id_evento;?>" />
				<textarea name='testo_commento' id="testo_commento" cols='25' class="col-lg-12 col-md-12 col-sm-12 col-xs-12" rows='5' placeholder="Commenta qui..."></textarea>			   	
				<button type="submit" value="Aggiugi" style="font-size: 25px;" >Aggiungi commento</button>
		   	</form>
		</div>
    </div>
    <?php } ?>

    </div>
	<div class="commenti col-lg-6 col-md-6 col-sm-12 col-xs-12" id="commenti" >
	<?php
		
		$query_sql = "SELECT CE.ID, TESTO, DATE_FORMAT(DATA_ORA_INSERIMENTO,'%d/%m/%Y %H:%i') as DATA_ORA_INSERIMENTO,USER_ID, USERNAME 
					  FROM COMMENTO_EVENTI CE
					  LEFT JOIN UTENTE U ON CE.USER_ID = U.ID
					   WHERE EVENTO_ID =". $id_evento ."
					   ORDER BY DATA_ORA_INSERIMENTO DESC;";
	
		$result = $mysqli->query($query_sql);	 
		while($row = $result->fetch_array())
		{
			if($row['USER_ID'] == $_SESSION['user_id']){
				?>
					 <div class="commento col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="border-color:#1795ca">
				    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-0">
				    		<img class="user-profile"  src="images/utente.jpg" style="max-width:100%; height:auto;" />
				    	</div>
				    	<div class="info col-lg-9 col-md-9 col-sm-9 col-xs-12">
					    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="color:#1795ca;" id="utente">
						    	<? echo $row['USERNAME']; ?>
					    	</div>
					    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="color:#1795ca;" id="data_inserimento" >
						    	<? echo $row['DATA_ORA_INSERIMENTO']; ?>
					    	</div>
					    	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" id="elimina" >
						    	<a href="delete_comment_event.php?id=<? echo $row['ID'];  ?>&ev=<? echo $id_evento;  ?>" style="color:#1795ca" >Elimina</a>
					    	</div>
					    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="testo">
						    	<? echo $row['TESTO']; ?>
					    	</div>
				    	</div>
			    	</div>

				<?
			}
			else{?>
				 <div class="commento col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="color:#1795ca;">
			    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-0">
			    		<img class="user-profile"  src="images/utente.jpg" style="max-width:100%; height:auto;"/>
			    	</div>
			    	<div class="info col-lg-9 col-md-9 col-sm-9 col-xs-12">
				    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="color:#1795ca;" id="utente">
					    	<? echo $row['USERNAME']; ?>
				    	</div>
				    	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="color:#1795ca;" id="data_inserimento" >
					    	<? echo $row['DATA_ORA_INSERIMENTO']; ?>
				    	</div>
				    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="testo">
					    	<? echo $row['TESTO']; ?>
				    	</div>
			    	</div>
		    	</div>

			<?	
			}
	 } ?>
    </div>

   

   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <script src="js/js_login/main.js"></script> <!-- Gem jQuery -->
  </body>
</html>
