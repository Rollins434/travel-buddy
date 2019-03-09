<?php
// if(isset($_POST['submit']))
// {
    $con = mysqli_connect("localhost","root","","travel");
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $date = $_POST['date'];
    $dates = explode('/',$date);
    $date = $dates[2].'-'.$dates[0].'-'.$dates[1];
    $travelers = $_POST['travelers'];
    $destination = $_POST['treatment'];
    $note = $_POST['note'];
    $email = $_POST['email'];
    $query = "INSERT INTO journey(firstname,lastname,date,persons,destination,notes,email) values ('$fname','$lname','$date','$travelers','$destination','$note','$email')";
    mysqli_query($con,$query);
   
    echo $query;

    header('location:payment.html',_parent);
    echo $date;
    mysqli_close($con);

// }
?>