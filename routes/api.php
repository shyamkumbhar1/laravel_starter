<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController,jsonController};



// Jwt Token Api start

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);  
    Route::view('testing','testing');
    // Flight Serach
Route::get('all-flights',[jsonController::class,'AllFlights']);
Route::get('search-flights',[jsonController::class,'SearchFlight']);

});

// Jwt Token Api End



