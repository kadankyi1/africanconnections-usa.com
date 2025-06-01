<?php
$root_folder = '../../';
require $root_folder . 'config/App.php';
use App\Controllers\PageController;
use App\Controllers\TourController;

$app = new Config\App();
$page_name = "Home";
$page_controller = new App\Controllers\PageController();
$tour_controller_1 = new TourController();
$tour_controller_2 = new TourController();
$tour_controller_3 = new TourController();

$page_this = $page_controller->getOnePageDetails('home');
$tour_black_history = $tour_controller_1->getOneTour(1);
$tour_egypt = $tour_controller_2->getOneTour(5);
$tour_return_to_the_motherland = $tour_controller_3->getOneTour(6);
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

  <?php include('../components/home/newsletter_modal_div.php'); ?>

    <div class="page">

      <!-- HEADER SECTION-->
      <?php include('../components/general/header_with_menu_tag.php'); ?>

      <!-- CAROUSEL SECTION-->
      <?php include('../components/home/carousel_section.php'); ?>

      <!-- COUNTRIES SECTION-->
      <?php include('../components/home/countries_section.php'); ?>

      <!-- WHY CHOOSE US SECTION-->
      <?php include('../components/general/why_choose_us.php'); ?>

      
      <!-- TRENDING TOURS & ABOUT US SECTION-->
      <?php include('../components/home/trending_tours_section.php'); ?>

      <!-- FOOTER TAG-->
      <?php include('../components/home/footer_tag.php'); ?>

    </div>

    <!-- FOOTER TAG-->
    <?php include('../components/home/bottom_script_call.php'); ?>

  </body>
</html>