<?php
require 'connect.inc.php';
if (isset($_POST['username'])&&isset($_POST['password'])) {
  $username=$_POST['username'];
  $password=$_POST['password'];
  
  if (!empty($username)&&!empty($password)) {
    $query="SELECT `username` FROM `admin` WHERE `username`='$username' AND `password`='$password'";
    if ($query_run=mysql_query($query)) {
      $query_num_rows=mysql_num_rows($query_run);
      if ($query_num_rows==0) {
        echo "<script> alert('invalid uesername or password')</script>";
      }else if($query_num_rows==1) {
       
       echo "<script>
       window.open('admin_home.php')
      </script>";
      header('refresh:0; url=php/index.php');
      }
}



  }else{
    echo "<script>
            alert('Please enter your username and password')
        </script>";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
    


  </style>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <form  action="admin.php" method="POST">
     
      <div class="container">
        <label>Enter username:</label><br><input type="text" name="username" placeholder="username" style="color: red;"><br><br>
     <label>EnterPassword:</label><br><input type="password" name="password" placeholder="password"><br>
  <br><input type="submit" name="login" value="Login">
 
      </div>

    </form>

</body>
</html>