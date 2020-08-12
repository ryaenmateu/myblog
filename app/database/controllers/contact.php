<?php 


 function validate($data)
 {
   htmlspecialchars($data);
   trim($data);
   stripslashes($data);
   return $data;
 }
 $msg="";
    $email="";
if(isset($_POST['send'])){
  
  if(count($errors)==0)
  {
    $msg=validate($_POST['message']);
    $email=validate($_POST['email']);
   

    $to ="ryaenmateu22@gmail.com";
    $message= "<p>".$msg."</p>";
    $headers="From:".$email;
    $headers.= "MIME-Version: 1.0\r\n";
    $headers.= "Content-type: text/html\r\n";
    
    $retrival= mail($to,$message,$headers);
       
      if($retrival==true)
      {
      echo"<h3>Email sent successfully, " .$name."will be back to you shortly</h3>";
      }
   else
   {
     echo"<h3>Email not sent,Something went wrong..Please check your email</h3>";
    
    }     
   }
   else{
    $msg=$_POST['message'];
    $email=$_POST['email'];
   }	 
  }

?>