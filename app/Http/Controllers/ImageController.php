<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use DB;

class ImageController extends Controller
{
    public function imageUpload(Request $request){
    	if($request->ajax()){
    		$data = $request->file('file');
			dd($data);
           $extension = $data->getClientOriginalExtension();
           $filename = 'usermina'.'_profilepic'.'.'.$extension; // renameing image
           $path =public_path('../Images/');
 
 
           $usersImage = public_path("../Images/{$filename}"); // get previous image from folder
 
			
           $upload_success = $data->move($path, $filename);
 
           return response()->json([
               'success' => 'done',
               'valueimg'=>$data
           ]);
 
 
 
		}
    	}
}
