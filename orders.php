<?php
include_once('controllers/dbcon.php');
session_start();
if (!isset($_SESSION['user'])){
    header('Location: login.php');
}
else if ($_SESSION['type']==='seller') {
    header('Location: sellerhome.php');
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

<?php include 'header.php' ;?>

<!-- top selling section -->
<section class="home-category">

   <h1 class="title">Orders</h1>

   <div class="">

      <table>
         <tr>
            <th>Order Date</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Payment</th>
            <th>Total</th>
            <th>Approval</th>
            <th></th>
         </tr>
   <?php
            $userid = $_SESSION['userid'];


            $itemsql = "SELECT * from orders where userid=$userid";
            
            $itemresult = $conn->query($itemsql);
            if ($itemresult->num_rows > 0) {
                while($row = $itemresult->fetch_assoc()) 
                {
                    echo '
                    <tr>
                        <td>'.$row['datetime'].'</td>
                        <td>'.$row['address'].'</td>
                        <td>'.$row['phone'].'</td>
                        <td>'.$row['payment'].'</td>
                        <td>'.$row['ordersum'].'</td>
                        <td>'.$row['status'].'</td>
                        <td>
                           <a href="singleorder.php?orderid='.$row["id"].'&orderdate='.$row["datetime"].'" class="btn"">View</a>    
                        </td>
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