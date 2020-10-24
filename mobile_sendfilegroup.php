<?php
$cookie = $_GET['cookie'];
$serectkey = $_GET['serectkey'];
$encrypted = $_GET['data'];

 // $cookie = "zpw_sek=GfEx.291263581.a0.0-5PDE9Qlmo_3kCTmrg_39buscV0O9ruYoFMHj5YqpIk2yLOioxrFzPixtYpPu8kdprTzFpiuRJWMomVE0I_30";
 // $serectkey ="tiyiJ38l8LQzTQtJ346PtQ==";
 // $encrypted = "dKZQgfp3eOIDgAqRK9nPgARxajSvaaB5GmVBTJIKVDNevQK+oqmjkgS1I5u7iTDG+XmPyNphO/ZES0tRpzU6mJRVBDl8qVCPdFNOf6tPrIqKPrgNPA4BkbeMRdFnSsTO+C6phDoUqjrcnQQEC3eKAjk3ue88m7DxK5Ap97p0LnWGqflKxG1dZeQlGSVzabDRSdRTd0YG9N7X3uA6BRLapMpRO1xZImBMOEWufeDMGcbReqVmLZ9RJ2Wt5qNn76STkTrVwSWd1Xqfk4Zu6+jICQ9sjJAHVnZ3PISaR4Bz50bMLVXVZHK89agEVQbD9k1pMlG84GeBPaFm527PDYNMsgHBmYyxYcLSdqn+a4KnpNQ+u1IhxSn+5WUt+KldlquCEiTSwSOYONGcwbbi6iuRPBtubRfXZuqm1jXEvUzXDUtmSpDLzFaZ7HPG71JGGzFo";


		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://files-wpa.chat.zalo.me/api/group/asyncfile/msg?zpw_ver=51&zpw_type=30&nretry=0",
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