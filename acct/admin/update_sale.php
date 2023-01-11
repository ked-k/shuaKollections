<?php

include "../conn.php";
    
extract($_POST);

$sql = "UPDATE `sale` SET State = 'Saved', Updateby ='$me'
 WHERE `sale`.`Q-code` = '$scode' AND State = 'Pending' ";

if ($conn->query($sql) === TRUE) {

 echo '<script language="javascript">';
                                        echo 'alert("Sale Successfully saved!")';
                                        echo '</script>';
                                        echo '<meta http-equiv="refresh" content="0;url=savedsales?scode='.$scode.'" />';
   
} else {

	 echo '<script language="javascript">';
                                        echo 'alert("Error,!")';
                                        echo '</script>';
										
											echo  $conn->error;
											 echo '<form>
 <input type="button" value="Go back!" onclick="history.back()">
</form>';
  
}

$conn->close();

?>