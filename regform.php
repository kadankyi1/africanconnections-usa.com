<?php
if(!empty($_GET["fn"])){
    $joineremail = $_GET["fn"];
    $servername = "localhost";
    $username = "african1_aclistu";
    $password = "Sk1n!sK1n.~";
    $dbname = "african1_aclist";

    try {
        $con =  new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $con->prepare("SELECT * FROM registrations WHERE email = ? ORDER BY id DESC LIMIT 1");
        $stmt->bindParam(1, $joineremail);
        $stmt->execute(array($joineremail));
        $result = $stmt->fetchAll();
        //echo count($result);
        if(count($result) >= 1){
            echo $result[0]["printable_form"];
        } else {
            echo "PLEASE USE THE CORRECT DOWNLOAD LINK. FORM WAS NOT FOUND";
        }

    } catch(PDOException $e){
      echo $e->getMessage();
      echo "DATABASE ERROR OCCURRED";
    }
}
