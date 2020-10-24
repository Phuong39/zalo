<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin_model;
use File;
use App\Http\Requests\AddListPostRequest;
class apiUpload extends Controller
{
    public function apiUploadImage(AddListPostRequest $request){

      $checkUser =admin_model::select('id','email')->where('id',$request->user_id)->first();
      $dataFilename =[];
      if(isset($checkUser)){
      	$email =$checkUser->email;
      	$files = $request->file('image');
      	$path = url('uploads/').'/'.$email.'/images/app';
      	//var_dump($path);die();
      	if(!file_exists($path)){
      		File::makeDirectory($path, $model =0777, true, true);
      	}
      	
      	if($files){
             $extension = $request->image->getClientOriginalName();
             $url_image= $request->image->storeAs($email,$extension);
             $filesize = $files->getSize();
             $dataFilename =url('/lib/storage/app/').'/'.$url_image;

             $fields = array();
              $files = array();
                 
              $files["chunkContent"] = file_get_contents($dataFilename);
                
              $boundary = uniqid();
              $delimiter = '-------------' . $boundary;
              $post_data = $this->build_data_files($boundary, $fields, $files,$extension);
              
		       return [
		  		'status' =>200,
		  		'message' =>'Upload image thành công',
          'size' => $filesize,
		  		'data'  =>$dataFilename
        
          
		  	];
      	}else{
      		 return [
		  		'status' => -200,
		  		'message' =>'Vui lòng đính kèm ảnh',
		  		
		  	];
      	}
      	

      }else{
             return [
                'status'  =>404,
                'message' =>'Tài khoản không tồn tại trên hệ thống!',
             ];
      }
 

    }

  public function build_data_files($boundary, $fields, $files,$tenfile){
    $data = '';
    $eol = "\r\n";

    $delimiter = '-------------' . $boundary;

    foreach ($fields as $name => $content) {
      $data .= "--" . $delimiter . $eol
      . 'Content-Disposition: form-data; name="' . $name . "\"".$eol.$eol
      . $content . $eol;
    }


    foreach ($files as $name => $content) {
      $data .= "--" . $delimiter . $eol
      . 'Content-Disposition: form-data; name="' . $name . '"; filename="'.$tenfile.'"' . $eol
              //. 'Content-Type: image/png'.$eol
      . 'Content-Transfer-Encoding: binary'.$eol
      ;

      $data .= $eol;
      $data .= $content . $eol;
    }
    $data .= "--" . $delimiter . "--".$eol;


    return $data;
  }

    public static function apiUploadVideo(AddListPostRequest $request){

      $checkUser =admin_model::select('id','email')->where('id',$request->user_id)->first();
      $dataFilename =[];
      if(isset($checkUser)){
      	$email =$checkUser->email;
      	$files = $request->file('video');
      	// $path = url('uploads/').'/'.$email.'/images/app';
      	// //var_dump($path);die();
      	// if(!file_exists($path)){
      	// 	File::makeDirectory($path, $model =0777, true, true);
      	// }
      	
      	if($files){
             $extension = $request->video->getClientOriginalName();
             $url_video= $request->video->storeAs($email,$extension);
             $dataFilename =url('/lib/storage/app/').'/'.$url_video;
		       return [
    		  		'status' =>200,
    		  		'message' =>'Upload video thành công',
    		  		'data'  =>$dataFilename,
    		  	];
      	}else{
      		 return [
		  		'status' => -200,
		  		'message' =>'Vui lòng đính kèm video',
		  		
		  	];
      	}
      	

      }else{
             return [
                'status'  =>404,
                'message' =>'Tài khoản không tồn tại trên hệ thống!',
             ];
      }
 

    }

      public function apiUploadfile(AddListPostRequest $request){
         
      $checkUser =admin_model::select('id','email')->where('id',$request->user_id)->first();
       $dataFilename =[];
       if(isset($checkUser)){
          $email =$checkUser->email;
          $files = $request->file('file2');
          if($files){
                   $extension = $request->file2->getClientOriginalName();

                         $file_size =$_FILES['file2']['size'];
                         $file_type=$files->getMimeType();
                         $file_extension= $files->getClientOriginalExtension();
                         $valid_extensions = array('docx', 'doc', 'PDF', 'pdf', 'xls', 'xlsx', 'xlsm', 'csv', 'CSV', 'txt');
                         $ext = strtolower(pathinfo($extension, PATHINFO_EXTENSION));
                         if (in_array($ext, $valid_extensions)) {
                             
                     $url_file= $request->file2->storeAs($email,$extension);

                     $dataFilename =url('/lib/storage/app/').'/'.$url_file;
                      return  [
                          'status' => 200,
                          'file_size' =>$file_size,
                          'file_type' => $file_type,
                          'file_name' => $extension,
                          'path' => $dataFilename,
                          'extension' => $file_extension,
                          'checksum' => md5_file($dataFilename)
                        ];

                         }else{

                            return  [
                                        'status' => 400,
                                        'mess' => 'Định dạng tập tin không đúng!'
                                    ];
                         }
                         return response()->json($result);
              }else{
                 return [
                  'status' => -200,
                  'message' =>'Vui lòng đính kèm file',
                  
                ];
              }

       }else{
             return [
                'status'  =>404,
                'message' =>'Tài khoản không tồn tại trên hệ thống!',
             ];
      }
      

              

  }


    public static function checkRequestTokenViaApiApp($token){
        $checkUser = DB::table('vp_users')->where('remember_token',$token)->count();
        if($checkUser > 0){
            return true;
        }
        return false;
    }





}
