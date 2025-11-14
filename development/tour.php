<?php
$root_folder = ''; // UNIVERSAL
require $root_folder . 'config/App.php';
use App\Controllers\PageController;
use App\Controllers\TourController;
use App\Controllers\TrackingController;

$app = new Config\App(); // UNIVERSAL
$page_name = "tour"; // UNIVERSAL
$root_folder = '../'; // UNIVERSAL
$page_controller = new PageController(); // UNIVERSAL
$tour_controller = new TourController(); // UNIVERSAL
$tracking_controller = new TrackingController(); // UNIVERSAL
$error = true;


//var_dump($_GET["id"]);
//echo "<br><br>";
if(!empty($_GET["id"])){
  //var_dump($tour_controller->formatUrlIdToGetTourPage($_GET["id"]));
  //echo "<br><br>";
  $page_this = $page_controller->getOnePageDetails($tour_controller->formatUrlIdToGetTourPage($_GET["id"]));
  $tour_this = $tour_controller->getOneTour($tour_controller->formatUrlIdToGetTourPage($_GET["id"]));
  $page_name = $page_this->name;
  //var_dump($page_this);
  //echo "<br><br>";
  //var_dump($tour_this); exit;
  if(!empty($tour_this->tour_name) && !empty($page_this->name)){
    $error = false;
    $page_banner_class = $tour_this->tour_banner;
    $page_banner_text = "<br><br>";
  }

  $tracking_controller->addUserActivity(0, "Viewed Page - " . $page_this->name, "", ""); // Logging View
} 

if($error){
  header("Location: " .  $app->getProtocol() . '://' . $app->getDomain() . $page_controller->getOnePageDetails('error')->url);
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
      <?php $page_name = "tours"; include('src/components/general/header_with_menu_tag.php'); ?>

      <!-- TOP SECTION-->
      <?php include('src/components/general/top_banner_section.php'); ?>

      <!-- DESCRIPTION SECTION-->
      
      <?php if($tour_this->tour_active == 1 ){include('src/components/tour/description_section.php');  } else if($tour_this->tour_active == 2){ ?>
        <section class="section section-sm section-first bg-default mt-0 pt-0">
          <div class="container">
            <div class="row">
              <div class="wow fadeInRight" data-wow-delay=".1s">
                <h3>COMING SOON</h3>
                <p>This tour is being being put together. Check back later.</p>
              </div>
            </div>
          </div>
        </section>
      <?php } ?>

      <!-- FOOTER TAG-->
      <?php include('src/components/general/footer_tag.php'); ?>

    </div>

    <!-- FOOTER TAG-->
    <?php include('src/components/general/bottom_script_call.php'); ?>

  </body>
</html>