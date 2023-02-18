<?php

include ('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$studentID = $conn->real_escape_string($_POST['id']);

	
	$sql = "SELECT appointment_id, status FROM appointment WHERE student_id = '$studentID'";
	$result = $conn->query($sql);

	$medcert = array();
	$appointment = array();

	if ($result->num_rows >= 0) {
		while($row = $result->fetch_assoc()) { 
			$appointment[] = array(
				"appointment_id" => $row['appointment_id'],
				"status" => $row['status']
			);
		}
	}
	else { 
		$sentData=[
			"result" => false, 
			"message" => $sql
		];
		echo json_encode($sentData);
	}

	$sql = "SELECT medcert_id, status FROM med_cert WHERE student_id = '$studentID'";
	$result = $conn->query($sql);
	if ($result->num_rows >= 0) {
		while($row = $result->fetch_assoc()) { 
			$medcert[] = array(
				"medcert_id" => $row['medcert_id'],
				"status" => $row['status']
			);
		}
	}
	else { 
		$sentData=[
			"result" => false, 
			"message" => $sql
		];
		echo json_encode($sentData);
	}

	$sentData = [
		"result" => true,
		"appointment" => $appointment,
		"medcert" => $medcert
	];
	echo json_encode($sentData);
	
	
	$conn->close();
}
?>