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
                        <option value="T&T 60th Ghana Adventure">T&T 60th Ghana Adventure</option>
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
                        <option value="Travel with Linda Boyd Ghana 2026">Travel with Linda Boyd Ghana 2026</option>
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
