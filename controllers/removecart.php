<?php
include_once 'dbcon.php';
session_start();


$itemid=$_GET["itemid"];
$id=$_GET["id"];
$userid = $_SESSION['userid'];


$sql = "delete from cart where id='$id'";


if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
	// echo 'alert("Added to wishlis");';
	echo 'window.location.href="../cart.php?itemid='.$itemid.'";';
	echo '</script>';

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

