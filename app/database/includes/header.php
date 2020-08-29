
<header>
  <div class="logo">
  <a href="<?php echo BASE_URL."/index.php"?>"> <h1 class="logo-text"><span class="white">EX</span><span class="blue">press</span></h1></a>
   
  </div>
  <i class="fa fa-bars menu-toggle"></i>
  <ul class="nav">
    <li><a href="<?php echo BASE_URL."/index.php"?>">Home</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">services</a></li>
   
     <?php if(isset($_SESSION['id'])):?>
           <li><a href="#"><i class="fa fa-user "></i><?php echo substr($_SESSION['username'],0,8)."...";?></a> 
         
           <?php if($_SESSION['admin']):?>
              <ul>
             <li><a href="<?php echo BASE_URL."/app/database/admin/dashboard.php"?>">DashBoard</a></li>
             <li><a href="<?php echo BASE_URL."/Logout.php"?>" class="">Logout</a></li>
             </ul>
           <?php else:?>
            <ul>
             <li><a href="<?php echo BASE_URL."/Logout.php"?>" class="logout">Logout</a></li>
             </ul>
             <?php endif;?>
            
          </li>
           <?php else:?>
            <div class="red">
            <li><a href="<?php echo BASE_URL."/register.php"?>">Sign Up</a></li>
            <li><a href="<?php echo BASE_URL."/login.php"?>">LogIn</a></li> 
           <?php endif;?>
           </div>
  </ul>
  </header>
