<?php
require 'connect.inc.php';

if (isset($_POST['regno'])) {
	$regno=$_POST['regno'];
	if (!empty($regno)) {
		$quer="SELECT regno FROM schooldb Where regno='$regno' ";
		$quer_run=mysql_query($quer);
		if (mysql_num_rows($quer_run)==1) { echo "<script>alert('THE REGISTRATION NUMBER AlREADY EXISTS')</script>";
			
		}else{$query="INSERT into schooldb values('', '".mysql_real_escape_string($regno)."')";
if (mysql_query($query)) { echo "<script>alert(' REGISTRATION succesfuly done')</script>";
	
 
	 }else {echo "<script>alert(' couldnt be saved')</script>";
	}
	}
		
	}
	


else{ 
	echo "ALL fields Are Required";
  }	}




  ?>









<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="addstudent.php" method="POST">
	REG NUMBER:<input type="text" name="regno"><br><br>
	<input type="submit" value="submit">
	<a href=" " target="index.php"></a>
	</form>

</body>
</html>