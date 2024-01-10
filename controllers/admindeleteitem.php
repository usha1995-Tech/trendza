<?php
include_once 'dbcon.php';
session_start();


$itemid=$_GET["itemid"];


$sql = "UPDATE `items` SET `deleted`=1 where id='$itemid'";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
	echo 'window.location.href="../admin/items.php";';
	echo '</script>';

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

