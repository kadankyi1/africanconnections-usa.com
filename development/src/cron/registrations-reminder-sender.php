<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://africanconnections-usa.com/cron/registrationsreminders");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($ch);
curl_close($ch);
?>
