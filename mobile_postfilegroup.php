<?php

$cookie = $_GET['cookie'];
$encrypted = $_GET['encrypted'];
$filename = $_GET['filename'];
$url_file = $_GET['url_file'];
$serectkey = $_GET['serectkey'];
$grid = $_GET['grid'];
$file_size = $_GET['file_size'];
$extension = $_GET['extension'];
$checksum = $_GET['checksum'];


 // $cookie = 'zpw_sek=GfEx.291263581.a0.0-5PDE9Qlmo_3kCTmrg_39buscV0O9ruYoFMHj5YqpIk2yLOioxrFzPixtYpPu8kdprTzFpiuRJWMomVE0I_30';
 // $encrypted = 'SWoMRAa89cSsBGNxlfcNkIG+jVIYXusHv1Vm/Xmzy3zJWWkVZTxxsOlsZurCb1F7PtNAfbAurWHJpBEId7EoHSvEif32jkNJjgmxDw8MirLOalf2ZZRTEu2hvUG86zVyLsXb/eZ8j3T/uT9FB+xXyhFCm6K4a2lTIVJPT8Cs1ms=';
 // $filename = 'dowload (2).csv';
 // $url_file = 'https://zalov2.phanmemninja.com/lib/storage/app/hoatv@ninjateam.vn/dowload (2).csv';
 // $serectkey = 'tiyiJ38l8LQzTQtJ346PtQ==';
 // $grid = "318157281548852254";
 // $file_size = 108;
 // $extension = "csv";
 // $checksum = "d442c9b25fda938d577f759c9ffafc56";


		$fields = array();
		$files = array();
       
		$files["chunkContent"] = file_get_contents($url_file);
      
		$boundary = uniqid();
		$delimiter = '-------------' . $boundary;
		$post_data = build_data_files($boundary, $fields, $files,$filename);

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://files-wpa.chat.zalo.me/api/group/asyncfile/upload?zpw_ver=51&zpw_type=30&params=".urlencode($encrypted)."&type=2",
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
				  CURLOPT_URL => "https://sv1.phanmemninja.com/mobilepostfilegroup",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS => "cookie=".urlencode($cookie)."&serectkey=".urlencode($serectkey)."&grid=".$grid."&data=".urlencode($response->data)."&checksum=".urlencode($checksum)."&extension=".$extension."&url_file=".$url_file."&file_size=".$file_size."&fileName=".$filename."",
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
