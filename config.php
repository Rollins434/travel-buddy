<?php
$con = mysqli_connect("localhost","root","","registration");

function escape($string)
{
    global $con;
    return mysqli_real_escape_string($con,$string);
}
function redirect($location)
{
    header("location:{$location}");
}
function count_rows($result)
{
    return mysqli_num_rows()
}

function query($query)
{
    global $con;
    mysqli_query($con,$query);
}

function fetch_array($result)
{
    global $con;
    return mysqli_fetch_array($con,$result)
}
?>
