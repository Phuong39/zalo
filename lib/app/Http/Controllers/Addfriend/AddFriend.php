<?php

namespace App\Http\Controllers\Addfriend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Jobs\Addfrientzalo;
use Carbon\Carbon;
use App\Models\schedule_addfriend;
use App\Models\dataaddfriend;
use App\Models\dataphoneuser;
use App\Models\friend_suggest;
class AddFriend extends Controller
{
    protected $zaloId;
      protected $role_page;
      protected $role_profile;
      protected $userid;
      protected $status;

    public function getAddFriend(){
        if(Auth::user()){
        	$id = Auth::user()->id;
        }else{
        	return redirect()->intended('/');
        }

        $data = DB::table('vp_users')->where('id',$id)->get();
        foreach($data  as $key=>$value){
             $role_page = json_decode($value->role_page);
            
             $role_profile = json_decode($value->role_profile);
             $userid   = $value->userid;
             $status   = $value->status;
        } 
        $dataAccount['role_profile']  =$role_profile;
         $dataAccount['role_page']  =$role_page;
         $dataAccount['status']  =$status;
         if($status != 1){
              $dataAccount['category'] = DB::table('vp_categories')->where('user_id',$id)->get();
        
               $account = DB::table('user_zaloapp') ->join('zalo_accounts', 'user_zaloapp.zalo_id', '=', 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$id)->where('zalo_accounts.user_id',$id)->where('zalo_accounts.page',0)->where('user_zaloapp.page',0)->orderBy('zalo_accounts.id','desc')->orderBy('user_zaloapp.id','desc')->get();
         }else{
             $dataAccount['category'] = DB::table('vp_categories')->where('user_id',$userid)->get();
        
              $account = DB::table('user_zaloapp') ->join('zalo_accounts', 'user_zaloapp.zalo_id', '=', 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$userid)->where('zalo_accounts.user_id',$userid)->where('zalo_accounts.page',0)->where('user_zaloapp.page',0)->orderBy('zalo_accounts.id','desc')->orderBy('user_zaloapp.id','desc')->get();
         }


        // $dataAccount['category'] = DB::table('vp_categories')->where('user_id',$id)->get();
        
        // $account = DB::table('user_zaloapp') ->join('zalo_accounts', 'user_zaloapp.zalo_id', '=', 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$id)->where('zalo_accounts.user_id',$id)->where('zalo_accounts.page',0)->where('user_zaloapp.page',0)->orderBy('zalo_accounts.id','desc')->orderBy('user_zaloapp.id','desc')->get();

        $dataAccount['account'] = $account;
        if (!empty($dataAccount['account'])) {
             foreach ($dataAccount['account'] as $key => $value) {
                $check_cookie = 0;
                $datacheck = $this->checkcookie($value->cookie,$value->emei);
                //var_dump($datacheck);die();

                 if ($datacheck->error_code != '0') {
                    $check_cookie = 1;
                }
                $dataAccount['account'][$key]->checkcookie = $check_cookie;
             }
        }

        //var_dump($dataAccount);die();
        return view('addfriend.addfriend', $dataAccount);
    	
    }

    public function checkcookie($cookie,$imei){
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://wpa.zalo.me/api/login/getLoginInfo?zpw_ver=31&zpw_type=30&imei=".$imei."&os=Web&language=vi&ts=1561123814417&width=1920&height=624",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_POSTFIELDS => "",
          CURLOPT_HTTPHEADER => array(
            "cookie: ".$cookie.""
          ),
        ));

        $response = json_decode(curl_exec($curl));
        curl_close($curl);
        return $response;
    }

    public function checkphone(Request $request){
        if(Auth::user()){
            $user_id = Auth::user()->id;
        }else{
            return redirect()->intended('/');
        }
         $data = DB::table('vp_users')->where('id',$user_id)->get();
         foreach($data  as $key=>$value){
             $role_page = json_decode($value->role_page);
            
             $role_profile = json_decode($value->role_profile);
             $userid   = $value->userid;
             $status   = $value->status;
        } 
           //tính năng lọc số điện thoại trùng lặp
        // $listphone = rtrim($request->listphone,"\n");
        // $dataphone = explode("\n", $listphone);
        //  $listphoneNew = array_unique($dataphone,0);

        //  $listphoneNew2 = implode("\n", $listphoneNew);


// $listphone = rtrim($request->listphone,"\n");
//         $dataphone = explode("\n", $listphone);
       
// var_dump($request->phoneArray);die();
        $listphoneNew2 = implode("\n", $request->phoneArray);



       // var_dump($listphoneNew2);die();
        //$listphoneNew = array_unique($listphone,0);

   // var_dump($listphone);die();
        $id_profile = $request->id_profile;
       //var_dump($id_profile);die();
   if($status != 1){
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
       // $a = json_encode($result);
        //var_dump($a);die();
        echo json_encode($result);die;

   }else{
       $infor_user = DB::table('zalo_accounts')->where('user_id',$userid)->where('zalo_id',$role_profile[0])->get();
        $token =DB::table('user_zaloapp')->where('user_id',$userid)->where('zalo_id',$role_profile[0])->get();
         $emei = $token[0]->emei;
        $cookie = $token[0]->cookie;
        $serectkey = $token[0]->serectkey;
        $result = array(
            'listphone' => $listphoneNew2,
            'id_profile' => $role_profile[0],
            'emei' =>  $emei,
            'noidung' => null,
            'cookie' => $cookie,
            'serectkey' => $serectkey,
            'id_user' =>$user_id
        );
       // $a = json_encode($result);
        //var_dump($a);die();
        echo json_encode($result);die;
   }
        // $infor_user = DB::table('zalo_accounts')->where('user_id',$user_id)->where('zalo_id',$id_profile)->get();
        // $token =DB::table('user_zaloapp')->where('user_id',$user_id)->where('zalo_id',$id_profile)->get();
      
        // $emei = $token[0]->emei;
        // $cookie = $token[0]->cookie;
        // $serectkey = $token[0]->serectkey;
        // $result = array(
        //     'listphone' => $listphoneNew2,
        //     'id_profile' => $id_profile,
        //     'emei' =>  $emei,
        //     'noidung' => null,
        //     'cookie' => $cookie,
        //     'serectkey' => $serectkey,
        //     'id_user' =>$user_id
        // );
//thuy note


       // $a = json_encode($result);
        //var_dump($a);die();
        echo json_encode($result);die;
     }

//       public function checkphone(Request $request){
//         if(Auth::user()){
//             $user_id = Auth::user()->id;
//         }else{
//             return redirect()->intended('/');
//         }
//            //tính năng lọc số điện thoại trùng lặp
//         // $listphone = rtrim($request->listphone,"\n");
//         // $dataphone = explode("\n", $listphone);
//         //  $listphoneNew = array_unique($dataphone,0);

//         //  $listphoneNew2 = implode("\n", $listphoneNew);


// // $listphone = rtrim($request->listphone,"\n");
// //         $dataphone = explode("\n", $listphone);
       
// // var_dump($request->phoneArray);die();
//         $listphoneNew2 = implode("\n", $request->phoneArray);



//        // var_dump($listphoneNew2);die();
//         //$listphoneNew = array_unique($listphone,0);

//    // var_dump($listphone);die();
//         $id_profile = $request->id_profile;
//        //var_dump($id_profile);die();
        
//         $infor_user = DB::table('zalo_accounts')->where('user_id',$user_id)->where('zalo_id',$id_profile)->get();
//         $token =DB::table('user_zaloapp')->where('user_id',$user_id)->where('zalo_id',$id_profile)->get();
      
//         $emei = $token[0]->emei;
//         $cookie = $token[0]->cookie;
//         $serectkey = $token[0]->serectkey;
//         $result = array(
//             'listphone' => $listphoneNew2,
//             'id_profile' => $id_profile,
//             'emei' =>  $emei,
//             'noidung' => null,
//             'cookie' => $cookie,
//             'serectkey' => $serectkey,
//             'id_user' =>$user_id
//         );
//        // $a = json_encode($result);
//         //var_dump($a);die();
//         echo json_encode($result);die;
//      }

    public function add(Request $request){
        if(Auth::user()){
            $id = Auth::user()->id;
        }else{
           return redirect()->intended('/'); 
        }

        //$listphone = rtrim($request->listphone,"\n");

        $id_profile = $request->id_profile;
        //var_dump($id_profile);die();
         

         //data = DB::table('schedule_addfriend')->where('id_profile',$id_profile)->get();
        // $this->db->select('*');
        // $this->db->select('*');
        // $this->db->from('schedule_addfriend');
        // $this->db->where('id_profile',$id_profile);
        // $this->db->where('dataphone !=','[]');
        // $data = $this->db->get()->result();
        // if (!empty($data)) {
        //     $result = array(
        //         'code'=>401,
        //         'mess' => 'Đã có một chiến dịch kết bạn đang chạy của nick zalo này. Vui lòng chờ chiến dịch đấy hoàn thành.'
        //     );
        //     echo json_encode($result);die;
        // }


        $noidung = $request->noidung;

        $infor_user = $this->getZaloAccountById($id_profile);
        $token = $this->getZaloById($id_profile);
       

        $dataphone = explode("\n", $request->listphone);
       
        $listphoneNew = array_unique($dataphone,0);
        $phonesend = array();
        $phonesave = array();
        $countphone = count($dataphone);
        if($countphone < 10){
            $result = array(
            'code'=>200,
            'listphone' => $dataphone,
            'id_profile' => $id_profile,
            'noidung' => $noidung,
            'emei' => $token[0]->emei,
            'cookie' => $token[0]->cookie,
            'serectkey' => $token[0]->serectkey,
            'id_user' =>$id
        );

        }else{
            for ($i=0; $i < 10; $i++) { 
            array_push($phonesend,$dataphone[$i]);
              
            }
            
             for ($i=10; $i <$countphone; $i++) { 
            array_push($phonesave,$dataphone[$i]);
        
            }
              $currentDateTime = Carbon::now();
               $category = new schedule_addfriend;
                $category->user_id = $id;
                $category->id_profile  = $id_profile;
                $category->dataphone  = $phonesave;
                $category->dataphone  = json_encode($phonesave);
                $category->number_start  = 10;
                $category->stop  = 0;
                $category->total  = count($phonesave)+10;
                $category->content  = $noidung;
                $category->time_start  = $currentDateTime;
                $category->time_next  = date('Y-m-d h:i:s', strtotime('+1 hour'));
               
                $category->save();

                 $result = array(
                    'code'=>200,
                    'listphone' => $phonesend,
                    'id_profile' => $id_profile,
                    'noidung' => $noidung,
                    'emei' => $token[0]->emei,
                    'cookie' => $token[0]->cookie,
                    'serectkey' => $token[0]->serectkey,
                    'id_user' =>$id
                );


        }


        

        // for ($i=10; $i <= count($dataphone); $i++) { 
        //     array_push($phonesave,$dataphone[$i]);
        // }
 
        //$phonesave = array_chunk($dataphone,10,true);

        
         // for($i=10; $i< count($phonesave); $i++){
          
         //    Addfrientzalo::dispatch($phonesave[$i], $id, $id_profile, $noidung, $token[0]->emei, $token[0]->cookie, $token[0]->serectkey)->delay(now()->addMinutes(60)); 
         // }
       //  var_dump(count($dataphone));die();


    
        echo json_encode($result);die;
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

    public function friendinvitation(){
          if(Auth::user()){
            $id = Auth::user()->id;
        }else{
            return redirect()->intended('/');
        }
        $data = DB::table('vp_users')->where('id',$id)->get();
        foreach($data  as $key=>$value){
             $role_page = json_decode($value->role_page);
            
             $role_profile = json_decode($value->role_profile);
             $userid   = $value->userid;
             $status   = $value->status;
        } 
        $dataAccount['role_profile']  =$role_profile;
         $dataAccount['role_page']  =$role_page;
         $dataAccount['status']  =$status;
       if($status != 1){
         $account = DB::table('user_zaloapp') ->join('zalo_accounts', 'user_zaloapp.zalo_id', '=', 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$id)->where('zalo_accounts.user_id',$id)->where('zalo_accounts.page',0)->where('user_zaloapp.page',0)->orderBy('zalo_accounts.id','desc')->orderBy('user_zaloapp.id','desc')->get();
     }else{
         $account = DB::table('user_zaloapp') ->join('zalo_accounts', 'user_zaloapp.zalo_id', '=', 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$userid)->where('zalo_accounts.user_id',$userid)->where('zalo_accounts.page',0)->where('user_zaloapp.page',0)->orderBy('zalo_accounts.id','desc')->orderBy('user_zaloapp.id','desc')->get();
     }

       // $account = DB::table('user_zaloapp') ->join('zalo_accounts', 'user_zaloapp.zalo_id', '=', 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$id)->where('zalo_accounts.user_id',$id)->where('zalo_accounts.page',0)->where('user_zaloapp.page',0)->orderBy('zalo_accounts.id','desc')->orderBy('user_zaloapp.id','desc')->get();
        $dataAccount['account'] = $account;
        if (!empty($dataAccount['account'])) {
             foreach ($dataAccount['account'] as $key => $value) {
                $check_cookie = 0;
                $datacheck = $this->checkcookie($value->cookie,$value->emei);
                //var_dump($datacheck);die();

                 if ($datacheck->error_code != '0') {
                    $check_cookie = 1;
                }
                $dataAccount['account'][$key]->checkcookie = $check_cookie;
             }
        }

       return view("addfriend.friendinvitation", $dataAccount);
    }

    public function friendinvitationv2(){
          if(Auth::user()){
            $id = Auth::user()->id;
        }else{
            return redirect()->intended('/');
        }
        // $account = DB::table('user_zaloapp') ->join('zalo_accounts', 'user_zaloapp.zalo_id', '=', 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$id)->where('zalo_accounts.user_id',$id)->where('zalo_accounts.page',0)->where('user_zaloapp.page',0)->orderBy('zalo_accounts.id','desc')->orderBy('user_zaloapp.id','desc')->get();
        //$dataAccount['account'] = $account;

        //var_dump($dataAccount);die();
        // if (!empty($dataAccount['account'])) {
        //      foreach ($dataAccount['account'] as $key => $value) {
        //         $check_cookie = 0;
        //         $datacheck = $this->checkcookie($value->cookie,$value->emei);
        //         //var_dump($datacheck);die();

        //          if ($datacheck->error_code != '0') {
        //             $check_cookie = 1;
        //         }
        //         $dataAccount['account'][$key]->checkcookie = $check_cookie;
        //      }
        // }

        $account = DB::table('user_zaloapp') ->join('zalo_accounts', 'user_zaloapp.zalo_id', '=', 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$id)->where('zalo_accounts.user_id',$id)->where('zalo_accounts.page',0)->where('user_zaloapp.page',0)->orderBy('zalo_accounts.id','desc')->orderBy('user_zaloapp.id','desc')->get();
        $dataAccount['account'] = $account;
        if (!empty($dataAccount['account'])) {
             foreach ($dataAccount['account'] as $key => $value) {
                $check_cookie = 0;
                $datacheck = $this->checkcookie($value->cookie,$value->emei);
                //var_dump($datacheck);die();

                 if ($datacheck->error_code != '0') {
                    $check_cookie = 1;
                }
                $dataAccount['account'][$key]->checkcookie = $check_cookie;
             }
        }

       return view("addfriend.friendinvitationv2", $dataAccount);
    }


    public function history(Request $request){
         if(Auth::user()){
            $id = Auth::user()->id;
        }else{
            return redirect()->intended('/');
        } 
        $infor['history'] = DB::table('dataaddfriend')->join('zalo_accounts', 'dataaddfriend.id_profile', '=', 'zalo_accounts.zalo_id')->where('dataaddfriend.user_id',$id)->where('zalo_accounts.user_id',$id)->select('dataaddfriend.*', 'zalo_accounts.name', 'zalo_accounts.image')->orderBy('dataaddfriend.id','desc')->paginate(15);
        // $data['history'] = DB::table('dataaddfriend')->where('user_id',$id)->get();
        return view('addfriend.history',$infor);
    }

    public function addHistory(Request $request){
        if(Auth::user()){
            $id = Auth::user()->id;
        }else{
            return redirect()->intended('/');
        }
         $data = new dataaddfriend;
         $data->user_id = $id; 
         $data->id_profile = $request->id_profile;
         $data->phone = $request->phone;
         $data->status = $request->mess;
          $data->save();
    }

    public function adddataphone(Request $request){

         if(Auth::user()){
            $id = Auth::user()->id;
        }else{
            return redirect()->intended('/');
        }
         $dataphone = explode("\n", $request->listphone);
        $check = DB::table('dataphoneuser')->where('user_id',$id)->first();
        if(!empty($check)){
            $updatephone = dataphoneuser::where('user_id',$id)->first();
             $updatephone->phone = json_encode($dataphone);
             $updatephone->update();
        }else{
             $dataphone = explode("\n", $request->listphone);
              $data = new dataphoneuser;
             $data->user_id = $id; 
             $data->phone = json_encode($dataphone);

             
              $data->save();
        }
         
        return response()->json([
                    'status'  => 200,
                    'message' => 'Thêm mới danh sách sdt thành công, vui lòng mở APP ở mobile để tiến hành đồng bộ!',
                ]);
           

    }

    public function addgoiy(Request $request){
         if(Auth::user()){
            $id = Auth::user()->id;
        }else{
            return redirect()->intended('/');
        }
          $data = new friend_suggest;
         $data->user_id = $id; 
         $data->name = $request->name;
         $data->avatar = $request->avatar;
         $data->dataInfo = $request->dataInfo;
         $data->type = $request->type;
         $data->message = $request->message;
          $data->save();

    }
    public function td_addfriend(Request $rq){
         if(Auth::user()){
            $id = Auth::user()->id;
        }else{
            return redirect()->intended('/');
        }
       
        
             $data = DB::table('schedule_addfriend')->where('user_id',$id)->orderBy('id','desc')->get();
             $data2['list'] = $data;
           foreach ($data2['list'] as $key => $value) {
              $count = json_decode($value->dataphone);
             $data2['list'][$key]->count = count($count); 
             $data2['list'][$key]->countsend = $value->total - count($count); 
           }

       return view('addfriend.td_addfriend',$data2);
  }


}
