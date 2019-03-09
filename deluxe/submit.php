<?php
$con = mysqli_connect("localhost","root","","hotels");
$checkin_date = $_POST['checkin_date'];
$date = explode('/',$checkin_date);
$date1 = 
$checkout_date = $_POST['checkout_date'];
$customer = $_POST['customer'];
$rooms = $_POST['room'];
$sql = "insert into booking(check_in,check_out,room,customer) values('$checkin_date','$checkout_date','$rooms','$customer')";
$res = mysqli_query($con, $sql);
mysqli_close($con);
?>