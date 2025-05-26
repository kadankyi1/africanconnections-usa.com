<?php
require '../../config/app.php';
use App\Controllers\PageController;
use App\Controllers\TourController;

$app = new Config\App();
$root_folder = '../../';
$page_name = "Home";
$page_controller = new PageController();
$tour_controller_1 = new TourController();
$tour_controller_2 = new TourController();
$tour_controller_3 = new TourController();

$page = $page_controller->getPageDetails('home');
$tour_black_history = $tour_controller_1->getOneTour(1);
$tour_egypt = $tour_controller_2->getOneTour(5);
$tour_return_to_the_motherland = $tour_controller_3->getOneTour(6);


?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<!-- HEAD TAG CONTENTS -->
<?php include('../components/home/head_tag.php'); ?>

<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TKNXWNL"
  height="0" width="0" class="hidecontentandvisibility"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <?php include('../components/home/newsletter_modal_div.php'); ?>

    <div class="page">

      <!-- HEADER SECTION-->
      <?php include('../components/general/header_with_menu_tag.php'); ?>

      <!-- CAROUSEL SECTION-->
      <?php include('../components/home/carousel_section.php'); ?>

      <!-- COUNTRIES SECTION-->
      <?php include('../components/home/countries_section.php'); ?>

      <section class="section section-sm pb-0 pt-0 mt-0 mb-0">
        <div class="container">
          <h3 class="pb-0 pt-0 mt-0 mb-0">Why Choose Us</h3>
          <div class="row row-30 pb-0 pt-2 mt-0 mb-0">
            <div class="col-sm-12 col-lg-6">
              <article class="box-icon-classic">
                <div class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                  <div class="unit-left">
                    <div class="box-icon-classic-icon fl-bigmug-line-circular220"></div>
                  </div>
                  <div class="unit-body">
                    <h5 class="box-icon-classic-title"><a href="#">Exceptional Service</a></h5>
                    <p class="box-icon-classic-text texttoblack">We pride ourselves on our "concierge" service. We will assist you as you prepare for your trip and we are with you on the ground everyday of your visit to Africa. <br><br>Tour Africa with us and prepare to be amazed!!!</p>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-sm-12 col-lg-6">
              <article class="box-icon-classic">
                <div class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                  <div class="unit-left">
                    <div class="box-icon-classic-icon fl-bigmug-line-wallet26"></div>
                  </div>
                  <div class="unit-body">
                    <h5 class="box-icon-classic-title"><a href="#">Best Prices & Flexible Payment Plans</a></h5>
                    <p class="box-icon-classic-text texttoblack">Reserve your spot on any tour with only a $250 deposit. <br><br> We offer affordable installment payment plans to fit every budget.</p>
                  </div>
                </div>
              </article>
            </div>            
          </div>
        </div>
      </section>
      
      <!-- TRENDING TOURS & ABOUT US SECTION-->
      <?php include('../components/home/trending_tours_section.php'); ?>

      <!-- FOOTER TAG-->
      <?php include('../components/home/footer_tag.php'); ?>

    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="<?php echo $root_folder; ?>src/js/core.min.js"></script>
    <script src="<?php echo $root_folder; ?>src/js/script.js"></script>
    <script type="text/javascript">
      var form_used = "0";
    //localStorage.setItem("popupclosed", "no");
    function onSubmit(token) {
      if(form_used.trim() == "1"){
          console.log("1 token : " + token);
          console.log("form submitted Popup");
          localStorage.setItem("popupclosed", "yes");
          //sendForm("joinlist", "popupform", "")
          $("#g-recaptcha-1").val(token);

          //console.log($('#fullname_filled').val().trim());
          //console.log($('#joineremail').val().trim());
          $("#popupform").submit();
      } else if(form_used.trim() == "2"){
          console.log("2 token : " + token);
          console.log("form submitted Footer");
          document.getElementById("g-recaptcha-2").value = token;
          //$("#g-recaptcha-2").val(token);
          
          //console.log($('#newsletter_firstname').val().trim());
          //console.log($('#newsletter_email').val().trim());
          //sendForm("joinlist", "newsletter_form", "")
          $("#newsletter_form").submit();

      }
    }

    function validateRecaptchaPopUp() {
        form_used = "1";
        if($('#fullname_filled').val().trim() != "" && $('#joineremail').val().trim() != ""){
          var response = grecaptcha.execute();
          console.log(response);
        } else {
              alert("Please complete the form");
        }
    }
    
    function validateRecaptchaNewsletter() {
        form_used = "2";
        if($('#newsletter_email').val().trim() != "" && $('#newsletter_firstname').val().trim() != ""){
          var response = grecaptcha.execute();
          console.log(response);
        } else {
              alert("Please complete the form");
        }
    }

    
    
    </script>
    <div class="elfsight-app-56c0baaf-15bf-4139-ae0f-952721a02fab"></div>
    <!--<script src="https://dashboard.chatfuel.com/integration/landing-wa-widget.js" async defer data-prefilled="I would like to learn more about your tours" data-welcome="Hello, how can I help you today?" data-phone="17085575041"></script>-->

  </body>
</html>