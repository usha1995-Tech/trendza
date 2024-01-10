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

<!-- top selling section -->
<section class="home-category">

   <h1 class="title"><?php echo $_GET['orderdate'];?></h1>

   <div class="box-container">

   
   <?php

            $orderid = $_GET['orderid'];
            $itemsql = "SELECT * from cart join items WHERE items.id=cart.itemid and cart.orderid=$orderid";
            $itemresult = $conn->query($itemsql);
            if ($itemresult->num_rows > 0) {
                while($row = $itemresult->fetch_assoc()) 
                {
                    echo '
                    <div class="box">
                        <img src="uploads/'.$row["image"].'" alt="">
                        <h3>'.$row["name"].' </h3>
                        <p>LKR.'.$row["price"].'</p>
                        <p>Item Status :'.$row["shipstatus"].'</p>';
                        if ($row["shipstatus"]==='Shipped') {
                            echo    '<a href="itemaddreview.php?itemid='.$row["itemid"].'&itemname='.$row["name"].'" class="btn"">Add Review</a>'; 
                        }
                        
                    echo    '<a href="singleitem.php?itemid='.$row["itemid"].'" class="btn"">View</a>    
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