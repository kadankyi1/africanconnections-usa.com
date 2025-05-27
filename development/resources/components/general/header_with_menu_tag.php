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
                    <!--Brand--><a class="brand" href="<?php $app->getProtocol() . '://' . $app->getDomain(); ?>"><img src="<?php echo $root_folder; ?>src/images/aclogo.png" alt="African Connections Logo" class="aclogo"/></a>
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
                        <div class="unit-body"><a class="link-phone" href="<?php $app->getProtocol() . '://' . $app->getDomain() . print($page_controller->getOnePageDetails('referral_program')->url); ?>">Referral Program</a></div>
                      </div>
                    </li>
                    <li>
                      <div class="unit unit-spacing-xs">
                        <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                        <div class="unit-body"><a class="link-phone" href="tel:<?php echo $app->getPhone(); ?>"><?php echo $app->getPhone(); ?></a></div>
                      </div>
                    </li>
                  </ul>
                  <a class="button button-md button-default-outline-2 button-ujarak" href="<?php $app->getProtocol() . '://' . $app->getDomain() . print($page_controller->getOnePageDetails('customize_tour')->url); ?>">Customize A Tour</a>                                  

                  <button id="lnk" type="button" class="btn btn-primary hidecontent" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>


                </div>
              </div>
            </div>
            <div class="rd-navbar-main-outer">
              <div class="rd-navbar-main">
                <div class="rd-navbar-nav-wrap">
                  <!-- RD Navbar Nav-->
                  <ul class="rd-navbar-nav">
                    <li class="rd-nav-item <?php ($page_name == "Home") ?  print("active"):  ''; ?>">
                      <a class="rd-nav-link" href="<?php $app->getProtocol() . '://' . $app->getDomain() . print($page_controller->getOnePageDetails('home')->url); ?>">Home</a>
                    </li>
                    <li class="rd-nav-item <?php ($page_name == "Tours") ?  print("active"):  ''; ?>">
                      <a class="rd-nav-link" href="<?php $app->getProtocol() . '://' . $app->getDomain() . print($page_controller->getOnePageDetails('home')->url); ?>">Tours</a>
                    </li>
                    
                    <li class="rd-nav-item <?php ($page_name == "About Us") ?  print("active"):  ''; ?>">
                      <a class="rd-nav-link" href="<?php $app->getProtocol() . '://' . $app->getDomain() . print($page_controller->getOnePageDetails('about_us')->url); ?>">About Us</a>
                    </li>
                    <li class="rd-nav-item <?php ($page_name == "Reviews") ?  print("active"):  ''; ?>">
                      <a class="rd-nav-link" href="<?php $app->getProtocol() . '://' . $app->getDomain() . print($page_controller->getOnePageDetails('reviews')->url); ?>">Reviews</a>
                    </li>
                    <li class="rd-nav-item <?php ($page_name == "Make A Payment") ?  print("active"):  ''; ?>">
                      <a class="rd-nav-link" href="<?php $app->getProtocol() . '://' . $app->getDomain() . print($page_controller->getOnePageDetails('make_a_payment')->url); ?>">Make A Payment</a>
                    </li>
                    <li class="rd-nav-item <?php ($page_name == "Travel Insurance") ?  print("active"):  ''; ?>">
                      <a class="rd-nav-link" href="<?php $app->getProtocol() . '://' . $app->getDomain() . print($page_controller->getOnePageDetails('travel_insurance')->url); ?>">Travel Insurance</a>
                    </li>
                    <li class="rd-nav-item <?php ($page_name == "Blog") ?  print("active"):  ''; ?>">
                      <a class="rd-nav-link" href="<?php $app->getProtocol() . '://' . $app->getDomain() . print($page_controller->getOnePageDetails('blog')->url); ?>">Blog</a>
                    </li>
                    <li class="rd-nav-item <?php ($page_name == "Contact Us") ?  print("active"):  ''; ?>">
                      <a class="rd-nav-link" href="<?php $app->getProtocol() . '://' . $app->getDomain() . print($page_controller->getOnePageDetails('contact_us')->url); ?>">Contact Us</a>
                    </li>
                    <li class="rd-nav-item <?php ($page_name == "Youth Program") ?  print("active"):  ''; ?>">
                      <a class="rd-nav-link" href="<?php $app->getProtocol() . '://' . $app->getDomain() . print($page_controller->getOnePageDetails('youth_program')->url); ?>">Youth Program</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
