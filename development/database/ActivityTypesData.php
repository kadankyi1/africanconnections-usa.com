<?php
namespace Database;

class ActivityTypesData
{
    public $activities_types;

    public function __construct(){
        $this->activities_types = [
            0 => "Page View",
            1 => "Newsletter Subscription",
            2 => "Tour Customization Request",
            3 => "Payment",
            4 => "Tour Registration",
            5 => "Tour Enquiry",
            6 => "Click",
            7 => "Birthday"
        ];
    }
}
