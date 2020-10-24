<?php

namespace App\Http\Controllers\Chatbot;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User_Model;
use App\Models\chatbot_Model;
use Auth;
use DB;
class chatbot extends Controller
{
    protected $status;
    protected $userid;
    protected $role_page;
    public function getChatbot(){
         
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

            
             return view('chatbot.chatbot',$data);
         }

         
    }

    public function postChatbot(AddcateRequest $request){
    	 $chatbot = new Category;
        $chatbot->name = $request->name;
        $chatbot->slug = str_slug($request->name);
        $chatbot->save();
        return back();
    }

    public function getAccountById(Request $request){
         $id = Auth::user()->id;
        $id_oa = $request->id_offci;

        $res = DB::table('chatbot')->where('id_oa',$id_oa)->where('user_id',$id)->get();
       // var_dump($res);die();
        
        $row = $res->result();
        $result['data'] = $row;
        //var_dump($result);

      
    }

public function get(Request $request){
    if(Auth::user()){
        $user_id = Auth::user()->id;
    }else{
        return redirect()->intended('/');
    }
        $id = $request->id_offci;

         $checkad = DB::table('vp_users')->where('id',$user_id)->get();
             foreach ($checkad as $key => $value) {
               $status = $value->status;
               $userid = $value->userid;
             }
             if($status != 1){
               $res = DB::table('chatbot')->where('user_id',$user_id)->where('id_oa',$id)->get();
             }else{
                $res = DB::table('chatbot')->where('user_id',$userid)->where('id_oa',$id)->get();
             }

       
        //$res = DB::table('chatbot')->where('user_id',$user_id)->where('id_oa',$id)->get();
        $data = $res;
       $html='';
       foreach ($data as $key => $row) {
          $html .='<tr>
                  <th>
                     <input type="checkbox" class="selectepageprofile checkallfanpage" data-type="fanpage" value="'.$row->id.'" style="display: block;">
                      </th>
                      <th scope="row">'.$row->id.'</th>
                      <td>'.$row->keyword.'</td>
                      <td>'.$row->reply.'</td>
                      <td>
                        <button type="button" class="btn btn-success  btn-sm" data-toggle="modal" data-target="#modal_chatbot_edit" data-id="'.$row->id.'"onclick="changeChatbot(this)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button>
                      </td>
                    </tr>';
            }
       
    echo $html;

        
    }

    public function add(Request $request){
        if(Auth::user()){
            $id = Auth::user()->id;
        }else{
            return redirect()->intended('/');
        }

         $checkad = DB::table('vp_users')->where('id',$id)->get();
             foreach ($checkad as $key => $value) {
               $status = $value->status;
               $userid = $value->userid;
             }
        if($status != 1){
          $id_oa = $request->id_chatbot;
          $keywordclient = $request->keywordclient;
          $keywordoa = $request->keywordoa;
          $data = new chatbot_Model;
              $data->keyword = $keywordclient;
              $data->reply = $keywordoa;
              $data->id_oa = $id_oa;
              $data->user_id  = $id;
              $data->save();
       return [
                    'status'  => 200,
                    'message' => 'Thêm cấu hình chatbot thành công.'
                ];
      
        }else{

          $id_oa = $request->id_chatbot;
          $keywordclient = $request->keywordclient;
          $keywordoa = $request->keywordoa;
          $data = new chatbot_Model;
              $data->keyword = $keywordclient;
              $data->reply = $keywordoa;
              $data->id_oa = $id_oa;
              $data->user_id  = $userid;
              $data->save();
         return [
                      'status'  => 200,
                      'message' => 'Thêm cấu hình chatbot thành công.'
                  ];
      

        }
        
      }

      public function getInfoChatbotAjax(Request $request){
          $id= $request->id;
         $result = DB::table('chatbot')->where('id',$id)->get();
         $apps = array();

        foreach ($result as $app) {
            $apps = array(
                "id"        => $app->id,
                "keyword"   => $app->keyword,
                "reply"     => $app->reply,
            );
        }
        $arr=array(
            "status"=> 200,
            'data' =>$apps


        );
        
        return response()->json($arr);
      }

      public function updateChatbot(Request $request){
        
           $keywordclient = $request->keywordclient;
           $keywordoa = $request->keywordoa;
           $id_offci = $request->id_offci;
           $id = $request->id;
          
           $data =DB::table('chatbot')->where('id',$id);
             if(!empty($data)){
                $arr['keyword'] = $keywordclient;
                $arr['reply'] = $keywordoa;
                $arr['id_oa'] = $id_offci;
                $data = DB::table('chatbot')->where('id',$id)->update($arr);
                $result = array(
                     'status' => 200,
                    'message' => "Cập nhật cấu hình chatbot thành công!",
                );
                
               
             }
             return response()->json($result);
      }

      public function deleteAll(Request $request){
          $arr = $request->arr_select;
          foreach ($arr as $key => $value) {
            $account = chatbot_Model::where('id',$value)->delete();
          }
          return [
                    'status'  => 200,
                    'message' => 'xóa thành công!',
                ];
      }

           



}
