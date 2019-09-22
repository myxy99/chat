<?php

namespace App\Http\Controllers\Picture;

use App\Http\Requests\PictureRequest;
use App\Http\Requests\ShowPictureRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PictureUpdateController extends Controller
{

    //输出图片
    public function showPicture(ShowPictureRequest $request){
        $path = storage_path('/uploads/'.$request->name);
        if(is_file($path)){
            return response()->file($path);
        }
        else{
            return response()->fail(100,'图片输出失败！',null);
        }
    }


    //上传图片
    public function updatePicture(PictureRequest $request){
            $picture = $request->file('picture');
            if($picture->isValid()){
                //获取扩展名
                $extend=$picture->getClientOriginalExtension();
                //获取文件路径
                $path = $picture->getRealPath();
                //取名
                $name = uniqid().time().'.'.$extend;
                $stat = Storage::disk('admin')->put($name,file_get_contents($path));
                if($stat){
                   return response()->success(100,'添加成功！',$name);
                }
                else{
                    return response()->fail(200,'添加失败，请重试！',null);
                }
            }
       }
}
