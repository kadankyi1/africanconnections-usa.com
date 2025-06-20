<?php
namespace App\Controllers;
//namespace Config;

require 'vendor/autoload.php';

use Config\App;

define("APPROVED", 1);
define("DECLINED", 2);
define("ERROR", 3);

class PaymentController 
{

// Initial Setting Functions

  public function setLogin($security_key) 
  {
    $this->login['security_key'] = $security_key;
  }

  public function setOrder($orderid, $orderdescription, $tax, $shipping, $ponumber, $ipaddress) 
  {
    $this->order['orderid']          = $orderid;
    $this->order['orderdescription'] = $orderdescription;
    $this->order['tax']              = $tax;
    $this->order['shipping']         = $shipping;
    $this->order['ponumber']         = $ponumber;
    $this->order['ipaddress']        = $ipaddress;
  }

  public function setBilling($firstname, $lastname, $company,$address1,$address2, $city, $state, $zip, $country, $phone, $fax, $email, $website, $client_id) 
  {
    $this->billing['firstname'] = $firstname;
    $this->billing['lastname']  = $lastname;
    $this->billing['company']   = $company;
    $this->billing['address1']  = $address1;
    $this->billing['address2']  = $address2;
    $this->billing['city']      = $city;
    $this->billing['state']     = $state;
    $this->billing['zip']       = $zip;
    $this->billing['country']   = $country;
    $this->billing['phone']     = $phone;
    $this->billing['fax']       = $fax;
    $this->billing['email']     = $email;
    $this->billing['website']   = $website;
    $this->billing['merchant_defined_field_1']   = $website;
  }

  public function setShipping($firstname, $lastname, $company, $address1, $address2, $city, $state, $zip, $country, $email) 
  {
    $this->shipping['firstname'] = $firstname;
    $this->shipping['lastname']  = $lastname;
    $this->shipping['company']   = $company;
    $this->shipping['address1']  = $address1;
    $this->shipping['address2']  = $address2;
    $this->shipping['city']      = $city;
    $this->shipping['state']     = $state;
    $this->shipping['zip']       = $zip;
    $this->shipping['country']   = $country;
    $this->shipping['email']     = $email;
  }

  // Transaction Functions

  //public function doSale($amount, $ccnumber, $ccexp, $cvv="")
  public function doSale($amount, $payment_token) 
  {

    $query  = "";
    // Login Information
    $query .= "security_key=" . urlencode($this->login['security_key']) . "&";
    // Sales Information
    //$query .= "ccnumber=" . urlencode($ccnumber) . "&";
    //$query .= "ccexp=" . urlencode($ccexp) . "&";
    //$query .= "cvv=" . urlencode($cvv) . "&";
    $query .= "payment_token=" . urlencode($payment_token) . "&";
    $query .= "amount=" . urlencode(number_format($amount,2,".","")) . "&";
    // Order Information
    $query .= "ipaddress=" . urlencode($this->order['ipaddress']) . "&";
    $query .= "orderid=" . urlencode($this->order['orderid']) . "&";
    $query .= "orderdescription=" . urlencode($this->order['orderdescription']) . "&";
    $query .= "tax=" . urlencode(number_format($this->order['tax'],2,".","")) . "&";
    $query .= "shipping=" . urlencode(number_format($this->order['shipping'],2,".","")) . "&";
    $query .= "ponumber=" . urlencode($this->order['ponumber']) . "&";
    // Billing Information
    $query .= "firstname=" . urlencode($this->billing['firstname']) . "&";
    $query .= "lastname=" . urlencode($this->billing['lastname']) . "&";
    /*
    $query .= "company=" . urlencode($this->billing['company']) . "&";
    $query .= "address1=" . urlencode($this->billing['address1']) . "&";
    $query .= "address2=" . urlencode($this->billing['address2']) . "&";
    $query .= "city=" . urlencode($this->billing['city']) . "&";
    $query .= "state=" . urlencode($this->billing['state']) . "&";
    $query .= "zip=" . urlencode($this->billing['zip']) . "&";
    $query .= "country=" . urlencode($this->billing['country']) . "&";
    $query .= "phone=" . urlencode($this->billing['phone']) . "&";
    $query .= "fax=" . urlencode($this->billing['fax']) . "&";
    $query .= "website=" . urlencode($this->billing['website']) . "&";
    */
    $query .= "email=" . urlencode($this->billing['email']) . "&";
    /*
    // Shipping Information
    $query .= "shipping_firstname=" . urlencode($this->shipping['firstname']) . "&";
    $query .= "shipping_lastname=" . urlencode($this->shipping['lastname']) . "&";
    $query .= "shipping_company=" . urlencode($this->shipping['company']) . "&";
    $query .= "shipping_address1=" . urlencode($this->shipping['address1']) . "&";
    $query .= "shipping_address2=" . urlencode($this->shipping['address2']) . "&";
    $query .= "shipping_city=" . urlencode($this->shipping['city']) . "&";
    $query .= "shipping_state=" . urlencode($this->shipping['state']) . "&";
    $query .= "shipping_zip=" . urlencode($this->shipping['zip']) . "&";
    $query .= "shipping_country=" . urlencode($this->shipping['country']) . "&";
    $query .= "shipping_email=" . urlencode($this->shipping['email']) . "&";
    */
    $query .= "type=sale";
    return $this->_doPost($query);
  }

  public function doAuth($amount, $ccnumber, $ccexp, $cvv="") 
  {

    $query  = "";
    // Login Information
    $query .= "security_key=" . urlencode($this->login['security_key']) . "&";
    // Sales Information
    $query .= "ccnumber=" . urlencode($ccnumber) . "&";
    $query .= "ccexp=" . urlencode($ccexp) . "&";
    $query .= "amount=" . urlencode(number_format($amount,2,".","")) . "&";
    $query .= "cvv=" . urlencode($cvv) . "&";
    // Order Information
    $query .= "ipaddress=" . urlencode($this->order['ipaddress']) . "&";
    $query .= "orderid=" . urlencode($this->order['orderid']) . "&";
    $query .= "orderdescription=" . urlencode($this->order['orderdescription']) . "&";
    $query .= "tax=" . urlencode(number_format($this->order['tax'],2,".","")) . "&";
    $query .= "shipping=" . urlencode(number_format($this->order['shipping'],2,".","")) . "&";
    $query .= "ponumber=" . urlencode($this->order['ponumber']) . "&";
    // Billing Information
    $query .= "firstname=" . urlencode($this->billing['firstname']) . "&";
    $query .= "lastname=" . urlencode($this->billing['lastname']) . "&";
    $query .= "company=" . urlencode($this->billing['company']) . "&";
    $query .= "address1=" . urlencode($this->billing['address1']) . "&";
    $query .= "address2=" . urlencode($this->billing['address2']) . "&";
    $query .= "city=" . urlencode($this->billing['city']) . "&";
    $query .= "state=" . urlencode($this->billing['state']) . "&";
    $query .= "zip=" . urlencode($this->billing['zip']) . "&";
    $query .= "country=" . urlencode($this->billing['country']) . "&";
    $query .= "phone=" . urlencode($this->billing['phone']) . "&";
    $query .= "fax=" . urlencode($this->billing['fax']) . "&";
    $query .= "email=" . urlencode($this->billing['email']) . "&";
    $query .= "website=" . urlencode($this->billing['website']) . "&";
    // Shipping Information
    $query .= "shipping_firstname=" . urlencode($this->shipping['firstname']) . "&";
    $query .= "shipping_lastname=" . urlencode($this->shipping['lastname']) . "&";
    $query .= "shipping_company=" . urlencode($this->shipping['company']) . "&";
    $query .= "shipping_address1=" . urlencode($this->shipping['address1']) . "&";
    $query .= "shipping_address2=" . urlencode($this->shipping['address2']) . "&";
    $query .= "shipping_city=" . urlencode($this->shipping['city']) . "&";
    $query .= "shipping_state=" . urlencode($this->shipping['state']) . "&";
    $query .= "shipping_zip=" . urlencode($this->shipping['zip']) . "&";
    $query .= "shipping_country=" . urlencode($this->shipping['country']) . "&";
    $query .= "shipping_email=" . urlencode($this->shipping['email']) . "&";
    $query .= "type=auth";
    return $this->_doPost($query);
  }

  public function doCredit($amount, $ccnumber, $ccexp) 
  {

    $query  = "";
    // Login Information
    $query .= "security_key=" . urlencode($this->login['security_key']) . "&";
    // Sales Information
    $query .= "ccnumber=" . urlencode($ccnumber) . "&";
    $query .= "ccexp=" . urlencode($ccexp) . "&";
    $query .= "amount=" . urlencode(number_format($amount,2,".","")) . "&";
    // Order Information
    $query .= "ipaddress=" . urlencode($this->order['ipaddress']) . "&";
    $query .= "orderid=" . urlencode($this->order['orderid']) . "&";
    $query .= "orderdescription=" . urlencode($this->order['orderdescription']) . "&";
    $query .= "tax=" . urlencode(number_format($this->order['tax'],2,".","")) . "&";
    $query .= "shipping=" . urlencode(number_format($this->order['shipping'],2,".","")) . "&";
    $query .= "ponumber=" . urlencode($this->order['ponumber']) . "&";
    // Billing Information
    $query .= "firstname=" . urlencode($this->billing['firstname']) . "&";
    $query .= "lastname=" . urlencode($this->billing['lastname']) . "&";
    $query .= "company=" . urlencode($this->billing['company']) . "&";
    $query .= "address1=" . urlencode($this->billing['address1']) . "&";
    $query .= "address2=" . urlencode($this->billing['address2']) . "&";
    $query .= "city=" . urlencode($this->billing['city']) . "&";
    $query .= "state=" . urlencode($this->billing['state']) . "&";
    $query .= "zip=" . urlencode($this->billing['zip']) . "&";
    $query .= "country=" . urlencode($this->billing['country']) . "&";
    $query .= "phone=" . urlencode($this->billing['phone']) . "&";
    $query .= "fax=" . urlencode($this->billing['fax']) . "&";
    $query .= "email=" . urlencode($this->billing['email']) . "&";
    $query .= "website=" . urlencode($this->billing['website']) . "&";
    $query .= "type=credit";
    return $this->_doPost($query);
  }

  public function doOffline($authorizationcode, $amount, $ccnumber, $ccexp) 
  {

    $query  = "";
    // Login Information
    $query .= "security_key=" . urlencode($this->login['security_key']) . "&";
    // Sales Information
    $query .= "ccnumber=" . urlencode($ccnumber) . "&";
    $query .= "ccexp=" . urlencode($ccexp) . "&";
    $query .= "amount=" . urlencode(number_format($amount,2,".","")) . "&";
    $query .= "authorizationcode=" . urlencode($authorizationcode) . "&";
    // Order Information
    $query .= "ipaddress=" . urlencode($this->order['ipaddress']) . "&";
    $query .= "orderid=" . urlencode($this->order['orderid']) . "&";
    $query .= "orderdescription=" . urlencode($this->order['orderdescription']) . "&";
    $query .= "tax=" . urlencode(number_format($this->order['tax'],2,".","")) . "&";
    $query .= "shipping=" . urlencode(number_format($this->order['shipping'],2,".","")) . "&";
    $query .= "ponumber=" . urlencode($this->order['ponumber']) . "&";
    // Billing Information
    $query .= "firstname=" . urlencode($this->billing['firstname']) . "&";
    $query .= "lastname=" . urlencode($this->billing['lastname']) . "&";
    $query .= "company=" . urlencode($this->billing['company']) . "&";
    $query .= "address1=" . urlencode($this->billing['address1']) . "&";
    $query .= "address2=" . urlencode($this->billing['address2']) . "&";
    $query .= "city=" . urlencode($this->billing['city']) . "&";
    $query .= "state=" . urlencode($this->billing['state']) . "&";
    $query .= "zip=" . urlencode($this->billing['zip']) . "&";
    $query .= "country=" . urlencode($this->billing['country']) . "&";
    $query .= "phone=" . urlencode($this->billing['phone']) . "&";
    $query .= "fax=" . urlencode($this->billing['fax']) . "&";
    $query .= "email=" . urlencode($this->billing['email']) . "&";
    $query .= "website=" . urlencode($this->billing['website']) . "&";
    // Shipping Information
    $query .= "shipping_firstname=" . urlencode($this->shipping['firstname']) . "&";
    $query .= "shipping_lastname=" . urlencode($this->shipping['lastname']) . "&";
    $query .= "shipping_company=" . urlencode($this->shipping['company']) . "&";
    $query .= "shipping_address1=" . urlencode($this->shipping['address1']) . "&";
    $query .= "shipping_address2=" . urlencode($this->shipping['address2']) . "&";
    $query .= "shipping_city=" . urlencode($this->shipping['city']) . "&";
    $query .= "shipping_state=" . urlencode($this->shipping['state']) . "&";
    $query .= "shipping_zip=" . urlencode($this->shipping['zip']) . "&";
    $query .= "shipping_country=" . urlencode($this->shipping['country']) . "&";
    $query .= "shipping_email=" . urlencode($this->shipping['email']) . "&";
    $query .= "type=offline";
    return $this->_doPost($query);
  }

  public function doCapture($transactionid, $amount =0) 
  {

    $query  = "";
    // Login Information
    $query .= "security_key=" . urlencode($this->login['security_key']) . "&";
    // Transaction Information
    $query .= "transactionid=" . urlencode($transactionid) . "&";
    if ($amount>0) {
        $query .= "amount=" . urlencode(number_format($amount,2,".","")) . "&";
    }
    $query .= "type=capture";
    return $this->_doPost($query);
  }

  public function doVoid($transactionid) 
  {

    $query  = "";
    // Login Information
    $query .= "security_key=" . urlencode($this->login['security_key']) . "&";
    // Transaction Information
    $query .= "transactionid=" . urlencode($transactionid) . "&";
    $query .= "type=void";
    return $this->_doPost($query);
  }

  public function doRefund($transactionid, $amount = 0) {

    $query  = "";
    // Login Information
    $query .= "security_key=" . urlencode($this->login['security_key']) . "&";
    // Transaction Information
    $query .= "transactionid=" . urlencode($transactionid) . "&";
    if ($amount>0) {
        $query .= "amount=" . urlencode(number_format($amount,2,".","")) . "&";
    }
    $query .= "type=refund";
    return $this->_doPost($query);
  }

  public function _doPost($query) 
  {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://secure.magicpaygateway.com/api/transact.php");
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
    curl_setopt($ch, CURLOPT_POST, 1);

    if (!($data = curl_exec($ch))) {
        return ERROR;
    }
    curl_close($ch);
    unset($ch);
    //print "\n$data\n";
    $data = explode("&",$data);
    for($i=0;$i<count($data);$i++) {
        $rdata = explode("=",$data[$i]);
        $this->responses[$rdata[0]] = $rdata[1];
    }
    return $this->responses['response'];
    //return $this->responses;
  }

  public function testXmlQuery($security_key,$constraints)
  {
    // transactionFields has all of the fields we want to validate
    // in the transaction tag in the XML output
    $transactionFields = array(
        'transaction_id',
        'partial_payment_id',
        'partial_payment_balance',
        'platform_id',
        'transaction_type',
        'condition',
        'order_id',
        'authorization_code',
        'ponumber',
        'order_description',

        'first_name',
        'last_name',
        'address_1',
        'address_2',
        'company',
        'city',
        'state',
        'postal_code',
        'country',
        'email',
        'phone',
        'fax',
        'cell_phone',
        'customertaxid',
        'customerid',
        'website',

        'shipping_first_name',
        'shipping_last_name',
        'shipping_address_1',
        'shipping_address_2',
        'shipping_company',
        'shipping_city',
        'shipping_state',
        'shipping_postal_code',
        'shipping_country',
        'shipping_email',
        'shipping_carrier',
        'tracking_number',
        'shipping_date',
        'shipping',
        'shipping_phone',

        'cc_number',
        'cc_hash',
        'cc_exp',
        'cavv',
        'cavv_result',
        'xid',
        'eci',
        'avs_response',
        'csc_response',
        'cardholder_auth',
        'cc_start_date',
        'cc_issue_number',
        'check_account',
        'check_hash',
        'check_aba',
        'check_name',
        'account_holder_type',
        'account_type',
        'sec_code',
        'drivers_license_number',
        'drivers_license_state',
        'drivers_license_dob',
        'social_security_number',

        'processor_id',
        'tax',
        'currency',
        'surcharge',
        'tip',

        'card_balance',
        'card_available_balance',
        'entry_mode',
        'cc_bin',
        'cc_type'
    );

    // actionFields is used to validate the XML tags in the
    // action element
     $actionFields = array(
         'amount',
         'action_type',
         'date',
         'success',
         'ip_address',
         'source',
         'api_method',
         'username',
         'response_text',
         'batch_id',
         'processor_batch_id',
         'response_code',
         'processor_response_text',
         'processor_response_code',
         'device_license_number',
         'device_nickname'
        );

    $mycurl=curl_init();
    $postStr='security_key='.$security_key.$constraints;
    $url="https://secure.magicpaygateway.com/api/query.php?". $postStr;
    curl_setopt($mycurl, CURLOPT_URL, $url);
    curl_setopt($mycurl, CURLOPT_RETURNTRANSFER, 1);
    $responseXML=curl_exec($mycurl);
    curl_close($mycurl);
    //var_dump($responseXML);

    $testXmlSimple= new \SimpleXMLElement($responseXML);

    if (!isset($testXmlSimple->transaction)) {
            throw new \Exception('No transactions returned');
    }

    $transNum = 1;
    foreach($testXmlSimple->transaction as $transaction) {
        foreach ($transactionFields as $xmlField) {
            if (!isset($transaction->{$xmlField}[0])){
                throw new \Exception('Error in transaction_id:'. $transaction->transaction_id[0] .' id  Transaction tag is missing  field ' . $xmlField);
            }
        }
        if (!isset ($transaction->action)) {
            throw new \Exception('Error, Action tag is missing from transaction_id '. $transaction->transaction_id[0]);
        }

        $actionNum = 1;
        foreach ($transaction->action as $action){
            foreach ($actionFields as $xmlField){
                if (!isset($action->{$xmlField}[0])){
                    throw new \Exception('Error with transaction_id'.$transaction->transaction_id[0].'
                                        Action number '. $actionNum . ' Action tag is missing field ' . $xmlField);
                }
            }
            $actionNum++;
        }
        $transNum++;
    }

    return $testXmlSimple;
  }

  public function getPaymentsReport($start_date) //Ymd format
  {
    $mail_controller = new MailController();
    $app = new App();
    
    $constraints = "&action_type=sale&start_date=$start_date";
    $testXmlSimple = $this->testXmlQuery($app->getPaymentKey(),$constraints);
    //var_dump($testXmlSimple);

    $transNum = 1;
    $payments_listing = '<table style="width:100%"> <tr> <th>ID</th> <th>DATE</th> <th>STATUS</th> <th>TOUR NAME</th> <th>FULL NAME</th> <th>EMAIL</th> <th>CARD NO.</th> <th>AMT</th> </tr>';
    foreach($testXmlSimple->transaction as $transaction) {
        $payments_listing =  $payments_listing . '<tr><td>'.$transaction->transaction_id.'</td> <td>'.date_format(date_create($transaction->action->date),"Y/m/d H:i:s").'</td> <td>'.$transaction->action->response_text.'</td> <td>'.$transaction->order_description.'</td> <td>'. $transaction->first_name . " " . $transaction->last_name . '</td> <td>'.$transaction->email.'</td> <td>'.$transaction->cc_number.'</td> <td>'.$transaction->action->amount.'</td></tr>';
    }

    $payments_listing =  $payments_listing . '</table>';

    $mail_controller->sendMail($mail_controller->main_address, "PAYMENTS REPORT", $payments_listing);

    return $payments_listing;
  }
}
