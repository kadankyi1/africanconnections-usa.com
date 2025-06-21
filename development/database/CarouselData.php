<?php
namespace Database;

class CarouselData
{
    public $carousel_data;

    public function __construct(){
        $this->carousel_data = [
            0 => [
                'img_src' =>'resources/img/home/sliderghana.jpg',
                'start' => 'January 1, 2025',                
                'expire' => false,
                'onclick' => "window.location='https://africanconnections-usa.com/development/countries/ghana'"    
            ],
            1 => [
                'img_src' =>'resources/img/home/slideregypt1.jpg',
                'start' => 'January 1, 2025',  
                'expire' => false,
                'onclick' => "window.location='https://africanconnections-usa.com/development/tour/egypt'" 
            ],
            2 => [
                'img_src' =>'resources/img/home/sliderzanzibar.jpg',
                'start' => 'January 1, 2025',  
                'expire' => false,
                'onclick' => "window.location='https://africanconnections-usa.com/development/tour/kenya-tanzania-zanzibar'" 
            ],
            3 => [
                'img_src' =>'resources/img/home/slider_banner.jpg',
                'start' => 'January 1, 2025',  
                'expire' => 'June 21, 2025',
                'onclick' => "window.location='https://africanconnections-usa.com/development/blog'"             
            ],
        ];
    }
}
