<?php

include ('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $id = $conn->real_escape_string($_POST['studentID']);

	$sql = "SELECT b.fullname, a.* FROM user b
					LEFT JOIN med_cert a
          ON a.student_id = b.user_id
          WHERE user_id = '$id'";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) { 
			$return_arr[] = array(
				"medcert_id" => $row['medcert_id'],
				"filepath" => $row['filepath'],
				"fullname" => $row['fullname'],
				"status" => $row['status'],
				"start_date" => $row['start_date'],
				"duration" => $row['duration'],

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