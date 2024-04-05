<?php 
session_start();

?>
<!doctype html>
<html lang="en">
<head>
<title>Verify Here</title>
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
<h2 class="heading-section">OTP Verification</h2>
</div>
</div>

<div class="row justify-content-center">
<div class="col-md-6 col-lg-4">
<div class="login-wrap p-0">
<h3 class="mb-4 text-center">Verify your OTP Here</h3>


<form action="#" class="signin-form" method="POST">

<div class="form-group">
<input type="text" class="form-control" placeholder="Enter OTP" required name="authCode">
</div>

<div class="form-group">
<button type="submit" class="form-control btn btn-primary submit px-3" name="verifyOTP">Verify OTP</button>
</div>
<small>A verification code has been sent on your registered Email <?php echo $_SESSION['loggedinUser']; ?></small>
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
<p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
<div class="form-group">
<button type="button" class="form-control btn btn-primary submit px-3" onclick="redirectHome()">Back to Home</button>

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


<script type="text/javascript">
    function redirectHome()
    {
        window.location.href='http://localhost/grocery_records/';
    }
</script>


<?php 

$enteredOTP = $_POST['authCode'];

$matchOTP = msyqli_query($config,"SELECT * FROM admin_register WHERE email = '$enteredOTP' AND authentication_code = '$enteredOTP'");


if(isset($_POST['verifyOTP']))
{
    
    if(mysqli_num_rows($matchOTP)>0)
    {
        echo "<script>alert('OTP Verified')</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
    else
    {
         echo "<script>alert('OTP Mismatch. Please Verify the Correct OTP')</script>";
    }
}


?>
