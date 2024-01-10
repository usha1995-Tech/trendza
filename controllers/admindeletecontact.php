<?php
include_once 'dbcon.php';
session_start();


$id=$_GET["id"];


$sql = "DELETE FROM `contact` where id='$id'";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
	echo 'window.location.href="../admin/contactus.php";';
	echo '</script>';

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

