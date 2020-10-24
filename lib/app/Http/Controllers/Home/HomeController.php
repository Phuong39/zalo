<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Models\User_Model;
use App\Models\user_zaloapp;

use App\Models\zalo_account_Model;
use App\Http\Requests\AddAccountRequest;
use GuzzleHttp\Client;

class HomeController extends Controller
{
      protected $zaloId;
      protected $role_page;
      protected $role_profile;
      protected $userid;
      protected $status;

    public function getHome(Request $request){
    	if(Auth::user()){
    		$id = Auth::user()->id;
    	}else{
    		return redirect()->intended('/');
    	}
    	
    	$data['admin'] = DB::table('vp_users')->where('id',$id)->get();

    	foreach($data['admin']  as $key=>$value){
             $role_page = json_decode($value->role_page);
            
             $role_profile = json_decode($value->role_profile);
             $userid   = $value->userid;
             $status   = $value->status;
    	} 
         $data['role_profile']  =$role_profile;
         $data['role_page']  =$role_page;
         $data['status']  =$status;

	        if($status != 1){
	        	$data['list_oa']= User_Model::where('user_id',$id)->where('page',1)->orderBy('id','desc')->paginate(10);
	        	$account = DB::table('user_zaloapp') ->join('zalo_accounts', 'user_zaloapp.zalo_id', '=', 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$id)->where('zalo_accounts.user_id',$id)->where('zalo_accounts.page',0)->where('user_zaloapp.page',0)->orderBy('zalo_accounts.id','desc')->orderBy('user_zaloapp.id','desc')->get();
	    	 $data['account'] = $account;
	    	 $data['category'] = DB::table('vp_categories')->where('user_id',$id)->get();
	        if (!empty($data['account'])) {
	             foreach ($data['account'] as $key => $value) {
	                $check_cookie = 0;
	                $datacheck = $this->checkcookie2($value->cookie,$value->emei);
	                
	                 if ($datacheck->error_code != '0') {
	                    $check_cookie = 1;
	                }
	                  
	                $data['account'][$key]->checkcookie = $check_cookie;
	             }
	        }
	        $data['listProxy'] = DB::table('proxy')->where('user_id',$id)->get();
        }else{
        	$data['list_oa']= User_Model::where('user_id',$userid)->where('page',1)->orderBy('id','desc')->paginate(10);

	        	$account = DB::table('user_zaloapp') ->join('zalo_accounts', 'user_zaloapp.zalo_id', '=', 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$userid)->where('zalo_accounts.user_id',$userid)->where('zalo_accounts.page',0)->where('user_zaloapp.page',0)->orderBy('zalo_accounts.id','desc')->orderBy('user_zaloapp.id','desc')->get();
	    	 $data['accountv2'] = $account;
	    	 $data['category'] = DB::table('vp_categories')->where('user_id',$userid)->get();
	        if (!empty($data['accountv2'])) {
	             foreach ($data['accountv2'] as $key => $value) {
	                $check_cookie = 0;
	                $datacheck = $this->checkcookie2($value->cookie,$value->emei);
	                
	                 if ($datacheck->error_code != '0') {
	                    $check_cookie = 1;
	                }
	                  
	                $data['accountv2'][$key]->checkcookie = $check_cookie;
	             }
	        }
        }

        $author = $request->code;
		$id_user = $request->uid;
		$access_token_oa = $request->access_token;

		if (!empty($author)) {
			$data = $this->add($author, $id_user);
			$message = 'Thêm mới tài khoản thành công';
			return back()->withInput()->with('error',$message);


		}
		if (!empty($access_token_oa)) {
			$this->addfanpage($access_token_oa, $id_user);
			$message ="Thêm mới Officlal Account thành công";
			
		}

 


    	return view('home',$data);
    }

    public function updateInfo(Request $rq){
    	$id = Auth::user()->id;
     $data = DB::table('user_zaloapp')->where('user_id',$id)->where('zalo_id',$rq->zalo_id)->select('zalo_id','cookie')->first();
       $http = new Client([
        'cookies' => true,
        'headers' => [
            'Cookie' => '_zlang=vn; _ga=GA1.2.431247954.1603419184; _gid=GA1.2.843710788.1603419184; zpsid=pFJ6.153134767.198.n2eNpB74x8uUOio7lSJiZiItdh-4zzszXVFQkMyu_9SzYI1iiF_G7Ex4x8u; zpsidleg=pFJ6.153134767.198.n2eNpB74x8uUOio7lSJiZiItdh-4zzszXVFQkMyu_9SzYI1iiF_G7Ex4x8u; fpsend=148464; '.$data->cookie.'; zpw_sekm=qn-B.153134767.124.qd40CY5PV1EE_rmQB5by4rGg6M4GR4yY4crB9HQ7W0CuwCGUqrX7BxC6V1C; app.event.zalo.me=1381789400520823716; _ga=GA1.3.431247954.1603419184; _gid=GA1.3.843710788.1603419184; __zi=3000.SSZzejyD6zOgdh2mtnLQWYQN_RAG01ICFjIXe9fEM8qxckoYcqfVYNESxANKJrY0SP7ef3Wo.1; __zi-legacy=3000.SSZzejyD6zOgdh2mtnLQWYQN_RAG01ICFjIXe9fEM8qxckoYcqfVYNESxANKJrY0SP7ef3Wo.1',
            'Host'    => 'accounts.chat.zalo.me',
            'Origin'  => 'https://chat.zalo.me',
            'Referer' => 'https://chat.zalo.me/',
            'sec-ch-ua' => '"Chromium";v="86", "\"Not\\A;Brand";v="99", "Google Chrome";v="86"',
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.75 Safari/537.36'

        ]
            
    ]);

    $response = $http->get(
        'https://accounts.chat.zalo.me/account/userprofile'
    );
    $abc = json_decode($response->getBody());
    if($abc->data->logged == true){
          DB::table('zalo_accounts')
                ->where('zalo_id', $data->zalo_id)
                ->update(['name' => $abc->data->info->name,'image' => $abc->data->info->avatar]);
      }

    }
 public function checkcookie2($cookie,$imei){
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

   public function saveProxy(Request $rq){
   	   $id = Auth::user()->id;
       foreach ($rq->arr_proxy as $key => $value) {
       	 DB::table('proxy')
		    ->updateOrInsert(
		        ['user_id' => $id, 'proxy' => $value]
		    );
       }
       return [
         'status' => 200,
         'msg'    => 'ok'
       ];
   }

   public function saveSettingProxy(Request $rq){
   	$id = Auth::user()->id;
   	$data = $rq->data; 
   foreach ($data as $key => $value) {
   	 for ($i = 0; $i < count($value); $i++) { 
   	 	if($value['proxy'] != null){
              $affected = DB::table('zalo_accounts')
              ->where('user_id', $id)
              ->where('zalo_id', $value['zaloid'])
              ->update(['proxy' => $value['proxy']]);

   	 	}
   	 	
   	 }
   }
    
     
   }

    public function add($author='', $id_user=''){
    	
       $id = Auth::user()->id;
      $accessToken = $author;
       $result = $this->checkcookie($accessToken);

         if (!empty($result)) {
                $check =  User_Model::where('user_id',$id)->where('zalo_id',$result['id'])->first();
                if(isset($check)){
                	return back()->withInput()->with('error','Tài khoản đã tồn tại!!');
                }else{
                	 
                	$data2 = new user_zaloapp;
				        	$data2->user_id =$id;
				        	$data2->zalo_id = $result['id'];
				        	$data2->appid = 2;
				        	$data2->page = 0;
				        	$data2->expires_in = 'never';
				        	$data2->status = 0;
				        	$data2->access_token = $accessToken;
				        	$data2->save();
							
				            $data = new User_Model;
					        $data->zalo_id = $result['id'];
					        $data->user_id = $id;
					        $data->firstname = $result['name'];
					        $data->birthday = $result['birthday'];
					        $data->lastname = $result['name'];
					        $data->name = $result['name'];
					        $data->image = $result['picture'];
					        $data->page = 0;
					        $data->defaultApp = 2;
					        $data->save();
				            $message ="Thêm tài khoản thành công!";
					        return back()->withInput()->with('error',$message);
                }
	
		} else {
			$result = array(
				'status' => 'error',
				'message' => 'token bạn nhập không đúng'
			);
			return $result;
		}


    }

	public function addfanpage($access_token_oa ='', $id_user =''){
		
		 $id = Auth::user()->id;
		 if (!empty($access_token_oa)) {
			$eRes['access_token'] = $access_token_oa;
		} else {
			dd('them tai khoản thất bại');
		}

		// Access token 
		$accessToken = $eRes['access_token'];

		$result = (array)$this->checktokenfanpage($accessToken);
		
		if (!empty($result)) {

			$check =  User_Model::where('user_id',$id)->where('zalo_id',$result['oa_id'])->first();
		       
               if(isset($check)){
                 	return back()->withInput()->with('error','Tài khoản đã tồn tại!!');
               }else{
               	   $data2 = new user_zaloapp;
		        	$data2->user_id =$id;
		        	$data2->zalo_id = $result['oa_id'];
		        	$data2->appid = 2;
		        	$data2->page = 1;
		        	$data2->expires_in = 'never';
		        	$data2->status = 0;
		        	$data2->access_token = $accessToken;
		        	$data2->save();
					
		            $data = new User_Model;
			        $data->zalo_id = $result['oa_id'];
			        $data->user_id = $id;
			        $data->firstname = $result['name'];
			        $data->lastname = $result['name'];
			        $data->name = $result['name'];
			        $data->image = $result['avatar'];
			        $data->page = 1;
			        $data->defaultApp = 2;
			        $data->save();
		            $message ="Thêm tài khoản thành công!";
			        return back()->withInput()->with('error',$message);
               }

		} else {
			$result= array(
				'status' => 'error',
				'message' => 'token bạn nhập không đúng'
			);
			return;
		}
		
		if (empty($access_token_oa)) {
			$result = array(
				'status' => 'success',
				'message' => 'dsfdf'
			);
			return $result;
		}
		
	}

	public function checktokenfanpage($token){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://openapi.zalo.me/v2.0/oa/getoa?access_token=".$token."",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "",
		));
		$response = json_decode(curl_exec($curl),false,512,JSON_BIGINT_AS_STRING);
		if ($response->error != 0) {
			return;
		} else {
			$response->data->token = $token;
		}
		return $response->data;
	}

    public function getCookie(Request $request){
    	
    	 $id = Auth::user()->id;
	       $cookie = $request->fb_accesstoken;
	       $emei_zalo = $request->emei;
	       $id_zalo = $request->id_zalo;
           $avatar = $request->avatar;
		    $name = $request->name;
		    //var_dump($avatar);die();
		if (!empty($cookie)) {
			//var_dump("fdsfdsfdsfds");
			 $res = $this->checkcookiebyid($cookie,$emei_zalo);
			 $res = json_decode($res);
			 if ($res->error_code != 0) {
			 	$result=array(
			 		'status' => 'error',
			 		'message' => 'cookie hoặc emei không đúng'
			 	);
			 	return $result;
			 }
           $check = DB::table('vp_users')->where('id',$id)->get();
           foreach($check  as $key=>$value){
             $role_page = json_decode($value->role_page);
            
             $role_profile = json_decode($value->role_profile);
             $userid   = $value->userid;
             $status   = $value->status;
            }
             // var_dump($res->data->phone_number);
            if($status != 1){
            	$data = DB::table('user_zaloapp')->where('zalo_id',$res->data->uid)->where('user_id',$id)->get();

            	if (empty($data)) {
	               $data = new user_zaloapp;
			        $data->cookie = $cookie;
			        $data->emei  = $emei_zalo;
			        $data->url_chat = $res->data->zpw_cht;
			        $data->url_ctl  = $res->data->zpw_ctr;
			        $data->serectkey  = $res->data->zpw_enk;
			        $data->zalo_id  = $res->data->uid;
			        $data->appid  = 2;
			        $data->page  = 0;
			        $data->user_id  = $id;
			        $data->save();


	                $addAccount = new User_Model;
	                $addAccount->user_id = $id;
	                $addAccount->zalo_id = $res->data->uid;
	                $addAccount->firstname = $name;
	                $addAccount->lastname = $name;
	                $addAccount->image = $avatar;
	                $addAccount->name = $name;
	                $addAccount->page = 0;
	                $addAccount->defaultApp = 0;
	                $addAccount->phone = $res->data->phone_number;
	                $addAccount->save();
	 				$result = array(
						'status' => 'success',
						'message' => 'thêm cookie thành công'
					);
					return response()->json($result);
					
				}else{

					$arr['cookie'] = $cookie;
					$arr['emei'] =$emei_zalo;
					$arr['url_chat'] = $res->data->zpw_cht;
					$arr['url_ctl'] = $res->data->zpw_ctr;
					$arr['serectkey'] =$res->data->zpw_enk;

	 			
				
					$data = DB::table('user_zaloapp')->where('zalo_id',$id_zalo)->where('user_id',$id)->update($arr);
					$data2 = DB::table('zalo_accounts')->where('zalo_id',$id_zalo)->where('user_id',$id)->update(['phone' => $res->data->phone_number]);

					$result= array(
						'status' => 'success',
						'message' => 'Cập nhật cookie thành công'
					);
					return response()->json($result);

				}

            }else{
            	$data = DB::table('user_zaloapp')->where('zalo_id',$res->data->uid)->where('user_id',$userid)->get();
            	if (empty($data)) {
	               $data = new user_zaloapp;
			        $data->cookie = $cookie;
			        $data->emei  = $emei_zalo;
			        $data->url_chat = $res->data->zpw_cht;
			        $data->url_ctl  = $res->data->zpw_ctr;
			        $data->serectkey  = $res->data->zpw_enk;
			        $data->zalo_id  = $res->data->uid;
			        $data->appid  = 2;
			        $data->page  = 0;
			        $data->user_id  = $userid;
			        $data->save();


	                $addAccount = new User_Model;
	                $addAccount->user_id = $userid;
	                $addAccount->zalo_id = $res->data->uid;
	                $addAccount->firstname = $name;
	                $addAccount->lastname = $name;
	                $addAccount->image = $avatar;
	                $addAccount->name = $name;
	                $addAccount->page = 0;
	                $addAccount->defaultApp = 0;
	                $addAccount->phone = $res->data->phone_number;
	                $addAccount->save();
	 				$result = array(
						'status' => 'success',
						'message' => 'thêm cookie thành công'
					);
					return response()->json($result);
					
				}else{

					$arr['cookie'] = $cookie;
					$arr['emei'] =$emei_zalo;
					$arr['url_chat'] = $res->data->zpw_cht;
					$arr['url_ctl'] = $res->data->zpw_ctr;
					$arr['serectkey'] =$res->data->zpw_enk;

	 			
				
					$data = DB::table('user_zaloapp')->where('zalo_id',$id_zalo)->where('user_id',$userid)->update($arr);
					$data2 = DB::table('zalo_accounts')->where('zalo_id',$id_zalo)->where('user_id',$userid)->update(['phone' => $res->data->phone_number]);

					$result= array(
						'status' => 'success',
						'message' => 'Cập nhật cookie thành công'
					);
					return response()->json($result);

				}
            }
//thuy note
			// $data = DB::table('user_zaloapp')->where('zalo_id',$res->data->uid)->where('user_id',$id)->get();
            
			// if (empty($data)) {
   //             $data = new user_zaloapp;
		 //        $data->cookie = $cookie;
		 //        $data->emei  = $emei_zalo;
		 //        $data->url_chat = $res->data->zpw_cht;
		 //        $data->url_ctl  = $res->data->zpw_ctr;
		 //        $data->serectkey  = $res->data->zpw_enk;
		 //        $data->zalo_id  = $res->data->uid;
		 //        $data->appid  = 2;
		 //        $data->page  = 0;
		 //        $data->user_id  = $id;
		 //        $data->save();


   //              $addAccount = new User_Model;
   //              $addAccount->user_id = $id;
   //              $addAccount->zalo_id = $res->data->uid;
   //              $addAccount->firstname = $name;
   //              $addAccount->lastname = $name;
   //              $addAccount->image = $avatar;
   //              $addAccount->name = $name;
   //              $addAccount->page = 0;
   //              $addAccount->defaultApp = 0;
   //              $addAccount->save();
 		// 		$result = array(
			// 		'status' => 'success',
			// 		'message' => 'thêm cookie thành công'
			// 	);
			// 	return response()->json($result);
				
			// }else{

			// 	$arr['cookie'] = $cookie;
			// 	$arr['emei'] =$emei_zalo;
			// 	$arr['url_chat'] = $res->data->zpw_cht;
			// 	$arr['url_ctl'] = $res->data->zpw_ctr;
			// 	$arr['serectkey'] =$res->data->zpw_enk;

 			
			
			// 	$data = DB::table('user_zaloapp')->where('zalo_id',$id_zalo)->where('user_id',$id)->update($arr);

			// 	$result= array(
			// 		'status' => 'success',
			// 		'message' => 'Cập nhật cookie thành công'
			// 	);
			// 	return response()->json($result);

			// }
//end thuy note			
			
			
		}

    }

  
public function checkcookiebyid($cookie, $emei_zalo){
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
	public function loginstep2(Request $request){
			$link = $request->link;


			$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => $link,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_POSTFIELDS => "",
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);
			echo $response;die;
		}


    public function checkcookie($token){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://oauth.zaloapp.com/v3/access_token?app_id=4078878391981186695&app_secret=UbO88o896pP22HaNQE5O&code=".$token."",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "",
		));

		$response = json_decode(curl_exec($curl));
		curl_close($curl);
		$data = array();
		if (isset($response->access_token)) {
			$data = $this->checktokenzl($response->access_token);
		}
		return $data;
	}

	public function checktokenzl($token){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://openapi.zalo.me/v2.0/me?access_token=".$token."&fields=id%2Cbirthday%2Cname%2Cgender%2Cpicture",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "",
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/x-www-form-urlencoded"
		  ),
		));

		$response = json_decode(curl_exec($curl));
		curl_close($curl);
		$data = array();
		if (isset($response->id)) {
			$data['id'] = $response->id;
			$data['name'] = $response->name;
			$data['birthday'] = $response->birthday;
			$data['picture'] = $response->picture->data->url;
		}
		return $data;
	}

    public function getAddAcount(){
    	dd('sagdgdjhg');

    }

     public function postAddAcount(){
    	
    }
    

    public function getDeleteUser($id){
         if($id){
	        $account = User_Model::where('zalo_id',$id)->delete();
	         $account2 = user_zaloapp::where('zalo_id',$id)->delete();
        }
         return back();
    	
    }

    public function deleteAccountProf(Request $request){
         $arr = $request->arr;
          foreach ($arr as $key => $value) {
          	$account = User_Model::where('zalo_id',$value)->delete();
          	$account2 = user_zaloapp::where('zalo_id',$value)->delete();
          }
          return [
                    'status'  => 200,
                    'message' => 'xóa tài khoản thành công!',
                ];
    }
    
     public function deleteAccountOA(Request $request){
         $arr = $request->arr;
          foreach ($arr as $key => $value) {
          	$account = User_Model::where('zalo_id',$value)->delete();
          	$account2 = user_zaloapp::where('zalo_id',$value)->delete();
          }
          return [
                    'status'  => 200,
                    'message' => 'xóa tài khoản thành công!',
                ];
    }

    public function loadscanqr(){
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
		echo json_encode($response);die;

	}




    public function getLogout(){
    	Auth::logout();
    	return redirect()->intended('/');
    }

    public function getInfoAccountAjax(Request $request){
         $id= $request->id;
         $result = DB::table('zalo_accounts')->where('id',$id)->get();
         $apps = array();

		foreach ($result as $app) {
			$apps = array(
				"id" 		=> $app->id,
				"zalo_id" 	=> $app->zalo_id,
				"firstname" 	=> $app->firstname,
				"phone" 	=> $app->phone,
				"zalo_pass" 	=> $app->zalo_pass,
			);
		}
        $arr=array(
			"status"=> 200,
			'data' =>$apps


		);
		
		return response()->json($arr);
         

    }

    public function updateAccount(Request $request){
           $firstname = $request->username;
           $zalo_id = $request->id_zalo;
           $cate_id = $request->cate_id;
           
		   $data =DB::table('zalo_accounts')->where('zalo_id',$zalo_id);
		     if(!empty($data)){
		        $arr['firstname'] = $firstname;
		        $arr['zalo_id'] = $zalo_id;
		        $arr['cate_id'] = $cate_id;
		        $arr['phone'] = $request->phone;
		        $arr['zalo_pass'] = $request->zalo_pass;
		        $data = DB::table('zalo_accounts')->where('zalo_id',$zalo_id)->update($arr);
		        $result = array(
		             'status' => 200,
			        'message' => "Cập nhật danh mục thành công!",
		        );
		        
		       
		     }
		     return response()->json($result);
    }

    public function searchAccountBycate(Request $request){
       if(Auth::user()){
        $user_id = Auth::user()->id;
    }else{
        return redirect()->intended('/');
    }
      $cate_id = $request->cate_id;
      $res = DB::table('zalo_accounts')->where('user_id',$user_id)->where('cate_id',$cate_id)->where('page',0)->get();
      $category = DB::table('vp_categories')->where('user_id',$user_id)->where('id',$cate_id)->select('name')->get();
        $data = $res;
        $cate =$category;
       
       $html='';
       //var_dump($data);die();
        foreach ($data as  $row) {
          $html .=' <tr>
				          <td>
	                    	<div class="form-check form-check-inline">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input-styled" data-fouc value="30" style="visibility: inherit !important;"></span>
									
								</label>
							</div>
	                       
		                    </td>
						<td>'.$row->zalo_id.'</td>
						<td><img src="'.$row->image.'" width="40px" height="40px" style="border-radius: 50%!important;"></td>
						<td>'.$row->name.'</td>';

                        foreach ($cate as $key => $value) {
                        		$html.='<td><span class="badge badge-dark">'.$value->name.'</span></td>';
                        }
						

						$html .='<td> <span class="badge bg-success">Live</span> </td>
						<td></td>
						<td>2020-03-20 09:42:38</td>
						<td>
				                        <form method="POST" action="#">
				                             <input type="hidden" name="_token" value="">
				                             <input type="hidden" name="_method" value="DELETE">                           
				                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal_backdrop" onclick="choiceidzalo('.$row->zalo_id.')"><i class="icon-plus2 mr-2" data-id="'.$row->zalo_id.'" ></i> Thêm cookie</button>
				                            <button class="btn btn btn-warning" type="button" data-toggle="modal" data-target="#modal_update" data-name="'.$row->cate_id.'" data-name="'. $row->name.'" data-id="'. $row->id .'" onclick="changeAccount(this)"> Cập nhật</button>
				                            <a href="http://localhost/zalovs3/home/delete/'.$row->id.'" class="btn btn-danger" type="submit"  style="color:#FFFFFF"> <i class="icon-folder-remove icon-1x"></i> Xóa</a>
				                        </form>
				                    </td>
				                </tr>
          ';

      }
      echo $html;
      //var_dump($html);die();

    }
    
    public function searchAccount2Bycate(Request $request){
       if(Auth::user()){
        $user_id = Auth::user()->id;
    }else{
        return redirect()->intended('/');
    }
      $cate_id = $request->cate_id;
      $res = DB::table('zalo_accounts')->where('user_id',$user_id)->where('cate_id',$cate_id)->where('page',1)->get();
      $category = DB::table('vp_categories')->where('user_id',$user_id)->where('id',$cate_id)->select('name')->get();
        $data = $res;
        $cate =$category;
       
       $html='';
       //var_dump($data);die();
        foreach ($data as  $row) {
          $html .=' <tr>
				          <td>
	                    	<div class="form-check form-check-inline">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input-styled" data-fouc value="30" style="visibility: inherit !important;"></span>
									
								</label>
							</div>
	                       
		                    </td>
						<td>'.$row->zalo_id.'</td>
						<td><img src="'.$row->image.'" width="40px" height="40px" style="border-radius: 50%!important;"></td>
						<td>'.$row->name.'</td>';
                         if($row->cate_id > 0){
                         	foreach ($cate as $key => $value) {
                        		$html.='<td><span class="badge badge-dark">'.$value->name.'</span></td>';
                           }
                         }else{
                         	$html .='<td>Hoạt động</td>';
                         }
                        

						$html .='<td>Hoạt động</td>
						<td>2020-03-20 09:42:38</td>
						<td>
				                        <form method="POST" action="#">
				                             <input type="hidden" name="_token" value="">
				                             <input type="hidden" name="_method" value="DELETE">                           
				                            <button class="btn btn btn-warning" type="button" data-toggle="modal" data-target="#modal_update" data-name="'.$row->cate_id.'" data-name="'. $row->name.'" data-id="'. $row->id .'" onclick="changeAccount(this)"> Cập nhật</button>
				                            <a href="http://localhost/zalovs3/home/delete/'.$row->id.'" class="btn btn-danger" type="submit"  style="color:#FFFFFF"> <i class="icon-folder-remove icon-1x"></i> Xóa</a>
				                        </form>
				                    </td>
				                </tr>
          ';

      }
      echo $html;
      //var_dump($html);die();

    }

    public function searchAccountByname(Request $request){
    	if(Auth::user()){
        $user_id = Auth::user()->id;
	    }else{
	        return redirect()->intended('/');
	    }
         $id= $request->id;
       $res = DB::table('zalo_accounts')->where('user_id',$user_id)->where('id',$id)->get();
      $category = DB::table('vp_categories')->where('user_id',$user_id)->get();

        $data = $res;
        $cate =$category;
       //var_dump($data);die();
       $html='';
      // var_dump($cate);die();
        foreach ($data as  $row) {
          $html .=' <tr>
				          <td>
	                    	<div class="form-check form-check-inline">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input-styled" data-fouc value="30" style="visibility: inherit !important;"></span>
									
								</label>
							</div>
	                       
		                    </td>
						<td>'.$row->zalo_id.'</td>
						<td><img src="'.$row->image.'" width="40px" height="40px" style="border-radius: 50%!important;"></td>
						<td>'.$row->name.'</td>';
                         if($row->cate_id > 0){
                         	foreach ($cate as $value) {
                        	if($row->cate_id == $value->id){
                                $html.='<td><span class="badge badge-dark">'.$value->name.'</span></td>';
                        	 }
                        	}
                        }else{
                        	$html .='<td></td>';
                        }

                        
						
						$html .='<td> <span class="badge bg-success">Live</span> </td>
						<td></td>
						<td>2020-03-20 09:42:38</td>
						<td>
				                        <form method="POST" action="#">
				                             <input type="hidden" name="_token" value="">
				                             <input type="hidden" name="_method" value="DELETE">                           
				                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal_backdrop" onclick="choiceidzalo('.$row->zalo_id.')"><i class="icon-plus2 mr-2" data-id="'.$row->zalo_id.'" ></i> Thêm cookie</button>
				                            <button class="btn btn btn-warning" type="button" data-toggle="modal" data-target="#modal_update" data-name="'.$row->cate_id.'" data-name="'. $row->name.'" data-id="'. $row->id .'" onclick="changeAccount(this)"> Cập nhật</button>
				                            <a href="http://localhost/zalovs3/home/delete/'.$row->id.'" class="btn btn-danger" type="submit"  style="color:#FFFFFF"> <i class="icon-folder-remove icon-1x"></i> Xóa</a>
				                        </form>
				                    </td>
				                </tr>
          ';

      }
      echo $html;
    }

public function searchAccountByname2(Request $request){
    	if(Auth::user()){
        $user_id = Auth::user()->id;
	    }else{
	        return redirect()->intended('/');
	    }
         $id= $request->id;
       $res = DB::table('zalo_accounts')->where('user_id',$user_id)->where('id',$id)->where('page',1)->get();
      $category = DB::table('vp_categories')->where('user_id',$user_id)->get();

        $data = $res;
        $cate =$category;
       //var_dump($data);die();
       $html='';
      // var_dump($cate);die();
        foreach ($data as  $row) {
          $html .=' <tr>
				          <td>
	                    	<div class="form-check form-check-inline">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input-styled" data-fouc value="30" style="visibility: inherit !important;"></span>
									
								</label>
							</div>
	                       
		                    </td>
						<td>'.$row->zalo_id.'</td>
						<td><img src="'.$row->image.'" width="40px" height="40px" style="border-radius: 50%!important;"></td>
						<td>'.$row->name.'</td>';
                         if($row->cate_id > 0){
                         	foreach ($cate as $value) {
                        	if($row->cate_id == $value->id){
                                $html.='<td><span class="badge badge-dark">'.$value->name.'</span></td>';
                        	 }
                        	}
                        }else{
                        	$html .='<td>Hoạt động</td>';
                        }
						$html .='<td></td>
						<td>2020-03-20 09:42:38</td>
						<td>
				                        <form method="POST" action="#">
				                             <input type="hidden" name="_token" value="">
				                             <input type="hidden" name="_method" value="DELETE">                           
				                            <button class="btn btn btn-warning" type="button" data-toggle="modal" data-target="#modal_update" data-name="'.$row->cate_id.'" data-name="'. $row->name.'" data-id="'. $row->id .'" onclick="changeAccount(this)"> Cập nhật</button>
				                            <a href="http://localhost/zalovs3/home/delete/'.$row->id.'" class="btn btn-danger" type="submit"  style="color:#FFFFFF"> <i class="icon-folder-remove icon-1x"></i> Xóa</a>
				                        </form>
				                    </td>
				                </tr>
          ';

      }
      echo $html;
    }



}
