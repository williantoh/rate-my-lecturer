
<html>
<head>
 <meta charset="utf-8">

 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {
 var data = google.visualization.arrayToDataTable([
 
 ['class Name','total ratings'],
 <?php
    require 'connect.inc.php';

    $result = mysql_query("SELECT * FROM lecturer");
    while($row = mysql_fetch_array($result))
  {
  
    

       echo "['".$row['name']."',".$row['total']."],";

      
       }
       ?> 
 
 ]);
 
 var options = {
 title: 'lecturers and their ratings',
  pieHole: 0.5,
          pieSliceTextStyle: {
            color: 'black',
          },
          legend: 'none'
 };
 var chart = new google.visualization.ColumnChart(document.getElementById("columnchart12"));
 chart.draw(data,options);
 }
  
    </script>
 
</head>
<body>
 <div class="container-fluid">
 <div id="columnchart12" style="width: 100%; height: 500px;"></div>
 </div>
 
</body>
</html>