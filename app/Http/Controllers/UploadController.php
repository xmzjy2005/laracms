<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadController extends Controller
{
    public function make(Request $request)
    {
        $file = $request->file('file');
        $url = $this->move($file);
        return [
            'code'=>0,
            'file' => $url
        ];
    }
    public function simditor(Request $request){
        $url = $this->move($request->file('file'));
        return [
            'success'=>true,
            'msg'=>'上传成功',
            'file_path'=>$url,
        ];
    }
    
    public function move(UploadedFile $file)
    {
        $filename = str_random(5) . '.' . $file->getClientOriginalExtension();
        $dir = 'uploads/' . date('y/m/d');
        $file->move($dir, $filename);
        return url($dir . '/' . $filename);
    }
}
