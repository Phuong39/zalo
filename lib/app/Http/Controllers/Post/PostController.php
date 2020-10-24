<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\User_Model;
use App\Models\postCategory;
use App\Models\listpostModel;
use App\Http\Requests\AddPostCateRequestt;
use App\Http\Requests\AddListPostRequest;
use App\Jobs\ProcessPostZalo;
use App\Models\data_post_send;
use App\Models\schedule_post;
use Carbon\Carbon;
//use DOMDocument;
class PostController extends Controller
{
     protected $token;
     protected $check_page;
     protected $accessToken;
     protected $postid;

    public function getprofile(){
      if(Auth::user()){
        $id = Auth::user()->id;
      $check = DB::table('vp_users')->where('id',$id)->first();
      $data['status'] = $check->status;
      $data['role_profile'] = json_decode($check->role_profile);
      $userid = $check->userid;
      if($check->status != 1){
        $data['list']= User_Model::where('user_id',$id)->where('page',0)->orderBy('id','desc')->paginate(10);
        $data['category'] = DB::table('categorypost')->where('user_id',$id)->get();
        $data['list_post'] = DB::table('list_post')->where('user_id',$id)->where('status',0)->orderBy('id','desc')->paginate(10);
      }else{
         $data['list']= User_Model::where('user_id',$userid)->where('page',0)->orderBy('id','desc')->paginate(10);
         $data['category'] = DB::table('categorypost')->where('user_id',$userid)->get();
         $data['list_post'] = DB::table('list_post')->where('user_id',$userid)->where('status',0)->orderBy('id','desc')->paginate(10);
      }

      return view('posts/post_profile',$data);
      }else{
        return redirect()->intended('/');
      }
         

    	
    }

//danh sách bài viết
    public function getListPost(){
      if(Auth::user()){
            $id =Auth::user()->id;

            $data['listPost'] = DB::table('list_post')->where('user_id',$id)->orderBy('id','desc')->paginate(10);
            $data['category'] = DB::table('categorypost')->where('user_id',$id)->get();

            return view('posts/list_posts',$data); 
        }else{
            return redirect()->intended('/');
        }
    	
    }

    public function getDeletePost($id){
           if($id){
          $Post = listpostModel::where('id',$id)->delete();
          
        }
         return back();

    }
    //end

//categoryPost
    public function getCategory(){

       if(Auth::user()){
            $id =Auth::user()->id;

            $data['catelist'] = DB::table('categorypost')->where('user_id',$id)->get();
            return view('posts/category',$data);
        }else{
            return redirect()->intended('/');
        }
    	
    }

    public function getAddCategory(AddPostCateRequestt $request){

       if(Auth::user()){
            $id = Auth::user()->id;
            $category = new postCategory;
            $category->name = $request->name;
            $category->user_id  = $id;
            $category->slug = str_slug($request->name);
            $category->save();
            return back();
        }else{
            return redirect()->intended('/');
        }
      
    }
//end categoryPost

    public function getListAccount(){

    }

public function deleteAllListPost(Request $request){
     $arr = $request->arr;
          foreach ($arr as $key => $value) {
            $account2 = listpostModel::where('id',$value)->delete();
          }
          return [
                    'status'  => 200,
                    'message' => 'xóa bài viết thành công!',
                ];
}

 public function getPostProfile(Request $request){
          if(Auth::user()){
            $user_id = Auth::user()->id; 
          }else{
             return redirect()->intended('/');
          }
          $accessToken = DB::table('vp_users')->where('id',$user_id)->select('remember_token')->get();
          foreach ($accessToken as $key => $row) {
            $this->token = $row->remember_token;
          }
         
         $node = $request->arr;
         $link ='';

         switch ($request->type) {
          // status = 1 kiểu video và image,   status= 0 là link và trạng thái
          //status_post = 0 (cho xu ly), status_post = 1 (dang bai thanh cong), status_post = 2 (dang bai that bai)
                case "message":
                //var_dump($request->message);
                             $source ='';
                             $mieuta ='';
                             $tacgia ='';
                             $post_title='';
                             $file_url='';
                     foreach ($node as $key => $value) {
                        $dataInsert = [
                            'content'   => $request->message,
                            'type'      => 'status',
                            'zalo_id'   => $value,
                            "user_id"   => $user_id,
                            "post_title"   => $request->post_title,
                            "cate_id"   => $request->cateId,
                            "status"      => 0,
                            "status_post"      => 0,
                        ];
                        $sendPost = data_post_send::create($dataInsert); 
                        ProcessPostZalo::dispatch($request->message, $request->type, $value ,$this->token,$sendPost->id,$link,$source,$mieuta,$tacgia,$post_title,$file_url)->delay(now()->addMinutes($key)); 
  
                     }
                     return [
                                'status'  => 200,
                                'message' => 'Đăng bài thành công, vui lòng kiểm tra trạng thái đăng trong lịch sử đăng bài!',
                            ];
                break;
                 
                case "link":
                   $link = $request->link;
                   //var_dump($node);die();
                            $source ='';
                             $mieuta ='';
                             $tacgia ='';
                             $post_title='';
                             $file_url='';
                      foreach ($node as $key => $value) {

                             $dataInsert = [
                                'content' => $request->message,
                                'type' => $request->type,
                                'zalo_id'   => $value,
                                "user_id"      => $user_id,
                                "post_title"   => $request->post_title,
                                "link"      => $link,
                                "cate_id"      => $request->cate_id,
                                "status"      => 0,
                                "status_post"      => 0,
                            ];
                        $sendPost = data_post_send::create($dataInsert);        
                      ProcessPostZalo::dispatch($request->message, $request->type, $value ,$this->token,$sendPost->id,$link,$source,$mieuta,$tacgia,$post_title,$file_url)->delay(now()->addMinutes($key));
                    }
                    return [
                                'status'  => 200,
                                'message' => 'Đăng bài thành công, vui lòng kiểm tra trạng thái đăng trong lịch sử đăng bài!',
                            ];
                 break;

                  case "image":
                     //var_dump($request->source);die();
                            $link = '';
                            $file_url = '';

                    foreach ($node as $key => $value) {
                            
                             $dataInsert = [
                                'content' => json_encode($request->message),
                                'type' => $request->type,
                                'zalo_id'   => $value,
                                "user_id"      => $user_id,
                                "image"      => $request->source,
                                "post_title"      => $request->post_title,
                                "tacgia"      => $request->tacgia,
                                "mieuta"      => $request->mieuta,
                                "cate_id"      => $request->cate_id,
                                "status"      => 1,
                                "status_post"      => 0,
                            ];
                            
                         $sendPost = data_post_send::create($dataInsert);      
                         ProcessPostZalo::dispatch($request->message, $request->type, $value ,$this->token,$sendPost->id,$link,$request->source,$request->mieuta,$request->tacgia,$request->post_title,$file_url)->delay(now()->addMinutes($key));
                     
                    }
                    return [
                                'status'  => 200,
                                'message' => 'Đăng bài thành công, vui lòng kiểm tra trạng thái đăng trong lịch sử đăng bài!',
                            ];
                 break;

                  case "video":
                         $link = '';
                         $source = '' ;

                         //var_dump($node);die();
                         foreach ($node as $key => $value) {
                             $dataInsert = [
                                'content' => json_encode($request->message),
                                'type' => $request->type,
                                'zalo_id'   => $value,
                                "user_id"      => $user_id,
                                "link_video"      => $request->file_url,
                                "post_title"      => $request->post_title,
                                "tacgia"      => $request->tacgia,
                                "mieuta"      => $request->mieuta,
                                "cate_id"      => $request->cate_id,
                                "status"      => 1,
                                "status_post"      => 0,
                            ];
                         $sendPost = data_post_send::create($dataInsert);        
                         ProcessPostZalo::dispatch($request->message, $request->type, $value ,$this->token,$sendPost->id,$link,$source,$request->mieuta,$request->tacgia,$request->post_title,$request->file_url)->delay(now()->addMinutes($key));
                        
                          
                          }
                  return [
                          'status'  => 200,
                          'message' => 'Đăng bài thành công, vui lòng kiểm tra trạng thái đăng trong lịch sử đăng bài!',
                      ];
                            
                  break;
                    
                default:
                      return [
                                'status'  => 404,
                                'message' => 'Kiểu dữ liệu không đúng !!',
                            ];
              }
        

 }



     public function post($node,$params,$postType){
     
        
        $res = DB::table('zalo_accounts')->join('user_zaloapp', 'zalo_accounts.zalo_id', '=', 'user_zaloapp.zalo_id')->where('zalo_accounts.zalo_id', $node)->get();
         foreach($res as $row){
            $check_page = $row->page;
            $accessToken = $row->access_token;
         }
        if ($check_page == 0) {

            if ($postType == 'message' || $postType == 'link') {

               $data = $this->postMe($node,$params,$postType,$accessToken);
               //var_dump($data);
              
            }
            
        } else {
            if ($postType == 'image' || $postType == 'video') {
                $data = $this->postFanpage($node,$params,$postType,$accessToken);
            }
        }

        return $data;
    }

//     public function postMe($node,$params,$postType,$accessToken){
    
        
//         $accessToken = $this->getAccessToken($accessToken);
//         //var_dump($accessToken);die();
//         if ($postType == 'message') {
//             $pre = "access_token=".$accessToken."&message=".$params['message']."";
//             //var_dump($pre);die();
//         } elseif($postType == 'link'){
//             $pre = "access_token=".$accessToken."&message=".$params['message']."&link=".$params['link']."";
//         }
//        // var_dump($pre);die();
//         $curl = curl_init();
//         curl_setopt_array($curl, array(
//           CURLOPT_URL => "https://openapi.zalo.me/v2.0/me/feed",
//           CURLOPT_RETURNTRANSFER => true,
//           CURLOPT_ENCODING => "",
//           CURLOPT_MAXREDIRS => 10,
//           CURLOPT_TIMEOUT => 30,
//           CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//           CURLOPT_CUSTOMREQUEST => "POST",
//           CURLOPT_POSTFIELDS => $pre,
//           CURLOPT_HTTPHEADER => array(
//             "content-type: application/x-www-form-urlencoded"
//           ),
//         ));

//         $response = json_decode(curl_exec($curl));
//         ///var_dump($response);die();
//         curl_close($curl);
//         // if (isset($response->error)) {
//         //     return null;
//         // }
// //var_dump($response);
//         return $response;
//     }

    //     public function postFanpage($node,$params,$postType,$accessToken){

    //     if (isset($params['url'])) {
    //         $params['source'] = $params['url'];
    //     }
    //     if ($postType == 'image') {
    //         $array = array (
    //           'type' => 'normal',
    //           'title' => urldecode($params['tieude']),
    //           'author' => ''.urldecode($params['tacgia']).'',
    //           'cover' => 
    //           array (
    //             'cover_type' => 'photo',
    //             'photo_url' => ''.urldecode($params['source']).'',
    //             'status' => 'show'
    //           ),
    //           'description' => ''.urldecode($params['mieuta']).'',
    //           'body' => [
    //             array (
    //               'type' => 'text',
    //               'content' => ''.urldecode($params['message']).''
    //             ),
    //             array (
    //               'type' => 'text',
    //               'content' => ''
    //             )],
    //           'status' => 'show',
    //           'comment' => 'show'
    //         );
    //         //var_dump($array);die();
    //         $curl = curl_init();
    //         curl_setopt_array($curl, array(
    //           CURLOPT_URL => "https://openapi.zalo.me/v2.0/article/create?access_token=".$accessToken."",
    //           CURLOPT_RETURNTRANSFER => true,
    //           CURLOPT_ENCODING => "",
    //           CURLOPT_MAXREDIRS => 10,
    //           CURLOPT_TIMEOUT => 30,
    //           CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //           CURLOPT_CUSTOMREQUEST => "POST",
    //           CURLOPT_POSTFIELDS => json_encode($array),
    //           CURLOPT_HTTPHEADER => array(
    //             "content-type: application/json"
    //           ),
    //         ));
    //         $response = curl_exec($curl);
    //         //var_dump($response);
    //         curl_close($curl);
    //     } else {
    //       //var_dump("kjsdfhksdfhsdjf");
    //          $id_video = $this->uploadvideo($params['file_url'],$accessToken);
    //          var_dump($id_video);
    //         // $array = array (
    //         //   'type' => 'normal',
    //         //   'title' => urldecode($params['tieude']),
    //         //   'author' => '',
    //         //   'cover' => 
    //         //   array (
    //         //     'cover_type' => 'video',
    //         //     'cover_view' => 'horizontal',
    //         //     'video_id' => '' .$id_video.'',
    //         //     'status' => 'show',
    //         //   ),
    //         //   'description' => urldecode($params['mieuta']),
    //         //   'body' => 
    //         //   array (
    //         //     0 => 
    //         //     array (
    //         //       'type' => 'text',
    //         //       'content' => urldecode($params['message']),
    //         //     ),
    //         //     1 => 
    //         //     array (
    //         //       'type' => 'text',
    //         //       'content' => '',
    //         //     ),
    //         //   ),
    //         //   'status' => 'show',
    //         //   'comment' => 'show',
    //         // );
            
    //         // //sleep(3);
    //         // $curl = curl_init();

    //         // curl_setopt_array($curl, array(
    //         //   CURLOPT_URL => "https://openapi.zalo.me/v2.0/article/create?access_token=".$accessToken,
    //         //   CURLOPT_RETURNTRANSFER => true,
    //         //   CURLOPT_ENCODING => "",
    //         //   CURLOPT_MAXREDIRS => 10,
    //         //   CURLOPT_TIMEOUT => 30,
    //         //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         //   CURLOPT_CUSTOMREQUEST => "POST",
    //         //   CURLOPT_POSTFIELDS => json_encode($array),
    //         //   CURLOPT_HTTPHEADER => array(
    //         //     "content-type: application/json"
    //         //   ),
    //         // ));
    //         // $response = curl_exec($curl);
    //         // $result = json_decode($response);
    //         // curl_close($curl);
    //         // if ($result->error = '-201') {
    //         //     $response = $this->upvideoasall($array,$accessToken);
    //         // }
            
    //     }
    //     //return $response;

    // }


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
         if ($dir_file == false) {
            unlink($file_end);
         }
        
        if ($response !== false) {
            $id_video = $this->getIdVideo(json_decode($response)->data->token, $token);
            return $id_video;
        }
    }

     public function getAccessToken($accessToken){
       //var_dump($accessToken);die();
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


// create post
  public function createpost(Request $request){
    if(Auth::user()){
        $id = Auth::user()->id;
      $data['category'] = DB::table('categorypost')->where('user_id',$id)->get();

        return view('posts.createpost',$data);

      }else{
        return redirect()->intended('/');
      }

    
  }
  public function postCreateCart(AddListPostRequest $request){
         $folder_name = Auth::user()->email;
         $id = Auth::user()->id;
         $file_name = $request->img->getClientOriginalName();
         $url_image = $request->img->storeAs($folder_name,$file_name);
         $dataFilename =url('/lib/storage/app/').'/'.$url_image;
         $title = $request->selltitle; 
         $price = $request->sellprice;
         $vitri = $request->selllocation;
         $content = $request->selldescription;
         $cate_id = $request->cate_id;

         $data = new listpostModel;
         $data->user_id = $id;
         $data->cate_id = $cate_id;
         $data->post_title = $title;
         $data->price = $price;
         $data->vi_tri = $vitri;
         $data->content = $content;
         $data->image = $dataFilename;
         $data->type = 'saleCart';
          $data->save();
          $message = "Thêm mới bài viết thành công";
         return back()->withInput()->with('error',$message);

  }
  public function potcreatepost(AddListPostRequest $request){
    $folder_name = Auth::user()->email;
    $id = Auth::user()->id;
      $file_name = $request->img->getClientOriginalName();
      $url_image = $request->img->storeAs($folder_name,$file_name);
      $dataFilename =url('/lib/storage/app/').'/'.$url_image;
      $title = $request->title; 
      $message = $request->message; 
      $cate_id =$request->cate_id;
      $tacgia =$request->tacgia;
      $mieuta =$request->mieuta;
          $data = new listpostModel;
          $data->user_id = $id;
          $data->cate_id = $cate_id;
          $data->content = $message;
          $data->post_title = $title;
          $data->tacgia = $tacgia;
          $data->mieuta = $mieuta;
          $data->image = $dataFilename;
          $data->type = 'image';
          $data->save();
         
         $message = "Thêm mới bài viết thành công";
         return back()->withInput()->with('error',$message);
        // return redirect('posts/createpost');
  }

  public function createPostVideo(AddListPostRequestVideo $request){
         $folder_name = Auth::user()->email;
    $id = Auth::user()->id;
      $file_name = $request->img3->getClientOriginalName();
      $url_video = $request->img3->storeAs($folder_name,$file_name);
      var_dump($url_video);die();

      $dataFilename =url('/lib/storage/app/').'/'.$url_image;
      $title = $request->title; 
      $message = $request->message; 
      $cate_id =$request->cate_id;
      $tacgia =$request->tacgia;
      $mieuta =$request->mieuta;
          $data = new listpostModel;
          $data->user_id = $id;
          $data->cate_id = $cate_id;
          $data->content = $message;
          $data->post_title = $title;
          $data->tacgia = $tacgia;
          $data->mieuta = $mieuta;
          $data->image = $dataFilename;
          $data->type = 'image';
          $data->save();
         
         $message = "Thêm mới bài viết thành công";
         return back()->withInput()->with('error',$message);
  }

  public function addNewPost(Request $request){
      $id = Auth::user()->id;
      $message = $request->message;
      $cate_id = $request->cate_id;
      $post_title = $request->post_title;
      $type = $request->type;
      if($type == 'status'){
        $data = new listpostModel;
        $data->user_id= $id;
        $data->cate_id= $cate_id;
        $data->content = $message;
        $data->post_title = $post_title;
        $data->type = 'status';
        $data->status = 0;
        $data->save();

        return response()->json([
                'status'  => true,
                'message' => "Thêm bài viết thành công."
            ]);

      }elseif($type == "link"){
        $data = new listpostModel;
        $data->user_id = $id;
        $data->cate_id = $request->cate_id;
        $data->content = $request->message;
        $data->post_title = $request->post_title;
        $data->link = $request->link;
        $data->type  = 'link';
        $data->status = 0;
        $data->save();

        return response()->json([
                'status'  => true,
                'message' => "Thêm bài viết thành công."
            ]);

      }elseif($type == 'image'){
         
        $data = new listpostModel;
        $data->user_id = $id;
        $data->cate_id = $request->cateId;
        $data->content = $request->message;
        $data->post_title = $request->title;
        $data->image = $request->imageURL;
        $data->mieuta = $request->mieuta;
        $data->tacgia = $request->tacgia;
        $data->type  = 'image';
        $data->status = 1;
        $data->save();
        return response()->json([
                'status'  => true,
                'message' => "Thêm bài viết thành công."
            ]);
        
      }else if($type == 'video'){

        $data = new listpostModel;
        $data->user_id = $id;
        $data->cate_id = $request->cateId;
        $data->content = $request->message;
        $data->post_title = $request->title;
        $data->link_video = $request->videoURL;
        $data->mieuta = $request->mieuta;
        $data->tacgia = $request->tacgia;
         $data->status = 1;
        $data->type  = 'video';
        $data->save();
        return response()->json([
                'status'  => true,
                'message' => "Thêm bài viết thành công."
            ]);
      }
  }
//end create
public function addNewPostImg(Request $request){
       $a =$request->params;
       var_dump($a);die();
}
public function get_url_info(Request $request)
  { 

    $result = array(
      'status' => 'ok',
      'url' => $this->url_info($request->url)
    );
    return $result;
  }

 public function url_info($url)
  { 
   
    $items = array(
      'title' => "",
      'description' => "",
      'image' => "",
    );

    // Check if the URL is youtube video
    $youtube_reg = "/(youtube.com|youtu.be)\/(watch)?(\?v=)?(\S+)?/";
    if(preg_match($youtube_reg, $url, $match)){
      $items['title'] = $this->getYoutubeVideoTitle($match[4]);
      return $items;
    }
    
    $user_agent='Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36';

    $headers = array
    (
        'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
        'Accept-Language: en-US,fr;q=0.8;q=0.6,en;q=0.4,ar;q=0.2',
        'Accept-Encoding: gzip,deflate',
        'Accept-Charset: utf-8;q=0.7,*;q=0.7',
        'cookie:datr=; locale=en_US; sb=; pl=n; lu=gA; c_user=; xs=; act=; presence='
    ); 


        $ch = curl_init( $url );

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST , "GET");
        curl_setopt($ch, CURLOPT_POST, false);     
        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_ENCODING, "");
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        //curl_setopt($ch, CURLOPT_REFERER, "";

        $html = curl_exec( $ch );

       
        curl_close( $ch );
    if($html == "") return $items;
    //parsing begins here:
    $doc = new \DOMDocument();
    libxml_use_internal_errors(true);
    $doc->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
    $title = $doc->getElementsByTagName('title');
    $metas = $doc->getElementsByTagName('meta');

    $items = array(
      'title' => "",
      'description' => "",
      'image' => "",
    );

    $items["title"] = isset($title->item(0)->nodeValue) ? $title->item(0)->nodeValue : "";

    for ($i = 0; $i < $metas->length; $i++){
        $meta = $metas->item($i);
        
        if($items['description'] == ""){
          if($meta->getAttribute('name') == 'description'){
              $items['description'] = $meta->getAttribute('content');
          }
      }
      if($items['image'] == ""){
        if($meta->getAttribute('property') == 'og:image'){
              $items['image'] = $meta->getAttribute('content');
          }
      }
    }

    if($items['description'] == ""){
      for ($i = 0; $i < $metas->length; $i++){
          $meta = $metas->item($i);
        if($meta->getAttribute('property') == 'og:description'){
              $items['description'] = $meta->getAttribute('content');
          }
      }
    }

    if($items['description'] == ""){
      for ($i = 0; $i < $metas->length; $i++){
          $meta = $metas->item($i);
        $body = $doc->getElementsByTagName('body');
        $text = strip_tags($body->item(0)->nodeValue);
        $dots = "";
        if(strlen(utf8_decode($text))>500) $dots = "...";
        $text = mb_substr(stripslashes($text),0,500, 'utf-8');
        $items['description'] = $text.$dots;
      }
    }

    return $items;
  }

 function getYoutubeVideoTitle($videoID)
  {
    $user_agent='Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36';

    $headers = array
    (
        'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
        'Accept-Language: en-US,fr;q=0.8;q=0.6,en;q=0.4,ar;q=0.2',
        'Accept-Encoding: gzip,deflate',
        'Accept-Charset: utf-8;q=0.7,*;q=0.7',
        'cookie:datr=; locale=en_US; sb=; pl=n; lu=gA; c_user=; xs=; act=; presence='
    ); 

    $options = array(
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_CUSTOMREQUEST  => "GET",        //set request type post or get
        CURLOPT_POST           => false,        //set to GET
        CURLOPT_USERAGENT      => $user_agent, //set user agent
        CURLOPT_RETURNTRANSFER => true,     // return web page
        CURLOPT_HEADER         => false,    // don't return headers
        CURLOPT_FOLLOWLOCATION => true,     // follow redirects
        CURLOPT_ENCODING       => "",       // handle all encodings
        CURLOPT_AUTOREFERER    => true,     // set referer on redirect
        CURLOPT_CONNECTTIMEOUT => 60,      // timeout on connect
        CURLOPT_TIMEOUT        => 60,      // timeout on response
        CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
        CURLOPT_HTTPHEADER     => $headers,
        //CURLOPT_REFERER     => base_url()
    );
    $ch = curl_init( "https://www.youtube.com/embed/".$videoID );
    curl_setopt_array( $ch, $options );
    $html = curl_exec( $ch );
    curl_close( $ch );

    preg_match('/<title>([^>]*)<\/title>/si', $html, $match );
    if (isset($match) && is_array($match) && count($match) > 0){return strip_tags($match[1]);}

    return "";
  }

  public function selectListPost(Request $request){
          $post_id = $request->list_id;
           $res = DB::table('list_post')->where('id', $post_id)->get();
            $apps = array();
           foreach ($res as $key => $value) {
            if($value->type == 'status'){
               $apps = array(
                  "cate_id"        => $value->cate_id,
                  "content"   => $value->content,
                  "post_title"   => $value->post_title,
                  "type"   => $value->type,
                 
              );
            }else if($value->type == 'link'){
              $apps = array(
                  "cate_id"        => $value->cate_id,
                  "content"   => $value->content,
                  "post_title"   => $value->post_title,
                  "type"   => $value->type,
                  "link"   => $value->link,
                 
              );
            }else if($value->type == 'image'){
              $apps = array(
                  "cate_id"        => $value->cate_id,
                  "content"   => $value->content,
                  "post_title"   => $value->post_title,
                  "type"   => $value->type,
                  "image"   => $value->image,
                  "tacgia"   => $value->tacgia,
                  "mieuta"   => $value->mieuta,
                 
              );
            }else if($value->type == 'video'){
                 $apps = array(
                  "cate_id"        => $value->cate_id,
                  "content"   => $value->content,
                  "post_title"   => $value->post_title,
                  "type"   => $value->type,
                  "video"   => $value->link_video,
                  "tacgia"   => $value->tacgia,
                  "mieuta"   => $value->mieuta,
                 
              );
            }
              

           }
            //var_dump($data);die();
           $result= array(
          'status' => 'success',
          'data' => $apps
        );
           return response()->json($result);
  }

  public function schedulesadd(Request $request){
    //var_dump($request->All());die();
  
   if(Auth::user()){
            $id =Auth::user()->id;
        }else{
            return redirect()->intended('/');
        }

        
       

     $id_profile = $request->id_profile;
// foreach ($id_profile as $key => $value) {
//    $check = DB::table('schedule_post')->where('user_id',$id)->where('id_profile',$value)->where('stop',0)->first();
//     if(empty($check)){
//       continue;
//     }else{
              
//                  $result= array(
//                     'status' => 404,
//                     'mess' => "Tài khoản OA có ID:".$value.", đang chạy 1 lịch đăng, vui lòng dừng lại để chạy lịch đăng mới!"
//                   );
//              return response()->json($result);
//              }
//     }
if($request->type == 'image'){
           $data = array(
                   "message" => $request->message,
                   "cateId" => $request->cateId,
                   "title"  => $request->title,
                   "mieuta" => $request->mieuta,
                   "tacgia" => $request->tacgia,
                   "source" => $request->source,

                );
           $date = date_create($request->date_start);
            $date_start = date_format($date,"Y-m-d H:i:s");

             $datev2 = date_create($request->date_end);
            $date_end = date_format($datev2,"Y-m-d H:i:s");
          
          foreach ($id_profile as $key => $value) {

               $datasave = new schedule_post;

                $datasave->user_id = $id;
                $datasave->id_profile = $value;
                $datasave->content = json_encode($data);
                $datasave->time_start =  $date_start;
                $datasave->time_end =  $date_end;
                $datasave->cateId =  $request->cateId;
                $datasave->stop = 0;
                $datasave->type = 1;
                $datasave->type_post = 'image';
                
               
                $datasave->save();
              
             }
             $result= array(
                            'status' => 200,
                            'mess' => "Thêm lịch đăng bài thành công!"
                          );
              return response()->json($result);
   }else if($request->type == 'video'){

                 $data = array(
               "message" => $request->message,
               "cateId" => $request->cateId,
               "title"  => $request->title,
               "mieuta" => $request->mieuta,
               "tacgia" => $request->tacgia,
               "link_video" => $request->file_url,
                    

                  );
                  $date = date_create($request->date_start);
                $date_start = date_format($date,"Y-m-d H:i:s");

                 $datev2 = date_create($request->date_end);
                $date_end = date_format($datev2,"Y-m-d H:i:s");
                foreach ($id_profile as $key => $value) {

             $datasave = new schedule_post;

              $datasave->user_id = $id;
              $datasave->id_profile = $value;
              $datasave->content = json_encode($data);
              $datasave->time_start =  $date_start;
              $datasave->time_end =  $date_end;
              $datasave->cateId =  $request->cateId;
              $datasave->stop = 0;
              $datasave->type = 1;
              $datasave->type_post = 'video';
              
             
              $datasave->save();
            
           }
           

  }else if($request->type == "status"){


            $data = array(
             "message" => $request->message,
             "cateId" => $request->cateId,
             "post_title" => $request->post_title,
          ); 
             $date = date_create($request->date_start);
              $date_start = date_format($date,"Y-m-d H:i:s");

               $datev2 = date_create($request->date_end);
              $date_end = date_format($datev2,"Y-m-d H:i:s");

              foreach ($id_profile as $key => $value) {

             $datasave = new schedule_post;

              $datasave->user_id = $id;
              $datasave->id_profile = $value;
              $datasave->content = json_encode($data);
              $datasave->time_start =  $date_start;
              $datasave->time_end =  $date_end;
              $datasave->cateId =  $request->cateId;
              $datasave->stop = 0;
              $datasave->type = 0;
              $datasave->type_post = 'status';
              
             
              $datasave->save();
            
           }
            

           

           }else if($request->type == "link"){
             $data = array(
                 "message" => $request->message,
                 "link" => $request->link,
                 "cateId" => $request->cateId,
                 "post_title" => $request->post_title
              ); 

               $date2 = date_create($request->date_start);
                $date_start = date_format($date2,"Y-m-d H:i:s");

                 $date3 = date_create($request->date_end);
                $date_end = date_format($date3,"Y-m-d H:i:s");

              foreach ($id_profile as $key => $value) {

                 $datasave = new schedule_post;

                  $datasave->user_id = $id;
                  $datasave->id_profile = $value;
                  $datasave->content = json_encode($data);
                  $datasave->time_start =  $date_start;
                  $datasave->time_end =  $date_end;
                  $datasave->cateId =  $request->cateId;
                  $datasave->stop = 0;
                  $datasave->type = 0;
                  $datasave->type_post = 'link';
                  
                  
                 
                  $datasave->save();
                
               }
           }

           $result= array(
                          'status' => 200,
                          'mess' => "Thêm lịch đăng bài thành công!"
                        );
                   return response()->json($result);
     
             
    
   

    
  
     }

     public function updateStop(Request $request){

       $data = schedule_post::where('id',$request->id)->first();

          $data->stop = $request->status;
               
        $data->update();
                 $result= array(
                    'status' => 200,
                    
                  );
            return response()->json($result);
     }

     public function sendPostStatus(Request $rq){
          if(Auth::user()){
                $id =Auth::user()->id;
            }else{
                return redirect()->intended('/');
            }

            $res = DB::table('user_zaloapp')->where('user_id',$id)->where('zalo_id', $rq->zaloid)->get();
            foreach($res as $row){
              $this->check_page = $row->page;
              $this->accessToken = $row->access_token;
           }
            $accessToken = $this->getAccessToken($this->accessToken);
            if ($rq->postType == 'message') {
              $dataInsert = [
                            'content'   => $rq->message,
                            'type'      => 'status',
                            'zalo_id'   => $rq->zaloid,
                            "user_id"   => $id,
                            "post_title"   => $rq->post_title,
                            "cate_id"   => $rq->cateId,
                            "status"      => 0,
                            "status_post"  => 0,
                        ];
            $sendPost = data_post_send::create($dataInsert);
            $this->postid =  $sendPost->id;
            $pre = "access_token=".$accessToken."&message=".$rq->message."";
             
            } else if($rq->postType == 'link'){
                 $dataInsert = [
                                'content' => $rq->message,
                                'type' => 'link',
                                'zalo_id'   => $rq->zaloid,
                                "user_id"      => $id,
                                "post_title"   => $rq->post_title,
                                "link"      => $rq->link,
                                "cate_id"      => $rq->cate_id,
                                "status"      => 0,
                                "status_post"      => 0,
                            ];
                $sendPost = data_post_send::create($dataInsert);
                $this->postid =  $sendPost->id;

                $pre = "access_token=".$accessToken."&message=".$rq->message."&link=".$rq->link."";
            }
            $curl = curl_init();
            curl_setopt_array($curl, array(
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
            curl_close($curl);
            // var_dump($response);die();
            if(!empty($response->id)){
              $affected = DB::table('data_posts_send')
                                  ->where('id', $this->postid)
                                  ->update(['status_post' => 1]);
               return [
                   "status"=>200,
                   "zaloid"=>$rq->zaloid,
                   "message"=>"Đăng bài thành công!"
               ];
            }else if(!empty($response->error)){
               if($response->error == 12010){
                 $affected = DB::table('data_posts_send')
                                  ->where('id', $this->postid)
                                  ->update(['status_post' => 2,'error'=>'Tài khoản đã đăng quá giới hạn 1 ngày!']);
                   return [
                     "status"=>401,
                     "zaloid"=>$rq->zaloid,
                     "message"=>"Tài khoản đã đăng quá giới hạn 1 ngày!!"
                   ];
               }else if($response->error == 10000){
                 $affected = DB::table('data_posts_send')
                                  ->where('id', $this->postid)
                                  ->update(['status_post' => 2,'error'=>$response->message]);
                     return [
                       "status"=>402,
                       "zaloid"=>$rq->zaloid,
                       "message"=>"Đã xảy ra lỗi, vui lòng thử lại sau!!"
                   ];
               }else{
                 $affected = DB::table('data_posts_send')
                                  ->where('id', $this->postid)
                                  ->update(['status_post' => 2,'error'=>$response->message]);
                  return [
                       "status"=>402,
                       "zaloid"=>$rq->zaloid,
                       "message"=>"Đã xảy ra lỗi, vui lòng thử lại sau!!"
                   ];
               }
            }
           //return $response;

     }

 








}
