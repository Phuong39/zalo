<?php




$encrypto = $_GET['data'];
$emei = $_GET['emei'];
$zpw_sek = $_GET['zpw_sek'];
$phone = $_GET['phone'];
$id_user = $_GET['id_user'];
$id_profile = $_GET['id_profile'];


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://friend-wpa.zalo.me/api/friend/profile/get?zpw_ver=30&zpw_type=30&params=".urlencode($encrypto),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => array(
    "cookie: ".$zpw_sek."",
    "origin: https://chat.zalo.me",
    "referer: https://chat.zalo.me/",
    "user-agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36"
  ),
));

$response = json_decode(curl_exec($curl));
$err = curl_error($curl);

curl_close($curl);
$result = array(
  'phone'=>$phone,
  'data'=>$response
);


file_put_contents('abcd.txt', json_encode($response));
// file_put_contents('abcd.txt', $response->data."\n", FILE_APPEND);
echo json_encode($result);