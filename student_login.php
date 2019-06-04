
<?php 
require 'core.inc.php';
require 'connect.inc.php';
if (isset($_POST['regno'])&&isset($_POST['password'])) {
  $regno=$_POST['regno'];
  $password=$_POST['password'];
  $password_md5=md5($password);
  if (!empty($regno)&&!empty($password)) { 
    $query="SELECT * FROM register2 WHERE regno='$regno' AND password='$password_md5'";
    $query_run=mysql_query($query);
   if (mysql_num_rows($query_run)==0) { echo "<script> alert('invalid uesername or password')</script>";
      # code...
    }  
            
         else if(mysql_num_rows($query_run)==1) {
        $user_id=mysql_result($query_run, 0, 'regno');
        $_SESSION['user_id']=$user_id;
         echo "<script>
       window.open('home.php')
      </script>";
      header('refresh:0;url=php/index.php');
      }
     
  }
  else{
    echo "<script> alert('all fields are required')</script>";
  }
}

 ?>








  <!DOCTYPE html>
  <html>
  <head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
    
  </head>
  <body>
    <form  action="student_login.php" method="POST">
     

     ENTER REGESTRATION NUMBER:<br><input type="text" name="regno" minlength="14"><br><br>
       ENTER PASSWORD:<br><input type="password" name="password" minlength="8"><br><br>
        <input type="submit" name="login" value="login" ><br><br>
        <a href="register.php" class="register" target="frame1">Register</a>
      </div>
    
</form>
  
  </body>
  </html>