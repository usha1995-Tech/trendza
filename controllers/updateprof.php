<?php


session_start();

include_once 'dbcon.php';

$name = $_POST["name"];
$email = $_POST["email"];
$password = md5($_POST["password"]);

$userid = $_SESSION['userid'];


		$sqlupdate = "UPDATE users set  `name`='$name',`email`='$email',`password`= '$password' where id ='$userid'";
		
		if ($conn->query($sqlupdate) === TRUE){
			echo '<script language="javascript">';
			echo 'alert("Account Updated");';
			echo 'window.location.href="../updateprofile.php";';
			echo '</script>';
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		$conn->close();
		