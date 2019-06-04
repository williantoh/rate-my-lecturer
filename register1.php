<?php
require 'connect.inc.php';

if (isset($_POST['username'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['password_again'])) {
  $username=$_POST['username'];
  $password=$_POST['password'];
  $password_again=$_POST['password_again'];
  $email=$_POST['email'];
 
  if (!empty($username)
    &&!empty($password)
    &&!empty($password_again)
    &&!empty($email))
     { if ($password!=$password_again) { echo "<script>alert('PASSWORDS DO NOT MATCH .')
                      window.location.href='register.php'</script>";
     }else{
      $qr="SELECT username FROM lecturers WHERE username='$username'";
      $qr_run=mysql_query($qr);
      if (mysql_num_rows($qr_run)==1) {echo "<script>alert('REGISTRATION NUMBER ALREADY REGISTERED .')
                      window.location.href='register.php'</script>";;
        # code...
      }else{
        $query="INSERT INTO lecturers values (
        '".mysql_real_escape_string($username)."' ,
         '".mysql_real_escape_string($password)."',
         '".mysql_real_escape_string($email)."')";
         if (mysql_query($query)) {echo "<script>alert('REGISTERED SUCCESIFULLY .')
                     </script>";
          # code...
         }else{echo "<script>alert('couldnt be reqistered .')
                      </script>";
                  }
      }
     }
    
  }else{echo "<script>alert('ALL FIELDS ARE REQUIRED .')
                     </script>";
                  }
}

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <form action="register1.php" method="POST">
   u <input type="text" name="username"><br>
    e <input type="text" name="email"><br>
     p <input type="text" name="password"><br>
      pa <input type="text" name="password_again"><br>
       <input type="submit" value="submit">
    





  </form>

</body>
</html>