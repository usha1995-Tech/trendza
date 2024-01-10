<?php

include_once 'dbcon.php';
session_start();

		$fileName = $_FILES['filename']['name'];

		$target = "../uploads/";		
		$fileTarget = $target.$fileName;	
		$tempFileName = $_FILES["filename"]["tmp_name"];


		$catname = $_POST['catname'];	
		$filename = $_POST['filename'];	
		$slogan = $_POST['slogan'];	
		



		$result = move_uploaded_file($tempFileName,$fileTarget);
		/*
		*	If file was successfully uploaded in the destination folder
		*/
		if($result) { 

			// $query = "INSERT INTO filedetails(filepath,filename,description) VALUES ('$fileTarget','$fileName','$fileDescription')";
			$query = "INSERT INTO `categories`(`catname`, `slogan`, `image`) 
                                    VALUES ('$catname','$slogan','$fileTarget')";

			// $conn->query($query) or die("Error : ".mysqli_error($link));
            if ($conn->query($query) === TRUE) {
                echo '<script language="javascript">';
                echo 'alert("Success");';
                echo 'window.location.href="../admin/categories.php";';
                echo '</script>';
            
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }	
		}
		else {			
			echo "Sorry !!! There was an error in uploading your file";			
		}

		
?>