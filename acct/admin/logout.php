<?php 
if(session_status() == PHP_SESSION_NONE)
{
	session_start();
	session_destroy();//start session if session not start
}

unset($_SESSION['uid']);
$url = "../../index.php";
if(isset($_GET["session_expired"])) {
	$url .= "?session_expired=" . $_GET["session_expired"];
}
header("Location:$url");

?>