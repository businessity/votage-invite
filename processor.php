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
$body = "Hi " . $friendName . ", Indeed God doesn't send you to a church, He sends you to a man. So, this Sunday, I am inviting you to where love, joyful music and spiritual growth dwells. I love you, that's why I want to share special moments with you at the VOTAGE CHURCH. Venue: Winlos Center, 144, Airport Road, beside INEC Office, Oko-Ogba, Benin City. Time: 8:30am. I'm expecting you.";
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
