<?php
// Opens a connection to a MySQL server.
$servername="localhost";
$username="root";
$password="";
$dbname="trendzadb";

$conn= new mysqli($servername,$username,$password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected successfully";