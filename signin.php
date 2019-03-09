<?php
if( isset($_POST['submit'])) {
		$conn=mysqli_connect("localhost","root","","registration"); 
		$con = mysqli_connect("localhost","root","","register_hotel");
		
		$user=$_POST['uname'];
		$pass=$_POST['password'];
		$errors = array();
		$ret=mysqli_query( $conn, "SELECT * FROM users WHERE email='$user' AND password='$pass' ") or die("Could not execute query: " .mysqli_error($conn));
		$row = mysqli_fetch_assoc($ret);
		$result = mysqli_query($con,"SELECT * from hotel where email='$user'");
		$hotel_row = mysqli_fetch_assoc($result);
		if(!$row) {
			
			$errors[] ="Invalid Username/Password";
			
		}
		else if($row['role']=='admin'){
	        session_start();
	        $_SESSION['user']=$row['name'];
			header('location:admin/dashboard.php');
		}
		else if($row['role']=='hotel'){
	        session_start();
			$id = $hotel_row['id'];
			$_SESSION['user']=$row['name'];
			header("location:admin/hotel.php?id=$id");
		}
		else{
			session_start();
			
			$_SESSION['user']=$row['name'];
			header('location:bookings.php');

		}
}
?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>Sign In</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta tag Keywords -->
	<!-- css files -->
	<link rel="stylesheet" href="2-css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="2-css/fontawesome-all.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Reem+Kufi&amp;subset=arabic" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
		rel="stylesheet">
	<!-- //web-fonts -->
</head>

<body>
	<!-- title -->
	<h1>

		<span>S</span>ign
		<span>I</span>n</h1>
	<!-- //title -->
	<!-- content -->
	<div class="sub-main-w3">
		<form action="" method="post">
		<?php
		if(!empty($errors))
		{
		echo '
		<div class="form-style-agile">
				<div class="alert alert-info">
				';
				global $errors;
				echo $errors[0].'</div>
							</div>'; 
		}	?>
			<div class="form-style-agile">
				<label>
					Username
					<i class="fas fa-user"></i>
				</label>
				<input placeholder="Username" name="uname" type="text">
			</div>
			<div class="form-style-agile">
				<label>
					Password
					<i class="fas fa-unlock-alt"></i>
				</label>
				<input placeholder="Password" name="password" type="password">
			</div>
			<!-- checkbox -->
			<div class="wthree-text">
				<ul>
					<li>
						<!-- switch -->
						<div class="checkout-w3l">
							<div class="demo5">
								<div class="switch demo3">
									<input type="checkbox">
									<label>
										<i></i>
									</label>
								</div>
							</div>
							<a href="#">Stay Signed In</a>
						</div>
						<!-- //checkout -->
					</li>
					<li>
						<a href="#">Forgot Password?</a>
					</li>
				</ul>
			</div>
			<!-- //switch -->
			<input type="submit" name = "submit" value="Log In">
			<a href="signup.php" style="color:white">Not a Member ? Register Here.</a>

		</form>
	</div>
	<!-- //content -->

	<!-- copyright -->
	<div class="footer">
		<p>&copy; 2018. All rights reserved
		</p>
	</div>
	<!-- //copyright -->

</body>

</html>