<?php include(ROOT_PATH.'/app/database/controllers/contact.php');?>

<!--footer-->
<div class="footer">
  <div class="footer-content">
    <div class="footer-section about">
    <h1 class="logo-text"><span class="white">EX</span>press</h1>
      <p>A site to Express</p>
      <div class="contact">
      <span class="socials"><i class="fas fa-phone"></i>&nbsp; 0773 919 095</span>
      <span><i class="fas fa-envelope"></i>&nbsp;expressonlineblog@gmail.com </span>
    </div>
     <div class="socials">
       <a href="#"class="facebook" ><i class="fab fa-facebook"></i></a>
       <a href="#"class="instagram"><i class="fab fa-instagram"></i></a>
       <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
       <a href="#" class="app"><i class="fab fa-whatsapp app"></i></a>
     </div>
    </div>


    <div class="footer-section  links">
      <h2 >Quick Links</h2>
      <br/>
      <ul>
        <li><a href="#">events</a></li>
        <li><a href="#">terms and conditions</a></li>
        <li><a href="#">motivation</a></li>
        <li><a href="#">WebTechs</a></li>
        <li><a href="#">Privacy Policy</a></li>
      </ul>
    </div>

    <div class="footer-section contact">
    <h2>Contact</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
      <input type="text" name="email" value="<?php echo $email;?>" placeholder="Enter your email" class="name">
      <textarea name="message" value="<?php echo $msg;?>" placeholder="Enter your Comment.." class="text" rows="6" ></textarea>
      <input type="submit" name="send" placeholder="Send" class="submit">
    </form>
    </div>
  </div>
  <div class="footer-bottom">
    &copy;EXpress.Com-2020 | Powered by WebTechs
  </div>
</div>
