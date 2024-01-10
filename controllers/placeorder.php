<?php
include_once 'dbcon.php';
session_start();
date_default_timezone_set('Asia/Colombo');

$userid = $_SESSION['userid'];
$datetime = date("l jS \of F Y h:i:s A");
$address=$_POST["address"];
$phone=$_POST["phone"];
$payment=$_POST["payment"];
$total=$_POST["total"];
$card=$_POST["card"];
$expiry=$_POST["expiry"];




$sql = "INSERT INTO orders (`userid`, `datetime`, `address`, `phone`,`payment`, `ordersum`, `card`, `cardexp`) VALUES ('$userid','$datetime','$address','$phone','$payment','$total','$card','$cardexp')";

if ($conn->query($sql) === TRUE) {
	$getlatestquery =  "SELECT MAX(id) as maxcol FROM orders";

	$result = $conn->query($getlatestquery);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$orderidlatest = $row['maxcol'];
			$updatecart = "UPDATE `cart` SET orderid=$orderidlatest where userid='$userid' and orderid=0";
			if ($conn->query($updatecart) === TRUE) {
				echo '<script language="javascript">';
				echo 'alert("Order Placed");';
				echo 'window.location.href="../cart.php";';
				echo '</script>';
			}  
		}
	}

	  

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

