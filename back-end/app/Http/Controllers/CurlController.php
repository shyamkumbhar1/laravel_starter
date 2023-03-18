<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurlController extends Controller
{
   public function laravel (){
  // $response = Curl::to('http://www.foo.com/bar')
    // ->get();
    // dd($response);
    }
   public function core (){

    //get Methode
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,"https://www.google.com/");
   $result = curl_exec($ch);
    curl_close($ch);

    //Post Methode need some changes on serve 
    $ch = curl_init();
    $arr = ["name"=>"shyam kumbhar","age"=>"27"];
    curl_setopt($ch,CURLOPT_POSTFIELDS,$arr);
   $result = curl_exec($ch);
    curl_close($ch);

    }
}
