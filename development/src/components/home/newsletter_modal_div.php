<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Get Tour Updates & Special Offers</h5>
            <button type="button" id="popupclosebtn" class="close" onclick="localStorage.setItem('popupclosed', 'yes');" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="popupform" action="serverside/joinlist.php" method="post">
              <div class="g-recaptcha hidevisibility" data-sitekey="6LebVZcpAAAAAM6qn9xfl2oa3wxeXLdVroT5z3Yq" data-callback="onSubmit" data-size="invisible"></div>
                <!--<div class="g-recaptcha" data-sitekey="6LfI2pwlAAAAAImVmPrhyV0B1zxmnHQIXO79vC6A"></div>-->
              <p>                      <strong>Get $100 off any tour you book with us.</strong>
                      <br>Join our Subscriber list, receive our Monthly Newsletter, special discounts, travel updates and more...
                      <br><a href="terms.html#newsletterpromo" class="fontsize13 texttoblack">Terms & Conditions Apply</a>
              </p>
              <br>
              <div class="form-group hidecontent">
                <input type="text" name="wtf" id="wtf">
                <input type="text" name="g-recaptcha-response" id="g-recaptcha-1">
              </div>
              <div class="form-group">
                <input type="text" name="fullname_filled" id="fullname_filled" class="form-control" placeholder="First Name">
              </div>
              <div class="form-group">
                <input type="email" name="joineremail" id="joineremail" class="form-control" placeholder="Email">
              </div>
            </form>
          </div>
          <div class="modal-footer">
						<span onclick="validateRecaptchaPopUp();" class="btn btn-primary textfloatright">Join</span>	
          </div>
        </div>
      </div>
    </div>

    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
