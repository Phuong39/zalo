<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\postCategory;
use App\Models\listpostModel;
use App\Models\data_post_send;
use App\Models\schedule_post;
use App\Models\idpostfb;
use Auth;
use App\Jobs\ProcessPostZalo;

class post_api extends Controller
{   
	const PER_PAGE   = 10;
   protected $token;
    public function listAllPost(Request $request){

         $checkToken   = $this->checkRequestTokenViaApiApp($request->token);
           if($checkToken == true){
              
                if(!empty($request->type)){
                    $params = ['user_id'=>$request->user_id,'page'=>$request->page,'type'=>$request->type];
                      $dataResponse = $this->listPostApiByType($params);
                }else{
                      $params = ['user_id'=>$request->user_id,'page'=>$request->page];
                      $dataResponse = $this->listPostApiApp($params);
                }

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

    public static function listPostApiByType($params)
    {
      // type = 0 (profile), type = 1 OA 
         $type  = $params['type'];
         if($type == 'profile'){
           $nextPage    = $params['page'];
            $limitPage   = self::PER_PAGE * $nextPage;
            $offset      = ($nextPage - 1) * self::PER_PAGE;
            $listPost = DB::table('list_post')->where('user_id',$params['user_id'])->where('status',0)->latest()->offset($offset)->limit($limitPage)->paginate(self::PER_PAGE);
            $result =array(
               'status'  => 200,
                'message' => "Thành công",
                'data'  =>$listPost
               
            );
         }else if($type == 'oa'){
            $nextPage    = $params['page'];
            $limitPage   = self::PER_PAGE * $nextPage;
            $offset      = ($nextPage - 1) * self::PER_PAGE;
            $listPost = DB::table('list_post')->where('user_id',$params['user_id'])->where('status',1)->latest()->offset($offset)->limit($limitPage)->paginate(self::PER_PAGE);
            $result =array(
               'status'  => 200,
                'message' => "Thành công",
                'data'  =>$listPost
               
            ); 
         }else{
            $result =array(
                 'status'  => 404,
                  'message' => "kiểu dữ liệu không đúng!!!",
                 
              ); 
         }

        
        
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
                 $data = array([
                        'id'=> $category->id,
                        'name'=> $category->name
                    ]);
                return [
                    'status'  => 200,
                    'message' => 'Cập nhật danh mục thành công.',
                    'data' =>[
                      'data' =>$data
                    ]
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
                    $data->status  = 0;
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
                     $data->status  = 0;
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
                 $data->status  = 1;
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
                    $data->status  = 1;
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

    // public function sendPostApiByType(Request $request){
    //   //var_dump($request->type);
    //          $checkToken = $this->checkRequestTokenViaApiApp($request->token);
    //        if($checkToken == true){
    //               if($request->type == 'message'){
    //                  if($request->zalo_id == '' || $request->type == '' || $request->message == ''){
    //                           return [
    //                                     'status'  => 404,
    //                                     'message' => 'Đã có lỗi xảy ra, Vui lòng thử lại',
    //                                 ];
    //                     }else{

    //                        $node = $request->zalo_id;
    //                        $type = $request->type;
    //                        $params['message'] = $request->message;
                          
    //                        $result = $this->post($node,$params,$type);
    //                     }
                     
    //                }else if($request->type == 'link'){
    //                    if($request->zalo_id == '' || $request->type == '' || $request->links == ''){
    //                           return [
    //                                     'status'  => 404,
    //                                     'message' => 'Đã có lỗi xảy ra, Vui lòng thử lại',
    //                                 ];
    //                     }else{
                           
    //                         $node = $request->zalo_id;
    //                         $type = $request->type;
    //                         $params['message'] = $request->message;
    //                         $params['link'] = $request->links;

    //                         $result = $this->post($node,$params,$type);

    //                     }
                      
    //                }else{

    //                    return [
    //                             'status'  => 404,
    //                             'message' => 'Kiểu bài đăng không đúng !!',
    //                         ];

    //                }

             

    //        }else{

    //             return response()->json([
    //                 'status'  => 404,
    //                 'message' => 'Token không hợp lệ',
    //             ]);
    //          }
    //       //return response()->json($result);
    // }


     public function sendPostApiByType(Request $request){
       //dd($request->link);die();
       $checkToken = $this->checkRequestTokenViaApiApp($request->token);
       $token =$request->token;
       $array_zalo_id =$request->zalo_id;

      $user_id = $request->user_id;
     

         if($checkToken == true){
         // $sendPost = new data_post_send;
               $type= $request->type;

               //dd($request->all());die();
               //$dataPost = new Category;
               switch ($type) {
                case "message": 
                 $link = '';
                 $mieuta = '';
                 $tacgia = '';
                 $title = '';
                 $video = '';
                 $image = '';
                    foreach ($array_zalo_id as $key => $value) {
                         $dataInsert = [
                            'content'   => $request->message,
                            'type'      => $request->type,
                            'zalo_id'   => $value,
                            "user_id"   => $user_id,
                             'type'     => $request->type,
                        ];
                        $sendPost = data_post_send::create($dataInsert); 

                        
                        ProcessPostZalo::dispatch($request->message, $request->type, $value ,$request->token,$sendPost->id,$link,$image,$mieuta,$tacgia,$title,$video)->delay(now()->addMinutes($key)); 
                        ///var_dump($value);      
                    }

                    return [
                              'status'  => 200,
                              'message' => 'Đăng bài thành công',
                          ];
                    break;
                case "link":
                      $source = '';
                      $mieuta = '';
                      $tacgia = '';
                      $post_title = '';
                      $video = '';

                      foreach ($array_zalo_id as $key => $value) {
                        
                             $dataInsert = [
                                'content' => $request->content,
                                'type' => $request->type,
                                'zalo_id'   => $value,
                                "user_id"      => $user_id,
                                "link"      => $request->link,
                                "cate_id"      => $request->cate_id,
                            ];
                        $sendPost = data_post_send::create($dataInsert);        
                      ProcessPostZalo::dispatch($request->message, $request->type, $value ,$request->token,$sendPost->id,$request->links,$source,$mieuta,$tacgia,$post_title,$video)->delay(now()->addMinutes($key));
                      
                     
                    }
                        return [
                                    'status'  => 200,
                                    'message' => 'Đăng bài thành công',
                                ];
                    break;
                case "image":
                   // $content, $type, $zaloid,$token,$postid,$link,$image,$mieuta,$tacgia,$title,$video
                    foreach ($array_zalo_id as $key => $value) {
                           $link = '';
                           $video = '';
                             $dataInsert = [
                                'content' => $request->content,
                                'type' => $request->type,
                                'zalo_id'   => $value,
                                "user_id"      => $user_id,
                                "image"      => $request->image,
                                "post_title"      => $request->title,
                                "tacgia"      => $request->tacgia,
                                "mieuta"      => $request->mieuta,
                                "cate_id"      => $request->cate_id,
                            ];
                         $sendPost = data_post_send::create($dataInsert);  
                          $result = explode('\n', $request->message);
                         ProcessPostZalo::dispatch($result, $request->type, $value ,$request->token,$sendPost->id,$link,$request->image,$request->mieuta,$request->tacgia,$request->title,$video)->delay(now()->addMinutes($key));
                      
                     
                    }
                                return [
                                            'status'  => 200,
                                            'message' => 'Đăng bài thành công',
                                        ];
                    break;

                    case "video":
                          foreach ($array_zalo_id as $key => $value) {
                             $link= '';
                             $image = '';
                             $dataInsert = [
                                'content' => $request->content,
                                'type' => $request->type,
                                'zalo_id'   => $value,
                                "user_id"      => $user_id,
                                "link_video"      => $request->video,
                                "post_title"      => $request->title,
                                "tacgia"      => $request->tacgia,
                                "mieuta"      => $request->mieuta,
                                "cate_id"      => $request->cate_id,
                            ];
                            $sendPost = data_post_send::create($dataInsert);
                            $result = explode('\n', $request->message);       
                         ProcessPostZalo::dispatch($result, $request->type, $value ,$request->token,$sendPost->id,$link,$image,$request->mieuta,$request->tacgia,$request->title,$request->video)->delay(now()->addMinutes($key));
                      
                     
                    }
                                return [
                                            'status'  => 200,
                                            'message' => 'Đăng bài thành công',
                                        ];
                     break; 
                default:
                   return [
                                'status'  => 404,
                                'message' => 'Kiểu dữ liệu không đúng !!',
                            ];
                    
            }
            return response()->json($result);

         }else{

                return response()->json([
                    'status'  => 404,
                    'message' => 'Token không hợp lệ',
                ]);
             }
     }

     // public function sendPostApiByType(Request $request){
     //   //dd($request->link);die();
     //   $checkToken = $this->checkRequestTokenViaApiApp($request->token);
     //   $token =$request->token;
     //   $array_zalo_id =$request->zalo_id;

     //  $user_id = $request->user_id;
     

     //     if($checkToken == true){
     //     // $sendPost = new data_post_send;
     //           $type= $request->type;

     //           //dd($request->all());die();
     //           //$dataPost = new Category;
     //           switch ($type) {
     //            case "message": 
     //             $link = '';
     //             $mieuta = '';
     //             $tacgia = '';
     //             $title = '';
     //             $video = '';
     //             $image = '';
     //                foreach ($array_zalo_id as $key => $value) {
     //                     $dataInsert = [
     //                        'content'   => $request->message,
     //                        'type'      => $request->type,
     //                        'zalo_id'   => $value,
     //                        "user_id"   => $user_id,
     //                         'type'     => $request->type,
     //                    ];
     //                    $sendPost = data_post_send::create($dataInsert); 

                        
     //                    ProcessPostZalo::dispatch($request->message, $request->type, $value ,$request->token,$sendPost->id,$link,$image,$mieuta,$tacgia,$title,$video)->delay(now()->addMinutes($key)); 
     //                    ///var_dump($value);      
     //                }

     //                return [
     //                          'status'  => 200,
     //                          'message' => 'Đăng bài thành công',
     //                      ];
     //                break;
     //            case "link":
     //                  $source = '';
     //                  $mieuta = '';
     //                  $tacgia = '';
     //                  $post_title = '';
     //                  $video = '';

     //                  foreach ($array_zalo_id as $key => $value) {
                        
     //                         $dataInsert = [
     //                            'content' => $request->content,
     //                            'type' => $request->type,
     //                            'zalo_id'   => $value,
     //                            "user_id"      => $user_id,
     //                            "link"      => $request->link,
     //                            "cate_id"      => $request->cate_id,
     //                        ];
     //                    $sendPost = data_post_send::create($dataInsert);        
     //                  ProcessPostZalo::dispatch($request->message, $request->type, $value ,$request->token,$sendPost->id,$request->links,$source,$mieuta,$tacgia,$post_title,$video)->delay(now()->addMinutes($key));
                      
                     
     //                }
     //                    return [
     //                                'status'  => 200,
     //                                'message' => 'Đăng bài thành công',
     //                            ];
     //                break;
     //            case "image":
     //               // $content, $type, $zaloid,$token,$postid,$link,$image,$mieuta,$tacgia,$title,$video
     //                foreach ($array_zalo_id as $key => $value) {
     //                       $link = '';
     //                       $video = '';
     //                         $dataInsert = [
     //                            'content' => $request->content,
     //                            'type' => $request->type,
     //                            'zalo_id'   => $value,
     //                            "user_id"      => $user_id,
     //                            "image"      => $request->image,
     //                            "post_title"      => $request->title,
     //                            "tacgia"      => $request->tacgia,
     //                            "mieuta"      => $request->mieuta,
     //                            "cate_id"      => $request->cate_id,
     //                        ];
     //                     $sendPost = data_post_send::create($dataInsert);  
     //                      $result = explode('\n', $request->message);
     //                     ProcessPostZalo::dispatch($result, $request->type, $value ,$request->token,$sendPost->id,$link,$request->image,$request->mieuta,$request->tacgia,$request->title,$video)->delay(now()->addMinutes($key));
                      
                     
     //                }
     //                            return [
     //                                        'status'  => 200,
     //                                        'message' => 'Đăng bài thành công',
     //                                    ];
     //                break;

     //                case "video":
     //                      foreach ($array_zalo_id as $key => $value) {
     //                         $link= '';
     //                         $image = '';
     //                         $dataInsert = [
     //                            'content' => $request->content,
     //                            'type' => $request->type,
     //                            'zalo_id'   => $value,
     //                            "user_id"      => $user_id,
     //                            "link_video"      => $request->video,
     //                            "post_title"      => $request->title,
     //                            "tacgia"      => $request->tacgia,
     //                            "mieuta"      => $request->mieuta,
     //                            "cate_id"      => $request->cate_id,
     //                        ];
     //                        $sendPost = data_post_send::create($dataInsert);
     //                        $result = explode('\n', $request->message);       
     //                     ProcessPostZalo::dispatch($result, $request->type, $value ,$request->token,$sendPost->id,$link,$image,$request->mieuta,$request->tacgia,$request->title,$request->video)->delay(now()->addMinutes($key));
                      
                     
     //                }
     //                            return [
     //                                        'status'  => 200,
     //                                        'message' => 'Đăng bài thành công',
     //                                    ];
     //                 break; 
     //            default:
     //               return [
     //                            'status'  => 404,
     //                            'message' => 'Kiểu dữ liệu không đúng !!',
     //                        ];
                    
     //        }
     //        return response()->json($result);

     //     }else{

     //            return response()->json([
     //                'status'  => 404,
     //                'message' => 'Token không hợp lệ',
     //            ]);
     //         }
     // }
     
//schedule wweb
          public function sendPostApiByTypeWeb(Request $request){
      //var_dump($request->All());die();
       $checkToken = $this->checkRequestTokenViaApiApp($request->token);
       $token =$request->token;
       $array_zalo_id =$request->zalo_id;

      $user_id = $request->user_id;


         if($checkToken == true){
         // $sendPost = new data_post_send;
               $type= $request->type;

               //dd($request->all());die();
               //$dataPost = new Category;
               switch ($type) {
                case "status": 
                 $link = '';
                    
                         $dataInsert = [
                            'content'   => $request->content,
                            'type'      => $request->type,
                            'zalo_id'   => $request->zalo_id,
                            "user_id"   => $user_id,
                             'type'     => $request->type,
                        ];
                        $sendPost = data_post_send::create($dataInsert); 
                        ProcessPostZalo::dispatch($request->message, $request->type, $request->zalo_id ,$request->token,$sendPost->id,$link)->delay(now()->addMinutes(1)); 
                        ///var_dump($value);      


                    return [
                              'status'  => 200,
                              'message' => 'Đăng bài thành công',
                          ];
                    break;
                case "link":
                      $source = '';
                      $mieuta = '';
                      $tacgia = '';
                      $post_title = '';

                    
                        
                             $dataInsert = [
                                'content' => $request->content,
                                'type' => $request->type,
                                'zalo_id'   => $request->zalo_id,
                                "user_id"      => $user_id,
                                "link"      => $request->link,
                                "cate_id"      => $request->cate_id,
                            ];
                        $sendPost = data_post_send::create($dataInsert);        
                      ProcessPostZalo::dispatch($request->message, $request->type, $request->zalo_id ,$request->token,$sendPost->id,$request->links,$source,$mieuta,$tacgia,$post_title)->delay(now()->addMinutes(1));
                      
                     
                   
                        return [
                                    'status'  => 200,
                                    'message' => 'Đăng bài thành công',
                                ];
                    break;
                case "image":

                   
                           $link = '';
                           $video = '';
                             $dataInsert = [
                                'content' => $request->content,
                                'type' => $request->type,
                                'zalo_id'   => $request->zalo_id,
                                "user_id"      => $user_id,
                                "image"      => $request->image,
                                "post_title"      => $request->title,
                                "tacgia"      => $request->tacgia,
                                "mieuta"      => $request->mieuta,
                                "cate_id"      => $request->cate_id,
                            ];
                         $sendPost = data_post_send::create($dataInsert);        
                         ProcessPostZalo::dispatch($request->message, $request->type, $request->zalo_id ,$request->token,$sendPost->id,$link,$request->image,$request->mieuta,$request->tacgia,$request->title)->delay(now()->addMinutes(1));
                      
                     
                    
                                return [
                                            'status'  => 200,
                                            'message' => 'Đăng bài thành công',
                                        ];
                    break;

                    case "video":
                          
                             $link= '';
                             $image = '';
                             $dataInsert = [
                                'content' => $request->content,
                                'type' => $request->type,
                                'zalo_id'   => $request->zalo_id,
                                "user_id"      => $user_id,
                                "link_video"      => $request->video,
                                "post_title"      => $request->title,
                                "tacgia"      => $request->tacgia,
                                "mieuta"      => $request->mieuta,
                                "cate_id"      => $request->cate_id,
                            ];
                            $sendPost = data_post_send::create($dataInsert);        
                         ProcessPostZalo::dispatch($request->message, $request->type, $request->zalo_id ,$request->token,$sendPost->id,$link,$image,$request->mieuta,$request->tacgia,$request->title,$request->video)->delay(now()->addMinutes(1));
                      
                     
                    
                                return [
                                            'status'  => 200,
                                            'message' => 'Đăng bài thành công',
                                        ];
                     break; 
                default:
                   return [
                                'status'  => 404,
                                'message' => 'Kiểu dữ liệu không đúng !!',
                            ];
                    
            }
            return response()->json($result);

         }else{

                return response()->json([
                    'status'  => 404,
                    'message' => 'Token không hợp lệ',
                ]);
             }
     }
     ///
     public function post($node,$params,$type){
     
        
        $res = DB::table('zalo_accounts')->join('user_zaloapp', 'zalo_accounts.zalo_id', '=', 'user_zaloapp.zalo_id')->where('zalo_accounts.zalo_id', $node)->get();

         foreach($res as $row){
            $check_page = $row->page;
            $accessToken = $row->access_token;
         }
          //var_dump($check_page);die();
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

    public function historyProfile(Request $request){
       $checkToken   = $this->checkRequestTokenViaApiApp($request->token);
           if($checkToken == true){
            $params   = [
                    'user_id' => $request->user_id,
                    'page'    => $request->page,
                ];

            $result = $this->historyProf($params); 
            $dataResponse = [
                    'status' => 200,
                    'data'   => $result
                ];
                return response()->json($dataResponse);

           }
            return response()->json([
            'status'  => 401,
            'message' => "Token không hợp lệ.",
            ]);

    }

    public function historyProf($params){

        $nextPage    = $params['page'];
        $limitPage   = self::PER_PAGE * $nextPage;
        $offset      = ($nextPage - 1) * self::PER_PAGE; 
        $data = DB::table('data_posts_send')->join('zalo_accounts', 'zalo_accounts.zalo_id', '=', 'data_posts_send.zalo_id')->where('data_posts_send.user_id',$params['user_id'])->where('data_posts_send.user_id',$params['user_id'])->where('data_posts_send.status',0)->offset($offset)->limit($limitPage)->orderBy('data_posts_send.id','desc')->select('zalo_accounts.image','zalo_accounts.name','data_posts_send.content','data_posts_send.post_title','data_posts_send.type','data_posts_send.status_post','data_posts_send.error','data_posts_send.created_at')->paginate(self::PER_PAGE);

        return $data;

       
    }

      public function historyOA(Request $request){
       $checkToken   = $this->checkRequestTokenViaApiApp($request->token);
           if($checkToken == true){
            $params   = [
                    'user_id' => $request->user_id,
                    'page'    => $request->page,
                ];

            $result = $this->history($params); 
            $dataResponse = [
                    'status' => 200,
                    'data'   => $result
                ];
                return response()->json($dataResponse);

           }
            return response()->json([
            'status'  => 401,
            'message' => "Token không hợp lệ.",
            ]);

    }

     public function history($params){

        $nextPage    = $params['page'];
        $limitPage   = self::PER_PAGE * $nextPage;
        $offset      = ($nextPage - 1) * self::PER_PAGE; 
         $data = DB::table('data_posts_send')->join('zalo_accounts', 'zalo_accounts.zalo_id', '=', 'data_posts_send.zalo_id')->where('data_posts_send.user_id',$params['user_id'])->where('data_posts_send.status',1)->offset($offset)->limit($limitPage)->orderBy('data_posts_send.id','desc')->select('zalo_accounts.image','zalo_accounts.name','data_posts_send.content','data_posts_send.post_title','data_posts_send.type','data_posts_send.status_post','data_posts_send.error','data_posts_send.created_at')->paginate(self::PER_PAGE);

        return $data;
    }

    public function schedule_profile(Request $rq){
      $checkToken   = $this->checkRequestTokenViaApiApp($rq->token);
         if($checkToken == true){
            $params   = [
                    'user_id' => $rq->user_id,
                    'content'    => json_encode($rq->content),
                    'cateId'    => $rq->cateID,
                    'type'    => $rq->type,
                    'title'    => $rq->title,
                    'id_profile'    => $rq->id_profile,
                    'time_start'    => $rq->time_start,
                    'time_end'    => $rq->time_end,
                ];

            $result = $this->schedulePostProfile($params); 
            // $dataResponse = [
            //         'status' => 200,
            //         'data'   => $result
            //     ];
                return $result;

           }
            return response()->json([
            'status'  => 401,
            'message' => "Token không hợp lệ.",
            ]);
    }

    public function schedulePostProfile($params){
      // var_dump($params['type']);die();
      if($params['type'] == 'message' || $params['type'] == 'status'){
         $type = 0;
         $type_post = 'status';
      }else if($params['type'] == 'link'){
           $type = 0;
           $type_post = 'link';
      }else if($params['type'] == 'image'){
           $type = 1;
           $type_post = 'image';
      }else if($params['type'] == 'video'){
           $type = 1;
           $type_post = 'video';
      }else{
         return [
            'status'  => 404,
            'message' => "Kiểu dữ liệu không đúng!."
            ];
      }
      foreach ($params['id_profile'] as $row) {
 
               $dataInsert = new schedule_post;
              $dataInsert->content = $params['content'];
              $dataInsert->type_post  = $type_post;
              $dataInsert->id_profile =  $row;
              $dataInsert->user_id = $params['user_id'];
              $dataInsert->cateId =  $params['cateId'];
              $dataInsert->time_start = $params['time_start'];
              $dataInsert->time_end = $params['time_end'];
              $dataInsert->type =  $type;
              $dataInsert->stop = 0;
               $dataInsert->save();

         }
         if($dataInsert->id){
           return [
            'status'  => 200,
            'message' => "Thêm lịch đăng bài thành công."
            ];
         }else{
            return [
            'status'  => 404,
            'message' => "Đã xảy ra lỗi , vui lòng thử lại sau!."
            ];
         }
         
         
         }

    public function listScheduleProf(Request $rq){
      $checkToken   = $this->checkRequestTokenViaApiApp($rq->token);
       if($checkToken == true){
          $params   = [
                    'user_id' => $rq->user_id,
                    'page'    => $rq->page,
                ];

            $result = $this->dataScheduleProf($params); 
            $dataResponse = [
                    'status' => 200,
                    'data'   => $result
                ];
                return response()->json($dataResponse);
       }
        return response()->json([
            'status'  => 401,
            'message' => "Token không hợp lệ.",
            ]);
    }


    public function listScheduleOA(Request $rq){
      $checkToken   = $this->checkRequestTokenViaApiApp($rq->token);
       if($checkToken == true){
          $params   = [
                    'user_id' => $rq->user_id,
                    'page'    => $rq->page,
                ];

            $result = $this->dataScheduleOA($params); 
            $dataResponse = [
                    'status' => 200,
                    'data'   => $result
                ];
                return response()->json($dataResponse);
       }
        return response()->json([
            'status'  => 401,
            'message' => "Token không hợp lệ.",
            ]);
    }

    public function updateschedule(Request $rq){
        $checkToken   = $this->checkRequestTokenViaApiApp($rq->token);
         if($checkToken == true){
            $params   = [
                    'user_id' => $rq->user_id,
                    'id'    => $rq->id,
                    'status'    => $rq->status,
                ];

            $result = $this->updateScheduleAll($params); 
            // $dataResponse = [
            //         'status' => 200,
            //         'data'   => $result
            //     ];
                return $result;
         }
         return response()->json([
            'status'  => 401,
            'message' => "Token không hợp lệ.",
            ]);
    }

    public function deleteschedule(Request $rq){
        $checkToken   = $this->checkRequestTokenViaApiApp($rq->token);
        if($checkToken == true){

           $params   = [
                    'user_id' => $rq->user_id,
                    'id'    => $rq->id
                ];

            $result = $this->deleteScheduleByid($params); 
          
                return $result;
           
        }
         return response()->json([
            'status'  => 401,
            'message' => "Token không hợp lệ.",
            ]);
    }

    static function deleteScheduleByid($params){
         $check = schedule_post::where('id',$params['id'])->first();
         if(isset($check)){
              $data = schedule_post::where('id',$params['id'])->delete();
              return [
                "status"=>200,
                "message"=>"Xóa lịch đăng thành công !"
              ];
         }else{
          return [
            "status"=>404,
            "message"=>"lịch đăng không tồn tại !"
          ];
         }
    }

    static function updateScheduleAll($params){
      if($params['status'] == 0 || $params['status'] == 1){
        $check = schedule_post::where('id',$params['id'])->first();
        if(isset($check)){
          $data = new schedule_post;
          $arr['stop'] = $params['status'];
          $data::where('id',$params['id'])->update($arr);
          $datanew = DB::table('schedule_post')->join('zalo_accounts', 'zalo_accounts.zalo_id', '=', 'schedule_post.id_profile')->where('schedule_post.user_id',$params['user_id'])->where('zalo_accounts.user_id',$params['user_id'])->where('schedule_post.id',$params['id'])->select('schedule_post.*','zalo_accounts.image','zalo_accounts.name')->get();
         
          return [
            "status"=>200,
            "data"=>[
              "data"=>$datanew
            ]
           ];
        }else{
          return [
          "status"=>404,
          "message"=>"lịch đăng không tồn tại !"
        ];
        }
        

      }else{
        return [
          "status"=>404,
          "message"=>"Kiểu trạng thái không đúng"
        ];
      }
        
    }

    static function dataScheduleProf($params){
        $nextPage    = $params['page'];
        $limitPage   = self::PER_PAGE * $nextPage;
        $offset      = ($nextPage - 1) * self::PER_PAGE; 
         $data = DB::table('schedule_post')->join('zalo_accounts', 'zalo_accounts.zalo_id', '=', 'schedule_post.id_profile')->where('schedule_post.user_id',$params['user_id'])->where('schedule_post.type',0)->offset($offset)->limit($limitPage)->orderBy('schedule_post.id','desc')->select('schedule_post.*','zalo_accounts.image','zalo_accounts.name')->paginate(self::PER_PAGE);

        return $data;
    }

    static function dataScheduleOA($params){
        $nextPage    = $params['page'];
        $limitPage   = self::PER_PAGE * $nextPage;
        $offset      = ($nextPage - 1) * self::PER_PAGE; 
         $data = DB::table('schedule_post')->join('zalo_accounts', 'zalo_accounts.zalo_id', '=', 'schedule_post.id_profile')->where('schedule_post.user_id',$params['user_id'])->where('schedule_post.type',1)->offset($offset)->limit($limitPage)->orderBy('schedule_post.id','desc')->select('schedule_post.*','zalo_accounts.image','zalo_accounts.name')->paginate(self::PER_PAGE);

        return $data;
    }

    public function schedulePostWeb(Request $rq){

      $res = DB::table('user_zaloapp')->where('user_id',$rq->user_id)->where('zalo_id', $rq->id_profile)->get();

            foreach($res as $row){
              $this->check_page = $row->page;
              $this->accessToken = $row->access_token;
           }
       $accessToken = $this->getAccessToken($this->accessToken);
        $data = json_decode($rq->content);
        
         if($rq->type_post == 'status'){
          
              $dataInsert = [
                            'content'   => $data->message,
                            'type'      => 'status',
                            'zalo_id'   => $rq->id_profile,
                            "user_id"   => $rq->user_id,
                            "post_title"   => $data->post_title,
                            "cate_id"   => $data->cateId,
                            "status"      => 0,
                            "status_post"  => 0,
                        ];
            $sendPost = data_post_send::create($dataInsert);
            $this->postid =  $sendPost->id;
            $pre = "access_token=".$accessToken."&message=".$data->message."";
            $response = $this->sendPostStatus($pre,$this->postid);
            $send = $this->saveStatusPost($response,$this->postid,$rq->id_profile);
             return $send;
         }else if($rq->type_post == 'link'){
              $dataInsert = [
                                'content' => $data->message,
                                'type' => 'link',
                                'zalo_id'   => $rq->id_profile,
                                "user_id"      => $rq->user_id,
                                "post_title"   => $data->post_title,
                                "link"      => $rq->link,
                                "cate_id"      => $data->cateId,
                                "status"      => 0,
                                "status_post"      => 0,
                            ];
                $sendPost = data_post_send::create($dataInsert);
                $this->postid =  $sendPost->id;

                $pre = "access_token=".$accessToken."&message=".$data->message."&link=".$data->link."";
                $response = $this->sendPostStatus($pre,$this->postid);
                $send = $this->saveStatusPost($response,$this->postid,$rq->id_profile);
                 return $send;
                
         }else if($rq->type_post == 'image'){
         
               $dataInsert = [
                                'content' => json_encode($data->message),
                                'type' => $rq->type_post,
                                'zalo_id'   => $rq->id_profile,
                                "user_id"      => $rq->user_id,
                                "image"      => $data->source,
                                "post_title"      => $data->title,
                                "tacgia"      => $data->tacgia,
                                "mieuta"      => $data->mieuta,
                                "cate_id"      => $data->cateId,
                                "status"      => 1,
                                "status_post"      => 0,
                            ];
                         $sendPost = data_post_send::create($dataInsert);
                          $this->postid =  $sendPost->id;

                           $params['message'] = $data->message;
                            $params['url'] = $data->source;
                            $params['mieuta'] = $data->mieuta;
                            $params['tacgia'] = $data->tacgia;
                            $params['tieude'] = $data->title;

                         $response = $this->postFanpage($rq->id_profile,$params,$rq->type_post,$this->accessToken);
                         
                         $send = $this->saveStatusPostOA($response,$this->postid,$rq->id_profile,$rq->type_post);
                         return $send;
         }else if($rq->type_post == 'video'){
            $dataInsert = [
                                'content' => json_encode($data->message),
                                'type' => $rq->type_post,
                                'zalo_id'   => $rq->id_profile,
                                "user_id"      => $rq->user_id,
                                "link_video"      => $rq->file_url,
                                "post_title"      => $data->title,
                                "tacgia"      => $data->tacgia,
                                "mieuta"      => $data->mieuta,
                                "cate_id"      => $data->cateId,
                                "status"      => 1,
                                "status_post"      => 0,
                            ];
            $sendPost = data_post_send::create($dataInsert);
            $this->postid =  $sendPost->id; 
             $params['message'] = $data->message;
              $params['file_url'] = $data->link_video;
              $params['mieuta'] = $data->mieuta;
              $params['tacgia'] = $data->tacgia;
              $params['tieude'] = $data->title;
              $response = $this->postFanpage($rq->id_profile,$params,$rq->type_post,$this->accessToken);
               $send = $this->saveStatusPostOA($response,$this->postid,$rq->id_profile,$rq->type_post);
         }
    }

    static function sendPostStatus($pre, $postid){
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
       

          

    }

    static function saveStatusPost($response,$postid,$zaloid){
      if(!empty($response->id)){
              $affected = DB::table('data_posts_send')
                                  ->where('id', $postid)
                                  ->update(['status_post' => 1]);
               return [
                   "status"=>200,
                   "zaloid"=>$zaloid,
                   "message"=>"Đăng bài thành công!"
               ];
            }else if(!empty($response->error)){
               if($response->error == 12010){
                 $affected = DB::table('data_posts_send')
                                  ->where('id', $postid)
                                  ->update(['status_post' => 2,'error'=>'Tài khoản đã đăng quá giới hạn 1 ngày!']);
                   return [
                     "status"=>401,
                     "zaloid"=>$zaloid,
                     "message"=>"Tài khoản đã đăng quá giới hạn 1 ngày!!"
                   ];
               }else if($response->error == 10000){
                 $affected = DB::table('data_posts_send')
                                  ->where('id', $postid)
                                  ->update(['status_post' => 2,'error'=>$response->message]);
                     return [
                       "status"=>402,
                       "zaloid"=>$zaloid,
                       "message"=>"Đã xảy ra lỗi, vui lòng thử lại sau!!"
                   ];
               }else{
                 $affected = DB::table('data_posts_send')
                                  ->where('id', $postid)
                                  ->update(['status_post' => 2,'error'=>$response->message]);
                  return [
                       "status"=>402,
                       "zaloid"=>$zaloid,
                       "message"=>"Đã xảy ra lỗi, vui lòng thử lại sau!!"
                   ];
               }
            }

    }

    static function saveStatusPostOA($response,$postid,$zaloid,$type){
         if($type == 'image'){
             if($response->error == 0){
                $affected = DB::table('data_posts_send')
                                  ->where('id', $postid)
                                  ->update(['status_post' => 1]);
               return [
                   "status"=>200,
                   "zaloid"=>$zaloid,
                   "message"=>"Đăng bài thành công!"
               ];
            }else{
               $affected = DB::table('data_posts_send')
                                  ->where('id', $postid)
                                  ->update(['status_post' => 2,'error'=>$response->message]);
               return [
                   "status"=>402,
                   "zaloid"=>$zaloid,
                   "message"=>"Đã xảy ra lỗi, vui lòng thử lại sau!!"
               ];
            }
         }else if($type == 'video'){
            if($response->error == -201){
                $affected = DB::table('data_posts_send')
                                  ->where('id', $postid)
                                  ->update(['status_post' => 1]);
               return [
                   "status"=>200,
                   "zaloid"=>$zaloid,
                   "message"=>"Đăng bài thành công!"
               ];
            }
         }
           



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

    public function schedulePostFBWeb(Request $rq){

     $result = $this->checktoken($rq->token);

      if (!empty($result['error'])) {
        return[
                 'status' => 'error',
                 'message' => 'Token bạn nhập không hoạt động.'
              ];
      }

      $url="https://graph.facebook.com/v7.0/".$rq->fb_id."/feed?fields=full_picture,message,admin_creator&limit=".$rq->number."&access_token=".$rq->token."&debug=all&format=json&method=get&pretty=0&suppress_http_code=1&transport=cors";

       $array_page = $this->getpostpage($url);
        
       $data = DB::table('vp_users')->where('id',$rq->user_id)->select('remember_token')->get();
        foreach ($data as $key => $value) {
            $token = $value->remember_token;
          }
        $zaloid = json_decode($rq->zalo_id);
        $tacgia = '';
        $mieuta = '';
        $link = '';
        $file_url = '';
  
        foreach ($array_page as $key => $value) {
            $message =explode("\n", $value->message);
           
           
          for ($i=0; $i < count($zaloid); $i++){
            $content = str_replace("\n",".",$value->message);
            $title =substr($content, 0, 68);
               $dataInsert = [
                    'content' => json_encode($message),
                    'type' => 'image',
                    'zalo_id'   => $zaloid[$i],
                    "user_id"      => $rq->user_id,
                    "image"      => $value->full_picture,
                    "post_title"      => $title,
                    "tacgia"      => $tacgia,
                    "mieuta"      => $mieuta,
                    "cate_id"      => null,
                    "status"      => 1,
                    "status_post"      => 0,
                ];
             $sendPost = data_post_send::create($dataInsert);
             
             ProcessPostZalo::dispatch($message, 'image', $zaloid[$i] ,$token,$sendPost->id,$link,$value->full_picture,'*',$tacgia,$title,$file_url)->delay(now()->addMinutes($key));
          }
        }


    }

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

      public function getpostpage($url){
          $curl = curl_init();
          curl_setopt_array($curl, array(
          
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
         
    



}

