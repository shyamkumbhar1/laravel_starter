<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Markdown;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;
use App\Http\Controllers\{ProductController,NormalHttpClient,GuzzleHttpClient,MutatorController};
use App\Http\Controllers\Mail\mailController;



Route::get('/', function () {
    return view('welcome');
});

// Logs 
Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

// Basic CRUD
Route::resource('products', ProductController::class);


// Email Send using cron job 

Route::get('/send-email',[mailController::class,'sendEmail'] );
Route::get('/Mailable',[mailController::class,'Mailable'] );
Route::get('/mark-Down',[mailController::class,'Markdown'] );
Route::get('/preview-email-template',[mailController::class,'previewTemplate'] );



// Third Party Api Integration using Normal http client (CRUD)
Route::get('/post',[NormalHttpClient::class,"all_data"]);
Route::get('/post/{id}',[NormalHttpClient::class,"single_data"]);
Route::get('/addPost',[NormalHttpClient::class,"addPost"]);
Route::get('/updatePost/{id}',[NormalHttpClient::class,"updatePost"]);
Route::get('/deletePost/{id}',[NormalHttpClient::class,"deletePost"]);
Route::get('/getInfo',[NormalHttpClient::class,"getInfo"]);


// third party api integration using GuzzleHttpclient
Route::get('/getRequest ',[GuzzleHttpClient::class,"getRequest"]);
Route::get('/postRequest ',[GuzzleHttpClient::class,"postRequest"]);

// Laravel 8 - Accessors and Mutators 
Route::get('add-product',[MutatorController::class,'setProduct']);
Route::get('list-product',[MutatorController::class,'getProducts']);


// Custom Registor , login and Logout 