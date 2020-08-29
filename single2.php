<?php include("path.php");?>
<?php include(ROOT_PATH."/app/database/controllers/posts.php");
     include(ROOT_PATH."/app/database/controllers/comments.php");
     include(ROOT_PATH."/app/database/includes/likes.php");

$topics= selectAll('topics');
$page_id="";
if(isset($_GET['id']))
{
  create('pages',['posts_id'=>$_GET['id']]);
  create('page_views',['page_id'=>$_GET['id']]);

  $page_id=$_GET['id'];
  $visitor_ip=$_SERVER['REMOTE_ADDR'];
  add_view($conn, $visitor_ip, $page_id);


  $post=selectOne('posts',['id'=>$_GET['id']]);


  if(isset($_GET['t_id']))
{
  $posts=getPostsByTopicId($_GET['t_id']);
}

}
else{
  $posts=getPublishedPosts();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--font awesome-->
  <link href="assets/fontAwesome/css/all.css" rel="stylesheet"> <!--load all styles -->

 <!--Google fonts-->
<link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet">
  

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <!--custom styles-->
 <link rel="stylesheet" href="assets/css/style.css">


  <title><?php echo $post['title'];?> | Express</title>
</head>
<body>
 <!--header-->
 <?php include (ROOT_PATH."/app/database/includes/header.php");?>

   <!--Page Wrapper-->
   <div class="page-wrapper">
 
    
       <!--Contents page-->
        <div class="content clearfix">
    <div class="main-content single">
            <h1 class=" post-title"><?php echo $post['title'];?></h1>
        <div class=" post-content">
            <img src="<?php echo BASE_URL."/assets/images".$post['image'];?>" alt=""><br/>
             <?php echo html_entity_decode($post['body']);?>
            <hr>
              <!-- if user likes post, style button differently --> 
      	<i <?php if (userLiked($post['id'])): ?>
      		  class="fas fa-thumbs-up like-btn"
      	  <?php else: ?>
      		  class="far fa-thumbs-up like-btn"
          <?php endif ?>
      	  data-id="<?php echo $post['id'] ?>"></i>
      	<span class="likes">likes&nbsp;<?php echo getLikes($post['id']); ?></span>
      	
      	&nbsp;&nbsp;&nbsp;&nbsp;

	    <!-- if user dislikes post, style button differently -->
      	<i 
      	  <?php if (userDisliked($post['id'])): ?>
      		  class="fas fa-thumbs-down dislike-btn"
      	  <?php else: ?>
      		  class="far fa-thumbs-down dislike-btn"
          <?php endif ?>
      	  data-id="<?php echo $post['id'] ?>"></i>
        <span class="dislikes">dislikes&nbsp;<?php echo getDislikes($post['id']); ?></span>
        <hr>
        <!--commenting link-->
             <a href="#comments">	<h2><span id="comments_count">View Hot &nbsp;<?php echo count($comments); ?></span>Comment(s)</h2></a>
              <!-- imported share icons app and tweeter -->
              <hr>
             <div class="share_icons">
             <span  class="share"><a href="whatsapp://send?text=http://webdevelopmentscripts.com"><i class="fab fa-whatsapp"></i>app&nbsp;</a></span>
             <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
             </div>
</div>
    </div>
          
   

             <!--sidebar-->
          <div class="sidebar">
            <div class="section popular">
              <h2 class="section-title">Popular Posts</h2>
                  <?php foreach ($posts as $p):?>
                   <div class="post clearfix">
                     <img src="<?php echo BASE_URL."/assets/images".$p['image'];?>" alt=""><h4><a href="<?php echo BASE_URL."/single2.php?id=".$p['id']?>&t_id=<?php echo $p['topic_id'];?>" class="title"><?php echo $p['title'];?></a></h4>
                     &nbsp;
               <i class="far fa-calendar"><?php echo date('F, j ,Y',strtotime($p['created_at']))?></i>
                     </div>
                  <?php endforeach;?>
       </div>
            <div class="section topics">
              <h2 class="section-title">Topics</h2>
              <ul>
              <?php foreach($topics as $key=>$topic):?>
                <li><a href="<?php echo BASE_URL."/index.php?t_id=".$topic['id']."&name=".$topic['name'];?>"> <?php echo $topic['name']; ?></a></li>
              <?php endforeach; ?>
              </ul>
            </div>
           
            <!--counter-->
            <?php if(isset($_SESSION['admin'])):?>
            <div class="counter">
              <a href='http://www.freevisitorcounters.com'>Get Visitor Counters</a> <script type='text/javascript' src='https://www.freevisitorcounters.com/auth.php?id=6e47b278a0d5dfe1720db89c9b907e7c7ca9ca0e'></script>
              <script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/730598/t/1"></script>
            </div>
            <?php else:?>
            <div class="counter_hide">
              <div class="counter">
              <a href='http://www.freevisitorcounters.com'>Get Visitor Counters</a> <script type='text/javascript' src='https://www.freevisitorcounters.com/auth.php?id=6e47b278a0d5dfe1720db89c9b907e7c7ca9ca0e'></script>
              <script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/730598/t/1"></script>
            </div>
            </div>
            <?php endif;?>
        </div>
    </div>
  </div>
  <div class="container">
	<div class="row">
		<!-- comments section -->
		<div class="col-md-6 col-md-offset-3 comments-section">
    <?php if ($user_id): ?>
			<!-- comment form -->
			<form class="clearfix" action="single2.php" method="post" id="comment_form">
				<h4 id="comments">Post a comment:</h4>
				<textarea name="comment_text" id="comment_text" class="form-control" cols="30" rows="3"></textarea>
				<button class="btn btn-primary btn-sm pull-right" id="submit_comment">Submit comment</button>
			</form>
      <?php else: ?>
				<div class="well" style="margin-top: 20px;">
					<h4 class="text-center" id="comments"><a class="btn_1" href="<?php echo BASE_URL.'/login.php'?>">Sign in to post a comment</a></h4>
        </div>
			<?php endif ?>
			<!-- Display total number of comments on this post  -->
			<h2><span id="comments_count"><?php echo count($comments); ?></span> Comment(s)</h2>
			<hr>
			<!-- comments wrapper -->
			<div id="comments-wrapper">
      <?php if($comments): ?>
        <?php foreach ($comments as $comment): ?>
				<div class="comment clearfix">
						<img src="<?php echo BASE_URL."/assets/images/profile.jpg"?>" alt="" class="profile_pic">
						<div class="comment-details">
						<span class="comment-name"><?php echo getUsernameById($comment['user_id']) ?></span>
						<span class="comment-date"><?php echo date("F j, Y ", strtotime($comment["created_at"])); ?></span>
						<p><?php echo $comment['body']; ?></p>
						<a class="reply-btn" href="#" data-id="<?php echo $comment['id']; ?>">reply</a>
					</div>
              <!-- reply -->
              <?php $replies = getRepliesByCommentId($comment['id']) ?>
					<div class="replies_wrapper_<?php echo $comment['id']; ?>">
						<?php if (isset($replies)): ?>
							<?php foreach ($replies as $reply): ?>
								<!-- reply -->
								<div class="comment reply clearfix">
									<img src="<?php echo BASE_URL."/assets/images/profile.jpg"?>" alt="" class="profile_pic">
									<div class="comment-details">
										<span class="comment-name"><?php echo getUsernameById($reply['user_id']) ?></span>
										<span class="comment-date"><?php echo date("F j, Y ", strtotime($reply["created_at"])); ?></span>
										<p><?php echo $reply['body']; ?></p>
										<a class="reply-btn" href="#">reply</a>
									</div>
								</div>
							<?php endforeach ?>
						<?php endif ?>
					</div>
				</div>
					<!-- // comment -->
				<?php endforeach ?>
			<?php else: ?>
				<h2>Be the first to comment on this post</h2>
			<?php endif ?>
			</div><!-- comments wrapper -->
    </div>
    <!-- // all comments -->
</div>
</div>
   <!--//Page Wrapper-->
<!--footer-->
<?php include (ROOT_PATH."/app/database/includes/footer.php");?>


<!-- Bootstrap Javascript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>


 <!--JQuery-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
   <!--slick carousel-->
   <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <!--Custom Script-->
  <script src="assets/js/scripts.js"></script>
  
</body>
</html>