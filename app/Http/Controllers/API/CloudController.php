<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cloud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CloudController extends Controller
{

    /**
     * Fetch images
     * @param NA
     * @return JSON response
     */
    public function index() {
        $images = Cloud::all();
        return response()->json(["status" => "success", "count" => count($images), "data" => $images]);
    }

    /**
     * Upload Image
     * @param $request
     * @return JSON response
     */
    public function upload(Request $request) {
        $imagesName = [];
        $response = [];

        $validator = Validator::make($request->all(),
            [
                'images' => 'required',
                'images.*' => 'required'
            ]
        );

        if($validator->fails()) {
            return response()->json(["status" => "failed", "message" => "Validation error", "errors" => $validator->errors()]);
        }

        if($request->has('images')) {
            foreach($request->file('images') as $image) {
                $filename = time(). '.'.$image->getClientOriginalExtension();
                $image->move('uploads/'.$request['id_user'], $filename);

                Cloud::create([
                    'pathFichier' => $filename,
                    'title' => 'toto',
                    'id_user' => $request['id_user'],
                    'id_category' => 1,

                ]);
            }

            $response["status"] = "successs";
            $response["message"] = "Success! image(s) uploaded";
        }

        else {
            $response["status"] = "failed";
            $response["message"] = "Failed! image(s) not uploaded";
        }
        return response()->json($response);
    }


    public function getSizeTotalCloud(Request $request){

        function formatSize($bytes){ 
            $kb = 1024;
            $mb = $kb * 1024;
            $gb = $mb * 1024;
            $tb = $gb * 1024;
            
            if (($bytes >= 0) && ($bytes < $kb)) {
            return $bytes . ' B';
            
            } elseif (($bytes >= $kb) && ($bytes < $mb)) {
            return ceil($bytes / $kb) . ' KB';
            
            } elseif (($bytes >= $mb) && ($bytes < $gb)) {
            return ceil($bytes / $mb) . ' MB';
            
            } elseif (($bytes >= $gb) && ($bytes < $tb)) {
            return ceil($bytes / $gb) . ' GB';
            
            } elseif ($bytes >= $tb) {
            return ceil($bytes / $tb) . ' TB';
            } else {
            return $bytes . ' B';
            }
            };

            function folderSize($dir){
                $total_size = 0;
                $count = 0;
                $dir_array = scandir($dir);
                  foreach($dir_array as $key=>$filename){
                    if($filename!=".." && $filename!="."){
                       if(is_dir($dir."/".$filename)){
                          $new_foldersize = foldersize($dir."/".$filename);
                          $total_size = $total_size+ $new_foldersize;
                        }else if(is_file($dir."/".$filename)){
                          $total_size = $total_size + filesize($dir."/".$filename);
                          $count++;
                        }
                   }
                 }
                return $total_size;
                };
        $folder_path = "uploads"  ;
        $cloudSize = ['size'=>formatSize(folderSize($folder_path))];

        return(  $cloudSize );
    }
    
    
    
    
    
    public function getSizeCloudByUser(Request $request){
        $folder_path = "uploads/".$request['id_user']  ;
        $size = CloudController::folderSize($folder_path);
        $FormatSize = CloudController::formatSize($size);
        return ['size' => $FormatSize ];
    }

   static  function folderSize($dir){
        $total_size = 0;
        $count = 0;
        $dir_array = scandir($dir);
          foreach($dir_array as $key=>$filename){
            if($filename!=".." && $filename!="."){
               if(is_dir($dir."/".$filename)){
                  $new_foldersize = foldersize($dir."/".$filename);
                  $total_size = $total_size+ $new_foldersize;
                }else if(is_file($dir."/".$filename)){
                  $total_size = $total_size + filesize($dir."/".$filename);
                  $count++;
            }
           }
         }
        return $total_size;
        }



        

   static function formatSize(){ 
        $kb = 1024;
        $mb = $kb * 1024;
        $gb = $mb * 1024;
        $tb = $gb * 1024;
        
        if (($bytes >= 0) && ($bytes < $kb)) {
        return $bytes . ' B';
        
        } elseif (($bytes >= $kb) && ($bytes < $mb)) {
        return ceil($bytes / $kb) . ' KB';
        
        } elseif (($bytes >= $mb) && ($bytes < $gb)) {
        return ceil($bytes / $mb) . ' MB';
        
        } elseif (($bytes >= $gb) && ($bytes < $tb)) {
        return ceil($bytes / $gb) . ' GB';
        
        } elseif ($bytes >= $tb) {
        return ceil($bytes / $tb) . ' TB';
        } else {
        return $bytes . ' B';
        }
        }
}

