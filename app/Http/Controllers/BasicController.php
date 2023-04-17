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
}
