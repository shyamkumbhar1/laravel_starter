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
        // $client = new Client();
        // $response = $client->request('POST', 'http://localhost:8001/api/store', [
        //     'form_params' => ]
        //         'name' => 'Parth',
        //         [
        // ]);
        // $response = $response->getBody()->getContents();
        // echo '<pre>';
        // print_r($response);
}
}
