<?php include("../../../../path.php"); ?>
<?php include(ROOT_PATH."/app/database/controllers/topics.php");?>
<?php adminOnly();?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--font awesome-->
  <link href="../../../../assets/fontAwesome/css/all.css" rel="stylesheet"> <!--load all styles -->

  <!--Google fonts-->
  <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet">


  <!--custom styles-->
  <link rel="stylesheet" href="../../../../assets/css/style.css">

 <!--Admin styles-->
 <link rel="stylesheet" href="../../../../assets/css/admin.css">

  <title>Admin section-Edit Topic</title>
</head>
<body>
  <?php include(ROOT_PATH."/app/database/includes/adminHeader.php");?>

  <!--Admin page wrapper-->
  <div class="admin-wrapper">
   
  <?php include(ROOT_PATH."/app/database/includes/adminSidebar.php");?>

      <!--admin-content-->
      <div class="admin-content">
       <div class="button-group">
         <a href="create.php" class="btn btn-big">Add Topics</a>
         <a href="index.php" class="btn btn-big">Manage Topics</a>
       </div>

       <div class="content">
         <h2 class="page-title">Edit Topic</h2>
         <?php include (ROOT_PATH."/app/database/helpers/formerrors.php");?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        
        <input type="hidden" name="id" value="<?php echo $id;?>" >
          <div>
            <label>Name</label>
            <input type="text" name="name" value="<?php echo $name;?>" id="" class=text-input>
          </div>

        
          
            <div>
              <label >Description</label>
              <textarea type="text" name="description" id="body"<?php echo $description;?>></textarea> 
            </div>

        </div>
        <div>
          <button type="submit" name="updateTopic" class="btn btn-big">Update Topic</button>
        </div>
        </form>
       </div>
      </div>
      <!--//admin-content-->
  </div>
   <!--//admin swapper-->

   <!--JQuery-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   <!--Ck editor-->
   <script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script>

  
  <!--Custom Script-->
  <script src="../../../../assets/js/scripts.js"></script>
</body>
</html>