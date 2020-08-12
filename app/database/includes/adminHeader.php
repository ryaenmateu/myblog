<header>
  <div class="logo">
 <a href="<?php echo BASE_URL."/index.php";?>">
    <h1 class="logo-text"><span class="white">EX</span>press</h1>
    </a>
  </div>
  <i class="fa fa-bars menu-toggle"></i>
  <ul class="nav">
    <?php if(isset($_SESSION['id'])):?>
      <li><a href=""><i class="fa fa-user"></i><?php echo $_SESSION['username'];?></a>
      <ul>
        <li><a href="<?php echo BASE_URL."/Logout.php"?>" class="Logout">Logout</a></li>
      </ul>
      </li>
<?php endif;?>
  </ul>
  </header>
