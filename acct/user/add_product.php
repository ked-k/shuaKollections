<?php

include "../conn.php";
extract($_POST);
$sql = " INSERT INTO `products`( `P-name`, `P-Code`, `P-Department`, `P-Category`, `Sub-cat`,  `UOM`, `Case-price`, `Doz-Price`, `Unit-Price`, `RRPrice`, `Description`)
                          VALUES ('$product','$code','$dpt','$cat','$subcat','$uom','$cprice','$dprice','$uprice','$rrp','$des') ";
if ($conn->query($sql) === TRUE) {
	
 echo '<script language="javascript">';
                                        echo 'alert("Product Successfully Added!")';
                                        echo '</script>';
                                        echo '<meta http-equiv="refresh" content="0;url=products" />';
   
} else {

	 echo '<script language="javascript">';
                                        echo 'alert("Something occared!")';
                                        echo '</script>';
     echo $conn->error;
           echo '<form>
 <input type="button" value="Go back!" onclick="history.back()">
</form>';
}

$conn->close();

?>