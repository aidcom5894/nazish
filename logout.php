<?php 
session_start();
unset($_SESSION['loggedinUser']);
session_destroy();
dashboard_header('location:index.php');

 ?>