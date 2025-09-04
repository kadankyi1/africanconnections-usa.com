<?php
namespace App\Controllers;

require 'vendor/autoload.php';

use Config\App;
use Database\Query;
use Database\ActivityTypesData;



class CountryController
{

    public function getOneCountry($country_name)
    {

        $query = new Query();
        $country = $query->selectWithOneCondition("countries", "country_name", "=", $country_name, "");
        if(count($country) != 1){
            return false;
        }
        $country = (object) $country[0];
        //var_dump($country);
        return $country;
    }

    public function getCountryTours($country_name)
    {

        $query = new Query();
        $input_data_array = [
            0 => "%" . $country_name . "%"
        ];
        
        $tours = $query->select("SELECT * FROM tours WHERE tour_active = 1 AND for_payment_only = 0 AND tour_countries LIKE ?", $input_data_array);

        $tour_dates_array = array();
        $arranged_tours = array();
        foreach ($tours as $tour_index => $current_tour) {
            //var_dump($current_tour["tour_active"]);
            //var_dump($current_tour["for_payment_only"]);
            //echo "<br><br>";
            if($current_tour["tour_active"] != 1 && $show_non_active == false){continue;}
            if($current_tour["for_payment_only"] == 1 && $show_payment_only == false){continue;}
            $tour_dates_array[$tour_index] = $current_tour["tour_start_date"];
        }
        asort($tour_dates_array);

        foreach ($tour_dates_array as $key => $tour_date) {
            array_push($arranged_tours, $tours[$key]);
        }
        //var_dump($tour_dates_array);
        //var_dump("<br><br>");
        //var_dump($arranged_tours);
        return $arranged_tours;


        //var_dump($country);
        //return $tours;
    }

}