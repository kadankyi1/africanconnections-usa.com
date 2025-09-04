
<section class="section section-sm section-first bg-default mt-0 pt-0">
        <div class="container">
          <h1 class="breadcrumbs-custom-title fontsize35 textaligncenter"><strong><?php (empty($contact_title)) ? print("OUR CONTACT INFORMATION") : print($contact_title); ?></strong></h1>
          <div class="row row-30 justify-content-center">

            <div class="col-sm-8 col-md-6 col-lg-6">
              <article class="box-contacts">
                <div class="box-contacts-body">
                  <div class="box-contacts-icon fl-bigmug-line-cellphone55"></div>
                  <div class="box-contacts-decor"></div>
                  <h4>Phone</h4>
                  <p class="box-contacts-link"><a href="tel:<?php echo $app->getPhone(); ?>"><?php echo $app->localizeUsPhoneNumber($app->getPhone()); ?></a></p>
                </div>
              </article>
            </div>

            <?php if(isset($show_email_on_contact) && $show_email_on_contact == true){ ?>
              <div class="col-sm-8 col-md-6 col-lg-6">
                <article class="box-contacts">
                  <div class="box-contacts-body">
                    <div class="box-contacts-icon fl-bigmug-line-up104"></div>
                    <div class="box-contacts-decor"></div>
                    <h4>Email</h4>
                    <p class="box-contacts-link"><a href="mailto:info@africanconnections-usa.com">info@africanconnections-usa.com</a></p>
                  </div>
                </article>
              </div>
            <?php } else { ?>
            <div class="col-sm-8 col-md-6 col-lg-6">
              <article class="box-contacts">
                <div class="box-contacts-body">
                  <div class="box-contacts-icon fl-bigmug-line-up104"></div>
                  <div class="box-contacts-decor"></div>
                  <h4>Address</h4>
                  <p class="box-contacts-link"><a>1600 Golf Road, Suite 1200 Rolling Meadows, Illinois 60008</a></p>
                </div>
              </article>
            </div>

            <?php } ?>

          </div>
        </div>
      </section>