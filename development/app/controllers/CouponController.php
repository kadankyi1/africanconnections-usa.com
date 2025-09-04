<?php
namespace App\Controllers;

require 'vendor/autoload.php';

use Config\App;
use App\Models\Tour;
use Database\Query;
use Database\ActivityTypesData;



class CouponController
{

    public function generateCoupon($promo_name, $user_email, $coupon_amt)
    {
        $query = new Query();
        $coupon_id = uniqid();

        $time_to_expire = new \DateTime('6 months');
        $expiry_date = $time_to_expire->format('Y-m-d');
        $expiry_date_nice = $time_to_expire->format('F j Y');

        if(empty($query->selectWithOneCondition("coupons", "coupon_id", "=", $coupon_id, ""))){
            $input_data_array = [
                0 => ['name' =>'promo_name','value' => $promo_name,'type' => "s"],
                1 => ['name' =>'coupon_id','value' => $coupon_id,'type' => "s"],
                2 => ['name' =>'user_email','value' => $user_email,'type' => "s"],
                3 => ['name' =>'expiry_date','value' => $expiry_date,'type' => "s"],
                4 => ['name' =>'coupon_amt','value' => $coupon_amt,'type' => "i"]
            ];
            if(!$query->insertToTable("coupons", $input_data_array)){
                $_SESSION["result"] = (object) ["status" => 0, "heading" => "Fail", "message" => ""];
                return $_SESSION["result"];
            }

            $_SESSION["result"] = (object) ["status" => 1, "heading" => "Success", "message" => $coupon_id, "message2" => $expiry_date_nice];
            return $_SESSION["result"];
        } else {
            $_SESSION["result"] = (object) ["status" => 0, "heading" => "Fail", "message" => ""];
            return $_SESSION["result"];
        }

        
    }


    public function applyCoupon($discount_code, $user_email, $client_tours, $tour_id)
    {
        $app = new App();
        $query = new Query();

        $input_data_array = [
            0 => $discount_code,
            //1 => $user_email,
        ];
        $coupon = $query->select("SELECT * FROM coupons WHERE coupon_id = ?", $input_data_array);
        if(empty($coupon)) {
            return $_SESSION['result'] = (object) ['status' => 0, 'discount_code' => '', 'message' => '', 'message2' => ''];
        } else if($coupon[0]['user_email'] != $user_email){
            return $_SESSION['result'] = (object) ['status' => 0,  'discount_code' => '', 'message' => 'The discount code did not apply since it does not belong to you.', 'message2' => '<p> <strong>The discount code did not apply since it does not belong to you</strong></p>'];
        } else if(!empty($coupon) && $coupon[0]['redeemed'] == 0 && !$app->isDatePassed($coupon[0]['expiry_date']) && !str_contains($client_tours, $tour_id)){
            return $_SESSION['result'] = (object) ['status' => 1,  'discount_code' => $discount_code, 'message' => 'Discount of $' . $coupon[0]['coupon_amt'] .  ' was applied.', 'message2' => '<tr> <td width="80%" class="purchase_item"><span class="f-fallback">Promo Credit</span></td> <td class="align-right" width="20%" class="purchase_item"><span class="f-fallback">$' . $coupon[0]['coupon_amt'] . '</span></td> </tr>'];
        } else if($coupon[0]['redeemed'] == 1) {
            return $_SESSION['result'] = (object) ['status' => 0,  'discount_code' => '', 'message' => 'Your discount code has already been redeemed and therefore did not apply.', 'message2' => '<p> <strong>Your discount code has already been redeemed and therefore did not apply</strong></p>'];
        } else if($app->isDatePassed($coupon[0]['expiry_date'])) {
            return $_SESSION['result'] = (object) ['status' => 0,  'discount_code' => '', 'message' => 'Your discount code has expired and therefore did not apply.', 'message2' => '<p> <strong>Your discount code has expired and therefore did not apply</strong></p>'];
        } else if(str_contains($client_tours, $tour_id)) {
            return $_SESSION['result'] = (object) ['status' => 0,  'discount_code' => '', 'message' => 'Your discount code did not apply because you are already booked on the tour.', 'message2' => '<p> <strong>Your discount code did not apply because you are already booked on the tour</strong></p>'];
        } else {
            return $_SESSION['result'] = (object) ['status' => 0,  'discount_code' => '', 'message' => 'Your discount code did not apply because it could not be verified.', 'message2' => '<p> <strong>Your discount code did not apply because it could not be verified</strong></p>'];
        }
    }



}