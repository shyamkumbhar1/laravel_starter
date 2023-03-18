<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuzzleHttpClient extends Controller
{
    public function getRequest()
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('https://jsonplaceholder.typicode.com/posts');
        $response = $request->getBody()->getContents();
        echo '<pre>';
        print_r($response);
        exit;
    }
    public function postRequest()
{
        $client = new  \GuzzleHttp\Client();
        $request = $client->post('https://reqres.in/api/users', [  // first way to define methode 
            "name"=>"morpheus",
            "job"=>"leader"
        ]);
        
        // $request = $client->request('POST', 'https://reqres.in/api/users', [  // second way to define methode 
        //     "name"=>"morpheus",
        //     "job"=>"leader"
        // ]);
        $response = $request->getBody()->getContents();
        echo '<pre>';
        print_r($response);
}
}
