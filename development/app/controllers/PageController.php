<?php
namespace App\Controllers;
//namespace Config;

require '../../vendor/autoload.php';

require_once('../../config/app.php');

use Config\App;
use App\Models\Page;



class PageController
{
    public function getPageDetails($page_name)
    {
        $app = new App();
        $page = new Page();

        
        switch ($page_name) {
            case "About":
                return array(
                    "title" => "About"
                );
            default:
                $page->name = "Home";
                $page->title = "African Connections | We Are Your Gateway To Africa";
                $page->description = "African Connections | See Our Trending Tours, Countries We Tour, Snapshot Of Our Many Reviews And More About Our Services";
                $page->keywords = "African Connections, African Connections USA, Tours Ghana,  Tours to Ghana, Tour Operator Ghana,Tour Operators Ghana, Ghana Tour Agency, Ghana Tour Agencies, Travel To Ghana, Ghana Tour, Experience Ghana";
                $page->url = $_SERVER['SERVER_NAME'] . $_SERVER["SCRIPT_NAME"];

                /*
                $page_details = array(
                    "name" => "Home",
                    "title" => "African Connections | We Are Your Gateway To Africa",
                    "description" => "African Connections | See Our Trending Tours, Countries We Tour, Snapshot Of Our Many Reviews And More About Our Services",
                    "keywords" => "African Connections, African Connections USA, Tours Ghana,  Tours to Ghana, Tour Operator Ghana,Tour Operators Ghana, Ghana Tour Agency, Ghana Tour Agencies, Travel To Ghana, Ghana Tour, Experience Ghana",
                );
                */

                return $page;
        }
    }

}