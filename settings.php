<?php 

include('master_page/dashboard_header.php');
include('master_page/sidebar.php');
include('master_page/navbar.php');

?>



      

      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y">
            
            
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Home /</span> Settings
</h4>

<div class="row">
  <div class="col-md-12">
   
    <div class="card mb-4">
      <h5 class="card-header">Password Settings</h5>
      <!-- Account -->
      
      <hr class="my-0">
      <div class="card-body">
        <form id="formAccountSettings" method="POST" onsubmit="return false">
          <div class="row">

            <div class="mb-3 col-md-4">
              <label for="firstName" class="form-label">Old Password</label>
              <input class="form-control" type="text" id="username" name="password" autofocus />
            </div>
            
            <div class="mb-3 col-md-4">
              <label for="email" class="form-label">New Password</label>
              <input class="form-control" type="text" id="email" name="newpassword" />
            </div>
            <div class="mb-3 col-md-4">
              <label for="organization" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="password" name="cnfpassword" />
            </div>

          </div>

         
          <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">Update Password</button>
            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
          </div>
        </form>
      </div>
      <!-- /Account -->
    </div>

  </div>
</div>


          </div>
          <!-- / Content -->






























<?php 

include('master_page/footer.php');

?>