<?php
include_once('controllers/dbcon.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php include 'header.php' ;?>


   <!-- register form -->
<div class="form-container">

   <form action="controllers/forgetpassword.php" method="post">
      <h3>Enter email</h3>

      <input type="email" name="email" placeholder="enter your email" required class="box">
     
      
      <input type="submit" name="submit" value="send" class="btn">
   </form>

</div>
<?php
include'footer.php';
   ?>


</body>
</html>