<?php
namespace App\Controllers;
//namespace Config;

require '../../vendor/autoload.php';

use Config\App;
use App\Models\Tour;
use Database\Query;



class BlogController
{

    private $tours;
    private $tour;
    private $tour_countries;

    public function getBlogArticles($sorting_and_limiting)
    {
        $query = new Query();
        $results = $query->selectWithOneCondition("articles", "article_small_image", "!=", "", $sorting_and_limiting);
        return $results;
    }

    public function getSingleBlogArticle($id)
    {
        $query = new Query();
        $results = $query->selectWithOneCondition("articles", "id", "=", $id, "");
        return $results;
    }

    public function formatBlogTextForDisplay($root_folder, $article_img_root_folder, $article)
    {
        $app = new App(); // UNIVERSAL
        $page_controller = new PageController();

        for ($i=0; $i < 10; $i++) { 
            if(file_exists($article_img_root_folder . "resources/img/blog/article/bloglist_article_" . $article['id'] . "/bloglist_article_" . $article['id'] ."_extra" . $i+1 . ".png")){
                $article['article_text'] = str_replace("[bloglist_article_" . $article['id'] . "_extra" . $i+1 . ".png]", $root_folder . "resources/img/blog/article/bloglist_article_" . $article['id'] . "/bloglist_article_" . $article['id'] ."_extra" . $i+1 . ".png", $article['article_text']); 
            }
            
                //echo "<br><br>[bloglist_article_" . $article['id'] . "_extra" . $i+1 . ".png]";
                // "<br><br>" .  $root_folder . "resources/img/blog/article/bloglist_article_" . $article['id'] . "/bloglist_article_" . $article['id'] ."_extra" . $i+1 . ".png";
                //echo "<br><br>" .  $new_article_text;
            if(file_exists($article_img_root_folder . "resources/img/blog/article/bloglist_article_" . $article['id'] . "/bloglist_article_" . $article['id'] ."_extra" . $i+1 . ".jpg")){
                $article['article_text'] = str_replace("[bloglist_article_" . $article['id'] . "_extra" . $i+1 . ".jpg]", $root_folder . "resources/img/blog/article/bloglist_article_" . $article['id'] . "/bloglist_article_" . $article['id'] ."_extra" . $i+1 . ".jpg", $article['article_text']); 
            }
            
        }

        foreach ($page_controller->getPages() as $key => $this_page) {
            //var_dump($this_page);
            $article['article_text'] = str_replace("[$key]", $app->getProtocol() . '://' . $app->getDomain() . $this_page['url'], $article['article_text']); 
        } 

        return $article;
    }

}