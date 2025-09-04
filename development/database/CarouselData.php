<?php
namespace Database;

class CarouselData
{
    public $carousel_data;

    public function __construct(){
        $this->carousel_data = [
            0 => [
                'img_src' =>'resources/img/blog/article/article_20_banner.jpg', 
                'start' => 'July 30, 2025',  
                'expire' => 'August 31, 2025',
                'onclick' => "window.location='https://africanconnections-usa.com/post/20'"   
            ],
            1 => [
                'img_src' =>'resources/img/home/sliderghana.jpg',
                'start' => 'January 1, 2025',                
                'expire' => false,
                'onclick' => "window.location='https://africanconnections-usa.com/country/ghana'"    
            ],
            2 => [
                'img_src' =>'resources/img/home/slideregypt1.jpg',
                'start' => 'January 1, 2025',  
                'expire' => false,
                'onclick' => "window.location='https://africanconnections-usa.com/tour/egypt'" 
            ],
            3 => [
                'img_src' =>'resources/img/home/sliderzanzibar.jpg',
                'start' => 'January 1, 2025',  
                'expire' => false,
                'onclick' => "window.location='https://africanconnections-usa.com/tour/kenya-tanzania-zanzibar'" 
            ],
        ];
    }
}
