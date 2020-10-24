<?php

namespace App\Http\Controllers\Postfb;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
class history extends Controller
{
    public function index(){
    	if(Auth::user()){
    		$user_id= Auth::user()->id;
    	}else{
    		 return redirect()->intended('/');
    	}
        $data['history_profile'] = DB::table("data_posts_send")->join('zalo_accounts', 'zalo_accounts.zalo_id', '=', 'data_posts_send.zalo_id')->where('data_posts_send.user_id',$user_id)->where('zalo_accounts.user_id',$user_id)->where('data_posts_send.type','image')->orwhere('data_posts_send.type','video')->select('data_posts_send.*','zalo_accounts.name')->orderBy('data_posts_send.id','desc')->paginate(15);
        $data['category'] = DB::table('categorypost')->where('user_id',$user_id)->get(); 
    	return view('postfb.history',$data);
    }
}
