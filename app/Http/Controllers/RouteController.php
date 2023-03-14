<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function route (){
            // php artisan route:list
            return view ('route');
    }
    public function home (){
            // php artisan route:list
            // return view ('home');
            return "Home Page";
    }
    public function about ($cat){
            // php artisan route:list
            // return view ('about');
         
            return view ('About',["cat"=>$cat]);
         
    }
}
