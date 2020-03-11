<?php
require 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration Page</title>
<link rel ="stylesheet" href="style.css">
</head>
<body style="background-color:#d2dae2">

 <div id = "main-wrapper">
     <center>
       <h2> Register </h2>
       <img src="logo_transparent.png" class= "avatar"/>
    </center>

<form class= "myform" action"register.php" method="post">
     <label><b> Username</b></label><br>
      <input name="username" type="text" class="inputvalue" placeholder="Enter username" required/><br>
      <label><b> Password</b></label><br>
      <input name="password" type="text" class="inputvalue" placeholder="Enter password" required/><br>
      <label><b> Confirm Password</b></label><br>
      <input name="cpassword" type="text" class="inputvalue" placeholder="Confirm password"required/><br>
      <input name="submit-btn" type="submit" id="signup-btn" value ="Sign up"/><br>
      <a href= "index.php"><input type="button" id="back-btn" value ="Back"/></a>
      
</form>
<?php 
   if(isset($_POST['submit-btn']))
   {
      // echo '<script type = "text/javascript"> alert("sign Up button clicked")</script>';
        $username = $_POST['username'];
        $password= $_POST['password'];
        $cpassword= $_POST['cpassword'];
     if($password==$cpassword)
     {
         $query= "SELECT* FROM `user` WHERE username ='$username'";
         $query_run= mysqli_query($con,$query);

         if(mysqli_num_rows($query_run)>0)
         {
           echo '<script type = "text/javascript"> alert("User already exist: try another username")</script>'; 
         }
         else
         {
             $query = "insert into user values('$username', '$password')";
             $query_run = mysqli_query($con,$query);
            
             if($query_run)
             {
                echo '<script type = "text/javascript"> alert("Registration successful: Return to login Page")</script>';
             }
             else
             {
                echo '<script type = "text/javascript"> alert("Error 404: Registration failed")</script>';
             }
         }
      }
      else
      {
        echo '<script type = "text/javascript"> alert("Password did not match")</script>';
      }
  
    }
?>
</div>
</body>
</html>