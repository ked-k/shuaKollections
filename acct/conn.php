<?php
if(session_status() == PHP_SESSION_NONE)
{
	session_start();//start session if session not start
}

$servername = "localhost";
$username = "ssalluxb_admin";
$password = "admin441f!";
$dbname = "ssalluxb_pos";
date_default_timezone_set("Africa/Kampala");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    
                                                 echo '<script language="javascript">';
                                                echo 'alert("Please Contact Ripon Technologies Ltd!")';
                                                echo '</script>';
                                                echo '<meta http-equiv="refresh" content="0;url=https://ripontechug.com/web/contact-us/" />'; 
}
?>