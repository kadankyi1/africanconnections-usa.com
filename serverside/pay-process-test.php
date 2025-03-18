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
  && isset($_POST["regform"]) && !empty($_POST["regform"])
  && (
    (isset($_POST["g-recaptcha-response"]) && !empty($_POST["g-recaptcha-response"])) || (isset($_POST["g-recaptcha-2"]) && !empty($_POST["g-recaptcha-2"]))
    )
  ){

    //echo "<br>here 1";
    if(!empty($_POST["g-recaptcha-response"])){
      $captchaResponse = $_POST["g-recaptcha-response"];
    } else {
      $captchaResponse = $_POST["g-recaptcha-2"];
    }
    //var_dump($_POST); exit;
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => "6LebVZcpAAAAAP18rLI2ZTwQsCJuDoPECL2xka9w", //6LfI2pwlAAAAAN-kpDhdv7MmEx01TeHXsrbfMky7
        'response' => $captchaResponse,
    );
  
    // use key 'http' even if you send the request to https://...
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
  
    $context  = stream_context_create($options);
  
    $result = file_get_contents($url, false, $context);
    $result = json_decode($result);
  
    if($result->success && $_SERVER['SERVER_NAME'] == $result->hostname) {
        //echo "<br>here 21";
      //echo "capture success"; exit;
      //echo "<br>HTTP_CLIENT_IP: " . $_SERVER['HTTP_CLIENT_IP'];
      //echo "<br>HTTP_X_FORWARDED_FOR: " . $_SERVER['HTTP_X_FORWARDED_FOR'];
      //echo "<br>REMOTE_ADDR: " . $_SERVER['REMOTE_ADDR']; exit;

      $gw = new gwapi;
      $mail = new mailing;
      $amt = $_POST["amt"];
      $payeremail = $_POST["payeremail"];
      $fname = $_POST["fname"];
      $lname = $_POST["lname"];
      $payment_token = $_POST["payment_token"];
      $order_id = uniqid();
      $refcode = $_POST["refcode"];
      $regform = $_POST["regform"];
      $order_desc = "Tour Payment - " .  $refcode;


      $gw->setLogin($key); //
      $gw->setBilling($fname, $lname,"","","", "", "","","","","",$payeremail,"");
      $gw->setOrder($order_id, $order_desc, 0.00, 0.00, "",$_SERVER['HTTP_CLIENT_IP'] ? : ($_SERVER['HTTP_X_FORWARDED_FOR'] ? : $_SERVER['REMOTE_ADDR']));
      $r = $gw->doSale($amt,$payment_token);

      //var_dump($gw->responses); exit;

      if($gw->responses['response'] == "1"){
      //echo "<br>here 3";
      //$testvar = true;
      //if($testvar){
        //echo "<br>here 4"; //exit;
        $mail->sendReceiptMail("Tour Payment Receipt - African Connections", $payeremail, date('F j, Y'), $fname . " " . $lname, $order_id, $refcode, "$" . $amt);
        $servername = "localhost";
        $username = "african1_aclistu";
        $password = "Sk1n!sK1n.~";
        $dbname = "african1_aclist";
    
        //$to = "info@africanconnections-usa.com";
        $to = "annodankyikwaku@gmail.com";
    
        try {
            $con =  new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $stmt = $con->prepare("INSERT INTO payments (firstname, lastname, email, tour_name, amount, payment_response) VALUES (?, ?, ?, ?, ?, 'Transaction Approved')");
            $stmt->bindParam(1, $fname, PDO::PARAM_STR);
            $stmt->bindParam(2, $lname, PDO::PARAM_STR);
            $stmt->bindParam(3, $payeremail, PDO::PARAM_STR);
            $stmt->bindParam(4, $refcode, PDO::PARAM_STR);
            $stmt->bindParam(5, $amt, PDO::PARAM_STR);
            if ($stmt->execute() !== TRUE) {
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: <$to>";
                $subject = "PAYMENT RECORD DATABASE ERROR - 1";
                $message = "";
                $message = $message . "\n\n<br><br> PAYER EMAIL: $payeremail";
                $message = $message . "\n\n<br><br> TOUR NAME: $refcode";
                $message = $message . "\n\n<br><br> AMOUNT: $amt";
                $message = $message . "\n\n<br><br> RESPONSE: Transaction Approved";
                mail($to,$subject,$message,$headers);
            }
            
            $stmt = null;
            $con = null;

        } catch(PDOException $e){
          //echo $e->getMessage();
          //**********************************************//
          //**********************************************//
          $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
          $headers .= "From: <$to>";
          $subject = "PAYMENT RECORD DATABASE ERROR - 1";
          $message = "";
          $message = $message . "\n\n<br><br> PAYER EMAIL: $payeremail";
          $message = $message . "\n\n<br><br> TOUR NAME: $refcode";
          $message = $message . "\n\n<br><br> AMOUNT: $amt";
          $message = $message . "\n\n<br><br> RESPONSE: Transaction Approved";
          mail($to,$subject,$message,$headers);
          //**********************************************//
          //**********************************************//
        }
    
        if($regform == "Yes"){
          header("Location: ../payment-thankyou.php?transactionId=$order_id&s=success");
        } else {
          header("Location: ../registration.php?transactionId=$order_id&s=success");
        }
      } else {

        //echo "<br>here 5"; exit;
        $mail->sendMail("PAYMENT FAILED", "\n\n PAYER NAME:" . $fname . " " . $lname . "\n\n<br><br> AMOUNT: $" . $amt . "\n\n<br><br> REFERENCE CODE:: " . $refcode);
        header("Location: ../pay.php?transactionId=$order_id&s=fail3");
      }
    } else {
      header("Location: ../pay.php?transactionId=null&s=Captchafail2");
    }
} else {
  header("Location: ../pay.php?transactionId=null&s=fail1");
}