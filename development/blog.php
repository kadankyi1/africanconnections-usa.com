<?php
$root_folder = ''; // UNIVERSAL
require $root_folder . 'config/App.php';
use App\Controllers\PageController;
use App\Controllers\TourController;
use App\Controllers\BlogController;
use App\Controllers\TrackingController;

$app = new Config\App(); // UNIVERSAL
$page_name = "blog"; // UNIVERSAL
$page_controller = new PageController(); // UNIVERSAL
$blog_controller = new BlogController();
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

      <!-- TOURS LISTING SECTION-->
        <section class="blog-posts grid-system">
            <div class="container">
                <div class="row">
                  <?php foreach ($blog_controller->getBlogArticles("ORDER BY id DESC") as $key => $post) {include('src/components/blog/post-card.php');}?>
                </div>
            </div>
        </section>

      <!-- FOOTER TAG-->
      <?php include('src/components/general/footer_tag.php'); ?>

    </div>

    <!-- FOOTER TAG-->
    <?php include('src/components/general/bottom_script_call.php'); ?>

  </body>
</html>