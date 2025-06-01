<?php
namespace Database;

require '../../vendor/autoload.php';
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
    


    public function selectWithOneCondition($table_name, $column_name, $column_value)
    {
        try {
            $this->con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $stmt = $this->con->prepare("SELECT * FROM $table_name WHERE $column_name = ?");
            $stmt->bindParam(1, $column_value);
            $stmt->execute(array($column_value));
            $result = $stmt->fetchAll();
            var_dump($result); 
            //echo count($result);
        } catch(\PDOException $e){
            var_dump($e);
        }
    }

    public function insertTwoValues()
    {
        $stmt = $this->con->prepare("INSERT INTO subscribers (subscriber_name, subscriber_email) VALUES (?, ?)");
        $stmt->bindParam(1, $fullname_filled, \PDO::PARAM_STR);
        $stmt->bindParam(2, $joineremail, \PDO::PARAM_STR);
        //$stmt->bindParam("ss", $fullname_filled, $joineremail);
        if ($stmt->execute() === TRUE) {
            //echo "<br><br>here 1";
        }
        $stmt = null;
        $this->con = null;

    }
}