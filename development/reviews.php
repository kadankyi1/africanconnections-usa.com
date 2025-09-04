<?php
$root_folder = ''; // UNIVERSAL
require $root_folder . 'config/App.php';
use App\Controllers\PageController;
use App\Controllers\TourController;
use App\Controllers\TrackingController;

$app = new Config\App(); // UNIVERSAL
$page_name = "reviews"; // UNIVERSAL
$page_controller = new PageController(); // UNIVERSAL
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

    <div class="page">

      <!-- HEADER SECTION-->
      <?php include('src/components/general/header_with_menu_tag.php'); ?>

        <section class="section section-sm bg-default  mt-0 pt-0">
            <div class="container">
                <div class="col-sm-12 col-md-12  col-lg-12 wow fadeInRight">
                    <video controls crossorigin playsinline class="fullwidth minwidth100percent" poster="<?php echo $app->getProtocol() . '://' . $app->getDomain() ?>/resources/img/try1.png">
                        <source src="<?php echo $app->getProtocol() . '://' . $app->getDomain(); ?>/resources/videos/review1.mp4" type="video/mp4" size="576" seek>
                    </video>
                </div>
            </div>
        </section>

      <?php include('src/components/general/google_reviews_div.php'); ?> 

      <!-- WHY CHOOSE US SECTION-->
      <?php include('src/components/general/why_choose_us.php'); ?>

      <!-- FOOTER TAG-->
      <?php include('src/components/general/footer_tag.php'); ?>

    </div>

    <!-- FOOTER TAG-->
    <?php include('src/components/general/bottom_script_call.php'); ?>

  </body>
</html>