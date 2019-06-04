<?php 
require'connect.inc.php';
if (isset($_POST['name'])&&isset($_POST['idnumber'])&&isset($_POST['school'])) {
	$name=$_POST['name'];
	$idnumber=$_POST['idnumber'];
	$school=$_POST['school'];
if (!empty($name)&&!empty($idnumber)&&!empty($school)) {
	$photo=$_FILES['photo']['name'];
  $temp_name=$_FILES['photo']['tmp_name'];
  if (isset($photo)) {
    if (!empty($photo)) {
      move_uploaded_file($temp_name, "uploads/".$photo);
    }
  }
	

		$query="SELECT idnumber FROM lecturer WHERE idnumber='$idnumber'";
		$query_run=mysql_query($query);
		if (mysql_num_rows($query_run)==1) {echo "already registerd";
			# code...
		}else{
			$query1="INSERT INTO lecturer values('','".mysql_real_escape_string($name)."','".mysql_real_escape_string($school)."','".mysql_real_escape_string($idnumber)."','Rate','','','"."uploads/".$photo."')";
			if (mysql_query($query1)) {echo "<script>alert('added succesifully')</script>";
				# code...
			}else{
				echo "sorry";
			}
		}
	}
	else{
		echo "all fields are required";
	}

}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	
	<script type='text/javascript'>
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>
<link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">
	#output_image
{
		background: #f2f2f2;
		float: left;
		width:100px;
	 	height: 100px;
	 	margin-top: -93px;
	 	text-align: center;
	 	border-top-right-radius: 5px;
	 	border-bottom-right-radius: 5px;
 
}.photo{
		margin-left: 30px;
		margin-right: 70px;
		margin-top: 15px;
		height: 100px;
	
}
</style>
	
</head>
<body>
	<form action="addlec.php" method="POST" enctype="multipart/form-data"><br>
	NAME:<br><input type="text" name="name"><br>
	ID NUMBER:<br><input type="text" name="idnumber"><br>
	SCHOOL:<br>
		
		<select name="school">
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
			<div class="photo"><br><br><br><br>
 <input type="file" name="photo" accept="image/*" onchange="preview_image(event)" required="required">
 <img id="output_image"/><br><br>

 

	<input type="submit" vale="submit">
	</form>

</body>
</html>