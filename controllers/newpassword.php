<?php


session_start();

include_once 'dbcon.php';

$email = $_POST["email"];
$code = $_POST["code"];
$password = md5($_POST["npassword"]);



$sql = "SELECT * FROM passwordreset where email='" . $email . "' && code='" . $code . "'";
$result = $conn->query($sql);
// echo $result;

if ($result->num_rows > 0) {
	// output data of each row
	
	while ($row = $result->fetch_assoc()) {
		

		$sqlupdate = "UPDATE users set `password` = '$password' where email ='$email'";
		
		if ($conn->query($sqlupdate) === TRUE){
			echo '<script language="javascript">';
			echo 'alert("Password Changed. Please log in");';
			echo 'window.location.href="../login.php";';
			echo '</script>';
		}
		
	}
} else {
	echo '<script language="javascript">';
	echo 'alert("No Match Found");';
	echo 'window.location.href="../newpassword.php?email='.$email.'";';
	echo '</script>';
}
$conn->close();
