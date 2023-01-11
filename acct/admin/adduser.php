
<?php
 include '../config.php' ;
if(isset($_POST['uname'])) {
extract($_POST);
$today = date("Y-m-d");
$pass = md5($_POST['password']);
  $uname = trim($_POST['uname']);
  $fname = trim($_POST['fname']);
  $role = trim($_POST['role']);
  $email = trim($_POST['email']);
  $contact = trim($_POST['contact']);
  $mybranch = trim($_POST['mybranch']);
if(!isset($_POST['Read'])) {
$uread = '0';
}else{
$uread = $_POST['Read'];
}

if(!isset($_POST['write'])) {
$uwrite = '0';
}else{
$uwrite = $_POST['write'];
}

if(!isset($_POST['dashboard'])) {
$udashboard = '0';
}else{
$udashboard = $_POST['dashboard'];
}

if(!isset($_POST['Delete'])) {
$uDelete = '0';
}else{
$uDelete = $_POST['Delete'];
}

if(!isset($_POST['Edit'])) {
$uEdit = '0';
}else{
$uEdit = $_POST['Edit'];
}

 
  if($email != "") {
    try {

 $sql = "INSERT INTO `users`(`Uname`, `FullName`, `Password`, `Role`, `Email`,  `Contact`,`Date`, `uRead`, `uWrite`, `uDelete`, `uEdit`, `Dashboard`, MyLocation) 
  VALUES ('$uname','$fname','$pass', '$role', '$email','$contact','$today','$uread','$uwrite', '$uDelete','$uEdit', '$udashboard','$mybranch')";
  $stmt = $db->prepare($sql);
  $stmt->execute();
if($stmt->rowCount() > 0)
 {
      
      echo '<script language="javascript">';
                                        echo 'alert("User Successfully Added!")';
                                        echo '</script>';
                                         echo '<meta http-equiv="refresh" content="0;url=users" />';
   
}
      
      
      
    } catch (PDOException $e) {
      echo '<script language="javascript">';
                                        echo 'alert("Errror, Something went wrong!'.$e->getMessage().'")';
                                        echo '</script>';
                                        echo "<script type='text/javascript'>window.history.go(-1);</script>";
    } 
}

}?>