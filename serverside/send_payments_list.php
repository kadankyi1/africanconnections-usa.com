<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$key = file_get_contents('../.env');
include_once 'classes/Mail.php';
include_once 'classes/Payment.php';

$gw = new gwapi;
$mail = new mailing;

$oneMonthAgo = new \DateTime('1 week ago');
$theFetchDate = $oneMonthAgo->format('Ymd');

//echo $theFetchDate; exit;

try {

    $constraints = "&action_type=sale&start_date=$theFetchDate";
    $testXmlSimple = $gw->testXmlQuery($key,$constraints);
    //var_dump($testXmlSimple);

    $transNum = 1;
    $payments_listing = '<table style="width:100%"> <tr> <th>ID</th> <th>DATE</th> <th>STATUS</th> <th>TOUR NAME</th> <th>FULL NAME</th> <th>EMAIL</th> <th>CARD NO.</th> <th>AMT</th> </tr>';
    foreach($testXmlSimple->transaction as $transaction) {
        $payments_listing =  $payments_listing . '<tr><td>'.$transaction->transaction_id.'</td> <td>'.date_format(date_create($transaction->action->date),"Y/m/d H:i:s").'</td> <td>'.$transaction->action->response_text.'</td> <td>'.$transaction->order_description.'</td> <td>'. $transaction->first_name . " " . $transaction->last_name . '</td> <td>'.$transaction->email.'</td> <td>'.$transaction->cc_number.'</td> <td>'.$transaction->action->amount.'</td></tr>';
    }

    $payments_listing =  $payments_listing . '</table>';
    //print "Success.\n";
    //echo $payments_listing;


    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: <info@africanconnections-usa.com>";
    mail("annodankyikwaku@gmail.com","PAYMENT TRANSACTIONS FOR THE PAST WEEK",$payments_listing,$headers);
    //ashakeem@africanconnections-usa.com
    echo "completed";
} catch (Exception $e) {

    echo $e->getMessage();

}