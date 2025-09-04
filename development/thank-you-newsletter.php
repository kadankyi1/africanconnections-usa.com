<?php
$root_folder = ''; // UNIVERSAL
require $root_folder . 'config/App.php';
use App\Controllers\PageController;
use App\Controllers\TourController;
use App\Controllers\FormController;
use App\Controllers\TrackingController;

$app = new Config\App(); // UNIVERSAL
$page_name = "thank_you_newsletter"; // UNIVERSAL
$page_controller = new PageController(); // UNIVERSAL
$tour_controller = new TourController(); // UNIVERSAL
$form_controller = new FormController();
$tracking_controller = new TrackingController(); // UNIVERSAL
$result = (object) ["status" => 0, "heading" => "", "message" => ""]; 

$page_banner_class = "emailthankyoupagebanner";
$page_banner_text = "";

$page_this = $page_controller->getOnePageDetails($page_name);

$tracking_controller->addUserActivity(0, "Viewed Page - " . $page_this->name, "", ""); // Logging View

if(!empty($_POST["joineremail"])){
  $result = $form_controller->addNewsletterSubscriber($_POST, $root_folder);
}
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

      <!-- CAROUSEL SECTION-->
      <?php include('src/components/general/top_banner_section.php'); ?>

      <!-- MESSAGE - THANK YOU SECTION-->
      <?php include('src/components/thank/message.php'); ?>

      <!-- WHY CHOOSE US SECTION-->
      <?php include('src/components/general/why_choose_us.php'); ?>

      <!-- FOOTER TAG-->
      <?php include('src/components/general/footer_tag.php'); ?>

    </div>

    <!-- FOOTER TAG-->
    <?php include('src/components/general/bottom_script_call.php'); ?>

  </body>
</html>