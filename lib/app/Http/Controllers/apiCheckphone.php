<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\dataphoneuser;
class apiCheckphone extends Controller
{
    const PER_PAGE   = 10;
    protected $listphone;
    public function CheckPhone(Request $request){
    	 $checkToken   = $this->checkRequestTokenViaApiApp($request->token);
    	 if($checkToken == true){
            $listphone = rtrim($request->listphone,"\n");
             $dataphone = explode("\n", $listphone);
             $listphoneNew = array_unique($dataphone,0);

            $listphoneNew2 = implode("\n", $listphoneNew);
	         $id_profile = $request->id_profile;
	         $user_id = $request->user_id;

	          $infor_user = DB::table('zalo_accounts')->where('user_id',$user_id)->where('zalo_id',$id_profile)->get();
	        $token =DB::table('user_zaloapp')->where('user_id',$user_id)->where('zalo_id',$id_profile)->get();
	         $emei = $token[0]->emei;
	        $cookie = $token[0]->cookie;
	        $serectkey = $token[0]->serectkey;
	        $result = array(
	            'listphone' => $listphoneNew2,
	            'id_profile' => $id_profile,
	            'emei' =>  $emei,
	            'noidung' => null,
	            'cookie' => $cookie,
	            'serectkey' => $serectkey,
	            'id_user' =>$user_id
	        );
    	 }else{
    	 	return response()->json([
            'status'  => 401,
            'message' => "Token không hợp lệ.",
            ]);
    	 }

        return response()->json($result);

    }

    public function addfriend(Request $request){
       $checkToken   = $this->checkRequestTokenViaApiApp($request->token);
       if($checkToken == true){
         $listphone = rtrim($request->listphone,"\n");
        $id_profile = $request->id_profile;

         $noidung = $request->content;
         //var_dump("sdjfhdshfkds");die();

        $infor_user = $this->getZaloAccountById($id_profile,$request->user_id);
        $token = $this->getZaloById($id_profile,$request->user_id);
        
        $dataphone = explode(' ', $listphone);
        //var_dump($dataphone);die();
        $listphoneNew = array_unique($dataphone,0);
        $phonesend = array();
        $phonesave = array();
        $listphone =array();




         $result = array(
            'code'=>200,
            'listphone' => $dataphone,
            'id_profile' => $id_profile,
            'noidung' => $noidung,
            'emei' => $token[0]->emei,
            'cookie' => $token[0]->cookie,
            'serectkey' => $token[0]->serectkey,
            'id_user' =>$request->user_id
        );
        //var_dump($result);die();
         echo json_encode($result);die;
       }else{
            return response()->json([
            'status'  => 401,
            'message' => "Token không hợp lệ.",
            ]);
         }
       


    }

    public static function checkRequestTokenViaApiApp($token){
        $checkUser = DB::table('vp_users')->where('remember_token',$token)->count();
        if($checkUser > 0){
            return true;
        }
        return false;
    }

     public function getZaloAccountById($fbid,$userid){
       
        $res = DB::table('zalo_accounts')->where('user_id',$userid)->where('zalo_id',$fbid)->get();
        return $res;
    }
    public function getZaloById($id_zalo,$userid){
       
        $res = DB::table('user_zaloapp')->where('user_id',$userid)->where('zalo_id',$id_zalo)->get();
        return $res;
    }
    public function historyaddfriend(Request $request){
      $checkToken   = $this->checkRequestTokenViaApiApp($request->token);
      if($checkToken == true){
       
         $params   = [
                    'user_id' => $request->user_id,
                    'page'    => $request->page,
                ];
         $infor = $this->apiHistoryAddfirend($params);
        $dataResponse = [
                    'status' => 200,
                    'data'   => $infor
                ];
                return response()->json($dataResponse);

      }else{
            return response()->json([
            'status'  => 401,
            'message' => "Token không hợp lệ.",
            ]);
         }

    }

public function phoneload(Request $request){
       $checkToken   = $this->checkRequestTokenViaApiApp($request->token);
       if($checkToken == true){
           $params   = [
                    'user_id' => $request->user_id,
                    'page'    => $request->page,
                ];
                 $infor = $this->apiLoadphone($params);
                 //$countphone = count($infor);
              
                return response()->json($infor);
            

       }else{
            return response()->json([
            'status'  => 401,
            'message' => "Token không hợp lệ.",
            ]);

         }
}

   public function dataphoneuser(Request $request){
        $checkToken   = $this->checkRequestTokenViaApiApp($request->token);

         if($checkToken == true){
           $params   = [
                    'user_id' => $request->user_id,
                    'page'    => $request->page,
                ];

                 $infor = $this->dataphone($params);
              $dataResponse = [
                    'status' => 200,
                    'data'   => $infor
                ];
                return response()->json($dataResponse);

         }else{
            return response()->json([
            'status'  => 401,
            'message' => "Token không hợp lệ.",
            ]);

         }
      }
    public function deletedataphone(Request $request){
         $checkToken   = $this->checkRequestTokenViaApiApp($request->token);
           if($checkToken == true){

           $params   = [
                    'user_id' => $request->user_id,
                    'page'    => $request->page,
                ];

                 $infor = $this->deletephone($params);
                
              $dataResponse = [
                    'status' => 200,
                ];
            return response()->json($dataResponse);

           }else{
            return response()->json([
            'status'  => 401,
            'message' => "Token không hợp lệ.",
            ]);

         }

    }

    public static function deletephone($params){
         $list = DB::table('dataphoneuser')->where('user_id',$params['user_id'])->get();

       
         $listphoneNew =array();
         $datanew = array();
         $data =array();
                      foreach ($list as $key => $value) {
                          $listphone = $value->phone;
                          //var_dump($listphone);die();
                          $listphone = json_decode($listphone);
                          
                          $listphoneNew = $listphone;
                                                
                      }
                      
                     for ($i=0; $i <= $params['page']; $i++) { 
                         unset($listphoneNew[$i]);

                     }
                     foreach ($listphoneNew as $key => $value) {
                         array_push($datanew, $value);
                     }

                     $data = json_encode($datanew);
                 //var_dump($data);
                  $updatephone = dataphoneuser::where('user_id',$params['user_id'])->first();
                    if(isset($updatephone)){
                        $updatephone->phone = $data;
                        $updatephone->update();
                    }
                    return true;

    }

        public static function apiLoadphone($params){
            $nextPage    = $params['page'];
            if($nextPage == 0){
                $limitPage   = self::PER_PAGE * $nextPage;
                 $offset     = $limitPage + 100; 
            }else{
                $limitPage   = (self::PER_PAGE * $nextPage) + 1;
                 $offset     = ($limitPage -1) + 100; 
            }
                
               

                //var_dump($limitPage);die();
                // $category = DB::table('dataaddfriend')->where('user_id',$params['user_id'])->where('user_id',$params['user_id'])->select('id','name')->offset($offset)->limit($limitPage)->paginate(self::PER_PAGE);


                 $list = DB::table('dataphoneuser')->where('user_id',$params['user_id'])->get();

                
                 

                 $listphoneNew =array();
                      foreach ($list as $key => $value) {
                          $listphone = $value->phone;
                         
                           $listphone = json_decode($listphone);
                        
                            if($offset >= count($listphone)){
                                $data = array();
                                foreach ($listphone as $key => $value) {
                                      $data2 = array('phone' => $value, );
                                     array_push($data, $data2);

                                   }

                            }else{
                                for ($i= $limitPage; $i <= $offset; $i++) { 
                                  array_push($listphoneNew, $listphone[$i]);
                               }
                            }
                          
                                                                         
                      }

                    
                      //$phone = json_decode(json)
                      if(!empty($listphoneNew)){
                        
                             $data = array();
                            foreach ($listphoneNew as $key => $value) {
                              $data2 = array('phone' => $value, );
                             array_push($data, $data2);

                           }
                            $countphone = count($listphone);
                             $dataResponse = [
                              'status' => 200,
                              'count' => $countphone,
                              'data'   => $data
                          ];
                      }else{
                        $countphone = count($data);
                         $dataResponse = [
                              'status' => 200,
                              'count' => $countphone,
                              'data'   => $data
                          ];
                      }
                     
                 
                     
                return  $dataResponse;
        }
        public static function dataphone($params){
           
              $list = DB::table('dataphoneuser')->where('user_id',$params['user_id'])->get();
             $listphoneNew =array();
              foreach ($list as $key => $value) {
                  $listphone = $value->phone;

                   $listphone = json_decode($listphone);
                    //var_dump($listphone);die();
                if($params['page'] > count($listphone)){
                      $listphoneNew = $listphone;
                }else{
                    
                  for ($i=0; $i < $params['page']; $i++) { 
                          array_push($listphoneNew, $listphone[$i]);
                       }
                }
                
                 
              }
              
               
              return $listphoneNew;
        }
    public static function apiHistoryAddfirend($params)
    {
        $nextPage    = $params['page'];
        $limitPage   = self::PER_PAGE * $nextPage;
        $offset      = ($nextPage - 1) * self::PER_PAGE; 
        // $category = DB::table('dataaddfriend')->where('user_id',$params['user_id'])->where('user_id',$params['user_id'])->select('id','name')->offset($offset)->limit($limitPage)->paginate(self::PER_PAGE);

        $infor = DB::table('dataaddfriend')->join('zalo_accounts', 'dataaddfriend.id_profile', '=', 'zalo_accounts.zalo_id')->where('dataaddfriend.user_id',$params['user_id'])->where('zalo_accounts.user_id',$params['user_id'])->select('dataaddfriend.*', 'zalo_accounts.name', 'zalo_accounts.image')->offset($offset)->limit($limitPage)->paginate(self::PER_PAGE);
        return $infor;
    }
  
}
