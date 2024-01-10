<?php

include_once 'dbcon.php';
session_start();

	$fileName = $_FILES['filename']['name'];

		$target = "../uploads/";		
		$fileTarget = $target.$fileName;	
		$tempFileName = $_FILES["filename"]["tmp_name"];


		$name = $_POST['name'];	
		$price = $_POST['price'];	
		$desc = $_POST['desc'];	
		$catid=$_POST["catid"];


		$itemid=$_POST["itemid"];
		

        $userid = $_SESSION['userid'];


		$result = move_uploaded_file($tempFileName,$fileTarget);
		/*
		*	If file was successfully uploaded in the destination folder
		*/
		if($result) { 

			// $query = "INSERT INTO filedetails(filepath,filename,description) VALUES ('$fileTarget','$fileName','$fileDescription')";
			$query = "UPDATE `items` SET `name`='$name', `price`='$price', `image`='$fileTarget', `catid`='$catid', `description`='$desc'
                                    WHERE id=$itemid";

			// $conn->query($query) or die("Error : ".mysqli_error($link));
            if ($conn->query($query) === TRUE) {
                echo '<script language="javascript">';
                echo 'alert("Updated");';
                echo 'window.location.href="../sellerhome.php";';
                echo '</script>';
            
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }	
		}
		else {			
			echo "Sorry !!! There was an error in uploading your file";			
		}

		
?>