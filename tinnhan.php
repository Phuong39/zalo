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
$data = $_GET['data'];

$file = $data;
$data = json_decode($file);
$data_new = array();
if (isset($data->sender->id)) {
	if (isset($data->message->text) || isset($data->message->attachments[0])) {
		$data_new['id_send'] = $data->sender->id;
		$data_new['id_to'] = $data->recipient->id;
		$data_new['event_name'] = $data->event_name;
		$data_new['message'] = $data->message->text;
		$data_new['url'] = $data->sender->id;
		$abc = $data->timestamp/1000;
		$data_new['date'] = date('d-m-Y H:i:s', (int)$abc);
		if (isset($data->message->text)) {
			$data_new['message'] = $data->message->text;
			$data_new['url'] = '';
		}else{
			$data_new['message'] = '';
			$data_new['url'] = $data->message->attachments[0]->payload->url;
		}
		if($data->event_name == 'oa_send_image' || $data->event_name == 'oa_send_text' || $data->event_name == 'oa_send_sticker'){
			$view = 1;
		} else {
			$view = 0;
		}
	}
}
$a = "2654174022386661497";
$sql = "SELECT *FROM `chatbot` cb  WHERE cb.`id_oa`='".$data_new['id_to']."' ";
$result = $conn->query($sql);
$bot_array = array();
$n = -1;
while($row = $result->fetch_array()) {
	$n++;
	$bot_array[$n]['id_oa'] = $row['id_oa'];
	$bot_array[$n]['keyword'] = $row['keyword'];
	$bot_array[$n]['reply'] = $row['reply'];
	$bot_array[$n]['token'] = $row['access_token'];
}
$abc = array_unique($bot_array,0);
file_put_contents('demo.txt', $sql, FILE_APPEND);
if ($data->event_name == 'user_send_image' || $data->event_name == 'user_send_text' || $data->event_name == 'user_send_sticker') {
	if (!empty($abc)) {
		$sql1 = "SELECT *FROM `user_zaloapp` WHERE zalo_id='".$data_new['id_to']."'";
		$result1 = $conn->query($sql1);
		$row1 = $result1->fetch_array();
		foreach ($abc as $key => $value) {
			$text = explode(',', $value['keyword']);
			$check = 0;
			
			foreach ($text as $key1 => $value1) {
				if (strtolower($data_new['message'])== strtolower($value1)) {
					$check = 1;
					break;
				}
			}

			if ($check == 1) {
				$json = '{
				  "recipient":{
				    "user_id":"'.$data_new['id_send'].'"
				  },
				  "message":{
				    "text":"'.$value['reply'].'"
				  }
				}';
				$curl = curl_init();
				curl_setopt_array($curl, array(
				  CURLOPT_URL => "https://openapi.zalo.me/v2.0/oa/message?access_token=".$row1['access_token']."",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS => $json,
				  CURLOPT_HTTPHEADER => array(
				    "content-type: application/json"
				  ),
				));
				$response = curl_exec($curl);
				curl_close($curl);
			}
		}
	}
}


$sql = "INSERT INTO `datazalo` (`id_send`, `id_to`, `event_name`, `message`, `url`, `date_send`,`view`) VALUES ('".$data_new['id_send']."', '".$data_new['id_to']."','".$data_new['event_name']."', '".$data_new['message']."', '".$data_new['url']."', '".$data_new['date']."', '".$view."')";
$result = $conn->query($sql);

?>