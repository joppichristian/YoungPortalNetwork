<html>
<?php
include 'private/connessione-db.php';
include 'private/utility-login.php';

my_session_start();

$linkIndietro = "index.php";
$testoIndietro = "TORNA ALLA HOME";

?>
<head>
  <title>YPN | C.V.</title>
      <link rel="icon" href="images/icon.ico" />

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="young,portal,network,children,ragazzi,giovani,strutture,noleggio,valle di cembra,trentino,forum,studenti,contatti,associazioni,aziende,imprenditori,eventi,attività,curriculums,opportunità" />
    <meta name="description" content="Portale interattivo dedicato ai giovani della Valle di Cembra. Qui puoi trovare eventi e attività che si svolgono in valle. Un giovane può condividere le proprie esperienze e conoscenze in modo semplice, pubblicizzare la propria azienda."/>

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
  <script src="js/pace.js"></script>

  <!-- Per Login -->
  <script type="text/javascript" src="private/sha512.js"></script>
  <script src="js/js_login/modernizr.js"></script> <!-- Modernizr -->
  <script src="js/js_login/main.js"></script> <!-- Gem jQuery -->


 <script type="text/javascript" src="js/jquery-confirm.js"></script>
 <link rel="stylesheet" type="text/css" href="css/jquery-confirm.css">
</head>
<body>
		  <?php include_once("analyticstracking.php") ?>

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
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:100px" >
	      <img src="images/cv_logo.png" style="height: 100%;width: auto;"/> 
          <a style="vertical-align: top;">CURRICULUM</a>
      </div>
    </div>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

<?php
$query_nome="SELECT ID_utente FROM CURRICULUM WHERE  ID_utente='". $_SESSION['user_id']."';";
$result_nome = $mysqli->query($query_nome);
$gia_inserito=0;
while($row_nome = $result_nome->fetch_array())
  {
      $gia_inserito=1;
  }

  if(utenteLoggato($mysqli) == true) {

    if($gia_inserito == 1){
      ?>
      <a href="#" id="inserted" class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top:3%;padding-top:1%; padding-bottom:1%;">
			     <button class="item-option col-lg-12 col-md-12 col-sm-12 col-xs-12"  title='Attenzione!' >
				         Aggiungi curriculum
		       </button>
		  </a>
    <?php
    }else{
    ?>

		  <a href="addCurriculum.php" class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top:3%;padding-top:1%; padding-bottom:1%;">
			     <button class="item-option col-lg-12 col-md-12 col-sm-12 col-xs-12" >
			     Aggiungi curriculum
			    </button>
		  </a>

	  <?php
    }
  }else{
	?>
		<a href="#" id="addCV" class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top:3%;padding-top:1%; padding-bottom:1%;">
			<button class="item-option col-lg-12 col-md-12 col-sm-12 col-xs-12"  title='Effettua il login per aggiungere un attivita' >
				Aggiungi curriculum
			</button>
		</a>
	<?php
	}

  if($gia_inserito == 0){
    ?>
    <a href="#" id="manageCV" class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top:3%;padding-top:1%; padding-bottom:1%;">
      <button class="item-option col-lg-12 col-md-12 col-sm-12 col-xs-12">
        Gestisci il tuo curriculum
      </button>
    </a>

  <?php
  }else{
  ?>

  <a href="management_cv.php" class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top:3%;padding-top:1%; padding-bottom:1%;">
    <button class="item-option col-lg-12 col-md-12 col-sm-12 col-xs-12">
      Gestisci il tuo curriculum
    </button>
  </a>

  <?php
  }
if($gia_inserito == 0){
    ?>
    <a href="#" id="deleteCV" class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top:3%;padding-top:1%; padding-bottom:1%;">
      <button class="item-option col-lg-12 col-md-12 col-sm-12 col-xs-12">
        Elimina il tuo curriculum
      </button>
    </a>

  <?php
  }else{
  ?>

  <a href="#" id="valideDeleteCV" class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top:3%;padding-top:1%; padding-bottom:1%;">
    <button class="item-option col-lg-12 col-md-12 col-sm-12 col-xs-12">
      Elimina il tuo curriculum
    </button>
  </a>

  <?php
  }
?>


  <!--<form class="filter-form col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top:5%;">
        <input class="user" type="text" name="filter" id="filter" style="width:80%;">
        <input type="submit" value="Search">
  </form>-->
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 2%; width:100%">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <p style="color:rgb(156,156,156);">Ricerca per categoria:</p>
    </div>
  </div>
  <?php
  $cat_id =$_GET['c'];
  ?>


  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 2%; width:100%">

    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-bottom:1%;">
      <?php
      if($cat_id == 0){
      ?>
      <div class="item-option-select col-lg-12 col-md-12 col-sm-12 col-xs-12" >
          <a href="curriculums.php?c=0" >
            <div class="description" style="padding-top:1%; padding-bottom:1%;">
              <p style="color:rgb(156,156,156);">TUTTE</p>
            </div>
          </a>
        </div>
      <?php
      }else{
        ?>
        <div class="item-option col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <a href="curriculums.php?c=0" >
              <div class="description" style="padding-top:1%; padding-bottom:1%;">
                <p style="color:white;">TUTTE</p>
              </div>
            </a>
          </div>
        <?php
      }?>
    </div>

    <?php

    $qry_a="SELECT * FROM CAT_CV ;";
    $result_a = $mysqli->query($qry_a);
    while($row_a = $result_a->fetch_array())
    {

    if($cat_id == $row_a['ID']){
    ?>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-bottom:1%;">
        <div class="item-option-select col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <a href="curriculums.php?c=<?php echo $row_a['ID']; ?>" >
              <div class="description" style="padding-top:1%; padding-bottom:1%;">
                <p style="color:rgb(156,156,156);"><?php echo $row_a['nome']; ?></p>
              </div>
            </a>
        </div>
    </div>
    <?php
      }else{
    ?>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-bottom:1%;">
          <div class="item-option col-lg-12 col-md-12 col-sm-12 col-xs-12" >
              <a href="curriculums.php?c=<?php echo $row_a['ID']; ?>" >
                <div class="description" style="padding-top:1%; padding-bottom:1%;">
                  <p style="color:white;"><?php echo $row_a['nome']; ?></p>
                </div>
              </a>
            </div>
          </div>
    <?php
      }

    }
    ?>

  </div>


  <div class="articles col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 2%; width:100%">

	<?php
  $qry_a="";
  if($cat_id == 0){
    $qry_a="SELECT * FROM CURRICULUM ;";
  }else{
    $qry_a="SELECT * FROM CURRICULUM WHERE ID_cat='".$cat_id."';";
  }

	$result_a = $mysqli->query($qry_a);
	while($row_a = $result_a->fetch_array())
	{
	?>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >
      <div class="article col-lg-12 col-md-12 col-sm-12 col-xs-12" >
          <a href="detail_curriculum.php?id=<?php echo $row_a['ID']; ?>" >
            <div class="preview" >
              <img src="<?php echo $row_a['url_foto']; ?>" />
            </div>
            <div class="description">
              <p><?php echo $row_a['nome']; ?>  <?php echo $row_a['cognome']; ?></p>
            </div>
          </a>
        </div>
      </div>
	<?php
	}
	?>

    </div>
      <script type="text/javascript">
                                    $('#addCV').on('click', function () {
	                                        $.alert({
                                            title: 'Aggiungi CV',
                                            content: 'Effettua il login per aggiungere il tuo CV',
                                            theme: 'supervan',
                                            animation:'RotateY',
                                            cancelButton: '',
                                            animationSpeed: 1000,
                                            columnClass: 'col-xs-12',
                                            confirm: function (id) {

                                            }
                                            });
                                    });

                                    $('#manageCV').on('click', function () {
	                                        $.alert({
                                            title: 'Modifica CV',
                                            content: 'Non hai inserito il tuo CV. Vai nella sezione \'Aggiungi curriculum \' qui accanto per inserirlo!',
                                            theme: 'supervan',
                                            animation:'RotateY',
                                            cancelButton: '',
                                            animationSpeed: 1000,
                                            columnClass: 'col-xs-12',
                                            confirm: function (id) {

                                            }
                                            });
                                    });
									 $('#deleteCV').on('click', function () {
	                                        $.alert({
                                            title: 'Elimina CV',
                                            content: 'Non hai inserito il tuo CV. Vai nella sezione \'Aggiungi curriculum \' qui accanto per inserirlo!',
                                            theme: 'supervan',
                                            animation:'RotateY',
                                            cancelButton: '',
                                            animationSpeed: 1000,
                                            columnClass: 'col-xs-12',
                                            confirm: function (id) {

                                            }
                                            });
                                    });

									  $('#inserted').on('click', function () {
	                                        $.alert({
                                            title: 'Aggiungi CV',
                                            content: 'Hai già inserito il tuo CV. Vai nella sezione \'Gestisci il tuo curriculum \' qui accanto per modificarlo!',
                                            theme: 'supervan',
                                            animation:'RotateY',
                                            cancelButton: '',
                                            animationSpeed: 1000,
                                            columnClass: 'col-xs-12',
                                            confirm: function (id) {

                                            }
                                            });
                                    });
									$('#valideDeleteCV').on('click', function () {
										$.confirm({
												title: 'Elimino Curriculum',
												confirmButton: 'Elimina',
												cancelButton: 'Annulla',
												content: 'Sei sicuro di voler eliminare il tuo curriculum?',
												theme: 'supervan',
												confirmButtonClass: 'btn-info',
												cancelButtonClass: 'btn-danger',
												animation:'RotateY',
												animationSpeed: 1000,
												confirm: function () {
													$.ajax({
														url:'deleteCV.php',
														type: 'POST',
														data: { 
															'cod': 'young123' 
														},
														success:function(response){
															//alert("resp: "+response);
															if( response.indexOf("success") > -1){			
																$.alert({
																	title: 'CV Eliminato con successo',
																	content: 'Hai eliminato il tuo CV con successo!',
																	theme: 'supervan',
																	animation:'RotateY',
																	cancelButton: '',
																	animationSpeed: 1000,
																	columnClass: 'col-xs-12',
																	confirm: function (id) {
																		location.reload(true);
																	}
																});															
																
															}else{
																$.alert({
																	title: 'Eliminazione fallita',
																	content: 'Si è verificato qualche errore, prova a ricaricare la pagina e riprova, oppure contatta l amministratore!',
																	theme: 'supervan',
																	animation:'RotateY',
																	cancelButton: '',
																	animationSpeed: 1000,
																	columnClass: 'col-xs-12',
																	confirm: function (id) {
																		location.reload(true);
																	}
																});
																
															}
														}
													});		

												}										
										});
										
									 });

                                </script>

</body>
</html>
