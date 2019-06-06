<?php
// Pull in the configuration file
require 'config.php';

// Capture Post Data
$name = $_POST['name'];
$friendName = $_POST['friendName'];
$phone = $_POST['phone'];

//Send SMS
// prepare the parameters
$url = 'https://www.bulksmsnigeria.com/api/v1/sms/create';
$from = $name;
$body = "Hi " . $friendName . ". Just so you know that I care about you, register for this workshop and thank me later. I just did mine. https://businessitygroup.com/ads-workshop";
$myvars = 'api_token=' . $smstoken . '&from=' . $from . '&to=' . $phone . '&body=' . $body;
//start CURL
// create curl resource
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $myvars);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_exec($ch);

echo 'success';
