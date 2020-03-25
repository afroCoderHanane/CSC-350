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
      <input name="password"type="password" class="inputvalue" placeholder="Enter password" required/><br>
      <input name="login" type="submit" id="login-btn" value ="login"/><br>
     <a href="register.php"> <input type="button" id="register-btn" value ="Register"/></a>
</form>
<?php
  if(isset($_POST['login']))
  {
    $username=$_POST['username'];
    $password=$_POST['password'];
    //filter the variable for security
    //$username = strip_tags(mysqli_real_escape_string($con, trim($username)));
    //$password = strip_tags(mysqli_real_escape_string($con, trim($password)));
    
    $query= "SELECT password from userinfotable WHERE username='$username'";
    $query_run= mysqli_query($con,$query);
    
    if(mysqli_num_rows($query_run)>0)
    {
      //valid
      $row = mysqli_fetch_array($query_run);
      $password_hash = $row['password'];
      //$data = $query->fetch_array();
      if(password_verify($password, $password_hash))
       { 
         print "Password Matched - logging In";
         $_SESSION['username']= $username;
         header('location:homepage.php');
       }
       else
       {
         print "Incorrect Password - Logging Failed";
       }
    }
    else
    {
      print " user did not exist";
    }
  
  }



?>
</div>
</body>
</html>