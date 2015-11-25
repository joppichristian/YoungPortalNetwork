<html>
<?php
include 'private/connessione-db.php';
include 'private/utility-login.php';

my_session_start();

$linkIndietro="management_activities.php";
$testoIndietro = "TORNA INDIETRO";

?>
<head>
  <title>YPN | Aggiungi Attività</title>
      <link rel="icon" href="images/icon.ico" />

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--        CSS       -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/css_form/form_green.css" rel="stylesheet">
  <link href="css/css_attivita/attivita.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css" >
  <link rel="stylesheet" href="css/font-awesome.min.css" >
  <link rel="stylesheet" href="css/pace.css" >
  <link rel="stylesheet" href="css/css_login/reset.css"> <!-- CSS reset -->
  <link rel="stylesheet" href="css/css_login/style.css"> <!-- Gem style -->
  <link rel="stylesheet" type="text/css" href="css/jquery-confirm.css">
  <!--              -->

  
	<!-- Per Login -->
    <script type="text/javascript" src="private/sha512.js"></script>
    <script src="js/js_login/modernizr.js"></script> <!-- Modernizr -->

  <!-- JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
  <!-- -->
   <script type="text/javascript" src="js/jquery-confirm.js"></script>

 <script language="JavaScript" type="text/JavaScript">
 
	function confermaEliminazioneFoto(id,url){
		
		$.confirm({
				title: 'Elimino Foto',
				confirmButton: 'Elimina',
				cancelButton: 'Annulla',
				content: 'Sei sicuro di voler eliminare la foto?',
				theme: 'supervan',
				confirmButtonClass: 'btn-info',
				cancelButtonClass: 'btn-danger',
				animation:'RotateY',
				animationSpeed: 1000,
				confirm: function () {
					$.ajax({
						url:'post-fotoActivityDelete.php',
						type: 'POST',
						data: { 
							'id': id, 
							'url': url, 
							'cod': 'young123' 
						},
						success:function(response){
						
							//alert("Resp:"+response);
							//alert("response index of success="+response.indexOf("success"));
															
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
   <script language="JavaScript" type="text/JavaScript">
	function validateForm()
	{	
		var message = "ATTENZIONE:\n";
		var campi   = "";
		
		if(document.getElementById("elencofoto").value.length < 1) {
		   campi = campi+" \nNessuna foto selezionata!";			
		}
		
		if(campi!=("")){
			$.alert({
				title: 'Aggiungi Foto Attività',
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
			document.submitForm.action = 'post-add-foto-activity.php';
			document.submitForm.submit();
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
          <a>AGGIUNGI FOTO ATTIVIT&Agrave;</a>
      </div>
    </div>
  </div>
  <?php
  if(utenteLoggato($mysqli) == true) {
	  
	  $id_attivita = $_GET["id"];
	  $codProvenienza = $_GET["c"];
	  
	  if(isset($id_attivita)){
		    
  ?>
		<form id="submitForm" name="submitForm" onsubmit="return validateForm();" method="post"  enctype="multipart/form-data" > 
			<input type="hidden" id="id" name="id" value="<?php echo $id_attivita; ?>" /> 
			 
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;font-size: 25px;" >
			   
			  <?php
			  if(isset($codProvenienza)){
				  if($codProvenienza == 99){
			  ?>		  
					<p>Attivit&agrave; aggiunta con successo!</p>
			  <?php	  
				  }				
			  }	
			  ?>			  
			  <p>Se desideri puoi aggiungere foto alla galleria dell'attivit&agrave;:</p>
			 
				<input type="file" id="elencofoto" name="files[]" multiple="multiple" />
				
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;" >
			  <button type="submit" value="Aggiugi" style="font-size: 25px;" >Aggiungi le Foto</button>
			  <label> &nbsp; OPPURE &nbsp; </label>
			  <button type="reset"  onclick="window.location='management_activities.php';" value="Annulla" style="font-size: 25px;">Salva e chiudi</button>
			<div>

		  </form>
		  </br></br>
		  <h3>------------------------------------------------------------------------------------</h3>
			</br>
			<b>FOTO CORRENTI:</b>
			</br></br>
			<table border="1">
				<tr> <td>   </td> <td>   </td> </tr>
				<?php
				$query_foto="SELECT * FROM MEDIA_ATTIVITA WHERE TIPO='FOTO' AND ATTIVITA_ID='".$id_attivita."' ;" ;
				$result_foto = $mysqli->query($query_foto);
			 
				while($row_foto = $result_foto->fetch_array())
				{
				?>
					<tr>   
						
						<td>
							<img src="<?php echo $row_foto['URL'];?>"  width="250px" />
						</td>
						<td  style="vertical-align: middle;" > <button  type="reset" onclick="confermaEliminazioneFoto(<?php echo $row_foto['ID'] .",'". $row_foto['URL']."'";?>);">ELIMINA FOTO</button> </td>
					</tr>
				<?php
				}
				?>					
			</table>
		  
  <?php
		}else{
			echo "ERRORE, torna a gestione attivit&agrave; e riprova.";
		}	
  }else{
		echo "Devi effettuare il login per aggiungere foto ad un'attivit&agrave;";
  }	  
  ?>  
</body>
</html>
