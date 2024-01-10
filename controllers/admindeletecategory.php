<?php
include_once 'dbcon.php';
session_start();


$catid=$_GET["catid"];


$sql = "UPDATE `categories` SET `deleted`=1 where id='$catid'";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
	echo 'window.location.href="../admin/categories.php";';
	echo '</script>';

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

