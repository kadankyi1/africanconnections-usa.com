<?php
include_once 'classes/Mail.php';

//var_dump($_POST); exit;
if (
  $_SERVER["REQUEST_METHOD"] == "POST" 
  && isset($_POST["wtf"]) && empty($_POST["wtf"])
  && isset($_POST["final_signature_base64_image_svg"]) && !empty($_POST["final_signature_base64_image_svg"])
  && isset($_POST["firstname_filled"]) && !empty($_POST["firstname_filled"])
  && isset($_POST["lastname_filled"]) && !empty($_POST["lastname_filled"])
  && isset($_POST["dob_filled"]) && !empty($_POST["dob_filled"])
  && isset($_POST["phonenumber_filled"]) && !empty($_POST["phonenumber_filled"])
  && isset($_POST["joineremail"]) && !empty($_POST["joineremail"])
  && isset($_POST["address_filled"]) && !empty($_POST["address_filled"])
  && isset($_POST["city_filled"]) && !empty($_POST["city_filled"])
  && isset($_POST["state_filled"]) && !empty($_POST["state_filled"])
  && isset($_POST["payments_amt_and_interval_filled"]) && !empty($_POST["payments_amt_and_interval_filled"])
  && isset($_POST["roommate_request_filled"]) && !empty($_POST["roommate_request_filled"])
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

  //var_dump($result); exit;
  if($result->success && $_SERVER['SERVER_NAME'] == $result->hostname) {

    $final_signature_base64_image_svg = $_POST["final_signature_base64_image_svg"];
    $firstname_filled = $_POST["firstname_filled"];
    $lastname_filled = $_POST["lastname_filled"];
    $middlename_filled = $_POST["middlename_filled"];
    $dob_filled = $_POST["dob_filled"];
    $phonenumber_filled = $_POST["phonenumber_filled"];
    $joineremail = $_POST["joineremail"];
    $address_filled = $_POST["address_filled"];
    $address_secline_filled = $_POST["address_secline_filled"];
    $city_filled = $_POST["city_filled"];
    $state_filled = $_POST["state_filled"];
    $zipcode_filled = $_POST["zipcode_filled"];
    $payments_amt_and_interval_filled = $_POST["payments_amt_and_interval_filled"];
    $payments_day_filled = $_POST["payments_day_filled"];
    $payment_method_filled = $_POST["payment_method_filled"];
    $medical_needs_filled = $_POST["medical_needs_filled"];
    $roommate_request_filled = $_POST["roommate_request_filled"];
    $roommate_name_filled = $_POST["roommate_name_filled"];

    $registration_content = file_get_contents('views/registration-email');

    $oldsvals = array(
        "{{firstname_filled}}", 
        "{{lastname_filled}}", 
        "{{middlename_filled}}", 
        "{{dob_filled}}", 
        "{{phonenumber_filled}}", 
        "{{joineremail}}", 
        "{{address_filled}}", 
        "{{address_secline_filled}}", 
        "{{city_filled}}", 
        "{{state_filled}}", 
        "{{zipcode_filled}}", 
        "{{payments_amt_and_interval_filled}}", 
        "{{payments_day_filled}}", 
        "{{payment_method_filled}}", 
        "{{medical_needs_filled}}", 
        "{{roommate_request_filled}}", 
        "{{roommate_name_filled}}", 
        "{{signature_base64}}"
    );
    $newvals   = array(
        $firstname_filled,
        $lastname_filled,
        $middlename_filled,
        $dob_filled,
        $phonenumber_filled,
        $joineremail,
        $address_filled,
        $address_secline_filled,
        $city_filled,
        $state_filled,
        $zipcode_filled,
        $payments_amt_and_interval_filled,
        $payments_day_filled,
        $payment_method_filled,
        $medical_needs_filled,
        $roommate_request_filled,
        $roommate_name_filled,
        $final_signature_base64_image_svg
    );
    
    $registration_content = str_replace($oldsvals, $newvals, $registration_content);        

    
    $servername = "localhost";
    $username = "african1_aclistu";
    $password = "Sk1n!sK1n.~";
    $dbname = "african1_aclist";

    //$to = "info@africanconnections-usa.com";
    $to = "annodankyikwaku@gmail.com";

    //echo "<br> here 1";
    try {
        $con =  new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $con->prepare("INSERT INTO registrations (firstname, lastname, middlename, email, signbase64, completed, printable_form) VALUES (?, ?, ?, ?, ?, true, ?)");
        $stmt->bindParam(1, $firstname_filled, PDO::PARAM_STR);
        $stmt->bindParam(2, $lastname_filled, PDO::PARAM_STR);
        $stmt->bindParam(3, $middlename_filled, PDO::PARAM_STR);
        $stmt->bindParam(4, $joineremail, PDO::PARAM_STR);
        $stmt->bindParam(5, $final_signature_base64_image_svg, PDO::PARAM_STR);
        $stmt->bindParam(6, $registration_content, PDO::PARAM_STR);
        if ($stmt->execute() !== TRUE) {
          //echo "<br> here 3";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: <$to>";
            $subject = "TOUR REGISTRATION DATABASE ERROR - 1";
            $message = "";
            $message = $message . "\n\n<br><br> FIRST NAME: $firstname_filled";
            $message = $message . "\n\n<br><br> LAST NAME: $lastname_filled";
            $message = $message . "\n\n<br><br> MIDDLE NAME: $middlename_filled";
            mail($to,$subject,$message,$headers);
        }
        $stmt = null;
        $con = null;

        
        //echo "<br> here 6";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: <$to>";
        $subject =  $firstname_filled . " " . $lastname_filled . " TOUR REGISTRATION COMPLETED";
        $message = "";
        $message = $message . "\n\n<br><br>" . $firstname_filled . " " . $lastname_filled . " has completed their tour registration form. View and print the form on this link: https://africanconnections-usa.com/regform.php?fn=$joineremail";
        mail($to,$subject,$message,$headers);

    
    } catch(PDOException $e){
      //echo $e->getMessage();
      //**********************************************//
      //**********************************************//
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      $headers .= "From: <$to>";
      $subject = "TOUR REGISTRATION DATABASE ERROR - 2";
      $message = "";
      $message = $message . "\n\n<br><br> FIRST NAME: $firstname_filled";
      $message = $message . "\n\n<br><br> LAST NAME: $lastname_filled";
      $message = $message . "\n\n<br><br> MIDDLE NAME: $middlename_filled";
      mail($to,$subject,$message,$headers);
      //**********************************************//
      //**********************************************//
      //echo "<br> here 7";
    }
    header("Location: ../payment-thankyou.php?transactionId=1&s=success");

  } else {
    $_SESSION["error"] = true;
    header("Location: ../registration.php?e=true2");
  }

} else {
    $_SESSION["error"] = true;
    header("Location: ../registration.php?e=true1");
}