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
                              <img class="center-block" src="<?php echo $root_folder; ?>src/img/general/bbb/bbb.png" alt="BBB Seal"/>
                            </a>
                          </div>
                        </div>
                      </li>
                    </ul>
                    <br><br><br>
                    <h6 class="text-spacing-100 text-uppercase">USEFUL LINKS</h6>
                    <ul class="footer-contacts d-inline-block d-sm-block">
                      <li>
                        <div class="unit">
                          <div class="unit-body">
                            <a class="d-flex justify-content-center" href="registration.php" >
                              Tour Registration
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
              <div class="col-sm-6 col-md-12 col-lg-3 col-xl-4">
                <div class="oh-desktop">
                  <div class="wow slideInRight" data-wow-delay="0s">
                    <h6 class="text-spacing-100 text-uppercase">Subscribers List</h6>

                    <p>                      <strong>Get $100 off any tour you book with us.</strong>
                      <br>Join our Subscriber list, receive our Monthly Newsletter, special discounts, travel updates and more...
                      <br><a href="terms.html#newsletterpromo" class="tandcstext">Terms & Conditions Apply</a>
                    </p>
                    <form class="max-w-sm mx-auto" action="serverside/joinlist.php" method="POST" id="newsletter_form">
                      <br>
                      <div class="form-group hidecontent">
                        <input type="text" name="wtf" id="wtf">
                        <input type="text" name="g-recaptcha-2" id="g-recaptcha-2">
                      </div>
                      <div class="mb-2">
                        <label for="newsletter_firstname" class="block mb-2 text-sm font-medium text-gray-50 dark:text-white">First Name</label>
                        <input type="text" id="newsletter_firstname" name="fullname_filled" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="First Name" required />
                      </div>
                      <div class="mb-2 mt-4">
                        <label for="newsletter_email" class="block mb-2 text-sm font-medium text-gray-50 dark:text-white">Email</label>
                        <input type="email" id="newsletter_email" name="joineremail" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5" placeholder="name@yourmail.com" required />
                      </div>
                      <div class="g-recaptcha hidevisibility" data-sitekey="6LebVZcpAAAAAM6qn9xfl2oa3wxeXLdVroT5z3Yq" data-callback="onSubmit" data-size="invisible"></div>
                      <span id="submit_newsletter_signup" onclick="validateRecaptchaNewsletter()" class="button button-black-outline button-ujarak">Join</span>
                    </form>
                    
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
