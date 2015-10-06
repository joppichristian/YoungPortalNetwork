<?php
include 'utility-login.php';

my_session_start();

// Reinizializza la sessione.
$_SESSION = array();

$params = session_get_cookie_params();

setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);

session_destroy();

//RIMANDO SEMPRE ALLA INDEX
header('Location: ../index.php');
?>

