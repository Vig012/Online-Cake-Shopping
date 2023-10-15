<?php
session_start();
require_once('config.php');
$users_newpass = $_POST['users_password'];
$users_conpass = $_POST['users_cpassword'];
if($users_newpass!==$users_conpass){
    echo "<script>alert('Your Password is not matching!')</script>";
}
else
{
$email = $_SESSION['user_users_id'];	
$select = mysqli_query($conn,"UPDATE cake_shop_users_registrations SET users_password = '$users_newpass' WHERE users_id= '$email'");
if ($select) {
	echo "<script>alert('Password updated successfully')</script>";
	header("Location: login_users.php");
} 
else {
	echo "<script>alert('Something went wrong!')</script>";
}
}
?>