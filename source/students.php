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
			color:#1795ca;
		}
		.cd-faq-trigger:hover{
			color:#1795ca;
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
 <script language="JavaScript" type="text/JavaScript">
	function displayEffettuaLogin(){
		alert("Effettua prima il login.");
	}
  </script>

    <!-- -->
    <title>YPN | Forum Studenti</title>

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

    <div class="subheader">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" style="height:100px">
        <!--<div class="col-lg-3 col-md-3 col-sm-3 col-xs-9">
            <img src="images/img-menu-small.jpg" style="height:50px" alt="Logo"></a>
        </div>-->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <a>FORUM STUDENTI</a>
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
		<a href="#" class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top:5%;">
			<button class="item-option col-lg-12 col-md-12 col-sm-12 col-xs-12" onClick="displayEffettuaLogin();" title='Effettua il login per aggiungere un attivita' >
				Aggiungi domanda
			</button>
		</a>
	<?php
	}
	?>

		
	  <form class="filter-form col-lg-9 col-md-9 col-sm-9 col-xs-12" style="margin-top:5%;">
	        <input class="user" type="text" name="filter" id="filter" value="<?php echo $filter; ?>" style="width:80%;">
	        <input type="submit" class="item-option" value="Search">
	  </form>
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
			<?	$qry_dom="SELECT * FROM DOMANDE WHERE ID_MATERIA = ".$row_c['ID']." ORDER BY DATA_INSERIMENTO DESC LIMIT 5;";
				$result_dom = $mysqli->query($qry_dom);
				
				while($row_dom = $result_dom->fetch_array())
				{?>
				<li>
				<a class="cd-faq-trigger" href="#0"><? echo $row_dom['TESTO']; ?></a>
				<div class="cd-faq-content">
					<!-- elemento risposta-->
					<?php
					$qry_risp="SELECT TESTO,DATE_FORMAT(DATA_INSERIMENTO,'%d/%m/%Y %H:%i') as DATA_INSERIMENTO,USERNAME,ANONIMATO FROM RISPOSTE R LEFT JOIN UTENTE U ON R.USER_ID = U.ID WHERE ID_DOMANDA = ".$row_dom['ID']." ORDER BY DATA_INSERIMENTO DESC LIMIT 5;";
					$result_risp = $mysqli->query($qry_risp);
					
					while($row_risp = $result_risp->fetch_array())
					{ ?>
					<div style="margin-top: 2%;margin-bottom: 2%;">
						<? if($row_risp['ANONIMATO'] == 0){ ?>
						<div style="color:#1795ca;font-weight: bolder;"><?echo $row_risp['DATA_INSERIMENTO'].'   '.$row_risp['USERNAME'].':'; ?></div> 
						<p><br/><? echo $row_risp['TESTO']; ?> </p>
						<hr align="left" size="1" width="300" color="rgb(23,148,201)" noshade>
						<? } else { ?>
						<div style="color:#1795ca;font-weight: bolder;"><?echo $row_risp['DATA_INSERIMENTO'].'   anonimo:'; ?></div> 
						<p><br/><? echo $row_risp['TESTO']; ?> </p>

						<?} ?>
					</div>

			<?
					}
				}?>
				</ul> <!-- cd-faq-group -->
			<?
			}
			?>
		
		
			
				
				
	</div> <!-- cd-faq-items -->
	<a href="#0" class="cd-close-panel">Close</a>
</section> <!-- cd-faq -->

    <!--fine include la pagina -->

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