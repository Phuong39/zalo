<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroupLD;
use App\Models\Schedule;
use App\Models\detailld;
use DB;
use App\Models\User_Model;
use App\Models\user_zaloapp;
use Carbon\Carbon;
use App\Models\datafriend;

class api_LD extends Controller
{
	  protected $name;
	  protected $phone;
	  protected $access_token;
    // Insert vào bảng GroupLD
    public function InsertGroupLD(Request $rq){
        $checkToken = $this->checkTokenIsvalid($rq->token);
        if($checkToken == true){
        	$params   = [
                    'user_id' => $rq->user_id,
                    'name'    => $rq->Name,
                ];

            $send = $this->insertDBGroupLD($params);
            return $send;
        }else{

        	return response()->json([
                    'status'  => 404,
                    'message' => 'Token không hợp lệ',
                ]);
        }
	        
    }
    // lấy thông tin số lượng bạn bè, số nhóm đã tham gia
    public function getNumberFriendAndGroup(Request $rq)
    {
        $checkToken = $this->checkTokenIsvalid($rq->token);
        if($checkToken == true){
        	$params = [
        		"userid" => $rq->user_id,
        		"zaloid" =>$rq->zalo_id
        	];
        	$send = $this->getDataFriendAndGroup($params);
        	return $send;
        }else{

        	return response()->json([
                    'status'  => 404,
                    'message' => 'Token không hợp lệ',
                ]);
        }
    }
   public function getDataFriendAndGroup($params){
       $data = DB::table('user_zaloapp')->where('user_id',$params['userid'])->where('zalo_id',$params['zaloid'])->first();
       $zaloapp = DB::table('zalo_accounts')->where('user_id',$params['userid'])->where('zalo_id',$params['zaloid'])->first();
       if(!empty($data)){
       	 $params2 = [
            "serectkey" => $data->serectkey,
            "cookie" => $data->cookie,
            "emei"   => $data->emei,
            "token"  => $data->access_token
       	 ];
       	 $checkcookie = $this->checkcookie($params2['cookie'],$params2['emei']);
       	 if ($checkcookie->error_code != '0') {
				return [
                   'status' => 404,
                   'message' => "cookie die. vui lòng kiểm tra lại"
				];
		  }
         $getFriend  = $this->getFriendZalo($params2);

         $getGroup   = $this->getGroupZalo($params2);
         $deGroup = json_decode($getGroup);
         $decode = json_decode($getFriend);
         if($decode->error_code == 0){
         	$countFriend = count($decode->data);
         }else{
         	$countFriend = -1;
         }
         if($deGroup->error_code == 0){
         	$totalGroup = $deGroup->data->total;
         }else{
         	$totalGroup = -1;
         }

         if($countFriend == -1 || $totalGroup == -1){
         	return [
                "status" => -200,
                "message"   => 'Đã xảy ra lỗi, hoặc tài khoản bị khóa.'
         	];
         }
         return [
            "status" => 200,
            "zaloName" => $zaloapp->name,
            "Phone"    => $zaloapp->phone,
            "zaloID"   => $zaloapp->zalo_id,
            "Birthday" => $zaloapp->birthday,
            "totalFriend"   => $countFriend,
            "totalGroup"    => $totalGroup
         ];
         
       }else{
       	 return [
           'status' => 404,
            'message' => 'Không lấy được data, vui lòng kiểm tra lại các trường gửi lên.'
       	 ];
       }
       	
      
    }
 static function checkcookie($cookie,$imei){
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
		return $response;
	}
 static function getGroupZalo($params){
      $curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://sv1.phanmemninja.com/getGroup",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "cookie=".urlencode($params['cookie'])."&serectkey=".urlencode($params['serectkey'])."",
		  CURLOPT_HTTPHEADER => array(
		     "content-type: application/x-www-form-urlencoded",
		     "user-agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);

		return $response;
    }
    static function getFriendZaloByToken($params){
        $curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://graph.zalo.me/v2.0/me/invitable_friends?access_token=".$params['token']."&from=0&limit=5&fields=id,name,gender,picture",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "",
		  CURLOPT_HTTPHEADER => array(
		    "user-agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36"
		  ),
		));

		$response = json_decode(curl_exec($curl));
		curl_close($curl);
		return $response;
    }
    static function getFriendZalo($params){
    	$curl = curl_init();
				curl_setopt_array($curl, array(
				  CURLOPT_URL => "https://sv1.phanmemninja.com/getFriend",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS => "cookie=".urlencode($params['cookie'])."&serectkey=".urlencode($params['serectkey'])."",
				  CURLOPT_HTTPHEADER => array(
				     "content-type: application/x-www-form-urlencoded",
				     "user-agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36"
				  ),
				));

				$response = curl_exec($curl);
				$err = curl_error($curl);
				curl_close($curl);

				return $response;
    }
    static function insertDBGroupLD($params){
          $data = new GroupLD;
	        $data->Name = $params['name'];
	        $data->user_id  = $params['user_id'];
	        $data->save();
	        if($data->id){
	        	return [
                  'status' => 200,
                   'message' => 'Thêm mới vào bảng GroupLD, Thành công.'
	        	];
	        }else{
	        	return [
                    'status' => 404,
                    'message' => 'Đã xảy ra lỗi ,vui lòng thử lại sau.'
	        	];
	        }
    }

    // Insert vào bảng schedule
    public function InsertSchedule(Request $rq){
       $checkToken = $this->checkTokenIsvalid($rq->token);
	       if($checkToken == true){
	        	$params   = [
	                    'user_id' => $rq->user_id,
	                    'fromdate'    => $rq->fromdate,
	                    'todate'    => $rq->todate,
	                    'hours'    => $rq->hours,
	                    'accounts'    => $rq->accounts,
	                    'idconfig'    => $rq->idconfig,
	                    'Type'    => $rq->Type,
	                    'Name'    => $rq->Name,
	                    'numDay'    => $rq->numDay
	                ];

	            $send = $this->insertDBSchedule($params);
	            return $send;
	        }else{

	        	return response()->json([
	                    'status'  => 404,
	                    'message' => 'Token không hợp lệ',
	                ]);
	        }

    }

    static function insertDBSchedule($params){
           $data = new Schedule;
	        
	        $data->user_id  = $params['user_id'];
	        $data->todate  = $params['todate'];
	        $data->fromdate = $params['fromdate'];
	        $data->hours = $params['hours'];
	        $data->accounts = $params['accounts'];
	        $data->idconfig = $params['idconfig'];
	        $data->Type = $params['Type'];
	        $data->Name = $params['Name'];
	        $data->numDay = $params['numDay'];
	        $data->save();

	        if($data->id){
	        	return [
                  'status' => 200,
                   'message' => 'Thêm mới vào bảng Schedule, Thành công.'
	        	];
	        }else{
	        	return [
                    'status' => 404,
                    'message' => 'Đã xảy ra lỗi ,vui lòng thử lại sau.'
	        	];
	        }
    }

    //Insert vào bảng DetailLD
    public function InsertDetailLD(Request $rq){
         $checkToken = $this->checkTokenIsvalid($rq->token);
         if($checkToken == true){
	        	$params   = [
	                    'user_id' => $rq->user_id,
	                    'GroupLDID'    => $rq->GroupLDID,
	                    'LDID'    => $rq->LDID,
	                    'LDName'    => $rq->LDName,
	                    'Proxy'    => $rq->Proxy,
	                    'Keyvpn'    => $rq->Keyvpn
	                ];

	            $send = $this->insertDBDetailLD($params);
	            return $send;
	        }else{

	        	return response()->json([
	                    'status'  => 404,
	                    'message' => 'Token không hợp lệ',
	                ]);
	        }
    }

    public function addDataZaloLD(Request $rq){
         $phone  = $rq->phoneNumber;
          $checkToken = $this->checkTokenIsvalid($rq->token);
          if($checkToken == true){
          	
          	$date = Carbon::now()->toDateTimeString();
             $startTime = date("Y-m-d H:i:s");
             $cenvertedTime = date('Y-m-d H:i:s',strtotime('-30 seconds',strtotime($startTime)));
          	$checkPhone = DB::table('zalo_accounts')->where('user_id',$rq->userid)->where('created_at','>=',$cenvertedTime )->first();
          	 // var_dump($checkPhone);die();
          	if(empty($checkPhone)){
          		return [
                  'status' => 404,
                  'message' => 'Không tồn tại tài khoản vừa thêm trên hệ thống.'
          		];
          	}
          	
             $last = DB::table('zalo_accounts')->where('user_id',$rq->userid)->latest()->first();
             
	         if(isset($last)){
	         	 DB::table('zalo_accounts')
	                ->where('user_id', $rq->userid)
	                ->where('id', $last->id)
	                ->update(['phone' => $phone]);
	            $getqr = $this->loadscanqr();
	             $decode = json_decode($getqr);
	           
	             return [
	                   'status' => 200,
	                   'message' => 'Cập nhật số điện thoại thành công.',
	                   'infozalo'  =>[
                            'name' => $last->name,
                            'phone'=> $last->phone,
                            'birthday'=> $last->birthday,
                            'zaloid' => $last->zalo_id
	                   ],
	                   'base64_qr' => $decode->data->base64_qr,
	                   'emeil'=> $decode->emeil,
	                   'link'=> $decode->data->chk_wait_cfirm,
	                   'cookie'=> $decode->data->chk_wait_cfirm
	                   
	                ];



	                
	         }else{
	         	return [
	              'status' => 404,
	              'message' => 'Đã xảy ra lỗi, vui lòng thử lại sau.'
	         	];
	         }

          }else{

	        	return response()->json([
	                    'status'  => 404,
	                    'message' => 'Token không hợp lệ',
	                ]);
	        }

        
         
    }


    public function returnLoginStep2(Request $rq){
    	$checkToken = $this->checkTokenIsvalid($rq->token);
          if($checkToken == true){
	          	 $send = $this->loginstep2($rq->link,$rq->code); 
	          	 $decode = json_decode($send);

		         if(isset($send)){
				         	if($decode->data != null){
				         		
				         	$cookie = 'zpw_sek='.$decode->data->zpw_sek;

				         	$emeil = $rq->emeil;
				         	$res = $this->checkcookiebyid($cookie,$emeil);
				         	$res = json_decode($res);
							 if ($res->error_code != 0) {
							 	$result=array(
							 		'status' => 'error',
							 		'message' => 'cookie hoặc emei không đúng'
							 	);
							 	return $result;
							 }
							 $data = DB::table('user_zaloapp')->where('zalo_id',$res->data->uid)->where('user_id',$rq->userid)->get();
							 if (empty($data)) {
				               $data = new user_zaloapp;
						        $data->cookie = $cookie;
						        $data->emei  = $emeil;
						        $data->url_chat = $res->data->zpw_cht;
						        $data->url_ctl  = $res->data->zpw_ctr;
						        $data->serectkey  = $res->data->zpw_enk;
						        $data->zalo_id  = $res->data->uid;
						        $data->appid  = 2;
						        $data->page  = 0;
						        $data->user_id  = $rq->userid;
						        $data->save();


				                $addAccount = new User_Model;
				                $addAccount->user_id = $rq->userid;
				                $addAccount->zalo_id = $res->data->uid;
				                $addAccount->firstname = $decode->profile->display_name;
				                $addAccount->lastname = $decode->profile->display_name;
				                $addAccount->image = $decode->profile->avatar;
				                $addAccount->name = $decode->profile->display_name;
				                $addAccount->page = 0;
				                $addAccount->defaultApp = 0;
				                $addAccount->save();
				 				$result = array(
									'status' => 'success',
									'message' => 'thêm cookie thành công'
								);
								return response()->json($result);
								
							}else{

								$arr['cookie'] = $cookie;
								$arr['emei'] =$emeil;
								$arr['url_chat'] = $res->data->zpw_cht;
								$arr['url_ctl'] = $res->data->zpw_ctr;
								$arr['serectkey'] =$res->data->zpw_enk;

								$data = DB::table('user_zaloapp')->where('zalo_id',$rq->zaloid)->where('user_id',$rq->userid)->update($arr);
                                
								$result= array(
									'status' => 'success',
									'message' => 'Cập nhật cookie thành công'
								);
								return response()->json($result);

							}
						            
				         	
				         }else{
				         	return [
	                          'status' => $decode->error_code,
	                          'message' => 'Đã xảy ra lỗi'
					     	];
				         }
				     }else{
				     	return [
                          'status' => 404,
                          'message' => 'Đã xảy ra lỗi'
				     	];
				     }
		         	
           }else{
           	   	return response()->json([
	                    'status'  => 404,
	                    'message' => 'Token không hợp lệ',
	                ]);
           }
        
    }

    static function checkcookiebyid($cookie, $emei_zalo){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://wpa.zalo.me/api/login/getLoginInfo?zpw_ver=30&zpw_type=30&imei=".$emei_zalo."&os=Web&language=vi&ts=1559182991001&width=1366&height=657",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "",
		  CURLOPT_HTTPHEADER => array(
		    "cookie: ".$cookie."",
		    "origin: https://chat.zalo.me",
		    "referer: https://chat.zalo.me/",
		    "user-agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36"
		  ),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		return $response;
	}

     static function loadscanqr(){
		$emeil =rand();
		$curl = curl_init();
       
      
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://wpa.zalo.me/api/login/reqqr?language=en-US&client_time=".strtotime("now")."&type=30&client_version=34&imei=".$emeil."&computer_name=ADMIM",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "",
		));

		$response = json_decode(curl_exec($curl));
		$err = curl_error($curl);

		curl_close($curl);
		$response->emeil = $emeil;
		return json_encode($response);

	}

	static function loginstep2($link,$code){
			$new = ''.$link.'&code='.$code;
         
			$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => $new,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 50,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_POSTFIELDS => "",
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);
			return $response;
		}

    static function insertDBDetailLD($params){
         $data = new detailld;
	        
	        $data->user_id  = $params['user_id'];
	        $data->GroupLDID  = $params['GroupLDID'];
	        $data->LDID = $params['LDID'];
	        $data->LDName = $params['LDName'];
	        $data->Proxy = $params['Proxy'];
	        $data->Keyvpn = $params['Keyvpn'];
	        $data->save();

	        if($data->id){
	        	return [
                  'status' => 200,
                   'message' => 'Thêm mới vào bảng DetailLD, Thành công.'
	        	];
	        }else{
	        	return [
                    'status' => 404,
                    'message' => 'Đã xảy ra lỗi ,vui lòng thử lại sau.'
	        	];
	        }
    }

    public function getFriendByZaloId(Request $rq){
       $checkToken = $this->checkTokenIsvalid($rq->token);
       if($checkToken == true){
         $data = DB::table('user_zaloapp')->where('zalo_id',$rq->zaloid)->where('user_id',$rq->userid)->select('access_token')->get();
         foreach ($data as $key => $value) {
         	$access_token = $value->access_token;
         }

         $send = $this->getFriend($rq->userid,$rq->zaloid); 
          foreach ($send as $key => $value) {
          $arr = json_decode($value->data);
           
          }
          return [
            'status' => 200,
            'data'   => $arr
          ];
       }else{

       		return response()->json([
	                    'status'  => 404,
	                    'message' => 'Token không hợp lệ',
	                ]);
       }
    }


    static function getFriend($userid, $zaloid){
          $data =  datafriend::where('user_id',$userid)->where('zalo_id', $zaloid)->get();
          return $data;

    }

    // check token

    public static function checkTokenIsvalid($token)
    {
        $check = DB::table('vp_users')->where('remember_token',$token)->count();
        if($check >0){
            return true;
        }
            return false;
    }
}
