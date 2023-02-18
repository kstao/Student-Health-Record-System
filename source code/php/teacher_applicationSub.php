<?php

include ('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $teacher_id = $conn->real_escape_string($_POST['teacher_id']);
  $status = $conn->real_escape_string($_POST['status']);
  $medcert_id = $conn->real_escape_string($_POST['medcert_id']);


	$sql = "UPDATE med_cert SET status='$status', teacher_id= '$teacher_id' WHERE medcert_id = '$medcert_id'";

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