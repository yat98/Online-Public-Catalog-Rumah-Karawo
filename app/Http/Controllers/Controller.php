<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function checkLastUpdate($datas){
        if($datas->count() > 0){
            return $datas->sortByDesc('updated_at')
                        ->first()
                        ->updated_at
                        ->diffForHumans();
        }
    }

    protected function countStatistik($datas,$produks,$field){
        $produksStatistik = [];

        foreach($datas as $data){
            $countData = $produks->where($field,$data->id)->count();
            array_push($produksStatistik,$countData);
        }

        return $produksStatistik;
    }

    protected function uploadImage($imageFieldName, $request, $uploadPath){
        $image = $request->file($imageFieldName);
        $ext = $image->getClientOriginalExtension();
        if($image->isValid()){
            $imageName = date('YmdHis').'_'.str_replace(' ','_',strtolower($request->input('nama_produk'))).".$ext";
            $image->move($uploadPath,$imageName);            
            return $imageName;
        }
        return false;
    }

    protected function deleteImage($imageFieldName,$imageName){
        $exist = Storage::disk($imageFieldName)->exists($imageName);
        if(isset($imageName) && $exist){
            $delete = Storage::disk($imageFieldName)->delete($imageName);
            if($delete) return true;
            return false;
        }
    }
}
