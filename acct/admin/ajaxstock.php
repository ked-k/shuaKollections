




<?php 

	// Include the database config file 
	include_once '../conn.php';



	$countryId = $_POST['countryId'];

	if (!empty($countryId)) {
	
		$query = "SELECT * FROM `products`  WHERE   Pid = {$countryId} ";

		$result = $conn->query($query);

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				echo '<option value="'.$row['Costprice'].'">'.$row['Costprice'].'</option>'; 
			}
		}else{
			echo '<option value="">No data</option>'; 
		}
	}
	


?>