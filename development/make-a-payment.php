<?php
$root_folder = ''; // UNIVERSAL
require $root_folder . 'config/App.php';
use App\Controllers\PageController;
use App\Controllers\TourController;
use App\Controllers\TrackingController;

$app = new Config\App(); // UNIVERSAL
$page_name = "make_a_payment"; // UNIVERSAL
if(isset($_GET["id"]) && !empty($_GET["id"])){
  $root_folder = '../'; // UNIVERSAL
}
//echo $_GET["id"];
$page_controller = new PageController(); // UNIVERSAL
$tour_controller = new TourController(); // UNIVERSAL
$tracking_controller = new TrackingController(); // UNIVERSAL

$page_banner_class = "abtpagebanner";
$page_banner_text = "";

$page_this = $page_controller->getOnePageDetails($page_name);

$tracking_controller->addUserActivity(0, "Viewed Page - " . $page_this->name, "", ""); // Logging View

if(isset($_GET["id"]) && !empty($_GET["id"]) && $tour_controller->getOneTour($_GET["id"]) != false && !empty($tour_controller->getOneTour($_GET["id"])->tour_sys_id)){
  $preset_tour = $tour_controller->getOneTour($_GET["id"]);
}

//var_dump($_GET["id"]);
//var_dump($tour_controller->getOneTour($_GET["id"]));


?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<!-- HEAD TAG CONTENTS -->
<?php include('src/components/general/head_tag.php'); ?>

<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TKNXWNL"
  height="0" width="0" class="hidecontentandvisibility"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

    <div class="page">

      <!-- HEADER SECTION-->
      <?php include('src/components/general/header_with_menu_tag.php'); ?>

      <!-- FORM SECTION-->
      <?php include('src/components/make-a-payment/form_section.php'); ?>

      <!-- FOOTER TAG-->
      <?php include('src/components/general/footer_tag.php'); ?>

    </div>

    <!-- FOOTER TAG-->
    <?php include('src/components/general/bottom_script_call.php'); ?>

  </body>
</html>