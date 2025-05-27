      <!-- Trending tours-->
      <section class="section section-sm bg-default pt-0">
        <div class="container">
          <h3 class="oh-desktop fontsize2em"><span class="d-inline-block wow slideInDown"><strong>Trending Tours</strong></span></h3>
          <div class="row row-sm row-40 row-md-50">
            <?php $this_tour = $tour_black_history; include('../components/general/tourcard.php'); ?>
            <?php $this_tour = $tour_egypt; include('../components/general/tourcard.php'); ?>
            <?php $this_tour = $tour_return_to_the_motherland; include('../components/general/tourcard.php'); ?>            
          </div>
          <!-- Reviews -->
          <br><br>
          <div class="elfsight-app-6f3643ee-085f-4fec-8390-c389d1019520"></div>  


          <br><br>
          <div class="text-md-left">
            <h3 class="oh-desktop fontsize2em"><span class="d-inline-block wow slideInDown"><strong>About Us</strong></span></h3>
            <!-- Bootstrap tabs-->
            <div class="tabs-custom tabs-horizontal tabs-line tabs-line-big tabs-line-style-2 text-center text-md-left" id="tabs-7">
              <!-- Nav tabs-->
              <ul class="nav nav-tabs">
              </ul>
              <!-- Tab panes-->
              <div class="tab-content">
                <div class="tab-pane fade show active  text-md-left" id="tabs-7-1">
                  <p>
                    <strong>With over 20 years of Africa tour experience-- We know Africa Best!</strong>
                    
                    <br><br>African Connections North America (AC-USA) is your trusted gateway to Africa,
                    connecting travelers to the continent’s rich history, vibrant cultures, and stunning
                    landscapes. Founded by African Americans who have lived on the continent for
                    decades and accumulated travel experiences and deep ties to Africa that cannot be
                    matched...
                    <br><br><a href="<?php echo $page_controller->getOnePageDetails('about_us')->url; ?>">Read More</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
