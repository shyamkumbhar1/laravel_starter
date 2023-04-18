<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class BasicController extends Controller
{
  
    public function encrypt()
    {
         $encrypted = Crypt::encryptString('techsolutionstuff');
         print_r($encrypted);
    }
    
     public function decrypt()
     {
          $decrypt= Crypt::decryptString('your_encrypted_string');
          print_r($decrypt);
     }

     public function array (){
          $data = ["shyam","deepak","babu"];
          $colors = array('red', 'green', 'blue', 'yellow', 'orange', 'purple');
          $myArray = array('apple' => 1, 'banana' => 2, 'cherry' => 3);
         
          // dd(array_filter($colors,function($value){
          //      return strlen($value)>4;
          // }));    

          dd(array_map(function($value){
               return strtoupper($value);
          },$colors));

     }

     public function string (){
          // return "string  function";
          $string = "    Hello world      ";
          $string1 = " Hello City ";
          dd(trim($string));
     }
     
}
