<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class apiCRMsendzalo extends Controller
{
    public function sendZaloCRM(Request $rq){
         $checkToken   = $this->checkRequestTokenViaApiApp($rq->token);
          if($checkToken == true){
            $data = DB::table('zalo_accounts')->join('user_zaloapp', 'user_zaloapp.zalo_id', '=' , 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$rq->userid)->where('zalo_accounts.user_id',$rq->userid)->where('zalo_accounts.page',0)->where('user_zaloapp.page',0)->get();
             $twigData['account'] = $data;

           if (!empty($twigData['account'])) {
			
			foreach ($twigData['account'] as $key => $value) {
				$check_cookie = 0;
				$data = $this->checkcookie($value->cookie,$value->emei);
				if ($data->error_code != '0') {
					$check_cookie = 1;
				}
				$twigData['account'][$key]->checkcookie = $check_cookie;
			}
		   } 
         	$pre = "arrPhone=".json_encode($rq->arrPhone)."&infoAccount=".$twigData['account']."";
         	var_dump($pre);die();
         //      $curl = curl_init();
	        // curl_setopt_array($curl, array(
	        //   CURLOPT_URL => "https://sv1.phanmemninja.com/sendzaloCRM",
	        //   CURLOPT_RETURNTRANSFER => true,
	        //   CURLOPT_ENCODING => "",
	        //   CURLOPT_MAXREDIRS => 10,
	        //   CURLOPT_TIMEOUT => 30,
	        //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	        //   CURLOPT_CUSTOMREQUEST => "POST",
	        //   CURLOPT_POSTFIELDS => $pre,
	        //   CURLOPT_HTTPHEADER => array(
	        //     "content-type: application/x-www-form-urlencoded"
	        //   ),
	        // ));

	        // $response = json_decode(curl_exec($curl));
	        // curl_close($curl);
	        
          }else{
          	 return response()->json([
            'status'  => 401,
            'message' => "Token không hợp lệ.",
            ]);
          }
    }

    public static function checkRequestTokenViaApiApp($token){
        $checkUser = DB::table('vp_users')->where('remember_token',$token)->count();
        if($checkUser > 0){
            return true;
        }
        return false;
    }

     public function checkcookie($cookie,$imei){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://wpa.zalo.me/api/login/getLoginInfo?zpw_ver=31&zpw_type=30&imei=".$imei."&os=Web&language=vi&ts=1561123814417&width=1920&height=624",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "",
		  CURLOPT_HTTPHEADER => array(
		    "cookie: ".$cookie.""
		  ),
		));

		$response = json_decode(curl_exec($curl));
		curl_close($curl);
		//var_dump($response);die();
		return $response;
	}

}
