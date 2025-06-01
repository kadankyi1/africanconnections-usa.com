<?php
require '../../config/App.php';
use App\Controllers\PageController;
use App\Controllers\TourController;

$app = new Config\App(); // UNIVERSAL
$root_folder = '../../'; // UNIVERSAL
$page_name = "About Us"; // UNIVERSAL
$page_controller = new PageController(); // UNIVERSAL
$tour_controller = new TourController(); // UNIVERSAL


$page_banner_class = "abtpagebanner";
$page_banner_text = "WE KNOW AFRICA BEST";

$page_this = $page_controller->getOnePageDetails('about_us');
$page_tours = $page_controller->getOnePageDetails('tours');

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
      <?php include('../components/general/header_with_menu_tag.php'); ?>

      <!-- TOP SECTION-->
      <?php include('../components/general/top_banner_section.php'); ?>

      <!-- DESCRIPTION SECTION-->
      <?php include('../components/about/description_section.php'); ?>

      <!-- FOOTER TAG-->
      <?php include('../components/home/footer_tag.php'); ?>

    </div>

    <!-- FOOTER TAG-->
    <?php include('../components/home/bottom_script_call.php'); ?>

  </body>
</html>