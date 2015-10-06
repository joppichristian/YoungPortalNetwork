<?php
include 'connessione-db.php';
include 'utility-login.php';

my_session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST"){

	if(isset($_POST['signin-email'], $_POST['p'])) { 
	
		$username = $_POST['signin-email'];
		$password = $_POST['p'];
   
		if(!effettua_login($username, $password, $mysqli)) {
      		
			echo "LOGIN FALLITO, TORNA INDIETRO E RIPROVA!!";
			
			/* if(isset($_POST['redirect'])){	
				//header('Location: ./'.$_POST['redirect']."?erroreL=1");
				die();
			}else{
				//header('Location: ../index.html');
				die();
			} */
			
		} else {
			
			echo "success";
			
			/* if(isset($_POST['redirect'])){	  
				header('Location: ./'.$_POST['redirect']);
				die();
			}else{
				header('Location: ../index.html');
				die();
			}	 */	
		}
	} else { 
   
		echo "Si è verificat qualche errore. Torna al sito e riprova...";
	}
}else{
	echo "Si è verificato qualche errore. Torna al sito e riprova...";
}	
?>

