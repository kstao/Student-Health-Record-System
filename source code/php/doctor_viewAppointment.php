<?php

include ('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$sql = "SELECT a.appointment_id, a.date, b.fullname, a.message, a.status FROM appointment a
  LEFT JOIN user b
  ON a.student_id = b.user_id";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) { 
			$return_arr[] = array(
				"appointment_id" => $row['appointment_id'],
				"date" => $row['date'],
				"fullname" => $row['fullname'],
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