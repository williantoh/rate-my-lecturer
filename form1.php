
<?php 
require 'core.inc.php';
require 'connect.inc.php';
if(loggedin()){
 $user_id=getuserfield('id');
  
?>



<?php
require 'db.php';

if (isset($_GET['Rate'])) {
  $rate=$_GET['Rate'];
  $row=mysql_fetch_array(mysql_query("SELECT * FROM `lecturer` WHERE id='$rate'"));

}

if (isset($_POST['radio'])&&isset($_POST['radio1'])
  &&isset($_POST['radio2'])&&isset($_POST['radio3'])
  &&isset($_POST['radio4'])&&isset($_POST['radio5'])
  &&isset($_POST['radio6'])&&isset($_POST['radio7'])
  &&isset($_POST['radio8'])&&isset($_POST['radio9'])
  &&isset($_POST['radio10'])
  &&isset($_POST['comment'])) {
  $radio=$_POST['radio'];
  $radio1=$_POST['radio1'];
  $radio2=$_POST['radio2'];
  $radio3=$_POST['radio3'];
  $radio4=$_POST['radio4'];
  $radio5=$_POST['radio5'];
  $radio6=$_POST['radio6'];
  $radio7=$_POST['radio7'];
  $radio8=$_POST['radio8'];
  $radio9=$_POST['radio9'];
  $radio10=$_POST['radio10'];
   $comment=$_POST['comment'];
  
  $rate=$_POST['id'];
  $total=$radio+$radio1+$radio2+$radio3+$radio4+$radio5+$radio6+$radio7+$radio8+$radio9+$radio10;
  $average=$total/11;

if (!empty($radio)&&!empty($radio1)&&!empty($radio2)&&!empty($radio3)&&!empty($radio4)&&!empty($comment)) {
 
  $query1="INSERT INTO lecturer_ratings VALUES('','".mysql_real_escape_string($user_id)."','".mysql_real_escape_string($rate)."',
  '".mysql_real_escape_string($average)."','".mysql_real_escape_string($comment)."')";
 
  if (mysql_query($query1)) {
    $query = "SELECT count(lecturer_id) AS total FROM lecturer_ratings where lecturer_id='$rate' ";
$result=mysqli_query($conn,$query);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['total'];
$qr="SELECT sum(rating)AS sum FROM lecturer_ratings where lecturer_id='$rate' ";
$result2=mysqli_query($conn,$qr);
$values2=mysqli_fetch_assoc($result2);
$sum=$values2['sum'];
$newaverage=$sum/$num_rows;

   

     $query="UPDATE lecturer SET total=$total, average=$newaverage WHERE id=$rate";
     if (mysql_query($query)) {
   echo "<script>alert('Thank you your rates have been sent.')
                      window.location.href='home.php'</script>";
   
  }else{
    echo "couldnt save";
  }
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
  h1{color: green;
  }
    
/* Style the form */
#regForm {
  background-color: #ffffff;
 
  padding-top: 50px;
  padding-left: 550px;
  width: 70%;
 
}

/* Style the input fields */
input {
 
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}


input.invalid {
  background-color: #ffdddd;
}


.tab {
  display: none;
 
  width: 500px;
}


.step {
  height: 15px;
  width: 15px;
  background-color:grey;
  border: none; 
  border-radius: 50%;
  display: inline-block;
  opacity: 1;
}


.step.active {
  opacity: 50;
  color:red;
  position: fixed;
}


.step.finish {
  background-color: #4CAF50;
}#instructions{ 
  height: 100px;
  margin-left: 900px;
  margin-top: 40px;
  position: fixed;
}#willy{position: fixed;
    margin-top: 10px;
    width: 350px;
    margin-left: 30px;
}


#reviewss{position: fixed;
    margin-top: 260px;
    width: 230px;
    padding: 0px;
    margin-left: 30px;


}</style>
</head>
<body>
  <center><h1 style="position: fixed; margin-left: 35%;">RATE MY LECTURER</h1></center>
  <div id="willy">
    <h5>How to rate</h5>
    
    <img src="images/minds.jpeg"width="150px" height="100px">
    <strong><p> click on rate to start rating the lecturer by awarding some marks</p></strong>
</div>

<div id="reviewss"><h5>REVIEWS</h5>
   <strong><p>Reviews are the number of people that have rated a lecturer at a certain time.</p></strong> 
    <img src="images/3.jpeg" width="150px" height="100px">
    

</div>

  
  <script type="text/javascript">
    var currentTab =0;
showTab(currentTab); 

function showTab(n) {
  
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
 
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }

  fixStepIndicator(n)
}

function nextPrev(n) {
 
  var x = document.getElementsByClassName("tab");

  if (n == 1 && !validateForm()) return false;
 
  x[currentTab].style.display = "none";
 
  currentTab = currentTab + n;
  
  if (currentTab >= x.length) {
  
    document.getElementById("regForm").submit();
    return false;
  }

  showTab(currentTab);
}

function validateForm() {
  
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
 
  for (i = 0; i < y.length; i++) {
    
    if (y[i].value == "") {
 
      y[i].className += " invalid";
     
      valid = false;
    }
  }
  
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid;
}

function fixStepIndicator(n) {
 
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
 
  x[n].className += " active";
}
  </script>
 




<form id="regForm" action="form1.php" method="POST">
  <h1 style="margin-top: 10px;">Questions</h1>



<div class="tab">CLICK NEXT TO START ANSWERING THE QUESTIONS.
 
</div>
<div class="tab"><strong>
  Lecturer begun and ended lessons on time</strong><br>
 1/5<input type="radio" name="radio" value="1"  oninput="this.className = ''"><br>
  2/5<input type="radio" name="radio" value="2"  oninput="this.className = ''"><br>
  3/5<input type="radio" name="radio" value="3"  oninput="this.className = ''"><br>
  4/5<input type="radio" name="radio" value="4"  oninput="this.className = ''"><br>
  5/5<input type="radio" name="radio" value="5"  oninput="this.className = ''"><br>

</div>

<div class="tab"><strong>
 learning objectives of the course was communicated clearly</strong><br>
 1/5<input type="radio" name="radio1" value="1"  oninput="this.className = ''"><br>
  2/5<input type="radio" name="radio1" value="2"  oninput="this.className = ''"><br>
  3/5<input type="radio" name="radio1" value="3"  oninput="this.className = ''"><br>
  4/5<input type="radio" name="radio1" value="4"  oninput="this.className = ''"><br>
  5/5<input type="radio" name="radio1" value="5"  oninput="this.className = ''"><br>
</div>

<div class="tab"><strong>lecturer demonstrated throrough knowldge of the course:</strong><br>
 1/5<input type="radio" name="radio2" value="1"  oninput="this.className = ''"><br>
  2/5<input type="radio" name="radio2" value="2"  oninput="this.className = ''"><br>
  3/5<input type="radio" name="radio2" value="3"  oninput="this.className = ''"><br>
  4/5<input type="radio" name="radio2" value="4"  oninput="this.className = ''"><br>
  5/5<input type="radio" name="radio2" value="5"  oninput="this.className = ''"><br></div>
  <div class="tab"><strong>The lecturer returned CATS/ASSIGNMENT scripts on time</strong><br>
 1/5<input type="radio" name="radio4" value="1"  oninput="this.className = ''"><br>
  2/5<input type="radio" name="radio4" value="2"  oninput="this.className = ''"><br>
  3/5<input type="radio" name="radio4" value="3"  oninput="this.className = ''"><br>
  4/5<input type="radio" name="radio4" value="4"  oninput="this.className = ''"><br>
  5/5<input type="radio" name="radio4" value="5"  oninput="this.className = ''"><br>
</div><br>

<div class="tab"><strong>lecturer showed respect to students opinions and suggestions:</strong><br>
 1/5<input type="radio" name="radio3" value="1"  oninput="this.className = ''"><br>
  2/5<input type="radio" name="radio3" value="2"  oninput="this.className = ''"><br>
  3/5<input type="radio" name="radio3" value="3"  oninput="this.className = ''"><br>
  4/5<input type="radio" name="radio3" value="4"  oninput="this.className = ''"><br>
  5/5<input type="radio" name="radio3" value="5"  oninput="this.className = ''"><br>
</div><br>
<div class="tab"><strong>lecturer was available for consultation outside class:</strong><br>
 1/5<input type="radio" name="radio5" value="1"  oninput="this.className = ''"><br>
  2/5<input type="radio" name="radio5" value="2"  oninput="this.className = ''"><br>
  3/5<input type="radio" name="radio5" value="3"  oninput="this.className = ''"><br>
  4/5<input type="radio" name="radio5" value="4"  oninput="this.className = ''"><br>
  5/5<input type="radio" name="radio5" value="5"  oninput="this.className = ''"><br>
</div><br>
<div class="tab"><strong>lecturer used training aids equipments(LCD/LAPTOP/PROJECTOR,) </strong><br>
 1/5<input type="radio" name="radio6" value="1"  oninput="this.className = ''"><br>
  2/5<input type="radio" name="radio6" value="2"  oninput="this.className = ''"><br>
  3/5<input type="radio" name="radio6" value="3"  oninput="this.className = ''"><br>
  4/5<input type="radio" name="radio6" value="4"  oninput="this.className = ''"><br>
  5/5<input type="radio" name="radio6" value="5"  oninput="this.className = ''"><br>
</div><br>
<div class="tab"><strong>Course objectives were clear:</strong><br>
 1/5<input type="radio" name="radio7" value="1"  oninput="this.className = ''"><br>
  2/5<input type="radio" name="radio7" value="2"  oninput="this.className = ''"><br>
  3/5<input type="radio" name="radio7" value="3"  oninput="this.className = ''"><br>
  4/5<input type="radio" name="radio7" value="4"  oninput="this.className = ''"><br>
  5/5<input type="radio" name="radio7" value="5"  oninput="this.className = ''"><br>
</div><br>
<div class="tab"><strong>Value and amount of practical work supported the course objectives:</strong><br>
 1/5<input type="radio" name="radio8" value="1"  oninput="this.className = ''"><br>
  2/5<input type="radio" name="radio8" value="2"  oninput="this.className = ''"><br>
  3/5<input type="radio" name="radio8" value="3"  oninput="this.className = ''"><br>
  4/5<input type="radio" name="radio8" value="4"  oninput="this.className = ''"><br>
  5/5<input type="radio" name="radio8" value="5"  oninput="this.className = ''"><br>
</div><br>
<div class="tab"><strong>the course was supported by interesting new ideas:</strong><br>
 1/5<input type="radio" name="radio9" value="1"  oninput="this.className = ''"><br>
  2/5<input type="radio" name="radio9" value="2"  oninput="this.className = ''"><br>
  3/5<input type="radio" name="radio9" value="3"  oninput="this.className = ''"><br>
  4/5<input type="radio" name="radio9" value="4"  oninput="this.className = ''"><br>
  5/5<input type="radio" name="radio9" value="5"  oninput="this.className = ''"><br>
</div><br>
<div class="tab"><strong>the amount of class work and reading you were asked to do was adequate:</strong><br>
 1/5<input type="radio" name="radio10" value="1"  oninput="this.className = ''"><br>
  2/5<input type="radio" name="radio10" value="2"  oninput="this.className = ''"><br>
  3/5<input type="radio" name="radio10" value="3"  oninput="this.className = ''"><br>
  4/5<input type="radio" name="radio10" value="4"  oninput="this.className = ''"><br>
  5/5<input type="radio" name="radio10" value="5"  oninput="this.className = ''"><br>
</div><br>
<div class="tab"><legend><strong>leave a comment</strong></legend>
  <textarea name="comment"   style="height: 20%; width: 50%">
    
  </textarea>
</div>



<!-- Circles which indicates the steps of the form: -->
<div style="margin-top:40px;">
  <span class="step"></span>
   <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
   <span class="step"></span>
   <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
</div><br><br>
<div style="overflow:auto;">
  <div style="">
    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
  </div>
</div>
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

</form>
 
</body>
</html>
<?php
}else if (!loggedin()) {
 header('Location:index.php');
}


?>
