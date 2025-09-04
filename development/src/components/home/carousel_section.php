<section class="breadcrumbs-custom-inset showcursor">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-indicators">
          <?php 
          $counter1 = 0; 
          foreach ($page_controller->getCarouselData()->carousel_data as $key => $carousel_item) { 
            if($carousel_item['expire'] != false && $app->isDatePassed($carousel_item['expire'])) {
              continue;
            } else {
          ?>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php print($counter1); ?>" <?php ($counter1 == 0) ? print('class="active" aria-current="true"'): ' class=""'; ?> aria-label="Slide <?php print($counter1); ?>"></button>
          <?php
            $counter1++;  
            }
          }
            ?>

          </div>
          <div class="carousel-inner">

          <?php 
          $counter2 = 0; 
          foreach ($page_controller->getCarouselData()->carousel_data as $key => $carousel_item) { 
            if($carousel_item['expire'] != false && $app->isDatePassed($carousel_item['expire'])) {
              continue;
            } else {
          ?>
            <div class="carousel-item <?php ($counter2 == 0) ? print('active'): ''; ?>" <?php (empty($carousel_item['onclick'])) ? '' : print('onclick="' . $carousel_item['onclick'] . '"'); ?>>
              <img src="<?php echo $root_folder . $carousel_item['img_src']; ?>" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5></h5>
                <p></p>
              </div>
            </div>
          <?php 
              $counter2++;
            }
          } ?>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </section>
