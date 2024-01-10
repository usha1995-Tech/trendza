<?php
include_once 'dbcon.php';
session_start();


$itemid=$_GET["itemid"];
$userid = $_SESSION['userid'];


$sql = "INSERT INTO cart (`itemid`, `userid`) VALUES ('$itemid','$userid')";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
	// echo 'alert("Added to wishlis");';
	echo 'window.location.href="../singleitem.php?itemid='.$itemid.'";';
	echo '</script>';

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

