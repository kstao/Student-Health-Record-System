<?php

include ('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $doctor_id = $conn->real_escape_string($_POST['doctor_id']);
  $student_id = $conn->real_escape_string($_POST['student_id']);
  $date = $conn->real_escape_string($_POST['date']);
  $duration = $conn->real_escape_string($_POST['duration']);

	$sql = "INSERT INTO med_cert(status, student_id, doctor_id, start_date, duration) VALUES('approve', '$student_id', '$doctor_id', '$date', '$duration')";
  $result = $conn->query($sql);
  
  if($result === TRUE){
    echo json_encode(["result" => true, "message"=>'Medical certificate has been issued successfully']);
  }
  else{
    $sentData=["result" => false, "value" => $sql];
		echo json_encode($sentData);
  }

	$conn->close();
}
?>