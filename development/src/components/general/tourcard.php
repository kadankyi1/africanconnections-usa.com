<div class="col-sm-6 col-md-12 wow fadeInLeft">
    <!-- Product Big-->
    <article class="product-big">
    <div class="unit flex-column flex-md-row align-items-md-stretch">
        <div class="unit-left">
            <?php if($this_tour->customize_only) { ?>
                    <img src="<?php echo $root_folder . $this_tour->tour_card_photo; ?>" alt="<?php echo $this_tour->tour_name; ?>" width="600" height="366"/>
            <?php } else { ?>
                <a class="product-big-figure" href="<?php echo  $app->getProtocol() . '://' . $app->getDomain() . $page_controller->getOnePageDetails($this_tour->tour_page_url)->url; ?>">
                    <img src="<?php echo $root_folder . $this_tour->tour_card_photo; ?>" alt="<?php echo $this_tour->tour_name; ?>" width="600" height="366"/>
                </a>
            <?php } ?>
        </div>
        <div class="unit-body">
        <div class="product-big-body">
            <h5 class="product-big-title">
            <?php if($this_tour->customize_only) { ?>
                <?php echo $this_tour->tour_name; ?>
            <?php } else { ?>
                <a href="<?php echo  $app->getProtocol() . '://' . $app->getDomain() . $page_controller->getOnePageDetails($this_tour->tour_page_url)->url; ?>"><?php echo $this_tour->tour_name; ?></a>
            <?php } ?>
            </h5>
            <div class="group-sm group-middle justify-content-start">
            <div class="product-big-rating">
                <?php if($this_tour->customize_only) { ?>
                    <strong><?php echo $this_tour->tour_date; ?><br><?php echo $this_tour->tour_duration; ?></strong>
                <?php } else { ?>
                    <a class="product-big-reviews" href="<?php echo  $app->getProtocol() . '://' . $app->getDomain() . $page_controller->getOnePageDetails($this_tour->tour_page_url)->url; ?>"><strong><?php echo $this_tour->tour_date; ?><br><?php echo $this_tour->tour_duration; ?></strong></a>
                <?php } ?>
            </div>
            </div>
            <p class="product-big-text"><?php echo $this_tour->tour_short_description; ?></p>
            
            <a class="button button-black-outline button-ujarak" href="tel:<?php echo $app->getPhone(); ?>"><?php ($this_tour->customize_only) ? print('Call For A Quote') : print('Call For Details') ; ?></a>

            <?php if(!$this_tour->customize_only) { ?>
                <a class="button button-secondary-outline button-pipaluk" href="<?php echo  $app->getProtocol() . '://' . $app->getDomain() . $page_controller->getOnePageDetails($this_tour->tour_page_url)->url; ?>">Read More</a>
            <?php } ?>
            <div class="product-big-price-wrap"><span class="product-big-price"><?php ($this_tour->customize_only) ? print('Custom') : print( '$' . number_format($this_tour->tour_price)) ; ?></span></div>
        </div>
        </div>
    </div>
    </article>
</div>
