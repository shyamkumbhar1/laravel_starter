<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Services\PostService;

class PostController extends Controller
{
    protected $postservice;

    public function __construct(PostService $postservice)
    {
        $this->postservice = $postservice;
    }

    public function index (PostService $postservice){
       $post =  $this->postservice->getAllPosts();

       dd($post->toArray());
    }


}

