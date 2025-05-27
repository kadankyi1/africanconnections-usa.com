<?php
namespace App\Controllers;
//namespace Config;

require '../../vendor/autoload.php';

use Config\App;
use App\Models\Tour;
use Database\ToursData;



class TourController
{

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

    public function getOneTour($tour_index_number)
    {
        $tour = new Tour();
        $tour->name = $this->tours[$tour_index_number]["name"];
        $tour->date = $this->tours[$tour_index_number]["date"];
        $tour->duration = $this->tours[$tour_index_number]["duration"];
        $tour->price = $this->tours[$tour_index_number]["price"];
        $tour->card_photo = $this->tours[$tour_index_number]["card_photo"];
        $tour->full_photo = $this->tours[$tour_index_number]["full_photo"];
        $tour->image_links = $this->tours[$tour_index_number]["image_links"];
        $tour->brochure_url = $this->tours[$tour_index_number]["brochure_url"];
        $tour->page_url = $this->tours[$tour_index_number]["page_url"];
        $tour->short_description = $this->tours[$tour_index_number]["short_description"];
        $tour->highlights_description_html = $this->tours[$tour_index_number]["highlights_description_html"];
        $tour->package_includes_description_html = $this->tours[$tour_index_number]["package_includes_description_html"];
        $tour->package_excludes_description_html = $this->tours[$tour_index_number]["package_excludes_description_html"];
        $tour->full_description_html = $this->tours[$tour_index_number]["full_description_html"];
        return $tour;
    }

    public function getAllTourCountries()
    {
        foreach ($this->tours as $tour_index => $current_tour) {
            $this->tour_countries = array_merge($this->tour_countries, explode("|", $current_tour["countries"]));
            $this->tour_countries = array_unique($this->tour_countries);
            sort($this->tour_countries);
        }
        //var_dump($this->tour_countries);
        return $this->tour_countries;
    }

    public function getAllTourCountriesWith()
    {
        foreach ($this->tours as $tour_index => $current_tour) {
            $this->tour_countries = array_merge($this->tour_countries, explode("|", $current_tour["countries"]));
            $this->tour_countries = array_unique($this->tour_countries);
            sort($this->tour_countries);
        }
        //var_dump($this->tour_countries);
        return $this->tour;
    }
}