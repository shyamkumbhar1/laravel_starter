<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CacheController extends Controller
{
    public function cache (){
    
        Cache::put('name1','shyam',5);
        dd(Cache::get('name1'),Cache::has('name'));

    
    }
}
