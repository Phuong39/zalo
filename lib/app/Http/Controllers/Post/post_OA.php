<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\User_Model;
class post_OA extends Controller
{
    protected $status;
    protected $userid;
    protected $role_profile;
    protected $role_page;
    protected $dataarr;

    public function sendPostOa(Request $request){
     if(Auth::user()){
        $id = Auth::user()->id;
      // $data['list']= User_Model::where('user_id',$id)->where('page',1)->orderBy('id','desc')->paginate(10);
      // $data['category'] = DB::table('categorypost')->where('user_id',$id)->get();

     
      //list zalo profile
      $data['profile'] = DB::table('vp_users')->where('id',$id)->get();
       foreach ($data['profile'] as $key => $value) {
            $userid = $value->userid;
            $status = $value->status;
            $role_profile = json_decode($value->role_profile);
            $role_page = json_decode($value->role_page);
         }
      $data['role_profile'] = $role_profile;
      $data['role_page'] = $role_page;
      $data['status'] = $status;
      $datav2= array();
      if($status !=1){

        
         $data['list']= User_Model::where('user_id',$id)->where('page',1)->orderBy('id','desc')->paginate(10);
          $data['category'] = DB::table('categorypost')->where('user_id',$id)->get();
          $data['list_post'] = DB::table('list_post')->where('user_id',$id)->where('status',1)->orderBy('id','desc')->paginate(10);

         $datav2 = DB::table('zalo_accounts')->join('user_zaloapp', 'user_zaloapp.zalo_id', '=' , 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$id)->where('zalo_accounts.user_id',$id)->where('zalo_accounts.page',1)->where('user_zaloapp.page',1)->get();
        
      }else{
       
           $data['list']= User_Model::where('user_id',$id)->where('page',1)->orderBy('id','desc')->paginate(10);
            $data['category'] = DB::table('categorypost')->where('user_id',$userid)->get();

             $data['list_post'] = DB::table('list_post')->where('user_id',$userid)->where('status',1)->orderBy('id','desc')->paginate(10);

           $datav2 = DB::table('zalo_accounts')->join('user_zaloapp', 'user_zaloapp.zalo_id', '=' , 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$userid)->where('zalo_accounts.user_id',$userid)->where('zalo_accounts.page',1)->where('user_zaloapp.page',1)->get(); 

      }
      $data['account'] = $datav2;
      if (!empty($data['account'])) {
      foreach ($data['account'] as $key => $value) {
        $check_cookie = 0;
        $check = $this->checkcookie($value->cookie,$value->emei);

        if ($check->error_code != '0') {
          $check_cookie = 1;
        }
        $data['account'][$key]->checkcookie = $check_cookie;
      }
    } 

      return view('posts.post_OA',$data);

      }else{
        return redirect()->intended('/');
      }
            
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
