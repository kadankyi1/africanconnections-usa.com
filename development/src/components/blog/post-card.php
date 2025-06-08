<div class="col-md-4 col-sm-12">
    <div class="blog-post mt-0">
        <a href="<?php echo $app->getProtocol() . '://' . $app->getDomain() . $page_controller->getOnePageDetails('blog_post')->url; ?>/<?php echo $post['id'];?>;?>">
        <div class="blog-thumb">
            <img src="<?php echo $root_folder. "/resources" . $post['article_small_image'];?>" alt="Blog Article Banner">
        </div>
        </a>
        <div class="down-content">
        <a href="<?php echo $app->getProtocol() . '://' . $app->getDomain() . $page_controller->getOnePageDetails('blog_post')->url; ?>/<?php echo $post['id'];?>">
            <h4><?php echo $post['article_title'];?></h4>
            
            <p class="texttoblack">
            <?php echo $post['article_intro_text'];?>
            </p>
        </a>
        <ul class="post-info">
            <li><?php echo $post['article_author'];?></li>
            <li>
            <?php 
                $date=date_create($post['created_at']);
                echo date_format($date,"m.d.Y H:i");
            ?>
            </li>
            
        </ul>
        </div>
    </div>
</div>
