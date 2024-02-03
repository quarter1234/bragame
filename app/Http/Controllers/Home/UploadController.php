<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\TraitClass\Upload;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    use Upload;

    public function __construct()
    {
        $this->middleware('auth:api'); 
    }

    public function upload(Request $request)
    {
        if($request->isMethod('post')){
            $img=$request->file;
            $fileName = $this->uploadImg($img,'img');
            return ['file_path' => $fileName];
        }
    }
}
