<?php
require_once("../config.php");
$orders_id = $_GET['orders_id'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer\src\PHPMailer.php';
require 'PHPMailer\src\SMTP.php';
require 'PHPMailer\src\Exception.php';

$check_user = "SELECT * FROM cake_shop_orders WHERE orders_id=$orders_id ";
$query = mysqli_query($conn, $check_user);
if($query)
{
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
        $mail->Subject = 'Your Order has been Confirmed';
        $email_template = "
        <h2>Hello<h2>
        <h3>You are receiving this email because we received an order request from your account. Your order has been confirmed and it will be delivered on the specified date. <h3>
        <br/><br/>
        <a href='http://localhost/artofcakes/feedback_form.php'>Click Here</a>
        ";
    
        $mail->Body    = $email_template;
    
        $mail->send();

        $delete = "DELETE FROM cake_shop_orders where orders_id = $orders_id";
        mysqli_query($conn, $delete);
        
        echo "<script>
	    alert('e-mailed sucessfully sent!!!');
        window.location.assign('view_orders.php')</script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
else{
    echo "<script>
	    alert('Something Went Wrong!!!');
        window.location.assign('view_orders.php')</script>";
}
?>
