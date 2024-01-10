<?php


session_start();
unset($_SESSION["user"]);
unset($_SESSION["type"]);
unset($_SESSION["userid"]);

include_once 'dbcon.php';

$email = $_POST["email"];
$password = md5($_POST["password"]);



$sql = "SELECT * FROM users where email='" . $email . "' && password='" . $password . "'";
$result = $conn->query($sql);
// echo $result;

if ($result->num_rows > 0) {
	// output data of each row
	while ($row = $result->fetch_assoc()) {
		$_SESSION['user'] = $row['name'];
		$_SESSION['userid'] = $row['id'];
		$_SESSION['type'] = $row['type'];

		$type = $row['type'];

		$active = $row['active'];
		if ($row['active']==='1') {
			if($type==='admin'){
				header("Location: http://localhost/trendza/admin/", true, 301);
			}
			
			if($type==='seller'){
				header("Location: http://localhost/trendza/sellerhome.php", true, 301);		
				}
			
			if($type==='buyer'){
				header("Location: http://localhost/trendza/", true, 301);
			}	
		}else {
			echo '<script language="javascript">';
			echo 'alert("Your account suspened");';
			echo 'window.location.href="../login.php";';
			echo '</script>';
		}
	
	}
} else {
	echo '<script language="javascript">';
	echo 'alert("Username Or Password not valid");';
	echo 'window.location.href="../login.php";';
	echo '</script>';
}
$conn->close();
