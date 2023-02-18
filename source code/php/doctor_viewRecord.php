<?php

include ('connect.php');
 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    // $id = $conn->real_escape_string($_POST['id']);

	$sql = "SELECT a.*, b.fullname FROM record a
          LEFT JOIN user b
          ON a.student_id = b.user_id
          ORDER BY date DESC;";
  $result = $conn->query($sql);
  $return_arr = array();

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$record_id = $row['record_id'];
			$date = $row['date'];
			$illness = $row['illness'];
			$treatment = $row['treatment'];
			$temperature = $row['temperature'];
			$bloodpressure = $row['bloodpressure'];
			$height = $row['height'];
			$weight = $row['weight'];
			$comment = $row['comment'];
			$fullname = $row['fullname'];
			$student_id = $row['student_id'];

			$return_arr[] = array(
				"record_id" => $record_id,
				"date" => $date,
				"illness" => $illness,
				"treatment" => $treatment,
				"temperature" => $temperature,
				"bloodpressure" => $bloodpressure,
				"height" => $height,
				"weight" => $weight,
				"comment" => $comment,
				"fullname" => $fullname,
				"student_id" => $student_id
			);
		}
		$sentData=["result" => true, "record" => $return_arr];
		echo json_encode($sentData);
	}
	else { 
		$sentData=["result" => false, "value" => "Error"];
		echo json_encode($sentData);
	}

	$conn->close();
}
?>