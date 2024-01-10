<?php
include_once 'dbcon.php';
session_start();
date_default_timezone_set('Asia/Colombo');


$itemid=$_POST["itemid"];
$userid = $_SESSION['userid'];
$desc = $_POST['desc'];
$revtime = date("Y-m-d H:i:s");


$sql = "INSERT INTO reviews (`itemid`, `userid`, `comment` , `dtime`) VALUES ('$itemid','$userid'  ,'$desc' ,'$revtime')";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
	// echo 'alert("Added to wishlis");';
	echo 'window.location.href="../orders.php?itemid='.$itemid.'";';
	echo '</script>';

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

