<?php 
$visitor_ip=$_SERVER['REMOTE_ADDR'];
if(isset($_GET['id']))
{
  
  $posts=selectOne('posts',['id'=>$_GET['id']]);
  $page_id=$posts['id'];
  is_unique_view($conn, $visitor_ip, $page_id);
  add_view($conn, $visitor_ip, $page_id);
}



?>