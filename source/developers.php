<!doctype html>
<html lang="en" class="no-js">
	<?php
include 'private/connessione-db.php';
include 'private/utility-login.php';

my_session_start();

$linkIndietro = "index.php";
$testoIndietro = "TORNA ALLA HOME";

$filter = $_GET['filter'];
$grpg = $_GET['grpg'];
?>
<head>
	    <link rel="icon" href="images/icon.ico" />

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="young,portal,network,children,ragazzi,giovani,strutture,noleggio,valle di cembra,trentino,forum,studenti,contatti,associazioni,aziende,imprenditori,eventi,attività,curriculums,opportunità" />
    <meta name="description" content="Portale interattivo dedicato ai giovani della Valle di Cembra. Qui puoi trovare eventi e attività che si svolgono in valle. Un giovane può condividere le proprie esperienze e conoscenze in modo semplice, pubblicizzare la propria azienda."/>

	<script src="js/js_developers/modernizr.js"></script> <!-- Modernizr -->



	<!--        CSS       -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700|Merriweather:400italic,400' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/css_developers/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/css_developers/style.css"> <!-- Resource style -->
	<link rel="stylesheet" href="css/font-awesome.min.css" >
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	  <link rel="stylesheet" href="css/css_login/reset.css"> <!-- CSS reset -->
  <link rel="stylesheet" href="css/css_login/style.css"> <!-- Gem style -->
	<!--              -->


	<!-- JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
	<!-- -->

	<!-- Per Login -->
  <script type="text/javascript" src="private/sha512.js"></script>
  <script src="js/js_login/modernizr.js"></script> <!-- Modernizr -->
  <script src="js/js_login/main.js"></script> <!-- Gem jQuery -->


	<title>YPN | Developers</title>
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

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:100px">
          <img src="images/sviluppatori_logo.png" style="height: 100%;width: auto;"/>

				<a style="vertical-align: top;">SVILUPPATORI</a>
		</div>
    </div>
  </div>


	<div class="projects-container col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<ul>
			<li class="cd-single-project">
				<div class="cd-title">
					<h2>Luca Casna</h2>
					<p>Project manager - Sviluppatore software</p>
				</div> <!-- .cd-title -->

				<div class="cd-project-info">
					<p>
						Laureato in Informatica presso l'Università degli Studi di Trento. Inventore e refernete del Progetto, ha gestistito e cordianto il team oltre a sviluppare parte del codice.
						<br/>
						<br/>
						<br/>
						<br/>
						Contact : <br/>
						<br/>

						Mobile : +39 3491314206<br/>
						<a href="mailto:l.casna@gmail.com" style="color:rgb(63, 83, 142);">E-mail</a> <br/>
						<a href="https://www.facebook.com/luca.casna" style="color:rgb(63, 83, 142);">Facebook</a><br/>

					</p>
				</div> <!-- .cd-project-info -->
			</li>

			<li class="cd-single-project">
				<div class="cd-title">
					<h2>Michele Casagranda</h2>
					<p>Sviluppatore software (back-end)</p>
				</div> <!-- .cd-title -->

				<div class="cd-project-info">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, quod dicta aliquid nemo repellendus distinctio minus dolor aperiam suscipit, ea enim accusantium, deleniti qui sequi sint nihil modi amet eligendi, quidem animi error labore voluptatibus sed. Qui magnam labore, iusto nostrum. Praesentium non, impedit accusantium consequatur officia architecto, mollitia placeat aperiam tenetur pariatur voluptatibus corrupti vitae deserunt! Nostrum non mollitia deserunt ipsam. Sunt quaerat natus cupiditate iure ipsa voluptatibus recusandae ratione vitae amet distinctio, voluptas, minus vero expedita ea fugit similique sit cumque ad id facere? Ab quas, odio neque quis ratione. Natus labore sit esse, porro placeat eum hic.
					</p>
				</div> <!-- .cd-project-info -->
			</li>

			<li class="cd-single-project">
				<div class="cd-title">
					<h2>Christian Joppi</h2>
					<p>Sviluppatore software (front-end)</p>
				</div> <!-- .cd-title -->

				<div class="cd-project-info">
					<p>
						Giovane intraprendente appassionato all'IT . Diplomato nel 2013 presso l'istituto tecnico G.Marconi con il titolo di Perito Informatico. Frequenta il terzo anno universitario presso il Dipartimento di Ingegneria e Scienze dell'Informazione di Trento. Possiede buone conoscenze in ambito web developing e sviluppo applicativi mobile. Ama viaggiare ed è attivo come vigile del fuoco volontario.
						<br/>
						<br/>
						<br/>
						<br/>
						Contact : <br/>
						<br/>

						Mobile : +39 3494645026<br/>
						<a href="mailto:christian.joppi@gmail.com" style="color:rgb(63, 83, 142);">E-mail</a> <br/>
						<a href="https://www.linkedin.com/profile/view?id=AAIAAAugjyYBT_De6wuJ-imbmUqf5a0rxNRfPZ8&trk=nav_responsive_tab_profile_pic" style="color:rgb(63, 83, 142);">Linkedin</a><br/>
						<a href="https://www.facebook.com/christian.joppi" style="color:rgb(63, 83, 142);">Facebook</a><br/>

					</p>
				</div> <!-- .cd-project-info -->
			</li>

			<li class="cd-single-project">
				<div class="cd-title">
					<h2>Alessio Casna</h2>
					<p>Sviluppatore software (basic)</p>
				</div> <!-- .cd-title -->

				<div class="cd-project-info">
					<p>
						Laureando in Ingengeria industriale presso l'Università degli Studi di Trento. Ha contribuito alla realizzazione del progetto sviluppando codice e ricercando dati presenti sul portale.
						<br/>
						<br/>
						<br/>
						<br/>
						Contact : <br/>
						<br/>

						Mobile : +39 3400800456<br/>
						<a href="mailto:casna.alessio93@gmail.com " style="color:rgb(63, 83, 142);">E-mail</a> <br/>
						<a href="https://www.facebook.com/alessio.casna" style="color:rgb(63, 83, 142);">Facebook</a><br/>
					</p>
				</div> <!-- .cd-project-info -->
			</li>
		</ul>
		<a href="#0" class="cd-close">Close</a>
		<a href="#0" class="cd-scroll">Scroll</a>
	</div> <!-- .project-container -->
<script src="js/js_developers/jquery-2.1.1.js"></script>
<script src="js/js_developers/main.js"></script> <!-- Resource jQuery -->

<script>
		window.onload = function() {

			if($(window).width()<776){
				document.getElementById('torna_home').style.display='none';
			}else{
				document.getElementById('torna_home').style.display='block';

			}

			onChangeDim();

		}
</script>
</body>
</html>
