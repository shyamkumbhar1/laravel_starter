<?php

use Ixudra\Curl\Facades\Curl;
use App\Http\Controllers\CoreConcept;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurlController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\Auth\AuthController;


use App\Http\Controllers\Mail\mailController;
use App\Http\Controllers\CoreConceptController;
use App\Http\Controllers\RazorpayPaymentController;
use App\Http\Controllers\{ProductController,NormalHttpClient,GuzzleHttpClient,MutatorController};




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


// Custom Auth Registor , login and Logout  using session using Core Php
Route::view('login1','session.login');
Route::view('home1','session.home');

Route::post('/login1',[SessionController::class,'login']);


// Custom Auth 1 ( login Register and logout )

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


// Core Concept 

Route::get('/array',[CoreConceptController::class,'array']);

// middelware 

Route::view('noaccess','middleware.noaccess')->name('noaccess1');
Route::view('user','middleware.user')->middleware('ProtectedAge');


// Route::group(['middleware'=>['ProtectedAge']],function(){
//     // Route::view('user','middleware.user');

// });


// helpers 

Route::get('/helper',function(){
    //  echo messaage();
//  echo messaage("Hello Mad");  // function  base helper
echo Custom::UpperCase("hete");  // class base helper
return view ('home3');
});


// Define Constant Variable in Laravel
Route::get('/set-config',function(){
    dd(config('global.user_name'));

});


// razorpay-payment
Route::get('razorpay-payment', [RazorpayPaymentController::class, 'index']);
Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');


// CRUL 

Route::get('/curl-basic-core',[CurlController::class,'core']);
Route::get('/curl-laravel',[CurlController::class,'laravel']);