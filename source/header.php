
<script type="text/javascript">
	var _iub = _iub || [];
	_iub.csConfiguration = {
		cookiePolicyId: 587389,
		siteId: 446959,
		lang: "it"
	};
	(function (w, d) {
		var loader = function () { var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src = "//cdn.iubenda.com/cookie_solution/iubenda_cs.js"; tag.parentNode.insertBefore(s, tag); };
		if (w.addEventListener) { w.addEventListener("load", loader, false); } else if (w.attachEvent) { w.attachEvent("onload", loader); } else { w.onload = loader; }
	})(window, document);
</script>

<?php
if( strcmp( $testoIndietro , "#") == 0  ){
?>
	<div class="logo" style="float:left;"  >
		<font style="color:rgb(180,183,34);">V A L L E  </font><font style="color:#008fd7;">D I   </font><font style="color:#eb8c06;">C E M B R A</font>
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
		  <li style="color:#eb8c06;background-color: black; cursor: pointer;">Benvenuto, <?php echo $_SESSION['username']; ?></li>
		  <li><a id="a-esci" href="private/logout.php" > Esci </a></li>
	  <?php
	  }else{
	  ?>
		  <li><a class="cd-signin" style="background-color:rgb(0,144,215);" href="#0">Accedi</a></li>
		  <li><a class="cd-signup" style="background-color:rgb(234,140,6);" href="#0">Registrati</a></li>
	  <?php
	  }
	  ?>
	</ul>
</nav>
