<?php
$cookie = $_GET['cookie'];
$serectkey = $_GET['serectkey'];
$encrypted = $_GET['data'];

 // $cookie = "zpw_sek=jZo-.153134767.a0.kU7bYhhzvwiLMyUYc_tdgy7VWi2OnyNOx9Qec_MdWE73YwxnoOZKqSkCqPZxmDg9nve5KwHBkHEu_09nQwEREm";
 // $serectkey ="sVkO0OZgJyvIZsu3zqq63A==";
 // $encrypted = "iECjrxvrHjRZLW6RoP9dMbnhr3Kz8gEoQbB9KynKOeq4PEMubYUx3O/V/nMAux8+hCDME0XChsTBId8O5CgCHZtzvSN9pkRcBWaKCogAOMd4/cR2sO3wXnlnSTkvRijHvf4YXUuL3utA8XE0nJbpcQEJwdv4mYCJK4rPWbEth6N4YmP20lNEfNYLUnsxgbzFI8nBHKaqinkuHrNQmtjGA34s9IY9IwV71Tcv6ZAI+3zHvrPPzMDsGOCaUj5gQxhfDLjXUfvipGmaR8uu+laR8iaWovb5TBrlky0RIklrb7PYvXVkSwUQzWWrFbsflck52mAlQ8aNmXh2HRDAATnxq8mncwG7oLfikKNAZ24vvxR8XpFaN8tp9THOpnQYrWQmVDKdgjNwks7CfIsrkn3kaOBI5/K6qIz1M/gMnxTKiAO/U+ObWIER5XVsswyC2RGpenuvavf4OR4C+N2pqUjQ2s0hheaCFtpnogMJEvg007A=";


		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://files-wpa.chat.zalo.me/api/message/asyncfile/msg?zpw_ver=49&zpw_type=30&nretry=0",
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