<?php

namespace App\Http\Controllers;
// useful command : php artisan storage:link 
// composer require intervention/image

use App\Models\Image;
use Illuminate\Http\Request;

class imageUploadController extends Controller
{

    public function index (){
    
        return view ('imageUpload.imageUpload',["images"=>Image::get()]);
    }
    
    public function upload (Request $request){
        // dd($request->all());
        // dd($request->file('image')->getPath());
        $image = $request->image;
        $name = $image->getClientOriginalName();
        $image->storeAs('public/images',$name);

        $image_save = new Image;
        $image_save->name = $name;
        $image_save->save();
        return back();
        // print_r($name);
        // dd($image);
    }


    
}
