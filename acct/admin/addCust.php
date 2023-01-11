<?php
 include '../config.php' ;
if(isset($_POST['saveCust'])) {
 extract($_POST);
  if($cusname != "") {
    try {

 $sql = "INSERT INTO `customers`(`CusName`, `Location`, `AcctNo`, `Contact`)
                        VALUES('$cusname',  '$location', '$actno', '$contact')";
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