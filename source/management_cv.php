<html>
<?php
include 'private/connessione-db.php';
include 'private/utility-login.php';

my_session_start();

$linkIndietro="curriculums.php";
$testoIndietro = "TORNA INDIETRO";

?>
<head>
  <title>YPN | Aggiungi Curriculum</title>
  <link rel="icon" href="images/icon.ico" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--        CSS       -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/css_form/form_gray.css" rel="stylesheet">
  <link href="css/css_curriculum/cv.css" rel="stylesheet">
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

  <!-- Per confirm dialog -->
  <script type="text/javascript" src="js/jquery-confirm.js"></script>
  <link rel="stylesheet" type="text/css" href="css/jquery-confirm.css">

  <script language="JavaScript" type="text/JavaScript">
	function validateForm()
	{
    var message = "ATTENZIONE:\n";
    var privacy = document.getElementById("privacy").checked;
    if(privacy!=true){

      $.alert({
				title: 'Aggiungi Curriculum',
				content: message+"Spunta la normativa sulla privacy per poter aggiungere il tuo Curriculum!",
				theme: 'supervan',
				animation:'RotateY',
				 animationSpeed: 1000,
				confirm: function (id) {

				}
				});
        return false;
    }else{

		var campi   = "";

		var nome = document.getElementById("nome").value;
		var cognome = document.getElementById("cognome").value;
		var data  = document.getElementById("data").value;
		var residenza  = document.getElementById("residenza").value;
		var telefono  = document.getElementById("telefono").value;
		var email  = document.getElementById("email").value;

		if(nome==""){
			campi = campi+" \n[nome] OBBLIGATORIO";
		}
		if(cognome==""){
			campi = campi+" \n[cognome] OBBLIGATORIO";
		}
		if(data==""){
			campi = campi+" \n[data di nascita] OBBLIGATORIO";
		}
		if(residenza==""){
			campi = campi+" \n[residenza] OBBLIGATORIO";
		}
		if(telefono==""){
			campi = campi+" \n[telefono] OBBLIGATORIO";
		}
		if(email==""){
			campi = campi+" \n[email] OBBLIGATORIO";
		}


		if(campi!=("")){
			$.alert({
				title: 'Modifica Curriculum',
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
			//prima di fare il subit del form controllo parolacce:
			var stringToCheck = ' ' + nome + ' ' + cognome + ' ' + residenza + ' ' + telefono + ' ' + email;
			$.ajax({
				url:'swear_check.php',
				type: 'POST',
				data: { 
					'stringToCheck': stringToCheck 
				},
				success:function(response){
				
					//alert("Resp:"+response);
					//alert("response index of success="+response.indexOf("success"));
					if( response.indexOf("success") > -1){
						//Niente parolacce
						document.submitForm.action = 'post-updateCV.php?i=<?php echo $id_cv;?>';
						document.submitForm.submit();
					}else{
						//Attenzione a parolaccia
						$.alert({
							title: 'Modifica Curriculum',
							content: 'Attenzione! Sono state inserite parole offensive. Una condotta scorretta potrebbe portare alla disattivazione del profilo!',
							theme: 'supervan',
							animation:'RotateY',
							animationSpeed: 1000,
							confirm: function (id) {
							 
							}                                        
						});
						return false;
					}
				}
			});			
			return false;


		}
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
          <a>IL TUO CURRICULUM</a>
      </div>
    </div>
  </div>
  <?php

  $query_nome="SELECT * FROM CURRICULUM WHERE  id_utente='". $_SESSION['user_id']."';";
  $result_nome = $mysqli->query($query_nome);
  $ID_inserito=0;
  while($row = $result_nome->fetch_array())
    {
        $ID_inserito=$row['ID'];
    }

  $id_cv = $ID_inserito;

  if(isset($id_cv)){

    $nome = "";
    $cognome = "";
    $residenza = "";
    $data = "";
    $telefono = "";
    $email = "";
    $istruzione1 = "";
    $istruzione2 = "";
    $istruzione3 = "";
    $esperienza1 = "";
    $esperienza2 = "";
    $esperienza3 = "";
    $esperienza4 = "";
    $competenza1 = "";
    $competenza2 = "";
    $competenza3 = "";
    $interessi1 = "";
    $interessi2 = "";
    $categoria = "";
    $idUtente = "";
    $url_foto = "";

	$qry="SELECT * FROM CURRICULUM WHERE ID = '".$id_cv."' ;";
	$result = $mysqli->query($qry);
	while($row = $result->fetch_array())
	{
    $nome = $row['nome'];
    $cognome = $row['cognome'];
    $residenza =$row['residenza'];
    $data = $row['data_nascita'];
    $telefono = $row['telefono'];
    $email = $row['email'];
    $istruzione1 = $row['istruzione1'];
    $istruzione2 = $row['istruzione2'];
    $istruzione3 = $row['istruzione3'];
    $esperienza1 = $row['esperienza1'];
    $esperienza2 = $row['esperienza2'];
    $esperienza3 = $row['esperienza3'];
    $esperienza4 = $row['esperienza4'];
    $competenza1 = $row['competenza1'];
    $competenza2 = $row['competenza2'];
    $competenza3 = $row['competenza3'];
    $interessi1 = $row['interessi1'];
    $interessi2 = $row['interessi2'];
    $categoria = $row['ID_cat'];
    $idUtente = $row['ID_utente'];
		$url_foto = $row['url_foto'];
	}

	if(utenteLoggato($mysqli) == true ) {

		$idUtente = $_SESSION['user_id'];


	?>

	  <form id="submitForm" name="submitForm" onsubmit="return validateForm();" method="post"  enctype="multipart/form-data" >
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <!--Esempio text -->
    <p>Nome:(*)</p>
    <input type="text" id="nome" name="nome" value="<?php echo $nome;?>" placeholder="Nome" />
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <!--Esempio text -->
    <p>Cognome:(*)</p>
    <input type="text" id="cognome" name="cognome" value="<?php echo $cognome;?>" placeholder="Cognome" />
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <!--Esempio text -->
    <p>Data di nascita:(*)</p>
    <input type="text" id="data" name="data" value="<?php echo $data;?>" placeholder="01/01/2001" />
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <!--Esempio text -->
    <p>Residenza/Via:(*)</p>
    <input type="text" id="residenza" name="residenza" value="<?php echo $residenza;?>" placeholder="Residenza e indirizzo" />
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <!--Esempio text -->
    <p>Telefono/Cellulare:(*)</p>
    <input type="text" id="telefono" name="telefono" value="<?php echo $telefono;?>" placeholder="Telefono o Cellulare" />
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <!--Esempio text -->
    <p>Email:(*)</p>
    <input type="text" id="email" name="email" value="<?php echo $email;?>" placeholder="Email" />
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;">
    <p>Istruzione (campo 1):</p>
    <textarea rows="3" id="istruzione1" name="istruzione1" cols="100" value="<?php echo $istruzione1;?>" placeholder="Istruzione"><?php echo $istruzione1;?></textarea>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;">
    <p>Istruzione (campo 2):</p>
    <textarea rows="3" id="istruzione2" name="istruzione2" cols="100" value="<?php echo $istruzione2;?>" placeholder="Istruzione"><?php echo $istruzione2;?></textarea>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;">
    <p>Esperienza (campo 1):</p>
    <textarea rows="3" id="esperienza1" name="esperienza1" cols="100" value="<?php echo $esperienza1;?>" placeholder="Esperienza"><?php echo $esperienza1;?></textarea>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;">
    <p>Esperienza (campo 2):</p>
    <textarea rows="3" id="esperienza2" name="esperienza2" cols="100" value="<?php echo $esperienza2;?>"  placeholder="Esperienza"><?php echo $esperienza2;?></textarea>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;">
    <p>Esperienza (campo 3):</p>
    <textarea rows="3" id="esperienza3" name="esperienza3" cols="100" value="<?php echo $esperienza3;?>" placeholder="Esperienza"><?php echo $esperienza3;?></textarea>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;">
    <p>Esperienza (campo 4):</p>
    <textarea rows="3" id="esperienza4" name="esperienza4" cols="100" value="<?php echo $esperienza4;?>" placeholder="Esperienza"><?php echo $esperienza4;?></textarea>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;">
    <p>Competenza (campo 1):</p>
    <textarea rows="3" id="competenza1" name="competenza1" cols="100" value="<?php echo $competenza1;?>" placeholder="Competenza"><?php echo $competenza1;?></textarea>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;">
    <p>Competenza (campo 2):</p>
    <textarea rows="3" id="competenza2" name="competenza2" cols="100" value="<?php echo $competenza2;?>" placeholder="Competenza"><?php echo $competenza2;?></textarea>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;">
    <p>Competenza (campo 3):</p>
    <textarea rows="3" id="competenza3" name="competenza3" cols="100" value="<?php echo $competenza3;?>" placeholder="Competenza"><?php echo $competenza3;?></textarea>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;">
    <p>Interessi (campo 1):</p>
    <textarea rows="3" id="interessi1" name="interessi1" cols="100" value="<?php echo $interessi1;?>" placeholder="Competenza"><?php echo $interessi1;?></textarea>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;">
    <p>Interessi (campo 2):</p>
    <textarea rows="3" id="interessi2" name="interessi2" cols="100" value="<?php echo $interessi2;?>" placeholder="Competenza"><?php echo $interessi2;?></textarea>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;">
    <p>Categoria:</p>
    <select id="categoria" name="categoria" >
    <?php
    $qry_c="SELECT * FROM CAT_CV ;";
    $result_c = $mysqli->query($qry_c);
    while($row_c = $result_c->fetch_array())
    {
      if($row_c['ID'] == $catId){
    ?>
        <option selected value="<?php echo $row_c['ID']; ?>"><?php echo $row_c['nome']; ?></option>
    <?php
      }else{
    ?>
        <option value="<?php echo $row_c['ID']; ?>"><?php echo $row_c['nome']; ?></option>
    <?php
      }
    }
    ?>
    </select>
  </div>

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;font-size: 25px;" >
    <p>Immagine Corrente:</p>
    <img src="<?php echo $url_foto;?>" />

    <p>Per Cambiare Immagine utilizza il bottone qui sotto ():</p>
    <input type="file" name="file" accept="image/jpeg,image/png,image/gif" id="file" />
    <p>N.B.: L'immagine verrà usata come foto profilo.</p>
  </div>

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;" >
    <input id="privacy" type="checkbox" name="privacy" value="off">Accetto la <a href="//www.iubenda.com/privacy-policy/587389" class="iubenda-white iubenda-embed" title="Privacy Policy">Privacy Policy</a><script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src = "//cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script>
  <div>

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;" >
    <button type="submit" value="Salva" style="font-size: 25px;" >Salva</button>
     <button type="reset"  onclick="window.location='curriculums.php';" value="Annulla" style="font-size: 25px;">Annulla</button>
  <div>

  </form>


	  <?php

	}else{
			echo "Devi effettuare il login per aggiungere un'attivit&agrave;";
    }
  }else{
	  echo "Errore. Prova a tornare indietro e riprova.";
  }
  ?>
</body>
</html>
