<?php
namespace App\Controllers;

require 'vendor/autoload.php';

use Config\App;
use App\Models\Tour;
use Database\Query;
use Database\ActivityTypesData;



class CouponController
{

    public function generateCoupon($promo_name, $user_email)
    {
        $query = new Query();
        $coupon_id = uniqid();
        if(empty($query->selectWithOneCondition("coupons", "coupon_id", "=", $coupon_id, ""))){
            $input_data_array = [
                0 => ['name' =>'promo_name','value' => $promo_name,'type' => "s"],
                1 => ['name' =>'coupon_id','value' => $coupon_id,'type' => "s"],
                2 => ['name' =>'user_email','value' => $user_email,'type' => "s"]
            ];
            if(!$query->insertToTable("coupons", $input_data_array)){
                return (object) ["status" => 0, "heading" => "Fail", "message" => ""];
            }

            return (object) ["status" => 1, "heading" => "Success", "message" => $coupon_id];
        } else {
            return (object) ["status" => 0, "heading" => "Fail", "message" => ""];
        }

        
    }



}