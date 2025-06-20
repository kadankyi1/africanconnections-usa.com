<?php
$root_folder = ''; // UNIVERSAL
require $root_folder . 'config/App.php';
use Database\Query;
use App\Controllers\PageController;
use App\Controllers\TourController;
use App\Controllers\BlogController;
use App\Controllers\TrackingController;

$app = new Config\App(); // UNIVERSAL
$root_folder = '../'; // UNIVERSAL
$page_name = "blog"; // UNIVERSAL
$page_controller = new PageController(); // UNIVERSAL
$blog_controller = new BlogController();
$tracking_controller = new TrackingController(); // UNIVERSAL
$error = true;
$article = array();
$articles = array();
$article_img_root_folder = '../../'; // UNIVERSAL

$page_this = $page_controller->getOnePageDetails($page_name);


//var_dump($_GET["id"]);
if(!empty($_GET["id"])){
    $article = $blog_controller->getSingleBlogArticle(intval($_GET["id"]));
    (count($article) == 1) ? $error = false: $error = true;
    $articles = $blog_controller->getBlogArticles("ORDER BY id DESC LIMIT 15");
    $tracking_controller->addUserActivity(0, "Viewed Blog Post - " . $article[0]['article_title'], "", ""); // Logging View
} 
//echo $article[0]['article_big_image']; 
//var_dump($articles);
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

      <!-- BLOG POST SECTION-->
        <?php if(!$error){ include('src/components/blog-post/articles_listing_section.php'); } else { ?>

            <section class="section section-sm bg-default">
            <div class="container height250px" >
                <br><br>
                <h3 class="oh-desktop"><span class="d-inline-block wow slideInDown">Article Not Found</span></h3>
            </div>
            </section>

        <?php } ?>

      <!-- FOOTER TAG-->
      <?php $tracking_controller->addUserActivity(0, "Viewed Page - Article Not Found", "", ""); include('src/components/general/footer_tag.php'); ?>

    </div>

    <!-- FOOTER TAG-->
    <?php include('src/components/general/bottom_script_call.php'); ?>

  </body>
</html>