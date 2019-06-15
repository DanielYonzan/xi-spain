<?php

namespace App\Http\Controllers;

use App\Salone;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{

    public function upload_file($images,$destinationPath){
        $destinationPath = public_path($destinationPath);
        $imagenames = [];
        $i=0;
        if (!empty($images)){
            foreach ($images as $image){
                $imagename = uniqid(). mt_rand(10,100000) . $i++. '.' . $image->getClientOriginalExtension();
                $status = $image->move($destinationPath, $imagename);
                if($status){
                    array_push($imagenames,$imagename);
                }
            }
        }
        return implode(',',$imagenames);
    }

    public function update_file($images,$destinationPath,$imageToDelete,$oldImages){
        $destinationPath = public_path($destinationPath);
        $newImages = array_filter(explode(',',$oldImages));

        if (!empty($imageToDelete)) {
            foreach ($imageToDelete as $image) {
                if (file_exists($destinationPath . '/' . $image)) {
                    @unlink($destinationPath . '/' . $image);
                    
                    //free the image deleted index
                    $index = array_search($image,$newImages);
                    if($index !== FALSE){
                        unset($newImages[$index]);
                    }
                }
            }
        }

        if (!empty($images)) {
            $imagenames = [];
            $i=0;

            foreach ($images as $image){
                $imagename = uniqid(). mt_rand(10,100000) . $i++. '.' . $image->getClientOriginalExtension();
                $image->move($destinationPath, $imagename);
                array_push($imagenames,$imagename);
            }

            $newImages = array_merge($newImages,$imagenames);
        }

        return implode(',',$newImages);
    }

    public function delete_file($destinationPath,$oldImages)
    {
        $destinationPath = public_path($destinationPath);
        $oldImages = array_filter(explode(',',$oldImages));
        if (!empty($oldImages)) {
            foreach ($oldImages as $image) {
                if (file_exists($destinationPath . '/' . $image)) {
                    @unlink($destinationPath . '/' . $image);
                }
            }
        }
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
