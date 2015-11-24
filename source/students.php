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
    	
    <link rel="stylesheet" href="css/font-awesome.min.css" >
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!--        CSS       -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/css_form/form_blue.css" rel="stylesheet">
    <link rel="stylesheet" href="css/pace.css" >
    <link rel="stylesheet" href="css/css_login/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="css/css_login/style.css"> <!-- Gem style -->
    <!--              -->
	<style>
		.cd-faq-trigger{
			color:#0090d7;
		}
		.cd-faq-trigger:hover{
			color:#0090d7;
		}
	</style>
	
    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/js_students/modernizr.js"></script> <!-- Modernizr -->
   <script src="js/pace.js"></script>
   <script src="js/js_students/jquery-2.1.1.js"></script>
<script src="js/js_students/jquery.mobile.custom.min.js"></script>
<script src="js/js_students/main.js"></script> <!-- Resource jQuery -->
    <!-- -->
	
		<!-- Per Login -->
    <script type="text/javascript" src="private/sha512.js"></script>
    <script src="js/js_login/modernizr.js"></script> <!-- Modernizr -->
     <script src="js/js_login/main.js"></script> <!-- Gem jQuery -->


 <script type="text/javascript" src="js/jquery-confirm.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery-confirm.css">
    
    
    <title>YPN | Forum Studenti</title>

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

    <div class="subheader">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" style="height:100px">
        <!--<div class="col-lg-3 col-md-3 col-sm-3 col-xs-9">
            <img src="images/img-menu-small.jpg" style="height:50px" alt="Logo"></a>
        </div>-->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:100px">
	        <img src="images/forum_logo.png" style="height: 100%;width: auto;"/> 
            <a style="vertical-align: top;">FORUM STUDENTI</a>
        </div>
      </div>

    </div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height: 200px;">

	<?php
	if(utenteLoggato($mysqli) == true) {
	?>
		<a href="addQuestion.php" class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top:5%;">
			<button class="item-option col-lg-12 col-md-12 col-sm-12 col-xs-12" >
			   Aggiungi domanda
			</button>
		</a>
	<?php
	}else{
	?>
		<a href="#" id="addAsk" class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top:5%;">
			<button class="item-option col-lg-12 col-md-12 col-sm-12 col-xs-12" title='Effettua il login per aggiungere un attivita' >
				Aggiungi domanda
			</button>
		</a>
	<?php
	}
	?>

		
	
	  </div>

    <!--include la pagina -->
    <section class="cd-faq">
	<ul class="cd-faq-categories">
		<?php
			$qry_c="SELECT * FROM MATERIE ;";
			$result_c = $mysqli->query($qry_c);
			$indice = 0;
			while($row_c = $result_c->fetch_array())
			{
				if($indice == 0){
			?>
				<li><a class="selected" href="<?php echo '#'.$row_c['MATERIA']; ?>"> <?php echo $row_c['MATERIA']; ?> </a></li>
			<?php
				}else{
				?>
				<li><a href="<?php echo '#'.$row_c['MATERIA']; ?>"><?php echo $row_c['MATERIA']; ?></a></li>
				
				<?php
					}
				$indice=1;
			}
			?>
		
	</ul> <!-- cd-faq-categories -->
	<div class="cd-faq-items">
		
		<?php
			$qry_c="SELECT * FROM MATERIE ;";
			$result_c = $mysqli->query($qry_c);
			
			while($row_c = $result_c->fetch_array())
			{ ?>
				<ul id="<? echo $row_c['MATERIA']; ?>" class="cd-faq-group">
				<li class="cd-faq-title"><h2><? echo $row_c['MATERIA']; ?></h2></li>
			<?	$qry_dom="SELECT D.ID,TESTO,DATA_INSERIMENTO AS DATA,DATE_FORMAT(DATA_INSERIMENTO,'%d/%m/%Y %H:%i') AS DATA_INSERIMENTO,ANONIMATO,USERNAME,USER_ID FROM DOMANDE D LEFT JOIN UTENTE U ON D.USER_ID = U.ID WHERE ID_MATERIA = ".$row_c['ID']." ORDER BY DATA ASC;";
				$result_dom = $mysqli->query($qry_dom);
				
				while($row_dom = $result_dom->fetch_array())
				{?>
				<li><?
				if ($row_dom['USER_ID'] == $_SESSION['user_id']){	
				if ($row_dom['ANONIMATO'] == 0){
				?>
				<a class="cd-faq-trigger" href="#0"><div style="float:right;font-size: 60%;"><?echo $row_dom['DATA_INSERIMENTO'].'   '.$row_dom['USERNAME']; ?><div onclick="confermaEliminazioneDomanda(<? echo $row_dom['ID'];?>)" style="font-weight: bolder;font-size: 130%;">Elimina</div> </div><br/><? echo $row_dom['TESTO']; ?> </a>
				<?}else{?>
				<a class="cd-faq-trigger" href="#0"><div style="float:right;font-size: 60%;"><?echo $row_dom['DATA_INSERIMENTO'].'   anonimo'?><div onclick="confermaEliminazioneDomanda(<? echo $row_dom['ID'];?>)" style="font-weight: bolder;font-size: 130%;">Elimina</div> </div><br/><? echo $row_dom['TESTO']; ?> </a>
				<?}}else{?>
					<? if ($row_dom['ANONIMATO'] == 0){
				?>
				<a class="cd-faq-trigger" href="#0"><div style="float:right;font-size: 60%;"><?echo $row_dom['DATA_INSERIMENTO'].'   '.$row_dom['USERNAME']; ?> </div><br/><? echo $row_dom['TESTO']; ?> </a>
				<?}else{?>
				<a class="cd-faq-trigger" href="#0"><div style="float:right;font-size: 60%;"><?echo $row_dom['DATA_INSERIMENTO'].'   anonimo'?></div><br/><? echo $row_dom['TESTO']; ?> </a>
				<?}
				 }?>
				<div class="cd-faq-content">
					<!-- elemento risposta-->
					<?php
					$qry_risp="SELECT R.ID,TESTO,DATA_INSERIMENTO AS DATA,DATE_FORMAT(DATA_INSERIMENTO,'%d/%m/%Y %H:%i') as DATA_INSERIMENTO,USERNAME,ANONIMATO,USER_ID FROM RISPOSTE R LEFT JOIN UTENTE U ON R.USER_ID = U.ID WHERE ID_DOMANDA = ".$row_dom['ID']." ORDER BY DATA ASC;";
					$result_risp = $mysqli->query($qry_risp);
					
					while($row_risp = $result_risp->fetch_array())
					{ ?>
					<div style="margin-top: 2%;margin-bottom: 2%;">
						<? if($row_risp['USER_ID'] == $_SESSION['user_id']){
							if($row_risp['ANONIMATO'] == 0){ ?>
						<div style="color:#0090d7;font-weight: bolder;"><?echo $row_risp['DATA_INSERIMENTO'].'   '.$row_risp['USERNAME'].':'; ?></div> 
						<div style="color:#0090d7;font-weight: bolder;cursor:pointer;float:right;" onclick="confermaEliminazioneRisposta(<? echo $row_risp['ID'];?>)" >Elimina</div>
						<p style="color:black;"><br/><? echo $row_risp['TESTO']; ?> </p>
						<hr align="left" size="1" width="300" color="rgb(23,148,201)" noshade>
						<? } else { ?>
						<div style="color:#0090d7;font-weight: bolder;"><?echo $row_risp['DATA_INSERIMENTO'].'   anonimo:'; ?></div> 
						<div style="color:#0090d7;font-weight: bolder;cursor:pointer;float:right;" onclick="confermaEliminazioneRisposta(<? echo $row_risp['ID'];?>)"  >Elimina</div>
						
						<p style="color:black;"><br/><? echo $row_risp['TESTO']; ?> </p>
						<hr align="left" size="1" width="300" color="rgb(23,148,201)" noshade>
						<?}}else{ 
							if($row_risp['ANONIMATO'] == 0){ ?>
						<div style="color:#0090d7;font-weight: bolder;"><?echo $row_risp['DATA_INSERIMENTO'].'   '.$row_risp['USERNAME'].':'; ?></div> 
						
						<p style="color:black;"><br/><? echo $row_risp['TESTO']; ?> </p>
						<hr align="left" size="1" width="300" color="rgb(23,148,201)" noshade>
						<? } else { ?>
						<div style="color:#0090d7;font-weight: bolder;"><?echo $row_risp['DATA_INSERIMENTO'].'   anonimo:'; ?></div> 
						

						<p style="color:black;"><br/><? echo $row_risp['TESTO']; ?> </p>
						<hr align="left" size="1" width="300" color="rgb(23,148,201)" noshade>
						<?}
						}?>
					</div>

			<?
					}?>
								  <?php 
				    if(utenteLoggato($mysqli) == true) {	?>
			    <div style="height: auto;">
				    <div style="border-color:#32481f;margin-bottom: 1%;margin-top: 3%;">
						<form action="post-add-answer.php" method="post"  enctype="multipart/form-data" >			    
							<input type="hidden" name="id_domanda" value="<?php echo $row_dom['ID'];?>" />
							<textarea name='answer' id="answer" cols='25' class="col-lg-12 col-md-12 col-sm-12 col-xs-12" rows='5' placeholder="Rispondi qui..."></textarea>			   		 <p>Vuoi essere anonimo? :</p>
						  <select name="anonimato" >
							  <option value="0">No</option>
							  <option value="1">Si</option>
						  </select><br/>
							<button type="submit" value="Aggiugi" style="font-size: 25px;" >Aggiungi risposta</button>
					   	</form>
					</div>
			    </div>
			    <?php }else{ ?>
			    	<div style="color:#0090d7;font-weight: bolder;">Effettua il login per rispondere alla domanda!</div>
				<?
				}?>
				</div>
				<?}?>
				</ul> <!-- cd-faq-group -->
			<?
			}
			?>
		
		
			
				
				
	</div> <!-- cd-faq-items -->
	<a href="#0" class="cd-close-panel">Close</a>
</section> <!-- cd-faq -->

    <!--fine include la pagina -->
 <script type="text/javascript">
                                    $('#addAsk').on('click', function () {
	                                        $.alert({
                                            title: 'Aggiungi Domanda',
                                            content: 'Effettua il login per aggiungere una domanda al forum',
                                            theme: 'supervan',
                                            animation:'RotateY',
                                            cancelButton: '',
                                            animationSpeed: 1000,
                                            columnClass: 'col-xs-12',
                                            confirm: function (id) {
                                             
                                            }                                        
                                            });
                                    });
					
						function confermaEliminazioneDomanda(id){
							
							$.confirm({
									title: 'Elimino Domanda',
									confirmButton: 'Elimina',
									cancelButton: 'Annulla',
									content: 'Sei sicuro di voler eliminare la domanda?',
									theme: 'supervan',
									confirmButtonClass: 'btn-info',
									cancelButtonClass: 'btn-danger',
									animation:'RotateY',
									animationSpeed: 1000,
									confirm: function () {
										$.ajax({
											url:'deleteAsk.php',
											type: 'GET',
											data: { 
												'id': id, 
												
											},
											success:function(response){
											
				
												if( response.indexOf("success") > -1){
													location.reload(true);
												}else{
													alert("Si è verificato qualche errore, prova a ricaricare la pagina e riprova, oppure contatta l'amministratore");
												}
											}
										});		
									}//,
									//cancel: function () {
										//non fare nulla.
									//}
							});
							
						}
						function confermaEliminazioneRisposta(id){
							
							$.confirm({
									title: 'Elimino Risposta',
									confirmButton: 'Elimina',
									cancelButton: 'Annulla',
									content: 'Sei sicuro di voler eliminare la risposta?',
									theme: 'supervan',
									confirmButtonClass: 'btn-info',
									cancelButtonClass: 'btn-danger',
									animation:'RotateY',
									animationSpeed: 1000,
									confirm: function () {
										$.ajax({
											url:'deleteAnswer.php',
											type: 'GET',
											data: { 
												'id': id, 
												
											},
											success:function(response){
											
								
																				
												if( response.indexOf("success") > -1){
													location.reload(true);
												}else{
													alert("Si è verificato qualche errore, prova a ricaricare la pagina e riprova, oppure contatta l'amministratore");
												}
											}
										});		
									}//,
									//cancel: function () {
										//non fare nulla.
									//}
							});
							
						}
	   
</script>
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