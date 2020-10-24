<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Http\Requests\AddListPostRequest;
class uploadimg extends Controller
{
    public function upload_image(AddListPostRequest $request){
    	$id= Auth::user()->id;
    	$check = DB::table('vp_users')->where('id',$id)->select('email')->get();
    	foreach ($check as $key => $value) {
    		$email = $value->email;
    	}
    	       $files = $request->file('file');
    	       if($files){
			             $extension = $request->file->getClientOriginalName();
			             $url_img= $request->file->storeAs($email,$extension);
			             $dataFilename =url('/lib/storage/app/').'/'.$url_img;
					      $result= array(
					          'status' => 'success',
					          'path' => $dataFilename
					        );
			      	}else{
			      		 return [
					  		'status' => -200,
					  		'message' =>'Vui lòng đính kèm ảnh',
					  		
					  	];
			      	}
			      	 return response()->json($result);
		    }

	 public function uploadvideo(AddListPostRequest $request){
    	$id= Auth::user()->id;
    	$check = DB::table('vp_users')->where('id',$id)->select('email')->get();
    	foreach ($check as $key => $value) {
    		$email = $value->email;
    	}
    	       $files = $request->file('video');
    	       if($files){
			             $extension = $request->video->getClientOriginalName();
			             $url_video= $request->video->storeAs($email,$extension);
			             $dataFilename =url('/lib/storage/app/').'/'.$url_video;
					      $result= array(
					          'status' => 'success',
					          'path' => $dataFilename
					        );
			      	}else{
			      		 return [
					  		'status' => -200,
					  		'message' =>'Vui lòng đính kèm video',
					  		
					  	];
			      	}

			      	 return response()->json($result);
		    }
  public function uploadfile(AddListPostRequest $request){
  	     $id= Auth::user()->id;
    	$check = DB::table('vp_users')->where('id',$id)->select('email')->get();
    	foreach ($check as $key => $value) {
    		$email = $value->email;
    	}
    	       $files = $request->file('file2');
    	       
    	       if($files){
			             $extension = $request->file2->getClientOriginalName();
                         $file_size =$_FILES['file2']['size'];
                         $file_type=$files->getMimeType();
                         $file_extension= $files->getClientOriginalExtension();
                         $valid_extensions = array('docx', 'doc', 'PDF', 'pdf', 'xls', 'xlsx', 'xlsm', 'csv', 'CSV');
                         $ext = strtolower(pathinfo($extension, PATHINFO_EXTENSION));
                         if (in_array($ext, $valid_extensions)) {
                             //var_dump($file_size);die();
				             $url_file= $request->file2->storeAs($email,$extension);
				             $dataFilename =url('/lib/storage/app/').'/'.$url_file;
					      $result= array(
					          'status' => 200,
						        'file_size' =>$file_size,
						        'file_type' => $file_type,
						        'file_name' => $extension,
						        'path' => $dataFilename,
						        'extension' => $file_extension,
						        'checksum' => md5_file($dataFilename)
					        );
					      //var_dump($result);die();
                          //return response()->json($result);
                         }else{

                            $result = array(
						        'status' => 400,
						        'mess' => 'Định dạng tập tin không đúng!'
						    );
                         }
                         return response()->json($result);
			      	}else{
			      		 return [
					  		'status' => -200,
					  		'message' =>'Vui lòng đính kèm file',
					  		
					  	];
			      	}

			      	 return response()->json($result);

  }


}
