<?php

use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FooController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\PatternController;
use App\Http\Controllers\QueryBuilderToSql;
use App\Http\Controllers\Product1Controller;
use App\Http\Controllers\EncryptioController;
use App\Http\Controllers\InstamozaController;
use App\Http\Controllers\Mail\mailController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\MagicMethodeController;
use App\Http\Controllers\RelationshipController;
use App\Http\Controllers\gmailSmtpEmailController;
use App\Http\Controllers\ImageUploadAwsController;
use App\Http\Controllers\StoreProcedureController;
// use Http;
use App\Http\Controllers\PrintArrayToTableController;
use App\Http\Controllers\ObserverProductController;
use App\Http\Controllers\Session_CookiesController;
use App\Http\Controllers\MultipleDatabaseController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\{Post1Controller,MultiRecordController};
use App\Http\Controllers\{CacheController,ProductController,NormalHttpClient,GuzzleHttpClient,MutatorController,CoreConcept,CurlController,RouteController,SessionController,CoreConceptController,imageUploadController,RazorpayPaymentController};
use App\Models\Post;

Route::get('/', function () {
    $collection = collect(['apple', 'banana', 'orange']);
    echo "<pre>";
 print_r($collection);
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

// Email Send Using Gmail smtp
Route::get('/gmail-smtp',[gmailSmtpEmailController::class,'previewTemplate'] );

// Email Send Usiing Cron Job

Route::get('email-test', function(){
  
    $details['email'] = 'shyamkumbhar509@gmail.com';
  
    dispatch(new App\Jobs\SendEmailJob($details));
  
});





// Third Party Api Integration using Normal http client (CRUD)
Route::get('/post',[NormalHttpClient::class,"all_data"]);
Route::get('/post/{id}',[NormalHttpClient::class,"single_data"]);
Route::get('/addPost',[NormalHttpClient::class,"addPost"]);
Route::get('/updatePost/{id}',[NormalHttpClient::class,"updatePost"]);
Route::get('/deletePost/{id}',[NormalHttpClient::class,"deletePost"]);
Route::get('/getInfo',[NormalHttpClient::class,"getInfo"]);
Route::get('/save_api_data',[NormalHttpClient::class,"save_api_data_to_database"]);


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

// Session And Cookies
Route::get('/session',[Session_CookiesController::class,'session']);
Route::get('/cookies',[Session_CookiesController::class,'cookies']);


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

// Instamoza Payment-getway
Route::get('submit', [InstamozaController::class, 'submit']);
Route::get('instamozo_redirect', [InstamozaController::class, 'instamozo_redirect']);




// CRUL 

Route::get('/curl-basic-core',[CurlController::class,'core']);
Route::get('/curl-laravel',[CurlController::class,'laravel']);


// image Upload 
Route::get('imageUpload',[imageUploadController::class,'index']);
Route::post('upload-image',[imageUploadController::class,'upload']);


// Named Route In Laravel 

Route::get('route',[RouteController::class,'route']);
Route::get('home',[RouteController::class,'home'])->name('home');
Route::get('about/{category}',[RouteController::class,'about'])->name('about');

// Prefix in laravel 

Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        // Matches The "/admin/users" URL
        return "admin user page";
    });
});

Route::name('admin.')->group(function () {
    Route::get('/users', function () {
        // Route assigned name "admin.users1"...
     
    })->name('users1');
});

// Route::controller(OrderController::class)->group(function () {
//     Route::get('/orders/{id}', 'show');
//     Route::post('/orders', 'store');
// });


// Encryption And decription 
Route::get('encrypt',[EncryptioController::class,'encrypt']);
Route::get('decrypt',[EncryptioController::class,'decrypt']);

// Fetch flight data 
Route::get('/get-flightData', [AuthController::class, 'getFlightData']);    

// image upload using AWS 

Route::get('image-upload', [ ImageUploadAwsController::class, 'imageUpload' ])->name('image.upload');
Route::post('image-upload', [ ImageUploadAwsController::class, 'imageUploadPost' ])->name('image.upload.post');
Route::get('get-image', [ ImageUploadAwsController::class, 'getImage' ]);


// observer 
Route::get('product2',[ObserverProductController::class,'index']);

// Relationship In Laravel

Route::get('oneToOne',[RelationshipController::class,'oneToOne']);
Route::get('oneToMany',[RelationshipController::class,'oneToMany']);
Route::get('ManyToMany',[RelationshipController::class,'ManyToMany']);
Route::get('HasManyThrough',[RelationshipController::class,'HasManyThrough']);
Route::get('Eggerloading',[RelationshipController::class,'Eggerloading']);


// Colection In Laravel
Route::get('collection',[CollectionController::class,'collection']);
Route::get('in-memory-databases',[CollectionController::class,'inMemoryDatabases']);

// How to Create and Use Query Scope in Laravel Eloquent

Route::get('Eloquent-scop',function (){
    return "scope ";
});

// QueryBuilder To Sql Converter
Route::get('toSql',[QueryBuilderToSql::class,'index']);

// Store Procedure  
Route::get('StoreProcedure',[StoreProcedureController::class,'StoreProcedure']);
Route::get('view',[StoreProcedureController::class,'view']);

// Used 2 Database in Single Laravel Application

Route::get('Multiple',[MultipleDatabaseController::class,'Multiple']);
Route::get('cache',[CacheController::class,'cache']);

// Services Provider ans service container

Route::get('/foo', [FooController::class,'index']);

// Import and Export 

Route::get('/file-import',[UserController::class,'importView'])->name('import-view');
Route::post('/import',[UserController::class,'import'])->name('import');
Route::get('/export-users',[UserController::class,'exportUsers'])->name('export-users');

// Basic Topic
Route::get('encrypt',[BasicController::class,'encrypt']);
Route::get('decrypt',[BasicController::class,'decrypt']);
Route::get('array',[BasicController::class,'array']);
Route::get('string',[BasicController::class,'string']);
Route::get('magic_constant',[BasicController::class,'magic_constant']);
Route::get('magic_methode',[BasicController::class,'magic_methode']);

// Pattern print
Route::get('triangle',[PatternController::class,'triangle']);

// Magic Methode 
Route::get('triangle',[MagicMethodeController::class,'triangle']);

// Dependancy DropDown In laravel


Route::get('dropdown', [DropdownController::class, 'index']);
Route::post('api/fetch-states', [DropdownController::class, 'fetchState']);
Route::post('api/fetch-cities', [DropdownController::class, 'fetchCity']);


// Third Part Api integration
Route::get('fetchDta', [Post1Controller::class, 'fetchDta']);

// Reverse routing 
Route::get('/reverse-routing/{id}', function ($id) {
    $url = route('user.profile', ['id' => 1]);
print_r($url);
})->name('user.profile');

// print array data to table
Route::get('array-to-table',[PrintArrayToTableController::class,'index']);

// Add Multiple Record in laravel
Route::Resource('multi-record',MultiRecordController::class);
Route::post('multi_record/destroy_multiple', [MultiRecordController::class,'destroy_multiple'])->name('multi_record.destroy_multiple');



