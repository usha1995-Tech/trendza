<header class="header">
<div class="header-1">
   <div class="flex">
   <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-google"></a>
         </div>
         <?php
            if (!isset($_SESSION['user'])) {
               ?>
               <p>  <a href="login.php">login</a> || <a href="register.php">register</a> </p>
               <?php
               
            }

         ?>
         
        
</div>
</div>

<div class="header-2">
    <div class="flex">
    <a href="index.php" class="logo">Trendzaa</a>
   
      <nav class="navbar">
         <a href="index.php">Home</a>
         <a href="about.php">About</a>
         <a href="shop.php">Shop</a>
         <a href="orders.php">Orders</a>
         <a href="contact.php">Contact</a>
      </nav>

      <?php
            if (isset($_SESSION['user'])) {
               ?>
      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <a href="search_page.php" class="fas fa-search"></a>
         <div id="user-btn" class="fas fa-user"></div>
         
         <a href="wishlist.php"><i class="fas fa-heart"></i></a>
         <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
      </div>
      <?php
               
            }

         ?>
      <?php
            if (isset($_SESSION['user'])) {
               ?>
              <div class="user-box">
         
                  <a href="updateprofile.php" class="option-btn">My profile</a>
                  <a href="logout.php" class="delete-btn">logout</a>  
               </div>
               <?php
               
            }

         ?>
        
      
    
    

</div>
      </div>
    </div>
</header>