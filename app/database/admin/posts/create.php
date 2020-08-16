<?php include("../../../../path.php"); ?>
<?php include(ROOT_PATH."/app/database/controllers/posts.php");
adminOnly();?>


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

  <title>Admin section-Add Posts</title>
</head>
<body>
  <?php include(ROOT_PATH."/app/database/includes/adminHeader.php");?>

  <!--Admin page wrapper-->
  <div class="admin-wrapper">
   
  <?php include(ROOT_PATH."/app/database/includes/adminSidebar.php");?>

      <!--admin-content-->
      <div class="admin-content">
       <div class="button-group">
         <a href="create.php" class="btn btn-big">Add Posts</a>
         <a href="index.php" class="btn btn-big">Manage Posts</a>
       </div>

       <div class="content">
         <h2 class="page-title">Add Posts</h2>
         <?php include (ROOT_PATH."/app/database/helpers/formerrors.php");?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">
          <div>
            <label>Title</label>
            <input type="text" name="title"  value="<?php echo $title;?>"id="" class=text-input>
          </div>

         <div>
            <label>Body</label>
            <textarea type="text" name="body" id="body"><?php echo $body;?></textarea> 
          </div>
          <div>
            <label>Image</label>
            <input type="file" name="image" value="<?php echo $image_name;?>" class=text-input>
          </div>
          <div>
              <label >Topic</label>
         <select name="topic_id" class="text-input">
         <option value=""></option>
         <?php foreach($topics as $key=>$topic):?>
         <option value="<?php echo $topic['id'];?>"><?php echo $topic['name'];?></option>
         <?php endforeach;?>
        
          </select>
        </div>

        <div>
            <label>
            <?php if($published==1):?>
              <input type="checkbox" name="published"  checked>
              Publish</label>
            <?php else:?>
              <label>
              <input type="checkbox" name="published"  >
              Publish</label>
            <?php endif;?>
           
          </div>
        <div>
          <button type="submit" name="add-post"class="btn btn-big">Add Posts</button>
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
   <script src="https://cdn.ckeditor.com/ckeditor5/21.0.0/classic/ckeditor.js"></script>

  
  <!--Custom Script-->
  <script src="../../../../assets/js/scripts.js"></script>
</body>
</html>