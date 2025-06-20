<?php
namespace App\Controllers;

require 'vendor/autoload.php';

use Config\App;
use App\Models\Tour;
use Database\Query;



class FormController
{

    private $reCaptcha;

    public function validateReCaptcha($captchaResponse)
    {
        $app = new App();
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array(
            'secret' => $app->getGCaptchaServerKey(), //6LfI2pwlAAAAAN-kpDhdv7MmEx01TeHXsrbfMky7
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

    public function addNewsletterSubscriber($form_details, $root_folder)
    {
        $app = new App();
        $query = new Query();
        $page_controller = new PageController();
        $mail_controller = new MailController();
        $tracking_controller = new TrackingController();
        $coupon_controller = new CouponController();
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
            return (object) ["status" => 0, "heading" => "OOPS", "message" => "You have to complete the form"];
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
            $message = "\n\n<br><br> FIRST NAME: $fullname_filled \n\n<br><br><br><br> EMAIL: $joineremail";
            $mail_controller->sendMail($mail_controller->main_address, "SOMEONE NEW JOINED MAILING LIST FOR AC USA WEBSITE", $message);
            
            $tracking_controller->addUserActivity(1, "Joined newsletter. Recorded as a lead.", $form_details["joineremail"], ""); 
            $response = $coupon_controller->generateCoupon("Newsletter Subscription", $joineremail);

            if(!empty($response->message)){
                $email_content = file_get_contents($root_folder . 'resources/views/generic-email');

                $oldsvals = array(
                    "{{logo}}", 
                    "{{title}}", 
                    "{{name}}", 
                    "{{message}}"
                );
                $newvals   = array(
                    $app->getProtocol() . '://' . $app->getDomain() . '/resources/images/aclogo.png',
                    "PROMO CODE FOR NEWSLETTER SUBSCRIPTION",
                    $form_details['fullname_filled'],
                    "You recently joined the African Connections Newsletter Subscription. We will send you our monthly newsletter with tour updates, exciting new tours and discount offers. African Connections looks forward to hosting you on one of our African tours soon. <br><br> <strong>As a thank you, use the code $response->message to get $100 on your next tour</strong>. Just present it when you are making your tour payment."
                );
                
                $email_content = str_replace($oldsvals, $newvals, $email_content);        
        
                $mail_controller->sendMail($form_details["joineremail"], "NEWSLETTER SUBSCRIPTION & DISCOUNT CODE", $email_content);
                //var_dump($email_content); exit;
    
            }
            return (object) ["status" => 1, "heading" => "THANK YOU FOR JOINING OUR SUBSCRIBERS' LIST", "message" => "We will send you our monthly newsletter with tour updates, exciting new tours and discount offers. African Connections looks forward to hosting you on one of our African tours soon."];
        } else {
            return (object) ["status" => 0, "heading" => "THANK YOU..", "message" => "Awesome. You are already on our mailing list."];
        }
    }



    public function addCustomizationRequest($form_details)
    {
        $query = new Query();
        $page_controller = new PageController();
        $mail_controller = new MailController();
        $tracking_controller = new TrackingController();
        $input_data_array = array();

        if (
        !empty($form_details["wtf"])
        || empty($form_details["traveldate_filled"])
        || empty($form_details["travelduration_filled"])
        || empty($form_details["travelersnumber_filled"])
        || empty($form_details["interests_filled"])
        || empty($form_details["fullname_filled"])
        || empty($form_details["phone_filled"])
        || empty($form_details["joineremail"])
        //|| (empty($form_details["g-recaptcha-response"]) && empty($form_details["g-recaptcha-2"]))
        //|| !$this->validateReCaptcha((empty($form_details["g-recaptcha-response"])) ? $form_details["g-recaptcha-2"] : $form_details["g-recaptcha-response"])->success
        //|| empty($this->reCaptcha->hostname) || $_SERVER['SERVER_NAME'] != $this->reCaptcha->hostname
        ){
            return (object) ["status" => 0, "heading" => "OOPS", "message" => "You have to complete the form"];
        }

        $message = "\n\n<br><br> FULL NAME: " . $form_details["fullname_filled"];
        $message = $message . "\n\n<br><br> PHONE: " . $form_details["phone_filled"];
        $message = $message . "\n\n<br><br> EMAIL: " . $form_details["joineremail"];
        $message = $message . "\n\n<br><br> TOUR DATE: " . $form_details["traveldate_filled"];
        $message = $message . "\n\n<br><br> TRAVEL SIZE: " . $form_details["travelersnumber_filled"];
        $message = $message . "\n\n<br><br> INTERESTS: " . $form_details["interests_filled"];
        $message = $message . "\n\n<br><br> DURATION: " . $form_details["travelduration_filled"];

        if(empty($query->selectWithOneCondition("leads", "lead_email", "=", $form_details['joineremail'], ""))){
            $input_data_array = [
                0 => ['name' =>'lead_name','value' => $form_details["fullname_filled"],'type' => "s"],
                1 => ['name' =>'lead_email','value' => $form_details["joineremail"],'type' => "s"],
                2 => ['name' =>'lead_ip','value' => $page_controller->getIP(),'type' => "s"]
            ];
            $query->insertToTable("leads", $input_data_array);
            $message = "\n\n<br><br> FIRST NAME:" . $form_details["fullname_filled"] . "\n\n<br><br><br><br> EMAIL: " . $form_details["joineremail"];
            $mail_controller->sendMail($mail_controller->main_address, "SOMEONE NEW JOINED MAILING LIST FOR AC USA WEBSITE", $message);
        } 
        
        $this_lead = $query->selectWithOneCondition("leads", "lead_email", "=", $form_details['joineremail'], "");

        if(!empty($this_lead)){
            $input_data_array = [
                0 => ['name' =>'travel_date','value' => $form_details['traveldate_filled'],'type' => "s"],
                1 => ['name' =>'tour_duration','value' => $form_details['travelduration_filled'],'type' => "s"],
                2 => ['name' =>'travel_size','value' => intval($form_details['travelersnumber_filled']),'type' => "i"],
                3 => ['name' =>'interest','value' => $form_details['interests_filled'],'type' => "s"],
                4 => ['name' =>'full_name','value' => $form_details['fullname_filled'],'type' => "s"],
                5 => ['name' =>'phone','value' => $form_details['phone_filled'],'type' => "s"],
                6 => ['name' =>'email','value' => $form_details['joineremail'],'type' => "s"],
                7 => ['name' =>'customization_ip','value' => $page_controller->getIP(),'type' => "s"],
                8 => ['name' =>'lead_id','value' =>$this_lead[0]['id'],'type' => "s"]
            ];
            $query->insertToTable("customizations", $input_data_array);
            $mail_controller->sendMail($mail_controller->main_address, "NEW CUSTOMIZED TOUR INQUIRY", $message);
            
            $tracking_controller->addUserActivity(2, "Sent tour customization request.", $form_details["joineremail"], $form_details["phone_filled"]); 

            return (object) ["status" => 1, "heading" => "THANK YOU..", "message" => "We have received your tour customization request and will reach out to you soon"];
        } else {
            return (object) ["status" => 0, "heading" => "THANK YOU..", "message" => "Awesome. You are already on our mailing list."];
        }
    }


    public function processPaymentForm($form_details, $root_folder)
    {
        $app = new App();
        $query = new Query();
        $page_controller = new PageController();
        $payment_controller = new PaymentController();
        $mail_controller = new MailController();
        $input_data_array = array();
        $order_id = uniqid();
        $client_id = uniqid();
        $tour_this = array();;

        if (
            empty($_POST["amt"])
            || empty($_POST["fname"])
            || empty($_POST["lname"])
            || empty($_POST["payeremail"])
            //|| empty($_POST["payment_token"])
            || empty($_POST["refcode"])
            || empty($_POST["regform"])
            //|| (empty($form_details["g-recaptcha-response"]) && empty($form_details["g-recaptcha-2"]))
            //|| !$this->validateReCaptcha((empty($form_details["g-recaptcha-response"])) ? $form_details["g-recaptcha-2"] : $form_details["g-recaptcha-response"])->success
            //|| empty($this->reCaptcha->hostname) || $_SERVER['SERVER_NAME'] != $this->reCaptcha->hostname
        ){
            return (object) ["status" => 0, "heading" => "OOPS", "message" => "You have to complete the payment form"];
        }

        $tour_this = $query->selectWithOneCondition("tours", "tour_sys_id", "=", $form_details['refcode'], "");
        if(empty($tour_this)){
            return (object) ["status" => 0, "heading" => "OOPS", "message" => "Tour not found"];
        }

        $client = $query->selectWithOneCondition("clients", "email", "=", $form_details['payeremail'], "");
        if(!empty($client[0]['client_id'])){
            $client_id = $client[0]['client_id'];
        }
        //var_dump($tour_this);


        //$payment_controller->setLogin($app->getPaymentKey()); //
        //$payment_controller->setBilling($_POST["fname"], $_POST["lname"],"","","", "", "","","","","",$_POST["payeremail"],"", $client_id);
        //$payment_controller->setOrder($order_id, "Tour Payment - " .  $tour_this[0]['tour_name'], 0.00, 0.00, "", $page_controller->getIP());
        //$r = $payment_controller->doSale($_POST["amt"],$_POST["payment_token"]);

        //var_dump($payment_controller->responses); exit;

        //if($payment_controller->responses['response'] != "1"){
        //    return (object) ["status" => 0, "heading" => "OOPS", "message" => "Payment failed"];
        //}

        $mail_controller->sendReceiptMail($root_folder, $mail_controller->main_address, "Tour Payment Receipt - African Connections", $_POST["payeremail"], date('F j, Y'), $_POST["fname"] . " " . $_POST["lname"], $order_id, $_POST["refcode"], "$" . $_POST["amt"]);

    
        if(empty($query->selectWithOneCondition("leads", "lead_email", "=", $form_details['payeremail'], ""))){
            $input_data_array = [
                0 => ['name' =>'lead_name','value' => $form_details["fname"] . " " . $form_details["lname"],'type' => "s"],
                1 => ['name' =>'lead_email','value' => $form_details["payeremail"],'type' => "s"],
                2 => ['name' =>'lead_ip','value' => $page_controller->getIP(),'type' => "s"]
            ];
            $query->insertToTable("leads", $input_data_array);
        } 

        if(empty($query->selectWithOneCondition("clients", "email", "=", $form_details['payeremail'], ""))){
            $input_data_array = [
                0 => ['name' =>'client_id','value' => $client_id,'type' => "s"],
                1 => ['name' =>'first_name','value' => $form_details["fname"],'type' => "s"],
                2 => ['name' =>'last_name','value' => $form_details["lname"],'type' => "s"],
                3 => ['name' =>'email','value' => $form_details["payeremail"],'type' => "s"],
                4 => ['name' =>'tour_ids','value' => $form_details["refcode"],'type' => "s"],
                5 => ['name' =>'client_ip','value' => $page_controller->getIP(),'type' => "s"]
            ];
            $query->insertToTable("clients", $input_data_array);
        } else {
            if (!str_contains($client[0]['tour_ids'], $form_details["refcode"])) {
                $tour_ids = $client[0]['tour_ids'] . '|' . $form_details["refcode"];
                $input_data_array = [
                    0 => ['value' => $tour_ids,'type' => "s"],
                    0 => ['value' => $client[0]["client_id"],'type' => "s"]
                ];
                $query->update("UPDATE clients SET tour_ids = ? WHERE client_id = ?", $input_data_array);
            }
        }

        $input_data_array = [
            0 => ['name' =>'payment_order_id','value' => $order_id,'type' => "s"],
            1 => ['name' =>'client_sys_id','value' => $client_id,'type' => "s"],
            2 => ['name' =>'tour_sys_id','value' => $_POST["regform"],'type' => "s"],
            2 => ['name' =>'payment_amt','value' => $_POST["amt"],'type' => "s"]
        ];
        $query->insertToTable("payments", $input_data_array);

        $tracking_controller->addUserActivity(3, "Made a payment for tour - " . $tour_this[0]['tour_name'], $form_details["payeremail"], ""); 

        if($_POST["regform"] == "Yes"){
            return (object) ["status" => 1, "heading" => "PAYMENT SUCCESSFUL", "message" => "We have received your payment"];
        } else {
            return (object) ["status" => 2, "heading" => "PAYMENT SUCCESSFUL", "message" => "We have received your payment"];
        }
    }

    public function processRegistrationForm($form_details, $root_folder)
    {
        $app = new App();
        $query = new Query();
        $page_controller = new PageController();
        $mail_controller = new MailController();
        $input_data_array = array();
        $message = "";

        if (
        empty($_POST["tourname_filled1"])
        || empty($_POST["firstname_filled1"])
        || empty($_POST["lastname_filled1"])
        || empty($_POST["dob_filled1"])
        || empty($_POST["phonenumber_filled1"])
        || empty($_POST["joineremail_filled1"])
        || empty($_POST["address_filled1"])
        || empty($_POST["city_filled1"])
        || empty($_POST["state_filled1"])
        || empty($_POST["roommate_request_filled1"])
        //|| (empty($form_details["g-recaptcha-response"]) && empty($form_details["g-recaptcha-2"]))
        //|| !$this->validateReCaptcha((empty($form_details["g-recaptcha-response"])) ? $form_details["g-recaptcha-2"] : $form_details["g-recaptcha-response"])->success
        //|| empty($this->reCaptcha->hostname) || $_SERVER['SERVER_NAME'] != $this->reCaptcha->hostname
        ){
            return (object) ["status" => 0, "heading" => "OOPS", "message" => "You have to complete the form"];
        }

        for ($i=1; $i < 6; $i++) { 
            $client_id = uniqid();
            if(empty($form_details['joineremail_filled' . $i])){
                break;
            }
            if(empty($query->selectWithOneCondition("leads", "lead_email", "=", $form_details['joineremail_filled' . $i], ""))){
                $input_data_array = [
                    0 => ['name' =>'lead_name','value' => $form_details["firstname_filled" . $i] . " " . $form_details["lastname_filled" . $i],'type' => "s"],
                    1 => ['name' =>'lead_email','value' => $form_details["joineremail_filled" . $i],'type' => "s"],
                    2 => ['name' =>'lead_phone','value' => $form_details["phonenumber_filled" . $i],'type' => "s"],
                    3 => ['name' =>'lead_ip','value' => $page_controller->getIP(),'type' => "s"]
                ];
                $query->insertToTable("leads", $input_data_array);
            } 

            if(empty($query->selectWithOneCondition("clients", "email", "=", $form_details['joineremail_filled' . $i], ""))){
                $input_data_array = [
                    0 => ['name' =>'client_id','value' => $client_id,'type' => "s"],
                    1 => ['name' =>'first_name','value' => $form_details["firstname_filled" . $i],'type' => "s"],
                    2 => ['name' =>'last_name','value' => $form_details["lastname_filled" . $i],'type' => "s"],
                    3 => ['name' =>'date_of_birth','value' => $form_details["dob_filled" . $i],'type' => "s"],
                    4 => ['name' =>'email','value' => $form_details["joineremail_filled" . $i],'type' => "s"],
                    5 => ['name' =>'tour_ids','value' => $form_details["tourname_filled" . $i],'type' => "s"],
                    6 => ['name' =>'client_ip','value' => $page_controller->getIP(),'type' => "s"],
                    7 => ['name' =>'phone','value' => $form_details["phonenumber_filled" . $i],'type' => "s"]
                ];
                //var_dump($input_data_array);
                //echo "<br><br>";
                $query->insertToTable("clients", $input_data_array);
            } 


            $client_this = $query->selectWithOneCondition("clients", "email", "=", $form_details['joineremail_filled' . $i], "");
            if(!empty($client_this)){$client_id = $client_this[0]['client_id'];} 
            $this_tour = $query->selectWithOneCondition("tours", "tour_sys_id", "=", $form_details['tourname_filled' . $i], "");

            $registration_content = file_get_contents($root_folder . 'resources/views/registration-email');

            $oldsvals = array(
                "{{tourname_filled}}", 
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
                "{{font}}", 
                "{{logo}}"
            );
            $newvals   = array(
                empty($this_tour) ? "" : $this_tour[0]["tour_name"],
                $form_details['firstname_filled' . $i],
                $form_details['lastname_filled' . $i],
                $form_details['middlename_filled' . $i],
                $form_details['dob_filled' . $i],
                $form_details['phonenumber_filled' . $i],
                $form_details['joineremail_filled' . $i],
                $form_details['address_filled' . $i],
                $form_details['address_secline_filled' . $i],
                $form_details['city_filled' . $i],
                $form_details['state_filled' . $i],
                $form_details['zipcode_filled' . $i],
                $form_details['payments_amt_and_interval_filled' . $i],
                $form_details['payments_day_filled' . $i],
                $form_details['payment_method_filled' . $i],
                $form_details['medical_needs_filled' . $i],
                $form_details['roommate_request_filled' . $i],
                $form_details['roommate_name_filled' . $i],
                $app->getProtocol() . '://' . $app->getDomain() . '/resources/fonts/Testimonia-3zp8X.ttf',
                $app->getProtocol() . '://' . $app->getDomain() . '/resources/images/aclogo.png'
            );
            
            $registration_content = str_replace($oldsvals, $newvals, $registration_content);        

            
            $input_data_array = [
                0 => ['name' =>'printable_form','value' => $registration_content,'type' => 's'],
                1 => ['name' =>'client_id','value' => $client_id, 'type' => 's'],
                2 => ['name' =>'tour_id','value' => $form_details['tourname_filled' . $i],'type' => 's'],
                3 => ['name' =>'registration_ip','value' => $page_controller->getIP(),'type' => "s"]
            ];
            $query->insertToTable("registrations", $input_data_array);

            $tracking_controller->addUserActivity(4, "Completed a tour registration form", $form_details["joineremail_filled"], $form_details["phonenumber_filled"]); 

            $mail_controller->sendMail($mail_controller->main_address, "TOUR REGISTRATION COMPLETED FOR " . $form_details['firstname_filled' . $i] . " " . $form_details['lastname_filled' . $i], $registration_content);
        }
        
        return (object) ["status" => 1, "heading" => "AWESOME..", "message" => "Tour registration completed"];

    }


    public function sendEnquiry($form_details)
    {
        $query = new Query();
        $page_controller = new PageController();
        $mail_controller = new MailController();
        $input_data_array = array();

        if (
        !empty($form_details["wtf"])
        || empty($form_details["tourname_filled"])
        || empty($form_details["fullname_filled"])
        || empty($form_details["phone_filled"])
        || empty($form_details["joineremail"])
        || empty($form_details["hearaboutus_filled"])
        || empty($form_details["msg_filled"])
        //|| (empty($form_details["g-recaptcha-response"]) && empty($form_details["g-recaptcha-2"]))
        //|| !$this->validateReCaptcha((empty($form_details["g-recaptcha-response"])) ? $form_details["g-recaptcha-2"] : $form_details["g-recaptcha-response"])->success
        //|| empty($this->reCaptcha->hostname) || $_SERVER['SERVER_NAME'] != $this->reCaptcha->hostname
        ){
            return ["status" => 0, "heading" => "OOPS", "message" => "You have to complete the form"];
        }

        $message = "\n\n<br><br> FULL NAME: " . $form_details["fullname_filled"];
        $message = $message . "\n\n<br><br> PHONE: " . $form_details["phone_filled"];
        $message = $message . "\n\n<br><br> EMAIL: " . $form_details["joineremail"];
        $message = $message . "\n\n<br><br> CHANNEL: " . $form_details["hearaboutus_filled"];
        $message = $message . "\n\n<br><br> MESSAGE: " . $form_details["msg_filled"];

        if(empty($query->selectWithOneCondition("leads", "lead_email", "=", $form_details['joineremail'], ""))){
            $input_data_array = [
                0 => ['name' =>'lead_name','value' => $form_details["fullname_filled"],'type' => "s"],
                1 => ['name' =>'lead_email','value' => $form_details["joineremail"],'type' => "s"],
                2 => ['name' =>'lead_phone','value' => $form_details["phone_filled"],'type' => "s"],
                3 => ['name' =>'lead_channel','value' => $form_details["hearaboutus_filled"],'type' => "s"],
                4 => ['name' =>'lead_ip','value' => $page_controller->getIP(),'type' => "s"]
            ];
            $query->insertToTable("leads", $input_data_array);
        } 
        
        $this_lead = $query->selectWithOneCondition("leads", "lead_email", "=", $form_details['joineremail'], "");

        if(!empty($this_lead)){
            $input_data_array = [
                0 => ['name' =>'message','value' => $form_details['msg_filled'],'type' => "s"],
                1 => ['name' =>'lead_id','value' => intval($this_lead[0]['id']),'type' => "i"],
                2 => ['name' =>'tour_id','value' => $form_details['tourname_filled'],'type' => "s"],
                3 => ['name' =>'enquiry_ip','value' => $page_controller->getIP(),'type' => "s"],
            ];
            $query->insertToTable("enquiries", $input_data_array);
            $mail_controller->sendMail($mail_controller->main_address, "NEW INQUIRY", $message);

            $tracking_controller->addUserActivity(4, "Completed a tour enquiry form", $form_details["joineremail"], $form_details["phone_filled"]); 

            return  ["status" => 1, "heading" => "THANK YOU..", "message" => "We have received your enquiry and will reach out to you soon"];
        } else {
            return ["status" => 0, "heading" => "THANK YOU..", "message" => "Something went awry.."];
        }
    }



}