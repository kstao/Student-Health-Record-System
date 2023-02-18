<?php

include ('connect.php');
 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$studentID = $conn->real_escape_string($_POST['studentID']);
	$message = $conn->real_escape_string($_POST['message']);
	$date = $conn->real_escape_string($_POST['date']);

	$sql = "INSERT INTO appointment(message, date, status, student_id) VALUES ('$message', '$date', 'sent', '$studentID')";
	$result = $conn->query($sql);

  if($result === TRUE){
    $sentData=[	"result" 	=> true,
                "value" => "Appintment has been booked" ];
    echo json_encode($sentData);
  }
  else{
    $sentData=["result" => false];
		echo json_encode($sentData);
  }

	$conn->close();
}
?>