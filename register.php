<?php
require 'connect.inc.php';

if (isset($_POST['regno'])&&isset($_POST['password'])&&isset($_POST['cpassword'])&&isset($_POST['email'])&&isset($_POST['school'])) {
	$regno=$_POST['regno'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	$email=$_POST['email'];
	$school=$_POST['school'];
	$password_md5=md5($password);
	if (!empty($regno)
		&&!empty($password)
		&&!empty($cpassword)
		&&!empty($email)
		&&!empty($school))
		 { if ($password!=$cpassword) { echo "<script>alert('PASSWORDS DO NOT MATCH .')
                      window.location.href='register.php'</script>";
		 }else{
		 	$qr=mysql_query("SELECT regno FROM register2 WHERE regno='$regno'");
   
$query1=mysql_query("SELECT `regno` FROM `schooldb` WHERE `regno`='$regno'");
	if (mysql_num_rows($qr)==1||mysql_num_rows($query1)==0) {
		echo "<script>
            alert('The registration $regno has already been registered or does not exits')
            window.location.href='register.php'
        </script>";
	}

else{
		 		$query="INSERT INTO register2 values ('',
		 		'".mysql_real_escape_string($regno)."' ,
		 		 '".mysql_real_escape_string($password_md5)."',
		 		 '".mysql_real_escape_string($school)."',
		 		 '".mysql_real_escape_string($email)."')";
		 		 if (mysql_query($query)) {echo "<script>alert('REGISTERED SUCCESIFULLY .')
                      window.location.href='student_login.php'</script>";
		 		 	# code...
		 		 }else{echo "<script>alert('couldnt be reqistered .')
                      window.location.href='register.php'</script>";
                  }
		 	}
		 }
		
	}else{echo "<script>alert('ALL FIELDS ARE REQUIRED .')
                      window.location.href='register.php'</script>";
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
  <script type="text/javascript">
	function lettersOnly(input){
		var regex= /[^a-z]/gi;
		input.value=input.value.replace(regex, "");
	}
	function numbersOnly(input){
		var regex= /[^0-9]/gi;
		input.value=input.value.replace(regex, "");
	}
</script>
  	<form action="register.php" method="POST">
  ENTER	REGESTRATION NUMBER:<br><input type="text" name="regno" minlength="14"><br>
  	
  ENTER	EMAIL:<br><input type="email" name="email"><br>
  	<label>CHOOSE YOUR SCHOOL:<br> </label><select name="school">
			<option selected="selected"></option>
				<?php
				include 'connect.inc.php';
				$query=mysql_query("SELECT * FROM `school`");
				while ($school=mysql_fetch_array($query)){
					?>
				<option value="<?php echo $school['school']; ?>">
				<?php echo $school['school'] ?></option>
				<?php }?>
	</select><br>
  	</select>
  ENTER	PASSWORD:<br><input type="password" name="password" id="myinput" minlength="8"><br>
  	CONFIRM PASSWORD:<br><input type="password" name="cpassword" id="myinput" minlength="8"><br>
  	<input type="checkbox" onclick="myFunction()">Show Password<br>
  	<input type="submit" value="submit" >
  </form>
  <script type="text/javascript">
  	function myFunction() {
  var x = document.getElementById("myinput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
  </script>
  </body>
  </html>