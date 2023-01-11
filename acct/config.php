<?php 
if(session_status() == PHP_SESSION_NONE)
{
	session_start();
}


date_default_timezone_set("Africa/Kampala");
try {
  $db = new PDO('mysql:host=localhost;dbname=ssalluxb_pos;charset=utf8mb4', 'ssalluxb_admin', 'admin441f!');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);	
} catch (PDOException $e) {
          echo '<script language="javascript">';
                                                echo 'alert("Please Contact Ripon Technologies Ltd!")';
                                                echo '</script>';
                                                echo '<meta http-equiv="refresh" content="0;url=https://ripontechug.com/web/contact-us/" />'; 
}
?>