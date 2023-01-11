<?php

include "../conn.php";
extract($_POST);
$sql = " INSERT INTO `vans`( `Van_name`, `No`, `Sales-man`, `Location`)
 VALUES ('$vname','$no','$sman','$location') ";
if ($conn->query($sql) === TRUE) {
	
 echo '<script language="javascript">';
                                        echo 'alert("Van Successfully Added!")';
                                        echo '</script>';
                                        echo '<meta http-equiv="refresh" content="0;url=vans" />';
   
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