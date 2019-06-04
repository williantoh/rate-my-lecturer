<!DOCTYPE html>
<html>
<head>
      <title></title>
      <style type="text/css">
           
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

      </style>
</head>
<body>
      <div class="nav">
      <a href="">HOME</a>
      <a href="view_ratings.php">VIEW RATINGS</a>
      <a href="">CONTACT</a>
      <div class="div_login">
      <a class="login_as" >ADD</a>
      <div class="menu">
           
            <a href="addstudent.php" target="frame2">STUDENT</a>
            <a href="addlec.php" target="frame2">LECTURER</a>
      </div>
</div>
<div class="center-div">
      <iframe  name="frame2"></iframe>
</div>

</body>
</html>