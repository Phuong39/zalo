<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class search_api extends Controller
{   const PER_PAGE   = 10;
    public function searchCategoryById(Request $request)
    {
          $checkToken = $this->checkTokenIsvalid($request->token);
            if($checkToken == true){
                $params   = [
                    'cate_id' => $request->cate_id,
                    'user_id' => $request->user_id,
                    'page'    => $request->page,
                    'type'    => $request->type,
                ];
                if($request->type == 'profile'){
                    $accountById = $this->apiSearchCategoryById($params);
                    $dataResponse = [
                    'status' => 200,
                    'data'   => $accountById
                  ];
                  return response()->json($dataResponse);
                }else if($request->type == 'oa'){
                      $accountById = $this->apiSearchCategoryByIdOA($params);
                      $dataResponse = [
                      'status' => 200,
                      'data'   => $accountById
                    ];
                    return response()->json($dataResponse);  
                }else{
                    $dataResponse = [
                      'status' => 404,
                      'message'   => "sai kiểu dữ liệu!!!"
                    ];
                    return response()->json($dataResponse);
                }
               

            }
             return response()->json([
                    'status'  => 404,
                    'message' => 'Token không hợp lệ',
                ]);
    }
  
           
           

     public static function checkTokenIsvalid($token)
    {
        $check = DB::table('vp_users')->where('remember_token',$token)->count();
        if($check >0){
            return true;
        }
            return false;
    }

    public static function apiSearchCategoryById($params)
    {
        $nextPage    = $params['page'];
        $limitPage   = self::PER_PAGE * $nextPage;
        $offset      = ($nextPage - 1) * self::PER_PAGE; 
        $accountById = DB::table('zalo_accounts')->where('user_id',$params['user_id'])->where('cate_id',$params['cate_id'])->where('page',0)->offset($offset)->limit($limitPage)->paginate(self::PER_PAGE);
        return $accountById;
    }

    public static function apiSearchCategoryByIdOA($params)
    {
        $nextPage    = $params['page'];
        $limitPage   = self::PER_PAGE * $nextPage;
        $offset      = ($nextPage - 1) * self::PER_PAGE; 
        $accountById = DB::table('zalo_accounts')->where('user_id',$params['user_id'])->where('cate_id',$params['cate_id'])->where('page',1)->offset($offset)->limit($limitPage)->paginate(self::PER_PAGE);
        return $accountById;
    }

}
