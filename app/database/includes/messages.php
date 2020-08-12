<?php if(isset($_SESSION['message'])):?>
  
<div class="msg<?php echo $_SESSION['type'];?>"> 
<li> <?php echo $_SESSION['message'];?></li>
</div>

<?php unset($_SESSION['message']);
      unset($_SESSION['type']);

?>

<?php endif;?>