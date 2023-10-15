<?php
$orders_id = $_GET['orders_id'];
require_once('../config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer\src\PHPMailer.php';
require 'PHPMailer\src\SMTP.php';
require 'PHPMailer\src\Exception.php';

$delete = "DELETE FROM cake_shop_orders where orders_id = $orders_id";
mysqli_query($conn, $delete);
$mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                  
        $mail->Username   = 'vigneshdevadiga012@gmail.com';                   
        $mail->Password   = 'hyybzdebagryxmhj';                               
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 465;                                   
    
        //Recipients
        $mail->setFrom('artofcakes@gmail.com', 'Admin');
        $mail->addAddress('vigneshdevadiga012@gmail.com');     //Add a recipient
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Your Order has been Cancelled';
        $email_template = "
        <h2>Hello<h2>
        <h3>Your order id: $orders_id has been cancelled </h3>
        <h4>We hope to see you again soon. Click here to <a href='http://localhost/artofcakes/login_users.php'>Login</a> our page.</h4>
        ";
    
        $mail->Body    = $email_template;
    
        $mail->send();

        echo "<script>
	    alert('e-mailed sucessfully sent!!!');
        window.location.assign('view_orders.php')</script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>