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
            ],
            1 => [
                'img_src' =>'resources/img/home/slideregypt1.jpg',
                'start' => 'January 1, 2025',  
                'expire' => false,                
            ],
            2 => [
                'img_src' =>'resources/img/home/slider_banner.jpg',
                'start' => 'January 1, 2025',  
                'expire' => 'May 26, 2025',                
            ],
        ];
    }
}
