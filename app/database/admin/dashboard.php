<?php include("../../../path.php"); ?>
<?php include(ROOT_PATH."/app/database/controllers/posts.php");?>
<?php// include(ROOT_PATH."/app/database/controllers/views.php");?>
<?php adminOnly();?>

<?php
$page_id="";
if(isset($_POST['id']))
{
  $views=selectOne('pages',['posts_id'=>$_POST['id']]);
  $page_id=$views['posts_id'];
  
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!--custom styles-->
 <link rel="stylesheet" href="../../../assets/css/style.css">
 
  <!--font awesome-->
  <link href="../../../assets/fontAwesome/css/all.css" rel="stylesheet"> <!--load all styles -->

 <!--Google fonts-->
<link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet">
  

 <!--Admin styles-->
 <link rel="stylesheet" href="../../../assets/css/admin.css">


  <title>Admin section-DASHBOARD</title>
</head>
<body>
  <?php include(ROOT_PATH."/app/database/includes/adminHeader.php");?>

  <!--Admin page wrapper-->
  <div class="admin-wrapper">
   
  <?php include(ROOT_PATH."/app/database/includes/adminSidebar.php");?>

      <!--admin-content-->

       <div class="content">
         <h2 class="page-title">DashBoard</h2>
         <?php include (ROOT_PATH."/app/database/includes/messages.php");?>
          <div class="table">
          <table>
             <thead>
                  <th>OVERAL VISITS/WEBSITE</th>
                   <th>VIEWS/PAGE</th>
                     
             </thead>
             <tbody>
               <tr>
                   <td><?php  $total_website_views=total_views($conn); 
                   echo $total_website_views;?></td>
                   <td><?php $tota_page_views=total_views($conn,$page_id); echo $tota_page_views;?></td>
                  
               </tr>
                
             </tbody>
          </table>
          <br>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
       
        <div class="form-group">
        <label >Enter Posts ID</label>
          <input type="number" name="id" class="form-control" >
          <?php echo "Showing  Views of Posts ID ".$page_id;?> 
        </div>
        
        </form>




          <a href='http://www.freevisitorcounters.com'>Get Visitor Counters</a> <script type='text/javascript' src='https://www.freevisitorcounters.com/auth.php?id=6e47b278a0d5dfe1720db89c9b907e7c7ca9ca0e'></script>
<script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/730598/t/1"></script>
          </div>
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
  <script src="../../../../../assets/js/scripts.js"></script>
</body>
</html>