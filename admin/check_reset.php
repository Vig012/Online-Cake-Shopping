<?php
session_start();
require_once('../config.php');
$admin_newpass = $_POST['admin_password'];
$admin_conpass = $_POST['admin_cpassword'];
if($admin_newpass!==$admin_conpass){
    echo "<script>alert('Your Password is not matching!')</script>";
}
else
{
$email = $_SESSION['user_admin_id'];	
$select = mysqli_query($conn,"UPDATE cake_shop_admin_registrations SET admin_password = '$admin_newpass' WHERE admin_id= '$email'");
if ($select) {
	echo "<script>alert('Password updated successfully')</script>";
	header("Location: index.php");
} 
else {
	echo "<script>alert('Something went wrong!')</script>";
}
}
?>