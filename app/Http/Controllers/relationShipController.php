<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Contact,Post,User};


class relationShipController extends Controller
{
    public function hasOne(){
        // return User::with('contact')->get();
        return Contact::with('user')->get();
    }
    public function hasMany(){
        // return User::with('contact','post')->get();
        return Contact::with('user','post')->get();
    }
    // public function ManyToMany(){
    //     // return User::with('contact','post','categories')->get();
    //     return Post::with('categories')->first();
    // }
    public function HasOneThrough(){
        // return User::with('contact','post')->get();
        return Contact::with('user','post')->get();
    }
    public function Mutator (){
        $user = User::find(1);
        echo "<pre>";
        print_r($user);
    }
}
