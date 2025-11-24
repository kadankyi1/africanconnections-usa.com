<?php
$root_folder = ''; // UNIVERSAL
require $root_folder . 'config/App.php';
use App\Controllers\PageController;
use App\Controllers\TourController;
use App\Controllers\GenericController;
use App\Controllers\TrackingController;

$app = new Config\App(); // UNIVERSAL
$page_name = "campaign"; // UNIVERSAL
$root_folder = '../'; // UNIVERSAL
$page_controller = new PageController(); // UNIVERSAL
$tour_controller = new TourController(); // UNIVERSAL
$generic_controller = new GenericController(); // UNIVERSAL
$tracking_controller = new TrackingController(); // UNIVERSAL
$error = true;
$page_this = $page_controller->getOnePageDetails($page_name);
$main_heading = "";
$intro_text = "";
$page_banner_text = "";

//var_dump($_GET["id"]); exit;
//echo "<br><br>";
if(!empty($_GET["id"])){
  $campaign_this = $generic_controller->getCampaign($_GET["id"]);
  
  //var_dump($campaign_this); exit;
  if(!empty($campaign_this->campaign_name)){
    $error = false;
    $page_banner_class = $campaign_this->campaign_banner_class;
    $main_heading = $campaign_this->campaign_heading;
    $intro_text = $campaign_this->campaign_body;
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
      <?php include('src/components/general/header_with_menu_tag.php'); ?>

      <!-- TOP SECTION-->
      <?php include('src/components/general/top_banner_section.php'); ?>

      <!-- TOP SECTION-->
      <?php include('src/components/general/top_description_with_text.php'); ?>

      <!-- TOURS LISTING SECTION-->
      <section class="section section-sm bg-default pb-0">
            <div class="container mt-0 pt-0">
                <div class="row row-sm row-40 row-md-50">
                    <?php foreach ($tour_controller->getToursInAdCampaignInAlphabeticalOrder($_GET["id"], false, false) as $key => $tour) { 
                            $this_tour = (object) $tour;//var_dump($this_tour);
                            include('src/components/general/tourcard.php'); 
                        }
                    ?>
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