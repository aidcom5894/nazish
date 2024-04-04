<?php 

include('master_page/dashboard_header.php');
include('master_page/dashboard_sidebar.php');
include('master_page/dashboard_navbar.php');

?>

<!-- Content wrapper -->
<div class="content-wrapper">

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

<h4 class="py-3 mb-4">
<span class="text-muted fw-light">User Profile /</span> Profile
</h4>


<?php 

$fetchMyData = mysqli_query($var,"SELECT * FROM Admin_register WHERE Email_id='{$_SESSION['loggedinUser']}'");

while($row = mysqli_fetch_assoc($fetchMyData))
{ 
$user_name = $row['Username'];
$mail = $row['Email_id'];
$psswrd = $row['Password'];
$contact = $row['Contact'];
$address = $row['Address'];
$sec_ques = $row['Security_Question'];
$sec_ans = $row['Security_Answer'];
$authen_code = $row['Authentication_Code'];
$avatar = $row['Profile_Picture'];
}


?>

<!-- Header -->
<div class="row">
<div class="col-12">
<div class="card mb-4">

<div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">

<div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">

<form method="POST" enctype="multipart/form-data">
<img src="<?php echo $avatar; ?>" alt="user image" style="width: 200px; height: 200px;"><br>
<input type="file" id="user_Image" name="user_Image" class="form-control">
<button type="submit" name="Submit" class="btn btn-primary text-nowrap">Upload Profile picture</button>
</form>

</div>

<?php 

$targetFolder = "images/uploads/";
$orgFileName = $_FILES['user_Image']['name'];
$tmpFileName = $_FILES['user_Image']['tmp_name'];

$fullImageAddress = $base_url.$targetFolder.$orgFileName;


$upload = mysqli_query($var,"UPDATE Admin_register set Profile_Picture = '$fullImageAddress' WHERE Email_id = '{$_SESSION['loggedinUser']}' ");

if(isset($_POST['Submit']))
{
if($upload)
{
echo "<script>alert('Profile Picture Uploaded Successfully')</script>";
move_uploaded_file($tmpFileName, $targetFolder.$orgFileName);
}
else
{
echo "<script>alert('No Changes Made')</script>";
}
}

?>

<div class="flex-grow-1 mt-3 mt-sm-5">
<div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
<div class="user-profile-info">
<h4>Nazish  </h4>
<ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
<li class="list-inline-item fw-medium">
<i class='bx bx-pen'></i> UX Designer
</li>
<li class="list-inline-item fw-medium">
<i class='bx bx-map'></i> Vatican City
</li>
<li class="list-inline-item fw-medium">
<i class='bx bx-calendar-alt'></i> Joined April 2021
</li>
</ul>
</div>
<a href="javascript:void(0)" class="btn btn-primary text-nowrap">
<i class='bx bx-user-check me-1'></i>Connected
</a>
</div>
</div>
</div>
</div>
</div>
</div>
<!--/ Header -->

<!-- Navbar pills -->
<div class="row">
<div class="col-md-12">
<ul class="nav nav-pills flex-column flex-sm-row mb-4">
<li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class='bx bx-user me-1'></i>Profile</a>
</li>

&nbsp &nbsp
<div class="form-group">
<button type="submit" name="registration" class="form-control btn btn-primary submit px-3">Edit</button>
</div>

</ul>
</div>
</div>
<!--/ Navbar pills -->

<!-- User Profile Content -->
<div class="row">
<div class="col-xl-4 col-lg-5 col-md-5">
<!-- About User -->
<div class="card mb-4">
<div class="card-body">
<small class="text-muted text-uppercase">About</small>
<ul class="list-unstyled mb-4 mt-3">
<li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-medium mx-2">Username:</span> <span><?php echo $user_name; ?></span></li>

<li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span class="fw-medium mx-2">Email_id:</span> <span><?php echo $mail; ?></span></li>

<li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span class="fw-medium mx-2">Password:</span> <span></span> <?php echo $psswrd; ?></li>

<li class="d-flex align-items-center mb-3"><i class="bx bx-phone"></i><span class="fw-medium mx-2">Contact:</span> <span><?php echo $contact; ?></span></li>

<li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span class="fw-medium mx-2">Address:</span> <span><?php echo $address; ?></span></li>

<li class="d-flex align-items-center mb-3"><i class="bx bx-chat"></i><span class="fw-medium mx-2">Security_Question:</span> <span><?php echo $sec_ques; ?></span></li>

<li class="d-flex align-items-center mb-3"><i class="bx bx-envelope"></i><span class="fw-medium mx-2">Security_Answer:</span> <span><?php echo $sec_ans; ?></span></li>

<li class="d-flex align-items-center mb-3"><i class="bx bx-envelope"></i><span class="fw-medium mx-2">Authentication_Code:</span> <span><?php echo $authen_code; ?></span></li>


</ul>

</div>
</div>
<!--/ About User -->
<!-- Profile Overview -->

<!--/ Profile Overview -->
</div>
<p class="mb-0">Woocommerce iOS App Completed</p>
</div>
</li>
<li class="timeline-end-indicator">
<i class="bx bx-check-circle"></i>
</li>
</ul>
</div>
</div>
<!--/ Activity Timeline -->

<!-- Projects table -->

<!--/ Projects table -->
</div>
</div>
<!--/ User Profile Content -->

</div>
<!-- / Content -->


<?php 

include('master_page/dashboard_footer.php');

?>