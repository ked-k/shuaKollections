<?php
	require_once '../conn.php';
	if(ISSET($_POST['item'])){
extract($_POST);	    
$scode = $_POST['scode'];
		$result1 = mysqli_query($conn,"UPDATE `stock` SET `State` = 'Saved', updates = updates+1 WHERE stkCodde = '$scode' ");
    if($conn->affected_rows > 0){    
	    
	    
		foreach($_POST['item'] as $key => $value){
			$item = $value;
			$qty = $_POST['qty'][$key];
            
			$result = mysqli_query($conn,"UPDATE `products` SET `QtyLeft` = QtyLeft+'$qty'  WHERE `products`.`Pid` = '$item' ");
    if($conn->affected_rows > 0){
        
	
 echo '<script language="javascript">';
                                        echo 'alert("Stock Successfully saved!")';
                                        echo '</script>';
                                        echo '<meta http-equiv="refresh" content="0;url=stock" />';
   

    }
     else {
$er = $conn->error;
	 echo '<script language="javascript">';
                                        echo 'alert("OOOH NOO E01! '.$er.'")';
                                        echo '</script>';
                                        echo "<script type='text/javascript'>window.history.go(-1);</script>";
    
}
        
    }
    

		}
		else {
$er = $conn->error;
	 echo '<script language="javascript">';
                                        echo 'alert("OOOH NOO E01! couldent save '.$er.'")';
                                        echo '</script>';
                                        echo "<script type='text/javascript'>window.history.go(-1);</script>";	
}
		
}

	
?>


