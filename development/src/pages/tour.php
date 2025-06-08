<?php
require '../../config/App.php';
use App\Controllers\PageController;
use App\Controllers\TourController;

$app = new Config\App(); // UNIVERSAL
$root_folder = '../../../'; // UNIVERSAL
//$page_name = "about_us"; // UNIVERSAL
$page_controller = new PageController(); // UNIVERSAL
$tour_controller = new TourController(); // UNIVERSAL
$error = true;


//var_dump($_GET["id"]);
if(!empty($_GET["id"])){
  //var_dump($tour_controller->formatUrlIdToGetTourPage($_GET["id"]));
  $page_this = $page_controller->getOnePageDetails($tour_controller->formatUrlIdToGetTourPage($_GET["id"]));
  $tour_this = $tour_controller->getOneTour($tour_controller->formatUrlIdToGetTourPage($_GET["id"]));
  $page_name = $page_this->name;
  //var_dump($page_this);
  //var_dump($tour_this);
  if(!empty($tour_this->tour_name) && !empty($page_this->name)){
    $error = false;
    $page_banner_class = $tour_this->tour_banner;
    $page_banner_text = "<br><br>";
  }
} 

if($error){
  //header("Location: " .  $app->getProtocol() . '://' . $app->getDomain() . $page_controller->getOnePageDetails('error')->url);
}

?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<!-- HEAD TAG CONTENTS -->
<?php include('../components/general/head_tag.php'); ?>

<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TKNXWNL"
  height="0" width="0" class="hidecontentandvisibility"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

    <div class="page">

      <!-- HEADER SECTION-->
      <?php $page_name = "tours"; include('../components/general/header_with_menu_tag.php'); ?>

      <!-- TOP SECTION-->
      <?php include('../components/general/top_banner_section.php'); ?>

      <!-- DESCRIPTION SECTION-->
      <?php include('../components/tour/description_section.php'); ?>

      <!-- FOOTER TAG-->
      <?php include('../components/general/footer_tag.php'); ?>

    </div>

    <!-- FOOTER TAG-->
    <?php include('../components/general/bottom_script_call.php'); ?>

  </body>
</html>