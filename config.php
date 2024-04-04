<?php 

$hostname = 'localhost';
$username = 'root';
$password = 'Admin1234#@';
$dbname = 'grocery_record';

$base_address = 'http://localhost/grocery_records/';

$config = mysqli_connect($hostname,$username,$password,$dbname);

if($config)
{
	echo "";
}
else
{
	echo "Connection Failed with Error:". mysqli_connect_error();
}

?>