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
  <!--              -->


  <!-- JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
  <!-- -->
 <script language="JavaScript" type="text/JavaScript">
  function eliminaFoto(id)
	{
		var elimina = confirm("Sicuro di voler eliminare la foto: id="+id);
		if (elimina == true) {
	
			$.ajax({
				url:'post-fotoActivityDelete.php',
				type: 'POST',
				data: { 
					'id': id, 
					'cod': 'young123' 
				},
				success:function(response){
				
					//alert("Resp:"+response);
					//alert("response index of success="+response.indexOf("success"));
													
					if( response.indexOf("success") > -1){
						alert("Foto eliminata con successo...");
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

</head>
<body>
  <header role="banner" style="background-color:black;">
    <?php
	  include("header.php");
	?>
  </header>

  <div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
    <div class="cd-user-modal-container"> <!-- this is the container wrapper -->
      <ul class="cd-switcher">
        <li><a href="#0"  >Sign in</a></li>
        <li><a href="#0">New account</a></li>
      </ul>

      <div id="cd-login"> <!-- log in form -->
        <form class="cd-form">
          <p class="fieldset">
            <label class="image-replace cd-email" for="signin-email">E-mail</label>
            <input class="full-width has-padding has-border" id="signin-email" type="email" placeholder="E-mail">
            <span class="cd-error-message">Error message here!</span>
          </p>

          <p class="fieldset">
            <label class="image-replace cd-password" for="signin-password">Password</label>
            <input class="full-width has-padding has-border" id="signin-password" type="text"  placeholder="Password">
            <a href="#0" class="hide-password">Hide</a>
            <span class="cd-error-message">Error message here!</span>
          </p>

          <p class="fieldset">
            <input type="checkbox" id="remember-me" checked>
            <label for="remember-me">Remember me</label>
          </p>

          <p class="fieldset">
            <input class="full-width" type="submit" value="Login">
          </p>
        </form>

        <p class="cd-form-bottom-message"><a href="#0">Forgot your password?</a></p>
        <!-- <a href="#0" class="cd-close-form">Close</a> -->
      </div> <!-- cd-login -->

      <div id="cd-signup"> <!-- sign up form -->
        <form class="cd-form">
          <p class="fieldset">
            <label class="image-replace cd-username" for="signup-username">Username</label>
            <input class="full-width has-padding has-border" id="signup-username" type="text" placeholder="Username">
            <span class="cd-error-message">Error message here!</span>
          </p>

          <p class="fieldset">
            <label class="image-replace cd-email" for="signup-email">E-mail</label>
            <input class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail">
            <span class="cd-error-message">Error message here!</span>
          </p>

          <p class="fieldset">
            <label class="image-replace cd-password" for="signup-password">Password</label>
            <input class="full-width has-padding has-border" id="signup-password" type="text"  placeholder="Password">
            <a href="#0" class="hide-password">Hide</a>
            <span class="cd-error-message">Error message here!</span>
          </p>

          <p class="fieldset">
            <input type="checkbox" id="accept-terms">
            <label for="accept-terms">I agree to the <a href="#0">Terms</a></label>
          </p>

          <p class="fieldset">
            <input class="full-width has-padding" type="submit" value="Create account">
          </p>
        </form>

        <!-- <a href="#0" class="cd-close-form">Close</a> -->
      </div> <!-- cd-signup -->

      <div id="cd-reset-password"> <!-- reset password form -->
        <p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

        <form class="cd-form">
          <p class="fieldset">
            <label class="image-replace cd-email" for="reset-email">E-mail</label>
            <input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
            <span class="cd-error-message">Error message here!</span>
          </p>

          <p class="fieldset">
            <input class="full-width has-padding" type="submit" value="Reset password">
          </p>
        </form>

        <p class="cd-form-bottom-message"><a href="#0">Back to log-in</a></p>
      </div> <!-- cd-reset-password -->
      <a href="#0" class="cd-close-form">Close</a>
    </div> <!-- cd-user-modal-container -->
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
	  
	  if(isset($id_attivita)){
  ?>
		  <form action="post-add-foto-activity.php" method="post"  enctype="multipart/form-data" >
			 
			<input type="hidden" id="id" name="id" value="<?php echo $id_attivita; ?>" /> 
			 
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;font-size: 25px;" >
			  <p>Aggiungi Foto attivit&agrave;:</p>
			 
				<input type="file" name="file" id="file" />
				</br>
				<p>N.B.: L'immagine verrà aggiunta alla galleria dell'attività.</p>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;" >
			  <button type="submit" value="Aggiugi" style="font-size: 25px;" >Aggiungi</button>
			  <button type="reset"  onclick="window.location='management_activities.php';" value="Annulla" style="font-size: 25px;">Annulla</button>
			<div>

		  </form>
		  </br></br>
		  <h3>------------------------------------------------------------------------------------</h3>
			</br>
			<b>FOTO CORRENTI:</b>
			</br></br>
			<table border="1">
				<tr> <td>   </td> <td>   </td> <td>   </td> </tr>
				<?php
				$query_foto="SELECT * FROM MEDIA_ATTIVITA WHERE TIPO='FOTO' AND ATTIVITA_ID='".$id_attivita."' ;" ;
				$result_foto = $mysqli->query($query_foto);
			 
				while($row_foto = $result_foto->fetch_array())
				{
				?>
					<tr>   
						<td style="vertical-align: middle;"><?php echo $row_foto['ID']; ?></td>
						<td>
							<img src="<?php echo $row_foto['URL'];?>"  width="250px" />
						</td>
						<td  style="vertical-align: middle;" > <button  type="reset" onclick="eliminaFoto(<?php echo $row_foto['ID'];?>);">ELIMINA FOTO</button> </td>
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
