<?php
include("path.php");?>
<?php include(ROOT_PATH."/app/database/db.php");?>
<?php
   session_start();
   
   if(session_destroy()) {
      header("Location:index.php");
   }
?>