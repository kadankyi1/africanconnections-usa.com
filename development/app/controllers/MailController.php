<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';

class mailing {

    private $main_address;
    private $reservations_address;
    private $developer_address_address;

    function setFromAddress(){
        return "info@africanconnections-usa.com";
    }

    function sendMail($subject, $message){
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "Cc: " . $this->setFromAddress() . "\r\n";
        $headers .= "From: <" . $this->setFromAddress() . ">";
        mail($this->setFromAddress(),$subject,$message,$headers);
    }
    
    function sendReceiptMail($subject, $payer_email, $payment_date, $payer_name, $order_id, $tour_reference, $payment_amt){
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: " . $this->setFromAddress() . "\r\n";
        $headers .= "Cc: " . $this->setFromAddress() . "\r\n";
        $receipt_email = file_get_contents('views/payment-email');

        $oldsvals = array("{{purchase_date}}", "{{name}}", "{{receipt_id}}", "{{date}}", "{{tour_reference}}", "{{amount}}");
        $newvals   = array($payment_date, $payer_name, $order_id, $payment_date, $tour_reference, $payment_amt);
        
        $receipt_email = str_replace($oldsvals, $newvals, $receipt_email);        
        mail($payer_email, $subject, $receipt_email, $headers);
    
    }

    public static function sendEmailWithPHPMailer($smtp, $priority, $msg_id, $to_email, $to_name, $add_cc_email = null, $subject_emoji = null, $subject_text, $mail_body_html, $mail_body_text, $getAcopy, $origin) {
        $mail = new PHPMailer();
        if ($smtp) {
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '3b9dcda135d62b';
            $mail->Password = '4933e7163fcbbd';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->ContentType = "text/html; charset=utf-8\r\n";
        }
        $mail->Priority = $priority;
        $mail->setFrom('info@africanconnections-usa.com', 'African Connections');
        $mail->addAddress($to_email, $to_name);
        if ($getAcopy) {
            $mail->addBCC($to_email, $to_name);
        }

        $mail->Subject = $subject_text;

        if($mail_body_html == ""){
            $mail->isHTML(false); // Set email format to plain text
            $mail->Body = $mail_body_text;
        } else {            
            $mail->isHTML(true); // Set email format to plain text
            $mail->Body = $mail_body_html;
        }

        if (!$mail->send()) {
            return 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        } else {
            return $mail->getLastMessageID();
        }
    }
    
}


?>