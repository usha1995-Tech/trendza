<?php
include_once 'dbcon.php';


$name=$_POST["name"];
$email=$_POST["email"];
$number=$_POST["number"];
$message=$_POST["message"];



$sql = "INSERT INTO contact (`name`, `email`, `number`, `msg`) VALUES ('$name','$email','$number','$message')";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
	echo 'alert("Thank you. Message received");';
	echo 'window.location.href="../index.php";';
	echo '</script>';

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

