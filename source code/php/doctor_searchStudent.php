<?php

include ('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $studentID = $conn->real_escape_string($_POST['studentID']);

	$sql = "SELECT fullname, gender, age, email, contact, role_id FROM user WHERE user_id = '$studentID'";
	$result = $conn->query($sql);

	if ($result->num_rows == 1) {
		while($row = $result->fetch_assoc()) { 

      if($row['role_id'] == '2'){
        $sentData=[	"result" 	=> true,
              "fullname" 	=> $row['fullname'], 
              "gender" 		=> $row['gender'], 
              "age" 		  => $row['age'], 
              "email" 		=> $row['email'], 
              "contact"		=> $row['contact']];
        echo json_encode($sentData);
      }
      else{
        $sentData=[	"result" 	=> false,
              "value" 	=> 'Invalid Student'];
        echo json_encode($sentData);
      }
		}
	}
	else { 
		$sentData=["result" => false, "value" => 'Invalid Student'];
		echo json_encode($sentData);
	}

	$conn->close();
}
?>