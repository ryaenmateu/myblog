<?php include("../../../../path.php"); ?>
<?php include(ROOT_PATH."/app/database/controllers/users.php")?>
<?php adminOnly();?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="../../../../assets/css/bootstrap.min.css">
 <!--font awesome-->
 <link href="../../../../assets/fontAwesome/css/all.css" rel="stylesheet"> <!--load all styles -->
  <!--Google fonts-->
  <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet">


  <!--custom styles-->
  <link rel="stylesheet" href="../../../../assets/css/style.css">

 <!--Admin styles-->
 <link rel="stylesheet" href="../../../../assets/css/admin.css">

  <title>Admin section-Add User</title>
</head>
<body>
  <?php include(ROOT_PATH."/app/database/includes/adminHeader.php");?>

  <!--Admin page wrapper-->
  <div class="admin-wrapper">
   
  <?php include(ROOT_PATH."/app/database/includes/adminSidebar.php");?>

      <!--admin-content-->
      <div class="admin-content">
       <div class="button-group">
         <a href="create.php" class="btn btn-big">Add User</a>
         <a href="index.php" class="btn btn-big">Manage User</a>
       </div>

       <div class="content">
        
         <section class="section-padding">
	<div class="container p-4 my-4 pt-3">
	    <div class="row">
		    <div class="col-sm-12">
        <h2 class="page-title">Add User</h2>
				  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
          <?php include(ROOT_PATH."/app/database/helpers/formerrors.php")?>
	                <div class="col-sm-6">
                       <div class="form-group">
                         <input class="form-control" name="username" value="<?php echo $username;?>" type="text"onfocus="this.placeholder = ''"
				         onblur="this.placeholder = 'Enter your username'" placeholder = 'Enter your username'/>
                       </div>
                   </div>
		        
				    <div class="col-sm-6">
                       <div class="form-group">
                         <input class="form-control" name="email"  value="<?php echo $email;?>"   type="email" onfocus="this.placeholder = ''"onblur="this.placeholder = 'Enter email address'" placeholder = 'Enter email address'/>
                       </div>
                   </div>
		        <div class="col-sm-6">
                   <div class="form-group">
                  <input class="form-control" name=" password"  value="<?php echo $password;?>"  type="password"onfocus="this.placeholder = ''"  onblur="this.placeholder = 'Create your password'" placeholder = 'Create your password'/>
                </div>
		 </div>	
		   <div class="col-sm-6">
                   <div class="form-group">
                  <input class="form-control" name=" Vpassword"  value="<?php echo $Vpassword;?>"   type="password"onfocus="this.placeholder = ''" onblur="this.placeholder = 'Verify your password'" placeholder = 'Verify your password'/>
                </div>
               
                <div class="col-sm-6">
                <?php if(isset($admin) && $admin==1): ?>
                <label>Admin
                   <div class="form-group">
                   <input class="form-control" name="admin" checked type="checkbox" />
                   </label>
                <?php else:?>
                  <label>Admin
                   <div class="form-group">
                   <input class="form-control" name="admin"  type="checkbox" />
                   </label>
                <?php endif;?>
                </div>
            </div>    
		 </div>
			 <div class="col-sm-6">
			   <input type="submit" class="btn_1" value="add User" name="create-admin"></input>
			 </div>
		</div>
	</div>

	</section>

        </form>
       </div>
      </div>
      <!--//admin-content-->
  </div>
   <!--//admin swapper-->

   <!--JQuery-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   <!--Ck editor-->
   <script src="https://cdn.ckeditor.com/ckeditor5/21.0.0/classic/ckeditor.js"></script>

  
  <!--Custom Script-->
  <script src="../../../../assets/js/scripts.js"></script>
</body>
</html>