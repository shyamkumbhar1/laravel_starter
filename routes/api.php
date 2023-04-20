<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{xmlApiController,RestApiController,jsonApiController};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// json Api
Route::get('/jsonApi',[jsonApiController::class,'getProducts']);

// xml Api
Route::get('/xmlApi',[xmlApiController::class,'getProducts']);

// Rest Api
// Route::get('/xmlApi',[RestApiController::class,'getProducts']);
Route::resource('restApi','App\Http\Controllers\RestApiController');



