<?php
//var_dump($_POST);
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
  && isset($_POST["g-recaptcha-response"]) && !empty($_POST["g-recaptcha-response"])){
  session_start();
  $captchaResponse = $_POST["g-recaptcha-response"];
  
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////
  $url = 'https://www.google.com/recaptcha/api/siteverify';
  $data = array(
      'secret' => "6LfI2pwlAAAAAN-kpDhdv7MmEx01TeHXsrbfMky7",
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

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      $conn->close();
      //die("Connection failed: " . $conn->connect_error);

      //**********************************************//
      //**********************************************//
      $to = "info@africanconnections-usa.com";
      //$to = "annodankyikwaku@gmail.com";
      $subject = "ERROR 1 IN NEWSLETTER SIGNUP";
      $message = "\n\n Someone tried to signup and had a database error. EMAIL: $joineremail";
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      $headers .= "From: <$to>";
      mail($to,$subject,$message,$headers);
      //**********************************************//
      //**********************************************//
      
      header("Location: ../email-list-thankyou.html");
      die();
    } else {

      // prepare and bind
      $stmt = $conn->prepare("INSERT INTO subscribers (subscriber_name, subscriber_email) VALUES (?, ?)");
      $stmt->bind_param("ss", $fullname_filled, $joineremail);
      $stmt->execute();

        //**********************************************//
        //**********************************************//
        $to = "info@africanconnections-usa.com"; 
        //$to = "annodankyikwaku@gmail.com";


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
  
        die();
        //**********************************************//
        //**********************************************//
    }
  }

}