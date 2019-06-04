<?php
ob_start();
session_start();

$current_file=$_SERVER['SCRIPT_NAME'];
if(isset($_SERVER['HTTP_REFERER'])&&!empty($_SERVER['HTTP_REFERER'])){
            $http_referer = $_SERVER['HTTP_REFERER'];
}

function loggedin(){
if(isset($_SESSION['username'])&&!empty($_SESSION['username'])){
         return true;
         }
        else{
               return false;
             }
      }
function getuserfield($field){
        $query ="SELECT `$field` FROM `admin` WHERE `regno`='".$_SESSION['username']."'";
        if ($query_run = mysql_query($query)){
          if ($query_result=mysql_result($query_run, 0, $field)){
             return $query_result;
          }

        }
}
?>