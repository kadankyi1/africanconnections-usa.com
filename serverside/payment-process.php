<?php
$key = file_get_contents('../.env');
include_once 'classes/Mail.php';
include_once 'classes/Payment.php';

//var_dump($_POST); exit;
if (
  $_SERVER["REQUEST_METHOD"] == "POST" 
  && isset($_POST["amt"]) && !empty($_POST["amt"])
  && isset($_POST["fname"]) && !empty($_POST["fname"])
  && isset($_POST["lname"]) && !empty($_POST["lname"])
  && isset($_POST["payeremail"]) && !empty($_POST["payeremail"])
  && isset($_POST["payment_token"]) && !empty($_POST["payment_token"])
  && isset($_POST["refcode"]) && !empty($_POST["refcode"])
  ){

  $gw = new gwapi;
  $mail = new mailing;
  $amt = $_POST["amt"];
  $payeremail = $_POST["payeremail"];
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $payment_token = $_POST["payment_token"];
  $order_id = uniqid();
  $refcode = $_POST["refcode"];
  $order_desc = "Tour Payment - " .  $refcode;


  $gw->setLogin($key);
  $gw->setBilling($fname, $lname,"","","", "", "","","","","",$payeremail,"");
  $gw->setOrder($order_id, $order_desc, 0.00, 0.00, "",$_SERVER['HTTP_CLIENT_IP'] ? : ($_SERVER['HTTP_X_FORWARDED_FOR'] ? : $_SERVER['REMOTE_ADDR']));
  $r = $gw->doSale($amt,$payment_token);

  if($gw->responses['response'] == "1"){
    $mail->sendReceiptMail("Tour Payment Receipt - African Connections", $payeremail, date('F j, Y'), $fname . " " . $lname, $order_id, $refcode, "$" . $amt);
    header("Location: ../payment-thankyou.php?transactionId=$order_id&s=success");
  } else {
    $mail->sendMail("PAYMENT FAILED", "\n\n PAYER NAME:" . $fname . " " . $lname . "\n\n<br><br> AMOUNT: $" . $amt . "\n\n<br><br> REFERENCE CODE:: " . $refcode);
    header("Location: ../pay.php?transactionId=$order_id&s=fail");
  }
} else {
  header("Location: ../pay.php?transactionId=null&s=fail");
}