<?php
 include '../config.php' ;
include "../conn.php";
if(isset($_POST['item'])) {
 $me = trim($_POST['me']);
  $item = trim($_POST['item']);
  $qty = trim($_POST['qty']);
  $todays = date("Y-m-d");
  $scode = trim($_POST['scode']);
  $amount = trim($_POST['amount']);
  $total = trim($_POST['total']);

  if($item != "" && $scode != "") {
      
      $sql1=mysqli_query($conn,"SELECT * FROM stock WHERE Pdt = '$item' AND stkCodde = '$scode'  ");
if(mysqli_num_rows($sql1)>0)
{
    $sql2 = "UPDATE `stock` SET Stock = Stock+'$qty',  StkAmount = StkAmount+'$total'  WHERE Pdt = '$item' AND stkCodde = '$scode' ";
    if ($conn->query($sql2) === TRUE) {
    echo '<script language="javascript">';
                                        echo 'alert("Order Successfully updated!")';
                                        echo '</script>';
                                         echo '<meta http-equiv="refresh" content="0;url=NewStockRequest?stkcode='.$scode.'" />';
                                        exit;
                                        
    }
}
      
      
      
  else{
    try {

 $sql = "INSERT INTO `stock`( `Pdt`,  `Stock`, `DateAdded`, `Dateupdated`, `stkCodde`,  `Requester`, `StkAmount`, Unitcost) 
                        VALUES  ('$item', '$qty', '$todays', '$todays', '$scode', '$me','$total', '$amount')";
  $stmt = $db->prepare($sql);
  $stmt->execute();
if($stmt->rowCount() > 0)
 {
	
 echo '<script language="javascript">';
                                        echo 'alert("The request order was Successfully added!")';
                                        echo '</script>';
                                        echo '<meta http-equiv="refresh" content="0;url=NewStockRequest?stkcode='.$scode.'" />';
   
}
      
      
      
    } catch (PDOException $e) {
      echo '<script language="javascript">';
                                        echo 'alert("Errror, Something went wrong! '.$e->getMessage().'")';
                                        echo '</script>';
                                        echo "<script type='text/javascript'>window.history.go(-1);</script>";
    } 
}
}
}?>

