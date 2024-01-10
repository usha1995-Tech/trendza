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
   <title>shop page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="home-category">

   <h1 class="title">shop by category</h1>
   <div class="box-container">

   <?php


            $itemsql = "SELECT * from categories where deleted=0";
            $itemresult = $conn->query($itemsql);
            if ($itemresult->num_rows > 0) {
                while($row = $itemresult->fetch_assoc()) 
                {
                    echo '
                    <div class="box">
                        <img src="uploads/'.$row["image"].'" alt="">
                        <h3>'.$row["catname"].'</h3>
                        <p>'.$row["slogan"].'</p>
                        <a href="categoryitems.php?catid='.$row["id"].'&catname='.$row["catname"].'" class="btn"">View</a>    

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







<script src="js/script.js"></script>

</body>
</html>