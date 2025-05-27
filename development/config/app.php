<?php
namespace Config;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../vendor/autoload.php';

use \DateTime;

class App
{
    private $env_data;
    private $is_live;
    private $protocol;
    private $domain;
    private $phone;
    
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
        $this->protocol = $this->env_data["protocol"];
        $this->domain = $this->env_data["domain"];
        $this->phone = $this->env_data["phone"];
      }


    public function getIsLive()
    {
        return $this->is_live;
    }

    public function getProtocol()
    {
        return $this->protocol;
    }

    public function getDomain()
    {
        return $this->domain;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public static function isDatePassed($date)
    {
        $date = new DateTime($date);
        $now = new DateTime();
        
        if($date < $now) {
            return true;
            //echo 'PAST';
        } else {
            return false;
            //echo 'FUTURE COMING';
        }
    }
}
