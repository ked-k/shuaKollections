


<?php
 include '../config.php' ;
if(isset($_POST['product'])) {
extract($_POST);
$Pid = trim($_POST['pid']);
  $product = trim($_POST['product']);
  $code = trim($_POST['code']);
  $brunch = trim($_POST['brunch']);
  $uom = trim($_POST['uom']);
 $cprice = trim($_POST['cprice']);
  $saleprice = trim($_POST['saleprice']);
  $des = trim($_POST['des']);
  $color = trim($_POST['color']);
  $dpt = trim($_POST['dpt']);
  $cart = trim($_POST['cart']);
  // $subcart = trim($_POST['subcart']);
  // $shop = trim($_POST['shop']);
  $me = $_SESSION['uid'];
  $gncode = trim($_POST['gncode']);
  $x = $saleprice-$cprice;
  $mak1 = $x/$saleprice;
  $mak = $mak1*100;
  if($product != "") {
    try {

 $sql = "UPDATE `products` SET `PName`= '$product', `PCode`='$code', GnCode = '$gncode', `PDepartment` ='$dpt', `PCategory`='$cart',   `UOM`='$uom', `Costprice`='$cprice', `pcolor`='$color', `markup`='$mak', `RRPrice`='$saleprice', `Description`='$des',  Updates = Updates+1 
WHERE Pid = '$Pid'
  ";
  $stmt = $db->prepare($sql);
  $stmt->execute();
if($stmt->rowCount() > 0)
 {
     

 echo '<script language="javascript">';
                                        echo 'alert("Product record are Successfully updated!")';
                                        echo '</script>';
                                        echo '<meta http-equiv="refresh" content="0;url=editproduct?Pid='.$Pid.'" />';
  
}

    	
      
      
    } catch (PDOException $e) {
      echo '<script language="javascript">';
                                        echo 'alert("Errror, Something went wrong!'.$e->getMessage().'")';
                                        echo '</script>';
                                   echo "<script type='text/javascript'>window.history.go(-1);</script>";
    } 
}

}?>