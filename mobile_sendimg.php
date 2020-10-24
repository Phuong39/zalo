<?php
$cookie = $_GET['cookie'];
$serectkey = $_GET['serectkey'];
$encrypted = $_GET['data'];
// $cookie = "zpw_sek=jZo-.153134767.a0.kU7bYhhzvwiLMyUYc_tdgy7VWi2OnyNOx9Qec_MdWE73YwxnoOZKqSkCqPZxmDg9nve5KwHBkHEu_09nQwEREm";
// $serectkey ="sVkO0OZgJyvIZsu3zqq63A==";
// $encrypted = "q6a/Ygg55TFzTQeaY/ZD8PFHeClIJspW711bVf4yuSiw9Vl8yGIXi4vxGu2rHEo0oj5jsGMTK22gn3ACfbHJK9I0YV+0l9aY6s7x+jsosDhvQFInylqlxuPSyoZ1APVey/jbQUO6KdmXjOeTGCb2YUO8BgxYaWHBSW5QmCJe/dej5BiCJLmEztnVgc3lJ98efDL3EvJBS6cByyDHfxHmEybDJbHlfhumg8NqFiKYHwWXv/GBDao8Xi8widD0KU+GyqKce0cALCHogfeatvruhwiMMeHNNLU6ePHvCAuH16vfVXR3y7bIbCpNBN3TodaCWqPatbsKQWTy6uyWZ3Eu8NQjdb/3oxzcQ/0L/eFtTtwTzDSIfUiBIZmdnpr/JhWkVM666+XZMKEphMbXB/W0nDR2xZc1Qbwb0qtIBk1SGfgmDTsyhiOv539VrF7zSBQmlbHWAR3jBmGX6gIIfFiPyHGXZnZDhJcNV0mWaLb6orGAY4PAzfyBqiEV7178LUvyFIC6LBDwlMgsvZ0e2oIRfObPTu9c3JyX8liCndyOxjOmCI7u9wyQiYAdhibX7lzjbK0SBZFr9WLZ7kKzHRdSus65ojiEi0sq+57CBogCv1yu7KI/IoEK1n3Hq5ZglT74b7OOnTBcL2dGequm+HKzZA==";


		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://files-wpa.chat.zalo.me/api/message/photo_original/send?zpw_ver=42&zpw_type=30&nretry=0",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "params=".urlencode($encrypted),
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/x-www-form-urlencoded",
		    "cookie: ".$cookie."",
		    "user-agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36"
		  ),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		var_dump($response);



?>