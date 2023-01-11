<?php 
if(session_status() == PHP_SESSION_NONE)
{
	session_start();//start session if session not start
}

if(!isset($_SESSION['uid'])){
	header('location: ../../auth-login');
}


?>

<?php

function isLoginSessionExpired() {
	$login_session_duration = 1860; 
	$current_time = time(); 
if ((time() - $_SESSION['loggedin_time']) > 1700)
{  echo '<script language="javascript">';
                                        echo 'alert("You are about to be logged out in less than 2 mins sec, please save you data!")';
                                        echo '</script>';
                                     
		} 



	if(isset($_SESSION['loggedin_time']) and isset($_SESSION['uid'])){  
		if(((time() - $_SESSION['loggedin_time']) > $login_session_duration)){ 
			return true; 
		} 
		else {$_SESSION['loggedin_time'] = time();}
	}
	return false;
}
?>

<?php

$x = $_SERVER['REQUEST_URI'];
if(isset($_SESSION['uid'])) {
	if(isLoginSessionExpired()) {
		header("Location:logout.php?session_expired=$x");
	}
}



?>


