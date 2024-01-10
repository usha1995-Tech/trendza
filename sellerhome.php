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

</head>

<body>

    <?php include 'sellerheader.php'; ?>
 
    <!-- top selling section -->
    <section class="home-category">

        <h1 class="title">My Items</h1>

        <div class="box-container">
        <?php
            $userid = $_SESSION['userid'];


            $itemsql = "SELECT * from items where userid=$userid and deleted=0";
            $itemresult = $conn->query($itemsql);
            if ($itemresult->num_rows > 0) {
                while($row = $itemresult->fetch_assoc()) 
                {
                    echo '
                    <div class="box">
                        <img src="uploads/'.$row["image"].'" alt="">
                        <h3>LKR.'.$row["price"].' </h3>
                        <p>'.$row["name"].'</p>
                        <a href="sellerupdateitem.php?itemid='.$row["id"].'&price='.$row["price"].'&name='.$row["name"].'&desc='.$row["description"].'&img='.$row["image"].'" class="btn">Update</a>    
                        <a href="controllers/sellerdeleteitem.php?itemid='.$row["id"].'" class="btn delete-btn">Delete</a>    
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