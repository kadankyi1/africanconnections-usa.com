<?php
//var_dump($_POST); 
//echo "<br>joineremail:" . $_POST["joineremail"];
//exit;
if (
  $_SERVER["REQUEST_METHOD"] == "POST" 
  && isset($_POST["wtf"]) && empty($_POST["wtf"])
  && isset($_POST["joineremail"]) && !empty($_POST["joineremail"])
  && isset($_POST["fullname_filled"]) && !empty($_POST["fullname_filled"])
  && (
    (isset($_POST["g-recaptcha-response"]) && !empty($_POST["g-recaptcha-response"])) || (isset($_POST["g-recaptcha-2"]) && !empty($_POST["g-recaptcha-2"]))
    )
  ){
  session_start();
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
    $joineremail = $_POST["joineremail"];
    $fullname_filled = $_POST["fullname_filled"];
    $tourname_filled = "";
    $phone_filled = "";
    $hearaboutus_filled = "";
    $msg_filled = "";
    
    if(!empty($_POST["tourname_filled"])){$tourname_filled = $_POST["tourname_filled"];}
    if(!empty($_POST["phone_filled"])){$phone_filled = $_POST["phone_filled"];}
    if(!empty($_POST["hearaboutus_filled"])){$hearaboutus_filled = $_POST["hearaboutus_filled"];}
    if(!empty($_POST["msg_filled"])){$msg_filled = $_POST["msg_filled"];}
    
    $servername = "localhost";
    $username = "african1_aclistu";
    $password = "Sk1n!sK1n.~";
    $dbname = "african1_aclist";
    $to = "info@africanconnections-usa.com"; 
    
    
    try {
      $con =  new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $con->prepare("SELECT * FROM subscribers WHERE subscriber_email = ?");
      $stmt->bindParam(1, $joineremail);
      $stmt->execute(array($joineremail));
      $result = $stmt->fetchAll();
      //echo count($result);
      if(count($result) <= 0){
        $stmt = $con->prepare("INSERT INTO subscribers (subscriber_name, subscriber_email) VALUES (?, ?)");
        $stmt->bindParam(1, $fullname_filled, PDO::PARAM_STR);
        $stmt->bindParam(2, $joineremail, PDO::PARAM_STR);
        //$stmt->bindParam("ss", $fullname_filled, $joineremail);
        if ($stmt->execute() === TRUE) {
          //echo "<br><br>here 1";
        }
        $stmt = null;
        $con = null;
      }
    
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      $headers .= "From: <$to>";
      if(empty($phone_filled) || empty($msg_filled)) {
        $subject = "SOMEONE NEW JOINED MAILING LIST FOR AC USA WEBSITE";
        $message = "\n\n FIRST NAME: $fullname_filled";
        $message = $message . "\n\n<br><br> EMAIL: $joineremail";
        mail($to,$subject,$message,$headers);
        header("Location: ../email-list-thankyou.html");
      } else {
        $subject = "NEW INQUIRY ON " . $tourname_filled;
        $message = "\n\n TOUR NAME: $tourname_filled";
        $message = $message . "\n\n<br><br> LEAD NAME: $fullname_filled";
        $message = $message . "\n\n<br><br> LEAD PHONE NUMBER: $phone_filled";
        $message = $message . "\n\n<br><br> LEAD EMAIL: $joineremail";
        $message = $message . "\n\n<br><br> HOW DID YOU HEAR ABOUT US: $hearaboutus_filled";
        $message = $message . "\n\n<br><br> MESSAGE: $msg_filled";
        mail($to,$subject,$message,$headers);
      }
    
    
    } catch(PDOException $e){
      //echo $e->getMessage();
      //**********************************************//
      //**********************************************//
      $subject = "ERROR 1 IN NEWSLETTER SIGNUP";
      $message = "\n\n Someone tried to signup and there was a database connection error. <br><br> LEAD NAME: $fullname_filled <br><br> EMAIL: $joineremail";
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      $headers .= "From: <$to>";
      mail($to,$subject,$message,$headers);
      //**********************************************//
      //**********************************************//
      die();
    }
    
  }

}