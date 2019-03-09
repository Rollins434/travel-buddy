<?php
$host="localhost";
$username="root";
$password="";
$databasename="registration";

$connect=mysqli_connect($host,$username,$password,$databasename);

if(isset($_POST['user_comm']) && isset($_POST['user_name']))
{
  $comment=$_POST['user_comm'];
  $name=$_POST['user_name'];
  $insert=mysqli_query("insert into comments (name,comment,post_time) values('$name','$comment',CURRENT_TIMESTAMP)");
}

?>