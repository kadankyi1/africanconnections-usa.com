<?php
namespace Database;

class CarouselData
{
    public $carousel_data;

    public function __construct(){
        $this->carousel_data = [
            0 => [
                'img_src' =>'resources/img/home/black_friday_2025.jpg',
                'start' => 'November 20, 2025',  
                'expire' => 'December 5, 2025',
                'onclick' => "window.location='https://africanconnections-usa.com/campaign/1'" 
            ],
            1 => [
                'img_src' =>'resources/img/blog/article/article_20_banner.jpg', 
                'start' => 'July 30, 2025',  
                'expire' => 'August 31, 2025',
                'onclick' => "window.location='https://africanconnections-usa.com/post/20'"   
            ],
            2 => [
                'img_src' =>'resources/img/home/sliderghana.jpg',
                'start' => 'January 1, 2025',                
                'expire' => false,
                'onclick' => "window.location='https://africanconnections-usa.com/country/ghana'"    
            ],
            3 => [
                'img_src' =>'resources/img/home/slideregypt1.jpg',
                'start' => 'January 1, 2025',  
                'expire' => false,
                'onclick' => "window.location='https://africanconnections-usa.com/tour/egypt'" 
            ],
            4 => [
                'img_src' =>'resources/img/home/sliderzanzibar.jpg',
                'start' => 'January 1, 2025',  
                'expire' => false,
                'onclick' => "window.location='https://africanconnections-usa.com/tour/kenya-tanzania-zanzibar'" 
            ],
        ];
    }
}
