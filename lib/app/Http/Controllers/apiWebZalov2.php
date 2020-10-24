<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class apiWebZalov2 extends Controller
{
   //api add Friend Group
	public function getDataAddFriend(Request $rq){
       $cookie    = $rq->cookie;
       $enk       = $rq->env;
       $encrypted = $rq->encrypted;
       $toid      = $rq->toid;
       $GroupId   = $rq->groupid;
       $params    = [
         'cookie'     => $cookie,
          'env'       => $enk,
          'encrypted' => $encrypted,
          'toid'      => $toid,
          'GroupId'   => $GroupId
       ];
       $send  = $this->apiAddFriend($params);
       var_dump($send);
	}

	static function apiAddFriend($params){
       $curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://friend-wpa.chat.zalo.me/api/friend/sendreq?zpw_ver=58&zpw_type=30",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "params=".urlencode($params['encrypted'])."",
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/x-www-form-urlencoded",
		    "cookie: ".$params['cookie']."",
		    "origin: https://chat.zalo.me",
		    "referer: https://chat.zalo.me/",
		    "user-agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36"
		  ),
		));

		$response = json_decode(curl_exec($curl));
		curl_close($curl);
		return $response;
	}
}
