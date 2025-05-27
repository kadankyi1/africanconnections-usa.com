<?php
namespace App\Controllers;

require '../../vendor/autoload.php';
require_once('../../config/app.php');

use Config\App;
use App\Models\Page;
use Database\PagesData;
use Database\CarouselData;



class PageController
{
    private $pages;

    
    public function __construct()
    {
        $pages_data = new PagesData();
        $this->pages = $pages_data->pages_data;
        //var_dump($this->pages);
    }



    public function getOnePageDetails($index_name)
    {
        $page = (object) $this->pages[$index_name];
        //var_dump($page);
        return $page;
    }

    public function getTourCountryPageObjectForPageUrl($country_name)
    {
        $page = new Page();
        $country_name_key = strtolower(str_replace(" ","_",$country_name));
        if(!empty($this->pages[$country_name_key . "_country"]["name"])){
            $page = (object) $this->pages[$country_name_key . "_country"];
        } else if(!empty($this->pages[$country_name_key . "_tour"]["name"])){
            $page = (object) $this->pages[$country_name_key . "_tour"];
        } else {
            $keys = array_keys($this->pages);
            $result = preg_grep("/" . $country_name_key . "/i", $keys);
            //var_dump($result);

            if(count($result) > 0){
                $page = (object) $this->pages[reset($result)];
            } else {
                $page->name = "";
                $page->title = "";
                $page->description = "";
                $page->keywords = "";
                $page->url = "#";
            }

        } 

        return $page;
    }


    public function getCarouselData()
    {
        return new CarouselData();
    }
 

}