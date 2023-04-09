<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class Session_CookiesController extends Controller
{
    public function session (){
        session()->start();
        // session()->put('name', 'Shyam kumbhar');
        // session()->flash('key', 'value');
       $value = session()->get('key');

// session()->forget('key');

      dd($value);

    }
    public function cookies (Request $request){
        
        $response = new Response('Hello World');
        $response = $response->cookie('name3', 'value1', 300);

                $value = $request->cookie('name3');

                dd($value);
        

    }
}
