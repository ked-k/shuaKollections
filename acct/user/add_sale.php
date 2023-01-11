<?php

include "../conn.php";
extract($_POST);
$today = date("Y-m-d");
$month = date("F-Y");
$sql = " INSERT INTO `sale`( `Item`,  `Outlet`, `Location`, `UCTN`, `Ctn`, `Pcs`, `Sales`, `Ptype`, `Amount`, `SDate`, `Month`, `Q-code`, Van, Rctno, User)
                     VALUES ('$item','$outname','$location','$unc','$ctn','$pcs','$sales','$ptype','$amount','$today','$month','$scode','$van', '$rctno','$me') ";
if ($conn->query($sql) === TRUE) {
	
 echo '<script language="javascript">';
                                        echo 'alert("Sale Successfully Added!")';
                                        echo '</script>';
                                        echo '<meta http-equiv="refresh" content="0;url=newsale?scode='.$scode.'" />';
   
} else {

	 echo '<script language="javascript">';
                                        echo 'alert("Category already taken!")';
                                        echo '</script>';
     echo $conn->error;
           echo '<form>
 <input type="button" value="Go back!" onclick="history.back()">
</form>';
}

$conn->close();

?>