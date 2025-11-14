<section class="section section-sm bg-default mr-0 ml-0 mt-0 mb-0 pr-0 pl-0 pt-0 pb-0">
        <div class="container mt-0" >
          <div class="row row-30 justify-content-center  mt-0" style="background-color: #f2f2f2; padding: 5px 20px 15px 20px; border: 1px solid lightgrey; border-radius: 3px;">
            <div class="Checkout ofset-lg-2 col-sm-12 col-md-6 col-lg-6">
                <h2>Pay</h2>
                <div class="card-row">
                  <span class="visa"></span>
                  <span class="mastercard"></span>
                  <span class="amex"></span>
                  <span class="discover"></span>
                </div>
                <?php //echo $message; ?>          
                <form  action="<?php echo $app->getProtocol() . '://' . $app->getDomain() . $page_controller->getOnePageDetails('thank_you_payment')->url; ?>" id="payform" method="post" class="validate">
                  <div class="form-group textalignleft">
                  <div class="form-group hidecontent">
                    <input type="text" name="wtf" id="wtf">
                  </div>
                    <?php if(!empty($preset_tour->tour_sys_id)) {?>
                      <div class="form-group textalignleft">
                        <label for="ordAmt"><strong>Tour Name</strong></label>
                        <input type="hidden" class="form-control" id="ordTour" name="refcode" value="<?php echo $preset_tour->tour_sys_id ?>">
                        <input type="hidden" class="form-control" id="regform" name="regform" value="Yes">
                        <input type="text" class="form-control" value="<?php echo $preset_tour->tour_name ?>" readonly>
                      </div>
                    <?php } else { ?>
                    <label for="ordTour"><strong>Choose Tour</strong></label>
                    <div class="select-wrapper mr-0 ml-0 mt-0 mb-0 pr-0 pl-0 pt-0 pb-0">
                      <select class="select" id="ordTour" name="refcode" required>
                        <option value="">Choose Tour</option>

                        <?php 
                        
                          foreach ($tour_controller->getToursInAlphabeticalOrder(false, true) as $key => $tour) { 
                            if($tour['tour_sys_id'] == 'other'){continue;}
                            if(isset($_GET["id"]) && !empty($_GET["id"]) && $tour['tour_sys_id'] == $_GET["id"]){
                              echo '<option value="' . $tour['tour_sys_id'] . '" selected>' . $tour['tour_name'] . '</option>';
                            } else {
                              echo '<option value="' . $tour['tour_sys_id'] . '">' . $tour['tour_name'] . '</option>';
                            }
                          } 
                        ?>
                        <option value="other">Other</option>
                      </select>
                    </div>
                    <br>
                    <label for="regform"><strong>Have You Completed Your Tour Registration Form</strong></label>
                    <div class="select-wrapper mr-0 ml-0 mt-0 mb-0 pr-0 pl-0 pt-0 pb-0">
                      <select class="select" id="regform" name="regform" required>
                      <option value="No">No</option>
                      <option value="Yes">Yes</option>
                      </select>
                    </div>
                    <?php } ?>
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

                  <div class="form-group textalignleft" <?php (!empty($preset_tour->tour_sys_id)) ? print('style="display:none;"') : print(''); ?>>
                    <label for="ordAmt"><strong>Promo/Discount Code (Optional)</strong></label>
                    <input type="text" class="form-control" id="discount_code" name="discount_code" placeholder="Promo/Discount Code (Optional)">
                  </div>

                  <div class="form-group textalignleft">
                    <input type="checkbox" id="agreetandc" name="agreetandc" value="agreed" required onclick="updatePayButton()">
                    <label for="agreetandc" class="makeCursorPointer" >
                          By paying, I have read and agree to the <a target="_blank" href="<?php echo $app->getProtocol() . '://' . $app->getDomain() . $page_controller->getOnePageDetails('terms')->url; ?>">Terms and Conditions</a> of the service
                    </label>
                  </div>
                  
                  <div class="g-recaptcha" data-sitekey="6LebVZcpAAAAAM6qn9xfl2oa3wxeXLdVroT5z3Yq" data-callback="recaptchaCheckCompleted" data-expired-callback="recaptchaCheckExpired"></div>

                  <div class="form-group hideconten mt-4" id="finalbtnholder">
                  <button class="btn btn-primary btn-lg btn-block" type="submit"  id="payButton" disabled>PAY</button>
                  </div>

                </form>
              <div id="paymentTokenInfo"></div>
            </div>
          </div>
        </div>
      </section>
