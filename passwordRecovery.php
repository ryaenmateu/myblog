<?php
include("path.php")
?>
<?php include(ROOT_PATH."/app/database/controllers/users.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <!--Google fonts-->
   <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora?family=Roboto:ital,wght@1,100&display=swap" rel="stylesheet">
 
 <!--Google fonts-->
 <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet">

<!--custom styles-->
<link rel="stylesheet" href="assets/css/style.css">

  <title>Recover Pass...</title>
</head>
<body>
 <!--header-->
 <?php include (ROOT_PATH."/app/database/includes/header.php");?>
 <?php include (ROOT_PATH."/app/database/helpers/formerrors.php");?>
  
<!---- Pass revovery---> 
<section class="section_padding ">
      <div class="container  p-3 my-3" >
       <div class="row">
        <div class="col-sm-12">
         <div class="recover-info">
        <h4 class="red">Quick Steps to recover your password.</h4>
        <h1 class="red">1</h1>
          <p>Enter your email details you used to sign-up when first created your account.</p>
          <h2 class="red">2</h2>
          <p>Go to your email account and configure the settings we have sent you to reset your password.</p>
          <h3 class="red">3</h3>
          <p>Login with the new reserted password.</p>
          </div>
		   <h5>Enter Your Email</h5>
     <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
	      <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="email" id="email"  value="<?php echo $email;?>" type="email" onfocus="this.placeholder = ''"
				  onblur="this.placeholder = 'Enter Email'" placeholder = 'Enter Email'>
                </div>
           </div>

			  </div>
			  </div>
			  <div class="col-sm-6">
			  <button type="submit"  name="recover" class="btn_1" value="send">send</button>
			 </div>
			
			 
         </div>
			 
            
     </form>

     </body>
</html>
