<?php
if(!empty($_GET["transactionId"]) && !empty($_GET["s"])){
  $message = '<p class="error-message">Payment failed.</p>';
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
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TP9NBVZQRL"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-TP9NBVZQRL');
      gtag('config', 'AW-16541429838');
    </script>
    <!-- End Google Tag Manager -->
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-TKNXWNL');</script>
      <!-- End Google Tag Manager -->

    <title>Make A Payment For A Tour | African Connections USA</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="description" content="Customize A Tour With African Connections. Send Customized Tour Details">
    <meta name="keywords" content="Customize A Tour With African Connections, African Connections USA, Tours Ghana,  Tours to Ghana, Tour Operator Ghana,Tour Operators Ghana, Ghana Tour Agency, Ghana Tour Agencies, Travel To Ghana, Ghana Tour, Experience Ghana">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="canonical" href="https://africanconnections-usa.com/pay.php"/>

    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7CPoppins:400%7CTeko:300,400">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!--src="https://secure.transactiongateway.com/token/collect.js"-->
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
    <!-- Meta Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '705561148188440');
      fbq('track', 'PageView');
    </script>
    <noscript><img  alt="facebook image" height="1" width="1" class="hidecontent" src="https://www.facebook.com/tr?id=705561148188440&ev=PageView&noscript=1"/></noscript>
    <!-- End Meta Pixel Code -->

    <script
    src="https://secure.magicpaygateway.com/token/Collect.js"
    data-tokenization-key="cGdNy3-GStb47-VaVWTC-H8hE7t"
    data-variant="inline"
    data-field-ccnumber-placeholder = '0000 0000 0000 0000'
    data-field-ccexp-placeholder = '10 / 22'
    data-field-cvv-placeholder= '123'
    data-custom-css = '{
      "display": "block",
      "width": "100%",
      "height": "calc(2.25rem + 2px)",
      "padding": "0.375rem 0.75rem",
      "font-size": "1rem",
      "line-height": "1.5",
      "color": "#495057",
      "background-color": "#fff",
      "background-clip": "padding-box",
      "border": "1px solid #ced4da",
      "border-radius": "0.25rem",
      "transition": "border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out"
    }'
    ></script>
    <link rel="stylesheet" href="css/pay.css">
  </head>
  <body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TKNXWNL"
  height="0" width="0" class="hidecontentandvisibility"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
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
                    <!--Brand--><a class="brand" href="index.html"><img src="images/aclogo.png" alt="African Connections Logo" class="aclogo"/></a>
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
                        <div class="unit-body"><a class="link-phone" href="/referral-program.html">Referral Program</a></div>
                      </div>
                    </li>
                    <li>
                      <div class="unit unit-spacing-xs">
                        <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                        <div class="unit-body"><a class="link-phone" href="tel:+18479563319">+1 (847) 956-3319</a></div>
                      </div>
                    </li>
                  </ul>
                  <a class="button button-md button-default-outline-2 button-ujarak" href="customize.html">Customize A Tour</a>                                  
                </div>
              </div>
            </div>
            <div class="rd-navbar-main-outer">
              <div class="rd-navbar-main">
                <div class="rd-navbar-nav-wrap">
                  <ul class="list-inline list-inline-md rd-navbar-corporate-list-social">
                    <!--
                      <li><a class="icon fa fa-facebook" href="#"></a></li>
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
                      <a class="rd-nav-link" href="about.html">About Us</a>
                    </li>
                    <li class="rd-nav-item">
                      <a class="rd-nav-link" href="reviews.html">Reviews</a>
                    </li>
                    <li class="rd-nav-item active"><a class="rd-nav-link" href="pay.php">Make A Payment</a>
                    </li>
                    <li class="rd-nav-item">
                      <a class="rd-nav-link" href="travelinsurance.html">Travel Insurance</a>
                    </li>
                    <li class="rd-nav-item">
                      <a class="rd-nav-link" href="blog-list.php">Blog</a>
                    </li>
                    <li class="rd-nav-item">
                      <a class="rd-nav-link" href="contact-us.html">Contact Us</a>
                    </li>
                    <li class="rd-nav-item">
                      <a class="rd-nav-link" href="youth-program.html">Youth Program</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <!-- Pic tours-->
      <!--
      <section class="breadcrumbs-custom-inset">
        <div class="breadcrumbs-custom context-dark bg-overlay-60">
          <div class="container">
            <h1 class="breadcrumbs-custom-title"><strong>MAKE A PAYMENT</strong></h1>
            <ul class="breadcrumbs-custom-path">
            </ul>
          </div>
          <div class="box-position abtpagebanner"></div>
        </div>
      </section>
    -->

      <!--  tours-->
      <section class="section section-sm bg-default mr-0 ml-0 mt-0 mb-0 pr-0 pl-0 pt-0 pb-0">
        <div class="container mt-0" >
          <div class="row row-30 justify-content-center  mt-0" style="background-color: #f2f2f2; padding: 5px 20px 15px 20px; border: 1px solid lightgrey; border-radius: 3px;">
            <div class="Checkout ofset-lg-3 col-sm-12 col-md-5 col-lg-5">
                <h2>Pay</h2>
                <div class="card-row">
                  <span class="visa"></span>
                  <span class="mastercard"></span>
                  <span class="amex"></span>
                  <span class="discover"></span>
                </div>
                <?php echo $message; ?>          
                <form  action="serverside/payment-process.php" id="payform" method="post" class="validate">
                  <div class="form-group textalignleft">
                  <div class="form-group hidecontent">
                    <input type="text" name="wtf" id="wtf">
                  </div>
                    <label for="ordTour"><strong>Choose Tour</strong></label>
                    <div class="select-wrapper mr-0 ml-0 mt-0 mb-0 pr-0 pl-0 pt-0 pb-0">
                      <select class="select" id="ordTour" name="refcode" required>
                        <option value="">Choose Tour</option>
                        <option value="Chi Town Travelers Ghana 2025">Chi Town Travelers Ghana 2025</option>
                        <option value="Egypt October 2025">Egypt October 2025</option>
                        <option value="Juneteenth Ghana Tour 2025">Juneteenth Ghana Tour 2025</option>
                        <option value="Bradford Ghana July 2025 Tour">Bradford Ghana July 2025 Tour</option>
                        <option value="Ghana Festival Tour September 2025">Ghana Festival Tour September 2025</option>
                        <option value="PANAFEST Ghana July 2025">PANAFEST Ghana July 2025</option>
                        <option value="November 2025 Ghana">November 2025 Ghana</option>
                        <option value="February 2026 Ghana Black History Month">February 2026 Ghana Black History Month</option>
                        <option value="Ghana, Togo, Benin September 2025">Ghana, Togo, Benin September 2025</option>
                        <option value="Ghana, Togo, Benin January 2026">Ghana, Togo, Benin January 2026</option>
                        <option value="The Cyres Family Tour">The Cyres Family Tour</option>
                        <option value="South Africa March 2026">South Africa March 2026</option>
                        <option value="Grafton Johnson Ghana July 2026 Tour">Grafton Johnson Ghana July 2026 Tour</option>
                        <option value="Kenya, Tanzania, Zanzibar August 2026">Kenya, Tanzania, Zanzibar August 2026</option>
                        <option value="Ethiopia And Ghana September 2026">Ethiopia And Ghana September 2026</option>
                        <option value="Senegal September 2026">Senegal September 2026</option>
                        <option value="3-G (Ghana, Grand and Glorious) 2026">3-G (Ghana, Grand and Glorious) 2026</option>
                        <option value="Bucket List Options Ghana 2026">Bucket List Options Ghana 2026</option>
                        <option value="Pan-Cultural Adventures Ghana 2027">Pan-Cultural Adventures Ghana 2027</option>
                        <option value="Other">Other</option>
                      </select>
                    </div>
                    <br>
                    <label for="regform"><strong>Have You Completed Your Tour Registration Form</strong></label>
                    <div class="select-wrapper mr-0 ml-0 mt-0 mb-0 pr-0 pl-0 pt-0 pb-0">
                      <select class="select" id="regform" name="regform" required>
                      <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group textalignleft">
                    <label for="ordAmt"><strong>Amount ($)</strong></label>
                    <input type="number" class="form-control" id="ordAmt" name="amt" placeholder="Amount ($)" min="10" required>
                  </div>

                  <div class="form-group textalignleft">
                    <label for="ordEmail"><strong>Email</strong></label>
                    <input type="email" class="form-control" id="ordEmail" name="payeremail" placeholder="Email" required>
                  </div>
                  <div class="row mr-0 ml-0 mt-0 mb-0">
                    <div class="col-sm-12 col-md-5 col-lg-5  form-group textalignleft mt-0 pr-0 pl-0 pt-0">
                      <label for="ordCCFirstName"><strong>First Name</strong></label>
                      <input type="text" class="form-control" id="ordCCFirstName" name="fname" placeholder="First Name" required>
                    </div>
                    <div class="col-sm-12 offset-md-2 offset-lg-2 col-md-5 col-lg-5 form-group textalignleft mt-0 mb-0 pr-0 pl-0 pt-0 pb-0">
                      <label for="ordCCLastName"><strong>Last Name</strong></label>
                      <input type="text" class="form-control" id="ordCCLastName" name="lname" placeholder="Last Name" required>
                    </div>
                  </div>
                  <div class="form-group textalignleft">
                    <label for="ordCCNumber"><strong>Card Number</strong></label>
                    <div class="cc-container">
                      <div id="ccnumber"></div>
                      <div class="cc-icon"></div>
                    </div>
                  </div>

                  <div class="row mr-0 ml-0 mt-0 mb-0">
                    <div class="col-sm-12 col-md-3 col-lg-3  form-group textalignleft mt-0 pr-0 pl-0 pt-0">
                      <label for="ordCCExpiration"><strong>Expiration</strong></label>
                      <div id="ccexp"></div>
                    </div>
                    <div class="offset-md-4 offset-lg-4 col-sm-12 col-md-3 col-lg-3 form-group textalignleft mt-0 mb-0 pr-0 pl-0 pt-0 pb-0">
                        <label for="ordCCCVV"><strong>CVV Code</strong></label>
                        <div id="cvv"></div>
                    </div>
                  </div>
                  
                  <div class="g-recaptcha" data-sitekey="6LebVZcpAAAAAM6qn9xfl2oa3wxeXLdVroT5z3Yq" data-callback="recaptchaCheckCompleted" data-expired-callback="recaptchaCheckExpired"></div>

                  <div class="form-group hideconten mt-4" id="finalbtnholder">
                  <button class="btn btn-primary btn-lg btn-block"  id="payButton" disabled>PAY</button>
                  </div>

                </form>
              <div id="paymentTokenInfo"></div>
            </div>
          </div>
        </div>
      </section>
      
      <!-- Different People-->
      <!-- Discover New Horizons-->
      <!--	Instagrram wondertour-->
      <footer class="section footer-corporate context-dark">
        <div class="footer-corporate-inset">
          <div class="container">
            <div class="row row-40 justify-content-lg-between">
              <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                <div class="oh-desktop">
                  <div class="wow slideInRight" data-wow-delay="0s">
                    <h6 class="text-spacing-100 text-uppercase">You Can Trust Us</h6>
                    <ul class="footer-contacts d-inline-block d-sm-block">
                      <li>
                        <div class="unit">
                          <div class="unit-body">
                            <a class="d-flex justify-content-center" href="https://www.bbb.org/us/il/bartlett/profile/tour-operators/african-connections-north-america-inc-0654-1000098865" >
                              <img class="center-block" src="img/general/bbb/bbb.png" alt="BBB Seal" />
                            </a>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-12 col-lg-3 col-xl-4">
                <div class="oh-desktop">
                  <div class="wow slideInRight" data-wow-delay="0s">
                    <h6 class="text-spacing-100 text-uppercase">Address</h6>
                    <ul class="footer-contacts d-inline-block d-sm-block">
                        <li>
                          <div class="unit">
                            <div class="unit-left"><span class="icon fa fa-location-arrow"></span></div>
                            <div class="unit-body"><a class="link-location" href="#">1600 Golf Road, Suite 1200
                            <br>Rolling Meadows, Illinois 60008</a></div>
                          </div>
                      </li>
                      <li>
                        <div class="unit">
                          <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                          <div class="unit-body">
                            <a class="link-phone" href="tel:+18479563319"> +1 (847) 956-3319</a>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-12 col-lg-3 col-xl-4">
                <div class="oh-desktop">
                  <div class="wow slideInRight" data-wow-delay="0s">
                    <h6 class="text-spacing-100 text-uppercase">Socials</h6>
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
                      <li>
                        <div class="unit">
                          <div class="unit-left"><span class="icon fa fa-youtube"></span></div>
                          <div class="unit-body"><a class="link-aemail" target="_blank" href="https://www.youtube.com/channel/UCdd88jhlqg-85Ox2AAWEmtA">@AfricanConnections</a></div>
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
                <p class="rights texttowhite"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span><span>African Connections North America.</span>. All Rights Reserved.</p>
              </div>
              <div class="col-sm-6 col-md-4 text-md-right">
                <p class="rights texttowhite"><a href="terms.html" target="_blank">Terms & Conditions</a></p>
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

  <script>
    function recaptchaCheckCompleted() { 
      const recaptcha_box_checked = (grecaptcha.getResponse()) ? true : false;

      if (recaptcha_box_checked) { 
        $("#payButton").attr('disabled', false);
      } else {
        alert("You must check the 'I am not a robot' box to proceed!");
        $("#payButton").attr('disabled', true);
        return false;
      }
    }

    function recaptchaCheckExpired() {
      $("#payButton").attr('disabled', true);
    }
  </script>
</html>


