<?php

include "../conn.php";
extract($_POST);
$sql = "  INSERT INTO `departments`( `DepartmentName`) 
 VALUES ('$department') ";
if ($conn->query($sql) === TRUE) {
	
 echo '<script language="javascript">';
                                        echo 'alert("Department Successfully Added!")';
                                        echo '</script>';
                                        echo '<meta http-equiv="refresh" content="0;url=Departments" />';
   
} else {

	 echo '<script language="javascript">';
                                        echo 'alert("Department already taken!")';
                                        echo '</script>';
     echo $conn->error;
           echo '<form>
 <input type="button" value="Go back!" onclick="history.back()">
</form>';
}

$conn->close();

?>