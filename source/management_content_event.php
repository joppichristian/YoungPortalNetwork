<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/css_management/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/css_management/style_event.css"> <!-- Gem style -->
	
	<!-- Per Login -->
    <script type="text/javascript" src="private/sha512.js"></script>
    <script src="js/js_login/modernizr.js"></script> <!-- Modernizr -->
   
	<script language="JavaScript" type="text/JavaScript">
  function eliminaEvento(id)
	{
		var elimina = confirm("Sicuro di voler eliminare l'evento: id="+id);
		if (elimina == true) {
	
			$.ajax({
				url:'post-deleteEvent.php',
				type: 'POST',
				data: { 
					'id': id, 
					'cod': 'young123' 
				},
				success:function(response){
				
					//alert("Resp:"+response);
					//alert("response index of success="+response.indexOf("success"));
													
					if( response.indexOf("success") > -1){
						alert("Evento eliminato con successo...");
						location.reload(true);
					}else{
						alert("Si è verificato qualche errore, prova a ricaricare la pagina e riprova, oppure contatta l'amministratore");
					}
				}
			});		
	
		} else {
			//alert("You pressed Cancel!");
		}

	}
  </script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


</head>
<body>
 <?php
  if(utenteLoggato($mysqli) == true) {
  ?>
<section id="cd-table">
	<header class="cd-table-column">
		<h2>Evento</h2>
		<ul>
			<li>Localit&agrave;</li>
			<li>Descrizione</li>
			<li>Foto Copertina</li>
			<li>Data e ora inserimento</li>
			<!--<li>Modifica</li>
			<li>Elimina</li>-->
		</ul>
	</header>

	<div class="cd-table-container">
		<div class="cd-table-wrapper">

		<?php
		$idUtente = $_SESSION['user_id'];	
		
		$qry="SELECT * FROM EVENTI WHERE UTENTE_CREATORE = '$idUtente' ;";
		$result = $mysqli->query($qry);
		while($row = $result->fetch_array())
		{ 
		?>
			<div class="cd-table-column">
				<h2><?php echo $row['TITOLO']; ?></h2>
				<ul>
					<li><?php echo $row['LOCALITA']; ?></li>
					<li><?php echo substr($row['DESCRIZIONE'],0,60); ?></li>
					<li><img src="<?php echo $row['URL_FOTO']; ?>" /></li>
					<li><?php echo $row['DATA_INSERIMENTO']; ?></li>

					<li><a class="cd-select" href="add-foto-event.php?id=<?php echo $row['ID']; ?>" style="color:rgba(23, 149, 202, 1);">gestisci foto</a></li>
					<li><a class="cd-select" href="updateEvent.php?id=<?php echo $row['ID']; ?>" style="color:rgba(23, 149, 202, 1)"><i class="fa fa-pencil-square-o" style=" margin-top:3px;"></i></a></li>
					<li><a class="cd-select" onclick='eliminaEvento(<?php echo $row['ID']; ?>);' style="color:red; cursor:pointer;"><i class="fa fa-times" style=" margin-top:3px;"></i></a></li>
				</ul>
			</div> <!-- cd-table-column -->
		<?php
		}
		?>
		 

		</div> <!-- cd-table-wrapper -->
	</div> <!-- cd-table-container -->

	<em class="cd-scroll-right"></em>
</section> <!-- cd-table -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/js_management/main.js"></script> <!-- Gem jQuery -->
<?php
  }else{
		echo "Devi effettuare il login per gestire i tuoi eventi";
  }	  
  ?>  
</body>
</html>