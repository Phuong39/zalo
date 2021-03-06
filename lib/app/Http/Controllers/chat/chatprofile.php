<?php

namespace App\Http\Controllers\chat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Models\chatlog_model;
use App\Models\mess_sample;
use App\Models\datafriend;
use App\Models\datagroupzalo;
use App\Models\Category;

class chatprofile extends Controller
{
	protected $status;
	protected $userid;
    protected $role_profile;
    protected $dataarr;

    public function getchatProfile(){
         if(Auth::user()){
         	$id= Auth::user()->id;
         }else{
         	return redirect()->intended('/');
         }

         $twigData['admin'] = DB::table('vp_users')->where('id',$id)->get();
         foreach ($twigData['admin'] as $key => $value) {
         	$userid = $value->userid;
         	$status = $value->status;
            $role_profile = json_decode($value->role_profile);
         }
      $twigData['role_profile'] = $role_profile;
      $twigData['status'] = $status;
      if($status !=1){
        $data= array();

         $data = DB::table('zalo_accounts')->join('user_zaloapp', 'user_zaloapp.zalo_id', '=' , 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$id)->where('zalo_accounts.user_id',$id)->where('zalo_accounts.page',0)->where('user_zaloapp.page',0)->get();
        $twigData['catelist'] = Category::where('user_id',$id)->get();
      }else{
      	$data= array();
         $data = DB::table('zalo_accounts')->join('user_zaloapp', 'user_zaloapp.zalo_id', '=' , 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$userid)->where('zalo_accounts.user_id',$userid)->where('zalo_accounts.page',0)->where('user_zaloapp.page',0)->get(); 
         $twigData['catelist'] = Category::where('user_id',$userid)->get();  
      }
         

          $twigData['account'] = $data;
          $twigData['mess_sample'] = DB::table('mess_sample')->where('user_id',$id)->where('page',0)->get();

          
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
		$array = json_decode(json_encode($twigData['account']),true);
        $twigData['accountv2'] = array_chunk($array, 5);

    	return view('chat.chatprofile',$twigData);

    }

    public function getchatProfile_test(){
         if(Auth::user()){
         	$id= Auth::user()->id;
         }else{
         	return redirect()->intended('/');
         }

         $twigData['admin'] = DB::table('vp_users')->where('id',$id)->get();
         foreach ($twigData['admin'] as $key => $value) {
         	$userid = $value->userid;
         	$status = $value->status;
            $role_profile = json_decode($value->role_profile);
         }
      $twigData['role_profile'] = $role_profile;
      $twigData['status'] = $status;
      if($status !=1){
        $data= array();

         $data = DB::table('zalo_accounts')->join('user_zaloapp', 'user_zaloapp.zalo_id', '=' , 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$id)->where('zalo_accounts.user_id',$id)->where('zalo_accounts.page',0)->where('user_zaloapp.page',0)->get();
         $twigData['catelist'] = Category::where('user_id',$id)->get();
      }else{
      	$data= array();

         $data = DB::table('zalo_accounts')->join('user_zaloapp', 'user_zaloapp.zalo_id', '=' , 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$userid)->where('zalo_accounts.user_id',$userid)->where('zalo_accounts.page',0)->where('user_zaloapp.page',0)->get(); 
         $twigData['catelist'] = Category::where('user_id',$userid)->get();     
      }
         

          $twigData['account'] = $data;
          $twigData['mess_sample'] = DB::table('mess_sample')->where('user_id',$id)->where('page',0)->get();

          
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
        $array = json_decode(json_encode($twigData['account']),true);
        $twigData['accountv2'] = array_chunk($array, 5);
         // for($i=0; $i<count($twigData['accountv2']); $i++){
         //     for($j=0; $j<count($twigData['accountv2'][$i]); $j++){
         //     	for($k=0; $k<count($twigData['accountv2'][$j]);$k++){
         //     		dd($twigData['accountv2'][$j][$k]['zalo_id']);
         //     	}
         //     }
            	      
         // }
             
        	   
        	   
        	
        //dd($twigData['accountv2']);die();
    	return view('chat.chatprofile_test',$twigData);

    }

 public function getdatamess(Request $request){
 	 if(Auth::user()){
         	$id= Auth::user()->id;
         }else{
         	return redirect()->intended('/');
         }
     $data = DB::table('mess_sample')->where('user_id',$id)->where('id',$request->id)->value('content');
    if(!empty($data)){
    	$result= array(
					'status' => 200,
					'data' => $data
				);
				return response()->json($result);
			}
 }
 public function deletemess(Request $request){
   $data = mess_sample::where('id',$request->id)->delete();
   return response()->json([
                    'status'  => 200,
                    'message' => 'X??a th??nh c??ng',
                ]);
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

	public function postimage(Request $request){

		//$data =array();
		$data = json_decode($request->data);
		$fields = array();
		$files = array();
       
		$files["chunkContent"] = file_get_contents($data->url_image);
      
		$boundary = uniqid();
		$delimiter = '-------------' . $boundary;
		$post_data = $this->build_data_files($boundary, $fields, $files,$data->filename);
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://files-wpa.chat.zalo.me/api/message/photo_original/upload?zpw_ver=42&zpw_type=30&params=".urlencode($data->encrypted)."&type=2",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $post_data,
		  CURLOPT_HTTPHEADER => array(
		    "content-type: multipart/form-data; boundary=".$delimiter."",
		    "cookie: ".$data->cookie."",
		    "user-agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36"
		  ),
		));

		$response = curl_exec($curl);
//var_dump($response);die();
		curl_close($curl);
		return $response;
	}

public function postimagechiendich(Request $request){

		//$data =array();

		//$data = json_decode($request->data);
		$fields = array();
		$files = array();
      
		$files["chunkContent"] = file_get_contents($request->url_image);

		$boundary = uniqid();
		$delimiter = '-------------' . $boundary;
		$post_data = $this->build_data_files($boundary, $fields, $files,$request->filename);

		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://files-wpa.chat.zalo.me/api/message/photo_original/upload?zpw_ver=42&zpw_type=30&params=".urlencode($request->encrypted)."&type=2",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $post_data,
		  CURLOPT_HTTPHEADER => array(
		    "content-type: multipart/form-data; boundary=".$delimiter."",
		    "cookie: ".$request->cookie."",
		    "user-agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return $response;
	}

	public function build_data_files($boundary, $fields, $files,$tenfile){
		$data = '';
		$eol = "\r\n";

		$delimiter = '-------------' . $boundary;

		foreach ($fields as $name => $content) {
			$data .= "--" . $delimiter . $eol
			. 'Content-Disposition: form-data; name="' . $name . "\"".$eol.$eol
			. $content . $eol;
		}


		foreach ($files as $name => $content) {
			$data .= "--" . $delimiter . $eol
			. 'Content-Disposition: form-data; name="' . $name . '"; filename="'.$tenfile.'"' . $eol
	            //. 'Content-Type: image/png'.$eol
			. 'Content-Transfer-Encoding: binary'.$eol
			;

			$data .= $eol;
			$data .= $content . $eol;
		}
		$data .= "--" . $delimiter . "--".$eol;


		return $data;
	}

	public function postimagezalo(Request $request){
		$encrypted = $request->encrypted;
		$cookie = $request->cookie;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://files-wpa.chat.zalo.me/api/message/photo_original/send?zpw_ver=42&zpw_type=30&nretry=0",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "params=".urlencode($encrypted),
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/x-www-form-urlencoded",
		    "cookie: ".$cookie."",
		    "user-agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36"
		  ),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		die($response);
	}
		public function savemess(Request $request){
			if(Auth::user()){
				$userid= Auth::user()->id;
			}else{
				 return redirect()->intended('/');
			}
		    $id_khach = $request->id_khach;
		    $id_profile = $request->id_profile;
		    $is_group = $request->is_group;
		    $type = $request->type;
		    
            $savemessage = new chatlog_model;
		        $savemessage->id_khach = $id_khach;
		        $savemessage->type  = $type;
		        $savemessage->id_profile  = $id_profile;
		        $savemessage->user_id  = $userid;

		        $savemessage->save();

		  }
       
   //     public function inboxpopup(Request $request){
   //        $id_user = $request->id_user;
		 //  $id_profile = $request->id_profile;
		 //  $name_user = $request->name_user;
		 // $image_user = $request->image_user;
		 // $isgroup = $request->isgroup;
		 // $contentmess = $request->contentmess;
		 // $twigData['id_user'] = $id_user;
		 // $twigData['id_profile'] = $id_profile;
		 // $twigData['name_user'] = $name_user;
		 // $twigData['image_user'] = $image_user;
		 // $twigData['isgroup'] = $isgroup;
		 // $twigData['contentmess'] = $contentmess;

   //     }
       public function inboxpopup(Request $request){
		$id_user = $request->id_user;
		  $id_profile = $request->id_profile;
		  $name_user = $request->name_user;
		 $image_user = $request->image_user;
		// var_dump($id_user);die();
		 $isgroup = $request->isgroup;
		 $contentmess = $request->contentmess;
		

		$html = '';
		$html .= '<div class="dragdropchat_'.$id_user.' indexdragdropchat" style="border-radius: 10px 10px 0px 0px;bottom: 0px;position: fixed;z-index: 9999;box-shadow:rgba(0, 0, 0, 0.26) 0px 2px 5px 0px;width: 285px;height: auto;background-color: #fff; right: 15px;">

	<div style="border-radius: 10px 10px 0px 0px;" class="headpopup-'.$id_user.' bt-popup-mess-title">

		<div class="namepopup col-lg-9">
			<span class="avartar avartar-'.$id_user.'">
				<img src="'.$image_user.'">
			</span>
			<a class="name-'.$id_user.'" style="color: #fff;">'.$name_user.'</a>
		</div>

		<div class="col-lg-3 pull-right" style="text-align: right;">
			<a href="javascript:void(0)" style="margin-right: 5px;display: none;">
				<i class="bt-minimize-popup-'.$id_user.' fa-chevron-up fa"></i>
			</a>
			<a class="bt-close-popup" onClick="closePopup('.$id_user.')"  href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" title="T???t">
				<i class="fa fa-times"></i>
			</a>
		</div>
	</div>

	<div class="contentpopup contentpopup-'.$id_user.'">
		<div class="col-md-12 bt-messeges-top-bar-'.$id_user.' bt-pop-mess-top-bar" style="display: none;">
			<div class="pull-left">
				<a class="bt-back-mobile" href="javascript:void(0)" title="">
					<i class="fa fa-arrow-left"></i>
				</a>
				<a class="bt-infoib-mobile" href="javascript:void(0)" title="">
					<i class="fa fa-info-circle"></i>
				</a>
			</div>
			<div class="pull-right">
				<a class="bt-get-link-post-'.$id_user.'" target="_blank" href="https://www.facebook.com/2255725054445227/inbox/'.$id_user.'" data-toggle="tooltip" data-placement="bottom" title="Link facebook">
					<i class="fa fa-facebook-square"></i>
				</a>
				<a class="bt-scroll-top-chat-'.$id_user.'" href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" title="Scroll to top">
					<i class="fa fa-arrow-circle-up"></i>
				</a>
			</div>
		</div>
		<input type="hidden" id="bt_content_post" value="">
		<input type="hidden" id="arr_image_post" value="">
		<div class="col-md-12 bt-chat-messeges-box bt-chat-messeges-box-'.$id_user.'">
			<div class="row">
				<div class="col-md-12 bt-load-inbox" style="height: 200px;">
					<input type="hidden" id="id_user-'.$id_user.'" name="" value="'.$id_user.'">
					<input type="hidden" id="id_profile-'.$id_user.'" name="" value="'.$id_profile.'">
					<input type="hidden" id="isgroup-'.$id_user.'" name="" value="'.$isgroup.'">
					<input type="hidden" class="numberlimitchat-'.$id_user.'" name="" value="20">
					<div class="bt-load-inbox-content bt-load-inbox-content-'.$id_user.'">

					</div>
				</div>
			</div>
		</div>
		<div style="float: left;width: 100%;" class="bt-inbox-reply">
			<div style="float: left;width: 100%;min-height: 32px;max-height: 75px;overflow: auto;background-color: #eee;display: none;" class="repyly-bar">
				<div class="reply-msg-bar-'.$id_user.'">
				</div>
			</div>
			<div style="float: left;width: 99%;" class="bt-inbox-reply-content">
				<textarea name="" class="bt-make-input-'.$id_user.' popup-input-make-file"></textarea>
			</div>
			<div style="float: left;width: 100%;padding: 0px 10px;padding-bottom: 5px;" class="bt-submit-reply-'.$id_user.'">
				<div style="margin: 0px;" class="bt-make-file pull-left">
					<div class="bt-submit-reply-'.$id_user.'">
						<div class="bt-make-file pull-left" data-toggle="tooltip" data-placement="top" title="L??i">
							<a class="bt-back-mobile bt-not" href="javascript:void(0)" title="">
								<i class="fa fa-arrow-left"></i>
							</a>
						</div>
						<div class="bt-make-file pull-left" data-toggle="tooltip" data-placement="top" title="Tin nh???n m???u" style="display: none;">
							<i style="color: #BEC3C9;" class="bt-open-temp-chat-'.$id_user.' fa fa-commenting-o" aria-hidden="true"></i>
							<div class="bt-drop-chattemp" style="min-width: 200px;">
								<div class="title-drop">
									<a><span>Tin nh???n m???u</span></a>
								</div>
								<ul class="bt-content-drop">
								</ul>
							</div>
						</div>
						<div class="bt-make-file pull-left" data-toggle="tooltip" data-placement="top" title="G???i ???nh">
							<i style="color: #BEC3C9;" id="bt-get-input-file-'.$id_user.'" class="fa fa-picture-o mediaLibraryImage-'.$id_user.'" aria-hidden="true"></i>
							<div id="standalone"></div>
						</div>
					</div>
				</div>
				<a class="pull-right bt-send-message" title=""><i style="color: #BEC3C9;" class="fa fa-paper-plane" aria-hidden="true"></i></a>
			</div>
		</div>
	</div>';
	 echo $html;die;

	}
public function postfile(Request $request){
        $params = $request->params;
        $filename = $request->filename;

        $fields = array();
        $files = array();
        $files["chunkContent"] = file_get_contents($request->url_file);
        //dd($files["chunkContent"]);

        $boundary = uniqid();
        $delimiter = '-------------' . $boundary;
        $post_data = $this->build_data_files($boundary, $fields, $files,$filename);
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://files-wpa.chat.zalo.me/api/message/asyncfile/upload?zpw_ver=42&zpw_type=30&params=".urlencode($params)."&type=2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $post_data,
            CURLOPT_HTTPHEADER => array(
                "content-type: multipart/form-data; boundary=".$delimiter."",
                "cookie: ".$request->cookie."",
                "user-agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        die($response);
}

public function sendfile(Request $request){
     $encrypted = $request->param;

		$cookie = $request->cookie;
		
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://files-wpa.chat.zalo.me/api/message/asyncfile/msg?zpw_ver=49&zpw_type=30&nretry=0",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "params=".urlencode($encrypted),
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/x-www-form-urlencoded",
		    "cookie: ".$cookie."",
		    "user-agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36"
		  ),
		));
		$response = curl_exec($curl);
		
		curl_close($curl);
		die($response);
}

public function newmesssample(Request $request){
	   if(Auth::user()){
         	$userid= Auth::user()->id;
         }else{
         	return redirect()->intended('/');
         }
        $message = new mess_sample;
        $message->content = $request->message;
        $message->title  = $request->title;
        $message->user_id  = $userid;
        $message->page = 0;
        $message->save();
        //var_dump($message->id);die();

        if(isset($message)){
            return [
                'status'  => 200,
                'message' => 'Th??m m???i tin nh???n m???u th??nh c??ng',
                'id' => $message->id,
            ];
        }
            return [
                'status'  => 404,
                'message' => '???? c?? l???i x???y ra, Vui l??ng th??? l???i',
            ];
}

public function dongboGroup(Request $request){
     if(Auth::user()){
         	$userid= Auth::user()->id;
         }else{
         	return redirect()->intended('/');
         }
         $check = datafriend::where('user_id',$userid)->where('zalo_id',$request->zaloid)->first();
         if(!empty($check)){
         	$delete = datafriend::where('zalo_id',$request->zaloid)->delete();
         	$data = new datafriend;
	        $data->user_id = $userid;
	        $data->zalo_id  = $request->zaloid;
	        $data->data  = json_encode($request->datafrined);
	        $data->save();
	        
	        	return [
	        		'status'  => 200,
                     'message' => 'update th??nh c??ng!'
	        	];
	       
         }else{
         	   $data = new datafriend;
		        $data->user_id = $userid;
		        $data->zalo_id  = $request->zaloid;
		        $data->data  = json_encode($request->datafrined);
		        $data->save();
		        if($data->id){
		        	return [
		        		'status'  => 200,
	                     'message' => 'Th??m th??nh c??ng!'
		        	];
	        }
         }
       


}

public function getdatafriend(Request $request){
	 if(Auth::user()){
         	$id= Auth::user()->id;
         }else{
         	return redirect()->intended('/');
         }
	   $arr = $request->arr_select;
	   $data =  datafriend::where('user_id',$id)->whereIn('zalo_id', $arr)->get();
	   
	   return $data;
}

public function getdatagroup(Request $request){
	 if(Auth::user()){
         	$id= Auth::user()->id;
         }else{
         	return redirect()->intended('/');
         }
	   $arr = $request->arr_select;
	   $data =  datagroupzalo::where('user_id',$id)->whereIn('zalo_id', $arr)->get();
	   return $data;
}

public function dongbolistGroup(Request $request){
	   if(Auth::user()){
         	$userid= Auth::user()->id;
         }else{
         	return redirect()->intended('/');
         }
         $check = datagroupzalo::where('user_id',$userid)->where('zalo_id',$request->zaloid)->first();
         if(!empty($check)){
         	$delete = datagroupzalo::where('zalo_id',$request->zaloid)->delete();
         	$data = new datagroupzalo;
	        $data->user_id = $userid;
	        $data->zalo_id  = $request->zaloid;
	        $data->data  = json_encode($request->listgroup);
	        $data->save();
	        
	        	return [
	        		'status'  => 200,
                     'message' => 'update th??nh c??ng!'
	        	];
	       
         }else{
         	   $data = new datagroupzalo;
		        $data->user_id = $userid;
		        $data->zalo_id  = $request->zaloid;
		        $data->data  = json_encode($request->listgroup);
		        $data->save();
		        if($data->id){
		        	return [
		        		'status'  => 200,
	                     'message' => 'Th??m th??nh c??ng!'
		        	];
	        }
         }
}

public function postimagegourp(Request $request){
        //$data =array();

		
		$fields = array();
		$files = array();
      
		$files["chunkContent"] = file_get_contents($request->url_image);

		$boundary = uniqid();
		$delimiter = '-------------' . $boundary;
		$post_data = $this->build_data_files($boundary, $fields, $files,$request->filename);

		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://files-wpa.chat.zalo.me/api/message/photo_original/upload?zpw_ver=42&zpw_type=30&params=".urlencode($request->encrypted)."&type=2",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $post_data,
		  CURLOPT_HTTPHEADER => array(
		    "content-type: multipart/form-data; boundary=".$delimiter."",
		    "cookie: ".$request->cookie."",
		    "user-agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return [
          'status' =>200,
          'idsend' =>$request->idto,
          'data' =>$response
		];
		//return $response;
}

public function sendimggroup(Request $request){
	    $encrypted = $request->encrypted;
		$cookie = $request->cookie;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://files-wpa.chat.zalo.me/api/group/photo_original/send?zpw_ver=51&zpw_type=30&nretry=0",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "params=".urlencode($encrypted),
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/x-www-form-urlencoded",
		    "cookie: ".$cookie."",
		    "user-agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36"
		  ),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		die($response);
}

public function getInforAccount(Request $rq){
      if(Auth::user()){
        $id = Auth::user()->id;
        $check = DB::table('vp_users')->where('id',$id)->get();
         foreach ($check as $key => $value) {
         	$userid = $value->userid;
         	$status = $value->status;
            $role_profile = json_decode($value->role_profile);
         }
         $twigData['role_profile'] = $role_profile;

          if($status !=1){
          	$data = DB::table('zalo_accounts')->join('user_zaloapp', 'user_zaloapp.zalo_id', '=' , 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$id)->where('zalo_accounts.user_id',$id)->where('zalo_accounts.page',0)->where('user_zaloapp.page',0)->where('cate_id',$rq->cateId)->get();
            $twigData['account'] = $data;
            $twigData['mess_sample'] = DB::table('mess_sample')->where('user_id',$id)->where('page',0)->get();
          }else{
          	$data = DB::table('zalo_accounts')->join('user_zaloapp', 'user_zaloapp.zalo_id', '=' , 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$userid)->where('zalo_accounts.user_id',$userid)->where('zalo_accounts.page',0)->where('user_zaloapp.page',0)->where('cate_id',$rq->cateId)->whereIn('zalo_accounts.zalo_id', $role_profile)->get();
            $twigData['account'] = $data;
          }

        // $data = DB::table('zalo_accounts')->join('user_zaloapp', 'user_zaloapp.zalo_id', '=' , 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$id)->where('zalo_accounts.user_id',$id)->where('zalo_accounts.page',0)->where('user_zaloapp.page',0)->where('cate_id',$rq->cateId)->get();
        //  $twigData['account'] = $data;
        //   $twigData['mess_sample'] = DB::table('mess_sample')->where('user_id',$id)->where('page',0)->get();

          
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
		$send_data = json_decode(json_encode($twigData['account'],true));

         return[
            'status'=> 200,
            'data' => $send_data
         ];
      }else{
      	return redirect()->intended('/');
      }
}

   

}
