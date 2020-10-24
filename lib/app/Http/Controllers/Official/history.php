<?php

namespace App\Http\Controllers\Official;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Models\historyProfile;
use App\Models\schedule_post;
class history extends Controller
{
     public function list_post_history(){
    	if(Auth::user()){
    		$user_id= Auth::user()->id;
    	}else{
    		 return redirect()->intended('/');
    	}
        $data['history_profile'] = DB::table("data_posts_send")->join('zalo_accounts', 'zalo_accounts.zalo_id', '=', 'data_posts_send.zalo_id')->where('data_posts_send.user_id',$user_id)->where('zalo_accounts.user_id',$user_id)->where('data_posts_send.status',1)->select('data_posts_send.*','zalo_accounts.name')->orderBy('data_posts_send.id','desc')->paginate(15);
        $data['category'] = DB::table('categorypost')->where('user_id',$user_id)->get(); 
    	return view('official.list_posts_history',$data);
    }
    
    public function Schedulerhistory(Request $request){

        if(Auth::user()){
            $id= Auth::user()->id;
        }else{
             return redirect()->intended('/');
        }
      
          // $data['history'] = DB::table('schedule_post')->join('zalo_accounts', 'zalo_accounts.zalo_id', '=', 'schedule_post.id_profile')->where('schedule_post.type',1)->where('schedule_post.user_id',$id)->select('schedule_post.*','zalo_accounts.name')->orderBy('schedule_post.id','desc')->get();
         $data['history'] = DB::table('schedule_post')->join('zalo_accounts', 'zalo_accounts.zalo_id', '=', 'schedule_post.id_profile')->where('schedule_post.type',1)->where('schedule_post.user_id',$id)->where('zalo_accounts.user_id',$id)->select('schedule_post.*','zalo_accounts.name')->orderBy('schedule_post.id','desc')->get();
          $data['cate'] = DB::table('categorypost')->where('user_id',$id)->get(); 
         
         return view('official.SchedulerListPost',$data);
    }

    public function deleteScheduleOA(Request $rq){
           $arr = $rq->arr;
          foreach ($arr as $key => $value) {
            $account2 = schedule_post::where('id',$value)->delete();
          }
          return [
                    'status'  => 200,
                    'message' => 'xóa thành công!',
                ];
    }

}
