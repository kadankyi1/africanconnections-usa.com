<section class="section section-sm section-first bg-default">

<h3 class="breadcrumbs-custom-title"><strong>TOUR REGISTRATION FORM</strong></h3>
<p>
  Please complete this Tour Registration Form. 
  <br><br>
  We look forward to hosting you in Africa! Prepare to be Amazed!!!
  <?php if(!empty($_GET["e"])) {echo '<br><span class="texttored">Please fill the form fully and correctly</span>';} ?>
</p>


<div class="container">
  <div class="row row-30 justify-content-center">
    <div class="ofset-lg-2 col-sm-8 col-md-6 col-lg-8">


    <div class="btn-group paddingallsides10px" style="width:100%">
            <button onclick="addOrRemoveForm(1)" class="adder" style="width:50%">Add Another Form</button>
            <button onclick="addOrRemoveForm(0)" class="remover" style="width:50%">Remove Last Form</button>
    </div>

      <form id="inquiry_form" action="<?php echo $app->getProtocol() . '://' . $app->getDomain() . $page_controller->getOnePageDetails('thank_you_registration')->url; ?>" method="post" class="paddingallsides10px">
        <div class="form-group hidecontent">
          <p id="final_signature"></p>
          <input type="text" name="final_signature_base64_image_svg" id="final_signature_base64_image_svg" readonly>
          <input type="text" name="wtf" id="wtf">
          <input type="text" name="g-recaptcha-response" id="g-recaptcha-1">
        </div>

        <div id="forms_holder"></div>
        <br>

        <div class="form-group">
          <div class="g-recaptcha hidevisibility" data-sitekey="6LebVZcpAAAAAM6qn9xfl2oa3wxeXLdVroT5z3Yq" data-callback="onSubmit" data-size="invisible"></div>
        </div>

        <p id="response_msg_holder" class="messagesenttext"><strong> Message Sent </strong></p>
        <br>
        <div class="center textaligncenter">
            <span  onclick="validateRecaptchaRegisterForm();"  class="button button-secondary button-pipaluk">Send</span>
        </div>

        <br><br>      
      </form>
    </div>
  </div>
</div>
</section>
