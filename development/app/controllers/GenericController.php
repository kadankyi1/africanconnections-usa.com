<?php
namespace App\Controllers;

require 'vendor/autoload.php';

use Config\App;
use App\Models\Tour;
use Database\Query;
use Database\ActivityTypesData;



class GenericController
{

    public function generateAndSendBirthdayCard($root_folder)
    {
        $app = new App();
        $query = new Query();
        $this_activities_types = new ActivityTypesData();
        $tracking_controller = new TrackingController();
        $page_controller = new PageController();
        $mail_controller = new MailController();

        foreach ($query->select("SELECT * FROM clients WHERE DAYOFMONTH(date_of_birth) = " . date('d') . " AND MONTH(date_of_birth) =  " . date('m'), array()) as $key => $client) {
            
            $card = $query->selectWithOneCondition("birthday_cards", "image_name", "!=", "", "ORDER BY RAND() LIMIT 1;");

            $email_content = file_get_contents($root_folder . 'resources/views/birthday-email');

            $oldsvals = array(
                "{{logo}}", 
                "{{homelink}}", 
                "{{tourslink}}", 
                "{{contactlink}}", 
                "{{cardlink}}", 
                "{{mainmessage}}", 
                "{{bodymessage}}", 
            );
            $newvals   = array(
                $app->getProtocol() . '://www.' . $app->getDomain() . '/resources/images/aclogo.png',
                $app->getProtocol() . '://www.' . $app->getDomain() . $page_controller->getOnePageDetails('home')->url,
                $app->getProtocol() . '://www.' . $app->getDomain() . $page_controller->getOnePageDetails('tours')->url,
                $app->getProtocol() . '://www.' . $app->getDomain() . $page_controller->getOnePageDetails('contact_us')->url,
                $app->getProtocol() . '://www.' . $app->getDomain() . '/resources/img/birthday_cards/' . $card[0]['image_name'],
                $card[0]['message_title'],
                $card[0]['message_body']
            );
            
            $email_content = str_replace($oldsvals, $newvals, $email_content);        

            $tracking_controller->addUserActivity(7, "Sent Birthday Wish To " . $client["first_name"] . " " . $client["last_name"], $client["email"], $client["phone"]); 

            //$mail_controller->sendMail($client['email'], $card[0]['message_title'], $email_content);
            $mail_controller->sendMail("kdankyi@africanconnections.biz", $card[0]['message_title'], $email_content);
            
            var_dump($email_content); exit;

        }
        
    }

    public static function  createFile($path_and_name, $file_content)
    {
        $myfile = fopen($path_and_name, "wb") or die("Unable to open file!");
        //$txt = "John Doe\n";
        fwrite($myfile, $file_content);
        fclose($myfile);
    }

    public function sendLeadsToTeam($root_folder)
    {
        $app = new App();
        $query = new Query();
        $this_activities_types = new ActivityTypesData();
        $tracking_controller = new TrackingController();
        $page_controller = new PageController();
        $mail_controller = new MailController();

        $leads_this =  '"id","subscriber_name","subscriber_email","created_at","updated_at"'.PHP_EOL;

        //var_dump($query->select("SELECT * FROM leads WHERE MONTH(created_at) =  " . date("m", strtotime("first day of previous month")), array())); exit; 

        foreach ($query->select("SELECT * FROM leads WHERE MONTH(created_at) =  " . date("m", strtotime("first day of previous month")), array()) as $key => $lead) {
            $leads_this = $leads_this . '"' . $lead['id'] .'","' . $lead['lead_name'] .'","' . $lead['lead_email'] .'","' . $lead['created_at'] .'","' . $lead['updated_at'] .'"'.PHP_EOL;
            //echo $key . "<br>";
        }
        
        $this->createFile('leads_generated_file.csv', $leads_this);
        
        $message = '<br><br> Download the CSV file of the subscribers from the link below.';
        $message = $message . '<br><br><a href="' . $app->getProtocol() . '://' . $app->getDomain() . '/leads_generated_file.csv' . '" download>CSV FILE</a>';
        
        $mail_controller->sendMail($mail_controller->marketor_address, "LEADS/SUBSCRIBERS' LIST FOR " . date("F Y", strtotime("first day of previous month")), $message);
        //$mail_controller->sendMail("kdankyi@africanconnections.biz", "LEADS/SUBSCRIBERS' LIST FOR " . date("F Y", strtotime("first day of previous month")), $message);
        
        //echo "LEADS/SUBSCRIBERS' LIST FOR " . date("F Y", strtotime("first day of previous month"));
        //echo $message; exit;

    }

    public function getCampaign($campaign_id)
    {
        $app = new App();
        $query = new Query();

        $input_data_array = [
            0 => $campaign_id
        ];
        $campaign_data = $query->select("SELECT * FROM ad_campaigns WHERE sku_id = ? and campaign_active = 1 and campaign_end_date > now()", $input_data_array);

        $campaign_data = (object) $campaign_data[0];
        //var_dump($campaign_data); exit;
        return $campaign_data;
    }

    public function sendInsuranceAdEmail($root_folder)
    {
        $app = new App();
        $query = new Query();
        $mail_controller = new MailController();

        // SELECT ALL CLIENTS WHO REGISTERED SEVEN DAYS AGO
        $oneMonthAgo = new \DateTime('7 days ago');
        $theFetchDate = $oneMonthAgo->format('Y-m-d');
        //echo $theFetchDate . "<br><br>";


        //SELECT CLIENTS WITH THEIR INSURANCE DATE BEING 7 DAYS AGO
        $input_data_array = [
            0 => $theFetchDate
        ];
        
        $clients = $query->select("SELECT * FROM clients WHERE DATE(insurance_ad_date) = ?", $input_data_array);

        $all_emails = "kdankyi@africanconnections.biz";
        foreach ($clients as $clients_index => $current_client) {
            //var_dump($current_client["email"]);
            $all_emails = $all_emails . "," . $current_client["email"];
            //echo "1<br><br>";
        }

        $email_content = file_get_contents($root_folder . 'resources/views/generic-email');

        $oldsvals = array(
            "{{logo}}", 
            "{{title}}", 
            "{{name}}", 
            "{{message}}"
        );
        $newvals   = array(
            $app->getProtocol() . '://' . $app->getDomain() . '/resources/images/aclogo.png',
            "HAVE YOU BOUGHT TRAVEL INSURANCE?",
            "",
            "I hope this email finds you well. We would like to remind you that travel insurance is not included in your tour package. <strong>However, we strongly recommend that you purchase travel insurance to cover any unexpected events that may interrupt or prevent your travel.</strong> <br><br> If you haven’t purchased insurance, you might want to consider this. <br><br> Our company offers travel insurance through Allianz Global, a leader in the travel insurance field.  You can click on the link below or go to our website, https://africanconnections-usa.com/travel-insurance, to get a quote. <br><br> Direct Insurance Link : https://www.agentmaxonline.com/agentmaxweb/widgets/quotetool.html?widgetid=859099&accam=F212819&code=ABIYU4TLWGBGTNHC6ZWLRSKAR65GB6C5JLBJOIXR7QY3M6I5HDDHZDIECAM4JHS6KBOBIU5FYWBJM3BAHKTFTOR572B73AM4ZH74ZMNXVK3YLBWT3Z3F4X4R3Z53LEU4 <br><br> <strong>If you decide to purchase the insurance, note that in the section of the application that asks you to choose a supplier, just type in “not listed” and you will receive a competitive quote.</strong>"
        );
        
        $email_content = str_replace($oldsvals, $newvals, $email_content);        

        if($all_emails != "kdankyi@africanconnections.biz"){
            $mail_controller->sendMailBulkAsBCC($all_emails, "HAVE YOU BOUGHT TRAVEL INSURANCE?", $email_content);
        }

    }


}