<?php
require '../../config/App.php';
use App\Controllers\PageController;
use App\Controllers\TourController;
use App\Controllers\BlogController;

$app = new Config\App(); // UNIVERSAL
$root_folder = '../../'; // UNIVERSAL
$page_name = "blog"; // UNIVERSAL
$page_controller = new PageController(); // UNIVERSAL
$blog_controller = new BlogController();

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

      <!-- TOURS LISTING SECTION-->
        <section class="blog-posts grid-system">
            <div class="container">
                <div class="row">
                  <?php foreach ($blog_controller->getBlogArticles("ORDER BY id DESC") as $key => $post) {include('../components/blog/post-card.php');}?>
                </div>
            </div>
        </section>

      <!-- FOOTER TAG-->
      <?php include('../components/general/footer_tag.php'); ?>

    </div>

    <!-- FOOTER TAG-->
    <?php include('../components/general/bottom_script_call.php'); ?>

  </body>
</html>