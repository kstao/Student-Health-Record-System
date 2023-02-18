<?php

include ('connect.php');
 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$fullName = $conn->real_escape_string($_POST['fullName']);
	$username = $conn->real_escape_string($_POST['username']);
	$age = $conn->real_escape_string($_POST['age']);
	$gender = $conn->real_escape_string($_POST['gender']);
	$role = $conn->real_escape_string($_POST['role']);
	$phone = $conn->real_escape_string($_POST['phone']);
	$email = $conn->real_escape_string($_POST['email']);
	$password = $conn->real_escape_string(md5($_POST['password']));
	$confirmPassword = $conn->real_escape_string(md5($_POST['confirmPassword']));

  $sql = "SELECT username FROM user WHERE username = '$username'";
  $result = $conn->query($sql);
  if ($result->num_rows == 0) {
    if($password == $confirmPassword){
      $sql = "INSERT INTO user(fullname, username, password, role_id, gender, age, email, contact) 
              VALUES('$fullName', '$username', '$password', '$role', '$gender', '$age', '$email', '$phone')";
      $result = $conn->query($sql);
      
      if($result === TRUE){
        echo json_encode(["result" => true, "value"=>'Register successfully']);
      }
      else{
        $sentData=["result" => false, "value" => $sql];
        echo json_encode($sentData);
      }
    }
    else{
      $sentData=["result" => false, "value" => "Please insert same password"];
      echo json_encode($sentData);
    }
  }
  else{
    $sentData=["result" => false, "value" => "Username found, please choose other username"];
    echo json_encode($sentData);
  }
	

	$conn->close();
}
?>