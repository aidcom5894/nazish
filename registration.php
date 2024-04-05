<?php 

include('config.php');

?>

<!doctype html>
<html lang="en">
<head>
<title>Register Here</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="modules/uitemplate/css/style.css">

<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/iconify/2.0.0/iconify.min.js"> </script>

<style type="text/css">
	input[type=number]::-webkit-inner-spin-button, 
	input[type=number]::-webkit-outer-spin-button { 
	    -webkit-appearance: none;
	    -moz-appearance: none;
	    appearance: none;
	    margin: 0; 
	}
</style>

</head>

<body class="img js-fullheight" style="background-image: url(modules/uitemplate/images/bg.jpg);">
<section class="ftco-section">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-6 text-center mb-5">
<h2 class="heading-section">Register Here</h2>
</div>
</div>
<div class="row justify-content-center">
<div class="col-md-6 col-lg-4">
<div class="login-wrap p-0">
<h3 class="mb-4 text-center">Have an account?</h3>


<form class="signin-form" method="POST">
<div class="form-group">
<input type="text" class="form-control" placeholder="Username" name="username" required="">
</div>

<div class="form-group">
<input type="email" class="form-control" placeholder="Email_id" name="useremail" required="">
</div>

<div class="form-group">
<input id="password-field" type="password" class="form-control" placeholder="Password" name="password" required="">
<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
</div>

<div class="form-group">
<input type="number" class="form-control" placeholder="Contact" name="contact" required="" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type = "number"
    maxlength = "10">
</div>

<div class="form-group">
<button type="submit" class="form-control btn btn-primary submit px-3" name="registerUser">Register</button>
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

<p class="w-100 text-center">&mdash; Or Back to Home &mdash;</p>
<div class="social d-flex text-center">
<a href="<?php echo $base_address; ?>" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="1.2rem" height="1.2rem" viewBox="0 0 24 24"><path fill="#32398f" d="M10 20v-6h4v6h5v-8h3L12 3L2 12h3v8z"/></svg></span> Home</a>
</div>
</div>
</div>
</div>
</div>
</section>
<script src="modules/uitemplate/js/jquery.min.js"></script>
<script src="modules/uitemplate/js/popper.js"></script>
<script src="modules/uitemplate/js/bootstrap.min.js"></script>
<script src="modules/uitemplate/js/main.js"></script>

</body>
</html>


<?php 


$username = $_POST['username'];
$email = $_POST['useremail'];
$password = $_POST['password'];
$contact = $_POST['contact'];

$authCodeString = '67890ABCDEFGH12345IJKLMOPQRSTUVWXYZ';
$authCode = str_shuffle(substr($authCodeString,1,6));

$imageFolder = "assets/avatar/";

$avatar_location = array("avatar1.png","avatar3.png","avatar2.png","avatar4.png","avatar5.png","avatar6.png","avatar7.png","avatar8.png","avatar9.png","avatar10.png","avatar11.png","avatar12.png","avatar13.png","avatar14.png","avatar15.png","avatar16.png","avatar17.png","avatar18.png","avatar19.png","avatar20.png");
$photo = $base_address.$imageFolder.$avatar_location[array_rand($avatar_location,1)];

$checkExistingEntry = mysqli_query($config,"SELECT * FROM admin_register WHERE email = '$email' OR contact = '$contact' ");

	if(isset($_POST['registerUser']))
	{
		if(mysqli_num_rows($checkExistingEntry)>0)
		{
		  echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
		  echo '<script type="text/javascript">';
		  echo 'setTimeout(function () {';
		  echo 'swal("Duplicate Entry Found!","We have found same email or contact registered with some another account. To avoid data redundancy we do not allow same email or contact to register again. Please login with the credentials to access the portal","error").then(function() {';
		  echo 'window.location.href = "signin.php";';
		  echo '});';
		  echo '}, 100);';
		  echo '</script>';
		}
		else
		{

			session_start();
			$_SESSION['loggedinUser'] = $email;
			mysqli_query($config,"INSERT INTO admin_register(username,email,password,contact,authentication_code,address,security_qns1,security_ans,profile_status,profile_picture) VALUES('$username','$email','$password','$contact','$authCode','to_be_updated','to_be_updated','to_be_updated','Pending','$photo')");

		  echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
		  echo '<script type="text/javascript">';
		  echo 'setTimeout(function () {';
		  echo 'swal("Registration Successful","We are happy to have you onboard. Please login with the credentials to access your potal. We welcome you onboard. Happy Surfing!","success").then(function() {';
		  echo 'window.location.href = "verification.php";';
		  echo '});';
		  echo '}, 100);';
		  echo '</script>';
		}
		
	

	}



?>
