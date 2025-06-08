      <!--  tours-->
      <section class="section section-sm section-first bg-default text-md-left mt-0 pt-0">
        <div class="container">
          <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 wow fadeInRight" data-wow-delay=".1s">
                <!-- Bootstrap tabs-->
                <div class="tabs-custom tabs-horizontal tabs-line tabs-line-big tabs-line-style-2 text-center text-md-left" id="tabs-7">
                  <!-- Nav tabs-->
                  <ul class="nav nav-tabs">
                    <li class="nav-item" role="presentation"><a class="nav-link active" id="menu-tabs-7-1" href="#tabs-7-1" data-toggle="tab">ABOUT US</a></li>
                    <!--<li class="nav-item" role="presentation"><a class="nav-link" id="menu-tabs-7-2" href="#tabs-7-2" data-toggle="tab">ABOUT US</a></li>-->
                    <li class="nav-item" role="presentation"><a class="nav-link" id="menu-tabs-7-3" href="#tabs-7-3" data-toggle="tab">FOUNDER'S PROFILE</a></li>
                  </ul>
                  <!-- Tab panes-->
                  <div class="tab-content">
                    <div class="tab-pane fade show active  text-md-left" id="tabs-7-1">
                      <h4><strong>With over 20 years of Africa tour experience-- We know Africa Best!</strong></h4>
                      <p>
                        We provide exceptional service at the best price!
                        <br><br>
                        African Connections North America (AC-USA) is your trusted gateway to Africa,
                        connecting travelers to the continent’s rich history, vibrant cultures, and stunning
                        landscapes. Founded by African Americans who have lived on the continent for
                        decades and accumulated travel experiences and deep ties to Africa that cannot be
                        matched.
                        <br><br>
                        With over 20 years in the industry, including organizing our first USA-to-Africa Tour in
                        2002, we have guided countless travelers on transformative journeys. Our founder, a
                        scholar of African and African American history, infuses each tour with deep
                        historical insights and a unique perspective.
                        <strong class="showcursor" onclick="showFounder();" data-toggle="tab">View our founder's profile</strong>
                        <br><br>
                        <strong>What sets us apart?</strong> We handle every aspect of your journey—from preparation to
                        personalized support during your trip—without intermediaries. With us, there are no
                        middlemen. We don’t book you in the United States and then hand you off to
                        contracted service providers in Africa.
                        <br><br>
                        Partnering with our sister company, African Connections Ghana Ltd., headquartered
                        in Ghana, we ensure exceptional service and seamless execution of every itinerary.
                        <br><br>
                        We help you prepare for your trip to Africa, providing information and assistance to
                        facilitate each step of your preparation. Our staff is there to meet you upon arrival at
                        the airport, and we are with you each day of your tour.
                        <br><br>
                        Whether you want to explore ancient pyramids, experience the exhilaration of a
                        wildlife safari, experience the culture and enduring traditions of your African heritage,
                        relax on some of the world’s most beautiful beaches or just soak in the vibrant
                        rhythms of Africa; our tours deliver unforgettable experiences at competitive prices.
                        <br><br>
                        We offer carefully curated tour packages that allow you to experience the best of Africa.
                        Travel with us to:
                        <?php foreach ($tour_controller->getAllTourCountries() as $key => $tour_country) { echo '<br>-&gt; <a href="' . $app->getProtocol() . '://' . $app->getDomain() . $page_controller->getTourCountryPageObjectForPageUrl($tour_country)->url . '">' .  $tour_country . '</a>'; } ?>
                        <br><a href="<?php echo $app->getProtocol() . '://' . $app->getDomain() . $page_tours->url; ?>"><strong class="texttoblack">View our tours.</strong></a>
                        <br><br>
                        While we specialize in group travel, we welcome couples and solo travelers. We customize tours to meet your interests, budget and time constraints. 
                        Contact us for a quote. <a class="link-phone" href="tel:<?php print($app->getPhone()); ?>"><strong class="texttoblack">Click Here To Call Us</strong></a>
                        <br><br>
                        <strong>Discover Africa with African Connections and create memories that last a lifetime.</strong>
                      </p>
                    </div>
                    <div class="tab-pane fade" id="tabs-7-3">
                      <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-4">
                          <img class="img-fluid" src="<?php print($root_folder); ?>resources/img/about/dr_hakeem.jpg" alt="Photo of CEO">
                        </div>
                        <div class="col-sm-12 col-md-8 col-lg-8  text-md-left">
                          <p>
                        
                            <strong>Ayesha S. Hakeem</strong> is President of African
                            Connections North America and Managing Director of African Connections Ghana Ltd.
                            
                            <br><br>She received her undergraduate education at Yale University and Northwestern University, where she
                            majored in African and African American History; her M.A. in History is from Northwestern University;
                            and her Juris Doctorate is from DePaul University.
                            
                            <br><br>Dr. Hakeem is a retired civil rights lawyer with over 20 years of legal experience, including her
                            employment with Sidley &amp; Austin, one of the highest rated law firms in the world, which is also the law
                            firm that employed former U.S. president, Barack Obama and former first lady, Michelle Obama.
                            
                            <br><br>Dr. Hakeem first traveled to Africa in 1971, exploring Ghana, Morocco, Senegal, and Nigeria.
                            In 1976, she left her hometown of Chicago and relocated with her family to Ghana, a
                            country with inextricable links to African American history.
                            
                            <br><br>After moving to Ghana, Dr. Hakeem was first employed by the Ghana Education Service,
                            where she taught African History for two years before being hired by the University of
                            Ghana, as the Ashanti Regional Director for the University&#39;s Institute of Adult Education.

                            <br><br>Dr. Hakeem has taught African American and West African History in the United States and in Ghana for decades.

                            <br><br>She has lived in Ghana for over 20 years and has traveled throughout Africa for decades. 
                            Her vast Africa experience and wealth of knowledge enriches each of African Connections&#39; tours.
                            
                            <br><br>Working hand in hand with our sister company African Connections Ghana Ltd., which is
                            headquartered in Accra, Ghana with operational capability throughout much of Africa,
                            we ensure that all tour services on the ground in Africa are delivered to specification and
                            each tour itinerary is executed to the highest possible standards.

                            <br><br>We pride ourselves on delivering exceptional tour management and support services
                            while maintaining the best tour prices.

                            <br><br><strong>We are &quot;Your Gateway to Africa&quot;</strong> offering travel and tour packages that allow you to 
                            experience the best of Africa at affordable prices.   
                            
                            <br><br><strong>African Connections invites you to “Return to the Motherland!”</strong> Dr. Hakeem and her tour
                            team look forward to having the opportunity to show you the Africa they love so much
                            and know so well!
                          </p>                        
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </section>
