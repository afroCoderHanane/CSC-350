<?php
session_start();
require 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel ="stylesheet" href="style.css">
</head>
<body style="background-color:#2c3e50 ">

 <div id = "main-wrapper">
     <center>
       <h2> Login </h2>
       <img src="logo_transparent.png" class= "avatar"/>
    </center>

<form class= "myform" action"index.php" method="post">
     <label><b> Username</b></label><br>
      <input name="username" type="text" class="inputvalue" placeholder="Enter username" required/><br>
      <label><b> Password</b></label><br>
      <input name="password"type="text" class="inputvalue" placeholder="Enter password" required/><br>
      <input name="login" type="submit" id="login-btn" value ="login"/><br>
     <a href="register.php"> <input type="button" id="register-btn" value ="Register"/></a>
</form>
<?php
  if(isset($_POST['login']))
  {
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query= "SELECT * from user WHERE username='$username' AND password='$password'";
    $query_run= mysqli_query($con,$query);
    if(mysqli_num_rows($query_run)>0)
    {
      //valid
      $_SESSION['username']= $username;
      header('location:homepage.php');
    }
    else
    {
      print "password or user did not exist";
    }
  }



?>
</div>
</body>
</html>