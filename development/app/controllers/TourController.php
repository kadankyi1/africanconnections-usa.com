<?php
namespace App\Controllers;
//namespace Config;

require '../../vendor/autoload.php';

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
        $tours_data = $query->selectWithOneCondition("tours", "tour_active", "=", true, "");

        //var_dump($tours_data);
        $this->tour = new Tour();
        $this->tour_countries = array();;
        $this->tours = $tours_data;

    }

    public function getOneTour($tour_index_number)
    {

        $query = new Query();
        $tour = $query->selectWithOneCondition("tours", "tour_sys_id", "=", $tour_index_number, "");
        if(count($tour) != 1){
            return false;
        }
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


    public function getAllTourCountriesWith()
    {
        foreach ($this->tours as $tour_index => $current_tour) {
            $this->tour_countries = array_merge($this->tour_countries, explode("|", $current_tour["tour_countries"]));
            $this->tour_countries = array_unique($this->tour_countries);
            sort($this->tour_countries);
        }
        //var_dump($this->tour_countries);
        return $this->tour;
    }


    public function getToursInOrderOfDatesAscending()
    {
        $tour_dates_array = array();
        $arranged_tours = array();
        foreach ($this->tours as $tour_index => $current_tour) {
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
}