<?php

namespace App\TraitClass;

use Illuminate\Support\Facades\Storage;

trait Upload
{
    /*
     * 图片上传接口
     * 文件名
     * 文件夹名
     * */
    public function uploadImg($file,$folder){
        $tmp = $file;
        $folder=$folder ? $folder : "";
        $path = '/Uploads'; //public下的Uploads
        
        if ($tmp->isValid()) { //判断文件上传是否有效
            $FileType = $tmp->getClientOriginalExtension(); //获取文件后缀

            $FilePath = $tmp->getRealPath(); //获取文件临时存放位置

            $FileName = $folder.'/'.date('Y-m-d').'/' . uniqid() . '.' . $FileType; //定义文件名

            Storage::disk('Uploads')->put($FileName, file_get_contents($FilePath)); //存储文件

            return $path . '/' . $FileName;
        }
    }
}