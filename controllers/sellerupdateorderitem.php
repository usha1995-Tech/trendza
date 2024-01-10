<?php
include_once 'dbcon.php';
session_start();


$status=$_POST["status"];
$cartid=$_POST["cartid"];


$sql = "UPDATE `cart` SET `shipstatus`='$status' where id='$cartid'";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
	echo 'window.location.href="../sellerorders.php";';
	echo '</script>';

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

