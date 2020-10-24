<?php

namespace App\Http\Controllers\chat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User_Model;
use App\Models\list_lichhen;
use Auth;
use DB;
use App\Models\users_business;
use App\Models\Acc_business;


class chatOA extends Controller
{
        private $userId;
        private $idtag;
        private $idmess;
        protected $status;
        protected $userid;
        protected $role_page;
        protected $datasend;
        protected $resavatar;
        protected $resname;
        protected $act_code;
        protected $sid;
        protected $user;
        protected $send;
        protected $Username;

        protected $User2;
        protected $pass;
        protected $macty;
        protected $domain;
        protected $loaitk;
        protected $sidv2;

    public function getchatOA(){
        if(Auth::user()){
        	$id = Auth::user()->id;
            $checkad = DB::table('vp_users')->where('id',$id)->get();
            foreach ($checkad as $key => $value) {
               $status = $value->status;
               $userid = $value->userid;
               $act_code = $value->act_code;
               $role_page = json_decode($value->role_page);
            }
            $data['status'] = $status;
            $data['role_page'] = $role_page;
            $data['act_code'] = $act_code;
           
            if($status != 1){
                 $data['list_oa']= User_Model::where('user_id',$id)->where('page',1)->orderBy('id','desc')->get();
                 $data['act_code'] = DB::table('vp_users')->where('id',$id)->select('act_code')->get();
                 $data['list_lichhen'] = DB::table('list_lichhen')->where('user_id',$id)->get();
            }else{
                $data['list_oa']= User_Model::where('user_id',$userid)->where('page',1)->orderBy('id','desc')->get();
                $data['act_code'] = DB::table('vp_users')->where('id',$id)->select('act_code')->get();
            }
            if($act_code == 1){
                $data['user_Business']= DB::table('users_business')->where('user_id',$id)->select('user_id','Username','NguoiDungID')->get();
            }

        	
    	    return view('chat.chatOA',$data);
        }else{

        	return redirect()->intended('/');
        }
    	
    }

    public function ajaxLoadAllData(Request $request)
    {
       
        // $zalomodel = new zalomodel();
        $list_fanpage = array();
        $list_profile = array();
        $arr_select = json_decode($request->arr_select);
        if (!empty($arr_select)) {
            foreach ($arr_select as $key => $value) {
                if (strpos($value, "fanpage-") === 0) {
                    $list_fanpage[] = substr($value, 8);
                }
                if (strpos($value, "profile-") === 0) {
                    $list_profile[] = substr($value, 8);
                }
            }
        }
        if (!empty($list_fanpage)) {
            $html = '';

            foreach ($list_fanpage as $key1 => $value1) {
                $infor_user = $this->getZaloAccountById($value1);
                //var_dump($infor_user);die();
                $token = $this->getZaloById($value1);


                //$inbox = $this->getChatZaloById($value1);
                $inboxv2 = DB::table('datazalo')->where('id_send',$value1)->orwhere('id_to',$value1)->first();
            if(!empty($inboxv2)){
                 $inbox = DB::table('datazalo')->where('id_send',$value1)->orwhere('id_to',$value1)->get();
                 //$inbox = array_values($inbox);
                $total_inbox = array();
                foreach ($inbox as $key => $value) {
                    // json_decode($value);
                    $data = $value;
                    // echo "<pre>";print_r($data);
                    if (isset($data)) {
                        if ($data->id_send != $value1) {
                            $total_inbox[$data->id_send][$key]['oa_reply'] = '';
                            $total_inbox[$data->id_send][$key]['id_use'] = $data->id_send;
                            $total_inbox[$data->id_send][$key]['app_id'] = $data->id_to;
                            $total_inbox[$data->id_send][$key]['date'] = $data->date_send;
                            $total_inbox[$data->id_send][$key]['view'] = $data->view;
                            if ($data->event_name == 'user_send_text') {
                                $total_inbox[$data->id_send][$key]['message'] = $data->message;
                                $total_inbox[$data->id_send][$key]['url'] = '';
                            }elseif($data->event_name == 'user_send_image' || $data->event_name == 'user_send_sticker'){
                                $total_inbox[$data->id_send][$key]['message'] = '';
                                $total_inbox[$data->id_send][$key]['url'] = $data->url;
                            }
                        } else {
                            // if ($data->event_name == 'user_received_message' || $data->event_name == 'user_seen_message') {
                            //  unset($value);
                            // }
                            if ($data->event_name == 'oa_send_text' || $data->event_name == 'oa_send_image' || $data->event_name == 'oa_send_sticker') {
                                $total_inbox[$data->id_to][$key]['oa_reply'] = '<i class="fa fa-reply"></i>';
                                $total_inbox[$data->id_to][$key]['id_use'] = $data->id_to;
                                $total_inbox[$data->id_to][$key]['app_id'] = $data->id_send;
                                $total_inbox[$data->id_to][$key]['date'] = $data->date_send;
                                $total_inbox[$data->id_to][$key]['view'] = $data->view;
                                if ($data->event_name == 'oa_send_text') {
                                    $total_inbox[$data->id_to][$key]['message'] = $data->message;
                                    $total_inbox[$data->id_to][$key]['url'] = '';
                                }elseif($data->event_name == 'oa_send_image' || $data->event_name == 'oa_send_sticker'){
                                    $total_inbox[$data->id_to][$key]['message'] = '';
                                    $total_inbox[$data->id_to][$key]['url'] = $data->url;
                                }
                            }
                        }
                    }
                }

                $data = array();
                $data_view = array();
                foreach ($total_inbox as $key => $value) {
                    $data_view[$key] = 0;
                    foreach ($value as $key1 => $value1) {
                        if ($value1['view'] == 1) {
                            $data_view[$key] = $key1;
                        }
                    }
                }
                $n = -1;
                foreach ($total_inbox as $key => $value) {
                    $n++;
                    $b = 0;
                    $data[$n] = end($value);
                    $data[$n]['view_b'] = '<i class="count_chuadoc" data="'.count($value).'">('.count($value).')</i>';
                    $data[$n]['rep'] = 'chuadoc';
                    if ($data_view[$key] != 0) {
                        foreach ($value as $key2 => $value2) {
                            if ($key2 > $data_view[$key]) {
                                $b++;
                            }
                        }
                        if ($b != 0) {
                            $data[$n]['view_b'] = '<i class="count_chuadoc" data="'.$b.'">('.$b.')</i>';
                            $data[$n]['rep'] = 'chuadoc';
                        } else {
                            $data[$n]['view_b'] = '';
                            $data[$n]['rep'] = '';
                        }
                        
                    }
                    
                    $data[$n]['name_fanpage'] = $infor_user[0]->name;
                    $data[$n]['avater_fanpage'] = $infor_user[0]->image;
                }

                foreach ($data as $key => $value) {
                      // var_dump($token[0]->access_token);die();
                    $info = $this->getinfoUser($token[0]->access_token, $value['id_use']);

                    $data[$key]['name_user'] = $info['name_user'];
                    $data[$key]['avatar_user'] = $info['avatar_user'];
                    $data[$key]['date'] = $value['date'];

                    if (!empty($value['url'])) {
                        if ($value['oa_reply'] == '') {
                            $data[$key]['message'] = 'Bạn có một tin nhắn ảnh';
                        } else {
                            $data[$key]['message'] = 'Đã gửi tin nhắn ảnh';
                        }
                        
                    }
                }
                $new = array();

                foreach ($data as $key => $value) {
                    $new[$value['date']] = $data[$key];
                }

                krsort($new);
                // var_dump($new);die;
                foreach ($new as $key => $value) {
                    // $this->TagMess_Model->setUserId($this->currentUser['user_id']);
                    // $this->TagMess_Model->setidmess($value['id_use'].'_'.$value['app_id']);
                    $tag = $this->get();
                    // var_dump($tag);die;
                    $htmltag = '';
                    if (!empty($tag)) {

                        foreach ($tag as $key1 => $value1) {
                            $htmltag .= '<li style="background:'.$value1->color.'; border: solid 1px #455575;" data-id-status-labels="118" data-id="80"><span data-id="'.$value1->id_tag.'" style="color: #fff">'.$value1->tag.'<i class="fa fa-close" onclick="removetag(this,'.$value1->id_tag.')"></i></span></li>';
                        }
                    }
                    $html .= '<div bt-type="inbox" data-mess="'.$value['id_use'].'_'.$value['app_id'].'" bt-content-chat="" bt-content-id="'.$value['id_use'].'" bt-id-fanpage="'.$value['app_id'].'" bt-id-profile="" class="bt-load-chat '.$value['rep'].' '.$value['id_use'].'_'.$value['app_id'].'" style=" position: relative;">
                    
                        <div class="bt-avatar-user-chat">
                            <img src="'.$value['avatar_user'].'" style=" position: absolute;">
                        </div>
                        <div class="bt-content-chat" onclick="loadchat(this)">
                            <div class="bt-info-chat">
                                <div class="bt-name-chat">'.$value['name_user'].$value['view_b'].'</div>
                                <div class="bt-date-chat">'.$value['date'].'</div>
                            </div>
                            <div class="bt-review-chat">
                                <p><span>'.$value['oa_reply'].' '.$value['message'].'</span></p>
                                <div class="pull-right">
                                    <i title="Tin nhắn" class="fa fa-comment"></i>
                                </div>
                            </div>
                        </div>
                        <div class="owl-page">
                            <img src="'.$value['avater_fanpage'].'">
                            <span>'.$value['name_fanpage'].'</span>
                        </div>
                        <div class="owl-tag pull-right wrap-color">
                        <div class="tags-cons"><ul>
                            '.$htmltag.'
                        </ul>
                        </div>
                        </div>
                   
                </div>';
                }
                    }
                
            }
            echo $html;die;
        }
        $friend = array();
        $profile = array();
        if (!empty($list_profile)) {

            foreach ($list_profile as $key => $value) {
                $infor_user = $this->getZaloAccountById($value);
                 // echo "<pre>";print_r($infor_user);die;
                $infor = $this->getZaloById($value);
                $accestoken = $this->getAccessToken($infor[0]->access_token);
                $friend[$key] = $this->loadFriendZalo($accestoken);
                $profile[$key]['id_profile'] = $value;
                $profile[$key]['name_profile'] = $infor_user[0]->name;
                $profile[$key]['image_profile'] = $infor_user[0]->hinhanh;
            }
            $friend_new = array();
            $n = -1;
            foreach ($friend as $key => $value) {
                foreach ($value as $key1 => $value1) {
                    $n++;
                    $friend_new[$n]['id'] = $value1['id'];
                    $friend_new[$n]['name'] = $value1['name'];
                    $friend_new[$n]['image'] = $value1['image'];
                    $friend_new[$n]['id_profile'] = $profile[$key]['id_profile'];
                    $friend_new[$n]['name_profile'] = $profile[$key]['name_profile'];
                    $friend_new[$n]['image_profile'] = $profile[$key]['image_profile'];
                }
            }
            $html = '';
            foreach ($friend_new as $key => $value) {
                $html .= '<div bt-type="inbox" bt-content-chat="" bt-content-id="'.$value['id'].'" bt-id-fanpage="" bt-id-profile="'.$value['id_profile'].'" class="bt-load-chat ">
                    <a href="#">
                        <div class="bt-avatar-user-chat">
                            <img src="'.$value['image'].'">
                        </div>
                        <div class="bt-content-chat" onclick="loadchat(this)">
                            <div class="bt-info-chat">
                                <div class="bt-name-chat">'.$value['name'].'</div>
                            </div>
                            <div class="bt-review-chat">
                                <div class="pull-right">
                                    <i title="Tin nhắn" class="fa fa-comment"></i>
                                </div>
                            </div>
                        </div>
                        <div class="owl-page">
                            <img src="'.$value['image_profile'].'">
                            <span>'.$value['name_profile'].'</span>
                        </div>
                    </a>
                </div>';
            }
            echo $html;die;

        }
    }

    public function ajaxgetinboxid1(Request $request) {
        $id_user = $request->id_user;
       
        $bt_id_fanpage = $request->bt_id_fanpage;
        $bt_id_profile = $request->bt_id_profile;
        if (empty($bt_id_fanpage)) {
            return '';
        } else {
            $arr['view'] = 1;
            $data = DB::table('datazalo')->where('id_send',$id_user)->update($arr);
          
            $infor_user = $this->getZaloAccountById($bt_id_fanpage);
            $token = $this->getZaloById($bt_id_fanpage);
            $inboxv2 = DB::table('datazalo')->where('id_send',$id_user)->orwhere('id_to',$id_user)->first();
            if(!empty($inboxv2)){
                 $inbox = DB::table('datazalo')->where('id_send',$id_user)->orwhere('id_to',$id_user)->get();
                   //$inbox = array_values($inbox);
            $total_inbox = array();

     foreach ($inbox as $key => $value) {
                // json_decode($value);
                $data = $value;
                // echo "<pre>";print_r($data);
                if (isset($data)) {
                    if ($data->id_send != $bt_id_fanpage) {
                        $total_inbox[$data->id_send][$key]['oa_reply'] = '';
                        $total_inbox[$data->id_send][$key]['id_use'] = $data->id_send;
                        $total_inbox[$data->id_send][$key]['app_id'] = $data->id_to;
                        $total_inbox[$data->id_send][$key]['date'] = $data->date_send;
                        if ($data->event_name == 'user_send_text') {
                            $total_inbox[$data->id_send][$key]['message'] = $data->message;
                            $total_inbox[$data->id_send][$key]['url'] = '';
                        }elseif($data->event_name == 'user_send_image' || $data->event_name == 'user_send_sticker'){
                            $total_inbox[$data->id_send][$key]['message'] = '';
                            $total_inbox[$data->id_send][$key]['url'] = $data->url;
                        }
                    } else {
                        // if ($data->event_name == 'user_received_message' || $data->event_name == 'user_seen_message') {
                        //  unset($value);
                        // }
                        if ($data->event_name == 'oa_send_text' || $data->event_name == 'oa_send_image' || $data->event_name == 'oa_send_sticker') {
                            $total_inbox[$data->id_to][$key]['oa_reply'] = '<i class="fa fa-reply"></i>';
                            $total_inbox[$data->id_to][$key]['id_use'] = $data->id_to;
                            $total_inbox[$data->id_to][$key]['app_id'] = $data->id_send;
                            $total_inbox[$data->id_to][$key]['date'] = $data->date_send;
                            if ($data->event_name == 'oa_send_text') {
                                $total_inbox[$data->id_to][$key]['message'] = $data->message;
                                $total_inbox[$data->id_to][$key]['url'] = '';
                            }elseif($data->event_name == 'oa_send_image' || $data->event_name == 'oa_send_sticker'){
                                $total_inbox[$data->id_to][$key]['message'] = '';
                                $total_inbox[$data->id_to][$key]['url'] = $data->url;
                            }
                        }
                    }
                }
            }
            $info = $this->getinfoUser($token[0]->access_token, $id_user);

            foreach ($total_inbox as $key => $value) {
                foreach ($value as $key1 => $value1) {
                    if ($value1['oa_reply'] != '') {
                        $total_inbox[$key][$key1]['name_user'] = $infor_user[0]->name;
                        $total_inbox[$key][$key1]['avatar_user'] = $infor_user[0]->image;
                    } else {
                        $total_inbox[$key][$key1]['name_user'] = $info['name_user'];
                        $total_inbox[$key][$key1]['avatar_user'] = $info['avatar_user'];
                    }
                }
            }
            $a =$total_inbox[$id_user];
           $twigData = array();
            $twigData['id_user'] = $id_user;
            $twigData['bt_id_fanpage'] = $bt_id_fanpage;
            $data = $total_inbox[$id_user];
            // var_dump("<pre>");
            //  var_dump($data);
            //  die();
            foreach ($data as $value) {
              $html = '';
               if($value['oa_reply'] != ''){
                 $html .= '<div class="bt-inbox-item bt-right">';
               }else{
                 $html .= '<div class="bt-inbox-item bt-left">';
               }
              $html .= '<div class="bt-inbox-item-avatar">
                       <img title="" src="'.$value['avatar_user'].'">  
                       </div>
                       <div class="bt-inbox-item-text">';
              if($value['message'] != ''){

                $html .= '<span class="span-text-img">'.$value['message'].'</span>';

              }else{

                $html .= '<span class="span-text-img"><img src="'.$value['url'].'" class="img-responsive" style="width: 100%"/></span>';

              }
              $html .= '</div></div>';
                echo $html;
            }
                
            }
            
           
  
           
    
          
           
        }
    }


    public function getZaloAccountById($fbid,$userid = null){
        if(Auth::user()){
            $id = Auth::user()->id;
        }
        $res = DB::table('zalo_accounts')->where('user_id',$id)->where('zalo_id',$fbid)->get();
        return $res;
    }

     public function getZaloById($id_zalo){
        $id = Auth::user()->id;
        $res = DB::table('user_zaloapp')->where('user_id',$id)->where('zalo_id',$id_zalo)->get();
        return $res;
    }

    public function getinfoUser($accesstoken, $id_user){
        $curl = curl_init();

        
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://openapi.zalo.me/v2.0/oa/getprofile?access_token='.$accesstoken.'&data={"user_id":"'.$id_user.'"}',
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
        //var_dump($response->error);
        if($response->error == 0){
            $resname = $response->data->display_name;
            $resavatar = $response->data->avatar;
            $datasend['name_user'] = $resname;
            $datasend['avatar_user'] = $resavatar;
            
       
      
        
            return $datasend;
            
        }elseif($response->error == -213){
             $data['name_user'] = "zalo";
             $data['avatar_user'] = "https://s120-ava-talk.zadn.vn/e/6/2/5/36/120/16782d311b12da6d28daa13e343986b8.jpg";
            // var_dump($data);
             return $data;
        }
       
        // $datasend['name_user'] = $resname;
        // $datasend['avatar_user'] = $resavatar;
        
       
      
        
        // return $datasend;
       
    }

    public function get($offset = 0,$limit = 100,$scheduleId = false) {
      $id = Auth::user()->id;
     $res = DB::table('tag_mess')->join('tag', 'tag_mess.id_tag', '=', 'tag.id')->limit($limit,$offset)->where('tag_mess.user_id',$id)->where('tag_mess.id_mess',$this->idmess)->orderBy('tag_mess.id', 'DESC')->get();
       
        return $res;
    }



     public function getAccessToken($accessToken){
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://oauth.zaloapp.com/v3/access_token?app_id=1932623747349214078&app_secret=1PHSd4X32U0g5S8iEbIs&code=".$accessToken."",
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
        if (isset($response->access_token)) {
            return $response->access_token;
        }
    }

    public function loadFriendZalo($accesstoken){
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://graph.zalo.me/v2.0/me/invitable_friends?access_token=".$accesstoken."&fields=id%2C%20name%2C%20picture&offset=0&limit=100",
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
        foreach ($response->data as $key => $value) {
            $data[$key]['id'] = $value->id;
            $data[$key]['name'] = $value->name;
            $data[$key]['image'] = $value->picture->data->url;
        }
        return $data;
    }

    public function getChatZaloById($id_send){

        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://zalo.phanmemninja.com/tinnhan/index/".$id_send."",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_POSTFIELDS => ""
        ));

        $response = json_decode(curl_exec($curl));
        curl_close($curl);
        // var_dump($response);die();
        return $response;
    }

   public function sendReply(Request $request) {
    
        $id_fanpage = $request->id_fanpage;
        $id_profile = $request->id_profile;
        $id_comment = $request->id_comment;
        $content_chat = $request->content_chat;
        if (!empty($id_fanpage)) {
            $this->sendReplyComment($id_fanpage, $id_comment, $content_chat);
        }
        if (!empty($id_profile)) {
            $this->sendReplyCommentCookie($id_comment, $id_profile, $content_chat);
        }
    }

    public function sendReplyComment($id_fanpage, $id_comment, $content_chat){
        $infor_user = $this->getZaloAccountById($id_fanpage);
        $token = $this->getZaloById($id_fanpage);
        $json = '{
          "recipient":{
            "user_id":"'.$id_comment.'"
          },
          "message":{
            "text":"'.$content_chat.'"
          }
        }';
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://openapi.zalo.me/v2.0/oa/message?access_token=".$token[0]->access_token."",
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
        var_dump($response);die;
    }

    public function sendReplyCommentCookie($id_comment, $id_profile, $content)
    {
        $listprofile = $this->getZaloById($id_profile);
        $accestoken =  $this->getAccessToken($listprofile[0]->access_token);
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://graph.zalo.me/v2.0/apprequests",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "access_token=".$accestoken."&to=".$id_comment."&message=".$content."",
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded"
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
    }

    public function sendreplyimage(Request $request){
        if(Auth::user()){
            $user_id= Auth::user()->id;
        }else{
            return redirect()->intended('/');
        }
        
       // $params=  $request->id_commentr; id_commentr:id_commentr, url:url, id_fanpage:id_fanpage, id_profile:id_profile
       // //$a = $params->id_fanpage;
       // var_dump($params);die();
       $id_fanpage = $request->id_fanpage;
        $id_profile = $request->id_profile;
        $id_comment = $request->id_commentr;
        $url = $request->url;
        //$token = DB::table('user_zaloapp')->where('user_id',$user_id)->where('zalo_id',$id_fanpage)->select('access_token')->get();
        $token="YPu1UETNZ7g9cmDzvrI1VukR2dZkJeKSXinvPhLbYcFHh6a-tpFWVE2x6GkGT-fAgyqM3eT6-0QlqWrngcM5BvBIIKQCMRyXfz9MI8fdg32Sq5Km-4MYLkR9MWZy0DPrwR0PT-SgvGhJvczKwKo05Os1T7Ab3uKaaST_9u1Vz6QEr2mUgLVJGPdOMpcZUQ91jl9OFPbEq7JmWI8rwJpRPy6C5MVOGkScplWFJlTdzH_Ro0iPnMVpVzJH7WVmN_1Kp_Ho2CXtfc_lvbuxHsvT-ximvqkBSG";
        
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
        var_dump($response);
        curl_close($curl);
    }

    public function ajaxloadinboxbyid(Request $request){
        $data = json_decode($request->data);
        $infor_user = $this->getZaloAccountById($data->recipient->id);
        $token = $this->getZaloById($data->recipient->id);
        $info = $this->getinfoUser($token[0]->access_token, $data->sender->id);

        if ($data->event_name == 'user_send_image' || $data->event_name == 'user_send_sticker') {
            $message = 'đã gửi tin nhắn ảnh';
        } else {
            $message = $data->message->text;
        }
        $html = '<div bt-type="inbox" data-mess="'.$data->sender->id.'_'.$data->recipient->id.'" bt-content-chat="" bt-content-id="'.$data->sender->id.'" bt-id-fanpage="'.$data->recipient->id.'" bt-id-profile="" class="bt-load-chat chuadoc '.$data->sender->id.'_'.$data->recipient->id.'" style=" position: relative;">
                    
                        <div class="bt-avatar-user-chat">
                            <img src="'.$info['avatar_user'].'" style=" position: absolute;">
                        </div>
                        <div class="bt-content-chat" onclick="loadchat(this)">
                            <div class="bt-info-chat">
                                <div class="bt-name-chat">'.$info['name_user'].'<i class="count_chuadoc" data="1">(1)</i></div>
                                <div class="bt-date-chat">'. date('d-m-Y H:i:s', (int)$data->timestamp).'</div>
                            </div>
                            <div class="bt-review-chat">
                                <p><span>'.$message.'</span></p>
                                <div class="pull-right">
                                    <i title="Tin nhắn" class="fa fa-comment"></i>
                                </div>
                            </div>
                        </div>
                        <div class="owl-page">
                            <img src="'.$infor_user[0]->image.'">
                            <span>'.$infor_user[0]->firstname.'</span>
                        </div>
                        <div class="owl-tag pull-right wrap-color">
                        <div class="tags-cons"><ul>
                        </ul>
                        </div>
                        </div>
                    
                </div>';
        echo $html;die;
        // $info = $this->getinfoUser($token[0]->access_token, $value['id_use']);

    }

    public function submitFormOA(Request $rq){
          if(Auth::user()){
                 $id= Auth::user()->id;
            }else{
                return redirect()->intended('/');
            }
     if($rq->idAcc == ''){
        return [
          'status' => 404,
           'message' => "Vui lòng chọn tài khoản User"
        ];
     }
        $idAcc = DB::table('users_business')->where('user_id',$id)->where('NguoiDungID',$rq->idAcc)->select('sid','Username')->get();
        
       foreach ($idAcc as $key => $value) {
           $sid = $value->sid;
           $user = $value->Username;
       }
       $birthday = date("d/m/Y", strtotime($rq->ngaysinh));  
        $json = '{
                  "user": "'.$user.'",
                  "sid": "'.$sid.'",
                  "group": "DatLichHen",
                  "action": "Add",
                  "service": "Zalo",
                  "cmd": "DatLichHen.Add",
                  "data": {
                    "IDLichHen": 0,
                    "TieuDe": "'.$rq->tieude.'",
                    "MaKhachHang": "'.$rq->makh.'",
                    "TenKhachHangDatHen": "'.$rq->tenkh.'",
                    "NgaySinh": "'.$birthday.'",
                    "MaGioiTinh": '.$rq->gioitinh.',
                    "MaTinhThanh": "'.$rq->tinh_tp.'",
                    "MaQuanHuyen": "'.$rq->quan_huyen.'",
                    "DiaChi": "'.$rq->diachi.'",
                    "SoDienThoai": "'.$rq->phone.'",
                    "Email": "'.$rq->email.'",
                    "BatDau": "'.$rq->dateTime.'",
                    "GhiChu": "'.$rq->ghichu.'",
                    "SoLuongKhach": '.$rq->number.',
                    "ListMaDichVuYeuCau": "",
                    "ListMaNhanVienYeuCau": "",
                    "IDPhongDichVu": "",
                    "IdNguonDen": "",
                    "IDNguonGioiThieu": "",
                    "TrangThai": 1,
                    "KhachHangID": 0,
                    "IDLoaiKH":26
                  },
                  "checksum": ""
                }';
       $params = [
           'user' =>$user,
           'sid' =>$sid,
           'TieuDe' =>$rq->tieude,
           'MaKhachHang' =>$rq->makh,
           'TenKhachHangDatHen' =>$rq->tenkh,
           'NgaySinh' =>$birthday,
           'MaTinhThanh' =>$rq->tinh_tp,
           'MaQuanHuyen' =>$rq->quan_huyen,
           'DiaChi' =>$rq->diachi,
           'SoDienThoai' =>$rq->phone,
           'Email' =>$rq->email,
           'BatDau' =>$rq->dateTime,
           'GhiChu' =>$rq->ghichu,
           'SoLuongKhach' =>$rq->number,
           'gioitinh' =>$rq->gioitinh
       ];
      $send = $this->sendApiFormOA($json);
      $check = json_decode($send);
      if($check->code == 1){
        $addReturn = $this->addReturnInforLichHen($check->data,$id);
        $check2 =json_decode(json_encode($addReturn,true));
        if($check2->status == 200){
            return [
               'status' => 200,
               'message' => "Thêm mới lịch hẹn thành công."
              ];
        }else{
            return [
               'status' => 404,
               'message' => "Đã xảy ra lỗi, phần thêm lịch hẹn trả về."
              ];
        }
        
      }else if($check->code == -15){
        $autologin = $this->loginAuto($params, $user, $id);
        return $autologin;
        // return [
        //   'status' => 404,
        //    'message' => "Vui lòng chọn tài khoản, hoặc đăng nhập lại"
        // ];
      }else{
        // var_dump($send);
        return [
          'status' => 404,
           'message' => "Đã xảy ra lỗi. Mã code: ".$check->code
        ];
      }
    }
    
    public function loginAuto($json_send, $user, $id){
         $data = DB::table('acc_business')->where('user_id',$id)->where('User',$user)->get();
         foreach ($data as $key => $value) {
            $User2 = $value->User;
            $pass = $value->Password;
            $macty = $value->MaCongTy;
            $domain = $value->Domain;
            $loaitk = $value->LoaiTaiKhoan;
         }
          $json = '{
                "User": "'.$User2.'",
                "Password": "'.$pass.'",
                "MaCongTy": "'.$macty.'",
                "Domain": "'.$domain.'",
                "LoaiTaiKhoan": "'.$loaitk.'"
                }';
        $checklogin  = $this->apiLoginDomain($json);

        $check = json_decode($checklogin);
         if($check->code == 1){
            $addInfor = $this->addInforUser($checklogin,$id);
            $dataUser = DB::table('users_business')->where('user_id',$id)->where('User',$user)->select('sid')->get();
            foreach ($dataUser as $key => $value) {
               $sidv2 = $value->sid;  ////note
            }
            $jsonv2 = '{
                  "user": "'.$json_send['user'].'",
                  "sid": "'.$sidv2.'",
                  "group": "DatLichHen",
                  "action": "Add",
                  "service": "Zalo",
                  "cmd": "DatLichHen.Add",
                  "data": {
                    "IDLichHen": 0,
                    "TieuDe": "'.$json_send['TieuDe'].'",
                    "MaKhachHang": "'.$json_send['MaKhachHang'].'",
                    "TenKhachHangDatHen": "'.$json_send['TenKhachHangDatHen'].'",
                    "NgaySinh": "'.$json_send['NgaySinh'].'",
                    "MaGioiTinh": '.$json_send['gioitinh'].',
                    "MaTinhThanh": "'.$json_send['MaTinhThanh'].'",
                    "MaQuanHuyen": "'.$json_send['MaQuanHuyen'].'",
                    "DiaChi": "'.$json_send['DiaChi'].'",
                    "SoDienThoai": "'.$json_send['SoDienThoai'].'",
                    "Email": "'.$json_send['Email'].'",
                    "BatDau": "'.$json_send['BatDau'].'",
                    "GhiChu": "'.$json_send['GhiChu'].'",
                    "SoLuongKhach": '.$json_send['SoLuongKhach'].',
                    "ListMaDichVuYeuCau": "",
                    "ListMaNhanVienYeuCau": "",
                    "IDPhongDichVu": "",
                    "IdNguonDen": "",
                    "IDNguonGioiThieu": "",
                    "TrangThai": 1,
                    "KhachHangID": 0,
                    "IDLoaiKH":26
                  },
                  "checksum": ""
                }';
            $send = $this->sendApiFormOA($jsonv2);

             $check_send = json_decode($send);

              if($check_send->code == 1){
                $addReturn = $this->addReturnInforLichHen($check->data,$id);
                $check2 =json_decode(json_encode($addReturn,true));
                 if($check2->status == 200){
                    return [
                       'status' => 200,
                       'message' => "Thêm mới lịch hẹn thành công."
                      ];
                }else{
                    return [
                       'status' => 404,
                       'message' => "Đã xảy ra lỗi, phần thêm lịch hẹn trả về."
                      ];
                }
              }else{
                return [
                       'status' => 404,
                       'message' => "Đã xảy ra lỗi, Vui lòng thử lại. Code:".$check_send->code
                      ];
              }

         }else{
            return [
              "status" => 404,
              "message" =>"Đã xảy ra lỗi, xin vui lòng thử lại!"
            ];
         }

    }

    static function addInforUser($checklogin,$id){
        $json = json_decode($checklogin);
        $decode  = json_decode(json_encode($json->data,true));
         $check = users_business::where('NguoiDungID',$decode->NguoiDungID)->where('user_id',$id)->first();
         if(isset($check)){
             $data = [
              'user_id' => $id,
              'sid' => $decode->sid,
              'Username' => $decode->Username,
              'NguoiDungID' => $decode->NguoiDungID,
              'UserPhongBanID' => $decode->UserPhongBanID,
              'TenPhongBan' => $decode->TenPhongBan,
              'AllID' => $decode->AllID,
              'IsCongTy' => $decode->IsCongTy,
              'IsChiNhanh' => $decode->IsChiNhanh,
              'Email' => $decode->Email,
              'SoDienThoai' => $decode->SoDienThoai,
              'Avartar' => $decode->Avartar,
              'UrlReportArb' => $decode->UrlReportArb
             ];
             $affected = DB::table('users_business')
              ->where('NguoiDungID', $decode->NguoiDungID)
              ->where('user_id', $id)
              ->update($data);
              
                return [
                          "status"=>200,
                           "message"=>"update thành công"
                        ];
              
              
            
         }else{

            $data2 = new users_business;
              $data2->user_id =$id;
              $data2->sid = $decode->sid;
              $data2->Username = $decode->Username;
              $data2->NguoiDungID = $decode->NguoiDungID;
              $data2->UserPhongBanID = $decode->UserPhongBanID;
              $data2->TenPhongBan = $decode->TenPhongBan;
              $data2->AllID = $decode->AllID;
              $data2->IsCongTy = $decode->IsCongTy;
              $data2->IsChiNhanh = $decode->IsChiNhanh;
              $data2->Email = $decode->Email;
              $data2->SoDienThoai = $decode->SoDienThoai;
              $data2->Avartar = $decode->Avartar;
              $data2->UrlReportArb = $decode->UrlReportArb;
              $data2->save();
              if($data2->id){
                return [
                          "status"=>200,
                           "message"=>"Thêm thành công"
                        ];
              }
         }
            

        
              
           
    }


    static function apiLoginDomain($json){
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://bvtm.drkhai.com/api/AppService/Login",
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

    static function sendApiFormOA($json){
          $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://bvtm.drkhai.com/api/AppService",
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

    static function addReturnInforLichHen($ob,$id){
        $value = json_decode(json_encode($ob,true));

              $data2 = new list_lichhen;
              $data2->user_id =$id;
              $data2->IDLichHen = $value->IDLichHen;
              $data2->TieuDe = $value->TieuDe;
              $data2->MaKhachHang = $value->MaKhachHang;
              $data2->TenKhachHangDatHen = $value->TenKhachHangDatHen;
              $data2->NgaySinh = $value->NgaySinh;
              $data2->MaGioiTinh =$value->MaGioiTinh;
              $data2->MaTinhThanh = $value->MaTinhThanh;
              $data2->MaQuanHuyen = $value->MaQuanHuyen;
              $data2->MaXa = $value->MaXa;
              $data2->DiaChi = $value->DiaChi;
              $data2->SoDienThoai = $value->SoDienThoai;
              $data2->Email = $value->Email;
              $data2->BatDau = $value->BatDau;
              $data2->KetThuc = $value->KetThuc;
              $data2->GhiChu = $value->GhiChu;
              $data2->SoLuongKhach = $value->SoLuongKhach;
              $data2->ListMaDichVuYeuCau = $value->ListMaDichVuYeuCau;
              $data2->IDPhongDichVu = $value->IDPhongDichVu;
              $data2->IdNguonDen = $value->IdNguonDen;
              $data2->IDNguonGioiThieu = $value->IDNguonGioiThieu;
              $data2->TrangThai = $value->TrangThai;
              $data2->NguoiDungID = $value->NguoiDungID;
              $data2->IDPhongBan = $value->IDPhongBan;
              $data2->CongTyID = $value->CongTyID;
              $data2->Sysdate = $value->Sysdate;
              $data2->DateModified = $value->DateModified;
              $data2->MaHoSoLichHen = $value->MaHoSoLichHen;
              $data2->save();
              if($data2->id){
                return [
                   'status' =>200,
                   'message' => "Thêm mới Lịch hẹn trả về thành công."
                ];
              }

    }

    public function getDataById(Request $rq){
       $data = DB::table('list_lichhen')->where('id',$rq->id)->get();
       foreach ($data as $key => $value) {
           $send = [
              'TieuDe' => $value->TieuDe,
              'TenKH' => $value->TenKhachHangDatHen,
              'NgaySinh' => $value->NgaySinh,
              'DiaChi'  => $value->DiaChi,
              'Phone'  => $value->SoDienThoai,
              'Email'  => $value->Email,
              'GhiChu' => $value->GhiChu,
              'SoLuongKhach' => $value->SoLuongKhach,
              'ThoiGianHen' => $value->BatDau,
              'NguoiDungID' => $value->NguoiDungID,
              'MaTinhThanh' => $value->MaTinhThanh,
              'MaQuanHuyen' => $value->MaQuanHuyen,
              'IDLichHen' => $value->IDLichHen,
              'gioitinh' => $value->MaGioiTinh
            ];
           
       }
        return[
               'status' => 200,
               'data' => $send
            ];
    }

    public function submitEditForm(Request $rq){
        if(Auth::user()){
             $id= Auth::user()->id;
        }else{
            return redirect()->intended('/');
        }
        $data = DB::table('users_business')->where('user_id',$id)->where('NguoiDungID',$rq->NguoiDungID)->select('Username','sid')->get();
        
         foreach ($data as $key => $value) {
             $Username = $value->Username;
             $sid = $value->sid;
         }

         $json = '{
                  "user": "'.$Username.'",
                  "sid": "'.$sid.'",
                  "group": "DatLichHen",
                  "action": "Edit",
                  "service": "Zalo",
                  "cmd": "DatLichHen.Add",
                  "data": {
                    "IDLichHen": '.$rq->IDLichHen.',
                    "TieuDe": "'.$rq->tieude.'",
                    "MaKhachHang": "'.$rq->makh.'",
                    "TenKhachHangDatHen": "'.$rq->tenkh.'",
                    "NgaySinh": "'.$rq->ngaysinh.'",
                    "MaGioiTinh": '.$rq->gioitinh.',
                    "MaTinhThanh": "'.$rq->tinh_tp.'",
                    "MaQuanHuyen": "'.$rq->quan_huyen.'",
                    "DiaChi": "'.$rq->diachi.'",
                    "SoDienThoai": "'.$rq->phone.'",
                    "Email": "'.$rq->email.'",
                    "BatDau": "'.$rq->dateTime.'",
                    "GhiChu": "'.$rq->ghichu.'",
                    "SoLuongKhach": '.$rq->number.',
                    "ListMaDichVuYeuCau": "",
                    "ListMaNhanVienYeuCau": "",
                    "IDPhongDichVu": "",
                    "IdNguonDen": "",
                    "IDNguonGioiThieu": "",
                    "TrangThai": 1,
                    "KhachHangID": 0,
                    "IDLoaiKH":26
                  },
                  "checksum": ""
                }';
        $check = $this->sendApiFormOA($json);
       //var_dump($json);die();
        $check = json_decode($check);
        if($check->code == 1){
            $param = [
               'IDLichHen'=>$rq->IDLichHen,
               'TieuDe'   => $rq->tieude,
               'MaKhachHang' => $rq->makh,
               'TenKhachHangDatHen' => $rq->tenkh,
               'NgaySinh' => $rq->ngaysinh,
               'MaGioiTinh' => 1,
               'MaTinhThanh' => $rq->tinh_tp,
               'MaQuanHuyen' => $rq->quan_huyen,
               'DiaChi' => $rq->diachi,
               'SoDienThoai' => $rq->phone,
               'Email' => $rq->email,
               'BatDau' => $rq->dateTime,
               'GhiChu' => $rq->ghichu,
               'SoLuongKhach' => $rq->number,
               'id' => $id

            ];
            $update = $this->updateLichHen($param);
            return [
               'status' =>200,
               'message' => 'Cập nhật lịch hẹn thành công.'
            ];
        }else{

            return [
              'status' => 404,
              'message' => 'Đã xảy ra lỗi, vui lòng thử lại sau. code: ' .$check->code
            ];
        }

    }

    static function updateLichHen($param){
        $data = [
          'IDLichHen' => $param['IDLichHen'],
          'TieuDe' => $param['TieuDe'],
          'MaKhachHang' => $param['MaKhachHang'],
          'TenKhachHangDatHen' => $param['TenKhachHangDatHen'],
          'NgaySinh' => $param['NgaySinh'],
          'MaGioiTinh' => $param['MaGioiTinh'],
          'MaTinhThanh' => $param['MaTinhThanh'],
          'MaQuanHuyen' => $param['MaQuanHuyen'],
          'DiaChi' => $param['DiaChi'],
          'SoDienThoai' => $param['SoDienThoai'],
          'Email' => $param['Email'],
          'BatDau' => $param['BatDau'],
          'GhiChu' => $param['GhiChu'],
          'SoLuongKhach' => $param['SoLuongKhach']
        ];
         $affected = DB::table('list_lichhen')
              ->where('IDLichHen', $param['IDLichHen'])
              ->where('user_id', $param['id'])
              ->update($data);
        return [
         'status' => 200,
         'message' => 'Cập nhật lịch hẹn thành công.'
        ];
    }

    public function getListLichHen(Request $rq){
        if(Auth::user()){
             $id= Auth::user()->id;
        }else{
            return redirect()->intended('/');
        }
       $data = DB::table('list_lichhen')->where('user_id',$id)->orderBy('id','desc')->get();
       return $data;

    }

    public function del_lichhen(Request $rq){
          if(Auth::user()){
                 $id= Auth::user()->id;
            }else{
                return redirect()->intended('/');
            }
       $account = list_lichhen::where('user_id',$id)->where('id',$rq->id)->delete();
       return [
          'status' =>200,
          'message' =>' Xóa lịch hẹn thành công.'
       ];
    }





}
