<script type="text/javascript" src="sha512.js"></script>
<script language="JavaScript" type="text/JavaScript">
function codificaCampi() {
   
    // campo password criptata.
    var p = document.createElement("input");
    // Aggiungilo al form
    document.loginForm.appendChild(p);
	p.type = "hidden"
    p.name = "p";
   
    //Cripto la password
	
	
    p.value = SHA512(document.getElementById("password").value);
    
	//Non inviare la password normale
    document.getElementById("password").value = "";
	
    document.loginForm.submit();
}
</script>
<?php
if(isset($_GET['erroreL'])) { 
    echo "Errore di login, password o username incorretti";
}
?>
<form name="loginForm" id="loginForm" onsubmit="codificaCampi();" action="effettua-login.php" method="post" >
<table style="border: 1px solid #000000; border-collapse: separate;border-spacing: 35px 18px;" >
    <input type="hidden" name="redirect" value="<?php echo $redirect; ?>" /> 	
	<tr>
		<td>Username </td>
		<td><input name="username" type="text" /></td>
	</tr>
	<tr>	
		<td>Password </td>
		<td><input name="p" id="password" type="password" /></td>
	</tr>
	<tr>
		<td> <input type="submit" value="Login" /> </td>
	</tr>	 
</table>   
</form>