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
    <?php if($page_name == "home") { ?>
      <script type="text/javascript">

      </script>
          <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <?php } ?>
    <?php if($page_name == "make_a_payment") { ?>
      <script type="text/javascript">
        var recaptcha_completed = false;

      function updatePayButton(){
        var isChecked = $("#agreetandc").is(":checked");

        if (isChecked && recaptcha_completed) {
          $("#payButton").attr('disabled', false);
          console.log("HERE  1");
        } else {
          $("#payButton").attr('disabled', true);
          console.log("HERE  2");
        }
      }
        function recaptchaCheckCompleted() { 
          const recaptcha_box_checked = (grecaptcha.getResponse()) ? true : false;

          if (recaptcha_box_checked) { 
            recaptcha_completed = true;
            updatePayButton(recaptcha_completed);
          } else {
            recaptcha_completed = false;
            alert("You must check the 'I am not a robot' box to proceed!");
            $("#payButton").attr('disabled', recaptcha_completed);
            return false;
            }
        }

          function recaptchaCheckExpired() {
            recaptcha_completed = false;
            $("#payButton").attr('disabled', true);
          }      
    </script>
    <?php } ?>

    <script src="<?php echo $root_folder; ?>resources/js/script.js"></script>
    <script type="text/javascript">
      $(document).on("click", "a", function() {
          //this == the link that was clicked
          var href = $(this).attr("href");
          //console.log("You're trying to go to " + href);
          sendAjaxRequest('<?php echo $app->getProtocol() . '://' . $app->getDomain() . $page_controller->getOnePageDetails('cron')->url; ?>', 'id=click&type=6&href=' + href);
      });

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
          <?php if($page_name == "home" || $page_name == "campaign"){ ?>
            $("#popupform").submit();
          <?php } else if($page_name == "customize_tour") { ?>
            $("#inquiry_form").submit();
          <?php } else if($page_name == "tour_registration") { ?>
            $("#inquiry_form").submit();
          <?php } else { ?>
            console.log("here addToMailList");
            addToMailList('inquiry_form', 'response_msg_holder', '<?php echo $app->getProtocol() . '://' . $app->getDomain() . $page_controller->getOnePageDetails('thank_you_enquiry')->url; ?>');
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
          var reg_form_text = '<div class="collapsible" id="form_btn_' + forms_showing + '"  onclick="arrangeForms(' + forms_showing + ')">Registration Form</div><div id="form_' + forms_showing + '" class="content" style="display:block"><br><div class="relative"><select required type="text" id="tourname_filled' + forms_showing + '" name="tourname_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"><option value="">Choose Tour</option><?php foreach ($tour_controller->getToursInAlphabeticalOrder(false, true) as $key => $tour) { if($tour['tour_sys_id'] == 'other'){continue;} ?><option value="<?php echo $tour['tour_sys_id']; ?>"><?php echo $tour['tour_name']; ?></option><?php } ?><option value="other">Other</option></select><label for="tourname_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Choose Your Tour <span style="color:red">*</span></label></div><br><div class="relative"><input type="text" id="firstname_filled' + forms_showing + '" onfocusout="generateSignature(' + forms_showing + ')" name="firstname_filled' + forms_showing + '" required class="namecall block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /><label for="firstname_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">First Name (As shown on Passport) <span style="color:red">*</span></label></div><br><div class="relative"><input type="text" id="lastname_filled' + forms_showing + '" onfocusout="generateSignature(' + forms_showing + ')" name="lastname_filled' + forms_showing + '" required="required" class="namecall block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /><label for="lastname_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Last Name (As shown on Passport) <span style="color:red">*</span></label></div><br><div class="relative"><input type="text" id="middlename_filled' + forms_showing + '" name="middlename_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /><label for="middlename_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Middle Name (As shown on Passport)</label></div><br><div class="relative"><input required type="date" id="dob_filled' + forms_showing + '" name="dob_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /><label for="dob_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Date Of Birth <span style="color:red">*</span></label></div><br><div class="relative"><input required type="text" id="phonenumber_filled' + forms_showing + '" name="phonenumber_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /><label for="phonenumber_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Phone Number <span style="color:red">*</span></label></div><br><div class="relative"><input required type="email" id="joineremail_filled' + forms_showing + '" name="joineremail_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /><label for="joineremail_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Email <span style="color:red">*</span></label></div><br><div class="relative"><input required type="text" id="address_filled' + forms_showing + '" name="address_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /><label for="address_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Address <span style="color:red">*</span></label></div><br><div class="relative"><input type="text" id="address_secline_filled' + forms_showing + '" name="address_secline_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /><label for="address_secline_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Apartment Number/Second Address Line</label></div><br><div class="relative"><input required type="text" id="city_filled' + forms_showing + '" name="city_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /><label for="city_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">City <span style="color:red">*</span></label></div><br><div class="relative"><input required type="text" id="state_filled' + forms_showing + '" maxlength="2" min="2" name="state_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /><label for="state_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">State <span style="color:red">*</span></label></div><br><div class="relative"><input required type="text" id="zipcode_filled' + forms_showing + '" name="zipcode_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /><label for="zipcode_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Zipcode <span style="color:red">*</span></label></div><br><h4 class="textalignleft width100percent">Payment Interval</h4>	<div class="relative"><select required onChange="setInstallmentPayments(this)" type="text" id="payment_duration_filled' + forms_showing + '" name="payment_duration_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"><option value="">Choose Payment Duration</option><option value="One-Time Full Payment">One-Time Full Payment</option><option value="Installment Payment">Installment Payment</option></select><label for="payment_duration_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Payment Duration <span style="color:red">*</span></label></div><br><h4 class="textalignleft width100percent">Medical Conditions</h4>	<div class="relative"><input type="text" id="medical_needs_filled' + forms_showing + '" name="medical_needs_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /><label for="medical_needs_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Do you have any questions, medical requirements or special needs?</label></div><br><h4 class="textalignleft width100percent">Roommate Requests</h4>	<div class="relative"><select type="text" id="roommate_request_filled' + forms_showing + '" name="roommate_request_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"><option value="">Do you want to have a room to yourself or a roommate?</option><option value="I want a room to myself and will pay the extra fee">I want a room to myself and will pay the extra fee.</option><option value="I want a roommate">I want a roommate</option></select><label for="roommate_request_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Do you want to have a room to yourself or a roommate? <span style="color:red">*</span></label></div><br><br><div class="relative"><input type="text" id="roommate_name_filled' + forms_showing + '" name="roommate_name_filled' + forms_showing + '" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /><label for="roommate_name_filled' + forms_showing + '" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">State your roommate name if you have one coming with your on the tour.</label></div><br><br><p class="textalignleft width100percent"><strong>By submitting this form, I adopt the signature below, agree to the <span class="termsClickLink"><a class="makeCursorPointer" target="_blank" href="<?php echo $app->getProtocol() . '://' . $app->getDomain() . $page_controller->getOnePageDetails('terms')->url; ?>">Terms and Conditions</a></span> and submit my registration</strong></p><div id="signature_holder' + forms_showing + '" class="signatureHolder width100percent"></div></div></div>'
          $('#forms_holder').append(reg_form_text);
          //arrangeForms();
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

      function arrangeForms(form_number){
        for (let i = 1; i <= forms_showing; i++) {
          if(i === form_number){
            document.getElementById('form_btn_' + i).classList.toggle("active");
            var content = document.getElementById('form_' + i);
            if (content.style.display === "block") {
              content.style.display = "none";
            } else {
              content.style.display = "block";
            }
          } else {
            document.getElementById('form_btn_' + i).classList.remove("active");
            document.getElementById('form_' + i).style.display = "none";
          }
        }
      
      }

      function validateRecaptchaRegisterForm() {
          console.log("here q");
          form_used = "1";
          var response = grecaptcha.execute();
          console.log(response);
    }

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
