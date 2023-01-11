<?php

include "../conn.php";
extract($_POST);
$sql = " INSERT INTO `subcategory`(`subcategoryname`)
 VALUES ('$subcategory') ";
if ($conn->query($sql) === TRUE) {
	
 echo '<script language="javascript">';
                                        echo 'alert("subcategory Successfully Added!")';
                                        echo '</script>';
                                        echo '<meta http-equiv="refresh" content="0;url=subcategory" />';
   
} else {

echo '<script language="javascript">';
                                        echo 'alert("Errror, Something went wrong!'.$conn->error.'")';
                                        echo '</script>';
                                   echo "<script type='text/javascript'>window.history.go(-1);</script>";

}

$conn->close();

?>