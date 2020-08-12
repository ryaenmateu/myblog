<?php 
 
 function usersOnly($redirect="/index.php")
 {
   if(empty($_SESSION['id']))
   {
   $_SESSION['message']="You need to login First!!";
   $_SESSION['type']="error";
   header('location:'.BASE_URL.$redirect);
   exit;
     
   }

 }
 function adminOnly($redirect="/index.php")
 {
  if(empty($_SESSION['id']) || empty($_SESSION['admin']))
  {
  $_SESSION['message']="You are not authorised!!";
  $_SESSION['type']="error";
  header('location:'.BASE_URL.$redirect);
  exit;
 }
}
 function guestOnly($redirect="/index.php")
 {
  if(empty($_SESSION['id']))
  {
  header('location:'.BASE_URL.$redirect);
  exit;
 }

 }

 function highPriority($redirect="/app/database/admin/dashboard.php")
 {
  if(empty($_SESSION['id']) || empty($_SESSION['admin']==2) )
  {
  $_SESSION['message']="NOTICE: Not Allowed to perfom the previously selected privledge";
  $_SESSION['type']="error";
  header("location:".BASE_URL.$redirect);
  exit;
 }
 }
?>