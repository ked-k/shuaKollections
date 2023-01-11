




<?php 

	// Include the database config file 
	include_once '../conn.php';

	// Get country id through state name

	$countryId = $_POST['countryId'];

	if (!empty($countryId)) {
		// Fetch state name base on country id
		$query = "SELECT * FROM Category WHERE   department = {$countryId} ";

		$result = $conn->query($query);

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				echo '<option value="'.$row['id'].'">'.$row['CategoryName'].'</option>'; 
			}
		}else{
			echo '<option value="">No data</option>'; 
		}
	}
	
	elseif (!empty($_POST['stateId'])) {
		$stateId = $_POST['stateId']; 



	$query = "SELECT * FROM subcategory WHERE   category = {$stateId}";

		$result = $conn->query($query);

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				echo '<option value="'.$row['id'].'">'.$row['subcategoryname'].'</option>'; 
			}
		}else{
			echo '<option value="">No data</option>'; 
		}
	}

?>