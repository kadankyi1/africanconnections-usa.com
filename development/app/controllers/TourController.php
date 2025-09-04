<?php
namespace App\Controllers;
//namespace Config;

require 'vendor/autoload.php';

use Config\App;
use App\Models\Tour;
use Database\Query;



class TourController
{

    private $tours;
    private $tour;
    private $tour_countries;

    public function __construct()
    {
        $query = new Query();
        $tours_data = $query->selectWithOneCondition("tours", "tour_active", "!=", 0, "");

        //var_dump($tours_data);
        $this->tour = new Tour();
        $this->tour_countries = array();;
        $this->tours = $tours_data;

    }

    public function getOneTour($tour_index_number)
    {

        $query = new Query();
        $tour = $query->selectWithOneCondition("tours", "tour_sys_id", "=", $tour_index_number, "");
        if(count($tour) != 1){return false;}
        
        if($tour[0]["tour_active"] != 1){return false;}
        //if($tour[0]["for_payment_only"] == 1){return false;}

        $tour = (object) $tour[0];
        //var_dump($tour);
        return $tour;
    }

    public function formatUrlIdToGetTourPage($url_id)
    {
        return str_replace("-", "_", $url_id) . "_tour";
    }
 

    public function getAllTourCountries()
    {
        foreach ($this->tours as $tour_index => $current_tour) {
            //var_dump($current_tour["tour_countries"]);
            if(empty($current_tour["tour_countries"])){continue;}
            $this->tour_countries = array_merge($this->tour_countries, explode("|", $current_tour["tour_countries"]));
            $this->tour_countries = array_unique($this->tour_countries);
            sort($this->tour_countries);
        }
        //var_dump($this->tour_countries);
        return $this->tour_countries;
    }


    public function getTourGalleryPhotos($tour_photo_str)
    {
        $photos_array = explode(" ", $tour_photo_str);
        //var_dump($this->tour_countries);
        return $photos_array;
    }

    public function getToursInOrderOfDatesAscending($show_non_active, $show_payment_only)
    {
        $tour_dates_array = array();
        $arranged_tours = array();
        foreach ($this->tours as $tour_index => $current_tour) {
            //var_dump($current_tour["tour_active"]);
            //var_dump($current_tour["for_payment_only"]);
            //echo "<br><br>";
            if($current_tour["tour_active"] != 1 && $show_non_active == false){continue;}
            if($current_tour["for_payment_only"] == 1 && $show_payment_only == false){continue;}
            $tour_dates_array[$tour_index] = $current_tour["tour_start_date"];
        }
        asort($tour_dates_array);

        foreach ($tour_dates_array as $key => $tour_date) {
            array_push($arranged_tours, $this->tours[$key]);
        }
        //var_dump($tour_dates_array);
        //var_dump("<br><br>");
        //var_dump($arranged_tours);
        return $arranged_tours;
    }

    public function getToursInAlphabeticalOrder($show_non_active, $show_payment_only)
    {
        $tour_names_array = array();
        $arranged_tours = array();
        foreach ($this->tours as $tour_index => $current_tour) {
            //var_dump($current_tour["tour_active"]);
            //var_dump($current_tour["for_payment_only"]);
            //echo "<br><br>";
            if($current_tour["tour_active"] != 1 && $show_non_active == false){continue;}
            if($current_tour["for_payment_only"] == 1 && $show_payment_only == false){continue;}
            $tour_names_array[$tour_index] = $current_tour["tour_name"];
        }
        asort($tour_names_array);

        foreach ($tour_names_array as $key => $tour_name) {
            array_push($arranged_tours, $this->tours[$key]);
        }
        //var_dump($tour_names_array);
        //var_dump("<br><br>");
        //var_dump($arranged_tours);
        return $arranged_tours;
    }

    public function sendTourRegistrationReminders($root_folder)
    {
        $app = new App();
        $query = new Query();
        $page_controller = new PageController();
        $mail_controller = new MailController();
        $clients = $query->selectWithOneCondition("clients", "client_id", "!=", "", "");

        foreach ($clients as $key => $client) {
            $tours_ids = explode("|", $client["tour_ids"]);
            foreach ($tours_ids as $key => $tour_id) {
                $this_tour = $query->selectWithOneCondition("tours", "tour_sys_id", "=", $tour_id, "");
                if(empty($this_tour[0]['tour_start_date']) || $app->isDatePassed($this_tour[0]['tour_start_date'])){continue;}

                $input_data_array = [
                    0 => $client["client_id"],
                    1 => $tour_id
                ];
                if(empty($query->select("SELECT * FROM registrations WHERE client_id = ? AND tour_id = ?", $input_data_array))){
                    $registration_content = file_get_contents($root_folder . 'resources/views/registration-reminder-email');
                    $oldsvals = array("{{logo}}", "{{name}}", "{{registrationlink}}", "{{ac_email}}", "{{tour_name}}");
                    $newvals   = array($app->getProtocol() . '://' . $app->getDomain() . '/resources/images/aclogo.png', $client["first_name"], $app->getProtocol() . '://' . $app->getDomain() . $page_controller->getOnePageDetails("tour_registration")->url, $mail_controller->main_address, $this_tour[0]['tour_name']);
                    
                    $registration_content = str_replace($oldsvals, $newvals, $registration_content);   
                    $mail_controller->sendMail($client["email"], "REMINDER TO COMPLETE TOUR REGISTRATION", $registration_content);
                    //$mail_controller->sendMail("kdankyi@africanconnections.biz", "REMINDER TO COMPLETE TOUR REGISTRATION", $registration_content);
                }

        
            }
        }
    }


    public function makeExpiredToursInactiveAndSendToursExpiringReminder()
    {
        $app = new App();
        $query = new Query();
        $mail_controller = new MailController();
        foreach ($this->tours as $tour_index => $current_tour) {
            if($current_tour["tour_active"] != 1){continue;}
            if(empty($current_tour["tour_start_date"])){continue;}

            $date_time = new \DateTime($current_tour["tour_start_date"]);
            $date_time->sub(new \DateInterval('P2M'));
            if($app->isDatePassed($date_time->format('Y-m-d'))){
                if($app->isDatePassed($current_tour['tour_start_date'])){
                    $input_data_array = [
                        0 => ['value' => $current_tour["tour_sys_id"],'type' => "s"]
                    ];
                    $query->update("UPDATE tours SET tour_active = 0 WHERE tour_sys_id = ?", $input_data_array);
                    //echo  "TOUR UPDATED<br><br>";
                }
                $message = "\n\n<br><br> THIS TOUR IS EXPIRING/EXPIRED";
                $message = "\n\n<br><br> TOUR NAME: " . $current_tour["tour_name"];
                $message = $message . "\n\n<br><br> TOUR START DATE: " . $current_tour["tour_start_date"];
                $mail_controller->sendMail($mail_controller->main_address, "TOUR EXPIRATION REMINDER", $message);
                //$mail_controller->sendMail("kdankyi@africanconnections.biz", "TOUR EXPIRATION REMINDER", $message);
            }
        }
    }


    public function getTrendingTours()
    {
        $app = new App();
        $query = new Query();
        $page_controller = new PageController();
        $mail_controller = new MailController();
        
        return $query->select("SELECT * FROM tours WHERE (trending = 1 OR (auto_trending_start_date <= now() AND auto_trending_start_date != '0000-00-00')) AND tour_start_date >= now() ORDER BY tour_start_date ASC", array());

        $clients = $query->select("clients", "client_id", "!=", "", "");
    }

    public function sendWelcomeGuides($root_folder, $client_id, $client_firstname, $client_lastname, $client_email, $this_tour){
        $app = new App();
        $query = new Query();
        $mail_controller = new MailController();

        // SENDING WELCOME GUIDE
        $input_data_array = [
            0 => $client_id,
            1 => $this_tour['tour_sys_id']
        ];
        $payment_that_sent_wguide = $query->select("SELECT * FROM payments WHERE client_sys_id = ? AND tour_sys_id = ? AND welcome_guide_sent = 1", $input_data_array);

        //var_dump($payment_that_sent_wguide); exit;
        if(!empty($payment_that_sent_wguide[0]['welcome_guide_sent']) && !empty($payment_that_sent_wguide[0]['welcome_guide_sent']) && $payment_that_sent_wguide[0]['welcome_guide_sent'] == 1) {
            return false;
        }

        if(empty($this_tour['tour_welcome_guides_urls'])){
            $mail_controller->sendMail($mail_controller->main_address, "FAILED TO SEND WELCOME GUIDE", $this_tour['tour_name'] . " welcome guide file does not exist and therefore failed to send to " . $client_firstname . " " . $client_lastname . ". Their email is " . $client_email);
            return false;
        }
        
        $wguides_urls = explode("|", $this_tour["tour_welcome_guides_urls"]);
        $wguide_message = 'We have listed below, the welcome guides for your tour - ' . $this_tour["tour_name"] . ". <strong>PLEASE READ THEM</strong>. They contain vital information about your tour.<br><br><br>";
        foreach ($wguides_urls as $key => $url) {
            if(file_exists($root_folder . "resources/wguides/" . $url)){
                $wguide_message = $wguide_message . '<a href="' . $app->getProtocol() . '://' . $app->getDomain() . '/resources/wguides/' . $url . '">WELCOME GUIDE ' . $key+1 . '</a><br>';
            }
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
            "[IMPORTANT] TOUR WELCOME GUIDE - AFRICAN CONNECTIONS",
            $client_firstname,
            $wguide_message
        );
        
        $email_content = str_replace($oldsvals, $newvals, $email_content);        

        $mail_controller->sendMail($client_email, "[IMPORTANT] TOUR WELCOME GUIDE - AFRICAN CONNECTIONS", $email_content);
        return true;
        //echo $email_content;

    }

}