<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\MyModel;


class NormalHttpClient extends Controller
{

    public function all_data()
    {
      $response =  Http::get('https://jsonplaceholder.typicode.com/posts');
      return view('HttpClient',['data'=>$response->collect()]);
      
    }
    public function single_data($id)
    {
      $response =  Http::get('https://jsonplaceholder.typicode.com/posts/'.$id);
      dd($response->collect());
    //   return view('HttpClient',['data'=>$response->collect()]);
      
    }
    public function addPost()
    {
      $response =  Http::post('https://reqres.in/api/users',[
        "name"=> "Shyam kumbhar",
        "job"=> "Software engineer",
      ]);
      dd($response->json());
      
    }
    public function updatePost($id)
    {
        
      $response =  Http::put('https://reqres.in/api/users/'.$id,[
        "name"=> "Shyam Kumbhar",
        "job"=> "Software engineer",
      ]);
      dd($response->json());
      
    }
    public function deletePost($id)
    {
        
      $response =  Http::delete('https://reqres.in/api/users/'.$id);
      dd($response);
      
    }
    public function getInfo()
    {
        
      $response =  Http::get('https://jsonplaceholder.typicode.com/posts/1');
    //   $response =  Http::get('https://jsonplaceholder.typicode.com/posts/1') ['title'];
    //   $response =  Http::timeout(5)->get('https://jsonplaceholder.typicode.com/posts/1') ['title'];
    //   $response =  Http::retry(3,100)->get('https://jsonplaceholder.typicode.com/posts/1') ['title'];
    //   $response =  Http::withHeaders([
    //     'content-type'=> 'application/json'
    //   ])->get('https://jsonplaceholder.typicode.com/posts/1') ['title'];

    
      dd($response);
    //   dd($response->body());
    //   dd($response->json());
    //   dd($response->collect());
    //   dd($response->status());
    //   dd($response->ok());
    //   dd($response->successful());
    //   dd($response->failed());
    //   dd($response->serverError());
    //   dd($response->header());
      
    }

    public function save_api_data_to_database(){
      $response = Http::get('https://jsonplaceholder.typicode.com/posts');

      $data = json_decode($response->getbody(),true);

      foreach ($data as $post) {
        $newPost = new MyModel;
        $newPost->userId = $post['userId'];
        $newPost->title = $post['title'];
        $newPost->body = $post['body'];
        $newPost->save();
     
    }
    return response()->json(['message' => 'Posts saved successfully']);


    }

 
}
