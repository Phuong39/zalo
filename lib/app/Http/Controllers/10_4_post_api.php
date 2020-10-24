<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\postCategory;
use App\Models\listpostModel;
class post_api extends Controller
{   
	const PER_PAGE   = 10;
    public function listAllPost(Request $request){

         $checkToken   = $this->checkRequestTokenViaApiApp($request->token);
           if($checkToken == true){
               $params = ['user_id'=>$request->user_id,'page'=>$request->page];
                $dataResponse = $this->listPostApiApp($params);
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

     public static function listPostApiApp($params)
    {

        $nextPage    = $params['page'];
        $limitPage   = self::PER_PAGE * $nextPage;
        $offset      = ($nextPage - 1) * self::PER_PAGE;
        $listPost = DB::table('list_post')->where('user_id',$params['user_id'])->latest()->offset($offset)->limit($limitPage)->paginate(self::PER_PAGE);
        $result =array(
           'status'  => 200,
            'message' => "Thành công",
            'data'  =>$listPost
           
        );
        
        return $result;
    }

    public function AddCategoryPost(Request $request){

        $checkToken = $this->checkRequestTokenViaApiApp($request->token);
             if($checkToken == true){

                $statusResponse = $this->createCategory($request->all());

             }else{

                return response()->json([
                    'status'  => 404,
                    'message' => 'Token không hợp lệ',
                ]);
             }

            return response()->json($statusResponse);
    }

     public static function createCategory($parameters)
    {
        
         $category = new postCategory;
        $category->name = $parameters['name'];
        $category->user_id  = $parameters['user_id'];
        $category->slug = str_slug($parameters['name']);
        $category->save();

        if(isset($category)){
            return [
                'status'  => 200,
                'message' => 'Thêm mới danh mục thành công',
            ];
        }
            return [
                'status'  => 404,
                'message' => 'Đã có lỗi xảy ra, Vui lòng thử lại',
            ];
    }

    public function listAllCategoryPost(Request $request)
    {

            $checkToken = $this->checkRequestTokenViaApiApp($request->token);
            if($checkToken == true){
               
                if($request->page == 0){
                     $params   = [
                    'user_id' => $request->user_id,
                    'page'    => $request->page,
                    ];
                    $category = $this->apiGetAllCategory($params);

                }else{

                     $params   = [
                    'user_id' => $request->user_id,
                    'page'    => $request->page,
                  ];

                 $category = $this->apiGetAllCategoryByUserId($params);

                }
                
                $dataResponse = [
                    'status' => 200,
                    'data'   => $category
                ];
                return response()->json($dataResponse);
            }
                return response()->json([
                    'status'  => 404,
                    'message' => 'Token không hợp lệ',
                ]);

    }

  public static function apiGetAllCategory($params)
    {
        $data= array();
        $category = DB::table('categorypost')->where('user_id',$params['user_id'])->select('id','name')->get();
        $data['data'] =$category;
        return $data;
    }

     public static function apiGetAllCategoryByUserId($params)
    {
        $nextPage    = $params['page'];
        $limitPage   = self::PER_PAGE * $nextPage;
        $offset      = ($nextPage - 1) * self::PER_PAGE; 
        $category = DB::table('categorypost')->where('user_id',$params['user_id'])->select('id','name')->offset($offset)->limit($limitPage)->paginate(self::PER_PAGE);
        return $category;
    }

    public function updateCategoryPost(Request $request)
    {
       
          $checkToken = $this->checkRequestTokenViaApiApp($request->token);
             if($checkToken == true){

                 $parameters     = [
                 'user_id' => $request->user_id,
                 'id'      => $request->id,
                 'name'    => $request->name,

            ];

            $statusResponse = $this->updateCatgoryById($parameters);
             }else{

                return response()->json([
                    'status'  => 404,
                    'message' => 'Token không hợp lệ',
                ]);
             }
           
            return response()->json($statusResponse);

    }

    public static function updateCatgoryById($parameters)
    {
       
        if($parameters){
            $category = postCategory::where('id',$parameters['id'])->first();
            if(isset($category)){
                $category->name = $parameters['name'];
                $category->user_id = $parameters['user_id'];
                $category->slug = str_slug($parameters['name']);
                $category->update();
                return [
                    'status'  => 200,
                    'message' => 'Cập nhật danh mục thành công.'
                ];
            }
            return [
                'status'  => 404,
                'message' => 'Không có danh mục nào trên hệ thống.'
            ];
        }
    }

     public function deleteCategoryPost(Request $request)
    {
         $checkToken = $this->checkRequestTokenViaApiApp($request->token);
             if($checkToken == true){

            $cate_id         = $request->cate_id;
            $statusResponse = $this->deleteAllCategory($cate_id);

             }else{

                return response()->json([
                    'status'  => 404,
                    'message' => 'Token không hợp lệ',
                ]);
             }
          
            return response()->json($statusResponse);
       
    }

     public static function deleteAllCategory($cate_id)
    {
        if($cate_id){
            $account = postCategory::where('id',$cate_id)->delete();
            return [
                'status'  => 200,
                'message' => 'Xóa danh mục thành công.'
            ];
        }
    }

    // phần api thêm bài viết
   public function addPostByType(Request $request){
       $checkToken = $this->checkRequestTokenViaApiApp($request->token);
             if($checkToken == true){

                $statusResponse = $this->createPost($request->all());

             }else{

                return response()->json([
                    'status'  => 404,
                    'message' => 'Token không hợp lệ',
                ]);
             }

            return response()->json($statusResponse);
   }

   public function createPost($parameters){
          if($parameters['type'] == 'status'){
            if($parameters['title']== '' || $parameters['user_id']== '' || $parameters['cate_id']== '' || $parameters['content']== ''){
                   
                   return [
                        'status'  => 404,
                        'message' => 'Đã có lỗi xảy ra, Vui lòng thử lại',
                    ];
                
                } else{

                     $data = new listpostModel;
                    $data->post_title = $parameters['title'];
                    $data->user_id  = $parameters['user_id'];
                    $data->cate_id  = $parameters['cate_id'];
                    $data->content  = $parameters['content'];
                    $data->type  = $parameters['type'];
                    $data->save();
                    if(isset($data)){
                    return [
                        'status'  => 200,
                        'message' => 'Thêm mới bài viết thành công',
                    ];
                   }

                   
                }
            
            
        }elseif($parameters['type'] == 'link'){
            if($parameters['title']== '' || $parameters['user_id']== '' || $parameters['cate_id']== '' || $parameters['content']== '' || $parameters['link']=''){
                  return [
                            'status'  => 404,
                            'message' => 'Đã có lỗi xảy ra, Vui lòng thử lại',
                        ];
            }else{
               
                    $data = new listpostModel;
                    $data->post_title = $parameters['title'];
                    $data->user_id  = $parameters['user_id'];
                    $data->cate_id  = $parameters['cate_id'];
                    $data->content  = $parameters['content'];
                    $data->link  = $parameters['links'];
                    $data->type  = $parameters['type'];
                    $data->save();
                     if(isset($data)){
                    return [
                        'status'  => 200,
                        'message' => 'Thêm mới bài viết thành công',
                    ];
            }
        }


     }elseif($parameters['type'] == "image"){
        if($parameters['title']== '' || $parameters['user_id']== '' || $parameters['cate_id']== '' || $parameters['content']== '' || $parameters['image']== '' ||$parameters['mieuta'] =='' || $parameters['tacgia']== ''){
                  return [
                            'status'  => 404,
                            'message' => 'Đã có lỗi xảy ra, Vui lòng thử lại',
                        ];
               
        }else{
                $data = new listpostModel;
                $data->post_title = $parameters['title'];
                $data->user_id  = $parameters['user_id'];
                $data->cate_id  = $parameters['cate_id'];
                $data->tacgia  = $parameters['tacgia'];
                $data->mieuta  = $parameters['mieuta'];
                $data->content  = $parameters['content'];
                $data->image  = $parameters['image'];
                $data->type  = $parameters['type'];
                $data->save();
                if(isset($data)){
                return [
                    'status'  => 200,
                    'message' => 'Thêm mới bài viết thành công',
                ];
        }

      }
     }elseif($parameters['type'] == 'video'){
          if($parameters['title']== '' || $parameters['user_id']== '' || $parameters['cate_id']== '' || $parameters['content']== '' || $parameters['video']== '' ||$parameters['mieuta'] =='' || $parameters['tacgia']== ''){

                return [
                            'status'  => 404,
                            'message' => 'Đã có lỗi xảy ra, Vui lòng thử lại',
                        ];

          }else{
               
                     $data = new listpostModel;
                    $data->post_title = $parameters['title'];
                    $data->user_id  = $parameters['user_id'];
                    $data->cate_id  = $parameters['cate_id'];
                    $data->tacgia  = $parameters['tacgia'];
                    $data->mieuta  = $parameters['mieuta'];
                    $data->content  = $parameters['content'];
                    $data->link_video  = $parameters['video'];
                    $data->type  = $parameters['type'];
                    $data->save();
                    if(isset($data)){
                        return [
                            'status'  => 200,
                            'message' => 'Thêm mới bài viết thành công',
                        ];
                    }

          }

     }
       

        

   }
  // api xoa bai viet
  public function deletePostById(Request $request)
    {
         $checkToken = $this->checkRequestTokenViaApiApp($request->token);
             if($checkToken == true){

            $post_id         = $request->post_id;
            $statusResponse = $this->deleteById($post_id);

             }else{

                return response()->json([
                    'status'  => 404,
                    'message' => 'Token không hợp lệ',
                ]);
             }
          
            return response()->json($statusResponse);
       
    }

     public static function deleteById($post_id)
    {
        if($post_id){
            $account = listpostModel::where('id',$post_id)->delete();
            return [
                'status'  => 200,
                'message' => 'Xóa danh mục thành công.'
            ];
        }
    }
    
    // api sua bai viet
    public function updatePostById(Request $request)
    {
       
          $checkToken = $this->checkRequestTokenViaApiApp($request->token);
             if($checkToken == true){

            $statusResponse = $this->updateById($request->all());
             }else{

                return response()->json([
                    'status'  => 404,
                    'message' => 'Token không hợp lệ',
                ]);
             }
           
            return response()->json($statusResponse);

    }

    public static function updateById($parameters)
    {
       
        if($parameters){
            $data = listpostModel::where('id',$parameters['id'])->get();
            if(isset($data)){
                   foreach ($data as $key => $value) {
                      $type = $value->type;

                   }

                   switch ($type) {
                        case 'status':
                               if($parameters['title']== '' || $parameters['cate_id']== '' || $parameters['content']== ''){
                               
                               return [
                                    'status'  => 404,
                                    'message' => 'Đã có lỗi xảy ra, Vui lòng thử lại',
                                ];
                            
                            } else{

                                 $data = new listpostModel;
                                $arr['post_title'] = $parameters['title'];
                                $arr['cate_id']  = $parameters['cate_id'];
                                $arr['content']  = $parameters['content'];
                                $data::where('id',$parameters['id'])->update($arr);
                                if(isset($data)){
                                return [
                                    'status'  => 200,
                                    'message' => 'Cập nhật bài viết thành công',
                                ];
                               }

                               
                            }
                            break;

                        case "link":
                              if($parameters['title']== '' || $parameters['cate_id']== '' || $parameters['content']== '' || $parameters['link']=''){
                                      return [
                                                'status'  => 404,
                                                'message' => 'Đã có lỗi xảy ra, Vui lòng thử lại',
                                            ];
                                }else{
                                   
                                        $data = new listpostModel;
                                        $arr['post_title'] = $parameters['title'];
                                        $arr['cate_id']  = $parameters['cate_id'];
                                        $arr['content']  = $parameters['content'];
                                        $arr['link']  = $parameters['links'];
                                        $data::where('id',$parameters['id'])->update($arr);
                                         if(isset($data)){
                                        return [
                                            'status'  => 200,
                                            'message' => 'Cập nhật bài viết thành công',
                                        ];
                                }
                            }

                            break;

                        case "image":
                              
                               if($parameters['title']== '' || $parameters['cate_id']== '' || $parameters['content']== '' || $parameters['image']== '' ||$parameters['mieuta'] =='' || $parameters['tacgia']== ''){
                                  return [
                                            'status'  => 404,
                                            'message' => 'Đã có lỗi xảy ra, Vui lòng thử lại',
                                        ];
                                       
                                }else{
                                        $data = new listpostModel;
                                        $arr['post_title'] = $parameters['title'];
                                        $arr['cate_id']  = $parameters['cate_id'];
                                        $arr['tacgia']  = $parameters['tacgia'];
                                        $arr['mieuta']  = $parameters['mieuta'];
                                        $arr['content']  = $parameters['content'];
                                        $arr['image']  = $parameters['image'];
                                        $data::where('id',$parameters['id'])->update($arr);
                                        if(isset($data)){
                                        return [
                                            'status'  => 200,
                                            'message' => 'Cập nhật bài viết thành công',
                                        ];
                                }

                              }

                            break;

                        case "video":
                           if($parameters['title']== '' || $parameters['cate_id']== '' || $parameters['content']== '' || $parameters['video']== '' ||$parameters['mieuta'] =='' || $parameters['tacgia']== ''){

                                return [
                                            'status'  => 404,
                                            'message' => 'Đã có lỗi xảy ra, Vui lòng thử lại',
                                        ];

                          }else{
                               
                                     $data = new listpostModel;
                                    $arr['post_title'] = $parameters['title'];
                                    $arr['cate_id']  = $parameters['cate_id'];
                                    $arr['tacgia']  = $parameters['tacgia'];
                                    $arr['mieuta']  = $parameters['mieuta'];
                                    $arr['content']  = $parameters['content'];
                                    $arr['link_video']  = $parameters['video'];
                                    $data::where('id',$parameters['id'])->update($arr);
                                    if(isset($data)){
                                        return [
                                            'status'  => 200,
                                            'message' => 'Cập nhật bài viết thành công',
                                        ];
                                    }

                          }

                        break;

                        default:
                           return [
                                'status'  => 404,
                                'message' => 'Đã có lỗi xảy ra, Vui lòng thử lại',
                            ];
                    }

              }
             }
            
        }

        //--------------------------------------- api đăng bài -------------------------------------------
               //đăng bài phần zalo cá nhân
    public function sendPostApiByType(Request $request){
             $checkToken = $this->checkRequestTokenViaApiApp($request->token);
           if($checkToken == true){
                  if($request->type == 'message'){
                     if($request->zalo_id == '' || $request->type == '' || $request->message == ''){
                              return [
                                        'status'  => 404,
                                        'message' => 'Đã có lỗi xảy ra, Vui lòng thử lại',
                                    ];
                        }else{

                           $node = $request->zalo_id;
                           $type = $request->type;
                           $params['message'] = $request->message;
                          
                           $result = $this->post($node,$params,$type);
                        }
                     
                   }else if($request->type == 'link'){
                       if($request->zalo_id == '' || $request->type == '' || $request->links == ''){
                              return [
                                        'status'  => 404,
                                        'message' => 'Đã có lỗi xảy ra, Vui lòng thử lại',
                                    ];
                        }else{
                           
                            $node = $request->zalo_id;
                            $type = $request->type;
                            $params['message'] = $request->message;
                            $params['link'] = $request->links;

                            $result = $this->post($node,$params,$type);

                        }
                      
                   }else{

                       return [
                                'status'  => 404,
                                'message' => 'Kiểu bài đăng không đúng bạn ơi !!',
                            ];

                   }

             

           }else{

                return response()->json([
                    'status'  => 404,
                    'message' => 'Token không hợp lệ',
                ]);
             }
          return response()->json($result);
    }

     public function post($node,$params,$type){
     
        
        $res = DB::table('zalo_accounts')->join('user_zaloapp', 'zalo_accounts.zalo_id', '=', 'user_zaloapp.zalo_id')->where('zalo_accounts.zalo_id', $node)->get();
         foreach($res as $row){
            $check_page = $row->page;
            $accessToken = $row->access_token;
         }
        if ($check_page == 0) {

            if ($type == 'message' || $type == 'link') {

               $data = $this->postMe($node,$params,$type,$accessToken);
               //var_dump($data);die();
            }
            
        } else {
            if ($postType == 'image' || $postType == 'video') {
                $data = $this->postFanpage($node,$params,$type,$accessToken);
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
    // phần đăng bài zalo OA



}

