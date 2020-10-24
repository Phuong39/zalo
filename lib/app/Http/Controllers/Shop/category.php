<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User_Model;
use DB;

class category extends Controller
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

           
             return view('shop.category',$data);
         }

    	
    }

    public function loadCategory(Request $request){
		$id_page = json_decode($request->id_oa);
		$data = array();
		$n = -1;
		foreach ($id_page as $key => $value) {
			$infor_user = $this->getZaloAccountById($value);
			$token = $this->getZaloById($value);
			$category = $this->curlLoadCategory($token[0]->access_token);
			if (!empty($category)) {
				
				foreach ($category as $key1 => $value1) {
					$n++;
					$data[$n]['id'] = $value1->id;
					$data[$n]['name'] = $value1->name;
					$data[$n]['description'] = $value1->description;
					$data[$n]['status'] = $value1->status;
					$data[$n]['photo_link'] = $value1->photo_link;
					$data[$n]['fanpage'] = $infor_user[0]->name;
					$data[$n]['id_page'] = $value;
				}
			}
		}
		$twigData['data'] = $data;
		$html = '';
		
         foreach ($twigData['data'] as $key =>$value) {
         	
         	$html .= '<tr>';
         	$html .= '<td>'.$value['id'].'</td>';
         	$html .= '<td><img src="'.$value['photo_link'].'" style="width: 45px;height: 45px" class="img-responsive"></td>';
         	$html .= '<td>'.$value['name'].'</td>';
         	$html .= '<td>'.$value['description'].'</td>';
         	$html .= '<td>'.$value['status'].'</td>';
         	$html .= '<td>'.$value['fanpage'].'</td>';
         	$html .= '<td>';
         	$html .= '<a href="#" title="Clear logs" class="btn btn-primary" data-toggle="modal" data-target="#editcategoryv2" onclick="loadcategorybyid()"> <i class="fa fa-pencil-square-o" aria-hidden="true" ></i>Sửa</a>';
         
         	$html .= '</td>';
         	$html .= '</tr>';
         	
         }

        echo $html;
		
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

    public function curlLoadCategory($token){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://openapi.zalo.me/v2.0/store/category/getcategoryofoa?access_token=".$token,
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
		return $response->data->categories;
	}



}
