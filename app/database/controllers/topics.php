<?php
include(ROOT_PATH."/app/database/db.php");
include(ROOT_PATH."/app/database/helpers/validateTopic.php");
include(ROOT_PATH."/app/database/helpers/middleware.php");

$table="topics";
$id="";
$name="";
$description="";
$errors=array();

$topics= selectAll($table);

if(isset($_POST['submitTopic']))
{
  adminOnly();
  $errors=validateTopic($_POST);


  if(count($errors)==0)
  {
  unset($_POST['submitTopic']);
  
    $description=$_POST['description'];
    $description=stripslashes($description);
    $description=htmlentities($description);
   $topic_id=create($table,$_POST);
   $_SESSION['message']="Topic created Successfully";
   $_SESSION['type']="success";
   header('location:'.BASE_URL.'/app/database/admin/topics/index.php');
   exit();
  }
  else{
    $name=$_POST['name'];
    $description=$_POST['description'];
    
  }
}


if(isset($_GET['id']))
{
  $id=$_GET['id'];
  $topics=selectOne($table,['id'=>$id]);
  $id=$topics['id'];
$name=$topics['name'];
$description=$topics['description'];

}
if(isset($_GET['del_id']))
{  highPriority();
  adminOnly();
  $id=$_GET['del_id'];
  $count=delete($table,$id);
  $_SESSION['message']="Topic deleted Successfully";
$_SESSION['type']="success";
header('location:'.BASE_URL.'/app/database/admin/topics/index.php');
exit();
}

if(isset($_POST['updateTopic'])){
  adminOnly();
  $errors=validateTopic($_POST);


  if(count($errors)==0){
 $id=$_POST['id'];

unset($_POST['updateTopic']);
unset($_POST['id']);
$topic_id=update($table,$id,$_POST);
$_SESSION['message']="Topic created Successfully";
$_SESSION['type']="success";
header('location:'.BASE_URL.'/app/database/admin/topics/index.php');
exit();
}

else{
  $name=$_POST['name'];
  $id=$_POST['id'];
  $description=$_POST['description'];
}
}
?>