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


        <div class="form-container">

            <form action="controllers/updateitems.php" method="post" enctype="multipart/form-data">
                <h3>Update <?php echo $_GET["name"]?></h3>
                <select name="catid" class="box">

                <?php

                $categorysql = "SELECT * from categories where deleted=0";
                $catogoryresult = $conn->query($categorysql);
                if ($catogoryresult->num_rows > 0) {
                    while($row = $catogoryresult->fetch_assoc()) 
                    {
                        echo '                        
                            <option value="'.$row["id"].'">'.$row["catname"].'</option>                        
                        ';
                    }
                } else {
                    echo "<font color='red'> Ooops ! No Records ! </font>";
                }
                $conn->close();

                ?>
                </select>
                <img width=150 src=<?php echo "uploads/".$_GET["img"]."" ?>  alt="">
                <input type="file" name="filename" placeholder="Select Image" required class="box">
                <input type="hidden" name="itemid"  value="<?php echo $_GET["itemid"]?>"  class="box">
                <input type="name" value="<?php echo $_GET["name"]?>" name="name" placeholder="Item Name" required class="box">
                <input type="price" value="<?php echo $_GET["price"]?>" name="price" placeholder="Item Price" required class="box">
                <textarea  class="box"  name="desc" id="desc" cols="30" rows="10"><?php echo $_GET["desc"]?></textarea>

                <input type="submit" name="submit" value="UPDATE" class="btn">
                
            </form>

        </div>



    </section>

    <script src="js/script.js"></script>

</body>

</html>