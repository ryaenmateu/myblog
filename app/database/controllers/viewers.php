
<?php

$user_ip=$_SERVER['REMOTE_ADDR'];


  $single=create('page_view',['user_ip'=>$user_ip]);
 


$query="SELECT * FROM page_view WHERE user_ip='$user_ip'";
$result=mysqli_query($conn,$query);
$total_viewers=mysqli_num_rows($result);



?>