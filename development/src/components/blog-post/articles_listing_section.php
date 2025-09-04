<section class="blog-posts grid-system">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                <div class="col-lg-12">
                  <div class="blog-post">
                    <div class="blog-thumb">
                      <img src="<?php echo $app->getProtocol() . '://' . $app->getDomain() .  "/resources" .  $article[0]['article_big_image']; ?>" alt="Blog Article Banner">
                    </div>
                    <div class="down-content">
                      <a><h1 class="fontsize35"><strong><?php echo $article[0]['article_title']; ?></strong></h1></a>
                      <ul class="post-info">
                        <li><a><?php echo $article[0]['article_author']; ?></a></li>
                        <li>
                          <a>
                            <?php 
                                $date=date_create($article[0]['article_date']);
                                echo date_format($date,"m.d.Y H:i");
                            ?>
                          </a>
                        </li>
                      </ul>
                      <p>
                      <?php echo $blog_controller->formatBlogTextForDisplay($root_folder, $article_img_root_folder, $article[0])['article_text']; ?>
                      </p>
                      <div class="post-options">
                        <div class="row">
                          <div class="col-6">
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="sidebar">
              <div class="row">
                <div class="col-lg-12">
                  <div class="sidebar-item recent-posts mt-0">
                    <div class="sidebar-heading mt-0">
                      <h2>Other Posts</h2>
                    </div>
                    <div>
                      <ul>
                        <?php for ($i=0; $i < count($articles); $i++) { ?>
                        <li>
                          <a href="<?php echo $app->getProtocol() . '://' . $app->getDomain() . $page_controller->getOnePageDetails('blog_post')->url; ?>/<?php echo $articles[$i]['id'];?>">
                            <h5><?php echo $articles[$i]['article_title']; ?></h5>
                            <span><?php $date=date_create($articles[$i]['article_date']); echo date_format($date,"m.d.Y H:i"); ?></span>
                          </a>
                        </li>
                        <?php } ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
