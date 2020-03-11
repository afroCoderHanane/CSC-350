<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel ="stylesheet" href="style.css">
</head>
<body style="background-color:#2c3e50 ">

 <div id = "main-wrapper">
     <center>
       <h2> Home Page </h2>
       <h3> Welcome <?php echo $_SESSION['username']?></h3>
       <img src="logo_transparent.png" class= "avatar"/>
    </center>

<form class= "myform" action"index.php" method="post">
     
      <input name= "logout" type="submit" id="logout-btn" value ="log out"/><br>
      
</form>
<?php
if(isset($_POST['logout']))
 {
   session_destroy();
   header('location:index.php');
 }
?>
</div>
</body>
</html>