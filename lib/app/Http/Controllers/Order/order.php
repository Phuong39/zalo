<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User_Model;
use DB;

class order extends Controller
{
   protected $token;
   protected $name;
   protected $image;
   protected $quantity;
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

           
             return view('order.index',$data);
         }
   	
   }

   public function getDataOrderOa(Request $rq){
         $data = DB::table('user_zaloapp')->where('zalo_id',$rq->id_oa)->select('access_token')->get();
         foreach ($data as $key => $value) {
            $token = $value->access_token;
         }
         $limit = 10;
        $send = $this->apiDataOrder($token,$limit);
        var_dump($send);
        $check = json_decode($send);
         // dd($check->data->orders);die();
         $html = '';
        foreach ($check->data->orders as $key => $value) {
          
           foreach ($value->order_items as $m => $row) {
             $name = $row->name;
             $image = $row->image;
             $quantity =$row->quantity;
           }
           $arr = json_decode(json_encode($value->customer,true));
           
          $html .=' <tr>';
          $html .= '<td><input type="checkbox" class="selectepageprofile checkallfanpage" value="'.$value->id.'" style="display: block;"><label for="checkbox-'.$value->id.'"></label></td>';
          $html .='<td>'.$key.'</td>';
          $html .= '<td><span style="color: #008fe5;">'.$value->code.'</span><br/><span>'.date('m/d/Y', $value->created_time).'</span></td>';
          $html .= '<td style="color: #008fe5;">'.$name.'</td>';
          $html .= '<td><strong style="color: #2c3436;">'.number_format($value->total_amount).' VND</strong></td>';
          $html .= '<td><strong style="color: #2c3436;">'.number_format($value->shipping->shipping_fee).' VNĐ</strong><br/><span>'.$value->shipping->courier_name.'</span></td>';
          $html .= '<td>'.$value->shipping->receiver_name.'<br/><span>'.$value->shipping->receiver_phone.'</span></td>';
          if($value->status == 1){
            $html .= '<td style="color:#0f9d58;">Đơn hàng mới</td>';
          }else if($value->status == 3){
             $html .= '<td style="color:#0c74bb;">Đã xác nhận</td>';
          }else if($value->status == 6){
             $html .= '<td style="color:#d00;">Hủy bởi Khách</td>';
          }else if($value->status == 2){
                $html .= '<td style="color:#eda21b;">Đang xử lý</td>';
          }else if($value->status == 7){
              $html .= '<td style="color:#d00;">Chuyển hoàn</td>';
          }else if($value->status == 4){
              $html .= '<td style="color:#d00;">Đang giao hàng</td>';
          }else{
             $html .= '<td style="color:#d00;">Hủy bởi Shop</td>';
          }
          if($value->payment->method){
             $html .= '<td>Thanh toán khi nhận hàng </td>';
          }else{
             $html .= '<td>Không xác định! </td>';
          }
         
          $html .= '<td><a href="https://zalov2.phanmemninja.com/order/getOrder/'.$value->id.'/'.$rq->id_oa.'" title="Clear logs" class="btn btn-primary "><i class="fa fa-eye" aria-hidden="true"></i> Chi tiết</a></td>';
           $html .='</tr>';
        }

        echo $html;

        // if($check->error == 0){
        //   return [
        //      'status'  => 200,
        //      'message' => "Lấy danh sách đơn hàng thành công.",
        //      'data'    =>$send
        //   ];
        // }else{
        //   return [
        //      'status'  => 404,
        //      'message' => "Đã xảy ra lỗi, vui lòng thử lại sau.",
        //      'code'    => $check->error
        //   ];
        // }

   }
   public function getDataOrderLimit(Request $rq){
        $data = DB::table('user_zaloapp')->where('zalo_id',$rq->id_offci)->select('access_token')->get();

         foreach ($data as $key => $value) {
            $token = $value->access_token;
         }
         $send = $this->apiDataOrder($token,$rq->limit);
          $check = json_decode($send);
        
         $html = '';
        foreach ($check->data->orders as $key => $value) {
          
           foreach ($value->order_items as $m => $row) {
             $name = $row->name;
             $image = $row->image;
             $quantity =$row->quantity;
           }
           $arr = json_decode(json_encode($value->customer,true));
           
          $html .=' <tr>';
          $html .= '<td><input type="checkbox" class="selectepageprofile checkallfanpage" value="88ea5c2e036bea35b37a" style="display: block;"><label for="checkbox-88ea5c2e036bea35b37a"></label></td>';
          $html .='<td>'.$key.'</td>';
          $html .= '<td><span style="color: #008fe5;">'.$value->code.'</span><br/><span>'.date('m/d/Y', $value->created_time).'</span></td>';
          $html .= '<td style="color: #008fe5;">'.$name.'</td>';
          $html .= '<td><strong style="color: #2c3436;">'.number_format($value->total_amount).' VND</strong></td>';
          $html .= '<td><strong style="color: #2c3436;">'.number_format($value->shipping->shipping_fee).' VNĐ</strong><br/><span>'.$value->shipping->courier_name.'</span></td>';
          $html .= '<td>'.$value->shipping->receiver_name.'<br/><span>'.$value->shipping->receiver_phone.'</span></td>';
           if($value->status == 1){
            $html .= '<td style="color:#0f9d58;">Đơn hàng mới</td>';
          }else if($value->status == 3){
             $html .= '<td style="color:#0c74bb;">Đã xác nhận</td>';
          }else if($value->status == 6){
             $html .= '<td style="color:#d00;">Hủy bởi Khách</td>';
          }else if($value->status == 2){
                $html .= '<td style="color:#eda21b;">Đang xử lý</td>';
          } else if($value->status == 7){
              $html .= '<td style="color:#d00;">Chuyển hoàn</td>';
          }else if($value->status == 4){
              $html .= '<td style="color:#d00;">Đang giao hàng</td>';
          }else{
             $html .= '<td style="color:#d00;">Hủy bởi Shop</td>';
          }
          if($value->payment->method){
             $html .= '<td>Thanh toán khi nhận hàng </td>';
          }else{
             $html .= '<td>Không xác định! </td>';
          }
          $html .= '<td><a href="https://zalov2.phanmemninja.com/order/getOrder/'.$value->id.'/'.$rq->id_offci.'" title="Clear logs" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Chi tiết</a></td>';
           $html .='</tr>';
        }

        echo $html;

   }

   static function apiDataOrder($token,$limit){
        $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://openapi.zalo.me/v2.0/store/order/getorderofoa?access_token='.$token.'&offset=0&limit='.$limit.'',
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
           return $response;
   }

   public function getOrder(Request $rq){
    $data = DB::table('user_zaloapp')->where('zalo_id',$rq->id_oa)->select('access_token')->get();
    foreach ($data as $key => $value) {
      $token = $value->access_token;
    }
      $orderId = $rq->id;
      $getData = $this->getOrderDetail($orderId,$token);
      $decode = json_decode($getData);
      // dd($decode);die();
       if($decode->error == 0){
          $send['shipping'] = $decode->data->shipping;
          if(isset($decode->data->cancel_reason)){
             $send['cancel_reason'] = $decode->data->cancel_reason;
          }
         
          $send['customer'] = $decode->data->customer;
          $send['id']       = $decode->data->id;
          $send['code']       = $decode->data->code;
          $send['status']       = $decode->data->status;
          $send['total_amount']       = $decode->data->total_amount;
          $send['payment']       = $decode->data->payment;
          $send['order_items']       = $decode->data->order_items;
          $send['extra_note']       = $decode->data->extra_note;
          $send['created_time']       = $decode->data->created_time;
          $send['updated_time']       = $decode->data->updated_time;
       }
       // dd($send);die();
      return view('order.orderDetail',$send);


   }

   static function getOrderDetail($orderId,$token){
       $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://openapi.zalo.me/v2.0/store/order/getorder?access_token='.$token.'&id='.$orderId.'',
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
           return $response;
   }

   public function updateStatusOrder(Request $rq){
      
      $params = array();
      if(isset($rq->zaloid)){
         $data = DB::table('user_zaloapp')->where('zalo_id',$rq->zaloid)->select('access_token')->get();
      }
      foreach ($data as $key => $value) {
        $token = $value->access_token;
      }

      $params = [
        'content' => $rq->content,
        'status'  => $rq->status,
        'orderId'  => $rq->orderId,
        'zaloid'   => $rq->zaloid,
        'token'   => $token
      ];
    
       $send = $this->updateOrderById($params);
       $decode = json_decode($send);
       if($decode->error == 0){
          return [
             'status'=> 200,
             'message' => 'Cập nhật trạng thái đơn hàng thành công.'
          ];
       }else{
          return [
            'status'=>404,
            'message' =>'Đã xảy ra lổi, vui lòng thử lại sau.'
          ];
       }
   }

    static function updateOrderById($params){
      if($params['status'] == 6){
         $json ='{
               "id": "'.$params['orderId'].'",
               "status": "'.$params['status'].'",
               "cancel_reason": "'.$params['content'].'",
               "edit_reason": "",
          }';
        }else{
          $json ='{
               "id": "'.$params['orderId'].'",
               "status": "'.$params['status'].'",
               "cancel_reason": "",
               "edit_reason": "",
          }';
        }
        
           $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://openapi.zalo.me/v2.0/store/order/update?access_token='.$params['token'].'',
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


    public function getDataOrderOaV2(Request $rq){

        if(isset($rq->zaloid)){
         $data = DB::table('user_zaloapp')->where('zalo_id',$rq->zaloid)->select('access_token')->get();
        }
        foreach ($data as $key => $value) {
          $token = $value->access_token;
        }
        return [
          'status' => 200,
          'zaloid' => $rq->zaloid,
          'tkn'  => $token
        ];

       
    }
}
