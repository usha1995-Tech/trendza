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
    <title>home page</title>

     <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

      <!-- custom css file link  -->
<link rel="stylesheet" href="css/style.css">
<!-- navbar one style -->

</head>
<body>

<?php include 'header.php' ;?>
<div class="home-bg">

   <section class="home">

      <div class="content">
         
         <h3>Trendza open for you all ! </h3>
         <p>Let's fassion talks ...</p>
         <a href="about.php" class="btn">about us</a>
      </div>

   </section>

</div>
<!-- top selling section -->
<section class="home-category">

   <h1 class="title">Top selling</h1>

   <div class="box-container">

   
   <?php


            $itemsql = "SELECT * from items ORDER BY id DESC LIMIT 8";
            $itemresult = $conn->query($itemsql);
            if ($itemresult->num_rows > 0) {
                while($row = $itemresult->fetch_assoc()) 
                {
                    echo '
                    <div class="box">
                        <img src="uploads/'.$row["image"].'" alt="">
                        <h3>LKR.'.$row["price"].' </h3>
                        <p>'.$row["name"].'</p>
                        <a href="shop.php" class="btn"">View</a>    
                    </div>                       
                                          
                    ';
                }
            } else {
                echo "<font color='red'> Ooops ! No Records ! </font>";
            }
            $conn->close();

            ?>
</div>
    
</section>
   <?php
      include'footer.php';
   ?>

</div>




   
<script src="js/script.js"></script>
 
</body>
</html>