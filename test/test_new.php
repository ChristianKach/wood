<?php

$post_fields = array(
  'from' => 'ZOE-Info',
  'to' => '225'.'52020158',
  'text' => "Zoé Ministries vous invite à son camp de prière du 21 Aout au 02 Septembre 2017 à Bonoua à l'école Moulo Brou près du centre Don Orione. Theme: \"Je participe à la Grace de Macédoine\" 2Cor. 8 v 1 à 2/7. Participation: 6000 F. Merci de prendre toutes les dispositions requises.Que JESUS vous bénisse."
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.infobip.com/sms/1/text/single",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($post_fields),
  CURLOPT_HTTPHEADER => array(
    "accept: application/json",
    "authorization: Basic Wk1JTklTVFJJRVM6QE1hdGxsZTIwMTdA==",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}