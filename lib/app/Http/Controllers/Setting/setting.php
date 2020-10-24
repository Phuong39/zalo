<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\users_business;
use App\Models\Acc_business;

class setting extends Controller
{
    protected $jsonv2;
    public function index(){

       if(Auth::user()){
          $id = Auth::user()->id;

        }else{
          return redirect()->intended('/');
        }

      $data['account'] = Acc_business::where('user_id',$id)->select('User','MaCongTy','Domain','LoaiTaiKhoan','id')->get();
    	return view('setting.index',$data);
    }

    public function loginApiDomain(Request $rq){
    	if(Auth::user()){
        	$id = Auth::user()->id;

        }else{
        	return redirect()->intended('/');
        }
          $json = '{
				"User": "'.$rq->user.'",
				"Password": "'.$rq->pass.'",
				"MaCongTy": "'.$rq->macty.'",
				"Domain": "'.$rq->domain.'",
				"LoaiTaiKhoan": "'.$rq->loatk.'"
				}';

		 $checklogin = $this->apiLoginDomain($json);
		 $check = json_decode($checklogin);
		 if($check->code == 1){
       $update_actCode = $this->updateCode($id);
      $addAcc = $this->addAccount($rq->user, $rq->pass, $rq->macty, $rq->domain, $rq->loatk);
		 	$addInfor = $this->addInforUser($checklogin,$id);
		 	 $check2 = json_decode(json_encode($addInfor,true));
		 	 if($check2->status == 200){
		 	 	return [
	               "status" => 200,
	               "message" => "Đăng nhập thành công."
			 	 ];
		 	 }
		 	
		 }else{
		 	return [
              "status" => 404,
              "message" =>"Đã xảy ra lỗi, xin vui lòng thử lại!"
		 	];
		 }
     }


    static function apiLoginDomain($json){
    	$curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://bvtm.drkhai.com/api/AppService/Login",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $json,
          CURLOPT_HTTPHEADER => array(
            "content-type: application/json"
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
    
    static function updateCode($id){
       $affected = DB::table('vp_users')
              ->where('id', $id)
              ->update(['act_code' => 1]);
       return 'ok';
    }

    static function addAccount($user, $pass, $macty, $domain, $loatk){
      if(Auth::user()){
          $id = Auth::user()->id;

        }else{
          return redirect()->intended('/');
        }
        $check = Acc_business::where('User',$user)->where('user_id',$id)->first();
         if(isset($check)){
              $data = [
                  'User' => $user,
                  'Password' => $pass,
                  'MaCongTy' => $macty,
                  'Domain'   => $domain,
                  'LoaiTaiKhoan' => $loatk
              ];
              $affected = DB::table('acc_business')
              ->where('user_id', $id)
              ->where('User', $user)
              ->update($data);
              
                return [
                          "status"=>200,
                           "message"=>"update thành công"
                      ];

         }else{
             $data2 = new Acc_business;
              $data2->user_id =$id;
              $data2->User = $user;
              $data2->Password = $pass;
              $data2->MaCongTy = $macty;
              $data2->Domain = $domain;
              $data2->LoaiTaiKhoan = $loatk;
              $data2->save();
              if($data2->id){
                return [
                          "status"=>200,
                           "message"=>"Thêm thành công"
                      ];
              }
         }
        
    }

    static function addInforUser($checklogin,$id){
        $json = json_decode($checklogin);
        $decode  = json_decode(json_encode($json->data,true));
         $check = users_business::where('NguoiDungID',$decode->NguoiDungID)->where('user_id',$id)->first();
         if(isset($check)){
             $data = [
              'user_id' => $id,
              'sid' => $decode->sid,
              'Username' => $decode->Username,
              'NguoiDungID' => $decode->NguoiDungID,
              'UserPhongBanID' => $decode->UserPhongBanID,
              'TenPhongBan' => $decode->TenPhongBan,
              'AllID' => $decode->AllID,
              'IsCongTy' => $decode->IsCongTy,
              'IsChiNhanh' => $decode->IsChiNhanh,
              'Email' => $decode->Email,
              'SoDienThoai' => $decode->SoDienThoai,
              'Avartar' => $decode->Avartar,
              'UrlReportArb' => $decode->UrlReportArb
             ];
             $affected = DB::table('users_business')
              ->where('NguoiDungID', $decode->NguoiDungID)
              ->where('user_id', $id)
              ->update($data);
              
              	return [
                          "status"=>200,
                           "message"=>"update thành công"
                    	];
              
              
            
         }else{

         	$data2 = new users_business;
              $data2->user_id =$id;
              $data2->sid = $decode->sid;
              $data2->Username = $decode->Username;
              $data2->NguoiDungID = $decode->NguoiDungID;
              $data2->UserPhongBanID = $decode->UserPhongBanID;
              $data2->TenPhongBan = $decode->TenPhongBan;
              $data2->AllID = $decode->AllID;
              $data2->IsCongTy = $decode->IsCongTy;
              $data2->IsChiNhanh = $decode->IsChiNhanh;
              $data2->Email = $decode->Email;
              $data2->SoDienThoai = $decode->SoDienThoai;
              $data2->Avartar = $decode->Avartar;
              $data2->UrlReportArb = $decode->UrlReportArb;
              $data2->save();
              if($data2->id){
              	return [
                          "status"=>200,
                           "message"=>"Thêm thành công"
                    	];
              }
         }
        	

        
              
           
    }

    public function loginStep2(Request $rq){
        if(Auth::user()){
          $id = Auth::user()->id;

        }else{
          return redirect()->intended('/');
        }

      $data = Acc_business::where('id',$rq->id)->where('user_id',$id)->get();
       foreach ($data as $key => $value) {
           $jsonv2 = '{
          "User": "'.$value->User.'",
          "Password": "'.$value->Password.'",
          "MaCongTy": "'.$value->MaCongTy.'",
          "Domain": "'.$value->Domain.'",
          "LoaiTaiKhoan": "'.$value->LoaiTaiKhoan.'"
          }';
          
       }
       $checklogin = $this->apiLoginDomain($jsonv2);
        $check = json_decode($checklogin);
       if($check->code == 1){
         $addInfor = $this->addInforUser($checklogin,$id);
         $check2 = json_decode(json_encode($addInfor,true));
          if($check2->status == 200){
          return [
                   "status" => 200,
                   "message" => "Đăng nhập thành công."
           ];
         }
       }else{
           return [
              "status" => 404,
              "message" =>"Đã xảy ra lỗi, xin vui lòng thử lại!"
           ];
       }

    }
}
