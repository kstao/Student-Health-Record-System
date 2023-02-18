<?php

include ('connect.php');
 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$username = $conn->real_escape_string($_POST['username']);
	$password = $conn->real_escape_string(md5($_POST['password']));

	$sql = "SELECT * FROM user WHERE username = '".$username. "' AND password = '".$password. "'";
	$result = $conn->query($sql);

	if ($result->num_rows == 1) {
		while($row = $result->fetch_assoc()) { 
			$sentData=[	"result" 	=> true,
						"username" 	=> $row['username'], 
						"id" 		=> $row['user_id'], 
						"fullname" 		=> $row['fullname'], 
						"role"		=> $row['role_id']];
			echo json_encode($sentData);
		}
	}
	else { 
		$sentData=["result" => false, "value" => $username];
		echo json_encode($sentData);
	}

	$conn->close();
}
?>