<?php
include_once('../controllers/dbcon.php');
session_start();
if (!isset($_SESSION['user'])){
    header('Location: ../index.php');
}
else if ($_SESSION['type']==='seller') {
    header('Location: ../sellerhome.php');
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
<link rel="stylesheet" href="../css/style.css">
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

<?php include 'adminheader.php' ;?>

<!-- top selling section -->
<section class="home-category">

   <h1 class="title">All Orders</h1>

   <div class="">

   <table>
         <tr>
            <th>Order</th>
            <th>Phone</th>
            <th>Adress</th>
            <th>Price</th>
            <th>Payment Type</th>
            <th>Status</th>
            <th>New Status</th>
            <th></th>
         </tr>
   <?php
            $userid = $_SESSION['userid'];


            $itemsql = "SELECT * FROM `orders`";
            
            $itemresult = $conn->query($itemsql);
            if ($itemresult->num_rows > 0) {
                while($row = $itemresult->fetch_assoc()) 
                {
                    echo '
                    <tr>
                        <td>'.$row['datetime'].'</td>
                        <td>'.$row['phone'].'</td>
                        <td>'.$row['address'].'</td>
                        <td>'.$row['ordersum'].'</td>
                        <td>'.$row['payment'].'</td>
                        <td>'.$row['status'].'</td>
                        <form action="../controllers/adminupdateorder.php" method="post" >
                           <td>
                              <select name="status" class="box">
                                 <option value="pending">Pending</option>
                                 <option value="Approved">Approved</option>
                                 <option value="Rejected">Rejected</option>
                              </select>
                           </td>
                           <td>  
                              <input type="hidden" name="orderid" value="'.$row['id'].'" class="btn">
                              <input type="hidden" name="ordervalue" value="'.$row['ordersum'].'" class="btn">
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

</div>
  
<script src="js/script.js"></script>
 
</body>
</html>