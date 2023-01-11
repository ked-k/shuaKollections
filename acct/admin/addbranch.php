<?php
 include '../config.php' ;
if(isset($_POST['bname'])) {


  $bname = trim($_POST['bname']);
  $blocation = trim($_POST['blocation']);
  $me = $_SESSION['uid'];
 
  if($bname != "") {
    try {

 $sql = "INSERT INTO `location`(`name`, `region`, `AddBy`) VALUES('$bname',  '$blocation', '$me')";
  $stmt = $db->prepare($sql);
  $stmt->execute();
if($stmt->rowCount() > 0)
 {
	
 echo '<script language="javascript">';
                                        echo 'alert("Shop type Successfully created!")';
                                        echo '</script>';
                                        echo '<meta http-equiv="refresh" content="0;url=locations" />';
   
}
    	
      
      
    } catch (PDOException $e) {
      echo '<script language="javascript">';
                                        echo 'alert("Errror, Something went wrong!'.$e->getMessage().'")';
                                        echo '</script>';
                                       echo "<script type='text/javascript'>window.history.go(-1);</script>";
    
    } 
}

}
else{
      echo '<script language="javascript">';
                                        echo 'alert("Errror, Something went wrong! prameter not defined")';
                                        echo '</script>';
                                       echo "<script type='text/javascript'>window.history.go(-1);</script>";
    
    } 
?>