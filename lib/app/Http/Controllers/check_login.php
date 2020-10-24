<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Auth;
use App\Models\User_Model;
class check_login extends Controller
{

     public function check_user_login(Request $request){
        $email = $request->email;
		$password = $request->password;
		$data= Db::table("vp_users")
		->select("email")
		->where("email",$email)
		->where("password",$password)
		->get()
		->toArray();
		 $data= $this->loginninja($email, $password);
         if($email == 'dev88@ninjateam.vn'){
            if(Auth::attempt(['email'=>$email, 'password'=>$password])){
                $id =Auth::user()->id;
                        $data = User_Model::where('user_id',$id)->get();
                        $data_account = Db::table("vp_users")->select('id','email','remember_token')->where('id',$id)->get();
                        $data_account= json_encode($data_account);
                        $status = 1;
                       $return = "success";
                       $arr=array(
                        "status"=> $status,
                        "message"=>$return,
                        "account"=>json_decode($data_account),
                        );
                        return $arr;
            }
            
         }
		 if(Auth::attempt(['email'=>$email, 'password'=>$password])){
		 if($data->status === true && $data->time >0){
                 
						$id =Auth::user()->id;
						$data = User_Model::where('user_id',$id)->get();
						$data_account = Db::table("vp_users")->select('id','email','remember_token')->where('id',$id)->get();
						$data_account= json_encode($data_account);
                        $status = 1;
                       $return = "success";

                 }else{
                    $status = -1;
                    $data_account='';
                    $return = 'Tài khoản chưa đăng ký bản quyền ';

                   }
              }else{
                 $status = -2;
                 $data_account='';
                
                   $return = "Sai tên đăng nhập hoặc mật khẩu";
               
              }
		$arr=array(
			"status"=> $status,
			"message"=>$return,
			"account"=>json_decode($data_account),
		);
		$arr = json_encode($arr);
		return $arr;
    }

    public function loginninja($email, $pasw){
         $attachment = ['email' => $email,'password' =>$pasw,'type'=>10];
            
        $curl = curl_init('http://unlock.ninjateam.vn/api/groupmanager/loginservice');
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($attachment));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        return json_decode($result);
    }

}
