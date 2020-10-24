<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\postCategory;
class category extends Controller
{
    public function getInfoCategoryAjax(Request $request){
          $id= $request->id;
		 $result = DB::table('categorypost')->where('id',$id)->get();
		 $apps = array();

		foreach ($result as $app) {
		    $apps = array(
		        "id"        => $app->id,
		        "name"   => $app->name,
		       
		    );
		}
		$arr=array(
		    "status"=> 200,
		    'data' =>$apps


		);

		return response()->json($arr);
	  }

	 public function getUpdateCategory(Request $request){
           $id =$request->id;
	      $name =$request->name;

	     $data =DB::table('categorypost')->where('id',$id);
	     if(!empty($data)){
	        $arr['name'] = $name;
	        $data = DB::table('categorypost')->where('id',$id)->update($arr);
	        $status = 200;
	        $message = "Cập nhật danh mục thành công!";
	       
	     }else{
	        $status = -200;
	        $message ="Cập nhật danh mục thất bại";
	     }

	    $arr=array(
	        "status"=> $status,
	        "message"=> $message

	    );
	    return response()->json($arr);
	 }

	  public function deleteById($id){
        postCategory::destroy($id);
        return back();
    }



}
