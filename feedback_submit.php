<?php 
ob_start(); 
require_once('config.php');

$view = $_POST['view'];
$name = $_POST['name'];
$comments = $_POST['comments'];
$email = $_POST['email'];
$num = $_POST['num'];

$query = mysqli_query($conn, "INSERT INTO `poll`(`id`, `name`, `email`, `phone`, `feedback`, `suggestions`) VALUES ('','$name','$email','$num','$view','$comments')");
echo '<script>alert("Thank You..! Your Feedback is Valuable to Us");  location.replace(document.referrer);</script>';

?>