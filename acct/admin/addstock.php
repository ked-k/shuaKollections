

<?php
if (isset($_POST['save_stk'])){

extract($_POST);
$sql1=mysqli_query($conn,"SELECT * FROM `stock` WHERE Pdt = '$item' AND stkCodde = '$scode' AND SBlocation = '$StockLocation' ");
if(mysqli_num_rows($sql1)>0)
{
    $sql2 = "UPDATE `stock` SET Stock = Stock+'$qty', StkAmount = StkAmount+'$total'  WHERE Pdt = '$item' AND stkCodde = '$scode' AND SBlocation = '$StockLocation' ";
    if ($conn->query($sql2) === TRUE) {
    // echo '<script language="javascript">';
    //                                     echo 'alert("Stock Successfully updated!")';
    //                                     echo '</script>';
    //                                     echo '<meta http-equiv="refresh" content="0;url=newstock?scode='.$scode.'" />';

         $_SESSION['success'] ='<div class="alert alert-info alert-dismissible fade show" role="alert">
  The record was successfully <strong>Updated</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
// echo '<meta http-equiv="refresh" content="0;url=newstock?scode='.$scode.'" />';
//                                         exit;
                                        
    }
}
else {
$today = date("Y-m-d");
$month = date("F-Y");
$week = date("Y-F-W");
$ya = date("Y");
$sql = "INSERT INTO `stock`( `Pdt`, `BatchNo`, `Stock`, `DateAdded`, `DateExpiry`, `stkCodde`,  `Requester`, `StkAmount`, `Unitcost`,SBlocation, Supplier) 
                       VALUES ('$item', '$Batch', '$qty', '$today', '$exp', '$scode', '$me', '$total', '$amount','$StockLocation', '$sup') ";
if ($conn->query($sql) === TRUE) {
	
 // echo '<script language="javascript">';
 //                                        echo 'alert("Stock Successfully Added!")';
 //                                        echo '</script>';
 //                                        echo '<meta http-equiv="refresh" content="0;url=newstock?scode='.$scode.'" />';
     $msg ='<div class="alert alert-success alert-dismissible fade show" role="alert">
  The record was successfully <strong>Added</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
   
}     else {
$er = $conn->error;
	 // echo '<script language="javascript">';
  //                                       echo 'alert("OOOH NOO E01! '.$er.'")';
  //                                       echo '</script>';
  //                                       echo "<script type='text/javascript'>window.history.go(-1);</script>";

 $msg ='<div class="alert alert-warning alert-dismissible fade show" role="alert">
  Something went wrong <strong>'.$er.'</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    
}

// $conn->close();
}
}

?>


