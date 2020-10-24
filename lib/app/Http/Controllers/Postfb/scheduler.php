<?php

namespace App\Http\Controllers\Postfb;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\schedulepostfb;

class scheduler extends Controller
{   
	 protected $array;
	 protected $name;
    public function index(){
    	if(Auth::user()){
    		$userid= Auth::user()->id;
    	}else{
    		 return redirect()->intended('/');
    	}

    	$data['history'] = DB::table('schedulerpostfb')->where('user_id',$userid)->get();
        
      
    	return view('postfb.scheduler',$data);
    }

    public function deleteSchedulefb(Request $rq){
         $arr = $rq->arr;
          foreach ($arr as $key => $value) {
            $data = schedulepostfb::where('id',$value)->delete();
          }
          return [
                    'status'  => 200,
                    'message' => 'xóa thành công!',
                ];
    }
}
