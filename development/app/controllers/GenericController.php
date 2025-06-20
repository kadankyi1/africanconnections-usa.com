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
        $query = new Query();
        $this_activities_types = new ActivityTypesData();
        $page_controller = new PageController();
        $mail_controller = new MailController();

        foreach ($query->selectWithOneCondition("clients", "birthday_wish_date", "<=", "now()", "") as $key => $client) {

            $card = $query->selectWithOneCondition("birthday_cards", "image_name", "!=", "", "ORDER BY RAND() LIMIT 1;");
            var_dump($card); exit;

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
                $app->getProtocol() . '://' . $app->getDomain() . '/resources/images/aclogo.png',
                $app->getProtocol() . '://' . $app->getDomain() . $page_controller->getOnePageDetails('home')->url,
                $app->getProtocol() . '://' . $app->getDomain() . $page_controller->getOnePageDetails('tours')->url,
                $app->getProtocol() . '://' . $app->getDomain() . $page_controller->getOnePageDetails('contact_us')->url,
                $app->getProtocol() . '://' . $app->getDomain() . '/resources/img/birthday_cards/' . $card[0]['image_name'],
                $card[0]['message_title'],
                $card[0]['message_body']
            );
            
            $email_content = str_replace($oldsvals, $newvals, $email_content);        

            $tracking_controller->addUserActivity(4, "Completed a tour registration form", $form_details["joineremail_filled"], $form_details["phonenumber_filled"]); 

            $mail_controller->sendMail($client['email'], $card[0]['message_title'], $email_content);
            

            $input_data_array = [
                0 => ['value' => $client["client_id"],'type' => "s"]
            ];
            $query->update("UPDATE clients SET birthday_wish_date = " . date('Y-m-d') . " WHERE client_id = ?", $input_data_array);
        }
        
    }



}