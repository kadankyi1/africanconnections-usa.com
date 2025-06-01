<?php
namespace Config;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '../../vendor/autoload.php';

use \DateTime;

class App
{
    private $env_data;
    private $is_live;
    private $protocol;
    private $domain;
    private $phone;
    private $db_name;
    private $db_user;
    private $db_pass;
    
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
        //$this->db_name = $this->env_data["db_name"];
        //$this->db_user = $this->env_data["db_user"];
        //$this->db_pass = $this->env_data["db_pass"];
      }


    public function getIsLive()
    {
        //return $this->is_live;
        return "1";
    }

    public function getProtocol()
    {
        //return $this->protocol;
        return "http";
    }

    public function getDomain()
    {
        //return $this->domain;
        return "africanconnections-usa.local/development";
    }

    public function getPhone()
    {
        //return $this->phone;
        return "+18479563319";
    }

    public function getDbName()
    {
        //return $this->phone;
        return "african1_aclist";
    }

    public function getDbUser()
    {
        //return $this->phone;
        return "root";
    }

    public function getDbPass()
    {
        //return $this->phone;
        return "";
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
