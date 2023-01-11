<?php
 include '../config.php' ;
if(isset($_POST['saveSup'])) {
 extract($_POST);
  if($Supname != "") {
    try {

 $sql = "INSERT INTO `supplier`( `Name`, `Location`, `Contact`, `Email`, `Supcode`)
                        VALUES('$Supname','$location', '$contact', '$email','$code')";
  $stmt = $db->prepare($sql);
  $stmt->execute();
if($stmt->rowCount() > 0)
 {
	
  $msg2 ='<div class="alert alert-success alert-dismissible fade show" role="alert">
  The record was successfully <strong>saved</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
   
}
    	
      
      
    } catch (PDOException $e) {
       $msg2 ='<div class="alert alert-danger alert-dismissible fade show" role="alert">
  Error <strong>Something went wrong, no action took place</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    
    } 
}

}

?>