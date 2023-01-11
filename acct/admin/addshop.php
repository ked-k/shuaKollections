<?php
 include '../config.php' ;
if(isset($_POST['spname'])) {


  $spname = trim($_POST['spname']);
  $type = trim($_POST['type']);
  $brunch = trim($_POST['brunch']);
  $me = $_SESSION['uid'];
 
  if($spname != "") {
    try {

 $sql = "INSERT INTO `shop`( `Spname`, `Sptype`, `Splocation`, `addedby`) VALUES('$spname', '$type', '$brunch', '$me')";
  $stmt = $db->prepare($sql);
  $stmt->execute();
if($stmt->rowCount() > 0)
 {
	
 echo '<script language="javascript">';
                                        echo 'alert("Shop type Successfully created!")';
                                        echo '</script>';
                                        echo '<meta http-equiv="refresh" content="0;url=shops" />';
   
}
    	
      
      
    } catch (PDOException $e) {
      echo '<script language="javascript">';
                                        echo 'alert("Errror, Something went wrong!'.$e->getMessage().'")';
                                        echo '</script>';
                                         echo "<script type='text/javascript'>window.history.go(-1);</script>";
    } 
}

}?>