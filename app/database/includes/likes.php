<?php 
   
	// connect to the database


	if (isset($_POST['liked'])) {
		$post_id = $_POST['post_id'];
		$posts = selectAll('posts',['id'=>$post_id]);
	//	$row = count($posts);
	$row=mysqli_fetch_array($posts);
		$n = $row['likes'];
	//insert into likes values userid=session userid;postid=$postid
	create('likes',['user_id'=>26],['post_id'=>$post_id]);

		//update posts table set likes =$n+1 WHERE id=$postsid
		
	//	update('posts',['id'=>$post_id],['likes'=>$u]);
		mysqli_query($conn, "UPDATE posts SET likes=$n+1 WHERE id=$post_id");

		echo $n+1;
		exit();
	}
	if (isset($_POST['unliked'])) {
		$post_id = $_POST['post_id'];
		$posts = selectAll('posts',['id'=>$post_id]);
		$row = count($posts);
		$n = $row['likes'];
//delete from like where postsid==$postsid and userid==USERsessionid
   $user_id=26;
//delete('likes',['post_id'=>$post_id],['user_id'=>$_SESSION['id']]);
mysqli_query($conn,"DELETE FROM likes WHERE post_id=$post_id AND user_id=$user_id");
	

		//update posts table set likes =$n+1 WHERE id=$postsid
	//$up=	update('posts',['id'=>$post_id],['likes'=>$n-1]);
	mysqli_query($conn, "UPDATE posts SET likes=$n-1 WHERE id=$post_id");
	
		
	echo $n-1;
		exit();
	}

	// Retrieve posts from the database
//	$posts = mysqli_query($conn, "SELECT * FROM posts");
?>

 