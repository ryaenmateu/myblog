<?php


/*
 shrink pictures...
  shifting the date ...
   order of posts ...
   logo font...
  variables on colors...
  url ...
 
.root{
  --main-bg-color:blue;
}

  trim username...
  connection require it from another... 
  sharing of posts...
  *like icon
  *admin users 4.
  *repetion of content 2
  *validate user input
  heroku web host for free 5
   */
  
include("path.php");?>

<?php include(ROOT_PATH."/app/database/controllers/topics.php");?>
<?php


$posts=array();
$postsTitle="Recent Posts";

if(isset($_GET['t_id']))
{
  $postsTitle="You Searched For Posts under '" .$_GET['name']."'";
  $posts=getPostsByTopicId($_GET['t_id']);
}
 else if(isset($_POST['Search-term']))
 {
  $postsTitle="You Searched For '" .$_POST['Search-term']."'";
   $posts=SearchPosts($_POST['Search-term']);
 }
 else
 {
  $posts = getPublishedPosts();
 }

 
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <!--font awesome-->
  <link href="assets/fontAwesome/css/all.css" rel="stylesheet"> <!--load all styles -->
  <!--Google fonts-->
  <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora?family=Roboto:ital,wght@1,100&display=swap" rel="stylesheet">

<!--custom styles-->
 <link rel="stylesheet" href="assets/css/style.css">

  <title>Express</title>
</head>
<body>
 <!--header-->
 <?php include (ROOT_PATH."/app/database/includes/header.php");?>
 <br>
<?php include (ROOT_PATH."/app/database/includes/messages.php");?>

 
   <!--Page Wrapper-->
   <div class="page-wrapper">
   <!--topics -->
   <div class="topics-wrapper">
        <div class="topics">
         <ul >
         <?php foreach($topics as $key=>$topic):?>
                <li><a href="<?php echo BASE_URL."/index.php?t_id=".$topic['id']."&name=".$topic['name'];?>"> <?php echo $topic['name']; ?></a></li>
           <?php endforeach;?>
         </ul>
        </div>
   </div>
    <!--post slider-->
      <div class="post-slider">
      <h1 class="slider-title">Trending Post</h1>
      <i class="fas fa-chevron-left prev"></i>
      <i class="fas fa-chevron-right next"></i>
      
        <div class="post-wrapper">

               <?php foreach ($posts as $post):?>

              <div class="post">
                <img src="<?php echo BASE_URL."/assets/images".$post['image'];?>" alt="" class="slider-image">
                <div class="post-info">
                  <h4><a href="single2.php?id=<?php echo $post['id'];?>"><?php echo $post['title'];?></a></h4>
                  <i class="far fa-user"><?php echo $post['username'];?></i>
                  &nbsp;  &nbsp;   &nbsp;   &nbsp;  &nbsp;  &nbsp;
                  <i class="far fa-calendar"><?php echo date('F, j ,Y',strtotime($post['created_at']))?></i>
                </div>
                </div>
               <?php endforeach;?>
          
      </div>
      
      </div>
    
    <!--//post-slider-->

       <!--Contents page-->
        <div class="content clearfix">
          <!--main content section-->
          <div class="main-content">
            <h2 class="recent-post-title"><?php echo $postsTitle;?></h2>

            <?php foreach($posts as $post):?>
            <div class="post clearfix">
              <img src="<?php echo BASE_URL."/assets/images".$post['image'];?>" alt="" class="post-image">
              <div class="post-preview">
               <h1><a href="single2.html"><?php echo $post['title'];?></a></h1>
               <i class="far fa-user"><?php echo $post['username'];?></i>
               &nbsp;
               <i class="far fa-calendar"><?php echo date('F, j ,Y',strtotime($post['created_at']))?></i>
               <p class="preview-text"><?php echo substr($post['body'],0,50)."..."?></p>
               <a href="single2.php?id=<?php echo $post['id'];?>" class="btn read-more">ReadMore</a>
              </div>
            </div>
           <?php endforeach;?>
          </div>
             <!--sidebar-->
          <div class="sidebar">
            <div class="section search">
              <h2 class="section-title">Search</h2>
            <form action="index.php" method="post">
    
              <input type="text" name="Search-term" class="text-input" placeholder="Search....">
            </form>
            </div>
          

            <div class="section topics">
              <h2 class="section-title">Topics</h2>
              <ul>

              <?php foreach($topics as $key=>$topic):?>
                <li><a href="<?php echo BASE_URL."/index.php?t_id=".$topic['id']."&name=".$topic['name'];?>"> <?php echo $topic['name']; ?></a></li>
           <?php endforeach;?>
  
              </ul>
            </div>
           
          </div>
        </div>
      </div>
   <!--Contents page-->

   <!--//Page Wrapper-->

<!--footer-->
<?php include (ROOT_PATH."/app/database/includes/footer.php");?>

  
   
  <!--JQuery-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   <!--slick carousel-->
   <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <!--Custom Script-->
  <script src="assets/js/scripts.js"></script>
</body>
</html>