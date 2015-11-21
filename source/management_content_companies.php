
 <?php
  if(utenteLoggato($mysqli) == true) {
  ?>
<section id="cd-table">
	<header class="cd-table-column">
		<h2>Azienda</h2>
		<ul>
			<li>Telefono</li>
			<li>Descrizione</li>
			<li>Foto Copertina</li>
			<li>Email</li>
			
			
		</ul>
	</header>

	<div class="cd-table-container">
		<div class="cd-table-wrapper">

		<?php
		$idUtente = $_SESSION['user_id'];

		$qry="SELECT * FROM AZIENDA WHERE ID_utente = '$idUtente' ;";
		$result = $mysqli->query($qry);
		while($row = $result->fetch_array())
		{
		?>
			<div class="cd-table-column">
				<h2><?php echo $row['nome']; ?></h2>
				<ul>
					<li><?php echo $row['telefono']; ?></li>
					<li><?php echo substr($row['descrizione'],0,60); ?></li>
					<li><img src="<?php echo $row['url_foto']; ?>" /></li>
					<li><?php echo $row['email']; ?></li>
					

					<li><a class="cd-select" href="add-foto-companies.php?id=<?php echo $row['ID']; ?>" style="color:rgba(234,140,6, 1);">gestisci foto</a></li>
					<li><a class="cd-select" href="updateCompanies.php?id=<?php echo $row['ID']; ?>" style="color:rgba(234,140,6, 1);"><i class="fa fa-pencil-square-o" style=" margin-top:3px;"></i></a></li>
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
		echo "Devi effettuare il login per gestire la tua azienda";
  }
  ?>
  <script type="text/javascript">
	function confermaEliminazione(id){
		
		$.confirm({
				title: 'Elimino Azienda',
				confirmButton: 'Elimina',
				cancelButton: 'Annulla',
				content: 'Sei sicuro di voler eliminare l\'azienda?',
				theme: 'supervan',
				confirmButtonClass: 'btn-info',
				cancelButtonClass: 'btn-danger',
				animation:'RotateY',
				animationSpeed: 1000,
				confirm: function () {
					$.ajax({
						url:'post-deleteCompanies.php',
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
