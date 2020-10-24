<?php

namespace App\Http\Controllers\Chiendich;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\chiendich_model;
use Carbon\Carbon;
class Chiendich extends Controller
{
      protected $zaloId;
      protected $role_page;
      protected $role_profile;
      protected $userid;
      protected $status;
      protected $token;
      protected $act_code;
      protected $active;

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
             $act_code   = $value->act_code;
             $active   = $value->active;
        } 
        $dataAccount['role_profile']  =$role_profile;
         $dataAccount['role_page']  =$role_page;
         $dataAccount['status']  =$status;
         $dataAccount['act_code']  =$act_code;
         $dataAccount['active']  =$active;

          if($status != 1){
              $dataAccount['category'] = DB::table('vp_categories')->where('user_id',$id)->get();
        
              $account = DB::table('user_zaloapp') ->join('zalo_accounts', 'user_zaloapp.zalo_id', '=', 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$id)->where('zalo_accounts.user_id',$id)->where('zalo_accounts.page',0)->where('user_zaloapp.page',0)->orderBy('zalo_accounts.id','desc')->orderBy('user_zaloapp.id','desc')->get();
                $dataAccount['accountOA'] = DB::table('user_zaloapp') ->join('zalo_accounts', 'user_zaloapp.zalo_id', '=', 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$id)->where('zalo_accounts.user_id',$id)->where('zalo_accounts.page',1)->where('user_zaloapp.page',1)->orderBy('zalo_accounts.id','desc')->orderBy('user_zaloapp.id','desc')->get();
          }else{
             
             $dataAccount['category'] = DB::table('vp_categories')->where('user_id',$userid)->get();
             $account = DB::table('user_zaloapp') ->join('zalo_accounts', 'user_zaloapp.zalo_id', '=', 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$userid)->where('zalo_accounts.user_id',$userid)->where('zalo_accounts.page',0)->where('user_zaloapp.page',0)->orderBy('zalo_accounts.id','desc')->orderBy('user_zaloapp.id','desc')->get();

             $dataAccount['accountOA'] = DB::table('user_zaloapp') ->join('zalo_accounts', 'user_zaloapp.zalo_id', '=', 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$userid)->where('zalo_accounts.user_id',$userid)->where('zalo_accounts.page',1)->where('user_zaloapp.page',1)->orderBy('zalo_accounts.id','desc')->orderBy('user_zaloapp.id','desc')->get();
          }

        // $dataAccount['category'] = DB::table('vp_categories')->where('user_id',$id)->get();
        
        // $account = DB::table('user_zaloapp') ->join('zalo_accounts', 'user_zaloapp.zalo_id', '=', 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$id)->where('zalo_accounts.user_id',$id)->where('zalo_accounts.page',0)->where('user_zaloapp.page',0)->orderBy('zalo_accounts.id','desc')->orderBy('user_zaloapp.id','desc')->get();

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


    	return view('chien_dich.chiendich',$dataAccount);
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

  function submitsave(Request $request){
 if(Auth::user()){
          $id = Auth::user()->id;
        }else{
          return redirect()->intended('/');
        }

    $tenchiendich = $request->tenchiendich;
    $images = $request->images;
    $giogui = $request->giogui;
    $noidungtinnhan = $request->noidungtinnhan;
    $time_send_camp = $request->time_send_camp;
    $id_profile = $request->id_profile;
    $type = $request->type;
    $phonelist = $request->phonelist;

    // $check == DB::table('schedule_addfriend')->where('stop',1)->get();
   
    // if (!empty($check)) {
    //   $result = array(
    //     'code'=>401,
    //     'mess' => 'Tài khoản zalo này đang chạy chiến dịch kết bạn nên không thể chạy chiến dịch này'
    //   );
    //   echo json_encode($result);die;
    // }
    $timestart = explode(' - ', $time_send_camp);
    $user = $request->user;
    $nameuser = $request->nameuser;
    $noidungtinnhan = str_replace('"', '\"', $noidungtinnhan);

    if ($type == 0) {
         $datasave = new chiendich_model;
        $datasave->tenchiendich = $tenchiendich;
        $datasave->noidungtinnhan = $noidungtinnhan;
        $datasave->date_send = $timestart[0];
        $datasave->date_end = $timestart[1];
        $datasave->datauser = $user;
        $datasave->nameuser = $nameuser;
        $datasave->user_id = $id;
        $datasave->id_profile = $id_profile;
        $datasave->image = $images;
        $datasave->pause = 0;
        $datasave->giogui = $giogui;
        $datasave->end = 0;
        $datasave->stop = 0;
        $datasave->type = 0;
        $datasave->total = count(json_decode($user));
       
        $datasave->save();

      // $this->db->set('tenchiendich',$tenchiendich);
      // $this->db->set('noidungtinnhan',$noidungtinnhan);
      // $this->db->set('date_send',$timestart[0]);
      // $this->db->set('date_end',$timestart[1]);
      // $this->db->set('datauser',$user);
      // $this->db->set('nameuser',$nameuser);
      // $this->db->set('id_user',$this->currentUser['user_id']);
      // $this->db->set('id_profile',$id_profile);
      // $this->db->set('image',$images);
      // $this->db->set('pause',0);
      // $this->db->set('giogui',$giogui);
      // $this->db->set('end',0);
      // $this->db->set('total',count(json_decode($user)));
      // $this->db->insert('chiendich');
    } else {
        $datasave = new chiendich_model;
        $datasave->tenchiendich = $tenchiendich;
        $datasave->noidungtinnhan = $noidungtinnhan;
        $datasave->date_send = $timestart[0];
        $datasave->date_end = $timestart[1];
        $datasave->datauser = $user;
        $datasave->nameuser = $nameuser;
        $datasave->user_id = $id;
        $datasave->id_profile = $id_profile;
        $datasave->image = $images;
        $datasave->pause = 0;
        $datasave->giogui = $giogui;
        $datasave->type = 1;
        $datasave->phone_list = $phonelist;
        $datasave->end = 0;
        $datasave->stop = 0;
        $datasave->total = count(json_decode($user));
       
        $datasave->save();


      // $this->db->set('tenchiendich',$tenchiendich);
      // $this->db->set('noidungtinnhan',$noidungtinnhan);
      // $this->db->set('date_send',$timestart[0]);
      // $this->db->set('date_end',$timestart[1]);
      // $this->db->set('datauser',$user);
      // $this->db->set('nameuser',$nameuser);
      // $this->db->set('id_user',$this->currentUser['user_id']);
      // $this->db->set('id_profile',$id_profile);
      // $this->db->set('image',$images);
      // $this->db->set('pause',0);
      // $this->db->set('giogui',$giogui);
      // $this->db->set('type',1);
      // $this->db->set('phone_list',$phonelist);
      // $this->db->set('end',0);
      // $this->db->set('total',count(json_decode($phonelist)));
      // $this->db->insert('chiendich');
    }
    $result = array(
      'code'=>200,
      'mess' => 'Đã thêm chiến dịch thành công'
    );
    echo json_encode($result);die;
  }

  public function history(Request $request){
    if(Auth::user()){
          $id = Auth::user()->id;
        }else{
          return redirect()->intended('/');
        }
    $data['history'] = DB::table('chiendich')->where('user_id',$id)->get();
     return view('chien_dich.history_chiendich',$data);
  }

  public function getDataZaloOa(Request $rq){
     $data = DB::table('datazalo')->where('id_send',$rq->zaloid)->select('id_to')->get();
     $data2 = DB::table('user_zaloapp')->where('zalo_id',$rq->zaloid)->select('access_token')->get();
     foreach ($data2 as $key => $value) {
       $token = $value->access_token;
     }
    foreach ($data as $key => $value) {
       $array[] = $value->id_to;
    }
    $arrayNew = array_unique($array);
    $check = $this->getinfoUser($token, $arrayNew);
    return [
      'status'=>200,
       'data' => $check
    ];
  }

   static function getinfoUser($accesstoken, $arrayNew){

       foreach ($arrayNew as $key => $value) {
           $curl = curl_init();

        
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://openapi.zalo.me/v2.0/oa/getprofile?access_token='.$accesstoken.'&data={"user_id":"'.$value.'"}',
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
            if($response->error == 0){
               $data =[
               'name' => $response->data->display_name,
               'avatar' => $response->data->avatar,
               'user_id' => $response->data->user_id,
               'user_id_by_app' => $response->data->user_id_by_app
              ];
              $data2[] = $data;
              
              

            }
            
           

       }
      return $data2;
      
        // if($response->error == 0){
        //     $resname = $response->data->display_name;
        //     $resavatar = $response->data->avatar;
        //     $datasend['name_user'] = $resname;
        //     $datasend['avatar_user'] = $resavatar;

        //     return $datasend;
            
        // }elseif($response->error == -213){
        //      $data['name_user'] = "zalo";
        //      $data['avatar_user'] = "https://s120-ava-talk.zadn.vn/e/6/2/5/36/120/16782d311b12da6d28daa13e343986b8.jpg";
           
        //      return $data;
        // }
       
       
    }
    public function getDataSendSK(Request $rq){
       $data = DB::table('user_zaloapp')->where('zalo_id',$rq->zaloid)->select('access_token')->get();
       foreach ($data as $key => $value) {
         $token = $value->access_token;
       }
       if(!empty($token)){
         return [
            'status' => 200,
            'data' =>$token
         ];
       }else {
         return [
           'status'=> 404,
           'message' =>"Đã có lỗi xảy ra, vui lòng thử lại sau."
         ];
       }
    }

    public function getNguoiQuanTam(Request $rq){
      $data = DB::table('user_zaloapp')->where('zalo_id',$rq->zaloid)->select('access_token')->get();
        foreach ($data as $key => $value) {
         $token = $value->access_token;
       }
       $getData = $this->getDataQT($token);
       $getInfor = $this->getInforUser($getData->data->followers,$token);
       $html ='';
       
       for ($i=0; $i < count($getInfor); $i++) { 
        // var_dump();die();
         $html .='<tr role="row" class="odd">';
         $html .=' <td class="sorting_" style="width: 20%;">';
         $html .='  <input name="client_camp[fanpage:461][]" class="dataSendOaQT data_client_send" gender_client="undefined" name_client="'.$getInfor[$i]->data->display_name.'" type="checkbox" value="'.$getInfor[$i]->data->user_id.'" data-userapp="'.$getInfor[$i]->data->user_id_by_app.'"></td>';
         $html .=' <td style="width: 40%"><img src="'.$getInfor[$i]->data->avatar.'" style="width: 45px; height: 45px;"></td>';
         $html .='<td style="width: 40%">'.$getInfor[$i]->data->display_name.'</td></tr>';
       }
       echo $html;

    }

    static function getDataQT($token){
        $curl = curl_init();

        
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://openapi.zalo.me/v2.0/oa/getfollowers?access_token='.$token.'&data={"offset":0,"count":20}',
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
            return $response;
    }

    static function getInforUser($data,$token){
         foreach ($data as $key => $value) {
            $curl = curl_init();

        
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://openapi.zalo.me/v2.0/oa/getprofile?access_token='.$token.'&data={"user_id":"'.$value->user_id.'"}',
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
          $result[] = $response;
         }
         return $result;
    }

    public function sendMessageOA(Request $rq){
        
          $send  = $this->sendReplyComment($rq->zaloUserid, $rq->content, $rq->tkn);
          dd($send);die();
    }

    public function sendMessageImgOA(Request $rq){

          $send  = $this->sendreplyimage($rq->zaloUserid, $rq->content, $rq->tkn,$rq->img);
          dd($send);die();
    }

    static function sendReplyComment($id_comment, $content_chat,$token){
       
        $json = '{
          "recipient":{
            "user_id":"'.$id_comment.'"
          },
          "message":{
            "text":"'.$content_chat.'",
            "text":"'.$content_chat.'"
          }
        }';
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://openapi.zalo.me/v2.0/oa/message?access_token=".$token."",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $json,
          CURLOPT_HTTPHEADER => array(
            "content-type: application/json"
          ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    static function sendreplyimage($id_comment, $content_chat,$token,$url){

        $json = '{
          "recipient": {
            "user_id": "'.$id_comment.'"
          },
          "message": {
            "attachment": {
                "type": "template",
                "payload": {
                    "template_type": "media",
                    "elements": [{
                        "media_type": "image",
                        "url": "'.$url.'"
                    }]
                }
            }
          }
        }';
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://openapi.zalo.me/v2.0/oa/message?access_token=".$token."",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $json,
          CURLOPT_HTTPHEADER => array(
            "content-type: application/json"
          ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }


}
