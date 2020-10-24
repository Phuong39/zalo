<?php

namespace App\Http\Controllers\Group;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\datagroupzalo;
use App\Models\historyAddFriendGroup;
use App\Models\historyJoinGroupByLink;

class group extends Controller
{
      protected $arr_check;
      protected $role_profile;
      protected $userid;
      protected $status;
    public function index(){

    	 if(Auth::user()){
            $id = Auth::user()->id;
        }else{
            return redirect()->intended('/');
        }
        $data = DB::table('vp_users')->where('id',$id)->get();
         
         foreach($data  as $key=>$value){
             $role_page = json_decode($value->role_page);
            
             $role_profile = json_decode($value->role_profile);
             $userid   = $value->userid;
             $status   = $value->status;
        } 
        $dataAccount['role_profile']  =$role_profile;
         $dataAccount['role_page']  =$role_page;
         $dataAccount['status']  =$status;
          $dataAccount['userid']  =$userid;
        // $account = DB::table('user_zaloapp') ->join('zalo_accounts', 'user_zaloapp.zalo_id', '=', 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$id)->where('zalo_accounts.user_id',$id)->where('zalo_accounts.page',0)->where('user_zaloapp.page',0)->orderBy('zalo_accounts.id','desc')->orderBy('user_zaloapp.id','desc')->get();
        if($status != 1){
              $dataAccount['category'] = DB::table('vp_categories')->where('user_id',$id)->get();
        
               $account = DB::table('user_zaloapp') ->join('zalo_accounts', 'user_zaloapp.zalo_id', '=', 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$id)->where('zalo_accounts.user_id',$id)->where('zalo_accounts.page',0)->where('user_zaloapp.page',0)->orderBy('zalo_accounts.id','desc')->orderBy('user_zaloapp.id','desc')->get();
         }else{
             $dataAccount['category'] = DB::table('vp_categories')->where('user_id',$userid)->get();
        
              $account = DB::table('user_zaloapp') ->join('zalo_accounts', 'user_zaloapp.zalo_id', '=', 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$userid)->where('zalo_accounts.user_id',$userid)->where('zalo_accounts.page',0)->where('user_zaloapp.page',0)->orderBy('zalo_accounts.id','desc')->orderBy('user_zaloapp.id','desc')->get();
         }

        $dataAccount['account'] = $account;
        if (!empty($dataAccount['account'])) {
             foreach ($dataAccount['account'] as $key => $value) {
                $check_cookie = 0;
                $datacheck = $this->checkcookie($value->cookie,$value->emei);
                //var_dump($datacheck);die();

                 if ($datacheck->error_code != '0') {
                    $check_cookie = 1;
                }
                $dataAccount['account'][$key]->checkcookie = $check_cookie;
             }
        }
    	return view('group.index',$dataAccount);
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
        return $response;
    }

    public function getMemberGroup(Request $rq){
        if(Auth::user()){
            $id= Auth::user()->id;
           }else{
            return redirect()->intended('/');
         }
         $numberGroup = $rq->groupId;

         $data =  datagroupzalo::where('user_id',$id)->where('zalo_id', $rq->zalo_id)->get();
         $arr = json_decode(json_encode($data, true));
         foreach ($arr as $key => $value) {
          $arr_check = $value->data;
         }
         
        return $arr_check;
         
    }

    public function convertArrLink(Request $rq){
        $arr_1 = array();
        $arr_2 = array();
        $arr = $rq->arr;
        $links_arr = $rq->links_array;
        foreach ($arr as $key => $value) {
           foreach ($links_arr as $k => $row) {
              $arr_1 = ['zaloid'=>$value,'link'=>$row];
               array_push($arr_2,$arr_1);
           }
        }
        return [
          'status'=> 200,
          'data' => $arr_2
        ];
    }
    public function addHistoryFriendGroup(Request $rq){
      if(Auth::user()){
            $id= Auth::user()->id;
         }else{
          return redirect()->intended('/');
       }
       $data = new historyAddFriendGroup;
          $data->name = $rq->name;
          $data->user_id = $id;
          $data->avatar  = $rq->avatar;
          $data->code  = $rq->error_code;
          $data->message  = $rq->error_message;
          $data->save();
          if(isset($data)){
          return [
              'status'  => 200,
              'message' => 'Thêm bản ghi thành công',
          ];
         }
    }

    public function historyAddfriendGroup(){
      if(Auth::user()){
            $id= Auth::user()->id;
         }else{
          return redirect()->intended('/');
       }
      $data['history'] = DB::table('history_add_friend_group')->where('user_id',$id)->orderBy('id','desc')->get();
      return view('group.historyAddFriendGroup',$data);
    }

    public function historySendGroup(){
       if(Auth::user()){
            $id= Auth::user()->id;
         }else{
          return redirect()->intended('/');
       }
      $data['history'] = DB::table('history_send_groups')->where('user_id',$id)->orderBy('id','desc')->get();
      return view('group.historySendGroup',$data);
    }
    public  function historyJoinGroupByLink(){
      if(Auth::user()){
            $id= Auth::user()->id;
         }else{
          return redirect()->intended('/');
       }
      $data['history'] = DB::table('history_join_link_goup')->join('zalo_accounts', 'history_join_link_goup.zaloid', '=', 'zalo_accounts.zalo_id')->where('history_join_link_goup.user_id',$id)->select('history_join_link_goup.*','zalo_accounts.name','zalo_accounts.image')->orderBy('id','desc')->paginate(15);;
      return view('group.historyJGByLink',$data);
    }
    public function historyAddLinkGroup(Request $rq){
      if(Auth::user()){
            $id= Auth::user()->id;
         }else{
          return redirect()->intended('/');
       }
      $data = new historyJoinGroupByLink;
          $data->link = $rq->link;
          $data->zaloid = $rq->zaloid;
          $data->code  = $rq->code;
          $data->message  = $rq->message;
          $data->user_id  = $id;
          $data->save();

    }

    
}
