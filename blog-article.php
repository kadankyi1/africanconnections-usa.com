<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// VARIABLES
$other_articles_array = array();

if(!empty($_GET["id"]) && intval($_GET["id"]) > 0){
  $article_id = intval($_GET["id"]);
  include("db/connect.php");
  if ($conn->connect_error) {
    $conn->close();
    $error = true;
    die();
  } else {
    $sql = "SELECT * FROM articles WHERE id = " . strval($article_id);
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        $article_title = $row["article_title"];
        $article_intro_text = $row["article_intro_text"];
        $article_text = $row["article_text"];
        $article_date = $row["article_date"];
        $article_author = $row["article_author"];
        $article_small_image = $row["article_small_image"];
        $article_big_image = $row["article_big_image"];
      }
    } else {
      $error = true;
    }  

    $sql = "SELECT article_title, article_date FROM articles ORDER BY id DESC LIMIT 3";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        array_push($other_articles_array, [$row["article_title"], $row["article_date"]]);
      }

    } 

    $conn->close();
  }

  //var_dump($other_articles_array);
} else {
  $error = true;
}
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!-- Google Tag Manager -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11128211156"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){window.dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('event', 'conversion', {
          'send_to': 'AW-11128211156/qcdrCNWW-tUYENSNrLop',
          'value': 25.0,
          'currency': 'USD'
      });
    </script>
    <!-- End Google Tag Manager -->

    <title><?php echo $article_title ?></title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="keywords" content="Black History Month, Black History Month Ghana, African Connections,African Connections USA, Travel To Ghana, Ghana Tour, Experience the wonder of Ghana, Prepare to be amazed in Ghana, Join African Festival Tour, Experience African culture, Join Black history month tour, Book now, experience Ghana, Best prices, great service, Affordable tour packages, Book now don't miss these tour, Small deposit saves your space, Trace your roots in Ghana, Let's customize a tour for you, Return to the motherland, Trace your African heritage, See wildlife in Ghana, Join one of our tours and experience the amazement of Ghana, Our tours allow you to experience a traditional African festival and the culture of Ghana, Return to the motherland and explore your African heritage, Explore Ghana's unique connections to African American history">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7CPoppins:400%7CTeko:300,400">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
  </head>
  <body>
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <!--
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"></div>
        </div>
        <p>Loading...</p>
      </div>
    </div>
    -->
    <div class="page">
      <header class="section page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-corporate" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="106px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
            <div class="rd-navbar-aside-outer">
              <div class="rd-navbar-aside">
                <!-- RD Navbar Panel-->
                <div class="rd-navbar-panel">
                  <!-- RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <!-- RD Navbar Brand-->
                  <div class="rd-navbar-brand">
                    <!--Brand--><a class="brand" href="index.html"><img src="images/aclogo.png" style="height: 55px; width: 144px;" alt=""/></a>
                  </div>
                </div>
                <div class="rd-navbar-aside-right rd-navbar-collapse">
                  <ul class="rd-navbar-corporate-contacts">
                    <!--
                      <li>
                      <div class="unit unit-spacing-xs">
                        <div class="unit-left"><span class="icon fa fa-clock-o"></span></div>
                        <div class="unit-body">
                          <p>09:00<span>am</span> — 05:00<span>pm</span></p>
                        </div>
                      </div>
                    </li>
                    -->
                    <li>
                      <div class="unit unit-spacing-xs">
                        <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                        <div class="unit-body"><a class="link-phone" href="tel:+18478939304">+1 (847) 893-9304</a></div>
                      </div>
                    </li>
                  </ul>
                  <a class="button button-md button-default-outline-2 button-ujarak" href="mailto:info@africanconnections-usa.com">Request A Quote</a>
                </div>
              </div>
            </div>
            <div class="rd-navbar-main-outer">
              <div class="rd-navbar-main">
                <div class="rd-navbar-nav-wrap">
                  <ul class="list-inline list-inline-md rd-navbar-corporate-list-social">
                    <!--<li><a class="icon fa fa-facebook" href="#"></a></li>
                    <li><a class="icon fa fa-twitter" href="#"></a></li>
                    <li><a class="icon fa fa-google-plus" href="#"></a></li>
                    <li><a class="icon fa fa-instagram" href="#"></a></li>
                    -->
                  </ul>
                  <!-- RD Navbar Nav-->
                  <ul class="rd-navbar-nav">
                    <li class="rd-nav-item"><a class="rd-nav-link" href="index.html">Home</a>
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="tours.html">Tours</a>
                    </li>
                    <li class="rd-nav-item">
                      <a class="rd-nav-link" href="about.html">Why Choose Us</a>
                    </li>
                    <li class="rd-nav-item">
                      <a class="rd-nav-link" href="reviews.html">Reviews</a>
                    </li>
                    <li class="rd-nav-item active">
                      <a class="rd-nav-link" href="blog-list.php">Blog</a>
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="https://square.link/u/T758e8mM">Make A Payment</a>
                    </li>
                    <li class="rd-nav-item">
                      <a class="rd-nav-link" href="travelinsurance.html">Travel Insurance</a>
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="contact-us.html">Contact Us</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>

    <?php if(!empty($article_intro_text) && empty($error)){ ?>
    <section class="blog-posts grid-system">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                <div class="col-lg-12">
                  <div class="blog-post">
                    <div class="blog-thumb">
                      <img src="<?php echo $article_big_image; ?>" alt="">
                    </div>
                    <div class="down-content">
                      <a><h4><?php echo $article_title; ?></h4></a>
                      <ul class="post-info">
                        <li><a><?php echo $article_author; ?></a></li>
                        <li><a><?php echo $article_date; ?></a></li>
                      </ul>
                      <p>
                      <?php echo $article_text; ?>
                      </p>
                      <div class="post-options">
                        <div class="row">
                          <div class="col-6">
                            
                          </div>
                          <!--
                            <div class="col-6">
                              <ul class="post-share">
                                <li><i class="fa fa-share-alt"></i></li>
                                <li><a href="#">Facebook</a>,</li>
                                <li><a href="#"> Twitter</a></li>
                              </ul>
                            </div>
                          -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="sidebar">
              <div class="row">
                <div class="col-lg-12">
                  <div class="sidebar-item recent-posts mt-0">
                    <div class="sidebar-heading mt-0">
                      <h2>Other Posts</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <?php for ($i=0; $i < count($other_articles_array); $i++) { ?>
                        <li>
                          <a href="blog-details.html">
                            <h5><?php echo $other_articles_array[$i][0] ?></h5>
                            <span><?php echo $other_articles_array[$i][1] ?></span>
                          </a>
                        </li>
                        <?php } ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php } else { ?>

    <section class="section section-sm bg-default">
      <div class="container" style="height: 250px;">
        <br><br>
        <h3 class="oh-desktop"><span class="d-inline-block wow slideInDown">Article Not Found</span></h3>
      </div>
    </section>

    <?php } ?>
      
      <!-- Different People-->
      <!-- Discover New Horizons-->
      <!--	Instagrram wondertour-->
      <footer class="section footer-corporate context-dark">
        <div class="footer-corporate-inset">
          <div class="container">
            <div class="row row-40 justify-content-lg-between">
              <div class="col-sm-6 col-md-12 col-lg-3 col-xl-4">
                <div class="oh-desktop">
                  <div class="wow slideInRight" data-wow-delay="0s">
                    <h6 class="text-spacing-100 text-uppercase">Phone</h6>
                    <ul class="footer-contacts d-inline-block d-sm-block">
                      <li>
                        <div class="unit">
                          <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                          <div class="unit-body"><a class="link-phone" href="tel:+18478939304">+1 (847) 893-9304</a></div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-12 col-lg-3 col-xl-4">
                <div class="oh-desktop">
                  <div class="wow slideInRight" data-wow-delay="0s">
                    <h6 class="text-spacing-100 text-uppercase">Mail</h6>
                    <ul class="footer-contacts d-inline-block d-sm-block">
                      <li>
                        <div class="unit">
                          <div class="unit-left"><span class="icon fa fa-envelope"></span></div>
                          <div class="unit-body"><a class="link-aemail" href="mailto:info@africanconnections-usa.com">info@africanconnections-usa.com</a></div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-12 col-lg-3 col-xl-4">
                <div class="oh-desktop">
                  <div class="wow slideInRight" data-wow-delay="0s">
                    <h6 class="text-spacing-100 text-uppercase">Address</h6>
                    <ul class="footer-contacts d-inline-block d-sm-block">
                        <div class="unit">
                          <div class="unit-left"><span class="icon fa fa-location-arrow"></span></div>
                          <div class="unit-body"><a class="link-location" href="#">160 Bartlett Plaza Number 8428
                            <br>Bartlett, Illinois 60103</a></div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!--
                <div class="col-sm-6 col-md-5 col-lg-3 col-xl-4">
                <div class="oh-desktop">
                  <div class="wow slideInDown" data-wow-delay="0s">
                    <h6 class="text-spacing-100 text-uppercase">Popular news</h6>
                    <article class="post post-minimal-2">
                      <p class="post-minimal-2-title"><a href="#">Your Personal Guide to 5 Best Places to Visit on Earth</a></p>
                      <div class="post-minimal-2-time">
                        <time datetime="2019-05-04">May 04, 2019</time>
                      </div>
                    </article>
                    <article class="post post-minimal-2">
                      <p class="post-minimal-2-title"><a href="#">Top 10 Hotels: Rating by Wonder Tour Travel Experts</a></p>
                      <div class="post-minimal-2-time">
                        <time datetime="2019-05-04">May 04, 2019</time>
                      </div>
                    </article>
                  </div>
                </div>
              </div>
              -->
            </div>
          </div>
        </div>
        <div class="footer-corporate-bottom-panel">
          <div class="container">
            <div class="row justfy-content-xl-space-berween row-10 align-items-md-center2">
              <div class="col-sm-6 col-md-4 text-sm-right text-md-center">
                <div>
                  <!--
                    <ul class="list-inline list-inline-sm footer-social-list-2">
                    <li><a class="icon fa fa-facebook" href="#"></a></li>
                    <li><a class="icon fa fa-twitter" href="#"></a></li>
                    <li><a class="icon fa fa-google-plus" href="#"></a></li>
                    <li><a class="icon fa fa-instagram" href="#"></a></li>
                    </ul>
                  -->
                </div>
              </div>
              <div class="col-sm-6 col-md-4 order-sm-first">
                <!-- Rights-->
                <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span><span>African Connections USA</span>. All Rights Reserved.</p>
              </div>
              <div class="col-sm-6 col-md-4 text-md-right">
                <p class="rights"><a href="https://www.africanconnections.biz/new/travel/_1terms.php" target="_blank">Terms & Conditions</a></p>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
    <div class="elfsight-app-56c0baaf-15bf-4139-ae0f-952721a02fab"></div>

  </body>
</html>