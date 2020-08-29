<?php
 function validatePosts($post)
 {
  $errors=array();

  if(empty($post['title']))
  {
    array_push($errors,"Title is required");
  }

  if(empty($post['body']))
  {
    array_push($errors,"Body required");
  }

 /* if(empty($post['image']))
  {
    array_push($errors,"image is required");
  }*/
  if(empty($post['topic_id']))
  {
    array_push($errors,"topic is required");
  }

 
 
  $ExistingPosts=selectOne('posts',['title'=>$post['title']]);
  if($ExistingPosts)
  {
    if(isset($post['update-post']) && $ExistingPosts['id'] != $post['id'] )
    {
      array_push($errors,"Posts with this title already exist!");
    }
  if(isset($post['add-post'])){
    array_push($errors,"Posts with this title already exist!");
  }
}
 
   return $errors;
 }

 
 
 ?>