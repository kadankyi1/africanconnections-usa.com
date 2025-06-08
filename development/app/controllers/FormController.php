<?php
namespace App\Controllers;
//namespace Config;

require '../../vendor/autoload.php';

use Config\App;
use App\Models\Tour;
use Database\Query;
//use Controllers\PageController;



class FormController
{

    private $reCaptcha;

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
        $query = new Query();
        $page_controller = new PageController();
        $mail_controller = new MailController();
        $input_data_array = array();
        $joineremail = "";
        $fullname_filled = "";

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


        if(empty($query->selectWithOneCondition("leads", "lead_email", "=", $joineremail, ""))){
            $input_data_array = [
                0 => ['name' =>'lead_name','value' => $fullname_filled,'type' => "s"],
                1 => ['name' =>'lead_email','value' => $joineremail,'type' => "s"],
                2 => ['name' =>'lead_ip','value' => $page_controller->getIP(),'type' => "s"]
            ];
            $query->insertToTable("leads", $input_data_array);
            $message = "\n\n FIRST NAME: $fullname_filled \n\n<br><br> EMAIL: $joineremail";
            $mail_controller->sendMail($mail_controller->main_address, "leadsSOMEONE NEW JOINED MAILING LIST FOR AC USA WEBSITE", $message);

            return (object) ["status" => 1, "heading" => "THANK YOU FOR JOINING OUR SUBSCRIBERS' LIST", "message" => "We will send you our monthly newsletter with tour updates, exciting new tours and discount offers. African Connections looks forward to hosting you on one of our African tours soon."];
        } else {
            return (object) ["status" => 0, "heading" => "THANK YOU..", "message" => "Awesome. You are already on our mailing list."];
        }
    }

}