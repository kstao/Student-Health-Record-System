<?php

include ('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $id = $conn->real_escape_string($_POST['studentID']);

	$sql = "SELECT * FROM appointment WHERE student_id = '$id'";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) { 
			$return_arr[] = array(
				"appointmentID" => $row['appointment_id'],
        "date" => $row['date'],
        "message" => $row['message'],
        "status" => $row['status']
			);
		}
		$sentData = [
			"result" => true,
			"application" => $return_arr
		];
		echo json_encode($sentData);
	}
	else { 
		$sentData=[
			"result" => false, 
			"message" => "Empty inbox..."
		];
		echo json_encode($sentData);
	}
	$conn->close();
}
?>