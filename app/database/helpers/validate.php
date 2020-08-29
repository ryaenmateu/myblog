<?php
 function validateuser($user)
 {
  $errors=array();

  if(empty($user['username']))
  {
    array_push($errors,"Username required");
  }

  if(empty($user['email']) || !filter_var($user['email'],FILTER_VALIDATE_EMAIL))
  {
    array_push($errors,"  Valid Email is required");
  }

  if(empty($user['password']))
  {
    array_push($errors,"password is required");
  }

  if($user['password'] !== $user['Vpassword'])
  {
    array_push($errors,"Password do not match");
  }
 
  $Existinguser=selectOne('users',['email'=>$user['email']]);
  if($Existinguser)
  {
    if(isset($user['update-user']) && $Existinguser['id'] != $user['id'] )
    {
      array_push($errors,"user with this email already exist!");
    }
  if(isset($user['submit'])){
    array_push($errors,"Posts with this email already exist!");
  }
}
 
   return $errors;
 }

 function validateLogin($user)
 {
  $errors=array();

  if(empty($user['username']))
  {
    array_push($errors,"Username required");
  }
 
  if(empty($user['password']))
  {
    array_push($errors,"password is required");
  }
 
   return $errors;
 }
 ?>