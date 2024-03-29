<html>
<?php
include 'private/connessione-db.php';
include 'private/utility-login.php';

my_session_start();

$linkIndietro="companies.php";
$testoIndietro = "TORNA INDIETRO";

?>
<head>
  <title>YPN | Aggiungi CV</title>
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
		if(document.getElementById("file").value.length < 1) {
		   campi = campi+" \n[immagine] OBBLIGATORIO";
		}

		if(campi!=("")){
			$.alert({
				title: 'Aggiungi Azienda',
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
						document.submitForm.action = 'post-add-companies.php';
						document.submitForm.submit();
					}else{
						//Attenzione a parolaccia
						$.alert({
							title: 'Aggiungi Azienda',
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
          <a>INSERISCI LA TUA AZIENDA</a>
      </div>
    </div>
  </div>
  <?php
  if(utenteLoggato($mysqli) == true) {
  ?>
	  <form id="submitForm" name="submitForm" onsubmit="return validateForm();" method="post"  enctype="multipart/form-data" >
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <!--Esempio text -->
    <p>Nome:</p>
    <input type="text" id="nome" name="nome" placeholder="Nome" />
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <!--Esempio text -->
    <p>Descrizione:</p>
    <textarea rows="3" id="descrizione" name="descrizione" cols="100"  placeholder="cosa l'azienda fa' o vende.."></textarea>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <p>Localita</p>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" ><!--Esempio text -->
        <p>latitudine:</p>
        <input type="text" id="residenza_lat" name="latitudine" placeholder="Latitudine" />
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top:0.2%;margin-bottom:0.5%;font-size: 20px;" ><!--Esempio text -->
        <p>longitudine:</p>
        <input type="text" id="residenza_long" name="longitudine" placeholder="Longitudine" />
      </div>
    </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <!--Esempio text -->
    <p>Orario apertura:</p>
    <textarea rows="3" id="orario_a" name="orario_apertura" cols="100"  placeholder="Lun-Ven 00:00"></textarea>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <!--Esempio text -->
    <p>Telefono/Cellulare:</p>
    <input type="text" id="telefono" name="telefono" placeholder="Telefono o Cellulare" />
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <!--Esempio text -->
    <p>Email:</p>
    <input type="text" id="email" name="email" placeholder="Email" />
  </div>

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
      <p>Prodotto/innovazione/servizio (campo 1)</p>
      <p>IMPORTANTE: per aggiungere il prodotto DEVI selezionare la sua immagine</p>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  >
        <!--Esempio text -->
        <p>Nome:</p>
        <input type="text" id="prodotto1" name="prodotto1" placeholder="Prodotto" />
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  >
        <p>Immagine prodotto:</p>
        <input type="file" accept="image/jpeg,image/png,image/gif" name="fileP[]" id="file1" />
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  >
        <!--Esempio text -->
        <p>Descrizione (campo 1)</p>
        <textarea rows="3" id="descrizione1" name="descrizione1" cols="100"  placeholder="descrizione prodotto"></textarea>
      </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
        <p>Prodotto/innovazione/servizio (campo 2):</p>
        <p>IMPORTANTE: per aggiungere il prodotto DEVI selezionare la sua immagine</p>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  >
          <!--Esempio text -->
          <p>Nome:</p>
          <input type="text" id="prodotto2" name="prodotto2" placeholder="Prodotto" />
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  >
          <p>Immagine prodotto:</p>
          <input type="file" accept="image/jpeg,image/png,image/gif" name="fileP[]" id="file2" />
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  >
          <!--Esempio text -->
          <p>Descrizione (campo 3)</p>
          <textarea rows="3" id="descrizione2" name="descrizione2" cols="100"  placeholder="descrizione prodotto"></textarea>
        </div>
      </div>

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
          <p>Prodotto/innovazione/servizio (campo 3):</p>
          <p>IMPORTANTE: per aggiungere il prodotto DEVI selezionare la sua immagine</p>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  >
            <!--Esempio text -->
            <p>Nome:</p>
            <input type="text" id="prodotto3" name="prodotto3" placeholder="Prodotto" />
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  >
            <p>Immagine prodotto:</p>
            <input type="file" name="fileP[]" accept="image/jpeg,image/png,image/gif" id="file3" />
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  >
            <!--Esempio text -->
            <p>Descrizione (campo 3)</p>
            <textarea rows="3" id="descrizione3" name="descrizione3" cols="100"  placeholder="descrizione prodotto"></textarea>
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
			?>
				<option value="<?php echo $row_c['ID']; ?>"><?php echo $row_c['nome']; ?></option>
			<?php
			}
			?>
		  </select>
		</div>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;font-size: 25px;" >
		  <p>Logo:</p>

			<input type="file" name="file" accept="image/jpeg,image/png,image/gif" id="file" />
			<p>N.B.: L'immagine verrà usata come foto profilo (se presente inserisci il logo aziendale).</p>
		</div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;" >
      <input id="privacy" type="checkbox" name="privacy" value="off">Accetto la <a href="//www.iubenda.com/privacy-policy/587389" class="iubenda-white iubenda-embed" title="Privacy Policy">Privacy Policy</a><script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src = "//cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script>
		<div>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;margin-bottom:2%;" >
		  <button type="submit" value="Aggiugi" style="font-size: 25px;" >Aggiungi</button>
		  <button type="reset" value="Cancella" style="font-size: 25px;">Cancella</button>
		<div>

	  </form>
  <?php
  }else{
		echo "Devi effettuare il login per aggiungere un'attivit&agrave;";
  }
  ?>
</body>
</html>
