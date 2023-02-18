<?php

include ('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$sql = "SELECT a.medcert_id, a.filepath, b.fullname, a.status FROM med_cert a
          LEFT JOIN user b
          ON a.student_id = b.user_id";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) { 
			$return_arr[] = array(
				"medcert_id" => $row['medcert_id'],
				"filepath" => $row['filepath'],
				"fullname" => $row['fullname'],
				"status" => $row['status']
			);
		}
		$sentData = [
			"result" => "true",
			"application" => $return_arr
		];
		echo json_encode($sentData);
	}
	else { 
		$sentData=[
			"result" => "false", 
			"message" => "Empty inbox..."
		];
		echo json_encode($sentData);
	}
	$conn->close();
}
?>