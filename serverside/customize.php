<?php
if (
  $_SERVER["REQUEST_METHOD"] == "POST" 
  && isset($_POST["wtf"]) && empty($_POST["wtf"])
  && isset($_POST["traveldate_filled"]) && !empty($_POST["traveldate_filled"])
  && isset($_POST["travelduration_filled"]) && !empty($_POST["travelduration_filled"])
  && isset($_POST["travelersnumber_filled"]) && !empty($_POST["travelersnumber_filled"])
  && isset($_POST["interests_filled"]) && !empty($_POST["interests_filled"])
  && isset($_POST["fullname_filled"]) && !empty($_POST["fullname_filled"])
  && isset($_POST["phone_filled"]) && !empty($_POST["phone_filled"])
  && isset($_POST["joineremail"]) && !empty($_POST["joineremail"])
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
  //var_dump($_POST);
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////
  $url = 'https://www.google.com/recaptcha/api/siteverify';
  $data = array(
      'secret' => "6LebVZcpAAAAAP18rLI2ZTwQsCJuDoPECL2xka9w",
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
    $tourname_filled = "";
    $fullname_filled = "";
    $phone_filled = "";
    $msg_filled = "";
    
    if(!empty($_POST["traveldate_filled"])){$traveldate_filled = $_POST["traveldate_filled"];}
    if(!empty($_POST["travelduration_filled"])){$travelduration_filled = $_POST["travelduration_filled"];}
    if(!empty($_POST["travelersnumber_filled"])){$travelersnumber_filled = $_POST["travelersnumber_filled"];}
    if(!empty($_POST["interests_filled"])){$interests_filled = $_POST["interests_filled"];}
    if(!empty($_POST["fullname_filled"])){$fullname_filled = $_POST["fullname_filled"];}
    if(!empty($_POST["phone_filled"])){$phone_filled = $_POST["phone_filled"];}
    if(!empty($_POST["joineremail"])){$joineremail = $_POST["joineremail"];}


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
        $subject = "NEW CUSTOMIZED TOUR INQUIRY";
        $message = $message . "\n\n<br><br> TRAVEL DATE: $traveldate_filled";
        $message = $message . "\n\n<br><br> TRAVEL DURATION: $travelduration_filled";
        $message = $message . "\n\n<br><br> TRAVEL GROUP SIZE: $travelersnumber_filled";
        $message = $message . "\n\n<br><br> TRAVEL INTEREST: $interests_filled";
        $message = $message . "\n\n<br><br> INQUIRER NAME : $fullname_filled";
        $message = $message . "\n\n<br><br> INQUIRER PHONE : $phone_filled";
        $message = $message . "\n\n<br><br> INQUIRER EMAIL: $joineremail";
        mail($to,$subject,$message,$headers);
    
    
    } catch(PDOException $e){
      //echo $e->getMessage();
      //**********************************************//
      //**********************************************//
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: <$to>";
        $subject = "DATABASE ERROR - CUSTOMIZE A TOUR INQUIRY";
        $message = $message . "\n\n<br><br> TRAVEL DATE: $traveldate_filled";
        $message = $message . "\n\n<br><br> TRAVEL DURATION: $travelduration_filled";
        $message = $message . "\n\n<br><br> TRAVEL GROUP SIZE: $travelersnumber_filled";
        $message = $message . "\n\n<br><br> TRAVEL INTEREST: $interests_filled";
        $message = $message . "\n\n<br><br> INQUIRER NAME : $fullname_filled";
        $message = $message . "\n\n<br><br> INQUIRER PHONE : $phone_filled";
        $message = $message . "\n\n<br><br> INQUIRER EMAIL: $joineremail";
        mail($to,$subject,$message,$headers);
      //**********************************************//
      //**********************************************//
      die();
    }

  }

}