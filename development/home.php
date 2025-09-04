<?php
$root_folder = ''; // UNIVERSAL
require $root_folder . 'config/App.php';
use App\Controllers\PageController;
use App\Controllers\TourController;
use App\Controllers\TrackingController;

$app = new Config\App();
$page_name = "home";
$page_controller = new App\Controllers\PageController();
$tour_controller_1 = new TourController();
$tracking_controller = new TrackingController(); // UNIVERSAL

$page_this = $page_controller->getOnePageDetails($page_name);

$tracking_controller->addUserActivity(0, "Viewed Page - " . $page_this->name, "", ""); // Logging View

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

  <?php include('src/components/home/newsletter_modal_div.php'); ?>

    <div class="page">

      <!-- HEADER SECTION-->
      <?php include('src/components/general/header_with_menu_tag.php'); ?>

      <!-- CAROUSEL SECTION-->
      <?php include('src/components/home/carousel_section.php'); ?>

      <!-- COUNTRIES SECTION-->
      <?php include('src/components/home/countries_section.php'); ?>

      <!-- WHY CHOOSE US SECTION-->
      <?php include('src/components/general/why_choose_us.php'); ?>

      <!-- PARTNERS SECTION-->
      <?php include('src/components/general/partners.php'); ?>

      <!-- TRENDING TOURS & ABOUT US SECTION-->
      <?php include('src/components/home/trending_tours_section.php'); ?>

      <!-- FOOTER TAG-->
      <?php include('src/components/general/footer_tag.php'); ?>

    </div>

    <!-- FOOTER TAG-->
    <?php include('src/components/general/bottom_script_call.php'); ?>

  </body>
</html>