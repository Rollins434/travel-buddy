<?php
if(isset($_POST['submit'])){
$hotelname = $_POST['hotelname'];
$email = $_POST['email'];
$location = $_POST['location'];
$city = $_POST['city'];
$password = $_POST['password'];
$re_password = $_POST['re_password'];

$con = mysqli_connect("localhost","root","","register_hotel");
function escape($string)
{
    global $con;
    return mysqli_real_escape_string($con,$string);
}
escape($hotelname);
escape($email);
escape($password);
escape($re_password);


$query1 = "insert into hotel(hotelname, email, location,city, password) values('$hotelname','$email','$location','$city','$password')";
mysqli_query($con,$query1);
mysqli_close($con);
$con = mysqli_connect("localhost","root","","registration");
$query2 = "insert into users (name,email,password,role) values('$hotelname','$email','$password','hotel')";
mysqli_query($con,$query2);
mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="1-fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css">
    <!-- Main css -->
    <link rel="stylesheet" href="1-css/style.css">
</head>
<body>
   
    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form action="" method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Create account</h2>
                        
                            <?php
                                if(isset($_POST['submit']))
                                {
                                global $query1;
                                global $query2;
                                if($query1 && $query2)
                                {
                                    echo "<div class='alert alert-warning'>Hotel Registeration Successful</div>";
                                }
                                else
                                die("Error occured");
                            }
                            ?>
                        
                        <div class="form-group">
                            <input type="text" class="form-input" name="hotelname" id="name" placeholder="Hotel Name" required/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Hotel Email" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="location" id="email" placeholder="Location" required/>
                        </div>
                        <div id="googleMap" style="width:100%;height:400px;"></div>

                         <script>
                            function myMap() {
                                var mapProp= {
                                                center:new google.maps.LatLng(51.508742,-0.120850),
                                                zoom:5,
                                            };
                                var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
                                            }   
                                </script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB10ULeiVPER2WWjKh6emdr78tMs33xRSo&callback=myMap"></script>
                        <br>
                        <div class="form-group">
                            <select class="form-input" name="city" id="city" required />
                            <option value="Delhi">Delhi</option>
                            <option value="Darjeeling">Darjeeling</option>
                            <option value="J&K">Jammu & Kashmir</option>
                            <option value="Gujrat">Gujrat</option>
                            <option value="Bombay">Bombay</option>
                            <option value="Jaipur">Jaipur</option>
                            
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="password" id="password" placeholder="Password" required/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Repeat your password" required/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="signin.html" class="loginhere-link">Login here</a>
                    </p>
                    </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="1-vendor/jquery/jquery.min.js"></script>
    <script src="1-js/main.js"></script>
</body>
</html>