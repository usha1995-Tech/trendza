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
<style>
body {
  font-family: Arial;
}

* {
  box-sizing: border-box;
}

form.searchform input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.searchform button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.searchform button:hover {
  background: #0b7dda;
}

form.searchform::after {
  content: "";
  clear: both;
  display: table;
}
</style>
</head>
<body>

<?php include 'header.php' ;?>

<!-- top selling section -->
<section class="home-category">

   <h1 class="title">Search</h1>
   <br>

   <form class="searchform" action="search_page.php" method="get">
        <input type="text" placeholder="Search.." name="searchtext">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>
   <div class="box-container">   
   <?php

        if (isset($_GET['searchtext'])) {
            $s = $_GET['searchtext'];
            $itemsql = "SELECT * from items where name like '%$s%' and deleted=0";
            $itemresult = $conn->query($itemsql);
            if ($itemresult->num_rows > 0) {
                while($row = $itemresult->fetch_assoc()) 
                {
                    echo '
                    <div class="box">
                        <img src="uploads/'.$row["image"].'" alt="">
                        <h3>'.$row["name"].' </h3>
                        <p>LKR.'.$row["price"].'</p>
                        <a href="singleitem.php?itemid='.$row["id"].'" class="btn"">View</a>    
                    </div>                       
                                          
                    ';
                }
            } else {
                echo "<font color='red'> no items found ! </font>";
            }
            $conn->close();
        }

        
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