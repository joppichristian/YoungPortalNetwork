<div class="logo" style="float:left;"  >
	<font style="color:rgb(50,72,31);">V A L L E  </font><font style="color:rgb(23,148,201);">D I   </font><font style="color:rgb(149,59,69);">C E M B R A</font>
</div>
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
			if($linkIndietro != "#")
			{
		?>
				<div id="cd-logo"><a href="<?php echo $linkIndietro ?>"><a href="<?php echo $linkIndietro ?>"><i  class="fa fa-chevron-left"></i><?php echo $testIndietro ?></a></div>
		<?php
			}
	   ?>

		 <li><a class="cd-signin" style="background-color:rgb(23,148,201);" href="#0">Accedi</a></li>
		 <li><a class="cd-signup" style="background-color:rgb(149,59,69);" href="#0">Registrati</a></li>
	  <?php
	  }
	  ?>
	</ul>
</nav>
