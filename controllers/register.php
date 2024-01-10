<?php
include_once 'dbcon.php';


$name=$_POST["name"];
$email=$_POST["email"];
$type=$_POST["type"];
$pass=md5($_POST["password"]);


$sql = "INSERT INTO users (`name`, `email`, `password`, `type`) VALUES ('$name','$email','$pass','$type')";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
	echo 'alert("Account Created Please log in");';
	echo 'window.location.href="../login.php";';
	echo '</script>';

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

