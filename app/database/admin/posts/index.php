<?php include("../../../../path.php"); ?>

<?php include(ROOT_PATH."/app/database/controllers/posts.php")?>
<?php include(ROOT_PATH."/app/database/controllers/pagination.php")?>
<?php if(isset($_POST['Search-term']))
 {
  $postsTitle="You Searched For '" .$_POST['Search-term']."'";
   $posts=SearchAllPosts($_POST['Search-term']);
 }
 else
 {
  $posts = selectPostsWithLimit('posts');
 }?>
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
         <h2 class="page-title">Manage Posts</h2>
         <div class="section search">
              <h2 class="section-title">Search</h2>
            <form action="index.php" method="post">
    
              <input type="text" name="Search-term" class="text-input" placeholder="Search....">
            </form>
            </div>
         <?php include(ROOT_PATH."/app/database/includes/messages.php");?>
         <table>
           <thead>
             <th>ID</th>
             <th>Title</th>
             <th>Author</th>
             <th colspan="3">Action</th>
           </thead>
           <tbody>
           <?php foreach($posts as $key=>$post):?>
            <tr>
             <td><?php echo $post['id'];?></td>
             <td><?php echo $post['title'];?></td>
             <td><?php echo $post['user_id'];?></td>
             <td><a href="edit.php? id=<?php echo $post['id'];?>" class="edit">edit</a></td>
             <td><a href="edit.php? delete_id=<?php echo $post['id'];?>"class="delete">delete</a></td>
            <?php if($post['published']):?>
             <td><a href="edit.php?published=0&p_id=<?php echo $post['id'];?>" class="unpublish">unpublish</a></td>
            <?php else:?>
             <td><a href="edit.php?published=1&p_id=<?php echo $post['id'];?>" class="publish">publish</a></td>
            <?php endif;?>
            </tr>
            <?php endforeach;?>
          
          </tbody>
         </table>
         <?php include(ROOT_PATH."/app/database/includes/pagination.php");?>
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