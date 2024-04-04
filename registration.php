<?php 

include('config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/iconify/2.0.0/iconify.min.js"> </script>
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
<input type="text" class="form-control" placeholder="Username" required name="username">
</div>

<div class="form-group">
<input type="email" class="form-control" placeholder="Email_id" required name="useremail">
</div>

<div class="form-group">
<input id="password-field" type="password" class="form-control" placeholder="Password" required name="password">
<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
</div>

<div class="form-group">
<input type="number" class="form-control" placeholder="Contact" required name="contact">
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

$msgBody = "Dear <b>$username</b> Your OTP Verification code is <b>$authCode</b><br> Please provide the Code in the  Verification Section to get access to the Dashboard.";

$insertData = mysqli_query($config,"INSERT INTO admin_register(username,email,password,contact,authentication_code,address,security_qns1,profile_status) VALUES('$username','$email','$password','$contact','$authCode','to be updated','to be updated','Pending')");


if(isset($_POST['registerUser']))
{		    
	if($insertData)
	{
		echo "<script>alert('Data Inserted Successfully')</script>";
		try {
	    //Server settings
	    $mail->SMTPDebug = false;                      //Enable verbose debug output
	    $mail->isSMTP();                                            //Send using SMTP
	    $mail->Host       = 'smtp.sendgrid.net';                     //Set the SMTP server to send through
	    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	    $mail->Username   = 'apikey';                     //SMTP username
	    $mail->Password   = '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';                               //SMTP password
	    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
	    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set 

	    //Recipients
	    $mail->setFrom('support@aidcom.in', 'OTP Verification');
	    $mail->addAddress($email);    						 //Add a recipient
	    $mail->addAddress('nazish@aidcom.in');               //Name is optional
	    $mail->addBCC('robinkujur@aidcom.in');				 //Name is optional

	    //Content
	    $mail->isHTML(true);                                  //Set email format to HTML
	    $mail->Subject = 'OTP Verification';
	    $mail->Body    = $msgBody ;
	     $mail->send();
	    echo 'Message has been sent';
	    } catch (Exception $e) {
	        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	    }
	}

	

}


?>