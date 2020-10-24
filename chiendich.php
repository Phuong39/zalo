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
$sql = "SELECT *,cd.`id` as id_chiendich FROM `chiendich`   cd  JOIN user_zaloapp fa ON fa.`zalo_id`= cd.`id_profile` WHERE cd.`pause`='0' AND cd.`stop`='0' AND cd.`giogui`='09:00:00' AND cd.`user_id` = fa.user_id";
$result = $conn->query($sql);
$data = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$datanew = array();

if (!empty($data)) {

	foreach ($data as $key => $value) {
		$currentDateTime = new DateTime();
		$timecurrent = strtotime($currentDateTime->format("Y-m-d H:i"));
		$timestart = new DateTime($value['date_send']);
		$timeend = new DateTime($value['date_end']);

		
		if (strtotime($timeend->format("Y-m-d H:i")) == strtotime($timestart->format("Y-m-d H:i"))) {
			$datediff = 1;
		} else {
			$datediff = strtotime($timeend->format("Y-m-d H:i")) - strtotime($timestart->format("Y-m-d H:i"));
			$datediff = round($datediff / (60 * 60 * 24))+1;
		}

		if ($value['type'] == 1) {
			$total = count(json_decode($value['phone_list']))/$datediff;
		} else {
			$total = count(json_decode($value['datauser']))/$datediff;
		}
		
		$data[$key]['start'] = ceil($total);

		// if ($value['total'] == 0) {
		// 	$sql = "UPDATE  chiendich SET total=".ceil($total)." WHERE id=".$value['id_chiendich']."";
		// 	$conn->query($sql);
		// }

		if (strtotime($timestart->format("Y-m-d H:i")) <= $timecurrent) {

			if (strtotime($timeend->format("Y-m-d H:i")) == strtotime($timestart->format("Y-m-d H:i"))) {

				$datanew[$key] = $data[$key];
			} else {
				if (strtotime($timeend->format("Y-m-d H:i")) >= $timecurrent ) {

					$datanew[$key] = $data[$key];
				}
			}
			
		}
	}
}

if (!empty($datanew)) {


	foreach ($datanew as $key => $value) {
		if ($value['type'] == 1) {
			$datauser = json_decode($value['phone_list']);
		} else {
			$datauser = json_decode($value['datauser']);
		}
		$datausernew = array();
		if ($value['start_array'] == 0) {
			for ($i=$value['start_array']; $i < $value['start']; $i++) { 
				
				if (!empty($datauser[$i])) {
					array_push($datausernew,$datauser[$i]);
				}
			}
			$st = $value['start']+$value['start'];
			$end = $value['start'];

		} else {
			for ($i=$value['end']; $i <= $value['start_array']; $i++) { 
				if (!empty($datauser[$i])) {
					
					array_push($datausernew,$datauser[$i]);
				}
			}
			$st = $value['start_array']+$value['start'];
			$end = $value['start_array'];
		}



		if (empty($datausernew)) {


			$sql = "UPDATE  chiendich SET stop='1' WHERE id=".$value['id_chiendich']."";
			$conn->query($sql);
		} else {

			if ($value['type'] == 1) {
				$datauserv = json_decode($value['phone_list'],true);
				$phone = array();
				if ($value['start'] > $value['end']) {


					if (($value['start']-$value['end']) < 10) {
						for ($i=$value['end']; $i < ($value['end']+($value['start']-$value['end'])); $i++) {
							if (!empty($datauserv[$i])) {
								
								array_push($phone, $datauserv[$i]);
							}
						}
					} else {
						for ($i=$value['end']; $i < ($value['end']+10); $i++) { 
							if (!empty($datauserv[$i])) {
								
								array_push($phone, $datauserv[$i]);
							}
						}
					}
					$st = $value['end']+20;
					$end = $value['end']+10;
				}

				$pattern = '[0-9]{2}';
				preg_match('/'.$pattern.'/', $value['giogui'], $matches);
				$giogui = ($matches[0]+1).':00:00';
				$sql = "UPDATE  chiendich SET start_array=".$st.",end=".$end.",giogui='".$giogui."' WHERE id=".$value['id_chiendich']."";
				$conn->query($sql);
				$nameuser = array();
				if ($value['image'] == '') {
					var_dump("sdfjhdshfdsfk");die();
					$curl = curl_init();
					curl_setopt_array($curl, array(
					  CURLOPT_URL => "https://sv1.phanmemninja.com/chiendichsdt",
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => "",
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 30,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => "POST",
					  CURLOPT_POSTFIELDS => "cookie=".$value['cookie']."&serectkey=".urlencode($value['serectkey'])."&datauser=".json_encode($phone)."&noidungtinnhan=".$value['noidungtinnhan']."&id_profile=".$value['id_profile']."&image=".$value['image']."&id_chiendich=".$value['id_chiendich']."&nameuser=".json_encode($nameuser)."",
					  CURLOPT_HTTPHEADER => array(
					    "content-type: application/x-www-form-urlencoded"
					  ),
					));

					$response = curl_exec($curl);
					$err = curl_error($curl);

					curl_close($curl);
				} else {
				var_dump("expression");die();
					// $curl = curl_init();
					// curl_setopt_array($curl, array(
					//   CURLOPT_URL => "http://localhost:8080/chiendichsdtimage",
					//   CURLOPT_RETURNTRANSFER => true,
					//   CURLOPT_ENCODING => "",
					//   CURLOPT_MAXREDIRS => 10,
					//   CURLOPT_TIMEOUT => 30,
					//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					//   CURLOPT_CUSTOMREQUEST => "POST",
					//   CURLOPT_POSTFIELDS => "cookie=".$value['cookie']."&serectkey=".urlencode($value['serectkey'])."&datauser=".json_encode($datausernew)."&noidungtinnhan=".$value['noidungtinnhan']."&id_profile=".$value['id_profile']."&image=".$value['image']."&id_chiendich=".$value['id_chiendich']."&nameuser=".json_encode($nameuser)."",
					//   CURLOPT_HTTPHEADER => array(
					//     "content-type: application/x-www-form-urlencoded"
					//   ),
					// ));

					// $response = curl_exec($curl);
					// $err = curl_error($curl);
					// curl_close($curl);
				}

			} else {

				//$sql = "UPDATE  chiendich SET start_array=".$st.",end=".$end." WHERE id=".$value['id_chiendich']."";
				$conn->query($sql);
				$nameuser = array();
				foreach (json_decode($value['nameuser']) as $keyn => $valuen) {
					foreach ($valuen as $keyn1 => $valuen1) {
						$nameuser[$keyn1] =  $valuen1;
					}
				}
				if ($value['image'] == '') {
					
					$curl = curl_init();
					curl_setopt_array($curl, array(
					  CURLOPT_URL => "https://sv1.phanmemninja.com/encryptorcd",
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => "",
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 30,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => "POST",
					  CURLOPT_POSTFIELDS => "cookie=".$value['cookie']."&serectkey=".urlencode($value['serectkey'])."&datauser=".json_encode($datausernew)."&noidungtinnhan=".$value['noidungtinnhan']."&id_profile=".$value['id_profile']."&image=".$value['image']."&id_chiendich=".$value['id_chiendich']."&nameuser=".json_encode($nameuser)."",
					  CURLOPT_HTTPHEADER => array(
					    "content-type: application/x-www-form-urlencoded"
					  ),
					));

					$response = curl_exec($curl);
					$err = curl_error($curl);

					curl_close($curl);
				} else {
					
					$curl = curl_init();
					curl_setopt_array($curl, array(
					  CURLOPT_URL => "https://sv1.phanmemninja.com/encryptorcdimage",
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => "",
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 30,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => "POST",
					  CURLOPT_POSTFIELDS => "cookie=".$value['cookie']."&serectkey=".urlencode($value['serectkey'])."&datauser=".json_encode($datausernew)."&noidungtinnhan=".$value['noidungtinnhan']."&id_profile=".$value['id_profile']."&image=".$value['image']."&id_chiendich=".$value['id_chiendich']."&nameuser=".json_encode($nameuser)."",
					  CURLOPT_HTTPHEADER => array(
					    "content-type: application/x-www-form-urlencoded"
					  ),
					));

					$response = curl_exec($curl);
					$err = curl_error($curl);
					curl_close($curl);
					var_dump($response);die();
				}
			}

			
			// $curl = curl_init();
			// curl_setopt_array($curl, array(
			//   CURLOPT_URL => "https://sv1.phanmemninja.com",
			//   CURLOPT_RETURNTRANSFER => true,
			//   CURLOPT_ENCODING => "",
			//   CURLOPT_MAXREDIRS => 10,
			//   CURLOPT_TIMEOUT => 30,
			//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			//   CURLOPT_CUSTOMREQUEST => "POST",
			//   CURLOPT_POSTFIELDS => "cookie=".$value['cookie']."&serectkey=".urlencode($value['serectkey'])."&datauser=".json_encode($datausernew)."&noidungtinnhan=".$value['noidungtinnhan']."&id_profile=".$value['id_profile']."&image=".$value['image']."&id_chiendich=".$value['id_chiendich']."&nameuser=".$value['nameuser']."",
			//   CURLOPT_HTTPHEADER => array(
			//     "content-type: application/x-www-form-urlencoded"
			//   ),
			// ));

			// $response = curl_exec($curl);
			// $err = curl_error($curl);

			// curl_close($curl);
		}
	}
	die;
}


?>
