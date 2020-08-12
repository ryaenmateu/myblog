<?php include("../../../../path.php"); ?>
<?php include(ROOT_PATH."/app/database/controllers/topics.php")?>
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

  <title>Admin section-Manage Topics</title>
</head>
<body>
  <?php include(ROOT_PATH."/app/database/includes/adminHeader.php");?>

  <!--Admin page wrapper-->
  <div class="admin-wrapper">
   
  <?php include(ROOT_PATH."/app/database/includes/adminSidebar.php");?>

      <!--admin-content-->
      <div class="admin-content">
       <div class="button-group">
         <a href="create.php" class="btn btn-big">Add Topic</a>
         <a href="index.php" class="btn btn-big">Manage Topic</a>
       </div>

       <div class="content">
         <h2 class="page-title">Manage Topics</h2>
        
         <?php include(ROOT_PATH."/app/database/includes/messages.php");?>
         <?php adminOnly();?>
         


         <table>
           <thead>
             <th>SN</th>
             <th>Name</th>
             <th colspan="2">Action</th>
           </thead>
           <tbody>
           
             <?php foreach($topics as $key=>$topic):?>
              <tr>
              <td><?php echo $key+1;?></td>
              <td><?php echo $topic['name'];?></td>
              <td><a href="edit.php? id=<?php echo $topic['id'];?>"  class="edit">edit</a></td>
              <td><a href="index.php?del_id=<?php echo $topic['id']?>"class="delete" name="del_id">delete</a></td>
              </tr>
           <?php endforeach;?>
        
          </tbody>
         </table>
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