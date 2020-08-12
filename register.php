
<?php
include("path.php")
?>
<?php include(ROOT_PATH."/app/database/controllers/users.php")?>
<?php //guestOnly();?>
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

  <title>register</title>
</head>
<body>

   <!--header-->
<?php include (ROOT_PATH."/app/database/includes/header.php");
?>
  

	<!--signing-->
	<section class="section_padding">
	<div class="container p-4 my-4 pt-3">
	    <div class="row">
		    <div class="col-sm-12">
          <h3>Create Your EX<span class="blue">press</span> Account</h3>
          <?php include (ROOT_PATH."/app/database/helpers/formerrors.php");?>
				  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
             
            
              
	                <div class="col-sm-6">
                       <div class="form-group">
                         <input class="form-control" name="username"  type="text"value="<?php echo $username;?>"onfocus="this.placeholder = ''"
				         onblur="this.placeholder = 'Enter your username'" placeholder = 'Enter your username'/>
                       </div>
                   </div>
		        
				    <div class="col-sm-6">
                       <div class="form-group">
                         <input class="form-control" name="email"  type="email"  value="<?php echo $email;?>" onfocus="this.placeholder = ''"onblur="this.placeholder = 'Enter email address'" placeholder = 'Enter email address'/>
                       </div>
                   </div>
		        <div class="col-sm-6">
                   <div class="form-group">
                  <input class="form-control" name=" password"  type="password" value="<?php echo $password;?>" onfocus="this.placeholder = ''"  onblur="this.placeholder = 'Create your password'" placeholder = 'Create your password'/>
                </div>
		 </div>	
		   <div class="col-sm-6">
                   <div class="form-group">
                  <input class="form-control" name=" Vpassword"  type="password"  value="<?php echo $Vpassword;?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Verify your password'" placeholder = 'Verify your password'/>
                </div>
		 </div>
			 <div class="col-sm-6">
         <div class="form-group">
         <input type="submit" class="btn_1" value="Sign_up" name="submit"></input>
         </div>
       </div>
       <br>
			  <div class="col-sm-6 ">
			   <!--base url--><p>Already Have an Account?</p>
    <button class="btn_1"><a href="<?php echo BASE_URL."/login.php"?>">Login</a></button>
			 </div>
		</div>
	</div>

	</section>

  </body>
</html>
