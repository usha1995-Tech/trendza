<?php
include_once('controllers/dbcon.php');
session_start();
if (!isset($_SESSION['user'])){
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

            <form action="controllers/addreview.php" method="post" enctype="multipart/form-data">
                <h3>Add Review</h3>
                <h4><?php echo $_GET['itemname'];?></h4>
                <input type="hidden" name="itemid" value="<?php echo $_GET['itemid']; ?>" class="btn">
                
                
                <textarea  class="box" name="desc" id="desc" cols="30" rows="10"></textarea>

                <input type="submit" name="submit" value="Add Review" class="btn">
                
            </form>

        </div>



    </section>

    <script src="js/script.js"></script>

</body>

</html>