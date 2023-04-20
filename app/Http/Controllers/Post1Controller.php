<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;
use App\Models\Post1;

class Post1Controller extends Controller
{
    public function fetchDta (){
        $apiData = Http::get('https://jsonplaceholder.typicode.com/posts')->json();
        echo "";
        print_r($apiData);
       
        foreach ($apiData as $post) {
           
            $newPost = new Post1();
            $newPost->user_id = $post['userId'];
            $newPost->title = $post['title'];
            $newPost->body = $post['body'];
            $newPost->save();
        }

    }
}
