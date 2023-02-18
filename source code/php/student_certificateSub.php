<?php

include ('connect.php');
 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$studentID = $conn->real_escape_string($_POST['studentID']);
  $filename = $_FILES['file']['name'];
  // $tmpname = $_FILES['file']['tmp_name'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);


  if (is_uploaded_file($_FILES['file']['tmp_name'])) {
    $allowed =  explode(',', 'gif,jpg,jpeg,jpe,png,x-icon,pdf');
    $filename = $_FILES['file']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (in_array($ext, $allowed)) {
      $tmp_name = $_FILES["file"]["tmp_name"];
      $filepath = "uploads/";
      // $newfilename = str_replace("/","",$date).'_'.$filename;

      move_uploaded_file($_FILES["file"]["tmp_name"], "../".$filepath.$filename);
    }
    else{
      echo json_encode(["result" => false, "message"=>'The filetype you are attempting to upload is not allowed']);
			return;
		}	
  }


	$sql = "INSERT INTO med_cert(status, filepath, student_id) VALUES ('sent', '$filename', '$studentID')";
	$result = $conn->query($sql);
  
  if($result === TRUE){
    echo json_encode(["result" => true, "message"=>'Medical certificate uploaded successfully, please wait patiently']);
  }
  else{
    $sentData=["result" => false, "value" => $sql];
		echo json_encode($sentData);
  }

	$conn->close();
}
?>