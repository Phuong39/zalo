<?php

namespace App\Http\Controllers\Postfb;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Jobs\ProcessPostZalo;
use Carbon\Carbon;
use App\Models\postautofb;
use App\Models\data_post_send;
use App\Models\schedulepostfb;
use App\Models\listTokenfb;

class postfb extends Controller
{
	 protected $data_array;
	 protected $token;
	 protected $status;
     protected $userid;
     protected $role_page;
    public function index(Request $request){
		
    	if(Auth::user()){
    		$id = Auth::user()->id;
    	}else{
    		return redirect()->intended('/');
    	} 
        $data = DB::table('vp_users')->where('id',$id)->get();
         foreach($data  as $key=>$value){
             $role_page = json_decode($value->role_page);
             $status   = $value->status;
             $userid   = $value->userid;
        }
        $data['role_page']  =$role_page;
        $data['status']  =$status;
         if($status != 1){
            
            $data['account'] = DB::table('user_zaloapp') ->join('zalo_accounts', 'user_zaloapp.zalo_id', '=', 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$id)->where('zalo_accounts.user_id',$id)->where('zalo_accounts.page',1)->where('user_zaloapp.page',1)->orderBy('zalo_accounts.id','desc')->orderBy('user_zaloapp.id','desc')->get();

          }else{ 
             $data['account'] = DB::table('user_zaloapp') ->join('zalo_accounts', 'user_zaloapp.zalo_id', '=', 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$userid)->where('zalo_accounts.user_id',$userid)->where('zalo_accounts.page',1)->where('user_zaloapp.page',1)->orderBy('zalo_accounts.id','desc')->orderBy('user_zaloapp.id','desc')->get();
          }

    	//$data['account'] = DB::table('zalo_accounts')->where('user_id',$id)->where('page',1)->get();

    	$data['listtoken'] = DB::table('listtokenfb')->where('user_id',$id)->orderBy('id','desc')->get();
    	return view('postfb.postfb',$data);

    }

    public function addauto(Request $request){
         if(Auth::user()){
		    		$id = Auth::user()->id;
		    	}else{
		    		return redirect()->intended('/');
		    	}

    	$token = $request->autotokenpagefb;
		$soluong = $request->autosoluong;
		$image = $request->image;
		$video = $request->video;
		$list_id = preg_replace( "/\r|\n/", ",", $token);
		$array_token = explode(',', $list_id);
		$id_page = $request->autoid_page;
		$page = preg_replace( "/\r|\n/", ",", $id_page);
		$arr_page = explode(',', $page);
		$id_group = $request->autoid_group;
		$date_time = $request->autoscheduledPostTime1;
		$post_title = $request->post_title;
		$group = preg_replace( "/\r|\n/", ",", $id_group);
		$param['token'] = $token;
		$param['soluong'] = $soluong;
		$param['image'] = $image;
		$param['video'] = $video;
		$param['date'] = $date_time;
		$param['page'] = $page;
		$param['group'] = $group;

		$result = $this->checktoken($token);
		if (!empty($result['error'])) {
			display_json(array(
				'status' => 'error',
				'message' => 'Token bạn nhập không hoạt động.'
			));
		}
		$check = 0;
		foreach ($arr_page as $key => $value) {
			$pattern = '/\D/';
			$subject = $value;
			if (preg_match($pattern, $subject)) {
			    $check = 1;
			    break;
			} else {
			    $check = 0;
			}
		}
		if ($check == 1) {
			$result = array(
					'status' => 'error',
				'message' => 'ID page hoặc ID nhóm không đúng định dạng.'
				);
				return response()->json($result);
		}
         
         $data2 = new postautofb;
	    	$data2->user_id =$id;
	    	$data2->content =json_encode($param);
	    	$data2->type ='';
	    	$data2->post_title = $post_title;

	    	if($postID = $data2->save()){
	    		$result = array(
					'status' => 'success',
					'message' => 'Post has been saved successfully',
					'post_id' => $data2->id
				);
				return response()->json($result);
	    	}else{
	    		$result = array(
					'status' => 'error',
				    'message' => 'Unabe to save your post'
				);
				return response()->json($result);
	    	}
    	
    }

    public function getpage(Request $request){

    	$token = $request->token;
		$soluong = $request->soluong;
		$image = $request->image;
		$video = $request->video;
		$date_check = $request->scheduledPostTime;
		$list_id = preg_replace( "/\r|\n/", ",", $token);
		$array_token = explode(',', $list_id);
		$id_page = $request->id_page;
		$page = preg_replace( "/\r|\n/", ",", $id_page);

		$id_group = $request->id_group;
		$group = preg_replace( "/\r|\n/", ",", $id_group);
		$array_page = array();
		$array_group = array();

        $result = $this->checktoken($token);
		if (!empty($result['error'])) {
			return[
               'status' => 'error',
				'message' => 'Token bạn nhập không hoạt động.'
			];
		}
        // if($image == 1){
        // 	$url ="https://graph.facebook.com/v7.0/".$id_page."/feed?fields=full_picture,message&access_token=".$token."&debug=all&format=json&method=get&pretty=0&suppress_http_code=1&transport=cors";
        // }else if($video == 1){
        // 	$url="https://graph.facebook.com/v7.0/".$id_page."/feed?fields=message,video&access_token=".$token."&debug=all&format=json&method=get&pretty=0&suppress_http_code=1&transport=cors";
        // }else if($video == 1 && $image == 1){
        // 	$url="https://graph.facebook.com/v7.0/".$id_page."/feed?fields=full_picture,message,video&access_token=".$token."&debug=all&format=json&method=get&pretty=0&suppress_http_code=1&transport=cors";
        // }
        $url="https://graph.facebook.com/v7.0/".$id_page."/feed?fields=full_picture,message,admin_creator&access_token=".$token."&debug=all&format=json&method=get&pretty=0&suppress_http_code=1&transport=cors";
		if ($page != '') {
			$array_page = $this->getpostpage($token, $page, $soluong,$url);
			$result = array(
					'status' => 200,
					'data' => $array_page
				);
				return response()->json($result);
		}
		if ($group != '') {
			$array_group = $this->getpostgroup($value, $group, $soluong);
			$result = array(
					'status' => 200,
					'data' => $array_group
				);
				return response()->json($result);
		}
	
		
    }

    	public function getpostpage($token, $id_page, $soluong,$url){
		$curl = curl_init();
		curl_setopt_array($curl, array(
			//node: "https://graph.facebook.com/v7.0/".$id_page."/feed?fields=full_picture,message,video&access_token=".$token."&debug=all&format=json&method=get&pretty=0&suppress_http_code=1&transport=cors";
		  //CURLOPT_URL => "https://graph.facebook.com/graphql?access_token=".$token."&q=nodes(".$id_page.")%7Btimeline_feed_units.first(".$soluong.")%7Bnodes%7Bfeedback%7Bid%2Creactors%7Bcount%7D%2Ctop_level_comments%7Bcount%7D%7D%7D%7D%7D",

		  CURLOPT_URL => $url,
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
		$response = curl_exec($curl);
		curl_close($curl);
		$data = json_decode($response);
		$data = (array)json_decode($response);
		foreach ($data as $key => $value) {
			return $value;
	}
		}
			
		// $new = array();
		// $n = -1;
		// foreach ($data as $key => $value) {
		// 	// unset($value->group_feed->nodes[0]);
		// 	foreach ($value->timeline_feed_units->nodes as $key1 => $value1) {
		// 		$n++;
		// 		$new[$n]['id_post'] = $value1->feedback->id;
		// 		$new[$n]['id_ad'] = $key;
		// 	}
		// }
		
		

    	public function checktoken($token){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://graph.facebook.com/me/?fields=id&access_token=".$token,
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
		$data = json_decode($response);
		$result = array();
		if (empty($data->id)) {
			$result = array(
				'error'=>'200'
			);
		}
		return $result;
	}

	public function sendpostfb(Request $request){
		if(Auth::user()){
    		$id = Auth::user()->id;
    	}else{
    		return redirect()->intended('/');
    	}
		$data = DB::table('vp_users')->where('id',$id)->select('remember_token')->get();
		foreach ($data as $key => $value) {
    		$token = $value->remember_token;
    	}    	

       $content = $request->content;
       $image = $request->image;
       $node = $request->zaloid;
        $link = '';
       $file_url = '';
             foreach ($node as $key => $value) {
                
                 $dataInsert = [
                    'content' => json_encode($content),
                    'type' => 'image',
                    'zalo_id'   => $value,
                    "user_id"      => $id,
                    "image"      => $image,
                    "post_title"      => $request->title,
                    "tacgia"      => $request->tacgia,
                    "mieuta"      => '',
                    "cate_id"      => null,
                    "status"      => 1,
                    "status_post"      => 0,
                ];
             $sendPost = data_post_send::create($dataInsert);        
             ProcessPostZalo::dispatch($content, 'image', $value ,$token,$sendPost->id,$link,$image,'*',$request->tacgia,$request->title,$file_url)->delay(now()->addMinutes($key));

        }
	}

	public function schedulerpostfb(Request $request){
			if(Auth::user()){
    		$id = Auth::user()->id;
    	}else{
    		return redirect()->intended('/');
    	}

    	$dateStart=date_create($request->timeStart);
        $timestart = date_format($dateStart,"Y-m-d H:i:s");

        $dateend = date_create($request->timeend);
        $timeend = date_format($dateend,"Y-m-d H:i:s");

       
       $dataInsert = [
                    'user_id' => $id,
                    'zalo_id'   => json_encode($request->zaloid),
                    "timestart"      => $timestart,
                    "timeend"      => $timeend,
                    "number"      => $request->number,
                    "token"      => $request->token,
                    "fb_id"      => $request->fb_id,
                    "stop"      => 0,
                    
                ];
             $sendPost = schedulepostfb::create($dataInsert);
             if(empty($sendpostfb->id)){
             	$result = array(
					'status' => 200,
					'mess' => 'Lên lịch đăng bài thành công!!'
				);
				return response()->json($result);
             }

	}
	public function updateStop(Request $request){
        $data = schedulepostfb::where('id',$request->id)->first();

          $data->stop = $request->status;
               
        $data->update();
                 $result= array(
                    'status' => 200,
                    
                  );
            return response()->json($result);
	}

	public function addtokenid(Request $rq){
         if(Auth::user()){
    		$id = Auth::user()->id;
    	}else{
    		return redirect()->intended('/');
    	}

    	$dataInsert = [
                    'user_id' => $id,
                    'token'   => $rq->token,
                    "idfb"      => $rq->idfb,
                    "name"      => $rq->name
                    
                ];
             $sendPost = listTokenfb::create($dataInsert);
             if($sendPost->id){
             	return [
                     "status"=>200,
                     "message"=>"Lưu thành công Token & ID !"
             	];
             }

	}

	public function gettokenfb(Request $rq){
       if(Auth::user()){
    		$id = Auth::user()->id;
    	}else{
    		return redirect()->intended('/');
    	}
    	$data = listTokenfb::where('id',$rq->id)->get();
    	foreach ($data as $key => $value) {
    		return [
                "status"=>200,
                "token"=>$value->token,
                "id"=>$value->idfb
    		];
    	}
	}



}
