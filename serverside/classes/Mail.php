<?php
class mailing {

    function setFromAddress(){
        return "info@africanconnections-usa.com";
        //return "annodankyikwaku@gmail.com";
    }

    function sendMail($subject, $message){
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
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
    
}


?>