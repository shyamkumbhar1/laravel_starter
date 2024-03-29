<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\JWTAuthController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('register', [JWTAuthController::class, 'register']);
// Route::post('login', [JWTAuthController::class, 'login']);

// Route::group(['middleware' => 'auth.jwt'], function () {

//     Route::post('logout', [JWTAuthController::class, 'logout']);

// });

//Jwt Auth
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});


