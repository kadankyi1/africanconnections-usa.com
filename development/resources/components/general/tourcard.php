<div class="col-sm-6 col-md-12 wow fadeInLeft">
    <!-- Product Big-->
    <article class="product-big">
    <div class="unit flex-column flex-md-row align-items-md-stretch">
        <div class="unit-left"><a class="product-big-figure" href="<?php echo $this_tour->page_url; ?>"><img src="<?php echo $root_folder . $this_tour->card_photo; ?>" alt="<?php echo $this_tour->name; ?>" width="600" height="366"/></a></div>
        <div class="unit-body">
        <div class="product-big-body">
            <h5 class="product-big-title"><a href="<?php echo $this_tour->page_url; ?>"><?php echo $this_tour->name; ?></a></h5>
            <div class="group-sm group-middle justify-content-start">
            <div class="product-big-rating"><a class="product-big-reviews" href="<?php echo $this_tour->page_url; ?>"><strong><?php echo $this_tour->date; ?><br><?php echo $this_tour->duration; ?></strong></a></div>
            </div>
            <p class="product-big-text"><?php echo $this_tour->short_description; ?></p>
            
            <a class="button button-black-outline button-ujarak" href="tel:+18479563319">Call For Details</a>
            <a class="button button-secondary-outline button-pipaluk" href="<?php echo $this_tour->page_url; ?>" target="_blank">Read More</a>

            <div class="product-big-price-wrap"><span class="product-big-price"><?php echo $this_tour->price; ?></span></div>
        </div>
        </div>
    </div>
    </article>
</div>
