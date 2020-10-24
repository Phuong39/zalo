<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\chatbot_Model;
class apiChatbot extends Controller
{
	  const PER_PAGE   = 10;
	 public function postAddChatbot(Request $request)
    {

            $checkToken = $this->checkTokenIsvalid($request->token);
             if($checkToken == true){

                $statusResponse = $this->createChatbot($request->all());

             }else{

                return response()->json([
                    'status'  => 404,
                    'message' => 'Token không hợp lệ',
                ]);
             }

            return response()->json($statusResponse);

    }

    public function listChatbotById(Request $request)
    {

            $checkToken = $this->checkTokenIsvalid($request->token);
            if($checkToken == true){
                $params   = [
                    'user_id' => $request->user_id,
                    'id_oa' => $request->id_oa,
                    'page'    => $request->page,
                ];
                $data = $this->apiGetAllChatbotById($params);
                $dataResponse = [
                    'status' => 200,
                    'data'   => $data
                ];
                return response()->json($dataResponse);
            }
                return response()->json([
                    'status'  => 404,
                    'message' => 'Token không hợp lệ',
                ]);

    }

    public static function apiGetAllChatbotById($params)
    {
        $nextPage    = $params['page'];
        $limitPage   = self::PER_PAGE * $nextPage;
        $offset      = ($nextPage - 1) * self::PER_PAGE; 
        $category = DB::table('chatbot')->where('user_id',$params['user_id'])->where('id_oa',$params['id_oa'])->offset($offset)->limit($limitPage)->paginate(self::PER_PAGE);
        return $category;
    }

     public static function createChatbot($parameters)
    {
        
        $data = new chatbot_Model;
        $data->id_oa = $parameters['id_oa'];
        $data->user_id  = $parameters['user_id'];
        $data->keyword  = $parameters['keyword'];
        $data->reply  = $parameters['reply'];
        
        $data->save();

        if(isset($data)){
            return [
                'status'  => 200,
                'message' => 'Thêm cấu hình thành công',
            ];
        }
            return [
                'status'  => 404,
                'message' => 'Đã có lỗi xảy ra, Vui lòng thử lại',
            ];
    }

    public function updateChatbot(Request $request)
    {
       
          $checkToken = $this->checkTokenIsvalid($request->token);
             if($checkToken == true){

                 $parameters     = [
                 'user_id' => $request->user_id,
                'id_oa'      => $request->id_oa,
                'id'      => $request->id,
                'keyword'    => $request->keyword,
                'reply'    => $request->reply,

            ];

            $statusResponse = $this->updateChatbotById($parameters);
             }else{

                return response()->json([
                    'status'  => 404,
                    'message' => 'Token không hợp lệ',
                ]);
             }
           
            return response()->json($statusResponse);

    }

  public static function updateChatbotById($parameters)
    {
       
        if($parameters){
            $category = chatbot_Model::where('id',$parameters['id'])->first();
            if(isset($category)){
                $category->user_id = $parameters['user_id'];
                $category->id_oa = $parameters['id_oa'];
                $category->keyword = $parameters['keyword'];
                $category->reply = $parameters['reply'];
                
                $category->update();
                return [
                    'status'  => 200,
                    'message' => 'Cập nhật cấu hình chatbot thành công.'
                ];
            }
            return [
                'status'  => 404,
                'message' => 'Không có chatbot nào trên hệ thống.'
            ];
        }
    }

     public function deleteChatbot(Request $request)
    {
         $checkToken = $this->checkTokenIsvalid($request->token);
             if($checkToken == true){

            $id = $request->id;
            $check = DB::table('chatbot')->where('id', $id)->first();
	            if(isset($check)){
	            	$statusResponse = $this->deleteAllChatbot($id);
	            }else{
	            	return response()->json([
                    'status'  => 404,
                    'message' => 'Không có thông tin chatbot bạn yêu cầu !!',
                ]);
	            }
            

             }else{

                return response()->json([
                    'status'  => 404,
                    'message' => 'Token không hợp lệ',
                ]);
             }
          
            return response()->json($statusResponse);
       
    }

    public static function deleteAllChatbot($id)
    {
        if($id){
            $account = DB::table('chatbot')->where('id',$id)->delete();
            return [
                'status'  => 200,
                'message' => 'Xóa chatbot thành công.',
            ];
        }
    }


      public static function checkTokenIsvalid($token)
	    {
	        $check = DB::table('vp_users')->where('remember_token',$token)->count();
	        if($check >0){
	            return true;
	        }
	            return false;
	    }



}
