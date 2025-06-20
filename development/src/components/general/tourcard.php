<div class="col-sm-6 col-md-12 wow fadeInLeft">
    <!-- Product Big-->
    <article class="product-big">
    <div class="unit flex-column flex-md-row align-items-md-stretch">
        <div class="unit-left"><a class="product-big-figure" href="<?php echo  $app->getProtocol() . '://' . $app->getDomain() . $this_tour->tour_page_url; ?>"><img src="<?php echo $root_folder . $this_tour->tour_card_photo; ?>" alt="<?php echo $this_tour->tour_name; ?>" width="600" height="366"/></a></div>
        <div class="unit-body">
        <div class="product-big-body">
            <h5 class="product-big-title"><a href="<?php echo  $app->getProtocol() . '://' . $app->getDomain() . $this_tour->tour_page_url; ?>"><?php echo $this_tour->tour_name; ?></a></h5>
            <div class="group-sm group-middle justify-content-start">
            <div class="product-big-rating"><a class="product-big-reviews" href="<?php echo  $app->getProtocol() . '://' . $app->getDomain() . $this_tour->tour_page_url; ?>"><strong><?php echo $this_tour->tour_date; ?><br><?php echo $this_tour->tour_duration; ?></strong></a></div>
            </div>
            <p class="product-big-text"><?php echo $this_tour->tour_short_description; ?></p>
            
            <a class="button button-black-outline button-ujarak" href="tel:<?php echo $app->getPhone(); ?>">Call For Details</a>
            <a class="button button-secondary-outline button-pipaluk" href="<?php echo  $app->getProtocol() . '://' . $app->getDomain() . $page_controller->getOnePageDetails($this_tour->tour_page_url)->url; ?>">Read More</a>

            <div class="product-big-price-wrap"><span class="product-big-price">$<?php echo number_format($this_tour->tour_price); ?></span></div>
        </div>
        </div>
    </div>
    </article>
</div>
