<?php
namespace App\Controllers;
//namespace Config;

require '../../vendor/autoload.php';

use Config\App;
use App\Models\Tour;
use Database\Query;
use Database\ToursData;



class FormController
{

    private $reCaptcha;
    /*
    private $tours;
    private $tour;
    private $tour_countries;

    public function __construct()
    {
        $tours_data = new ToursData();
        $this->tour = new Tour();
        $this->tour_countries = array();;
        $this->tours = $tours_data->tours_data;

        //var_dump($tours);
    }
    */

    public function validateReCaptcha($captchaResponse)
    {
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
        $this->reCaptcha = json_decode($result);
        return $this->reCaptcha;
    }

    public function addNewsletterSubscriber($form_details)
    {
    //var_dump($form_details); 
    //var_dump($this->validateReCaptcha((empty($form_details["g-recaptcha-response"])) ? $form_details["g-recaptcha-2"] : $form_details["g-recaptcha-response"]));
    //var_dump($this->reCaptcha->hostname);
    //var_dump($_SERVER['SERVER_NAME']);
    //exit;
        if (
        !empty($form_details["wtf"])
        || empty($form_details["joineremail"])
        || empty($form_details["fullname_filled"])
        //|| (empty($form_details["g-recaptcha-response"]) && empty($form_details["g-recaptcha-2"]))
        //|| !$this->validateReCaptcha((empty($form_details["g-recaptcha-response"])) ? $form_details["g-recaptcha-2"] : $form_details["g-recaptcha-response"])->success
        //|| empty($this->reCaptcha->hostname) || $_SERVER['SERVER_NAME'] != $this->reCaptcha->hostname
        ){
            return "Form submission incomplete";
        }
            
        $joineremail = $form_details["joineremail"];
        $fullname_filled = $form_details["fullname_filled"];

        $query = new Query();

        if(empty($query->selectWithOneCondition("subscribers", "subscriber_email", $joineremail))){
            echo "Nothing found";
        }
        return;

        try {

            
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

        return $tour;
    }

}