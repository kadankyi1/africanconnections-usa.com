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

    public function __construct()
    {
        $tours_data = new ToursData();
        $this->tour = new Tour();
        $this->tours = $tours_data->tours_data;

        //var_dump($tours);
    }

    public function getOneTour($tour_index_number)
    {
        $this->tour->name = $this->tours[$tour_index_number]["name"];
        $this->tour->date = $this->tours[$tour_index_number]["date"];
        $this->tour->duration = $this->tours[$tour_index_number]["duration"];
        $this->tour->price = $this->tours[$tour_index_number]["price"];
        $this->tour->card_photo = $this->tours[$tour_index_number]["card_photo"];
        $this->tour->full_photo = $this->tours[$tour_index_number]["full_photo"];
        $this->tour->image_links = $this->tours[$tour_index_number]["image_links"];
        $this->tour->brochure_url = $this->tours[$tour_index_number]["brochure_url"];
        $this->tour->page_url = $this->tours[$tour_index_number]["page_url"];
        $this->tour->short_description = $this->tours[$tour_index_number]["short_description"];
        $this->tour->highlights_description_html = $this->tours[$tour_index_number]["highlights_description_html"];
        $this->tour->package_includes_description_html = $this->tours[$tour_index_number]["package_includes_description_html"];
        $this->tour->package_excludes_description_html = $this->tours[$tour_index_number]["package_excludes_description_html"];
        $this->tour->full_description_html = $this->tours[$tour_index_number]["full_description_html"];

        return $this->tour;
    }
}