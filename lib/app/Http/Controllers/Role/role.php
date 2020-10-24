<?php

namespace App\Http\Controllers\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Models\User_Model;
use App\Models\vp_userModel;
use App\Models\roleAccNV;

class role extends Controller
{
     protected $status;
    public function index(){
        if(Auth::user()){
        $id = Auth::user()->id;
      $data['profile']= User_Model::where('user_id',$id)->where('page',0)->orderBy('id','desc')->get();
      //$data['accountoa']= User_Model::where('user_id',$id)->where('page',1)->orderBy('id','desc')->get();
      $data['accountoa']=  DB::table('user_zaloapp') ->join('zalo_accounts', 'user_zaloapp.zalo_id', '=', 'zalo_accounts.zalo_id')->where('user_zaloapp.user_id',$id)->where('zalo_accounts.user_id',$id)->where('zalo_accounts.page',1)->where('user_zaloapp.page',1)->orderBy('zalo_accounts.id','desc')->orderBy('user_zaloapp.id','desc')->get();
     // var_dump($data['accountoa']);die();

      $result = vp_userModel::where('id',$id)->select('status')->get();
      foreach ($result as $key => $value) {
       $status = $value->status;
      }
      $data['status'] = $status;


      $data['list']= vp_userModel::where('status',1)->where('userid',$id)->orderBy('id','desc')->get();
      $data['count'] = count($data['list']);

      $data['page_oa'] ='';
      foreach ($data['list'] as $key => $value) {
      	$data['page_oa'] = json_decode($value->role_page);
      }
       
       $data['page_profile'] ='';
       foreach ($data['list'] as $key => $value) {
      	$data['page_profile'] = json_decode($value->role_profile);
      }
      
      $data['category'] = DB::table('vp_categories')->where('user_id',$id)->get();
      $data['roleAcc'] = DB::table('roleaccnv')->where('user_id',$id)->get();

      	return view('role.role',$data);
      }else{
        return redirect()->intended('/');
      }

    
    }

    public function add(Request $request){
    	 if(Auth::user()){
    	 	$id = Auth::user()->id;
    	 }else{

             return redirect()->intended('/');

    	 }
      $data  = vp_userModel::where('status',1)->where('userid',$id)->orderBy('id','desc')->get();
      $count = count($data);
     
      if($count >= 10){
        return [
          'status' => 404,
          'mess'   => 'Tài khoản đã chạm giới hạn thêm tài khoản nhân viên, vui lòng liên hệ support để được hỗ trợ.'
        ];

      }

    	$email = $request->emailaccount;
		  $username = $request->username;
		  $password = $request->password;

	    $check = vp_userModel::where('email',$username)->first();
	    $token = vp_userModel::where('id',$id)->select('remember_token')->get();
	    $tokenuser = '';
	   foreach ($token as $key => $value) {
	        $tokenuser = $value->remember_token;
	   }
	   
	    if(!empty($check)){
        
        $result = array(
				'status' => 404,
				'mess' => 'Tài khoản đã tồn tại!'
			 );
			 return response()->json($result);
	    }


		  $datasave = new vp_userModel;
		        $datasave->email = $username;
                    $datasave->password  = bcrypt($password);
                    $datasave->status = 1;
                    $datasave->userid = $id;
                    $datasave->firstname = $email;
                    $datasave->role_page = $request->role_page_select;
                    $datasave->role_profile = $request->role_profile_select;
                    $datasave->remember_token = $tokenuser;
                    $datasave->save();
        if($datasave->id){
           $arr_page = json_decode($request->role_page_select);
           $arr_profile = json_decode($request->role_profile_select);
           if($request->role_page_select != ''){
               for ($i=0; $i < count($arr_page); $i++) { 
                  $datasave2 = new roleAccNV;
                    $datasave2->user_id = $id;
                    $datasave2->id_nv  = $datasave->id;
                    $datasave2->roleProfile = $arr_page[$i];
                    $datasave2->save();
               }
           }
          
           if($request->role_profile_select != ''){
               for ($i=0; $i < count($arr_profile); $i++) { 
                $datasave2 = new roleAccNV;
                  $datasave2->user_id = $id;
                  $datasave2->id_nv  = $datasave->id;
                  $datasave2->roleProfile = $arr_profile[$i];
                  $datasave2->save();
             }
           }
          

          	$result = array(
      				'status' => 200,
      				'mess' => 'Thêm tài khoản thành công!!'
      			);
			return response()->json($result);
        }

    }

    	public function update(Request $request){

		$page = json_decode($request->page);
		$id = $request->id;
		$profile = json_decode($request->profile);
		
		$update = vp_userModel::where('id',$id)->first();
            if(isset($update)){

                $update->role_page = $request->page;
                $update->role_profile = $request->profile;
                $update->update();
              if(!empty($update->id)){
              	$result = array(
				'status' => 200,
				'mess' => 'Cập nhật thông tin tài khoản thành công!'
			);
			return response()->json($result);
              }
            

                
            }
		

	}

	public function delete(Request $request){
        $account = vp_userModel::where('id',$request->id)->delete();
        $accNV = roleAccNV::where('id_nv',$request->id)->delete();
       $result = array(
				'status' => 200,
				'mess' => 'Xóa thành công!'
			);
			return response()->json($result);
	}

  public function getDataUserNV(Request $rq){
        $data = DB::table('vp_users')->where('id',$rq->id)->get();
        $data2 = DB::table('roleaccnv')->where('id_nv',$rq->id)->get();
        //var_dump($data2);
        if(isset($data2)){
          
            $apps = array();
            foreach ($data as $app) {
              $apps = array(
                "id"          => $app->id,
                "firstname"   => $app->firstname,
                "phone"       => $app->phone,
                "category"    => $app->category,
                "email"       =>$app->email,
                "data"       =>$data2,
              );
            }
              
            return [
              'status' => 202,
               'data'  => $apps

            ];  
        }else{
           $apps = array();

          foreach ($data as $app) {
            $apps = array(
              "id"          => $app->id,
              "firstname"   => $app->firstname,
              "phone"       => $app->phone,
              "category"    => $app->category,
              "email"       =>$app->email
            );
          }
            
          return [
            'status' => 200,
             'data'  => $apps

          ];  
        }
       
  }

  public function updateInforUserNV(Request $rq){
     if(Auth::user()){
        $id = Auth::user()->id;
       }else{

             return redirect()->intended('/');

       }

    if($rq->password == ''){
      $data = [
         'firstname' => $rq->name,
         'phone'     => $rq->phone,
         'category'  =>$rq->cateid

         ];
    }else{
       $data = [
         'firstname' => $rq->name,
         'phone'     => $rq->phone,
         'category'  =>$rq->cateid,
         'password'  =>bcrypt($rq->password)

         ];
    }

  $delete = roleAccNV::where('user_id',$id)->where('id_nv',$rq->id)->delete();
  $arr_profile = $rq->roleProfile;
  $arr_page    = $rq->rolePage;
  if(!empty($arr_profile)){
   $add = json_encode($arr_profile);
     DB::table('vp_users')
                ->where('id', $rq->id)
                ->update(['role_profile' => $add]);
  }

  if(!empty($arr_page)){
    $addPage = json_encode($arr_page);
     DB::table('vp_users')
                ->where('id', $rq->id)
                ->update(['role_page' => $addPage]);
  }
  
   for ($i=0; $i < count($arr_profile); $i++) { 
  
        $datasave2 = new roleAccNV;
                $datasave2->user_id = $id;
                $datasave2->id_nv  = $rq->id;
                $datasave2->roleProfile = $arr_profile[$i];
                $datasave2->save();
   }
   
   if(!empty($arr_page)){
       for ($i=0; $i < count($arr_page); $i++) { 
    
          $datasave2 = new roleAccNV;
                  $datasave2->user_id = $id;
                  $datasave2->id_nv  = $rq->id;
                  $datasave2->rolePage = $arr_page[$i];
                  $datasave2->save();
     }
   }

       DB::table('vp_users')
                ->where('id', $rq->id)
                ->update($data);
        return [
           'status' => 200,
           'message' => 'Cập nhật thông tin tài khoản thành công.'
        ];
        
      }


}
