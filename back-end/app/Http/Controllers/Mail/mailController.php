<?php

namespace App\Http\Controllers\Mail;


use App\Mail\SendTestMail;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Mail;



class mailController extends Controller
{
    function sendEmail () {
        $data = ["name"=> "shyam kumbhar"];
        // dd($name);
    
        mail::send("email",$data,function($msg){
            $msg->to("shyam@gmail.com","Advance Laravel project")
                ->subject("Advance Laravel Series");
               
        });    
        echo "mail Send Sucessfully.";
    }
    function Mailable () {

        mail::to("shyamkumbhar@gmail.com")->send(New SendTestMail);
        echo "mail Send Sucessfully.";
    }

    function Markdown () {

        // mail::to("shyamkumbhar@gmail.com")->send(New App\Mail\SendMarkDownMail);
        // echo "mail Send Sucessfully.";
    
        $markdown = new \Illuminate\Mail\Markdown(view(), config('mail.markdown'));   
        $data = ["Your data to be use in blade file"];
        return $markdown->render("welcome", $data);
    
    
    }
    function previewTemplate () {
        $markdown = new \Illuminate\Mail\Markdown(view(), config('mail.markdown'));   
        $data = ["Your data to be use in blade file"];
        $template =  $markdown->render("welcome", $data);
    
        $data = ["name"=> "shyam kumbhar"];
        mail::send("email",$data,function($msg){
            $msg->to("shyam@gmail.com","Advance Laravel project")
                ->subject("Advance Laravel Series");
               
        });
    
        echo "email send Succesfully";
        
    
    }
}

