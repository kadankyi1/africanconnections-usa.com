<?php
require '../../config/App.php';
use App\Controllers\PageController;
use App\Controllers\TourController;

$app = new Config\App(); // UNIVERSAL
$root_folder = '../../'; // UNIVERSAL
$page_name = "reviews"; // UNIVERSAL
$page_controller = new PageController(); // UNIVERSAL


$page_this = $page_controller->getOnePageDetails($page_name);

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

        <section class="section section-sm bg-default  mt-0 pt-0">
            <div class="container">
                <div class="col-sm-12 col-md-12  col-lg-12 wow fadeInRight">
                    <video controls crossorigin playsinline class="fullwidth minwidth100percent" poster="<?php echo $root_folder; ?>/resources/img/try1.png">
                        <source src="<?php echo $root_folder; ?>/resources/videos/review1.mp4" type="video/mp4" size="576" seek>
                    </video>
                </div>
            </div>
        </section>

      <?php include('../components/general/google_reviews_div.php'); ?> 

      <!-- WHY CHOOSE US SECTION-->
      <?php include('../components/general/why_choose_us.php'); ?>

      <!-- FOOTER TAG-->
      <?php include('../components/general/footer_tag.php'); ?>

    </div>

    <!-- FOOTER TAG-->
    <?php include('../components/general/bottom_script_call.php'); ?>

  </body>
</html>