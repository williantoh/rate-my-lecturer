

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title><style type="text/css">
  body{
      background-color: #f5f5f0;

  }
	  .main{
      background-color:rgba(50,150,100,0.2);
      width: 600px;
      padding: 20px;
    }h1{
          color: #33cc00;
        }
       table img{
        width: 50px;height: 50px;}
       #table{
         width:80%;
         background-color: yellow;
         margin-top: 30px;
       }
       .chart{
         width: 100%;
         background-color: blue;
       }
       .display_job iframe{
            height: 450px;
            width: 900px;
            margin-right: 40px;
            float: right;
            border-radius: 2px;
            border:1px solid #ffffff;
            background-color:  #ffffff;
       }.job_list{
          float: left;
          min-height: 450px;
          width: 391px;
          background-color:  #ebebe0;
       }.job_list table{
        width: 390px;
        margin-bottom: 20px;
        background-color:
        rgba(0,0,0,0.4);
        border-collapse: collapse;
        text-align: center;
      }.job_list td{
          text-align: left;
          padding: 8px;
          font-family: serif;
          font-size: 12pt;
          
        }.job_list th{
          color: #ffffff;
          font-size: 14pt;
           text-align: left;
          padding: 8px;
        background-color: #33cc00;
       
        }
        .job_list tr{

           background-color: #e6e6e6;
           border-bottom: 0.1px solid #ffffff;
        }.job_list tr a{text-decoration: none;}
        .job_list tr:hover{background: #b3b3b3;cursor: pointer;}
        .job_list tr a:hover{color: #ff0000;cursor: pointer;}
        .blink{
          color: red;
          animation: blinker 0.5s linear infinite;
        }@keyframes blinker{
          50%{opacity: 0;
          }
        }
      


</style>
      
  

</head>
<body>
	<center><h1>Rate my lecturer</h1></center>
<a href="logout1.php"style="margin-left: 1250px;">LogOut!</a><br>
 
            <a href="addstudent.php" target="if1" style="margin-left: 100px;">add STUDENT</a>
            <a href="addlec.php" target="if1"style="margin-left: 190px;"> add LECTURER</a>
<div class="job_list">
  <center><h3 class="blink">NEW RATINGS</h3></center>
	<?php
    require 'connect.inc.php';
if (isset($_GET['del'])) {
  $delete=$_GET['del'];
if(mysql_query("DELETE FROM `lecturer` WHERE `id`='$delete'")){
    echo "<script>alert('Deleted successfully.')
                      window.location.href='admin_home.php'</script>";
    }
  }
    $result = mysql_query("SELECT * FROM lecturer");

echo "<table border='0.5'>
<tr>
<th>lecturer name</th>
<th>lecturer id</th>
<th>View</th>
<th>Delete</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
    $id=$row['id'];
    $name=$row['name'];
  echo "<tr>";
  echo "<td>$name</td>";
  echo "<td>$id</td>";
   echo "<td><a href='view.php?view=".$id."' target='if1' title='Click to view'>View</td>";
   echo "<td><a href='admin_home.php?del=".$id."' title='Delete '>Delete</td>";
  
  echo "</tr>";
  }
echo "</table>";



    ?>




</div>
<div class="display_job">
   <iframe name="if1"></iframe">
</div>
</body>
</html>

