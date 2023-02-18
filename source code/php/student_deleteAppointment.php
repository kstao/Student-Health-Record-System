<?php

include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $appointmentID = $conn->real_escape_string($_POST['appointmentID']);


	$sql = "DELETE FROM appointment WHERE appointment_id = '$appointmentID'";

	if ($conn->query($sql) === TRUE) {
    $sentData=[
      "result" => true,
      "message" => "Appointment has been deleted"
    ];
    echo json_encode($sentData);
  }
  else{
    $sentData=[
      "result" => false,
      "message" => $sql
    ];
    echo json_encode($sentData);
  }

	$conn->close();
}
?>