<?php
include_once 'dbcon.php';
session_start();


$userid=$_GET["userid"];
$val=$_GET["val"];


$sql = "UPDATE `users` SET `active`=$val where id='$userid'";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
	echo 'window.location.href="../admin/users.php";';
	echo '</script>';

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

