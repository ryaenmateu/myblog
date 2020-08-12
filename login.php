<?php
include("path.php")
?>
<?php include(ROOT_PATH."/app/database/controllers/users.php");?>
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

  <title>login</title>
</head>
<body>
 <!--header-->
 <?php include (ROOT_PATH."/app/database/includes/header.php");?>
 
<!---- student_login_part---> 

<section class="section_padding">
      <div class="container  p-3 my-3" >
       <div class="row">
        <div class="col-sm-12">
       <h4>Sign-in</h4>
       <?php include (ROOT_PATH."/app/database/helpers/formerrors.php");?>
     <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
	      <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="username" id="username"  value="<?php echo $username;?>" type="username" onfocus="this.placeholder = ''"
				  onblur="this.placeholder = 'Enter username'" placeholder = 'Enter username'>
                </div>
           </div>
		 <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="password" value="<?php echo $password;?>"id="password" type="password" onfocus="this.placeholder = ''" 
				  onblur="this.placeholder = 'Enter your password'" placeholder = 'Enter your password'>
                </div>
		 </div>	
		      <div class="col-sm-6">
				  <div class="form-group form-check">
			  <input type="checkbox" checked name="remember" class="form-check-input">Always remember me</input>
			  </div>
        </div>

			  <div class="col-sm-6">
			  <input type="submit"  name="login" class="btn_1" value="log-in"></input>
       </div>  
       <div class="col-sm-6">
         <p><a href="passwordRecovery.php">Forgot Password?</a></p>
         </div>
   <div class="col-sm-6 ">
			 <!--base url-->OR
        <button class="btn_1"><a href="<?php echo BASE_URL."/register.php"?>">Create your account</a></button>
  	</div>
  </div>
			 
            
     </form>

     </body>
</html>
