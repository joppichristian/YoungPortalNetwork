<!DOCTYPE html>
<html>
<?php
include 'connessione-db.php';
include 'utility-login.php';

my_session_start();

$redirect="pagina-privata.php";
?>
<head>
	<meta charset="UTF-8">
	<title>YOUNG PORTAL TEST</title>
	<link href="../css/style.css" rel="stylesheet" type="text/css">	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"> </script>	 
</head>
<body>
    
	<h1> PROVA FORM LOGIN </h1>	
	<div>
		<div class="body">
			
		<?php
		if(utenteLoggato($mysqli) == true) {
			echo '</br> SEIGIA LOGGATO!!!!!!!!!!!!!!!!!!! </br>';
		}else{
			echo '<br/>DEVI EFFETTUARE IL LOGIN  <br/>';
			
			echo '</br></br></br></br></br></br>';
			include("login-form.php");
			echo '</br></br></br></br></br></br>';
		}
		
		?>	
			
		</div>
	</div>
 
 
</body>
</html>