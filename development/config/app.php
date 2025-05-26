<?php
namespace Config;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../vendor/autoload.php';

class App
{
    public $env_data;
    public $is_live;
    public $domain;
    
    function __construct() {
        $key = file_get_contents('../../.env');
        $env_data = explode("\n",str_replace("\r\n","\n",$key));
        //var_dump();

        for ($i=0; $i < count($env_data); $i++) { 
            $this_data = explode("=",$env_data[$i]);
            //var_dump($this_data);
            $this->env_data[$this_data[0]] = $this_data[1];
        }

        $this->is_live = $this->env_data["is_live"];
        $this->domain = $this->env_data["domain"];
      }


    public function getIsLive(){
        return $this->is_live;
    }

    public function getDomain(){
        return $this->domain;
    }
}
