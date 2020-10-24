<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Category;
class list_category extends Controller
{
    const PER_PAGE   = 10;
   public function listAllCategory(Request $request)
    {

            $checkToken = $this->checkTokenIsvalid($request->token);
            if($checkToken == true){
                if($request->page == 0){
                   $params   = [
                    'user_id' => $request->user_id,
                    'page'    => $request->page,
                ];
                //$category =aray();
                $category = $this->apiGetAllCategoryAccount($params);

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

    // Thêm category
     public function postAddCategory(Request $request)
    {

            $checkToken = $this->checkTokenIsvalid($request->token);
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
        
         $category = new Category;
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

//end add category

// edit category

 public function updateCategory(Request $request)
    {
       
          $checkToken = $this->checkTokenIsvalid($request->token);
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
            $category = Category::where('id',$parameters['id'])->first();
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
                    'data' => [
                        'data'=>$data
                    ]
                ];
            }
            return [
                'status'  => 404,
                'message' => 'Không có danh mục nào trên hệ thống.'
            ];
        }
    }
 //end edit category

//delete category
    public function deleteCategory(Request $request)
    {
         $checkToken = $this->checkTokenIsvalid($request->token);
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
            $account = Category::where('id',$cate_id)->delete();
            return [
                'status'  => 200,
                'message' => 'Xóa danh mục thành công.'
            ];
        }
    }

 //end delete Category


     public static function checkTokenIsvalid($token)
    {
        $check = DB::table('vp_users')->where('remember_token',$token)->count();
        if($check >0){
            return true;
        }
            return false;
    }

    public static function apiGetAllCategoryByUserId($params)
    {
        $nextPage    = $params['page'];
        $limitPage   = self::PER_PAGE * $nextPage;
        $offset      = ($nextPage - 1) * self::PER_PAGE; 
        $category = DB::table('vp_categories')->where('user_id',$params['user_id'])->where('user_id',$params['user_id'])->select('id','name')->offset($offset)->limit($limitPage)->paginate(self::PER_PAGE);
        return $category;
    }

    public static function apiGetAllCategoryAccount($params)
    {
       $data =array();
        $category = DB::table('vp_categories')->where('user_id',$params['user_id'])->where('user_id',$params['user_id'])->select('id','name')->get();
        $data['data'] =$category;
        return $data;
    }

}
