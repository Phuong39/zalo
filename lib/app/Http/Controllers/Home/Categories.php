<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\AddcateRequest;
use Auth;
use DB;
class Categories extends Controller
{
    protected $status;
    protected $userid;

    public function getCategories(){
         if(Auth::user()){
            $id =Auth::user()->id;
            $checkad = DB::table('vp_users')->where('id',$id)->select('status','userid')->get();
            foreach ($checkad as $key => $value) {

                $status = $value->status;
                $userid = $value->userid;
            }
            if($status != 1){
               $data['catelist'] = Category::where('user_id',$id)->get();
            }else{
                $data['catelist'] = Category::where('user_id',$userid)->get();
            }

           // $data['catelist'] = Category::where('user_id',$id)->get();
            return view('categories',$data); 
        }else{
            return redirect()->intended('/');
        }
        
    }

    public function postCategories(AddcateRequest $request){
        if(Auth::user()){

            $id = Auth::user()->id;
            $checkad = DB::table('vp_users')->where('id',$id)->select('status','userid')->get();
            foreach ($checkad as $key => $value) {

                $status = $value->status;
                $userid = $value->userid;
            }
            if($status != 1){
                  $category = new Category;
                    $category->name = $request->name;
                    $category->user_id  = $id;
                    $category->slug = str_slug($request->name);
                    $category->save();
                    return back();  
            }else{
                $category = new Category;
                $category->name = $request->name;
                $category->user_id  = $userid;
                $category->slug = str_slug($request->name);
                $category->save();
                return back();
            }
           
        }else{
            return redirect()->intended('/');
        }
        
    }

    public function addName_cate(Request $rq){
         if(Auth::user()){

            $id = Auth::user()->id;
            $checkad = DB::table('vp_users')->where('id',$id)->select('status','userid')->get();
            foreach ($checkad as $key => $value) {

                $status = $value->status;
                $userid = $value->userid;
            }
            if($status != 1){
                  $category = new Category;
                    $category->name = $rq->name;
                    $category->color = $rq->color;
                    $category->user_id  = $id;
                    $category->slug = str_slug($rq->name);
                    $category->save();
                    return[
                     'status' => 200,
                     'message'=>'Thêm mới danh mục thành công!'
                    ];  
            }else{
                $category = new Category;
                $category->name = $rq->name;
                $category->color = $rq->color;
                $category->user_id  = $userid;
                $category->slug = str_slug($rq->name);
                $category->save();
                 return[
                     'status' => 200,
                     'message'=>'Thêm mới danh mục thành công!'
                    ]; 
            }
           
        }else{
            return redirect()->intended('/');
        }
    }

    public function getEditCategories(){
         
    }

    public function getDelteCategories(){
    	
    }

    public function deleteCateAc(Request $request){
          $arr = $request->arr;
          foreach ($arr as $key => $value) {
            $category = Category::where('id',$value)->delete();
          }
          return [
                    'status'  => 200,
                    'message' => 'xóa danh mục tài khoản thành công!',
                ];
    }
     
public function getinforCategory(Request $request){
 $id= $request->id;
 $result = DB::table('vp_categories')->where('id',$id)->get();
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

     $data =DB::table('vp_categories')->where('id',$id);
     if(!empty($data)){
        $arr['name'] = $name;
        $data = DB::table('vp_categories')->where('id',$id)->update($arr);
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
        Category::destroy($id);
        return back();
    }


}
