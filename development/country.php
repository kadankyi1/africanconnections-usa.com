<?php
$root_folder = ''; // UNIVERSAL
require $root_folder . 'config/App.php';
use App\Controllers\PageController;
use App\Controllers\TourController;
use App\Controllers\CountryController;
use App\Controllers\TrackingController;

$app = new Config\App(); // UNIVERSAL
$page_name = "country"; // UNIVERSAL
$root_folder = '../'; // UNIVERSAL
$page_controller = new PageController(); // UNIVERSAL
$country_controller = new CountryController(); // UNIVERSAL
$tour_controller = new TourController(); // UNIVERSAL
$tracking_controller = new TrackingController(); // UNIVERSAL
$error = true;


//var_dump($_GET["id"]); exit;
if(!empty($_GET["id"])){
  $page_this = $page_controller->getOnePageDetails($_GET["id"] . "_country");
  $country_this = $country_controller->getOneCountry($_GET["id"]);
  $page_name = $page_this->name;
  //var_dump($page_this); var_dump($country_this); exit;
  if(!empty($country_this->country_name) && !empty($page_this->name)){
    $error = false;
    $page_banner_class = $country_this->country_banner;
    $page_banner_text = $country_this->country_name;
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


      <!--  tours-->
      <section class="section section-sm section-first bg-default text-md-left mt-0 pt-0">
        <div class="container">
          <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 wow fadeInRight" data-wow-delay=".1s">
                <!-- Bootstrap tabs-->
                <div class="tabs-custom tabs-horizontal tabs-line tabs-line-big tabs-line-style-2 text-center text-md-left" id="tabs-7">
                  <!-- Nav tabs-->
                  <ul class="nav nav-tabs">
                    <li class="nav-item" role="presentation"><a class="nav-link active" id="menu-tabs-7-1" href="#tabs-7-1" data-toggle="tab">ABOUT <?php echo strtoupper($country_this->country_name); ?></a></li>
                    <!--<li class="nav-item" role="presentation"><a class="nav-link" id="menu-tabs-7-2" href="#tabs-7-2" data-toggle="tab">ABOUT US</a></li>-->
                    <li class="nav-item" role="presentation"><a class="nav-link" id="menu-tabs-7-3" href="#tabs-7-3" data-toggle="tab">TOURS TO <?php echo strtoupper($country_this->country_name); ?></a></li>
                  </ul>
                  <!-- Tab panes-->
                  <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-7-1">
                      
                      <div class="col-sm-12 col-md-12  col-lg-12 wow fadeInRight">
                        <?php echo $country_this->country_description_html; ?>
                        

                        <?php 
                          if (!empty($country_this->country_video_urls)){
                            echo "<br><br><h4>VIDEOS OF GHANA AND RECENT TOURS</h4>" . $country_this->country_video_urls;
                          }
                        
                        ?>
                        
                        
                      </div>
                    </div>

                    <div class="tab-pane fade" id="tabs-7-3">
                      <div class="row">
                        <!-- TOURS LISTING -->
                        <?php 
                          foreach ($country_controller->getCountryTours($country_this->country_name) as $key => $tour) { 
                              $this_tour = (object) $tour;//var_dump($this_tour);
                              include('src/components/general/tourcard.php');
                              echo "<span><br></span>";
                          }
                        ?>
                      </div>
                    </div>

                  </div>
                </div>
            </div>
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