<html>
  <?php
  include 'private/connessione-db.php';
  include 'private/utility-login.php';

  my_session_start();

  $linkIndietro = "activities.php";
  $testoIndietro = "TORNA INDIETRO";

  ?>
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
			document.commentForm.action = 'post-add-comment_activity.php';
			document.commentForm.submit();
		}	
	}
  </script> 

    
	<script> 
		function apriPopupCondivisioneFB() { 
			newin = window.open('http://www.facebook.com/share.php?u='+window.location.href,'titolo','scrollbars=no,resizable=yes, width=400,height=400,status=no,location=no,toolbar=no');
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
  
  	<?php

	$id_attivita = $_GET["id"];

	if(!isset($id_attivita)){
		die("Errore, il link non è corretto. Torna indietro e riprova.");
	}

	$titolo = "";
	$localita = "";
	$descrizione = "";
	$categoria_id = "";
	$utente_creatore = "";
	$url_foto = "";
	$data_inserimento = "";

	$qry_a="SELECT TITOLO,LOCALITA,DESCRIZIONE,CATEGORIA_ID,UTENTE_CREATORE,URL_FOTO,DATE_FORMAT(DATA_INSERIMENTO, '%d/%m/%Y %H:%i') as DATA_INSERIMENTO FROM ATTIVITA WHERE ID='$id_attivita' ;";
	$result_a = $mysqli->query($qry_a);
	while($row_a = $result_a->fetch_array())
	{
		$titolo = $row_a['TITOLO'];
		$localita = $row_a['LOCALITA'];
		$descrizione = $row_a['DESCRIZIONE'];
		$categoria_id = $row_a['CATEGORIA_ID'];
		$utente_creatore = $row_a['UTENTE_CREATORE'];
		$url_foto = $row_a['URL_FOTO'];
		$data_inserimento = $row_a['DATA_INSERIMENTO'];
	}
	
	$title=urlencode($titolo);
 
	$url=urlencode('http://www.youngportalnetwork.it/activity.php?id='.$id_attivita);
	 
	$summary=urlencode($localita);
	 
	$image=urlencode($url_foto);


	?>
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
	         <?php echo $data_inserimento; ?></div>
	          <div id="localita">
	        <?php echo $localita; ?></div>
	         <div class="info-description col-lg-12 col-md-12 col-sm-12 col-xs-12" id="description" style="text-align:left; margin-top:5%;">
         <?php echo $descrizione; ?>
		    </div>
	     </div>
	     <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		 	<img src="<?php echo $url_foto; ?>" id="anteprima" />
	     </div>
        
      </div>



      <div class="main-info col-lg-12 col-md-12 col-sm-12 col-xs-12" style="float:left;" >
	      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" style="margin-top:1%;">
            <?php
              include("gallery_activity.php");
            ?>
        	</div>
             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top:1%;">		 
            <a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;p[images][0]=<?php echo $image;?>','sharer','toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)"><img src="images/fb.svg" alt="Condividi" style="width:15%;height:15%;"/></a>
			</div>
		</div>
		



    </div>
    
    <!-- Parte commenti -->
    <?php 
	    if(utenteLoggato($mysqli) == true) {	?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    <div class="commento col-lg-6 col-md-6 col-sm-6 col-xs-6 " style="border-color:#32481f;">
			<form id="commentForm" name="commentForm" onsubmit="return validateForm();" method="post"  enctype="multipart/form-data" >			    
				<input type="hidden" name="id" value="<?php echo $id_attivita;?>" />
				<textarea name='testo_commento' id="testo_commento" cols='25' class="col-lg-12 col-md-12 col-sm-12 col-xs-12" rows='5' placeholder="Commenta qui..."></textarea>			   	
				<button type="submit" value="Aggiugi" style="font-size: 25px;" >Aggiungi commento</button>
		   	</form>
		</div>
    </div>
    <?php } ?>
	<div class="commenti col-lg-6 col-md-6 col-sm-6 col-xs-6" id="commenti" >
	<?php
		
		$query_sql = "SELECT CA.ID, TESTO, DATE_FORMAT(DATA_ORA_INSERIMENTO,'%d/%m/%Y %H:%i') as DATA_ORA_INSERIMENTO,USER_ID, USERNAME 
					  FROM COMMENTO_ATTIVITA CA
					  LEFT JOIN UTENTE U ON CA.USER_ID = U.ID
					   WHERE ATTIVITA_ID =". $id_attivita ."
					   ORDER BY DATA_ORA_INSERIMENTO DESC;";
	
		$result = $mysqli->query($query_sql);	 
		while($row = $result->fetch_array())
		{
			if($row['USER_ID'] == $_SESSION['user_id']){
				?>
					 <div class="commento col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="border-color:#32481f">
				    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				    		<img class="user-profile col-lg-12 col-md-12 col-sm-12 col-xs-12"  src="images/utente.jpg" />
				    	</div>
				    	<div class="info col-lg-9 col-md-9 col-sm-9 col-xs-9">
					    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="color:rgb(50, 72, 31);" id="utente">
						    	<? echo $row['USERNAME']; ?>
					    	</div>
					    	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" style="color:rgb(50, 72, 31);" id="data_inserimento" >
						    	<? echo $row['DATA_ORA_INSERIMENTO']; ?>
					    	</div>
					    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" id="elimina" >
						    	<a href="delete_comment.php?id=<? echo $row['ID'];  ?>&att=<? echo $id_attivita;  ?>" style="color:#32481f" >Elimina</a>
					    	</div>
					    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="testo">
						    	<? echo $row['TESTO']; ?>
					    	</div>
				    	</div>
			    	</div>

				<?
			}
			else{?>
				 <div class="commento col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="border-color:#32481f">
			    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
			    		<img class="user-profile col-lg-12 col-md-12 col-sm-12 col-xs-12"  src="images/utente.jpg" />
			    	</div>
			    	<div class="info col-lg-9 col-md-9 col-sm-9 col-xs-9">
				    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" id="utente">
					    	<? echo $row['USERNAME']; ?>
				    	</div>
				    	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" id="data_inserimento" >
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
