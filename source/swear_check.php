<?php
 
if ($_SERVER['REQUEST_METHOD'] == "POST"){ 

	$messaggio =  $_POST['stringToCheck'];	

	$parolacce=array('cazz','sesso','stronz','sex','porc','bastard','puttan','troi','dio','merd','cacc','pompin','fig'); 
    
	for ($i=0; $i < count($parolacce); $i++)  {   

		//vedi http://php.net/manual/en/function.explode.php
        $exp = explode($parolacce[$i], $messaggio); 
		//echo "exp[0]: ".$exp[0];
		//echo "messaggio: ".$messaggio;
        if ($exp[0]!=$messaggio) { 
            echo "error";
			die();
        }      
    } 
    
    echo "success";

	 
}else{		
	echo "error req";
}	
 

?>