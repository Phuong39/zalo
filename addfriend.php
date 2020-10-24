<?php

$servername = "localhost";
$username = "zalov2phan32f7";
$password = "ec0bc410e86b01b6";
$db = "zalov2_phan_32f7";


// Create connection
$conn = new mysqli($servername, $username, $password , $db);
mysqli_set_charset($conn,"utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$encrypto = $_POST['data'];
$zpw_sek = $_POST['zpw_sek'];

$id_user = $_POST['id_user'];
$id_profile = $_POST['id_profile'];
$phone = $_POST['phone'];
$status = $_POST['status'];
$currentDateTime = new DateTime();

// $encrypto = 'kxg2qvHExxPsr/kLMTvHl/uJNECFIgKl3BGP1pylrFaf5XVJHGiGjabG6V8JB3+mrZo9UjoVNyqAf2mer6Dgpg==';

// $zpw_sek = 'zpw_sek=yY7m.291263581.a0.BX4CKM-ACjmotcxDJeeot1IeLxTDi12NGDruj0J-PAGRuGU91Tr0gXZiM-ykjm_-4ktG974yR6HjY-kWcjJh80';
$sql = "INSERT INTO `dataaddfriend` (`user_id`, `id_profile`, `phone`, `status`, `date_add`) VALUES ('".$id_user."','".$id_profile."','".$phone."','".$status."','".$currentDateTime->format("Y-m-d H:i:s")."')";


file_put_contents('demo.txt', $sql);
$conn->query($sql);
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://friend-wpa.zalo.me/api/friend/sendreq?zpw_ver=29&zpw_type=30",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "params=".urlencode($encrypto)."",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "cookie: ".$zpw_sek."",
    "origin: https://chat.zalo.me",
    "referer: https://chat.zalo.me/",
    "user-agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36"
  ),
));

$response = json_decode(curl_exec($curl));
// var_dump($response);die();
curl_close($curl);
file_put_contents('abcd.txt', $response->data, FILE_APPEND);
echo $response->data;