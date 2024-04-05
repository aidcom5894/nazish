<?php 

include('config.php');

?>


<!doctype html>
<html lang="en">
<head>
<title>Login Here</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="modules/uitemplate/css/style.css">
</head>

<body class="img js-fullheight" style="background-image: url(modules/uitemplate/images/bg.jpg);">
<section class="ftco-section">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-6 text-center mb-5">
<h2 class="heading-section">Login Here</h2>
</div>
</div>
<div class="row justify-content-center">
<div class="col-md-6 col-lg-4">
<div class="login-wrap p-0">
<h3 class="mb-4 text-center">Have an account?</h3>
<form action="#" class="signin-form" method="POST">
<div class="form-group">
<input type="text" class="form-control" placeholder="Username" name="email" required>
</div>
<div class="form-group">
<input id="password-field" type="password" class="form-control" placeholder="Password" required name="password">
<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
</div>
<div class="form-group">
<button type="submit" class="form-control btn btn-primary submit px-3" name="loggedinUser">Sign In</button>
</div>
<div class="form-group d-md-flex">
<div class="w-50">
<label class="checkbox-wrap checkbox-primary">Remember Me
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</div>
<div class="w-50 text-md-right">
<a href="#" style="color: #fff">Forgot Password</a>
</div>
</div>
</form>
<p class="w-100 text-center">&mdash; or Register Here &mdash;</p>

<div class="social d-flex text-center">
<a href="registration.php" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Signup</a>
</div>
</div>
</div>
</div>
</div>
</section>

<?php
if(isset($_POST['loggedinUser']))

{
	$usrnme =$_POST['email'];
	$pssword =$_POST['password'];

	$query =mysqli_query($config,"SELECT * FROM admin_register WHERE email='$usrnme' AND password='$pssword'");

	if(mysqli_num_rows($query)>0)

	{
		echo "<script>alert('login successful')</script>";
		echo "<script>window.location.href='dashboard.php'</script>";
	}
	else
	{
		echo"<script>alert('Invalid Details')</script>";

	}
}

?>
<script src="modules/uitemplate/js/jquery.min.js"></script>
<script src="modules/uitemplate/js/popper.js"></script>
<script src="modules/uitemplate/js/bootstrap.min.js"></script>
<script src="modules/uitemplate/js/main.js"></script>


</body>
</html>

