<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class mailController extends Controller
{
    function sendEmail () {
        $data = ["name"=> "shyam kumbhar"];
        // dd($name);
    
        mail::send("email",$data,function($msg){
            $msg->to("shyam@gmail.com","Advance Laravel project")
                ->subject("Advance Laravel Series");
               
        }
}
}
