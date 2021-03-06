<?php
include(ROOT_PATH."/app/database/db.php");
include(ROOT_PATH."/app/database/helpers/validatePosts.php");
include(ROOT_PATH."/app/database/helpers/middleware.php");

$table="posts";
$topics= selectAll('topics');
//$posts=selectAll($table);

$errors=array();
$title="";
$body="";
$topic_id="";
$published="";
$id="";
$image_name="";


if(isset($_GET['id']))
{
 $post=selectOne($table,['id'=>$_GET['id']]);
 //dd($post);

 $id=$post['id'];
 $title=$post['title'];
$body=$post['body'];
$topic_id=$post['topic_id'];
$published=$post['published'];

}

if(isset($_GET['delete_id']))
{
  adminOnly();
  highPriority();
 $count=delete($table,$_GET['delete_id']);
 $_SESSION['message']="Posts deleted Successfully";
 $_SESSION['type']="success";
 header("location:".BASE_URL."/app/database/admin/posts/index.php");
 exit();

}

if(isset($_GET['published']) && isset($_GET['p_id']))
{
  highPriority();
  adminOnly();
  $published=$_GET['published'];
  $p_id=$_GET['p_id'];
  //update the state of publish
  $count=update($table,$p_id,['published'=>$published]);
  $_SESSION['message']="Published stated changed  Successfully";
  $_SESSION['type']="success";
  header("location:".BASE_URL."/app/database/admin/posts/index.php");
  exit();
}


if(isset($_POST['add-post']))
{
  adminOnly();
 $errors= validatePosts($_POST);
 //dd($_FILES['image']['name']);
 if(!empty($_FILES['image']['name']))
 {
      $image_name= time().'_'.$_FILES['image']['name'];
      $destination=ROOT_PATH."/assets/images".$image_name;
     $result= move_uploaded_file($_FILES['image']['tmp_name'],$destination);

     if($result){
             $_POST['image']=$image_name;
     }
     else{
       array_push($errors,"Failed to upload image");
     }

 }else{
   array_push($errors,"Post image is required");
 }

  if(count($errors)==0)
  {
  unset($_POST['add-post']);
  $_POST['user_id']=$_SESSION['id'];
  $_POST['published']= isset($_POST['published']) ? 1 : 0;
  //sql injections
  $body=htmlentities($_POST['body']);
  $body=stripslashes($body);
  $body=mysqli_real_escape_string($conn,$body);

  $post_id=create($table,$_POST);
  $_SESSION['message']="Posts created Successfully";
$_SESSION['type']="success";
  header("location:".BASE_URL."/app/database/admin/posts/index.php");
  exit();
  }
  else{
    $title=$_POST['title'];
    $body=$_POST['body'];
    $topic_id=$_POST['topic_id'];
    $published= isset($_POST['published']) ? 1 : 0;
  }
}

if(isset($_POST['update-post']))
{
  adminOnly();
  $errors= validatePosts($_POST);

  if(!empty($_FILES['image']['name']))
  {
    $image_name= time().'_'.$_FILES['image']['name'];
    $destination=ROOT_PATH."/assets/images".$image_name;

    $result=move_uploaded_file($_FILES['image']['tmp_name'],$destination);

    if($result){
      $_POST['image']=$image_name;
}
else{
array_push($errors,"Failed to upload image");
}

}else{
array_push($errors,"Post image is required");
}

if(count($errors)==0)
{
  $id=$_POST['id'];
unset($_POST['add-post'],$_POST['id']);
$_POST['user_id']=$_SESSION['id'];
$_POST['published']= isset($_POST['published']) ? 1 : 0;
$body=htmlentities($_POST['body']);

$post_id=update($table,$id,$_POST);
$_SESSION['message']="Post updated Successfully";
$_SESSION['type']="success";
header("location:".BASE_URL."/app/database/admin/posts/index.php");
exit();
}
else{
  $title=$_POST['title'];
  $body=$_POST['body'];
  $topic_id=$_POST['topic_id'];
  $published= isset($_POST['published']) ? 1 : 0;
}
}

   

?>