<?php
$cookie = $_GET['cookie'];
$encrypted = $_GET['encrypted'];
$filename = $_GET['filename'];
$url_image = $_GET['url_image'];
$serectkey = $_GET['serectkey'];
$grid = $_GET['grid'];


// encrypted: encrypted,
//                 serectkey: pr.serectkey,
//                 cookie: pr.cookie,
//                 idto: pr.idto,
//                 filename: pr.filename,
//                 url_image: pr.url_image

// $cookie = 'zpw_sek=GfEx.291263581.a0.0-5PDE9Qlmo_3kCTmrg_39buscV0O9ruYoFMHj5YqpIk2yLOioxrFzPixtYpPu8kdprTzFpiuRJWMomVE0I_30';
// $encrypted = 'SWoMRAa89cSsBGNxlfcNkIs0tOYTXiTgfBFM3UOYDXNvPBxAYJfo5GqmztxUR3+PCoCkYL5yIfFxVk+p8ZcVeGzEOP79O7Dk32dWpZq8NVsDP6yMrDyjZmNGaFfw6l7+PpKw0t3Obpu7B9JS9tTvrOmGKOVfdR0M5xcugXRp1CRYQPRGT0IZ4MkD4iluj29V3bT0bW3zMwf6liO3/bhwzw==';
// $filename = '66533f545b63cf09e47f05d7cede5960.jpg';
// $url_image = 'https://zalov2.phanmemninja.com/lib/storage/app/hoatv@ninjateam.vn/66533f545b63cf09e47f05d7cede5960.jpg';
// $serectkey = 'tiyiJ38l8LQzTQtJ346PtQ==';
// $grid = "318157281548852254";

		$fields = array();
		$files = array();
       
		$files["chunkContent"] = file_get_contents($url_image);
 
		$boundary = uniqid();
		$delimiter = '-------------' . $boundary;
		$post_data = build_data_files($boundary, $fields, $files,$filename);

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://files-wpa.chat.zalo.me/api/group/photo_original/upload?zpw_ver=51&zpw_type=30&params=".urlencode($encrypted)."&type=11",
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
			
// var_dump($response);die();
if($response){
	
	$curl = curl_init();
				curl_setopt_array($curl, array(
				  CURLOPT_URL => "https://sv1.phanmemninja.com/mobilepostimggroup",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS => "cookie=".urlencode($cookie)."&serectkey=".urlencode($serectkey)."&grid=".$grid."&data=".urlencode($response->data)."",
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
