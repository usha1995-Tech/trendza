<?php
include_once('controllers/dbcon.php');
session_start();
if (!isset($_SESSION['user'])){
    header('Location: index.php');
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

</head>
<body>

<?php include 'header.php' ;?>

<!-- top selling section -->
<section class="home-category">
    <div>
        <a style="float:right;" id="myBtn" class="btn">Place Order</a>
        
   
            <?php

                    $userid = $_SESSION['userid'];
                    $totalcart=0;

                    $sumsql = "SELECT sum(price) as price FROM `cart` join items where cart.itemid=items.id and cart.userid=$userid and cart.orderid=0";
                    $sumresult = $conn->query($sumsql);
                    if ($sumresult->num_rows > 0) {
                        while($srow = $sumresult->fetch_assoc()) 
                        {   
                            $totalcart=$srow['price'];
                            echo '
                            <a style="float:right;background-color:green;"  class="btn">Total : '.$srow['price'].' LKR</a>
                    
                                                
                            ';
                        }
                    } else {
                        echo "<font color='red'> Ooops ! No Records ! </font>";
                    }

                    ?>


        <h1 class="title">Cart </h1>

    </div>

   <div class="box-container">

   
   <?php



            $itemsql = "SELECT *,cart.id as cartid,items.id as itmid FROM `cart` join items where cart.itemid=items.id and cart.userid=$userid  and cart.orderid=0";
            $itemresult = $conn->query($itemsql);
            if ($itemresult->num_rows > 0) {
                while($row = $itemresult->fetch_assoc()) 
                {
                    echo '
                    <div class="box">
                        <img src="uploads/'.$row["image"].'" alt="">
                        <h3>'.$row["name"].' </h3>
                        <p>LKR.'.$row["price"].'</p>
                        <a href="singleitem.php?itemid='.$row["itmid"].'" class="btn"">View</a> 
                        <a href="controllers/removecart.php?itemid='.$row["itmid"].'&id='.$row["cartid"].'" class="">&nbsp;&nbsp;&nbsp;<i class="fa fa-trash" style="font-size:20pt;color:red;" aria-hidden="true"></i></a>

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


<!-- The Modal -->
<center>
<div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
    <span class="close">&times;</span>
    
    <div class="form-container"  style="min-height: unset">

<form action="controllers/placeorder.php" method="post">
    <h3>Place order</h3>
    <input type="text" name="address" placeholder="enter your address" required class="box">
    <input type="text" name="phone" placeholder="enter your phone" required class="box">
    <select name="payment" class="box">
        <option value="Visa Card">Visa Card</option>
        <option value="Master Card">Master Card</option>
        <option value="American Express">American Express</option>
    </select>
    <input type="text" name="card" placeholder="enter your card no" required class="box">
    <input type="text" name="expiry" placeholder="enter your card expiry" required class="box">

    <input type="hidden" name="total" value="<?php echo $totalcart; ?>" class="btn">
    <input type="submit" name="submit" value="Order" class="btn">
</form>

</div>
</div>

</div>
</center>



</div>




   
<script src="js/script.js"></script>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
 
</body>
</html>