<?php
namespace Database;

require 'vendor/autoload.php';
use Config\App;


class Query
{

    private $con;
    
    public function __construct()
    {
        
        $app = new App();
        $this->con =  new \PDO("mysql:host=localhost;dbname=" . $app->getDbName(). ";", $app->getDbUser(), $app->getDbPass());
        //return 
        //var_dump($tours);
    }
    


    public function selectWithOneCondition($table_name, $column_name, $condition, $column_value, $sorting_and_limiting)
    {
        try {
            $this->con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $stmt = $this->con->prepare("SELECT * FROM $table_name WHERE $column_name $condition ? $sorting_and_limiting");
            $stmt->bindParam(1, $column_value);
            $stmt->execute(array($column_value));
            $result = $stmt->fetchAll();
            return $result;
            //var_dump($result); 
            //echo count($result);
        } catch(\PDOException $e){
            //var_dump($e);
            return null;
        }
    }

    public function select($query, $input_data_array)
    {
        try {
            $this->con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $stmt = $this->con->prepare($query);
            for ($i=0; $i < count($input_data_array); $i++) { 
                $stmt->bindParam($i+1, $input_data_array[$i]);
            }
            $stmt->execute($input_data_array);
            $result = $stmt->fetchAll();
            return $result;
            //var_dump($result); 
            //echo count($result);
        } catch(\PDOException $e){
            //var_dump($e);
            return null;
        }
    }

    /*
    $input_data_array = [
        0 => [
            'name' =>'resources/img/home/sliderghana.jpg',
            'value' => 'January 1, 2025',                
            'type' => false,                
        ]
    ];
    */
    public function insertToTable($table_name, $input_data_array)
    {

        try {
            $column_names_str = "";
            $column_values_placeholder_str = "";
            for ($i=0; $i < count($input_data_array); $i++) { 
                if($i == 0){
                    $column_names_str = $input_data_array[$i]["name"];
                    $column_values_placeholder_str ="?";
                } else {
                    $column_names_str = $column_names_str . ", " . $input_data_array[$i]["name"];
                    $column_values_placeholder_str = $column_values_placeholder_str . ", ?";
                }
            }
            $query_str = "INSERT INTO $table_name ($column_names_str) VALUES ($column_values_placeholder_str)";
            //var_dump($query_str);
            $stmt = $this->con->prepare($query_str);

            for ($i=0; $i < count($input_data_array); $i++) { 
                if($input_data_array[$i]["type"] == "s"){
                    $stmt->bindParam($i+1, $input_data_array[$i]["value"], \PDO::PARAM_STR);
                } else if($input_data_array[$i]["type"] == "i"){
                    $stmt->bindParam($i+1, $input_data_array[$i]["value"], \PDO::PARAM_INT);
                }
            }
            if ($stmt->execute() === TRUE) {
                return true;
            } else {
                return false;
            }
        } catch(\PDOException $e){
            //var_dump($e);
            return null;
        }
    }


    public function update($query, $input_data_array)
    {
        /*
        $query = "UPDATE coupons SET user_email = ? WHERE coupon_id = ?";
        $column1_value = "myem@em.co";
        $column2_value = 'NEWSFLASH'; 
        $con =  new \PDO("mysql:host=localhost;dbname=" . "african1_newac" . ";", "african1_newacu", "T{yipU9I{G#+");
        $con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $stmt = $con->prepare($query);
        //$stmt->bindParam(1, $column1_value, PDO::PARAM_INT); // for integer
        $stmt->bindParam(1, $column1_value, \PDO::PARAM_STR); // for string
        $stmt->bindParam(2, $column2_value, \PDO::PARAM_STR); // for string
        return $stmt->execute();
        */
        try {
            $this->con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $stmt = $this->con->prepare($query);
            for ($i=0; $i < count($input_data_array); $i++) { 
                if($input_data_array[$i]["type"] == "s"){
                    $stmt->bindParam($i+1, $input_data_array[$i]["value"], \PDO::PARAM_STR);
                } else if($input_data_array[$i]["type"] == "i"){
                    $stmt->bindParam($i+1, $input_data_array[$i]["value"], \PDO::PARAM_INT);
                }
            }
            $status = $stmt->execute();
            return $status;
        } catch(\PDOException $e){
            //var_dump($e);
            return null;
        }
    }


    public function closeDBConn()
    {
        $stmt = null;
        $this->con = null;

    }
}