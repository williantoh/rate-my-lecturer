<?php
require 'connect.inc.php';
if (isset($_GET['Rate'])) {
	$rate=$_GET['Rate'];
	$row=mysql_fetch_array(mysql_query("SELECT * FROM `lecturer` WHERE id='$rate'"));

}

if (isset($_POST['radio'])&&isset($_POST['radio1'])&&isset($_POST['radio2'])&&isset($_POST['radio3'])&&isset($_POST['radio4'])) {
	$radio=$_POST['radio'];
	$radio1=$_POST['radio1'];
	$radio2=$_POST['radio2'];
	$radio3=$_POST['radio3'];
	$radio4=$_POST['radio4'];
	$rate=$_POST['id'];
	$total=$radio+$radio1+$radio2+$radio3+$radio4;
	$average=$total/5;

if (!empty($radio)&&!empty($radio1)&&!empty($radio2)&&!empty($radio3)&&!empty($radio4)) {
	$row=mysql_fetch_array(mysql_query(" SELECT id FROM `lecturer` WHERE id='$rate'"));
	$query="UPDATE lecturer SET total='$total',average='$average' WHERE id='$rate'";

	if (mysql_query($query)) {
		echo "success";
	}else{
		echo "couldnt save";
	}
	
}else{
	echo "fields required";
}

	
}



?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#lectures{margin-top: 10px;
			position: fixed;
			width: 250px;
			
		}#dressing{margin-left: 750px;
			position: fixed;
			width: 250px;

			
		}#practical{margin-left: 400px;
			margin-top: 10px;
			position: fixed;
			width: 250px;
			
		}#teaching{margin-top: 150px;
			position: fixed;
			width: 250px;

			
		}#assesment{margin-top: 150px;
			position: fixed;
			margin-left: 300px;
			width: 250px;
		}
		
		
	</style>
</head>
<body>
	<form action="rate.php" method="POST">
		<div id="all">
		<div id="lectures">
		<label>How many lectures have you had in a month.</label><br>
	<input type="radio" name="radio" value="1"><br>
	<input type="radio" name="radio" value="2"><br>
	<input type="radio" name="radio" value="3"><br>
	<input type="radio" name="radio" value="4"><br>
	<input type="radio" name="radio" value="5"><br>
	</div>
	
<div id="dressing">
<label>Rate my mode of dressing on a scale of 1-5.</label><br>
	<input type="radio" name="radio1" value="1"><br>
	<input type="radio" name="radio1" value="2"><br>
	<input type="radio" name="radio1" value="3"><br>
	<input type="radio" name="radio1" value="4"><br>
	<input type="radio" name="radio1" value="5"><br>
	</div>
	<div>
<div id="practical">
	<label>How many practical lessons have you had if any.</label><br>
	<input type="radio" name="radio2" value="1"><br>
	<input type="radio" name="radio2" value="2"><br>
	<input type="radio" name="radio2" value="3"><br>
	<input type="radio" name="radio2" value="4"><br>
	<input type="radio" name="radio2" value="5"><br>
	
</div>
<div id="teaching">
	<label>Rate my mode of teaching in terms of content delivery</label><br>
	<input type="radio" name="radio3" value="1"><br>
	<input type="radio" name="radio3" value="2"><br>
	<input type="radio" name="radio3" value="3"><br>
	<input type="radio" name="radio3" value="4"><br>
	<input type="radio" name="radio3" value="5"><br>
	</div>
	<div id="assesment">
	<label>rate my mode of aasesment i.e cats and assignment in terms of content</label><br>
	<input type="radio" name="radio4" value="1"><br>
	<input type="radio" name="radio4" value="2"><br>
	<input type="radio" name="radio4" value="3"><br>
	<input type="radio" name="radio4" value="4"><br>
	<input type="radio" name="radio4" value="5"><br><br>
	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
	<input type="submit" name="submit">
	</div></div>

	
</form>
</body>
</html>