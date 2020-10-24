<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\product_model;
use App\Models\User_Model;
use App\Http\Requests\AddListPostRequest;

class Product extends Controller
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

           
             return view('shop.product',$data);
         }

    	
    	
    }

    public function dongbo(Request $request){
    	 if(Auth::user()){
            $id = Auth::user()->id;
        }else{
           return redirect()->intended('/'); 
        }
         $id_page = json_decode($request->id_oa);

         foreach ($id_page as $key => $value) {
			$infor_user = $this->getZaloAccountById($value);
			$token = $this->getZaloById($value);
			$data = $this->curlloadproduct($token[0]->access_token);
			
			// $this->db->where('userid',(int)$this->currentUser['user_id']);
			// $this->db->delete('product');

			foreach ($data->data->products as $key1 => $value1) {
				$check = product_model::where('id_product',$value1->id)->delete();
                  $data = new product_model;
			        $data->id_product = $value1->id;
			        $data->user_id = $id;
			        $data->id_industry = $value1->industry;
			        $data->sku = $value1->code;
			        $data->id_page = $value;
			        $data->categories = json_encode($value1->categories);
			        $data->name = $value1->name;
			        $data->price = $value1->price;
			        $data->description = $value1->description;
			        $data->photos = json_encode($value1->photos);
			        $data->image_default = json_encode($value1->photo_links);
			        $data->status = $value1->status;
			        $data->review_status = $value1->review_status;
			        // $data->attribute_type_info = json_encode($value1->attribute_type_info);
			        // $data->variations = json_encode($value1->variations);
			        $data->package_size = json_encode($value1->package_size);
			        $data->save();

				
			}
		}
    }

    public function loadproduct(Request $request){
    	 if(Auth::user()){
            $id = Auth::user()->id;
        }else{
           return redirect()->intended('/'); 
        }

		$id_page = json_decode($request->id_oa);
		$product = array();
		$n = -1;
		foreach ($id_page as $key => $value) {
			$infor_user = $this->getZaloAccountById($value);
			$token = $this->getZaloById($value);

			// $this->Product_Model->setid_page($value);
			// $this->Product_Model->setuserid((int)$this->currentUser['user_id']);
			// $data = $this->Product_Model->get();
			$data = product_model::where('user_id',$id)->where('id_page',$value)->get();

			//$category = $this->curlLoadCategory($token[0]->access_token);

			if (!empty($data)) {
				foreach ($data as $key1 => $value1) {
					$n++;
					$product[$n]['id_product'] = $value1->id_product;
					$product[$n]['id'] = $value1->id;
					$product[$n]['sku'] = $value1->sku;
					$product[$n]['name'] = $value1->name;
					$product[$n]['price'] = $value1->price;
					$product[$n]['status'] = $value1->status;
					$product[$n]['review_status'] = $value1->review_status;
					$image_default = json_decode($value1->image_default);
					$product[$n]['image'] = $image_default[0];
					$name_category = '';
					$category_product = json_decode($value1->categories);
					// foreach ($category as $key2 => $value2) {
					// 	foreach ($category_product as $key3 => $value3) {
					// 		if ($value2->id == $value3) {
					// 			$name_category .= $value2->name.',';
					// 		}
					// 	}
					// }
					$name_category = rtrim($name_category,',');
					$product[$n]['name_category'] = $name_category;
				}
			}
			// var_dump($product);die;
		}
		$twigData['data'] = $product;
		$html = '';
		foreach ($twigData['data'] as $key => $value) {
			
			$html .= '<tr>';
			$html .= '<td>';
			$html .= '<input type="checkbox" class="selectepageprofile checkallfanpage" value="'.$value['id_product'].'" style="display: block;">';
			$html .= '<label for="checkbox-'.$value['id_product'].'"></label>';
			$html .= '</td>';
			$html .= '<td>'.$value['id'].'</td>';
			$html .= '<td>'.$value['sku'].'</td>';
			$html .= '<td><img src="'.$value['image'].'" style="width: 45px;height: 45px" class="img-responsive"></td>';
			$html .= '<td>'.$value['name'].'</td>';
			$html .= '<td>'.number_format($value['price']).'VND</td>';
			$html .= '<td>'.$value['name_category'].'</td>';
             if($value['status'] == 'show'){
             	$html .= '<td>Hiện</td>';
             }else{
             	$html .= '<td>Ẩn</td>';
             }
			
            if($value['review_status'] == 'approve'){
            	$html .= '<td style="color: #0f9d58;">Duyệt</td>';
            }else {
            	$html .= '<td>Không xác định</td>';
            }
			

			$html .= '<td>';
			$html .= '<a href="#" title="Clear logs" class="btn btn-primary " onclick="updateproduct('.$value['id'].')"  data-toggle="modal" data-target="#addnew"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Sửa</a>';
			$html .= '</td>';
			$html .= '</tr>';

		}
		 echo $html;
		// <tr>
		// 	{% if data is empty %}
		// 		Không có dữ liệu
		// 	{%endif%}
		// 	<td>
		// 		<input type='checkbox' class='checkbox checkbox-style check-product' name='checkbox[]' id='checkbox-{{ log.id_product }}'  value='{{ log.id_product }}' />
		// 		<label for='checkbox-{{ log.id_product }}'></label>
		// 	</td>
		// 	<td>{{ loop.index }}</td>
		// 	<td>{{ log.sku }}</td>
		// 	<td><img src="{{ log.image }}" style="width: 45px;height: 45px" class="img-responsive"></td>
		// 	<td>{{ log.name }}</td>
		// 	<td>{{ log.price }}</td>
		// 	<td>{{ log.name_category }}</td>
		// 	<td>{{ log.status }}</td>
		// 	<td>{{ log.review_status }}</td>
		// 	<td>
		// 		<a href="#" title="Clear logs" class="btn btn-primary " onclick="updateproduct({{ log.id }})"  data-toggle="modal" data-target="#addnew"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>{{ l("Sửa") }}</a>
		// 	</td>
		// </tr>
	}



     public function getZaloAccountById($fbid,$userid = null){
        if(Auth::user()){
            $id = Auth::user()->id;
        }else{
           return redirect()->intended('/'); 
        }
        $res = DB::table('zalo_accounts')->where('user_id',$id)->where('zalo_id',$fbid)->get();
        return $res;
    }
   
   public function getZaloById($id_zalo){
        $id = Auth::user()->id;
        $res = DB::table('user_zaloapp')->where('user_id',$id)->where('zalo_id',$id_zalo)->get();
        return $res;
    }

    public function curlloadproduct($token){
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://openapi.zalo.me/v2.0/store/product/getproductofoa?access_token=".$token."&offset=0&limit=50",
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
		return $response;
	}

	public function addProduct(Request $rq){
       return view('shop.addProduct');
	}

	public function addNewProduct(Request $rq){
      

	}

	public function uploadImg(AddListPostRequest $rq){
		list($check) = explode("/", $rq->data);
		if($check == "data:image"){
			list($type, $data) = explode(';', $rq->data);
			list(, $data)      = explode(',', $rq->data);
			$data = base64_decode($data);
			$file_name='images/upload/image'.time().rand(0, 1000).'.png';
			file_put_contents($file_name, $data);
			array_push($arr_image_unlink,$file_name);
			if($string_image==""){
				$string_image='{"url": "'.$http.$file_name.'"}';
			}
			else{
				$string_image.=',{"url": "'.$http.$file_name.'"}';
			}
		}
      // $extension = $rq->data->getClientOriginalName();
      dd($string_image);
	}

	static function addproductv2($param, $token){
		$curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://openapi.zalo.me/v2.0/store/product/create?access_token=<ACCESS_TOKEN>",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $param,
          CURLOPT_HTTPHEADER => array(
            "content-type: application/json"
          ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
	}

	public function getAccountOA(Request $rq){
        if(Auth::user()){
            $id = Auth::user()->id;
        }else{
           return redirect()->intended('/'); 
        }
       $data = User_Model::where('user_id',$id)->where('page',1)->orderBy('id','desc')->get();
       return $data;
	}

}
