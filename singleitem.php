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
   <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
   font-size: 15pt;
  border: 1px solid #FF0099;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #006666;
}
</style>
</head>
<body>
   
<?php include 'header.php' ;?>
<?php

            $itemid = $_GET['itemid'];
            $itemsql = "SELECT * from items where id=$itemid";
            $itemresult = $conn->query($itemsql);
            if ($itemresult->num_rows > 0) {
                while($row = $itemresult->fetch_assoc()) 
                {
                    $singleitm = $row;
                }
            } else {
                echo "<font color='red'> Ooops ! No Records ! </font>";
            }

            ?>

<div class="main">
   
</div>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="uploads/<?php echo $singleitm['image'];?>" alt="">
      </div>

      <div class="content">
            <h1><?php echo $singleitm['name']; ?></h1>
            <h3>LKR. <?php echo $singleitm['price']; ?></h3>

            <p><?php echo $singleitm['description']; ?></p>
            <?php
            $userid = $_SESSION['userid'];
            

            $wishsql = "SELECT * from wishlist where itemid=$itemid and userid =$userid";
            
            $wishresult = $conn->query($wishsql);
            if ($wishresult->num_rows > 0) {
                
                    ?>
                    <a href="controllers/removewishlist.php?itemid=<?php echo $singleitm['id']; ?>"><i class="fas fa-heart" style="font-size:25pt;color:red;"></i></a>&nbsp&nbsp&nbsp
                        
                        <?php
                
            } else {
                ?>
            <a href="controllers/addwishlist.php?itemid=<?php echo $singleitm['id']; ?>"><i class="fas fa-heart" style="font-size:25pt;"></i></a>&nbsp&nbsp&nbsp
                
                <?php
            }
            

            ?>


<a href="controllers/addcart.php?itemid=<?php echo $singleitm['id']; ?>" class="btn">Add to Cart</a>


        <!-- <?php   
            

            $cartsql = "SELECT * from cart where (itemid=$itemid and userid =$userid) and orderid=0";
            
            $cartreult = $conn->query($cartsql);
            if ($cartreult->num_rows > 0) {
                while($cartrow = $cartreult->fetch_assoc()) {
                    ?>
                    <a href="controllers/removecart.php?itemid=<?php echo $singleitm['id']; ?>&id=<?php echo $cartrow['id']; ?>" class="btn">Remove from Cart</a>
                            
                            <?php
                }
             
            } else {
                ?>
                <a href="controllers/addcart.php?itemid=<?php echo $singleitm['id']; ?>" class="btn">Add to Cart</a>
                
                <?php
            }
            

            ?> -->
            
      </div>

   </div>

   

</section>

<section>
<table>
         
   <?php
            $userid = $_SESSION['userid'];


            $reviewsql = "SELECT * FROM `reviews` JOIN users on reviews.userid=users.id where itemid=$itemid";
            
            $reviewresult = $conn->query($reviewsql);
            if ($reviewresult->num_rows > 0) {
                while($reviewrow = $reviewresult->fetch_assoc()) 
                {
                    echo '
                    <tr>
                        <td>'.$reviewrow['name'].' said "'.$reviewrow['comment'].'" on '.$reviewrow['dtime'].'</td>
                        
                     </tr>                    
                                          
                    ';
                }
            } else {
                echo "<font color='red'> No Reviews Yet ! </font>";
            }
            $conn->close();

            ?>
      </table>
</section>






<?php
include'footer.php';
   ?>


<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>