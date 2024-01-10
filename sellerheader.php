

<header class="header">
<div class="header-2">
    <div class="flex">
    <a href="sellerhome.php" class="logo">Trendza</a>
   
      <nav class="navbar">
         <a href="sellerhome.php">My Items</a>
         <a href="sellernewitem.php">New Item</a>
         <a href="sellerorders.php">Orders</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>

      </div>

      <?php
            if (isset($_SESSION['user'])) {
               ?>
              <div class="user-box">
         
                  <a href="sellerprofile.php" class="option-btn">My profile</a>
                  <a href="logout.php" class="delete-btn">logout</a>  
               </div>
               <?php
               
            }

         ?>
    
    

</div>
      </div>
    </div>
</header>