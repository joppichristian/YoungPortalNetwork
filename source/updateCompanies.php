<html>
<?php
include 'private/connessione-db.php';
include 'private/utility-login.php';

my_session_start();

$linkIndietro="management_companies.php";
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
  <link href="css/css_form/form_red.css" rel="stylesheet">
  <link href="css/css_companies/companies.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css" >
  <link rel="stylesheet" href="css/font-awesome.min.css" >
  <link rel="stylesheet" href="css/pace.css" >
  <link rel="stylesheet" href="css/css_login/reset.css"> <!-- CSS reset -->
  <link rel="stylesheet" href="css/css_login/style.css"> <!-- Gem style -->
  <!--              -->

  <!-- Per Login -->
  <script type="text/javascript" src="private/sha512.js"></script>
  <script src="js/js_login/modernizr.js"></script> <!-- Modernizr -->
  <script src="js/js_login/main.js"></script> <!-- Gem jQuery -->


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
		var campi   = "";
		
		var nome = document.getElementById("nome").value;		
		var descrizione = document.getElementById("descrizione").value;				
		var residenza_lat  = document.getElementById("residenza_lat").value;
		var residenza_long  = document.getElementById("residenza_long").value;
		var orario_a  = document.getElementById("orario_a").value;
		var telefono  = document.getElementById("telefono").value;
		var email  = document.getElementById("email").value;
	 	 
		if(nome==""){
			campi = campi+" \n[nome] OBBLIGATORIO";			
		}
		if(descrizione==""){
			campi = campi+" \n[descrizione] OBBLIGATORIO";			
		}
		if(residenza_lat=="" || residenza_long == ""){
			campi = campi+" \n[località] OBBLIGATORIO";			
		}
		if(orario_a==""){
			campi = campi+" \n[orario di apertura] OBBLIGATORIO";			
		}
		if(telefono==""){
			campi = campi+" \n[telefono] OBBLIGATORIO";			
		}
		if(email==""){
			campi = campi+" \n[email] OBBLIGATORIO";			
		}

		if(campi!=("")){
			$.alert({
				title: 'Modifica Azienda',
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
			var stringToCheck = nome + ' ' + descrizione + ' ' + residenza_lat + ' ' + residenza_long + ' ' + orario_a + ' ' + telefono + ' ' + email;
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
						document.submitForm.action = 'post-updateCompanies.php';
						document.submitForm.submit();
					}else{
						//Attenzione a parolaccia
						$.alert({
							title: 'Modifica Azienda',
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
          <a>LA TUA AZIENDA</a>
      </div>
    </div>
  </div>
  <?php
  $id_azienda = $_GET["id"];

  if(!isset($id_azienda)){
    die("Errore, il link non è corretto. Torna indietro e riprova.");
  }

  $nome = "";
  $descrizione = "";
  $latitudine =  "";
  $longitudine = "";
  $orario_apertura = "";
  $email = "";
  $telefono = "";
  $url_foto = "";
  $categoria = "";
  $autore = "";

  $qry_a="SELECT *  FROM AZIENDA WHERE ID='$id_azienda' ;";
  $result_a = $mysqli->query($qry_a);
  while($row_a = $result_a->fetch_array())
  {
    $nome = $row_a["nome"];
    $descrizione = $row_a["descrizione"];
    $latitudine = $row_a["latitudine"];
    $longitudine = $row_a["longitudine"];
    $orario_apertura = $row_a["orario"];
    $email = $row_a["email"];
    $telefono = $row_a["telefono"];
    $url_foto = $row_a["url_foto"];
    $categoria = $row_a['ID_categoria'];
    $autore = $row_a['ID_utente'];



  }

  $url_fotoPr1 ="";
  $descrizionePr1 = "";
  $titoloPr1 = "";
  $url_fotoPr2 ="";
  $descrizionePr2 = "";
  $titoloPr2 = "";
  $url_fotoPr3 ="";
  $descrizionePr3 = "";
  $titoloPr3 = "";

  $ind_pr=1;
  $qry_a=" SELECT *  FROM PRODOTTI_AZIENDA WHERE ID_utente='$autore' ;";
  $result_a = $mysqli->query($qry_a);
  while($row_a = $result_a->fetch_array())
  {
    ${'url_fotoPr'.$ind_pr} = $row_a["url_foto"];
    ${'descrizionePr'.$ind_pr} = $row_a["descrizione"];
    ${'titoloPr'.$ind_pr}  = $row_a["titolo"];

    $ind_pr= $ind_pr+1;
  }


  $idUtente = $_SESSION['user_id'];




		if( $idUtente == $autore ) {
	?>
	  <form id="submitForm" name="submitForm" onsubmit="return validateForm();" method="post"  enctype="multipart/form-data" >
		      <input type="hidden" id="id" name="id" value="<?php echo $id_azienda; ?>" />

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <!--Esempio text -->
    <p>Nome:</p>
    <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" />
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <!--Esempio text -->
    <p>Descrizione:</p>
    <textarea rows="3" id="descrizione" name="descrizione" cols="100"  placeholder="cosa l'azienda fa' o vende.."><?php echo $descrizione; ?></textarea>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <p>Localita</p>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" ><!--Esempio text -->
        <p>latitudine:</p>
        <input type="text" id="residenza_lat" name="latitudine" value="<?php echo $latitudine; ?>" />
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top:0.2%;margin-bottom:0.5%;font-size: 20px;" ><!--Esempio text -->
        <p>longitudine:</p>
        <input type="text" id="residenza_long" name="longitudine" value="<?php echo $longitudine; ?>" />
      </div>
    </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <!--Esempio text -->
    <p>Orario apertura:</p>
    <textarea rows="3" id="orario_a" name="orario_apertura" cols="100"  placeholder="Lun-Ven 00:00"><?php echo $orario_apertura; ?></textarea>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <!--Esempio text -->
    <p>Telefono/Cellulare:</p>
    <input type="text" id="telefono" name="telefono" value="<?php echo $telefono; ?>" />
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <!--Esempio text -->
    <p>Email:</p>
    <input type="text" id="email" name="email" value="<?php echo $email; ?>" />
  </div>

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
      <p>Prodotto/innovazione/servizio (campo 1)</p></br>
      <p>IMPORTANTE: per aggiungere il prodotto DEVI selezionare la sua immagine</p>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  >
        <!--Esempio text -->
        <p>Nome:</p>
        <input type="text" id="prodotto1" name="prodotto1" value="<?php echo $titoloPr1;?>" />
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  >
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  >
          <p>Immagine Corrente:</p>
            <img src="<?php echo $url_fotoPr1;?>" />
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  >
          <p>Aggiorna Immagine prodotto:</p>
          <input type="file" accept="image/jpeg,image/png,image/gif" name="fileP1" id="fileP1" />
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  >
        <!--Esempio text -->
        <p>Descrizione (campo 1)</p>
        <textarea rows="3" id="descrizione1" name="descrizione1" cols="100"  placeholder="descrizione prodotto"><?php echo $descrizionePr1;?></textarea>
      </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
        <p>Prodotto/innovazione/servizio (campo 2):</p></br>
        <p>IMPORTANTE: per aggiungere il prodotto DEVI selezionare la sua immagine</p>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  >
          <!--Esempio text -->
          <p>Nome:</p>
          <input type="text" id="prodotto2" name="prodotto2" placeholder="Prodotto" value="<?php echo $titoloPr2;?>"/>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  >
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  >
            <p>Immagine Corrente:</p>
  				    <img src="<?php echo $url_fotoPr2;?>" />
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  >
            <p>Aggiorna Immagine prodotto:</p>
            <input type="file" accept="image/jpeg,image/png,image/gif" name="fileP2" id="fileP2" />
          </div>

        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  >
          <!--Esempio text -->
          <p>Descrizione (campo 3)</p>
          <textarea rows="3" id="descrizione2" name="descrizione2" cols="100"  placeholder="descrizione prodotto"><?php echo $descrizionePr2;?></textarea>
        </div>
      </div>

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
          <h1>Prodotto/innovazione/servizio (campo 3):</h1></br>
          <p>IMPORTANTE: per aggiungere il prodotto DEVI selezionare la sua immagine</p>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  >
            <!--Esempio text -->
            <p>Nome:</p>
            <input type="text" id="prodotto3" name="prodotto3" placeholder="Prodotto" value="<?php echo $titoloPr3;?>" />
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  >
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  >
              <p>Immagine Corrente:</p>
    				    <img src="<?php echo $url_fotoPr3;?>" />
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  >
              <p>Aggiorna Immagine prodotto:</p>
              <input type="file" accept="image/jpeg,image/png,image/gif" name="fileP3" id="fileP3" />
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  >
            <!--Esempio text -->
            <p>Descrizione (campo 3)</p>
            <textarea rows="3" id="descrizione3" name="descrizione3" cols="100"  placeholder="descrizione prodotto"><?php echo $descrizionePr3;?></textarea>
          </div>
        </div>


			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;">
			  <p>Categoria:</p>
			  <select id="categoria" name="categoria" >
				<?php
				$qry_c="SELECT * FROM CAT_CV ;";
				$result_c = $mysqli->query($qry_c);
				while($row_c = $result_c->fetch_array())
				{
					if($row_c['ID'] == $categoria){
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

				<p>Per Cambiare Immagine utilizza il bottone qui sotto:</p>
				<input type="file" accept="image/jpeg,image/png,image/gif" name="file" id="file" />
				<p>N.B.: L'immagine verrà usata come anteprima dell'attività.</p>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;" >
			  <button type="submit" value="Salva" style="font-size: 25px;" >Salva</button>
			   <button type="reset"  onclick="window.location='management_companies.php';" value="Annulla" style="font-size: 25px;">Annulla</button>
			<div>

		  </form>
	  <?php
		}else{
			echo "Errore. Questa attivita' non e' stata creata da te.";
	    }

  ?>
</body>
</html>
