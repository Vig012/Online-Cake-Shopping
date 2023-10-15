<?php
require_once('config.php');
$users_email = $_POST['users_email'];
$users_mobile = $_POST['users_mobile'];
$select = "SELECT * FROM cake_shop_users_registrations where users_email = '$users_email' AND users_mobile = '$users_mobile'";
$query = mysqli_query($conn, $select);
$res = mysqli_fetch_assoc($query);
if (mysqli_num_rows($query) > 0) {
	session_start();
	$_SESSION['user_users_id'] = $res['users_id'];
	$_SESSION['user_users_username'] = $res['users_username'];
	$_SESSION['user_users_email']=$email;
	header("Location: reset_pass.php");
} 
else {
	echo "<script>alert('Email or Mobile No. does not exist!'')</script>";
}
?>