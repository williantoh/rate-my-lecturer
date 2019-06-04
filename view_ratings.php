<html>
<head>

<style type="text/css">
	table{
		background-color: #d9d9d9;
		border-collapse: collapse;
		width: 100%;
		border-radius: 3px;
    
	}
	th, td {
		padding: 7px;
		text-align: left;
		border: 1px solid #99c2ff;
    width: 10px;
	}
	tr:hover{background-color: #ccf2ff;}
  

</style><a href="home.php"><h3>Home</h3></a>
	
</head>
<body>

<div align="center">
<table>
	<tr><th>photo</th>
		<th>name</th>
		
		<th>school</th>
		<th>average rating</th>
		<th>total ratings</th>
		
	</tr>
<?php
    require 'connect.inc.php';

    $result = mysql_query("SELECT * FROM lecturer");



while($row = mysql_fetch_array($result))
  {
    $name=$row['name'];
    $school=$row['school'];
   
    $average=$row['average'];
     $total=$row['total'];
    $photo=$row['photo'];
  echo "<tr>";
  echo "<td>$name</td>";
  echo "<td>";?><img src='<?php echo $row['photo'];?>' style="width: 100px;"><?php echo "</td>";
  echo "<td>$school</td>";
  
  echo "<td> $average</td>";
   echo "<td>$total</td>";

  
  
  echo "</tr>";
  }
echo "</table>";



    ?>
</table></div>
</body>
</html>