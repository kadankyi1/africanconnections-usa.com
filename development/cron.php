<?php
$root_folder = ''; // UNIVERSAL
require $root_folder . 'config/App.php';
use App\Controllers\PaymentController;
use App\Controllers\TourController;
use App\Controllers\TrackingController;
use App\Controllers\GenericController;

$payment_controller = new PaymentController();
$tour_controller = new TourController();
$tracking_controller = new TrackingController();
$generic_controller = new GenericController();

if(isset($_GET["id"]) && $_GET["id"] == "payments"){
    $oneMonthAgo = new \DateTime('1 week ago');
    $theFetchDate = $oneMonthAgo->format('Ymd');
    $payment_controller->getPaymentsReport($theFetchDate);
} else if(isset($_GET["id"]) && $_GET["id"] == "registrationsreminders"){
    $tour_controller->sendTourRegistrationReminders($root_folder);
} else if(isset($_GET["id"]) && $_GET["id"] == "tourexpiration"){
    $tour_controller->makeExpiredToursInactiveAndSendToursExpiringReminder();
} else if(isset($_POST["id"]) && $_POST["id"] == "click" && !empty($_POST["type"]) && !empty($_POST["href"])){
    $tracking_controller->addUserActivity(intval($_POST["type"]), "Clicked - " . $_POST["href"], "", "");
} else if(isset($_GET["id"]) && $_GET["id"] == "birthday"){
    $generic_controller->generateAndSendBirthdayCard($root_folder);
}  else if(isset($_GET["id"]) && $_GET["id"] == "leads"){
    $generic_controller->sendLeadsToTeam($root_folder);
} 
?>