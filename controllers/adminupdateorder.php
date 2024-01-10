<?php
include_once 'dbcon.php';
session_start();


$status=$_POST["status"];
$orderid=$_POST["orderid"];
$ordervalue=$_POST["ordervalue"];

if ($status==='Approved') {
    $floated = floatval($ordervalue);

    $commission = $floated/100*10;
    $forseller = $floated-$commission;

    $sqlcommission = "insert into `earnings`(`orderid`, `ordervalue`, `commission`, `sellervalue`) VALUES ('$orderid','$ordervalue','$commission','$forseller')";
    $conn->query($sqlcommission);
}else{
    $deletesql = "DELETE FROM `earnings` WHERE orderid='$orderid'";
    $conn->query($deletesql);
}



$sql = "UPDATE `orders` SET `status`='$status' where id='$orderid'";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
	echo 'window.location.href="../admin/";';
	echo '</script>';

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

