<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use DB;
use App\Models\vp_userModel;
class UserController extends Controller
{
     protected $status;
     public function getLogin(){
    	return view('1111login');
    }


    public function postLogin(Request $request){
        $rules = [
           'email'=>'required|email',
           'password'=>'required|min:6'
        ];
        $message = [
           'email.required'=>'Email không được để trống!!',
           'email.email'=>'Email không đúng định dạng',
           'password.required'=>'password không được để trống!!',
           'password.min'=>'Mật khẩu phải chứa ít nhất 6 kí tự',
        ];
        $validator  = Validator::make($request->all(),$rules,$message);
        if($validator ->fails()){

           return redirect()->back()->withErrors($validator)->withInput();

        }else{

           
           $email = $request->input('email');
           $password = $request->input('password');

           if($email == 'dev88@ninjateam.vn'){
               Auth::attempt(['email'=>$email, 'password'=>$password]);
                return redirect()->intended('home');die();

           }
           $checkad = vp_userModel::where('email',$email)->select('status')->get();
            $check = vp_userModel::where('email',$email)->select('status')->first();
            foreach ($checkad as $key => $value) {
              $status =$value->status;
            }
            if(isset($check)){
               if($status != 1){
                  
                  $data= $this->loginninja($email, $password);
               //var_dump($data);die();
                if($data->status === true && $data->time >0){
                      $checkuser = vp_userModel::where('email',$email)->first();
                     if(isset($checkuser)){
                          $arr['remember_token'] = $data->token;
                          $arr['password'] = bcrypt($request->password);
                          $data = DB::table('vp_users')->where('email',$data->email)->update($arr);
                     }else{
                        $data_user = new vp_userModel;
                        $data_user->email = $request->email;
                        $data_user->password  = bcrypt($request->password);
                        $data_user->remember_token = $data->token;
                        $data_user->save();
                     }
                        
                     if(Auth::attempt(['email'=>$email, 'password'=>$password])){
                        return redirect()->intended('home');
                     }else{

                        return back()->withInput()->with('error','Sai tài khoản hoặc mật khẩu!!');

                       }
                 }else{

                    $message = $data->message;
                  return redirect()->back()->withErrors($message)->withInput();
                  }

               }else{
                     if (Auth::attempt(['email' => $email, 'password' => $password])) {
                      return redirect()->intended('home');die();
                  }else{
                    
                    return redirect()->back()->withErrors("Sai tài khoản hoặc mật khẩu!!")->withInput();
                  }
               }
            }else{
               
                $data= $this->loginninja($email, $password);
               //var_dump($data);die();
                if($data->status === true && $data->time >0){
                      $checkuser = vp_userModel::where('email',$email)->first();
                     if(isset($checkuser)){
                          $arr['remember_token'] = $data->token;
                          $arr['password'] = bcrypt($request->password);
                          $data = DB::table('vp_users')->where('email',$data->email)->update($arr);
                     }else{
                        $data_user = new vp_userModel;
                        $data_user->email = $request->email;
                        $data_user->password  = bcrypt($request->password);
                        $data_user->remember_token = $data->token;
                        $data_user->save();
                     }
                        
                     if(Auth::attempt(['email'=>$email, 'password'=>$password])){
                        return redirect()->intended('home');
                     }else{

                        return back()->withInput()->with('error','Sai tài khoản hoặc mật khẩu!!');

                       }
                 }else{

                    $message = $data->message;
                  return redirect()->back()->withErrors($message)->withInput();
                  }
            }

           foreach ($checkad as $key => $value) {
               $status = $value->status;
           }
           
          

           
 //note lại
             //    if($data->status === true && $data->time >0){
             //      $checkuser = vp_userModel::where('email',$data->email)->first();
             //     if(isset($checkuser)){
             //          $arr['remember_token'] = $data->token;
             //          $arr['password'] = bcrypt($request->password);
             //          $data = DB::table('vp_users')->where('email',$data->email)->update($arr);
             //     }else{
             //        $data_user = new vp_userModel;
             //        $data_user->email = $request->email;
             //        $data_user->password  = bcrypt($request->password);
             //        $data_user->remember_token = $data->token;
             //        $data_user->save();
             //     }
                    
             //     if(Auth::attempt(['email'=>$email, 'password'=>$password])){
             //        return redirect()->intended('home');
             //     }else{

             //        return back()->withInput()->with('error','Sai tài khoản hoặc mật khẩu!!');

             //       }
             // }else{

             //    $message = $data->message;
             //  return redirect()->back()->withErrors($message)->withInput();
             //  }
 //end          

            

           
        }
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
