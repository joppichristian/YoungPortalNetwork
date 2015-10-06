<?php
$mysqli = new mysqli("62.149.150.238", "Sql891517", "re7e29q40a", "Sql891517_1");
if ($mysqli->connect_errno) {
    //echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	echo "Failed to connect to DataBase...";
	exit();
}
?>