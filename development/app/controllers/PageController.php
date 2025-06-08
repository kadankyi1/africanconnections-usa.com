<?php
namespace App\Controllers;

require_once('../../config/App.php');

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



    public function getPages()
    {
        return $this->pages;
    }


    public function getOnePageDetails($index_name)
    {
        if(!empty($this->pages[$index_name])){
            $page = (object) $this->pages[$index_name];
        } else {
            $page = (object) $this->pages['error'];
        }
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
 
    public static function getIP() {
        $ip = '';
        if (isset($_SERVER['HTTP_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else if(isset($_SERVER['HTTP_X_FORWARDED'])){
            $ip = $_SERVER['HTTP_X_FORWARDED'];
        }else if(isset($_SERVER['HTTP_FORWARDED_FOR'])){
            $ip = $_SERVER['HTTP_FORWARDED_FOR'];
        }else if(isset($_SERVER['HTTP_FORWARDED'])){
            $ip = $_SERVER['HTTP_FORWARDED'];
        }else if(isset($_SERVER['REMOTE_ADDR'])){
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        if( empty($ip) || $ip == '0.0.0.0' || substr( $ip, 0, 2 ) == '::' ){
            $ip = file_get_contents('https://api.ipify.org/');
            $ip = ($ip===false?$ip:'');
        }
        return $ip;
    }

}