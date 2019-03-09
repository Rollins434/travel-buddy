<?php
include("db.php");
if($_SERVER['REQUEST_METHOD']=="POST")
{
$errors = [];
$name = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$re_password = $_POST['re_password'];
$con = mysqli_connect("localhost","root","","registration");
$result = mysqli_query($con,"select * from users where name = '$name'");
if(!empty($result))
{   
    $errors[] = "User Already Exists";
}

if(strlen($name)<3)
{
$errors[] = "Your name cannot be less than 3 characters";
}
if($password!=$re_password)
{
    $errors[] = "Passwords do not match";
}
if(empty($errors))
{
    $query = "insert into users (name,email,password) values ('$name','$email','$password')";
    $res = mysqli_query($con,$query);
}
}
mysqli_close($con);
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
                                if(!empty($errors))
                                {
                                    foreach($errors as $error)
                                    {
                                        echo '<div class="alert alert-danger">'.$error.'</div>';
                                    }
                                }
                                else
                                {
                                    echo '<div class="alert alert-warning">User Succesfully Registered.</div>';
                                }     
                            }
                            
                        ?>
                        <div class="form-group">
                            <input type="text" class="form-input" name="username" id="name" placeholder="Your Name" required/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Your Email" required/>
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
                    <p class="loginhere">
                        Register as a Hotel <a href="hotel_signin.php" class="loginhere-link">Login here</a>
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