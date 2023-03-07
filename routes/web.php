<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Markdown;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NormalHttpClient;
use App\Http\Controllers\GuzzleHttpClient;


Route::get('/', function () {
    return view('welcome');
});

// Logs 
Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

// Basic CRUD
Route::resource('products', ProductController::class);


// Email Send using cron job 

Route::get('/send-email', function () {
    $data = ["name"=> "shyam kumbhar"];
    // dd($name);

    mail::send("email",$data,function($msg){
        $msg->to("shyam@gmail.com","Advance Laravel project")
            ->subject("Advance Laravel Series");
           
    });

  

    echo "mail Send Sucessfully.";
});

Route::get('/Mailable', function () {

    mail::to("shyamkumbhar@gmail.com")->send(New App\Mail\SendTestMail);
    echo "mail Send Sucessfully.";
});
Route::get('/mark-Down', function () {

    // mail::to("shyamkumbhar@gmail.com")->send(New App\Mail\SendMarkDownMail);
    // echo "mail Send Sucessfully.";

    $markdown = new \Illuminate\Mail\Markdown(view(), config('mail.markdown'));   
    $data = ["Your data to be use in blade file"];
    return $markdown->render("welcome", $data);


});
Route::get('/preview-email-template', function () {
    $markdown = new \Illuminate\Mail\Markdown(view(), config('mail.markdown'));   
    $data = ["Your data to be use in blade file"];
    $template =  $markdown->render("welcome", $data);

    $data = ["name"=> "shyam kumbhar"];
    mail::send("email",$data,function($msg){
        $msg->to("shyam@gmail.com","Advance Laravel project")
            ->subject("Advance Laravel Series");
           
    });

    echo "email send Succesfully";
    

});

// Third Party Api Integration using Normal http client (CRUD)
Route::get('/post',[NormalHttpClient::class,"all_data"]);
Route::get('/post/{id}',[NormalHttpClient::class,"single_data"]);
Route::get('/addPost',[NormalHttpClient::class,"addPost"]);
Route::get('/updatePost/{id}',[NormalHttpClient::class,"updatePost"]);
Route::get('/deletePost/{id}',[NormalHttpClient::class,"deletePost"]);
Route::get('/getInfo',[NormalHttpClient::class,"getInfo"]);


// third party api integration using GuzzleHttpclient
Route::get('/Guzzle_Http_Client ',[GuzzleHttpClient::class,"getRequest"]);
Route::post('/Guzzle_Http_Client ',[GuzzleHttpClient::class,"getRequest"]);

