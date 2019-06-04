<!DOCTYPE html>
<html>
<head>
	<title>the best lecturer rating site</title>
	<style type="text/css">
		h1{
			color: green;

		}
		
		
		body{
			background-repeat: no-repeat;
		}



.nav{color: red;
	background-color: green;
	width: 100%;
	height: 30px;
	padding-top: 10px;
} .nav a{
	text-decoration: none;
	border-color: red;
	color: white;
	padding-top: 10px;
	padding-left: 20px;
	padding-right: 20px;
	padding-bottom: 13px;
}.div_login{
	 margin-right: 10px;
	 float: right;
	 cursor: pointer;
	position: relative;
	display: inline-block;
}.menu{
	position: absolute;
	background-color:red;
	border-color: red;
	display: none;
	margin-top: 10px;
	right: 0;
	width: 114px;
}.menu a{
	color: white;
	text-decoration: none;
	display: block;

}.menu a:hover{ background-color: blue;
 }
.div_login:hover .menu{display: block;
	
}.div_login:hover .login_as{
	background-color: yellow;
}

.login_as{
	padding-left:50px;
}



.center-div iframe{
	margin-top: 30px;
	position: fixed;
	margin-left:400px; 
	/*border-radius: 5px*/;
	width: 700px;
	height: 900px;
	/*background: #b8b894;*/
	/*border-radius: 5px;*/
	border:none;
}


#disclaimer{
	position: fixed;
	margin-top: 240px;
	margin-left: 900px;
	width: 300px;
	padding-top: 0px;

}
#how{
	position: fixed;
	margin-top:0px;
	padding-bottom: 0px;
	margin-left: 900px;
	width: 250px;
	padding-top: 0px;

}
h5{
	padding-top: 0px;
	font-weight: bolder;
	font-size: 15px;
}



#willy{position: fixed;
	margin-top: 10px;
	width: 250px;
	margin-left: 30px;
}


#reviews{position: fixed;
	margin-top: 260px;
	width: 230px;
	padding: 0px;
	margin-left: 30px;


}



</style>
</head>
<body>
	<center><h1><strong>Welcome to Rate my lecturer</strong></h1></center>

<div class="nav">
	<a href="">HOME</a>
	
	<div class="div_login">
	<a class="login_as" >LOGIN AS</a>
	<div class="menu">
		<a href="admin.php" target="frame1">ADMIN</a>
		<a href="student_login.php" target="frame1">STUDENT</a>
		<a href="lecturer.php" target="frame1">LECTURER</a>
	</div>
</div>

</div>
<div class="center-div">
	<iframe src="php/index.php" name="frame1"></iframe>
</div>
<div id="disclaimer">
	<strong><h5>DISCLAIMER</h5></strong>
	<img src="images/stars.jpg" width="150px" height="100px">
	<strong><p>This site only rates lecturers according to how sattisfied students feel at the end of every lecture</p></strong>

</div>
<div id="how"><strong><h5>how?</h5></strong>
	<img src="images/teacher.jpeg" width="150px" height="100px">
	<strong><p>its easy.....just login and select a lecturer you would like to rate then answer a few questions. </p></strong>
	

</div>
<div id="willy">
	<h5>welcome</h5><hr>
	
	<img src="images/minds.jpeg"width="150px" height="100px">
	<strong><p> welcome to the site,create an account and together lets rate our lectures</p></strong>
</div>

<div id="reviews"><h5>REVIEWS</h5>
	<p>Reviews are the number of people that have rated a lecturer at a certain time.</p>
	<img src="images/3.jpeg" width="150px" height="100px">
	

</div>


      
</body>
</html>