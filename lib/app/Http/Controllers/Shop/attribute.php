<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\User_Model;

class attribute extends Controller
{
	protected $status;
	protected $role_page;
    public function index(){

    	if(!Auth::user()){
           return redirect()->intended('/');

         }else{
             $id = Auth::user()->id;
             $checkad = DB::table('vp_users')->where('id',$id)->get();
             foreach ($checkad as $key => $value) {
               $status = $value->status;
               $userid = $value->userid;
               $role_page = json_decode($value->role_page);
             }
             $data['status'] = $status;
             $data['role_page'] = $role_page;
             if($status != 1){

              $data['list']= User_Model::where('user_id',$id)->where('page',1)->orderBy('id','desc')->get();

            }else{

              $data['list']= User_Model::where('user_id',$userid)->where('page',1)->orderBy('id','desc')->get();

            }

             return view('shop.attribute',$data);
         }
    	
    }

    public function loadattribute(Request $request){
        $id_page = json_decode($request->id_oa);
		$data = array();
		$n = -1;

		foreach ($id_page as $key => $value) {
			$infor_user = $this->getZaloAccountById($value);
			$token = $this->getZaloById($value);
			$data_type = $this->curlLoadAttributeType($token[0]->access_token);
			$data_attr = $this->curlLoadAttribute($token[0]->access_token);
			foreach ($data_type as $key => $value) {
				$n++;
				$data[$n]['id'] = $value->id;
				$attr = '';
				foreach ($data_attr as $key1 => $value1) {
					if ($value->id == $value1->type) {
						$attr .= $value1->name.',';
					}
				}
				$attr = rtrim($attr, ',');
				$data[$n]['name'] = $value->name;
				$data[$n]['attr'] = $attr;
				$data[$n]['name_page'] = $infor_user[0]->name;
			}
		}
		$twigData['data'] = $data;
		var_dump($twigData['data']);die();
    }

    public function getZaloAccountById($fbid,$userid = null){
        if(Auth::user()){
            $id = Auth::user()->id;
        }else{
           return redirect()->intended('/'); 
        }
        $data = DB::table('vp_users')->where('id',$id)->first();
        if($data->status != 1){
          $res = DB::table('zalo_accounts')->where('user_id',$id)->where('zalo_id',$fbid)->get();
        }else{
          $res = DB::table('zalo_accounts')->where('user_id',$data->userid)->where('zalo_id',$fbid)->get();
        }
        return $res;
    }
   
   public function getZaloById($id_zalo){
        $id = Auth::user()->id;
        $data = DB::table('vp_users')->where('id',$id)->first();
        if($data->status != 1){
           $res = DB::table('user_zaloapp')->where('user_id',$id)->where('zalo_id',$id_zalo)->get();
        }else{
           $res = DB::table('user_zaloapp')->where('user_id',$data->userid)->where('zalo_id',$id_zalo)->get();
        }
        
        return $res;
    }

  public function curlLoadAttributeType($token){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://openapi.zalo.me/v2.0/store/product/getsliceattributetype?access_token=".$token,
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
		return $response->data->attributes;
	}

	public function curlLoadAttribute($token){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://openapi.zalo.me/v2.0/store/product/getsliceattribute?access_token=".$token."&offset=0&limit=50",
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
		var_dump($response);die();
		return $response->data->attributes;
	}


}
