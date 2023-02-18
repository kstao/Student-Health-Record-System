<?php

include ('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $studentID = $conn->real_escape_string($_POST['studentID']);
  $doctorID = $conn->real_escape_string($_POST['doctorID']);
  $date = $conn->real_escape_string($_POST['date']);
  $illness = $conn->real_escape_string($_POST['illness']);
  $treatment = $conn->real_escape_string($_POST['treatment']);
  $tempereature = $conn->real_escape_string($_POST['tempereature']);
  $bloodPressure = $conn->real_escape_string($_POST['bloodPressure']);
  $height = $conn->real_escape_string($_POST['height']);
  $weight = $conn->real_escape_string($_POST['weight']);
  $comment = $conn->real_escape_string($_POST['comment']);

	$sql = "INSERT INTO record(date, illness, treatment, temperature, bloodpressure, height, weight, comment, student_id, doctor_id) VALUES('$date', '$illness', '$treatment', '$tempereature', '$bloodPressure', '$height', '$weight', '$comment', '$studentID', '$doctorID')";
  $result = $conn->query($sql);
  
  if($result === TRUE){
    echo json_encode(["result" => true, "message"=>'Record insert successfully']);
  }
  else{
    $sentData=["result" => false, "value" => $sql];
		echo json_encode($sentData);
  }

	$conn->close();
}
?>