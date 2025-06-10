    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="<?php echo $root_folder; ?>resources/js/core.min.js"></script>
    <?php if($page_name == "reviews") { ?>
      <script type="text/javascript">
        var player = new Plyr('.container video', {
          muted: false,
          volume: 1,
          controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'fullscreen'],
        });
      </script>
    <?php } ?>
    <script src="<?php echo $root_folder; ?>resources/js/script.js"></script>
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
          <?php if($page_name == "home"){ ?>
            $("#popupform").submit();
          <?php } else if($page_name == "customize_tour") { ?>
            sendForm('customize', 'inquiry_form', 'response_msg_holder');
          <?php } else { ?>
            addToMailList('inquiry_form', 'response_msg_holder');
          <?php } ?>
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


    function validateRecaptchaCustomizeTourForm() {
        form_used = "1";
        if(
            $('#traveldate_filled').val().trim() != "" 
            && $('#travelduration_filled').val().trim() != "" 
            && $('#travelersnumber_filled').val().trim() != "" 
            && $('#interests_filled').val().trim() != "" 
            && $('#fullname_filled').val().trim() != "" 
            && $('#phone_filled').val().trim() != "" 
            && $('#joineremail').val().trim() != "" 
          ){
          var response = grecaptcha.execute();
          console.log(response);
        } else {
              alert("Please complete the form");
        }
    }

    function validateRecaptchaSideForm() {
          form_used = "1";
          if(
            $('#fullname_filled').val().trim() != "" 
            && $('#phone_filled').val().trim() != "" 
            && $('#joineremail').val().trim() != "" 
            && $('#msg_filled').val().trim() != ""
            ){
            var response = grecaptcha.execute();
            console.log(response);
          } else {
                alert("Please complete the form");
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

    <?php if($page_name == "about_us") { ?>
    
      function showFounder() {
        $('#tabs-7-1').removeClass('show active')
        //$('#tabs-7-2').removeClass('show active');
        $('#tabs-7-3').removeClass('fade');
        $('#tabs-7-1').addClass('fade');
        //$('#tabs-7-2').addClass('fade');
        $('#tabs-7-3').addClass('show active');
        $('#menu-tabs-7-1').removeClass('active');
        //$('#menu-tabs-7-2').removeClass('active');
        $('#menu-tabs-7-3').addClass('active');
      }

    <?php } ?>

    <?php if($page_name == "tour_registration") { ?>
      var forms_showing = 0;
      
      function addOrRemoveForm(type){
        if(type == 1 && forms_showing < 5){
          forms_showing++;
          var reg_form_text = '<div class="collapsible">Open Form </div><div id="form_' + forms_showing + '" class="content"><br><div class="relative"><select required type="text" id="tourname_filled' + forms_showing + '" name="tourname_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"><option value="">Choose Tour</option><?php foreach ($tour_controller->getToursInOrderOfDatesAscending(false, true) as $key => $tour) { ?><option value="<?php echo $tour['tour_sys_id']; ?>"><?php echo $tour['tour_name']; ?></option><?php } ?></select><label for="tourname_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Choose Your Tour *</label></div><br><div class="relative"><input type="text" id="firstname_filled' + forms_showing + '" onfocusout="generateSignature(' + forms_showing + ')" name="firstname_filled' + forms_showing + '" required class="namecall block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /><label for="firstname_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">First Name (As shown on Passport) *</label></div><br><div class="relative"><input type="text" id="lastname_filled' + forms_showing + '" onfocusout="generateSignature(' + forms_showing + ')" name="lastname_filled' + forms_showing + '" required="required" class="namecall block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /><label for="lastname_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Last Name (As shown on Passport) *</label></div><br><div class="relative"><input type="text" id="middlename_filled' + forms_showing + '" name="middlename_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /><label for="middlename_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Middle Name (As shown on Passport)</label></div><br><div class="relative"><input required type="date" id="dob_filled' + forms_showing + '" name="dob_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /><label for="dob_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Date Of Birth *</label></div><br><div class="relative"><input required type="text" id="phonenumber_filled' + forms_showing + '" name="phonenumber_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /><label for="phonenumber_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Phone Number *</label></div><br><div class="relative"><input required type="email" id="joineremail_filled' + forms_showing + '" name="joineremail_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /><label for="joineremail_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Email *</label></div><br><div class="relative"><input required type="text" id="address_filled' + forms_showing + '" name="address_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /><label for="address_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Address *</label></div><br><div class="relative"><input type="text" id="address_secline_filled' + forms_showing + '" name="address_secline_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /><label for="address_secline_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Apartment Number/Second Address Line</label></div><br><div class="relative"><input required type="text" id="city_filled' + forms_showing + '" name="city_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /><label for="city_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">City *</label></div><br><div class="relative"><input required type="text" id="state_filled' + forms_showing + '" maxlength="2" min="2" name="state_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /><label for="state_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">State *</label></div><br><div class="relative"><input required type="text" id="zipcode_filled' + forms_showing + '" name="zipcode_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /><label for="zipcode_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Zipcode *</label></div><br><h4 class="textalignleft width100percent">Installment Payments</h4>	<div class="relative"><select required onChange="setInstallmentPayments(this)" type="text" id="payment_duration_filled' + forms_showing + '" name="payment_duration_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"><option value="">Choose Payment Duration</option><option value="One-Time Full Payment">One-Time Full Payment</option><option value="Installment Payment">Installment Payment</option></select><label for="payment_duration_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Payment Duration *</label></div><br><span class="hidecontent" id="installment_holder"><div class="relative"><input type="text" id="payments_amt_and_interval_filled' + forms_showing + '" name="payments_amt_and_interval_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /><label for="payments_amt_and_interval_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">How much you would like to pay and the payment interval you prefer. (Eg: $500 every month)</label></div><br><div class="relative"><input type="number" min="1" max="31" maxlength="2" id="payments_day_filled' + forms_showing + '" name="payments_day_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /><label for="payments_day_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">What day of the month would you like to make your payment?</label></div><br><div class="relative"><select type="text" id="payment_method_filled' + forms_showing + '" name="payment_method_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"><option value="">Choose Installment Payment Method?</option><option value="Credit Card">Credit Card</option><option value="Debit Card">Debit Card</option><option value="ACH">ACH</option></select><label for="payment_method_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Will you pay by credit card, debit card or ACH?</label></div><br><h4 class="textalignleft width100percent">Medical Conditions</h4>	<div class="relative"><input type="text" id="medical_needs_filled' + forms_showing + '" name="medical_needs_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /><label for="medical_needs_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Do you have any questions, medical requirements or special needs?</label></div><br></span><h4 class="textalignleft width100percent">Roommate Requests</h4>	<div class="relative"><select type="text" id="roommate_request_filled' + forms_showing + '" name="roommate_request_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"><option value="">Do you want to have a room to yourself or a roommate?</option><option value="I want a room to myself and will pay the extra fee">I want a room to myself and will pay the extra fee.</option><option value="I want a roommate">I want a roommate</option></select><label for="roommate_request_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Do you want to have a room to yourself or a roommate? *</label></div><br><br><div class="relative"><input type="text" id="roommate_name_filled' + forms_showing + '" name="roommate_name_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /><label for="roommate_name_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">State your roommate name if you have one coming with your on the tour.</label></div><br><br><p class="textalignleft width100percent"><strong>By submitting this form, I adopt the signature below, agree to the <span class="termsClickLink"><a class="makeCursorPointer" onclick="showTerms()">Terms and Conditions</a></span> and submit my registration</strong></p><div id="signature_holder' + forms_showing + '" class="signatureHolder width100percent"></div></div></div>'
          $('#forms_holder').append(reg_form_text);
          arrangeForms();
        } else if(type == 0){
          if(forms_showing > 1){
            $('#forms_holder').children().last().remove();
            $('#forms_holder').children().last().remove();
            forms_showing--;
          }
        }
        console.log("forms_showing: " + forms_showing);
      }
      addOrRemoveForm(1);
      $(".collapsible").click(function(){
        arrangeForms()
      });

      function arrangeForms(){
        var coll = document.getElementsByClassName("collapsible");
        var i;
        //console.log(coll.length);

        for (i = 0; i < forms_showing; i++) {
          coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight){
              content.style.maxHeight = null;
            } else {
              content.style.maxHeight = content.scrollHeight + "px";
            } 
          });
        }
      }
      arrangeForms();

      function generateSignature(x){
        var fn = $("#firstname_filled"+x).val();
        var ln = $("#lastname_filled"+x).val();

        console.log("firstname_filled: " + fn);
        console.log("lastname_filled: " + ln);
        $("#signature_holder"+x).html(fn.concat(ln));
        console.log("here 1");
      }
  <?php } ?>

    
    </script>
    <div class="elfsight-app-56c0baaf-15bf-4139-ae0f-952721a02fab"></div>
    <!--<script src="https://dashboard.chatfuel.com/integration/landing-wa-widget.js" async defer data-prefilled="I would like to learn more about your tours" data-welcome="Hello, how can I help you today?" data-phone="17085575041"></script>-->
