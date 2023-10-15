<?php
require_once('../config.php');
$admin_email = $_POST['admin_email'];
#$users_mobile = $_POST['users_mobile'];
$select = "SELECT * FROM cake_shop_admin_registrations where admin_email = '$admin_email' ";
$query = mysqli_query($conn, $select);
$res = mysqli_fetch_assoc($query);
if (mysqli_num_rows($query) > 0) {
	session_start();
	$_SESSION['user_admin_id'] = $res['admin_id'];
	$_SESSION['user_admin_username'] = $res['admin_username'];
	header("Location: reset.php");
    echo "<script>alert('Email does not exist!')</script>";
} 
else {
	echo "<script>alert('Email does not exist!'')</script>";
}
?>