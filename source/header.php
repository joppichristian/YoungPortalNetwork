
<?php
if( strcmp( $testoIndietro , "#") == 0  ){
?>
	<div class="logo" style="float:left;"  >
<<<<<<< HEAD
		<font style="color:rgb(180,183,34);">V A L L E  </font><font style="color:rgb(0,144,215);">D I   </font><font style="color:rgb(234,140,6);">C E M B R A</font>
=======
		<font style="color:rgb(180,183,34);">V A L L E  </font><font style="color:#008fd7;">D I   </font><font style="color:#eb8c06;">C E M B R A</font>
>>>>>>> origin/developing
	</div>
<?php
}else{
?>
	<div id="cd-logo"><a href="<?php echo $linkIndietro; ?>"><a href="<?php echo $linkIndietro; ?>"><i  class="fa fa-chevron-left"></i><?php echo $testoIndietro; ?></a></div>
<?php
}
?>

<nav class="main-nav" >
	<ul>
	  <!-- inser more links here -->
	  <?php
	  if(utenteLoggato($mysqli) == true) {
	  ?>
		  <li>Benvenuto, <?php echo $_SESSION['username']; ?></li>
		  <li><a href="private/logout.php" > Esci </a></li>
	  <?php
	  }else{
<<<<<<< HEAD
	  ?>
		  <li><a class="cd-signin" style="background-color:rgb(23,148,201);" href="#0">Accedi</a></li>
		  <li><a class="cd-signup" style="background-color:rgb(149,59,69);" href="#0">Registrati</a></li>
=======
	  ?>		
		  <li><a class="cd-signin" style="background-color:rgb(0,144,215);" href="#0">Accedi</a></li>
		  <li><a class="cd-signup" style="background-color:rgb(234,140,6);" href="#0">Registrati</a></li>
>>>>>>> origin/developing
	  <?php
	  }
	  ?>
	</ul>
</nav>
