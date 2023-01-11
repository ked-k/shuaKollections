




<?php 

	// Include the database config file 
	include_once '../conn.php';



	$countryId = $_POST['countryId'];

	if (!empty($countryId)) {
	
		$query = "SELECT * FROM `products`  WHERE   Pid = {$countryId} ";

		$result = $conn->query($query);

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				echo '<option value="'.$row['RRPrice'].'">'.$row['RRPrice'].'</option>'; 
			}
		}else{
			echo '<option value="">No data</option>'; 
		}
	}

		elseif (!empty($_POST['stateId'])) {
		$stateId = $_POST['stateId']; 



	$query = "SELECT *,QtyLeft AS QTY FROM `products`  WHERE   Pid = {$stateId}";

		$result = $conn->query($query);

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				echo '<option value="'.$row['QTY'].'">'.$row['QTY'].'</option>'; 
			}
		}else{
			echo '<option value="0">0</option>'; 
		}
	}
	


?>