<?php

function effettua_login($username, $password, $mysqli) {
   
    //prevengo attacco SQL injection con prepared statement
    if ($stmt = $mysqli->prepare("SELECT ID, EMAIL, PASSWORD, SALT FROM UTENTE WHERE EMAIL = ? AND ATTIVO='1' LIMIT 1")) { 
      
		$stmt->bind_param('s', $username);  
        $stmt->execute();  
        $stmt->store_result();	  
	    //salva il risultato della query nei parametri
        $stmt->bind_result($user_id, $email, $db_password, $salt); 
        $stmt->fetch();	  
	    //codifica la password usando una chiave univoca (salt)
        $password = hash('sha512', $password.$salt);
		
        if($stmt->num_rows == 1) {
        
			if(!possibile_attacco($user_id, $mysqli)){ 
				
				if($db_password == $password){
				        
					$user_browser = $_SERVER['HTTP_USER_AGENT']; 
					//prevent XSS attack
					$user_id = preg_replace("/[^0-9]+/", "", $user_id); 					
					$username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);					
					//initialize session
					$_SESSION['user_id'] = $user_id; 
					$_SESSION['username'] = $email;
					$_SESSION['idLogin'] = hash('sha512', $password.$user_browser);
					
				 	return true;    
				
				}else	{					
					//[LOG] Salvo il tenativo errato di login
					$timeNow = time();
					$mysqli->query("INSERT INTO TENTATIVI_LOGIN (USER_ID, TIME) VALUES ('$user_id', '$timeNow')");				 
				}
			}
		}
		
	}
	
	return false;	
}



function utenteLoggato($mysqli) {
   
	if(isset($_SESSION['user_id'])){
     
		$user_id = $_SESSION['user_id'];
		$idLogin = $_SESSION['idLogin'];
			     
		if($stmt = $mysqli->prepare("SELECT PASSWORD FROM UTENTE WHERE ID = ? LIMIT 1")) { 
        
			$stmt->bind_param('d', $user_id);
			$stmt->execute();
			$stmt->store_result();
 
			if($stmt->num_rows == 1) {
				$stmt->bind_result($password); //Metti il risultato della query nella variabile $password
				$stmt->fetch();
				$login_check = hash('sha512', $password.$_SERVER['HTTP_USER_AGENT']);
				if($idLogin == $login_check) {					
					return true;					
				}				
			} 			
		} 		
	} 
		
	return false;
	
}


function my_session_start() {

        $session_name = 'myIdSession';
		
		$httponly = true; // rifiuta i Java
        $secure = false; // uso protocollo http (e non https)
				
        ini_set('session.use_only_cookies', 1); // uso solo cookies
        $cookieParams = session_get_cookie_params();
        session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
        session_name($session_name);
        session_start();
		
        session_regenerate_id();
}

function possibile_attacco($user_id, $mysqli) {
 
   $time_now = time();
   
   // dammi il time di 3 ore fa
   $time_possibile_attacco = $time_now - (3 * 60 * 60); 
   
   if ($stmt = $mysqli->prepare("SELECT * FROM TENTATIVI_LOGIN WHERE USER_ID = ? AND TIME > '$time_possibile_attacco'")) { 
      
	  $stmt->bind_param('d', $user_id); 
      
      $stmt->execute();
      $stmt->store_result();
      // Se ha sbagliato 8 volte la password
      if($stmt->num_rows > 8) {
         return true;
      } else {
         return false;
      }
   }
}

?>