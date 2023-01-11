<?php 
if(session_status() == PHP_SESSION_NONE)
{
	session_start();
}
if(!isset($_GET['p']) AND !isset($_GET['Lname']) AND !isset($_GET['lid'])  ){
	header('location: index');
}

if(isset($_GET['lid']) AND isset($_GET['Lname']) ){
	$_SESSION['locationid'] = $_GET['lid'];
	$_SESSION['locationName'] = $_GET['Lname'];
	$_SESSION['locationRegion'] = $_GET['bregion'];
    echo "<script>swalert();</script>";
    echo '<meta http-equiv="refresh" content="3;url=dashboard" />';
                                        
                                      
}




?>
<!DOCTYPE html>
<html lang="en">
    <head>
 <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $appname ?> | open shop</title>
  <link rel="stylesheet" href="../assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='../assets/img/favicon.ico' />
</head>
<body onload="swalert()">
    
   
      <script src="../assets/bundles/sweetalert/sweetalert.min.js"></script>
       <script>
     
        
    function swalert() {
  
swal('Welcome', 'You will soon be taken to <?php echo $_SESSION['locationName'] ?>!', 'success');
    

    // window.location="dashboard";
    }
 
    
  </script>
  
</body>
</html>
 