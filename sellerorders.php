<?php
include_once('controllers/dbcon.php');
session_start();
if (!isset($_SESSION['user'])){
    header('Location: index.php');
}
else if ($_SESSION['type']==='buyer') {
    header('Location: index.php');
 }
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
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
   font-size: 12pt;
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<?php include 'sellerheader.php' ;?>

<!-- top selling section -->
<section class="home-category">

   <h1 class="title">Orders</h1>

   <?php

      $userid = $_SESSION['userid'];
      $totalcart=0;

      $sumsql = "SELECT sum(items.price)*90/100 as totalearn FROM `cart` join items ON cart.itemid=items.id JOIN orders ON cart.orderid = orders.id WHERE  items.userid=$userid";
      $sumresult = $conn->query($sumsql);
      if ($sumresult->num_rows > 0) {
         while($srow = $sumresult->fetch_assoc()) 
         {   
            $totalcart=$srow['totalearn'];
            // echo $totalcart;
            echo '
            <a style="float:right;background-color:green;"  class="btn">Total Earnings: '.$totalcart.' LKR</a>

                                 
            ';
         }
      } else {
         echo "<font color='red'> Ooops ! No Records ! </font>";
      }

      ?>

   <div class="">

      <table>
         <tr>
            <th>Order</th>
            <th>Item Name</th>
            <th>Phone</th>
            <th>Adress</th>
            <th>Price</th>
            <th>Status</th>
            <th>New Status</th>
            <th></th>
         </tr>
   <?php
            $userid = $_SESSION['userid'];


            $itemsql = "SELECT cart.id, items.name,items.price,items.image,items.userid,cart.shipstatus,orders.datetime,orders.address,orders.phone FROM `cart` join items ON cart.itemid=items.id JOIN orders ON cart.orderid = orders.id WHERE items.userid=$userid";
            
            $itemresult = $conn->query($itemsql);
            if ($itemresult->num_rows > 0) {
                while($row = $itemresult->fetch_assoc()) 
                {
                    echo '
                    <tr>
                        <td>'.$row['datetime'].'</td>
                        <td>'.$row['name'].'</td>
                        <td>'.$row['phone'].'</td>
                        <td>'.$row['address'].'</td>
                        <td>'.$row['price'].'</td>
                        <td>'.$row['shipstatus'].'</td>
                        <form action="controllers/sellerupdateorderitem.php" method="post" >
                           <td>
                              <select name="status" class="box">
                                 <option value="Pending">Pending</option>
                                 <option value="Processing">Processing</option>
                                 <option value="Shipped">Shipped</option>
                              </select>
                           </td>
                           <td>  
                              <input type="hidden" name="cartid" value="'.$row['id'].'" class="btn">
                              <input type="submit" name="submit" value="Update" class="btn">
                           </td>
                        </form>
                     </tr>                    
                                          
                    ';
                }
            } else {
                echo "<font color='red'> Ooops ! No Records ! </font>";
            }
            $conn->close();

            ?>
      </table>

</div>
    
</section>








   <?php
include'footer.php';
   ?>

</div>




   
<script src="js/script.js"></script>
 
</body>
</html>