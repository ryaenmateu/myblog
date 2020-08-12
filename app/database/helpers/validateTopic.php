<?php
 function validateTopic($topic)
 {
  $errors=array();

  if(empty($topic['name']))
  {
    array_push($errors,"Name is required");
  }
 
  $ExistingTopic=selectOne('topics',['name'=>$topic['name']]);
  if(($ExistingTopic))
  {
    if(isset($post['updateTopic']) && $ExistingTopic['id'] != $topic['id'] )
    {
      array_push($errors,"Topic with this name already exist!");
    }
  if(isset($post['submitTopic'])){
    array_push($errors,"Topic with this name already exist!");
  }
  }
 
   return $errors;
 }

 
 ?>