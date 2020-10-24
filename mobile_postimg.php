<?php
$cookie = $_GET['cookie'];
$encrypted = $_GET['encrypted'];
$filename = $_GET['filename'];
$url_image = $_GET['url_image'];
$serectkey = $_GET['serectkey'];
$idto = $_GET['idto'];


// encrypted: encrypted,
//                 serectkey: pr.serectkey,
//                 cookie: pr.cookie,
//                 idto: pr.idto,
//                 filename: pr.filename,
//                 url_image: pr.url_image

// $cookie = 'zpw_sek=jZo-.153134767.a0.kU7bYhhzvwiLMyUYc_tdgy7VWi2OnyNOx9Qec_MdWE73YwxnoOZKqSkCqPZxmDg9nve5KwHBkHEu_09nQwEREm';
// $encrypted = 'sFyDvVGIMbRB9G9KwtIl0hQ/ejcOYSwmIzyo37CbOnblWCKBOByLepIuWVKu6OJNSHjW0RC9JIp/nNqDM8x8QwD+72mCfZf796vzWozCJtD7nK2oppov/hFrlFdmUFzDtoOzL0BhmRbPSKy7qXWX1uHWpLhDmiCj0Vjcy9/6SjS67nm4TBrdWJlbU/HUP/bw';
// $filename = '2b833a085bb5a1ebf8a4.jpg';
// $url_image = 'https://zalov2.phanmemninja.com/lib/storage/app/hoatv@ninjateam.vn/2b833a085bb5a1ebf8a4.jpg';
// $serectkey = 'sVkO0OZgJyvIZsu3zqq63A==';
// $idto = "1834143586016275812";
		$fields = array();
		$files = array();
       
		$files["chunkContent"] = file_get_contents($url_image);
      
		$boundary = uniqid();
		$delimiter = '-------------' . $boundary;
		$post_data = build_data_files($boundary, $fields, $files,$filename);

		// $data = '';
		// $eol = "\r\n";

		// $delimiter = '-------------' . $boundary;

		// foreach ($fields as $name => $content) {
		// 	$data .= "--" . $delimiter . $eol
		// 	. 'Content-Disposition: form-data; name="' . $name . "\"".$eol.$eol
		// 	. $content . $eol;
		// }


		// foreach ($files as $name => $content) {
		// 	$data .= "--" . $delimiter . $eol
		// 	. 'Content-Disposition: form-data; name="' . $name . '"; filename="'.$filename.'"' . $eol
	 //            //. 'Content-Type: image/png'.$eol
		// 	. 'Content-Transfer-Encoding: binary'.$eol
		// 	;

		// 	$data .= $eol;
		// 	$data .= $content . $eol;
		// }
		// $data .= "--" . $delimiter . "--".$eol;
//var_dump($data);die();
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://files-wpa.chat.zalo.me/api/message/photo_original/upload?zpw_ver=42&zpw_type=30&params=".urlencode($encrypted)."&type=2",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $post_data,
		  CURLOPT_HTTPHEADER => array(
		    "content-type: multipart/form-data; boundary=".$delimiter."",
		    "cookie: ".$cookie."",
		    "user-agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36"
		  ),
		));

		$response = curl_exec($curl);
			curl_close($curl);
			$response =json_decode($response);
			

if($response){
	
	$curl = curl_init();
				curl_setopt_array($curl, array(
				  CURLOPT_URL => "https://sv1.phanmemninja.com/mobilepostimg",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS => "cookie=".urlencode($cookie)."&serectkey=".urlencode($serectkey)."&idto=".$idto."&data=".urlencode($response->data)."",
				  CURLOPT_HTTPHEADER => array(
				     "content-type: application/x-www-form-urlencoded",
				     "user-agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36"
				  ),
				));

				$response = curl_exec($curl);
				$err = curl_error($curl);
var_dump($response);
				curl_close($curl);
}
	

function build_data_files($boundary, $fields, $files,$tenfile){
		$data = '';
		$eol = "\r\n";

		$delimiter = '-------------' . $boundary;

		foreach ($fields as $name => $content) {
			$data .= "--" . $delimiter . $eol
			. 'Content-Disposition: form-data; name="' . $name . "\"".$eol.$eol
			. $content . $eol;
		}


		foreach ($files as $name => $content) {
			$data .= "--" . $delimiter . $eol
			. 'Content-Disposition: form-data; name="' . $name . '"; filename="'.$tenfile.'"' . $eol
	            //. 'Content-Type: image/png'.$eol
			. 'Content-Transfer-Encoding: binary'.$eol
			;

			$data .= $eol;
			$data .= $content . $eol;
		}
		$data .= "--" . $delimiter . "--".$eol;


		return $data;
	}	



?>
