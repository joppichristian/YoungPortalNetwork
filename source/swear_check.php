
<?
IF($_SERVER['REQUEST_METHOD'] == 'POST'){
$messaggio = $_POST['stringa'];
$parolacce=array('cazz','sesso','stronz','sex','porco','bastard','puttan','troi','dio','merd','cacc','pompin','fig'); 

     for ($i=0; $i < count($parolacce); $i++)  {    
         $exp = explode($parolacce[$i], $messaggio); 
         if ($exp[0]!=$messaggio) { 
             $ctrl = 1; 
             
              echo "error";
              die();
            }      
     } 
     
     echo "success";
     die();
     
}

?>