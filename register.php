

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   <?php
   include 'header.php';
   ?>

   <!-- register form -->
<div class="form-container">

   <form action="controllers/register.php" method="post">
      <h3>register here</h3>
      <input type="text" name="name" placeholder="enter your name" required class="box">
      <input type="email" name="email" placeholder="enter your email" required class="box">
      <input type="password"  id="password" name="password" placeholder="enter your password" pattern=".{8,}" title="Eight or more characters" required class="box">
      <input type="password"  id="cpassword" name="cpassword" placeholder="confirm your password" pattern=".{8,}" title="Eight or more characters" required class="box">
      <select name="type" class="box">
         <option value="buyer">buyer</option>
         <option value="seller">seller</option>
      </select>
      <span class="" id='message'></span>
      <div style="width:100%;"></div>
      <input type="submit" name="submit" value="sign up" class="btn">
      <p>already have an account? <a href="login.php">login now</a></p>
   </form>

</div>
<?php
include'footer.php';
   ?>


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