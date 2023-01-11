


<?php
 include '../config.php' ;
if(isset($_POST['product'])) {
extract($_POST);

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
  //$subcart = trim($_POST['subcart']);
  //$shop = trim($_POST['shop']);
  $me = $_SESSION['uid'];
  $gncode = rand(4,6).rand(500,5000).rand(30,60).rand(21,99).rand(2001,9000);
  $x = $saleprice-$cprice;
  $mak1 = $x/$saleprice;
  $mak = $mak1*100;
  if($product != "") {
    try {

 $sql = "INSERT INTO `products`( `PName`, `PCode`, GnCode, `PDepartment`, `PCategory`,  `UOM`, `Costprice`, `pcolor`, `markup`, `RRPrice`, `Description`,  PdtLocation) 
                          VALUES('$product', '$code', '$gncode', '$dpt', '$cart', '$uom', '$cprice', '$color', '$mak', '$saleprice', '$des', '$brunch' )";
  $stmt = $db->prepare($sql);
  $stmt->execute();
if($stmt->rowCount() > 0)
 {
 echo '<script language="javascript">';
                                        echo 'alert("Product Successfully created!")';
                                        echo '</script>';
                                        echo '<meta http-equiv="refresh" content="0;url=products" />'; 
}
else {
      echo '<script language="javascript">';
                                        echo 'alert("Errror, Something went wrong!'.$e->getMessage().'")';
                                        echo '</script>';
                                   echo "<script type='text/javascript'>window.history.go(-1);</script>";
    } 
    	
      
      
    } catch (PDOException $e) {
      echo '<script language="javascript">';
                                        echo 'alert("Errror, Something went wrong!'.$e->getMessage().'")';
                                        echo '</script>';
                                   echo "<script type='text/javascript'>window.history.go(-1);</script>";
    } 
}

}?>