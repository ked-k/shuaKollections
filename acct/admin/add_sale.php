



<?php
if (isset($_POST['save_sale'])){
include "../conn.php";
extract($_POST);

$sql1=mysqli_query($conn,"SELECT * FROM sale WHERE Item = '$item' AND `sale`.`Scode` = '$scode' AND SaleLocation = '$SaleLocation' ");
if(mysqli_num_rows($sql1)>0)
{
    $avqty = $avqty-$qty;
    $sql2 = "UPDATE `sale` SET Pcs = Pcs+'$qty',  discount= discount+ '$discount', TotalAmt = TotalAmt+'$total', QtyAvailable = '$avqty'  WHERE Item = '$item' AND `sale`.`Scode` = '$scode' ";
    if ($conn->query($sql2) === TRUE) {
$result = mysqli_query($conn,"UPDATE products SET QtyLeft=QtyLeft-'$qty' WHERE products.Pid = '$item' ");
    // echo '<script language="javascript">';
    //                                     echo 'alert("Sale Successfully updated!")';
    //                                     echo '</script>';
    //                                     echo '<meta http-equiv="refresh" content="0;url=newsale?scode='.$scode.'" />';
    //                                     exit;
         $msg ='<div class="alert alert-info alert-dismissible fade show" role="alert">
  The recode was successfully <strong>Upated</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
                                        
    }
}
else {
$today = date("Y-m-d");
$month = date("F-Y");
$week = date("Y-F-W");
$ya = date("Y");
$avqty = $avqty-$qty;
$sql = "INSERT INTO `sale`( `Item`, `User`,  `Pcs`, `Ptype`, `Amount`, RAmount, QtyAvailable, discount, `SDate`, `Month`, `Week`, `Year`, `Scode` ,TotalAmt, SaleLocation, Updateby)
                     VALUES ('$item','$me','$qty','$ptype', '$soldamt', '$amount','$avqty','$discount','$today','$month','$week','$ya','$scode', '$total', '$SaleLocation','$me') ";
if ($conn->query($sql) === TRUE) {
$result = mysqli_query($conn,"UPDATE products SET QtyLeft=QtyLeft-'$qty' WHERE products.Pid = '$item' ");
 // echo '<script language="javascript">';
 //                                        echo 'alert("Sale Successfully Added!")';
 //                                        echo '</script>';
 //                                        echo '<meta http-equiv="refresh" content="0;url=newsale?scode='.$scode.'" />';
     $msg ='<div class="alert alert-success alert-dismissible fade show" role="alert">
  The recode was successfully <strong>Added</strong>
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
  Error, Something went wrong <strong>'.$er.'</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    
}


}
}
?>