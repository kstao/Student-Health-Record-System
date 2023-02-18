<?php

include ('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $status = $conn->real_escape_string($_POST['status']);
  $appointment_id = $conn->real_escape_string($_POST['appointment_id']);
  $doctor = $conn->real_escape_string($_POST['doctor']);


	$sql = "UPDATE appointment SET status='$status', doctor_id='$doctor' WHERE appointment_id= '$appointment_id'";

	// $result = $conn->query($sql);

	if (mysqli_query($conn, $sql)) {
    $sentData=[
      "result" => true,
      "message" => "Application updated"
    ];
    echo json_encode($sentData);
  }

	$conn->close();
}
?>