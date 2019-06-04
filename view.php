
<!DOCTYPE html>
<html>
<head>
	<title></title>


	<style type="text/css">
	  .main{
	  	background-color:rgba(50,150,100,0.2);
	  	width: 600px;padding: 20px}
       td,th{
       	background-color: rgba(255,255,255,0.5);}
       table{width: 600px;
       	margin-bottom: 20px;
       	background-color: rgba(0,0,0,0.4);
       	border: 3px solid green;
       	text-align: center;}
       h1{
       	margin: 0px;}
       table img{
       	width: 50px;
       	height: 50px;}
       #table{
         width:80%;
         background-color: yellow;
         margin-top: 30px;
       }p{
       		text-decoration: underline;
       		font-size: 16pt;
       		font-family: serif;
       }i{
       		color: #3333cc;
       }
   </style>
</head>
<body>

</body>
</html>

<?php
include 'connect.inc.php';
if (isset($_GET['del'])) {
  $delete=$_GET['del'];
if(mysql_query("DELETE FROM `lecturer_ratings` WHERE `id`='$delete' ")){
    echo "<script>alert('Deleted successfully.')
                      </script>";
    }
  }
if (isset($_GET['view'])) {
	$lecturer_id=$_GET['view'];
	$get=mysql_query("SELECT * FROM `lecturer_ratings` WHERE lecturer_id='$lecturer_id'");
  echo "<table border='0.5'>
<tr>


<th>comment</th>
<th>rating</th>

</tr>";
while ($row=mysql_fetch_array($get)) {
	
$lecturer_id=$row['lecturer_id'] ;

$comment=$row['comment'] ;
$rating=$row['rating'] ;


  echo "<tr>";
  
 
   echo "<td>$comment</td>";
    echo "<td>$rating</td>";
     echo "<td><a href='view.php?del=".$lecturer_id."' title='Delete this comment'>Delete</td>";
  
 
 
  echo "</tr>";



}echo "</table>";}

?>

