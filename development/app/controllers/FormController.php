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
            'secret' => $app->getGCaptchaServerKey(),
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
        || (empty($form_details["g-recaptcha-response"]) && empty($form_details["g-recaptcha-2"]))
        || !$this->validateReCaptcha((empty($form_details["g-recaptcha-response"])) ? $form_details["g-recaptcha-2"] : $form_details["g-recaptcha-response"])->success
        || empty($this->reCaptcha->hostname) || $_SERVER['SERVER_NAME'] != $this->reCaptcha->hostname
        ){
            $_SESSION["result"] = (object) ["status" => 0, "heading" => "OOPS", "message" => "You have to complete the form"];
            return $_SESSION["result"];
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
            $response = $coupon_controller->generateCoupon("Newsletter Subscription", $joineremail, 100);

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
                    "You recently joined the African Connections Newsletter Subscription. We will send you our monthly newsletter with tour updates, exciting new tours and discount offers. African Connections' looks forward to hosting you on one of our African tours soon. <br><br> <strong>As a thank you, use the code $response->message to get $100 on your next tour</strong>. Just use it on your next tour payment.<br><br><strong>This promo code expires $response->message2</strong>"
                );
                
                $email_content = str_replace($oldsvals, $newvals, $email_content);        
        
                $mail_controller->sendMail($form_details["joineremail"], "NEWSLETTER SUBSCRIPTION & DISCOUNT CODE", $email_content);
                //var_dump($email_content); exit;
    
            }
            $_SESSION["result"] = (object) ["status" => 1, "heading" => "THANK YOU FOR JOINING OUR SUBSCRIBERS' LIST", "message" => "We will send you our monthly newsletter with tour updates, exciting new tours and discount offers. African Connections looks forward to hosting you on one of our African tours soon."];
            return $_SESSION["result"];
        } else {
            $_SESSION["result"] = (object) ["status" => 0, "heading" => "THANK YOU..", "message" => "Awesome. You are already on our mailing list."];
            return $_SESSION["result"];
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
        || (empty($form_details["g-recaptcha-response"]) && empty($form_details["g-recaptcha-2"]))
        || !$this->validateReCaptcha((empty($form_details["g-recaptcha-response"])) ? $form_details["g-recaptcha-2"] : $form_details["g-recaptcha-response"])->success
        || empty($this->reCaptcha->hostname) || $_SERVER['SERVER_NAME'] != $this->reCaptcha->hostname
        ){
            $_SESSION["result"] = (object) ["status" => 0, "heading" => "OOPS", "message" => "You have to complete the form"];
            return $_SESSION["result"];
        }

        if(empty($query->selectWithOneCondition("leads", "lead_email", "=", $form_details['joineremail'], ""))){
            $input_data_array = [
                0 => ['name' =>'lead_name','value' => $form_details["fullname_filled"],'type' => "s"],
                1 => ['name' =>'lead_email','value' => $form_details["joineremail"],'type' => "s"],
                2 => ['name' =>'lead_phone','value' => $form_details["phone_filled"],'type' => "s"],
                3 => ['name' =>'lead_ip','value' => $page_controller->getIP(),'type' => "s"]
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
            
            $message = "\n\n<br><br> FULL NAME: " . $form_details["fullname_filled"];
            $message = $message . "\n\n<br><br> PHONE: " . $form_details["phone_filled"];
            $message = $message . "\n\n<br><br> EMAIL: " . $form_details["joineremail"];
            $message = $message . "\n\n<br><br> TOUR DATE: " . $form_details["traveldate_filled"];
            $message = $message . "\n\n<br><br> TRAVEL SIZE: " . $form_details["travelersnumber_filled"];
            $message = $message . "\n\n<br><br> INTERESTS: " . $form_details["interests_filled"];
            $message = $message . "\n\n<br><br> DURATION: " . $form_details["travelduration_filled"];
            $mail_controller->sendMail($mail_controller->main_address, "NEW CUSTOMIZED TOUR INQUIRY", $message);
            
            $tracking_controller->addUserActivity(2, "Sent tour customization request.", $form_details["joineremail"], $form_details["phone_filled"]); 

            $_SESSION["result"] = (object) ["status" => 1, "heading" => "THANK YOU..", "message" => "We have received your tour customization request and will reach out to you soon"];
            return $_SESSION["result"];
        } else {
            $_SESSION["result"] = (object) ["status" => 0, "heading" => "THANK YOU..", "message" => "Awesome. You are already on our mailing list."];
            return $_SESSION["result"];
        }
    }


    public function processPaymentForm($form_details, $root_folder)
    {
        $app = new App();
        $query = new Query();
        $page_controller = new PageController();
        $coupon_controller = new CouponController();
        $payment_controller = new PaymentController();
        $tour_controller = new TourController();
        $tracking_controller = new TrackingController();
        $mail_controller = new MailController();
        $input_data_array = array();
        $order_id = uniqid();
        $client_id = uniqid();
        $tour_this = array();;

        //var_dump($form_details); exit;
        if (
            empty($form_details["amt"])
            || empty($form_details["fname"])
            || empty($form_details["lname"])
            || empty($form_details["payeremail"])
            || empty($form_details["payment_token"])
            || empty($form_details["refcode"])
            || empty($form_details["regform"])
            || (empty($form_details["g-recaptcha-response"]) && empty($form_details["g-recaptcha-2"]))
            || !$this->validateReCaptcha((empty($form_details["g-recaptcha-response"])) ? $form_details["g-recaptcha-2"] : $form_details["g-recaptcha-response"])->success
            || empty($this->reCaptcha->hostname) || $_SERVER['SERVER_NAME'] != $this->reCaptcha->hostname
        ){
            $_SESSION["result"] = (object) ["status" => 0, "heading" => "OOPS", "message" => "Please choose the tour you want to pay for and complete the payment form"];
            return $_SESSION["result"];
        }

        if(empty($form_details["agreetandc"]) || $form_details["agreetandc"] != "agreed"){
            $_SESSION["result"] = (object) ["status" => 0, "heading" => "OOPS", "message" => "You have to agree to the terms and conditions by checking the checkbox"];
            return $_SESSION["result"];
        }


        $tour_this = $query->selectWithOneCondition("tours", "tour_sys_id", "=", $form_details['refcode'], "");
        if(empty($tour_this)){
            $_SESSION["result"] = (object) ["status" => 0, "heading" => "OOPS", "message" => "Tour not found"];
            return $_SESSION["result"];
        }

        $client = $query->selectWithOneCondition("clients", "email", "=", $form_details['payeremail'], "");
        if(!empty($client[0]['client_id'])){
            $client_id = $client[0]['client_id'];
        }

        
        $payment_controller->setLogin($app->getPaymentKey()); //
        $payment_controller->setBilling($form_details["fname"], $form_details["lname"],"","","", "", "","","","","",$form_details["payeremail"],"", $client_id);
        $payment_controller->setOrder($order_id, "Tour Payment - " .  $tour_this[0]['tour_name'], 0.00, 0.00, "", $page_controller->getIP());
        $r = $payment_controller->doSale($form_details["amt"],$form_details["payment_token"]);

        //var_dump($payment_controller->responses); exit;

        if($payment_controller->responses['response'] != "1"){
            $_SESSION["result"] = (object) ["status" => 0, "heading" => "OOPS", "message" => "Payment failed"];
            return $_SESSION["result"];
        }
        
        
        $coupon_response = $coupon_controller->applyCoupon($form_details["discount_code"], $form_details["payeremail"], $client[0]['tour_ids'], $form_details['refcode']);

        $mail_controller->sendReceiptMail($root_folder, $mail_controller->main_address, "Tour Payment Receipt - African Connections", $form_details["payeremail"], date('F j, Y'), $form_details["fname"] . " " . $form_details["lname"], $order_id, $tour_this[0]["tour_name"], "$" . $form_details["amt"], $coupon_response->message2);

        $sent_welcomeguide = $tour_controller->sendWelcomeGuides($root_folder, $client_id, $form_details["fname"] , $form_details["lname"], $form_details["payeremail"], $tour_this[0]);
        if($sent_welcomeguide === true){
            $tracking_controller->addUserActivity(3, "Sent welcome guide for " . $this_tour['tour_name'], $client_email, ""); 
        }

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
            //echo str_contains($client[0]['tour_ids'], $form_details["refcode"]); 
            //var_dump(str_contains($client[0]['tour_ids'], $form_details["refcode"]));
            //exit;

            if (!str_contains($client[0]['tour_ids'], $form_details["refcode"])) {
                $tour_ids = $client[0]['tour_ids'] . '|' . $form_details["refcode"];
                $input_data_array = [
                    0 => ['value' => $tour_ids,'type' => "s"],
                    1 => ['value' => $client[0]["client_id"],'type' => "s"]
                ];
                $query->update("UPDATE clients SET tour_ids = ? WHERE client_id = ?", $input_data_array);
            }
        }

        $input_data_array = [
            0 => ['name' =>'payment_order_id','value' => $order_id,'type' => "s"],
            1 => ['name' =>'client_sys_id','value' => $client_id,'type' => "s"],
            2 => ['name' =>'tour_sys_id','value' => $form_details["refcode"],'type' => "s"],
            3 => ['name' =>'payment_amt','value' => $form_details["amt"],'type' => "s"],
            4 => ['name' =>'discount_code','value' => $coupon_response->discount_code,'type' => "s"],
            5 => ['name' =>'welcome_guide_sent','value' => $sent_welcomeguide,'type' => "i"]
        ];
        $query->insertToTable("payments", $input_data_array);

        $input_data_array = [
            0 => ['value' => $coupon_response->discount_code, 'type' => "s"]
        ];
        $query->update("UPDATE coupons SET redeemed = 1 WHERE coupon_id = ?", $input_data_array);


        $tracking_controller->addUserActivity(3, "Made a payment for tour - " . $tour_this[0]['tour_name'], $form_details["payeremail"], ""); 

        if($form_details["regform"] == "Yes"){
            $_SESSION["result"] = (object) ["status" => 1, "heading" => "PAYMENT SUCCESSFUL", "message" => "We have received your payment. " . $coupon_response->message];
            return $_SESSION["result"];
        } else {
            $_SESSION["result"] = (object) ["status" => 2, "heading" => "PAYMENT SUCCESSFUL", "message" => "We have received your payment. " . $coupon_response->message];
            return $_SESSION["result"];
        }
    }

    public function processRegistrationForm($form_details, $root_folder)
    {
        $app = new App();
        $query = new Query();
        $page_controller = new PageController();
        $tracking_controller = new TrackingController();
        $mail_controller = new MailController();
        $input_data_array = array();
        $message = "";

        for ($i=1; $i < 5; $i++) { 
            if (
                (isset($form_details["tourname_filled" . $i]) && empty($form_details["tourname_filled" . $i]))
                || (isset($form_details["firstname_filled" . $i]) && empty($form_details["firstname_filled" . $i]))
                || (isset($form_details["lastname_filled" . $i]) && empty($form_details["lastname_filled" . $i]))
                || (isset($form_details["dob_filled" . $i]) && empty($form_details["dob_filled" . $i]))
                || (isset($form_details["phonenumber_filled" . $i]) && empty($form_details["phonenumber_filled" . $i]))
                || (isset($form_details["joineremail_filled" . $i]) && empty($form_details["joineremail_filled" . $i]))
                || (isset($form_details["address_filled" . $i]) && empty($form_details["address_filled" . $i]))
                || (isset($form_details["city_filled" . $i]) && empty($form_details["city_filled" . $i]))
                || (isset($form_details["state_filled" . $i]) && empty($form_details["state_filled" . $i]))
                || (isset($form_details["roommate_request_filled" . $i]) && empty($form_details["roommate_request_filled" . $i]))
                ) {
                    $_SESSION["result"] = (object) ['status' => 0, 'heading' => 'OOPS', 'message' => '<span style="color:red">Form incomplete. Please make sure all compulsory fields marked with "*" are filled.</span>'];
                    return $_SESSION["result"];
                }        
        }

        if (
        (empty($form_details["g-recaptcha-response"]) && empty($form_details["g-recaptcha-2"]))
        || !$this->validateReCaptcha((empty($form_details["g-recaptcha-response"])) ? $form_details["g-recaptcha-2"] : $form_details["g-recaptcha-response"])->success
        || empty($this->reCaptcha->hostname) || $_SERVER['SERVER_NAME'] != $this->reCaptcha->hostname
        ){
            $_SESSION["result"] = (object) ['status' => 0, 'heading' => 'OOPS', 'message' => '<span style="color:red">Robot check failed. Please reload the page and try again</span>'];
            return $_SESSION["result"];
        }
        
        for ($i=1; $i < 5; $i++) { 
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
                "{{logo}}",
                "{{insurance_link}}"
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
                "",
                "",
                "",
                $form_details['medical_needs_filled' . $i],
                $form_details['roommate_request_filled' . $i],
                $form_details['roommate_name_filled' . $i],
                $app->getProtocol() . '://' . $app->getDomain() . '/resources/fonts/Testimonia-3zp8X.ttf',
                $app->getProtocol() . '://' . $app->getDomain() . '/resources/images/aclogo.png',
                $app->getProtocol() . '://' . $app->getDomain() . $page_controller->getOnePageDetails('travel_insurance')->url
            );
            
            $registration_content = str_replace($oldsvals, $newvals, $registration_content);        

            
            $input_data_array = [
                0 => ['name' =>'printable_form','value' => $registration_content,'type' => 's'],
                1 => ['name' =>'client_id','value' => $client_id, 'type' => 's'],
                2 => ['name' =>'tour_id','value' => $form_details['tourname_filled' . $i],'type' => 's'],
                3 => ['name' =>'registration_ip','value' => $page_controller->getIP(),'type' => "s"]
            ];
            $query->insertToTable("registrations", $input_data_array);

            $tracking_controller->addUserActivity(4, "Completed a tour registration form", $form_details["joineremail_filled" . $i], $form_details["phonenumber_filled" . $i]); 

            $mail_controller->sendMail($mail_controller->main_address, "TOUR REGISTRATION BY " . $form_details['firstname_filled' . $i] . " " . $form_details['lastname_filled' . $i] . " FOR " .  $this_tour[0]["tour_name"], $registration_content);
        }
        
        $_SESSION["result"] = (object) ['status' => 1, 'heading' => 'AWESOME..', 'message' => '<span style="color:green">Tour registration completed</span>'];
        return $_SESSION["result"];

    }


    public function sendEnquiry($form_details)
    {
        $query = new Query();
        $page_controller = new PageController();
        $tracking_controller = new TrackingController();
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
        || (empty($form_details["g-recaptcha-response"]) && empty($form_details["g-recaptcha-2"]))
        || !$this->validateReCaptcha((empty($form_details["g-recaptcha-response"])) ? $form_details["g-recaptcha-2"] : $form_details["g-recaptcha-response"])->success
        || empty($this->reCaptcha->hostname) || $_SERVER['SERVER_NAME'] != $this->reCaptcha->hostname
        ){
            return ["status" => 0, "heading" => "OOPS", "message" => "You have to complete the form"];
        }

        $message = "\n\n<br><br> FULL NAME: " . $form_details["fullname_filled"];
        $message = $message . "\n\n<br><br> TOUR NAME: " . $form_details["tournamereal_filled"];
        $message = $message . "\n\n<br><br> PHONE: " . $form_details["phone_filled"];
        $message = $message . "\n\n<br><br> EMAIL: " . $form_details["joineremail"];
        $message = $message . "\n\n<br><br> CHANNEL: " . $form_details["hearaboutus_filled"];
        $message = $message . "\n\n<br><br> MESSAGE: " . $form_details["msg_filled"];

        $this_lead = $query->selectWithOneCondition("leads", "lead_email", "=", $form_details['joineremail'], "");

        if(empty($this_lead)){
            $input_data_array = [
                0 => ['name' =>'lead_name','value' => $form_details["fullname_filled"],'type' => "s"],
                1 => ['name' =>'lead_email','value' => $form_details["joineremail"],'type' => "s"],
                2 => ['name' =>'lead_phone','value' => $form_details["phone_filled"],'type' => "s"],
                3 => ['name' =>'lead_channel','value' => $form_details["hearaboutus_filled"],'type' => "s"],
                4 => ['name' =>'lead_ip','value' => $page_controller->getIP(),'type' => "s"]
            ];
            $query->insertToTable("leads", $input_data_array);
        } else {
            //echo $form_details["phone_filled"];
            //echo "-----";
            //echo $this_lead[0]["id"];
            //echo "-----";
            $input_data_array = [
                0 => ['value' => $form_details["phone_filled"],'type' => "s"],
                1 => ['value' => $this_lead[0]["id"],'type' => "i"]
            ];
            $query->update("UPDATE leads SET lead_phone = ? WHERE id = ?", $input_data_array);

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