<?php
$root_folder = ''; // UNIVERSAL
require $root_folder . 'config/App.php';
use App\Controllers\PageController;
use App\Controllers\TourController;
use App\Controllers\TrackingController;

$app = new Config\App(); // UNIVERSAL
$page_name = "tdr"; // UNIVERSAL
$page_controller = new PageController(); // UNIVERSAL
$tour_controller = new TourController(); // UNIVERSAL
$tracking_controller = new TrackingController(); // UNIVERSAL

$partnership_path = "/tdr";
$page_banner_class = "partnershiptdrpagebanner";
$page_banner_child_class = "child-overlay";
$contact_title = "Got Questions? Contact Us";
$page_banner_text = '<span style="font-size: 25px;">After the Event, Join The</span><br> Return to the Motherland: Experience Ghana Tour';
$page_banner_text2 = '<a  style="width: 100%" class="button button-black-outline button-ujarak" href="' . $root_folder . 'resources/brochures/tdr.pdf">Open And Print Tour Brochure <span class="icon fa fa-print fa-5x maginallsides0px"></span></a>';
$page_banner_event_text = '<strong style="font-size: 20px">February 9 - 14, 2026<br>5 nights/6 days</strong><br><a class="button button-white-outline button-ujarak" href="' . $app->getProtocol() . '://' . $app->getDomain() . $page_controller->getOnePageDetails('make_a_payment')->url . '/' . $page_name . '">BOOK TOUR</a>';
$show_email_on_contact = true;

$page_this = $page_controller->getOnePageDetails($page_name);
$page_tours = $page_controller->getOnePageDetails('tours');

$show_home = false;
$show_tours = false;
$show_aboutus = true;
$show_makeapayment = false;
$show_travelinsurance = true;
$show_blog = false;
$show_contactus = false;
$show_youthprogram = false;

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

    <div class="page">

      <!-- HEADER SECTION-->
      <?php include('src/components/partnership/header_with_menu_tag.php'); ?>

      <!-- TOP SECTION-->
      <?php include('src/components/partnership/top_banner_section.php'); ?>

      <!-- DESCRIPTION SECTION-->
      <?php include('src/components/partnership' . $partnership_path . '/description_section.php'); ?>

      <!-- FOOTER TAG-->
      <?php //include('src/components/general/footer_tag.php'); ?>

    </div>

    <!-- FOOTER TAG-->
    <?php include('src/components/general/bottom_script_call.php'); ?>

  </body>
</html>