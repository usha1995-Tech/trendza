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

    <a style="float:right;" id="myBtn" class="btn">New Category</a>

   <h1 class="title">Categories</h1>

   <div class="">

   <table>
         <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Slogan</th>
            <th></th>
         </tr>
   <?php
            $userid = $_SESSION['userid'];


            $itemsql = "SELECT * FROM `categories` where deleted=0";
            
            $itemresult = $conn->query($itemsql);
            if ($itemresult->num_rows > 0) {
                while($row = $itemresult->fetch_assoc()) 
                {
                    echo '
                    <tr>
                        <td>'.$row['catname'].'</td>
                        <td><img width=120 src="'.$row['image'].'"></td>
                        <td>'.$row['slogan'].'</td>
                        <td>
                           <a href="../controllers/admindeletecategory.php?catid='.$row['id'].'" class="btn">Delete</a>
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
<!-- The Modal -->
<center>
<div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
    <span class="close">&times;</span>
    
    <div class="form-container"  style="min-height: unset">

<form action="../controllers/newcategory.php"  method="post" enctype="multipart/form-data">
    <h3>New Category</h3>
    <input type="text" name="catname" placeholder="Category Name" required class="box">
    <input type="file" name="filename"  placeholder="Select Image" required class="box">
   
    <input type="text" name="slogan" placeholder="Slogan" required class="box">

    <input type="submit" name="submit" value="Add Category" class="btn">
</form>

</div>
</div>

</div>
</center>

</div>
  
<script src="js/script.js"></script>
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