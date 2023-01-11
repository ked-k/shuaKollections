<?php 
if(session_status() == PHP_SESSION_NONE)
{
	session_start();//start session if session not start
}

if(!isset($_SESSION['uid'])){
	header('location: ../../auth-login');
}

if(!isset($_SESSION['locationName'])){
	header('location:index');
}

if(isset($_SESSION['role'])){
  if ($_SESSION['role'] == 'Admin'){
      $view='';
  }
  
  elseif ($_SESSION['role'] == "User"){
      $view='style="display:none"'; 
      
  }

}


  if ($_SESSION['read'] == '1'){
      $rd='';
  }
  else{
      $rd='style="display:none"';
  }
  
  
    if ($_SESSION['write'] == '1'){
      $wt='';
  }
  else{
      $wt='disabled';
  }
  
    if ($_SESSION['delet'] == '1'){
      $dl='';
  }
  else{
      $dl='style="display:none"';
  }
  
    if ($_SESSION['edit'] == '1'){
      $ed='';
  }
  else{
      $ed='style="display:none"';
  }
  
    if ($_SESSION['dash'] == '1'){
      $dash='';
  }
  else{
      $dash='style="display:none"';
  }


if ($_SESSION['locationid'] == '')
{
	header('location: index');
}

$curBranchId = $_SESSION['locationid'];
$curBranchName = $_SESSION['locationName'];
$curBranchRegion = $_SESSION['locationRegion'];
$active ='';
$active2 ='';
$appname = 'Shua Kollections';
?>

<?php

function isLoginSessionExpired() {
	$login_session_duration = 7200; 
	$current_time = time(); 
if ((time() - $_SESSION['loggedin_time']) > 7200)
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


