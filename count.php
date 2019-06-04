<?php 

require 'db.php';
$query = "SELECT count(lecturer_id) AS total FROM lecturer_ratings where lecturer_id=1 ";
$result=mysqli_query($conn,$query);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['total'];
echo $num_rows;
   

 ?>