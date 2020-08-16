<?php include("../../../../path.php"); ?>
<?php include(ROOT_PATH."/app/database/controllers/users.php")?>
<?php include(ROOT_PATH."/app/database/controllers/pagination.php");?>
<?php if(isset($_POST['Search-term']))
 {
  
  $postsTitle="You Searched For '" .$_POST['Search-term']."'";
   $users=  SearchUserName($_POST['Search-term']);
 }
 else {
   $users=selectPostsWithLimit('users');
 }
?>
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
         <a href="create.php" class="btn btn-big">Add User</a>
         <a href="index.php" class="btn btn-big">Manage User</a>
       </div>

       <div class="content">
         <h2 class="page-title">Manage User</h2>
         <h2 class="section-title">Search</h2>
            <form action="index.php" method="post">
    
              <input type="text" name="Search-term" class="text-input" placeholder="Search....">
         <?php include(ROOT_PATH."/app/database/includes/messages.php");?>
         <table>
           <thead>
             <th>SN</th>
             <th>Name</th>
             <th>Email</th>
             <th>Role</th>
             <th colspan="2">Action</th>
           </thead>
           <tbody>
           <?php foreach( $users as $key=>$user):?>
           <tr>
             <td><?php echo $key+1;?></td>
             <td><?php echo $user['username'];?></td>
             <td><?php echo $user['email'];?></td>
             <?php if($user['admin']==1):?>
             <td>Admin</td>
             <?php else:?>
              <td>Author</td>
             <?php endif;?>
             <td><a href="edit.php?id=<?php echo $user['id'];?>"class="edit">edit</a></td>
             <td><a href="index.php?del_id=<?php echo $user['id'];?>"class="delete">delete</a></td>
            
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
   <script src="https://cdn.ckeditor.com/ckeditor5/21.0.0/classic/ckeditor.js"></script>

  
  <!--Custom Script-->
  <script src="../../../../assets/js/scripts.js"></script>
</body>
</html>