<?php
//INCLUDES
include("db/connect.php");

// VARIABLES
$articles_array = array();

if ($conn->connect_error) {
  $conn->close();
  $error = true;
  die();
} else {
  $sql = "SELECT id, article_title, article_intro_text, article_small_image, article_date, article_author FROM articles ORDER BY id DESC LIMIT 3";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      array_push($articles_array, [$row["id"], $row["article_title"], $row["article_intro_text"], $row["article_small_image"], $row["article_date"], $row["article_author"]]);
    }
    
  } 
  $conn->close();

  //var_dump($articles_array);
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

    <title>Blog</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="keywords" content="Tours Ghana, Tour Operator Ghana, African Connections,African Connections USA, Travel To Ghana, Ghana Tour, Experience the wonder of Ghana, Prepare to be amazed in Ghana, Join African Festival Tour, Experience African culture, Join Black history month tour, Book now, experience Ghana, Best prices, great service, Affordable tour packages, Book now don't miss these tour, Small deposit saves your space, Trace your roots in Ghana, Let's customize a tour for you, Return to the motherland, Trace your African heritage, See wildlife in Ghana, Join one of our tours and experience the amazement of Ghana, Our tours allow you to experience a traditional African festival and the culture of Ghana, Return to the motherland and explore your African heritage, Explore Ghana's unique connections to African American history">
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
                  </ul>
                  <!-- RD Navbar Nav-->
                  <ul class="rd-navbar-nav">
                    <li class="rd-nav-item"><a class="rd-nav-link" href="index.html">Home</a>
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="tours.html">Tours</a>
                    </li>
                    <li class="rd-nav-item">
                      <a class="rd-nav-link" href="about.html">About Us</a>
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
      <!-- Hot tours-->
      
      <section class="blog-posts grid-system">
        <div class="container">
            <div class="row">

            <?php for ($i=0; $i < count($articles_array); $i++) { ?>
              <div class="col-md-4 col-sm-6">
                <div class="blog-post">
                  <a href="blog-article.php?id=<?php echo $articles_array[$i][0];?>">
                    <div class="blog-thumb">
                      <img src="<?php echo $articles_array[$i][3];?>" alt="">
                    </div>
                  </a>
                  <div class="down-content">
                    <a href="blog-article.php?id=<?php echo $articles_array[$i][0];?>">
                      <h4><?php echo $articles_array[$i][1];?></h4>
                      
                      <p style="color: black;">
                        <?php echo $articles_array[$i][2];?>
                      </p>
                    </a>
                    <ul class="post-info">
                      <li><?php echo $articles_array[$i][5];?></li>
                      <li>
                        <?php 
                          $date=date_create($articles_array[$i][4]);
                          echo date_format($date,"m.d.Y H:i");
                        ?>
                      </li>
                      
                    </ul>
                  </div>
                </div>
              </div>
            <?php } ?>

            
              <!--
              <div class="col-md-4 col-sm-6">
                <div class="blog-post">
                  <a href="blog-article.php?id=2">
                    <div class="blog-thumb">
                      <img src="/img/blog/bloglist_article_2_banner.jpg" alt="">
                    </div>
                  </a>
                  <div class="down-content">
                    <a href="blog-article.php?id=2">
                      <h4>Cultural Soirees: A Kaleidoscope of Welcome and Farewell Dinners Unveiled</h4>
                      
                      <p style="color: black;">As the golden sun dips below the horizon, casting a warm amber glow, a journey unfolds...</p>
                    </a>
                    <ul class="post-info">
                      <li>African Connections</li>
                      <li>10.16.2023 10:20</li>
                      
                    </ul>
                  </div>
                </div>
              </div>
              
              <div class="col-md-4 col-sm-6">
                <div class="blog-post">
                  <a href="blog-article.php?id=3">
                    <div class="blog-thumb">
                      <img src="/img/blog/bloglist_article_3_banner.jpg" alt="">
                    </div>
                  </a>
                  <div class="down-content">
                    <a href="blog-article.php?id=3">
                      <h4>Birth of a New Identity: My Journey through a Traditional Asante Naming Ceremony</h4>
                      
                      <p style="color: black;">I stood at the threshold of an extraordinary cultural experience: a
                        Traditional Asante Naming Ceremony...</p>
                    </a>
                    <ul class="post-info">
                      <li>African Connections</li>
                      <li>10.19.2023 10:20</li>
                      
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="blog-post">
                  <a href="blog-article.php">
                    <div class="blog-thumb">
                      <img src="https://demo.phpjabbers.com/free-web-templates/blog-website-template-172/assets/images/blog-4-720x480.jpg" alt="">
                    </div>
                  </a>
                  <div class="down-content">
                    <a href="blog-article.php">
                      <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h4>
                      
                      <p style="color: black;">Nullam nibh mi, tincidunt sed sapien ut, rutrum hendrerit velit. Integer auctor a mauris sit amet eleifend.</p>
                    </a>
                    <ul class="post-info">
                      <li>John Doe</li>
                      <li>10.07.2020 10:20</li>
                      
                    </ul>
                  </div>
                </div>
              </div>
              
              <div class="col-md-4 col-sm-6">
                <div class="blog-post">
                  <a href="blog-article.php">
                    <div class="blog-thumb">
                      <img src="https://demo.phpjabbers.com/free-web-templates/blog-website-template-172/assets/images/blog-4-720x480.jpg" alt="">
                    </div>
                  </a>
                  <div class="down-content">
                    <a href="blog-article.php">
                      <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h4>
                      
                      <p style="color: black;">Nullam nibh mi, tincidunt sed sapien ut, rutrum hendrerit velit. Integer auctor a mauris sit amet eleifend.</p>
                    </a>
                    <ul class="post-info">
                      <li>John Doe</li>
                      <li>10.07.2020 10:20</li>
                      
                    </ul>
                  </div>
                </div>
              </div>
              
              <div class="col-md-4 col-sm-6">
                <div class="blog-post">
                  <a href="blog-article.php">
                    <div class="blog-thumb">
                      <img src="https://demo.phpjabbers.com/free-web-templates/blog-website-template-172/assets/images/blog-4-720x480.jpg" alt="">
                    </div>
                  </a>
                  <div class="down-content">
                    <a href="blog-article.php">
                      <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h4>
                      
                      <p style="color: black;">Nullam nibh mi, tincidunt sed sapien ut, rutrum hendrerit velit. Integer auctor a mauris sit amet eleifend.</p>
                    </a>
                    <ul class="post-info">
                      <li>John Doe</li>
                      <li>10.07.2020 10:20</li>
                      
                    </ul>
                  </div>
                </div>
              </div>
              
              <div class="col-md-4 col-sm-6">
                <div class="blog-post">
                  <a href="blog-article.php">
                    <div class="blog-thumb">
                      <img src="https://demo.phpjabbers.com/free-web-templates/blog-website-template-172/assets/images/blog-4-720x480.jpg" alt="">
                    </div>
                  </a>
                  <div class="down-content">
                    <a href="blog-article.php">
                      <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h4>
                      
                      <p style="color: black;">Nullam nibh mi, tincidunt sed sapien ut, rutrum hendrerit velit. Integer auctor a mauris sit amet eleifend.</p>
                    </a>
                    <ul class="post-info">
                      <li>John Doe</li>
                      <li>10.07.2020 10:20</li>
                    </ul>
                  </div>
                </div>
              </div>
              -->
              
              
            </div>
        </div>
      </section>
      <!-- Discover New Horizons-->
      <!--	Instagrram wondertour-->
      <footer class="section footer-corporate context-dark">
        <div class="footer-corporate-inset">
          <div class="container">
            <div class="row row-40 justify-content-lg-between">
              <div class="col-sm-6 col-md-12 col-lg-3 col-xl-4">
                <div class="oh-desktop">
                  <div class="wow slideInRight" data-wow-delay="0s">
                    <h6 class="text-spacing-100 text-uppercase">Contact</h6>
                    <ul class="footer-contacts d-inline-block d-sm-block">
                      <li>
                        <div class="unit">
                          <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                          <div class="unit-body">
                            <a class="link-phone" href="tel:+18478939304"> +1 (847) 893-9304</a>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="unit">
                          <div class="unit-left"><span class="icon fa fa-envelope"></span></div>
                          <div class="unit-body">
                            <a class="link-aemail" href="mailto:info@africanconnections-usa.com">info@africanconnections-usa.com</a>
                          </div>
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
              <div class="col-sm-6 col-md-12 col-lg-3 col-xl-4">
                <div class="oh-desktop">
                  <div class="wow slideInRight" data-wow-delay="0s">
                    <h6 class="text-spacing-100 text-uppercase">Social</h6>
                    <ul class="footer-contacts d-inline-block d-sm-block">
                      <li>
                        <div class="unit">
                          <div class="unit-left"><span class="icon fa fa-facebook"></span></div>
                          <div class="unit-body"><a class="link-aemail" target="_blank" href="https://facebook.com/AfricanConnectionsUSA">AfricanConnectionsUSA</a></div>
                        </div>
                      </li>
                      <li>
                        <div class="unit">
                          <div class="unit-left"><span class="icon fa fa-instagram"></span></div>
                          <div class="unit-body"><a class="link-aemail" target="_blank" href="https://instagram.com/African_connections">African_connections</a></div>
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
                <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span><span>African Connections North America.</span>. All Rights Reserved.</p>
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