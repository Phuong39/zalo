<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use DB;
use App\Models\data_post_send;
class ProcessPostZalo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $zaloid ;
    protected $content ;
    protected $type ;
    protected $token ;
    protected $postid ;
    protected $link ;
    protected $check_page;
    protected $accessToken;
    protected $image;
    protected $mieuta;
    protected $tacgia;
    protected $title;
    protected $video;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($content, $type, $zaloid,$token,$postid,$link,$image,$mieuta,$tacgia,$title,$video)
    {

        $this->zaloid = $zaloid;
        $this->type = $type;
        $this->content = $content;
        $this->token = $token;
        $this->postid = $postid;
        $this->link = $link;
        $this->image = $image;
        $this->mieuta = $mieuta;
        $this->tacgia = $tacgia;
        $this->title = $title;
        $this->video = $video;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //dd($this->zaloid);
        //var_dump($this->content);die();
        $dataResponse = $this->sendPostApiByType($this->content, $this->type, $this->zaloid, $this->token,$this->postid, $this->link,$this->image,$this->mieuta,$this->tacgia,$this->title,$this->video);
         

    }
        public function sendPostApiByType($content, $type, $zaloid, $token,$postid, $link,$image,$mieuta,$tacgia,$title,$video){
            
             $checkToken = $this->checkRequestTokenViaApiApp($token);

           if($checkToken == true){
                  if($type == 'message'){
                     if($zaloid == '' || $type == '' || $content == ''){
                              return [
                                        'status'  => 404,
                                        'message' => 'Đã có lỗi xảy ra, Vui lòng thử lại',
                                    ];
                        }else{

                           $node = $zaloid;
                           $params['message'] = $content;
                           $result = $this->post($node,$params,$type); //object(stdClass)#394 (2) { ["error"]=> int(12010) ["message"]=> string(44) "Quota daily per user for your app is limited" }
                          // var_dump($result->message);die();
                           if(!empty($result->error)){
                              if ($result->error == 10000) {

                                $affected = DB::table('data_posts_send')
                                  ->where('id', $postid)
                                  ->update(['status_post' => 1]);

                              }else if ($result->error == 12010) {
                               $affected =data_post_send::where('id', $postid)->first();

                                 $affected->status_post = 2;
                                $affected->error = "Tài khoản đăng quá giới hạn trong 1 ngày!!";
                                $affected->update();
                                 

                              } else {
                                $affected = DB::table('data_posts_send')
                                  ->where('id', $postid)
                                  ->update(['status_post' => 2]);
                              }
                                  
                            }
                         
                          
                        }
                      
                   }else if($type == 'link'){
                       if($zaloid == '' || $type == '' || $link == ''){
                              return [
                                        'status'  => 404,
                                        'message' => 'Đã có lỗi xảy ra, Vui lòng thử lại',
                                    ];
                        }else{
                           
                            $node = $zaloid;
                            $params['message'] = $content;
                            $params['link'] = $link;

                           $result = $this->post($node,$params,$type);

                           if(!empty($result->error)){
                              if ($result->error == 10000) {

                                $affected = DB::table('data_posts_send')
                                  ->where('id', $postid)
                                  ->update(['status_post' => 1]);

                              }else if ($result->error == 12010) {
                               $affected =data_post_send::where('id', $postid)->first();

                                 $affected->status_post = 2;
                                $affected->error = "Tài khoản đăng quá giới hạn trong 1 ngày!!";
                                $affected->update();
                                 

                              } else {
                                $affected = DB::table('data_posts_send')
                                  ->where('id', $postid)
                                  ->update(['status_post' => 2]);
                              }
                                  
                            }


                        }
                      
                   }else if($type == 'image'){
                         
                        if($zaloid == '' || $type == '' || $image == ''){
                              return [
                                        'status'  => 404,
                                        'message' => 'Đã có lỗi xảy ra, Vui lòng thử lại',
                                    ];
                        }else{
                           
                            $node = $zaloid;
                            $params['message'] = $content;
                            $params['url'] = $image;
                            $params['mieuta'] = $mieuta;
                            $params['tacgia'] = $tacgia;
                            $params['tieude'] = $title;
                          
                           $result = $this->post($node,$params,$type);
                            
                           if(empty($result->error)){
                              
                            if ($result->error == 0) {
                             
                                 
                               $affected = DB::table('data_posts_send')
                                  ->where('id', $postid)
                                  ->update(['status_post' => 1]);
                                                
                            }else{
                              $affected = DB::table('data_posts_send')
                                  ->where('id', $postid)
                                  ->update(['status_post' => 2]);
                            }
                            
                                
                          }

                        }
                   }else if($type == "video"){
                     if($zaloid == '' || $type == '' || $video == ''){
                              return [
                                        'status'  => 404,
                                        'message' => 'Đã có lỗi xảy ra, Vui lòng thử lại',
                                    ];
                        }else{
                           
                            $node = $zaloid;
                            $params['message'] = $content;
                            $params['file_url'] = $video;
                            $params['mieuta'] = $mieuta;
                            $params['tacgia'] = $tacgia;
                            $params['tieude'] = $title;
                          
                           $result = $this->post($node,$params,$type);
                           
                           if(empty($result->error)){

                              
                            if ($result->error == 0) {
                             
                                 
                               $affected = DB::table('data_posts_send')
                                  ->where('id', $postid)
                                  ->update(['status_post' => 1]);
                                                
                            }else{
                              $affected = DB::table('data_posts_send')
                                  ->where('id', $postid)
                                  ->update(['status_post' => 2]);
                            }
                            
                                
                          }

                        }
                   }
                   
                   return $result;
                
           }
    }

    public function post($node,$params,$type){
    
      
        $res = DB::table('zalo_accounts')->join('user_zaloapp', 'zalo_accounts.zalo_id', '=', 'user_zaloapp.zalo_id')->where('zalo_accounts.zalo_id', $node)->get();
      
         foreach($res as $row){
            $this->check_page = $row->page;
            $this->accessToken = $row->access_token;
         }
          
        if ($this->check_page == 0) {
 
            if ($type == 'message' || $type == 'link') {

               $data = $this->postMe($node,$params,$type,$this->accessToken);
               //var_dump($data);die();
            }
            
        } else {
            
            if ($type == 'image' || $type == 'video') {
                $data = $this->postFanpage($node,$params,$type,$this->accessToken);
                
            }
        }
      
       return $data;
    }

     public function postMe($node,$params,$postType,$accessToken){

      // var_dump("<pre>");
      //    var_dump("note:".$node);
      //    var_dump("params:".$params['message']);
      //    var_dump("postType:".$postType);
      //    var_dump("accessToken:".$accessToken);die();
         //var_dump($accessToken);die();
        $accessToken = $this->getAccessToken($accessToken);

        //var_dump($accessToken);die();
        if ($postType == 'message') {
            //var_dump($postType);die();
            $pre = "access_token=".$accessToken."&message=".$params['message']."";
            //var_dump($pre);die();
        } else if($postType == 'link'){

            $pre = "access_token=".$accessToken."&message=".$params['message']."&link=".$params['link']."";
        }
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
          //CURLOPT_URL => "https://openapi.zalo.me/v2.0/me/feed",
          CURLOPT_URL => "https://graph.zalo.me/v2.0/me/feed",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $pre,
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded"
          ),
        ));

        $response = json_decode(curl_exec($curl));
        //var_dump($response);die();
        curl_close($curl);
        // if (isset($response->error)) {
        //     return null;
        // }
        return $response;
    }
  public function postFanpage($node,$params,$postType,$accessToken){
    
      
        for ($i=0; $i <count($params['message']) ; $i++) { 
             $array[$i] = array (
                  'type' => 'text',
                  'content' => ''.urldecode($params['message'][$i]).''
                );
        }

        if (isset($params['url'])) {
            $params['source'] = $params['url'];
        }
        //var_dump($postType);die();
        if ($postType == 'image') {
            $array = array (
              'type' => 'normal',
              'title' => urldecode($params['tieude']),
              'author' => ''.urldecode($params['tacgia']).'',
              'cover' => 
              array (
                'cover_type' => 'photo',
                'photo_url' => ''.urldecode($params['source']).'',
                'status' => 'show'
              ),
              'description' => ''.urldecode($params['mieuta']).'',
              'body' => $array,
              'status' => 'show',
              'comment' => 'show'
            );
            //var_dump($array);die();
            $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://openapi.zalo.me/v2.0/article/create?access_token=".$accessToken."",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => json_encode($array),
              CURLOPT_HTTPHEADER => array(
                "content-type: application/json"
              ),
            ));
            $response = curl_exec($curl);
            



            curl_close($curl);
        } else {
         // var_dump($params['tieude']);die();
             $id_video = $this->uploadvideo($params['file_url'],$accessToken);

             for ($i=0; $i <count($params['message']) ; $i++) { 
             $array[$i] = array (
                    'type' => 'text',
                    'content' => ''.urldecode($params['message'][$i]).''
                  );
               }
            $array = array (
              'type' => 'normal',
              'title' => urldecode($params['tieude']),
              'author' => '',
              'cover' => 
              array (
                'cover_type' => 'video',
                'cover_view' => 'horizontal',
                'video_id' => '' .$id_video.'',
                'status' => 'show',
              ),
              'description' => urldecode($params['mieuta']),
              'body' => $array,
              'status' => 'show',
              'comment' => 'show',
            );
            
            sleep(3);
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://openapi.zalo.me/v2.0/article/create?access_token=".$accessToken,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => json_encode($array),
              CURLOPT_HTTPHEADER => array(
                "content-type: application/json"
              ),
            ));
            $response = curl_exec($curl);

            $result = json_decode($response);
            
            curl_close($curl);
            
            if ($result->error = '-201') {
                $response = $this->upvideoasall($array,$accessToken);
             return $response;
            }
            
        }
        return json_decode($response);
       

          //var_dump($response);die();

    }
    public function upvideoasall($data,$accessToken){
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://openapi.zalo.me/v2.0/article/create?access_token=".$accessToken,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 60,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => array(
          "content-type: application/json"
        ),
      ));
      $response = json_decode(curl_exec($curl));
      curl_close($curl);
      if ($response->error== '-201') {
          $this->upvideoasall($data,$accessToken);
      } else{
        return $response;
      }
       return $response;

    }

public function uploadvideo($url, $token){
      //var_dump($url);die();
        $files = array();
        $file_end = urldecode($url);
        $files = array();
        $files["file"] = file_get_contents($file_end);
      


        $boundary = uniqid();
        $delimiter = '-------------' . $boundary;
        $data = '';
        $eol = "\r\n";

        $delimiter = '-------------' . $boundary;


        foreach ($files as $name => $content) {
            $data .= "--" . $delimiter . $eol
                . 'Content-Disposition: form-data; name="' . $name . '"; filename="' . $name . '"' . $eol
                . 'Content-Type: video/mp4'.$eol
                . 'Content-Transfer-Encoding: binary'.$eol
                ;

            $data .= $eol;
            $data .= $content . $eol;
        }
        $data .= "--" . $delimiter . "--".$eol;
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://openapi.zalo.me/v2.0/article/upload_video/preparevideo?access_token=".$token,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $data,
          CURLOPT_HTTPHEADER => array(
            "content-type: multipart/form-data; boundary=".$delimiter.""
          )
        ));
        $response = curl_exec($curl);
        curl_close($curl);
         // if ($dir_file == false) {
         //    unlink($file_end);
         // }
        //var_dump($response);die();
        if ($response !== false) {
            $id_video = $this->getIdVideo(json_decode($response)->data->token, $token);
            return $id_video;
        }
    }

     public function getIdVideo($token, $access_token){
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://openapi.zalo.me/v2.0/article/upload_video/verify?access_token=".$access_token."&token=".$token."",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_POSTFIELDS => "",
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response)->data->video_id;
    }

    public function getAccessToken($accessToken){

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://oauth.zaloapp.com/v3/access_token?app_id=4078878391981186695&app_secret=UbO88o896pP22HaNQE5O&code=".$accessToken."",
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

     public static function checkRequestTokenViaApiApp($token){
        $checkUser = DB::table('vp_users')->where('remember_token',$token)->count();
        if($checkUser > 0){
            return true;
        }
        return false;
    }

}
