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
<div class="home-bg">



</div>
<!-- top selling section -->
<section class="home-category">

   <h1 class="title">Profile</h1>

   <center>

   <div class="form-container" style="min-height: unset;width: 40vw;">
      <?php
            $userid = $_SESSION['userid'];

            $itemsql = "SELECT * from users where id=$userid";
            $itemresult = $conn->query($itemsql);
            if ($itemresult->num_rows > 0) {
                while($row = $itemresult->fetch_assoc()) 
                {
                    ?>
                        <form action="controllers/updateprof.php" method="post">
                           <input type="text" name="name" placeholder="name" value="<?php echo $row['name']?>" required class="box">
                           <input type="email" name="email" placeholder="email"  value="<?php echo $row['email']?>" required class="box">
                           <input type="password"  id="password" name="password" pattern=".{8,}" title="Eight or more characters" placeholder="enter your password" required class="box">
                           <input type="password"  id="cpassword" name="cpassword" pattern=".{8,}" title="Eight or more characters" placeholder="confirm your password" required class="box">
                           <span class="" id='message'></span>
                           <div style="width:100%;"></div>
                           <input type="submit" name="submit" value="Update" class="btn">
                        </form>
                    <?php
                }
            } else {
                echo "<font color='red'> Ooops ! No Records ! </font>";
            }

      ?>

      

   </div>

</center>
    
</section>
   <?php
      include'footer.php';
   ?>

</div>

<script src="js/script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
    $('#password, #cpassword').on('keyup', function () {
    if ($('#password').val() == $('#cpassword').val()) {
        $('#message').html('').css('color', 'green');
    } else 
        $('#message').html('Not Matching').css('color', 'red');
    });

    $('form').on('submit',function(){
        if($(this).find('input[name="password"]').val() != $(this).find('input[name="cpassword"]').val()){
            // show error
            return false;
        }
    });
</script>
</body>
</html>