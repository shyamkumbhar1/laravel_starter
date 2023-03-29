<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadAwsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function getImage()
    {
        if (Storage::disk('s3')->exists($image)) {
            $imgurl = Storage::get($image);
            return view('AWS.showImage', compact('imgurl'));
        }
    }
    public function imageUpload()
    {
        return view('AWS.imageUpload');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $path = Storage::disk('s3')->put('images', $request->image);
        $path = Storage::disk('s3')->url($path);
 
        // dd($path);
        /* Store $imageName name in DATABASE from HERE */

        return back()
            ->with('success', 'You have successfully upload image.')
            ->with('image', $path);
    }
}
