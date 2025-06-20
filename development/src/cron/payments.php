<?php
$root_folder = '../../'; // UNIVERSAL
require $root_folder . 'config/App.php';

$app = new Config\App();

$ch = curl_init($app->getProtocol() . '://' . $app->getDomain() . '/cron/payments');
$fp = fopen("example_homepage.txt", "w");

curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);

curl_exec($ch);
if(curl_error($ch)) {
    fwrite($fp, curl_error($ch));
}
curl_close($ch);
fclose($fp);
?>
