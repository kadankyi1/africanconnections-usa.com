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
    
    </script>
    <div class="elfsight-app-56c0baaf-15bf-4139-ae0f-952721a02fab"></div>
    <!--<script src="https://dashboard.chatfuel.com/integration/landing-wa-widget.js" async defer data-prefilled="I would like to learn more about your tours" data-welcome="Hello, how can I help you today?" data-phone="17085575041"></script>-->
