<?php
require '../../config/App.php';
use App\Controllers\PageController;
use App\Controllers\TourController;
use App\Controllers\FormController;

$app = new Config\App(); // UNIVERSAL
$root_folder = '../../'; // UNIVERSAL
$page_name = "Thank You Newsletter"; // UNIVERSAL
$page_controller = new PageController(); // UNIVERSAL
$tour_controller = new TourController(); // UNIVERSAL
$form_controller = new FormController();

$page_banner_class = "emailthankyoupagebanner";
$page_banner_text = "";

$page_this = $page_controller->getOnePageDetails('thank_you_newsletter');

//echo "RESPONSE <br>";
$form_controller->addNewsletterSubscriber($_POST);
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

      <!-- CAROUSEL SECTION-->
      <?php include('../components/general/top_banner_section.php'); ?>

      <!-- MESSAGE - THANK YOU SECTION-->
      <?php include('../components/thank/message.php'); ?>

      <!-- WHY CHOOSE US SECTION-->
      <?php include('../components/general/why_choose_us.php'); ?>

      <!-- FOOTER TAG-->
      <?php include('../components/home/footer_tag.php'); ?>

    </div>

    <!-- FOOTER TAG-->
    <?php include('../components/home/bottom_script_call.php'); ?>

  </body>
</html>