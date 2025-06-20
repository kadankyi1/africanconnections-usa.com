<?php
namespace App\Controllers;

require 'vendor/autoload.php';

use Config\App;
use App\Models\Tour;
use Database\Query;
use Database\ActivityTypesData;



class TrackingController
{

    public function addUserActivity($activity_number, $activity, $user_email, $user_phone)
    {
        $query = new Query();
        $this_activities_types = new ActivityTypesData();
        $page_controller = new PageController();
        $mail_controller = new MailController();
        if(!empty($user_email)){ $_SESSION["user_email"] = $user_email;}
        if(!empty($user_phone)){ $_SESSION["user_phone"] = $user_phone;}
        
        $input_data_array = [
            0 => ['name' =>'ip','value' => $page_controller->getIP(),'type' => 's'],
            1 => ['name' =>'phone','value' => (!empty($_SESSION["user_phone"])) ? $_SESSION["user_phone"]:'','type' => 's'],
            2 => ['name' =>'email','value' => (!empty($_SESSION["user_email"])) ? $_SESSION["user_email"]:'','type' => 's'],
            3 => ['name' =>'activity_type','value' => $this_activities_types->activities_types[$activity_number],'type' => 's'],
            4 => ['name' =>'activity','value' => $activity,'type' => 's']
        ];
        //var_dump($input_data_array);
        $query->insertToTable("activities", $input_data_array);
    }



}