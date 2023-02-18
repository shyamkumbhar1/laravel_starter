<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Markdown;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

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
