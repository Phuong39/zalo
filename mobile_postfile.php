<?php
// $cookie = $_GET['cookie'];
// $encrypted = $_GET['encrypted'];
// $filename = $_GET['filename'];
// $url_image = $_GET['url_file'];
// $serectkey = $_GET['serectkey'];
// $idto = $_GET['idto'];


// encrypted: encrypted,
//                 serectkey: pr.serectkey,
//                 cookie: pr.cookie,
//                 idto: pr.idto,
//                 filename: pr.filename,
//                 url_image: pr.url_image

$cookie = $_GET['cookie'];
$serectkey = $_GET['serectkey'];
$encrypted = $_GET['encrypted'];
$filename = $_GET['filename'];
$url_file = $_GET['url_file'];
$idto = $_GET['idto'];
$file_size = $_GET['file_size'];
$extension = $_GET['extension'];
$checksum = $_GET['checksum'];


// $cookie = 'zpw_sek=jZo-.153134767.a0.kU7bYhhzvwiLMyUYc_tdgy7VWi2OnyNOx9Qec_MdWE73YwxnoOZKqSkCqPZxmDg9nve5KwHBkHEu_09nQwEREm';
// $encrypted = 'sFyDvVGIMbRB9G9KwtIl0mmovhH36Wlp/hPQm0UB1DCTlylEY9GLIG0+KHqIdAgkUfwkKsP90do6tHkohiK7LkklmahSJzlfvvi1l5MOwITxgdfG0EYsmtcnK6PdkfBjOGiDYj4lC7Y9NiipKnEizYm506qtNAHDw/LJUDmTr75scIl3PRwShOoqKQuxuA2i';
// $filename = 'Book1 (2) (1).xlsx';
// $url_file = 'https://zalov2.phanmemninja.com/lib/storage/app/hoatv@ninjateam.vn/Book1 (2) (1).xlsx';
// $serectkey = 'sVkO0OZgJyvIZsu3zqq63A==';
// $idto = "7503915988897270579";
// $file_size = 8514;
// $extension = "xlsx";
// $checksum = "eb0e157aa605b898ec62ab0f15160922";


		$fields = array();
		$files = array();
       
		$files["chunkContent"] = file_get_contents($url_file);
      
		$boundary = uniqid();
		$delimiter = '-------------' . $boundary;
		$post_data = build_data_files($boundary, $fields, $files,$filename);

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://files-wpa.chat.zalo.me/api/message/asyncfile/upload?zpw_ver=42&zpw_type=30&params=".urlencode($encrypted)."&type=2",
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
			
//var_dump($response->data);die();
if($response){
	
	$curl = curl_init();
				curl_setopt_array($curl, array(
				  CURLOPT_URL => "https://sv1.phanmemninja.com/mobilepostfile",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS => "cookie=".urlencode($cookie)."&serectkey=".urlencode($serectkey)."&idto=".$idto."&data=".urlencode($response->data)."&checksum=".urlencode($checksum)."&extension=".$extension."&url_file=".$url_file."&file_size=".$file_size."&fileName=".$filename."",
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
