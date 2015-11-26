
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
			<li>Data e ora inizio</li>
			<li>Data e ora fine</li>
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
					<li><?php echo $row['DATA_INIZIO']; ?></li>
					<li><?php echo $row['DATA_FINE']; ?></li>
					<li><?php echo $row['DATA_INSERIMENTO']; ?></li>

					<li><a class="cd-select" href="add-foto-event.php?id=<?php echo $row['ID']; ?>" style="color:rgba(23, 149, 202, 1);">gestisci foto</a></li>
					<li><a class="cd-select" href="updateEvent.php?id=<?php echo $row['ID']; ?>" style="color:rgba(23, 149, 202, 1)"><i class="fa fa-pencil-square-o" style=" margin-top:3px;"></i></a></li>
					<li><a class="cd-select" onclick='confermaEliminazione(<?php echo $row['ID']; ?>);' style="color:red; cursor:pointer;"><i class="fa fa-times" style=" margin-top:3px;"></i></a></li>
				</ul>
			</div> <!-- cd-table-column -->
		<?php
		}
		?>
		 

		</div> <!-- cd-table-wrapper -->
	</div> <!-- cd-table-container -->

	<em class="cd-scroll-right"></em>
</section> <!-- cd-table -->

<?php
  }else{
		echo "Devi effettuare il login per gestire i tuoi eventi";
  }	  
  ?>  
<script type="text/javascript">
	function confermaEliminazione(id){
		
		$.confirm({
				title: 'Elimino Evento',
				confirmButton: 'Elimina',
				cancelButton: 'Annulla',
				content: 'Sei sicuro di voler eliminare l\'evento?',
				theme: 'supervan',
				confirmButtonClass: 'btn-info',
				cancelButtonClass: 'btn-danger',
				animation:'RotateY',
				animationSpeed: 1000,
				confirm: function () {
					$.ajax({
						url:'post-deleteEvent.php',
						type: 'POST',
						data: { 
							'id': id, 
							'cod': 'young123' 
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
