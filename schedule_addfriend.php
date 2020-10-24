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
//var_dump($a);
$sql = "SELECT *,cd.`id` as id_sch FROM `schedule_addfriend`   cd  JOIN user_zaloapp fa ON fa.`zalo_id`= cd.`id_profile` WHERE cd.`stop`='0' AND cd.`time_next`<='". $currentDateTime->format("Y-m-d H:i:s")."' AND cd.`dataphone`!='[]'  AND cd.`user_id` = fa.user_id";
//$sql = "SELECT *,cd.`id` as id_sch  FROM `schedule_addfriend`   cd  JOIN user_zaloapp fa ON fa.`zalo_id`= cd.`id_profile` WHERE cd.`stop`='0' AND  cd.`user_id` = fa.`user_id`";
$result = $conn->query($sql);



$data = array();
if ($result->num_rows > 0) {
	
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
var_dump($data);

if (!empty($data)) {

	foreach ($data as $key => $value) {
		
		if ($value['number_start'] >= 30) {
			$timenext = date('Y-m-d h:i:s', strtotime($value['time_start']) + 86400);
			$sql = "UPDATE  schedule_addfriend SET time_next = '".$timenext."',time_start = '".$timenext."',number_start = 10 WHERE id=".$value['id_sch']."";
			$conn->query($sql);
			
		} else {
			$phonenew = array();
			$phonesave = array();
			$dataphone = json_decode($value['dataphone']);
			if (!empty($dataphone)) {
				if (count($dataphone) > 10) {
					for ($i=0; $i < 10; $i++) { 
						array_push($phonenew, $dataphone[$i]);
					}

					for ($i=10; $i <= count($dataphone); $i++) {
						if (isset($dataphone[$i])) {
							array_push($phonesave, $dataphone[$i]);
						}
					}
				} else {
					for ($i=0; $i <= count($dataphone); $i++) {
						if (isset($dataphone[$i])) {
							array_push($phonenew, $dataphone[$i]);
						}
					}
				}

                
        // $result = array(
        //     'cookie'=>$value['cookie'],
        //     'emei' => $value['emei'],
        //     'serectkey' => urlencode($value['serectkey']),
        //     'phone' => json_encode($phonenew),
        //     'noidungtinnhan' => $value['content'],
        //     'id_profile' => $value['id_profile'],
        //     'id_user' =>$value['user_id']
        // );

				$curl = curl_init();
				curl_setopt_array($curl, array(
				  CURLOPT_URL => "https://sv1.phanmemninja.com/addfriend",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				   CURLOPT_POSTFIELDS => "cookie=".$value['cookie']."&emei=".$value['emei']."&serectkey=".urlencode($value['serectkey'])."&phone=".json_encode($phonenew)."&noidungtinnhan=".$value['content']."&id_profile=".$value['id_profile']."&id_user=".$value['user_id']."",
				  // CURLOPT_POSTFIELDS => $result,
				  CURLOPT_HTTPHEADER => array(
				    "content-type: application/x-www-form-urlencoded"
				  ),
				));

				$response = curl_exec($curl);
				$err = curl_error($curl);

				curl_close($curl);
				$a = date('Y-m-d H:i:s', strtotime('+2 hour'));

				$sql = "UPDATE  schedule_addfriend SET time_next = '".date('Y-m-d H:i:s', strtotime('+2 hour'))."',number_start = '".($value['number_start']+10)."',dataphone = '".json_encode($phonesave)."' WHERE id=".$value['id_sch']."";
				$conn->query($sql);
				
				if ($value['number_start']+10 >= 30) {
					$timenext = date('Y-m-d h:i:s', strtotime($value['time_start']) + 86400);
					$sql = "UPDATE  schedule_addfriend SET time_next = '".$timenext."',time_start = '".$timenext."',number_start = 10 WHERE id=".$value['id_sch']."";
					$conn->query($sql);
				}
				//var_dump($value['id_sch']);
			}

		}
	}
}



?>
