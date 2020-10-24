<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\zalo_account_Model;
use App\Models\User_Model;
use App\Models\user_zaloapp;
class list_account extends Controller
{
     const PER_PAGE   =10;
     protected $zaloId;
   public function postListAccountFb(Request $request)
    { 



           $checkToken   = $this->checkRequestTokenViaApiApp($request->token);
           if($checkToken == true){
               $params = ['user_id'=>$request->user_id,'page'=>$request->page];
                $dataResponse = $this->listFbAccountViaApiApp($params);
                if(count($dataResponse)>0){
                    return response()->json($dataResponse);
                }
                return response()->json([
                    'status'  => 404,
                    'message' => "Rất tiếc, Tài khoản hiện tại không có trên hệ thống.",
                ]);
           }
           return response()->json([
            'status'  => 401,
            'message' => "Token không hợp lệ.",
            ]);

    }

    public function postListAccountOA(Request $request)
    { 



           $checkToken   = $this->checkRequestTokenViaApiApp($request->token);
           if($checkToken == true){
               $params = ['user_id'=>$request->user_id,'page'=>$request->page];
                $dataResponse = $this->listOaAccountViaApiApp($params);
                if(count($dataResponse)>0){
                    return response()->json($dataResponse);
                }
                return response()->json([
                    'status'  => 404,
                    'message' => "Rất tiếc, Tài khoản hiện tại không có trên hệ thống.",
                ]);
           }
           return response()->json([
            'status'  => 401,
            'message' => "Token không hợp lệ.",
            ]);

    }

     public static function checkRequestTokenViaApiApp($token){
        $checkUser = DB::table('vp_users')->where('remember_token',$token)->count();
        if($checkUser > 0){
            return true;
        }
        return false;
    }

     public function listFbAccountViaApiApp($params)
    {

        $nextPage    = $params['page'];
        $limitPage   = self::PER_PAGE * $nextPage;
        $offset      = ($nextPage - 1) * self::PER_PAGE; 
       // $account = DB::table('zalo_accounts')->where('user_id',$params['user_id'])->where('page',0)->latest()->offset($offset)->limit($limitPage)->paginate(self::PER_PAGE);

        $account = DB::table('user_zaloapp') ->join('zalo_accounts', 'user_zaloapp.zalo_id', '=', 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$params['user_id'])->where('zalo_accounts.user_id',$params['user_id'])->where('zalo_accounts.page',0)->where('user_zaloapp.page',0)->orderBy('zalo_accounts.id','desc')->orderBy('user_zaloapp.id','desc')->offset($offset)->limit($limitPage)->paginate(self::PER_PAGE);
       
       $data['account'] = $account;
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
        
        $result =array(
           'status'  => 200,
            'message' => "Thành công",
            'data'  =>$account
           
        );
       
        return $result;
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

    public static function listOaAccountViaApiApp($params)
    {

        $nextPage    = $params['page'];
        $limitPage   = self::PER_PAGE * $nextPage;
        $offset      = ($nextPage - 1) * self::PER_PAGE; 
        $account = DB::table('zalo_accounts')->where('user_id',$params['user_id'])->where('page',1)->latest()->offset($offset)->limit($limitPage)->paginate(self::PER_PAGE);
        $result =array(
           'status'  => 200,
            'message' => "Thành công",
            'data'  =>$account
           
        );
        
        return $result;
    }

    public function updateCategoryAccount(Request $request){

         $checkToken   = $this->checkRequestTokenViaApiApp($request->token);
          if($checkToken == true){

                 $parameters     = [
                 'user_id' => $request->user_id,
                'id'      => $request->id,
                'cate_id'    => $request->cate_id,

            ];

            $statusResponse = $this->updateAccountById($parameters);
             }else{

                return response()->json([
                    'status'  => 404,
                    'message' => 'Token không hợp lệ',
                ]);
             }
           
            return response()->json($statusResponse);

    }
    public static function updateAccountById($parameters)
    {
       
        if($parameters){
            $category = zalo_account_Model::where('user_id',$parameters['user_id'])->where('zalo_id',$parameters['id'])->first();
            if(isset($category)){
                $category->cate_id = $parameters['cate_id'];
                $category->update();
              $data = DB::table('zalo_accounts')->where('user_id',$parameters['user_id'])->where('zalo_id',$parameters['id'])->get();

                return [
                    'status'  => 200,
                    'message' => 'Cập nhật tài khoản thành công.',
                    'data' => [
                        'data' => $data
                    ]
                ];
            }
            return [
                'status'  => 404,
                'message' => 'Không có tài khoản nào trên hệ thống.'
            ];
        }
    }

    public function addAccountZalo(Request $request){
    
         $checkToken   = $this->checkRequestTokenViaApiApp($request->token);
            $check =  User_Model::where('user_id',$request->user_id)->get();
            $result = $this->checkcookie($request->accesstoken);
            
             foreach($check as $list){

              $this->zaloId = $list ->zalo_id;

             }
               $user_id =$request->user_id;
               $zalo_id = $request->zalo_id;
               $accessToken = $request->accesstoken;
               $zalo_name = $request->name;
               $picture = $request->picture;
               $page = $request->type;
               $id_oa = $request->id_oa;

$checkv2 = User_Model::where('user_id',$user_id)->where('zalo_id',$zalo_id)->first();


         if($checkToken == true){

          if($page == 0){
            if(!empty($checkv2)){
              $account = User_Model::where('user_id',$user_id)->where('zalo_id',$zalo_id)->delete();
              $account2 = user_zaloapp::where('user_id',$user_id)->where('zalo_id',$zalo_id)->delete();
              
               $data2 = new user_zaloapp;
                $data2->user_id =$user_id;
                $data2->zalo_id = $zalo_id;
                $data2->appid = 2;
                $data2->page = 0;
                $data2->expires_in = 'never';
                $data2->status = 0;
                $data2->access_token = $accessToken;
                $data2->save();
            
                  $data = new User_Model;
                $data->zalo_id = $zalo_id;
                $data->user_id = $user_id;
                $data->firstname = $zalo_name;
                $data->lastname = $zalo_name;
                $data->name = $zalo_name;
                $data->image = $picture;
                $data->page = 0;
                $data->defaultApp = 2;
                $data->save();
                return [
                        'status'  => 200,
                        'message' => 'Thêm tài khoản zalo thành công.'
                    ];
                //   return [
                //     'status'  => 404,
                //     'message' => 'Tài khoản đã tồn tại!!.'
                // ];

              }else{
                 $data2 = new user_zaloapp;
              $data2->user_id =$user_id;
              $data2->zalo_id = $zalo_id;
              $data2->appid = 2;
              $data2->page = 0;
              $data2->expires_in = 'never';
              $data2->status = 0;
              $data2->access_token = $accessToken;
              $data2->save();
          
                $data = new User_Model;
              $data->zalo_id = $zalo_id;
              $data->user_id = $user_id;
              $data->firstname = $zalo_name;
              $data->lastname = $zalo_name;
              $data->name = $zalo_name;
              $data->image = $picture;
              $data->page = 0;
              $data->defaultApp = 2;
              $data->save();
            return [
                    'status'  => 200,
                    'message' => 'Thêm tài khoản zalo thành công.'
                ];
                
              }
          }elseif($page == 1){
            $zaloId = $result['oa_id'];
      

            $data2 = new user_zaloapp;
                $data2->user_id =$id;
                $data2->zalo_id = $result['oa_id'];
                $data2->appid = 2;
                $data2->page = $page;
                $data2->expires_in = 'never';
                $data2->status = 0;
                $data2->access_token = $accessToken;
                $data2->save();
            
                  $data = new User_Model;
                $data->zalo_id = $id_oa;
                $data->user_id = $id;
                $data->firstname = $zalo_name;
                $data->lastname = $zalo_name;
                $data->name = $zalo_name;
                $data->image = $picture;
                $data->page = $page;
                $data->defaultApp = 2;
                $data->save();
                 return [
                    'status'  => 200,
                    'message' => 'Thêm tài khoản zalo OA thành công.'
                ];
          }else{
             return [
                    'status'  => 404,
                    'message' => 'Kiểu tài khoản bạn không đúng.'
                ];
          }
              
         }else{

                return response()->json([
                    'status'  => 404,
                    'message' => 'Token không hợp lệ',
                ]);
             }

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
      CURLOPT_URL => "https://openapi.zalo.me/v2.0/me?access_token=".$token."&fields=id%2Cname%2Cpicture",
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
      $data['picture'] = $response->picture->data->url;
    }
    return $data;
  }
//xoa tai khoan zalo
     public function deleteAccountZalo(Request $request)
    {

         $checkToken = $this->checkRequestTokenViaApiApp($request->token);
             if($checkToken == true){

                 $checkUser =User_Model::select('id','zalo_id')->where('zalo_id',$request->zalo_id)->first();
                 if(isset($checkUser)){
                     $zalo_id         = $request->zalo_id;
                   $statusResponse = $this->deleteAllAccountZalo($zalo_id);
                 }else{

                  return [
                      'status'  =>404,
                      'message' =>'Tài khoản không tồn tại trên hệ thống!',
                   ];
                 }
               

             }else{

                return response()->json([
                    'status'  => 404,
                    'message' => 'Token không hợp lệ',
                ]);
             }
      return response()->json($statusResponse);
      
    }
    public static function deleteAllAccountZalo($zalo_id)
    {
        if($zalo_id){
            $account = User_Model::where('zalo_id',$zalo_id)->delete();
             $account2 = user_zaloapp::where('zalo_id',$zalo_id)->delete();
            return [
                'status'  => 200,
                'message' => 'Xóa tài khoản zalo thành công.'
            ];
        }
    }

    public function listAccountNoCate(Request $request){
         $checkToken   = $this->checkRequestTokenViaApiApp($request->token);
           if($checkToken == true){
               $params = ['user_id'=>$request->user_id,'page'=>$request->page];
                $dataResponse = $this->listFbAccountNocategory($params);
                if(count($dataResponse)>0){
                    return response()->json($dataResponse);
                }
                return response()->json([
                    'status'  => 404,
                    'message' => "Rất tiếc, Tài khoản hiện tại không có trên hệ thống.",
                ]);
           }
           return response()->json([
            'status'  => 401,
            'message' => "Token không hợp lệ.",
            ]);

    }

    public static function listFbAccountNocategory($params)
    {

        $nextPage    = $params['page'];
        $limitPage   = self::PER_PAGE * $nextPage;
        $offset      = ($nextPage - 1) * self::PER_PAGE; 
        $account = DB::table('zalo_accounts')->where('user_id',$params['user_id'])->where('page',0)->where('cate_id',0)->latest()->offset($offset)->limit($limitPage)->paginate(self::PER_PAGE);
        $result =array(
           'status'  => 200,
            'message' => "Thành công",
            'data'  =>$account
           
        );
        
        return $result;
    }

    public function addListAccountIntoCate(Request $request){
      //var_dump($request->token);die();
        $checkToken   = $this->checkRequestTokenViaApiApp($request->token);
        $data = new User_Model;
           if($checkToken == true){
                $array_zalo_id =$request->zalo_id;
               $user_id = $request->user_id;
               $cate_id = $request->cate_id;
              foreach ($array_zalo_id as $key => $value) {
                            for($i = count($array_zalo_id) ;$i>=count($array_zalo_id); $i--){
                                
                                $arr['cate_id'] = $request->cate_id;
                              $data::where('zalo_id',$value)->update($arr);      
                            }
                              //var_dump($value);
                          
                         
                        }
                   
                      $result =array(
                     'status'  => 200,
                      'message' => "Thêm tài khoản vào danh mục thành công",
                     ); 
                      return response()->json($result);
               
           }

           return response()->json([
            'status'  => 401,
            'message' => "Token không hợp lệ.",
            ]);
    }


    public function deleteAccountFormCate(Request $request){
             $checkToken   = $this->checkRequestTokenViaApiApp($request->token);
             if($checkToken == true){
                      
             }
             return response()->json([
            'status'  => 401,
            'message' => "Token không hợp lệ.",
            ]);
    }














}
