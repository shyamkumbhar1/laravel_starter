<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CacheController extends Controller
{
    public function cache (){
    
        Cache::set('name12','shyam kumbhar',5);
        dd(Cache::get('name12'),Cache::has('name'));

    
    }
}
