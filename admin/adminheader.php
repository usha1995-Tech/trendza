

<header class="header">
<div class="header-2">
    <div class="flex">
    <a href="index.php" class="logo">Trendza</a>
   
      <nav class="navbar">
         <a href="index.php">All Orders</a>
         <a href="categories.php">Categories</a>
         <a href="items.php">Items</a>
         <a href="users.php">Users</a>
         <a href="contactus.php">Contact Requests</a>
         <a href="earnings.php">Earnings</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <a href="../logout.php">
         <div id="user-btn" class="fas fa-sign-out" style="color: white;"></div>
         </a>

      </div>

      <?php
            if (isset($_SESSION['user'])) {
               ?>
              <div class="user-box">
         
                  <a href="user_profile.php" class="option-btn">My profile</a>
                  <a href="logout.php" class="delete-btn">logout</a>  
               </div>
               <?php
               
            }

         ?>
    
    

</div>
      </div>
    </div>
</header>