<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EncryptioController extends Controller
{
 
    public function encrypt()
   {
        $encrypted = Crypt::encryptString('techsolutionstuff');
        print_r($encrypted);
   }

    public function decrypt()
    {
        //  $decrypt= Crypt::decryptString('your_encrypted_string');
        $encrypted = 'eyJpdiI6ImZIdjBienlSUStuUTVOR3gzdzV6Umc9PSIsInZhbHVlIjoiZFkrbWY1MllmWjc3UTd2WGhiaW96N2JzL2d3Njk0T05aQStrWFVESkNVbz0iLCJtYWMiOiIxYjM1OWU5M2U1NjUwZjUxNGZiMDViYzU4M2IwMDU3NDczNTQ2NThmYmQ3ZTQ0Mzk1NTlmNTYwZmE0OTJlMTU2IiwidGFnIjoiIn0=';
         $decrypt= Crypt::decryptString($encrypted);
         print_r($decrypt);
    }
}
