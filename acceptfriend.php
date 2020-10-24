<?php
$cookie_a = $_POST['cookie'];
$encrypted = $_POST['encrypted'];


$curl = curl_init();


curl_setopt_array($curl, array(
  CURLOPT_URL => "https://friend-wpa.zalo.me/api/friend/accept?zpw_ver=30&zpw_type=30",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "params=".$encrypted."",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "cookie: ".$cookie_a."",
    "origin: https://chat.zalo.me",
    "referer: https://chat.zalo.me/",
    "user-agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36"
  ),
));

$response = json_decode(curl_exec($curl));
$err = curl_error($curl);
file_put_contents('data.txt', $encrypted);
curl_close($curl);
echo $response->data;
?>