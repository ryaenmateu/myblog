
<?php 
include(ROOT_PATH."/app/database/helpers/validate.php");
include(ROOT_PATH."/app/database/db.php");
include(ROOT_PATH."/app/database/helpers/middleware.php");

$username="";
$email="";
$password="";
$Vpassword="";
$admin="";
$id="";
$errors=array();

$users=selectAll('users');

if(isset($_POST['submit']) || isset($_POST['create-admin']))
{
  
 $errors=validateuser($_POST);

  if(count($errors)===0)
 {
  unset($_POST['Vpassword']);
  unset($_POST['submit']);
  unset($_POST['create-admin']);
  $_POST['password']=password_hash( $_POST['password'],PASSWORD_DEFAULT);

  if(isset($_POST['admin']))
  {
    highPriority();
    $_POST['admin']=1;
    $user_id=create('users',$_POST);
    $_SESSION['message']="Admin user created successfully";
    $_SESSION['type']="success";
    header('location:'.BASE_URL."/app/database/admin/users/index.php"); 
    exit();
   }
   else{
    $_POST['admin']=0;
     $user_id= create('users',$_POST);
     $user=selectOne('users',['id'=>$user_id]);
   }
  }
 

//user login
$_SESSION['username'] =$user['username'];
$_SESSION['admin'] =$user['admin'];
$_SESSION['email'] =$user['email'];
$_SESSION['id'] =$user['id'];
$_SESSION['massage'] ="welcom your logged in";
$_SESSION['type']="success";
if($_SESSION['admin'])
{
  header('location:'.BASE_URL."/app/database/admin/dashboard.php"); 
}
else{
header('location:'.BASE_URL."/index.php");
}
exit();

 }
 else
 {
  $admin=isset($_POST['admin'])? 1 : 0;
  $username=isset($_POST['username'])?$_POST['username']:"";
  $email= isset($_POST['email'])?$_POST['email']:"";
  $password=isset($_POST['password'])?$_POST['password']:"";
  $Vpassword=isset($_POST['Vpassword'])?$_POST['Vpassword']:"";
}
//}
if(isset($_POST['login']))
{
  $username= trim($_POST['username']);
  
 $errors= validateLogin($_POST);

 if(count($errors)==0)
 {
  $username = stripslashes($username);
  $password = stripslashes($password);
  $username = mysqli_real_escape_string($conn,$username);
  $password = mysqli_real_escape_string($conn,$password);
  
   $user= selectOne('users',['username'=>$username]);

   if($user && password_verify($password,$user['password']))
   {
     if(isset($_POST['remember']))
     {
       setcookie('username',$username,time()+(86400*30),"/");
       setcookie('password',$password,time()+(86400*30),"/");
       if(!isset($_COOKIE['username'])){
         array_push($errors,"cookie not set");
       }
         //login user
       $_SESSION['username'] =$user['username'];
       $_SESSION['admin'] =$user['admin'];
       $_SESSION['email'] =$user['email'];
       $_SESSION['id'] =$user['id'];
       $_SESSION['massage'] ="welcom your logged in";
       $_SESSION['type']="success";
      if($_SESSION['admin'])
      {
      header('location:'.BASE_URL."/app/database/admin/dashboard.php"); 
    }
    else{
    header('location:'.BASE_URL."/index.php");
    }
    exit();

     }
     else{ 
       //login user
      $_SESSION['username'] =$user['username'];
      $_SESSION['admin'] =$user['admin'];
      $_SESSION['email'] =$user['email'];
      $_SESSION['id'] =$user['id'];
      $_SESSION['massage'] ="welcom your logged in";
      $_SESSION['type']="success";
     if($_SESSION['admin'])
     {
     header('location:'.BASE_URL."/app/database/admin/dashboard.php"); 
   }
   else{
   header('location:'.BASE_URL."/index.php");
   }
   exit();
      }
    }
  
   else{
     array_push($errors,"Wrong Credentials");
   }
 }
 $username= $_POST['username'];
 $password= $_POST['password'];
}
if(isset($_GET['del_id'])){

  adminOnly();
  highPriority();
  $id=$_GET['del_id'];
  $count= delete('users',$id);
  $_SESSION['message']="Admin user deleted successfully";
  $_SESSION['type']="success";
  header('location:'.BASE_URL."/app/database/admin/users/index.php"); 
  exit();
}
if(isset($_GET['id'])){
  $user=selectOne('users',['id'=>$_GET['id']]);

  $admin=$user['admin']? 1 : 0;
  $username= $user['username'];
  $email= $user['email'];
 $id= $user['id'];
  
}


if(isset($_POST['update-user']))
{
  adminOnly();
  highPriority();
  $id=$_POST['id'];
    $errors=validateuser($_POST);
   
     if(count($errors)===0)
    {
     unset($_POST['Vpassword']);
     unset( $_POST['id']);
     unset($_POST['update-user']);
     $_POST['password']=password_hash( $_POST['password'],PASSWORD_DEFAULT);
   
     
       $_POST['admin']=isset($_POST['admin']) ? 1 : 0;
       $count= update('users',$id,$_POST);
       $_SESSION['message']="Admin user updated successfully";
       $_SESSION['type']="success";
       header('location:'.BASE_URL."/app/database/admin/users/index.php"); 
       exit();
    }
    else{
     $admin=isset($_POST['admin'])? 1 : 0;
     $username= $_POST['username'];
     $email= $_POST['email'];
     $password=$_POST['password'];
     $Vpassword=$_POST['Vpassword'];
   }
}
if(isset($_POST['recover'])){
  
  unset($_POST['recover']);
    $user=selectOne('users',['email'=>$_POST['email']]);
    
      $to ="".$user['email']."";
      $message= "<p>welcome ".$user['email']." to reset your settings please click the link <a href='#'>settings</a></p>";
      $headers="From:Express.com";
      $headers.= "MIME-Version: 1.0\r\n";
      $headers.= "Content-type: text/html\r\n";
      
      $retrival= mail($to,$message,$headers);
         
        if($retrival==true)
        {
        echo"<h3>Email sent successfully, " .$_POST['email']."Check your mail-box</h3>";
        }
     else
     {
       echo"<h3>Email not sent,Something went wrong..Please check your email</h3>";
      
      }     
    

  }





?>