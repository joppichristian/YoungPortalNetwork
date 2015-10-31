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
  <form action="post-add-companies.php" method="post"  enctype="multipart/form-data" >
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <!--Esempio text -->
    <h1>Nome:</h1>
    <input type="text" id="nome" name="nome" placeholder="Nome" />
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <!--Esempio text -->
    <h1>Descrizione:</h1>
    <textarea rows="3" id="descrizione" name="descrizione" cols="100"  placeholder="cosa l'azienda fa' o vende.."></textarea>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <h1>Localita</h1>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" ><!--Esempio text -->
        <h1>latitudine:</h1>
        <input type="text" id="residenza" name="latitudine" placeholder="Latitudine" />
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top:0.2%;margin-bottom:0.5%;font-size: 20px;" ><!--Esempio text -->
        <h1>longitudine:</h1>
        <input type="text" id="residenza" name="longitudine" placeholder="Longitudine" />
      </div>
    </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <!--Esempio text -->
    <h1>Orario apertura:</h1>
    <textarea rows="3" id="istruzione1" name="orario_apertura" cols="100"  placeholder="Lun-Ven 00:00"></textarea>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <!--Esempio text -->
    <h1>Telefono/Cellulare:</h1>
    <input type="text" id="telefono" name="telefono" placeholder="Telefono o Cellulare" />
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
    <!--Esempio text -->
    <h1>Email:</h1>
    <input type="text" id="email" name="email" placeholder="Email" />
  </div>

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
      <h1>Prodotto/innovazione/servizio (campo 1)</h1>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  >
        <!--Esempio text -->
        <h1>Nome:</h1>
        <input type="text" id="prodotto1" name="prodotto1" placeholder="Prodotto" />
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  >
        <p>Immagine prodotto:</p>
        <input type="file" name="fileP[]" id="file1" />
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  >
        <!--Esempio text -->
        <h1>Descrizione (campo 1)</h1>
        <textarea rows="3" id="descrizione1" name="descrizione1" cols="100"  placeholder="descrizione prodotto"></textarea>
      </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
        <h1>Prodotto/innovazione/servizio (campo 2):</h1>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  >
          <!--Esempio text -->
          <h1>Nome:</h1>
          <input type="text" id="prodotto2" name="prodotto2" placeholder="Prodotto" />
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  >
          <p>Immagine prodotto:</p>
          <input type="file" name="fileP[]" id="file2" />
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  >
          <!--Esempio text -->
          <h1>Descrizione (campo 3)</h1>
          <textarea rows="3" id="descrizione2" name="descrizione2" cols="100"  placeholder="descrizione prodotto"></textarea>
        </div>
      </div>

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5%;margin-bottom:0.5%;font-size: 20px;" >
          <h1>Prodotto/innovazione/servizio (campo 3):</h1>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  >
            <!--Esempio text -->
            <h1>Nome:</h1>
            <input type="text" id="prodotto3" name="prodotto3" placeholder="Prodotto" />
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  >
            <p>Immagine prodotto:</p>
            <input type="file" name="fileP[]" id="file3" />
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  >
            <!--Esempio text -->
            <h1>Descrizione (campo 3)</h1>
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
		  <p>Immagine:</p>

			<input type="file" name="file" id="file" />
			<p>N.B.: L'immagine verrà usata come foto profilo (se presente inserisci il logo aziendale).</p>
		</div>
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
