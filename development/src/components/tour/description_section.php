      <!--  tours-->
      <section class="section section-sm section-first bg-default text-md-left mt-0 pt-0">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-9 wow fadeInRight  text-md-left " data-wow-delay=".1s">
              <h3><?php echo $tour_this->tour_name;?></h3>
                <!-- Bootstrap tabs-->
                <div class="tabs-custom tabs-horizontal tabs-line tabs-line-big tabs-line-style-2 text-center text-md-left" id="tabs-7">
                  <!-- Nav tabs-->
                  <ul class="nav nav-tabs">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-7-1" data-toggle="tab">TOUR INTRO</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-7-2" data-toggle="tab">TOUR HIGHLIGHTS</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-7-3" data-toggle="tab">TOUR PACKAGE</a></li>
                  </ul>
                  <!-- Tab panes-->
                    <div class="tab-content  text-md-left ">
                        <div class="tab-pane fade show active" id="tabs-7-1">
                            <p>
                                <?php echo $tour_this->tour_full_description_html; ?>
                                <strong>Date: </strong> <?php echo $tour_this->tour_date; ?> <strong>(<?php echo $tour_this->tour_duration; ?>)</strong>
                                <br><br>
                                <strong>Price: </strong> Only <?php echo $tour_this->tour_price; ?> per person, with double room occupancy, without air-fare 

                            </p>
                        </div>
                        <div class="tab-pane fade" id="tabs-7-2">
                            <p>
                                <strong>Find detailed tour information in our brochure. <a class="link-aemail" href="<?php echo $root_folder .  "resources/" . $tour_this->tour_brochure_url ?>">Download our <?php echo $tour_this->tour_name; ?> tour brochure.</a></strong>

                                
                                <br><br><strong><a class="link-aemail">Price: Only <?php echo $tour_this->tour_price; ?> per person, with double room occupancy, without air-fare</a></strong>

                                <br><br>
                                <?php echo $tour_this->tour_highlights_description_html; ?>
                            </p>
                        </div>
                        <div class="tab-pane fade" id="tabs-7-3">
                            <strong><a class="link-aemail" href="#">Price: Only $3,699 per person, with double room occupancy, without air-fare</a></strong>
                            <br><br>

                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6 wow fadeInRight" data-wow-delay=".1s">
                                <p>
                                    <?php echo $tour_this->tour_package_includes_description_html; ?>
                                </p>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 wow fadeInRight" data-wow-delay=".1s">
                                <p>
                                    <?php echo $tour_this->tour_package_excludes_description_html; ?>
                                </p>
                                </div>
                            </div>
                        </div>
                    
                        <div class="group-md group-middle texttoleft">
                        <a class="button button-secondary button-pipaluk" href="tel:<?php echo $app->getPhone(); ?>">Call For Details</a>
                        <a class="button button-warning  button-pipaluk" href="mailto:yourfriendsemail@example.com?subject=You Might Like This Tour&body=Hi,I found this tour and thought you might like it <?php echo $app->getProtocol() . '://' . $app->getDomain() . $page_controller->getOnePageDetails($tour_this->tour_page_url)->url; ?>">Send To A Friend <span class="icon fa fa-share-alt fa-5x maginallsides0px"></span></a>
                        <a class="button button-warning  button-pipaluk texttogreen"  href="<?php echo $root_folder . "resources/" . $tour_this->tour_brochure_url ?>">Open And Print Brochure <span class="icon fa fa-print fa-5x maginallsides0px"></span></a>
                        </div>
                    </div>
                </div>

                <br>
                <div class="main">
                    <hr>
                    <div class="container imagegalleryholder">
                        <?php foreach ($tour_controller->getTourGalleryPhotos($tour_this->tour_image_links) as $key => $this_photo) { include('../components/tour/tour_gallery_photo.php');} ?>
                    </div>

                </div>
            </div>

            <div class="col-sm-12 col-md-3 col-lg-3 wow fadeInRight quickqinquiryform" data-wow-delay=".1s">
              <div class="form-head quickqinquiryformhead">
                <img src="<?php echo $root_folder ?>resources/img/general/avatar-circle.jpg" alt="CEO Avatar Photo" class="avatarheight">
                <span class="howcanwehelptext">How Can We Help?</span>
              </div>

              <form id="inquiry_form" action="serverside/joinlist.php" method="post" class="paddingallsides10px">
                <input type="hidden" id="tourname_filled" name="tourname_filled" readonly value="PANAFEST, AFRICAN FESTIVAL TOUR"/>
                <div class="form-group hidecontent">
                  <input type="text" name="wtf" id="wtf">
                  <input type="text" name="g-recaptcha-response" id="g-recaptcha-1">
                </div>

                <div class="relative">
                  <input type="text" id="fullname_filled" name="fullname_filled" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                  <label for="fullname_filled" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Your Name</label>
                </div>
                <br>
                <div class="relative">
                  <input type="text" id="phone_filled" name="phone_filled" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                  <label for="phone_filled" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Phone</label>
                </div>
                <br>
                <div class="relative">
                  <input type="email" id="joineremail" name="joineremail" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                  <label for="joineremail" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Email</label>
                </div>
                <br>

                <div class="relative">
                  <select type="text" id="hearaboutus_filled" name="hearaboutus_filled" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                    <option value="None">None Selected</option>
                    <option value="Google Search">Google Search</option>
                    <option value="Friend Referral">Friend Referral</option>
                    <option value="FaceBook">FaceBook</option>
                    <option value="YouTube">YouTube</option>
                  </select>
                  <label for="hearaboutus_filled" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">How Did You Hear About Us</label>
                </div>
                <br>

                <div class="relative">
                  <textarea type="text" id="msg_filled" name="msg_filled" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " ></textarea>
                  <label for="msg_filled" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Message</label>
                </div>
                <br>

                <div class="form-group">
                  <div class="g-recaptcha hidevisibility" data-sitekey="6LebVZcpAAAAAM6qn9xfl2oa3wxeXLdVroT5z3Yq" data-callback="onSubmit" data-size="invisible"></div>
                </div>
                
                <p id="response_msg_holder" class="messagesenttext"><strong> Message Sent </strong></p>
                <div class="center textaligncenter">
                    <span onclick="validateRecaptchaSideForm()" type="submit" class="button button-secondary button-pipaluk">Send</span>
                </div>
                </form>
            </div>
          </div>
        </div>
      </section>
