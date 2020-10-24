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
$currentDateTime = new DateTime();
$time = $currentDateTime->format("H").':00:00';
$currentDateTime->format("Y-m-d H:i:s");
// var_dump($currentDateTime->format("Y-m-d H:i"));die();
$sql = "SELECT *,cd.`id` as id_sch FROM `schedule_post`   cd  JOIN user_zaloapp fa ON fa.`zalo_id`= cd.`id_profile` WHERE cd.`stop`='0' AND cd.`time_start`='". $currentDateTime->format("Y-m-d H:i")."' AND cd.`user_id` = fa.user_id";
$result = $conn->query($sql);


$data = array();
if ($result->num_rows > 0) {
	
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
if (!empty($data)) {

	foreach ($data as $key => $value) {

	    if($value['type_post'] == 'status' || $value['type_post'] == 'link'|| $value['type_post'] == 'image' || $value['type_post'] == 'video'){
           
            $curl = curl_init();
				curl_setopt_array($curl, array(
				  CURLOPT_URL => "https://zalov2.phanmemninja.com/api/schedulePostWeb",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				   CURLOPT_POSTFIELDS => "content=".$value['content']."&id_profile=".$value['id_profile']."&user_id=".$value['user_id']."&type_post=".$value['type_post']."",
				  // CURLOPT_POSTFIELDS => $result,
				  CURLOPT_HTTPHEADER => array(
				    "content-type: application/x-www-form-urlencoded"
				  ),
				));

				$response = curl_exec($curl);
				$err = curl_error($curl);
                // var_dump($response);die();
				curl_close($curl);

				$a = date('Y-m-d H:i:s', strtotime('+1 days'));

				$sql = "UPDATE  schedule_post SET time_start = '".date('Y-m-d H:i:s', strtotime('+1 days'))."' WHERE id=".$value['id_sch']."";
				$conn->query($sql);
	    }

		       
	}
}



?>
