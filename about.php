
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
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php' ;?>

<div class="main">
   <h3>about us</h3>
   
</div>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/about.png" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>Trendzaa is a platform on which you can buy and sell almost clothing items and gift items! Use the location selector to find deals close to you or check out ads to have items delivered directly to you with 100% buyer protection</p>
         <p>We provide free shipping facilities to  all island wide orders.Trendzaa provide a platform to buy and sell <b>Women clothes,Men clothes,Kids clothes and Gift items.</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>








<?php
include'footer.php';
   ?>


<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>