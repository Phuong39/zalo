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
$sql = "SELECT *,`id` as id_sch FROM `schedulerpostfb` WHERE `stop`='0' AND `timestart`='2020-07-01 14:43:56'";
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

     
           
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://zalov2.phanmemninja.com/api/schedulePostFBWeb",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
           CURLOPT_POSTFIELDS => "token=".urlencode($value['token'])."&zalo_id=".$value['zalo_id']."&user_id=".$value['user_id']."&fb_id=".$value['fb_id']."&number=".$value['number']."",
          // CURLOPT_POSTFIELDS => $result,
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
         var_dump($response);die();
        curl_close($curl);

        // $a = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // $sql = "UPDATE  schedulerpostfb SET timestart = '".date('Y-m-d H:i:s', strtotime('+1 hour'))."' WHERE id=".$value['id_sch']."";
        // $conn->query($sql);
      

           
  }
}



?>
